<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 38 );
$auth_item_obj = new Keke_witkey_auth_item_class ();
if ($ac === 'del') {
	keke_auth_fac_class::del_auth ( $code, 'auth_item_cache_list' ); 
	kekezu::admin_system_log ( $_lang['delete_auth'] . $code ); 
} elseif (isset ( $sbt_add )) {
	keke_auth_fac_class::install_auth ( $auth_dir ); 
	kekezu::admin_system_log ( $_lang['add_auth'] . $auth_dir ); 
} elseif (isset ( $sbt_action ) && $sbt_action === $_lang['mulit_delete']) { 
	keke_auth_fac_class::del_auth ( $ckb, 'auth_item_cache_list' ); 
	kekezu::admin_system_log ( $_lang['mulit_delete_auth'] . $ckb );
} else {
	$where = ' 1 = 1  ';
	intval ( $page_size ) or $page_size = 10 and $page_size = intval ( $page_size );
	$auth_item_obj->setWhere ( $where );
	$count = $auth_item_obj->count_keke_witkey_auth_item ();
	$page or $page = 1 and $page = intval ( $page );
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$where .= " order by listorder asc ";
	$auth_item_obj->setWhere ( $where . $pages ['where'] );
	$auth_item_arr = $auth_item_obj->query_keke_witkey_auth_item ();
}
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );