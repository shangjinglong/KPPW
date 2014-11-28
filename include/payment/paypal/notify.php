<?php
define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require "Paypal.php";
$myPaypal = new Paypal ();

// Log the IPN results
$myPaypal->logIpn = TRUE;
// Enable test mode if needed
//$myPaypal->enableTestMode ();
$valid  = $myPaypal->validateIpn ();
// Check validity and write down it
list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $myPaypal->ipnData ['custom'], 6 );
$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id,$myPaypal->ipnData['mc_gross'], 'paypal' );
if ($valid) {
	if ($myPaypal->ipnData ['payment_status'] == 'Completed') {
		$response = $fac_obj->load();
	if($charge_type=='user_charge'){
			$show_url = 'index.php?do=recharge&cash='.$total_fee.'&status=1';
		}elseif($charge_type=='payitem_charge'){
			if(! in_array($model_id, array(6,7))){
				$show_url = 'index.php?do=task&id='.$obj_id;
			}else{
				$show_url =  'index.php?do=goods&id='.$obj_id;
			}
		}else{
			if(! in_array($model_id, array(6,7))){
				$show_url = 'index.php?do=pay&type=task&id='.$obj_id.'&status=1';
			}else{
				$show_url =  'index.php?do=pay&type=goods&id='.$obj_id.'&status=1';
			}
		}
		$response['url'] =$_K['siteurl'].'/'.$show_url;
	} else {
		$response ['url'] = 'index.php';
	}
} else {
	$response ['url'] = 'index.php';
}
header('Location:'.$response['url']);
