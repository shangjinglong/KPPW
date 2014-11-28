<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$ops = array ('list','edit');
$op = (! empty ( $op ) && in_array ( $op, $ops )) ? $op : 'list';
if (file_exists ( ADMIN_ROOT . 'admin_'.$do.'_' . $view .'_'.$op. '.php' )) {  
	require  ADMIN_ROOT . 'admin_'.$do.'_'. $view .'_'.$op. '.php';  
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}