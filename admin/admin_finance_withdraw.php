<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 5 );
$withdraw_obj = new Keke_witkey_withdraw_class (); 
$user_space_obj = new Keke_witkey_space_class (); 
$page_obj = $kekezu->_page_obj; 
$paytype_list = kekezu::get_table_data ( "payment,config", "witkey_pay_api", " type!='trust'", "", "", "", "payment" );
$status_arr  = keke_glob_class::withdraw_status();
$bank_arr = keke_glob_class::get_bank();
$arr_online   = keke_glob_class::get_online_pay();
$bank_arr = array_merge($bank_arr,$arr_online);
$w ['page_size'] and $page_size = intval ( $w ['page_size'] ) or $page_size = 10;
$page and $page = intval ( $page ) or $page = '1';
$url = "index.php?do=$do&view=$view&w[pay_type]=".$w['pay_type']."&w[page_size]=$page_size&w[ord]=".$w['ord']."&page=$page";
$withdraw_id and $withdraw_info = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_withdraw where withdraw_id = '$withdraw_id'" );
if (isset ( $ac )) { 
	switch ($ac) {
		case 'pass' : 
			if ($withdraw_info['withdraw_status']) {
				if ($is_submit) {
					$user_space_info = kekezu::get_user_info ( $withdraw_info ['uid'] );
					if ($withdraw_info ['withdraw_status'] != 1) {
						kekezu::admin_show_msg ( $_lang['no_need_to_repeat'], 'index.php?do=' . $do . '&view=' . $view,3,'','warning' );
					}
					$withdraw_obj->setWhere ( 'withdraw_id=' . $withdraw_id );
					$withdraw_obj->setWithdraw_status ( 2 );
					$withdraw_obj->setProcess_uid ( $admin_info ['uid'] );
					$withdraw_obj->setProcess_username ( $admin_info ['username'] );
					$withdraw_obj->setProcess_time ( time () );
					$fee = $withdraw_info['withdraw_cash']-keke_finance_class::get_to_cash($withdraw_info['withdraw_cash']);
					$withdraw_obj->setFee($fee);
					$res = $withdraw_obj->edit_keke_witkey_withdraw ();
					$feed_arr = array ("feed_username" => array ("content" => $withdraw_info ['username'],
					 "url" => "index.php?do=seller&id=".$user_space_info['uid']),
					 "action" => array ("content" => $_lang['withdraw'], "url" => "" )
					, "event" => array ("content" => $withdraw_info ['withdraw_cash'] . $_lang['yuan'], "url" => "" )
					 );
					kekezu::save_feed ( $feed_arr, $user_space_info ['uid'], $user_space_info ['username'], 'withdraw' );
					$v_arr = array('网站名称'=>$_K['sitename'],'提现方式'=>$pay_way[$withdraw_info['pay_type']],'帐户'=>$withdraw_info['pay_account'],'提现金额'=>$withdraw_info['withdraw_cash']);
					keke_msg_class::notify_user( $withdraw_info ['uid'] , $withdraw_info ['username'] ,'draw_success',$_lang['withdraw_success'],$v_arr);
					kekezu::admin_system_log ( $_lang['audit_withdraw_apply'] . $withdraw_id );
					kekezu::admin_show_msg ( $_lang['audit_withdraw_pass'], 'index.php?do=' . $do . '&view=' . $view,3,'','success');
				}else{
					$bank_arr=keke_glob_class::get_bank();
					$k_arr   = array_keys($bank_arr);
				}
				require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_finance_withdraw_info' );
				die ();
			} else {
				kekezu::admin_show_msg ( $_lang['audit_withdraw_not_exist'], 'index.php?do=' . $do . '&view=' . $view,3,'','warning' );
			}
			;
			break;
		case 'nopass' :
			if ($withdraw_info) {
				$withdraw_obj->setWhere ( 'withdraw_id=' . $withdraw_id );
				$withdraw_obj->setWithdraw_status (3);
				$withdraw_obj->setProcess_uid ( $admin_info ['uid'] );
				$withdraw_obj->setProcess_username ( $admin_info ['username'] );
				$withdraw_obj->setProcess_time ( time () );
				$res = $withdraw_obj->edit_keke_witkey_withdraw();
				$withdraw_cash = $withdraw_info ['withdraw_cash'];
				$uid = $withdraw_info  ['uid'];
				$username = $withdraw_info  ['username'];
				$pay_way = array_merge(keke_glob_class::get_bank(),keke_glob_class::get_online_pay());
				$data = array(':pay_way'=>$pay_way[$withdraw_info['pay_type']],':pay_account'=>$withdraw_info['pay_account'],':pay_name'=>$withdraw_info['pay_name']);
				keke_finance_class::init_mem('withdraw_fail', $data);
				keke_finance_class::cash_in ( $uid, $withdraw_cash, 'withdraw_fail' );
				$v_arr = array('网站名称'=>$_K['sitename'],'提现方式'=>$pay_way[$withdraw_info['pay_type']],'帐户'=>$withdraw_info['pay_account'],'提现金额'=>$withdraw_info['withdraw_cash']);
	         	keke_msg_class::notify_user($uid,$username,'withdraw_fail',$_lang['fail_and_check_you_account'],$v_arr);
				kekezu::admin_system_log ( $_lang['delete_audit_withdraw'] . $withdraw_id );
				kekezu::admin_show_msg ( $_lang['delete_audit_withdraw_success'], 'index.php?do=' . $do . '&view=' . $view,3,'','success' );
			} else {
				kekezu::admin_show_msg ( $_lang['fail_item_not_exist'], 'index.php?do=' . $do . '&view=' . $view,3,'','warning' );
			}
			;
			break;
	}
} elseif (isset ( $ckb )) { 
	$ids = implode ( ',', $ckb );
	if (count ( $ids )) {
		$withdraw_obj->setWhere ( " withdraw_id in ('$ids') and withdraw_status =1 " );
		$nodraw_arr = $withdraw_obj->query_keke_witkey_withdraw ();
		$withdraw_obj->setWhere ( ' withdraw_id in (' . $ids . ') ' );
		switch ($sbt_action) {
			case $_lang['mulit_nopass']: 
				foreach ( $nodraw_arr as $v ) {
					if($v[withdraw_status]== 1){
					$withdraw_id = $v ['withdraw_id'];
					$where = "withdraw_id = '$withdraw_id' ";
					$withdraw_info = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_withdraw where $where" );
					$withdraw_cash = $withdraw_info ['withdraw_cash'];
					$uid = $withdraw_info ['uid'];
					$username = $withdraw_info ['username'];
					$pay_way = array_merge(keke_glob_class::get_bank(),keke_glob_class::get_online_pay());
					$data = array(':pay_way'=>$pay_way[$withdraw_info['pay_type']],':pay_account'=>$withdraw_info['pay_account'],':pay_name'=>$withdraw_info['pay_name']);
					keke_finance_class::init_mem('withdraw_fail', $data);
					keke_finance_class::cash_in ( $uid, $withdraw_cash, 0, 'withdraw_fail' );
					$v_arr = array('网站名称'=>$_K['sitename'],'提现方式'=>$pay_way[$withdraw_info['pay_type']],'帐户'=>$withdraw_info['pay_account'],'提现金额'=>$withdraw_cash);
					keke_msg_class::notify_user($uid,$username,'withdraw_fail',$_lang['fail_and_check_you_account'],$v_arr);
					}
				}
				$withdraw_obj->setWithdraw_status (3);
				$res = $withdraw_obj->edit_keke_witkey_withdraw();
				kekezu::admin_system_log ( $_lang['delete_audit_withdraw'] . $ids );
				break;
			case $_lang['mulit_review']: 
				$withdraw_obj->setWhere ( ' withdraw_id in (' . $ids . ') ' );
				$withdraw_arr = $withdraw_obj->query_keke_witkey_withdraw ();
				foreach ( $withdraw_arr as $k=>$v ) {
					if($v[withdraw_status]== 1){
						$fee = $v['withdraw_cash'] - keke_finance_class::get_to_cash($v['withdraw_cash']);
						db_factory::execute(sprintf(' update %switkey_withdraw set fee=%.2f where withdraw_id=%d',TABLEPRE,$fee,$v['withdraw_id']));
						$v_arr = array('网站名称'=>$_K['sitename'],'提现方式'=>$pay_way[$v['pay_type']],'帐户'=>$v['pay_account'],'提现金额'=>$v['withdraw_cash']);
						keke_msg_class::notify_user($v ['uid'],$v['username'],'draw_success',$_lang['withdraw_success'],$v_arr);
						$feed_arr = array ("feed_username" => array ("content" => $v ['username'], "url" => "index.php?do=seller&id=".$space_info['uid']), "action" => array ("content" => $_lang['withdraw'], "url" => "" ), "event" => array ("content" =>$_lang['withdraw_le'].$v['withdraw_cash']. $_lang['yuan'],"url" => "" ) );
						kekezu::save_feed ( $feed_arr, $user_space_info ['uid'], $user_space_info ['username'], 'withdraw' );
						$withdraw_obj = new Keke_witkey_withdraw_class();
						$withdraw_obj->setWhere ( ' withdraw_id in (' . $ids . ') ' );
						$withdraw_obj->setWithdraw_status ( 2);
						$withdraw_obj->setProcess_uid ( $admin_info ['uid'] );
						$withdraw_obj->setProcess_username ( $admin_info ['username'] );
						$withdraw_obj->setProcess_time ( time () );
						$withdraw_obj->edit_keke_witkey_withdraw ();
					}
				}
				kekezu::admin_system_log ( $_lang['audit_withdraw_apply'] . $ids );
				break;
		}
		kekezu::admin_show_msg ( $_lang['mulit_operate_success'], 'index.php?do=' . $do . '&view=' . $view,3,'','success');
	} else {
		kekezu::admin_show_msg ( $_lang['choose_operate_item'], 'index.php?do=' . $do . '&view=' . $view,3,'','warning' );
	}
} elseif ($type == 'batch' && $pay_type == 'alipayjs') {
	$payment_config = kekezu::get_payment_config('alipayjs');
	require S_ROOT . "/payment/alipayjs/order.php";
	$detail_data = db_factory::query ( sprintf ( " select withdraw_id,pay_account,pay_username,withdraw_cash, fee,uid from %switkey_withdraw where withdraw_id in (%s) and withdraw_status='1'", TABLEPRE, $ids ) );
	echo get_batch_url ($payment_config, $detail_data,'url');
	die();
} else {
	$where = ' 1 = 1 '; 
	$w ['withdraw_id'] and $where .= " and withdraw_id = '".$w['withdraw_id']."' ";
	$w ['username'] and $where .= " and username like '%".$w['username']."%' ";
	$w ['pay_type'] and $where .= " and pay_type = '".$w['pay_type']."' ";
	is_array($w['ord']) and $where .= ' order by '.$w['ord']['0'].' '.$w['ord']['1'] or $where .= "order by withdraw_id desc";
	$withdraw_obj->setWhere ( $where );
	$count = $withdraw_obj->count_keke_witkey_withdraw ();
	$page_obj->setAjax(1);
	$page_obj->setAjaxDom("ajax_dom");
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url );
	$withdraw_obj->setWhere ( $where . $pages ['where'] );
	$withdraw_arr = $withdraw_obj->query_keke_witkey_withdraw ();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );