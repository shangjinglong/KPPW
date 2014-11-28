<?php
class mreward_priv_class extends keke_privission_class{
	public static function get_instance($model_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new mreward_priv_class($model_id);
		}
		return $obj;
	}
	public function __construct($model_id){
		parent::__construct($model_id);
	}
	public static function get_priv($task_id,$mode_id,$user_info,$role='1') {
		return parent::get_priv($task_id,$mode_id, $user_info,$role);
	}
}