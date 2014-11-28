<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$event_id or kekezu::admin_show_msg ( $_lang['param_error'], "index.php?do=$do&view=event",3,'','warning');
$objProm = keke_prom_class::get_instance ();
$prom_arr = $objProm->get_prom_type();
$event_id and $event_info= db_factory::get_one(" select * from ".TABLEPRE."witkey_prom_event where event_id = '$event_id'");
if($event_info['action']=='pub_task'||$event_info['action']=='bid_task'){
	$objInfo =db_factory::get_one(sprintf('select * from  %s where task_id= %d',TABLEPRE.'witkey_task',intval($event_info['obj_id'])));
	$objInfo['id'] = $objInfo['task_id'];
	$objInfo['title'] = $objInfo['task_title'];
	$objInfo['url'] = $_K['siteurl'].'/index.php?do=task&id='.intval($objInfo['id']);
}elseif($event_info['action']=='service'){
	$objInfo =db_factory::get_one(sprintf('select * from  %s where service_id= %d',TABLEPRE.'witkey_service',intval($event_info['obj_id'])));
	$objInfo['id'] = $objInfo['service_id'];
	$objInfo['title'] = $objInfo['title'];
	$objInfo['url'] = $_K['siteurl'].'/index.php?do=goods&id='.intval($objInfo['id']);
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );