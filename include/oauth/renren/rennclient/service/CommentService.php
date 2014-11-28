<?php
include_once ('RennServiceBase.php');
class CommentService extends RennServiceBase {
         function putComment($content, $targetUserId, $commentType, $entryOwnerId, $entryId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($targetUserId)) {
	             $params ['targetUserId'] = $targetUserId;
	     }
	     if (isset($commentType)) {
	             $params ['commentType'] = $commentType;
	     }
	     if (isset($entryOwnerId)) {
	             $params ['entryOwnerId'] = $entryOwnerId;
	     }
	     if (isset($entryId)) {
	             $params ['entryId'] = $entryId;
	     }
             return $this->client->execute('/v2/comment/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function listComment($desc, $pageSize, $pageNumber, $commentType, $entryOwnerId, $entryId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($desc)) {
	             $params ['desc'] = $desc;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($commentType)) {
	             $params ['commentType'] = $commentType;
	     }
	     if (isset($entryOwnerId)) {
	             $params ['entryOwnerId'] = $entryOwnerId;
	     }
	     if (isset($entryId)) {
	             $params ['entryId'] = $entryId;
	     }
             return $this->client->execute('/v2/comment/list', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
