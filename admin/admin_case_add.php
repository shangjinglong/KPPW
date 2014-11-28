<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(154);
$case_obj = new Keke_witkey_case_class ();
$task_obj = new Keke_witkey_task_class ();
$case_id and $case_info = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_case where case_id ='$case_id'" );
$txt_task_id and $case_info = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_task where task_id = '$txt_task_id'" );
$url ="index.php?do=case&view=list" ;
if ($ac == 'ajax' && $id&&$obj) {
	case_obj_exists ( $id, $obj ) and kekezu::echojson ( $_lang['echojson_msg'],1 ) or kekezu::echojson ( $_lang['echojosn_erreor_msg'],0 );
}
if (isset ( $sbt_edit )) {
	if ($hdn_case_id) {
		$case_obj->setCase_id ( $hdn_case_id );
	}else{
			if (case_obj_exists($fds['obj_id'],$case_type)) {
			$case_obj->setObj_id ( $fds ['obj_id'] );
			}
	}
	$case_obj->setObj_type ( $case_type );
	$case_obj->setCase_auther ( $fds ['case_auther'] );
	$case_obj->setCase_price ( $fds ['case_price'] );
	$case_obj->setCase_desc ( kekezu::escape($fds ['case_desc']) );
	$case_obj->setCase_title ( kekezu::escape($fds ['case_title']) );
	$case_obj->setOn_time ( time () );
	$case_img = $hdn_case_img or ($case_img = keke_file_class::upload_file ( "fle_case_img" ));
	$case_obj->setCase_img ($case_img );
	if ($hdn_case_id) {
		$res = $case_obj->edit_keke_witkey_case ();
		kekezu::admin_system_log ( $_lang['edit_case'].':' . $hdn_case_id );
		$res and kekezu::admin_show_msg ( $_lang['modify_case_success'], 'index.php?do=case&view=lise',3,'','success' ) or kekezu::admin_show_msg ( $_lang['modify_case_fail'], 'index.php?do=case&view=lise',3,'','warning' );
	}else{
		$res = $case_obj->create_keke_witkey_case ();
		kekezu::admin_system_log ( $_lang['add_case'] );
		$res and kekezu::admin_show_msg ( $_lang['add_case_success'],'index.php?do=case&view=lise',3,'','success' ) or kekezu::admin_show_msg ( $_lang['add_case_fail'],'index.php?do=case&view=add',3,'','warning' );
	}
}
function case_obj_exists($id, $obj = 'task') {
	if ($obj == 'task') {
		$search_obj = db_factory::get_count ( sprintf ( "select count(task_id) from %switkey_task where task_id='%d' ", TABLEPRE, $id ) );
	} elseif ($obj =='service') {
		$search_obj = db_factory::get_count ( sprintf ( "select count(service_id) from %switkey_service where service_id='%d' ", TABLEPRE, $id ) );
	}
	if ($search_obj) {
		return true;
	} else {
		return false;
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );