<?php
keke_lang_class::load_lang_class ( 'preward_task_class' );
class preward_task_class extends keke_task_class {
	public $_task_status_arr;
	public $_work_status_arr;
	public $_delay_rule;
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new preward_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
			$this->task_requirement_init ();
			$this->delay_rule_init ();
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
	public function delay_rule_init() {
		$this->_delay_rule = keke_task_config::get_delay_rule ( $this->_model_id, '3600' );
	}
	public function wiki_priv_init() {
		$arr = preward_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function task_requirement_init() {
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case "0" :
				$time_desc ['ext_desc'] = $_lang ['task_nopay_can_not_look'];
				break;
			case "1" :
				$time_desc ['ext_desc'] = $_lang ['wait_patient_to_audit'];
				break;
			case '2' :
				$time_desc ['time_desc'] = $_lang ['from_hand_work_deadline'];
				$time_desc ['time'] = $task_info ['sub_time'];
				$time_desc ['ext_desc'] = $_lang ['hand_work_and_reward_trust'];
				$time_desc ['g_action'] = $_lang ['present_state_employer_can_choose'];
				break;
			case '3' :
				$time_desc ['time_desc'] = $_lang ['from_choose_deadline'];
				$time_desc ['time'] = $task_info ['end_time'];
				$time_desc ['ext_desc'] = $_lang ['work_choosing_and_wait_employer_choose'];
				break;
			case "7" :
				$time_desc ['ext_desc'] = $_lang ['task_frozen_can_not_operate'];
				break;
			case "8" :
				$time_desc ['ext_desc'] = $_lang ['task_over_congra_witkey'];
				break;
			case "9" :
				$time_desc ['ext_desc'] = $_lang ['pity_task_fail'];
				break;
			case "10" :
				$time_desc ['ext_desc'] = $_lang ['fail_audit_please_repub'];
				break;
			case "11" :
				$time_desc ['ext_desc'] = $_lang ['wait_for_task_arbitrate'];
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
						'desc'     	=> '威客交稿',
						'time'     	=> $arrTaskInfo['sub_time'],
						'timedesc' 	=> '距离投稿结束时间剩余',
						'timeing'  	=> $arrTaskInfo['sub_time']
				),
				'3'=>array(
						'status'	=> 3,
						'desc'  	=> '雇主选稿',
						'time'  	=> $arrTaskInfo['end_time'],
						'timedesc' 	=> '距离选稿结束时间剩余',
						'timeing'  	=> $arrTaskInfo['end_time']
				),
				'4'=>array(
						'status'	=> 8,
						'desc'  	=> '评价'
				),
		);
		return $arrProjectProgress;
	}
	public function get_work_info($w = array(), $p = array()) {
		global $kekezu, $uid;
		$arrWorks = array ();
		$strSql = " select a.*,b.seller_credit,b.seller_good_num,b.seller_total_num,b.seller_level from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$strWhere = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w ['work_type'] == 'noview' and $strWhere .= " and a.is_view !=1 ";
			$w ['work_type'] == 'my' and $strWhere .= " and a.uid = '$this->_uid'";
			isset ( $w ['work_status'] ) and $strWhere .= " and a.work_status = '" . intval ( $w ['work_status'] ) . "'";
		}
		$strWhere .= "   order by (CASE WHEN  a.work_status!=0 THEN 100 ELSE 0 END) desc,a.work_id desc ";
		if (! empty ( $p )) {
			$objPage = $kekezu->_page_obj;
			$intCount = intval ( db_factory::execute ( $strSql . $strWhere ) );
			$strPages = $objPage->getPages ( $intCount, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$strPages ['count'] = $intCount;
			$strWhere .= $strPages ['where'];
		}
		$arrWorkInfo = db_factory::query ( $strSql . $strWhere );
		$arrWorkInfo = kekezu::get_arr_by_key ( $arrWorkInfo, 'work_id' );
		$arrWorks ['work_info'] = array();
		if(is_array($arrWorkInfo)){
          foreach($arrWorkInfo as $k=>$v){
          	$arrWorks ['work_info'][$k] = $v;
          	$arrWorks ['work_info'][$k]['attachment'] = array();
          	if($v['work_file']){
          		$fileids = explode(',', $v['work_file']);
          		$fileids = array_filter($fileids);
          		$fileids = implode(',', $fileids);
          		$arrWorks ['work_info'][$k]['attachment'] = db_factory::query('select file_id,save_name,file_name from '.TABLEPRE.'witkey_file where file_id in ('.$fileids.')');
          	}
          	$arrWorks ['work_info'][$k]['comment'] = $this->get_comment ( 'work', $this->_task_id, $v['work_id'], $v['uid'] );
          }
		}
		$arrWorks ['pages'] = $strPages;
		$arrWorks ['count'] = $intCount;
		$strWorkIds = implode ( ',', array_keys ( $arrWorkInfo ) );
		$arrWorks ['mark'] = $this->has_mark ( $strWorkIds );
		$strWorkIds && $uid == $this->_task_info ['uid'] and db_factory::execute ( 'update ' . TABLEPRE . 'witkey_task_work set is_view=1 where work_id in (' . $strWorkIds . ') and is_view=0' );
		return $arrWorks;
	}
	public function get_work_count($where) {
		if ($where == 'max') {
			$work_count = intval ( $this->_task_info ['work_count'] );
			$count = $work_count * (1 + intval ( $this->_task_config ['work_percent'] ) / 100);
		} else {
			$count = db_factory::get_count ( sprintf ( "select count(work_id) from %switkey_task_work where %s and task_id='%d'", TABLEPRE, $where, $this->_task_id ) );
		}
		return intval ( $count );
	}
	public function check_work_if_standard($type) {
		$work_count = intval ( $this->_task_info ['work_count'] );
		if ($type == 'hand') {
			if ($this->_task_config ['work_percent'] == 0) {
				return true;
			} else {
				$totle_count = $this->get_work_count ( "max" );
				$hand_count = $this->get_work_count ( "work_status = 0" );
				if ($hand_count < $totle_count) {
					return true;
				} else {
					return false;
				}
			}
		} elseif ($type == 'hege') {
			$hege_count = $this->get_work_count ( "work_status=6" );
			if ($work_count > $hege_count) {
				return true;
			} else {
				return false;
			}
		}
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
		global $_lang;
		global $_K;
		$strText = $this->check_if_can_hand ( $url, $output );
		if ($strText === true) {
			$strCheckWork = $this->check_work_if_standard ( 'hand' );
			if ($strCheckWork===true) {
				$work_obj = new Keke_witkey_task_work_class ();
				$work_obj->setHide_work ( $hidework );
				$work_obj->setTask_id ( $this->_task_id );
				$work_obj->setUid ( $this->_uid );
				$work_obj->setUsername ( $this->_username );
				$work_obj->setWork_desc ( stripcslashes($work_desc) );
				$work_obj->setWork_status ( 0 );
				$work_obj->setWork_title ( $this->_task_title );
				$work_obj->setWork_time ( time () );
				if($this->_task_info['workhide']==1){
					$work_obj->setWorkhide ( 1 );
				}
				if ($file_ids) {
					$file_arr = array_unique ( array_filter ( explode ( ',', $file_ids ) ) );
					$f_ids = implode ( ',', $file_arr );
					$work_obj->setWork_file ( $f_ids );
					$work_obj->setWork_pic ( $this->work_pic ( $f_ids ) );
				}
				$work_id = $work_obj->create_keke_witkey_task_work ();
				$hidework == '1' and keke_payitem_class::payitem_cost ( "workhide", '1', 'work', 'spend', $work_id, $this->_task_id );
				if ($work_id) {
					$f_ids and db_factory::execute ( sprintf ( "update %switkey_file set work_id='%d',task_title='%s',obj_id='%d' where file_id in (%s)", TABLEPRE, $work_id, $this->_task_title, $work_id, $f_ids ) );
					$this->plus_work_num ();
					$this->plus_take_num ();
					$notice_url = "<a href=\"$_K[siteurl]/index.php?do=task&id={$this->_task_id}\">$this->_task_title</a>";
					$g_notice = array (
							$_lang ['user'] => $this->_username,
							$_lang ['call'] => $_lang ['you'],
							$_lang ['task_title'] => $notice_url
					);
					$this->notify_user ( 'task_hand', $_lang ['task_hand'], $g_notice, '2', $this->_guid );
                    return true;
				} else {
					return $_lang ['hand_work_fail_and_operate_agian'];
				}
			} else {
				return $_lang ['hand_work_fail_for_the_work_full'];
			}
		}else{
			return $strText;
		}
	}
	public function work_choose($work_id, $to_status, $url = '', $output = 'normal', $trust_response = false) {
		global $_K, $kekezu;
		global $_lang;
		$strCheckOp = $this->check_if_operated ( $work_id, $to_status, $url, $output );
		if($strCheckOp === true){
			$work_status_arr = $this->_work_status_arr;
			if ($this->set_work_status ( $work_id, $to_status )) {
				$title_url = "<a href =" . $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id . " target=\"_blank\">" . $this->_task_title . "</a>";
				$work_info = $this->get_task_work ( $work_id );
				if ($to_status == 6) {
					$this->work_choosed ( $work_info, $title_url );
					if (! $this->check_work_if_standard ( 'hege' )) {
						if ($this->set_task_status ( 8 )) {
							$objProm = keke_prom_class::get_instance ();
							$objProm->dispose_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id );
							$objProm->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
							if ($this->_task_info ['task_union'] > 1) {
								$bid_uid = array ();
								$ids = db_factory::query ( 'select uid from ' . TABLEPRE . 'witkey_task_work where work_status=6 and task_id=' . $this->_task_id );
								foreach ( $ids as $v ) {
									$bid_uid [] = $v ['uid'];
								}
							}
						}
					}
				} elseif ($to_status == 7) {
					$arr = array (
							$_lang ['username'] => $work_info ['username'],
							$_lang ['task_title'] => $this->_task_title,
							$_lang ['website_name'] => $_K ['sitename'],
							$_lang ['task_id'] => $this->_task_id
					);
					keke_msg_class::notify_user ( $work_info ['uid'], $work_info ['username'], 'task_unbid', $_lang ['work_fail1'], $arr );
				}
				return true;
			} else {
				return $_lang ['work'] . $status_arr [$to_status] . $_lang ['set_fail'];
			}
		}else{
			return $strCheckOp;
		}
	}
	public function appWorkChoose($work_id, $to_status) {
		global $_K, $kekezu;
		global $_lang;
		$work_status = db_factory::get_count ( sprintf ( "select work_status from %switkey_task_work where work_id='%d'", TABLEPRE, $work_id ) );
		if (intval ( $work_status ) === 0) {
			if ($to_status == 6) {
				if (! $this->check_work_if_standard ( 'hege' )) {
					app_class::response ( array (
							'ret' => 109
					) );
				}
			}
		} else {
			app_class::response ( array (
					'ret' => 106
			) );
		}
		$work_status_arr = $this->_work_status_arr;
		if ($this->set_work_status ( $work_id, $to_status )) {
			$title_url = "<a href =" . $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id . " target=\"_blank\">" . $this->_task_title . "</a>";
			$work_info = $this->get_task_work ( $work_id );
			if ($to_status == 6) {
				$this->work_choosed ( $work_info, $title_url );
				if (! $this->check_work_if_standard ( 'hege' )) {
					if ($this->set_task_status ( 8 )) {
					$objProm = keke_prom_class::get_instance ();
							$objProm->dispose_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id );
						$objProm->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
						if ($this->_task_info ['task_union'] > 1) {
							$bid_uid = array ();
							$ids = db_factory::query ( 'select uid from ' . TABLEPRE . 'witkey_task_work where work_status=6 and task_id=' . $this->_task_id );
							foreach ( $ids as $v ) {
								$bid_uid [] = $v ['uid'];
							}
						}
					}
				}
			} elseif ($to_status == 7) {
				$arr = array (
						$_lang ['username'] => $work_info ['username'],
						$_lang ['task_title'] => $this->_task_title,
						$_lang ['website_name'] => $_K ['sitename'],
						$_lang ['task_id'] => $this->_task_id
				);
				keke_msg_class::notify_user ( $work_info ['uid'], $work_info ['username'], 'task_unbid', $_lang ['work_fail1'], $arr );
			}
			app_class::response ( array (
					'ret' => 0
			) );
		} else {
			app_class::response ( array (
					'ret' => 1
			) );
		}
	}
	public function work_choosed($work_info, $title_url) {
		global $_K, $kekezu;
		global $_lang, $_currencies, $currency;
		$objProm = keke_prom_class::get_instance ();
		$task_total_cash = floatval ( $this->_task_info ['task_cash'] );
		$task_real_cash = $task_total_cash * (1 - intval ( $this->_task_info ['profit_rate'] ) / 100);
		$single_cash = floatval ( $this->_task_info ['single_cash'] );
		$real_cash = $task_real_cash / intval ( $this->_task_info ['work_count'] );
		$profit_cash = $single_cash - $real_cash;
		$data = array (
				':task_id' => $this->_task_id,
				':task_title' => $this->_task_title
		);
		keke_finance_class::init_mem ( 'task_bid', $data );
		keke_finance_class::cash_in ( $work_info ['uid'], $real_cash,  'task_bid', '', 'task', $this->_task_id, $profit_cash );
		$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '">' . $this->_task_title . '</a>';
		$status_arr = self::get_work_status ();
		$v = array (
				$_lang ['work_status'] => $status_arr [6],
				$_lang ['username'] => $work_info ['username'],
				$_lang ['website_name'] => $kekezu->_sys_config ['website_name'],
				$_lang ['task_id'] => $this->_task_id,
				$_lang ['task_title'] => $url,
				$_lang ['bid_cash'] => $_currencies [$currency] ['symbol_left'] . $real_cash . $_currencies [$currency] ['symbol_right']
		);
		$this->notify_user ( "task_bid", $_lang ['work_bid'], $v, '1', $work_info ['uid'] );
		$feed_arr = array (
				"feed_username" => array (
						"content" => $work_info ['username'],
						"url" => "index.php?do=seller&id=$work_info[uid]"
				),
				"action" => array (
						"content" => $_lang ['success_bid_haved'],
						"url" => ""
				),
				"event" => array (
						"content" => "$this->_task_title",
						"url" => "index.php?do=task&id=$this->_task_id",
						'cash' => number_format($real_cash,'2')
				)
		);
		kekezu::save_feed ( $feed_arr, $work_info ['uid'], $work_info ['username'], 'work_accept', $this->_task_id );
		$this->plus_accepted_num ( $work_info ['uid'] );
		$this->plus_mark_num ();
		$objProm = keke_prom_class::get_instance ();
		if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
			$objProm->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $single_cash );
			$objProm->dispose_prom_event ( "bid_task", $work_info ['uid'],  $this->_task_id );
		}
		keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_info ['uid'], $this->_guid, $work_info ['work_id'], $this->_task_info ['single_cash'], $this->_task_id, $work_info ['username'], $this->_gusername );
		keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_info ['uid'], $work_info ['work_id'], $real_cash, $this->_task_id, $this->_gusername, $work_info ['username'] );
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		if ($this->check_if_can_choose ( $url, $output )===true) {
			$work_status = db_factory::get_count ( sprintf ( "select work_status from %switkey_task_work where work_id='%d'", TABLEPRE, $work_id ) );
			switch (intval ( $work_status )) {
				case 0 :
					if ($to_status == 6) {
						if ($this->check_work_if_standard ( 'hege' )===true) {
							return true;
						} else {
							return $_lang ['task_hg_work_full_and_not_operate_bid_work'];
						}
					} else {
						return true;
					}
					break;
				case 6 :
					return $_lang ['task_bid_work_full_and_not_operate_choose_work'];
					break;
				case 7 :
					return $_lang ['task_not_recept_work_full_and_not_operate_choose_work'];
					break;
				case 8 :
					return $_lang ['task_not_operate_work_and_not_operate_choose_work'];
					break;
			}
		} else {
			return  $_lang ['now_status_can_not_choose'];
		}
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
			case '2' :
				if ($uid == $g_uid) {
					$process_arr ['tools'] = true;
					$process_arr ['reqedit'] = true;
					sizeof ( $this->_delay_rule ) > 0 and $process_arr ['delay'] = true;
					$process_arr ['work_choose'] = true;
					$process_arr ['work_comment'] = true;
				} else {
					$process_arr ['work_hand'] = true;
					$process_arr ['task_comment'] = true;
					$process_arr ['task_report'] = true;
				}
				$process_arr ['work_report'] = true;
				$process_arr ['work_cancel'] = true;
				break;
			case '3' :
				if ($uid == $g_uid) {
					if ($this->check_work_if_standard ( 'hege' )) {
						$process_arr ['work_choose'] = true;
					}
					$process_arr ['work_comment'] = true;
				} else {
					$process_arr ['task_comment'] = true;
					$process_arr ['task_report'] = true;
				}
				$process_arr ['work_report'] = true;
				$process_arr ['work_cancel'] = true;
				break;
			case '8' :
				if ($uid == $g_uid) {
					$process_arr ['work_comment'] = true;
				} else {
					$process_arr ['task_comment'] = true;
				}
				break;
		}
		$process_arr ['work_mark'] = true;
		$process_arr ['task_mark'] = true;
		$uid != $g_uid and $process_arr ['task_complaint'] = true;
		$process_arr ['work_complaint'] = true;
		if ($user_info ['group_id']) {
			switch ($status) {
				case 1 :
					$process_arr ['task_audit'] = true;
					break;
				case 2 :
					$task_info ['is_top'] or $process_arr ['task_recommend'] = true;
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
	public function dispose_task_return($action) {
		$uid = $this->_uid;
		$prom_obj = $objProm = keke_prom_class::get_instance ();
		$task_cash = floatval ( $this->_task_info ['task_cash'] );
		$refund_rate = floatval ( $this->_task_info ['task_fail_rate'] ) / 100;
		$hege_count = $this->get_work_count ( "work_status=6" );
		$hege_count and $use_cash = floatval ( $this->_task_info ['single_cash'] ) * $hege_count;
		$work_count = intval ( $this->_task_info ['work_count'] );
				$cash = floatval ( $task_cash );
				if ($hege_count > 0) {
					$sy = $cash - $use_cash;
					if ($sy >= 0) {
						$refund_cash = $sy;
					}
				} else {
					$refund_cash = $cash;
				}
		$ref_cash = $refund_cash * (1 - $refund_rate);
		$data = array (
				':model_name' => $this->_model_name,
				':task_id' => $this->_task_id,
				':task_title' => $this->_task_title
		);
		keke_finance_class::init_mem ( $action, $data );
		keke_finance_class::cash_in ( $this->_guid, $ref_cash, $action, '', 'task', $this->_task_id, $refund_cash  * $refund_rate );
		return array (
				'refund_cash' => $refund_cash,
		);
	}
	public function task_jg_timeout() {
		global $_K, $kekezu;
		global $_lang;
		$prom_obj = $this->_prom_obj;
		if ($this->_task_status == '2') {
			if (time () > intval ( $this->_task_info ['sub_time'] )) {
				$task_url = "<a href=\"$_K[siteurl]/index.php?do=task&id=$this->_task_id\">$this->_task_title</a>";
				if (intval ( $this->_task_info ['work_num'] ) > 0) {
					if ($this->set_task_status ( 3 )) {
						$arr = array (
								$_lang ['username'] => $this->_gusername,
								$_lang ["model_name"] => $this->_model_name,
								$_lang ["task_id"] => $this->_task_id,
								$_lang ["task_title"] => $this->_task_title,
								$_lang ["tb"] => $_lang ['hand_work'],
								"next" => $_lang ['choose_work']
						);
						keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'timeout', '任务选稿', $arr );
					}
				} else {
					if ($this->set_task_status ( 9 )) {
						$refund = $this->dispose_task_return ( 'task_fail' );
						$objProm = keke_prom_class::get_instance ();
						$p_event =$objProm->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
						$objProm->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
						$refund ['refund_cash'] || $refund ['refund_credit'] and $send_str = $_lang ['sys_haved_return'];
						$refund ['refund_cash'] and $send_str .= $_lang ['task_cach_'] . $refund ['refund_cash'] . $_lang ['yuan'];
						$refund ['refund_credit'] and $send_str .= $_lang ['task_credit_'] . $refund ['refund_credit'];
					}
				}
			}
		}
	}
	public function task_xg_timeout() {
		global $_K, $kekezu;
		global $_lang;
		if ($this->_task_status == '3' && time () > intval ( $this->_task_info ['end_time'] )) {
			if ($this->set_task_status ( 8 )) {
				$objProm = keke_prom_class::get_instance ();
				$hege_count = $this->get_work_count ( "work_status=6" );
				if (intval ( $hege_count ) < intval ( $this->_task_info ['work_count'] )) {
					if (intval ( $this->_task_config ['is_auto_adjourn'] ) == 1) {
						intval ( $this->_task_info ['work_count'] ) and $auto_num = intval ( $this->_task_info ['work_count'] );
						$work_list = db_factory::query ( sprintf ( "select * from %switkey_task_work where task_id='%d' and work_status=0 order by work_time asc limit 0,%d", TABLEPRE, $this->_task_id, intval ( $auto_num ) - intval ( $hege_count ) ) );
						if ($work_list) {
							foreach ( $work_list as $v ) {
								$this->set_work_status ( $v ['work_id'], 6 );
								$title_url = "<a href=\"$_K[siteurl]/index.php?do=task&id=$this->_task_id\">$this->_task_title</a>";
								$this->work_choosed ( $v, $title_url );
							}
						}
					}
				}
				$refund = $this->dispose_task_return ( 'task_remain_return' );
				$refund ['refund_cash'] || $refund ['refund_credit'] and $send_str = $_lang ['sys_haved_return'];
				$refund ['refund_cash'] and $send_str .= $_lang ['task_cach_'] . $refund ['refund_cash'] . $_lang ['yuan'];
				$refund ['refund_credit'] and $send_str .= $_lang ['task_credit_'] . $refund ['refund_credit'];
				$intHeGeCount = $this->get_work_count ( "work_status=6" );
				if(intval ( $intHeGeCount ) == intval ( $this->_task_info ['work_count'] )){
					$objProm->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
				}else{
					$objProm = keke_prom_class::get_instance ();
					$p_event =$objProm->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
					$objProm->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
				}
			}
		}
	}
	public static function get_task_status() {
		global $_lang;
		return array (
				"0" => $_lang ['task_no_pay'],
				"1" => $_lang ['task_wait_audit'],
				"2" => $_lang ['task_vote_choose'],
				"3" => $_lang ['task_choose_work'],
				"7" => $_lang ['freeze'],
				"8" => $_lang ['task_over'],
				"9" => $_lang ['fail'],
				"10" => $_lang ['task_audit_fail']
		);
	}
	public static function get_work_status() {
		global $_lang;
		return array (
				'0' => $_lang ['wait_choose'],
				'6' => $_lang ['hg'],
				'7' => $_lang ['not_recept'],
				'8' => $_lang ['task_can_not_choose_bid']
		);
	}
	public function set_work_status($work_id, $to_status) {
		return db_factory::execute ( sprintf ( "update %switkey_task_work set work_status='%d' where work_id='%d'", TABLEPRE, $to_status, $work_id ) );
	}
	public function dispose_order($order_id) {
		global $kekezu, $_K;
		global $_lang;
		$task_config = $this->_task_config;
		$task_info = $this->_task_info;
		$url = $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id;
		$task_status = $this->_task_status;
		$order_info = db_factory::get_one ( sprintf ( "select order_amount,order_status from %switkey_order where order_id='%d'", TABLEPRE, intval ( $order_id ) ) );
		$order_amount = $order_info ['order_amount'];
		if ($order_info ['order_status'] == 'ok') {
			$task_status == 1 && $notice = $_lang ['task_pay_success_and_wait_admin_audit'];
			$task_status == 2 && $notice = $_lang ['task_pay_success_and_task_pub_success'];
			return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $notice, $url, 'success' );
		} else {
			$arrOrderDetail = keke_order_class::get_order_detail($order_id);
			foreach($arrOrderDetail as $k=>$v){
				if($v['obj_type']=='task'&&$v['detail_type'] == null){
					$data = array (
							':model_name' => $this->_model_name,
							':task_id' => $this->_task_id,
							':task_title' => $this->_task_title
					);
					keke_finance_class::init_mem ( 'pub_task', $data );
					$res = keke_finance_class::cash_out ( $task_info ['uid'], $v['price'], 'pub_task', 0, 'task', $this->_task_id  );
				}else{
					PayitemClass::createPayitemRecord($v['detail_type'],$v['num'],$v['obj_type'],$v['obj_id']);
				}
			}
			if ($res) {
				$objProm = keke_prom_class::get_instance ();
				if ($objProm->is_meet_requirement ( "pub_task", $this->_task_id )) {
					$objProm->create_prom_event ( "pub_task", $this->_guid, $this->_task_id, $this->_task_info ['task_cash'] );
				}
				keke_order_class::update_fina_order ( $res, $order_id );
				$consume = kekezu::get_cash_consume ( $task_info ['task_cash'] );
				db_factory::execute ( sprintf ( " update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'", TABLEPRE, $consume ['cash'], $consume ['credit'], $this->_task_id ) );
				db_factory::updatetable ( TABLEPRE . "witkey_order", array (
						"order_status" => "ok"
				), array (
						"order_id" => "$order_id"
				) );
				if ($order_amount < $task_config ['audit_cash']) {
					$this->set_task_status ( 1 );
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_wait_admin_audit'], $url, 'success' );
				} else {
					$this->set_task_status ( 2 );
					$feed_arr = array (
							"feed_username" => array (
									"content" => $task_info ['username'],
									"url" => "index.php?do=seller&id={$task_info['uid']}"
							),
							"action" => array (
									"content" => $_lang ['pub_task'],
									"url" => ""
							),
							"event" => array (
									"content" => "{$task_info['task_title']}",
									"url" => "index.php?do=task&id={$task_info['task_id']}",
									"cash" => $task_info['task_cash_coverage']?$task_info['task_cash_coverage']:$task_info['task_cash'],
									"model_id" => "$this->_model_id"
							)
					);
					kekezu::save_feed ( $feed_arr, $task_info ['uid'], $task_info ['username'], 'pub_task', $task_info ['task_id'] );
					$status_arr = self::get_task_status(); 
					$url = '<a href="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $task_info['task_id'] . '"  target="_blank">' . $task_info['task_title'] . '</a>';
					$v = array ('model_name'=>$this->_model_name,'task_id' => $task_info['task_id'], $_lang['task_title'] =>$task_info['task_title'] ,$_lang['task_id']=>$task_info['task_id'], $_lang ['task_link'] => $url, $_lang ['task_status'] => $status_arr [2], '开始时间' => date ( 'Y-m-d H:i:s', $task_info['start_time'] ), '投稿结束时间' => date ( 'Y-m-d H:i:s', $task_info['sub_time'] ), '选稿结束时间' => date ( 'Y-m-d H:i:s', $task_info['end_time'] ) );
					$this->notify_user("task_pub", '任务发布通知', $v, $notify_type = 1, $task_info ['uid']);
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_task_pub_success'], $url, 'success' );
				}
			} else {
				$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id";
				return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $pay_url, 'warning' );
			}
		}
	}
	public static function master_opera($m_id, $t_id, $url, $t_cash) {
		global $uid, $_K, $do, $view, $_lang,$user_info;
		$status = db_factory::get_count ( sprintf ( ' select task_status from %switkey_task where task_id=%d and uid=%d', TABLEPRE, $t_id, $uid ), 0, 'task_status', 600 );
		$order_info = db_factory::get_one ( sprintf ( "select order_id from %switkey_order_detail where obj_id=%d", TABLEPRE, $t_id ) );
		$site = $_K ['siteurl'] . '/';
		$button = array ();
		$button ['view'] = array (
				'href' => $site . 'index.php?do=task&id=' . $t_id,
				'desc' => '查看',
		);
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
				$button ['addprice'] = array (
						'desc' => $_lang ['delay_makeup'],
						'href' => 'index.php?do=taskhandle&op=delay&taskId='.$t_id
				);
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
				$button ['view'] ['desc'] = $_lang ['vote'];
				$button ['view'] ['href'] = $site . 'index.php?do=task&id=' . $t_id . '&view=work';
				break;
		}
		if (! in_array ( $status, array (
				0,
				8,
				9,
				10
		) )) {
			unset ( $button ['del'] );
		}
		return $button;
	}
	public static function wiki_opera($m_id, $t_id, $w_id, $url) {
		global $uid, $_K, $do, $view, $_lang;
		$status = db_factory::get_count ( sprintf ( ' select task_status from %switkey_task where task_id=%d', TABLEPRE, $t_id, $uid ), 0, 'task_status', 600 );
		$site = $_K ['siteurl'] . '/';
		$button = array ();
		$button ['view'] = array (
				'href' => $site . 'index.php?do=taskhandle&op=workinfo&taskId=' . $t_id . '&workId=' . $w_id,
				'desc' => $_lang ['view_work'],
				'ico' => 'book'
		);
		switch ($status) {
			case 2 :
				break;
			case 8 :
			case 9 :
				$button['del'] = array(
						'click'=>"confirmOp('确定删除？','$site$url&action=delWork&objId=$w_id',true)",
						'desc'=>$_lang ['delete'].'稿件',
						'href'=>'javascript:void(0);'
				);
				break;
		}
		return $button;
	}
}