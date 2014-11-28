<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = "index.php?do=user&view=focus&op=fans";
$objFollowT = keke_table_class::get_instance('witkey_free_follow');
$strWhere = " 1 = 1 ";
$strWhere.=" and f.fuid = ".$uid;
if(isset($action)){
	switch ($action) {
       case 'addFollow':
			$arrFd['uid'] = $uid;
			$arrFd['fuid'] = intval($fansId);
			$arrFd['on_time'] = time();
			$res = $objFollowT->save($arrFd);
			$res and kekezu::echojson($fansId,1,'');
	}	
}else{
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 20;
	$strSql  = 'select f.*,s.uid focus_uid,s.username focus_username,s.seller_level from '.TABLEPRE.'witkey_free_follow as f'; 
	$strSql.= ' left join '.TABLEPRE.'witkey_space as s on f.uid = s.uid where '.$strWhere;
	$strSql.=  ' order by f.on_time desc ';
	$arrDatas = db_factory::query($strSql);
	$arrPageArr = $kekezu->_page_obj->page_by_arr($arrDatas, $intPagesize, $intPage, $strUrl);
	$arrFansLists = $arrPageArr ['data'];
	$strPages = $arrPageArr ['page'];
}