<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(63);
$oauth_type_list = keke_glob_class::get_open_api();
$config_basic_obj = new Keke_witkey_basic_config_class ();
$config_arr = $kekezu->_weibo_list;
$api_open = $kekezu->_api_open;
$url = 'index.php?do=msg&view=weibo';
if (isset ( $submit )) {
	foreach ($conf as $k=>$v){
		$config_basic_obj->setWhere ( "k = '$k'" );
		$config_basic_obj->setV($v);
		$res .= $config_basic_obj->edit_keke_witkey_basic_config ();
	}
	!empty($api) and $oauth_api=$api or $oauth_api=array();
	$config_basic_obj->setWhere ( "k = 'oauth_api_open'" );
	$config_basic_obj->setV(serialize($oauth_api));
	$config_basic_obj->edit_keke_witkey_basic_config ();
	kekezu::admin_system_log($_lang['config_interface_log']);
	if ($res) {
		$kekezu->_cache_obj->del("keke_b3c58336");
		kekezu::admin_show_msg($_lang['oauth_api_config_success'],$url,3,'','success');
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'.$do.'_'.$view);