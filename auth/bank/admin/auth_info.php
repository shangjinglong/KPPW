<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$bank_obj = new Keke_witkey_auth_bank_class(); 
$pay_tool_arr = array (1 =>$_lang['alipay'], 2 => $_lang['tenpay'], 3 => $_lang['payment_online'] );
$bank_name_arr = keke_glob_class::get_bank();
if ($sbt_pay_to_user) {
	$bank_obj->setWhere ( 'bank_a_id=' . $fds['bank_a_id'] );
	$bank_obj->setPay_to_user_cash ( $fds['pay_to_user_cash'] );
	$bank_obj->setPay_time ( time () );
	$res = $bank_obj->edit_keke_witkey_auth_bank();
	$bank_info = db_factory::get_one(sprintf(" select uid,username from %switkey_auth_bank where bank_a_id = '%d'",TABLEPRE,$fds[bank_a_id]));
	$v_arr = array($_lang['username']=>$bank_info['username']);
	keke_msg_class::notify_user($bank_info ['uid'],$bank_info['username'],'bank_auth',$_lang['bank_auth_notice'],$v_arr);
	$res and kekezu::admin_show_msg ( $_lang['give_cach_success'],$_SERVER['HTTP_REFERER'],'3','','success');
}else{
	$bank_a_id and $bank_info = db_factory::get_one(sprintf(" select a.*,b.bank_full_name from %switkey_auth_bank a left join %switkey_member_bank b
			 on a.bank_id=b.bank_id
			where a.bank_a_id = '%d'",TABLEPRE,TABLEPRE,$bank_a_id));
}
require $template_obj->template ( 'auth/' . $auth_dir . '/admin/tpl/auth_info' );