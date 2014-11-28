<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 141 );
if ($sbt_edit) { 
	$api = array();
	foreach ( $conf as $k => $v ) {
		$res .= db_factory::execute ( " update " . TABLEPRE . "witkey_basic_config set v='$v' where k='$k'" );
		$open==$k and $api[$k] = 1 or $api[$k] = 0;
	}
	$api = serialize($api);
	db_factory::execute(sprintf("update %switkey_basic_config set v='%s' where k='map_api_open'",TABLEPRE,$api));
	kekezu::admin_system_log ($_lang['edit_map_api']);
	if ($res){
		kekezu::admin_show_msg ($_lang['map_api_edit_success'], "index.php?do=$do&view=$view",2,'','success' );
	}
}else {
	$map_apis = kekezu::get_table_data ( "k,v,type,desc", "witkey_basic_config", "type='map'", "", "", "", "k" );
 	$api_open =  db_factory::get_one("select v from ".TABLEPRE."witkey_basic_config where k='map_api_open'");
 	$api_open =unserialize($api_open['v']);
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );