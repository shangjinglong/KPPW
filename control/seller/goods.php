<?php
$strUrl = 'index.php?do=seller&view=goods&id='.intval($id);
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
$objServiceT = keke_table_class::get_instance ( 'witkey_service' );
$strWhere .= " service_status = 2  and uid=".intval($id);
$page and $intPage = intval ( $page );
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
$strWhere .= " order by service_id desc";
$arrDatas = $objServiceT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
$arrServiceLists = $arrDatas ['data'];
if(is_array($arrServiceLists)){
	foreach ($arrServiceLists as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "service"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['service_id'])));
		if($arrFavorite){
			$arrServiceLists[$k]['favorite'] = true;
		}
		unset($arrFollow);
	}
}
$strPages = $arrDatas ['pages'];