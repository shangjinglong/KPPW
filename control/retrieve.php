<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$uid and header ( "location:index.php" );
$page_title='找回密码'.'- '.$_K['html_title'];
$arrStep = array ('step1', 'step2');
in_array ( $strStep, $arrStep ) or $strStep = 'step1';
$arrApiName = keke_glob_class::get_open_api();
$strUrl = $_K['siteurl'].'/index.php?do=retrieve&strStep=step1';
switch ($strStep) {
	case "step1" :
		if (kekezu::submitcheck ( $formhash )) {
			if(strtolower(CHARSET)=='gbk'){
				$account=kekezu::utftogbk($account);
			}
			$arrUserInfo = kekezu::get_user_info ( $account, true );
			if (! $arrUserInfo) {
				$tips ['errors'] ['account'] = '账号不存在';
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
			}
			if ($email && $arrUserInfo['email'] != trim($email)) {
				$tips ['errors'] ['email'] = '邮箱不存在';
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
			}
			if ($getPasswordCode) {
				$strCodeCheck = kekezu::check_secode ( $getPasswordCode );
				if ($strCodeCheck != 1) {
					$tips ['errors'] ['code'] = $strCodeCheck;
					kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
				}
			}
			kekezu::show_msg ( '', "index.php?do=retrieve&strStep=step2&account=$account", NULL, NULL, 'ok' );
		}
		break;
	case "step2" :
		if (kekezu::submitcheck ( $formhash )) {
			$strAccount = strval ( $account );
			$arrUserInfo = kekezu::get_user_info ( $strAccount, true );
			$arrPassInfo = reset_set_password ( $arrUserInfo );
			$arrNotifyArr = array (
					'用户名' => $arrUserInfo ['username'],
					'网站名称' => $kekezu->_sys_config ['website_name'],
					'密码' => $arrPassInfo ['code'],
					'安全码' => $arrPassInfo ['sec_code']
			);
			keke_shop_class::notify_user ( $arrUserInfo ['uid'], $arrUserInfo ['username'], 'get_password', '找回密码', $arrNotifyArr );
			kekezu::show_msg ( '您的新密码已发送到邮箱，请注意查收', $strUrl, NULL, NULL, 'ok' );
		} else {
			$arrUserInfo = kekezu::get_user_info ( $account, true );
			$arrEmailAuths = db_factory::query ( sprintf ( "select * from %switkey_auth_email where uid=%d and auth_status=1", TABLEPRE, $arrUserInfo ['uid'] ) );
			$arrEmailAuths and $strEmailInfo = $arrEmailAuths ['0'] ['email'];
			$strEmail = explode ( '@', $strEmailInfo );
			$intLeng = strlen ( $strEmail [0] );
			$i = intval ( $intLeng / 2 );
			$strRe = '*';
			$strRe = str_pad ( $strRe, $intLeng - $i, '*', STR_PAD_LEFT );
			$strEmail = substr_replace ( $strEmailInfo, $strRe, $i, $intLeng - $i );
           $strKfPhone = kekezu::get_rand_kf ();
		}
		break;
}
function reset_set_password($user_info){
	$code = kekezu::randomkeys(6);
	$user_code = md5($code);
	$slt = kekezu::randomkeys(6);
	$user_seccode = keke_user_class::get_password($code, $slt);
	$sql = "update %switkey_member set password = '%s' , rand_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$slt,$user_info['uid']);
	$res = db_factory::execute($sql);
	$sql = "update %switkey_space set  password = '%s' , sec_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$user_seccode,$user_info['uid']);
	db_factory::execute($sql);
	$pass_info ['code'] = $pass_info ['sec_code'] = $code;
	keke_user_class::user_edit ( $user_info['username'], '', $code, '',1);
	return $pass_info;
}
