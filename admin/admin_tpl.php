<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('ink','edit_ink', 'ad','ad_add','ad_list','ad_group','ad_group_add','ad_private_add', 'taglist', 'edit_tag','preview_tag','edit_tagtpl','tpllist','edit_tpl','export','feed','editfeed');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'ink';
if (file_exists ( ADMIN_ROOT . 'admin_'.$do.'_' . $view . '.php' )) {  
	require  ADMIN_ROOT . 'admin_'.$do.'_'. $view . '.php';  
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}