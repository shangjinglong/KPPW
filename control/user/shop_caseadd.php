<?php
$strUrl = 'index.php?do=user&view=shop&op=caseadd';
$shopInfo=db_factory::get_one(sprintf(" select * from %switkey_shop where uid='%d' ",TABLEPRE,$gUid));
$objCaseT = keke_table_class::get_instance('witkey_shop_case');
if($objId){
	$caseInfo =db_factory::get_one(sprintf(" select * from %switkey_shop_case where case_id='%d' ",TABLEPRE,intval($objId)));
}
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	if (strtoupper ( CHARSET ) == 'GBK') {
		$case_name = kekezu::utftogbk($case_name );
		$case_desc = kekezu::utftogbk($case_desc );
	}
	$arrData = array(
			'shop_id'=>$shopInfo['shop_id'],
			'case_name'	=>$case_name,
			'case_url'	=>$case_url,
			'case_pic'	=>$case_pic,
			'case_desc'		=>$case_desc,
			'on_time'	=>time(),
	);
	if($objId){
		$intRes = $objCaseT->save($arrData,array('case_id'=>intval($objId)));
	}else{
		$intRes = $objCaseT->save($arrData);
	}
	unset($objCaseT);
	kekezu::show_msg('已保存','index.php?do=user&view=shop&op=caselist',NULL,NULL,'ok');
}
