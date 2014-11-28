<?php	defined ( "ADMIN_KEKE" ) or exit ( "Access Denied" );
kekezu::admin_check_role ( 133 );
$juese = array ("1" => $_lang['witkey'], "2" => $_lang['employer'] );
$url = "index.php?do=config&view=mark&op=config";
$mark_config_obj = keke_table_class::get_instance ( 'witkey_mark_config' );
$mark_config_id and $mark_config_arr = $mark_config_obj->get_table_info ( 'mark_config_id', intval($mark_config_id) );
foreach ( $kekezu->_model_list as $k => $v ) {
	$model_list2 [$v ['model_code']] = $v ['model_name'];
}
if ($sbt_add && $fds && $hdn_mark_config_id) {
	$hdn_mark_config_id and kekezu::admin_system_log ( $_lang['edit'] . $obj_name . $_lang['mark_config'] );
	$res = $mark_config_obj->save ( $fds, array ('mark_config_id' => $hdn_mark_config_id ) );
	kekezu::admin_show_msg ( $_lang['edit_success'], $url,3,'','success' );
}
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_" . $do . "_" . $view . "_" . $op );