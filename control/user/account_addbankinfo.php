<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$intUserRole = intval($gUserInfo['user_type']);
if($intUserRole === 2){
	$strAccountName = '企业机构名称';
	$strInputName   = 'company';
}else {
	$strAccountName = '真实姓名';
	$strInputName   = 'real_name';
}
$strUrl = 'index.php?do=user&view=account&op=addbankinfo';
$objMemBankT=keke_table_class::get_instance("witkey_member_bank");
$arrBankList=keke_glob_class::get_bank();
$arrProvinces = CommonClass::getDistrictByPid('0','id,upid,name');
$strBankZone   = $_SESSION['bank_zone'];
$strBankDetail = $_SESSION['bank_zone_detail'];
switch ($step){
	case "step1":
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$strTxtName 	= strval(trim($txt_name));
			$strBankName  	= strval(trim($bank_name));
			$strBankFullName= strval(trim($bank_full_name));
			$strCardNum     = strval(trim($card_num));
			if(!$strTxtName){
				$tips['errors']['txt_name'] = '请输入'.$strAccountName;
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($province ==='选择省份'||!$province){
				$tips['errors']['province'] = '请选择省份';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($city ==='选择城市'||!$city){
				$tips['errors']['city'] = '请选择城市';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if(!$strBankFullName){
				$tips['errors']['bank_full_name'] = '请输入开户行名称';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if(!$strCardNum){
				$tips['errors']['card_num'] = '请输入银行卡号';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$strSql = sprintf(" select card_num from %switkey_member_bank where bind_status=1 and card_num='%s'",TABLEPRE,$strCardNum);
			if(db_factory::get_count($strSql)){
				$tips['errors']['card_num'] = '此账号已被他人绑定';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$arrDistrictData = CommonClass::getAllDistrict('id,upid,name');
			$province 	= $arrDistrictData[$province]['name'];
			$city 		= $arrDistrictData[$city]['name'];
			$strBankAddress = $province . "," . $city ;
			if (strtoupper ( CHARSET ) == 'GBK') {
				$strTxtName = kekezu::utftogbk($strTxtName );
				$strBankName = kekezu::utftogbk($strBankName );
				$strBankAddress = kekezu::utftogbk($strBankAddress );
				$strBankFullName = kekezu::utftogbk($strBankFullName );
			}
			$arrData = array(
				$strInputName	=>$strTxtName,
				'bank_name'		=>$strBankName,
				'bank_address'	=>$strBankAddress,
				'bank_full_name'=>$strBankFullName,
				'bank_type'		=>$intUserRole,
				'card_num'		=>$strCardNum,
				'uid'		    =>$gUid,
				'on_time'		=>time(),
				'bind_status'	=>1,
			);
			$intBankId=	$objMemBankT->save($arrData);
			if($intBankId){
				unset($_SESSION['bank_zone']);
				unset($_SESSION['bank_zone_detail']);
				$strJumpUrl = $strUrl.'&step=step2&intBankType='.$intUserRole.'&intBankId='.$intBankId;
				kekezu::show_msg('账户绑定成功',$strJumpUrl,NULL,NULL,'ok');
			}
		}
		break;
	case "step2":
		$strSql = sprintf(" select * from %switkey_member_bank where bank_id='%d' and uid='%d' and bind_status='1' ",TABLEPRE,intval($intBankId),$gUid);
		$arrBankInfo=db_factory::get_one($strSql);
		$arrBankInfo or	kekezu::show_msg('不存在的绑定账号,请先进行绑定',$strUrl.'&step=step1',NULL,NULL,'ok');
		break;
}
