<?php
$strUrl = 'index.php?do=seller&id='.$id;
$arrView = array('goods','task','case','mark');
if(false === in_array($view,$arrView)){
	$view ='goods';
}
$arrSellerInfo = db_factory::get_one(sprintf('select * from %s a left join %s b on a.uid = b.uid where a.uid =%s',TABLEPRE.'witkey_space',TABLEPRE.'witkey_shop',intval($id)));
$arrSellerInfo or kekezu::show_msg(kekezu::lang("operate_notice"),"index.php?do=sellerlist",2,"对不起，您访问的页面没找到！","warning");
if($arrSellerInfo['shop_backstyle']){
	$arrBackgroudStyle = unserialize($arrSellerInfo['shop_backstyle']);
}
if($arrSellerInfo['skill_ids']){
	$arrSkill = explode(',', $arrSellerInfo['skill_ids']);
}
$arrProvinces = CommonClass::getDistrictByPid('0','id,upid,name');
if($arrSellerInfo['province']){
	$arrProvince = CommonClass::getDistrictById($arrSellerInfo['province'],'name');
}
if($arrSellerInfo['city']){
	$arrCity = CommonClass::getDistrictById($arrSellerInfo['city'],'id,upid,name');
}
if($arrSellerInfo['seo_title']){
	$strPageTitle = $arrSellerInfo['seo_title'];
}else{
	$strPageTitle = $arrSellerInfo['shop_name'].'-'.$arrSellerInfo['username'].'-'.$_K['html_title'];
}
if($arrSellerInfo['seo_keyword']){
	$strPageKeyword = $arrSellerInfo['seo_keyword'];
}else{
	$strPageKeyword = $arrSkill;
}
if($arrSellerInfo['seo_desc']){
	$strPageDescription = $arrSellerInfo['seo_desc'];
}else{
	$strPageDescription = $strPageDescription = kekezu::cutstr($arrSellerInfo['shop_slogans'],100);
}
$incomeCash = db_factory::query(sprintf('SELECT sum(fina_cash) as cash FROM `'.TABLEPRE.'witkey_finance` where to_days( NOW( ) ) - to_days( FROM_UNIXTIME( fina_time ) ) <=90  and fina_type="in" and (fina_action="sale_service" or fina_action="task_bid" or fina_action="sale_gy") and uid = %s',$arrSellerInfo['uid']));
$incomeCash = number_format($incomeCash[0][cash],2);
$arrAuthItems = keke_auth_base_class::get_auth_item (NULL,NULL,1);
$arrSellerInfo ['user_type'] == 2 and $strUncode = 'realname' or $strUncode = "enterprise";
$arrAuthInfos = keke_auth_fac_class::get_submit_auth_record ( $arrSellerInfo['uid'], 1 );
$arrAuthInfos = kekezu::get_arr_by_key ( $arrAuthInfos, "auth_code" );
$arrSellerLevel = unserialize($arrSellerInfo['seller_level']);
$arrSellerMark	    = keke_user_mark_class::get_user_aid ( $arrSellerInfo['uid'], '2', null, '1' );
foreach ($arrSellerMark as $k=>$v) {
	$arrSellerMark[$k]['star'] =intval($v['avg']);
}
$arrFollow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($gUid),intval($arrSellerInfo['uid'])));
if($arrFollow){
	$arrSellerInfo['follow'] = 1;
}else{
	$arrSellerInfo['follow'] = 0;
}
unset($arrFollow);
$intGoodsCount =db_factory::get_count(sprintf('select count(*) from %s where uid = %d and service_status = 2 ',TABLEPRE.'witkey_service ',$arrSellerInfo['uid']));
$intTaskCount = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and task_status >1',TABLEPRE.'witkey_task',$arrSellerInfo['uid']));
$intCaseCount = db_factory::get_count(sprintf('select count(*) from %s where shop_id = %d ',TABLEPRE.'witkey_shop_case',$arrSellerInfo['shop_id']));
$_SESSION['spread'] = 'index.php?do=seller&id='.intval($id);
require $do.'/'.$view.'.php';
require  $kekezu->_tpl_obj->template($do.'/'.$view);die();