<?php	defined ( 'ADMIN_KEKE' ) or 	exit ( 'Access Denied' );
kekezu::admin_check_role ( 33 );
$kf_obj = keke_table_class::get_instance ( "witkey_space" );
$member_obj = new Keke_witkey_member_class ();
$space_obj = new Keke_witkey_space_class ();
$url = 'index.php?do=user&view=custom_list&uid=' . $w [uid] . '&username=' . $w [username] . '&w[page_size]=' . $w [page_size] . '&status=' . $w [status] . '&ord[uid]=' . $ord[uid];
switch ($op) {
	case "add" :
		if ($is_submit) {
			die('1');
			$m_info = db_factory::get_one ( " select uid,username,group_id from " . TABLEPRE . "witkey_space where uid = '$fds[uid]'" );
			!$m_info and kekezu::admin_show_msg ( $_lang['user_no_exit'], $url,3,'','warning' );
			if ($m_info) {
				if ($m_info [group_id] == 7) {
					kekezu::admin_show_msg ( $_lang['no_operate_again_for_user_is_kf_'], $url,3,'','warning' );
				} else {
					$space_obj->setUid ( $fds [uid] );
					$space_obj->setGroup_id ( 7 );
					$res = $space_obj->edit_keke_witkey_space ();
					if ($res) {
						kekezu::admin_system_log ( $_lang['add_new_kf'].$m_info[username] );
						$v_arr = array($_lang['admin_name']=>$admin_info['username'],$_lang['account']=>$spaceinfo ['username']);
	                    keke_msg_class::notify_user($fds ['uid'],$m_info ['username'],'kf_set',$_lang['user_group_set'],$v_arr);
						kekezu::admin_show_msg ( $_lang['add_kf_successfully'], $url,3,'','success' );
					}
				}
			}
		}
		require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_custom_add' );
		die();
		break;
	case "del" :
		$del_info = kekezu::get_user_info($delid);
		$delid or kekezu::admin_show_msg ( $_lang['param_error'], $url,3,'','warning' );
		$res = db_factory::execute (sprintf( "update %switkey_space set group_id = 0 where uid = '%d' ",TABLEPRE,$delid ));
		kekezu::admin_system_log( $_lang['delete_kf']. $del_info[username] );
		$res and kekezu::admin_show_msg ( $_lang['operate_notice'], $url ,2,$_lang['delete_success'],'success') or kekezu::admin_show_msg ( $_lang['operate_notice'], $url ,2,$_lang['delete_fail'],'warning');
		break;
}
		if($sbt_action){
			$keyids = $ckb;
			if(is_array($keyids)){
				$ids = implode ( ',', $keyids );
				$res = db_factory::execute ( sprintf("update %switkey_space set group_id = 0 where uid in (%s) ",TABLEPRE,$ids) );
				kekezu::admin_system_log( $_lang['more_delete_kfs'] . $ids);
				$res and kekezu::admin_show_msg($_lang['operate_notice'],$url,2,$_lang['mulit_operate_success']) or kekezu::admin_show_msg($_lang['operate_notice'],$url,2,$_lang['mulit_operate_fail'],"error");
			}
		}
		$sql = " 1 = 1 and group_id != 0 ";
		$w[page_size] and $p_size=intval($w[page_size]) or $p_size=10;
		$page = intval($page) ? intval($page) : 1;
		$w[uid] and $sql.=" and uid='$w[uid]'";
		$w[username] and $sql.=" and username like '%$w[username]%'";
		$w[status]==1 and $sql.=" and status = 1";
		$w[status]==2 and $sql.=" and status = 0";
		$ord[uid] and $sql.=" order by uid ".$ord[uid] or $sql.=" order by uid desc ";
		$space_obj->setWhere ( $sql );
		$count = $space_obj->count_keke_witkey_space ();
		$limit = $p_size;
		$kekezu->_page_obj -> setAjax(1);
		$kekezu->_page_obj -> setAjaxDom('ajax_dom');
		$pages = $kekezu->_page_obj->getPages ( $count, $limit, $page, $url );
		$space_obj->setWhere ( $sql . $pages ['where'] );
		$userlist_arr = $space_obj->query_keke_witkey_space ();
		$grouplist_arr = keke_admin_class::get_user_group ();
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_custom_list' );
