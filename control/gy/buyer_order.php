<?php
if($gUid == $id){
	kekezu::show_msg('操作提示','index.php',3,'非法操作','warning');
}
if($gUid != $id){
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
			if (strtoupper ( CHARSET ) == 'GBK') {
				$title =  kekezu::utftogbk($title );
				$content =  kekezu::utftogbk($content );
			}
			$serviceOrderInfo = array();
			$serviceOrderInfo['uid'] = $gUid;
			$serviceOrderInfo['username'] = $gUsername;
			$serviceOrderInfo['service_id'] = 0;
			$serviceOrderInfo['title'] = kekezu::escape($title);
			$serviceOrderInfo['indus_pid'] = intval($indus_pid);
			$serviceOrderInfo['indus_id'] = intval($indus_id);
			$serviceOrderInfo['content'] = kekezu::escape($content);
			$serviceOrderInfo['file_ids'] = $file_ids;
			$serviceOrderInfo['price'] = floatval($price);
			$orderId = keke_order_class::create_order(7, $arrSellerInfo['uid'], $arrSellerInfo['username'], $serviceOrderInfo['title'], $serviceOrderInfo['price'], '雇佣服务:'.$serviceOrderInfo['title'],'seller_confirm');
			if($orderId){
				$serviceOrderInfo ['order_id'] = $orderId;
				keke_order_class::create_order_detail ( $orderId, $serviceOrderInfo['title'], 'gy', $serviceOrderInfo['service_id'], $serviceOrderInfo['price'] );
				keke_order_class::createServiceOrder($serviceOrderInfo);
				$order_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=gy&id=".$arrSellerInfo ['uid']."&orderId=" . $orderId . "\">" . $title . "</a>";
				$v_arr = array(
						'用户名' => $arrSellerInfo['username'],
						'用户' => $username,
						'雇佣订单链接' => $order_url,
						'网站名称' => $kekezu->_sys_config['website_name']
				);
				$msg_obj = new keke_msg_class (); 
				$msg_obj->send_message($arrSellerInfo['uid'], $arrSellerInfo['username'], 'gy_order_notice', '雇佣订单消息',$v_arr);
				kekezu::show_msg('订单创建成功',$strUrl."&step=step2&orderId=".$orderId,3,null,'ok');
		    }else{
		    	kekezu::show_msg('创建订单失败',$strUrl,3,null,'fail');
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
		$strJumpUrl = "index.php?do=seller&id=$id&view=mark&type=2#pageT";
		if($markInfo['mark_status'] == '1'){
			header('location:'.$strJumpUrl);
		}
	break;
	default:
		kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');
	break;
}