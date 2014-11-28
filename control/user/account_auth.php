<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$intUserRole = intval($gUserInfo['user_type']);
$footer_load = 1;
$identy_auth_info = kekezu::get_table_data ( 'auth_code,auth_status', 'witkey_auth_record', "uid=" . $gUid, '', '', '', 'auth_code' );
if($intUserRole === 2){
	$strCodeWh = " auth_code!='realname' ";
	$intAuthStatus = keke_auth_fac_class::auth_check ( 'enterprise', $gUid );
	if($intUserRole&&!$intAuthStatus){
		$intAuthStatus = 1;
	}
}else {
	$strCodeWh = " auth_code!='enterprise' ";
	$intAuthStatus = keke_auth_fac_class::auth_check ( 'realname', $gUid );
	if($intUserRole&&!$intAuthStatus){
		$intAuthStatus = 1;
	}
}
$arrAuthItems = keke_auth_base_class::get_auth_item ( null, null, 1 ,$strCodeWh);
$arrAllAuthItems = keke_auth_base_class::get_auth_item ( null, null, 1 ,null);
$keys = array_keys ( $arrAuthItems );
$arrAllowAuth = array('realname','enterprise','bank','mobile','email');
if ($code&&in_array($code,$arrAllowAuth)) {
	$code or $code = $keys ['0']; 
	$code or kekezu::show_msg ( $_lang ['param_error'], "index.php?do=auth", 3, '', 'warning' );
	$auth_class = "keke_auth_" . $code . "_class";
	$objAuth = new $auth_class ( $code ); 
	$auth_item = $arrAllAuthItems [$code]; 
	$auth_dir = $auth_item ['auth_dir']; 
	$arrAuthInfo = $objAuth->get_user_auth_info ( $gUid, 0, $intBankAid ); 
	require S_ROOT . "/auth/$code/control/index.php";
	require keke_tpl_class::template ( 'auth/' . $code . '/tpl/' . $_K ['template'] . '/'.$step );
	die;
} else {
	$real_pass = keke_auth_fac_class::auth_check ( 'enterprise', $gUid ) or $real_pass = keke_auth_fac_class::auth_check ( "realname", $gUid );
	$arrHasAuthItem = keke_auth_fac_class::get_auth ( $gUserInfo );
	$arrUserAuthInfo = $arrHasAuthItem ['info'];
}
