<?php
keke_lang_class::load_lang_class('preward_release_class');
class preward_release_class extends keke_task_release_class {
	public static function get_instance($model_id,$pub_mode='professional') {
		static $obj = null;
		if ($obj == null) {
			$obj = new preward_release_class ( $model_id,$pub_mode);
		}
		return $obj;
	}
	function __construct($model_id,$pub_mode='professional') {
		parent::__construct ( $model_id,$pub_mode);
		$this->get_task_config ();
		$this->_std_obj->_release_info['txt_task_cash'] and $cash = $this->_std_obj->_release_info['txt_task_cash'] or $cash=$this->_task_config['min_cash'];
		$this->_default_max_day = keke_task_release_class::get_default_max_day($cash, $model_id,$this->_task_config['min_day']);
		$this->priv_init();
	}
	public function priv_init() {
		$priv_arr = preward_priv_class::get_priv ('',$this->_model_id, $this->_user_info, '2' );
		$this->_priv = $priv_arr ['pub'];
	}
	public function get_defalut_max_day(){
		$std_obj = $this->_std_obj;
		$task_cash = intval($std_obj->_release_info['txt_task_cash']);
		return kekezu::get_show_day($task_cash,$this->_model_id);
	}
	public function get_task_config() {
		global $model_list;
		$model_list [$this->_model_id] ['config'] and $this->_task_config = unserialize ( $model_list [$this->_model_id] ['config'] ) or $this->_task_config = array ();
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
						task_cash,work_count,single_cash,contact from %switkey_task where task_id='%d' and model_id='%d'";
					$task_info = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $data ['t_id'] ,$this->_model_id));
					$task_info or kekezu::show_msg($_lang['operate_notice'],$_SERVER['HTTP_REFERER'],3,$_lang['not_exsist_relation_task_and_not_user_onekey'],"warning");
					$release_info = $this->onekey_mode_format($task_info);
					$allow_time = $kekezu->get_show_day ( $task_info['task_cash'], $this->_model_id );
					$task_day   = date('Y-m-d',$allow_time*24*3600+time());
					$release_info ['txt_task_day'] = $task_day;
					$release_info ['txt_task_cash'] = intval ( $task_info ['task_cash'] );
					$release_info ['txt_work_count'] = intval ( $task_info ['work_count'] );
					$release_info ['txt_single_cash'] = intval ( $task_info ['single_cash'] );
					$this->save_task_obj ( $release_info, $std_cache_name ); 
				}
				break;
		}
	}
	public function get_max_day($task_cash) {
		global $kekezu;
		global $_lang;
		if ($task_cash >= $this->_task_config ['min_cash']) {
			$time = keke_task_release_class::get_default_max_day($task_cash, $this->_model_id,$this->_task_config['min_day']);
			kekezu::echojson ( $time, 1 ,$time);
		} else {
			kekezu::echojson ( $_lang['task_min_cash_limit_notice'] . $this->_task_config ['min_cash'], 0 );
			die ();
		}
	}
	public function getMaxDay($taskCash) {
		if ($taskCash >= $this->_task_config ['min_cash']) { 
			return keke_task_release_class::get_default_max_day ( $taskCash, $this->_model_id, $this->_task_config ['min_day'] );
		} else { 
			return false;
		}
	}
	public function pub_task() {
		$task_obj = $this->_task_obj;
		$std_obj = $this->_std_obj;
		$this->public_pubtask();
		$task_obj->setSingle_cash($std_obj->_release_info['txt_single_cash']);
		$task_obj->setWork_count($std_obj->_release_info['txt_work_count']);
		$task_id = $task_obj->create_keke_witkey_task ();
		return $task_id;
	}
}