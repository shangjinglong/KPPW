<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(80);
$views = array ("rights", "report",  "process" );
in_array ( $view, $views ) or $view = "rights";
$action_arr    = keke_report_class::get_transrights_type();
$trans_status = keke_report_class::get_transrights_status(); 
$trans_object = keke_report_class::get_transrights_obj(); 
$page and $page=intval ( $page ) or $page = '1';
$page_size and $page_size=intval ( $page_size ) or $page_size = "10";
$url = "index.php?do=$do&view=$view&report_status=$report_status&obj=$obj&ord=$ord&page_size=$page_size&page=$page";
if ($ac) {
	switch ($ac) {
		case "del" :
			if ($report_id) {
				$res = db_factory::execute ( sprintf ( " delete from %switkey_report where report_id='%d'", TABLEPRE, $report_id ) );
				$res and kekezu::admin_show_msg ( $_lang['record_delete_success'], $url, "3",'','success' ) or kekezu::admin_show_msg ($action_arr[$view]. $_lang['record_delete_fail'], $url, "3",'','warning');
			} else
				kekezu::admin_show_msg ($_lang['choose_delete_operate'], $url, "3",'','warning' );
			break;
		case "download" :
			keke_file_class::file_down ( $filename, $filepath );
			break;
	}
} elseif ($sbt_action) {
	$ckb and $dels = implode ( ",", $ckb ) or $dels = array ();
	if (! empty ( $dels )) {
		$res = db_factory::execute ( sprintf ( " delete from %switkey_report where report_id in ('%s') ", TABLEPRE, $dels ) );
		$res and kekezu::admin_show_msg ( $action_arr[$view].$_lang['record_mulit_delete_success'], $url, "3",'','success' ) or kekezu::admin_show_msg ( $action_arr[$view].$_lang['record_delete_fail'], $url, "3",'','warning' );
	} else
		kekezu::admin_show_msg ($_lang['choose_delete_operate'], $url, "3",'','warning' );
} else {
	$report_obj = new Keke_witkey_report_class ();
	$page_obj = $kekezu->_page_obj;
	$where = " report_type = '" . $action_arr [$view] ['0'] . "'";
	$report_id and $where .= " and report_id='$report_id'";
	$report_status and $where .= " and report_status='$report_status' ";
	$obj and $where .= " and obj='$obj' ";
	is_array($w['ord']) and $where .=' order by '.$ord['0'].' '.$ord['1']  or $where .= " order by report_id desc ";
	$report_obj->setWhere ( $where );
	$count = intval ( $report_obj->count_keke_witkey_report () );
	$page_obj->setAjax(1);
	$page_obj->setAjaxDom("ajax_dom");
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
	$report_obj->setWhere ( $where . $pages ['where'] );
	$report_list = $report_obj->query_keke_witkey_report ();
	if(is_array($report_list)){
		foreach($report_list as $k=>$v){
           $report_list[$k] = $v;
           $arrTaskInfo = db_factory::get_one("select model_id from ".TABLEPRE."witkey_task where task_id=".$v[origin_id]);
           $report_list[$k]['model_id'] = $arrTaskInfo['model_id'];
		}
	}
}
if ($view != 'process') {
	require keke_tpl_class::template ( ADMIN_DIRECTORY.'/tpl/admin_trans_rights' );
} else {
	require ADMIN_ROOT . 'admin_' . $do . '_' . $view . '.php';
}
