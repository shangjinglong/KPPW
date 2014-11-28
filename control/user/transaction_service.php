<?php
$intModelId&&in_array($intModelId, array(6,7)) and $intModelId = intval($intModelId) or $intModelId ='6';
$strUrl ="index.php?do=user&view=transaction&op=service";
$intModelId and $strUrl .="&intModelId=".intval($intModelId);
$intPage and $strUrl .="&intPage=".intval($intPage);
$strOrder and $strUrl .="&strOrder=".strval($strOrder);
$strTitle and $strUrl .="&strTitle=".strval($strTitle);
$arrListOrder = array(
		'service_id desc' =>'编号降序',
		'service_id asc' =>'编号升序'
);
$strModelName = $kekezu->_model_list[$intModelId]['model_code'];
$arrStatus = call_user_func ( array ($strModelName.'_shop_class', 'get_'.$strModelName.'_status') );
$objServiceT = keke_table_class::get_instance('witkey_service');
if (isset ( $action )) {
	switch ($action) {
		case 'mulitDel' :
			if ($ckb) {
				$objServiceT->del ( 'service_id', $ckb );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
		case 'delSingle' :
			if ($objId) {
				$objServiceT->del ( 'service_id', intval($objId) );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
	}
} else {
$strWhere  = " 1=1 ";
$strWhere  .= " and uid= ".$gUid;
$strWhere  .= " and model_id = ".$intModelId;
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = 10;
	$intId and $strWhere .= " and service_id=".intval($intId);
	$strTitle and $strWhere .= " and title like '%".trim($strTitle)."%' ";
	$strOrder&&in_array($strOrder, array_keys($arrListOrder)) and $strWhere .= " order by ".$strOrder or  $strWhere .= " order by service_id desc";
	$arrDatas = $objServiceT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null,null,null);
	$arrLists = $arrDatas ['data'];
	$strPages = $arrDatas ['pages'];
}