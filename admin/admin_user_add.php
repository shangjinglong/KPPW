<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 11 );
$basic_config = $kekezu->_sys_config;
$reg_obj = new keke_register_class ();
$member_class = new keke_table_class ( 'witkey_member' );
$space_class = new keke_table_class ( 'witkey_space' );
$arrTopIndustrys = $kekezu->_indus_p_arr;
$arrAllIndustrys = $kekezu->_indus_arr;
if ($edituid) {
	$member_arr = kekezu::get_user_info ( $edituid );
	$shop_open = db_factory::get_count ( 'select shop_id from ' . TABLEPRE . 'witkey_shop where uid=' . $edituid );
}
$member_group_arr = db_factory::query ( sprintf ( "select group_id,groupname from %switkey_member_group", TABLEPRE ) );
if ($is_submit == 1) {
	if (! $edituid) {
		$reg_uid = $reg_obj->user_register ( $fds ['username'], $fds ['password'], $fds ['email'], null, false, $fds ['password'] );
		unset ( $fds [repassword] );
		$arrAddUserInfo = array ();
		$fds ['truename'] and $arrAddUserInfo ['truename'] = $fds ['truename'];
		$fds ['phone'] and $arrAddUserInfo ['phone'] = $fds ['phone'];
		$fds ['indus_id'] and $arrAddUserInfo ['indus_id'] = $fds ['indus_id'];
		$fds ['indus_pid'] and $arrAddUserInfo ['indus_pid'] = $fds ['indus_pid'];
		$fds ['birthday'] and $arrAddUserInfo ['birthday'] = $fds ['birthday'];
		! empty ( $arrAddUserInfo ) and db_factory::updatetable ( TABLEPRE . 'witkey_space', $arrAddUserInfo, array (
				'uid' => $reg_uid 
		) );
		is_null ( $fds ['group_id'] ) or db_factory::execute ( sprintf ( "update %switkey_space set group_id={$fds['group_id']} where uid=$reg_uid", TABLEPRE ) );
		kekezu::admin_system_log ( $_lang ['add_member'] . $fds ['username'] );
		kekezu::admin_show_msg ( $_lang ['operate_notice'], "index.php?do=user&view=add", 3, $_lang ['user_creat_success'], 'success' );
	} else { 
		$uinfo = kekezu::get_user_info ( $edituid );
		if ($fds ['password']) {
			$slt = db_factory::get_count ( sprintf ( "select rand_code from %switkey_member where uid = '%d'", TABLEPRE, $edituid ) );
			$sec_code = keke_user_class::get_password ( $fds ['password'], $slt );
			$fds ['sec_code'] = $sec_code;
			$newpwd = $fds ['password'];
			$pwd = md5 ( $fds ['password'] );
			$fds [password] = $pwd;
			db_factory::execute ( sprintf ( "update %switkey_member set password ='%s' where uid=%d", TABLEPRE, $pwd, $edituid ) );
		} else {
			unset ( $fds ['password'] );
		}
		keke_user_class::user_edit ( $uinfo ['username'], '', $newpwd, '', 1 );
		$space_class->save ( $fds, array (
				"uid" => "$edituid" 
		) ); 
		kekezu::admin_system_log ( $_lang ['edit_member'] . $member_arr [username] );
		kekezu::admin_show_msg ( $_lang ['edit_success'], $_SERVER ['HTTP_REFERER'], 3, '', 'success' );
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_add' );