<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$login_limit = $_SESSION ['login_limit']; 
$remain_times = $login_limit - time (); 
$allow_times = $admin_obj->times_limit ( $allow_num ); 
if ($is_submit) {
	CHARSET=='gbk' and $user_name = kekezu::utftogbk ( $user_name );
	$admin_obj->admin_login ( $user_name, $pass_word, $allow_num, $token );
	die();
}
require keke_tpl_class::template ( ADMIN_DIRECTORY.'/tpl/admin_' . $do );