<?php
$strUrl ="index.php?do=user&view=transaction&op=works";
$intModelId and $strUrl .="&intModelId=".intval($intModelId);
$intPage and $strUrl .="&intPage=".intval($intPage);
$strOrder and $strUrl .="&strOrder=".strval($strOrder);
if (isset ( $action )) {
	switch ($action) {
		case 'delSingle' :
			if ($objId&&$intTaskId) {
				$strWorkSql = ' UPDATE `'.TABLEPRE.'witkey_task_work` SET `hasdel`=1 WHERE (`work_id`='.intval($objId).')  and task_id = '.intval($intTaskId);
				db_factory::execute($strWorkSql);
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
	}
} else {
	$strWhere  = " 1=1 ";
	$strWhere  .= " and a.uid= ".$gUid;
	$strWhere  .= " and a.hasdel != 1 ";
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = 10;
	if($intId){
		$strWhereWork = " and work_id=".intval($intId);
	}
	$strUnionSql.= ' SELECT a.work_id id,a.task_id,a.work_time ontime,b.task_status FROM '.TABLEPRE.'witkey_task_work
			a left join '.TABLEPRE.'witkey_task b on a.task_id=b.task_id where  '.$strWhere.' and a.work_status not in (1,2,3,4,6) '.$strWhereWork;
	$strUnionSql.= ' ORDER BY ontime DESC ';
	$arrDatas  = db_factory::query($strUnionSql);
	$arrPageArr = $kekezu->_page_obj->page_by_arr($arrDatas, $intPagesize, $intPage, $strUrl);
	$arrLists = $arrPageArr ['data'];
	$strPages = $arrPageArr ['page'];
}
