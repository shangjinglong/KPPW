<?php
defined ( "ADMIN_KEKE" ) or exit ( "Access Denied" ); 
kekezu::admin_check_role(77);
$mobile_obj = new keke_witkey_auth_mobile_class (); 
$url = "index.php?do=" . $do . "&view=" . $view . "&code=" . $code . "&w[page_size]=" . $w [page_size] . "&w[mobile_a_id]=" . $w [mobile_a_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; 
if (isset ( $ac )) {
	switch ($ac) {
		case "pass" : 
			kekezu::admin_system_log($obj.$_lang['mobile_auth_pass']);
			$auth_obj->review_auth ( $record_id, 'pass' );
			break;
		case "not_pass" : 
			kekezu::admin_system_log($obj.$_lang['mobile_auth_nopass']);
			$auth_obj->review_auth ( $record_id, 'not_pass' );
			break;
			;
		case 'del' : 
			kekezu::admin_system_log($obj.$_lang['mobile_auth_delete']);
			$auth_obj->del_auth ( $record_id );
			break;
	}
} elseif (isset ( $sbt_action )) {
	$keyids = $ckb;
	switch ($sbt_action) {
		case $_lang['mulit_delete']: 
			kekezu::admin_system_log($_lang['mulit_delete_mobile']);
			$auth_obj->del_auth ( $keyids );
			break;
			;
		case $_lang['mulit_pass']: 
			kekezu::admin_system_log($_lang['mulit_pass_mobile']);
			$auth_obj->review_auth ( $keyids, 'pass' );
			break;
			;
		case $_lang['mulit_nopass']: 
			kekezu::admin_system_log($_lang['mulit_nopass_mobile']);
			$auth_obj->review_auth ( $keyids, 'not_pass' );
			break;
	}
} else 
{
	$where = " 1 = 1 "; 
	($w ['auth_status'] === "0" and $where .= " and auth_status = 0 ") or ($w ['auth_status'] and $where .= " and auth_status = '$w[auth_status]' "); 
	intval ( $w ['mobile_a_id'] ) and $where .= " and mobile_a_id = " . intval ( $w ['mobile_a_id'] ) . ""; 
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; 
	$where.=" order by mobile_a_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; 
	$mobile_obj->setWhere ( $where ); 
	$count = $mobile_obj->count_keke_witkey_auth_mobile();
	abs(intval ( $page )) or $page = 1 ;
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$mobile_obj->setWhere ( $where . $pages [where] );
	$mobile_arr = $mobile_obj->query_keke_witkey_auth_mobile();
	require $kekezu->_tpl_obj->template ( "auth/" . $auth_dir . "/admin/tpl/auth_list" );
}