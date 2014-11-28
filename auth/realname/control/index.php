<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
if($gUserInfo['user_type'] == '2'){
	kekezu::show_msg('非法操作',$strUrl.'&step=step2',NULL,NULL,'ok');
}
$step= keke_auth_realname_class::get_auth_step($step,$arrAuthInfo);
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
if($arrAuthInfo['auth_status']==1&&$step=='step2'){
	$step = 'step3';
}
switch ($step){
	case "step1":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$strSql = sprintf('select count(*) from  %switkey_auth_realname where id_card = \'%s\' and auth_status = 1 and uid != \'%d\'',TABLEPRE,$idcard,$gUid);
			$intRes = db_factory::get_count($strSql);
			if($intRes){
				$tips['errors']['idcard'] = '该身份证号码已存在';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$truename = kekezu::utftogbk($truename );
			}
			$arrData = array(
				'realname'=>$truename,
				'id_card'=>$idcard,
				'id_pic'=>$filepath
			);
			if($objAuth->add_auth($arrData)){
				$sql = "update ".TABLEPRE."witkey_space set user_type = 1 where uid = ".$gUid;
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
