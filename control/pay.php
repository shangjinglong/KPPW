<?php
$arrOnlinePayList = keke_finance_class::get_pay_config ( '', 'online' );
$pay_statusnum=0;
foreach ($arrOnlinePayList as $k => $v){
	if($v['pay_status']=='1'){
	 $pay_statusnum+=1;
	}
}
if(!$pay_statusnum){
	$payStatus=0;
}
$type = strval ( trim ( $type ) );
$id = intval ( trim ( $id ) );
switch ($type) {
	case 'hosted':
		$arrTaskInfo = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $id ) );
		$modelInfo = $kekezu->_model_list [$arrTaskInfo ['model_id']];
		$className = $modelInfo ['model_code'] . "_task_class";
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select order_id from %switkey_order_detail where obj_id=%d and obj_type = 'hosted'", TABLEPRE, $id ) );
		$orderId = intval ( $arrOrderDetailInfo ['order_id'] );
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select * from %switkey_order where order_id=%d ", TABLEPRE, $orderId ) );
		$cash = $arrOrderInfo ['order_amount'];
		$title = $arrTaskInfo ['task_title'];
		$objId = $arrTaskInfo ['task_id'];
		$modelId = $arrTaskInfo ['model_id'];
		break;
	case 'task' :
		$arrTaskInfo = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $id ) );
		$modelInfo = $kekezu->_model_list [$arrTaskInfo ['model_id']];
		$className = $modelInfo ['model_code'] . "_task_class";
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select order_id from %switkey_order_detail where obj_id=%d and obj_type = 'task'", TABLEPRE, $id ) );
		$orderId = intval ( $arrOrderDetailInfo ['order_id'] );
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select * from %switkey_order where order_id=%d ", TABLEPRE, $orderId ) );
		$cash = $arrOrderInfo ['order_amount'];
		$title = $arrTaskInfo ['task_title'];
		$objId = $arrTaskInfo ['task_id'];
		$modelId = $arrTaskInfo ['model_id'];
		break;
	case 'order' :
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select order_id,order_amount,order_name,order_uid from %switkey_order where order_id=%d ", TABLEPRE, $id ) );
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select obj_id from %switkey_order_detail where order_id=%d ", TABLEPRE, $id ) );
		$arrServiceInfo = db_factory::get_one ( sprintf ( "select model_id from %switkey_service where service_id=%d ", TABLEPRE, $arrOrderDetailInfo ['obj_id'] ) );
		$orderId = intval ( $arrOrderInfo ['order_id'] );
		$cash = floatval ( $arrOrderInfo ['order_amount'] );
		$title = strval ( $arrOrderInfo ['order_name'] );
		$objId = intval ( $arrOrderDetailInfo ['obj_id'] );
		$modelId = intval ( $arrServiceInfo ['model_id'] );
		break;
	case 'payitem' :
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select order_id,order_amount,order_name,order_uid from %switkey_order where order_id=%d ", TABLEPRE, $id ) );
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select obj_id from %switkey_order_detail where order_id=%d ", TABLEPRE, $id ) );
		$orderId = intval ( $arrOrderInfo ['order_id'] );
		$cash = floatval ( $arrOrderInfo ['order_amount'] );
		$title = strval ( $arrOrderInfo ['order_name'] );
		$objId = intval ( $arrOrderDetailInfo ['obj_id'] );
		$modelId = intval ( $arrServiceInfo ['model_id'] );
}
if($gUid != $arrOrderInfo['order_uid']){
	kekezu::show_msg('页面不存在','',3,null,'warning');
}
$strUrl = 'index.php?do=pay&type=' . $type . '&cash=' . $cash;
if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	if ($type == 'task') {
		$payTitle = $_K ['html_title'] . ' - 发布任务 - ' . $title;
	} elseif ($type == 'payitem') {
		$payTitle = $_K ['html_title'] . ' - 增值工具 - ' . $title;
	}else if($type=='order'){
		$payTitle = $_K ['html_title'] . ' - 购买服务 - '.$title;
	}else if($type=='hosted'){
		$payTitle = $_K ['html_title'] . ' - 托管金额 - '.$title;
	}
	$bankConfig = kekezu::get_payment_config ( $bank );
	require S_ROOT . "/include/payment/" . $bank . "/order.php";
	if($type == 'payitem'){
		$form = get_pay_url ( 'payitem_charge', $cash, $bankConfig, $payTitle, $orderId, $modelId, $objId, NULL, 'MD5', 'form' );
	}else{
		$form = get_pay_url ( 'order_charge', $cash, $bankConfig, $payTitle, $orderId, $modelId, $objId, NULL, 'MD5', 'form' );
	}
	echo $form;
	die ();
}
$strPageTitle = '在线支付' . '-' . $kekezu->_sys_config ['index_seo_title'];
