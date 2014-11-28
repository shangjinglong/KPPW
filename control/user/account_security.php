<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	$strOldCode 		= kekezu::escape(trim($old_code));
	$strNewCode 		= kekezu::escape(trim($new_code));
	$strConfirmCode 	= kekezu::escape(trim($confirm_code));
	$strMd5Pwd = keke_user_class::get_password ( $strOldCode, $gUserInfo ['rand_code'] );
	if ($strMd5Pwd != $gUserInfo ['sec_code']) {
		$title['errors']['old_code'] = '安全码错误';
		kekezu::show_msg($title,NULL,NULL,NULL,'error');
	}
	if ($strNewCode == $strOldCode) {
		$title['errors']['new_code'] = '新安全码与当前安全码相同';
		kekezu::show_msg($title,NULL,NULL,NULL,'error');
	}
	if ($strNewCode != $strConfirmCode) {
		$title['errors']['confirm_password'] = '两次输入安全码不一致';
		kekezu::show_msg($title,NULL,NULL,NULL,'error');
	}
	$strNewMd5Pwd =  keke_user_class::get_password ( $strNewCode, $gUserInfo ['rand_code'] );
	$intRes = db_factory::updatetable(TABLEPRE.'witkey_space', array('sec_code'=>$strNewMd5Pwd), array('uid'=>$gUid));
	if($intRes){
		$message_obj = new keke_msg_class ();
		$message_obj->send_message (
				$gUserInfo ['uid'],
				$gUserInfo ['username'],
				'update_sec_code',
				'修改安全码',
				array ('安全码' => $strNewCode ),
				$gUserInfo ['email'],
				$gUserInfo ['mobile']
		);
		kekezu::show_msg('新安全码已生效',NULL,NULL,NULL,'ok');
	}else{
		kekezu::show_msg('安全码修改失败',NULL,NULL,NULL,'fail');
	}
}