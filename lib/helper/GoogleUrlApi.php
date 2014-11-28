<?php
class GoogleUrlApi {
      function GoogleUrlApi($key,$apiURL = 'https://www.googleapis.com/urlshortener/v1/url') {
          $this->apiURL = $apiURL.'?key='.$key;
    }
    function shorten($url) {
        $response = $this->send($url);
        return isset($response['id']) ? $response['id'] : false;
    }
    function expand($url) {
        $response = $this->send($url,false);
        return isset($response['longUrl']) ? $response['longUrl'] : false;
    }
    function send($url,$shorten = true) {
        $ch = curl_init();
$googer = new GoogleURLAPI($key);
$shortDWName = $googer->shorten("http://davidwalsh.name");
echo "short URL:".$shortDWName ."<br/>"; 
$longDWName = $googer->expand($shortDWName);
echo "Long URL:" .$longDWName; 
?>