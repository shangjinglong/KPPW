<?php
keke_lang_class::load_lang_class('keke_trust_fac_class');
class keke_trust_fac_class {
	public $_action;
	public $_trust_type;
	public $_data;
	public static function get_instance($action,$trust_type='alipay_trust'){
		static $obj=null;
		if($obj==null){
			$obj = new keke_trust_fac_class($action,$trust_type);
		}
		return $obj;
	}
	public function __construct($action,$trust_type='alipay_trust'){
		$this->_action 	   = $action;
		$this->_trust_type = $trust_type;
		$this->_data       = array_filter(array_merge($_GET,$_POST));
	}
	public function verify_response($url){
		$func_name   =  $this->_trust_type."_response";
		$this->$func_name($url);
	}
	public function alipay_trust_response($url){
		global $_lang;
		switch ($this->_action){
			case "sns_bind":
				switch ($this->_data ['is_success']) {
					case "T" :
						$uid = $this->_data['sns_user_id'];
						$username = db_factory::get_count(sprintf("select username from %switkey_member where uid='%d'",TABLEPRE,$uid));
						$key = $this->_data['key'];
						$account = $this->_data['alipay_login_id'];
						$oauth_id = $this->_data['alipay_card_no'];
						$id = db_factory::get_count ( sprintf ( " select id from %switkey_member_oauth where uid='%d' and username='%d' and source='alipay_trust'", TABLEPRE, $uid, $username ) );
						if ($id) {
							$sql = " update %switkey_member_oauth set account='%s',oauth_id='%s',bind_key='%s' where id='%d'";
							$res = db_factory::execute ( sprintf ( $sql, TABLEPRE, $account, $oauth_id, $key, $id ) );
						} else {
							$sql = " insert into %switkey_member_oauth values('','alipay_trust','%s','%d','%s','%d','%s','%s')";
							$res = db_factory::execute ( sprintf ( $sql, TABLEPRE, $account, $uid, $username, time (), $oauth_id, $key ) );
						}
							break;
						case "F" :
							$res = false;
							break;
					}
					$res and $this->notify($url, $_lang['alipay_db_bind_success']) or $this->notify($url, $_lang['alipay_db_bind_fail'],"fail" );
				break;
			case "cancel_bind":
				switch ($this->_data ['is_success']) {
						case "T" :
							$uid = $this->_data ['sns_user_id'];
							$sql = " delete from  %switkey_member_oauth where uid='%d' and source='alipay_trust'";
							$res = db_factory::execute ( sprintf ( $sql, TABLEPRE, $uid ) );
							break;
						case "F" :
							$res = false;
							break;
					}
					$res and $this->notify($url, $_lang['alipay_db_unbind_success']) or $this->notify($url, $_lang['alipay_db_unbind_fail'],"fail" );
				break;
		}
	}
	public static function trust_task_request($interface,$model_code,$task_id,$trust_type,$data=null){
		if ($trust_type&&$task_id&&$interface) { 
			$class = $model_code."_" .$trust_type. "_class";
			$trust_obj = new $class ($task_id, $interface);
			return  $trust_obj->$interface ( false, $data);
		}
	}
	public static function notify($url,$content,$type='success',$task_id=null){
		global $_lang;
		unset ( $_SESSION ['trust_' . $task_id]); 
		switch($type){
			case "success":
				kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'success');
				break;
			case "fail":
				kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'warning');
				break;
		}
	}
	public static function set_task_status($task_id,$to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_task set task_status='%d' where task_id='%d'", TABLEPRE, intval ( $to_status ),$task_id) );
	}
	public static function redirect_to_alipay($interface,$trust_type,$t_info = array(), $e_info = array()) {
		global $_K, $uid;
		global $_lang;
		strpos($interface,"pt_")!==FALSE and $verify=true or $verify =  self::verify_bind ( $uid,$trust_type);
		if ($verify) { 
			$interface = $interface;
			$task_info = $t_info;
			$extra_info = $e_info;
			require_once S_ROOT."/payment/".$trust_type."/order.php";
			return $request;
		} else {
			self::notify ( $_K ['siteurl'] . "/index.php?do=user&view=setting&op=account_bind", $_lang['you_not_relation_bind_account_notice'], "error" );
		}
	}
	public static function verify_bind($uid, $bind_type) {
		return db_factory::get_one( sprintf ( " select uid,oauth_id from %switkey_member_oauth where uid = '%d' and source='%s'", TABLEPRE, $uid, $bind_type ) );
	}
	static function output_error($error){
		global $_lang;
		$error_arr = array(
			'WITKEY_TASK_EXIST_ERROR'=>$_lang['witkey_task_exist_error'],
			'WITKEY_RECHARGE_EXIST_ERROR'=>$_lang['witkey_recharge_exist_error'],
			'RECHARGE_INFO_MODIFIED'=>$_lang['recharge_info_modified'],
			'PLATFORM_AUTHORITY_ILLEGAL'=>$_lang['platform_authority_illegal'],
			'WITKEY_RECHARGE_ID_EMPTY'=>$_lang['witkey_recharge_id_empty'],
			'WITKEY_RECHARGE_EMPTY'=>$_lang['witkey_recharge_empty'],
			'WITKEY_TASK_NOT_EXIST'=>$_lang['witkey_task_not_exist'],
			'WITKEY_TRANSFER_NOT_EXIST'=>$_lang['witkey_transfer_not_exist'],
			'WITKEY_TRANSFER_ALREADY_EXIST'=>$_lang['witkey_transfer_already_exist'],
			'WITKEY_AMOUNT_NOT_MATCH'=>$_lang['witkey_amount_not_match'],
			'WITKEY_TASK_LEF_AMOUNT_NOT_ENOUGH'=>$_lang['witkey_task_lef_amount_not_enough'],
			'WITKEY_COUNT_NOT_MATCH'=>$_lang['witkey_count_not_match'],
			'WITKEY_NOT_ALLOW'=>$_lang['witkey_not_allow'],
			'WITKEY_OUTER_TRANSFER_ALREADY_PAID'=>$_lang['witkey_outer_transfer_already_paid'],
			'WITKEY_OUTER_TRANSFER_REPEAT'=>$_lang['witkey_outer_transfer_repeat'],
			'WITKEY_DATA_NOT_MATCH'=>$_lang['witkey_data_not_match'],
			'WITKEY_DATA_VALIDATE_FAILURE'=>$_lang['witkey_data_validate_failure'],
			'BIDDER_EQUALS_TASK_CREATOR_ERROR'=>$_lang['bidder_equals_task_creator_error'],
			'PLATFORM_CREATE_PLATFORM_SHARE_GREATEE_0'=>kekezu::lang('platform_create_platform_share_greatee_0 '),
			'PLATFORM_CREATE_ADDITIONAL_AMOUNT_GREATER_0'=>$_lang['platform_create_additional_amount_greater_0'],
			'PLATFORM_CREATE_COMMISSION_RATE_GREATER_0'=>$_lang['platform_create_commission_rate_greater_0'],
			'ACCOUNT_QUERY_ERROR'=>$_lang['account_query_error'],
			'ACCOUNT_NOT_EXIST'=>$_lang['account_not_exist'],
			'NOT_DONE_OF_TRANSFER_FOUND'=>$_lang['not_done_of_transfer_found'],
			'REMAINS_OF_TASK_AMOUNT_FOUND'=>$_lang['remains_of_task_amount_found'],
			'ILLEGAL_ARGUMENT'=>$_lang['illegal_argument'],
			'ILLEGAL_SIGN'=>$_lang['illegal_sign'],
			'SYSTEM_ERROR'=>$_lang['system_error'],
			'SESSION_TIMEOUT'=>$_lang['session_timeout'],
			'ILLEGAL_PARTNER'=>$_lang['illegal_partner'],
			'HAS_NO_PRIVILEGE'=>$_lang['has_no_privilege'],
			'ILLEGAL_SERIVCE'=>$_lang['illegal_serivce']
		);
	} 
}