<?php
include_once ('RennServiceBase.php');
class AlbumService extends RennServiceBase {
         function listAlbum($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/album/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function getAlbum($albumId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($albumId)) {
	             $params ['albumId'] = $albumId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/album/get', 'GET', $params, $bodyParams, $fileParams);
         }
         function putAlbum($location, $description, $name, $accessControl, $password) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($location)) {
	             $params ['location'] = $location;
	     }
	     if (isset($description)) {
	             $params ['description'] = $description;
	     }
	     if (isset($name)) {
	             $params ['name'] = $name;
	     }
	     if (isset($accessControl)) {
	             $params ['accessControl'] = $accessControl;
	     }
	     if (isset($password)) {
	             $params ['password'] = $password;
	     }
             return $this->client->execute('/v2/album/put', 'POST', $params, $bodyParams, $fileParams);
         }
}
?>
