<?php
$strNavActive = 'tasklist';
$arrIndusP = $kekezu->_indus_task_arr;
$arrIndusC = $kekezu->get_classify_indus('task','child');
if(is_array($arrIndusC)){
	$arrNewIndusC = array();
	foreach($arrIndusC as $k=>$v){
		$arrNewIndusC[$v['indus_pid']][] = $v;
	}
}
$m = intval($m);
$i = intval($i);
$s = intval($s);
$r = intval($r);
$o = intval($o);
if (isset ( $ky )) {
	$ky = htmlspecialchars ( $ky );
	$ky = kekezu::escape ( $ky );
}
$page and $intPage = intval($page);
$strUrl ="index.php?do=tasklist";
$m and $strUrl .="&m=".$m;
$s and $strUrl .="&s=".$s;
$r and $strUrl .="&r=".$r;
$i and $strUrl .="&i=".$i;
$pd and $strUrl .="&pd=".$pd;
$o and $strUrl .="&o=".$o;
$p and $strUrl .="&p=".intval($p);
$ky and  $strUrl .="&ky=".$ky;
$intPage and $strUrl .="&intPage=".$intPage;
$intPagesize and $strUrl .="&intPagesize=".intval($intPagesize);
$arrTaskTimeDesc = keke_glob_class::get_taskstatus_desc ();
$arrPayitemConfig = PayitemClass::getPayitemConfig ( null, null, null, 'item_id' );
$pd and $arrIndusPInfo = kekezu::get_indus_info($pd);
$i and $arrIndusInfo = kekezu::get_indus_info($i);
$arrTaskNavs = TaskClass::getEnabledTaskModelList();
if($m){
	$arrTaskStatus = call_user_func ( array ($arrTaskNavs[$m]['model_code'] . "_task_class", "get_task_status" ) );;
}
$arrCashCoves = TaskClass::getTaskCashCove();
$arrModelLabel = array(	0 =>'未知',1=>'单人',	2=>'多人',	3=>'计件',	4=>'招标',	5=>'订金',	6=>'文件',	7=>'服务');
$arrCityInfo =  CommonClass::getDistrictById($p);
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
$objTaskT = keke_table_class::get_instance('witkey_task');
$strWhere  = " 1=1 ";
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 20;
$arrTaskModelIds = array_keys($arrTaskNavs);
in_array($m, $arrTaskModelIds) and $strWhere .= " and a.model_id = ".$m or $strWhere .= " and a.model_id in(".implode(',', $arrTaskModelIds).") ";
$i and $strWhere .= " and a.indus_id = ".$i;
$pd and $strWhere .= " and a.indus_pid = ".$pd;
switch ($r) {
	case 1:$strWhere .= " and a.model_id  = 4 ";break;
	case 2:$strWhere .= " and a.model_id != 4 ";break;
}
switch ($s) {
	case 1:$strWhere .= " and a.task_status=2 ";break;
	case 2:$strWhere .= " and a.task_status=3 ";break;
	case 3:$strWhere .= " and a.task_status=6 ";break;
	case 4:$strWhere .= " and a.task_status=8 ";break;
	default:$strWhere .= " and a.task_status not in(0,1,10) ";break;
}
if (intval ( $p )) {
	$strWhere .= " and a.province = ".intval($p);
}
$ky and $strWhere .= " and a.task_title like '%$ky%' ";
switch ($o) {
	case 1:  $strWhere .= " order by a.sub_time desc ";   	break;
	case 2:  $strWhere .= " order by a.sub_time asc ";	 	break;
	case 3:  $strWhere .= " order by a.task_cash desc ";	break;
	case 4:  $strWhere .= " order by a.task_cash asc "; 	break;
	case 5:  $strWhere .= " order by a.work_num desc ";   	break;
	case 6:  $strWhere .= " order by a.work_num asc ";	 	break;
	default: $strWhere .= " order by a.tasktop desc,a.task_id desc ";	 	break;
}
$strTaskSql = "select a.*,d.* from " . TABLEPRE . "witkey_task as a left join " . TABLEPRE . "witkey_task_cash_cove d on a.task_cash_coverage=d.cash_rule_id
		where ";
$intCount = db_factory::execute ( $strTaskSql . $strWhere );
$arrDatas = $page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl );
$arrTaskLists = db_factory::query ( $strTaskSql . $strWhere . $arrDatas ['where'] );
if(is_array($arrTaskLists)){
	foreach ($arrTaskLists as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "task"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['task_id'])));
		if($arrFavorite){
			$arrTaskLists[$k]['favorite'] = true;
		}
		unset($arrFollow);
	}
}
$strPages = $arrDatas ['page'];
$strPageTitle = $kekezu->_sys_config['task_seo_title'];
$strPageKeyword = $kekezu->_sys_config['task_seo_keyword'];
$strPageDescription = $kekezu->_sys_config['task_seo_desc'];
unset($objTaskT);
$arrFeedPubs = kekezu::get_feed("(feedtype='pub_task' or feedtype='pub_service')", "feed_time desc", 8 );
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$_SESSION['spread'] = 'index.php?do=tasklist';
