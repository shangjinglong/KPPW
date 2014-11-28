<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (30);
$t_obj = keke_table_class::get_instance ( "witkey_link" );
$page and $page=intval ( $page ) or $page = 1;
$slt_page_size and $slt_page_size=intval ( $slt_page_size ) or $slt_page_size = 10;
$url = "index.php?do=$do&view=$view&page=$page&slt_page_size=$slt_page_size&txt_link_id=$txt_link_id&txt_link_name=$txt_link_name&ord[]=$ord[0]&ord[]=$ord[1]";
if ($ac == 'del') {
	if ($link_id) {
		$res = $t_obj->del ( "link_id", $link_id, $url );
		kekezu::admin_system_log ( $_lang['links_delete'].$link_id );
		kekezu::admin_show_msg ( $_lang['delete_success'], $url,3,'','success' );
	} else {
		kekezu::admin_show_msg ( $_lang['delete_fail'], $url ,3,'','warning');
	}
} elseif (isset ( $sbt_action ) && $sbt_action == $_lang['mulit_delete']) { 
	empty ( $ckb ) and kekezu::admin_show_msg ( $_lang['choose_operate_item'], 'index.php?do=' . $do . '&view=' . $view ,3,'','warning');
	$res = $t_obj->del ( "link_id", $ckb );
	if ($res) {
		kekezu::admin_system_log ( $_lang['links_delete'] . implode ( ",", $ckb ) );
		kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' );
	} else {
		kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], $url,3,'','warning' );
	}
} else {
	$where = ' 1 = 1  ';
	$txt_link_id and $where .= "  and link_id = ".intval($txt_link_id);
	$txt_link_name and $where .= " and link_name like '%" .$txt_link_name.  "%'";
	if($ord [1]){
		$where .= " order by $ord[0] $ord[1] ";
	}else{
		$where .= " order by link_id desc";
	}
	$d = $t_obj->get_grid ( $where, $url, $page, $slt_page_size,null,1,'ajax_dom');
	$link_arr = $d [data];
	$pages = $d [pages];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );