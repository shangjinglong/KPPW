<?php
include_once ('RennServiceBase.php');
class FriendService extends RennServiceBase {
         function listFriend($userId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/friend/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
