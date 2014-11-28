<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('weibo','config', 'send', 'internal','intertpl','attention','map');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'weibo';
if (file_exists ( ADMIN_ROOT . 'admin_msg_' . $view . '.php' )) {
	require ADMIN_ROOT . 'admin_msg_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}