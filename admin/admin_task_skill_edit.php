<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(24);
$skill_obj = keke_table_class::get_instance ( "witkey_skill" );
$indus_table_obj = new Keke_witkey_industry_class();
$file_obj = new keke_file_class();
if($skill_id){
	$skill_info = $skill_obj->get_table_info ( 'skill_id', $skill_id );
	$indus_id = $skill_info[indus_id];
}
if($sbt_edit){
	$indus_table_obj->setWhere("indus_name = '".$fs[indus_name]."'");
	$res  = $indus_table_obj->count_keke_witkey_industry();
	$res and kekezu::admin_show_msg($_lang['operate_fail'],$url,3,$_lang['skill_has']);
	$fs[on_time] = time();
	$fs=kekezu::escape($fs);
	$fs['indus_id']= $w['indus_id'];
	$res = $skill_obj->save($fs,$pk);
	$url = "index.php?do=task&view=skill";
	if($pk[skill_id]){
		kekezu::admin_system_log($_lang['edit_skill'].$fs[skill_name]);
	}
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	$file_obj->delete_files(S_ROOT.'./data/tpl_c/');
	$res and kekezu::admin_show_msg($_lang['operate_success'],$url,3,'','success') or kekezu::admin_show_msg($_lang['operate_fail'],$url,3,'','warning');
}
$indus_obj = keke_table_class::get_instance ( "witkey_industry" );
$industry=$kekezu->_indus_p_arr;
require_once $template_obj->template ( 'admin/tpl/admin_task_' . $view );