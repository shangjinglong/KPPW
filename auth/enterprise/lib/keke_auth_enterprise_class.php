<?php
keke_lang_class::load_lang_class('keke_auth_enterprise_class');
class keke_auth_enterprise_class extends keke_auth_base_class{
	public static function get_instance($code='enterprise') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_enterprise_class($code);
		}
		return $obj;
	}
	public function __construct($code='enterprise') {
		parent::__construct($code);
		$this->_primary_key     ='enterprise_auth_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($step=null,$auth_info=array()){
		if($step){
			$step=$step;
		}elseif($auth_info){
			$auth_status = intval($auth_info['auth_status']);
			if($auth_status==0){
				$step = 'step2';
			}elseif($auth_status==2 or $auth_status==1){
				$step="step3";
			}
		}else{
			$step='step1';
		}
		return $step;
	}
	public function add_auth($data,$file_name = '') {
		global $kekezu,$user_info,$_lang;
		$data=$this->format_auth_apply($data);
			$auth_info=$this->get_user_auth_info($user_info[uid]);
			if($auth_info){
				$success=$this->_tab_obj->save($data,array($this->_primary_key=>$auth_info[$this->_primary_key]));
				$this->set_auth_record_status($user_info['uid'], '0');
				db_factory::execute(sprintf(" update %switkey_space set user_type='2' where uid='%d'",TABLEPRE,$auth_info[uid]));
			}else{
				$success=$this->_tab_obj->save($data);
			}
		if ($success) {
			$data['start_time']==$data['end_time'] and $end_time=$data['end_time'] or $end_time=0;
			$this->add_auth_record($data['uid'], $data['username'], $this->_auth_code,$end_time);
			return true;
			}
		return false;
	}
}
?>