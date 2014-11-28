<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
if($del_auth_id){
	$objAuthEmail = new Keke_witkey_auth_email_class();
	$objAuthEmail->setWhere("email_a_id = " .intval($del_auth_id));
	$objAuthEmail->del_keke_witkey_auth_email();
}
$step= keke_auth_email_class::get_auth_step($step,$arrAuthInfo);
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
if($arrAuthInfo['auth_status']==1&&$step=='step2'){
	$step = 'step3';
}
switch ($step){
	case "step1":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$email = trim(strval($email));
			$sql = sprintf('select count(*) from  %switkey_auth_email where email = \'%s\' and auth_status = 1 and uid != \'%d\'',TABLEPRE,$email,$gUid);
			$intRes = db_factory::get_count($sql);
			if($intRes){
				$tips['errors']['email'] = '该邮箱已认证过';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($objAuth->add_auth($email)){
				kekezu::show_msg('邮件发送成功',$strUrl.'&step=step2',NULL,NULL,'ok');
			}else{
				$tips['errors']['email'] = '邮件发送失败,请检查邮箱是否正确！';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			die();
		}
		break;
	case "step2":
		preg_match("/@(.*)/u",$arrAuthInfo['email'],$matches);
		$strMailExt=$matches[1];
		if(intval($resend) === 1){
			if($objAuth->send_mail($arrAuthInfo['email_a_id'],$arrAuthInfo)){
				kekezu::echojson( '邮件发送成功',"1");
			}else{
				kekezu::echojson( '邮件发送失败',"0");
			}
			die();
		}
		break;
	case "step3":
			if($email_a_id&&$ac=='check_email'){
				$boolAuthRes = $objAuth->audit_auth($active_code,$email_a_id);
				header('location:index.php?do=user&view=account&op=auth&code=email');
			}
			if($arrAuthInfo['auth_status']==1){
				$auth_tips ='已通过';
				$auth_style = 'success';
			}elseif($arrAuthInfo['auth_status']==2){
				$auth_tips ='未通过';
				$auth_style = 'warning';
			}
		break;
}
