<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$strUrl ="index.php?do=user&view=finance&op=rechargeoffline";
$arrOfflinePayList = keke_finance_class::get_pay_config ( '', 'offline' );
$arrPayConfig = kekezu::get_table_data ( "k,v", "witkey_pay_config", '', '', '', '', 'k' ); 
if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	$strPayInfo = kekezu::escape ( $pay_info );
	if ($pay_money < $arrPayConfig['recharge_min']['v']) {
		$tips['errors']['pay_money'] = '充值金额不能少于'.$arrPayConfig['recharge_min']['v'];
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	if ($pay_money > 100000) {
		$tips['errors']['pay_money'] = '充值金额不能大于100000';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	$floatCash = keke_curren_class::convert ( abs ( $pay_money ), 0, true ) + 0;
	$intOrderId = keke_order_class::createUserChargeOrder ( 'offline_charge', $offline, $floatCash, $strPayInfo );
	if ($intOrderId) {
		kekezu::show_msg ( '提交成功，等待后台审核', 'index.php?do=user&view=finance&op=rechargelog', NULL, NULL, 'ok' );
	} else {
		kekezu::show_msg ( '提交失败', NULL, NULL, NULL, 'error' );
	}
}