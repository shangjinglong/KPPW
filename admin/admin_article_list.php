<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$art_obj = new Keke_witkey_article_class ();
$table_obj = new keke_table_class ( "witkey_article" );
$types = array ('help', 'art','bulletin','about' );
$type = (! empty ( $type ) && in_array ( $type, $types )) ? $type : 'art';
$url = "index.php?do=$do&view=$view&w[username]=$w[username]&w[art_title]=$w[art_title]&w[art_cat_id]=$w[art_cat_id]&page_size=$page_size&page=$page&type=$type&ord[0]={$ord['0']}&ord[1]={$ord['1']}";
if ($ac == 'del') {
	$res = $table_obj->del ( 'art_id', $art_id, $url );
	$res and kekezu::admin_show_msg ( $_lang['operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['operate_fail'], $url,3,'','warning' );
} elseif (isset ( $sbt_action )) {
	sizeof ( $ckb ) or kekezu::admin_show_msg ( $_lang['choose_operate_item'], $url,3,'','warning' );
	is_array ( $ckb ) and $ids = implode ( ',', array_filter ( $ckb ) );
	$art_obj->setWhere ( "art_id in ($ids)" );
	if($sbt_action){
		$res = $art_obj->del_keke_witkey_article ();
		kekezu::admin_system_log ( $_lang['mulit_recovery_articles'] );
	}
	$res and kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], $url,3,'','warning' );
} elseif ($op == 'listorder') {
	$art_obj = new Keke_witkey_article_class();
	$art_obj->setWhere ( "art_id='$art_id'" );
	$art_obj->setListorder (intval($value));
	$art_obj->edit_keke_witkey_article();
	kekezu::admin_system_log($_lang['edit_art_order'].$art_id);
	die ();
} else {
	$where = ' 1 = 1 ';
	switch ($type) {
		case 'art' :
			kekezu::admin_check_role ( 16 );
			$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "cat_type = 'article'", " art_cat_id desc", '', '', 'art_cat_id', null );
			$where .= " and cat_type = 'article' ";
			break;
			;
		case 'help' :
			kekezu::admin_check_role (42);
			$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "cat_type = 'help'", " art_cat_id desc", '', '', 'art_cat_id', null );
			$where .= " and cat_type = 'help' ";
			break;
			;
		case 'bulletin' :
			kekezu::admin_check_role ( 156);
			$where .= " and cat_type = 'bulletin' ";
			break;
			;
		case 'about' :
			kekezu::admin_check_role ( 157);
			$where .= " and cat_type = 'about' ";
			break;
			;
	}
	$temp_arr = array ();
	kekezu::get_tree ( $art_cat_arr, $temp_arr, 'option', intval($w[art_cat_id]), 'art_cat_id', 'art_cat_pid', 'cat_name' );
	$cat_arr_list = $temp_arr;
	unset ( $temp_arr );
	$page_size  and $page_size = intval ( $page_size ) or $page_size = 10;
	$page and $page = intval ( $page ) or $page = 1;
	$w [art_id] and $where .= " and art_id = ".intval ( $w [art_id] );
	strval ( $w [art_title] ) and $where .= " and art_title like '%$w[art_title]%'";
	$w [art_cat_id] and $w [art_cat_id]=intval ( $w [art_cat_id] ) and $where .= " and art_cat_id in  (select art_cat_id from " . TABLEPRE . "witkey_article_category where art_index like '%{{$w [art_cat_id] }}%')";
	strval ( $w [username] ) and $where .= " and username like '%$w[username]%' ";
	$ord[0]&&$ord[1] and $where .=' order by '.$ord[0].' '.$ord[1] or $where.=" order by art_id desc ";
	$r = $table_obj->get_grid ( $where, $url, $page, $page_size,null,1,'ajax_dom');
	$art_arr = $r [data];
	$pages = $r [pages];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . "_" . $view );