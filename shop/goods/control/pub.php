<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$stdCacheName = 'service_cache_'.$id.'_' . substr ( md5 ( $gUid ), 0, 6 );
$objRelease = goods_release_class::get_instance ($id);
$objRelease->get_service_obj ( $stdCacheName ); 
$arrPubInfo = $objRelease->_std_obj->_release_info; 
$arrConfig = $objRelease->_service_config; 
$arrPubInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrPubInfo['indus_pid'],'indus_id,indus_pid,indus_name');
switch ($step) {
	case 'step1':
		$objRelease->check_access ( $step, $id, $arrPubInfo );
		$strExtTypes   = '*.jpg;*.jpeg;*.gif;*.png;*.bmp'; 
		$arrPriceUnit = $objRelease->get_price_unit (); 
		$floatPrice = floatval($txt_price);
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$floatMinCash = floatval($arrConfig['min_cash']);
			if ($floatPrice < $floatMinCash) {
				$tips['errors']['txt_price'] = '你的商品价格不能少于￥'.$floatMinCash.'元';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($submit_method=='inside'){
				if (!$file_path_2) {
					$tips['errors']['file_path_2'] = '请上传源文件';
					kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				}
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$_POST = kekezu::utftogbk($_POST );
			}
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST );
			$_POST['txt_price'] = keke_curren_class::convert($_POST['txt_price'],0,true);
			$objRelease->save_service_obj ( $_POST, $stdCacheName ); 
			kekezu::show_msg($tips,$strUrl.'&step=step2',NULL,NULL,'ok');
		}
		$arrImageLists = CommonClass::getFileArrayByPath(',', $arrPubInfo['file_ids']);
		$arrFileLists = CommonClass::getFileArrayByPath(',', $arrPubInfo['file_path_2']);
		if($action == 'delete_image'){
			$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,$fileid);
			$arrFileInfo = db_factory::get_one($strSql);
			$resText = CommonClass::delFileByFileId($fileid);
			if($resText){
				$array = explode(',', $arrPubInfo['file_ids']);
				$newArr = CommonClass::returnNewArr($arrFileInfo['save_name'], $array);
				$_POST['file_ids'] = implode(",", $newArr);
				$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST);
				$objRelease->save_service_obj ($_POST, $stdCacheName ); 
				kekezu::echojson('删除成功',1,array('fileid'=>$fileid,'save_name'=>$arrFileInfo['save_name']));die;
			}
		}
		if($action == 'delete_goodsfile'){
			$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,$fileid);
			$arrFileInfo = db_factory::get_one($strSql);
			$resText = CommonClass::delFileByFileId($fileid);
			if($resText){
				$array = explode(',', $arrPubInfo['file_path_2']);
				$newArr = CommonClass::returnNewArr($arrFileInfo['save_name'], $array);
				$_POST['file_path_2'] = implode(",", $newArr);
				$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST);
				$objRelease->save_service_obj ($_POST, $stdCacheName ); 
				kekezu::echojson('删除成功',1,array('fileid'=>$fileid,'save_name'=>$arrFileInfo['save_name']));die;
			}
		}
		break;
	case 'step2':
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$arrPayitems = array(
					'goodstop'=>intval($txt_goodstop),
			);
			$arrPayitems = array_filter($arrPayitems);
			PayitemClass::validPayitemCosts($hdn_total_costs);
			$arrPubInfo['payitem'] = $arrPayitems;
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST );
			$objRelease->save_service_obj ( $_POST, $stdCacheName ); 
			$intSid = $objRelease->pub_service (); 
			$objRelease->update_service_info ( $intSid, $stdCacheName ); 
			kekezu::show_msg($tips,$strUrl.'&step=step3&serviceId='.$intSid,NULL,NULL,'ok');
		}else{
			$objRelease->check_access($step, $id, $arrPubInfo);
			$strTarComment = htmlspecialchars_decode($arrPubInfo['tar_content']);
			$strCommentLen = strlen($strTarComment);
			if($strCommentLen > 1000 ){
				$strPartComment = substr($strTarComment, 0,1000);
			}
		}
		break;
	case 'step3':
		$serviceId = intval($serviceId);
		if(0 === $serviceId){
			kekezu::show_msg('无权访问',$strUrl,3,NULL,'warning');
		}
		$objRelease->check_access($step, $id, $arrPubInfo,$serviceId);
		break;
}
require keke_tpl_class::template ( 'pubgoods' );
die();