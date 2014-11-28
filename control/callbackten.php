<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
require S_ROOT . "include/oauth/config.php";
require_once S_ROOT . 'include/oauth/ten/Tencent.php';
OAuth::init(TEN_AKEY, TEN_SKEY);
Tencent::$debug = false;
if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {
    echo '<pre><h3>已授权</h3>用户信息：<br>';
    $r = Tencent::api('user/info');
    print_r(json_decode($r, true));
    echo '</pre>';
} else {
    $callback = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    if ($_GET['code']) {
        $code = $_GET['code'];
        $openid = $_GET['openid'];
        $openkey = $_GET['openkey'];
        $url = OAuth::getAccessToken($code, $callback);
        $r = Http::request($url);
        parse_str($r, $out);
        if ($out['access_token']) {
            $_SESSION['t_access_token'] = $out['access_token'];
            $_SESSION['t_refresh_token'] = $out['refresh_token'];
            $_SESSION['t_expire_in'] = $out['expires_in'];
            $_SESSION['t_code'] = $code;
            $_SESSION['t_openid'] = $openid;
            $_SESSION['t_openkey'] = $openkey;
            $r = OAuth::checkOAuthValid();
            if ($r) {
                header('Location: ' . $callback);
            } else {
                exit('<h3>授权失败,请重试</h3>');
            }
        } else {
            exit($r);
        }
    } else {
        if ($_GET['openid'] && $_GET['openkey']){
            $_SESSION['t_openid'] = $_GET['openid'];
            $_SESSION['t_openkey'] = $_GET['openkey'];
            $r = OAuth::checkOAuthValid();
            if ($r) {
                header('Location: ' . $callback);
            } else {
                exit('<h3>授权失败,请重试</h3>');
            }
        }
    }
}
if (empty ( $oauthInfo )) {
	header('Location:index.php?do=user&view=account&op=binding');
}
$saveInfo = array (
		'account' => UserCenter::getUnique ( $oauthInfo ),
		'nickname' => $oauthInfo ['nickname'],
		'gender' => $oauthInfo ['gender'],
		'type' => 'ten'
);
if($isBind == 'bindAccount'){
	if(UserCenter::bindingAccount($gUid, $gUserInfo['username'], $saveInfo)){
		header('Location:index.php?do=user&view=account&op=binding');
	}else {
		header('Location:index.php?do=user&view=account&op=binding');
	}
}else{
	$_SESSION[$saveInfo['type'].'_oauthInfo'] = $saveInfo;
		header('Location:index.php?do=oauthlogin&type='.$saveInfo['type']);
}