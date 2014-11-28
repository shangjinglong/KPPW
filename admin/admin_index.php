<?php	defined ( 'ADMIN_KEKE' ) or 	exit ( 'Access Denied' );
$menu_conf = $admin_obj->get_admin_menu();
$sub_menu_arr = $menu_conf['menu'];
$fast_menu_arr=$admin_obj->get_shortcuts_list();
$check_screen_lock=$admin_obj->check_screen_lock();
switch ($ac){
	case "nav_search":
			$nav_search=$admin_obj->search_nav($keyword);
			require $kekezu->_tpl_obj->template("admin/tpl/admin_" .$ac);
			die();
		break;
	case "lock":
		$admin_obj->screen_lock();
		break;
	case "unlock":
		$unlock_times=$admin_obj->times_limit($unlock_num);
		$admin_obj->screen_unlock($unlock_num,$unlock_pwd);
		require $kekezu->_tpl_obj->template("admin/tpl/admin_screen_lock");
		die();
		break;
	case "add_shortcuts":
		$admin_obj->add_fast_menu($r_id);
		break;
	case "rm_shortcuts":
		$admin_obj->rm_fast_menu($r_id);
		break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'.$do);