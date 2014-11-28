<?php
keke_lang_class::load_lang_class ( 'keke_register_class' );
class keke_register_class {
	protected $_space_obj;
	protected $_member_obj;
	protected $_sys_config;
	protected $_reg_username;
	protected $_reg_type;
	public $_reg_pwd;
	protected $_reg_email;
	protected $_reg_ip;
	protected $_message_obj;
	protected $_check_code;
	protected $_oltime_obj;
	protected $_shop_obj;
	function __construct($reg_type = 1) {
		global $kekezu;
		$this->_space_obj = new Keke_witkey_space_class ();
		$this->_member_obj = new Keke_witkey_member_class ();
		$this->_sys_config = $kekezu->_sys_config;
		$this->_message_obj = new keke_msg_class ();
		$this->_oltime_obj = new Keke_witkey_member_oltime_class ();
		$this->_shop_obj = new Keke_witkey_shop_class();
		$this->_reg_ip = kekezu::get_ip ();
		$this->_reg_type = intval ( $reg_type );
	}
	function user_register($reg_username, $reg_pwd, $reg_email, $reg_code, $check_code = true, $old_pwd = null) {
		global $kekezu;
		global $_lang;
		$reg_uid = null;
		$this->_reg_username = $reg_username  = kekezu::escape($reg_username);
		$this->_reg_pwd = md5($reg_pwd);
		$this->_reg_email = $reg_email;
		$this->_check_code = $check_code;
		$content = $this->check_all ( $reg_username, $reg_email, $reg_code );
		if($content!==true){
			$tips ['errors'] ['account'] = $content;
			kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
		}
		if ($kekezu->_sys_config ['user_intergration']==2) {
			require_once S_ROOT . '/uc_client/client.php';
			$reg_uid = uc_user_register ( $this->_reg_username, $reg_pwd , $this->_reg_email );
		}
		return $this->save_userinfo ( $this->_reg_username, $this->_reg_email, $reg_uid ); 
	}
	function register_login($userinfo) {
		global $kekezu;
		global $_lang;
		global $_K;
		$_SESSION ['uid'] = $userinfo ['uid'];
		$_SESSION ['username'] = $userinfo ['username'];
		if ($this->_message_obj->validate ( 'reg' ) && $this->_sys_config ['allow_reg_action'] == 0) {
			$this->_message_obj->send_message ( $userinfo ['uid'], $userinfo ['username'], 'reg', $_lang ['register_success'], array (), $userinfo ['email'] );
		}
		$c = $_COOKIE;
		if($_K['refer']){
			$r = $_K['refer'];
		}else{
			$r = 'index.php';
		}
		if (isset ( $_COOKIE ['prom'] )) {
			$prom_obj =  keke_prom_class::get_instance ();
			$url_data = $prom_obj->extract_prom_cookie ();
			$prom_obj->create_prom_relation ( $userinfo ['uid'], $userinfo ['username'], $url_data );
			$url_data ['p'] == 'reg' and $obj_id = $userinfo ['uid'] or $obj_id = $url_data ['o'];
			$prom_obj->create_prom_event ( $url_data ['p'], $userinfo ['uid'], $obj_id );
		}
		$synhtml = keke_user_class::user_synlogin ( $userinfo ['uid'], md5 ( $this->_reg_pwd ) );
		if ($userinfo ['status'] == 3&&$this->_reg_type==1) {
			$_SESSION ['uid'] = '';
			$_SESSION ['username'] = '';
			$arr = explode ( "@", $userinfo ['email'] );
			$mail_url = "http://mail." . $arr [1];
			$this->show_msg($_lang ['register_success_and_excite'] . "$synhtml",1,$mail_url);
		} else {
			if($this->_reg_type==2){
					 $userinfo[pic] = keke_user_class::get_user_pic ( $userinfo ['uid'] );
					 $r = $userinfo;
					db_factory::execute(sprintf(" update %switkey_space set status=1 where uid='%d'",TABLEPRE,$userinfo['uid']));
			}
			$this->show_msg($_lang ['register_success'] . "$synhtml",1,$r);
		}
	}
	function save_userinfo($reg_username, $reg_email, $reg_uid = null) {
		$reg_username = kekezu::escape($reg_username);
		$slt = kekezu::randomkeys ( 6 );
		$pwd = keke_user_class::get_password ( $this->_reg_pwd, $slt );
		$this->_member_obj->setUid ( $reg_uid );
		$this->_member_obj->setEmail ( $reg_email );
		$this->_member_obj->setUsername ( $reg_username );
		$this->_member_obj->setPassword ( $this->_reg_pwd );
		$this->_member_obj->setRand_code ( $slt );
		$reg_member_uid = $this->_member_obj->create_keke_witkey_member ();
		$this->_oltime_obj->setUid ( $reg_member_uid );
		$this->_oltime_obj->setUsername ( $reg_username );
		$this->_oltime_obj->setLast_op_time ( time () );
		$this->_oltime_obj->setOnline_total_time ( 0 );
		$this->_oltime_obj->create_keke_witkey_member_oltime ();
		if ($reg_member_uid) {
			$buyer_level = keke_user_mark_class::get_mark_level ( 0, '2' ); 
			$seller_level = keke_user_mark_class::get_mark_level ( '0', '1' ); 
			$this->_shop_obj->setShop_type(1);
			$this->_shop_obj->setUid($reg_member_uid);
			$this->_shop_obj->setUsername($reg_username);
			$this->_shop_obj->setShop_name($reg_username);
			$this->_shop_obj->setShop_status(1);
			$res_shop_id = $this->_shop_obj->create_keke_witkey_shop();
			$this->_space_obj->setUid ( $reg_member_uid );
			$this->_space_obj->setUsername ( $reg_username );
			$this->_space_obj->setPassword ( $this->_reg_pwd );
			$this->_space_obj->setSec_code ( $pwd );
			$this->_space_obj->setEmail ( $reg_email );
			$this->_space_obj->setReg_time ( time () );
			$this->_space_obj->setReg_ip (keke_glob_class::checkipaddres($this->_reg_ip)?$this->_reg_ip:'0.0.0.0' );
			$this->_space_obj->setBuyer_level ( serialize ( $buyer_level ) );
			$this->_space_obj->setSeller_level ( serialize ( $seller_level ) );
			$space_id = $this->_space_obj->create_keke_witkey_space ();
		}
		$info = array ('uid' => $reg_member_uid, 'username' => $reg_username, 'email' => $reg_email );
		$this->_sys_config ['allow_reg_action'] == 1 and keke_user_class::send_email_action_user ( $info );
		return $reg_member_uid;
	}
	function check_all($reg_username, $reg_email, $reg_code) {
		global $_lang,$_K;
		$res1 = $this->check_ip ();
		if($_K['do']){
			$url = 'index.php?do='.$_K['do'];
		}else{
			$url = 'index.php?do=register';
		}
		$res1 === true or $result = $res1;
		$res2 = $this->check_username ( $reg_username );
		$res2 === true or $result = $res2;
		$res3 = $this->check_email ( $reg_email );
		$res3 === true or $result = $res3;
		if ($this->_check_code == true) {
			$res4 = $this->check_code ( $reg_code );
			$res4 === true or $result = $res4;
		}
		if($result){
			return $result;
		}else{
			return true;
		}
	}
	function check_username($reg_username) {
		global $_lang;
		if (function_exists ( "filter_var" )) {
			if(filter_var ( $reg_username, FILTER_VALIDATE_EMAIL )){
				return $_lang ['username_can_not_email'];
			}
			if(kekezu::is_mobile ( $reg_username ) ){
				return $_lang ['username_can_not_phone_number'];
			}
		} else {
			if(kekezu::is_email ( $reg_username )){
				return $_lang ['username_can_not_email'];
			}
			if(kekezu::is_mobile ( $reg_username ) ){
				return $_lang ['username_can_not_phone_number'];
			}
		}
		$check_username = trim ( $reg_username );
		if (empty ( $check_username )) {
			return $_lang ['username_is_empty'];
		}
		if (kekezu::k_strpos ( $check_username )) {
			return $_lang ['username_illegal'];
		}
		if (kekezu::check_user_by_name ( $check_username, 1 )) {
			return $_lang ['user_has_exist'];
		}
		if ($this->_sys_config ['user_intergration'] == 2) {
			$result = keke_user_class::user_checkname ( $check_username );
			if ($result == - 1) {
				return $_lang ['username_illegal'];
			} else if ($result == - 2) {
				return $_lang ['contain_allow_register_words'];
			} else if ($result == - 3) {
				return $_lang ['username_has_exist'];
			}
		}
		$limit_username = keke_user_class::user_getprotected ();
		if ($limit_username && in_array ( $check_username, $limit_username )) {
			return $_lang ['register_fail_limit_register'];
		}
		return true;
	}
	function check_email($reg_email) {
		global $_lang;
		$check_res = keke_user_class::user_checkemail ( $reg_email );
		if ($check_res == 1) {
			return true;
		} else if ($check_res == - 4) {
			return $_lang ['email_format_error'];
		} else if ($check_res == - 5) {
			return $_lang ['email_not_allow_register'];
		} else if ($check_res == - 6) {
			return $_lang ['email_not_allow_register'];
		}
	}
	function check_code($reg_code) {
		global $_lang;
		$img = new Secode_class ();
		$res_code = $img->check ( $reg_code, 1 );
		if (! $res_code) {
			$this->show_msg($_lang ['reg_code_is_error'],6);
		} else {
			return true;
		}
	}
	function check_ip() {
		global $_lang;
		$check_time = time () - $this->_sys_config ['reg_limit'] * 60;
		if(keke_glob_class::checkipaddres($this->_reg_ip)){
			$this->_space_obj->setWhere ( "reg_ip = '$this->_reg_ip' and $check_time< reg_time" );
		}else{
			$this->_space_obj->setWhere ( " $check_time< reg_time" );
		}
		$res = $this->_space_obj->query_keke_witkey_space ();
		if ($res) {
			return $_lang ['this_IP_has_registered_notice'];
		} else {
			return true;
		}
	}
	public static function register_binding($oauth_user_info, $user_info, $type) {
		global $_lang,$nick,$taobao_user_id;
		$csql = "select count(*) as c from %switkey_member_oauth where source='%s' and oauth_id ='%s'";
		$c = db_factory::get_one ( sprintf ( $csql, TABLEPRE, $type, $oauth_user_info ['account'] ) );
		if (intval ( $c ['c'] ) == 0) {
			$oauth_obj = new Keke_witkey_member_oauth_class ();
			if(!$oauth_user_info ['name']){
			    $oauth_user_info ['name']= $nick;
			}
			if(!$oauth_user_info ['account']){
			    $oauth_user_info ['account'] = $taobao_user_id;
			}
			$oauth_obj->setAccount ( $oauth_user_info ['name'] );
			$oauth_obj->setOauth_id ( $oauth_user_info ['account'] );
			$oauth_obj->setSource ( $type );
			$oauth_obj->setUid ( $user_info ['uid'] );
			$oauth_obj->setUsername ( $user_info ['username'] );
			$oauth_obj->setOn_time ( time () );
			$oauth_obj->create_keke_witkey_member_oauth () or $this->show_msg($_lang ['bind_fail'],2);
		} else {
			$this->show_msg($_lang ['this_user_has_bind'],7);
		}
		return true;
	}
	public static function is_oauth_bind($type, $oauth_id) {
		$sql = "select * from %switkey_member_oauth where source = '%s' and  oauth_id = '%s'";
		return db_factory::get_one ( sprintf ( $sql, TABLEPRE, $type, $oauth_id ) );
	}
	function show_msg($content,$status,$url='',$t=2) {
		global $_lang,$_K;
			$status==1 and $type = 'ok' or $type='error';
			kekezu::show_msg($content,$url,NULL,NULL,$type);
	}
}