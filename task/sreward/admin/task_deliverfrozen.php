<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$intTaskId = intval($task_id);
$intModelId = intval($model_id);
$arrTaskInfo = db_factory::get_one("select * from ".TABLEPRE."witkey_task where task_id=".$intTaskId);
$arrWorkInfo = db_factory::get_one("select * from ".TABLEPRE."witkey_task_work where task_id=".$intTaskId." and work_status=4");
if($arrTaskInfo['task_status']!=13){
	kekezu::admin_show_msg ( $_lang ['param_error'], 'index.php?do=model&model_id=' . $intModelId . '&view=list', 3, '', 'warning' );
}
$floatCash = $arrTaskInfo['task_cash']*(1-$arrTaskInfo['task_fail_rate']/100);
$arrGinfo = keke_user_class::get_user_info($arrTaskInfo['uid']);
$arrWinfo = keke_user_class::get_user_info($arrWorkInfo['uid']);
if($intSbtEdit==1){
	$floaTotalCash = floatval ( $floatCash ); 
	$floatGzGet = floatval (keke_curren_class::convert($op_result['gz_get'],0,true)); 
	$floatWkGet = floatval (keke_curren_class::convert($op_result['wk_get'],0,true)); 
	if ($floaTotalCash != $floatGzGet + $floatWkGet) {
		kekezu::admin_show_msg ( $_lang['wain_you_give_cash_error_notice'], "index.php?do=model&model_id={$model_id}&view=list", "3", "", "warning" );
	} else {
		$res = keke_finance_class::cash_in ( $arrGinfo ['uid'], $floatGzGet, 'task_fail' ); 
		$res .= keke_finance_class::cash_in ( $arrWinfo ['uid'], $floatWkGet, 'task_fail' ); 
		if ($res) {
          db_factory::execute("update ".TABLEPRE."witkey_task set task_status=9 where task_id=".$intTaskId);
          kekezu::admin_show_msg ('处理成功', "index.php?do=model&model_id=$model_id&view=list", "3","","success" );
		}else{
		  kekezu::admin_show_msg ('处理失败', "index.php?do=model&model_id=$model_id&view=list", "3","","warning" );
		}
	}
}
require keke_tpl_class::template ( 'task/' . $model_info ['model_dir'] . '/admin/tpl/task_' . $view );