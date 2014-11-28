<?php
$taskId = intval($taskId);
if(!$taskId){
	jumpUrl($taskId);
}
$workId = intval($workId);
$bidId = intval($bidId);
$strUrl = 'index.php?do=taskhandle&taskId='.$taskId;
$strTaskSql = 'select * from '.TABLEPRE.'witkey_task where task_id = '.$taskId;
$arrTaskInfo = db_factory::get_one($strTaskSql);
if(!$arrTaskInfo){
	jumpUrl($taskId);
}
$arrModelInfo = $model_list [$arrTaskInfo ['model_id']];
$arrProvinces = CommonClass::getDistrictByPid('0','id,upid,name');
if($gUserInfo['city']){
	$arrCity = CommonClass::getDistrictById($gUserInfo['city'],'id,upid,name');
}
if($gUserInfo['area']){
	$arrArea = CommonClass::getDistrictById($gUserInfo['area'],'id,upid,name');
}
switch ($arrModelInfo['model_code']){
	case 'sreward':
		$objTask = sreward_task_class::get_instance ( $arrTaskInfo );
		break;
	case 'preward':
		$objTask = preward_task_class::get_instance ( $arrTaskInfo );
		break;
	case 'mreward':
		$objTask = mreward_task_class::get_instance ( $arrTaskInfo );
		break;
	case 'tender':
		$objTask = tender_task_class::get_instance ( $arrTaskInfo );
		break;
	case 'dtender':
		$objTask = dtender_task_class::get_instance ( $arrTaskInfo );
		break;
	case 'match':
		$objTask = match_task_class::get_instance ( $arrTaskInfo );
		break;
}
$arrTaskInfo= $objTask->_task_info;
$arrProcess_can = $objTask->process_can ();
$arrConfig = $objTask->_task_config;
$arrWorkFlag = array(
		1=>array('id'=>2,'style'=>'fa-trophy','name'=>'一等奖'),
		2=>array('id'=>2,'style'=>'fa-trophy','name'=>'二等奖'),
		3=>array('id'=>2,'style'=>'fa-trophy','name'=>'三等奖'),
		4=>array('id'=>4,'style'=>'fa-check-circle','name'=>'中标'),
		5=>array('id'=>2,'style'=>'fa-dot-circle-o','name'=>'入围'),
		6=>array('id'=>3,'style'=>'fa-check-circle','name'=>'合格'),
		7=>array('id'=>0,'style'=>'fa-times-circle','name'=>'淘汰'),
);
$strExtTypes   = kekezu::get_ext_type ();
switch ($op) {
	case "taskRecommend" : 
			$resInt = keke_task_config::task_recommend($taskId);
			if($resInt){
				kekezu::show_msg ( '推荐操作成功', 'index.php?do=task&id='.$taskId, NULL, NULL, 'ok' );
			}
			kekezu::show_msg ( '推荐操作失败，请勿重复操作', NULL, NULL, NULL, 'fail' );
		break;
	case "workComment" : 
		if ($strTarComment) {
			$strTarComment = kekezu::str_filter (kekezu::escape($strTarComment) );
			if (strtoupper ( CHARSET ) == 'GBK') {
				$strTarComment =  kekezu::utftogbk($strTarComment );
			}
			if ($kekezu->_sys_config['ban_content']&&kekezu::k_match(array($kekezu->_sys_config['ban_content']),$strTarComment)) {
				$tips['errors']['strTarComment'] = $_lang['sensitive_word'];
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
			}
			if($objTask->set_work_comment ( 'work', $intWorkId, $strTarComment )){
				$date = date('Y-m-d',time());
				$time = date('H:i:s',time());
				kekezu::show_msg ( array('d'=>$date,'t'=>$time), NULL, NULL, NULL, 'ok' );
			}
			kekezu::show_msg ( '提交失败', NULL, NULL, NULL, 'fail' );
		}
		break;
	case "pubAgreement":
		$objTask->set_task_status(5);
		$arrBidInfo = $objTask->get_bid_info ();
		$resText = $objTask->set_agreement_status ( $arrBidInfo['bid_id'], 1 );
		if($resText===true){
			kekezu::show_msg ( '操作成功', $strUrl, 3, NULL, 'ok' );
		}else{
			kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
		}
		break;
	case "workOver":
		$objTask->set_task_status ( 8 );
		$arrBidInfo = $objTask->get_bid_info ();
		$res = $objTask->set_agreement_status ( $arrBidInfo['bid_id'], 2 );
		if($res===true){
		   kekezu::show_msg ( '操作成功', $strUrl, 3, NULL, 'ok' );
		}else{
		  kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
		}
		break;
	case "turnaround" : 
		if(0 === $gUid){
			kekezu::show_msg ( '未登陆用户，无权操作', 'index.php?do=login', 3, NULL, 'warning' );
		}
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			if (strtoupper ( CHARSET ) == 'GBK') {
				$tar_content =  kekezu::utftogbk($tar_content );
			}
			$resText = $objTask->work_hand ( $tar_content, $file_ids,$workhide);
			if($resText === true){
				kekezu::show_msg ( '恭喜您，交稿成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/turnaround' );
		}
		die();
		break;
	case "workvote" : 
			$resText = $objTask->set_task_vote($workId);
			if($resText === true){
				kekezu::show_msg ( '投票成功！谢谢您的参与！', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, null, null, NULL, 'fail' );
			}
		break;
	case "report" : 
		$transname = keke_report_class::get_transrights_name($type);
		if($type == '1'){
			$report_reason = keke_report_class::getRightsType($objType);
		}else{
			$report_reason = keke_report_class::getReportType($objType);
		}
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			$resText = $objTask->set_report ( $objType, $objId, $toUid, $type, $filepath, $tarContent,$sltReason);
			if($resText === true){
				kekezu::show_msg ( '感谢您的举报，管理员会尽快受理，请耐心等待处理结果。', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, null, null, NULL, 'fail' );
			}
		}else{
			$strUrl .= '&op=report';
			require keke_tpl_class::template("tpl/default/ajax/report");
		}
		break;
	case "quote" : 
		if(0 === $gUid){
			kekezu::show_msg ( '未登陆用户，无权操作', 'index.php?do=login', 3, NULL, 'warning' );
		}
		$arrCoverCash = kekezu::get_cash_cove ( '', true );
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
         	$arrDistrictData = CommonClass::getAllDistrict('id,upid,name');
            $province 	= $arrDistrictData[$province]['name'];
            $city 		= $arrDistrictData[$city]['name'];
            $area 		= $arrDistrictData[$area]['name'];
			$work_frm ['area'] = $province . "," . $city . ',' . $area;
			if (strtoupper ( CHARSET ) == 'GBK') {
				$tar_content =  kekezu::utftogbk($tar_content );
			}
			$work_frm ['price'] = $price;
			$work_frm ['cycle'] = $cycle;
			$work_frm ['tar_content'] = $tar_content;
			$resText = $objTask->tender_work_hand ( $work_frm );
			if($resText === true){
				kekezu::show_msg ( '报价成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/quote' );
		}
		die();
		break;
	case "matchquote" : 
		$arrHanded = $objTask->work_exists('',"uid='{$uid}'",-1);
		$floatCanPay = $user_info['balance'] - $objTask->_task_config['deposit'];
		$arrCoverCash = kekezu::get_cash_cove ( '', true );
		if(0 === $gUid){
			kekezu::show_msg ( '未登陆用户，无权操作', 'index.php?do=login', 3, NULL, 'warning' );
		}
		$floatDeposit = $objTask->_task_config['deposit'];
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			if($price <= 0){
				$tips['errors']['price'] = '请输入正确的报价';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$tar_content =  kekezu::utftogbk($tar_content );
			}
			$resText = $objTask->work_bid ( $mobile,$price,$tar_content,$cycle );
			if($resText === true){
				kekezu::show_msg ( '抢标成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/quote' );
		}
		die();
		break;
	case 'matchquoteedit':
		$arrCoverCash = kekezu::get_cash_cove ( '', true );
		if(0 === $gUid){
			kekezu::show_msg ( '未登陆用户，无权操作', 'index.php?do=login', 3, NULL, 'warning' );
		}
		if(!$workId){
			kekezu::show_msg ( '参数错误', 'index.php?do=task&id='.$taskId, 3, NULL, 'warning' );
		}else{
			$arrWorkDetailInfo = $objTask->get_match_work($workId);
			$arrBidInfo = $objTask->work_exists ();
		}
        if($arrBidInfo['uid']!=$gUid){
        	kekezu::show_msg ( '无修改权限', 'index.php?do=task&id='.$taskId, 3, NULL, 'warning' );
        }
        $floatDeposit = $objTask->_task_config['deposit'];
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			if (strtoupper ( CHARSET ) == 'GBK') {
				$tar_content =  kekezu::utftogbk($tar_content );
			}
			$resText = $objTask->work_edit ( $workId,$price,$tar_content,$cycle );
			if($resText === true){
				kekezu::show_msg ( '修改成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/quote' );
		}
		die();
		break;
		break;
	case 'getContact':
		if($uid==$objTask->_guid){
			$arrBidInfo = $objTask->work_exists ();
			$arrWorkDetailInfo = $objTask->get_match_work($arrBidInfo['work_id']);
			$contact['mobile'] = $arrWorkDetailInfo['witkey_contact'];
		}else{
			$contact['mobile'] = $objTask->_g_userinfo['mobile'];
			$contact['qq'] = $objTask->_g_userinfo['qq'];
			$contact['email'] = $objTask->_g_userinfo['email'];
			$contact['msn'] = $objTask->_g_userinfo['msn'];
		}
		require keke_tpl_class::template ('task/match/tpl/default/contact');
		die ();
		break;
	case 'sendNotice':
		$objTask->send_notice($type);
		break;
	case 'workGiveup':
		$objTask->work_give_up();
		break;
	case 'taskHost':
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			$strText = $objTask->task_host ($floatHostCash);
			if($strText === true){
				kekezu::show_msg ( '托管成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			$limit = $objTask->_host_amount;
			require keke_tpl_class::template ('task/match/tpl/default/host');
		}
		die ();
		break;
	case 'workover':
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			$resText = $objTask->work_over($tarContent, $file_id,intval($modify));
			if($resText === true){
				kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}
		if($action == 'deleteFile'){
			$resText = CommonClass::delFileByFileId($fileid);
			if($resText){
				kekezu::echojson('删除成功',1,array('fileid'=>$fileid));die;
			}
		}
		$arrBidInfo = $objTask->work_exists ();
		$arrFileLists = CommonClass::getFileArray('|', $arrBidInfo['work_file']);
		require keke_tpl_class::template ('task/match/tpl/default/complete');
		die ();
		break;
	case 'taskAccept':
		$objTask->task_accept();
		break;
	case 'workcancel':
		$objTask->work_cancel();
		break;
	case "planquote" : 
		if(0 === $gUid){
			kekezu::show_msg ( '未登陆用户，无权操作', 'index.php?do=login', 3, NULL, 'warning' );
		}
			$arrCoverCash = kekezu::get_cash_cove ( '', true );
			if (isset($formhash)&&kekezu::submitcheck($formhash)){
				$floatQuote  =  floatval($quote);
				$arrPlanAmounts = array();
				$arrPlanAmounts = $plan_amount;
				$floatPlanAmount = floatval(0);
				foreach ($arrPlanAmounts as $value){
					$floatPlanAmount += floatval($value);
				}
				if($floatQuote  !== $floatPlanAmount){
					$tips['errors']['quote'] = '请检查报价金额与计划金额是否相等';
					kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				}
				$planStartTime = $start_time;
				$planEndTime   = $end_time;
				$arrPlanDate = array();
				foreach ($planStartTime as $k=>$v){
					$arrPlanDate[$k]['start_time'] = $v;
				}
				foreach ($planEndTime as $k=>$v){
					$arrPlanDate[$k]['end_time'] = $v;
				}
				$dateCount = intval(count($arrPlanDate));
				for($i=0;$i <= $dateCount;$i++){
					$i = intval($i);
					if($i === 0){
						if( strtotime(date('Y-m-d',time())) > strtotime($arrPlanDate[$i]['start_time'])){
							$tips = '首次计划开始时间不能小于当前时间';
							kekezu::show_msg($tips,NULL,NULL,NULL,'fail');
						}
						if(strtotime($arrPlanDate[$i]['start_time'])> strtotime($arrPlanDate[$i]['end_time'])){
							$tips = '请检查首次计划时间';
							kekezu::show_msg($tips,NULL,NULL,NULL,'fail');
						}
					}
					if($i>0 && $i< $dateCount){
						$ii = $i-1;
						if(strtotime($arrPlanDate[$ii]['end_time']) > strtotime($arrPlanDate[$i]['start_time'])){
							$tips = '请检查阶段计划时间';
							kekezu::show_msg($tips,NULL,NULL,NULL,'fail');
						}
					}
					if($i === ($dateCount -1)){
						if(strtotime($arrPlanDate[$i]['start_time'])> strtotime($arrPlanDate[$i]['end_time'])){
							$tips = '请检查最终计划结束时间';
							kekezu::show_msg($tips,NULL,NULL,NULL,'fail');
						}
					}
				};
				$arrDistrictData = CommonClass::getAllDistrict('id,upid,name');
				$province 	= $arrDistrictData[$province]['name'];
				$city 		= $arrDistrictData[$city]['name'];
				$area 		= $arrDistrictData[$area]['name'];
				$district = $province . "," . $city . ',' . $area;
				if (strtoupper ( CHARSET ) == 'GBK') {
					$message =  kekezu::utftogbk($message );
					$plan_title =  kekezu::utftogbk($plan_title );
				}
				$resText = $objTask->bid_hand ( $quote,$cycle,$district,$message,$plan_amount, $start_time, $end_time, $plan_title );
				unset($objTask);
				unset($floatPlanAmount);
				if($resText === true){
					kekezu::show_msg ( '报价成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
				}else{
					kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
				}
			}else{
				require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/quote' );
			}
			die();
			break;
	case "consign" : 
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			$resText = $objTask->hosted_amount();
			if($resText === true){
				kekezu::show_msg ( '托管成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, NULL, NULL, NULL, 'fail' );
			}
		}else{
			$arrBidInfo = $objTask->_bid_info;
			$cash =$arrBidInfo['quote']-$arrTaskInfo['real_cash'];
			require keke_tpl_class::template ( 'task/'.$arrModelInfo['model_code'].'/tpl/default/consign' );
		}
		die();
	case "plancomplete":
		$resText = $objTask->plan_complete(intval($planid),intval($planstep));
		if($resText === true){
			kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
		}else{
			kekezu::show_msg ( $resText, NULL, NULL, NULL, 'fail' );
		}
		die();
	break;
	case "planconfirm":
		$resText = $objTask->plan_confirm(intval($planid),intval($planstep));
		if($resText === true){
			kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
		}else{
			kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
		}
	break;
	case "delay" : 
		$arrDelayRule 	= $objTask->_delay_rule;
		$delayTotal 	= sizeof($arrDelayRule);
		$delayCount 	= intval($arrTaskInfo['is_delay']);
		$minDelayCash 	= floatval($arrConfig['min_delay_cash']);
		$maxDelayday  	= intval($arrConfig['max_delay']);
		$thisMinCash 	= floatval($arrDelayRule[$delayCount]['defer_rate']*$arrTaskInfo['task_cash']/100);
		if($minDelayCash>$thisMinCash){
			$realMin 	= $minDelayCash;
		}else{
			$realMin 	= $thisMinCash;
		}
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			if($delayTotal === 0){
				kekezu::show_msg ( '任务模型没有开启延期规则', 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
			if($delayCount >= $delayTotal){
				kekezu::show_msg ( '当前任务延期次数已达上限', 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
			$delay_day 	= intval($delay_day);
			$delay_cash = keke_curren_class::convert($delay_cash,0,true);
			$delay_cash = floatval($delay_cash);
			$floatUserBalance = floatval($gUserInfo['balance']);
			if($floatUserBalance < $delay_cash){
				kekezu::show_msg ( '余额不足，请充值！', 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
			if(($delay_cash < $realMin)&&$realMin){
				$tips['errors']['delay_cash'] = '延期最小金额不得低于￥'.$realMin.'元';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($delay_day&&($delay_day > $maxDelayday)&&$maxDelayday){
				$tips['errors']['delay_day'] = '延期最大天数不得超过'.$maxDelayday.'天';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$resText 	= $objTask->set_task_delay($delay_day, $delay_cash);
			if($resText === true){
				kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		}else{
			require keke_tpl_class::template ( 'task/delay' );
		}
		die();
		break;
	case "workchoose" : 
		$workId = intval($workId);
		$workStatus= intval($status);
		$arrWorkInfo = $objTask->get_task_work($workId,'');
		if($workId&&$workStatus&&$arrWorkInfo){
			$resText = $objTask->work_choose($workId, $workStatus);
			if($resText === true){
				kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId.'&view=work&page='.intval($page), 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId.'&view=work&page='.intval($page), 3, NULL, 'fail' );
			}
		}
		kekezu::show_msg ( '服务器繁忙,请重试...', 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
		die();
		break;
	case 'workinfo':
		$workId = intval($workId);
		$arrWorkInfo = $objTask->get_task_work($workId);
		$arrWorkFiles = $objTask->get_work_file ($arrWorkInfo['work_file']);
		$intFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "work"',TABLEPRE.'witkey_favorite',intval($gUid),intval($arrWorkInfo['work_id'])));
		require keke_tpl_class::template ( 'task/workinfo' );die;
		break;
	case 'reqedit':
		if (isset($formhash)&&kekezu::submitcheck($formhash)){
			if (strtoupper ( CHARSET ) == 'GBK') {
				$tar_content =  kekezu::utftogbk($tar_content );
			}
			if ($kekezu->_sys_config['ban_content']&&kekezu::k_match(array($kekezu->_sys_config['ban_content']),$tar_content)) {
				$tips['errors']['tar_content'] = $_lang['sensitive_word'];
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
			}
			$resText = $objTask->set_task_reqedit ( kekezu::escape($tar_content) );
			if($resText === true){
				kekezu::show_msg ( '操作成功', 'index.php?do=task&id='.$taskId, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, 'index.php?do=task&id='.$taskId, 3, NULL, 'fail' );
			}
		} else{
			$strExtDesc = $arrTaskInfo ['ext_desc'];
			require keke_tpl_class::template ( 'task/reqedit' );die;
		}
		die ();
		break;
	case 'mark':
		$strModelCode = $objTask->_model_code;
		$strJumpUrl = 'index.php?do=task&id='.$taskId;
		require S_ROOT.'control/mark.php';die;
		break;
	default:
		jumpUrl($taskId);
		break;
}
function jumpUrl($taskId = 0){
	if($taskId){
		$JumpUrl = 'index.php?do=task&id='.$taskId;
	}else{
		$JumpUrl = 'index.php?do=tasklist';
	}
	header('Location:'.$JumpUrl);
}
die();
