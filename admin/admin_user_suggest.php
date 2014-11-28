<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 82 );
$suggest_obj = keke_table_class::get_instance ( "witkey_proposal" );
$page and $page=intval ( $page ) or $page = 1;
$slt_page_size and $slt_page_size=intval ( $slt_page_size ) or $slt_page_size = 10;
$url = "index.php?do=$do&view=$view&page=$page&slt_page_size=$slt_page_size&txt_p_id=$txt_p_id&txt_pro_title=$txt_pro_title&ord[]=$ord[0]&ord[]=$ord[1]";
$suggest_type_arr = array('1'=>'我的建议','2'=>'我的问题');
$suggest_status_arr = array('1'=>'待回复','2'=>'已回复');
if ($ac == 'del') {
	if ($p_id) {
		$res = $suggest_obj->del ( "p_id", $p_id, $url );
		kekezu::admin_system_log ( '删除建议'.$p_id );
		kekezu::admin_show_msg ( $_lang['delete_success'], $url,3,'','success' );
	} else {
		kekezu::admin_show_msg ( $_lang['delete_fail'], $url ,3,'','warning');
	}
}else {
	$where = ' 1 = 1  ';
	$txt_p_id and $where .= "  and p_id = ".intval($txt_p_id);
	$txt_pro_title and $where .= " and pro_title like '%" .$txt_pro_title.  "%'";
	$slt_static and $where .= " and pro_status = ".intval($slt_static);
	if($ord [1]){
		$where .= " order by $ord[0] $ord[1] ";
	}else{
		$where .= " order by p_id desc";
	}
	$d = $suggest_obj->get_grid ( $where, $url, $page, $slt_page_size,null,1,'ajax_dom');
	$suggestlist_arr = $d [data];
	$pages = $d [pages];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_suggest' );