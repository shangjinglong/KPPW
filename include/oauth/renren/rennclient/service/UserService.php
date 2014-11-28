<?php
include_once ('RennServiceBase.php');
class UserService extends RennServiceBase {
         function batchUser($userIds) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userIds)) {
	             $userIdsList=null;
	             foreach($userIds as $value) {
	                       if($userIdsList == null) {
			           $userIdsList = strval($value);
	                       } else {
		                       $userIdsList =$userIdsList.",".strval($value);
			       }
	             }
	             $params ['userIds'] = $userIdsList;
	     }
             return $this->client->execute('/v2/user/batch', 'GET', $params, $bodyParams, $fileParams);
         }
         function getUser($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/user/get', 'GET', $params, $bodyParams, $fileParams);
         }
         function listUserFriend($userId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/user/friend/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function listUserFriendUninstall() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/friend/uninstall/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function listUserFriendMutual($userId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
             return $this->client->execute('/v2/user/friend/mutual/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function listUserFriendApp() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/friend/app/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function getUserLogin() {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
             return $this->client->execute('/v2/user/login/get', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
