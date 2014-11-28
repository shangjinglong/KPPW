<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$code or kekezu::admin_show_msg ( $_lang['error_param'], "index.php?do=auth",3,'','warning');
if ($sbt_edit){
	$big_icon = $filepath1;
	$small_before_icon = $filepath2;
	$small_after_icon = $filepath3;
	keke_auth_fac_class::edit_item($code, $fds,$pk,$big_icon,$small_after_icon,$small_before_icon);
}
kekezu::admin_system_log($_lang['edit_auth'] . $code);
if($code!='weibo')
	require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'. $do .'_'. $view);
else
	require  S_ROOT.'./auth/'.$auth_item['auth_dir'].'/admin/auth_config.php';
function get_fid($path){
	if(!path){
		return false;
	}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}