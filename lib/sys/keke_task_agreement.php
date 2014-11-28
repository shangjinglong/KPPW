<?php
keke_lang_class::load_lang_class('keke_task_agreement');
abstract class keke_task_agreement {
	public $_agree_id;
	public $_agree_status;
	public $_agree_info;
	public $_agree_url;
	public $_task_id;
	public $_model_code;
	public $_trust_info;
	public $_buyer_uid;
	public $_buyer_username;
	public $_buyer_status;
	public $_buyer_contact;
	public $_seller_uid;
	public $_seller_username;
	public $_seller_status;
	public $_seller_contact;
	public $_user_role;
	protected $_inited = false;
	public function __construct($agree_id) {
		$this->_agree_id = $agree_id;
		$this->get_agreement_info ();
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->buyer_contact_init ();
			$this->seller_contact_init ();
		}
		$this->_inited = true;
	}
	public static function create_agreement($agree_title, $mode_id, $task_id, $work_id, $buyer_uid, $seller_uid) {
		$agree_obj = new Keke_witkey_agreement_class ();
		$agree_obj->_agree_id = null;
		$agree_obj->setAgree_title ( $agree_title );
		$agree_obj->setTask_id ( $task_id );
		$agree_obj->setModel_id ( $mode_id );
		$agree_obj->setWork_id ( $work_id );
		$agree_obj->setBuyer_uid ( $buyer_uid );
		$agree_obj->setBuyer_status ( 1 );
		$agree_obj->setSeller_uid ( $seller_uid );
		$agree_obj->setSeller_status ( '1' );
		$agree_obj->setAgree_status ( '1' );
		$agree_obj->setOn_time ( time () );
		return $agree_obj->create_keke_witkey_agreement ();
	}
	public function get_agreement_info() {
		global $_K, $uid, $kekezu;
		$agree_info = db_factory::get_one ( sprintf ( " select * from %switkey_agreement where agree_id = '%d'", TABLEPRE, $this->_agree_id ) );
		$this->_agree_info = $agree_info;
		$uid == $agree_info ['buyer_uid'] and $this->_user_role = '2' or $this->_user_role = '1';
		$this->_agree_status = $agree_info ['agree_status'];
		$this->_task_id = $agree_info ['task_id'];
		$this->_model_code = $kekezu->_model_list [$agree_info ['model_id']] ['model_code'];
		$this->_buyer_uid = $agree_info ['buyer_uid'];
		$this->_buyer_status = $agree_info ['buyer_status'];
		$this->_seller_uid = $agree_info ['seller_uid'];
		$this->_seller_status = $agree_info ['seller_status'];
		$this->_agree_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=agreement" . "&taskId=".$this->_task_id."&agreeId=" . $this->_agree_id . "\">" . $this->_agree_info ['agree_title'] . "</a>";
	}
	public function buyer_contact_init() {
		$info = db_factory::get_one ( sprintf ( " select a.contact,a.username,b.truename,b.phone,b.email,b.qq,b.msn from %switkey_task a left join %switkey_space b on a.uid=b.uid where a.task_id='%d'", TABLEPRE, TABLEPRE, $this->_task_id ) );
		$this->_buyer_username = $info ['username'];
		$contact = array('mobile'=> $info ['contact'] );
		$this->_buyer_contact = array_merge ( $info, $contact );
	}
	public function seller_contact_init() {
		$info = db_factory::get_one ( sprintf ( " select truename,username,qq,mobile,email,msn,phone from %switkey_space where uid='%d'", TABLEPRE, $this->_seller_uid ) );
		$this->_seller_username = $info ['username'];
		$this->_seller_contact = $info;
	}
	public function agreement_stage_one($user_type) {
		global $_lang;
		$buyer_status = intval ( $this->_buyer_status );
		$seller_sattus = intval ( $this->_seller_status );
		$agree_status = intval ( $this->_agree_status );
		if ($agree_status == '1') {
			switch ($user_type) {
				case "1" :
					if ($seller_sattus == '2') {
						$notice = $_lang['you_has_agree_agreement_notice'];
					} else {
						$res = $this->set_agreement_status ( 'seller_status', '2' );
						if ($res) {
							db_factory::execute ( sprintf ( " update %switkey_agreement set seller_accepttime='%s' where seller_uid='%d' and agree_id ='%d'", TABLEPRE, time (), $this->_seller_uid, $this->_agree_id ) );
							switch ($buyer_status) {
								case "1" :
									$notice = $_lang['agreement_signed_complete_wait_you'];
									break;
								case "2" :
									$notice = $_lang['agreement_signed_complete_to_deliver'];
									$this->set_agreement_status ( 'agree_status', "2" );
									break;
							}
						} else {
							$notice = $_lang['agreement_signed_fail'];
							$type = 'error';
						}
					}
					break;
				case "2" :
					if ($buyer_status == '2') {
						$notice = $_lang['you_has_agree_not_sign'];
					} else {
						$res = $this->set_agreement_status ( 'buyer_status', '2' );
						if ($res) {
							db_factory::execute ( sprintf ( " update %switkey_agreement set buyer_accepttime='%s' where buyer_uid ='%d' and agree_id='%d'", TABLEPRE, time (), $this->_buyer_uid, $this->_agree_id) );
							switch ($seller_sattus) {
								case "1" :
									$notice = $_lang['agreement_signed_complete_wait_witkey'];
									break;
								case "2" :
									$notice = $_lang['agreement_signed_complete_to_deliver'];
									$this->set_agreement_status ( 'agree_status', "2" );
									break;
							}
						} else {
							$notice = $_lang['agreement_signed_fail'];
							$type = 'error';
						}
					}
					break;
			}
			$msg_obj = new keke_msg_class ();
			$s_arr = array ($_lang['agreement_link'] => $this->_agree_url, $_lang['agreement_status'] => $notice );
			$b_arr = array ($_lang['agreement_link']  => $this->_agree_url, $_lang['agreement_status'] => $notice );
			$msg_obj->send_message ( $this->_seller_uid, $this->_seller_username, "agreement", $_lang['deliver_agreement_sign'], $s_arr, $this->_seller_contact ['email'], $this->_seller_contact ['mobile'] ); 
			$msg_obj->send_message ( $this->_buyer_uid, $this->_buyer_username, "agreement",  $_lang['deliver_agreement_sign'], $s_arr, $this->_buyer_contact ['email'], $this->_buyer_contact ['mobile'] ); 
		} else {
			$notice = $_lang['agreement_complete_no_confirm_again'];
			$type = 'error';
		}
		if($type === 'error'){
			return $notice;
		}
		return true;
	}
	public function upfile_confirm($file_ids) {
		global $uid;
		global $_lang;
		if($uid != $this->_seller_uid){
			return $_lang['warning_you_no_rights_submit'];
		}
		$file_ids = implode ( "|", array_filter ( explode ( "|", $file_ids ) ) );
		$res = db_factory::execute ( sprintf ( " update %switkey_agreement set seller_confirmtime = UNIX_TIMESTAMP(),file_ids = '%s' where agree_id='%d'", TABLEPRE, $file_ids, $this->_agree_id ) );
		$res *= $this->set_agreement_status ( 'seller_status', '3' );
		$res *= $this->set_agreement_status ( 'buyer_status', '3' );
		$notice = $_lang['seller_has_submit_wait_buyrer'];
		$msg_obj = new keke_msg_class ();
		$v_arr = array ($_lang['the_initiator'] => $this->_seller_username, $_lang['agreement_link'] => $this->_agree_url, $_lang['action'] => $_lang['has_submit_source_files'], $_lang['agreement_status'] => $notice );
		$msg_obj->send_message ( $this->_buyer_uid, $this->_buyer_username, "agreement_file", $_lang['agreement_files_submit'], $v_arr, $this->_buyer_contact ['email'], $this->_buyer_contact ['mobile'] ); 
		if($res){
			return true;
		}else{
			return $_lang['source_file_fail'];
		}
	}
	public function accept_confirm() {
		global $uid;
		global $_lang;
		$agree_info = $this->_agree_info;
		if($uid != $this->_buyer_uid){
			return $_lang['warning_you_no_rights_confirm'];
		}
		$trust_info = $this->_trust_info;
		if ($this->_agree_status == 2 && $this->_seller_status == 3 && $this->_buyer_status == 3) {
				$res = db_factory::execute ( sprintf ( " update %switkey_agreement set buyer_confirmtime = UNIX_TIMESTAMP() where agree_id ='%d'", TABLEPRE, $this->_agree_id ) );
				db_factory::execute ( sprintf ( " update %switkey_task set task_status = '8' where task_id ='%d'", TABLEPRE, $this->_task_id ) );
				$cash_info = db_factory::get_one ( sprintf ( " select task_cash,task_union,real_cash from %switkey_task where task_id = '%d'", TABLEPRE, $this->_task_id ) );
				$res *= $this->set_agreement_status ( 'seller_status', '4' );
				$res *= $this->set_agreement_status ( 'buyer_status', '4' );
				$res *= $this->set_agreement_status ( 'agree_status', '3' );
				$this->dispose_task ();
				$notice = $_lang['buyer_has_confirm_deliver_complete'];
				$msg_obj = new keke_msg_class ();
				$v_arr = array ($_lang['the_initiator'] => $this->_buyer_username, $_lang['agreement_link'] => $this->_agree_url, $_lang['action'] => $_lang['confirm_has_received_file'], $_lang['agreement_status'] => $notice );
				$msg_obj->send_message ( $this->_seller_uid, $this->_seller_username, "agreement_file", $_lang['agreement_file_recevie'], $v_arr, $this->_seller_contact ['email'], $this->_seller_contact ['mobile'] ); 
				if($res){
					return true;
				}else{
					return $_lang['file_confirm_fail_deliver_fail'];
				}
		} else {
			return $_lang['current_status_can_not_confirm'];
		}
	}
	abstract function dispose_task();
	public function plus_mark_num() {
		return db_factory::execute ( sprintf ( "update %switkey_task set mark_num=ifnull(mark_num,0)+2 where task_id ='%d'", TABLEPRE, $this->_task_id ) );
	}
	public function set_report($obj, $obj_id, $to_uid, $to_username, $report_type, $file_name, $desc) {
		$this->set_agreement_status($type = 'agree_status',4);
	    keke_report_class::add_report ( $obj, $obj_id, $to_uid, $to_username, $desc, $report_type, '6', $this->_task_id, $this->_user_role, $file_name );
	}
	abstract function process_can();
	abstract function stage_access_check();
	abstract function agreement_stage_list($user_type = '1');
	abstract function get_buyer_status();
	abstract function get_seller_status();
	public function get_file_list() {
		if ($this->_agree_info ['file_ids']) {
			$fileIds = explode('|', $this->_agree_info ['file_ids']);
			$fileIds = implode(',', $fileIds);
			return db_factory::query ( sprintf ( " select file_id,file_name,save_name from %switkey_file where file_id in(%s)", TABLEPRE, $fileIds ) );
		}
	}
	public function del_file($file_id) {
		$res = keke_file_class::del_att_file ( $file_id );
		$res and kekezu::echojson ( '', '1' ) or kekezu::echojson ( '', '0' );
		die ();
	}
	public function set_agreement_status($type = 'agree_status', $to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_agreement set %s = '%d' where agree_id = '%d'", TABLEPRE, $type, $to_status, $this->_agree_id ) );
	}
	public static function get_agreement_status() {
		global $_lang;
		return array ("1" => $_lang['wait_sign'], "2" => $_lang['agreement_sign_complete'], "3" => $_lang['task_order_complete'] );
	}
}