<?php
class UserCenter {
	public static function getIndusById($intIndusId){
		return db_factory::get_table_data('*','witkey_industry',' indus_pid = '.intval($intIndusId),'CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END','','','indus_id',3600);
	}
	public static function bindingAccount($uid,$username,$arrSaveinfo){
		$returnValue = FALSE;
		$strSql = "select count(id) from ".TABLEPRE."witkey_member_oauth
				where source ='".$arrSaveinfo['type']."' and oauth_id='{$arrSaveinfo['account']}' and uid=".$uid;
		$isBind = db_factory::get_count($strSql);
		if(!$isBind){
			$objMemberOauth = new Keke_witkey_member_oauth_class();
			$objMemberOauth->setAccount($arrSaveinfo['nickname']);
			$objMemberOauth->setOauth_id($arrSaveinfo['account']);
			$objMemberOauth->setSource($arrSaveinfo['type']);
			$objMemberOauth->setUid($uid);
			$objMemberOauth->setUsername($username);
			$objMemberOauth->setOn_time(time());
			$intRes = $objMemberOauth->create_keke_witkey_member_oauth() ;
			unset($objMemberOauth);
			$intRes and $returnValue = TRUE or $returnValue = FALSE;
		}
		return $returnValue;
	}
	public static function getUnique($param) {
		if ($param ['figureurl']) {
			$path = parse_url ( $param ['figureurl'] );
			if ($path ['path']) {
				$unique = explode ( '/', $path ['path'] );
				if (! empty ( $unique )) {
					return $unique [3];
				}
			}
		}
		if ($param ['figureurl_1']) {
			$path = parse_url ( $param ['figureurl_1'] );
			if ($path ['path']) {
				$unique = explode ( '/', $path ['path'] );
				if (! empty ( $unique )) {
					return $unique [3];
				}
			}
		}
		if ($param ['figureurl_2']) {
			$path = parse_url ( $param ['figureurl_2'] );
			if ($path ['path']) {
				$unique = explode ( '/', $path ['path'] );
				if (! empty ( $unique )) {
					return $unique [3];
				}
			}
		}
		if ($param ['figureurl_qq_1']) {
			$path = parse_url ( $param ['figureurl_qq_1'] );
			if ($path ['path']) {
				$unique = explode ( '/', $path ['path'] );
				if (! empty ( $unique )) {
					return $unique [3];
				}
			}
		}
		if ($param ['figureurl_qq_1']) {
			$path = parse_url ( $param ['figureurl_qq_1'] );
			if ($path ['path']) {
				$unique = explode ( '/', $path ['path'] );
				if (! empty ( $unique )) {
					return $unique [3];
				}
			}
		}
		return false;
	}
	public static function getOauthType(){
		return array('sina'=>'新浪微博','qq'=>'QQ登陆','ten'=>'腾讯微博','renren'=>'人人网','douban'=>'豆瓣网');
	}
	public static function oauthRoute($type){
		global $kekezu,$weibo_list;
		require S_ROOT . "include/oauth/config.php";
		if ($type === 'sina') {
			require S_ROOT . "include/oauth/sina/saetv2.ex.class.php";
			$o = new SaeTOAuthV2 ( WB_AKEY, WB_SKEY );
			$code_url = $o->getAuthorizeURL ( WB_CALLBACK_URL );
		}
		if ($type === 'qq') {
			require S_ROOT . "include/oauth/qq/qqConnectAPI.php";
			$qqConnectAPI = new QC ();
			$qqConnectAPI->qq_login ();
			die ();
		}
		if ($type === 'ten') {
			require S_ROOT . "include/oauth/ten/Tencent.php";
			OAuth::init(TEN_AKEY, TEN_SKEY);
			Tencent::$debug = false;
			$code_url = OAuth::getAuthorizeURL(TEN_CALLBACK_URL);;
		}
		if ($type === 'renren') {
			require S_ROOT . "include/oauth/renren/rennclient/RennClient.php";
			$rennClient = new RennClient ( APP_KEY, APP_SECRET );
			$state = uniqid ( 'renren_', true );
			$_SESSION ['renren_state'] = $state;
			$code_url = $rennClient->getAuthorizeURL ( CALLBACK_URL, 'code', $state );
		}
		if ($type === 'douban') {
			require S_ROOT . 'include/oauth/douban/douban.php';
			$douBan = new doubanPHP ( DB_APIKEY, DB_SECRET );
			$code_url = $douBan->login_url ( DB_CALLBACK_URL, DB_SCOPE );
		}
		header ( "location:" . $code_url );
	}
}