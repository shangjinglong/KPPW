<?php
class tender_release_class extends keke_task_release_class {
	public $_cash_cove; 
	public static function get_instance($model_id,$pub_mode='professional') {
		static $obj = null;
		if ($obj == null) {
			$obj = new tender_release_class ( $model_id,$pub_mode);
		}
		return $obj;
	}
	function __construct($model_id,$pub_mode='professional') {
		parent::__construct ( $model_id,$pub_mode);
		$this->get_task_config();
		$this->priv_init();
		$this->cash_cove_init();
	}	
	public function get_task_config() {
		global $model_list;
		$this->_task_config = $model_list [$this->_model_id] ['config'] ? unserialize ( $model_list [$this->_model_id] ['config'] ) : null;
	}
	public function cash_cove_init(){
		global $kekezu;
		$this->_cash_cove = $kekezu->get_cash_cove();
	}
	function pub_mode_init($std_cache_name, $data = array()) {
		global $kekezu;
		global $_lang;
		$release_info = $this->_std_obj->_release_info;
		switch ($this->_pub_mode) {
			case "professional" :
				break;
			case "guide" :
				break;
			case "onekey" :
				if (! $release_info) {
					$sql = " select model_id,task_title,task_desc,indus_id,indus_pid,
						task_cash_coverage,start_time,end_time,contact from %switkey_task where task_id='%d' and model_id='%d'";
					$task_info = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $data ['t_id'] ,$this->_model_id));
					$task_info or kekezu::show_msg($_lang['operate_notice'],$_SERVER['HTTP_REFERER'],3,$_lang['not_exsist_relation_task_and_not_user_onekey'],"warning");
					$release_info = $this->onekey_mode_format($task_info);
					$allow_time = $task_info['end_time']-$task_info['start_time'];
					$task_day   = date('Y-m-d',$allow_time+time());
					$release_info ['txt_task_day'] = $task_day;
					$release_info ['task_cash_cove'] = $task_info ['task_cash_coverage'];
					$this->save_task_obj ( $release_info, $std_cache_name ); 
				}
				break;
		}
	}
	public function priv_init() {
		$priv_arr = tender_priv_class::get_priv ('',$this->_model_id, $this->_user_info, '2' );
		$this->_priv = $priv_arr ['pub'];
	}
	public function pub_task() {
		$release_info =kekezu::k_input($this->_std_obj->_release_info);
		$task_obj = $this->_task_obj;  
		$this->public_pubtask();
		$cash_cove = $this->_cash_cove;
		$cove = $cash_cove [$release_info['task_cash_cove']];
		$task_cash = $cove ['end_cove'];
		$task_cash or $task_cash = $cove ['start_cove'];
		$task_obj->setTask_cash ( $task_cash );
		$task_obj->setTask_cash_coverage($release_info['task_cash_cove']); 
		$task_id = $task_obj->create_keke_witkey_task (); 
		return $task_id;
	} 
}
?>