<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 6 );
$indus_table_obj = new Keke_witkey_industry_class();
$indus_obj = keke_table_class::get_instance ( "witkey_industry" ); 
$file_obj = new keke_file_class();
$indus_arr = kekezu::get_industry (0);
(isset ( $indus_id ) and intval ( $indus_id ) > 0) and $indus_info = $indus_obj->get_table_info ( 'indus_id', $indus_id );
empty ( $art_info ) or extract ( $art_info );
if (isset ( $indus_id ) && intval ( $indus_id ) > o) {
	$indus_info = $indus_obj->get_table_info ( 'indus_id', $indus_id );
	$indus_pid = $indus_info ['indus_pid'];
}
if($sbt_edit){
	$indus_table_obj->setWhere("indus_name = '".$fs['indus_name']."'");
	$res  = $indus_table_obj->count_keke_witkey_industry();
	!$pk&&$res and kekezu::admin_show_msg($_lang['operate_fail'],$url,3,$_lang['indus_has']);
	$fs['on_time'] = time();
	isset($fs['is_recommend']) or $fs['is_recommend']=0;
	isset($fs['totask']) or $fs['totask']=0;
	isset($fs['togoods']) or $fs['togoods']=0;
	$fs=kekezu::escape($fs);
	$res = $indus_obj->save($fs,$pk);
	$indus_info = $indus_obj->get_table_info ( 'indus_id', $pk['indus_id'] );
	$url = "index.php?do=task&view=industry";
	!$pk and kekezu::admin_system_log($_lang['add_industry']) or kekezu::admin_system_log($_lang['edit_industry'].':'.$indus_info['indus_name']);
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	$file_obj->delete_files(S_ROOT.'./data/tpl_c/');
	$res and kekezu::admin_show_msg($_lang['operate_success'],$url,3,'','success') or kekezu::admin_show_msg($_lang['operate_fail'],$url,3,'','warning');
}
$temp_arr = array();
kekezu::get_tree($indus_arr,$temp_arr,'option',$indus_pid,'indus_id');
$indus_arr = $temp_arr;
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_' . $view );