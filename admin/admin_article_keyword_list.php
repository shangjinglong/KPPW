<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(171);
$keyword_obj = new Keke_witkey_article_keyword_class ();
$table_obj = new keke_table_class ( "witkey_article_keyword" );
$url = "index.php?do=$do&view=$view&w[word]=$w[word]&w[keyword_id]=$w[keyword_id]&page_size=$page_size&page=$page&ord[0]={$ord['0']}&ord[1]={$ord['1']}";
if(isset($ac)){
	switch($ac){
		case "del":
			$res = $table_obj->del ( 'keyword_id', $keyword_id, $url );
			break;
		case "open":
			$keyword_obj -> setWhere("keyword_id=".$keyword_id);
			$keyword_obj->setKeyword_status(1);
			$res = $keyword_obj -> edit_keke_witkey_article_keyword();
			break;
		case "disable":
			$keyword_obj -> setWhere("keyword_id=".$keyword_id);
			$keyword_obj->setKeyword_status(0);
			$res = $keyword_obj -> edit_keke_witkey_article_keyword();
			break;
	}
	$res and kekezu::admin_show_msg ( $_lang['operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['operate_fail'], $url,3,'','warning' );
} elseif (isset ( $sbt_action )) {
	sizeof ( $ckb ) or kekezu::admin_show_msg ( $_lang['choose_operate_item'], $url,3,'','warning' );
	is_array ( $ckb ) and $ids = implode ( ',', array_filter ( $ckb ) );
	$keyword_obj->setWhere ( "keyword_id in ($ids)" );
	if($sbt_action){
		$res = $keyword_obj->del_keke_witkey_article_keyword ();
		kekezu::admin_system_log ( $_lang['mulit_recovery_articles'] );
	}
	$res and kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], $url,3,'','warning' );
}  else {
	$where = ' 1 = 1 ';
	$page_size  and $page_size = intval ( $page_size ) or $page_size = 10;
	$page and $page = intval ( $page ) or $page = 1;
	$w [keyword_id] and $where .= " and keyword_id = ".intval ( $w [keyword_id] );
	strval ( $w [word] ) and $where .= " and word like '%$w[word]%'";
	$ord[0]&&$ord[1] and $where .=' order by '.$ord[0].' '.$ord[1] or $where.=" order by keyword_id desc ";
	$r = $table_obj->get_grid ( $where, $url, $page, $page_size,null,1,'ajax_dom');
	$keyword_arr = $r [data];
	$pages = $r [pages];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . "_" . $view );