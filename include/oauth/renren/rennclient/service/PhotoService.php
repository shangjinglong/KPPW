<?php
include_once ('RennServiceBase.php');
class PhotoService extends RennServiceBase {
         function uploadPhoto($albumId, $description, $file) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($file)) {
	             $fileParams ['file'] = $file;
	     }
             return $this->client->execute('/v2/photo/upload', 'POST', $params, $bodyParams, $fileParams);
         }
         function getPhoto($albumId, $photoId, $ownerId, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($photoId)) {
	             $params ['photoId'] = $photoId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/photo/get', 'GET', $params, $bodyParams, $fileParams);
         }
         function listPhoto($albumId, $ownerId, $pageSize, $pageNumber, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/photo/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
