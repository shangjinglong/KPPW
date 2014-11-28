<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(66);
include_once S_ROOT . '/keke_client/sms/d9.php';
$account_info = $kekezu->_sys_config; 
$mobile_u = $account_info ['mobile_username'];
$mobile_p = $account_info ['mobile_password'];
$op and $op = $op or $op = 'config';
$url = "index.php?do=$do&view=$view&op=$op";
switch ($op) {
	case "config" :
		if (! isset ( $sbt_edit )) {
			$bind_info = check_bind ( 'mobile_username' );
		} else { 
			foreach ( $conf as $k => $v ) {
				if (check_bind ( $k )) {
					$res .= db_factory::execute ( " update " . TABLEPRE . "witkey_basic_config set v='$v' where k='$k'" );
				} else {
					$res .= db_factory::execute ( " insert into " . TABLEPRE . "witkey_basic_config values('','$k','$v','mobile','','')" );
				}
			}
			$kekezu->_cache_obj->gc();
			kekezu::admin_system_log($_lang['edit_mobile_log']);
			kekezu::admin_show_msg ( $_lang['binding_cellphone_account_successfully'], "index.php?do=$do&view=$view&op=config",3,'','success' );
		}
		break;
	case "manage" :
		if ($remain_fee) {
			if ($mobile_p && $mobile_u) {
				$msg = new sms_d9('','');
				$m =  $msg->get_userinfo();
				if (! $m) {
					kekezu::echojson ( $_lang['get_user_info_fail'], "2" );
					die ();
				} else {
					kekezu::echojson ($m, "1" );
					die ();
				}
			} else {
				kekezu::admin_show_msg ( $_lang['not_bind_cellphone_account'], "index.php?do=$do&view=$view&op=config",3,'','warning' );
			}
		}
		break;
}
function check_bind($k) {
	return db_factory::get_count ( " select k from " . TABLEPRE . "witkey_basic_config where k='$k'" );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );