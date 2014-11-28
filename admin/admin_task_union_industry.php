<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(20);
$indus_p_arr = $kekezu->_indus_p_arr;
$url = "index.php?do=$do&view=$view";
if (isset($sbt_edit)){
        $to_indus_id or kekezu::admin_show_msg($_lang['target_industry_not_top'],$url,2,'','warning');
		$indus_hb_arr = kekezu::get_industry($to_indus_id);
		foreach ($indus_hb_arr as  $k=>$v){
			db_factory::execute("update ".TABLEPRE."witkey_industry set indus_pid = $slt_indus_id where indus_id = {$v['indus_id']}");
		}
		db_factory::execute("delete from ".TABLEPRE."witkey_industry where indus_id = $to_indus_id");
		db_factory::execute("update ".TABLEPRE."witkey_task set indus_pid = $slt_indus_id where indus_pid = $to_indus_id");
		db_factory::execute("update ".TABLEPRE."witkey_service set indus_pid = $slt_indus_id where indus_pid = $to_indus_id");
		kekezu::admin_show_msg($_lang['industry_union_success'],$url,3,'','success');
}
require_once $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'.$do.'_' . $view );
