<?php
$tag_obj = new Keke_witkey_tag_class ();
if ($sbt_edit) {
	$tpl_type = $ckb ? implode ( ',', $ckb ) : $_K ['template'];
	$fds ['tagname'] = $fds['hdn_tagname'] ? $fds['hdn_tagname'] : $fds ['tagname'];
	$fds ['loadcount'] = $fds['loadcount'] ? $fds['loadcount'] : $fds ['hdn_loadcount'];
	$tag_obj->setTagname ( $fds ['tagname'] );
	$tag_obj->setCache_time ( intval ( $fds ['cache_time'] ) );
	$tag_obj->setTag_code ( $fds [tag_code] );
	$tag_obj->setTpl_type ( $tpl_type );
	$tag_obj->setTag_type ( 9 );
	$tag_obj->setLoadcount($fds ['loadcount']);
	$sbt_edit= strip_tags($sbt_edit);
	if ($sbt_edit == $_lang['ads_group_edit'] && $tag_id) {
		$tag_obj->setWhere ( 'tag_id="' . $tag_id . '"' );
		$result = $tag_obj->edit_keke_witkey_tag ();
	}
	if ($sbt_edit == $_lang['ads_group_add']) {
		$result = $tag_obj->create_keke_witkey_tag ();
	}
	kekezu::admin_system_log ( $sbt_edit.$fds ['tagname'] );
	$result_msg = $result ? $sbt_edit . $_lang['success'] : $sbt_edit . $_lang['fail'];
	if ($target_id){
		$jump_url = $result ? 'index.php?do=tpl&view=ad_add&ac=add&tagname='.$tagname.'&target_id='.$target_id
							: 'index.php?do=tpl&view=ad_group_add&ac=add&tag_id'.$tag_id.'tagname='.$tagname.'&target_id='.$target_id ;
		$result_msg .= $result ? $_lang['jump_to_advertisement_page'] : $_lang['before_jump_to_page'];
	}
	$jump_url = $jump_url ? $jump_url : $_SERVER [HTTP_REFERER] ;
	kekezu::admin_show_msg ( $result_msg, $jump_url,'3','','success' );
}
$page_tips = $_lang['add'];
$ad_info = array();
$tagname && $ad_info['tagname']=$tagname;
if ($ac && $ac == 'edit') {
	empty ( $tag_id ) && kekezu::admin_show_msg ($_lang['edit_parameter_error'], 'index.php?do=tpl&view=ad_group_add&ac=add',3,'','warning' ); 
	$page_tips = $_lang['edit'];
	$tag_id = intval ( $tag_id );
	$tag_obj->setWhere ( 'tag_id="' . $tag_id . '"' );
	$ad_info = $tag_obj->query_keke_witkey_tag ();
	$ad_info = $ad_info [0];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );