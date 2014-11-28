<?php
$arrTopIndustrys = $kekezu->_indus_goods_arr;
$objId = intval($objId);
$intTaskId = intval($intTaskId);
$strUrl ="index.php?do=user&view=transaction&op=editwork";
$objId and $strUrl .="&objId=".$objId;
$intTaskId and $strUrl .="&intTaskId=".$intTaskId;
if($intTaskId&&$objId){
	$strTaskSql = 'select indus_id,indus_pid from '.TABLEPRE.'witkey_task where task_id = '.$intTaskId;
	$arrTaskInfo = db_factory::get_one($strTaskSql);
	$strJumpUrl ="index.php?do=user&view=transaction&op=works";
}
if($objId&&!$intTaskId){
	$strServiceSql = 'select
						service_id,model_id,uid,username,indus_id,indus_pid,title,price,pic,content,unite_price,submit_method,file_path,service_time
					  from '.TABLEPRE.'witkey_service where service_id = '.$objId;
	$arrServiceInfo = db_factory::get_one($strServiceSql);
	$strJumpUrl ="index.php?do=user&view=transaction&op=service&intModelId=".$arrServiceInfo['model_id'];
}
$arrServiceInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrServiceInfo['indus_pid'],'indus_id,indus_pid,indus_name');
$intModelId = 6;
if($arrServiceInfo['model_id']){
	$intModelId = $arrServiceInfo['model_id'];
}
$strServiceName = '作品';
if($intModelId =='7'){
	$strServiceName = '服务';
}
$objRelease = goods_release_class::get_instance ($intModelId);
$arrPriceUnit = $objRelease->get_price_unit (); 
$arrServiceUnit = $objRelease->get_service_unit();
$arrImageLists = CommonClass::getFileArrayByPath(',', $arrServiceInfo['pic']);
$arrFileLists = CommonClass::getFileArrayByPath(',', $arrServiceInfo['file_path']);
if($action == 'delete_image'){
	$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,$fileid);
	$arrFileInfo = db_factory::get_one($strSql);
	$resText = CommonClass::delFileByFileId($fileid);
	if($resText){
		$array = explode(',', $arrServiceInfo['pic']);
		$newArr = CommonClass::returnNewArr($arrFileInfo['save_name'], $array);
		$_POST['file_ids'] = implode(",", $newArr);
		updateFilepath($arrServiceInfo['service_id'], $_POST['file_ids'], 'pic');
		kekezu::echojson('删除成功',1,array('fileid'=>$fileid,'save_name'=>$arrFileInfo['save_name']));die;
	}
}
if($action == 'delete_goodsfile'){
	$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,$fileid);
	$arrFileInfo = db_factory::get_one($strSql);
	$resText = CommonClass::delFileByFileId($fileid);
	if($resText){
		$array = explode(',', $arrServiceInfo['file_path']);
		$newArr = CommonClass::returnNewArr($arrFileInfo['save_name'], $array);
		$_POST['file_path_2'] = implode(",", $newArr);
		updateFilepath($arrServiceInfo['service_id'], $_POST['file_path_2'], 'file');
		kekezu::echojson('删除成功',1,array('fileid'=>$fileid,'save_name'=>$arrFileInfo['save_name']));die;
	}
}
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	$arrGoodsConfig = unserialize($kekezu->_model_list[6]['config']);
	$goodsprice   = floatval($goodsprice);
	$floatMinCash = floatval($arrGoodsConfig['min_cash']);
	if($floatMinCash&&($goodsprice < $floatMinCash)){
		$tips['errors']['goodsprice'] = '最小金额不能少于'.$floatMinCash.'元';
		kekezu::show_msg($tips,null,NULL,NULL,'error');
	}
	if (strtoupper ( CHARSET ) == 'GBK') {
		$goodsname = kekezu::utftogbk($goodsname );
		$goodsdesc = kekezu::utftogbk($goodsdesc );
		$unite_price = kekezu::utftogbk($unite_price );
	}
	$arrData = array(
			'model_id'		=> $arrServiceInfo['model_id']?$arrServiceInfo['model_id']:6,
			'uid'			=> $gUid,
			'username'		=> $gUserInfo['username'],
			'indus_id'		=> $indus_id,
			'indus_pid'		=> $indus_pid,
			'title'			=> $goodsname,
			'price'		    => $goodsprice,
			'pic'			=> $file_ids,
			'content'		=> $goodsdesc,
			'unite_price'	=> $unite_price,
			'submit_method'	=> $submit_method,
			'file_path'		=> $file_path_2,
			'confirm_max'   => intval($arrGoodsConfig['confirm_max_day'])
	);
	if(!$pk['service_id']){
		$arrData['profit_rate'] = $arrGoodsConfig['service_profit'];
		$arrData['on_time'] = time();
		$arrData['service_status'] = 2;
	}
	$objServiceT = new keke_table_class ( 'witkey_service' );
	$objServiceT->save ( $arrData,$pk);
	unset($objServiceT);
	if ($objId&&$intTaskId) {
		$strBidSql  = ' UPDATE `'.TABLEPRE.'witkey_task_bid`  SET `hasdel`=1 WHERE (`bid_id` ='.$objId.')  and task_id = '.$intTaskId;
		$strWorkSql = ' UPDATE `'.TABLEPRE.'witkey_task_work` SET `hasdel`=1 WHERE (`work_id`='.$objId.')  and task_id = '.$intTaskId;
		db_factory::execute($strBidSql);
		db_factory::execute($strWorkSql);
	}
	kekezu::show_msg('操作成功',$strJumpUrl,NULL,NULL,'ok');
}
function updateFilepath($serviceId,$filepath,$type){
	if($type == 'pic'){
		$sql = ' update '.TABLEPRE.'witkey_service set pic = "'.$filepath.'" where service_id = '.intval($serviceId);
	}else{
		$sql = ' update '.TABLEPRE.'witkey_service set file_path = "'.$filepath.'" where service_id = '.intval($serviceId);
	}
	db_factory::execute($sql);
}
require  $kekezu->_tpl_obj->template($do.'/'.$view.'_'.$op);die;