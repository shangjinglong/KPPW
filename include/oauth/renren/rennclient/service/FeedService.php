<?php
include_once ('RennServiceBase.php');
class FeedService extends RennServiceBase {
         function putFeed($message, $title, $actionTargetUrl, $imageUrl, $description, $subtitle, $actionName, $targetUrl) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($message)) {
	             $params ['message'] = $message;
	     }
	     if (isset($title)) {
	             $params ['title'] = $title;
	     }
	     if (isset($actionTargetUrl)) {
	             $params ['actionTargetUrl'] = $actionTargetUrl;
	     }
	     if (isset($imageUrl)) {
	             $params ['imageUrl'] = $imageUrl;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($subtitle)) {
	             $params ['subtitle'] = $subtitle;
	     }
	     if (isset($actionName)) {
	             $params ['actionName'] = $actionName;
	     }
	     if (isset($targetUrl)) {
	             $params ['targetUrl'] = $targetUrl;
	     }
             return $this->client->execute('/v2/feed/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function listFeed($feedType, $userId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($feedType)) {
	             $feedTypeList=null;
	             foreach($feedType as $value) {
	                       if($feedTypeList == null) {
			           $feedTypeList = strval($value);
	                       } else {
		                       $feedTypeList =$feedTypeList.",".strval($value);
			       }
	             }
	             $params ['feedType'] = $feedTypeList;
	     }
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/feed/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
