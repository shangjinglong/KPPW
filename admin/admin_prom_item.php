<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 60 );
$prom_item_obj = new Keke_witkey_prom_item_class ();
$op = $op ? $op : 'reg'; 
$page_size = isset($w ['page_size']) ? intval ( $w ['page_size'] ) : 10 ;
$page = $page ? intval ( $page ) : '1' ;
$url = "index.php?do=$do&view=$view&op=$op&w['item_id']={$w['item_id']}&w['item_type']={$w['item_type']}&w['prom_type']={$w['prom_type']}&w['page_size']=$page_size&w['ord']={$w['ord']}&page=$page";
$ac_url = "index.php?do=$do&view=$view&op=$op&w['item_type']={$w['item_type']}&w['prom_type']={$w['prom_type']}&w['page_size']=$page_size&w['ord']={$w['ord']}&page=$page";
if (isset ( $ac )) {
	if ($item_id && $ac = 'del') {
		$prom_item_obj->setWhere ( ' item_id  = ' . $item_id . ' ' );
		$res = $prom_item_obj->del_keke_witkey_prom_item ();
		kekezu::admin_system_log ($_lang['delete_prom_material']. "$item_id" );
		kekezu::admin_show_msg ( $res ? $_lang['delete_prom_material_success'] : $_lang['operate_fail_please_choose_again'], $url,3,'', $res?'success':'warning' );
	}
}
if (isset ( $sbt_action )) { 
	$ckb_string = $ckb;
	is_array ( $ckb_string ) and $ckb_string = implode ( ',', $ckb_string );
	if (count ( $ckb_string )) {
		$prom_item_obj->setWhere ( ' item_id in (' . $ckb_string . ') ' );
		$res = $prom_item_obj->del_keke_witkey_prom_item ();
		kekezu::admin_system_log ($_lang['delete_prom_material']."$ids" );
		kekezu::admin_show_msg ( $res ? $_lang['mulit_operate_success'] : $_lang['mulit_operate_fail_please_again'], $url,3,'', $res?'success':'warning');
	}
}
$where = '1=1';
$w ['item_id'] and $where .= " and item_id = '{$w['item_id']}'";
$w ['item_name'] and $where .= " and item_name like '%{$w['item_name']}%'";
$w ['item_type'] and $where .= " and item_type ='{$w['item_type']}'";
$w ['ord'] and $where .= " order by {$w['ord']} " or $where .= " order by item_id desc "; 
$prom_item_obj->setWhere ( $where );
$count = $prom_item_obj->count_keke_witkey_prom_item ();
$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
$prom_item_obj->setWhere ( $where . $pages ['where'] );
$prom_item_arr = $prom_item_obj->query_keke_witkey_prom_item ();
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . "_" . $view . "_list" );