<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('list', 'add','search' );
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'list';
if (file_exists ( ADMIN_ROOT . 'admin_case_' . $view . '.php' )) {
	require_once ADMIN_ROOT . 'admin_case_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning');
}
