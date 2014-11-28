<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(35);
if ($setting == 'del'){
	$config_obj = new Keke_witkey_basic_config_class();
	$config_obj->setWhere("k='user_intergration'");
	$config_obj->setV(1);
	$config_obj->edit_keke_witkey_basic_config();
	$kekezu->_cache_obj->gc();
	kekezu::admin_system_log($_lang['uninstall_log_msg']);
	kekezu::admin_show_msg($_lang['success_uninstall'],"index.php?do=config&view=integration",3,'','success');
}
$config_obj = new Keke_witkey_basic_config_class();
if ($type == 'uc'){
	require_once S_ROOT."/config/config_ucenter.php";
	if(isset($ac)&& $ac = 'setting'){
		$config_ucenter = keke_tpl_class::sreadfile(S_ROOT."/config/config_ucenter.php");
		foreach ($settingnew as $k=>$v){
			$config_ucenter = preg_replace("/define\('$k',\s*'.*?'\);/i", "define('$k', '$v');", $config_ucenter);
		}
		keke_tpl_class::swritefile(S_ROOT."./config/config_ucenter.php",$config_ucenter);
		$bbserver = 'http://'.preg_replace("/\:\d+/", '', $_SERVER['HTTP_HOST']).($_SERVER['SERVER_PORT'] && $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '');
		$default_ucapi = $bbserver.'/ucenter';
		$app_type = 'OTHER';
		$app_name = $basic_config['website_name']?$basic_config['website_name']:P_NAME;
		$app_url = $basic_config['website_url']?$basic_config['website_url']:'http://localhost';
		$ucapi = $settingnew['UC_API'] ? $settingnew['UC_API'] : (defined('UC_API') && UC_API ? UC_API : $default_ucapi);
		$ucip = isset($settingnew['UC_IP']) ? $settingnew['UC_IP'] : '';
		$ucfounderpw = $uc_creater;
		UC_API?UC_API:define(UC_API, $settingnew['UC_API']);
		require_once S_ROOT . '/uc_client/client.php';
		$ucinfo = uc_fopen($ucapi.'/index.php?m=app&a=ucinfo&release='.UC_CLIENT_RELEASE, 500, '', '', 1, $ucip);
		list($status, $ucversion, $ucrelease, $uccharset, $ucdbcharset, $apptypes) = explode('|', $ucinfo);
		if($status != 'UC_STATUS_OK') {
			kekezu::admin_show_msg($_lang['uc_communication_fail'],'index.php?do=config&view=integration&type=uc',3,'','warning');
		} else {
			$dbcharset = strtolower(DBCHARSET ? str_replace('-', '', DBCHARSET) : 'utf8');
			$ucdbcharset = strtolower($settingnew['UC_DBCHARSET'] ? str_replace('-', '', $settingnew['UC_DBCHARSET']) : $settingnew['UC_DBCHARSET']);
			if(UC_CLIENT_VERSION > $ucversion) {
				kekezu::admin_show_msg($_lang['uc_different_version'],'index.php?do=config&view=integration&type=uc',3,'','warning');
			} elseif($dbcharset && $ucdbcharset != $dbcharset) {
				kekezu::admin_show_msg($_lang['uc_different_coding'],'index.php?do=config&view=integration&type=uc',3,'','warning');
			}
			$postdata = "m=app&a=add&ucfounder=&ucfounderpw=".urlencode($ucfounderpw)."&apptype=".urlencode($app_type)."&appname=".urlencode($app_name)."&appurl=".urlencode($app_url)."&appip=&appcharset=".CHARSET.'&appdbcharset='.DBCHARSET.'&'.$app_tagtemplates.'&release='.UC_CLIENT_RELEASE;
			$ucconfig = uc_fopen($ucapi.'/index.php', 500, $postdata, '', 1, $ucip);
			if(empty($ucconfig)) {
				kekezu::admin_show_msg($_lang['uc_app_fail_to_add'],'index.php?do=config&view=integration&type=uc','',3,'warning');
			} elseif($ucconfig == '-1') {
				kekezu::admin_show_msg($_lang['uc_error_author_password'],'index.php?do=config&view=integration&type=uc',3,'','warning');
			} else {
				list($appauthkey, $appid) = explode('|', $ucconfig);
				if(empty($appauthkey) || empty($appid)) {
					kekezu::admin_system_log($_lang['add_log_msg']);
					kekezu::admin_show_msg(keke::lang('uc_app_invalid_to_add'),'index.php?do=config&view=integration&type=uc',3,'','success');
				}
			}
		}
		$ucconfig_info = explode('|', $ucconfig);
		$config_ucenter = keke_tpl_class::sreadfile(S_ROOT."/config/config_ucenter.php");
		$config_ucenter = preg_replace("/define\('UC_KEY',\s*'.*?'\);/s", "define('UC_KEY', '".$ucconfig_info['0']."');", $config_ucenter);
		$config_ucenter = preg_replace("/define\('UC_APPID',\s*'*.*?'*\);/s", "define('UC_APPID', ".$ucconfig_info[1].");", $config_ucenter);
	 	keke_tpl_class::swritefile(S_ROOT."/config/config_ucenter.php",$config_ucenter);
	 	$config_obj->setWhere(" k = 'user_intergration'");
	 	$config_obj->setV(2);
		$config_obj->edit_keke_witkey_basic_config();
		$kekezu->_cache_obj->gc();
		kekezu::admin_system_log($_lang['uc_integrate_log']);
		kekezu::admin_show_msg($_lang['uc_integrate_success'],"index.php?do=config&view=integration",2,'','success');
	}
	require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_'.$view.'_uc' );
	die();
}
require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_'.$view );
