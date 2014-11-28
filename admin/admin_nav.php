<?php	defined ( 'ADMIN_KEKE' )  or 	exit ( 'Access Denied' );
$menu_conf = $admin_obj->get_admin_menu();
$sub_menu_arr = $menu_conf['menu'];
require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do );