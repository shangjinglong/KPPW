<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
if(TOOL == FALSE){
	kekezu::show_msg ( '无权限', NULL, NULL, NULL, 'warning' );
}
$arrObjInfo = PayitemClass::getObjInfo($type,$objId);
$arrPayitemLists = PayitemClass::getPayitemListDetail($type,$objId);
if($arrObjInfo['task_status']!=2){
	unset($arrPayitemLists['tasktop']);
	unset($arrPayitemLists['workhide']);
}
if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	$arrNum['urgent'] =  intval($txt_urgent);
	if ($arrNum['urgent'] > 1) {
		$tips ['errors'] ['txt_urgent'] = '只能填0或1';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	$arrNum['workhide'] =  intval($txt_workhide);
	if ($arrNum['workhide'] > 1) {
		$tips ['errors'] ['txt_workhide'] = '只能填0或1';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	$arrNum['tasktop'] =  intval($txt_tasktop);
	if ($arrNum['tasktop']) {
		    $intTopInfo = PayitemClass::getPayitemRecord($type,$objId, 'tasktop');
		    $intStartTime = $intTopInfo['end_time']?$intTopInfo['end_time']:time();
            $intMaxDay = ceil(($arrObjInfo['sub_time']-$intStartTime)/24/3600);
            if($intMaxDay<$arrNum['tasktop']){
            	$tips ['errors'] ['txt_tasktop'] = '最大只能置顶'.abs($intMaxDay).'天';
            	kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
            }
	}
	$arrNum['goodstop'] =  intval($txt_goodstop);
	$arrPayitemBuy = array_filter($arrNum);
	if(is_array($arrPayitemBuy)){
		$intOrderId = PayitemClass::creatPayitemOrder($arrPayitemBuy,$type,$objId);
		if($intOrderId){
			$res = PayitemClass::payPayitemOrder($intOrderId);
			if($res===true){
				kekezu::show_msg ( '购买成功', 'index.php?do='.$type.'&id='.intval($objId), NULL, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $res, 'index.php?do=pay&type=payitem&id='.$intOrderId, NULL, NULL, 'fail' );
			}
		}
	}
}
require keke_tpl_class::template ( "tpl/default/ajax/payitem");die;