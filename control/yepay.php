<?php
$type 	= strval(trim($type));
$id 		= intval(trim($id));
switch ($type) {
	case 'task':
		$arrTaskInfo = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $id ) );
		$modelInfo = $kekezu->_model_list [$arrTaskInfo['model_id']];
		$className = $modelInfo ['model_code'] . "_task_class";
		$arrOrderinfo = db_factory::get_one(sprintf("select order_id from %switkey_order_detail where obj_id=%d and obj_type = 'task'",TABLEPRE,$id));
		$obj = new $className ( $arrTaskInfo );
		$arrResult = $obj->dispose_order ( $arrOrderinfo['order_id']);
		$jumpUrl = 'index.php?do=pubtask&id='.$arrTaskInfo['model_id'].'&step=step4&taskId='.$id.'&status=1';
		header('Location:'.$jumpUrl);
	break;
	case 'service':
	;
	break;
	case 'order':
	;
	break;
}
die();
