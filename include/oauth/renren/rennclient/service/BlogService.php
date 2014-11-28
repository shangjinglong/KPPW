<?php
include_once ('RennServiceBase.php');
class BlogService extends RennServiceBase {
         function listBlog($ownerId, $pageSize, $pageNumber) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
             return $this->client->execute('/v2/blog/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function putBlog($title, $accessControl, $password,  $content) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($title)) {
	             $params ['title'] = $title;
	     }
	     if (isset($accessControl)) {
	             $params ['accessControl'] = $accessControl;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
	     if (isset($content)) {
		    $bodyParams ['content'] = $content;
	     }
             return $this->client->execute('/v2/blog/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function getBlog($ownerId, $blogId, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($blogId)) {
	             $params ['blogId'] = $blogId;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/blog/get', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
