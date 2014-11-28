<?php
$strUrl = 'index.php?do=user&view=shop&op=caselist';
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
$shopInfo=db_factory::get_one(sprintf(" select * from %switkey_shop where uid='%d' ",TABLEPRE,$gUid));
$objCaseT = keke_table_class::get_instance ( 'witkey_shop_case' );
if (isset ( $action )) {
	switch ($action) {
		case 'mulitDel' :
			if ($ckb) {
				$objCaseT->del ( 'case_id', $ckb );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
		case 'delSingle' :
			if ($objId) {
				$objCaseT->del ( 'case_id', $objId );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
	}
} else {
	$strWhere .= " shop_id =" . intval ( $shopInfo['shop_id'] );
	$page and $intPage = intval ( $page );
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
	$strWhere .= " order by case_id desc";
	$arrDatas = $objCaseT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
	$arrCaseLists = $arrDatas ['data'];
	$strPages = $arrDatas ['pages'];
}