<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require 'PayRequestHandler.php';

/**
 * 生成付款url
 * @param string $charge_type  充值类型（order_charge订单充值。user_charge余额充值）
 * @param float $pay_amount 金额 (必填)
 * @param array $payment_config 商家号配置信息组数 (必填)
 * @param string $subject 订单标题 (必填)
 * @param int $order_id 订单ID（必填)
 * @param int $model_id 模型ID（无值表示余额充值，无付款动作)
 * @param int $obj_id   对象ID（ 可空)
 * @param string $service  付款类型(可空）
 * @param string $sign_type 签名类型(可空）
 * @return string url
 */
function get_pay_url($charge_type,$pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = "DEFAULT", $sign_type = 'MD5',$show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid;
	$tenpayid = $payment_config['seller_id'];
	$tenpaykey = $payment_config['safekey'];
 	$tenpay_return_url = $_K ['siteurl'] . '/include/payment/tenpay/return.php';  //回调地址
	$order_no = $order_id;
	$product_name = $subject;
	$order_price = $pay_amount;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}";
	$remarkexplain = $out_trade_no;
	/* 商户号 */
	$bargainor_id = $tenpayid;

	/* 密钥 */
	$key = $tenpaykey;

	/* 返回处理地址 */
	$return_url = $tenpay_return_url;

	//date_default_timezone_set(PRC);
	$strDate = date("Ymd");
	$strTime = date("His");

	//4位随机数
	$randNum = rand(1000, 9999);

	//10位序列号,可以自行调整。
	$strReq = $strTime . $randNum;

	/* 商家订单号,长度若超过32位，取前32位。财付通只记录商家订单号，不保证唯一。 */
	$sp_billno = $order_no;

	/* 财付通交易单号，规则为：10位商户号+8位时间（YYYYmmdd)+10位流水号 */
	$transaction_id = $bargainor_id . $strDate . $strReq;

	/* 商品价格（包含运费），以分为单位 */
	$total_fee = $order_price*100;

	/* 商品名称 */
	$desc = $product_name;


	/* 创建支付请求对象 */
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);

	//----------------------------------------
	//设置支付参数
	//----------------------------------------
	$reqHandler->setParameter("bargainor_id", $bargainor_id);			//商户号
	$reqHandler->setParameter("sp_billno", $sp_billno);					//商户订单号
	$reqHandler->setParameter("transaction_id", $transaction_id);		//财付通交易单号
	$reqHandler->setParameter("total_fee", $total_fee);					//商品总金额,以分为单位
	$reqHandler->setParameter("return_url", $return_url);				//返回处理地址
	$reqHandler->setParameter("desc", $desc);	//商品名称  remarkexplain
	$reqHandler->setParameter("attach", $remarkexplain);
	$reqHandler->setParameter("bank_type", $service);    //银行类型
	$reqHandler->setParameter('cs',CHARSET);//编码

	//用户ip,测试环境时不要加这个ip参数，正式环境再加此参数
	$reqHandler->setParameter("spbill_create_ip", kekezu::get_ip());


	//请求的URL
	$reqUrl = $reqHandler->getRequestURL();
	//var_dump($reqUrl);die();
	return build_postform ( $reqUrl );
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='E_FORM' action='$p' method='post' enctype='application/x-www-form-urlencoded'>";
	$sHtml = $sHtml."</form>";
	$sHtml = $sHtml."<button type='submit' style='display:none;' name='v_action' value='财付通确认付款' onClick='document.forms[\"E_FORM\"].submit();'>财付通确认付款</button>";
	$sHtml = $sHtml."<script>document.forms['E_FORM'].submit();</script>";
	return $sHtml;
}