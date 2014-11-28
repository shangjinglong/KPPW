<?php
defined ( "ADMIN_KEKE" ) or exit ( "Access Denied" ); 
kekezu::admin_check_role(147);
$enterprise_obj     = new Keke_witkey_auth_enterprise_class( );
$url = "index.php?do=" . $do . "&view=" . $view . "&code=" . $code . "&w[page_size]=" . $w [page_size] . "&w[enterprise_auth_id]=" . $w [enterprise_auth_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; 
if (isset ( $ac )) {
	switch ($ac) {
		case "pass" : 
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_pass']);			
			$auth_obj->review_auth ( $enterprise_auth_id, 'pass' ,$url);
			break;
		case "not_pass" : 
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_nopass']);
			$auth_obj->review_auth ( $enterprise_auth_id, 'not_pass',$url );
			break;
			;
		case 'del' : 
			kekezu::admin_system_log($obj.$_lang['enterprise_auth_delete']);
			$auth_obj->del_auth ( $enterprise_auth_id,$url );
			break;
	}
} elseif (isset ( $sbt_action )) {
	$keyids = $ckb;
	switch ($sbt_action) {
		case $_lang['mulit_delete'] : 
			kekezu::admin_system_log($_lang['mulit_delete_enterprise_auth']);
			$auth_obj->del_auth ( $keyids,$url );
			break;
			;
		case $_lang['mulit_pass'] : 
			kekezu::admin_system_log($_lang['mulit_pass_enterprise_auth']);
			$auth_obj->review_auth ( $keyids, 'pass',$url );
			break;
			;
		case $_lang['mulit_nopass'] : 
			kekezu::admin_system_log($_lang['mulit_nopass_enterprise_auth']);
			$auth_obj->review_auth ( $keyids, 'not_pass',$url );
			break;
	}
} else{
	$where = " 1 = 1 "; 
	($w ['auth_status'] === "0" and $where .= " and auth_status = 0 ") or ($w ['auth_status'] and $where .= " and auth_status = '$w[auth_status]' "); 
	intval ( $w ['enterprise_auth_id'] ) and $where .= " and enterprise_auth_id = " . intval ( $w ['enterprise_auth_id'] ) . ""; 
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; 
	$where.=" order by enterprise_auth_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; 
	$enterprise_obj->setWhere ( $where ); 
	$count = $enterprise_obj->count_keke_witkey_auth_enterprise();
	intval ( $page ) or $page = 1 and $page = intval ( $page );
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$enterprise_obj->setWhere ( $where . $pages [where] );
	$enterprise_arr = $enterprise_obj->query_keke_witkey_auth_enterprise();
}
require $kekezu->_tpl_obj->template ( "auth/" . $auth_dir . "/admin/tpl/auth_list" );