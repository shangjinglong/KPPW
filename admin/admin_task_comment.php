<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 9 );
$task_model = array ("1" => $_lang['single_reward'], "2" => $_lang['more_reward'], "3" => $_lang['piece_reward'], "4" => $_lang['normal_tender'], "5" => $_lang['deposit_tender'] );
$where = " where a.obj_type = 'task'";
if ($wh ['comment_id']) {
	$where .= " and a.comment_id = " . $wh ['comment_id'];
}
if ($wh ['task_title']) {
	$where .= " and b.task_title = '{$wh['task_title']}'";
}
if ($slt_task_type) {
	$where .= " and b.model_id = " . $slt_task_type;
}
if ($ord ['0']) {
	$where .= " order by $ord[0] $ord[1]";
} else {
	$where .= " order by comment_id desc";
}
$sql = "select a.*,b.task_status,b.task_title,b.model_id from %switkey_comment as a left join %switkey_task as b on a.obj_id = b.task_id " . $where;
$url = "index.php?do=task&view=comment&wh[comment_id]={$wh['comment_id']}&wh[task_title]={$wh['task_title']}&slt_task_type=$slt_task_type&ord[0]=$ord[0]&ord[1]=$ord[1]";
$count = db_factory::execute ( sprintf ( $sql, TABLEPRE, TABLEPRE ) );
$slt_page_size = intval ( $slt_page_size ) ? intval ( $slt_page_size ) : 10;
intval ( $page ) or $page =1;
$kekezu->_page_obj->setAjax(1);
$kekezu->_page_obj->setAjaxDom("ajax_dom");
$pages = $kekezu->_page_obj->getPages ( $count, $slt_page_size, $page, $url );
$sql .= $pages ['where'];
$comment_arr = db_factory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE ) );
$table_class = keke_table_class::get_instance ( 'witkey_comment' );
if ($ac == 'del') {
	$res = $table_class->del ( 'comment_id', $comment_id, $url );
	$res and kekezu::admin_show_msg ( $_lang['operate_notice'], $url, 2, $_lang['delete_success'],'success' ) or kekezu::admin_show_msg ( $_lang['operate_notice'], $url, 2, $_lang['delete_fail'],'warning');
}
if ($sbt_action) {
	$res = $table_class->del ( 'comment_id', $ckb, $url );
	$res and kekezu::admin_show_msg ( $_lang['operate_notice'], $url, 2, $_lang['mulit_operate_success'],'success' ) or kekezu::admin_show_msg ( $_lang['operate_notice'], $url, 2, $_lang['mulit_operate_fail'],'warning');
}
if ($ac == 'comment_info') {
	$view = 'check_comment';
	if ($comment_id) {
		$sql = "select a.*,b.task_status,b.task_title,b.model_id from %switkey_comment as a left join %switkey_task as b on a.obj_id = b.task_id where
			a.comment_id=" . $comment_id;
		$comment_info = db_factory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE ) );
		$comment_info = $comment_info ['0'];
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_' . $view );