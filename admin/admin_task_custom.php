<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 40 );
$table_obj = keke_table_class::get_instance ( 'witkey_comment' );
$wh = " obj_type = 6";
$w ['comment_id'] and $wh .= " and comment_id = " . $w ['comment_id'];
$w ['username'] and $wh .= " and username = '{$w['username']}'";
$ord ['0'] and $wh .= " order by $ord[0] $ord[1]" or $wh .= " order by comment_id desc";
$url_str = "index.php?do=task&view=custom&w[comment_id]={$w['comment_id']}&w[username]={$w['username']}&ord[0]=$ord[0]&ord[1]=$ord[1]";
$page = $page ? intval ( $page ) : 1;
$page_size = $slt_page_size ? intval($slt_page_size) : 10;
$table_info = $table_obj->get_grid ( $wh, $url_str, $page, $page_size, null, 1, 'ajax_dom');
$comment_arr = $table_info ['data'];
$pages = $table_info ['pages'];
if ($ac == 'del') {
	$res = $table_obj->del ( 'comment_id', $comment_id, $url_str );
	$res and kekezu::admin_show_msg ( $_lang['delete_success'], "index.php?do=$do&view=$view", 3,'','success' ) or kekezu::admin_show_msg ( $_lang['delete_faile'], "index.php?do=$do&view=$view", 3,'','warning' );
}
if ($sbt_action) {
	$res = $table_obj->del ( 'comment_id', $ckb, $url_str );
	$res and kekezu::admin_show_msg ( $_lang['mulit_operate_success'], "index.php?do=$do&view=$view", 3,'','success' ) or kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], "index.php?do=$do&view=$view", 3 ,'','warning');
}
if ($by) {
	$t_userinfo = kekezu::get_user_info ( $to_uid );
	$to_username = $t_userinfo ['username'];
	if (CHARSET == 'gbk')
		$fds = kekezu::utftogbk ( $fds );
	if ($ac) {
		kekezu::notify_user ( $fds ['msg_title'], $fds ['msg_content'], $to_uid, $to_username );
		$str = $_lang['reply_success'];
		echo $str;
		die ();
	}
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_' . $view . '_reply' );
	exit ();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_' . $view );