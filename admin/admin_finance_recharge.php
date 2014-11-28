<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (76 );
$recharge_obj = new Keke_witkey_order_charge_class(); 
$page_obj = $kekezu->_page_obj; 
$charge_type_arr=keke_glob_class::get_charge_type();
$status_arr = keke_order_class::get_order_status();
$offline_pay=kekezu::get_table_data ( "*", "witkey_pay_api", " type='offline'", '', '', '', 'payment' ); 
$w [page_size] and $page_size = intval ( $w [page_size] ) or $page_size =10;
intval ( $page ) or $page = '1';
$url = "index.php?do=$do&view=$view&w[order_status]=$w[order_status]&w[order_id]=$w[order_id]&w[order_type]=$w[order_type]&w[username]=$w[username]&w[page_size]=$page_size&w[ord]=$w[ord]&page=$page";
$bank_arr     = keke_glob_class::get_bank();
if (isset ( $ac )) { 
$order_info=db_factory::get_one(" select * from ".TABLEPRE."witkey_order_charge where order_id = ".intval($order_id));
$message_obj = new keke_msg_class ();
$order_info or kekezu::admin_show_msg ( $_lang['charge_num_not_exist'], $url,3,'','warning');
	switch ($ac) {
		case 'pass' : 
				if ($order_info [order_status] == 'ok') {
					kekezu::admin_show_msg ( $_lang['payment_has_been_success_no_need_repeat'], $url,3,'','warning');
				}
				$recharge_obj->setWhere ( 'order_id =' . $order_id );
				$recharge_obj->setOrder_status('ok' );
				$res = $recharge_obj->edit_keke_witkey_order_charge();
				$user_info = kekezu::get_user_info ( $order_info [uid] );
				$v_arr = array ($_lang['charge_amount'] => $order_info['pay_money']);
				keke_shop_class::notify_user ( $user_info[uid], $user_info[username], "pay_success", $_lang['line_recharge_success'], $v_arr );
				keke_finance_class::cash_in($user_info['uid'], $order_info['pay_money'],'offline_charge','','offline_charge');
				kekezu::admin_system_log ( $_lang['confirm_payment_recharge'].$order_id);
				kekezu::admin_show_msg ( $_lang['message_about_recharge_success'], $url,3,'','success' );
		break;
	case 'del' :
			$recharge_obj->setWhere ( ' order_id=' . $order_id );
			$res = $recharge_obj->del_keke_witkey_order_charge();
			$user_info = kekezu::get_user_info ( $order_info [uid] );
			$v = array ($_lang['recharge_single_num'] => $order_id,$_lang['recharge_cash'] => $order_info [pay_money] );
			$message_obj->send_message ( $user_info ['uid'], $user_info ['username'], 'recharge_fail', $_lang['recharge_fail'], $v, $user_info [email], $user_info ['mobile'] );
			kekezu::admin_system_log ( $_lang['delete_apply_forwithdraw'] . $order_id );
			kekezu::admin_show_msg ( $_lang['message_about_delete'], $url,3,'','success' );
		;
		break;
	}
}elseif (isset ( $ckb )) { 
	$ids = implode ( ',', $ckb );
	if (count ( $ids )) {
		$recharge_obj->setWhere ( " order_id in ($ids) and order_status = 'wait' " );
		$nodraw_arr = $recharge_obj->query_keke_witkey_order_charge();	
		$del_ids=array();
		switch ($sbt_action) {
			case $_lang['mulit_delete'] : 
				foreach ( $nodraw_arr as $k=>$v ) {
					$del_ids[$k]=$v[order_id];
					$message_obj = new keke_msg_class ();
					$user_info=keke_user_class::get_user_info($v[uid]);
					$v = array ($_lang['recharge_single_num'] =>$v['order_id'],$_lang['recharge_cash'] => $v [pay_money] );
					$message_obj->send_message ( $user_info ['uid'], $user_info ['username'], 'recharge_fail', $_lang['recharge_fail'], $v, $user_info [email], $user_info ['mobile'] );
				}
				$del_ids=implode(",", $del_ids);
				if($del_ids){
					$recharge_obj->setWhere ( " order_id in ($del_ids)" );
					$res = $recharge_obj->del_keke_witkey_order_charge();
					kekezu::admin_system_log ( $_lang['delete_recharge_order'].$del_ids );
				}
				break;
		}
		kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success');
	} else {
		kekezu::admin_show_msg ( $_lang['please_select_an_item_to_operate'], 'index.php?do=' . $do . '&view=' . $view,3,'','warning' );
	}
} else {
	$where = ' 1 = 1 '; 
	$w ['order_id'] and $where .= " and order_id = '$w[order_id]' ";
	$w ['order_type'] and $where .= " and order_type = '$w[order_type]'";
	$w ['order_status'] and $where .= " and order_status = '$w[order_status]' ";
	$w ['username'] and $where .= " and username like '%$w[username]%' ";
	is_array($w['ord']) and $where .= ' order by '.$w['ord'][0].' '.$w['ord'][1] or $where.=' order by order_id desc' ;
	$recharge_obj->setWhere ( $where );
	$count = $recharge_obj->count_keke_witkey_order_charge();
	$page_obj->setAjax(1);
	$page_obj->setAjaxDom("ajax_dom");
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
	$recharge_obj->setWhere ( $where . $pages [where] );
	$recharge_arr = $recharge_obj->query_keke_witkey_order_charge();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );