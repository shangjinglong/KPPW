<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$page_title=$_lang['login'].'- '.$_K['html_title'];
$uid and header ( "location:index.php" );
$strPageTitle = 'oauth登录-'.$_K ['html_title'];
$strPageKeyword = 'oauth登录,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$type = strval(trim($type));
$arrOauthType = UserCenter::getOauthType();
if(!$_SESSION[$type.'_oauthInfo']){
	if(in_array($type, array_keys($arrOauthType))){
		UserCenter::oauthRoute($type);
	}
	kekezu::show_msg ( '缺少参数', 'index.php?do=login', 3, NULL, 'warning' );
}
$arrOauthInfo = $_SESSION[$type.'_oauthInfo'];
if (strtoupper ( CHARSET ) == 'GBK') {
	$arrOauthInfo = kekezu::utftogbk($arrOauthInfo);
}
$objLogin = new keke_user_login_class();
$arrBindInfo = keke_register_class::is_oauth_bind ( $type, $arrOauthInfo ['account'] );
if ($_SESSION[$type.'_oauthInfo']&& $arrBindInfo) {
	$_SESSION[$type.'_oauthInfo'] = null;
	$arrUserInfo = kekezu::get_user_info ( $arrBindInfo ['uid'] );
	$loginUserInfo = $objLogin->oauth_user_login ( $arrUserInfo ['username'], $arrUserInfo ['password'], null, 1 );
	$objLogin->save_user_info ( $loginUserInfo, 1 );
}
$inter = $kekezu->_sys_config ['user_intergration'];
$intLoginTimes = intval($_SESSION['login_times']);
if (kekezu::submitcheck(isset($formhash))|| isset($login_type) ==3) {
	if($code){
		$strCodeCheck = kekezu::check_secode ( $code );
		if ($strCodeCheck!=1) {
			$tips['errors']['code'] = $strCodeCheck;
			kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
		}
	}
	 $strCode = isset($code)?$code:"";
	 $intLoginType = isset($login_type)?$login_type:"";
	 $ckb_cookie = isset($ckb_cookie)?$ckb_cookie:"";
	 if (strtoupper ( CHARSET ) == 'GBK') {
	 	$account = kekezu::utftogbk( $account );
	 }
 	$arrUserInfo = $objLogin->user_login($account, $password,$strCode,$intLoginType);
 	UserCenter::bindingAccount($arrUserInfo['uid'], $arrUserInfo['username'], $arrOauthInfo);
 	$_SESSION[$type.'_oauthInfo'] = null;
	$objLogin->save_user_info($arrUserInfo,$account, $ckb_cookie,$intLoginType,0,true);
	die();
}