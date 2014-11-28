<?php
include_once ('RennServiceBase.php');
class ShareService extends RennServiceBase {
         function putShareUgc($ugcOwnerId, $comment, $ugcId, $ugcType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($comment)) {
	             $params ['comment'] = $comment;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
	     if (isset($ugcType)) {
	             $params ['ugcType'] = $ugcType;
	     }
             return $this->client->execute('/v2/share/ugc/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function listShareHot($pageSize, $pageNumber, $shareType) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($shareType)) {
	             $params ['shareType'] = $shareType;
	     }
             return $this->client->execute('/v2/share/hot/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function putShareUrl($comment, $url) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($comment)) {
	             $params ['comment'] = $comment;
	     }
	     if (isset($url)) {
	             $params ['url'] = $url;
	     }
             return $this->client->execute('/v2/share/url/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function getShare($shareId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($shareId)) {
	             $params ['shareId'] = $shareId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/share/get', 'GET', $params, $bodyParams, $fileParams);
         }
         function listShare($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/share/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
