<?php
keke_lang_class::load_lang_class ( 'dtender_task_class' );
class dtender_task_class extends keke_task_class {
	public $_task_status_arr;
	public $_work_status_arr;
	public $_task_url;
	public $_bid_info;
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new dtender_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		global $_K;
		parent::__construct ( $task_info );
		$this->_task_url = "<a href=\"$_K[siteurl]/index.php?do=task&id=$this->_task_id\">$this->_task_title</a>";
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
			$this->bid_init ();
			$this->wiki_priv_init ();
			$this->mark_init ();
		}
		$this->_inited = true;
	}
	public function mark_init() {
		$m = $this->get_mark_count_ext ();
		$t = $this->_task_info;
		$t ['mark'] ['all'] = intval ( $m [1] ['c'] + $m [2] ['c'] );
		$t ['mark'] ['master'] = intval ( $m [2] ['c'] );
		$t ['mark'] ['wiki'] = intval ( $m [1] ['c'] );
		$this->_task_info = $t;
	}
	public function status_init() {
		$this->_task_status_arr = $this->get_task_status ();
		$this->_work_status_arr = $this->get_work_status ();
	}
	public function bid_init() {
		if ($this->_task_status >= 4) {
			$this->_bid_info = db_factory::get_one ( sprintf ( " select *  from %switkey_task_bid where
			 bid_status = '4' and task_id = '%d'", TABLEPRE, $this->_task_id ) );
		} else {
			$this->_bid_info = null;
		}
	}
	public function wiki_priv_init() {
		$arr = dtender_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case "0":
				$time_desc ['ext_desc'] = $_lang['task_nopay_can_not_look'];
				break;
			case "1" :
				$time_desc ['ext_desc'] = $_lang['wait_patient_to_audit'];
				break;
			case "2" :
				$time_desc ['time_desc'] = '距投选稿截止';
				$time_desc ['time'] = $task_info ['sub_time'];
				$time_desc ['ext_desc'] = '任务投选稿中，踊跃投标哦';
					$time_desc ['g_action'] = $_lang ['now_employer_can_choose_work'];
				break;
			case "3" :
				$time_desc ['time_desc'] = $_lang ['from_choose_work_deadline'];
				$time_desc ['time'] = $task_info ['end_time'];
				$time_desc ['ext_desc'] = $_lang['bidding_and_wait_employer_choose'];
				break;
			case "4" :
				$time_desc ['time_desc'] = '距托管截止';
				$time_desc ['time'] = $task_info ['sp_end_time'];
				$time_desc ['ext_desc'] = $_lang['bidding_for_reward_trust'];
				break;
			case "6" :
				$time_desc ['ext_desc'] = $_lang['work_over_for_jf'];
				break;
			case "7" :
				$time_desc ['ext_desc'] = $_lang['task_frozen_can_not_operate'];
				break;
			case "8" :
				$time_desc ['ext_desc'] = $_lang['task_over_congra_witkey'];
				break;
			case "9" :
				$time_desc ['ext_desc'] = $_lang['pity_task_fail'];
				break;
			case "10":
				$time_desc ['ext_desc'] = $_lang['fail_audit_please_repub'];
				break;
			case "11" :
				$time_desc ['ext_desc'] = $_lang['wait_for_task_arbitrate'];
				break;
		}
		return $time_desc;
	}
	public function getProjectProgressDesc() {
		$arrTaskInfo = $this->_task_info;
		$arrProjectProgress = array(
				'1'=>array(
						'status' 	=> -1,
						'desc'   	=> '发布需求',
						'time'   	=> $arrTaskInfo['start_time'],
				),
				'2'=>array(
						'status'   	=> 2,
						'desc'     	=> '威客报价、雇主选稿',
						'time'     	=> $arrTaskInfo['sub_time'],
						'timedesc' 	=> '距离报价，选稿结束时间剩余',
						'timeing'  	=> $arrTaskInfo['sub_time']
				),
				'3'=>array(
						'status'	=> 4,
						'desc'  	=> '托管赏金',
						'time'  	=> $arrTaskInfo['sp_end_time'],
						'timedesc' 	=> '距离托管期结束时间剩余',
						'timeing'  	=> $arrTaskInfo['sp_end_time']
				),
				'4'=>array(
						'status'	=> 6,
						'desc'  	=> '任务交付',
				),
				'5'=>array(
						'status'	=> 8,
						'desc'  	=> '评价'
				),
		);
		return $arrProjectProgress;
	}
	public function bid_hand($quote, $cycle, $area, $work_desc, $plan_amount, $start_time, $end_time, $plan_title, $is_hide = 2) {
		global $_K;
		global $_lang;
		$resText = $this->check_bid ();
		if (true === $resText) {
			$resText = $this->check_if_can_hand ();
			if (true === $resText) {
				$bid_obj = new Keke_witkey_task_bid_class ();
				$bid_obj->_bid_id = null;
				$bid_obj->setTask_id ( $this->_task_id );
				$bid_obj->setUid ( $this->_uid );
				$bid_obj->setUsername ( $this->_username );
				$bid_obj->setBid_status ( 0 );
				$bid_obj->setArea ( $area );
				$bid_obj->setQuote ( $quote );
				$bid_obj->setCycle ( $cycle );
					if($this->_task_info['workhide']==1){
						$bid_obj->setWorkhide ( 1 );
					}
				$bid_obj->setMessage ( $work_desc );
				$bid_obj->setBid_time ( time () );
				$bid_id = $bid_obj->create_keke_witkey_task_bid ();
				$is_hide == '1' and keke_payitem_class::payitem_cost ( "workhide", '1', 'work', 'spend', $bid_id, $this->_task_id );
				if ($bid_id) {
					$size = sizeof ( $plan_amount );
					for($i = 0; $i < $size; $i ++) {
						$plan_info = array ('plan_amount' => $plan_amount [$i], 'plan_desc' => '', 'plan_step' => $i + 1, 'plan_title' => $plan_title [$i], 'start_time' => strtotime ( $start_time [$i] ), 'end_time' => strtotime ( $end_time [$i] ) );
						$this->plan_add ( $bid_id, $plan_info );
					}
					$this->plus_work_num ();
					$this->plus_take_num ();
					$notice_url = $this->_task_url;
					$g_notice = array ($_lang ['user'] => $this->_username, $_lang ['call'] => $_lang ['you'], $_lang ['task_title'] => $notice_url );
					$this->notify_user ( "task_hand", $_lang ['task_tender'], $g_notice );
					return true;
				} else
					return $_lang ['sorry_tender_fail'];
			}
			return $resText;
		} else {
			return $resText;
		}
	}
	public function check_bid() {
		$count = db_factory::get_count ( sprintf ( "select count(*) from %switkey_task_bid where task_id='%d' and uid='%d'", TABLEPRE, $this->_task_id, $this->_uid ) );
		if (intval ( $count ) == 0) {
			return true;
		} else {
			return '你已经交过搞了，请勿重复交稿';
		}
	}
	public function bid_edit($bid_id, $quote, $cycle, $area, $work_desc, $plan_amount, $start_time, $end_time, $plan_title) {
		global $_K;
		global $_lang;
		$bid_id or kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1, $_lang ['choose_edit_work'],"alert_error");
		if ($this->_process_can ['work_edit']) {
			$bid_obj = new Keke_witkey_task_bid_class ();
			$bid_obj->setWhere ( 'bid_id=' . $bid_id );
			$bid_obj->setQuote ( $quote );
			$bid_obj->setArea ( $area );
			$bid_obj->setMessage ( $work_desc );
			$bid_obj->setCycle ( $cycle );
			$res = $bid_obj->edit_keke_witkey_task_bid ();
			db_factory::execute ( sprintf ( "delete from %switkey_task_plan where bid_id='%d'", TABLEPRE, $bid_id ) );
			$size = sizeof ( $plan_amount );
			for($i = 0; $i < $size; $i ++) {
				$plan_info = array ('plan_amount' => $plan_amount [$i], 'plan_desc' => '', 'plan_step' => $i + 1, 'plan_title' => $plan_title [$i], 'start_time' => strtotime ( $start_time [$i] ), 'end_time' => strtotime ( $end_time [$i] ) );
				$this->plan_add ( $bid_id, $plan_info );
			}
			kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1,$_lang ['congratulate_you_edit_success'],"alert_right");
		} else {
			kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1, $_lang ['sorry_now_task_not_allow_edit_work'],"alert_error");
		}
	}
	public function plan_add($bid_id, $plan_info) {
		$plan_obj = new Keke_witkey_task_plan_class ();
		$plan_obj->setPlan_amount ( $plan_info ['plan_amount'] );
		$plan_obj->setPlan_desc ( $plan_info ['plan_desc'] );
		$plan_obj->setPlan_step ( $plan_info ['plan_step'] );
		$plan_obj->setPlan_title ( $plan_info ['plan_title'] );
		$plan_obj->setStart_time ( $plan_info ['start_time'] );
		$plan_obj->setEnd_time ( $plan_info ['end_time'] );
		$plan_obj->setBid_id ( $bid_id );
		$plan_obj->setTask_id ( $this->_task_id );
		$plan_obj->setPlan_status ( 0 );
		$plan_obj->_plan_id = null;
		$plan_id = $plan_obj->create_keke_witkey_task_plan ();
		$plan_id and $return = $plan_id or $return = false;
		return $return;
	}
	public function work_choose($bid_id, $to_status, $trust_response = false) {
		global $kekezu, $_K;
		global $_lang;
		kekezu::check_login ( $url, $output );
		$this->check_if_operated ( $bid_id, $to_status, $url, $output );
		$status_arr = $this->get_work_status ();
		if ($this->set_bid_status ( $bid_id, $to_status )) {
			if($this->_task_status==3){
				$arrOutTask=db_factory::get_one(sprintf("select * from %switkey_task where task_status=3 and  task_id='%d'",TABLEPRE,$this->_task_id));
				$TaskWorkCount=db_factory::execute(sprintf("select * from %switkey_task_bid where task_id='%d'",TABLEPRE,$this->_task_id));
				$TaskWorkOutCount=db_factory::execute(sprintf("select * from %switkey_task_bid where task_id='%d' and bid_status=7",TABLEPRE,$this->_task_id));
				if(($TaskWorkCount==$TaskWorkOutCount) && $arrOutTask){
					$this->set_task_status ( 9 );
					return true;
				}
			}
			if ($to_status == 4) {
				$this->set_task_status ( 4 );
				$this->set_task_sp_end_time ();
				$bid_info = $this->get_task_work ( $bid_id );
				$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
				$v = array (
						 $_lang ['task_id'] => $this->_task_id,
						 $_lang ['task_title'] => $url,
						 $_lang ['bid_cash'] => $bid_info ['quote'],
						 $_lang ['work_status']=>$status_arr[$to_status] );
				$this->notify_user ( "task_bid", $_lang ['tender_bid'], $v, '1', $bid_info ['uid'] );
				$objProm = keke_prom_class::get_instance ();
				if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$objProm->create_prom_event ( "bid_task", $bid_info ['uid'], $this->_task_id, $this->_task_info ['real_cash'] );
				}
				$this->plus_accepted_num ( $bid_info ['uid'] );
			}
			return true;
		} else
			return $_lang ['dtender_tender'] . $status_arr [$to_status] . $_lang ['set_fail'];
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		$can_select = false;
		if ($this->check_if_can_choose ( $url, $output )) {
			$work_status = db_factory::get_count ( sprintf ( " select bid_status from %switkey_task_bid where bid_id='%d' and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
			if ($work_status == '8') {
				kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1,$_lang ['the_work_is_not_choose_and_not_choose_the_work'],"alert_error");
			} else {
				switch ($to_status) {
					case "4" :
						$has_bidwork = db_factory::get_count ( sprintf ( " select count(bid_id) from %switkey_task_bid where bid_status='4' and task_id='%d' ", TABLEPRE, $this->_task_id ) );
						if ($has_bidwork) {
							kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1, $_lang ['task_have_bid_work_and_not_choose_the_work'],"alert_error");
						} else {
							if ($work_status == '7') {
								kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1,$_lang ['the_work_is_out_and_not_choose_the_work'],"alert_error");
							} else
								return true;
						}
						break;
					case "7" :
						switch ($work_status) {
							case "7" :
								kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1,$_lang ['the_work_is_out_and_not_repeat'],"alert_error");
								break;
						}
						return true;
						break;
				}
			}
		} else {
			kekezu::show_msg($_lang['operate_tips'],"index.php?do=task&id=".$this->_task_id."&view=work",1,$_lang ['now_status_can_not_choose'],"alert_error");
		}
	}
	public function hosted_amount() {
		global $_K, $_lang, $kekezu;
		if ($this->_bid_info) {
			$real_cash = floatval ( $this->_task_info ['real_cash'] );
			$quote = floatval ( $this->_bid_info ['quote'] );
			$amount = $real_cash - $quote;
			$exist_id = db_factory::get_count ( sprintf ( "select b.order_id from %switkey_order_detail a left join %switkey_order b on a.order_id=b.order_id left join %switkey_task c on a.obj_id=c.task_id where b.order_status='wait' and a.obj_type='hosted' and c.task_id='%d'", TABLEPRE, TABLEPRE, TABLEPRE, $this->_task_id ) );
			if ($amount >= 0) {
				if ($amount > 0) {
					$data = array (':model_name' => $this->_model_name, ':task_id' => $this->_task_id, ':task_title' => $this->_task_title );
					keke_finance_class::init_mem ( 'task_hosted_return', $data );
					$res = keke_finance_class::cash_in ( $this->_uid, $amount, 'task_hosted_return', 0, 'task', $this->_task_id ) or $res = 1;
				}
			} else {
				$amount = abs ( $amount );
				$balance = floatval ( $this->_g_userinfo ['balance'] );
				if ($balance  - $amount >= 0) {
					$data = array (':model_name' => $this->_model_name, ':task_id' => $this->_task_id, ':task_title' => $this->_task_title );
					keke_finance_class::init_mem ( 'hosted_reward', $data );
					$amount >0 and $res = keke_finance_class::cash_out ( $this->_uid, $amount, 'hosted_reward', 0, 'task', $this->_task_id );
					$order_status = 'ok';
				} else {
					$order_id = keke_order_class::create_order ( $this->_model_id, '', '', $this->_task_title . $_lang ['jh_task'], $amount, $_lang ['task'] . "$this->_task_url" . $_lang ['reward_cash_trust'], 'wait' );
					$order_id and keke_order_class::create_order_detail ( $order_id, $this->_task_title, 'hosted', $this->_task_id, $amount );
					$order_status = 'wait';
					return '托管失败,您的账户余额不足！点击这里<a href="index.php?do=pay&type=hosted&id='.intval($this->_task_id)."&cash=".$amount.'">去充值</a>';
				}
				if ($exist_id) {
					$order_status == 'ok' and db_factory::execute ( sprintf ( "update %switkey_order set order_status='ok' where order_id='%d'", TABLEPRE, $exist_id ) );
				}
			}
			if ($res || $amount == 0) {
				$this->set_task_status ( 6 );
				db_factory::execute ( sprintf ( "update %switkey_task set single_cash='%d',credit_cost = credit_cost+'%d',cash_cost = cash_cost+'%d' where task_id='%d'", TABLEPRE, floatval ( $this->_bid_info ['quote'] ), $credit_cost, $cash_cost, $this->_task_id ) );
				$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['cash_msg'] => $amount );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'reward_cash_trust', $_lang ['reward_cash_trust_notice'], $v_arr );
				return true;
			} else {
				return $_lang ['reward_cash_trust_fail'];
			}
		} else {
			return $_lang ['you_not_choose_and_not_bid_work'];
		}
	}
	public function plan_complete($plan_id, $plan_step) {
		global $_K;
		global $_lang;
		$config = $this->_task_config;
		$plan_ids = $this->get_plan_ids ();
		if (is_array ( $plan_ids ) && in_array ( $plan_id, $plan_ids )) {
			if ($this->set_plan_status ( 1, $plan_id )) {
				db_factory::execute(sprintf("update %switkey_task_plan set over_time = %d where plan_id=%d and plan_step=%d",TABLEPRE,time()+$config['confirm_limit_time']*3600,$plan_id,$plan_step));
				$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['num'] => $plan_step );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'plan_confirm_pay', $_lang ['plan_confirm_pay_notice'], $v_arr );
				return true;
			} else {
				return $_lang ['operate_fail'];
			}
		} else {
			return $_lang ['the_plan_not_exist'];
		}
	}
	public function task_confirm_timeout(){
		global $_K, $kekezu;
		if($this->_task_status==6){
			$plan_ids = $this->get_plan_ids ();
			$size = sizeof ( $plan_ids );
			$ids_str = implode(',', $plan_ids);
			$set_plan = db_factory::get_one(sprintf("select * from %switkey_task_plan where task_id=%d and plan_id in ($ids_str) and plan_status=1 and over_time<%d",TABLEPRE,$this->_task_id,time()));
			$title_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
			if ($this->plan_cash ( $set_plan['plan_id'], $title_url )) {
				if (intval ( $set_plan['plan_step'] ) == $size) {
					$objProm = keke_prom_class::get_instance ();
					$objProm->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
					$this->set_task_status ( 8 );
					$this->plus_mark_num ();
					$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title );
					keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'task_over', $_lang ['task_over_notice'], $v_arr );
					keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $this->_bid_info ['uid'], $this->_guid, $this->_bid_info ['bid_id'], $this->_task_info ['task_cash'], $this->_task_id, $this->_bid_info ['username'], $this->_gusername );
					$cash = floatval ( $this->_task_info ['task_cash'] ) * (100 - intval ( $this->_task_info ['profit_rate'] )) / 100;
					keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $this->_bid_info ['uid'], $this->_bid_info ['bid_id'], $cash, $this->_task_id, $this->_gusername, $this->_bid_info ['username'] );
				}
			}
		}
	}
	public function plan_confirm($plan_id, $plan_step) {
		global $_K, $kekezu;
		global $_lang;
		$plan_ids = $this->get_plan_ids ();
		if (is_array ( $plan_ids ) && in_array ( $plan_id, $plan_ids )) {
			$title_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
			$size = sizeof ( $plan_ids );
			if ($this->plan_cash ( $plan_id, $title_url )) {
				if (intval ( $plan_step ) == $size) {
				$objProm = keke_prom_class::get_instance ();
					$objProm->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
					$this->set_task_status ( 8 );
					$this->plus_mark_num ();
					$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title );
					keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'task_over', $_lang ['task_over_notice'], $v_arr );
					keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $this->_bid_info ['uid'], $this->_guid, $this->_bid_info ['bid_id'], $this->_task_info ['task_cash'], $this->_task_id, $this->_bid_info ['username'], $this->_gusername );
					$cash = floatval ( $this->_task_info ['task_cash'] ) * (100 - intval ( $this->_task_info ['profit_rate'] )) / 100;
					keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $this->_bid_info ['uid'], $this->_bid_info ['bid_id'], $cash, $this->_task_id, $this->_gusername, $this->_bid_info ['username'] );
				}
				return true;
			} else {
				return true;
			}
		} else {
			return $_lang ['the_plan_not_exist'];
		}
	}
	public function plan_cash($plan_id, $title_url) {
		global $_K, $kekezu;
		global $_lang;
		$plan_info = db_factory::get_one ( sprintf ( "select * from %switkey_task_plan where plan_id='%d'", TABLEPRE, $plan_id ) );
		if ($plan_info && $this->set_plan_status ( 2, $plan_id )) {
			$cash = floatval ( $plan_info ['plan_amount'] );
			$profit_cash = $cash * intval ( $this->_task_info ['profit_rate'] ) / 100;
			$real_cash = $cash - $profit_cash;
			$objProm = keke_prom_class::get_instance ();
			$objProm->dispose_prom_event ( "bid_task", $plan_info ['uid'], $plan_info ['plan_id'] );
			$bid_info = $this->_bid_info;
			$data = array (':task_id' => $this->_task_id, ':task_title' => $this->_task_title );
			keke_finance_class::init_mem ( 'task_bid', $data );
			keke_finance_class::cash_in ( $bid_info ['uid'], $real_cash, 'task_bid', '', 'task', $this->_task_id, $profit_cash );
			$v_arr = array ($_lang ['username'] => $this->_bid_info ['username'], $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['num'] => $plan_info ['plan_step'], $_lang ['cash_msg'] => $real_cash );
			keke_msg_class::notify_user ( $this->_bid_info ['uid'], $this->_bid_info ['username'], 'plan_haved_pay', $_lang ['plan_haved_pay_notice'], $v_arr );
			$feed_arr = array ("feed_username" => array ("content" => $bid_info ['username'], "url" => "index.php?do=seller&id=" . $bid_info ['uid'] ), "action" => array ("content" => $_lang ['success_bid_haved'], "url" => "" ), "event" => array ("content" => "$this->_task_title", "url" => "index.php?do=task&id=" . $this->_task_info ['task_id'], 'cash' => number_format($real_cash,'2') ) );
			kekezu::save_feed ( $feed_arr, $bid_info ['uid'], $bid_info ['username'], 'work_accept', $this->_task_info ['task_id'] );
			return true;
		} else {
			return false;
		}
	}
	public function get_plan_ids() {
		$this->_bid_info and $plan_ids = db_factory::query ( sprintf ( "select plan_id from %switkey_task_plan where bid_id='%d'", TABLEPRE, $this->_bid_info ['bid_id'] ) );
		if ($plan_ids) {
			foreach ( $plan_ids as $v ) {
				$return_arr [] = $v ['plan_id'];
			}
			return $return_arr;
		} else {
			return false;
		}
	}
	public function set_plan_status($to_status, $plan_id) {
		return db_factory::execute ( sprintf ( "update %switkey_task_plan set plan_status='%d' where plan_id='%d'", TABLEPRE, $to_status, $plan_id ) );
	}
	public function task_tb_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 2 && $this->_task_info ['sub_time'] < time ()) {
			$work_info = $this->get_task_work ( '', '4' );
			if ($work_info) {
				$this->set_task_status ( '4' );
				$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['tb'] => $_lang ['choosing_tender'], 'time' => date ( 'Y-m-d,H:i:s', time () ), 'next' => $_lang ['trust'] );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'timeout', $_lang ['task_choose_timeout_notice'], $v_arr );
			} else {
				$res = $this->dispose_task_return ();
				$this->set_task_status ( '9' );
				$v_arr = array ($_lang ['username'] => $this->_bid_info ['username'], $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['reason'] => $_lang ['tender_timeout_and_no_people_and_return_cash'], 'explain' => '' );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'task_fail', $_lang ['task_fail_notice'], $v_arr );
			}
		}
	}
	public function task_xb_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 3 && $this->_task_info ['end_time'] < time ()) {
			$work_info = $this->get_task_work ( '', '4' );
			if ($work_info) {
				$this->set_task_status ( '4' );
				$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, $_lang ['tb'] => $_lang ['choosing_tender'], 'time' => date ( 'Y-m-d,H:i:s', time () ), 'next' => $_lang ['trust'] );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'timeout', $_lang ['task_choose_timeout_notice'], $v_arr );
			} else {
				$res = $this->dispose_task_return ();
				$this->set_task_status ( '9' );
				$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, 'reason' => $_lang ['bid_timeout_and_you_not_choose'], 'explain' => $_lang ['bid_timeout_and_you_not_choose_and_return'] . $res ['return_cash'] . $_lang ['yuan'] . CREDIT_NAME . ":" . $res ['return_credit'] );
				keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'task_fail', $_lang ['task_fail_notice'], $v_arr );
			}
		}
	}
	public function task_tg_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 4 && ! intval ( $this->_task_info ['single_cash'] ) && $this->_task_info ['sp_end_time'] < time ()) { 
			$res = $this->dispose_task_return ();
			$this->set_task_status ( '9' );
			$v_arr = array ($_lang ['username'] => $this->_gusername, $_lang ['model_name'] => $this->_model_name, $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $this->_task_title, '理由' => $_lang ['trust_cash_timeout'], 'explain' => $_lang ['trust_cash_timeout_and_return'] . $res ['return_cash'] . $_lang ['yuan']  );
			keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'task_fail', $_lang ['task_fail_notice'], $v_arr );
		}
	}
	public function dispose_task_return() {
		global $kekezu;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$task_cash = $task_info ['real_cash'];
		$real_cash = $task_info ['real_cash'];
		$task_info ['single_cash'] and $totle_cash = floatval ( $task_info ['single_cash'] ) or $totle_cash = floatval ( $task_info ['real_cash'] );
		$fail_rate = floatval ( $task_info ['task_fail_rate'] ) / 100;
		$profit = $totle_cash * $fail_rate;
		$return_cash = $totle_cash * (1 - $fail_rate);
		$data = array (':model_name' => $this->_model_name, ':task_id' => $this->_task_id, ':task_title' => $this->_task_title );
		keke_finance_class::init_mem ( 'task_fail', $data );
		$res = keke_finance_class::cash_in ( $this->_guid, $return_cash, 'task_fail', '', 'task', $this->_task_id, $profit );
		if ($res) {
			$objProm = keke_prom_class::get_instance ();
			$p_event = $objProm->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
		}
		return array ('return_credit' => $return_credit, 'return_cash' => $return_cash );
	}
	public function process_can() {
		$wiki_priv = $this->_priv;
		$process_arr = array ();
		$status = intval ( $this->_task_status );
		$task_info = $this->_task_info;
		$config = $this->_task_config;
		$g_uid = $this->_guid;
		$uid = $this->_uid;
		$user_info = $this->_userinfo;
		switch ($status) {
			case "2" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['tools'] = true;
						$process_arr ['reqedit'] = true;
							$process_arr ['work_choose'] = true;
						$process_arr ['work_comment'] = true;
						$process_arr ['work_report'] = true;
						break;
					case "0" :
						$process_arr ['work_hand'] = true;
						$process_arr ['work_edit'] = true;
						$process_arr ['task_comment'] = true;
						$process_arr ['task_report'] = true;
						break;
				}
				$process_arr ['work_report'] = true;
				break;
			case "3" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['work_choose'] = true;
						$process_arr ['work_comment'] = true;
						$process_arr ['work_report'] = true;
						break;
					case "0" :
						$process_arr ['task_comment'] = true;
						$process_arr ['task_report'] = true;
						break;
				}
				$process_arr ['work_report'] = true;
				break;
			case "4" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['work_comment'] = true;
						$process_arr ['task_pay'] = true;
						break;
					case "0" :
						$process_arr ['task_comment'] = true;
						$process_arr ['task_report'] = true;
						break;
				}
				$process_arr ['work_report'] = true;
				break;
			case "6" :
				if ($uid == $g_uid) {
					$process_arr ['plan_confirm'] = true;
					$process_arr ['task_rights'] = true;
				}
				if ($uid == $this->_bid_info ['uid']) {
					$process_arr ['plan_complete'] = true;
					$process_arr ['task_rights'] = true;
				}
				break;
			case "8" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['work_comment'] = true;
						$process_arr ['work_mark'] = true;
						break;
					case "0" :
						$process_arr ['task_comment'] = true;
						$process_arr ['task_mark'] = true;
						break;
				}
				break;
		}
		$uid != $g_uid and $process_arr ['task_complaint'] = true;
		$process_arr ['work_complaint'] = true;
		if ($user_info ['group_id']) {
			switch ($status) {
				case 1 :
					$process_arr ['task_audit'] = true;
					break;
				case 2 :
					$process_arr ['task_recommend'] = true;
					$process_arr ['task_freeze'] = true;
					break;
				default :
					if ($status > 1 && $status < 8) {
						$process_arr ['task_freeze'] = true;
					}
			}
		}
		$this->_process_can = $process_arr;
		return $process_arr;
	}
	public function get_work_info($w = array(), $order = null, $p = array()) {
		global $kekezu, $_K, $uid;
		$work_arr = array ();
		$sql = " select * from " . TABLEPRE . "witkey_task_bid a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$count_sql = " select count(a.bid_id) from " . TABLEPRE . "witkey_task_bid a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$where = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w ['bid_id'] and $where .= " and a.bid_id='" . $w ['bid_id'] . "'";
			$w ['user_type'] == 'my' and $where .= " and a.uid = '$this->_uid'";
			isset ( $w ['bid_status'] ) and $where .= " and a.bid_status = '" . intval ( $w ['bid_status'] ) . "'";
		}
		$where .= "  order by (CASE a.bid_status WHEN 4 THEN 100 WHEN 7 THEN 99 ELSE 0 END) desc,bid_time desc ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
		}
		$work_info = db_factory::query ( $sql . $where );
		foreach ( $work_info as $v ) {
			$bid_id_arr [] = $v ['bid_id'];
		}
		is_array ( $bid_id_arr ) and $bid_id_str = implode ( ',', $bid_id_arr );
		$bid_id_str or $bid_id_str = 0;
		$arrWorkInfo = kekezu::get_arr_by_key ( $work_info, 'bid_id' );
		$arrWorks ['work_info'] = array();
		if(is_array($arrWorkInfo)){
			foreach($arrWorkInfo as $k=>$v){
				$arrWorks ['work_info'][$k] = $v;
				$arrWorks ['work_info'][$k]['comment'] = $this->get_comment ( 'work', $this->_task_id, $v['bid_id'], $v['uid'] );
			}
		}
		$plan_sql = " select * from " . TABLEPRE . "witkey_task_plan where task_id = '$this->_task_id' and bid_id in($bid_id_str) order by plan_step asc  ";
		$plan_info = db_factory::query ( $plan_sql );
		$arrWorks ['mark'] = $this->has_mark ( $bid_id_str );
		$arrWorks ['plan_info'] = $plan_info;
		$arrWorks ['pages'] = $pages;
		$bid_id_str && $uid == $this->_task_info ['uid'] and db_factory::execute ( 'update ' . TABLEPRE . 'witkey_task_bid set is_view=1 where bid_id in (' . $bid_id_str . ') and is_view=0' );
		return $arrWorks;
	}
	public function get_single_bid($bid_id) {
		$bid_info = db_factory::get_one ( sprintf ( "select * from %switkey_task_bid where bid_id='%d'", TABLEPRE, $bid_id ) );
		if ($bid_info) {
			$plan_info = db_factory::query ( sprintf ( "select * from %switkey_task_plan where bid_id='%d'order by start_time", TABLEPRE, $bid_id ) );
			$plan_info or $plan_info = array ();
			return array ('bid_info' => $bid_info, 'plan_info' => $plan_info );
		} else {
			return false;
		}
	}
	public function set_bid_status($bid_id, $to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_task_bid set bid_status='%d' where bid_id='%d'", TABLEPRE, $to_status, $bid_id ) );
	}
	public function set_task_sp_end_time() {
		$sp_end_time = time () + $this->_task_config ['pay_limit_time'] * 24 * 3600;
		return db_factory::execute ( sprintf ( " update %switkey_task set sp_end_time = '%d'", TABLEPRE, $sp_end_time ) );
	}
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => '竞标中', "4" => $_lang ['wait_trust'], "6" => $_lang ['jfing'], "7" => $_lang ['freezing'], "8" => $_lang ['task_over'], "9" => $_lang ['haved_fail'], "10" => $_lang ['task_audit_fail'], "11" => $_lang ['arbitrating'] );
	}
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang ['task_bid'], '7' => $_lang ['not_eligibility'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
	public static function get_plan_status() {
		global $_lang;
		return array ('0' => $_lang ['wait_complete'], '1' => $_lang ['wait_pay'], '2' => $_lang ['plan_complete'] );
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
	}
	public function getWorkInfo($w = array(), $p = array()) {
		global $kekezu, $uid;
		$arrWorks = array ();
		$strSql = " select a.*,b.seller_credit,b.seller_good_num,b.seller_total_num,b.seller_level from " . TABLEPRE . "witkey_task_bid a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$strWhere = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w ['work_type'] == 'noview' and $strWhere .= " and a.is_view !=1 ";
			$w ['work_type'] == 'my' and $strWhere .= " and a.uid = '$this->_uid'";
			isset ( $w ['bid_status'] ) and $strWhere .= " and a.bid_status = '" . intval ( $w ['bid_status'] ) . "'";
		}
		$strWhere .= "   order by (CASE WHEN  a.bid_status!=0 THEN bid_id ELSE 0 END) desc,a.bid_id desc ";
		if (! empty ( $p )) {
			$objPage = $kekezu->_page_obj;
			$objPage->setAjax ( 1 );
			$objPage->setAjaxDom ( "gj_summery" );
			$intCount = intval ( db_factory::execute ( $strSql . $strWhere ) );
			$strPages = $objPage->getPages ( $intCount, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$strPages ['count'] = $intCount;
			$strWhere .= $strPages ['where'];
		}
		$arrWorkInfo = db_factory::query ( $strSql . $strWhere );
		$arrWorkInfo = kekezu::get_arr_by_key ( $arrWorkInfo, 'bid_id' );
		$arrWorks ['work_info'] = array();
		if(is_array($arrWorkInfo)){
			foreach($arrWorkInfo as $k=>$v){
				$arrWorks ['work_info'][$k] = $v;
				$arrWorks ['work_info'][$k]['comment'] = $this->get_comment ( 'work', $this->_task_id, $v['bid_id'], $v['uid'] );
				$arrWorks ['work_info'][$k]['plan'] = $this->getPlan($v['bid_id']);
			}
		}
		$arrWorks ['pages'] = $strPages;
		$strWorkIds = implode ( ',', array_keys ( $arrWorkInfo ) );
		$arrWorks ['mark'] = $this->has_mark ( $strWorkIds );
		$arrWorks ['count'] = $intCount;
		$strWorkIds && $uid == $this->_task_info ['uid'] and db_factory::execute ( 'update ' . TABLEPRE . 'witkey_task_bid set is_view=1 where bid_id in (' . $strWorkIds . ') and is_view=0' );
		return $arrWorks;
	}
	function getPlan($id){
		return db_factory::query(sprintf('select * from %s where task_id = %d and bid_id = %d order  by plan_step asc ',TABLEPRE . 'witkey_task_plan', $this->_task_id,$id));
	}
	public function dispose_order($order_id) {
		global $kekezu, $_K;
		global $_lang;
		$task_info = $this->_task_info;
		$task_status = $this->_task_status;
		$url = $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id;
		$order_info = db_factory::get_one ( sprintf ( "select * from %switkey_order where order_id='%d'", TABLEPRE, $order_id ) );
		$order_amount = $order_info ['order_amount'];
		if ($order_info ['order_status'] == 'ok') {
			$task_status == 1 && $notice = $_lang ['task_pay_success_and_wait_admin_audit'];
			$task_status == 2 && $notice = $_lang ['task_pay_success_and_task_pub_success'];
			return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $notice, $url, 'success' );
		} else {
			$balance = floatval ( $this->_g_userinfo ['balance'] );
			$order_amount = floatval ( $order_info ['order_amount'] );
			$leave_cash = $balance  - $order_amount;
			if ($leave_cash >= 0) {
				$order_type = db_factory::get_count ( sprintf ( "select obj_type from %switkey_order_detail where order_id='%d' and obj_type in('hosted','task') ", TABLEPRE, $order_id ) );
				if ($order_type == 'hosted') {
					$action = 'hosted_margin';
					$to_status = 6;
					$msg = $_lang ['order_pay_success_and_task_cash_trust_succss'];
				} else {
					$action = 'pub_task';
					if ($this->_task_config ['open_audit'] == 'close') {
						$to_status = 2;
						$msg = $_lang ['order_pay_success_and_your_task_success'];
					} else {
						$to_status = 1;
						$msg = $_lang ['order_pay_success_and_wait_amin_audit'];
					}
				}
				$arrOrderDetail = keke_order_class::get_order_detail($order_id);
				foreach($arrOrderDetail as $k=>$v){
					if(($v['obj_type']=='task'||$v['obj_type']=='hosted')&&$v['detail_type'] == null){
						$data = array ($kekezu->_model_list [$task_info ['model_id']] ['model_name'], $task_info ['task_id'], $task_info ['task_title'] );
						keke_finance_class::init_mem ( $action, $data );
						$res = keke_finance_class::cash_out ( $this->_guid, $v['price'], $action, 0, 'task', $this->_task_id  );
					}else{
						PayitemClass::createPayitemRecord($v['detail_type'],$v['num'],$v['obj_type'],$v['obj_id']);
					}
				}
				if ($res) {
					$objProm = keke_prom_class::get_instance ();
					if ($objProm->is_meet_requirement ( "pub_task", $this->_task_id )) {
						$objProm->create_prom_event ( "pub_task", $this->_guid, $this->_task_id, $this->_task_info ['real_cash'] );
					}
					keke_order_class::update_fina_order ( $res, $order_id );
					if ($action == 'pub_task') { 
						if($to_status == '2'){
							$feed_arr = array ("feed_username" => array ("content" => $task_info ['username'], "url" => "index.php?do=seller&id={$task_info['uid']}" ), "action" => array ("content" => $_lang ['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&id={$task_info['task_id']}" ,"cash" => $task_info['task_cash_coverage']?$task_info['task_cash_coverage']:$task_info['task_cash'],
								 "model_id" => "$this->_model_id") );
							kekezu::save_feed ( $feed_arr, $task_info ['uid'], $task_info ['username'], 'pub_task', $task_info ['task_id'] );
							$status_arr = self::get_task_status(); 
							$url = '<a href="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $task_info['task_id'] . '"  target="_blank">' . $task_info['task_title'] . '</a>';
							$v = array ('model_name'=>$this->_model_name,'task_id' => $task_info['task_id'], $_lang['task_title'] =>$task_info['task_title'] ,$_lang['task_id']=>$task_info['task_id'], $_lang ['task_link'] => $url, $_lang ['task_status'] => $status_arr [2], '开始时间' => date ( 'Y-m-d H:i:s', $task_info['start_time'] ), '投稿结束时间' => date ( 'Y-m-d H:i:s', $task_info['sub_time'] ), '选稿结束时间' => date ( 'Y-m-d H:i:s', $task_info['end_time'] ) );
							$this->notify_user("task_pub", '任务发布通知', $v, $notify_type = 1, $task_info ['uid']);
						}
						db_factory::execute ( sprintf ( " update %switkey_task set cash_cost='%s' where task_id='%d'", TABLEPRE,$task_info ['task_cash'], $this->_task_id ) );
					}
					$this->set_task_status ( $to_status );
					keke_order_class::set_order_status ( $order_id, 'ok' );
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['order_pay_success'], $url, 'success' );
				} else {
					$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id";
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $url, 'warning' );
				}
			} else {
				$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id";
				return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $pay_url, 'warning' );
			}
		}
	}
	public static function master_opera($m_id, $t_id, $url,$t_cash) {
		global $uid, $_K, $do, $view, $_lang,$user_info;
		$status = db_factory::get_count ( sprintf ( ' select task_status from %switkey_task where task_id=%d and uid=%d', TABLEPRE, $t_id, $uid ), 0, 'task_status', 600 );
		$order_info = db_factory::get_one(sprintf("select order_id from %switkey_order_detail where obj_id=%d",TABLEPRE,$t_id));
		$site = $_K ['siteurl'] . '/';
		$button = array ();
		$button ['view'] = array ('href' => $site . 'index.php?do=task&id=' . $t_id, 'desc' => '查看', 'ico' => 'book' );
		$button ['del'] = array (
				'href' => $site . $url . '&action=delSingle&objId=' . $t_id,
				'desc' => $_lang ['delete'],
				'click' => 'return opSingle(this);',
        );
		switch ($status) {
			case 0 :
				if($user_info['balance']>=$t_cash){
					$url = $site . 'index.php?do=yepay&id=' . $t_id . '&type=task';
				}else{
					$url = $site . 'index.php?do=pay&id=' . $t_id . '&type=task';
				}
				$button ['pay'] = array (
						'href' => $url,
						'desc' => $_lang ['payment'],
				);
				break;
			case 2 :
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				break;
			case 3 :
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				$button ['view'] ['desc'] = $_lang ['choose_work'];
				$button ['view'] ['href'] = $site . 'index.php?do=task&id=' . $t_id . '&view=work';
				break;
			case 4 :
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				$button ['tg_cash'] = array (
				 'desc' => $_lang ['reward_trust'],
				 'ico' => 'book',
				 'href' => 'index.php?do=taskhandle&op=consign&taskId='.$t_id,
				);
				break;
		}
		if (! in_array ( $status, array (0, 8, 9, 10 ) )) {
			unset ( $button ['del'] );
		}
		return $button;
	}
	public static function wiki_opera($m_id, $t_id, $w_id, $url) {
		global $uid, $_K, $do, $view, $_lang;
		$status = db_factory::get_count ( sprintf ( ' select task_status from %switkey_task where task_id=%d', TABLEPRE, $t_id, $uid ), 0, 'task_status', 600 );
		$site = $_K ['siteurl'] . '/';
		$button = array ();
		$button ['view'] = array ('href' => $site . 'index.php?do=task&id=' . $t_id . '&view=work&ut=my', 'desc' => $_lang ['view_work'], 
'ico' => 'book' );
		switch ($status) {
			case 2 :
				break;
			case 3 :
				break;
			case 7 :
			case 8 :
			case 9 :
			$button['del'] = array(
						'click'=>"confirmOp('确定删除？','$site$url&action=delWork&worktype=bid&objId=$w_id',true)",
						'desc'=>$_lang ['delete'].'稿件',
						'href'=>'javascript:void(0);'
				);
				break;
		}
		return $button;
	}
}