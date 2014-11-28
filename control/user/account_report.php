<?php
$page and $intPage = intval($page);
$type=strval($type) ? $type : 1;
$op = strval($op);
$strUrl ="index.php?do=user&view=account&op=report";
$type and $strUrl .="&type=".intval($type);
$intPagesize and $strUrl .="&intPagesize=".intval($intPagesize);
$strReportObj and $strUrl .="&reportObj=".strval($strReportObj);
$strReportStatus and $strReportStatus .="&reportStatus=".strval($strReportStatus);
$arrReportObj = array(
    'task' => '任务',
	'work' => '稿件',
	'product' =>'商品'
);
$arrReportStatus = array(
          '1' =>'待处理',
          '2' =>'处理中',
          '3' =>'未成立',
          '4' =>'已处理'         
);
$objReportT = keke_table_class::get_instance('witkey_report');
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
	$strWhere .= " and report_type = 2 ";
	if($type == 2){
	   $strWhere .= " and to_uid = ".$gUid;
	}else{
	   $strWhere .= " and uid = ".$gUid;
	}
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
	if(isset($strReportStatus)&&$strReportStatus!=''&&$strReportStatus > -1){
		$strWhere .= " and report_status=".intval($strReportStatus);
	}else{
		$strReportStatus = -1;
	}
    if(isset($strReportObj)&&$strReportObj!=''){
		$strWhere .= " and obj= '$strReportObj'";
	}else{
		$strReportObj = ' ';
	}
	$strOrder&&in_array($strOrder, array_keys($arrListOrder)) and $strWhere .= " order by ".$strOrder.', report_id desc ' or  $strWhere .= " order by report_id desc";
	$arrDatas = $objReportT->get_grid($strWhere, $strUrl, $intPage, $intPagesize, null,null,null);
	$arrReportLists = $arrDatas ['data'];
	$intCount = $arrDatas ['count'];
	$strPages = $arrDatas ['pages'];
}
unset($objReportT);
