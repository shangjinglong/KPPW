<?php
keke_lang_class::load_lang_class ( 'tender_time_class' );
final class tender_time_class extends time_base_class {
	public $_task_obj;
	public $_task_bid_obj;
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->_task_bid_obj = new Keke_witkey_task_bid_class ();
		$this->_task_obj = new Keke_witkey_task_class ();
		$this->task_tbtime_out ();
		$this->task_xbtime_out ();
		$this->task_top_end ();
	}
	function task_tbtime_out() {
		global $_lang;
		$sql = sprintf ( "select * from %switkey_task where model_id = 4 and task_status=2 and " . time () . ">sub_time", TABLEPRE );
		$task_arr = db_factory::query ( $sql );
		foreach ( $task_arr as $k => $v ) { 
			$count = $this->get_task_work ( $v ['task_id'], 0 );
			if ($count) {
				$v_arr = array ($_lang ['username'] => $v ['username'], $_lang ['model_name'] => $_lang ['ptzb'], $_lang ['task_id'] => $v ['task_id'], $_lang ['task_title'] => $v ['task_title'], $_lang ['tb'] => $_lang ['tb'], $_lang ['time'] => date ( 'Y-m-d H:i:s' ) );
				keke_msg_class::notify_user ( $v ['uid'], $v ['username'], 'timeout', $_lang ['tender_notice'], $v_arr );
				$this->set_task_status ( $v ['task_id'], 3 );
			} else {
				$this->set_task_status ( $v ['task_id'], 9 );
				$v_arr = array ($_lang ['username'] => $v ['username'], $_lang ['model_name'] => $_lang ['ptzb'], $_lang ['task_id'] => $v ['task_id'], $_lang ['task_title'] => $v ['task_title'], $_lang ['reason'] => $_lang ['submit_tender_no_witkey_fail'] );
				keke_msg_class::notify_user ( $v ['uid'], $v ['username'], 'task_fail', $_lang ['tender_fail'], $v_arr );
			}
		}
	}
	function task_xbtime_out() {
		global $_lang;
		$sql = sprintf ( "select * from %switkey_task where model_id = 4 and task_status=3 and " . time () . ">end_time", TABLEPRE );
		$task_arr = db_factory::query ( $sql );
		foreach ( $task_arr as $k => $v ) {
			$count = $this->get_task_work ( $v ['task_id'], 4 );
			if ($count) {
				$v_arr = array ($_lang ['username'] => $v ['username'], $_lang ['model_name'] => $_lang ['ptzb'], $_lang ['task_id'] => $v ['task_id'], $_lang ['task_title'] => $v ['task_title'] );
				keke_msg_class::notify_user ( $v ['uid'], $v ['username'], 'task_over', $_lang ['tender_notice'], $v_arr );
				$this->set_task_status ( $v ['task_id'], 5 );
			} else {
				$this->set_task_status ( $v ['task_id'], 9 );
				$task_obj = new dtender_task_class($v);
				$v_arr = array ($_lang ['username'] => $v ['username'], $_lang ['model_name'] => $_lang ['ptzb'], $_lang ['task_id'] => $v ['task_id'], $_lang ['task_title'] => $v ['task_title'], $_lang ['reason'] => $_lang ['choose_tender_no_choose_fail'], 'explain' => '' );
				keke_msg_class::notify_user ( $v ['uid'], $v ['username'], 'task_fail', $_lang ['tender_fail'], $v_arr );
			}
		}
	}
	function get_task_work($task_id, $bid_status) {
		$this->_task_bid_obj->setWhere ( "task_id = $task_id and bid_status = $bid_status" );
		$count = $this->_task_bid_obj->count_keke_witkey_task_bid ();
		if ($count > 0) {
			return $count;
		} else {
			return false;
		}
	}
	function set_task_status($task_id, $task_status) {
		$this->_task_obj->setWhere ( "task_id = $task_id" );
		$this->_task_obj->setTask_status ( $task_status );
		$res = $this->_task_obj->edit_keke_witkey_task ();
		if ($res) {
			return $res;
		} else {
			return false;
		}
	}
	public function task_top_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task a left join %switkey_payitem_record b
				on a.task_id=b.obj_id where a.tasktop=1 and a.model_id = '4' and  b.obj_type='task' and b.end_time < '%s'  ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_obj = new sreward_task_class($v);
				$task_obj->task_top_end ();
			}
		}
	}
}
?>