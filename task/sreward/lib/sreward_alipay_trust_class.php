<?php
class sreward_alipay_trust_class {
	public $_task_id; 
	public $_interface; 
	public $_task_info; 
	public $_model_id; 
	public $_task_config; 
	public $_data; 
	public $_task_url; 
	public $_error;
	function __construct($task_id, $interface = 'create', $data = array()) {
		global $_K;
		$this->_task_id = $task_id;
		$this->_interface = $interface;
		$this->_data = $data;
		$this->_error = $data['error'];
		$this->_task_url = $_K ['siteurl'] . '/index.php?do=task&id=' . $task_id;
		$this->init_config ();
	}
	public function init_config() {
		global $kekezu;
		$sql = " select a.*,b.order_status,b.order_id,d.oauth_id,d.account from %switkey_task a left join
				 %switkey_order_detail c on a.task_id = c.obj_id left join %switkey_order b
				on a.model_id=b.model_id and b.order_id=c.order_id left join %switkey_member_oauth d
				on a.uid=d.uid where a.task_id='%d' and d.source='alipay_trust'";
		$task_info = db_factory::get_one ( sprintf ( $sql, TABLEPRE, TABLEPRE, TABLEPRE, TABLEPRE, $this->_task_id ) );
		$task_info and $task_info ['model_code'] = $kekezu->_model_list [$task_info ['model_id']] ['model_dir'];
		$this->_task_info = $task_info;
		$this->_model_id = $task_info ['model_id'];
		$this->_task_config = unserialize ( $kekezu->_model_list [$task_info ['model_id']] ['config'] );
	}
	function create($is_return = false, $data = null) {
		global $kekezu, $_K, $uid;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false :
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $task_info );
				break;
			case true :
				switch ($this->_data ['is_success']) {
					case "T" :
						$task_obj = sreward_task_class::get_instance ( $task_info );
						$task_obj->dispose_order ( $this->_task_info ['order_id'], true );
						break;
					case "F" : 
						keke_trust_fac_class::notify ( $this->_task_url,keke_trust_fac_class::output_error($this->_error), 'fail', $this->_task_id );
						break;
				}
				break;
		}
	}
	function append($is_return = false, $append_arr = array()) {
		global $_K;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				$extra_info = $append_arr ['data'];
				$extra_info ['type'] = $append_arr ['type'];
				switch ($append_arr ['type']) {
					case "add" : 
						$task_info ['end_time'] += $extra_info ['day'] * 24 * 3600;
						$task_info ['task_cash'] = $extra_info ['cash'];
						break;
					case "tool" : 
						break;
				}
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $task_info, $extra_info );
				break;
			case true : 
				switch ($this->_data ['is_success']) {
					case "T" :
						$response = $this->_data;
						list ( $type, $day, $cash, $order_id ) = explode ( '-', $response ['outer_task_freeze_no'], 4 );
						switch ($type) {
							case "add" : 
								$url = $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id;
								$task_obj = sreward_task_class::get_instance ( $task_info );
								$task_obj->process_can ();
								$task_obj->set_task_delay ( $day, $cash, $url, $output = 'normal', true );
								break;
							case "tool" : 
								break;
						}
						break;
					case "F" :
						keke_trust_fac_class::notify ( $this->_task_url,keke_trust_fac_class::output_error($this->_error), 'fail', $this->_task_id );
						break;
				}
				break;
		}
	}
	function confirm($is_return = false, $data = null) {
		global $_K;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				$sql = " select a.uid,a.work_id,a.username,b.oauth_id,b.account from %switkey_task_work a left join
								%switkey_member_oauth b on a.uid=b.uid where a.task_id='%d' and a.work_id='%d'";
				$work_info = db_factory::get_one ( sprintf ( $sql, TABLEPRE, TABLEPRE, $this->_task_id, $data ['work_id'] ) );
				$cash = $task_info ['task_cash'] * (1 - $task_info ['profit_rate'] / 100);
				$extra_info [] = array ($work_info ['work_id'], $cash, $work_info ['oauth_id'], $work_info ['username'] );
				$data['is_auto_bid'] or $task_info ['sp_end_time'] = $this->_task_config ['notice_period'] * 24 * 3600 + time ();
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $task_info, $extra_info );
				break;
			case true : 
				$bidder_info = $this->_data ['confirmed_bidders'] ['bidder'];
				switch ($bidder_info ['transfer_status']) {
					case "W":
						$agree_id = db_factory::get_count(sprintf(" select agree_id from %switkey_agreement where task_id='%d' and work_id='%d'",TABLEPRE,$this->_task_id,$bidder_info ['outer_transfer_no']));
						$jump_url = $_K['siteurl']."/index.php?do=agreement&agree_id=".$agree_id;
						$agree_obj = sreward_task_agreement::get_instance($agree_id);
						$agree_obj->accept_confirm($jump_url,'normal',true);
						break;
					case "I" :
						$task_obj = sreward_task_class::get_instance ( $task_info );
						$task_obj->process_can ();
						$work_id = $bidder_info ['outer_transfer_no']; 
						$task_obj->work_choose ( $work_id, "4", $this->_task_url, $output = 'normal', true );
						break;
					case "F" :
						keke_trust_fac_class::notify ( $this->_task_url,keke_trust_fac_class::output_error($this->_error), 'fail', $this->_task_id );
						break;
				}
				break;
		}
	}
	function pt_pay($is_return = false, $data = array()) {
		global $_K;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $this->_task_info );
				break;
			case true : 
				switch ($this->_data ['is_success']) {
					case "T" :
						break;
					case "F" :
						keke_trust_fac_class::notify ( $this->_task_url,keke_trust_fac_class::output_error($this->_error), 'fail', $this->_task_id );
						break;
				}
				break;
		}
	}
	function pt_confirm($is_return = false, $work_id = null) {
		global $_K;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				$extra_info [] = array ($work_id );
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $this->_task_info, $extra_info );
				break;
			case true : 
				switch ($this->_data ['is_success']) {
					case "T" :
						$agree_id = db_factory::get_count ( sprintf ( " select agree_id from %switkey_agreement where task_id='%d'", TABLEPRE, $this->_task_id ) );
						$agree_obj = sreward_task_agreement::get_instance ( $agree_id );
						$url = $_K ['siteurl'] . "/index.php?do=agreement&agree_id=" . $agree_id . "&step=step3";
						$res = $agree_obj->accept_confirm ( $url, 'json', true );
						break;
					case "F" :
						return false;
					break;
				}
				break;
		}
	}
	function pt_cancel($is_return = false, $work_ids = null) {
		global $_K, $kekezu;
		global $_lang;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				$extra_info[] =explode(",",$work_ids);
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $this->_task_info, $extra_info );
				break;
			case true : 
				switch($this->_data['is_success']){
					case "T":
						$work_id = $this->_data['cancel_transfer_detail'];
						$sql     = " select a.report_id from %switkey_report a left join %switkey_task_work b 
									 on a.obj_id=b.work_id and a.origin_id=b.task_id where work_status='4' and work_id='%d' and task_id='%d'";
						$report_id = db_factory::get_count(sprintf($sql,TABLEPRE,TABLEPRE,$work_id,$this->_task_id));
						$report_obj = sreward_report_class::get_instance($report_id);
						$op_result['action']='pass';
						$op_result['cancel_bid']=1;
						$report_obj->process_report($op_result,'report',true);
						break;
					case "F":
						kekezu::admin_show_msg($_lang['operate_notice'],"index.php?do=model&view=list&model_id=1",3,$_lang['report_deal_fail']);
						break;
				}
				break;
		}
	}
	function pt_refund($is_return = false, $data_detail = array()) {
		global $_K;
		$task_info = $this->_task_info;
		switch ($is_return) {
			case false : 
				$extra_info ['refund_detail'] = $data_detail ['refund'];
				$extra_info ['platform_detail'] = $data_detail ['platform'];
				$extra_info ['transfer_detail'] = $data_detail ['transfer'];
				return keke_trust_fac_class::redirect_to_alipay ( $this->_interface, 'alipay_trust', $this->_task_info, $extra_info );
				break;
			case true : 
				switch ($this->_data ['refund_detail'] ['transfer_status']) { 
					case "W" :
						$task_obj = sreward_task_class::get_instance ( $this->_task_info );
						if($this->_task_info['task_status']=='9'){
							$res = $task_obj->dispose_task_return ( true );
						}
						break;
					case "F" :
						keke_trust_fac_class::notify ( $this->_task_url,keke_trust_fac_class::output_error($this->_error), 'fail', $this->_task_id );
						break;
				}
				break;
		}
	}
}