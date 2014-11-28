<?php
$page and $intPage = intval($page) ;
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
$objTask = preward_task_class::get_instance ( $arrTaskInfo );
$arrTaskInfo= $objTask->_task_info;
$objTask->plus_view_num();
	$intFollow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($gUid),intval($arrTaskInfo['uid'])));
	$intFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "task"',TABLEPRE.'witkey_favorite',intval($gUid),intval($arrTaskInfo['task_id'])));
if($arrTaskInfo['task_pic']){
	$arrTaskPics = explode(',',$arrTaskInfo['task_pic']);
}
$arrProcess_can = $objTask->process_can ();
$arrTaskFiles = $objTask->get_task_file ();
$arrPayitemShow = $objTask->getPayitemShow();
$arrWorkStatus = $objTask->get_work_status ();
if (strtoupper ( CHARSET ) == 'GBK') {
	$arrWorkStatus = kekezu::gbktoutf($arrWorkStatus );
}
$jsonWorkStatus = json_encode($arrWorkStatus);
$arrProjectProgress = $objTask->getProjectProgressDesc();
$objTime = new preward_time_class();
$objTime->validtaskstatus();
$intBidCount = $objTask->get_work_count ( "work_status=6" );
switch ($view){
	case "work":
		intval ( $page ) and $p ['page'] = intval ( $page ) or $p ['page']='1';
		intval ( $intPagesize ) and $p ['page_size'] = intval ( $intPagesize ) or $p['page_size']=10;
		$p['url'] = $strUrl."&view=work&intPagesize=".$p ['page_size']."&page=".$p ['page'];
		$p ['anchor'] = '#detail';
		if($st){
			$p['url'] .="&st=".$st;
		}
		if($ut){
			$p['url'] .="&ut=".$ut;
		}
		$w['work_status'] = $st;
		$w['work_type']   = $ut;
		$arrWorkArrs= $objTask->get_work_info ($w, $p ); 
		$strPages = $arrWorkArrs ['pages'];
		$arrWorkInfo = $arrWorkArrs ['work_info'];
		$arrMark      = $arrWorkArrs['mark'];
		if(is_array($arrWorkInfo)){
			foreach ($arrWorkInfo as $k=>$v) {
				$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and origin_id = %d and keep_type = "work"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['work_id']),intval($arrTaskInfo['task_id'])));
				if($arrFavorite){
					$arrWorkInfo[$k]['favorite'] = true;
				}
				unset($arrFavorite);
			}
		}
		$arrMark     = $arrWorkArrs['mark'];
		break;
	case 'comment':
		$objComment = keke_comment_class::get_instance('task');
		$strUrl .= "&view=comment";
		$arrCommentDatas = $objComment->get_comment_list($id, $strUrl, $intPage);
		$arrCommentLists = $arrCommentDatas['data'];
		$strPage = $arrCommentDatas['pages'];
		$arrReplyLists = $objComment->get_reply_info($id);
	break;
	case "mark":
		$p['page']      = $intPage;
		$p['page_size'] = $intPagesize;
	$p['url'] = $strUrl."&view=".$view."&intPage=".$p['page']."&intPagesize=".$p['page_size'].="&s=".$s;
	$p ['anchor'] = '#detail';
	$w['model_code'] = $arrModelInfo ['model_code'];
	$w['origin_id']   = $id;
	in_array($s, array(1,2,3)) and $w['mark_status'] = $s;
	$s == 101 and $w['mark_type'] =   2;
	$s == 102 and $w['mark_type'] =   1;
	$arrMarks = keke_user_mark_class::get_mark_info($w,$p,' mark_id desc ',"mark_status>0");
	$arrMarkInfo = $arrMarks['mark_info'];
	if(is_array($arrMarkInfo)){
		$arrMarkLists = array();
		foreach($arrMarkInfo as $k=>$v){
			$arrMarkLists[$k] = $v;
			$arrAidInfos = keke_user_mark_class::get_user_aid ( $v['uid'], $v['mark_type'], $v['mark_status'], 1, null, $v['obj_id'] );
			$arrMarkLists[$k]['aid'] = $arrAidInfos;
		}
	}
	$strPages     = $arrMarks['pages'];
}