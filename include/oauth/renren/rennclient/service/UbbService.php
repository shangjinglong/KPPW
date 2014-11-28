<?php
include_once ('RennServiceBase.php');
class UbbService extends RennServiceBase {
         function listUbb() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/ubb/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
