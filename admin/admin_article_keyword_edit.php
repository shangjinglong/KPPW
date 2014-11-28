<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$keyword_obj = keke_table_class::get_instance ( "witkey_article_keyword" );
(isset ( $keyword_id ) and intval ( $keyword_id ) > 0) and $keyword_info = $keyword_obj->get_table_info ( 'keyword_id', $keyword_id );
empty ( $keyword_info ) or extract ( $keyword_info );
if ($sbt_edit) {
	if($keyword_id){
		$fields ['edit_time'] = time ();
	}else{
		$fields ['on_time'] = time ();
	}
	$fields['keyword_status'] = 1;
	$fields['show_count'] = 0;
	$url = "index.php?do=$do&view=keyword_list";
	$fields=kekezu::escape($fields);
	$res = $keyword_obj->save ( $fields, $pk );
	$log_ac = array('edit'=>'编辑关键字','add'=>'添加关键字');
	if($pk['art_id']){
		kekezu::admin_system_log($log_ac['edit'].":".$fields['word']) ;
	}else{
		kekezu::admin_system_log($log_ac['add'].":".$fields['word']) ;
	}
	kekezu::admin_show_msg($_lang['operate_success'],$url,3,'','success');
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . "_" . $view );
