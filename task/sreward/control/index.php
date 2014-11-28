<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$page and $intPage = intval($page) ;
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
$p['page']      = $intPage;
$p['page_size'] = $intPagesize;
$p['url'] = $strUrl."&view=".$view."&intPage=".$p['page']."&intPagesize=".$p['page_size'].="&s=".$s;
$p['anchor'] = '#detail';
$objTask = sreward_task_class::get_instance ( $arrTaskInfo );
$arrTaskInfo= $objTask->_task_info;
$objTask->plus_view_num();
$arrTaskFiles = $objTask->get_task_file ();
$arrWorkStatus = $objTask->get_work_status ();
if (strtoupper ( CHARSET ) == 'GBK') {
	$arrWorkStatus = kekezu::gbktoutf($arrWorkStatus );
}
$jsonWorkStatus = json_encode($arrWorkStatus);
$arrProjectProgress = $objTask->getProjectProgressDesc();
$arrProcess_can = $objTask->process_can ();
$objTime = new sreward_time_class();
$objTime->validtaskstatus();
if($gUid){
	$intFollow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($gUid),intval($arrTaskInfo['uid'])));
}
if($arrTaskInfo['task_pic']){
	$arrTaskPics = explode(',',$arrTaskInfo['task_pic']);
}
if(intval($arrConfig['reg_vote_limit']) > 0){
	$intRegVoteTime = intval($arrConfig['reg_vote_limit'])*60*60;
	$intCanVote = (time() - intval($gUserInfo['reg_time']))-$intRegVoteTime;
}
$arrPayitemShow = $objTask->getPayitemShow();
if($arrConfig['task_rate'] > 0){
	$floatCash = $arrTaskInfo['task_cash'] * ( 1 - $arrConfig['task_rate']/100 ) ;
}else{
	$floatCash = $arrTaskInfo['task_cash'];
}
switch ($view) {
	case 'work':
		$s === null and $s = 1 or $s = intval($s);
		$search_condit = $objTask->get_search_condit();
		$arrSearchStatus =  array();
		$arrSearchStatus['1'] = '所有的';
		$arrSearchStatus['2'] 	= '未浏览的';
		$arrSearchStatus['4']	= '中标';
		$arrSearchStatus['5'] 	= '入围';
		$arrSearchStatus['7'] 	= '淘汰';
		$arrSearchStatus['9'] = '我的';
		$w['work_status'] = $s;
		$arrWorkDatas = $objTask->get_work_info ($w, " work_id asc ", $p ); 
		$strPages     = $arrWorkDatas ['pages'];
		$arrWorkLists = $arrWorkDatas ['work_info'];
		$mark        = $arrWorkDatas ['mark'];
		$agree_id    = intval($objTask->_agree_id);
	break;
	case 'comment':
		$objComment = keke_comment_class::get_instance('task');
		$strUrl .= "&view=comment";
		$arrCommentDatas = $objComment->get_comment_list($id, $strUrl, $intPage);
		$arrCommentLists = $arrCommentDatas['data'];
		$strPage = $arrCommentDatas['pages'];
		$arrReplyLists = $objComment->get_reply_info($id);
	break;
	case 'mark':
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
		$strPages  = $arrMarks['pages'];
	break;
}
