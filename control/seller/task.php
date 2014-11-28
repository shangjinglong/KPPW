<?php
$strUrl = 'index.php?do=seller&view=task&id='.intval($id);
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
$arrTaskTimeDesc = keke_glob_class::get_taskstatus_desc ();
$arrCashCoves = TaskClass::getTaskCashCove();
$arrTaskNavs = TaskClass::getEnabledTaskModelList();
$objTaskT = keke_table_class::get_instance ( 'witkey_task' );
$strWhere .= " task_status > 1  and uid=".intval($id);
$page and $intPage = intval ( $page );
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
$strWhere .= " order by task_id desc";
$arrDatas = $objTaskT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
$arrTaskLists = $arrDatas ['data'];
if(is_array($arrTaskLists)){
	foreach ($arrTaskLists as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "task"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['task_id'])));
		if($arrFavorite){
			$arrTaskLists[$k]['favorite'] = true;
		}
		unset($arrFollow);
	}
}
$strPages = $arrDatas ['pages'];
