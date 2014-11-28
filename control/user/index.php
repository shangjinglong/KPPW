<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$arrAuthItems = keke_auth_base_class::get_auth_item (NULL,NULL,1);
$gUserInfo ['user_type'] == 2 and $strUncode = 'realname' or $strUncode = "enterprise";
$arrAuthInfos = keke_auth_fac_class::get_submit_auth_record ( $gUid, 1 );
$arrAuthInfos = kekezu::get_arr_by_key ( $arrAuthInfos, "auth_code" );
$arrSellerLevel = unserialize($gUserInfo['seller_level']);
$arrBuyerLevel = unserialize($gUserInfo['buyer_level']);
if($gUserInfo['seller_total_num']>0){
	$floatMarkRateS = number_format($gUserInfo['seller_good_num']/$gUserInfo['seller_total_num'],4)*100;
}else{
	$floatMarkRateS = 0;
}
if($gUserInfo['buyer_total_num']>0){
	$floatMarkRateG = number_format($gUserInfo['buyer_good_num']/$gUserInfo['buyer_total_num'],4)*100;
}else{
	$floatMarkRateG = 0;
}
$floatPubTask = db_factory::query("select sum(a.fina_cash) as cash from ".TABLEPRE."witkey_finance a left join ".TABLEPRE."witkey_order b on a.order_id=b.order_id
		 where a.uid=".intval($gUid)." and a.fina_action = 'pub_task' and b.order_status='ok'");
$floatBidTask = db_factory::query("select sum(fina_cash) as cash from ".TABLEPRE."witkey_finance
		 where uid=".intval($gUid)." and fina_action = 'task_bid' ");
$floatPayService =  db_factory::query("select sum(a.fina_cash) as cash,count('a.fina_id') as count from ".TABLEPRE."witkey_finance a left join ".TABLEPRE."witkey_order b on a.order_id=b.order_id
		 where a.uid=".intval($gUid)." and a.fina_action in ('buy_service','buy_gy') and b.order_status='ok'");
$floatSaleService = db_factory::query("select sum(fina_cash) as cash,count(fina_id) as count from ".TABLEPRE."witkey_finance
		 where uid=".intval($gUid)." and fina_action in ('sale_service','sale_gy') ");
$arrTaskModels = TaskClass::getEnabledTaskModelList();
$strModelIds = implode(',',array_keys($arrTaskModels));
$arrGoodsModels = db_factory::get_table_data('*','witkey_model',' model_status = 1 and model_type = "shop" ',' listorder asc','','','model_id',3600);
$strServiceIds = implode(',',array_keys($arrGoodsModels));
$strModelIds and $arrTaskCount = kekezu::get_table_data('count(task_id) as count,task_status','witkey_task','uid='.intval($gUid).' and task_status in (0,3) and model_id in ('.$strModelIds.')','','task_status','','task_status','');
$strServiceIds  and $arrServiceWait = db_factory::query("SELECT  count(a.order_id) as count FROM `".TABLEPRE."witkey_order` AS a  LEFT JOIN ".TABLEPRE."witkey_order_detail AS b ON a.order_id = b.order_id  LEFT JOIN ".TABLEPRE."witkey_service AS c ON b.obj_id = c.service_id  WHERE  1=1  and a.seller_uid = $uid and c.model_id in (".$strServiceIds.") and b.obj_type = 'service'
		 and a.order_status ='seller_confirm'");
$strServiceIds and $strServiceComp = $arrGoodsWait = db_factory::query("SELECT  count(a.order_id) as count FROM `".TABLEPRE."witkey_order` AS a  LEFT JOIN ".TABLEPRE."witkey_order_detail AS b ON a.order_id = b.order_id  LEFT JOIN ".TABLEPRE."witkey_service AS c ON b.obj_id = c.service_id  WHERE  1=1  and a.seller_uid = $uid and c.model_id in (".$strServiceIds.") and b.obj_type = 'service'
		 and a.order_status ='confirm_complete'");
$arrCashCoves = TaskClass::getTaskCashCove();
$arrMyFeeds = kekezu::get_feed(" uid=".intval($gUid)." and (feedtype='pub_task' or feedtype='pub_service')",'feed_time desc','5');
$strFriends = db_factory::query("select group_concat(fuid) as fuids from ".TABLEPRE."witkey_free_follow where uid=".intval($gUid));
$strFriends[0][fuids] and $arrFriendFeeds = kekezu::get_feed(" uid in (".$strFriends[0]['fuids'].") and (feedtype='pub_task' or feedtype='pub_service')",'feed_time desc','5');
