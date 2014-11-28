<?php
if (!function_exists('curl_init')) {
	throw new Exception('Renn PHP SDK needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
	throw new Exception('Renn PHP SDK needs the JSON PHP extension.');
}
class RennClientBase {
	const TOKEN_ENDPOINT = 'http://graph.renren.com/oauth/token';
	const AUTHORIZATION_ENDPOINT = 'http://graph.renren.com/oauth/authorize';
	const API_HOST = 'api.renren.com';
	const USERAGENT = 'Renn API2.0 SDK PHP v0.1';
	const TIMEOUT = 60;
	const CONNECTTIMEOUT = 30;
	public static $CURL_OPTS = array (
			CURLOPT_CONNECTTIMEOUT => self::CONNECTTIMEOUT,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => self::TIMEOUT,
			CURLOPT_USERAGENT => self::USERAGENT
	);
	protected $clientId;
	protected $clientSecret;
	protected $accessToken;
	protected $signatureMethodFactory;
	protected $tokenStore;
	public $debug = FALSE;
	function __construct($clientId, $clientSecret) {
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->signatureMethodFactory = new OAuth2SignatureMethodFactory ();
		$this->tokenStore = new CookieTokenStore ();
	}
	public function authWithAuthorizationCode($code, $redirectUri) {
		$keys = array ();
		$keys ['code'] = $code;
		$keys ['redirect_uri'] = $redirectUri;
		try {
			$token = $this->getTokenFromTokenEndpoint ( 'code', $keys );
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Authorization Code. " . $e->getMessage () );
		}
	}
	public function authWithToken($token) {
		$this->accessToken = $token;
	}
	public function authWithClientCredentials() {
		$keys = array ();
		$keys ['client_id'] = $this->clientId;
		$keys ['client_secret'] = $this->clientSecret;
		try {
			$token = $this->getTokenFromTokenEndpoint ( 'client_credentials', $keys );
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Client Credentials. " . $e->getMessage () );
		}
	}
	public function authWithResourceOwnerPassword($username, $password) {
		$keys = array ();
		$keys ['username'] = $username;
		$keys ['password'] = $password;
		try {
			$token = $this->getTokenFromTokenEndpoint ( 'password', $keys );
		} catch ( RennException $e ) {
			throw new InvalideAuthorizationException ( "Authorization failed with Resource Owner Password. " . $e->getMessage () );
		}
	}
	public function authWithStoredToken() {
		$token = $this->getTokenFromTokenStore ();
		if (! isset ( $token )) {
			throw new InvalideAuthorizationException ( "Authorization failed with Stored Token. token: null" );
		}
	}
	public function getAuthorizeURL($redirectUri, $responseType = 'code', $state = null, $display = null, $forcelogin = null) {
		$params = array ();
		$params ['client_id'] = $this->clientId;
		$params ['redirect_uri'] = $redirectUri;
		$params ['response_type'] = $responseType;
		$params ['state'] = $state;
		$params ['display'] = $display;
		$params ['x_renew'] = $forcelogin;
		return self::AUTHORIZATION_ENDPOINT . "?" . http_build_query ( $params );
	}
	public function getTokenFromTokenEndpoint($grantType, $keys, $tokenType = TokenType::MAC) {
		$params = array ();
		$params ['client_id'] = $this->clientId;
		$params ['client_secret'] = $this->clientSecret;
		$params ['token_type'] = $tokenType;
		if ($grantType === 'token') {
			$params ['grant_type'] = 'refresh_token';
			$params ['refresh_token'] = $keys ['refresh_token'];
		} elseif ($grantType === 'code') {
			$params ['grant_type'] = 'authorization_code';
			$params ['code'] = $keys ['code'];
			$params ['redirect_uri'] = $keys ['redirect_uri'];
		} elseif ($grantType === 'client_credentials') {
			$params ['grant_type'] = 'client_credentials';
		} elseif ($grantType === 'password') {
			$params ['grant_type'] = 'password';
			$params ['username'] = $keys ['username'];
			$params ['password'] = $keys ['password'];
		} else {
			throw new ClientException ( "wrong auth type" );
		}
		$response = $this->http ( self::TOKEN_ENDPOINT, 'POST', http_build_query ( $params, null, '&' ) );
		$token = json_decode ( $response, true );
		$tokenObj = null;
		if (is_array ( $token ) && ! isset ( $token ['error'] )) {
			$tokenType = null;
			$accessToken = $token ['access_token'];
			$refreshToken = null;
			$macAlgorithm = null;
			$macKey = null;
			if (isset ( $token ['refresh_token'] )) {
				$refreshToken = $token ['refresh_token'];
			}
			if (isset ( $token ['mac_algorithm'] ) && isset ( $token ['mac_key'] )) { 
				$tokenType = TokenType::MAC;
				$macAlgorithm = $token ['mac_algorithm'];
				$macKey = $token ['mac_key'];
			} else { 
				$tokenType = TokenType::Bearer;
			}
			$tokenObj = new AccessToken ( $tokenType, $accessToken, $refreshToken, $macKey, $macAlgorithm );
			$this->accessToken = $tokenObj;
		} else {
			throw new ClientException ( "Get access token failed. " . $token ['error'] . ": " . $token ['error_description'] );
		}
		$this->tokenStore->saveToken ( 'renren_' . $this->clientId, $tokenObj );
		return $tokenObj;
	}
	private function getTokenFromTokenStore() {
		$token = $this->tokenStore->loadToken ( 'renren_' . $this->clientId );
		$this->accessToken = $token;
		return $token;
	}
	public function execute($path, $httpMethod, $queryParams, $bodyParams = null, $fileParams = null) {
		$schema = "http";
		if ($this->accessToken->type == TokenType::Bearer) {
			$schema = "https";
		}
		$url = $schema . "://" . self::API_HOST . $path;
		$pathAndQuery = $path;
		if (! empty ( $queryParams )) { 
			$query = http_build_query ( $queryParams );
			if (!empty ($query)) {
				$url = $url . '?' . $query;
				$pathAndQuery = $path . '?' . $query;
			}
		}
		$headers = array ();
		if ($this->accessToken) {
			$headers [] = $this->getAuthorizationHeader ( $schema, $pathAndQuery, $httpMethod );
		}
		if (! empty ( $fileParams )) {
			$boundary = uniqid ( '------------------' );
			$headers [] = "Content-Type: multipart/form-data; boundary=" . $boundary;
			$body = $this->http_build_multipart_body ( $fileParams, $bodyParams, $boundary );
			$response = $this->http ( $url, $httpMethod, $body, $headers );
		} else {
			$headers [] = 'Content-type: application/x-www-form-urlencoded';
			if (isset ( $bodyParams )) {
				$body = http_build_query ( $bodyParams, null, '&' );
				$length = strlen ( $body );
				$headers [] = 'Content-length: ' . $length;
				$response = $this->http ( $url, $httpMethod, $body, $headers );
			} else {
				$headers [] = 'Content-length: 0';
				$response = $this->http ( $url, $httpMethod, null, $headers );
			}
		}
		$result = json_decode ( $response, true );
		if (isset ( $result ['error'] ) && $result ['error']) {
			throw new ServerException ( $result ['error'] ['code'], $result ['error'] ['message'] );
		}
		return $result ['response'];
	}
	private function http_build_multipart_body($fileParams, $textParams, $boundary) {
		$MPboundary = '--' . $boundary;
		$endMPboundary = $MPboundary . '--';
		$multipartbody = '';
		foreach ( $fileParams as $fileParamName => $fileUrl ) {
			$content = file_get_contents ( $fileUrl );
			$array = explode ( '?', basename ( $fileUrl ) );
			$filename = $array [0];
			$multipartbody .= $MPboundary . "\r\n";
			$multipartbody .= 'Content-Disposition: form-data; name="' . $fileParamName . '"; filename="' . $filename . '"' . "\r\n";
			$multipartbody .= "Content-Type: image/unknown\r\n\r\n";
			$multipartbody .= $content . "\r\n";
		}
		foreach ( $textParams as $param => $value ) {
			$multipartbody .= $MPboundary . "\r\n";
			$multipartbody .= 'Content-Disposition: form-data; name="' . $param . "\"\r\n\r\n";
			$multipartbody .= $value . "\r\n";
		}
		$multipartbody .= $endMPboundary;
		return $multipartbody;
	}
	private function http($url, $method, $postfields = null, $headers = array()) {
		$this->httpInfo = array ();
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0 );
		curl_setopt ( $ci, CURLOPT_USERAGENT, self::USERAGENT );
		curl_setopt ( $ci, CURLOPT_CONNECTTIMEOUT, self::CONNECTTIMEOUT );
		curl_setopt ( $ci, CURLOPT_TIMEOUT, self::TIMEOUT );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt ( $ci, CURLOPT_ENCODING, "" );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 2 );
		curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
		switch ($method) {
			case 'POST' :
				curl_setopt ( $ci, CURLOPT_POST, TRUE );
				if (! empty ( $postfields )) {
					curl_setopt ( $ci, CURLOPT_POSTFIELDS, $postfields );
					$this->postdata = $postfields;
				}
				break;
			case 'DELETE' :
				curl_setopt ( $ci, CURLOPT_CUSTOMREQUEST, 'DELETE' );
				if (! empty ( $postfields )) {
					$url = "{$url}?{$postfields}";
				}
		}
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ci, CURLINFO_HEADER_OUT, TRUE );
		$response = curl_exec ( $ci );
		$this->httpCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
		$this->httpInfo = array_merge ( $this->httpInfo, curl_getinfo ( $ci ) );
		if ($this->debug) {
			echo "=====post data======\r\n";
			var_dump ( $postfields );
			echo "=====headers======\r\n";
			print_r ( $headers );
			echo '=====request info=====' . "\r\n";
			print_r ( curl_getinfo ( $ci ) );
			echo '=====response=====' . "\r\n";
			print_r ( $response );
		}
		curl_close ( $ci );
		return $response;
	}
	private function getAuthorizationHeader($schema, $pathAndQuery, $method) {
		if ($this->accessToken->type !== TokenType::MAC) {
			return "Authorization:Bearer " . $this->accessToken->accessToken;
		}
		$signMethod = $this->signatureMethodFactory->getSignatureMethod ( $this->accessToken->macAlgorithm );
		if (empty ( $signMethod )) {
			throw new ClientException ( "wrong mac algorithm" );
		}
		$timestamp = intval ( time () / 1000 ); 
		$nonce = $this->generateRandomString ( 8 ); 
		$ext = ""; 
		$host = self::API_HOST; 
		$port = $schema == "https" ? 443 : 80;
		$signatureBaseString = $timestamp . "\n" . $nonce . "\n" . $method . "\n" . $pathAndQuery . "\n" . $host . "\n" . $port . "\n" . $ext . "\n";
		$signature = $signMethod->buildSignature ( $signatureBaseString, $this->accessToken->macKey );
		return sprintf ( "Authorization:MAC id=\"%s\",ts=\"%s\",nonce=\"%s\",mac=\"%s\"", $this->accessToken->accessToken, $timestamp, $nonce, $signature );
	}
	 * @param integer $length
	private function generateRandomString($length = 8) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$random_str = "";
		for($i = 0; $i < $length; $i ++) {
			// 第一种是使用 substr 截取$chars中的任意一位字符；
			// $random_str .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
			// 第二种是取字符数组 $chars 的任意元素
			$random_str .= $chars [mt_rand ( 0, strlen ( $chars ) - 1 )];
		}
		return $random_str;
	}
	 * 开启调试信息后，SDK会将每次请求微博API所发送的POST Data、Headers以及请求信息、返回内容输出出来。
	 * @access public
	 * @param bool $enable
	 * @return void
	function setDebug($enable) {
		$this->debug = $enable;
	}
}
 * token类型
class TokenType {
	const Bearer = "Bearer";
	const MAC = "MAC";
}
class AccessToken {
	public $type;
	public $accessToken;
	public $refreshToken;
	public $macKey;
	public $macAlgorithm;
	function __construct($type, $accessToken, $refreshToken, $macKey, $macAlgorithm) {
		$this->type = $type;
		$this->accessToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->macKey = $macKey;
		$this->macAlgorithm = $macAlgorithm;
	}
}
 * oauth2异常
class RennException extends Exception {
	// pass
}
class ClientException extends RennException {
	// pass
}
class InvalideAuthorizationException extends ClientException {
	// pass
}
class UnauthorizedException extends ClientException {
	// pass
}
class ServerException extends RennException {
	protected $errorCode;
	 * @param unknown $code
	 *        	code和message使用父类的属性
	 * @param unknown $message
	 *        	code和message使用父类的属性
	 * @param string $previous
	function __construct($code, $message, $previous = null) {
		parent::__construct ( $message, null, $previous );
		$this->errorCode = $code;
	}
        function getErrorCode() {
		return $this->errorCode;
        }
}
 * http error code is 400.
class InvalidRequestException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}
 * http error code is 401.
 * 认证信息错误，token错误，签名错误等。
class InvalidAuthorizationException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}
 * http error code is 403 认证通过，但是也不允许其访问。例如超配额
class ForbiddenException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}
 * http error code is 500 内部错误
class InternalErrorException extends ServerException {
	public function __construct($code, $message, $previous = null) {
		parent::__construct ( $code, $message, $previous );
	}
}
 * oauth签名方法的工厂
class OAuth2SignatureMethodFactory {
	private $signature_methods;
	function __construct() {
		$this->signature_methods = array ();
		// 注册HMAC_SHA1签名方法
		$signatureMethod_HMAC_SHA1 = new OAuth2SignatureMethod_HMAC_SHA1 ();
		$this->signature_methods [$signatureMethod_HMAC_SHA1->getName ()] = $signatureMethod_HMAC_SHA1;
	}
	 * @param string $methodName
	 * @return OAuth2SignatureMethod
	function getSignatureMethod($methodName) {
		return $this->signature_methods [$methodName];
	}
}
 * oauth签名方法
 * A class for implementing a Signature Method
 * See section 9 ("Signing Requests") in the spec
abstract class OAuth2SignatureMethod {
	 * Needs to return the name of the Signature Method (ie HMAC-SHA1)
	 * @return string
	abstract public function getName();
	 * Build up the signature
	 * NOTE: The output of this function MUST NOT be urlencoded.
	 * the encoding is handled in OAuthRequest when the final
	 * request is serialized
	 * @param string $signatureBaseString
	 * @param string $signatureSecret
	 * @return string
	abstract public function buildSignature($signatureBaseString, $signatureSecret);
	 * Verifies that a given signature is correct
	 * @param string $signatureBaseString
	 * @param string $signatureSecret
	 * @param string $signature
	 * @return bool
	public function checkSignature($signatureBaseString, $signatureSecret, $signature) {
		$built = $this->buildSignature ( $signatureBaseString, $signatureSecret );
		return $built == $signature;
	}
}
 * 基于HMAC_SHA1算法的签名方法
 * The HMAC-SHA1 signature method uses the HMAC-SHA1 signature algorithm as defined in [RFC2104]
 * where the Signature Base String is the text and the key is the concatenated values (each first
 * encoded per Parameter Encoding) of the Consumer Secret and Token Secret, separated by an '&'
 * character (ASCII code 38) even if empty.
 * - Chapter 9.2 ("HMAC-SHA1")
class OAuth2SignatureMethod_HMAC_SHA1 extends OAuth2SignatureMethod {
	 * @see OAuthSignatureMethod::get_name()
	function getName() {
		return "hmac-sha-1";
	}
	public function buildSignature($signatureBaseString, $signatureSecret) {
		return base64_encode ( hash_hmac ( 'sha1', $signatureBaseString, $signatureSecret, true ) );
	}
}
interface TokenStore {
	public function loadToken($key);
	public function saveToken($key, $token);
}
class CookieTokenStore implements TokenStore {
	public function loadToken($key) {
		if (isset ( $_SESSION [$key] ) && $cookie = $_SESSION [$key]) {
			parse_str ( $cookie, $token );
			return new AccessToken ( $token ['type'], $token ['accessToken'], isset ( $token ['refreshToken'] ) ? $token ['refreshToken'] : null, isset ( $token ['macKey'] ) ? $token ['macKey'] : null, isset ( $token ['macAlgorithm'] ) ? $token ['macAlgorithm'] : null );
		} else {
			return null;
		}
	}
	public function saveToken($key, $token) {
		$_SESSION[$key] = http_build_query ($token);
	}
}
?>
