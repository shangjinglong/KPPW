<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 14:30:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

$table_obj = keke_table_class::get_instance('witkey_order');//实例化witkey_order表
$service_obj = new service_shop_class();
/**
 * 交易状态数组 */
$arrStatus = $service_obj->get_order_status();

//检索条件
$wh = "1=1";

$w[order_id] and $wh .= " and order_id like '%$w[order_id]%' ";

$w[order_username] and $wh.=" and order_username like '%$w[order_username]%' ";

$wh.=" and model_id = 7 and seller_uid > 0";

intval ( $page ) or $page = 1;
intval ( $w[page_size] ) and $page_size = intval ( $w[page_size] ) or $page_size = '10';

$w[order_status] and $wh.=" and order_status like '%$w[order_status]%' ";

$ord[0]&&$ord[1] and  $wh .=' order by '.$ord[0].' '.$ord[1] or $wh.=" order by order_time desc";

//$w['ord'] and $wh.=" order by ".$w['ord'] or $wh.=" order by order_id desc ";

$url_str = "index.php?do=model&model_id=7&view=order&w[order_id]=$w[order_id]&w[order_username]=$w[order_username]&w[order_status]=$w[order_status]&page=$page&page_size=$page_size";

//查询
$table_arr = $table_obj->get_grid ( $wh, $url_str, $page, $page_size, null , 1, 'ajax_dom');
$order_arr = $table_arr['data'];
$pages = $table_arr['pages'];

//删除操作
if($ac=="del"){
	$ac_name = db_factory::get_count(sprintf("select order_name from %switkey_order where order_id='%d' ",TABLEPRE,$order_id));
	kekezu::admin_system_log($_lang['has_delete_order_name_is'].$ac_name.$_lang['of_witkey_service_order']);
	
	$res = $table_obj->del('order_id', $order_id,$url_str);
	kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_success'],'success');
}
//批量删除操作
if(isset ( $sbt_action )){
	$keyids = $ckb;
	if(is_array($keyids)){
		kekezu::admin_system_log($_lang['has_mulit_delete_service_order']);
		$service_obj->order_del($keyids); 
		kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_delete_success'],'success');
	}
}

require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/service_' . $view );