<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(154);
$model_type_arr  = keke_glob_class::get_task_type();
$kekezu->_page_obj->setAjax(1);
$kekezu->_page_obj->setAjaxDom('ajax_dom');
if($search_type=='task'){
	$sql =sprintf("select * from %switkey_task where ",TABLEPRE);
	$where = sprintf(" 1=1 and  task_status=%d",8);
	$search_id and 	$where .= sprintf(" and task_id=%d",$search_id);
	$url = "index.php?do=case&view=search&page_size=$page_size&search_type=$search_type&search_id=$search_id";
	$page_size = 5;
	$count = db_factory::get_count(sprintf("select count(task_id) as c from `%switkey_task` where %s ",TABLEPRE,$where));
	$page = $page ? $page : 1;
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$where .=$pages['where'];
	$task_case_arr = db_factory::query( $sql.$where);
}elseif($search_type=='service'){
	$sql =sprintf("select * from %switkey_service where ",TABLEPRE);
	$where = sprintf(" service_status!=%d",1);
	$search_id and 	$where .= sprintf(" and service_id=%d",$search_id);
	$url = "index.php?do=case&view=search&page_size=$page_size&search_type=$search_type&search_id=$search_id";
	$page_size = 5;
	$count = db_factory::get_count(sprintf("select count(service_id) as c from `%switkey_service` where %s",TABLEPRE,$where));
	$page = $page ? $page : 1;
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$where .=$pages['where'];
	$task_case_arr = db_factory::query( $sql.$where);
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );