<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 14:30:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

$order_obj = keke_table_class::get_instance ( 'witkey_order' ); // 订单
$goods_obj = keke_table_class::get_instance ( 'witkey_service' ); // 作品表

// 订单状态数组
$order_status_arr = goods_shop_class::get_order_status ();
// 检索条件
$wh = "model_id = 6 and seller_uid>0";
$w ['order_id'] and $wh .= " and order_id like '%$w[order_id]%' ";
$w ['order_username'] and $wh .= " and order_username like '%$w[order_username]%' ";
$w ['order_status'] and $wh .= " and order_status = '$w[order_status]' ";

$ord ['0'] && $ord ['1'] and $wh .= ' order by ' . $ord ['0'] . ' ' . $ord ['1'] or $wh .= " order by order_time desc";
// $sbt_search and $wh .=" order by $ord" or $wh .=' order by order_id desc';

intval ( $page ) or $page = 1;
intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = '10';

$url_str = "index.php?do=model&model_id=6&view=order&w[order_id]={$w['order_id']}&w[order_username]={$w['order_username']}&w[order_status]={$w['order_status']}&page=$page&w[page_size]=$page_size&ord[0]=$ord[0]&ord[1]=$ord[1]";

// 查询
$table_arr = $order_obj->get_grid ( $wh, $url_str, $page, $page_size, null, 1, 'ajax_dom' );
$order_arr = $table_arr ['data'];
$pages = $table_arr ['pages'];

// 删除操作
switch ($ac) {
	case 'del' :
		$ac_name = db_factory::get_count ( sprintf ( "select order_name from %switkey_order where order_id='%d' ", TABLEPRE, $order_id ) );
		kekezu::admin_system_log ( $_lang ['has_delete_order_name_is'] . $ac_name . $_lang ['of_witkey_goods_order'] );
		
		$order_obj->del ( 'order_id', $order_id, $url_str );
		kekezu::admin_show_msg ( $_lang ['operate_notice'], $url_str, 2, $_lang ['delete_success'], 'success' );
		break;
	case 'confirm':
		$obj = new goods_shop_class();
		$obj->dispose_order($order_id, 'confirm','sys',$url_str,$_SESSION['uid']);
		break;
}

// 批量删除操作
if (isset ( $sbt_action )) {
	$keyids = $ckb;
	if (is_array ( $keyids )) {
		kekezu::admin_system_log ( $_lang ['has_mulit_delete_witkey_goods'] );
		$order_obj->del ( 'order_id', $keyids ) and kekezu::admin_show_msg ( $_lang ['operate_notice'], $url_str, 2, $_lang ['mulit_delete_success'] ) or kekezu::admin_show_msg ( $_lang ['operate_notice'], $url_str, 2, $_lang ['mulit_delete_fail'], "error" );
	}
}
function get_submit_method($order_id) {
	$s_info = db_factory::get_one ( sprintf ( "SELECT s.submit_method,d.obj_id,o.order_id
		FROM `%switkey_service` s
		LEFT JOIN `%switkey_order_detail` d
		ON s.service_id = d.obj_id
		LEFT JOIN `%switkey_order` o
		ON d.order_id = o.order_id WHERE o.order_id = '%d'", TABLEPRE, TABLEPRE, TABLEPRE, $order_id ) );
	return $s_info['submit_method'];
}
require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/goods_' . $view );