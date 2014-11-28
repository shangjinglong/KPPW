<?php
keke_lang_class::load_lang_class ( 'sreward_task_class' );
class sreward_task_class extends keke_task_class {
	public $_task_status_arr;
	public $_work_status_arr;
	public $_delay_rule;
	public $_agree_id;
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new sreward_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		($this->_task_status == '6'||$this->_task_status == '8') and $this->_agree_id = db_factory::get_count ( sprintf ( " select agree_id from %switkey_agreement where task_id='%d'", TABLEPRE, $this->_task_id ) );
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
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
		$arr = sreward_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
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
			case "2" :
				$time_desc ['time_desc'] = $_lang ['from_hand_work_deadline'];
				$time_desc ['time'] = $task_info ['sub_time'];
				$time_desc ['ext_desc'] = $_lang ['hand_work_and_reward_trust'];
				$time_desc ['g_action'] = $_lang ['now_employer_can_choose_work'];
				break;
			case "3" :
				$time_desc ['time_desc'] = $_lang ['from_choose_deadline'];
				$time_desc ['time'] = $task_info ['end_time'];
				$time_desc ['ext_desc'] = $_lang ['work_choosing_and_wait_employer_choose'];
				break;
			case "4" :
				$time_desc ['time_desc'] = $_lang ['from_vote_deadline'];
				$time_desc ['time'] = $task_info ['sp_end_time'];
				$time_desc ['ext_desc'] = $_lang ['no_choosing_wait_for_vote'];
				break;
			case "5" :
				$time_desc ['time_desc'] = $_lang ['from_gs_deadline'];
				$time_desc ['time'] = $task_info ['sp_end_time'];
				$time_desc ['ext_desc'] = $_lang ['task_gs_and_emplyer_have_choose'];
				break;
			case "6" :
				$time_desc ['ext_desc'] = $_lang ['employer_and_witkey_jf'];
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
				break;
			case "13" :
				$time_desc ['ext_desc'] = $_lang ['task_frozen_when_jf'];
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
						'status'	=> 4,
						'desc'  	=> '投票期',
						'time'  	=> $arrTaskInfo['sp_end_time'],
						'timedesc' 	=> '距离投票期结束时间剩余',
						'timeing'  	=> $arrTaskInfo['sp_end_time']
				),
				'5'=>array(
						'status'	=> 5,
						'desc'  	=> '公示期',
						'time'  	=> $arrTaskInfo['sp_end_time'],
						'timedesc' 	=> '距离公示期结束时间剩余',
						'timeing'  	=> $arrTaskInfo['sp_end_time']
				),
				'6'=>array(
						'status'	=> 6,
						'task_status'	=> 13,
						'desc'  	=> '稿件交付中'
				),
				'7'=>array(
						'status'	=> 8,
						'desc'  	=> '评价'
				),
		);
		return $arrProjectProgress;
	}
	public function get_work_info($w = array(), $order = null, $p = array()) {
		global $kekezu, $_K, $uid,$gUid;
		$work_arr = array ();
		$sql = " select a.*,
						b.seller_credit,b.seller_good_num,b.residency,b.seller_total_num,b.seller_level
					from " . TABLEPRE . "witkey_task_work a
			   left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$count_sql = " select count(a.work_id) from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$where = " where a.task_id = ".$this->_task_id;
		if (! empty ( $w )) {
			$intWorkStatus = intval ( $w ['work_status'] );
			switch($intWorkStatus){
				case'2':
					$where .= " and a.is_view !=1 ";
					break;
				case'4':
				case'5':
				case'7':
				case'8':
					$where .= " and a.work_status = '" . $intWorkStatus . "'";
					break;
				case'9':
					$where .= " and a.uid = '$this->_uid'";
					break;
			}
		}
		$where .= "   order by field(a.work_status,'8','7','5','4') desc, work_id asc ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
			$pages ['count'] = $count;
		}
		$work_info = db_factory::query ( $sql . $where );
		$work_info = kekezu::get_arr_by_key ( $work_info, 'work_id' );
		$work_arr ['work_info'] = $work_info;
		$work_arr ['pages'] = $pages;
		$work_ids = implode ( ',', array_keys ( $work_info ) );
		$work_arr ['mark'] = $this->has_mark ( $work_ids );
		$work_arr ['count'] = $count;
		if(is_array($work_info)){
			foreach($work_info as $k=>$v){
				$work_arr ['work_info'][$k] = $v;
				$work_arr ['work_info'][$k]['attachment'] = array();
				if($v['work_file']){
					$fileids = explode(',', $v['work_file']);
					$fileids = array_filter($fileids);
					$fileids = implode(',', $fileids);
					$work_arr ['work_info'][$k]['attachment'] = db_factory::query('select file_id,save_name,file_name from '.TABLEPRE.'witkey_file where file_id in ('.$fileids.')');
				}
				$work_arr ['work_info'][$k]['comment'] = $this->get_comment ( 'work', $this->_task_id, $v['work_id'], $v['uid'] );
				if($this->_task_status==4){
					$arrVote = db_factory::get_count ( sprintf ( " select count(vote_id) from %switkey_vote where
		         work_id='%d' and uid='%d' and vote_ip='%s'", TABLEPRE, intval($v['work_id']), $this->_uid, kekezu::get_ip () ) );
					if($arrVote){
						$work_arr ['work_info'][$k]['vote'] = true;
					}
					unset($arrVote);
				}
				$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "work"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['work_id'])));
				if($arrFavorite){
					$work_arr ['work_info'][$k]['favorite'] = true;
				}
				unset($arrFavorite);
			}
		}
		$work_ids && $uid == $this->_task_info ['uid'] and db_factory::execute ( 'update ' . TABLEPRE . 'witkey_task_work set is_view=1 where work_id in (' . $work_ids . ') and is_view=0' );
		return $work_arr;
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2') {
		global $_K;
		global $_lang;
		$resText = $this->check_if_can_hand ();
		if (true === $resText) {
			$work_obj = new Keke_witkey_task_work_class ();
			$work_obj->_work_id = null;
			$work_obj->setTask_id ( $this->_task_id );
			$work_obj->setUid ( $this->_uid );
			$work_obj->setUsername ( $this->_username );
			$work_obj->setVote_num ( 0 );
			$work_obj->setWork_status ( 0 );
			$work_obj->setWork_title ( $this->_task_title . $_lang ['de_work'] );
			if($this->_task_info['workhide']==1){
				$work_obj->setWorkhide ( 1 );
			}
			$work_obj->setWork_desc ( stripcslashes($work_desc) );
			$work_obj->setWork_time ( time () );
			if ($file_ids) {
				$file_arr = array_unique ( array_filter ( explode ( ',', $file_ids ) ) );
				$f_ids = implode ( ',', $file_arr );
				$work_obj->setWork_file ( implode ( ',', $file_arr ) );
				$work_obj->setWork_pic ( $this->work_pic ( $f_ids ) );
			}
			$work_id = $work_obj->create_keke_witkey_task_work ();
			$hidework == '1' and keke_payitem_class::payitem_cost ( "workhide", '1', 'work', 'spend', $work_id, $this->_task_id );
			if ($work_id) {
				$f_ids and db_factory::execute ( sprintf ( " update %switkey_file set work_id='%d',task_title='%s',obj_id='%d' where file_id in (%s)", TABLEPRE, $work_id, $this->_task_title, $work_id, $f_ids ) );
				$this->plus_work_num ();
				$this->plus_take_num ();
				$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
				$g_notice = array (
						$_lang ['user'] => $this->_username,
						$_lang ['call'] => $_lang ['you'],
						$_lang ['task_title'] => $notice_url
				);
				$this->notify_user ( "task_hand", $_lang ['task_hand'], $g_notice );
				return true;
			}
			return '很遗憾，交稿失败';
		}else{
			return  $resText;
		}
	}
	public function work_choose($work_id, $to_status, $trust_response = false) {
		global $kekezu, $_K;
		global $_lang;
		$this->check_if_operated ( $work_id, $to_status );
		$status_arr = $this->get_work_status ();
		$task_info = $this->_task_info;
		$work_info = $this->get_task_work ( $work_id );
		if ($to_status == 4) {
			if ($this->_task_status == 7) {
				$cash_info = db_factory::get_one ( sprintf ( " select task_cash,task_union,real_cash from %switkey_task where task_id = '%d'", TABLEPRE, $this->_task_id ) );
				keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_info ['uid'], $this->_guid, $work_info ['work_id'], $cash_info ['task_cash'], $this->_task_id, $work_info ['username'], $this->_gusername );
				keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_info ['uid'], $work_info ['work_id'], $cash_info ['real_cash'], $this->_task_id, $this->_gusername, $work_info ['username'] );
				$this->plus_mark_num ();
				$site_profit = $cash_info ['task_cash'] - $cash_info ['real_cash'];
				$data = array (
						':task_id' => $this->_task_id,
						':task_title' => $this->_task_info ['task_title']
				);
				keke_finance_class::init_mem ( 'task_bid', $data );
				keke_finance_class::cash_in ( $work_info ['uid'], $cash_info ['real_cash'], 'task_bid', '', 'task', $this->_task_id, $site_profit );
				$this->set_task_status ( '8' );
				$feed_arr = array (
						"feed_username" => array (
								"content" => $work_info ['uid'],
								"url" => "index.php?do=seller&id={$work_info ['uid']}"
						),
						"action" => array (
								"content" => $_lang ['success_bid_haved'],
								"url" => ""
						),
						"event" => array (
								"content" => $this->_task_title,
								"url" => "index.php?do=task&id=$this->_task_id",
								'cash' => $cash_info ['real_cash']
						)
				);
				kekezu::save_feed ( $feed_arr, $work_info ['uid'], $work_info ['username'], 'work_accept', $this->_task_id );
				$this->plus_accepted_num ( $work_info ['uid'] );
			} else {
				if ($this->_task_config ['notice_period']) {
					$this->set_task_status ( '5' );
					$this->set_task_sp_end_time ();
				} else {
					if ($this->set_task_status ( 6 )) {
						$this->create_agree_date ( $work_info );
					}
				}
				$this->plus_accepted_num ( $work_info ['uid'] );
				$objProm = keke_prom_class::get_instance ();
				if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$objProm->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
				}
			}
		}
		$res = $this->set_work_status ( $work_id, $to_status );
		$notify_url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
		if ($to_status == 4) {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url,
					$_lang ['bid_cash'] => $this->_task_info ['real_cash']
			);
			$this->notify_user ( "task_bid", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		} elseif ($to_status == 5) {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url
			);
			$this->notify_user ( "work_rw", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		} else {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url
			);
			$this->notify_user ( "work_out", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		}
		$arrOutTask=db_factory::get_one(sprintf("select * from %switkey_task where task_status=3 and  task_id='%d'",TABLEPRE,$this->_task_id));
		$TaskWorkCount=db_factory::execute(sprintf("select * from %switkey_task_work where task_id='%d'",TABLEPRE,$this->_task_id));
		$TaskWorkOutCount=db_factory::execute(sprintf("select * from %switkey_task_work where task_id='%d' and work_status=7",TABLEPRE,$this->_task_id));
		if(($TaskWorkCount==$TaskWorkOutCount) && $arrOutTask){
			$this->dispose_task_return ();
		}
		if ($res) {
			return true;
		} else {
			return $_lang ['work'] . $status_arr [$to_status] . $_lang ['set_fail'];
		}
	}
	public function appWorkChoose($work_id, $to_status) {
		global $kekezu, $_K;
		global $_lang;
		$intWorkStatus = db_factory::get_count ( sprintf ( " select work_status from %switkey_task_work where work_id='%d' and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
		if ($intWorkStatus == '8') {
			app_class::response ( array (
					'ret' => 106
			) );
		} else {
			switch ($to_status) {
				case "4" : 
					$has_bidwork = db_factory::get_count ( sprintf ( " select count(work_id) from %switkey_task_work where work_status='4' and task_id = '%d' ", TABLEPRE, $this->_task_id ) );
					if ($has_bidwork) {
						app_class::response ( array (
								'ret' => 107
						) );
					} else {
						if ($intWorkStatus == '7') {
							app_class::response ( array (
									'ret' => 107
							) );
						}
					}
					break;
				case "5" : 
					switch ($intWorkStatus) {
						case "4" :
							app_class::response ( array (
									'ret' => 107
							) );
							break;
						case "5" :
							app_class::response ( array (
									'ret' => 107
							) );
							break;
						case "7" :
							app_class::response ( array (
									'ret' => 107
							) );
							break;
					}
					break;
				case "7" : 
					switch ($intWorkStatus) {
						case "4" :
							app_class::response ( array (
									'ret' => 107
							) );
							break;
						case "7" :
							app_class::response ( array (
									'ret' => 107
							) );
							break;
					}
					break;
			}
		}
		$status_arr = $this->get_work_status ();
		$task_info = $this->_task_info;
		$work_info = $this->get_task_work ( $work_id );
		if ($to_status == 4) {
			if ($this->_task_status == 7) {
				$cash_info = db_factory::get_one ( sprintf ( " select task_cash,task_union,real_cash from %switkey_task where task_id = '%d'", TABLEPRE, $this->_task_id ) );
				keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_info ['uid'], $this->_guid, $work_info ['work_id'], $cash_info ['task_cash'], $this->_task_id, $work_info ['username'], $this->_gusername );
				keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_info ['uid'], $work_info ['work_id'], $cash_info ['real_cash'], $this->_task_id, $this->_gusername, $work_info ['username'] );
				$this->plus_mark_num ();
				$site_profit = $cash_info ['task_cash'] - $cash_info ['real_cash'];
				$data = array (
						':task_id' => $this->_task_id,
						':task_title' => $this->_task_info ['task_title']
				);
				keke_finance_class::init_mem ( 'task_bid', $data );
				keke_finance_class::cash_in ( $work_info ['uid'], $cash_info ['real_cash'],  'task_bid', '', 'task', $this->_task_id, $site_profit );
				$this->set_task_status ( '8' );
				$feed_arr = array (
						"feed_username" => array (
								"content" => $work_info ['uid'],
								"url" => "index.php?do=seller&id={$work_info ['uid']}"
						),
						"action" => array (
								"content" => $_lang ['success_bid_haved'],
								"url" => ""
						),
						"event" => array (
								"content" => $this->_task_title,
								"url" => "index.php?do=task&id=$this->_task_id",
								'cash' => $cash_info ['real_cash']
						)
				);
				kekezu::save_feed ( $feed_arr, $work_info ['uid'], $work_info ['username'], 'work_accept', $this->_task_id );
				$this->plus_accepted_num ( $work_info ['uid'] );
			} else {
				if ($this->_task_config ['notice_period']) {
					$this->set_task_status ( '5' );
					$this->set_task_sp_end_time ();
				} else {
					if ($this->set_task_status ( 6 )) {
						$agree_id = $this->create_agree_date ( $work_info );
					}
				}
				$this->plus_accepted_num ( $work_info ['uid'] );
				$objProm = keke_prom_class::get_instance ();
				if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$objProm->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
				}
			}
		}
		$res = $this->set_work_status ( $work_id, $to_status );
		$notify_url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
		if ($to_status == 4) {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url,
					$_lang ['bid_cash'] => $this->_task_info ['real_cash']
			);
			$this->notify_user ( "task_bid", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		} elseif ($to_status == 5) {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url
			);
			$this->notify_user ( "work_rw", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		} else {
			$v = array (
					$_lang ['work_status'] => $status_arr [$to_status],
					$_lang ['task_id'] => $this->_task_id,
					$_lang ['task_title'] => $notify_url
			);
			$this->notify_user ( "work_out", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] );
		}
		if ($res) {
			app_class::response ( array (
					'ret' => 0,
					'agree_id'=>$agree_id
			) );
		} else {
			app_class::response ( array (
					'ret' => 1
			) );
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
			case "2" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['tools'] = true;
						$process_arr ['reqedit'] = true;
						sizeof ( $this->_delay_rule ) > 0 and $process_arr ['delay'] = true;
						$process_arr ['work_choose'] = true;
						$process_arr ['work_comment'] = true;
						break;
					case "0" :
						$process_arr ['work_hand'] = true;
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
						break;
					case "0" :
						$process_arr ['task_comment'] = true;
						$process_arr ['task_report'] = true;
						break;
				}
				$process_arr ['work_report'] = true;
				$uid and $process_arr ['work_vote'] = true;
				break;
			case "5" :
				switch ($g_uid == $uid) {
					case "1" :
						$process_arr ['work_comment'] = true;
						break;
					case "0" :
						$process_arr ['task_comment'] = true;
						$process_arr ['task_report'] = true;
						break;
				}
				$process_arr ['work_report'] = true;
				break;
			case "6" :
				$process_arr ['task_rights'] = true;
				if ($uid == $g_uid) {
					$process_arr ['work_rights'] = true;
				} else {
					$process_arr ['task_report'] = true;
				}
				$process_arr ['task_agree'] = true;
				break;
			case "7" :
				if ($uid == ADMIN_UID && $this->_task_config ['auto_choose_rule'] == 'master_choose') {
					$process_arr ['work_choose'] = true;
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
	public function set_work_status($work_id, $to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_task_work set work_status='%d' where work_id='%d'", TABLEPRE, $to_status, $work_id ) );
	}
	public function set_task_sp_end_time($time_type = 'notice_period') {
		$sp_end_time = time () + $this->_task_config [$time_type] * 24 * 3600;
		return db_factory::execute ( sprintf ( " update %switkey_task set sp_end_time = '%d' where task_id='%d'", TABLEPRE, $sp_end_time, $this->_task_id ) );
	}
	public function set_task_vote($work_id) {
		global $_lang;
		$resText = $this->check_if_voted ( $work_id);
		if ($resText === true) {
			$vote_obj = new Keke_witkey_vote_class ();
			$vote_obj->setTask_id ( $this->_task_id );
			$vote_obj->setWork_id ( $work_id );
			$vote_obj->setUid ( $this->_uid );
			$vote_obj->setUsername ( $this->_username );
			$vote_obj->setVote_ip ( kekezu::get_ip () );
			$vote_obj->setVote_time ( time () );
			$vote_id = $vote_obj->create_keke_witkey_vote ();
			if ($vote_id) {
				db_factory::execute ( sprintf ( " update %switkey_task_work set vote_num=vote_num+1 where work_id ='%d'", TABLEPRE, $work_id ) );
				return true;
			} else {
				return $_lang ['vote_fail'];
			}
		}else{
			return $resText;
		}
	}
	public function dispose_task_return($trust_response = false) {
		global $kekezu;
		global $_lang;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$task_cash = $task_info ['task_cash'];
		$fail_rate = $this->_fail_rate;
		$site_profit = $task_cash * $fail_rate / 100;
		$return_cash = $task_cash - $site_profit;
		if ( $return_cash) {
			$data = array (
					':model_name' => $this->_model_name,
					':task_id' => $this->_task_id,
					':task_title' => $this->_task_title
			);
			keke_finance_class::init_mem ( 'task_fail', $data );
			keke_finance_class::cash_in ( $this->_guid, $return_cash, 'task_fail', '', 'task', $this->_task_id, $site_profit );
		}
		if ($this->set_task_status ( 9 )) {
			$objProm = keke_prom_class::get_instance ();
			if ($objProm->is_meet_requirement ( "pub_task", $this->_task_id )) {
				$p_event = $objProm->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
				$objProm->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, intval ( $p_event ['event_id'] ), '3' );
			}
		}
		return $res;
	}
	public function time_hand_end() {
		global $_lang;
		if ($this->_task_status == 2 && $this->_task_info ['sub_time'] < time ()) {
			$arrOutTask=db_factory::get_one(sprintf("select * from %switkey_task where task_status=2 and  task_id='%d'",TABLEPRE,$this->_task_id));
			$TaskWorkCount=db_factory::execute(sprintf("select * from %switkey_task_work where task_id='%d'",TABLEPRE,$this->_task_id));
			$TaskWorkOutCount=db_factory::execute(sprintf("select * from %switkey_task_work where task_id='%d' and work_status=7",TABLEPRE,$this->_task_id));
			if(($TaskWorkCount==$TaskWorkOutCount) && $arrOutTask){
				$this->dispose_task_return ();
				return false;
			}
			if ($this->_task_info ['work_num']) {
				$this->set_task_status ( '3' );
			} else {
				$this->dispose_task_return ();
			}
		}
	}
	public function time_vote_end() {
		global $_K, $kekezu;
		global $_lang;
		if ($this->_task_status == 4 && $this->_task_info ['sp_end_time'] < time ()) {
			$bid_work = db_factory::get_one ( sprintf ( " select * from %switkey_task_work where work_status=5 and task_id ='%d' order by vote_num desc,work_time desc limit 0,1", TABLEPRE, $this->_task_id ) );
			if ($bid_work ['vote_num'] > 0) {
				if ($this->_task_config ['notice_period']) {
					$this->set_task_status ( '5' );
					$this->set_task_sp_end_time ();
				} else {
					if ($this->set_task_status ( 6 )) {
						$this->create_agree_date ( $bid_work );
					}
				}
				$this->set_work_status ( $bid_work ['work_id'], 4 );
				db_factory::execute ( sprintf ( " update %switkey_task set is_auto_bid='1' where task_id='%d'", TABLEPRE, $this->_task_id ) );
				db_factory::execute ( sprintf ( "update %switkey_task_work set work_status = 0 where work_status=5 and task_id='%d'", TABLEPRE, $this->_task_id ) );
				$this->set_task_sp_end_time ( "notice_period" );
				$this->plus_accepted_num ( $bid_work ['uid'] );
				$objProm = keke_prom_class::get_instance ();
				if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$objProm->create_prom_event ( "bid_task", $bid_work ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
				}
				$url = '<a href =\"' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '\" target=\"_blank\" >' . $this->_task_title . '</a>';
				$v = array (
						$_lang ['task_id'] => $this->_task_id,
						$_lang ['task_title'] => $url,
						$_lang ['bid_cash'] => $this->_task_info ['real_cash']
				);
				$this->notify_user ( "task_bid", $_lang ['work_vote_bid'], $v, 1, $bid_work ['uid'] );
				$feed_arr = array (
						"feed_username" => array (
								"content" => $bid_work ['username'],
								"url" => "index.php?do=seller&id={$bid_work['uid']}"
						),
						"action" => array (
								"content" => "成功中标了",
								"url" => ""
						),
						"event" => array (
								"content" => "$this->_task_title ",
								"url" => "index.php?do=task&id=$this->_task_id"
						)
				);
				kekezu::save_feed ( $feed_arr, $bid_work ['uid'], $bid_work ['username'], 'work_accept', $this->_task_id );
			} else {
				db_factory::execute ( sprintf ( " update %switkey_task_work set work_status='7' where work_status = '5' and task_id = '%d'", TABLEPRE, $this->_task_id ) );
				$this->dispose_task_return ();
			}
		}
	}
	public function time_choose_end() {
		global $kekezu;
		global $_lang;
		if ($this->_task_status == 3 && $this->_task_info ['end_time'] < time ()) {
			if ($this->_task_info ['work_num'] > 0) {
				$rw_work = $this->get_task_work ( '', '5' );
				$rw_count = intval ( count ( $rw_work ) );
				if ($rw_count == '1') {
					$this->set_work_status ( $rw_work ['0'] ['work_id'], 4 );
					$this->plus_accepted_num ( $rw_work ['0'] ['uid'] );
					$objProm = keke_prom_class::get_instance ();
					if ($objProm->is_meet_requirement ( "bid_task", $this->_task_id )) {
						$objProm->create_prom_event ( "bid_task", $rw_work ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
					}
					if ($this->_task_config ['notice_period']) {
						$this->set_task_status ( '5' );
						$this->set_task_sp_end_time ( "notice_period" );
					} else {
						if ($this->set_task_status ( 6 )) {
							$this->create_agree_date ( $rw_work ['0'] );
						}
					}
					db_factory::execute ( sprintf ( " update %switkey_task set is_auto_bid='1' where task_id='%d'", TABLEPRE, $this->_task_id ) );
					$v_arr = array (
							$_lang ['username'] => '$this->_gusername',
							$_lang ['model_name'] => $this->_model_name,
							$_lang ['task_id'] => $this->_task_id,
							$_lang ['task_title'] => $this->_task_title,
							$_lang ['reason'] => $_lang ['xg_timeout'],
							$_lang ['time'] => date ( 'Y-m-d,H:i:s', time () ),
							'next' => $_lang ['gs']
					);
					keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'timeout', $_lang ['timeout_sys_default_in_and_bid'], $v_arr );
				} elseif ($rw_count > 1) {
					$this->set_task_status ( 4 );
					$this->set_task_sp_end_time ( "vote_period" );
					$v_arr = array (
							$_lang ['username'] => '$this->_gusername',
							$_lang ['model_name'] => $this->_model_name,
							$_lang ['task_id'] => $this->_task_id,
							$_lang ['task_title'] => $this->_task_title,
							$_lang ['reason'] => $_lang ['xg_timeout'],
							$_lang ['time'] => date ( 'Y-m-d,H:i:s', time () ),
							'next' => $_lang ['task_vote']
					);
					keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'timeout', $_lang ['timeout_sys_default_vote_status'], $v_arr );
				} else {
					$this->auto_choose ();
				}
			} else {
				$this->dispose_task_return ();
			}
		}
	}
	public function time_notice_end() {
		global $_K;
		global $_lang;
		$work_info = $this->get_task_work ( '', '4' );
		$work_info = $work_info ['0'];
		if ($this->_task_status == 5 && time () > $this->_task_info ['sp_end_time']) {
			if ($this->set_task_status ( 6 )) {
				$this->create_agree_date ( $work_info );
			}
		}
	}
	public function create_agree_date($work_info) {
		global $_lang, $_K;
		$agree_title = $this->_task_title . '-' . $work_info ['work_id'];
		$agree_id = keke_task_agreement::create_agreement ( $agree_title, $this->_model_id, $this->_task_id, $work_info ['work_id'], $this->_guid, $work_info ['uid'] );
		$a_url = '<a href="' . $_K ['siteurl'] . '/index.php?do=agreement&taskId='.$this->_task_id.'&agreeId=' . $agree_id . '">' . $agree_title . '</a>';
		$notice = $_lang ['task_in_jf_stage'];
		$s_arr = array (
				$_lang ['agreement_link'] => $a_url,
				$_lang ['agreement_status'] => $notice
		);
		$b_arr = array (
				$_lang ['agreement_link'] => $a_url,
				$_lang ['agreement_status'] => $notice
		);
		$this->notify_user ( "agreement", '任务进入交付阶段', $s_arr, 1, $work_info ['uid'] );
		$this->notify_user ( "agreement", $_lang ['task_in_jf_stage'], $b_arr, 2, $this->_guid );
		return $agree_id;
	}
	public function auto_choose() {
		global $_K, $kekezu;
		global $_lang;
			switch ($this->_task_config ['end_action']) {
				case "refund" :
					$this->dispose_task_return ();
					break;
				case "split" :
					$bid_uid = array ();
					$task_info = $this->_task_info;
					$split_num = intval ( $this->_task_config ['witkey_num'] );
					if ($split_num) {
						$single_cash =  $task_info ['task_cash'] / $split_num;
						$prom_obj = $objProm = keke_prom_class::get_instance ();
						$site_profit = $single_cash * $this->_profit_rate / 100;
						$cash = $single_cash - $site_profit;
						$split_style = $this->_task_config ['auto_choose_rule'];
						if (in_array ( $split_style, array (
								'work_time',
								'take_num',
								'seller_credit'
						) )) {
							switch ($split_style) {
								case "work_time" :
									$order_field = "a.work_time asc";
									break;
								case "take_num" :
									$order_field = "c.take_num desc";
									break;
								case "seller_credit" :
									$order_field = "c.seller_credit desc";
									break;
							}
							$sql = "select a.*,b.oauth_id from %switkey_task_work a left join %switkey_member_oauth b on a.uid=b.uid
									left join %switkey_space c on a.uid=c.uid
								where a.task_id='%d' and a.work_status='0' order by %s,a.work_time asc limit 0,%d";
							$work_list = db_factory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE, TABLEPRE, $this->_task_id, $order_field, $split_num ) );
							$key = array_keys ( $work_list );
							$count = sizeof ( $key );
							for($i = 0; $i < $count; $i ++) {
								$data = array (
										':task_id' => $this->_task_id,
										':task_title' => $this->_task_title
								);
								keke_finance_class::init_mem ( 'task_bid', $data );
								keke_finance_class::cash_in ( $work_list [$i] ['uid'], $cash, 'task_bid', '', 'task', $this->_task_id, $site_profit );
								$this->set_work_status ( $work_list [$i] ['work_id'], 4 );
								if ($prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
									$prom_obj->create_prom_event ( "bid_task", $work_list [$i] ['uid'], $this->_task_id, $single_cash );
									$prom_obj->dispose_prom_event ( "bid_task", $work_list [$i] ['uid'], $work_list [$i] ['work_id'] );
								}
								$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '">' . $this->_task_title . '</a>';
								$v = array (
										$_lang ['task_id'] => $this->_task_id,
										$_lang ['task_title'] => $url
								);
								$this->notify_user ( "auto_choose", $_lang ['task_auto_choose_bid'], $v, 1, $work_list [$i] ['uid'] );
								keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_list [$i] ['uid'], $this->_guid, $work_list [$i] ['work_id'], $single_cash, $this->_task_id, $work_list [$i] ['username'], $this->_gusername );
								keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_list [$i] ['uid'], $work_list [$i] ['work_id'], $cash, $this->_task_id, $this->_gusername, $work_list [$i] ['username'] );
								$feed_arr = array (
										"feed_username" => array (
												"content" =>$work_list [$i] ['uid'],
												"url" => "index.php?do=seller&id={$work_list [$i] ['uid']}"
										),
										"action" => array (
												"content" => $_lang ['success_bid_haved'],
												"url" => ""
										),
										"event" => array (
												"content" => $this->_task_title,
												"url" => "index.php?do=task&id=$this->_task_id",
												'cash' =>$cash
										)
								);
								kekezu::save_feed ( $feed_arr,$work_list [$i] ['uid'], $work_list [$i] ['username'], 'work_accept', $this->_task_id );
								$this->plus_accepted_num ( $work_list [$i] ['uid'] );
								$this->plus_mark_num ();
								$bid_uid [] = $work_list [$i] ['uid'];
							}
							if ($split_num > $count) {
								$remain_cash = $task_info ['task_cash'] - $count * $single_cash;
								$res = $this->dispose_auto_return ( $remain_cash );
								if ($res) {
									$v = array (
											$_lang ['task_id'] => $this->_task_id,
											$_lang ['task_title'] => $url
									);
									$this->notify_user ( "auto_choose", $_lang ['task_auto_choose_work_and_return'], $v, 2, $this->_guid );
								}
							}
							$this->set_task_status ( 8 );
							$prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
						} elseif ($split_style == 'master_choose') {
							$this->set_task_status ( 7 );
						}
					} else {
						$this->dispose_task_return ();
					}
					break;
			}
		$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id . '">' . $this->_task_title . '</a>';
		$v_arr = array (
				$_lang ['username'] => '$this->_gusername',
				$_lang ['model_name'] => $this->_model_name,
				$_lang ['task_id'] => $this->_task_id,
				$_lang ['task_title'] => $url
		);
		keke_msg_class::notify_user ( $this->_guid, $this->_gusername, 'auto_choose', $_lang ['aito_choose_work_notice'], $v_arr );
	}
	public function dispose_auto_return($remain_cash) {
		global $kekezu;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$fail_rate = $this->_fail_rate;
		$site_profit = $remain_cash * $fail_rate / 100;
		$return_cash = $remain_cash - $site_profit;
		$data = array (
				':model_name' => $this->_model_code,
				':task_id' => $this->_task_id,
				':task_title' => $this->_task_title
		);
		keke_finance_class::init_mem ( 'task_auto_return', $data );
		return keke_finance_class::cash_in ( $this->_guid, $return_cash, 'task_auto_return', '', 'task', $this->_task_id, $site_profit );
	}
	public function check_if_operated($work_id, $to_status) {
		global $_lang;
		if (true === $this->check_if_can_choose ()) {
			$intWorkStatus = db_factory::get_count ( sprintf ( " select work_status from %switkey_task_work where work_id='%d' and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
			if ($intWorkStatus == '8') {
				return $_lang ['the_work_is_not_choose_and_not_choose_the_work'];
			} else {
				switch ($to_status) {
					case "4" :
						$has_bidwork = db_factory::get_count ( sprintf ( " select count(work_id) from %switkey_task_work where work_status='4' and task_id = '%d' ", TABLEPRE, $this->_task_id ) );
						if ($has_bidwork) {
							return $_lang ['task_have_bid_work_and_not_choose_the_work'];
						} else {
							if ($intWorkStatus == '7') {
								return $_lang ['the_work_is_out_and_not_choose_the_work'];
							} else {
								return true;
							}
						}
						break;
					case "5" :
						switch ($intWorkStatus) {
							case "4" :
								return $_lang ['the_work_haved_bid_and_not_change_stutus_to_in'];
								break;
							case "5" :
								return $_lang ['the_work_haved_in_and_not_repeat'];
								break;
							case "7" :
								return $_lang ['the_work_is_bid_and_not_change_status_to_in'];
								break;
						}
						return true;
						break;
					case "7" :
						switch ($intWorkStatus) {
							case "4" :
								return $_lang ['the_work_is_bid_and_not_change_status'];
								break;
							case "7" :
								return $_lang ['the_work_is_out_and_not_repeat'];
								break;
						}
						return true;
						break;
				}
			}
		} else {
			return $_lang ['now_status_can_not_choose'];
		}
	}
	public function check_start_vote($url = '', $output = 'normal') {
		global $_lang;
		if ($this->_uid != $this->_guid) {
			kekezu::keke_show_msg ( $url, $_lang ['start_vote_fail_and_employer_can_vote'], "error", $output );
		} else {
			if (! $this->_process_can ['task_vote']) {
				kekezu::keke_show_msg ( $url, $_lang ['work_num_limit_notice'], "error", $output );
			} else {
				return true;
			}
		}
	}
	public function check_if_voted($work_id) {
		global $_lang;
		$vote_count = db_factory::get_count ( sprintf ( " select count(vote_id) from %switkey_vote where
		 work_id='%d' and uid='%d' and vote_ip='%s'", TABLEPRE, $work_id, $this->_uid, kekezu::get_ip () ) );
		if ($vote_count > 0) {
			return $_lang ['you_have_vote'];
		} else {
			return true;
		}
	}
	public static function get_task_status() {
		global $_lang;
		return array (
				"0" => $_lang ['task_no_pay'],
				"1" => $_lang ['task_wait_audit'],
				"2" => $_lang ['task_vote_choose'],
				"3" => $_lang ['task_choose_work'],
				"4" => $_lang ['task_vote'],
				"5" => $_lang ['task_gs'],
				"6" => $_lang ['task_jfing'],
				"7" => $_lang ['freeze'],
				"8" => $_lang ['task_over'],
				"9" => $_lang ['fail'],
				"10" => $_lang ['task_audit_fail'],
				"11" => $_lang ['arbitrate'],
				'13' => $_lang ['agreement_frozen']
		);
	}
	public static function get_work_status() {
		global $_lang;
		return array (
				'0' => $_lang ['wait_choose'],
				'4' => $_lang ['task_bid'],
				'5' => $_lang ['task_in'],
				'7' => $_lang ['task_out'],
				'8' => $_lang ['task_can_not_choose_bid']
		);
	}
	public function dispose_order($order_id, $trust_response = false) {
		global $kekezu, $uid, $username, $_K;
		global $_lang;
		$response = array ();
		$task_config = $this->_task_config;
		$task_info = $this->_task_info;
		$url = $_K ['siteurl'] . '/index.php?do=task&id=' . $this->_task_id;
		$task_status = $this->_task_status;
		$order_info = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_order where order_id=" . intval ( $order_id ) );
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
				}
				if($v['obj_type']=='task'&&$v['detail_type']){
					PayitemClass::createPayitemRecord($v['detail_type'],$v['num'],$v['obj_type'],$v['obj_id']);
				}
			}
			switch ($res == true) {
				case "1" :
					keke_glob_class::updateLog('3.'.$order_info['order_status']);
					$objProm = keke_prom_class::get_instance ();
					if ($objProm->is_meet_requirement ( "pub_task", $this->_task_id )) {
						$objProm->create_prom_event ( "pub_task", $this->_guid, $task_info ['task_id'], $task_info ['task_cash'] );
					}
					db_factory::updatetable ( TABLEPRE . "witkey_order", array (
							"order_status" => "ok"
					), array (
							"order_id" => "$order_id"
					) );
					keke_order_class::update_fina_order ( $res, $order_id );
					$consume = kekezu::get_cash_consume ( $task_info ['task_cash'] );
					db_factory::execute ( sprintf ( " update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'", TABLEPRE, $consume ['cash'], $consume ['credit'], $this->_task_id ) );
					keke_glob_class::updateLog('4.'.$task_config ['audit_cash']);
					if ($order_amount < $task_config ['audit_cash'] && ! $this->_trust_mode) {
						keke_glob_class::updateLog('5.'.$order_info['order_status']);
						$this->set_task_status ( 1 );
						return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_wait_admin_audit'], $url, 'alert_right' );
					} else {
						keke_glob_class::updateLog('6.'.$order_info['order_status']);
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
						return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_task_pub_success'], $url, 'alert_right' );
					}
					break;
				case "0" :
					$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id";
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $pay_url, 'alert_error' );
					break;
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
				break;
			case 3 :
				$button ['view'] ['desc'] = $_lang ['choose_work'];
				$button ['view'] ['href'] = $site . 'index.php?do=task&id=' . $t_id . '&view=work';
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				break;
			case 4 :
				$button ['view'] ['desc'] = $_lang ['vote'];
				$button ['view'] ['href'] = $site . 'index.php?do=task&id=' . $t_id . '&view=work';
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				break;
			case 5 :
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
				break;
			case 6 :
				$agree_id = db_factory::get_count ( sprintf ( ' select agree_id from %switkey_agreement where task_id=%d and buyer_uid=%d', TABLEPRE, $t_id, $uid ) );
				$button ['agree'] = array (
						'href' => $site . 'index.php?do=agreement&taskId='.$t_id.'&agreeId=' . $agree_id,
						'desc' => $_lang ['view_delive'],
				);
				if(TOOL === TRUE){
					$button ['tool'] = array (
							'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
							'desc' => '增值工具'
									);
				}
				break;
			case 13 :
				$agree_id = db_factory::get_count ( sprintf ( ' select agree_id from %switkey_agreement where task_id=%d and buyer_uid=%d', TABLEPRE, $t_id, $uid ) );
				$button ['agree'] = array (
						'href' => $site . 'index.php?do=agreement&taskId='.$t_id.'&agreeId=' . $agree_id,
						'desc' => $_lang ['view_delive'],
				);
				if(TOOL === TRUE){
				$button ['tool'] = array (
						'href'=>"javascript:payitem('task','{$t_id}','{$uid}');void(0);",
						'desc' => '增值工具'
								);
				}
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
		$model_id = db_factory::get_count ( sprintf ( ' select model_id from %switkey_task where task_id=%d', TABLEPRE, $t_id, $uid ), 0, 'model_id', 600 );
		$intWorkStatus = db_factory::get_count ( sprintf ( ' select work_status from %switkey_task_work where work_id=%d', TABLEPRE, $w_id, $uid ), 0, 'work_status', 600 );
		$site = $_K ['siteurl'] . '/';
		$button = array ();
		$button ['view'] = array (
				'href' => $site . 'index.php?do=taskhandle&op=workinfo&taskId=' . $t_id . '&workId=' . $w_id,
				'desc' => '查看稿件',
				'ico' => 'book'
		);
		switch ($status) {
			case 2 :
             break;
			case 6 :
			case 13 :
				if ($intWorkStatus == 4 && $model_id == 1) {
					$agree_id = db_factory::get_count ( sprintf ( ' select agree_id from %switkey_agreement where task_id=%d and seller_uid=%d', TABLEPRE, $t_id, $uid ) );
					$button ['agree'] = array (
							'href' => $site . 'index.php?do=agreement&taskId='.$t_id.'&agreeId=' . $agree_id,
							'desc' => $_lang ['view_delive'],
					);
				}
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