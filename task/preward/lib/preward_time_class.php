<?php
final class preward_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->task_hand_end();
		$this->task_choose_end();
		$this->task_top_end();
	}
	public function task_hand_end() {
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=2 and sub_time<'%s' and model_id=3",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new preward_task_class($v);
				$task_obj->task_jg_timeout();
			}
		}
	}
	function task_choose_end() {
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=3 and end_time<'%s' and model_id=3",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new preward_task_class($v);
				$task_obj->task_xg_timeout();
			}
		}
	}
	public function task_top_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task a left join %switkey_payitem_record b
				on a.task_id=b.obj_id where a.tasktop=1 and a.model_id = '3' and  b.obj_type='task' and b.end_time < '%s'  ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_obj = new sreward_task_class($v);
				$task_obj->task_top_end ();
			}
		}
	}
}
?>