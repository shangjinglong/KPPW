<?php
keke_lang_class::load_lang_class ( 'keke_task_release_class' );
abstract class keke_task_release_class {
	public $_uid;
	public $_username;
	public $_user_info; 
	public $_kf_info; 
	public $_priv; 
	public $_default_max_day; 
	public $_pub_mode; 
	public $_model_id; 
	public $_model_info; 
	public $_task_config; 
	public $_pay_item; 
	public $_inited = false;
	public $_task_obj; 
	public $_std_obj; 
	function __construct($model_id, $pub_mode = 'professional') {
		global $kekezu;
		$this->_task_obj = new Keke_witkey_task_class ();
		$this->_model_id = $model_id;
		$this->_pub_mode = $pub_mode;
		$this->_model_info = $kekezu->_model_list [$model_id];
		$this->_std_obj = new stdClass ();
		$this->_std_obj->_release_info = array (); 
		$this->init ();
	}
	function init() {
		if (! $this->_inited) {
			$this->user_info_init ();
			$this->get_rand_kf ();
		}
		$this->_inited = true;
	}
	function user_info_init() {
		global $user_info, $uid, $username;
		$this->_user_info = $user_info;
		$this->_uid = $uid;
		$this->_username = $username;
	}
	public function get_rand_kf() {
		$this->_kf_info = kekezu::get_rand_kf ();
	}
	public function get_bind_indus() {
		global $kekezu;
		if ($this->_model_info ['indus_bid']) {
			$bind_indus = implode ( ',', array_filter ( explode ( ',', $this->_model_info ['indus_bid'] ) ) );
			return kekezu::get_table_data ( '*', "witkey_industry", "indus_id in (select indus_pid from " . TABLEPRE . "witkey_industry where indus_id in({$bind_indus}))", 'CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END', '', '', 'indus_id', null );
		} else {
			return $this->_indus_arr = $kekezu->_indus_p_arr;
		}
	}
	public function get_task_indus($indus_pid = '', $ajax = '') {
		global $kekezu;
		global $_lang;
		if ($indus_pid > 0) {
			if ($this->_model_info ['indus_bid']) {
				$indus_ids = kekezu::get_table_data ( '*', "witkey_industry", "indus_id in ({$this->_model_info['indus_bid']}) and indus_pid = $indus_pid", 'CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END', '', '', 'indus_id', null );
			} else {
				$indus_ids = kekezu::get_table_data ( '*', "witkey_industry", " indus_pid = $indus_pid", 'CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END', '', '', 'indus_id', null );
			}
			switch ($ajax == 'show_indus') {
				case "0" :
					return $indus_ids;
					break;
				case "1" :
					$option .= '<option value=""> ' . $_lang ['please_son_industry'] . ' </option>';
					foreach ( $indus_ids as $v ) {
						$option .= '<option value=' . $v [indus_id] . '>' . $v [indus_name] . '</option>';
					}
					echo $option;
					die ();
					break;
			}
		} else
			return false;
	}
	function save_task_file($task_id, $title) {
		$release_info = $this->_std_obj->_release_info;
		if ($release_info ['file_ids']) {
			$file_obj = new Keke_witkey_file_class ();
			$file_arr = array_filter ( explode ( '|', $release_info ['file_ids'] ) );
			foreach ( $file_arr as $v ) {
				$file_obj->setFile_id ( $v );
				$file_obj->setUid ( $this->_uid );
				$file_obj->setUsername ( $this->_username );
				$file_obj->setTask_id ( $task_id );
				$file_obj->setTask_title ( $title );
				$file_obj->edit_keke_witkey_file ();
			}
		}
	}
	public function notify_user($task_id, $task_status = '2') {
		global $_K;
		global $_lang;
		$task_obj = $this->_task_obj;
		$model_code = $this->_model_info ['model_code'];
		$status_arr = call_user_func ( array ($model_code . "_task_class", 'get_task_status' ) ); 
		$url = '<a href="' . $_K ['siteurl'] . '/index.php?do=task&id=' . $task_id . '"  target="_blank">' . $task_obj->getTask_title () . '</a>';
		$v = array ('model_name'=>$this->_model_info['model_name'],'task_id' => $task_id, $_lang['task_title'] =>$task_obj->getTask_title () ,$_lang['task_id']=>$task_id, $_lang ['task_link'] => $url, $_lang ['task_status'] => $status_arr [$task_status], $_lang ['start_time'] => date ( 'Y-m-d H:i:s', $task_obj->getStart_time () ), $_lang ['hand_work_timeout'] => date ( 'Y-m-d H:i:s', $task_obj->getSub_time() ), $_lang ['choose_timeout'] => date ( 'Y-m-d H:i:s', $task_obj->getEnd_time() ) );
		keke_msg_class::notify_user($this->_uid, $this->_username, "task_pub", $_lang ['pub_task_notice'],$v);
	}
	public function set_task_status($total_cash, $task_cash) {
		global $kekezu;
		$basic_config = $kekezu->_sys_config;
		$balance = $this->_user_info ['balance'];
		$credit = $this->_user_info ['credit'];
		$credit = 0;
		$kekezu->_sys_config['credit_is_allow']==1 and $credit = $this->_user_info ['credit'];
		if ($balance + $credit >= $total_cash) { 
			$model_code = $this->_model_info ['model_code'];
			switch ($model_code) {
				case "tender" :
					$this->_task_config ['zb_audit'] == 2 and $task_status = "2" or $task_status = "1";
					break;
				case "match" :
					$task_status = "2";
					break;
				default :
					if ($task_cash >= $this->_task_config ['audit_cash']) { 
						$task_status = '2'; 
					} elseif ($task_cash < $this->_task_config ['audit_cash']) { 
						$task_status = "1"; 
					}
					if ($basic_config ['credit_is_allow'] == '2') { 
						$cash_cost = $task_cash;
						$credit_cost = '0';
					} else { 
						if ($credit >= $task_cash) { 
							$credit_cost = $task_cash;
							$cash_cost = '0';
						} else {
							$credit_cost = $credit;
							$cash_cost = $task_cash - $credit;
						}
					}
			}
		} else {
			$task_status = "0"; 
		}
		$this->_task_obj->setTask_status ( $task_status ); 
		$this->_task_obj->setCash_cost ( $cash_cost ); 
		$this->_task_obj->setCredit_cost ( $credit_cost ); 
	}
	private function submit_check() {
		global $kekezu, $_lang;
		$std_obj = $this->_std_obj; 
		$r_info = $std_obj->_release_info; 
		if($r_info){
			if(!$r_info[txt_title]||!$r_info[indus_id]||!$r_info[indus_pid]){
				kekezu::show_msg ( $_lang ['operate_notice'], $_SERVER ['HTTP_REFERER'], 3, $_lang ['key_information_missed'], 'warning' );
			}
		}else{
			kekezu::show_msg ( $_lang ['operate_notice'], $_SERVER ['HTTP_REFERER'], 3, $_lang ['key_information_missed'], 'warning' );
		}
	}
	public function public_pubtask() {
	    $this->submit_check ();
		$std_obj = $this->_std_obj; 
		$release_info = $std_obj->_release_info; 
		$task_obj = $this->_task_obj; 
		$user_info = $this->_user_info;
		$task_obj->setModel_id ( $this->_model_id );
		$task_obj->setIndus_id ( $release_info ['indus_id'] );
		$task_obj->setIndus_pid ( $release_info ['indus_pid'] );
		$task_obj->setTask_title ( kekezu::str_filter ( kekezu::escape($release_info ['txt_title']) ) );
		$task_obj->setTask_desc  ( kekezu::str_filter ( kekezu::escape($release_info ['tar_content'] ) ) ); 
		$strFileIds = implode ( ',', array_filter ( explode ( '|', $release_info ['file_ids'] ) ) );
		$task_obj->setTask_file ( $strFileIds );
		$task_obj->setTask_pic($this->filerPic($strFileIds));
		$task_obj->setContact ( $release_info['txt_mobile'] );
		$task_obj->setProfit_rate ( $this->_task_config ['task_rate'] );
		$task_obj->setTask_fail_rate ( $this->_task_config ['task_fail_rate'] );
		$task_obj->setTask_cash ( $release_info ['txt_task_cash']); 
		$task_obj->setReal_cash ( $release_info ['txt_task_cash'] * (100 - $this->_task_config ['task_rate']) / 100); 
		$task_obj->setStart_time ( time () ); 
		$time_arr = getdate ();
		$rel_time = $time_arr ['hours'] * 3600 + $time_arr ['minutes'] * 60 + $time_arr ['seconds'];
		$task_obj->setSub_time ( strtotime ( $release_info ['txt_task_day'] ) + $rel_time ); 
		$task_obj->setEnd_time ( strtotime ( $release_info ['txt_task_day'] ) + $this->_task_config ['choose_time'] * 24 * 3600 + $rel_time ); 
		$task_obj->setUid ( $this->_uid );
		$task_obj->setUsername ( $this->_username );
		$task_obj->setTask_status(0);
		$task_obj->setCash_cost($release_info ['txt_task_cash']);
		$task_obj->setKf_uid ( $this->_kf_uid ); 
	}
	public function filerPic($file_ids){
		global $_K;
		if($file_ids){
			$exts = array('gif','jpg','jpeg','png');
			$info = db_factory::query(' select file_name,save_name from '.TABLEPRE.'witkey_file where file_id in ('.$file_ids.')');
			$pic  = array();
			foreach($info as $v){
				$t = explode('.',$v['file_name']);
				$ext = strtolower($t[sizeof($t)-1]);
				if(in_array($ext,$exts)){
					$pic[] = $_K['siteurl'].'/'.$v['save_name'];
				}
			}
			return implode(',',$pic);
		}else{
			return NULL;
		}
	}
	public function update_task_info($task_id, $obj_name) {
		global $_K, $_lang,$uid,$username;
		$std_obj = $this->_std_obj;
		$release_info = $std_obj->_release_info; 
		$att_info = $release_info['payitem']; 
		$user_info = $this->_user_info; 
		$task_obj = $this->_task_obj; 
		db_factory::execute ( "update " . TABLEPRE . "witkey_space set pub_num = pub_num+1 where uid=$this->_uid " );
		$release_info ['file_ids'] and $this->save_task_file ( $task_id, $release_info ['txt_title'] );
		$task_status = $task_obj->getTask_status (); 
		$task_title = $task_obj->getTask_title ();
		if(in_array($this->_model_info ['model_code'],array('sreward','mreward','preward'))){
			$task_cash = $task_obj->getTask_cash();
		}else{
			$task_cash = $task_obj->getTask_cash_coverage();
		}
		$order_id = $this->create_task_order ( $task_id, $this->_model_id, $release_info,'wait' );
		if(floatval($release_info ['hdn_total_costs']) >= 0){
			$this->createPayitemOrder($task_id,$release_info['payitem'],$order_id);
		}
		$this->create_prom_event ( $task_id );
		$this->del_task_obj ( $obj_name );
	}
	public function create_prom_event($task_id) {
		global $kekezu;
		$task_obj = $this->_task_obj;
		if ($this->_model_info ['model_code'] != 'tender') {
			$this->_model_info ['model_code'] == 'dtender' and $task_cash = $task_obj->getReal_cash () or $task_cash = $task_obj->getTask_cash ();
			$prom_obj =	keke_prom_class::get_instance ();
			if ($prom_obj->is_meet_requirement ( "pub_task", $task_id )) {
				$prom_obj->create_prom_event ( "pub_task", $this->_uid, $task_id, $task_cash );
			}
		}
	}
	public function createPayitemOrder($task_id,$att_info,$order_id) {
		if (! empty ( $att_info )) {
			PayitemClass::creatPayitemOrder($att_info, 'task', $task_id,$order_id);
		}
	}
	public abstract function get_task_config();
	public abstract function pub_task();
	public abstract function pub_mode_init($std_cache_name, $data = array());
	public function create_task_order($task_id, $model_id, $release_info, $order_status = 'ok') {
		global $uid, $username;
		global $_lang;
		$oder_obj = new Keke_witkey_order_class (); 
		$order_detail = new Keke_witkey_order_detail_class (); 
		$task_cash = floatval($release_info ['txt_task_cash']);
		$att_cash = floatval($release_info ['hdn_total_costs']);
		$order_name = $release_info ['txt_title']; 
		if($att_cash > 0){
			$order_amount  = $task_cash + $att_cash;
		}else{
			$order_amount = $task_cash;
		}
		$order_body = $_lang ['pub_task'] . "<a href=\"index.php?do=task&id=$task_id\">" . $order_name . "</a>"; 
		$order_amount>0 and $order_id = keke_order_class::create_order ( $model_id, $uid, $username, $order_name, $order_amount, $order_body, $order_status );
		if ($order_id) {
			$task_cash>0 and keke_order_class::create_order_detail ( $order_id, $release_info ['txt_title'], 'task', intval ( $task_id ), $task_cash );
			if ($this->_task_obj->getTask_status () != 0) {
					$this->_model_info ['model_code'] == 'tender' and $site_profit = $task_cash;
					$taskinfo = $this->_task_obj;
			}
			return $order_id;
		}
	}
	public function save_task_obj($release_info = array(), $obj_name) {
		global $kekezu,$_lang;
		empty ( $release_info ) or $this->_std_obj->_release_info = $release_info; 
		if($release_info['txt_task_cash']<0){
			kekezu::show_msg($_lang['operate_notice'],'index.php?do=pubtask',3,$_lang['task_cash_negatvie'],'warning');
		}
		$this->_model_info ['model_code'] == 'tender' and $this->_std_obj->_release_info ['txt_task_cash'] = $this->_task_config [zb_fees];
		$_SESSION [$obj_name] = serialize ( $this->_std_obj ); 
	}
	public function get_task_obj($obj_name) {
		$_SESSION [$obj_name] and $this->_std_obj = unserialize ( $_SESSION [$obj_name] );
	}
	public function del_task_obj($obj_name) {
		if (isset ( $_SESSION [$obj_name] )) {
			unset ( $_SESSION [$obj_name] );
		}
	}
	public function check_access($r_step, $model_id, $release_info, $task_id = null, $output = 'normal') {
		global $_lang,$gUid,$uid;
		switch ($r_step) {
			case "step1" :
				break;
			case "step2" : 
				$release_info ['step1'] or kekezu::keke_show_msg ( "index.php?do=pubtask&id=$model_id", $_lang ['you_not_choose_task_model'], "error", $output );
				break;
			case "step3" : 
				if (! $release_info ['step2'] && ! $release_info ['step1']) { 
					kekezu::keke_show_msg ( "index.php?do=pubtask&id=$model_id", $_lang ['you_not_choose_task_model_and_not_in'], "error", $output );
				} elseif (! $release_info ['step2']) {
					kekezu::keke_show_msg ( "index.php?do=pubtask&id=$model_id&step=step2", $_lang ['you_not_fill_requirement_and_not_in'], "error", $output );
				}
				break;
			case "step4" : 
				$sql = sprintf ( " select * from %switkey_task where task_id = '%d' ", TABLEPRE, $task_id );
				$task_info = db_factory::get_one ( $sql );
				if($task_info['uid'] != $uid){
					kekezu::keke_show_msg ( "index.php?do=pubtask", '你没有权限访问该页面', "error", $output );
				}
				$task_info or kekezu::keke_show_msg ( "index.php?do=pubtask", $_lang ['the_page_timeout_notice'], "error", $output );
				return $task_info;
				break;
		}
	}
	public function onekey_mode_format($data) {
		return array ("txt_title" => $data ['task_title'], "tar_content" => $data ['task_desc'], "indus_id" => $data ['indus_id'], "indus_pid" => $data ['indus_pid'], "step1" => '1',"txt_mobile"=>$data['contact']);
	}
	public function check_pub_priv($url = '', $output = "normal") {
		global $_lang;
		if($this->_priv ['pass']){
           return true;
		}else{
           return $this->_priv ['notice'] . $_lang ['not_rights_pub_task'];
		}
	}
	public static function get_default_max_day($task_cash, $model_id, $min_day) {
		$max = kekezu::get_show_day ( floatval ( $task_cash ), $model_id );
		if($max){
			$max >= $min_day or $max += $min_day;
			return date ( 'Y-m-d', time () + $max * 24 * 3600 );
		}else{
			return false;
		}
	}
	public function checkWhetherToPay($intTaskId){
		$floatBalance 	= floatval($this->_user_info ['balance']);
		$arrConfig 		= $this->_task_config;
		$arrTaskInfo 	= $this->getTaskInfoByTaskId($intTaskId,'task_id,model_id,task_cash');
		$intModelId 	= intval($arrTaskInfo['model_id']);
		if(in_array($intModelId, array(1,2,3))){
			$floatTaskCash 	= floatval($arrTaskInfo['task_cash']);
		}else{
			if($intModelId===4){
				$floatTaskCash 	= floatval($arrConfig['zb_fees']);
			}else{
				$floatTaskCash 	= floatval($arrConfig['deposit']);
			}
		}
		$payitemOrderInfo 	= PayitemClass::getPayitemOrderAmountByObjId($intTaskId);
		if(floatval($payitemOrderInfo['order_amount'])>0){
			$floatTotalCash = floatval($payitemOrderInfo['order_amount']);
		}else{
			$floatTotalCash = $floatTaskCash ;
		}
		$arrInfo['total_cash'] = $floatTotalCash;
		if($floatBalance >= $floatTotalCash){
			$arrInfo['balance_pay'] = true;
		}else{
			$arrInfo['balance_pay'] = false;
		}
		return $arrInfo;
	}
	public function getTaskInfoByTaskId($intTaskId,$strFields = NULL){
		if($strFields){
			$strFields = trim($strFields);
		}else{
			$strFields = '*';
		}
		return db_factory::get_one(' select '.$strFields.' from '.TABLEPRE.'witkey_task where task_id = '.intval($intTaskId));
	}
}