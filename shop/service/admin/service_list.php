<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 13:51:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$table_obj = keke_table_class::get_instance('witkey_service');
$service_obj = new service_shop_class();

$service_obj = new service_shop_class();
//$status_arr = $service_obj->get_service_status();
$status_arr = array("1"=>"待审核","2"=>"出售中","3"=>"已下架","4"=>"审核失败");
//检索条件
$wh = "1=1";

$w[service_id] and $wh .= " and service_id= ".$w[service_id];

$w[title] and $wh.=" and title like '%$w[title]%'";

$w[username] and $wh.=" and username like '%$w[username]%' ";


$w['service_status'] and $wh .= " and service_status=" . $w['service_status'];

$wh.=" and model_id = 7";

intval ( $page ) or $page = 1;

intval ( $page_size ) and $page_size = intval ( $page_size ) or $page_size = '10';

$w[order_status] and $wh.=" and order_status like '%$w[order_status]%' ";

$ord and $wh.=" order by ".$ord or $wh.=" order by service_id desc ";

$url_str = "index.php?do=model&model_id=7&view=list&w[service_id]=$w[service_id]&w[service_status]=$w[service_status]&w[title]=$w[title]&w[username]=$w[username]&page=$page&page_size=$page_size";

//查询
$table_arr = $table_obj->get_grid ( $wh, $url_str, $page, $page_size, null, 1, 'ajax_dom');
$service_arr = $table_arr['data'];
$pages = $table_arr['pages'];

//操作 1.删除；2..禁用；3.审核 4.启用
if($service_id){
	$service_arr = db_factory::get_one(sprintf("select * from %switkey_service where service_id='%d' ",TABLEPRE,$service_id));

	$log_ac_arr = array("del"=>$_lang['delete'],"use"=>$_lang['use'],"pass"=>$_lang['audit'],"disable"=>$_lang['disable']);
	$log_msg = $_lang['to_witkey_service_name_to'].$service_arr[title].$_lang['in'].$log_ac_arr[$ac].$_lang['operate'];
	kekezu::admin_system_log($log_msg);
	switch ($ac) {
		case 'del':
			$res = keke_shop_class::service_del($service_id);
			kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_success'],'success');
		break;
		case 'pass':
		case 'shelves'://上架
			$time = time()-$service_arr[on_time]; 
		 	keke_payitem_class::update_service_payitem_time($service_arr[payitem_time], $time, $service_id); 
			//service_shop_class::set_on_sale_num($service_id);
			$service_obj->service_pass($service_id);
			kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_audit_success'],'success');
		break;
		case 'nopass'://审核失败状态变为4
			$res = goods_shop_class::set_service_status($service_id, 4);
			$res and PayitemClass::refundPayitem($service_id, 'goods');
			//查询一下发布时使用的工具及购买的工具
			kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,'服务审核不通过成功','success');
			break;
		case 'off_shelf'://下架
			$service_obj->service_down($service_id);
			kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_use_success'],'success');
		break;

	}
}
//批量操作
if($sbt_action){
	$keyids = $ckb;
	if(is_array($keyids)){
		$log_mac_arr = array("more_del"=>$_lang['mulit_delete'],"more_use"=>$_lang['mulit_use'],"more_pass"=>$_lang['mulit_pass'],"disable"=>$_lang['mulit_disable']);
		$log_msg = $_lang['to_witkey_service_has_in'].$log_mac_arr[$sbt_action].$_lang['operate'];
		kekezu::admin_system_log($log_msg);
		switch ($sbt_action) {
				case $_lang['mulit_delete']://批量删除
					$res = keke_shop_class::service_del($keyids);
					kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_delete_success'],'success');
				break;
				case $_lang['mulit_pass']:
					foreach ($keyids as $v) {
						$service_info = kekezu::get_table_data("*","witkey_service","service_id = $v");
						$service_info = $service_info['0'];
						$add_time = time()-$service_info['on_time'];
						keke_payitem_class::update_service_payitem_time($service_info['payitem_time'], $add_time, $v);
					}
					$res = goods_shop_class::set_service_status($keyids, 2);
					$action = $_lang['mulit_pass'];
					break;
				case $_lang['mulit_nopass']:
					$res = goods_shop_class::set_service_status($keyids,4);
					foreach ($keyids as $v){
						PayitemClass::refundPayitem($v, 'goods');
					}
					$action = '批量审核不通过';
					break;
				case $_lang['batch_shelves']://批量上架
					foreach ($keyids as $v) {
						$service_info = kekezu::get_table_data("*","witkey_service","service_id = $v");
						$service_info = $service_info[0];
						$add_time = time()-$service_info[on_time];
						keke_payitem_class::update_service_payitem_time($service_info[payitem_time], $add_time, $v); 
					}
					$service_obj->service_pass($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_pass_success'],'success');
				break;
				case $_lang['batch_off_the_shelf']://批量下架
					$service_obj->service_down($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_use_success'],'success');
				break;
		}
	}
}


require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/service_' . $view );