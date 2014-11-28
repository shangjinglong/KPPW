<?php
$strUrl = "index.php?do=user&view=collect&op=goods";
$intPagesize and $strUrl .="&intPagesize=".intval($intPagesize);
$strCollectTitle and $strUrl .="&strCollectTitle=".strval($strCollectTitle);
$strListOrder and $strUrl .="&strListOrder=".strval($strListOrder);
$arrListOrder = array(
     'f_id desc' => '收藏编号降序',
     'f_id asc' => '收藏编号升序'
);
$objFavoriteT = keke_table_class::get_instance('witkey_favorite');
$strWhere = " 1 = 1 and keep_type = 'service'";
$strWhere.= " and uid = ".$uid;
if (isset ( $action )) {
	switch ($action) {
		case 'delSingle' :
			if ($objId) {
				$objFavoriteT->del ( 'f_id', intval ( $objId ) );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
	}
} else {
		$page and $intPage = intval($page);
		$intPage = intval ( $intPage ) ? $intPage : 1;
		$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
		$intCollectId&&$intCollectId!='' and $strWhere .= " and f_id=".intval($intCollectId);
		$strCollectTitle and $strWhere .= " and obj_name like '%".trim($strCollectTitle)."%' ";
		$strListOrder&&in_array($strListOrder, array_keys($arrListOrder)) and $strWhere .= " order by ".$strListOrder or  $strWhere .= " order by f_id desc";
		$arrDatas = $objFavoriteT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null,null,null);
		$arrFavoriteGoods = $arrDatas ['data'];
		$strPages = $arrDatas ['pages'];
}
