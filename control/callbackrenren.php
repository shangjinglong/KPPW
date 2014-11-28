<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
require S_ROOT . "include/oauth/config.php";
require S_ROOT . "include/oauth/renren/rennclient/RennClient.php";
$rennClient = new RennClient ( APP_KEY, APP_SECRET );
if (isset ( $_REQUEST ['code'] )) {
	$keys = array ();
	$state = $_REQUEST ['state'];
	if (empty ( $state ) || $state !== $_SESSION ['renren_state']) {
		echo '非法请求！';
		exit ();
	}
	unset ( $_SESSION ['renren_state'] );
	$keys ['code'] = $_REQUEST ['code'];
	$keys ['redirect_uri'] = CALLBACK_URL;
	try {
		$token = $rennClient->getTokenFromTokenEndpoint ( 'code', $keys );
	} catch ( RennException $e ) {
		var_dump ( $e );
	}
}
if ($token) {
	$rennClient->authWithStoredToken ();
	$user_service = $rennClient->getUserService ();
	$oauthInfo = $user_service->getUserLogin ();
	$saveInfo = array (
			'account' => $oauthInfo ['id'],
			'nickname' => $oauthInfo ['name'],
			'gender' => '',
			'type' => 'renren'
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
