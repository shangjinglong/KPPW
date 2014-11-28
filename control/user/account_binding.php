<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=account&op=binding';
$arrApiNames= keke_glob_class::get_open_api();
$strOauthUrl = $kekezu->_sys_config['website_url']."/index.php?do=$do&view=$view&op=$op&ac=$ac&type=$type";
$res = kekezu::get_table_data('*','witkey_member_oauth','uid='.$gUid,"","source",6,"source");
if (is_array ( $api_open )) {
	foreach ( $api_open as $key => $value ) {
		$value = array ("open" => $value );
		if ($res [$key]) {
			$t [$key] = array_merge ( $value, $res [$key] );
		} else {
			$t [$key] = $value;
		}
	}
}
switch ($ac) {
	case 'bind':   
		if($type){
			switch($type=="alipay_trust"){
				case true:
					$interface = "sns_bind";
					require S_ROOT."/payment/alipay_trust/order.php";
					header("Location:".$request);
					break;
				case false:
					if(in_array($type, array_keys(UserCenter::getOauthType()))){
						UserCenter::oauthRoute($type);
					}
					break;
			}
		}
		break;
	case 'unbind':  
		if(abs(intval($id))){
			switch($type=="alipay_trust"){
				case true:
					$interface = "cancel_bind";
					require S_ROOT."/payment/alipay_trust/order.php";
					header("Location:".$request);
					break;
				case false:
					$objMemberOauth = new Keke_witkey_member_oauth_class();
					$objMemberOauth->setId($id);
					$objMemberOauth->del_keke_witkey_member_oauth();
					kekezu::show_msg('解绑成功',$strUrl,null,null,'ok');
					break;
			}
		}
		break;
}
