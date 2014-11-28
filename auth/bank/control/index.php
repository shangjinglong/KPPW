<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$intBankId  = intval($intBankId);
$intBankAid = intval($intBankAid);
$step and $step=$step or $step='step1';
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
$strBankSql = sprintf("select a.*,b.bank_a_id,b.auth_status from %switkey_member_bank a left join %switkey_auth_bank b on a.bank_id = b.bank_id where a.uid=%d",TABLEPRE,TABLEPRE,$gUid);
$arrBankAuthLists = db_factory::query($strBankSql);
foreach($arrBankAuthLists as $k=>$v){
	$arrAccountLists[$v['bank_id']]=$v;
}
$bank_arr=keke_glob_class::get_bank();
switch ($step) {
	case "step1" :
		switch($action){
			case 'subAuth':
				if(!$intBankId){
					kekezu::show_msg('警告,非法进入,您还未选择关联账户',null,null,null,null);
				}
			    $arrUserBankInfo = $arrAccountLists[$intBankId];
			    if(empty($arrUserBankInfo)&&!is_array($arrUserBankInfo)){
			    	kekezu::show_msg('不存在的关联银行账号',null,null,null,null);
			    }
				$arrData['bank_name']    = $arrUserBankInfo['bank_name'];
				$arrData['bank_account'] = $arrUserBankInfo['card_num'];
				$arrData['deposit_area'] = $arrUserBankInfo['bank_address'];
				$arrData['deposit_name'] = $arrUserBankInfo['bank_sub_name'];
				$arrData['bank_id']      = $arrUserBankInfo['bank_id'];
				if($arrData['bank_name']&&$arrData ['bank_account']){
					$intResId = $objAuth->add_auth ($arrData);
					if($intResId){
						kekezu::show_msg('申请提交成功',$strUrl."&step=step2&intBankAid=".$intResId,null,null,'ok');
					}
					kekezu::show_msg('申请提交失败，关联账户资料获取失败',null,null,null,null);
				}
				kekezu::show_msg('申请提交失败，关联账户资料获取失败',null,null,null,null);
				break;
			case 'cancelAuth':
				$intRes = db_factory::execute(sprintf(" delete from %switkey_auth_bank where bank_a_id='%d'",TABLEPRE,$intBankAid));
				db_factory::execute(sprintf(" delete from %switkey_auth_record where ext_data='%d'",TABLEPRE,$intBankAid));
				$intRes and  kekezu::show_msg('取消认证成功',$strUrl."&step=step1",null,null,'ok');
				kekezu::show_msg('取消认证失败',null,null,null,null);
				break;
			case 'unBind':
				$intRes = db_factory::execute(sprintf(" delete from %switkey_member_bank where bank_id='%d'",TABLEPRE,$intBankId));
				$intRes and kekezu::show_msg('该银行卡号的绑定解除成功',$strUrl."&step=step1",null,null,'ok');
				kekezu::show_msg('该银行卡号的绑定解除失败',null,12,null,null);
				break;
			case 'delAuth':
				$strSql = ' delete a.*,b.* from %switkey_auth_bank a left join %switkey_member_bank b on a.bank_id = b.bank_id ';
				$strSql.= ' where a.uid=%d and a.bank_id = %d ';
				$intRes = db_factory::execute(sprintf($strSql,TABLEPRE,TABLEPRE,$gUid,$intBankId));
				$intRes and kekezu::show_msg('删除认证成功',$strUrl."&step=step1",null,null,'ok');
				kekezu::show_msg('删除认证失败',null,null,null,null);
				break;
		}
		$auth_bank = kekezu::get_table_data("bank_id","witkey_auth_bank","uid='$gUid' and auth_status!=2","","","","bank_id",null);
		$bind_bank = kekezu::get_table_data("*","witkey_member_bank"," uid = '$gUid' and bind_status='1'",'','','','bank_id');
		break;
	case "step2" :
		if($arrAuthInfo['auth_status'] > 0){
			$step='step3';
		}else{
			$step='step2';
		}
		if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
			$floatUserGetCash   = floatval ( $user_get_cash );
			if($floatUserGetCash === floatval(0)){
				$tips['errors']['user_get_cash'] = '输入金额不正确哦';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$floatPayToUserCash = floatval ( $arrAuthInfo['pay_to_user_cash'] );
			if($floatPayToUserCash === floatval(0)){
				$tips['errors']['user_get_cash'] = '网站打款金额不正确';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($floatPayToUserCash === $floatUserGetCash){
				$objAuth->auth_confirm($arrAuthInfo,$floatUserGetCash);
				$strTipsMsg = '认证成功';
			}else{
				$objAuth->authFail($arrAuthInfo,$floatUserGetCash);
				$strTipsMsg = '您填写的收款金额与管理员打款金额不相等';
			}
			kekezu::show_msg($strTipsMsg,$strUrl."&step=step3&intBankAid=".$intBankAid,NULL,NULL,'ok');
		 }else{
			 $arrAuthBankInfo = db_factory::get_one(sprintf("select * from %switkey_auth_bank where bank_a_id=%d",TABLEPRE,$intBankAid));
			 if(empty($arrAuthBankInfo)&&!is_array($arrAuthBankInfo)){
			 	kekezu::show_msg('警告,非法进入,你还没有提交认证申请',$strUrl."&step=step1",'3','','warning');
			 	exit('警告,非法进入,你还没有提交认证申请');
			 }
			 $arrUserBankInfo=$arrAccountLists[$arrAuthInfo['bank_id']];
		 }
		break;
	case "step3":
		if($show=='list'){
			$arrAuthInfo[1] and $auth_list = $arrAuthInfo or $auth_list=array($arrAuthInfo);
		}else{
				$arrUserBankInfo=$arrAccountLists[$arrAuthInfo['bank_id']];
				$arrUserBankInfo or kekezu::show_msg($_lang['tips_about_bank_account_inexistent'],$ac_url."&step=step1",'3','','warning');
		}
		if($arrAuthInfo['auth_status']==1){
			$auth_tips ='已通过';
			$auth_style = 'success';
		}elseif($arrAuthInfo['auth_status']==2){
			$auth_tips ='未通过';
			$auth_style = 'error';
		}else{
			 $step='step2';
		}
		break;
}
