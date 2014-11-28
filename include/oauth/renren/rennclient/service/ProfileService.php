<?php
include_once ('RennServiceBase.php');
class ProfileService extends RennServiceBase {
         function getProfile($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/profile/get', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
