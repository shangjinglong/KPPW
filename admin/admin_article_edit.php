<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$art_obj = keke_table_class::get_instance ( "witkey_article" );
$types = array ('help', 'art','bulletin','about' );
(! empty ( $type ) && in_array ( $type, $types )) or $type = 'art';
switch ($type) {
	case 'art' :
		kekezu::admin_check_role ( 16);
		$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "cat_type = 'article'", " art_cat_id desc", '', '', 'art_cat_id', null );
		break;
	case 'help' :
		kekezu::admin_check_role (42);
		$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "cat_type = 'help'", " art_cat_id desc", '', '', 'art_cat_id', null );
		break;
	case 'bulletin' :
		kekezu::admin_check_role (156);
		break;
	case 'about' :
		kekezu::admin_check_role (157);
		break;
}
(isset ( $art_id ) and intval ( $art_id ) > 0) and $art_info = $art_obj->get_table_info ( 'art_id', $art_id );
empty ( $art_info ) or extract ( $art_info );
if ($sbt_edit) {
	$fields ['pub_time'] = time ();
	if($type=='art'){
		$fields ['cat_type'] = 'article';
	}else{
		$fields ['cat_type'] = $type;
	}
	isset($fields['is_recommend']) or $fields['is_recommend']=0;
	$url = "index.php?do=$do&view=list&type=$type";
	$fields=kekezu::escape($fields);
	$res = $art_obj->save ( $fields, $pk );
	$log_ac = array('edit'=>$_lang['edit_art'],'add'=>$_lang['add_art']);
	if($pk['art_id']){
		kekezu::admin_system_log($log_ac['edit'].":".$fields['art_title']) ;
	}else{
		kekezu::admin_system_log($log_ac['add'].":".$fields['art_title']) ;
	}
	kekezu::admin_show_msg($_lang['operate_success'],$url,3,'','success');
}
if(isset($ac)&&$ac=='del'){
	if($filepath){
		$pk and db_factory::execute(" update ".TABLEPRE."witkey_article set art_pic ='' where art_id = ".intval($pk));
		$file_info = db_factory::get_one(" select * from ".TABLEPRE."witkey_file where save_name = '.$filepath.'");
		keke_file_class::del_att_file($file_info['file_id'], $file_info['save_name']);
		kekezu::echojson ( '', '1' );
	}
}
$cat_arr = array ();
kekezu::get_tree ( $art_cat_arr, $cat_arr, 'option', $art_id, 'art_cat_id', 'art_cat_pid', 'cat_name' );
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . "_" . $view );
function get_fid($path){
	if(!path){
		return false;
	}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}