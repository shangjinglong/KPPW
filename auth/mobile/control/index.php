<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$step= keke_auth_mobile_class::get_auth_step($step,$arrAuthInfo);
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
if($arrAuthInfo['auth_status']==1&&$step=='step2'){
	$step = 'step3';
}
switch ($step){
	case "step1":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			if (!$mobile) {
				$tips['errors']['mobile'] = '请输入手机号码';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$strSql = sprintf('select count(*) from  %switkey_auth_mobile where mobile = \'%s\' and auth_status = 1 and uid != \'%d\' ',TABLEPRE,$mobile,$uid);
			$intRes = db_factory::get_count($strSql);
			if($intRes){
				$tips['errors']['mobile'] = '该手机号码已经认证过';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$arrData = array(
					'mobile'=>$mobile
			);
			if($objAuth->add_auth($arrData)){
				kekezu::show_msg('手机验证码发送成功',$strUrl.'&step=step2',NULL,NULL,'ok');
			}
			$tips['errors']['mobile'] = '手机验证码发送失败，请检查手机号码是否正确';
			kekezu::show_msg($tips,NULL,NULL,NULL,'error');
		}
		break;
	case "step2":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
				$arrData = array(
						'valid_code'=>$valid_code
				);
				if($objAuth->valid_auth($arrData)){
					kekezu::show_msg('手机认证成功',$strUrl.'&step=step3',NULL,NULL,'ok');
					die();
				}
				$tips['errors']['valid_code'] = '手机验证码错误';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				die();
		}
		if($resend ==='1'){
			$arrData = array(
					'mobile'=>$arrAuthInfo['mobile']
			);
			if($objAuth->add_auth($arrData)){
				kekezu::show_msg('手机验证码发送成功',$strUrl.'&step=step2',NULL,NULL,'ok');
			}
			kekezu::show_msg('手机验证码发送失败',null,NULL,NULL,'error');
		}
		break;
	case "step3":
		if($arrAuthInfo['auth_status']==1){
			$auth_tips ='已通过';
			$auth_style = 'success';
		}elseif($arrAuthInfo['auth_status']==2){
			$auth_tips ='认证失败';
			$auth_style = 'warning';
		}
		break;
}
