<?php
keke_lang_class::load_lang_class('keke_auth_mobile_class');
class keke_auth_mobile_class extends keke_auth_base_class{
	public static function get_instance($code='mobile') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_mobile_class($code);
		}
		return $obj;
	}
	public function __construct($code='mobile') {
		parent::__construct($code);
		$this->_primary_key     ='mobile_a_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($step=null,$auth_info=array()){
		if($step){
			$step=$step;
		}elseif($auth_info){
			$auth_info['auth_status'] and $step="step3" or $step="step2";
		}else {
			$step='step1';
		}
		return $step;
	}
	public function add_auth($data,$file_name = '') {
		global $kekezu,$user_info,$_lang;
		$moblie_obj = new Keke_witkey_auth_mobile_class();
		$fdata=$this->format_auth_apply($data);
		$valid_code = kekezu::randomkeys(4);
		$fdata['valid_code'] = $valid_code;
		$fdata[auth_time]=time();
		$msg_obj = new keke_msg_class();
		$content = $_lang['dear'].$user_info['username'].$_lang['hello'].$_lang['mobile_auth_code']." {$fdata['valid_code']}   ".$_lang['from']."[{$kekezu->_sys_config[website_url]}]";
		$msg_res = $msg_obj->send_phone_sms($fdata['mobile'],$content);
		if($msg_res=="操作成功"){
			$auth_info = db_factory::get_one(sprintf("select * from %switkey_auth_mobile where uid='%d'",TABLEPRE,$user_info['uid']));
			if($auth_info){
				$moblie_obj->setWhere('uid='.$fdata['uid']);
				$moblie_obj->setMobile($fdata[mobile]);
				$moblie_obj->setValid_code($fdata['valid_code']);
				$moblie_obj->setAuth_status(0);
				$moblie_obj->edit_keke_witkey_auth_mobile();
			}else{
				$moblie_obj->setUid($fdata[uid]);
				$moblie_obj->setMobile($fdata[mobile]);
				$moblie_obj->setValid_code($fdata['valid_code']);
				$moblie_obj->setUsername($fdata[username]);
				$moblie_obj->setCash($fdata[cash]);
				$moblie_obj->setAuth_time($fdata[auth_time]);
				$moblie_obj->setAuth_status(0);
				$moblie_obj->create_keke_witkey_auth_mobile();
			}
			db_factory::execute(" update ".TABLEPRE."witkey_space set mobile='$fdata[mobile]' where uid = '$fdata[uid]' ");
			$fdata['start_time']==$fdata['end_time'] and $end_time=$fdata['end_time'] or $end_time=0;
			$res = $this->add_auth_record($fdata['uid'], $fdata['username'], $this->_auth_code,$end_time,0);
			parse_str($_SERVER['QUERY_STRING'],$arr);
			$arr[auth_step]="step2";
			unset($arr['inajax']);
			return true;
		}
		return false;
	}
	public function valid_auth($data){
		global $kekezu,$user_info,$_lang;
		$uid = $user_info['uid'];
		$mobile_obj = new Keke_witkey_auth_mobile_class();
		$mobile_obj->setWhere('uid='.$user_info[uid]);
		$mobile_info = $mobile_obj->query_keke_witkey_auth_mobile();
		$mobile_info = $mobile_info[0];
		$valid_code = $mobile_info[valid_code];
		if($data['valid_code'] == $valid_code){
			$end_time = time();
			$this->set_auth_record_status($mobile_info['uid'], 1);
			$mobile_obj->setWhere('uid='.$user_info[uid]);
			$mobile_obj->setEnd_time($end_time);
			$mobile_obj->setAuth_status(1);
			$res2 = $mobile_obj->edit_keke_witkey_auth_mobile();
			parse_str($_SERVER['HTTP_REFERER'],$arr);
			$url = str_ireplace('step2', 'step3', $_SERVER['HTTP_REFERER']);
			if($res2){
				$objProm = keke_prom_class::get_instance ();
				$objProm->dispose_prom_event('reg',$uid,$uid);
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
	}
}