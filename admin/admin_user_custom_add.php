<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 33 );
$space_obj = new Keke_witkey_space_class ();
$member_group_arr = db_factory::query ( sprintf ( "select group_id,groupname from %switkey_member_group", TABLEPRE ), 1, 3600 );
$edituid = intval ( $edituid );
$edituid and $spaceinfo = kekezu::get_user_info ( intval ( $edituid ) );
if ($is_submit) {
	if(intval($fds['uid'])  === 1){
		kekezu::admin_show_msg ( '当前用户ID为管理员，禁止设置，请重新输入', "index.php?do=$do&view=custom_list", 2, '', 'warning' );
		die;
	}
	$space_obj = keke_table_class::get_instance("witkey_space");
	$space_obj->save($fds,array('uid'=>$fds['uid']));
 	kekezu::admin_system_log ( $_lang['set_user'] . " $spaceinfo[username]" . $_lang['of_group'] );
 	$v_arr = array($_lang['admin_name']=>$admin_info['username']);
 	keke_msg_class::notify_user($spaceinfo ['uid'],$spaceinfo ['username'],'group_set',$_lang['user_group_set'],$v_arr);
	kekezu::admin_show_msg ( $_lang['rights_set_success'], "index.php?do=$do&view=custom_list", 2, '', 'success' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_custom_add' );
