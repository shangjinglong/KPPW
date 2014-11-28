<?php
final class mreward_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->task_tg_timeout();
		$this->task_xg_timeout();
		$this->task_gs_timeout ();
		$this->task_top_end ();
	}
	function  task_tg_timeout(){
		$task_tg = db_factory::query(sprintf("select * from %switkey_task where model_id=2 and task_status=2 and '%d' > sub_time",TABLEPRE,time()));
		if(is_array($task_tg)){
			foreach ($task_tg as $k=>$v)  {
				$task_tg_obj = new mreward_task_class($v);
				$task_tg_obj->task_tg_timeout();
			}
		}
	}
	function task_xg_timeout() {
		$task_xg = db_factory::query(sprintf("select * from %switkey_task where model_id=2 and task_status=3 and '%d' > end_time",TABLEPRE,time()));
		if(is_array($task_xg)){
		foreach ( $task_xg as $k => $v ) {
			$task_xg_obj = new mreward_task_class($v);
			$task_xg_obj->task_xg_timeout ();
		 }
		}
	}
	function task_gs_timeout() {
		$task_gs = db_factory::query(sprintf("select * from %switkey_task where model_id=2 and task_status=5 and '%d' > sp_end_time",TABLEPRE,time()));
		if(is_array($task_gs)){
		foreach ( $task_gs as $k => $v ) {
			$task_gs_obj = new mreward_task_class( $v );
			$task_gs_obj->task_gs_timeout ();
		}
		}
	}
	public function task_top_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task a left join %switkey_payitem_record b
				on a.task_id=b.obj_id where a.tasktop=1 and a.model_id = '2' and  b.obj_type='task' and b.end_time < '%s'  ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_obj = new sreward_task_class($v);
				$task_obj->task_top_end ();
			}
		}
	}
}
?>