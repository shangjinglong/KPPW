<?php
kekezu::check_login ();
$id = intval($id);
$gUid = intval($gUid);
$orderId = intval($orderId);
$strUrl = "index.php?do=gy&id=".$id;
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
$arrAllDistrict 				= CommonClass::getAllDistrict();
$arrTopIndustrys = $kekezu->_indus_p_arr;
$strExtTypes   = kekezu::get_ext_type (); 
if($orderId){
	$arrOrderInfo = db_factory::get_one(sprintf("select * from %switkey_order where order_id=%d",TABLEPRE,$orderId));
	if(!$arrOrderInfo){
		kekezu::show_msg('操作提示','index.php?do=goodslist',3,'订单不存在','warning');
	}
	$arrServiceOrderInfo = db_factory::get_one(sprintf("select * from %switkey_service_order where order_id=%d",TABLEPRE,$orderId));
}
$reportUrl = $strUrl.'&orderId='.$orderId.'&action=rights&objId='.$orderId.'&objType=order&type=1&toUid=';
if($id == $gUid){
	$reqPage = 'seller';
	$arrBuyerInfo 					= kekezu::get_user_info($arrOrderInfo['order_uid']);
	$arrBuyerInfo['comefrom'] 		= $arrAllDistrict[$arrBuyerInfo['province']]['name'].'-'.$arrAllDistrict[$arrBuyerInfo['city']]['name'];
	$arrBuyerInfo['userlevel'] 	= unserialize($arrBuyerInfo['buyer_level']);
	$arrAid	    					= keke_user_mark_class::get_user_aid ($arrBuyerInfo['uid'],1, null, '1' );
	$arrServiceOrderInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrServiceOrderInfo['indus_pid'],'indus_id,indus_pid,indus_name');
	$reportUrl .= $arrBuyerInfo['uid'];
}else{
	$reqPage = 'buyer';
	$arrSellerInfo 					= kekezu::get_user_info($id);
	$arrSellerInfo['comefrom'] 		= $arrAllDistrict[$arrSellerInfo['province']]['name'].'-'.$arrAllDistrict[$arrSellerInfo['city']]['name'];
	$arrSellerInfo['userlevel'] 	= unserialize($arrSellerInfo['seller_level']);
	$arrSellerInfo['nearlyIncome'] 	= CommonClass::getNearlyIncomeForDays($arrSellerInfo['uid']);
	$arrAid	    					= keke_user_mark_class::get_user_aid ($arrSellerInfo['uid'],2, null, '1' );
	$reportUrl .= $arrSellerInfo['uid'];
}
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
			if($gUid == $id){
				$step = 'step5';
			}else{
				$step = 'step4';
			}
			break;
		case 'confirm_complete': 	
			if($gUid ==  $id){
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
			kekezu::show_msg('操作提示','index.php?do=seller&id='.$id,3,'订单已关闭','warning');
			break;
		default:break;
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
$serviceSql = 'select service_id,model_id,title,price from '.TABLEPRE.'witkey_service where uid = '.$id.' and service_status = 2 and model_id = 7 order by service_id desc limit 0,5';
$arrServiceLists = db_factory::query($serviceSql);
require  $do."/" .$reqPage."_order.php";
require  $kekezu->_tpl_obj->template($do.'/'.$reqPage."_index");die();
