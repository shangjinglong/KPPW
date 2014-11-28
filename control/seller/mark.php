<?php
$type or $type = 2;
$strUrl = 'index.php?do=seller&view=mark&id='.intval($id).'&type='.$type;
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
if($type==2){
	$arrSellerLevel = unserialize ( $arrSellerInfo ['seller_level'] );
	$arrSellerLevel['next'] = intval($arrSellerLevel['value'] + $arrSellerLevel['level_up']);
	if($arrSellerLevel['next']){
		$arrSellerLevel['rate'] =intval(($arrSellerLevel['value']/$arrSellerLevel['next'])*100 );
	}else{
		$arrSellerLevel['rate'] = 0;
	}
	$arrSellerMark = keke_user_mark_class::get_user_aid ( $arrSellerInfo['uid'], 2, null, 1 );
	$arrFoundCount = kekezu::get_table_data ( " sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count,fina_action ", "witkey_finance", " uid=".$arrSellerInfo['uid']." and fina_action in ('pub_task','task_bid','buy_service','sale_service','sale_gy') ", "", " fina_action ", "", "fina_action" );
	$arrFoundCount['task'] = number_format($arrFoundCount['task_bid']['cash'],2);
	$arrFoundCount['goods'] = number_format($arrFoundCount['sale_service']['cash']+$arrFoundCount['sale_gy']['cash'],2);
	foreach ($arrSellerMark as $k=>$v) {
		$arrSellerMark[$k]['star'] =intval($v['avg']);
	}
}else{
	$arrBuyerLevel = unserialize ( $arrSellerInfo ['buyer_level'] );
	$arrBuyerLevel['next'] = intval($arrBuyerLevel['value'] + $arrBuyerLevel['level_up']);
	if($arrBuyerLevel['next']){
		$arrBuyerLevel['rate'] =intval(($arrBuyerLevel['value']/$arrBuyerLevel['next'])*100 );
	}else{
		$arrBuyerLevel['rate'] = 0;
	}
	$arrBuyerMark = keke_user_mark_class::get_user_aid ( $arrSellerInfo['uid'], 1, null,1 );
	$arrFoundCount = kekezu::get_table_data ( " sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count,fina_action ", "witkey_finance", " uid=".$arrSellerInfo['uid']." and fina_action in ('pub_task','task_bid','buy_service','sale_service','buy_gy') ", "", " fina_action ", "", "fina_action" );
	$arrFoundCount['task'] = number_format($arrFoundCount['pub_task']['cash'],2);
	$arrFoundCount['goods'] = number_format($arrFoundCount['buy_service']['cash']+$arrFoundCount['buy_gy']['cash'],2);
	foreach ($arrBuyerMark as $k=>$v) {
		$arrBuyerMark[$k]['star'] =intval($v['avg']);
	}
}
$objTaskT = keke_table_class::get_instance ( 'witkey_mark' );
$strWhere .= '  uid='.intval($arrSellerInfo['uid']).' and mark_status > 0  and mark_type = '.intval($type);
$page and $intPage = intval ( $page );
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
$strWhere .= "  order by mark_time desc";
$arrDatas = $objTaskT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
$arrMarkLists = $arrDatas ['data'];
$strPages = $arrDatas ['pages'];
foreach ($arrMarkLists as $k=>$v) {
	if(in_array($v['model_code'],array('goods','service'))){
		if(intval($v['origin_id'])){
			$arrInfo =db_factory::get_one(sprintf('select title from %s where service_id = %d',TABLEPRE.'witkey_service',intval($v['origin_id'])));
			$arrMarkLists[$k]['title'] =$arrInfo['title'];
			$arrMarkLists[$k]['model'] ='商品';
			$arrMarkLists[$k]['url'] = 'index.php?do=goods&id='.intval($v['origin_id']);
		}else{
			$arrInfo =db_factory::get_one(sprintf('select title from %s where order_id = %d',TABLEPRE.'witkey_service_order',intval($v['obj_id'])));
			$arrMarkLists[$k]['title'] =$arrInfo['title'];
			$arrMarkLists[$k]['model'] ='雇佣';
			$arrMarkLists[$k]['url'] = "javascript:void(0);";
		}
		$arrMarkLists[$k]['star'] = explode(',', $v['aid_star']);
		$arrMarkLists[$k]['star'][0] = intval($arrMarkLists[$k]['star'][0]);
		$arrMarkLists[$k]['star'][1] = intval($arrMarkLists[$k]['star'][1]);
		$arrMarkLists[$k]['star'][2] = intval($arrMarkLists[$k]['star'][2]);
	}else{
		$arrInfo =db_factory::get_one(sprintf('select task_title from %s where task_id = %d',TABLEPRE.'witkey_task',intval($v['origin_id'])));
		$arrMarkLists[$k]['title'] =$arrInfo['task_title'];
		$arrMarkLists[$k]['model'] ='任务';
		$arrMarkLists[$k]['url'] = 'index.php?do=task&id='.intval($v['origin_id']);
		$arrMarkLists[$k]['star'] = explode(',', $v['aid_star']);
		$arrMarkLists[$k]['star'][0] = intval($arrMarkLists[$k]['star'][0]);
		$arrMarkLists[$k]['star'][1] = intval($arrMarkLists[$k]['star'][1]);
		$arrMarkLists[$k]['star'][2] = intval($arrMarkLists[$k]['star'][2]);
	}
}
