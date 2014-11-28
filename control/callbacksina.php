<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
include S_ROOT . "include/oauth/config.php";
include S_ROOT . "include/oauth/sina/saetv2.ex.class.php";
$o = new SaeTOAuthV2 ( WB_AKEY, WB_SKEY );
if (isset ( $_REQUEST ['code'] )) {
	$keys = array ();
	$keys ['code'] = $_REQUEST ['code'];
	$keys ['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken ( 'code', $keys );
	} catch ( OAuthException $e ) {
	}
}
if ($token) {
	$_SESSION ['token'] = $token;
	setcookie ( 'weibojs_' . $o->client_id, http_build_query ( $token ) );
	unset ( $o );
	$c = new SaeTClientV2 ( WB_AKEY, WB_SKEY, $_SESSION ['token'] ['access_token'] );
	$ms = $c->home_timeline (); 
	$uid_get = $c->get_uid ();
	$oauthInfo = $c->show_user_by_id ( $uid_get ['uid'] ); 
	if($oauthInfo['error']){
		exit($oauthInfo['error']);
	}
	unset ( $c ,$_SESSION ['token']);
	$saveInfo = array (
			'account' => intval ( $oauthInfo ['id'] ),
			'nickname' => $oauthInfo ['name'],
			'gender' => $oauthInfo ['gender'] === 'm' ? '男' : '女',
			'type' => 'sina'
	);
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
