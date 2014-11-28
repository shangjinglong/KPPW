<?php
$intModelId and $intModelId = intval($intModelId) or $intModelId =1;
$page and $intPage = intval($page);
$strUrl ="index.php?do=user&view=transaction&op=released";
$intModelId and $strUrl .="&intModelId=".intval($intModelId);
$intPage and $strUrl .="&intPage=".intval($intPage);
$strTaskTitle and $strUrl .="&strTaskTitle=".strval($strTaskTitle);
$intTaskStatus and $strUrl .="&intTaskStatus=".intval($intTaskStatus);
$strOrder and $strUrl .="&strOrder=".strval($strOrder);
$arrTaskNavs = TaskClass::getEnabledTaskModelList();
$arrListOrder = array(
	'task_id desc' =>'编号降序',
	'task_id asc' =>'编号升序',
	'task_cash desc' =>'金额降序',
	'task_cash asc' =>'金额升序'
);
if(in_array($intModelId, array(4,5))){
	unset($arrListOrder['task_cash desc'],$arrListOrder['task_cash asc']);
}
$arrTaskStatus = call_user_func ( array ($arrTaskNavs[$intModelId]['model_code'] . "_task_class", "get_task_status" ) );;
$arrCashCoves = TaskClass::getTaskCashCove();
$objTaskT = keke_table_class::get_instance('witkey_task');
if (isset ( $action )) {
	switch ($action) {
		case 'mulitDel' :
			if ($ckb) {
				$objTaskT->del ( 'task_id', $ckb );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
		case 'delSingle' :
			if ($objId) {
				$objTaskT->del ( 'task_id', intval($objId) );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
	}
} else {
	$strWhere  = " 1=1 ";
	$strWhere .= " and uid = ".$gUid;
	$strWhere .= " and model_id = ".$intModelId;
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = 10;
	$intTaskId&&$intTaskId!='' and $strWhere .= " and task_id=".intval($intTaskId);
	$strTaskTitle and $strWhere .= " and task_title like '%".trim($strTaskTitle)."%' ";
	if(isset($intTaskStatus)&&$intTaskStatus!=''&&$intTaskStatus > -1){
		$strWhere .= " and task_status=".intval($intTaskStatus);
	}else{
		$intTaskStatus = -1;
	}
	$strOrder&&in_array($strOrder, array_keys($arrListOrder)) and $strWhere .= " order by ".$strOrder.', task_id desc ' or  $strWhere .= " order by task_id desc";
	$arrDatas = $objTaskT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null,null,null);
	$arrTaskLists = $arrDatas ['data'];
	$intCount = $arrDatas ['count'];
	$strPages = $arrDatas ['pages'];
}
function master_opera($m_id, $t_id, $url,$task_cash) {
	global $kekezu;
	$button = array ();
	$model_code = $kekezu->_model_list [$m_id] ['model_code'];
	$c = $model_code . '_task_class';
	if ($model_code && method_exists ( $c, 'master_opera' )) {
		$button = call_user_func_array ( array ($c, 'master_opera' ), array ($m_id, $t_id, $url ,$task_cash) );
		unset($button['onkey']);
	} else { 
		$button = call_user_func_array ( array ('sreward_task_class', 'master_opera' ), array ($m_id, $t_id, $url,$task_cash ) );
		unset($button['onkey']);
	}
	return $button;
}
unset($objTaskT);
