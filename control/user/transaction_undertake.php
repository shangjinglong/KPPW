<?php
$model_id and $intModelId = intval($model_id) or $intModelId =1;
$strUrl ="index.php?do=user&view=transaction&op=undertake";
$intModelId and $strUrl .="&model_id=".intval($intModelId);
$strTaskTitle and $strUrl .="&strTaskTitle=".strval($strTaskTitle);
$intTaskStatus and $strUrl .="&intTaskStatus=".intval($intTaskStatus);
$strOrder and $strUrl .="&strOrder=".strval($strOrder);
if (isset ( $action )) {
	$intWorkId = intval ( $objId );
	if ($intWorkId) {
		switch ($action) {
			case "delWork" :
				if($worktype=='bid'){
					$strTabName = "witkey_task_bid";
					$strId = "bid_id";
				}else{
					$strTabName = "witkey_task_work";
					$strId = "work_id";
				}
				$res = db_factory::execute ( sprintf ( " delete from %s".$strTabName." where $strId='%d'", TABLEPRE, $intWorkId ) );
				db_factory::execute ( sprintf ( ' delete from %switkey_comment where obj_id=%d and obj_type="work"', TABLEPRE, $intWorkId ) );
				keke_file_class::del_obj_file ( $intWorkId, 'work', true );
				if($res){
					kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
				}else{
					kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
				}
				break;
		}
	} else {
		kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
	}
}
$arrTaskNavs = TaskClass::getEnabledTaskModelList();
$arrListOrder = array(
		'a.task_id desc' =>'编号降序',
		'a.task_id asc' =>'编号升序',
		'b.task_cash desc' =>'金额降序',
		'b.task_cash asc' =>'金额升序'
);
$arrCashCoves = TaskClass::getTaskCashCove();
$arrTaskStatus = call_user_func ( array ($arrTaskNavs[$intModelId]['model_code'] . "_task_class", "get_task_status" ) );;
$objTaskT = keke_table_class::get_instance('witkey_task');
$model_info = $model_list [$intModelId];
switch ($model_info ['model_code']) {
	case "sreward" :
	case "preward" :
	case "mreward" :
	case "wbzf" :
	case "wbdj" :
	case "match" :
	case "taobao" :
		$tab_name = "witkey_task_work";
		$time_fds = "work_time";
		$id_fds = "work_id";
		$satus_fds = "work_status";
		break;
	case "dtender" :
	case "tender" :
		$tab_name = "witkey_task_bid";
		$time_fds = "bid_time";
		$id_fds = "bid_id";
		$satus_fds = "bid_status";
		break;
}
$strSql = " select a.$satus_fds,a.$time_fds,a.$id_fds,b.task_id,b.task_cash,b.task_title,b.model_id,b.task_cash_coverage,b.task_status,b.start_time from " . TABLEPRE . $tab_name . " a left join " . TABLEPRE . "witkey_task b on a .task_id=b.task_id where b.model_id = '$intModelId' and a.uid='$uid'";
$strCountSql = "select a.$id_fds from " . TABLEPRE . $tab_name . " a left join " . TABLEPRE . "witkey_task b on a .task_id=b.task_id where b.model_id = '$intModelId' and a.uid='$uid'";
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = 10;
	$intTaskId and $strWhere .= " and a.task_id=".intval($intTaskId);
	$strTaskTitle and $strWhere .= " and b.task_title like '%".trim($strTaskTitle)."%' ";
	if(isset($intTaskStatus)&&$intTaskStatus!=''&&$intTaskStatus > -1){
		$strWhere .= " and b.task_status=".intval($intTaskStatus);
	}else{
		$intTaskStatus = -1;
	}
	$strOrder and $strWhere .= " order by ".$strOrder or  $strWhere .= " order by b.task_id desc";
	$intCount = intval ( db_factory::execute ( $strCountSql . $strWhere ) );
	$strPages = $page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl );
	$arrTaskLists = db_factory::query ( $strSql . $strWhere . $strPages ['where'] );
function wiki_opera($m_id, $t_id, $w_id, $url) {
	global $kekezu;
	$button = array ();
	$model_code = $kekezu->_model_list [$m_id] ['model_code'];
	$c = $model_code . '_task_class';
	if ($model_code && method_exists ( $c, 'wiki_opera' )) {
		$button = call_user_func_array ( array ($c, 'wiki_opera' ), array ($m_id, $t_id, $w_id, $url ) );
	} else { 
		$button = call_user_func_array ( array ('sreward_task_class', 'wiki_opera' ), array ($m_id, $t_id, $w_id, $url ) );
	}
	return $button;
}
unset($objTaskT);
