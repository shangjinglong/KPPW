<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = "index.php?do=user&view=focus&op=each";
$objFollowT = keke_table_class::get_instance('witkey_free_follow');
$strWhere = " 1 = 1 ";
$strWhere.=" and a.fuid =  b.uid and a.uid =".$uid;
if(isset($action)&&$action ==='cancelFocus'){
    if ($intFollowUid) {
		$objFollowT->del ( 'follow_id', intval ($intFollowUid) );
		kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
	} else {
		kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
	}	
}else{
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 20;
	$strSql  = 'select a.*,b.*,s.uid focus_uid,s.username focus_username,s.seller_level from '.TABLEPRE.'witkey_free_follow as a';
	$strSql.= ' left join  '.TABLEPRE.'witkey_free_follow as b on a.uid = b.fuid';
	$strSql.= ' left join '.TABLEPRE.'witkey_space as s on a.fuid = s.uid where '.$strWhere;
	$strSql.=  ' order by a.on_time desc '; 
	$arrDatas = db_factory::query($strSql);
	$arrPageArr = $kekezu->_page_obj->page_by_arr($arrDatas, $intPagesize, $intPage, $strUrl);
	$arrEachLists = $arrPageArr ['data'];
	$strPages = $arrPageArr ['page'];
}