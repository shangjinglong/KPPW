<?php
	$arrOrderProgress = array(
			1=>array(
					'step'=>'step2',
					'state'=>'确认订单'
			),
			2=>array(
					'step'=>'step3',
					'state'=>'等待对方打款'
			),
			3=>array(
					'step'=>'step4',
					'state'=>'工作中'
			),
			4=>array(
					'step'=>'step5',
					'state'=>'完成工作'
			),
			5=>array(
					'step'=>'step6',
					'state'=>'双方互评'
			)
	);
	if($arrServiceOrderInfo['file_ids']){
		$arrFileLists = db_factory::query('select file_name,save_name from '.TABLEPRE.'witkey_file where file_id in('.$arrServiceOrderInfo['file_ids'].')');
	}
switch ($step) {
	case 'step1':break;
	case 'step2':
		if(isset($action)){
			switch ($action) {
				case 'accept':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'wait' );
					unset($objShop);
					if(true === $resText){
						kekezu::show_msg('订单处理完成，该订单已接受',$strUrl."&step=step3&orderId=".$orderId,3,null,'ok');
					}else{
						kekezu::show_msg($resText,$strUrl,3,null,'fail');
					}
					break;
				case 'refuse':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'close' );
					unset($objShop);
					if(true === $resText){
						kekezu::show_msg('订单处理完成，该订单已关闭',$strUrl."&step=step1&orderId=".$orderId,3,null,'ok');
					}else{
						kekezu::show_msg($resText,$strUrl,3,null,'fail');
					}
					break;
				default:
					kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
					break;
			}
		}
	break;
	case 'step3':break;
	case 'step4':
		if(isset($action)){
			switch ($action) {
				case 'working':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'working' );
					unset($objShop);
					kekezu::show_msg('订单处理完成，工作进行中',$strUrl."&step=step5&orderId=".$orderId,3,null,'ok');
				break;
				default:
					kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
				break;
			}
		}
	break;
	case 'step5':
		if(isset($action)){
			switch ($action) {
				case 'complete':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'confirm_complete' );
					unset($objShop);
					if(true === $resText){
						$objSerOrderM = new Keke_witkey_service_order_class();
						$objSerOrderM->setWhere('order_id ='.$orderId);
						$objSerOrderM->setWorkfile(strval(trim(kekezu::escape($workfile))));
						$objSerOrderM->edit_keke_witkey_service_order();
						kekezu::show_msg('订单处理完成，已确认完工',$strUrl."&step=step5&orderId=".$orderId,3,null,'ok');
					}else{
						kekezu::show_msg($resText,$strUrl,3,null,'fail');
					}
				break;
				default:
					kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
				break;
			}
		}
	break;
	case 'step6':
		$objId = $orderId;
		$arrMark = keke_user_mark_class::get_mark_info ( array ('model_code' => 'service', 'obj_id' => $objId,'by_uid'=>$gUid,'uid'=>$arrServiceOrderInfo['uid']) );
		$markInfo = $arrMark ['mark_info'] ['0'];
		$aidList = keke_user_mark_class::get_mark_aid ( 1 );
		$aidInfo=keke_user_mark_class::get_user_aid($markInfo['by_uid'],$markInfo['mark_type'],$markInfo['mark_status'],2,$markInfo['model_code'],$objId);
		$strJumpUrl = "index.php?do=goods&id=$sid&view=mark#pageT";
		if($markInfo['mark_status'] == '1'){
			header('location:'.$strJumpUrl);
			kekezu::show_msg('操作提示',$strJumpUrl,3,'评价完成，服务结束','success');
		}
	break;
}