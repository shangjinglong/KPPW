<?php
include_once ('RennServiceBase.php');
class StatusService extends RennServiceBase {
         function getStatus($statusId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($statusId)) {
	             $params ['statusId'] = $statusId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/status/get', 'GET', $params, $bodyParams, $fileParams);
         }
         function putStatus($content) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
             return $this->client->execute('/v2/status/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function listStatus($ownerId, $pageSize, $pageNumber) {
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
             return $this->client->execute('/v2/status/list', 'GET', $params, $bodyParams, $fileParams);
         }
         function shareStatus($content, $statusId, $ownerId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($statusId)) {
	             $params ['statusId'] = $statusId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
             return $this->client->execute('/v2/status/share', 'POST', $params, $bodyParams, $fileParams);
         }
}
?>
