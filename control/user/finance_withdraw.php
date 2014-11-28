<?php
$strUrl = "index.php?do=user&view=finance&op=withdraw";
$arrStepLists = array (
		"1" => array (
				'第一步',
		),
		"2" => array (
				'第二步',
		),
		"3" => array (
				'第三步',
		),
		"4" => array (
				'第四步',
		),
		"5" => array (
				'第五步',
		)
);
if ($intWithdrawId) {
	$arrWithdrawInfo = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_withdraw where withdraw_id=" . intval ( $intWithdrawId ) );
	if ($arrWithdrawInfo ['withdraw_status'] == 2) {
		$strStep = 5;
	}
}
$strStep or $strStep = '1';
$arrPays = kekezu::get_table_data ( "k,v", "witkey_pay_config", '', '', '', '', 'k' );
$arrPaymentLists = kekezu::get_payment_config (); 
$booVerify = kekezu::reset_secode_session ( $ver ? 0 : 1 ); 
if (isset ( $action ) && $action == 'safe_secode') {
	$strSeccode = keke_user_class::get_password ( $sec_code, $gUserInfo ['rand_code'] );
	$strRefer ='index.php?do=user&view=finance&op=withdraw&ver=1';
	if ($strSeccode == $gUserInfo ['sec_code']) {
		$_SESSION ['check_secode_' . $gUserInfo ['uid']] = 1;
		kekezu::show_msg ( '', $strRefer, NULL, NULL, 'ok' );
	} else {
		$tips ['errors'] ['sec_code'] = '安全码输入错误';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
}
switch ($strStep) {
	case "1" :
		if ($intReset) {
			$_SESSION ['withdraw_cash'] = '';
		} elseif ($intChooseCash) {
			if ($intWithdrawCash) {
				$strWithdrawCash = keke_curren_class::convert ( $intWithdrawCash, '', true );
				if ($gUserInfo ['balance'] < $strWithdrawCash) {
					$tips ['errors'] ['intWithdrawCash'] = '您的金额不足以提现';
					kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
				}
				if ($intWithdrawCash < $arrPays ['withdraw_min'] ['v'] || $intWithdrawCash > $arrPays ['withdraw_max'] ['v']) {
					$tips ['errors'] ['intWithdrawCash'] = '单日提现金额范围为' . "{$arrPays['withdraw_min']['v']}-{$arrPays['withdraw_max']['v']}," . '您的提现金额输入有误';
					kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
				}
				$_SESSION ['withdraw_cash'] = $intWithdrawCash;
				kekezu::show_msg ( '', $strUrl . "&strStep=2&intWithdrawCash=$intWithdrawCash&ver=1#userCenter", NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '输入金额不正确', NULL, NULL, NULL, 'error' );
			}
		}
		break;
	case "2" :
		if ($intWithdrawCash != $_SESSION ['withdraw_cash']) {
			kekezu::show_msg ( $_lang ['alert_return_rewrite'], $strUrl . "&step=step1&intReset=1#userCenter", "3", "", "warning" );
		}
		$arrBankauthInfo = keke_auth_fac_class::auth_check ( "bank", $gUid );
		$arrBindLists = kekezu::get_table_data ( "*", "witkey_auth_bank", "uid='$gUid' and auth_status=1", "", "", "", "bank_id", null );
		$arrBank = keke_glob_class::get_bank (); 
		$arrOfflineLists = kekezu::get_payment_config ( '', 'offline', 1 );
	case "3" :
		switch ($paymode) {
			case "online" :
				$arrPayInfo = $arrPaymentLists [$pay_type]; 
				break;
			case "offline" :
				$arrBankInfo = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_auth_bank  where uid ='$uid' and auth_status=1 and bank_name='$pay_type'" );
				$arrUserBankInfo = kekezu::get_table_data ( "*", "witkey_member_bank", 'uid=' . $uid, '', "", '', '' );
				break;
		}
		break;
	case "4" :
		if ($intSbtWithdraw) {
			$objWithdrawM = new Keke_witkey_withdraw_class ();
			if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
				if ($gUserInfo ['balance'] < floatval ( $intWithdrawCash )) {
					$tips ['errors'] ['intWithdrawCash'] = '您的金额不足以提现';
					kekezu::show_msg ( $tips, $strUrl . "&strStep=1&intReset=1", NULL, NULL, 'error' );
				}
				if (strtoupper ( CHARSET ) == 'GBK') {
					$pay_username = kekezu::utftogbk( $pay_username );
					$pay_account = kekezu::utftogbk( $pay_account );
				}
				$objWithdrawM->setWithdraw_cash ( floatval ( $intWithdrawCash ) );
				$objWithdrawM->setUid ( $uid );
				$objWithdrawM->setUsername ( $username );
				$objWithdrawM->setPay_username ( $pay_username );
				$objWithdrawM->setWithdraw_status ( 1 );
				$objWithdrawM->setApplic_time ( time () );
				$objWithdrawM->setPay_type ( $pay_type );
				$objWithdrawM->setPay_account ( $pay_account );
				$intWithdrawId = $objWithdrawM->create_keke_witkey_withdraw ();
				if ($intWithdrawId) {
					unset ( $_SESSION ['withdraw_cash'] );
					$arrPayway = array_merge ( keke_glob_class::get_bank (), keke_glob_class::get_online_pay () );
					$data = array (
							':pay_way' => $arrPayway [$pay_type],
							':pay_account' => $pay_account,
							':pay_name' => $pay_username
					);
					keke_finance_class::init_mem ( 'withdraw', $data );
					keke_finance_class::cash_out ( $uid, abs ( floatval ( $intWithdrawCash ) ), 'withdraw', 0, 'withdraw', $intWithdrawId );
					kekezu::show_msg ( '提交成功等待审核', $strUrl . "&strStep=4&intWithdrawCash=$intWithdrawCash&intWithdrawId=$intWithdrawId&ver=1#userCenter", NULL, NULL, 'ok' );
				} else {
					kekezu::show_msg ( '提交失败', $strUrl . "&strStep=4&intWithdrawCash=$intWithdrawCash#userCenter", NULL, NULL, 'error' );
				}
			}
		}
		break;
}