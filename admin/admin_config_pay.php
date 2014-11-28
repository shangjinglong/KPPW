<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 2 );
$pay_obj = new Keke_witkey_pay_config_class ();
$op or $op = 'config';
$kekezu->_cache_obj->gc();
$url = "index.php?do=$do&view=$view&op=$op";
if (isset ( $sbt_edit )) {
	db_factory::execute("TRUNCATE TABLE ".TABLEPRE."witkey_pay_config");
	if (is_array ( $fds )) {
		foreach ( $fds as $k => $v ) {
			$pay_obj->setConfig_id(null);
			$pay_obj->setK( $k );
			$pay_obj->setV($v);
			$res .= $pay_obj->create_keke_witkey_pay_config();
		}
	}
	$kekezu->_cache_obj->del ( "keke_witkey_paypal_config" );
	kekezu::admin_system_log ( $_lang ['edit_pay_config'] );
	kekezu::admin_show_msg ( $_lang ['pay_config_set_success'], $url, 3, '', 'success' );
}
switch ($op) {
	case "config" :
		$pay_config = kekezu::get_table_data ( "*", "witkey_pay_config", '', '', "", '', 'k' );
		break;
	case "online" :
		$payment_list = kekezu::get_payment_config ();
		break;
	case "trust" :
		if ($ac == 'edit') {
			require S_ROOT . "payment/" . $pay_dir . "/admin/admin_edit.php";
		} else {
			$payment_list = kekezu::get_payment_config ( '', $op );
		}
		break;
	case "offline" :
		$bank_arr = keke_glob_class::get_bank ();
		$payment_list = kekezu::get_payment_config ( '', $op );
		if ($ac) {
			$pay = $payment_list [$payment]; 
			$pay ['config'] and $pay_config = unserialize ( stripslashes($pay ['config'] )); 
			$pay_api_obj = new Keke_witkey_pay_api_class ();
			if ($ac == 'del') {
				$pay_api_obj->setWhere ( " payment='$payment'" );
				$res = $pay_api_obj->del_keke_witkey_pay_api ();
				$res and kekezu::admin_show_msg ( $_lang ['delete_success'], "index.php?do=config&view=pay&op=offline", "3", '', 'success' ) or kekezu::admin_show_msg ( $_lang ['delete_fail'], "index.php?do=config&view=pay&op=offline", "3", '', 'warning' );
			} elseif ($confirm) {
				$config = serialize ( $conf );
				if ($ac == 'edit') {
					$pay_api_obj->setWhere ( " payment='$payment'" );
					$pay_api_obj->setConfig ( kekezu::k_input ( $config ) );
					$res = $pay_api_obj->edit_keke_witkey_pay_api ();
					kekezu::admin_system_log ( $_lang ['edit'] . $payment );
				} else {
					if (! db_factory::get_count ( sprintf ( " select payment from %switkey_pay_api where payment='%s'", TABLEPRE, $payment ) )) {
						$pay_api_obj->setPayment ( $payment );
						$pay_api_obj->setType ( 'offline' );
						$pay_api_obj->setConfig ( kekezu::k_input ( $config ) );
						$res = $pay_api_obj->create_keke_witkey_pay_api ();
						kekezu::admin_system_log ( $_lang ['create'] . $payment );
					}
				}
				kekezu::empty_cache ();
				$res and kekezu::admin_show_msg ( $_lang ['edit_add_success'], "index.php?do=config&view=pay&op=offline", "3", '', 'success' ) or kekezu::admin_show_msg ( $_lang ['edit_add_fail'], "index.php?do=config&view=pay&op=offline", "3", '', 'warning' );
			}
			require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view . '_offline' );
			die ();
		}
		break;
	case "disable" : 
		$pay_api_obj = keke_table_class::get_instance ( "witkey_pay_api" );
		$payment_list = kekezu::get_table_data ( "*", "witkey_pay_api", "", '', '', '', 'payment' );
		$payment_config = $payment_list [$payname];
		$pay_config = unserialize ( stripslashes($payment_config ['config'] ));
		$pay_config ['pay_status'] = 0;
		$pay ['config'] = serialize ( $pay_config );
		$res = $pay_api_obj->save ( $pay, array ("payment" => $payname ) );
		$op = $ac;
 		$url = "index.php?do=$do&view=$view&op=$op";
		kekezu::empty_cache ();
		$res and kekezu::admin_show_msg ( $_lang ['close_success'], $url, "3", '', 'success' ) or kekezu::admin_show_msg ( $_lang ['close_faile'], $url, "3", '', 'warning' );
		break;
	case "allow" : 
		$payment_list = kekezu::get_table_data ( "*", "witkey_pay_api", "", '', '', '', 'payment' );
		$payment_config = $payment_list [$payname];
		$pay_config = unserialize (stripslashes( $payment_config ['config'] ));
		$pay_config ['pay_status'] = 1;
		$res = db_factory::updatetable ( TABLEPRE . 'witkey_pay_api', array ("config" => serialize ( $pay_config ) ), array ("payment" => $payname ) );
		$op = $ac;
 		$url = "index.php?do=$do&view=$view&op=$op";
		kekezu::admin_system_log ( "allow" . $payname );
		kekezu::empty_cache ();
		$res and kekezu::admin_show_msg ( $_lang ['open_success'], $url, "3", '', 'success' ) or kekezu::admin_show_msg ( $_lang ['open_fail'], $url, "3", '', 'warning' );
		break;
	default :
		;
		break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );