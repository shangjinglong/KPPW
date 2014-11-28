<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$uid and header ( "location:index.php" );
$strPageTitle = '登录-'.$_K ['html_title'];
$strPageKeyword = '登录,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$arrOpenApiArr = $kekezu->_api_open;
$arrApiNames = keke_glob_class::get_open_api();
$inter = $kekezu->_sys_config ['user_intergration'];
$intLoginTimes = intval($_SESSION['login_times']);
if (kekezu::submitcheck(isset($formhash))|| isset($login_type) ==3) {
	if($code){
		$strCodeCheck = kekezu::check_secode ( $code );
		if ($strCodeCheck!=1) {
			$tips['errors']['code'] = $strCodeCheck;
			kekezu::show_msg ($tips, NULL, NULL, NULL, 'error' );
		}
	}
	 isset($hdn_refer) and $_K['refer'] = $hdn_refer;
	 isset($_COOKIE['kekeloginrefer']) and $_K['refer'] =  $_COOKIE['kekeloginrefer'];
	 $refer_do = array('do'=>null);
	 $refer = parse_url($_K['refer']);
	 isset($refer['query']) and parse_str($refer['query'],$refer_do);
	 !$refer_do['do']&&$do='logout' and $refer_do['do']='logout';
	 in_array($refer_do['do'],array('logout','register','login','activating')) and  $_K['refer'] = 'index.php' or $_K['refer'] =$_K['refer'];
	 $strCode = isset($code)?$code:"";
	 $intLoginType = isset($login_type)?$login_type:"";
	 $ckb_cookie = isset($ckb_cookie)?$ckb_cookie:"";
	 if (strtoupper ( CHARSET ) == 'GBK') {
	 	$account = kekezu::utftogbk( $account );
	 }
	$account = kekezu::escape($account);
	$objLogin = new keke_user_login_class();
 	$arrUserInfo = $objLogin->user_login($account, kekezu::escape($password),$strCode,$intLogin_type);
	$objLogin->save_user_info($arrUserInfo,$account, $ckb_cookie,$intLoginType,intval($autoLogin));
	die();
}
$_SESSION['spread'] = 'index.php?do=login';