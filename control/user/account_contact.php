<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=account&op=contact';
$objSpaceT = keke_table_class::get_instance('witkey_space');
$arrMemberExts = kekezu::get_table_data ( "*", "witkey_member_ext", " type='sect' and uid= ".$gUid, "", "", "", "k" );
$boolEmailAuth = keke_auth_fac_class::auth_check ( 'email', $gUid );
$boolMobileAuth = keke_auth_fac_class::auth_check ( 'mobile', $gUid );
$arrProvinces = CommonClass::getDistrictByPid('0','id,upid,name');
if($gUserInfo['city']){
$arrCity = CommonClass::getDistrictById($gUserInfo['city'],'id,upid,name');
}
if($gUserInfo['area']){
	$arrArea = CommonClass::getDistrictById($gUserInfo['area'],'id,upid,name');
}
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	$arrData =array(
		'email'	=>$email,
		'mobile'=>$mobile,
		'qq'	=>$qq,
		'msn'	=>$msn,
		'phone'	=>$phone,
		'province'=>$province,
		'city'=>$city,
		'area'=>$area
	);
	$intRes = $objSpaceT->save($arrData,$pk);
	if ($sect) {
		foreach ( $sect as $k => $v ) {
			if ($arrMemberExts [$k])
				db_factory::execute ( sprintf ( " update %switkey_member_ext set v1='%s' where k='%s' and uid='%d'", TABLEPRE, $v, $k, $gUid ) );
			else {
				$ext_obj = new Keke_witkey_member_ext_class ();
				$ext_obj->setK ( $k );
				$ext_obj->setV1 ( kekezu::escape ( $v ) );
				$ext_obj->setUid ( $gUid );
				$ext_obj->setType ( 'sect' );
				$ext_obj->create_keke_witkey_member_ext ();
			}
		}
	}
	unset($objSpaceT);
	kekezu::show_msg('已保存',NULL,NULL,NULL,'ok');
}
