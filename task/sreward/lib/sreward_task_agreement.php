<?php
keke_lang_class::load_lang_class ( 'sreward_task_agreement' );
class sreward_task_agreement extends keke_task_agreement {
	protected $_inited = false;
	public static function get_instance($agree_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new sreward_task_agreement ( $agree_id );
		}
		return $obj;
	}
	public function __construct($agree_id) {
		parent::__construct ( $agree_id );
	}
	public function process_can() {
		global $uid;
		$agree_status = $this->_agree_status; 
		$buyer_status = $this->_buyer_status; 
		$seller_status = $this->_seller_status; 
		$buyer_uid = $this->_buyer_uid; 
		$seller_uid = $this->_seller_uid; 
		$process_arr = array ();
		if ($uid == $buyer_uid || $uid == $seller_uid) {
			switch ($agree_status) {
				case "1" : 
					$uid == $buyer_uid && $buyer_status == '1' and $process_arr ['buyer_sign'] = true;
					$uid == $seller_uid && $seller_status == '1' and $process_arr ['seller_sign'] = true;
					break;
				case "2" : 
					$process_arr ['rights'] = true; 
					if ($uid == $seller_uid && $seller_status == '2') { 
						$process_arr ['upload'] = true;
					}
					if ($uid == $buyer_uid && $seller_status == '3') { 
						$process_arr ['confirm'] = true;
					}
					if ($uid == $seller_uid || ($uid == $buyer_uid && $buyer_status == '3')) { 
						$process_arr ['download'] = true;
					}
					break;
				case "3" : 
					$process_arr ['mark'] = true;
					break;
			}
		}
		return $process_arr;
	}
	public function dispose_task() {
		global $kekezu, $_lang;
		$prom_obj = $objProm = keke_prom_class::get_instance ();;
		$model_code = $this->_model_code; 
		$agree_info = $this->_agree_info;
		$cash_info = db_factory::get_one ( sprintf ( " select task_cash,task_union,real_cash from %switkey_task where task_id = '%d'", TABLEPRE, $this->_task_id ) );
		$this->plus_mark_num ();
		keke_user_mark_class::create_mark_log ( $model_code, '1', $agree_info ['seller_uid'], $agree_info ['buyer_uid'], $agree_info ['work_id'], $cash_info ['task_cash'], $this->_task_id, $this->_seller_username, $this->_buyer_username );
		keke_user_mark_class::create_mark_log ( $model_code, '2', $agree_info ['buyer_uid'], $agree_info ['seller_uid'], $agree_info ['work_id'], $cash_info ['real_cash'], $this->_task_id, $this->_buyer_username, $this->_seller_username );
		$site_profit = $cash_info ['task_cash'] - $cash_info ['real_cash']; 
		$task_title = db_factory::get_count ( sprintf ( " select task_title from %switkey_task where task_id='%d'", TABLEPRE, $this->_task_id ) );
		$data = array (':task_id' => $this->_task_id, ':task_title' => $task_title );
		keke_finance_class::init_mem ( 'task_bid', $data );
		keke_finance_class::cash_in ( $agree_info ['seller_uid'], $cash_info ['real_cash'], 'task_bid', '', 'task', $this->_task_id, $site_profit ); 
		$feed_arr = array ("feed_username" => array ("content" => $this->_seller_uid, "url" => "index.php?do=seller&id={$this->_seller_uid}" ), "action" => array ("content" => $_lang ['success_bid_haved'], "url" => "" ), "event" => array ("content" => $task_title, "url" => "index.php?do=task&id=$this->_task_id", 'cash' => $cash_info ['real_cash'] ) );
		kekezu::save_feed ( $feed_arr, $this->_seller_uid, $this->_seller_username, 'work_accept', $this->_task_id );
		$prom_obj->dispose_prom_event ( "bid_task", $agree_info ['seller_uid'], $this->_task_id );
		$prom_obj->dispose_prom_event ( "pub_task", $agree_info ['buyer_uid'], $this->_task_id );
	}
	public function agreement_stage_list($user_type = '1') {
		global $_lang;
		$buyer_status = $this->_buyer_status; 
		$seller_status = $this->_seller_status; 
		$agree_status = $this->_agree_status; 
		$agree_info = $this->_agree_info; 
		$stage_list = array ();
		switch ($user_type) {
			case "1" : 
				if (in_array ( $seller_status, array ('2', '3', '4' ) )) { 
					if ($buyer_status == '1') { 
						$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						$stage_list [] = array ('msg_warn', 'waring', $_lang ['wain_each_not_agree_and_wait_jf'] );
					} else {
						if ($agree_info ['buyer_accepttime'] >= $agree_info ['seller_accepttime']) { 
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_accepttime'] ) . $_lang ['agree_jf_agreement'] );
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						} else {
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_accepttime'] ) . $_lang ['agree_jf_agreement'] );
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						}
						if ($agree_info ['seller_confirmtime']) { 
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_confirmtime'] ) . $_lang ['confirm_jf_resource_file'] );
							if ($agree_info ['buyer_confirmtime']) { 
								$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_confirmtime'] ) . $_lang ['confirm_recept_resource_file'] );
							} else { 
								$stage_list [] = array ('msg_tips', 'info', $_lang ['waiting_each_confirm_jf_resource_file'] );
							}
						}
					}
				}
				break;
			case "2" : 
				if (in_array ( $buyer_status, array ('2', '3', '4' ) )) { 
					if ($seller_status == '1') { 
						$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						$stage_list [] = array ('msg_warn', 'waring', $_lang ['wain_each_not_agree_and_wait_jf'] );
					} else {
						if ($agree_info ['seller_accepttime'] >= $agree_info ['buyer_accepttime']) { 
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_accepttime'] ) . $_lang ['agree_jf_agreement'] );
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						} else {
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_accepttime'] ) . $_lang ['agree_jf_agreement'] );
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_accepttime'] ) . $_lang ['agree_jf_agreement'] );
						}
						if ($agree_info ['seller_confirmtime']) { 
							$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_each_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['seller_confirmtime'] ) . $_lang ['confirm_jf_resource_file'] );
							if ($agree_info ['buyer_confirmtime']) { 
								$stage_list [] = array ('msg_ok', 'successful', $_lang ['congratulate_you_yu'] . date ( 'Y-m-d H:i:s', $agree_info ['buyer_confirmtime'] ) . $_lang ['confirm_recept_resource_file'] );
							}
						} else {
							$stage_list [] = array ('msg_tips', 'info', $_lang ['waiting_each_confirm_jf_resource_file'] );
						}
					}
				}
				break;
		}
		return $stage_list;
	}
	public function stage_access_check($user_type = '1') {
		$agree_status = $this->_agree_status; 
		$buyer_status = $this->_buyer_status; 
		$seller_status = $this->_seller_status; 
		switch ($agree_status) {
			case "1" :
				if ($buyer_status == '1' && $seller_status == '1') { 
					$step = 'step1';
				} elseif ($buyer_status == '1' && $seller_status == '2') { 
					$user_type == '1' and $step = 'step2' or $step = 'step1';
				} elseif ($buyer_status == '2' && $seller_status == '1') { 
					$user_type == '2' and $step = 'step2' or $step = 'step1';
				}
				break;
			case "2" :
				if($buyer_status == '3' && $seller_status == '3'){
					$step = 'step3';
				}else{
					$step = 'step2';
				}
				break;
			case "3" :
				if($buyer_status == '4' && $seller_status == '4'){
					$step = 'step4';
				}else{
					$step = 'step3';
				}
				break;
			case "4" :
				$step = 'step4';
				break;
		}
		return $step;
	}
	public function agreement_stage_nav() {
		global $_lang;
		return array ("1" => array ("step1", $_lang ['read_hand_work_agreement'], $_lang ['each_agree_agreement_start_jf'] ), "2" => array ("step2", $_lang ['recept_resource_file'], $_lang ['bid_work_to_pub_name'] ), "3" => array ("step3", $_lang ['complete_file_jf'], $_lang ['work_resource_file_complete'] ), "4" => array ("step4", "交付过程冻结", "交付超时，系统冻结" ) );
	}
	public function get_buyer_status() {
		global $_lang;
		return array ("1" => $_lang ['wait_agreement'], "2" => $_lang ['wait_resource_file_upload'], "3" => $_lang ['confirm_recept_source_file'], "4" => $_lang ['each_mark'], "5" => $_lang ['jf_complete'] );
	}
	public function get_seller_status() {
		global $_lang;
		return array ("1" => $_lang ['wait_agreement'], "2" => $_lang ['confirm_resource_file_upload'], "3" => $_lang ['wait_resource_file_recept'], "4" => $_lang ['each_mark'], "5" => $_lang ['jf_complete'] );
	}
}