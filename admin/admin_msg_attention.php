<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 140 );
if (isset ( $submit )) {
	$basic_obj = new Keke_witkey_basic_config_class ();
	foreach ( $conf as $k => $v ) {
		$basic_obj->setWhere ( "k = '$k'" );
		$basic_obj->setV ( $v );
		$res .= $basic_obj->edit_keke_witkey_basic_config ();
	}
	! empty ( $api ) and $attent_api = $api or $attent_api = array ();
	$basic_obj->setWhere ( "k = 'attent_api_open'" );
	$basic_obj->setV ( serialize($attent_api));
	$basic_obj->edit_keke_witkey_basic_config ();
	kekezu::admin_system_log ( $_lang['weibo_config_view'] );
	kekezu::admin_show_msg ( $_lang['weibo_view_config_success'], "index.php?do=msg&view=attention", 3 ,'','success');
} else {
	$attent_api = db_factory::get_count ( sprintf ( " select v from %switkey_basic_config where type='attent_api'", TABLEPRE ) );
	$attent_api = unserialize($attent_api);
	$attent_list = kekezu::get_table_data ( "k,v,desc", "witkey_basic_config", "type='attention'", 'listorder asc ', "", "", "k" );
}
require keke_tpl_class::template ( ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );