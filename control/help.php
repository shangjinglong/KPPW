<?php
$arrSidesPrimary  = db_factory::get_table_data('*','witkey_article_category','cat_type = "help" and art_cat_pid = 100',' listorder asc ','','','art_cat_id',3600);
$arrSecondary     = db_factory::get_table_data('*','witkey_article_category','cat_type = "help"',' listorder asc ','','','art_cat_id',3600);
$arrLastsHelp = db_factory::query('SELECT `art_id`,`art_cat_id`,`art_title` FROM `'.TABLEPRE.'witkey_article` WHERE cat_type = "help" ORDER BY art_id desc LIMIT 0,5');
$arrCommonHelp = db_factory::query('SELECT `art_id`,`art_cat_id`,`art_title` FROM `'.TABLEPRE.'witkey_article` WHERE cat_type = "help" ORDER BY views desc LIMIT 0,5');
$arrHotSearch = array (
		'发布任务','认证','提现','充值','发布商品'
);
$id and $id = intval($id);
$Keyword =  strval(trim($word));
$strUrl ="index.php?do=help";
$id and $strUrl .="&id=".intval($id);
$intPage and $strUrl .="&intPage=".intval($intPage);
$intPagesize and $strUrl .="&intPagesize=".intval($intPagesize);
	$objArticleT = keke_table_class::get_instance('witkey_article');
	$strWhere .= " cat_type = 'help' ";
	$page and $intPage = intval($page);
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
	$id&&$id!='' and $strWhere .= " and art_cat_id=".intval($id);
	$Keyword and $strWhere .= " and ( art_title like '%".trim($Keyword)."%'  or content like '%".trim($Keyword)."%' )";
	$strWhere .= " order by art_id desc";
	$arrDatas = $objArticleT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null,null,null);
	$arrLists = $arrDatas ['data'];
	$intCount = $arrDatas ['count'];
	$strPages = $arrDatas ['pages'];
unset($objArticleT);
if($id){
	$arrHelpKerword = db_factory::get_one("select art_cat_pid from ".TABLEPRE.'witkey_article_category where art_cat_id = '.intval($id));
	$arrHelpKerword = db_factory::get_one("select seo_title, seo_keyword,seo_desc from ".TABLEPRE.'witkey_article_category where art_cat_id = '.intval($arrHelpKerword['art_cat_pid']));
}else{
	$arrHelpKerword = db_factory::get_one("select art_cat_pid from ".TABLEPRE.'witkey_article_category where art_cat_id = 100');
}
$strPageTitle = '帮助中心--'.$kekezu->_sys_config['website_name'].$arrHelpKerword['seo_title'];
$strPageKeyword = $kekezu->_sys_config['website_name'].'帮助中心,'.$arrHelpKerword['seo_keyword'];
$strPageDescription = $kekezu->_sys_config['website_name'].'帮助中心,'.$arrHelpKerword['seo_desc'];
$_SESSION['spread'] = 'index.php?do=help';