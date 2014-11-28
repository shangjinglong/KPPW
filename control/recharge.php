<?php
$strUrl = 'index.php?do=recharge&cash='.$cash;
$arrPayConfig = kekezu::get_table_data ( "k,v", "witkey_pay_config", '', '', '', '', 'k' ); 
$arrOnlinePayList = keke_finance_class::get_pay_config('', 'online');
if(floatval($_SESSION['chargecash']) != floatval($cash)){
	kekezu::show_msg('金额错误');
	exit('金额错误');
}
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
		$payTitle = $username . '(' . $_K ['html_title'] . '在线充值' . trim ( sprintf ( "%10.2f", $cash ) ) .'元)';
		$bankConfig = kekezu::get_payment_config($bank);
		require S_ROOT . "/include/payment/" . $bank . "/order.php";
		$orderId=keke_order_class::create_user_charge_order('online_charge', $bank,$cash);
		$form = get_pay_url('user_charge',$cash, $bankConfig, $payTitle, $orderId,'0','0',$service,'MD5','form','index.php?do=recharge&status=1&cash='.$cash);
		echo $form;die();
}
