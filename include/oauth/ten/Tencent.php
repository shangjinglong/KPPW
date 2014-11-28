<?php
class OAuth
{
	public static $client_id = '';
	public static $client_secret = '';
	private static $accessTokenURL = 'https://open.t.qq.com/cgi-bin/oauth2/access_token';
	private static $authorizeURL = 'https://open.t.qq.com/cgi-bin/oauth2/authorize';
	public static function init($client_id, $client_secret)
	{
		if (!$client_id || !$client_secret) exit('client_id or client_secret is null');
		self::$client_id = $client_id;
		self::$client_secret = $client_secret;
	}
	public static function getAuthorizeURL($redirect_uri, $response_type = 'code', $wap = false)
	{
		$params = array(
				'client_id' => self::$client_id,
				'redirect_uri' => $redirect_uri,
				'response_type' => $response_type,
				'wap' => $type
		);
		return self::$authorizeURL.'?'.http_build_query($params);
	}
	public static function getAccessToken($code, $redirect_uri)
	{
		$params = array(
				'client_id' => self::$client_id,
				'client_secret' => self::$client_secret,
				'grant_type' => 'authorization_code',
				'code' => $code,
				'redirect_uri' => $redirect_uri
		);
		return self::$accessTokenURL.'?'.http_build_query($params);
	}
	public static function refreshToken()
	{
		$params = array(
				'client_id' => self::$client_id,
				'client_secret' => self::$client_secret,
				'grant_type' => 'refresh_token',
				'refresh_token' => $_SESSION['t_refresh_token']
		);
		$url = self::$accessTokenURL.'?'.http_build_query($params);
		$r = Http::request($url);
		parse_str($r, $out);
		if ($out['access_token']) {
			$_SESSION['t_access_token'] = $out['access_token'];
			$_SESSION['t_refresh_token'] = $out['refresh_token'];
			$_SESSION['t_expire_in'] = $out['expires_in'];
			return $out;
		} else {
			return $r;
		}
	}
	public static function checkOAuthValid()
	{
		$r = json_decode(Tencent::api('user/info'), true);
		if ($r['data']['name']) {
			return true;
		} else {
			self::clearOAuthInfo();
			return false;
		}
	}
	public static function clearOAuthInfo()
	{
		if (isset($_SESSION['t_access_token'])) unset($_SESSION['t_access_token']);
		if (isset($_SESSION['t_expire_in'])) unset($_SESSION['t_expire_in']);
		if (isset($_SESSION['t_code'])) unset($_SESSION['t_code']);
		if (isset($_SESSION['t_openid'])) unset($_SESSION['t_openid']);
		if (isset($_SESSION['t_openkey'])) unset($_SESSION['t_openkey']);
		if (isset($_SESSION['t_oauth_version'])) unset($_SESSION['t_oauth_version']);
	}
}
class Tencent
{
	public static $apiUrlHttp = 'http://open.t.qq.com/api/';
	public static $apiUrlHttps = 'https://open.t.qq.com/api/';
	public static $debug = false;
	public static function api($command, $params = array(), $method = 'GET', $multi = false)
	{
		if (isset($_SESSION['t_access_token'])) {
			$params['access_token'] = $_SESSION['t_access_token'];
			$params['oauth_consumer_key'] = OAuth::$client_id;
			$params['openid'] = $_SESSION['t_openid'];
			$params['oauth_version'] = '2.a';
			$params['clientip'] = Common::getClientIp();
			$params['scope'] = 'all';
			$params['appfrom'] = 'php-sdk2.0beta';
			$params['seqid'] = time();
			$params['serverip'] = $_SERVER['SERVER_ADDR'];
			$url = self::$apiUrlHttps.trim($command, '/');
		} elseif (isset($_SESSION['t_openid']) && isset($_SESSION['t_openkey'])) {
			$params['appid'] = OAuth::$client_id;
			$params['openid'] = $_SESSION['t_openid'];
			$params['openkey'] = $_SESSION['t_openkey'];
			$params['clientip'] = Common::getClientIp();
			$params['reqtime'] = time();
			$params['wbversion'] = '1';
			$params['pf'] = 'php-sdk2.0beta';
			$url = self::$apiUrlHttp.trim($command, '/');
			$urls = @parse_url($url);
			$sig = SnsSign::makeSig($method, $urls['path'], $params, OAuth::$client_secret.'&');
			$params['sig'] = $sig;
		}
		$r = Http::request($url, $params, $method, $multi);
		$r = preg_replace('/[^\x20-\xff]*/', "", $r); 
		$r = iconv("utf-8", "utf-8//ignore", $r); 
		if (self::$debug) {
			echo '<pre>';
			echo '接口：'.$url;
			echo '<br>请求参数：<br>';
			print_r($params);
			echo '返回结果：'.$r;
			echo '</pre>';
		}
		return $r;
	}
}
class Http
{
	public static function request( $url , $params = array(), $method = 'GET' , $multi = false, $extheaders = array())
	{
		if(!function_exists('curl_init')) exit('Need to open the curl extension');
		$method = strtoupper($method);
		$ci = curl_init();
		curl_setopt($ci, CURLOPT_USERAGENT, 'PHP-SDK OAuth2.0');
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 3);
		$timeout = $multi?30:3;
		curl_setopt($ci, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ci, CURLOPT_HEADER, false);
		$headers = (array)$extheaders;
		switch ($method)
		{
			case 'POST':
				curl_setopt($ci, CURLOPT_POST, TRUE);
				if (!empty($params))
				{
					if($multi)
					{
						foreach($multi as $key => $file)
						{
							$params[$key] = '@' . $file;
						}
						curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
						$headers[] = 'Expect: ';
					}
					else
					{
						curl_setopt($ci, CURLOPT_POSTFIELDS, http_build_query($params));
					}
				}
				break;
			case 'DELETE':
			case 'GET':
				$method == 'DELETE' && curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
				if (!empty($params))
				{
					$url = $url . (strpos($url, '?') ? '&' : '?')
					. (is_array($params) ? http_build_query($params) : $params);
				}
				break;
		}
		curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );
		curl_setopt($ci, CURLOPT_URL, $url);
		if($headers)
		{
			curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
		}
		$response = curl_exec($ci);
		curl_close ($ci);
		return $response;
	}
}
class Common
{
	public static function getClientIp()
	{
		if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
			$ip = getenv ( "HTTP_CLIENT_IP" );
		else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
			$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
		else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
			$ip = getenv ( "REMOTE_ADDR" );
		else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
			$ip = $_SERVER ['REMOTE_ADDR'];
		else
			$ip = "unknown";
		return ($ip);
	}
}
class SnsSign
{
	public static function makeSig($method, $url_path, $params, $secret)
	{
		$mk = self::makeSource ( $method, $url_path, $params );
		$my_sign = hash_hmac ( "sha1", $mk, strtr ( $secret, '-_', '+/' ), true );
		$my_sign = base64_encode ( $my_sign );
		return $my_sign;
	}
	private static function makeSource($method, $url_path, $params)
	{
		ksort ( $params );
		$strs = strtoupper($method) . '&' . rawurlencode ( $url_path ) . '&';
		$str = "";
		foreach ( $params as $key => $val ) {
			$str .= "$key=$val&";
		}
		$strc = substr ( $str, 0, strlen ( $str ) - 1 );
		return $strs . rawurlencode ( $strc );
	}
}