<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (29);
$indus_arr = kekezu::get_industry ();
$art_cat_arr = kekezu::get_table_data("*","witkey_article_category","","","","","art_cat_id",null);
$url = "index.php?do=tpl&view=edit_tag&tagid=$tagid";
$tag_type_arr = keke_glob_class::get_tag_type ();
$tag_obj = new Keke_witkey_tag_class ();
if ($tagid) {
	$tag_obj->setWhere ( "tag_id='{$tagid}'" );
	$taginfo = $tag_obj->query_keke_witkey_tag ();
	$taginfo = $taginfo ['0'];
}
if ($submit) {
	$txt_tagname or kekezu::admin_show_msg ($_lang['enter_tag_name'], $url,3,'','warning' );
	$tag_obj2 = new Keke_witkey_tag_class ();
	$tag_obj2->setWhere ( "tagname = '{$txt_tagname}' and tag_id!='$tagid'" );
	if ($tag_obj2->query_keke_witkey_tag ()) {
		kekezu::admin_show_msg ($_lang['tag_name_inuse_please_replace'], $url,3,'','warning' );
	}
	$tag_obj->setTagname ( $txt_tagname );
	$tag_obj->setTag_type ( $tag_type );
	if ($tag_type == 6) {
		$code =$model_id;
	} else {
		$code = $tar_custom_code;
	}
	$tag_obj->setCode ( $code );
	$tag_obj->setTag_code ( $tag_code );
	if ($tagid) {
		$tag_obj->setWhere ( "tag_id='{$tagid}'" );
		$res = $tag_obj->edit_keke_witkey_tag ();
		$kekezu->_cache_obj->del ( "tag_list_cache" );
		kekezu::admin_system_log ($_lang['edit_tag'] . $tagid );
	} else {
		$res = $tag_obj->create_keke_witkey_tag ();
		kekezu::admin_system_log ($_lang['create_tag'] . $res );
	}
	$kekezu->_cache_obj->del ( 'tag_list_cache' );
	kekezu::admin_show_msg ($_lang['tag_change_success'], "index.php?do=tpl&view=taglist&tag_type=$tag_type&type=$type",3,'','success' );
}
require  $kekezu->_tpl_obj->template(ADMIN_DIRECTORY.'/tpl/admin_tpl_' . $view . '_' . 'autocode');
