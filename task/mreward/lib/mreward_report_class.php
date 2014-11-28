<?php
keke_lang_class::load_lang_class('mreward_report_class');
class mreward_report_class extends keke_report_class {
	public static function get_instance($report_id, $report_info = null, $obj_info = null) {
		static $obj = null;
		if ($obj == null) {
			$obj = new mreward_report_class ( $report_id, $report_info, $obj_info );
		}
		return $obj;
	}
	public function __construct($report_id, $report_info, $obj_info) {
		parent::__construct ( $report_id, $report_info, $obj_info );
		$this->_task_info = $this->get_task_info($this->_report_info['origin_id']);
		$this->_task_obj = new mreward_task_class($this->_task_info);
	}
	function process_report($op_result, $type) {
		global $_lang;
		$op_result = $this->op_result_format ( $op_result );
		$trans_name = $this->get_transrights_name ( $this->_report_info ['report_type'] );
		if($op_result ['action']){
			switch ($op_result ['task']) {
				case 1:
					$this->_task_obj->dispose_task_return();
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 2:
					$prize_date = $this->_task_obj->get_prize_date ();
					$total_prize_count = $prize_date ['count'] ['prize_1'] + $prize_date ['count'] ['prize_2'] + $prize_date ['count'] ['prize_3'];
					$work_num = $this->_task_info ['work_num'];
					$bid_count = db_factory::get_count ( sprintf ( "select count(work_id) as work_count from %switkey_task_work where task_id='%d' and work_status in (1,2,3) ", TABLEPRE, $this->_task_obj->_task_id) );
					if ($bid_count<$total_prize_count) {
						$this->_task_obj->reportAutoChoose ( );
					} else {
						$this->_task_obj->auto_task_return ();
						$this->_task_obj->set_task_status ( 8 );
					}
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 3:
					$this->process_notify ( 'nopass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '3', $op_result, $op_result, $op_result ['result'] ); 
					break;
				case 4:
					$this->shield_work($this->_obj_info ['obj_id']);
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 5:
					$this->cancel_bid ( $this->_obj_info ['obj_id']);
					$prize_date = $this->_task_obj->get_prize_date ();
					$total_prize_count = $prize_date ['count'] ['prize_1'] + $prize_date ['count'] ['prize_2'] + $prize_date ['count'] ['prize_3'];
					$work_num = $this->_task_info ['work_num'];
					$bid_count = db_factory::get_count ( sprintf ( "select count(work_id) as work_count from %switkey_task_work where task_id='%d' and work_status in (1,2,3) ", TABLEPRE, $this->_task_obj->_task_id) );
			        if ($bid_count<$total_prize_count) {
						$this->_task_obj->reportAutoChoose ( );
					} else {
						$this->_task_obj->auto_task_return ();
						$this->_task_obj->set_task_status ( 8 );
					}
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 6:
					$this->disablePeople();
					$this->process_notify('pass',$this->_report_info, $this->_user_info, $this->_to_user_info,$op_result ['process_result']);
					$res=$this->change_status ( $this->_report_id, '4', $op_result,$op_result ['process_result'] ); 
					$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
			}
			if($res){
				kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=report&type=$type", "3","","success" );
			}else{
				kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3","","warning" );
			}
		}
	}
	function process_rights($op_result, $type) {
		return true;
	}
}
?>