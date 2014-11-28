<?php
kekezu::check_login ();
$sid = intval($sid);
$orderId = intval($orderId);
if( 0 === $sid ){
	kekezu::show_msg('请选择购买对象','index.php?do=goodslist',3,'请选择购买对象','warning');
}
$strUrl = "index.php?do=order&sid=".$sid;
$step = strval(trim($step));
if(!$step){
	$step = 'step1';
}
$objServiceTime = new service_time_class();
$objServiceTime->validtaskstatus();
unset($objServiceTime);
$objGoodsTime = new goods_time_class();
$objGoodsTime->validtaskstatus();
unset($objGoodsTime);
$arrServiceInfo  				= keke_shop_class::get_service_info($sid);
if ($uid != $arrServiceInfo ['uid']&&$arrServiceInfo ['service_status']!=2&&$arrServiceInfo ['service_status']!=5) {
	$gUid == ADMIN_UID or kekezu::show_msg ( '操作提示', "index.php?do=goodslist", '1', '商品不存在', 'warning' );
}
$arrAllDistrict 				= CommonClass::getAllDistrict();
$arrTopIndustrys = $kekezu->_indus_p_arr;
$arrModelInfo  = $arrModelList [$arrServiceInfo['model_id']];
$strExtTypes   = kekezu::get_ext_type (); 
if($orderId){
	keke_shop_class::access_check($sid,$arrServiceInfo['uid'],$arrServiceInfo['model_id']);
	$arrOrderInfo = db_factory::get_one(sprintf("select * from %switkey_order where order_id=%d",TABLEPRE,$orderId));
	if(!$arrOrderInfo){
		kekezu::show_msg('操作提示','index.php?do=goodslist',3,'订单不存在','warning');
	}
	$arrServiceOrderInfo = db_factory::get_one(sprintf("select * from %switkey_service_order where order_id=%d",TABLEPRE,$orderId));
}
$reportUrl = $strUrl.'&orderId='.$orderId.'&action=rights&objId='.$orderId.'&objType=order&type=1&toUid=';
if($arrServiceInfo['uid'] == $gUid){
	$reqPage = 'seller';
	$arrBuyerInfo 					= kekezu::get_user_info($arrOrderInfo['order_uid']);
	$arrBuyerInfo['comefrom'] 		= $arrAllDistrict[$arrBuyerInfo['province']]['name'].'-'.$arrAllDistrict[$arrBuyerInfo['city']]['name'];
	$arrBuyerInfo['userlevel'] 	= unserialize($arrBuyerInfo['buyer_level']);
	$arrAid	    					= keke_user_mark_class::get_user_aid ($arrBuyerInfo['uid'],1, null, '1' );
	$arrServiceOrderInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrServiceOrderInfo['indus_pid'],'indus_id,indus_pid,indus_name');
	$reportUrl .= $arrBuyerInfo['uid'];
}else{
	$reqPage = 'buyer';
	$arrSellerInfo 					= kekezu::get_user_info($arrServiceInfo['uid']);
	$arrSellerInfo['comefrom'] 		= $arrAllDistrict[$arrSellerInfo['province']]['name'].'-'.$arrAllDistrict[$arrSellerInfo['city']]['name'];
	$arrSellerInfo['userlevel'] 	= unserialize($arrSellerInfo['seller_level']);
	$arrSellerInfo['nearlyIncome'] 	= CommonClass::getNearlyIncomeForDays($arrSellerInfo['uid']);
	$arrAid	    					= keke_user_mark_class::get_user_aid ($arrSellerInfo['uid'],2, null, '1' );
	$arrServiceInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrServiceInfo['indus_pid'],'indus_id,indus_pid,indus_name');
	$reportUrl .= $arrSellerInfo['uid'];
}
if($arrServiceInfo['model_id'] === '7'){
	switch ($arrOrderInfo['order_status']) {
		case 'seller_confirm': 		
			$step = 'step2';
			break;
		case 'wait': 				
			$step = 'step3';
			break;
		case 'ok': 					
			$step = 'step4';
			break;
		case 'working': 			
			if($gUid == $arrServiceInfo['uid']){
				$step = 'step5';
			}else{
				$step = 'step4';
			}
			break;
		case 'confirm_complete': 	
			if($gUid == $arrServiceInfo['uid']){
				$step = 'step5';
			}else{
				$step = 'step5';
			}
			break;
		case 'complete': 			
		case 'arbitral': 			
			$step = 'step6';
			break;
		case 'close': 			
			kekezu::show_msg('操作提示','index.php?do=goods&id='.$sid,3,'订单已关闭','warning');
			break;
		default:break;
	}
}else{
	switch ($arrOrderInfo['order_status']) {
		case 'wait': 				
			$step = 'step2';
			break;
		case 'ok': 					
			$step = 'step3';
			break;
		case 'confirm': 			
		case 'arbitral': 			
			$step = 'step4';
			break;
		case 'close': 			
			kekezu::show_msg('操作提示','index.php?do=goods&id='.$sid,3,'订单已关闭','warning');
			break;
		default:break;
	}
}
if($action === 'rights'){
	$transname = keke_report_class::get_transrights_name($type);
	if($type == '1'){
		if($arrOrderInfo['order_uid']==$gUid){
			$objType = 'work';
		}else{
			$objType = 'task';
		}
		$report_reason = keke_report_class::getRightsType($objType);
	}else{
		$report_reason = keke_report_class::getReportType($objType);
	}
	if (isset($formhash)&&kekezu::submitcheck($formhash)){
		$resText = keke_order_class::set_report ( $objId, $toUid, $type, $filepath, $tarContent, $sltReason );
		if($resText === true){
			kekezu::show_msg ( '感谢您的'.$transname.'，管理员会尽快受理，请耐心等待处理结果。', $strUrl."&orderId=".$orderId, 3, NULL, 'ok' );
		}else{
			kekezu::show_msg ( $resText, null, null, NULL, 'fail' );
		}
	}else{
		$strUrl = $reportUrl;
		require keke_tpl_class::template("tpl/default/ajax/report");
	}
	exit(0);
}
if($action === 'showKf'){
	$kf_info = kekezu::get_rand_kf();
	require keke_tpl_class::template ( 'shop/goods/tpl/default/order/kf_info' );
	die ();
	exit(0);
}
require S_ROOT . "/shop/" . $arrModelInfo['model_dir'] . "/control/".$reqPage."_order.php";
require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/order/".$reqPage."_index");die;
die;