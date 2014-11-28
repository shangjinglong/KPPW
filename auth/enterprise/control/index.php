<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
if($gUserInfo['user_type'] == '1'){
	kekezu::show_msg('非法操作',$strUrl.'&step=step2',NULL,NULL,'ok');
}
$step= keke_auth_enterprise_class::get_auth_step($step,$arrAuthInfo);
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
if($arrAuthInfo['auth_status']==1&&$step=='step2'){
	$step = 'step3';
}
$strRandKf = kekezu::get_rand_kf ();
switch ($step){
	case "step1":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			if (strtoupper ( CHARSET ) == 'GBK') {
				$username = kekezu::utftogbk($username );
				$enterprisename = kekezu::utftogbk($enterprisename );
			}
			$arrData = array(
				'username'=>$username,
			    'company'=>$enterprisename,
			    'licen_num'=>$licensenum,
			    'licen_pic'=>$filepath
			);
			if($objAuth->add_auth($arrData)){
				$sql = "update ".TABLEPRE."witkey_space set user_type = 2 where uid = ".$gUid;
				db_factory::execute($sql);
				kekezu::show_msg('认证信息已提交',$strUrl.'&step=step2',NULL,NULL,'ok');
			}else{
				$tips['errors']['email'] = '认证信息提交失败';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
		}
		break;
	case "step2":
		break;
	case "step3":
		break;
}