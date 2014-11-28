<?php
$strNavActive = 'goodslist';
$strUrl = "index.php?do=goodslist";
$m and $strUrl .="&m=".intval($m);
$intPage and $strUrl .="&intPage=".intval($intPage);
$i and $strUrl .="&i=".intval($i);
$pd and $strUrl .="&pd=".intval($pd);
$o and $strUrl .="&o=".strval($o);
$p and $strUrl .="&p=".intval($p);
$ky and  $strUrl .="&ky=".$ky;
$arrCashCoves = TaskClass::getTaskCashCove();
$pd and $arrIndusPInfo = kekezu::get_indus_info($pd);
$i and $arrIndusInfo = kekezu::get_indus_info($i);
$arrCityInfo =  CommonClass::getDistrictById($p);
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
$arrItemConfig = PayitemClass::getPayitemConfig ( null, null, null, 'item_id' );
$arrIndusP = $kekezu->_indus_goods_arr;
$arrIndusC = $kekezu->get_classify_indus('shop','child');
if(is_array($arrIndusC)){
	$arrNewIndusC = array();
	foreach($arrIndusC as $k=>$v){
		$arrNewIndusC[$v['indus_pid']][] = $v;
	}
}
if (isset ( $ky )) {
	$ky = htmlspecialchars ( $ky );
	$ky = kekezu::escape ( $ky );
}
$arrPayitemConfig = keke_payitem_class::get_payitem_config ( null, null, null, 'item_id' );
$arrIndusAll = $kekezu->_indus_arr;
$arrModelLabel = array(	0 =>'未知',1=>'单人',	2=>'多人',	3=>'计件',	4=>'招标',	5=>'订金',	6=>'文件',	7=>'服务');
$page and $intPage = intval($page);
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 24;
$strSql = "select a.*,substring(payitem_time,instr(a.payitem_time,'top')+4+LENGTH('top'),10) as top_time
		   from " . TABLEPRE . "witkey_service as a where ";
$strWhere = " service_status=2 ";
if (intval ( $i )) {
	$strWhere .= " and a.indus_id = ".intval($i);
}
if (intval ( $pd )) {
	$strWhere .= " and a.indus_pid = ".intval($pd);
}
if (intval ( $m )) {
	$strWhere .= " and a.model_id = ".intval($m);
}
if (intval ( $p )) {
	$strWhere .= " and a.province = ".intval($p);
}
$ky and $strWhere .= " and a.title like '%$ky%' ";
$intCount = db_factory::execute ( $strSql . $strWhere );
if(isset($o)){
	switch(intval($o)){
		case '1':
			$strWhere .=" order by a.sale_num desc ";
			break;
		case '2':
			$strWhere .=" order by a.sale_num asc ";
			break;
		case '3':
			$strWhere .=" order by a.price desc ";
			break;
		case '4':
			$strWhere .=" order by a.price asc ";
			break;
	}
}else{
	$strWhere .= " order by a.goodstop desc, a.on_time desc ";
}
$strPages = $kekezu->_page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl );
$strWhere .= $strPages ['where'];
$arrServices = db_factory::query ( $strSql . $strWhere );
if(is_array($arrServices)){
	foreach ($arrServices as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "service"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['service_id'])));
		if($arrFavorite){
			$arrServices[$k]['favorite'] = true;
		}
		unset($arrFollow);
	}
}
$arrFeedPubs = kekezu::get_feed("(feedtype='pub_task' or feedtype='pub_service')", "feed_time desc", 8 );
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$strPageTitle = $kekezu->_sys_config['goods_seo_title'];
$strPageKeyword = $kekezu->_sys_config['goods_seo_keyword'];
$strPageDescription = $kekezu->_sys_config['goods_seo_desc'];
$_SESSION['spread'] = 'index.php?do=goodslist';