<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
switch ($ac){
	case "lock":
		$admin_obj->screen_lock();
		break;
	case "unlock":
		$admin_obj->screen_unlock($unlock_times,$unlock_pwd);
		break;
}
require $kekezu->_tpl_obj->template("admin/tpl/admin_" .$do);