<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$strUrl ="index.php?do=user&view=finance&op=details";
$intPagesize and $strUrl .="&intPagesize=".intval($intPagesize);
$intFinaId and $strUrl .= " &intFinaId=".intval($intFinaId);
$strFinaType and $strUrl .= "&strFinaType=".strval($strFinaType);
$strOrder and $strUrl .="&strOrder=".strval($strOrder) ;
$arrAction = keke_glob_class::get_finance_action ();
$arrOrd = array ('a.fina_id desc' =>'财务编号降序', 'a.fina_id asc' =>'财务编号升序', 'a.fina_time desc' =>'支付时间降序', 'a.fina_time asc' => '支付时间升序');
$page and $intPage = intval($page);
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
$strSql = ' select a.*,b.task_title,c.title from '.TABLEPRE.'witkey_finance a left join '
		.TABLEPRE.'witkey_task b on a.obj_id=b.task_id left join '.TABLEPRE
		.'witkey_service c on a.obj_id=c.service_id ';
$strWhere =" where a.uid=".intval($gUid)."  and a.fina_action not in ('withdraw','offline_recharge','offline_charge','online_charge','online_recharge','withdraw_fail')";
intval($intFinaId) and $strWhere .= " and a.fina_id = $intFinaId ";
$strFinaType and $strWhere .= " and a.fina_type = '$strFinaType' ";
$strOrder and $strWhere .= " order by $strOrder " or $strWhere .= " order by a.fina_id desc ";
$intCount = intval(db_factory::execute(sprintf($strSql.$strWhere,TABLEPRE)));
$strPages = $page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl, '#userCenter' );
$arrFinanceLists = db_factory::query($strSql.$strWhere.$strPages['where']);