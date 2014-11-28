<?php
keke_lang_class::load_lang_class('tender_report_class');
class tender_report_class extends keke_report_class {
	public static function get_instance($report_id, $report_info = null, $obj_info = null) {
		static $obj = null;
		if ($obj == null) {
			$obj = new tender_report_class ( $report_id, $report_info, $obj_info );
		}
		return $obj;
	}
	public function __construct($report_id, $report_info, $obj_info) {
		parent::__construct ( $report_id, $report_info, $obj_info );
		$this->_task_info = $this->get_task_info($this->_report_info['origin_id']);
		$this->_task_obj = new tender_task_class($this->_task_info);
	}
	function process_report($op_result, $type) {
		global $_lang;
		$op_result = $this->op_result_format ( $op_result );
		$trans_name = $this->get_transrights_name ( $this->_report_info ['report_type'] );
		if($op_result ['action']){
			switch ($op_result ['task']) {
				case 1:
						$this->_task_obj->set_task_status(9);
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 2:
					kekezu::admin_show_msg ( '操作提示', "index.php?do=trans&view=report&type=$type", "3","该任务不能进行此操作");
					break;
				case 3:
					$this->process_notify ( 'nopass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '3', $op_result, $op_result, $op_result ['result'] ); 
					break;
				case 4:
					$res = $this->shield_work($this->_obj_info ['obj_id']);
					$this->_task_obj->set_task_status(2);
					$this->process_notify ( 'pass', $this->_report_info, $this->_user_info, $this->_to_user_info, $op_result ['result'] ); 
					$res = $this->change_status ( $this->_report_id, '4', $op_result, $op_result ['result'] ); 
					break;
				case 5:
					$this->cancel_bid( $this->_obj_info ['obj_id']);
					$this->_task_obj->set_task_status(2);
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