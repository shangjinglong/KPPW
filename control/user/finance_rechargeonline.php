<?php
$strUrl ="index.php?do=user&view=finance&op=rechargeonline";
$arrPayConfig = kekezu::get_table_data ( "k,v", "witkey_pay_config", '', '', '', '', 'k' ); 
$floatRechargeMin = $arrPayConfig['recharge_min']['v'];
$floatRechargeMax = $arrPayConfig['recharge_max']['v'];
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	$floatTotalMoney = trim ( sprintf ( "%10.2f", abs ( floatval ( $floatRecharge ) ) ) );
	if($floatTotalMoney<$floatRechargeMin){
		$tips['errors']['floatRecharge'] = '充值金额不得低于'.$floatRechargeMin.'元';
		kekezu::show_msg($tips,NULL,NULL,NULL,'error');
	}else{
		$_SESSION['chargecash'] = $floatTotalMoney;
		kekezu::show_msg('加载页面...','index.php?do=recharge&cash='.$floatTotalMoney,NULL,NULL,'ok');
	}
}
