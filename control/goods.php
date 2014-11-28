<?php
$strNavActive = "goods";
$intId = intval($id);
if ($intId) {
	$arrServiceInfo = keke_shop_class::get_service_info ( $intId );
	$arrModelInfo = $model_list [$arrServiceInfo ['model_id']];
    $arrServiceInfo or kekezu::show_msg(kekezu::lang("operate_notice"),"index.php?do=goodslist",2,"对不起，您访问的页面没找到！","warning");
	$strUrl = "index.php?do=goods&id=".$intId; 
	$arrView = array('sale','comment','mark');
	if(!in_array($view, $arrView)){
		$view = 'sale';
	}
	if($arrServiceInfo['seo_title']){
		$strPageTitle = $service_info['seo_title'];
	}else{
		$strPageTitle = $arrServiceInfo['title'].'-'.$indus_arr[$arrServiceInfo['indus_id']]['indus_name'].','.$indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name'].'-'.$_K['html_title'];
	}
	if($arrServiceInfo['seo_keyword']){
		$strPageKeyword = $arrServiceInfo['seo_keyword'];
	}else{
		$strPageKeyword = $indus_arr[$arrServiceInfo['indus_id']]['indus_name'].','.$indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name'];
	}
	if($arrServiceInfo['seo_desc']){
		$strPageDescription =  $arrServiceInfo['seo_desc'];
	}else{
		$strPageDescription = kekezu::cutstr($arrServiceInfo['content'],100);
	}
	if ($uid != $arrServiceInfo ['uid']&&$arrServiceInfo ['service_status']!=2&&$arrServiceInfo ['service_status']!=5) {
		$gUid == ADMIN_UID or kekezu::show_msg ( '操作提示', "index.php?do=goodslist", '1', '商品不存在', 'warning' );
	}
    if(isset($op)){
    	switch($op){
			case "report" :
				$transname = keke_report_class::get_transrights_name ( $type );
				$report_reason = keke_report_class::get_report_product_reason ();
				if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
				    $resCheck = keke_report_class::check_if_report($type, $objType, $objId, $uid, $toUid);
				    if($resCheck === true){
				    	$tarContent = kekezu::escape($tarContent);
				    	$toUserInfo = keke_user_class::get_user_info($toUid);
				    	$resText = keke_shop_class::set_report ($objId, $toUid, $type, $filepath, $tarContent,$sltReason);
				    	if ($resText === true) {
				    		kekezu::show_msg ( '感谢您的举报，管理员会尽快受理，请耐心等待处理结果。', 'index.php?do=goods&id='.$id, 3, NULL, 'ok' );
				    	} else {
				    		kekezu::show_msg ( $resText, null, null, NULL, 'fail' );
				    	}
				    }else{
				    	kekezu::show_msg ( $resCheck, null, null, NULL, 'fail' );
				    }
				} else {
					$strUrl.= '&op=report';
					require keke_tpl_class::template ( "tpl/default/ajax/report" );die;
				}
				break;
    	}
    }
    $arrBreadcrumbs = array(
    		1=>array('url'=>'index.php?do=goodslist','name'=>'威客商城'),
    		2=>array('url'=>'index.php?do=goodslist&pd='.$arrServiceInfo['indus_pid'],'name'=>$indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name']),
    		3=>array('url'=>'index.php?do=goodslist&pd='.$arrServiceInfo['indus_pid'].'&i='.$arrServiceInfo['indus_id'],'name'=>$indus_arr[$arrServiceInfo['indus_id']]['indus_name']),
    );
	$arrCoverList = keke_shop_class::output_pics($arrServiceInfo['pic'],'');
	$intNum        = sizeof($arrCoverList);
	$mc = keke_shop_class::get_mark_count_ext($model_list [$arrServiceInfo ['model_id']]['model_code'],$intId);
	$mc['all'] = intval($mc[1]['c']+$mc[2]['c']);
	$mc['seller'] = intval($mc[1]['c']);
	$mc['buyer'] = intval($mc[2]['c']);
	$arrOwnerInfo  = kekezu::get_user_info($arrServiceInfo['uid']);
	$strUserLevel  = unserialize($arrOwnerInfo['seller_level']);
	$arrAuthInfo  = keke_auth_fac_class::get_submit_auth_record($arrOwnerInfo['uid'],1);
	$arrShopAid = keke_user_mark_class::get_user_aid ( $arrOwnerInfo['uid'], 2, null, 1 );
	$arrOtherGoods = db_factory::query("select * from ".TABLEPRE."witkey_service where uid=".$arrOwnerInfo['uid']." and service_id!=".$arrServiceInfo['service_id']." order by on_time desc limit 3");
	$arrPayitemLists = PayitemClass::getPayitemListDetail('goods',$arrServiceInfo['service_id']);
	$arrPayitemShow = keke_shop_class::getPayitemShow($arrServiceInfo);
	$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
			." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by if(b.indus_pid=%d ,1,0) desc, good_rate desc limit 0,5", TABLEPRE,TABLEPRE,$arrServiceInfo['indus_pid'] ), 1, $intIndexCacheTime );
	require S_ROOT . "/shop/" . $arrModelInfo['model_dir'] . "/control/index.php";
	require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/index");die;
}
$_SESSION['spread'] = 'index.php?do=goods&id='.intval($id);
