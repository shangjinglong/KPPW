<?php
$strNavActive = 'sellerlist';
$strUrl = "index.php?do=sellerlist";
$intPage and $strUrl .="&intPage=".intval($intPage);
$o and $strUrl .="&o=".strval($o);
$t and $strUrl .="&t=".intval($t);
$i and $strUrl .="&i=".intval($i);
$c and $strUrl .="&c=".intval($c);
$p and $strUrl .="&p=".intval($p);
$b and $strUrl .="&b=".intval($b);
$r and $strUrl .="&r=".intval($r);
$ky and $strUrl .="&ky=".$ky;
$i and $arrIndusInfo = kekezu::get_indus_info($i);
$arrModelLabel = array(	0 =>'未知',1=>'单人',	2=>'多人',	3=>'计件',	4=>'招标',	5=>'订金',	6=>'文件',	7=>'服务');
$strPageTitle = $kekezu->_sys_config['seller_seo_title'];
$strPageKeyword = $kekezu->_sys_config['seller_seo_keyword'];
$strPageDescription = $kekezu->_sys_config['seller_seo_desc'];
if (isset ( $ky )) {
	$ky = htmlspecialchars ( $ky );
	$ky = kekezu::escape ( $ky );
}
$arrCashCoves = TaskClass::getTaskCashCove();
$arrIndusAll = $kekezu->_indus_arr;
$page and $intPage = intval($page);
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
$strSql = "select a.*,b.user_type,b.seller_level,b.skill_ids,b.city,b.province,b.indus_id,b.indus_pid,b.seller_total_num,b.seller_good_num,b.seller_level,
		if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate ,sum(if((d.fina_action='task_bid' or d.fina_action='sale_service'),fina_cash,0)) as  totalcash
		from " . TABLEPRE . "witkey_shop as a left join ".TABLEPRE."witkey_space b
		on a.uid = b.uid left join ".TABLEPRE."witkey_auth_record c on a.uid=c.uid left join ".TABLEPRE."witkey_finance d on a.uid=d.uid   where ";
$strWhere = " 1=1 and a.on_sale >0  and b.user_type > 0";
if (intval ( $i )) {
	$strWhere .= " and b.indus_id = ".intval($i);
}
if (intval ( $t )) {
	$strWhere .= " and b.user_type = ".intval($t);
}
if (intval ( $p )) {
	$strWhere .= " and b.province = ".intval($p);
}
if (intval ( $c )) {
	$strWhere .= " and b.city = ".intval($c);
}
$ky and $strWhere .= " and b.username like '%$ky%' ";
if (intval($r)) {
	$strWhere .= " and (c.auth_code='enterprise'  or c.auth_code='realname') and c.auth_status=1 ";
}
if (intval($b)) {
	$strWhere .= " and (d.fina_action ='task_bid' or d.fina_action='sale_service') and  DATE_SUB(CURDATE(),INTERVAL 90 day) <= date(from_unixtime(d.fina_time)) ";
}
$strWhere .= " group by a.uid ";
if(isset($o)){
	switch(intval($o)){
		case '1':
			$strWhere .=" order by b.seller_credit desc ";
			break;
		case '2':
			$strWhere .=" order by b.seller_credit asc ";
			break;
		case '3':
			$strWhere .=" order by if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) desc ";
			break;
		case '4':
			$strWhere .=" order by if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0)  asc";
			break;
		case '5':
			$strWhere .=" order by totalcash  desc";
			break;
		case '6':
			$strWhere .=" order by totalcash asc ";
			break;
	}
}else{
	$strWhere .= " order by b.seller_credit desc,b.recommend desc,a.shop_id desc ";
}
$arrCityInfo =  CommonClass::getDistrictById($p);
$intCount = db_factory::execute($strSql . $strWhere );
$strPages = $kekezu->_page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl );
$strWhere .= $strPages ['where'];
$arrSellerLists = db_factory::query ( $strSql . $strWhere );
if(is_array($arrSellerLists)){
	$arrNerLists = array();
   foreach($arrSellerLists as $k=>$v){
   	$arrService = db_factory::query("select * from ".TABLEPRE."witkey_service where service_status=2 and uid=".intval($v['uid'])." order by sale_num desc limit 0,3");
   	$arrNerLists[$k] = $v;
   	$arrNerLists[$k]['service'] = $arrService;
   	if(is_array($arrNerLists[$k]['service'])){
   		foreach ($arrNerLists[$k]['service'] as $kk=>$vv) {
   			$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "service"',TABLEPRE.'witkey_favorite',intval($gUid),intval($vv['service_id'])));
   			if($arrFavorite){
   				$arrNerLists[$k]['service'][$kk]['favorite'] = true;
   			}
   			unset($arrFollow);
   		}
   	}
   	unset($arrService);
	$arrFollow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($gUid),intval($v['uid'])));
	if($arrFollow){
		$arrNerLists[$k]['follow'] = true;
	}
   	unset($arrFollow);
   }
}
if($arrNerLists){
	foreach ($arrNerLists as $k=>$v) {
		if($v['province'] && $v['city']){
			$proInfo = CommonClass::getDistrictById($v['province']);
			$cityInfo = CommonClass::getDistrictById($v['city']);
			$arrNerLists[$k]['pro_city'] = $proInfo['name'].' '.$cityInfo['name'];
		}
	}
}
$arrShopIndusC = $kekezu->_indus_c_arr;
$arrShopIndusP = $kekezu->_indus_p_arr;
if(is_array($arrShopIndusC)){
	$arrNewShopIndusC = array();
	foreach($arrShopIndusC as $k=>$v){
		$arrNewShopIndusC[$v['indus_pid']][] = $v;
	}
}
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
$floatCashLists = kekezu::get_table_data(' uid,sum(fina_cash) as threeCash','witkey_finance',"(fina_action='sale_service' or fina_action='task_bid') and DATE_SUB(CURDATE(),INTERVAL 90 day) <= date(from_unixtime(fina_time))",'','uid','','uid');
function thisurl($keys=''){
	$pars = parse_url($_SERVER["QUERY_STRING"]);
	$pars = explode("&",$pars['path']);
	foreach($pars as $ps){
		$uri = explode("=",$ps);
		$url .= !strstr($keys,$uri[0]) ? "&".$ps : '';
	}
	return $_SERVER['PHP_SELF'].'?'.trim($url,"&");
}
$arrFeedPubs = kekezu::get_feed("(feedtype='pub_task' or feedtype='pub_service')", "feed_time desc", 8 );
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$_SESSION['spread'] = 'index.php?do=sellerlist';