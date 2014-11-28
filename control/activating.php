<?php
$excite_uid and $intExciteUid = intval($excite_uid);
$excite_code and $strExciteCode = strval($excite_code);
$arrUserInfo = kekezu::get_user_info($intExciteUid);
if($arrUserInfo){
	$strMd5Code = md5($arrUserInfo['uid'].','.$arrUserInfo['username'].','.$arrUserInfo['email']);
	if($arrUserInfo['status']=='3'){
		if($strMd5Code==$strExciteCode){
			$intRes = db_factory::execute(sprintf("update %switkey_space set status='1' where uid='%d'",TABLEPRE,$intExciteUid));
		}
	}
}else{
	kekezu::show_msg($_lang['operate_notice'],'index.php',3,'待激活的账号不存在','warning');
}