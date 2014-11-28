<?php
include_once ('RennServiceBase.php');
class NotificationService extends RennServiceBase {
         function putNotificationUser($content, $userIds) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
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
             return $this->client->execute('/v2/notification/user/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function putNotificationApp($content, $userIds) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
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
             return $this->client->execute('/v2/notification/app/put', 'POST', $params, $bodyParams, $fileParams);
         }
}
?>
