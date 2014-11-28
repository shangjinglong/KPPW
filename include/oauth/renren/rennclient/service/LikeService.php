<?php
include_once ('RennServiceBase.php');
class LikeService extends RennServiceBase {
         function removeLikeUgc($ugcOwnerId, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/remove', 'POST', $params, $bodyParams, $fileParams);
         }
         function putLikeUgc($ugcOwnerId, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($ugcOwnerId)) {
	             $params ['ugcOwnerId'] = $ugcOwnerId;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/put', 'POST', $params, $bodyParams, $fileParams);
         }
         function getLikeUgcInfo($limit, $withLikeUsers, $likeUGCType, $ugcId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($limit)) {
	             $params ['limit'] = $limit;
	     }
	     if (isset($withLikeUsers)) {
	             $params ['withLikeUsers'] = $withLikeUsers;
	     }
	     if (isset($likeUGCType)) {
	             $params ['likeUGCType'] = $likeUGCType;
	     }
	     if (isset($ugcId)) {
	             $params ['ugcId'] = $ugcId;
	     }
             return $this->client->execute('/v2/like/ugc/info/get', 'GET', $params, $bodyParams, $fileParams);
         }
}
?>
