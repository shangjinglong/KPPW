<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 13 );
$menuset_arr = keke_admin_class::get_admin_menu ();
$membergroup_obj = new Keke_witkey_member_group_class ();
$grouplist_arr = $membergroup_obj->query_keke_witkey_member_group ();
if ($op == 'del') {
	$editgid = $editgid ? $editgid : kekezu::admin_show_msg ( $_lang['param_error'], "index.php?do=user&view=back&type=group",3,'','warning');
	$membergroup_obj->setWhere ( "group_id='{$editgid}'" );
	$membergroup_obj->del_keke_witkey_member_group ();
	kekezu::admin_system_log ( $_lang['delete_user_group']."$groupinfo_arr[groupname]" );
	kekezu::admin_show_msg ( $_lang['operate_success'], "index.php?do=user&view=group_list", 3 ,'','success');
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_group_list' );