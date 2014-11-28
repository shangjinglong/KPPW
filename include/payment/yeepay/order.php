<?php

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');

/*
 * @Description 易宝支付产品通用支付接口范例 @V3.0 @Author rui.xin
 */

include 'yeepayCommon.php';

// 商家设置用户购买商品的支付信息.
// #易宝支付平台统一使用GBK/GB2312编码方式,参数如用到中文，请注意转码

// 商户订单号,选填.
// #若不为""，提交的订单号必须在自身账户交易中唯一;为""时，易宝支付会自动生成随机的商户订单号.

function get_pay_url($charge_type, $pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = '', $sign_type = 'MD5', $show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid, $username,$kekezu;

	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time();
	$return_url = $_K ['siteurl'] . '/include/payment/yeepay/callback.php'; // 回调地址
	$p1_MerId = $payment_config ['seller_id']; // 测试使用
	$merchantKey = $payment_config ['safekey']; // 测试使用
	/*
	 * $p1_MerId			= "10001126856";																										#测试使用 $merchantKey	= "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";		#测试使用
	 */
	$logName = "YeePay_HTML.log";
	$reqURL_onLine = "https://www.yeepay.com/app-merchant-proxy/node";
	// 产品通用接口测试请求地址
	// $reqURL_onLine = "http://tech.yeepay.com:8080/robot/debug.action";

	// 业务类型
	// 支付请求，固定值"Buy" .
	$p0_Cmd = "Buy";
	// 送货地址
	// 为"1": 需要用户将送货地址留在易宝支付系统;为"0": 不需要，默认为 "0".
	$p9_SAF = "0";
	$p2_Order = $order_id;
	// 支付金额,必填.
	// #单位:元，精确到分.
	$p3_Amt = $pay_amount;
	// 交易币种,固定值"CNY".
	$p4_Cur = "CNY";
	// 商品名称
	// #用于支付时显示在易宝支付网关左侧的订单产品信息.
	$subject = 'kppwpay'.$order_id;
	$p5_Pid = mb_substr ( $subject, 0, 20, CHARSET );
/*
	if(CHARSET=='utf-8'){
		$p5_Pid = kekezu::utftogbk($p5_Pid);
		$p5_Pid = iconv ( "UTF-8", "GB2312//IGNORE", $p5_Pid );
	}
*/
	// 商品种类
	$p6_Pcat = "";
	// 商品描述
	$p7_Pdesc = $p5_Pid;
	// 商户接收支付成功数据的地址,支付成功后易宝支付会向该地址发送两次成功通知.
	$p8_Url = $return_url;

	// 商户扩展信息
	// #商户可以任意填写1K 的字符串,支付成功时将原样返回.
	$pa_MP = $out_trade_no;

	// 支付通道编码
	// #默认为""，到易宝支付网关.若不需显示易宝支付的页面，直接跳转到各银行、神州行支付、骏网一卡通等支付页面，该字段可依照附录:银行列表设置参数值.

	$pd_FrpId = "";


	// 应答机制
	// #默认为"1": 需要应答机制;
	$pr_NeedResponse = "1";
//var_dump($p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $pr_NeedResponse);
//var_dump($service);
	// 调用签名函数生成签名串
	$hmac = getReqHmacString ( $p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $pr_NeedResponse );
	//var_dump($hmac);die;

	$form = <<<EOT
<form  id='yeepaysubmit' name='yeepaysubmit' action='$reqURL_onLine' method='post'>
<input type='hidden' name='p0_Cmd'					value='$p0_Cmd'>
<input type='hidden' name='p1_MerId'				value='$p1_MerId'>
<input type='hidden' name='p2_Order'				value='$p2_Order'>
<input type='hidden' name='p3_Amt'					value='$p3_Amt'>
<input type='hidden' name='p4_Cur'					value='$p4_Cur'>
<input type='hidden' name='p5_Pid'					value='$p5_Pid'>
<input type='hidden' name='p6_Pcat'					value='$p6_Pcat'>
<input type='hidden' name='p7_Pdesc'				value='$p7_Pdesc'>
<input type='hidden' name='p8_Url'					value='$p8_Url'>
<input type='hidden' name='p9_SAF'					value='$p9_SAF'>
<input type='hidden' name='pa_MP'						value='$pa_MP'>
<input type='hidden' name='pd_FrpId'				value='$pd_FrpId'>
<input type='hidden' name='pr_NeedResponse'	value='$pr_NeedResponse'>
<input type='hidden' name='hmac'						value='$hmac'>
<button type='submit' class='hidden' name='v_action' value='确认付款' onClick='document.forms["yeepay"].submit();'  style='display:none;'>确认付款</button>
</form>
<script>document.forms['yeepaysubmit'].submit();</script>
EOT;
	return $form;
}

