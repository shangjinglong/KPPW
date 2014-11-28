<?php	 defined ( 'ADMIN_KEKE' )or exit ( 'Access Denied' );
$views = array ('config','item','event','prom_rule','item_edit','edit_event','relation_add','relation');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'config';
if ( file_exists ( ADMIN_ROOT . 'admin_'.$do.'_' . $view . '.php' ) ) {
	require ADMIN_ROOT . 'admin_'.$do.'_' . $view . '.php';
} else {
	kekezu::admin_show_msg ($_lang['404_page'],'',3,'','warning' );
}