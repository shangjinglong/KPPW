<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 11 );
$page_obj = $kekezu->_page_obj;
$edituid and $memberinfo_arr = kekezu::get_user_info ( $edituid );
$table_class = new keke_table_class ( 'witkey_space' );
$member_class = new keke_table_class ( 'witkey_member' );
$url_str = "index.php?do=$do&view=$view&space[username]={$space['username']}&space[uid]={$space['uid']}&slt_page_size=$slt_page_size&ord[0]={$ord['0']}&ord[1]={$ord['1']}&slt_static=$slt_static";
$grouplist_arr = keke_admin_class::get_user_group ();
switch ($op) {
	case "del" : 
		$del_uid = keke_user_class::user_delete ( $edituid );
		kekezu::admin_system_log ( kekezu::lang ( 'delete_member}' ) . $memberinfo_arr ['username'] );
		$del_uid and kekezu::admin_show_msg ( $_lang['operate_success'], "index.php?do=user&view=list", 3, '', 'success' ) or kekezu::admin_show_msg ( $_lang['operate_fail'], "index.php?do=user&view=list", 3, '', 'warning' );
		break;
	case "disable" : 
		$sql = sprintf ( "update  %switkey_space set status=2 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		$v_arr = array ($_lang['username'] => $memberinfo_arr['username'], $_lang['website_name'] => $kekezu->_sys_config['website_name'] );
		keke_shop_class::notify_user ( $memberinfo_arr ['uid'], $memberinfo_arr ['username'], 'freeze', $_lang['user_freeze'], $v_arr );
		kekezu::admin_system_log ( $_lang['unfreeze_member'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], "index.php?do=user&view=list", 3, '', 'success' );
		break;
	case "able" : 
		kekezu::admin_check_role ( 24 );
		$sql = sprintf ( "update  %switkey_space set status=1 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		$v_arr = array ($_lang['username'] => $memberinfo_arr['username'], $_lang['website_name'] => $kekezu->_sys_config['website_name'] );
		keke_msg_class::notify_user ( $memberinfo_arr ['uid'], $memberinfo_arr ['username'], 'unfreeze', $_lang['user_unfreeze'], $v_arr );
		kekezu::admin_system_log ( $_lang['unfreeze_member'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], "index.php?do=user&view=list", 3, '', 'success' );
		break;
	case 'recommend':
		$sql = sprintf ( "update  %switkey_space set recommend=1 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang['recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], $url_str.'&page='.$page, 3, '', 'success' );
		break;
	case 'move_recommend':
		$sql = sprintf ( "update  %switkey_space set recommend=0 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang['move_recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], $url_str.'&page='.$page, 3, '', 'success' );
		break;
}
if ($sbt_action && is_array ( $ckb )) {
	$ids = implode ( ',', $ckb );
	$sql = sprintf ( "select uid,username from %switkey_space where uid in (%s)", TABLEPRE, $ids );
	$space_arr = db_factory::query ( $sql );
	switch ($sbt_action) {
		case $_lang['mulit_delete'] : 
			if(in_array(1,$ckb)){
				kekezu::admin_show_msg ( "操作失败", 'index.php?do=user&view=list', 3, "系统账号无法删除", 'warning' );
			}
			$table_class->del ( 'uid', $ckb );
			$member_class->del ( 'uid', $ckb );
			db_factory::execute ( sprintf ("delete from %switkey_shop where uid in (%s) ", TABLEPRE, $ids ));
			db_factory::execute(sprintf("delete from %switkey_service where uid in (%s)",TABLEPRE,$ids));
			kekezu::admin_system_log ( $_lang['delete_user'] . "$ids" );
			kekezu::admin_show_msg ( $_lang['operate_success'], 'index.php?do=user&view=list', 3, $_lang['mulit_operate_success'], 'success' );
			break;
		case $_lang['mulit_disable'] : 
			if(in_array(1,$ckb)){
				kekezu::admin_show_msg ( "操作失败", 'index.php?do=user&view=list', 3, "系统账号无法删除", 'warning' );
			}
			$sql = sprintf ( "update  %switkey_space set status=2 where uid in (%s)", TABLEPRE, $ids );
			db_factory::execute ( $sql ); 
			foreach ( $space_arr as $v ) { 
				$v_arr = array ($_lang['username'] => $v['username'], $_lang['website_name'] => $kekezu->_sys_config['website_name'] );
				keke_shop_class::notify_user ( $v ['uid'], $v ['username'], 'freeze', $_lang['user_freeze'], $v_arr );
			}
			kekezu::admin_system_log ( $_lang['freeze_user'] . "$ids" );
			kekezu::admin_show_msg ( $_lang['operate_success'], 'index.php?do=user&view=list', 3, $_lang['mulit_disable'], 'success' );
			break;
		case $_lang['mulit_use'] : 
			$sql = sprintf ( "update  %switkey_space set status=1 where uid in (%s)", TABLEPRE, $ids );
			db_factory::execute ( $sql ); 
			foreach ( $space_arr as $v ) { 
				$v_arr = array ($_lang['username'] => $v['username'], $_lang['website_name'] => $kekezu->_sys_config['website_name']);
				keke_msg_class::notify_user ( $v ['uid'], $v ['username'], 'unfreeze', $_lang['user_unfreeze'], $v_arr );
			}
			kekezu::admin_show_msg ( $_lang['operate_success'], 'index.php?do=user&view=list', 3, $_lang['mulit_open_operate_success'], 'success' );
			break;
	}
} else {
	$where_str = " 1=1 ";
	$page or $page = 1;
	$slt_page_size = intval ( $slt_page_size ) ? intval ( $slt_page_size ) : 10;
	$space ['uid'] and $where_str .= "and uid='{$space['uid']}' ";
	$space ['username'] and $where_str .= "and username like '%{$space['username']}%' ";
	$slt_static == 1 and $where_str .= "and status=1 ";
	$slt_static == 2 and $where_str .= "and status=2 ";
	$slt_static == 3 and $where_str .= "and status=3 ";
	$ord[0]&&$ord[1] and $where_str .= " order by {$ord['0']} {$ord['1']}" or $where_str .= " order by uid desc";
	$res = $table_class->get_grid ( $where_str, $url_str, $page, $slt_page_size, null,1,'ajax_dom');
	$userlist_arr = $res ['data'];
	$pages = $res ['pages'];
	$uids = array();
	foreach((array)$userlist_arr as $v){
		$uids[] = $v['uid'];
	}
	$uids and $shop_open = kekezu::get_table_data('shop_id,uid','witkey_shop','uid in ('.implode(',',$uids).')','','','','uid');
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_list' );
