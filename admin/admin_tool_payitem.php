<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );