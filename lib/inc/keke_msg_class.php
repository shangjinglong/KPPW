<?php
keke_lang_class::load_lang_class('keke_msg_class');
class keke_msg_class {
	public $_key;
	public $_k;
	public $_v=array("send_sms"=>null,"send_email"=>null,"send_mobile_sms"=>null);
	public $_title;
	public $_config;
	public $_uid;
	public $_username;
	public $_sitename;
	public $_normal_content;
	public $_mobile_content;
	public $_email;
	public $_mobile;
	public $_basicconfig;
	function __construct() { 
		$this->basic_init ();
	}
	function basic_init() {
		global $_lang;
		global $basic_config;
		$this->_basicconfig = $basic_config;
		$this->_key = array ();
		$this->_title = $_lang['msg_notice'];
		$this->_k = "";
		$this->_sitename = $basic_config ['website_name'];
	}
	function config_init($k) {
		$this->_k = $k;
		$this->_config = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_msg_config where k='$k'" );
		$this->_v = unserialize ( $this->_config ['v'] );
	}
	function setUid($uid) {
		$this->_uid = $uid;
	}
	function setUsername($username) {
		$this->_username = $username;
	}
	function setTitle($title) {
		$this->_title = $title;
	}
	function setEmail($email) {
		$this->_email = $email;
	}
	function setValue($key, $value) {
		$this->_key [$key] = $value;
	}
	function setMobile($str_mobile) {
		$this->_mobile = $str_mobile;
	}
	function validate($k) {
		$this->config_init ( $k );
		if(is_array( $this->_v)){
			if (array_sum ( $this->_v ) <= 0) {
				return false;
			} else {
				return true;
			}
		}
	}
	function send() {
		if (! $this->_uid) {
			return false;
		}
		if (! $this->validate ( $this->_k )) {
			return false;
		}
		$this->pregmessage ( $this->_k );
		$sum = array_sum ( $this->_v );
		switch ($sum) {
			case 1 :
				($this->_v ['send_sms'] == 1) and $this->sendmessage ();
				(isset($this->_v ['send_email'])&& $this->_v ['send_email']== 1) and $this->sendmail ();
				break;
			case 2 :
				(($this->_v ['send_sms'] == 1 && $this->_v ['send_email'] == 1)) and ($this->sendmessage () or $this->sendmail ());
				(($this->_v ['send_sms'] == 1 && $this->_v ['send_mobile_sms'] == 1)) and ($this->sendmessage () or $this->send_phone_sms ());
				break;
			case 3 :
				$this->sendmessage ();
				$this->sendmail ();
				break;
		}
		$this->_key = array ();
	}
	private function getmessagetpl() {
		global $_cache_obj;
		$tpl = $_cache_obj->get ( "msg_tpl_" . $this->_k . "_cache" );
		if (! $tpl) {
			$msg_obj = new Keke_witkey_msg_tpl_class ();
			$msg_obj->setWhere ( "tpl_code='$this->_k'" );
			$tpl = $msg_obj->query_keke_witkey_msg_tpl ();
			$_cache_obj->set ( "msg_tpl_" . $this->_k . "_cache", $tpl );
		}
		return $tpl;
	}
	private function pregmessage() {
		$tpl = $this->getmessagetpl ();
		$open_phone_sms = sizeof ( $tpl ) - 1;
		switch ($open_phone_sms > 0) { 
			case 0 :
				$cont = $tpl [0] ['content'];
				$this->_normal_content = $this->tpl_format ( $cont );
				break;
			case 1 :
				if (! $this->_username) {
					$userinfo = kekezu::get_user_info ( $this->_uid );
					$this->_username = $userinfo ['username'];
				}
				$cont0 = $tpl [0] ['content'];
				$cont0 = $this->tpl_format ( $cont0 );
				$this->_normal_content = $cont0;
				if (! empty ( $tpl [1] )) {
					$cont1 = $tpl [1] ['content'];
					$cont1 = $this->tpl_format ( $cont1 );
					$this->_mobile_content = $cont1;
				}
				break;
		}
	}
	private function tpl_format($content) {
		global $_lang;
		$this->_username and $cont = str_replace ( '{' . $_lang['username'] . '}', $this->_username, $content );
		$this->_uid and $cont = str_replace ( '{' . $_lang['user_id'] . '}', $this->_uid, $cont );
		$this->_sitename and $cont = str_replace ( '{' . $_lang['website_name'] . '}', $this->_sitename, $cont );
		foreach ( $this->_key as $k2 => $v2 ) {
			$cont = str_replace ( '{' . $k2 . '}', $v2, $cont );
		}
		return $cont;
	}
	private function sendmessage() {
		$message_obj = new Keke_witkey_msg_class ();
		$message_obj->setTitle ( $this->_title );
		$message_obj->setContent ( $this->_normal_content );
		$message_obj->setTo_uid ( $this->_uid );
		$message_obj->setTo_username ( $this->_username );
		$message_obj->setOn_time ( time ( 'now()' ) );
		$message_obj->create_keke_witkey_msg ();
	}
	public function sendmail() {
		global $_K;
		if (! $this->_email || ! $this->_username) {
			$userinfo = kekezu::get_user_info ( $this->_uid );
			$this->_username = $userinfo ['username'];
			$this->_email = $userinfo ['email'];
		}
		if (! $this->_email) {
			return false;
		}
		$this->_basicconfig and $basicconfig = $this->_basicconfig or $basicconfig = kekezu::get_config ( 'basic' );
		if ($basicconfig ['mail_server_cat'] == 'mail') {
			if ($basicconfig ['post_account'] && $basicconfig ['mail_replay'] && $this->_email && $this->_title && $this->_normal_content) {
				$hearer = "From:{$basicconfig['post_account']}\nReply-To:{$basicconfig['mail_replay']}\nX-Mailer: PHP/" . phpversion () . "\nContent-Type:text/html";
				mail ( $this->_email, $this->_title, $this->_normal_content, $hearer );
			}
		} else if ($basicconfig ['smtp_url'] && $basicconfig ['mail_server_port'] && $basicconfig ['post_account'] && $basicconfig ['account_pwd'] && $basicconfig ['website_name']) {
			kekezu::send_mail ( $this->_email, $this->_title, htmlspecialchars_decode($this->_normal_content) );
		}
	}
	public function send_phone_sms( $mobiles = '', $tar_content = '') {
			include_once S_ROOT . '/keke_client/sms/d9.php';
			!$mobiles and $mobiles = $this->_mobile;
			!$tar_content and $tar_content = $this->_mobile_content;
			$msg = new sms_d9($mobiles,$tar_content);
			return $msg->send();
	}
	public function send_message($uid, $username, $action, $title, $v_arr = array(), $email = null, $mobile = null) {
		if ($this->validate ( $action )) {
			$this->setUid ( $uid );
			$this->setUsername ( $username );
			$this->setEmail ( $email );
			$this->setMobile ( $mobile );
			foreach ( $v_arr as $k => $v ) {
				$this->setValue ( $k, $v );
			}
			$this->setTitle ( $title );
			$this->send ();
		}
	}
	public static function send_private_message($title, $tar_content, $to_uid, $to_username, $url = '', $output = 'normal') {
		global $uid, $username;
		global $_lang;
		if (CHARSET == 'gbk') {
			$title = kekezu::utftogbk ( $title );
			$tar_content = kekezu::utftogbk ( $tar_content );
			$to_username = kekezu::utftogbk ( $to_username );
		}
		$msg_obj = new Keke_witkey_msg_class ();
		$msg_obj->_msg_id = null;
		$msg_obj->setUid ( $uid );
		$msg_obj->setUsername ( $username );
		$msg_obj->setTitle ( $title );
		$msg_obj->setTo_uid ( $to_uid );
		$msg_obj->setTo_username ( $to_username );
		$msg_obj->setContent ( $tar_content );
		$msg_obj->setOn_time ( time () );
		$msg_id = $msg_obj->create_keke_witkey_msg ();
		$msg_id and kekezu::keke_show_msg ( $url, $_lang['sms_send_success'], "", $output ) or kekezu::keke_show_msg ( $_lang['operate_notice'], $url, $_lang['sms_send_fail'], "error", $output );
	}
	public static function notify_user($uid, $username, $action, $title, $v_arr = array()) {
		$msg_obj = new keke_msg_class ();
		$contact = self::get_contact ( $uid );
		if(!$username) $username = $contact['username'];
		$msg_obj->send_message ( $uid, $username, $action, $title, $v_arr, $contact ['email'],$contact ['mobile']);
	}
	public static function get_contact($uid) {
		return db_factory::get_one ( sprintf ( " select `username`,mobile,email from %switkey_space where uid = '%d'", TABLEPRE, $uid ) );
	}
}