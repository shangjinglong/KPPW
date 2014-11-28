<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('industry', 'industry_edit', 'skill', 'skill_edit','comment','report','tpl' ,'mail','custom','union_industry','check_comment');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'industry';
if (file_exists ( ADMIN_ROOT . 'admin_task_' . $view . '.php' )) {
	require ADMIN_ROOT . 'admin_task_' . $view . '.php';
} else {
	kekezu::admin_show_msg ($_lang['404_page'],'',3,'','warning');
}
