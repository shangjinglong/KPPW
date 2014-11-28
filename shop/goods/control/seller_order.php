<?php
switch ($step) {
	case 'step1':kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');break;
	case 'step2':kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');break;
	case 'step3':kekezu::show_msg('访问页面不存在','index.php',3,null,'warning');break;
	case 'step4':
		$objId = $orderId;
		$arrMark = keke_user_mark_class::get_mark_info ( array ('model_code' => 'goods', 'obj_id' => $objId,'by_uid'=>$gUid,'uid'=>$arrOrderInfo['uid']) );
		$markInfo = $arrMark ['mark_info'] ['0'];
		$aidList = keke_user_mark_class::get_mark_aid ( 1 );
		$aidInfo=keke_user_mark_class::get_user_aid($markInfo['by_uid'],$markInfo['mark_type'],$markInfo['mark_status'],2,$markInfo['model_code'],$objId);
		$strJumpUrl = "index.php?do=goods&id=$sid&view=mark#pageT";
		if($markInfo['mark_status'] == '1'){
			kekezu::show_msg('操作提示',$strJumpUrl,3,'评价完成，服务结束','success');
		}
	break;
}