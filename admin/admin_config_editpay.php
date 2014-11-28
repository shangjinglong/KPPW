<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 2 );
$pay_api_obj = keke_table_class::get_instance ( "witkey_pay_api" );
$payment_config = kekezu::get_payment_config ( $payname, $type );
$pay_config = unserialize ( $payment_config ['config'] );
$payment_exist =db_factory::get_count(" select payment from ".TABLEPRE."witkey_pay_api where payment='$payname' and type='$type'");
$payment_config or kekezu::admin_show_msg ( $_lang['wrong_model_directory'], "index.php?do=config&view=pay",3,'','warning' );
$temp = array ();
foreach ( explode ( ";", $payment_config ['initparam'] ) as $item ) {
	$it = explode ( ":", $item );
	$temp [] = array ('k' => $it ['0'], 'name' => $it ['1'], 'v' => $payment_config [$it ['0']] );
}
$items = $temp;
if (isset ( $sbt_edit )) {
	$pay_config = array ();
	$pay_config ['pay_status'] = $fds ['pay_status'];
	switch ($payname) {
		case 'alipayjs' :
			$pay_config ['account'] = $fds ['account'];
			$pay_config ['seller_id'] = $fds ['seller_id'];
			$pay_config ['safekey'] = $fds ['safekey'];
			$pay_config ['account_name'] = $fds ['account_name'];
			break;
		case 'alipaydual' :
				$pay_config ['account'] = $fds ['account'];
				$pay_config ['seller_id'] = $fds ['seller_id'];
				$pay_config ['safekey'] = $fds ['safekey'];
				$pay_config ['account_name'] = $fds ['account_name'];
				break;
		case 'chinabank' :
			$pay_config ['seller_id'] = $fds ['seller_id'];
			$pay_config ['safekey'] = $fds ['safekey'];
			break;
		case 'paypal' :
			$pay_config ['account'] = $fds ['account'];
			break;
		case 'tenpay' :
		case 'yeepay':
			$pay_config ['seller_id'] = $fds ['seller_id'];
			$pay_config ['safekey'] = $fds ['safekey'];
			break;
		case 'alipay_trust' :
			$pay_config ['account'] = $fds ['account'];
			$pay_config ['seller_id'] = $fds ['seller_id'];
			$pay_config ['safekey'] = $fds ['safekey'];
			break;
	}
	$pay_config ['descript'] = $fds['descript'];
	$pay['config']=serialize ( $pay_config );
	$res=$pay_api_obj->save($pay,$pk);
	kekezu::admin_system_log($_lang['config'].$payname);
		$file_obj = new keke_file_class();
		$file_obj->delete_files(S_ROOT."./data/data_cache/");
		unset($items);
		kekezu::admin_show_msg ( $_lang['submit'], 'index.php?do=config&view=pay&op=' . $type,3,'','success' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );