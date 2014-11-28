<?php
if($gUid != $arrServiceInfo['uid']){
	$arrOrderProgress = array(
			1=>array(
					'step'=>'step1',
					'state'=>'填写需求'
			),
			2=>array(
					'step'=>'step2',
					'state'=>'等待对方确认'
			),
			3=>array(
					'step'=>'step3',
					'state'=>'托管赏金'
			),
			4=>array(
					'step'=>'step4',
					'state'=>'等待对方完成'
			),
			5=>array(
					'step'=>'step5',
					'state'=>'确认验收'
			),
			6=>array(
					'step'=>'step6',
					'state'=>'双方互评'
			)
	);
}
switch ($step) {
	case 'step1':
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$arrOrderInfo = keke_shop_class::check_has_buy($sid, $gUid);
			if($arrOrderInfo&&$arrOrderInfo['order_status']=='wait'){
				kekezu::show_msg('您已经购买了该服务',"index.php?do=order&sid=".$sid."&step=step2&orderId=".$arrOrderInfo['order_id'],3,null,'fail');
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$title =  kekezu::utftogbk($title );
				$content =  kekezu::utftogbk($content );
			}
			$serviceOrderInfo = array();
			$serviceOrderInfo['uid'] = $gUid;
			$serviceOrderInfo['username'] = $gUsername;
			$serviceOrderInfo['service_id'] = $sid;
			$serviceOrderInfo['title'] = kekezu::escape($title);
			$serviceOrderInfo['indus_pid'] = intval($indus_pid);
			$serviceOrderInfo['indus_id'] = intval($indus_id);
			$serviceOrderInfo['content'] = kekezu::escape($content);
			$serviceOrderInfo['file_ids'] = $file_ids;
			$serviceOrderInfo['price'] = floatval($price);
			$resText = keke_shop_class::create_service_order($arrServiceInfo,false,$serviceOrderInfo);
			if(0 < intval($resText)){
				kekezu::show_msg('订单创建成功',$strUrl."&step=step2&orderId=".$resText,3,null,'ok');
			}else{
				kekezu::show_msg($resText,$strUrl,3,null,'fail');
			}
		}
	break;
	case 'step2':
	break;
	case 'step3':
		if(isset($action)){
			switch ($action) {
				case 'pay':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'ok' );
					unset($objShop);
					if(true === $resText){
						kekezu::show_msg('订单付款完成，该订单已确认付款',$strUrl."&step=step3&orderId=".$orderId,3,null,'ok');
					}else{
						kekezu::show_msg($resText,null,null,null,'fail');
					}
				break;
				default:
					kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
				break;
			}
		}
	break;
	case 'step4':
	;
	break;
	case 'step5':
		if($arrServiceOrderInfo['workfile']){
			$arrFileLists = db_factory::query('select file_name,save_name from '.TABLEPRE.'witkey_file where file_id in('.$arrServiceOrderInfo['workfile'].')');
		}
		if(isset($action)){
			switch ($action) {
				case 'acceptance':
					$objShop = new service_shop_class();
					$resText = $objShop->dispose_order ( $orderId, 'complete' );
					unset($objShop);
					if(true === $resText){
						kekezu::show_msg('订单处理完成，该订单已完成',$strUrl."&step=step6&orderId=".$orderId,3,null,'ok');
					}else{
						kekezu::show_msg($resText,null,null,null,'fail');
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
		$toUid = $arrServiceInfo['uid'];
		$arrMark = keke_user_mark_class::get_mark_info ( array ('model_code' => 'service', 'obj_id' => $objId,'by_uid'=>$gUid,'uid'=>$toUid) );
		$markInfo = $arrMark ['mark_info'] ['0'];
		$aidList = keke_user_mark_class::get_mark_aid ( 2 );
		$aidInfo=keke_user_mark_class::get_user_aid($markInfo['by_uid'],$markInfo['mark_type'],$markInfo['mark_status'],2,$markInfo['model_code'],$objId);
		$strJumpUrl = "index.php?do=goods&id=$sid&view=mark#pageT";
		if($markInfo['mark_status'] == '1'){
			header('location:'.$strJumpUrl);
		}
	break;
	default:
		kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
	break;
}