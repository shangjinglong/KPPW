<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=account&op=basic';
$arrTopIndustrys = $indus_p_arr;
$arrAllIndustrys = $indus_arr;
$objSpaceT = keke_table_class::get_instance('witkey_space');
$intUserRole = intval($gUserInfo['user_type']);
if($intUserRole === 2){
	$intAuthStatus = keke_auth_fac_class::auth_check ( 'enterprise', $gUid );
	$arrEnterPriseInfo = db_factory::get_one ( sprintf ( "select * from %switkey_auth_enterprise where uid='%d'", TABLEPRE, $gUid ) );
	if (isset($formhash)&&kekezu::submitcheck($formhash)) {
		if (strtoupper ( CHARSET ) == 'GBK') {
			$company = kekezu::utftogbk($company );
			$legal = kekezu::utftogbk($legal );
			$address = kekezu::utftogbk($address );
			$summary = kekezu::utftogbk($summary );
		}
		$arrData = array(
			'company'	=>$company,
			'licen_num'	=>$licen_num,
			'legal'		=>$legal,
			'staff_num'	=>$staff_num,
			'run_years'	=>$run_years,
			'url'		=>$url
		);
		$arrData['uid'] = $gUserInfo['uid'];
		$arrData['username'] = $gUserInfo['username'];
		$objAuthEnterpriseT = new keke_table_class ( 'witkey_auth_enterprise' );
		$objAuthEnterpriseT->save ( $arrData, array ('enterprise_auth_id' => $arrEnterPriseInfo ['enterprise_auth_id'] ) );
		unset($objAuthEnterpriseT);
		$arrData = array();
		$arrData = array(
			'indus_pid'	=>$indus_pid,
			'indus_id'	=>$indus_id,
			'address'	=>$address,
			'summary'	=>$summary
		);
		$objSpaceT->save($arrData,$pk);
		unset($objSpaceT);
		kekezu::show_msg('已保存',NULL,NULL,NULL,'ok');
	}
}else{
	$intAuthStatus = keke_auth_fac_class::auth_check ( "realname", $gUid );
	if (isset($formhash)&&kekezu::submitcheck($formhash)) {
		if (strtotime($birthday)>=strtotime(date('Y-m-d',time()))) {
			$tips['errors']['birthday'] = '出生日期不得大于或等于当前日期';
			kekezu::show_msg($tips,NULL,NULL,NULL,'error');
		}
		if (strtoupper ( CHARSET ) == 'GBK') {
			$truename = kekezu::utftogbk($truename );
		}
		$arrData = array(
				'indus_pid'	=>$indus_pid,
				'indus_id'	=>$indus_id,
				'truename'	=>$truename,
				'sex'		=>$sex,
				'birthday'	=>$birthday,
		);
		$objSpaceT->save($arrData,$pk);
		unset($objSpaceT);
		kekezu::show_msg('已保存',NULL,NULL,NULL,'ok');
	}
}
