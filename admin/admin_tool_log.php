<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (19);
$group_arr = keke_admin_class::get_user_group ();
$table_obj = keke_table_class::get_instance ( 'witkey_system_log' );
intval ( $page ) or $page = 1;
intval ( $wh ['page_size'] ) or $wh ['page_size'] = 10;
$url = "index.php?do=$do&view=$view&txt_username=$txt_username&txt_content=$txt_content&txt_log_id=$txt_log_id&page=$page&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}&wh[page_size]={$wh['page_size']}";
if ($ac == 'del') {
	$res = $table_obj->del ( 'log_id', $log_id );
	kekezu::admin_system_log($_lang['delete_sys_log'] . $log_id ); 
	$res and kekezu::admin_show_msg ($_lang['delete_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['delete_fail'], $url,3,'','warning' );
} elseif ($ac == 'del_all') {
	$sql = sprintf ( "TRUNCATE TABLE %switkey_system_log", TABLEPRE );
	db_factory::execute ( $sql );
	kekezu::admin_system_log( $_lang['empty_system_log'] );
	kekezu::admin_show_msg ( $_lang['empty_system_log_success'], $url,3,'','success' );
} elseif ($sbt_action) {
	$res = $table_obj->del ( 'log_id', $ckb );
	kekezu::admin_system_log( $_lang['mulit_delete_log'] );
	$res and kekezu::admin_show_msg ($_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['mulit_operate_fail'], $url,3,'','warning' );
} else {
	$where = " 1 = 1";
	empty ( $txt_log_id ) or $where .= " and log_id =" . intval ( $txt_log_id );
	empty ( $txt_username ) or $where .= " and username like '%$txt_username%'";
	empty ( $txt_content ) or $where .= " and log_content like '%$txt_content%'";
	$w[ord][1]&&$w[ord][0] and $where .= " order by {$w['ord']['0']} {$w['ord']['1']}" or $where .= " order by log_id desc ";
	$d = $table_obj->get_grid($where, $url,$page,$wh['page_size'],null,1,'ajax_dom');
	$log_data = $d ['data'];
	$pages = $d ['pages'];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );