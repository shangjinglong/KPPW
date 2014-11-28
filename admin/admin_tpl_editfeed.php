<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 57 );
$feed_type = keke_glob_class::get_feed_type ();
$feed_obj = new Keke_witkey_feed_class ();
$tag_obj = new Keke_witkey_tag_class ();
$type or $type = 'manage';
$url = "index.php?do=$do&view=$view&type=$type&tag_id=$tag_id";
if ($type === 'manage') {
	$tag_id and $feed_info = db_factory::get_one ( " select tagname,tag_id,cache_time,tag_code,tpl_type,code from " . TABLEPRE . "witkey_tag where tag_type=8 and tag_id='$tag_id'" );
  	$code = unserialize($feed_info['code']);
}
if ($sbt_edit) {
	if ($type === 'manage') {
		$slt_feed_type == 1 and 	kekezu::admin_show_msg ( $_lang['add_fail_select_type'], $url,3,'','warning' );
		$cbk_group and $tpl_type = implode ( ",", $cbk_group ) or $tpl_type = $_K ['template'];
		$tag_obj->setTagname ( $txt_tag_name );
		$tag_obj->setTag_code ( $tag_code );
		$tag_obj->setCache_time ( $txt_cache_time );
		$tag_obj->setTpl_type ( $tpl_type );
		$tag_obj->setTag_type ( 8 );
		$code ['feed_type'] = $slt_feed_type;
		$code ['load_num'] = intval ( $txt_load_num ) ? intval ( $txt_load_num ) : 9;
		$code ['user_id'] = 0;
		$code ['obj_id'] = 0;
		$code ['cache_name'] = $txt_cache_name ? $txt_cache_name : $txt_tag_name;
		$code = serialize ( $code );
		$tag_obj->setCode ( $code );
		if ($hdn_tag_id) {
			$tag_obj->setTag_id ( $hdn_tag_id );
			$res = $tag_obj->edit_keke_witkey_tag ();
		} else { 
			$check_exixts = db_factory::execute ( "select tagname from " . TABLEPRE . "witkey_tag where tagname='$txt_tag_name'" );
			$check_exixts and kekezu::admin_show_msg ( $_lang['add_fail_alerady_exists'], $url,3,'','warning' );
			$res = $tag_obj->create_keke_witkey_tag ();
		}
	}
			$res and kekezu::admin_show_msg ( $_lang['edit_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['edit_fail'], $url,3,'','warning' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_tpl_' . $view . '_' . $type );
