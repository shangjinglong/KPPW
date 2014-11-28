<?php
 /**
 * @copyright keke-tech
 * @author Monkey
 * @version v 1.0
 * 2010-9-8下午04:28:19
 */

defined('IN_KEKE') or 	exit('Access Denied');

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
function get_pay_url($charge_type,$pay_amount,$payment_config,$subject,$order_id,$model_id=null,$obj_id=null, $service ="create_direct_pay_by_user", $sign_type = 'MD5', $show_url='index.php?do=user&view=finance&op=details') {
	global $_K,$uid,$username;
	$partner = $payment_config['seller_id'];;
	$security_code = $payment_config['safekey'];
	//$seller_email = $payment_config['account'];
	$return_url = $_K ['siteurl'] . '/include/payment/chinabank/return.php';
	$notify_url = $_K ['siteurl'] . '/include/payment/chinabank/notify.php';
	$show_url = $_K ['siteurl'] . '/'.$show_url;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".date('His',time());
	$total_money =$pay_amount ;
	$charge_type=='order_charge' and $t = "订单充值" or $t="余额充值";
	$body = $t."(from:".$username.")";
	$text = $pay_amount."CNY".$out_trade_no.$partner.$return_url.$security_code;        //md5加密拼凑串,注意顺序不能变
	$v_md5info = strtoupper(md5($text));                             //md5函数加密并转化成大写字母
    $p = array("v_mid"=>$partner,
    			"v_oid"=>$out_trade_no,
    			"v_amount"=>$pay_amount,
    			"v_moneytype"=>"CNY",
    			"remark2"=>'[url:='.$notify_url.']',
    			"v_url"=>$return_url,
    		 	"v_md5info"=>$v_md5info);
	return  build_postform($p);
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='E_FORM' action='https://Pay3.chinabank.com.cn/PayGate' method='post'>";
	while (list ($key, $val) = each ($p)) {
		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	}
	$sHtml = $sHtml."</form>";
	$sHtml = $sHtml."<button type='submit' style='display:none;' name='v_action' value='网银确认付款' onClick='document.forms[\"E_FORM\"].submit();'>网银确认付款</button>";
	$sHtml = $sHtml."<script>document.forms['E_FORM'].submit();</script>";
	return $sHtml;
}


