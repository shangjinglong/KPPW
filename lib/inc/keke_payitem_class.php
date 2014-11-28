<?php
keke_lang_class::load_lang_class('keke_payitem_class');
class keke_payitem_class {
	public static function get_table_obj($table = 'witkey_payitem') {
		return keke_table_class::get_instance ( $table );
	}
	public static function get_payitem_config($user_type = null, $model_code = null, $item_code = null,$pk=null,$is_open=1) {
		global $kekezu;
		$is_open==1 and $where = " and is_open=$is_open";
		$pk         or $pk = "item_code";
		$payitem_list = kekezu::get_table_data ( "*", "witkey_payitem", "1=1 $where ", "", "", "", $pk,3600 );
		if ($user_type) {
			foreach ( $payitem_list as $k => $v ) {
				if ($v ['user_type'] != $user_type)
					unset ( $payitem_list [$k] );
			}
		}
		if ($model_code) {
			foreach ( $payitem_list as $k => $v ) {
				if (strpos ( $v ['model_code'], $model_code ) === FALSE) {
					unset ( $payitem_list [$k] );
				}
			}
		}
		if ($item_code) { 
			 $payitem_list [$item_code];
			return $payitem_list [$item_code];
		} else { 
			return $payitem_list;
		}
	}
	public static function get_payitem_record($w = array(), $order = null, $p = array()) {
		global $kekezu;
		$record_obj = new Keke_witkey_payitem_record_class ();
		$record_arr = array ();
		$where = " 1 = 1 ";
		if (! empty ( $w )) {
			$w ['item_code'] and $where .= " and item_code = '" . $w ['item_code'] . "'";
			$w ['use_type'] and $where .= " and use_type = '" . $w ['use_type'] . "' ";
			$w ['uid'] and $where .= " and uid = '" . $w ['uid'] . "' ";
		}
		$order and $where .= "  order by $order " or $where .= "  order by record_id desc  ";
		if (! empty ( $p )) { 
			$page_obj = $kekezu->_page_obj;
			intval ( $p ['page'] ) and $page = intval ( $p ['page'] ) or $page = '1';
			intval ( $p ['page_size'] ) and $page_size = intval ( $p ['page_size'] ) or $page_size = "10";
			$p ['url'] and $url = $p ['url'] or $url = $_SERVER ['HTTP_REFERER'];
			$p ['anchor'] and $anchor = $p ['anchor'];
			$record_obj->setWhere ( $where );
			$count = intval ( $record_obj->count_keke_witkey_payitem_record () );
			$pages = $page_obj->getPages ( $count, $page_size, $page, $url, "#" . $anchor );
			$where .= $pages ['where'];
		}
		$record_obj->setWhere ( $where );
		$record_list = $record_obj->query_keke_witkey_payitem_record ();
		$record_arr ['page'] = $pages ['page'];
		$record_arr ['list'] = $record_list;
		return $record_arr;
	}
	public static function payitem_install($item_code) {
		$obj = self::get_table_obj ();
		$info = $obj->get_table_info ( "item_code", $item_code );
		if ($info) { 
			return false;
		} else { 
			if(file_exists(S_ROOT . "./control/payitem/$item_code/control/init_config.php")){
				require_once S_ROOT . "./control/payitem/$item_code/control/init_config.php";
				return $obj->save ( $init_info );
			}else{
				return false;
			}
		}
	}
	public static function payitem_edit($item_id, $item_info = array()) {
		$obj = self::get_table_obj ();
		return $obj->save ( $item_info, array ("item_id" => $item_id ) );
	}
	public static function payitem_uninstall($item_id) {
		$obj = self::get_table_obj ();
		return $obj->del ( "item_id", $item_id );
	}
	public static function payitem_cost($item_code, $use_num = '1', $obj_type = false, $use_type = 'buy', $obj_id = null, $origin_id = null) {
		global $uid, $username;
		global $_lang;
		$payitem_config = self::get_payitem_config ( null, null, $item_code ,'item_code');
		$use_cash = $payitem_config ['item_cash'] * $use_num;
		if($use_type == 'buy'&&$use_cash){
			$data = array(':item_name'=>$payitem_config ['item_name']);
			keke_finance_class::init_mem('payitem', $data);
			$use_cash > 0 and $fid_cash = keke_finance_class::cash_out ( $uid, $use_cash, 'payitem',$use_cash,'','payitem');
			$fid_cash or kekezu::show_msg($_lang['friendly_notice'],'index.php?do=user&view=finance&op=recharge',3,$_lang['your_balance_not_enough']);
		}
		$record_obj = new Keke_witkey_payitem_record_class ();
		$record_obj->_record_id = null;
		$record_obj->setItem_code ( $item_code );
		$record_obj->setUid ( $uid );
		$record_obj->setUsername ( $username );
		$record_obj->setUse_type ( $use_type );
		$record_obj->setUse_cash ( $use_cash );
		$record_obj->setUse_num ( intval ( $use_num ) );
		$record_obj->setObj_type ( $obj_type );
		$record_obj->setObj_id ( $obj_id );
		$record_obj->setOrigin_id ( $origin_id );
		$record_obj->setOn_time ( time () );
		$record_id = $record_obj->create_keke_witkey_payitem_record ();
		return $record_id;
	}
	public static function payitem_del($record_id) {
		return db_factory::execute ( sprintf ( " delete frm %switkey_payitem_record where record_id='%d'", TABLEPRE, $record_id ) );
	}
	public static function payitem_standard() {
		global $_lang;
		return array ("times" => $_lang['times'],"day"=>$_lang['day'], "month" => $_lang['month'], "year" => $_lang['year'] );
	}
	public static function payitem_exists($uid, $item_code=false, $obj_type=false,$payitem_arr=false) {
		if($payitem_arr){ 
			foreach ($payitem_arr as $k=>$v) { 
				$buy_count = db_factory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'buy'", TABLEPRE, $uid,  $v[item_code] ) );
				$use_count = db_factory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'spend'", TABLEPRE, $uid,  $v[item_code] ) );
				$payitem_info [$v[item_code]]  = intval($buy_count - $use_count); 
			} 
		}else{ 
		$buy_count = db_factory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d' and item_code = '%s' and use_type = 'buy'", TABLEPRE, $uid, $item_code ) );
		$use_count = db_factory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'spend'", TABLEPRE, $uid, $item_code ) );
		$payitem_info = intval($buy_count - $use_count);
		} 
		return $payitem_info;		
	}
	public static function get_user_payitem($uid, $use_type = null, $obj_type = null, $obj_id = null) {
		$sql = " select a.use_cash,a.item_code,b.item_name,b.small_pic,b.item_desc from " . TABLEPRE . "witkey_payitem_record a left join " . TABLEPRE . "witkey_payitem b
			 on a.item_code = b.item_code where a.uid = '$uid' ";
		$use_type and $sql .= " and a.use_type = '$use_type' ";
		$obj_type and $sql .= " and a.obj_type = '$obj_type' ";
		$obj_id and $sql .= " and a.obj_id = '$obj_id' ";
		return db_factory::query ( $sql );
	}
	public static function get_payitem_info($user_type,$model_code){
		$where = sprintf(" user_type='%s' and is_open = 1 and find_in_set('%s',model_code)",$user_type,$model_code); 
		$payitem_arr = kekezu::get_table_data("*","witkey_payitem","$where","","","","item_id"); 
		return $payitem_arr;
	}
	public static function update_service_payitem_time($payitem_time,$add_time,$service_id){
			$service_payitem_arr = unserialize($payitem_time);	
			$service_payitem_arr[top] = $add_time+$service_payitem_arr[top];
			$new_payitem_time = serialize($service_payitem_arr);
			$res = db_factory::execute(sprintf("update %switkey_service set payitem_time='%s' where service_id=%d",TABLEPRE,$new_payitem_time,$service_id)); 
			return $res;
	}
	public static function set_payitem_time($payitem_arr,$obj_id,$obj_type){
		$payitem_end_time = serialize($payitem_arr); 
		switch ($obj_type){
			case "task":
				$sql = sprintf("update %switkey_task set payitem_time='%s' where task_id=%d",TABLEPRE,$payitem_end_time,$obj_id);
				break;
			case "service":
				$sql = sprintf("update %switkey_service set payitem_time='%s' where service_id=%d",TABLEPRE,$payitem_end_time,$obj_id);
				break; 
		}   
		$res = db_factory::execute($sql); 
		return $res;
	}
}