<?php
$objTask = dtender_task_class::get_instance ( $arrTaskInfo );
$arrTaskInfo= $objTask->_task_info;
$objTask->plus_view_num();
$arrTaskFiles = $objTask->get_task_file ();
$arrTimeDesc = $objTask->get_task_timedesc ();
$arrProjectProgress = $objTask->getProjectProgressDesc();
$arrProcess_can = $objTask->process_can ();
$arrPayitemShow = $objTask->getPayitemShow();
$arrWorkStatus = $objTask->get_work_status ();
if (strtoupper ( CHARSET ) == 'GBK') {
	$arrWorkStatus = kekezu::gbktoutf($arrWorkStatus );
}
$jsonWorkStatus = json_encode($arrWorkStatus);
$arrPlanStatus = $objTask->get_plan_status(); 
$objDtenderTime = new dtender_time_class();
$objDtenderTime->validtaskstatus();
$arrCoverCash = kekezu::get_cash_cove ( 'dtender', true );
$reportUrl = 'index.php?do=taskhandle&op=report&taskId='.$arrTaskInfo['task_id'];
if($gUid == $arrTaskInfo['uid']){
	$reportUrl .= '&objId='.$arrTaskInfo['work_id'].'&objType=work&type=1&toUid='.$arrAgreeInfo['seller_uid'].'&toUsername='.$objAgreement->_seller_username;
}else{
	$reportUrl .= '&objId='.$arrAgreeInfo['task_id'].'&objType=task&type=1&toUid='.$arrAgreeInfo['buyer_uid'].'&toUsername='.$objAgreement->_buyer_username;
}
if($arrTaskInfo['task_pic']){
	$arrTaskPics = explode(',',$arrTaskInfo['task_pic']);
}
switch ($view){
	case "work":
		$page and $intPage = intval($page);
		intval ( $intPage ) and $p ['page'] = intval ( $intPage ) or $p ['page']='1';
		intval ( $intPagesize ) and $p ['page_size'] = intval ( $intPagesize ) or $p['page_size']=10;
		$p['url'] = $strUrl."&view=work&intPagesize=".$p ['page_size']."&intPage=".$p ['page'];
		if($st){
			$p['url'] .="&st=".$st;
		}
		if($ut){
			$p['url'] .="&ut=".$ut;
		}
		$w['bid_status'] = $st;
		$w['work_type']   = $ut;
		$arrWorkArrs= $objTask->getWorkInfo($w, $p ); 
		$strPages = $arrWorkArrs ['pages'];
		$arrWorkInfo = $arrWorkArrs ['work_info'];
		$arrMark     = $arrWorkArrs['mark'];
        if(is_array($arrWorkInfo)){
			foreach ($arrWorkInfo as $k=>$v) {
				$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and origin_id = %d and keep_type = "work"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['work_id']),intval($arrTaskInfo['task_id'])));
				if($arrFavorite){
					$arrWorkInfo[$k]['favorite'] = true;
				}
				unset($arrFavorite);
			}
		}
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
	$arrMarks = keke_user_mark_class::get_mark_info($w,null,' mark_id desc ',"mark_status>0");
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
function getTaskBid($taskid,$uid){
	$task_bid=db_factory::get_one("select * from ".TABLEPRE."witkey_task_bid where task_id='".intval($taskid)."' and uid='".intval($uid)."'");
	return $task_bid;
}