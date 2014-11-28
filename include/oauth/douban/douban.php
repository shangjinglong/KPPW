<?php
class doubanPHP {
	public $api_url = 'https://api.douban.com/';
	public function __construct($client_id, $client_secret, $access_token = NULL) {
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;
		$this->access_token = $access_token;
	}
	public function login_url($callback_url, $scope = '') {
		$params = array (
				'response_type' => 'code',
				'client_id' => $this->client_id,
				'redirect_uri' => $callback_url,
				'scope' => $scope,
				'state' => md5 ( time () )
		);
		return 'https://www.douban.com/service/auth2/auth?' . http_build_query ( $params );
	}
	public function access_token($callback_url, $code) {
		$params = array (
				'grant_type' => 'authorization_code',
				'code' => $code,
				'client_id' => $this->client_id,
				'client_secret' => $this->client_secret,
				'redirect_uri' => $callback_url
		);
		$url = 'https://www.douban.com/service/auth2/token';
		return $this->http ( $url, http_build_query ( $params ), 'POST' );
	}
	public function access_token_refresh($callback_url, $refresh_token) {
		$params = array (
				'grant_type' => 'refresh_token',
				'refresh_token' => $refresh_token,
				'client_id' => $this->client_id,
				'client_secret' => $this->client_secret,
				'redirect_uri' => $callback_url
		);
		$url = 'https://www.douban.com/service/auth2/token';
		return $this->http ( $url, http_build_query ( $params ), 'POST' );
	}
	public function me() {
		$params = array ();
		return $this->api ( 'v2/user/~me', $params, 'GET' );
	}
	public function share($text, $title, $url, $description = '', $pic = '') {
		$params = array (
				'text' => $text,
				'rec_title' => $title,
				'rec_url' => $url,
				'rec_desc' => $description,
				'rec_image' => $pic
		);
		return $this->api ( 'shuo/v2/statuses', $params, 'POST' );
	}
	public function api($url, $params = array(), $method = 'GET') {
		$url = $this->api_url . $url;
		$headers [] = 'Authorization: Bearer ' . $this->access_token;
		if ($method == 'GET') {
			$result = $this->http ( $url . '?' . http_build_query ( $params ), '', 'GET', $headers );
		} else {
			$result = $this->http ( $url, http_build_query ( $params ), 'POST', $headers );
		}
		return $result;
	}
	private function http($url, $postfields = '', $method = 'GET', $headers = array()) {
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ci, CURLOPT_CONNECTTIMEOUT, 30 );
		curl_setopt ( $ci, CURLOPT_TIMEOUT, 30 );
		if ($method == 'POST') {
			curl_setopt ( $ci, CURLOPT_POST, TRUE );
			if ($postfields != '')
				curl_setopt ( $ci, CURLOPT_POSTFIELDS, $postfields );
		}
		$headers [] = 'User-Agent: Douban.PHP(piscdong.com)';
		curl_setopt ( $ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ci, CURLOPT_URL, $url );
		$response = curl_exec ( $ci );
		curl_close ( $ci );
		$json_r = array ();
		if ($response != '')
			$json_r = json_decode ( $response, true );
		return $json_r;
	}
}