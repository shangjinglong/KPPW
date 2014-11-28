<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strNavActive = 'article';
intval($id) and $intId = intval($id);
$strSql  = "select a.* ,b.cat_name from %switkey_article as a left join %switkey_article_category as b  on a.art_cat_id = b.art_cat_id where a.cat_type = 'article' and a.art_id='%d'";
$arrArtInfo = db_factory::get_one(sprintf($strSql,TABLEPRE,TABLEPRE,$intId));
$arrArtInfo or kekezu::show_msg(kekezu::lang("operate_notice"),"index.php?do=articlelist",2,"对不起，您访问的页面没找到！","warning");
$arrBreadcrumbs = array(
		1=>array('url'=>'index.php?do=articlelist','name'=>'资讯中心'),
		2=>array('url'=>'index.php?do=articlelist&catid='.$arrArtInfo['art_cat_id'],'name'=>$arrArtInfo['cat_name']),
);
$arrArtKeyword = db_factory::query("select * from ".TABLEPRE."witkey_article_keyword where keyword_status=1");
if(is_array($arrArtKeyword)){
	foreach ($arrArtKeyword as $v){
		$arrArtInfo['content'] = str_replace($v['word'], "<a href='".$v['url']."' target='_blank'>".$v['word']."</a>", $arrArtInfo['content']);
		$intShowCount = substr_count($arrArtInfo['content'], $v['word']);
		if($intShowCount&&!$arrArtInfo['views']){
			db_factory::execute(sprintf("update %switkey_article_keyword set show_count = show_count +%d where keyword_id=%d",TABLEPRE,intval($intShowCount),$v['keyword_id']));
		}
	}
}
$strWhere = " and 1=1 ";
$intCatid and $strWhere .= " and  art_cat_id  = ".intval($arrArtInfo['art_cat_id']);
$arrArtUp = db_factory::get_one(sprintf("select  art_id ,art_cat_id,art_title  from %switkey_article  where cat_type = 'article' and  art_id<'%d'  %s order by art_id desc limit 0,1",TABLEPRE,$intId,$strWhere));
$arrArtDown = db_factory::get_one(sprintf("select art_id ,art_cat_id,art_title  from %switkey_article  where cat_type = 'article' and  art_id>'%d' %s order by art_id asc limit 0,1",TABLEPRE,$intId,$strWhere));
if(!$_COOKIE["article_".$intId]){
	$sqlplus = "update %switkey_article set views = views+1 where art_id = %d";
	db_factory::execute(sprintf($sqlplus,TABLEPRE,$intId));
}
setcookie("article_".$intId,"exist_".$intId,time()+3600*24, COOKIE_PATH, COOKIE_DOMAIN,NULL,TRUE );
if($arrArtInfo['seo_title']){
	$strPageTitle =  $arrArtInfo['seo_title'];
}else{
	$strPageTitle = $arrArtInfo['art_title'].'-'.$arrArtInfo['cat_name'].'- '.$_K['html_title'];
}
if($arrArtInfo['seo_keyword']){
	$strPageKeyword = $arrArtInfo['seo_keyword'];
}else{
	$strPageKeyword = $arrArtInfo['cat_name'];
}
if($arrArtInfo['seo_desc']){
	$strPageDescription = $arrArtInfo['seo_desc'];
}else{
	$strPageDescription =  kekezu::cutstr($arrArtInfo['content'],100);;
}
$arrHotNews = db_factory::query("select * from ".TABLEPRE."witkey_article where cat_type='article'  order by views desc limit 10");
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by  good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$_SESSION['spread'] = 'index.php?do=article&id='.intval($id);