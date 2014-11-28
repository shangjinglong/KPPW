<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 2 );
$url = "index.php?do=$do&view=$view";
$default_currency =$kekezu->_sys_config['currency'];
$currencies_obj = new keke_table_class('witkey_currencies');
$page and $page=intval ( $page ) or $page = 1;
$slt_page_size and $slt_page_size=intval ( $slt_page_size ) or $slt_page_size = 20;
$cur = new keke_curren_class();
if ($ac == 'del') {
	if ($cid&&($cid!=keke_curren_class::$_default['currencies_id'])) { 
		$res = $currencies_obj->del ( "currencies_id", $cid, $url );
		kekezu::admin_system_log ( $_lang['links_delete'].$del_id );
		kekezu::admin_show_msg ( $_lang['delete_success'], $url,3,'','success' );die;
	} else {
		kekezu::admin_show_msg ( $_lang['delete_fail'], $url ,3,$_lang['del_default'],'warning');die;
	}
}else {
	$where = ' 1 = 1  ';
	$d = $currencies_obj->get_grid ( $where, $url, $page, $slt_page_size,null,1,'ajax_dom');
	$currencies_config = $d [data];
	$pages = $d [pages];
}
if($ac=='update'){
	if(isset($code)){
		$res = $cur->update(false,$code);
	}else{
		$res = $cur->update(true);
	}
	$res and kekezu::admin_show_msg ( $_lang['update_mi_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['update_mi_fail'], $url,3,'','warning' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );