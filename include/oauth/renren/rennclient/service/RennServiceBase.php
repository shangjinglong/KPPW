<?php
class RennServiceBase {
	protected $client;
	protected $accessToken;
	function __construct($client, $accessToken) {
		$this->client = $client;
		$this->accessToken = $accessToken;
	}
}