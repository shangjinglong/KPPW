<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) ) )) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once ("PayResponseHandler.php");
$pay_arr = kekezu::get_payment_config ( "tenpay" );
@extract ( $pay_arr );
$key = $safekey;

$resHandler = new PayResponseHandler ();
$resHandler->setKey ( $key );


KEKE_DEBUG and  file_put_contents (S_ROOT.'/data/log/tenpay_log.txt', var_export ( $_GET, 1 ) , FILE_APPEND ); //信息录入

$v_void = $resHandler->getParameter ( "sp_billno" );//tentpay内部订单号
$v_attach = $resHandler->getParameter ( "attach" );//商家数据包
$v_amount = $resHandler->getParameter ( "total_fee" );
$v_amount = $v_amount * 0.01;

$pay_result = $resHandler->getParameter ( "pay_result" );
list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $v_attach, 6 );
if ($resHandler->isTenpaySign ()) {
	if ("0" == $pay_result && $_ == 'charge') {
		$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $v_amount, 'tenpay' );
		$response = $fac_obj->load ( );
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
			    $arrOrderDetail = keke_order_class::get_order_detail($order_id);
			    if($arrOrderDetail[0]['obj_type']=='hosted'){
			    	$show_url = 'index.php?do=task&id='.$obj_id;
			    }else{
			    	$show_url = 'index.php?do=pay&type=task&id='.$obj_id.'&status=1';
			    }

			}else{
				$show_url =  'index.php?do=pay&type=order&id='.$order_id.'&status=1';
			}
		}
		$response['url'] =$_K['siteurl'].'/'.$show_url;
		$response['url'] =$_K['siteurl'].'/'.$show_url;
	} else {
		$response ['url'] = 'index.php';
	}
} else {
	$response ['url'] = 'index.php';
}
header('Location:'.$response['url']);
