<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (21);
$file_type_arr = keke_glob_class::get_file_type();
$file_obj = new Keke_witkey_file_class (); 
$backup_patch = S_ROOT ;
intval ( $page ) or $page = 1;
intval ( $wh ['page_size'] ) or $wh ['page_size'] = 10;
$url = "index.php?do=$do&view=$view&page=$page&wh[page_size]={$wh['page_size']}&txt_file_id=$txt_file_id&txt_file_name=$txt_file_name&ord[]={$ord['0']}&ord[]=$ord[1]";
if ($ac == 'del') {
	if ($file_id) {
		$file_obj->setWhere ( 'file_id=' . $file_id );
		$file_info = $file_obj->query_keke_witkey_file ();
		foreach ( $file_info as $v ) {
			@unlink ( $backup_patch . $v ['save_name'] ) and kekezu::admin_system_log ( $_lang['delete_attachment'].$v['file_name'] );
		}
		$file_obj->setWhere ( 'file_id=' . $file_id );
		$res = $file_obj->del_keke_witkey_file ();
		kekezu::admin_system_log($_lang['delete_attachment'] . $file_id );
		$res and kekezu::admin_show_msg ( $_lang['atachment_delete_success'], $url ,3,'','success') or kekezu::admin_show_msg ($_lang['attchment_not_exist_delete_fail'], $url ,3,'','warning');
	}
} elseif (isset ( $sbt_action )) { 
	is_array ( $ckb ) and $ids =  implode ( ',', array_filter($ckb));
	if (sizeof ( $ids )) {
		$where = "file_id in ($ids)";
		$file_obj->setWhere ( $where );
		$file_info = $file_obj->query_keke_witkey_file ();
		foreach ( $file_info as $v ) {
			@unlink ( $backup_patch . $v ['save_name'] );
		}
		$file_obj->setWhere ( $where );
		$res = $file_obj->del_keke_witkey_file ();
		if ($res) {
			kekezu::admin_system_log ( $_lang['delete_attachment']."$ids" );
			kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' );
		}
	} else {
		kekezu::admin_show_msg ($_lang['choose_operate_item'], $url,3,'','warning' );
	}
} else {
	$where = ' 1 = 1 '; 
	intval ( $txt_file_id ) and $where .= " and file_id = $txt_file_id";
	strval ( $txt_file_name ) and $where .= " and file_name like '%$txt_file_name%' ";
	$ord ['1'] and $where .= " order by $ord[0] $ord[1] " or $where .= " order by file_id desc";
	$table_obj = keke_table_class::get_instance ( "witkey_file" );
	$d = $table_obj->get_grid ( $where, $url, $page, $wh ['page_size'],null,1,'ajax_dom');
	$file_arr = $d['data'];
	$pages = $d['pages'];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );