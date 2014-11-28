<?php
defined ( 'IN_KEKE' ) or exit('Access Denied');
$page_title=$arrAgreeInfo['agree_title'].'--'.$_K['html_title'];
$objAgreement	 = sreward_task_agreement::get_instance($agreeId);
$arrAgreeInfo	 = $objAgreement->_agree_info;
$arrProcessCan   = $objAgreement->process_can();
$intUserType 		 = $objAgreement->_user_role;
$step			 = $objAgreement->stage_access_check($intUserType);
$stage_nav		 = $objAgreement->agreement_stage_nav();
$strUrl		 = 'index.php?do='.$do.'&agreeId='.$agreeId.'&step='.$step;
$reportUrl = 'index.php?do=taskhandle&op=report&taskId='.$arrAgreeInfo['task_id'];
if($gUid == $arrAgreeInfo['buyer_uid']){
	$reportUrl .= '&objId='.$arrAgreeInfo['work_id'].'&objType=work&type=1&toUid='.$arrAgreeInfo['seller_uid'].'&toUsername='.$objAgreement->_seller_username;
}else{
	$reportUrl .= '&objId='.$arrAgreeInfo['task_id'].'&objType=task&type=1&toUid='.$arrAgreeInfo['buyer_uid'].'&toUsername='.$objAgreement->_buyer_username;
}
$arrAllDistrict = CommonClass::getAllDistrict();
$arrWitkeyInfo = kekezu::get_user_info($arrAgreeInfo['seller_uid']);
$arrWitkeyInfo['comefrom'] = $arrAllDistrict[$arrWitkeyInfo['province']]['name'].'-'.$arrAllDistrict[$arrWitkeyInfo['city']]['name'];
$arrWitkeyLevel = unserialize($arrWitkeyInfo['seller_level']);
$nearlyIncome = CommonClass::getNearlyIncomeForDays($arrWitkeyInfo['uid']);
$arrEmploymerInfo = kekezu::get_user_info($arrAgreeInfo['buyer_uid']);
$arrEmploymerInfo['comefrom'] = $arrAllDistrict[$arrEmploymerInfo['province']]['name'].'-'.$arrAllDistrict[$arrEmploymerInfo['city']]['name'];
$arrEmploymerLevel = unserialize($arrEmploymerInfo['buyer_level']);
$arrTaskInfo = db_factory::get_one(sprintf("select * from %switkey_task where task_id = '%d'",TABLEPRE,$arrAgreeInfo['task_id']));
$taskStatus     = $arrTaskInfo['task_status'];
$config = unserialize ( $model_list [1] ['config'] );
$jf_end_time = date('Y-m-d',$config['agree_complete_time']*24*3600+$arrAgreeInfo['on_time']);
$check_right_arr = db_factory::get_one(sprintf("select report_id,username,report_type from %switkey_report where report_status in(1,2) and origin_id ='%d'",TABLEPRE,$arrAgreeInfo['task_id']));
if($taskStatus==11||$taskStatus==13||$taskStatus==9){
	header ( "location:index.php?do=task&id=".$arrAgreeInfo['task_id'] );
	die ();
}
$arrAgreementProgress = array(
	1=>array(
		'num'=>1,
		'step'=>'step1',
		'state'=>'同意协议'
	),
	2=>array(
		'num'=>2,
		'step'=>'step2',
		'state'=>'上传源文件'
	),
	3=>array(
		'num'=>3,
		'step'=>'step3',
		'state'=>'确认源文件'
	),
	4=>array(
		'num'=>4,
		'step'=>'step4',
		'state'=>'双方互评'
	)
);
switch ($step){
	case "step1":
		if($op === 'sign'){
			$resText = $objAgreement->agreement_stage_one($user_type);
			if(true === $resText){
				kekezu::show_msg ( '协议签署成功', $strUrl, 3, NULL, 'ok' );
			}else{
				kekezu::show_msg ( $resText, null, 3, NULL, 'fail' );
			}
		}
		break;
	case "step2":
		$strExtTypes = kekezu::get_ext_type();
		switch ($op){
			case "confirm":
				$resText = $objAgreement->upfile_confirm($file_ids);
				if(true === $resText){
					kekezu::show_msg ( '源文件提交成功', $strUrl, 3, NULL, 'ok' );
				}else{
					kekezu::show_msg ( $resText, null, 3, NULL, 'fail' );
				}
				break;
		}
		break;
	case "step3":
		$fileList   = $objAgreement->get_file_list();
		switch ($op){
			case "accept":
				$resText = $objAgreement->accept_confirm($strUrl);
				if(true === $resText){
					kekezu::show_msg ( '源文件确认完成，任务交付成功', $strUrl, 3, NULL, 'ok' );
				}else{
					kekezu::show_msg ( $resText, null, 3, NULL, 'fail' );
				}
				break;
		}
		break;
	case "step4":
		$modelCode = $objAgreement->_model_code;
		$objId     = $arrAgreeInfo['work_id'];
		if($arrAgreeInfo['seller_uid'] == $gUid){
			$toUid = $arrAgreeInfo['buyer_uid'];
		}else{
			$toUid = $arrAgreeInfo['seller_uid'];
		}
		$arrMark = keke_user_mark_class::get_mark_info ( array ('model_code' => $modelCode, 'obj_id' => $objId,'by_uid'=>$gUid,'uid'=>$toUid) );
		$markInfo = $arrMark ['mark_info'] ['0'];
		$markInfo or   kekezu::show_msg('操作提示',$strUrl,"3",'互评系统繁忙，请稍后再试',"error");
		$aidList = keke_user_mark_class::get_mark_aid ( $intUserType );
		$aidInfo=keke_user_mark_class::get_user_aid($markInfo['by_uid'],$markInfo['mark_type'],$markInfo['mark_status'],2,$markInfo['model_code'],$objId);
		$strJumpUrl = "index.php?do=task&id=".$arrAgreeInfo['task_id']."&view=mark#detail";
		if($markInfo['mark_status'] == '1'){
			kekezu::show_msg('操作提示',$strJumpUrl,3,'评价完成，任务已结束','success');
		}
		break;
}
require keke_tpl_class::template("task/".$arrModelInfo['model_dir']."/tpl/".$_K['template']."/agreement/index");
die;
