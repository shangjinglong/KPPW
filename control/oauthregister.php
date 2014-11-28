<?php
/* 说明：
 * Enter description here ...
 * @file  newfile.php
 * @author yangjuan <1907169041@qq.com>
 * @time  2014-2-16 上午10:02:31
 * @copyright (c) 2007-2014 http://www.kekezu.com All rights reserved.
 */
$uid and header ( "location:index.php" );
$type = strval(trim($type));
$arrOauthType = UserCenter::getOauthType();
/**
 *seo优化
 */
$strPageTitle = 'oauth注册-'.$_K ['html_title'];
$strPageKeyword = 'oauth注册,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
if(!$_SESSION[$type.'_oauthInfo']){
	kekezu::show_msg ( '缺少参数', 'index.php?do=login', 3, NULL, 'warning' );
}
$arrOauthInfo =$_SESSION[$type.'_oauthInfo'];
if (strtoupper ( CHARSET ) == 'GBK') {
	$arrOauthInfo = kekezu::utftogbk($arrOauthInfo);
}

/**
 *登录类实例对象
 */
$objLogin = new keke_user_login_class();
$arrBindInfo = keke_register_class::is_oauth_bind ( $type, $arrOauthInfo ['account'] );
if ($_SESSION[$type.'_oauthInfo'] && $arrBindInfo) {
	//销毁session
	$_SESSION[$type.'_oauthInfo'] = null;
	$arrUserInfo = kekezu::get_user_info ( $arrBindInfo ['uid'] );
	$loginUserInfo = $objLogin->oauth_user_login ( $arrUserInfo ['username'], $arrUserInfo ['password'], null, 1 );
	$objLogin->save_user_info ( $loginUserInfo, 1 );
}

//初始化对象
$objReg = new keke_register_class();
$arrApiNames = keke_glob_class::get_open_api();

if (isset($formhash)&&kekezu::submitcheck($formhash)){

    /**
     * 先验证邮箱 */
	if (keke_user_class::user_checkemail ( $email )!=1) {
		$tips['errors']['email'] = '该email非法或已经被注册';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}

	if (strtoupper ( CHARSET ) == 'GBK') {
		$account = kekezu::utftogbk( $account );
	}

	/**
	 * 先验证用户名*/
	$strNameCheck =  keke_user_class::check_username ( $account );
	if ($strNameCheck!=1) {
		$tips['errors']['account'] = $strNameCheck;
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	/**
	 * 先验证验证码*/
	$strCodeCheck = kekezu::check_secode ( $code );
	if ($strCodeCheck!=1) {
		$tips['errors']['code'] = $strCodeCheck;
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	/**
	 *  验证协议*/
	if (intval($agree)==0) {
		$tips['errors']['agree'] = '请先同意注册协议';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}

	if(!$arrBindInfo){
		//用户注册
		$intRegUid = $objReg->user_register($account, $password, $email,$code,1,$password);
		$arrUserInfo = keke_user_class::get_user_info($intRegUid);
		//绑定
		UserCenter::bindingAccount($arrUserInfo['uid'], $arrUserInfo['username'], $arrOauthInfo);
		//销毁session
		$_SESSION[$type.'_oauthInfo'] = null;
		//用户登录
		$objReg->register_login($arrUserInfo);
	}

}


