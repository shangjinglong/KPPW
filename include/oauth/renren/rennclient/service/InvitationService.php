<?php
include_once ('RennServiceBase.php');
class InvitationService extends RennServiceBase {
         function putInvitation($invitationType, $userId, $img, $gitName, $url) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($invitationType)) {
	             $params ['invitationType'] = $invitationType;
	     }
	     if (isset($userId)) {
	             $params ['userId'] = $userId;
	     }
	     if (isset($img)) {
	             $params ['img'] = $img;
	     }
	     if (isset($gitName)) {
	             $params ['gitName'] = $gitName;
	     }
	     if (isset($url)) {
	             $params ['url'] = $url;
	     }
             return $this->client->execute('/v2/invitation/put', 'POST', $params, $bodyParams, $fileParams);
         }
}
?>
