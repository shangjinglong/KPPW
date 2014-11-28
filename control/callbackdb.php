<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
require S_ROOT . "include/oauth/config.php";
require S_ROOT . 'include/oauth/douban/douban.php';
if (isset ( $_GET ['code'] ) && $_GET ['code'] != '') {
	$douBan = new doubanPHP ( DB_APIKEY, DB_SECRET );
	$result = $douBan->access_token ( DB_CALLBACK_URL, $_GET ['code'] );
	unset ( $douBan );
}
if (isset ( $result ['access_token'] ) && $result ['access_token'] != '') {
	$douBan = new doubanPHP ( DB_APIKEY, DB_SECRET, $result ['access_token'] );
	$oauthInfo = $douBan->me ();
	$saveInfo = array (
			'account' => $oauthInfo ['id'],
			'nickname' => $oauthInfo ['name'],
			'gender' => '',
			'type' => 'douban'
	)
	;
	unset ( $douBan );
	if($gUid){
		if(UserCenter::bindingAccount($gUid, $gUserInfo['username'], $saveInfo)){
			header('Location:index.php?do=user&view=account&op=binding');
		}else {
			header('Location:index.php?do=user&view=account&op=binding');
		}
	}else{
		$_SESSION[$saveInfo['type'].'_oauthInfo'] = $saveInfo;
		header('Location:index.php?do=oauthlogin&type='.$saveInfo['type']);
	}
} else {
	header('Location:index.php?do=user&view=account&op=binding');
}