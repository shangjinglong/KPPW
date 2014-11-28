<?php
keke_lang_class::load_lang_class('service_report_class');
class service_report_class extends keke_report_class {
	public static function get_instance($report_id, $report_info = null, $obj_info = null,$user_info=null,$to_userinfo=null) {
		static $obj = null;
		if ($obj == null) {
			$obj = new service_report_class ( $report_id, $report_info, $obj_info,$user_info,$to_userinfo);
		}
		return $obj;
	}
	public function __construct($report_id, $report_info, $obj_info,$user_info,$to_userinfo) {
		parent::__construct ( $report_id, $report_info, $obj_info,$user_info,$to_userinfo );
	}
	public function process_rights($op_result, $type) {
		$trans_name = $this->get_transrights_name ( $this->_report_type );
		$op_result = $this->op_result_format ( $op_result ); 
		$g_info = $this->user_role ( 'gz' ); 
		$w_info = $this->user_role ( 'wk' ); 
		switch ($op_result ['action']) {
			case "pass" :
				if ($this->_process_can ['sharing']) { 
					$total_cash = floatval ( $this->_obj_info ['cash'] ); 
					$gz_get = floatval ( $op_result ['gz_get'] ); 
					$wk_get = floatval ( $op_result ['wk_get'] ); 
					if ($total_cash != $gz_get + $wk_get) {
						kekezu::admin_show_msg ( $_lang['wain_you_give_cash_error_notice'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3", "", "error" );
					} else {
						$res = keke_finance_class::cash_in ( $g_info ['uid'], $gz_get, 'rights_return' ); 
						$res .= keke_finance_class::cash_in ( $w_info ['uid'], $wk_get, 'rights_return' ); 
						if ($res) {
							$order_info = db_factory::get_one(sprintf("SELECT obj_id FROM `%switkey_report` WHERE obj = 'order' and report_id = %d",TABLEPRE,$this->_report_id));
							db_factory::execute ( sprintf ( "update %switkey_order set `order_status`='close' where order_id = '%d'", TABLEPRE, intval($order_info['obj_id']) ) );
							$this->process_unfreeze ('pass', $op_result ['process_result'] ); 
							$this->change_status ( $this->_report_id, '4',$op_result, $op_result ['process_result'] ); 
						}
					}
					$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3" ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3" );
				} else {
					kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail_and_not_part_cash'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3" );
				}
				break;
			case "nopass" :
				$this->process_unfreeze ('nopass', $op_result ['reply'] ); 
				$res=$this->change_status ( $this->_report_id, '3', $op_result, $op_result ['reply'] ); 
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3" ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3" );
				break;
		}
	}
	public function process_report($op_result, $type) {
		global $_lang;
		$trans_name = $this->get_transrights_name ( $this->_report_type );
		$op_result = $this->op_result_format ( $op_result ); 
		if ($op_result ['action']) {
			if ($op_result ['product_remove'] == 1) { 
				$res=db_factory::execute(sprintf(" update %switkey_service set service_status='3' where service_id='%d'",TABLEPRE,$this->_obj_info['origin_id']));
				$this->process_notify('pass',$this->_report_info, $this->_user_info, $this->_to_user_info,$op_result ['process_result']);
				$this->change_status ( $this->_report_id, '4', $op_result,$op_result ['process_result'] ); 
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=report&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
			}
			if($op_result ['product_remove'] == 2){
				$this->process_notify('nopass',$this->_report_info, $this->_user_info, $this->_to_user_info,$op_result ['process_result']);
				$res=$this->change_status ( $this->_report_id, '3', $op_result,$op_result, $op_result ['reply'] ); 
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
			}
			if($op_result ['product_remove'] == 3){
				$this->disablePeople();
				$this->process_notify('pass',$this->_report_info, $this->_user_info, $this->_to_user_info,$op_result ['process_result']);
				$res=$this->change_status ( $this->_report_id, '4', $op_result,$op_result ['process_result'] ); 
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
			}
		}
	}
}