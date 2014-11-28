<?php
defined ( "ADMIN_KEKE" ) or exit ( "Access Denied" ); 
kekezu::admin_check_role(71);
$url = "index.php?do=" . $do . "&view=" . $view . "&code=" . $code . "&w[page_size]=" . $w [page_size] . "&w[realname_a_id]=" . $w [realname_a_id] . "&w[username]=" . $w [username] . "&w[auth_status]=" . $w [auth_status]; 
$email_obj = new Keke_witkey_auth_email_class (); 
if (isset ( $ac ) && $ac == 'del') {
	kekezu::admin_system_log($obj.$_lang['email_auth_delete']);
	$auth_obj->del_auth ( $email_a_id ); 
} elseif (isset ( $sbt_action ) && $sbt_action == $_lang['mulit_delete']) {
	$keyids = $ckb;
	kekezu::admin_system_log($_lang['mulit_del_email_auth']);
	$auth_obj->del_auth ( $keyids ); 
} else {
	$url = "index.php?do=" . $do . "&view=" . $view . "&code=" . $code . "&w[page_size]=" . $w [page_size] . "&w[email_a_id]=" . $w [email_a_id] . "&w[username]=" . $w [username]; 
	$where = " 1 = 1 "; 
	intval ( $w ['email_a_id'] ) and $where .= " and email_a_id = " . intval ( $w ['email_a_id'] ) . ""; 
	$w ['username'] and $where .= " and username like '%" . $w ['username'] . "%' "; 
	$where.=" order by email_a_id desc ";
	intval ( $w ['page_size'] ) and $page_size = intval ( $w ['page_size'] ) or $page_size = 10; 
	$email_obj->setWhere ( $where ); 
	$count = $email_obj->count_keke_witkey_auth_email ();
	intval ( $page ) or $page = 1 and $page = intval ( $page );
	$kekezu->_page_obj->setAjax(1);
	$kekezu->_page_obj->setAjaxDom("ajax_dom");
	$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
	$email_obj->setWhere ( $where . $pages ['where'] );
	$email_arr = $email_obj->query_keke_witkey_auth_email (); 
}
if($action){
	$email_obj->setWhere("email_a_id = $auth_id"); 
	if($action=='pass'){
		$email_obj->setAuth_status(1);
		$sql = sprintf("update %switkey_auth_record set `auth_status` = 1 where auth_&code='email' and uid = '%d' ",TABLEPRE,$euid);
		db_factory::execute($sql);
	}elseif ($action=='not_pass'){
		$email_obj->setAuth_status(2); 
	}
	$res =  $email_obj->edit_keke_witkey_auth_email();
	kekezu::admin_show_msg($_lang['operate_success'],'index.php?do=auth&view=list&code=email',3,'','success');
}
require $template_obj->template ( 'auth/' . $auth_dir . '/admin/tpl/auth_list' );
