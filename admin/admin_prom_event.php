<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(61);
$prom_event_obj = new Keke_witkey_prom_event_class ();
$w ['page_size'] and $page_size = intval ( $w ['page_size'] ) or $page_size = 10;
$page and $page = intval ( $page ) or $page = '1';
$url = "index.php?do=$do&view=$view&w[event_id]=".$w['event_id']."&w[parent_username]=".$w['parent_username']
."&w[username]=".$w['username']."&w[action]=".$w['action']."&w[page_size]=$page_size&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}&page=$page";
$ac_url="index.php?do=$do&view=$view&w['page_size']=".$w['page_size']."&w['action']=".$w['action']."&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}"."&page=$page";
if (isset ( $ac )) {
	if ($event_id) {
		switch ($ac) {
			case "del" :
				$prom_event_obj->setWhere ( "event_id = " . intval($event_id) );
				$res = $prom_event_obj->del_keke_witkey_prom_event ();
				$res and kekezu::admin_show_msg ( $_lang['delete_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['delete_fail'], $url,3,'','warning' );
				break;
		}
	}
}elseif(isset($sbt_action)){
	$ckb_string = $ckb;
	is_array ( $ckb_string ) and $ckb_string = implode ( ',', $ckb_string );
	if (count ( $ckb_string )) {
		$prom_event_obj->setWhere ( 'event_id in (' . $ckb_string . ')' );
		$res = $prom_event_obj->del_keke_witkey_prom_event ();
		$res and kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], $url,3,'','warning' );
	}
} else {
	$type_arr = keke_prom_class::get_prom_type();
	$where = '1=1';
	$w ['event_id'] and $where .= " and event_id = ".intval($w['event_id']);
	$w ['username'] and $where .= " and username like '%".$w['username']."%'";
	$w ['parent_username'] and $where .= " and parent_username like '%".$w['parent_username']."%'";
	$w ['action'] and $where .= " and action = '".$w['action']."'";
	$w[ord][0]&&$w[ord][1] and $where .= " order by {$w['ord']['0']} {$w['ord']['1']} " or $where .= " order by event_id desc ";
	$prom_event_obj->setWhere ( $where );
	$count = $prom_event_obj->count_keke_witkey_prom_event ();
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom('ajax_dom');
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$prom_event_obj->setWhere ( $where . $pages ['where'] );
	$prom_event_arr = $prom_event_obj->query_keke_witkey_prom_event ();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );