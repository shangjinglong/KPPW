<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=account&op=chooseavatar';
for($i=1;$i<21;$i++){
	$arrSystemPic[$i] =  $i;
}
if(isset($action)&&$action=='chooseAvatar'){
	$intPicId and $intPicId= intval($intPicId);
	abs(intval($intPicId)) and   $id = keke_user_avatar_class::set_user_sys_pic($gUid, $intPicId);
	if($id){
		$kekezu->_cache_obj->del ( "keke_witkey_member_ext" );
		kekezu::show_msg('选择成功',$strUrl,null,null,'ok');
	}
}
