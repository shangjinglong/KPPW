<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$menuset_arr = keke_admin_class::get_admin_menu ();
$membergroup_obj = new Keke_witkey_member_group_class ();
if ($editgid) {
	$membergroup_obj->setWhere ( "group_id=$editgid" );
	$groupinfo_arr = $membergroup_obj->query_keke_witkey_member_group ();
	$groupinfo_arr = $groupinfo_arr ['0'];
}
$grouparr = keke_admin_class::get_user_group ();
if ($op == 'add') {
	kekezu::admin_check_role ( 12 );
	if ($is_submit) {
		$txt_groupname = $txt_groupname ? $txt_groupname : kekezu::admin_show_msg ( $_lang['please_input_group_name'],'',3,'','warning' );
		$chb_resource = $chb_resource ? implode ( ',', $chb_resource ) : kekezu::admin_show_msg ( $_lang['you_no_choose_rights'], $_SERVER ['REFERER'],3,'','warning' );
		$membergroup_obj->setWhere ( "groupname='{$txt_groupname}' and group_id != '{$editgid}'" );
		if ($membergroup_obj->query_keke_witkey_member_group ()) {
			kekezu::admin_show_msg ( $_lang['the_user_group_already_exists'], $_SERVER ['REFERER'],3,'','warning' );
		}
		$membergroup_obj->setGroupname ( kekezu::escape($txt_groupname) );
		$membergroup_obj->setGroup_roles ( $chb_resource );
		$membergroup_obj->setOn_time ( time ( 'now()' ) );
		if ($editgid) {
			$membergroup_obj->setWhere ( "group_id={$editgid}" );
			$membergroup_obj->edit_keke_witkey_member_group ();
			kekezu::admin_system_log ($_lang['edit_user_group'] . "$txt_groupname" );
		} else {
			$res = $membergroup_obj->create_keke_witkey_member_group ();
			kekezu::admin_system_log ( $_lang['creat_user_group']."$txt_groupname" );
		}
		kekezu::admin_show_msg ( $_lang['operate_success'], $_SERVER ['REFERER'],3,'','success' );
	}
	$grouprole_arr = array ();
	$editgid and $grouprole_arr = explode ( ',', $groupinfo_arr ['group_roles'] );
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_group_add' );
}
