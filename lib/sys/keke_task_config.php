<?php
keke_lang_class::load_lang_class('keke_task_config');
class keke_task_config {
	public static function get_time_rule($model_id, $cache_time = null) {
		return kekezu::get_table_data ( "*", "witkey_task_time_rule", "model_id='$model_id'", "rule_cash", "", "", "", "", $cache_time );
	}
	public static function get_delay_rule($model_id, $cache_time = null) {
		return kekezu::get_table_data ( "*", "witkey_task_delay_rule", "model_id='$model_id'", "defer_times", "", "", "", $cache_time );
	}
	public static function set_time_rule($model_id, $timeOld = array(), $timeNew = array()) {
		if (is_array ( $timeOld )) {
			foreach ( $timeOld as $k => $v ) {
				$res = db_factory::execute ( sprintf ( " update %switkey_task_time_rule set rule_day='%d',rule_cash='%s' where day_rule_id='%d' and model_id='%d'", TABLEPRE, $v ['rule_day'], $v ['rule_cash'], $k, $model_id ) );
			}
		}
		if (is_array ( $timeNew )) {
			foreach ( $timeNew as $v2 ) {
				! empty ( $v2['rule_day'] )&&!empty($v2['rule_cash']) and $res = db_factory::execute ( sprintf ( " insert into %switkey_task_time_rule values('','%f','%d','%d')", TABLEPRE,  floatval ( $v2 ['rule_cash'] ), intval ( $v2 ['rule_day'] ),$model_id ) );
			}
		}
		return $res;
	}
	public static function set_delay_rule($model_id, $delayOld = array(), $delayNew = array()) {
		if (is_array ( $delayOld )) {
			foreach ( $delayOld as $k => $v ) {
				$res = db_factory::execute ( sprintf ( " update %switkey_task_delay_rule set defer_rate='%d' where defer_rule_id='%d' and model_id='%d'", TABLEPRE, $v ['defer_rate'], $k, $model_id ) );
			}
		}
		if (is_array ( $delayNew )) {
			foreach ( $delayNew as $v2 ) {
				! empty ( $v2['defer_times'] )&&!empty($v2['defer_rate']) and $res = db_factory::execute ( sprintf ( " insert into %switkey_task_delay_rule values('','%d','%s','%d')", TABLEPRE, intval ( $v2 ['defer_times'] ), intval ( $v2 ['defer_rate'] ), $model_id ) );
			}
		}
		return $res;
	}
	public static function set_task_ext_config($model_id, $conf = array()) {
		return db_factory::execute ( sprintf ( " update %switkey_model set config='%s' where model_id='%d'", TABLEPRE, kekezu::k_input(serialize ( $conf )), $model_id ) );
	}
	public static function del_time_rule($rule_id) {
		return db_factory::execute ( sprintf ( " delete from %switkey_task_time_rule where day_rule_id='%d'", TABLEPRE, $rule_id ) );
	}
	public static function del_delay_rule($rule_id) {
		return db_factory::execute ( sprintf ( " delete from %switkey_task_delay_rule where defer_rule_id='%d'", TABLEPRE, $rule_id ) );
	}
	public static function task_freeze($task_ids) {
		global $admin_info;
		global $_lang,$_K;
		if ($task_ids && is_array ( $task_ids )) {
			$ids = implode ( ',', $task_ids );
			$sql2 = sprintf ( "select task_id,task_status,task_title,uid from %switkey_task where task_id in(%s) and task_status in (2,3,4,5)", TABLEPRE, $ids );
			$task_arr = db_factory::query ( $sql2 );
			foreach ( $task_arr as $v ) {
				$sql3 = sprintf ( "insert into %switkey_task_frost (frost_status,task_id,frost_time,admin_uid,admin_username)
        					values('%d','%d','%d','%d','%s')", TABLEPRE, $v ['task_status'], $v ['task_id'], time (), $admin_info ['uid'], $admin_info ['username'] );
				db_factory::execute ( $sql3 );
				kekezu::admin_system_log ( $_lang['freeze_task'].":{$v['task_title']}" );
				$arr = array($_lang['username']=>$v['username'],$_lang['task_id']=>$v['task_id'],$_lang['task_title']=>$v['task_title'],$_lang['reson']=>$_lang['admin_frize'],$_lang['sitename']=>$task_info['task_title'],$_lang['sitename']=>$_K['sitename']);
				keke_msg_class::notify_user($v['uid'], $v['username'], 'task_freeze', $_lang['freeze_notcie'],$arr);
			}
		} elseif ($task_ids) { 
			$ids = $task_ids;
			$sql2 = sprintf ( "select task_id,task_status,task_title,uid from %switkey_task where task_id = %d and task_status  in (2,3,4,5)", TABLEPRE, $task_ids );
			$task_info = db_factory::get_one($sql2);
			$sql3 = sprintf ( "insert into %switkey_task_frost (frost_status,task_id,frost_time,admin_uid,admin_username)
        					values(%d,%d,%d,%d,'%s')", TABLEPRE, $task_info ['task_status'], $task_info ['task_id'], time (), $admin_info ['uid'], $admin_info ['username'] );
			db_factory::execute ( $sql3 );
			$arr = array($_lang['username']=>$v['username'],$_lang['task_id']=>$task_info['task_id'],$_lang['task_title']=>$task_info['task_title'],$_lang['reson']=>$_lang['admin_frize'],$_lang['sitename']=>$task_info['task_title'],$_lang['sitename']=>$_K['sitename']);
			kekezu::admin_system_log ( $_lang['freeze_task'].":{$task_info['task_title']}" );
			keke_msg_class::notify_user($task_info['uid'] , $task_info['username'], 'task_freeze', $_lang['freeze_notcie'],$arr);
		}
		$sql = sprintf ( "update %switkey_task set task_status = '7' where task_id in(%s) and task_status   in (2,3,4,5)", TABLEPRE, $ids );
		return db_factory::execute ( $sql ); 
	}
	public static function task_unfreeze($task_ids) {
		global $admin_info;
		global $_lang,$_K;
		if ($task_ids && is_array ( $task_ids )) { 
			$ids = implode ( ',', $task_ids );
			$sql = sprintf ( "select task_id,task_title,task_status,end_time,sub_time,uid from %switkey_task where task_status=7 and task_id in(%s)", TABLEPRE, $ids );
			$task_arr = db_factory::query ( $sql );
			foreach ( $task_arr as $v ) {
				$sqlf = sprintf ( "select task_id,frost_status,frost_time from %switkey_task_frost", TABLEPRE, $v ['task_id'] );
				$frost_info = db_factory::get_one ( $sqlf );
				$end_time = (time () - $frost_info ['frost_time']) + $v[end_time];
				$sub_time = (time () - $frost_info ['frost_time']) +$v[sub_time];
				$sql2 = sprintf ( "update %switkey_task set task_status = %d,end_time='%s',sub_time='%s'  where task_id = '%d'", TABLEPRE, $frost_info ['frost_status'], $end_time,$sub_time, $v ['task_id'] );
				db_factory::execute ( $sql2 );
				db_factory::execute ( sprintf ( "delete from %switkey_task_frost where task_id = '%d'", TABLEPRE, $frost_info ['task_id'] ) );
				kekezu::admin_system_log ( $_lang['unfreeze_task'].":{$v['task_title']}" );
				$arr = array($_lang['username']=>$v['username'],$_lang['task_id']=>$v['task_id'],$_lang['task_title']=>$v['task_title'],$_lang['reson']=>$_lang['admin_unfrize'],$_lang['sitename']=>$v['task_title'],$_lang['sitename']=>$_K['sitename']);
				keke_msg_class::notify_user( $v['uid'],  $v['username'], 'task_unfrize', $_lang['task_unfrize'],$arr);
			 }
		} elseif (task_ids) { 
			$sql = sprintf ( "select task_id,task_title,task_status,end_time,sub_time,uid from %switkey_task where task_status=7 and task_id ='%d'", TABLEPRE, $task_ids );
			$task_info = db_factory::get_one ( $sql );
			$sqlf = sprintf ( "select task_id,frost_status,frost_time from %switkey_task_frost", TABLEPRE, $task_info ['task_id'] );
			$frost_info = db_factory::get_one ( $sqlf );
			$end_time = (time () - $frost_info ['frost_time']) + $task_info[end_time];
			$sub_time = (time () - $frost_info ['frost_time']) +$task_info[sub_time];
			$sql2 = sprintf ( "update %switkey_task set task_status = %d,end_time='%s',sub_time='%s' where task_id = '%d'", TABLEPRE, $frost_info ['frost_status'], $end_time, $sub_time, $task_info ['task_id'] );
			db_factory::execute ( $sql2 );
			db_factory::execute ( sprintf ( "delete from %switkey_task_frost where task_id = '%d'", TABLEPRE, $frost_info ['task_id'] ) );
			kekezu::admin_system_log ( $_lang['unfreeze_task'].":{$task_info['task_title']}" );
			$arr = array($_lang['username']=>$task_info['username'],$_lang['task_id']=>$task_info['task_id'],$_lang['task_title']=>$task_info['task_title'],$_lang['reson']=>$_lang['admin_unfrize'],$_lang['sitename']=>$task_info['task_title'],$_lang['sitename']=>$_K['sitename']);
				keke_msg_class::notify_user( $task_info['uid'],  $task_info['username'], 'task_unfrize', $_lang['task_unfrize'],$arr);
			 }
		return true;
	}
	public static function task_audit_pass($task_ids) {
		global $_lang,$kekezu;
		if ($task_ids && is_array ( $task_ids )) {
			$ids = implode ( ',', $task_ids );
			$task_arr = db_factory::query ( sprintf ( "select task_id,model_id,task_title,task_cash,task_status,uid,username,start_time,sub_time,end_time,payitem_time,task_cash_coverage from %switkey_task where task_id in(%s) and task_status in (0,1)", TABLEPRE, $ids ) );
			foreach ( $task_arr as $v ) {
				kekezu::admin_system_log ( $_lang['audit_task'].":{$v['task_title']}".$_lang['pass'] );
				$payitem_add_time =time()- $v['start_time'];
				$payitem_arr = unserialize($v['payitem_time']);
				intval($payitem_arr['top'])>0 or $top_add_time = false;
				intval($payitem_arr['urgent'])>0 or $urgent_add_time = false;
				$payitem_time = keke_task_class::get_payitem($v['payitem_time'],$top_add_time,$urgent_add_time);
				$sub_time = time()+($v['sub_time']-$v['start_time']);
				$end_time = time()+($v['end_time']-$v['start_time']);
				$res = db_factory::execute ( sprintf ( "update %switkey_task set task_status=2 ,start_time='%d',sub_time='%d',end_time='%d',payitem_time='%s'  where task_id in(%s)", TABLEPRE,time(),$sub_time,$end_time,$payitem_time,$v['task_id']) );
				$_model_info = $kekezu->_model_list [$v['model_id']];
				if(in_array($_model_info['model_code'],array('sreward','mreward','preward'))){
					$task_cash = $v['task_cash'];
				}else{
					$task_cash = $v['task_cash_coverage'];
				}
				$info = db_factory::get_one('select union_user,union_assoc from '.TABLEPRE.'witkey_space where uid='.$v['uid']);
				$feed_arr = array (
						"feed_username" => array (
								"content" =>$v['username'],
								"url" => "index.php?do=seller&id={$v['uid']}" ),
				                "action" => array (
				                		"content" => $_lang['pub_task'],
				                		 "url" => ""
				                 ),
						   "event" => array (
						   		"content" => "{$v['task_title']}",
								 "url" => "index.php?do=task&id={$v['task_id']}" ,
								 "cash" => $v['task_cash_coverage']?$v['task_cash_coverage']:$v['task_cash'],
								 "model_id" => "{$v['model_id']}"
						   ) );
				kekezu::save_feed ( $feed_arr,$v['uid'],$v['username'], 'pub_task',$v['task_id']);
				PayitemClass::updateTopitem($v['task_id'], 'task');
			}
		} elseif ($task_ids) {
			$ids = $task_ids;
			$task_info = db_factory::get_one ( sprintf ( "select task_id,model_id,task_title,task_cash_coverage,task_cash,task_status,uid,username,start_time,sub_time,end_time,payitem_time from %switkey_task where task_id = '%d' and task_status in (0,1)", TABLEPRE, $ids ) );
			$_model_info = $kekezu->_model_list [$task_info['model_id']];
			if ($task_info) {
				$payitem_add_time =time()- $task_info['start_time'];
				$payitem_arr = unserialize($task_info['payitem_time']);
				$payitem_arr['top']>1000000000 and $top_add_time = $payitem_add_time or $top_add_time=false;
				$payitem_arr['urgent']>1000000000 and $urgent_add_time = $payitem_add_time or $urgent_add_time=false;
				$payitem_time = keke_task_class::get_payitem($task_info['payitem_time'],$top_add_time,$urgent_add_time);
				$sub_time = time()+(intval($task_info['sub_time'])-intval($task_info['start_time']));
				$end_time = time()+($task_info['end_time']-$task_info['start_time']);
				$sql =  sprintf ( "update %switkey_task set task_status=2 ,start_time='%d',sub_time='%d',end_time='%d',payitem_time='%s'  where task_id  ='%d' ", TABLEPRE,time(),$sub_time,$end_time,$payitem_time,$task_info['task_id'] ) ;
				$res = db_factory::execute ($sql);
				if(in_array($_model_info['model_code'],array('sreward','mreward','preward'))){
					$task_cash = $task_info['task_cash'];
				}else{
					$task_cash = $task_info['task_cash_coverage'];
				}
				$info = db_factory::get_one('select union_user,union_assoc from '.TABLEPRE.'witkey_space where uid='.$task_info['uid']);
				kekezu::admin_system_log ( $_lang['audit_task'].":{$task_info['task_title']}".$_lang['pass'] );
				$feed_arr = array ("feed_username" => array ("content" =>$task_info['username'], "url" => "index.php?do=seller&id={$task_info['uid']}" ), "action" => array ("content" => $_lang['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&id={$task_info['task_id']}",  "cash" => $task_info['task_cash_coverage']?$task_info['task_cash_coverage']:$task_info['task_cash'],
								 "model_id" => "{$task_info['model_id']}") );
				kekezu::save_feed ( $feed_arr,$task_info['uid'],$task_info['username'], 'pub_task',$task_info['task_id']);
				PayitemClass::updateTopitem($task_info['task_id'], 'task');
			}
		}
		return $res;
	}
	public static function task_recommend($task_id){
		return db_factory::execute(sprintf("update %switkey_task set is_top=1 where task_id='%d' ",TABLEPRE,$task_id));
	}
	public static function task_unrecommend($task_id){
		return db_factory::execute(sprintf("update %switkey_task set is_top=0 where task_id='%d' ",TABLEPRE,$task_id));
	}
	public static function task_audit_nopass($task_ids,$trust_response=false) {
		global $kekezu;
		global $_lang;
		if ($task_ids && is_array ( $task_ids )) {
			$ids = implode ( ',', $task_ids );
			$task_arr = db_factory::query( sprintf ( "select * from %switkey_task where task_id in(%s)", TABLEPRE, $ids ) );
			foreach ( $task_arr as $v ) {
				if($v['model_id']=='4'||$v['model_id']==5){
					$return_cash = $v['real_cash'];
				}else{
					$return_cash = $v['task_cash'];
				}
				$model_info = $kekezu->_model_list [$v['model_id']];
				$class_name = $model_info ['model_code'] . "_task_class";
				$obj = new $class_name ( $v );
				$task_config = $obj->_task_config;
				$res = db_factory::execute ( sprintf ( "update %switkey_task set task_status=10 where task_id ='%d' ", TABLEPRE, $v ['task_id'] ) );
				$data = array(':model_name'=>$kekezu->_model_list[$v['model_id']]['model_name'],':task_id'=>$v['task_id'],':task_title'=>$v['task_title']);
				keke_finance_class::init_mem('task_fail', $data);
				if($v['task_status']==1){
					PayitemClass::refundPayitem($v ['task_id'], 'task');
						keke_finance_class::cash_in ( $v ['uid'], $return_cash,  'task_fail', 'admin', 'task', $v ['task_id'] );
				}
				kekezu::admin_system_log ( $_lang['audit_task'].":{$v['task_title']}".$_lang['not_pass'] );
			}
		} elseif ($task_ids) {
			$ids = $task_ids;
			$task_info = db_factory::get_one ( sprintf ( "select task_id,task_title,task_status,task_cash,real_cash,model_id,uid,is_trust,trust_type,model_id from %switkey_task where task_id = '%d'", TABLEPRE, $ids ) );
			if ($task_info) {
				if($task_info['is_trust']&&$trust_response==false){
					$trust_data['refund'] = array($ids,$task_info['task_cash']);
					$jump_url = keke_trust_fac_class::trust_task_request("pt_refund",$kekezu->_model_list[$task_info['model_id']]['model_dir'],$ids,$task_info['trust_type'],$trust_data);
					header("Location:".$jump_url);die();
				}else{
					$res = db_factory::execute ( sprintf ( "update %switkey_task set task_status=10 where task_id  ='%d' ", TABLEPRE, $ids ) );
					switch($task_info['is_trust']){
						case "1":
							$fina_cash = $task_info['task_cash'];
							$data = array ("uid" => $task_info ['uid'], "username" => $task_info ['username'], "obj_id" => $ids, "fina_cash" => $fina_cash, "fina_time" => time (), "fina_action" => "task_fail");
							keke_finance_class::finance_trust ( $data,$task_info['trust_type'], 'in' );
							break;
						case "0":
							if($task_info['model_id']=='4'||$task_info['model_id']==5){
								$return_cash = $task_info['real_cash'];
							}else{
								$return_cash = $task_info['task_cash'];
							}
							$model_info = $kekezu->_model_list [$task_info['model_id']];
							$class_name = $model_info ['model_code'] . "_task_class";
							$obj = new $class_name ( $task_info );
							$task_config = $obj->_task_config;
							$data = array(':model_name'=>$kekezu->_model_list[$v['model_id']]['model_name'],':task_id'=>$task_info['task_id'],':task_title'=>$task_info['task_title']);
							keke_finance_class::init_mem('task_fail', $data);
							if($task_info['task_status']==1){
								PayitemClass::refundPayitem($task_info ['task_id'], 'task');
								keke_finance_class::cash_in ( $task_info ['uid'], $return_cash,  'task_fail', 'admin', 'task', $task_info ['task_id'] );
							}
							break;
					}
					kekezu::admin_system_log ( $_lang['audit_task'].":{$task_info['task_title']}".$_lang['not_pass'] );
				}
			}
		}
		return $res;
	}
	public static function task_del($task_ids,$model=1) {
		global $_lang;
		if(is_array($task_ids)){
			$ids = implode ( ",", $task_ids ) or $ids = $task_ids;
			foreach ($task_ids as $v) {
				self::del_sign_task($v, $model);
			}
		}else{
			$ids = $task_ids;
			self::del_sign_task($task_ids, $model);
		}
		db_factory::execute ( sprintf ( "DELETE FROM %switkey_feed where feedtype in('pub_task','work_accept') and obj_id in(%s)", TABLEPRE, $ids ) );
		return db_factory::execute ( sprintf ( "delete from %switkey_task where task_status in(0,1,8,9,10) and task_id in(%s)", TABLEPRE, $ids ) );
	}
	public static function del_sign_task($task_id,$model){
		global $_lang;
		if($model===1){
			$sql = sprintf("delete from %switkey_task_work where task_id='%d'",TABLEPRE,$task_id);
		}else{
			$sql = sprintf("delete from %switkey_task_bid where task_id ='%d'",TABLEPRE,$task_id);
		}
		db_factory::execute($sql);
		$file_sql = sprintf("select save_name from %switkey_file where task_id = '%d' ",TABLEPRE,$task_id);
		$files = db_factory::query($file_sql);
		foreach ($files as $v){
			keke_file_class::del_file($v['save_name']);
		}
		db_factory::execute(sprintf("delete from %switkey_file where task_id ='%d' ",TABLEPRE,$task_id));
		$del_title = db_factory::get_count(sprintf("select task_title from %switkey_task where task_id='%d'",TABLEPRE,$task_id));
		kekezu::admin_system_log($_lang['delete_task'].":{$del_title}");
	}
		public static function can_operate($status,$is_top) {
			global $_lang;
			$operate = array ();
			switch ($status) {
				case "0" :
				case "1" : 
					$operate ['pass'] = $_lang['pass_audit'];
					$operate ['nopass'] = $_lang['no_pass_audit'];
					break;
				case "2" : 
				case "3" : 
				case "4" : 
				case "5" : 
				case "6" : 
					break;
				case "8" : 
				case "9" :
				case "10" :
					$operate ['del'] = '删除';
					break;
			}
			return $operate;
		}
	public static function get_user_join_task($uid = '') {
		global $user_info;
		$count_arr = array ();
		$uid or $uid = $user_info ['uid']; 
		$reward_sql = " select count(c.task_id) count,c.model_id from (select DISTINCT a.task_id,b.model_id from %switkey_task_work a left join %switkey_task b on a.task_id=b.task_id where a.uid='%d') c  group by c.model_id";
		$reward_arr = db_factory::query ( sprintf ( $reward_sql, TABLEPRE, TABLEPRE, $uid ), 3600 );
		$tender_sql = " select count(c.task_id) count,c.model_id from (select DISTINCT a.task_id,b.model_id from %switkey_task_bid a left join %switkey_task b on a.task_id=b.task_id where a.uid='%d') c  group by c.model_id";
		$tender_arr = db_factory::query ( sprintf ( $tender_sql, TABLEPRE, TABLEPRE, $uid ), 3600 );
		$total_arr = array_merge ( $reward_arr, $tender_arr );
		foreach ( $total_arr as $v ) {
			$count_arr [$v ['model_id']] =intval($v ['count']);
		}
		return $count_arr;
	}
	public static function delete_task_releate_item($model_id,$task_id,$is_array=false){
		global $kekezu;
			$model_code = $kekezu->_model_list[$model_id]['model_code'];
			$model_code=='tender'||$model_code=='dtender' and $tab_work = "task_bid" or $tab_work='task_work';
	}
}