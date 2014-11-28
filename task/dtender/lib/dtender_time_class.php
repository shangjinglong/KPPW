<?php
final class dtender_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->task_hand_end();
		$this->task_tg_end();
		$this->plan_confirm_end();
		$this->task_top_end ();
	}
	public function task_hand_end() {
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=2 and sub_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_tb_timeout();
			}
		}
	}
	public  function task_tg_end(){
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=4 and sp_end_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_tg_timeout();
			}
		}
	}
	function task_choose_end() {
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=3 and end_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_xb_timeout();
			}
		}
	}
	function plan_confirm_end(){
		$sql = "select a.* from %switkey_task a left join %switkey_task_plan b on a.task_id=b.task_id where a.task_status=6 and b.plan_status=1 and b.over_time<'%s' and a.model_id=5 ";
		$task_list = db_factory::query(sprintf($sql,TABLEPRE,TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_confirm_timeout();
			}
		}
	}
	function task_finish_auto_mark(){
		$nomark_wk_list = db_factory::query(sprintf('select `mark_id` from %switkey_mark where model_code="%s" and mark_status=0 and mark_max_time<%d and mark_type=1',TABLEPRE,'dtender',time()));
		if(is_array($nomark_wk_list)){
			foreach ($nomark_wk_list as $v){
				keke_user_mark_class::exec_mark_process($v['mark_id'], "系统自动好评",1,"4,5","5.0,5.0");
			}
		}
		$nomark_gz_list = db_factory::query(sprintf('select `mark_id` from %switkey_mark where model_code="%s" and mark_status=0 and mark_max_time<%d and mark_type=2',TABLEPRE,'dtender',time()));
		if(is_array($nomark_gz_list)){
			foreach ($nomark_gz_list as $v){
				keke_user_mark_class::exec_mark_process($v['mark_id'], "系统自动好评",1,"1,2,3","5.0,5.0,5.0");
			}
		}
	}
	public function task_top_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task a left join %switkey_payitem_record b
				on a.task_id=b.obj_id where a.tasktop=1 and a.model_id = '5' and  b.obj_type='task' and b.end_time < '%s'  ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_obj = new sreward_task_class($v);
				$task_obj->task_top_end ();
			}
		}
	}
}
?>