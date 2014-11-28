<?php
keke_lang_class::load_lang_class ( 'keke_shop_class' );
class keke_shop_class {
	public static function get_service_info($sid) {
		return db_factory::get_one ( sprintf ( " select * from %switkey_service where service_id=%d", TABLEPRE, $sid ) );
	}
	public static function notify_user($uid, $username, $action, $title, $v_arr = array()) {
		$msg_obj = new keke_msg_class ();
		$contact = self::get_contact ( $uid );
		$msg_obj->send_message ( $uid, $username, $action, $title, $v_arr, $contact ['email'], $contact ['mobile'] );
	}
	public static function get_contact($uid) {
		return db_factory::get_one ( sprintf ( " select mobile,email from %switkey_space where uid = '%d'", TABLEPRE, $uid ) );
	}
	public static function access_check($sid, $s_uid, $model_id) {
		global $uid, $kekezu,$_lang;
		$order_info = self::check_has_buy ( $sid, $uid );
		$order_status = $order_info ['order_status'];
		$order_id = intval ( $order_info ['order_id'] );
		$model_code = $kekezu->_model_list [$model_id] ['model_code'];
		if ($uid==$s_uid||$uid==$order_info['order_uid']) {
			return true;
		} else {
			kekezu::keke_show_msg ( "index.php?do=user&view=transaction&op=sold&intModelId=" . $model_id , '您没有权限进入此页面', 'error' );
		}
	}
	public static function create_service_order($service_info,$isApp = false,$serviceOrderInfo = array()) {
		global $uid, $username, $_K;
		global $_lang;
		if($uid == $service_info ['uid']){
			if($isApp){
				app_class::response ( array (
				'ret' => 1003
				) );
			}else{
				return $_lang ['seller_can_not_order_self'];
			}
		}
		$oder_obj = new Keke_witkey_order_class (); 
		$order_detail = new Keke_witkey_order_detail_class (); 
		switch ($service_info ['model_id']) {
			case "6" :
				$type = $_lang ['work'];
				$service_cash = $service_info ['price']; 
				break;
			case "7" :
				$type = $_lang ['service'];
				$service_cash = $serviceOrderInfo ['price']; 
				break;
		}
		$order_name = $service_info ['title']; 
		$order_body = $_lang ['buy_goods'] . "<a href=\"index.php?do=goods&id=$service_info[service_id]\">" . $order_name . "</a>"; 
		if($service_info ['model_id'] == 6){
			$detail_type = 'goods';
			$order_status = 'wait';
	    }else{
		     $detail_type = 'service' ;
			$order_status = 'seller_confirm'; 
		}
		$order_id = keke_order_class::create_order ( $service_info ['model_id'], $service_info ['uid'], $service_info ['username'], $order_name, $service_cash, $order_body, $order_status ,$service_info['leave_message']);
		if ($order_id) {
			if($service_info ['model_id'] == 7){
				$serviceOrderInfo ['order_id'] = $order_id;
				keke_order_class::createServiceOrder($serviceOrderInfo);
			}
				keke_order_class::create_order_detail ( $order_id, $order_name, 'service', intval ( $service_info [service_id] ), $service_cash );
				$msg_obj = new keke_msg_class (); 
				$service_url = "<a href=\"" . $_K [siteurl] . "/index.php?do=goods&id=" . $service_info [service_id] . "\">" . $order_name . "</a>";
				$strLeaveMessage = $service_info['leave_message'];
				$order_url = "<a href=\"" . $_K [siteurl] . "/index.php?do=order&sid=".$service_info ['service_id']."&orderId=" . $order_id . "#userCenter\">#" . $order_id . "</a>";
				$s_notice = array (
					$_lang ['user_action'] => $username . $_lang ['order_buy'],
					$_lang ['service_name'] => $service_url,
					$_lang ['service_type'] => $type,
					$_lang ['buyer_leave_message'] => $strLeaveMessage,
					$_lang ['order_link'] => $order_url
				);
				if($service_info['model_id'] == '7'){
					unset($s_notice[$_lang ['buyer_leave_message']]);
					$msgAction = 'service_order';
				}else{
					$msgAction = 'goods_order';
				}
				$contact = db_factory::get_one ( sprintf ( " select mobile,email from %switkey_space where uid='%d'", TABLEPRE, $service_info [uid] ) );
				$msg_obj->send_message ( $service_info ['uid'],
						$service_info ['username'],
						$msgAction,
						$_lang ['you_has_new'] . $type . $_lang ['order'],
						$s_notice,
						$contact ['email'],
						 $contact ['mobile']
					); 
				$feed_arr = array ("feed_username" => array ("content" => $username, "url" => "index.php?do=seller&id=" . $uid ), "action" => array ("content" => $_lang ['buy'], "url" => '' ), "event" => array ("content" => $order_name, "url" => "index.php?do=goods&id=$service_info[service_id]" ) );
				kekezu::save_feed ( $feed_arr, $uid, $username, 'service', $service_info ['service_id'], $service_url );
				if($isApp){
					app_class::response ( array (
					'ret' => 0,
					'orderid'=>$order_id
					) );
				}else{
					return $order_id;
				}
		} else {
			if($isApp){
				app_class::response ( array (
				'ret' => 1004
				) );
			}else{
				return $_lang ['order_produce_fail'];
			}
		}
	}
	public static function get_sale_info($sid, $w = array(), $p = array(), $order = null, $ext_condit) {
		global $kekezu;
		$where = " select a.order_status,a.order_uid,a.order_username,a.order_amount,a.order_time from " . TABLEPRE . "witkey_order a left join " . TABLEPRE . "witkey_order_detail b on a.order_id=b.order_id where
		b.obj_id='$sid' and b.obj_type = 'service' ";
		$ext_condit and $where .= " and " . $ext_condit;
		$arr = keke_table_class::format_condit_data ( $where, $order, $w, $p );
		$sale_info = db_factory::query ( $arr ['where'] );
		$sale_arr ['sale_info'] = $sale_info;
		$sale_arr ['pages'] = $arr ['pages'];
		return $sale_arr;
	}
	function get_service_comment($sid, $w = array(), $p = array(), $order = null) {
		global $kekezu;
		$comm_obj = new Keke_witkey_comment_class ();
		$where = " select * from " . TABLEPRE . "witkey_comment where obj_id = '$sid' and obj_type = 'service' ";
		$arr = keke_table_class::format_condit_data ( $where, $order, $w, $p );
		$comm_info = db_factory::query ( $arr ['where'] );
		$comm_arr ['comm_info'] = $comm_info;
		$comm_arr ['pages'] = $arr ['pages'];
		return $comm_arr;
	}
	public static function set_report($obj_id, $to_uid, $report_type, $file_name, $desc,$reason) {
		global $uid;
		global $_lang;
		$service_info = self::get_service_info ( $obj_id );
		$transname = keke_report_class::get_transrights_name ( $report_type ); 
		if($service_info['uid'] == $uid){
			return $_lang ['can_not_to_self'] . $transname;
		}
		$user_type = '2'; 
		return keke_report_class::add_report ( 'product', $obj_id, $to_uid, $desc, $report_type, $service_info ['service_status'], $obj_id, $user_type, $file_name ,$reason );
	}
	public static function get_mark_count($model_code, $sid) {
		return kekezu::get_table_data ( " count(mark_id) count,mark_status", "witkey_mark", "model_code='" . $model_code . "' and origin_id='$sid'", "", "mark_status", "", "mark_status", 3600 );
	}
	public static function get_mark_count_ext($model_code, $sid) {
		return kekezu::get_table_data ( " count(mark_id) c,mark_type", "witkey_mark", "model_code='" . $model_code . "' and origin_id='$sid' and mark_status>0", "", "mark_type", "", "mark_type" );
	}
	public static function get_hot_service($model_id, $sid, $indus_pid) {
		return kekezu::get_table_data ( " sale_num,service_id,price,title,pic ", "witkey_service", " model_id = '$model_id' and service_id !='$sid' and indus_pid = '$indus_pid' and service_status='2' and sale_num>0", "sale_num desc", "", "3", "", 3600 );
	}
	public static function get_related_service($model_id, $sid, $indus_id) {
		return kekezu::get_table_data ( "pic,service_id,title,price,unite_price", "witkey_service", " model_id = '$model_id' and service_id !='$sid' and indus_id = '$indus_id' and service_status='2'", "", "", "6", "", 3600 );
	}
	public static function get_more_service($uid, $sid) {
		return kekezu::get_table_data ( "service_id,title,pic", "witkey_service", " uid='$uid' and service_status='2' and service_id!='$sid'", "sale_num desc ", "", "5", "", 3600 );
	}
	public static function get_task_info($indus_id) {
		return kekezu::get_table_data ( "task_id,task_title,task_cash", "witkey_task", " indus_id = '$indus_id' and task_status='2'", "", "", "14", "", 3600 );
	}
	public static function plus_view_num($sid, $s_uid) {
		global $uid;
		if (! $_SESSION ['service_view_' . $sid . '_' . $uid] && $uid != $s_uid) {
			db_factory::execute ( sprintf ( " update %switkey_service set views=views+1 where service_id='%d'", TABLEPRE, $sid ) );
			$_SESSION ['service_view_' . $sid . '_' . $uid] = '1';
		}
	}
	public static function plus_sale_num($sid, $sale_cash) {
		return db_factory::execute ( sprintf ( " update %switkey_service set sale_num=sale_num+1,total_sale=total_sale+'%f.2' where service_id = '%d'", TABLEPRE, $sale_cash, $sid ) );
	}
	public static function plus_mark_num($service_id) {
		return db_factory::execute ( sprintf ( "update %switkey_service set mark_num=mark_num+2 where service_id ='%d'", TABLEPRE, $service_id ) );
	}
	public static function check_has_buy($sid, $uid) {
		return db_factory::get_one ( sprintf ( " select a.order_status,a.order_id,a.order_uid from %switkey_order a left join %switkey_order_detail b
					on a.order_id = b.order_id where a.order_uid ='%d' and b.obj_id='%d' and obj_type='service'", TABLEPRE, TABLEPRE, $uid, $sid ) );
	}
	public static function getPayitemShow($arrServiceInfo){
		if($arrServiceInfo['service_status']!=2||TOOL == FALSE){
			return false;
		}
		$arrPayitemListAlls = PayitemClass::getPayitemListForPub('goods');
		if(is_array($arrPayitemListAlls)){
			$newArray = array();
			foreach($arrPayitemListAlls as $k=>$v){
				if($arrServiceInfo[$k]==1){
					$newArray[$k] = $v;
				}
			}
			return $newArray;
		}
		return false;
	}
	static function output_pics($path, $pre = null, $show = false) {
		$tmp = explode (',', $path . ',' );
		$tmp = array_unique ( array_filter ( $tmp ) );
		if ($tmp) {
			$s = sizeof ( $tmp );
			if ($show) {
				return keke_img_class::get_filepath_by_size($tmp [$s-1],$pre);
			} else {
				for($i = 0; $i < $s; $i ++) {
					$tmp [$i] = keke_img_class::get_filepath_by_size($tmp [$i],$pre);
				}
				return $tmp;
			}
		}
		return keke_img_class::get_filepath_by_size('',$pre);
	}
	public static function service_del($service_ids) {
		if (is_array ( $service_ids )) {
			$ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		} else {
			$ids = $service_ids;
		}
		db_factory::execute ( sprintf ( "DELETE FROM %switkey_feed where feedtype in('pub_service','service') and obj_id in(%s)", TABLEPRE, $ids ) );
		return db_factory::execute ( sprintf ( "DELETE FROM %switkey_service where service_id in(%s)", TABLEPRE, $ids ) );
	}
	public static function updateGoodsTop($id){
         db_factory::execute("update ".TABLEPRE."witkey_service set goodstop=0  where service_id = ".intval($id));
	}
}