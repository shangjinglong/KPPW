<?php
class preward_wap_release_class extends wap_release_class {
	public static function get_instance($model_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new preward_wap_release_class ( $model_id );
		}
		return $obj;
	}
	function __construct($model_id, $pub_mode = 'professional') {
		parent::__construct ( $model_id, $pub_mode );
		$this->get_task_config (); 
		$this->priv_init ();
	}
	public function priv_init() {
		$priv_arr = 	preward_priv_class::get_priv ( '', $this->_model_id, $this->_user_info, '2' );
		$this->_priv = $priv_arr ['pub'];
	}
	public function get_task_config() {
		global $model_list;
		$model_list [$this->_model_id] ['config'] and $this->_task_config = unserialize ( $model_list [$this->_model_id] ['config'] ) or $this->_task_config = array ();
	}
	public function wap_release() {
		$task_obj = $this->_task_obj;
		$_D = $_REQUEST;
		$this->wap_public ();
		$task_obj->setSingle_cash($_D['single_cash']);
		$task_obj->setWork_count($_D['work_count']);
		$this->set_task_status ( $this->get_total_cash ( $_D ['task_cash'] ), $_D ['task_cash'] );
		$task_id = $task_obj->create_keke_witkey_task (); 
		if ($task_id) { 
			$t = $this->wap_update ( $task_id );
		} 
		if ($t [0] == 'success') {
			$s = 1;
		} else {
			$msg = array ('r' => $t [1] );
			$s = 0;
		}
		kekezu::echojson ( $msg, $s,$task_id );
		die ();
	}
}