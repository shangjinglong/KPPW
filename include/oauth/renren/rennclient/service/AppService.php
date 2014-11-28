<?php
include_once ('RennServiceBase.php');
class AppService extends RennServiceBase {
         function getApp() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/app/get', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
