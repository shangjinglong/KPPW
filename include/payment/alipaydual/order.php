<?php
/**
 * 支付请求URL生成
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');

require_once("alipay_submit.class.php");
/**
 * 用户充值生成付款url
 * @param string $charge_type  充值类型（order_charge订单充值。user_charge余额充值）
 * @param float $pay_amount 金额 (必填)
 * @param array $payment_config 商家号配置信息组数 (必填)
 * @param string $subject 订单标题 (必填)
 * @param int $order_id 订单ID（必填)
 * @param int $model_id 模型ID（无值表示余额充值，无付款动作)
 * @param int $obj_id   对象ID（ 可空)
 * @param string $service  付款类型(可空）
 * @param string $sign_type 签名类型(可空）
 * @param $method 请求响应方式 form，返回表单。url。返回链接
 * @return string url
 */
function get_pay_url($charge_type, $pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = null, $sign_type = 'MD5',$show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid, $username;
	$charge_type == 'order_charge' and $t = "订单充值" or $t = "余额充值";

	if($service===null){
		$service =  "trade_create_by_buyer";
	}
	$body = $t . "(from:" . $username . ")";
	$parameter = array ("service" => $service,
			 "partner" => $payment_config ['seller_id'],
			"return_url" => $_K ['siteurl'] . '/include/payment/alipaydual/return.php',
			"notify_url" => $_K ['siteurl'] . '/include/payment/alipaydual/notify.php',
			"_input_charset" => CHARSET, "subject" => $subject,
			 "body" => $body,
			 "out_trade_no" => "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time(),
			 "price"	=> $pay_amount,
			 "quantity"	=> "1",
			"total_fee" => $pay_amount, "payment_type" => "1",
			"logistics_fee"	=> "0.00",
			"logistics_type"	=> "EXPRESS",
			"logistics_payment"	=> "SELLER_PAY"  ,
			 "show_url" => $_K ['siteurl'] . $show_url,
			 "seller_email" => $payment_config ['account'],
			"extend_param"=>"isv^kk11");

	$alipay_config['partner']		= $payment_config['seller_id'];
	//安全检验码，以数字和字母组成的32位字符
	$alipay_config['key']			= $payment_config ['safekey'];
	//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	//签名方式 不需修改
	$alipay_config['sign_type']    = strtoupper('MD5');
	//字符编码格式 目前支持 gbk 或 utf-8
	$alipay_config['input_charset']= strtolower(CHARSET);
	//ca证书路径地址，用于curl中ssl校验
	//请保证cacert.pem文件在当前文件夹目录中
	$alipay_config['cacert']    = getcwd().'\\cacert.pem';
	//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
	$alipay_config['transport']    = 'http';
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	return $html_text;
}