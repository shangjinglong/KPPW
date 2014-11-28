<?php
keke_lang_class::load_lang_class('keke_auth_realname_class');
class keke_auth_realname_class extends keke_auth_base_class{
	public static function get_instance($code='realname') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_realname_class($code);
		}
		return $obj;
	}
	public function __construct($code='realname') {
		parent::__construct($code);
		$this->_primary_key     ='realname_a_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($step=null,$arrAuthInfo=array()){
		 if($step){
			$step=$step;
		}elseif($arrAuthInfo){
			$arrAuthInfo['auth_status'] and $step="step3" or $step="step2";
		}else{
			$step='step1';
		}
		return $step;
	}
	public function add_auth($data,$is_jump=true) {
		global $kekezu,$user_info,$_lang;
			$data=$this->format_auth_apply($data);
			$arrAuthInfo=$this->get_user_auth_info($user_info[uid]);
			if($arrAuthInfo){
				$success=$this->_tab_obj->save($data,array($this->_primary_key=>$arrAuthInfo[$this->_primary_key]));
				$this->set_auth_record_status($user_info['uid'], '0');
			}else{
				$success=$this->_tab_obj->save($data);
			}
		if ($success) {
			db_factory::execute(sprintf(" update %switkey_space set truename='%s',idcard='%s' where uid ='%d'",TABLEPRE,$data[realname],$data[id_card],$data[uid]));
			$data['cash'] > 0 and keke_finance_class::cash_out ($data['uid'],$data ['cash'],$this->_auth_name, $data ['cash'], $this->_auth_name, $success );
			$data['start_time']==$data['end_time'] and $end_time=$data['end_time'] or $end_time=0;
			$this->add_auth_record($data['uid'], $data['username'], $this->_auth_code,$end_time);
			return true;
		}
		return false;
	}
}
?>