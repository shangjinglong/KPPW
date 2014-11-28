<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$model_id or kekezu::admin_show_msg($_lang['error_model_param'],"index.php?do=info",3,'','warning');
$op_code or kekezu::admin_show_msg($_lang['error_rights_project'],"index.php?do=info",3,'','warning');
$model_info=$kekezu->_model_list[$model_id];
!$model_info['model_status'] and header("location:index.php?do=config&view=model&model_id=$model_id");
$permission_class_name=$model_info['model_dir']."_permission_class";
switch (isset($sbt_action)){
	case "0":
		$auth_item =keke_auth_base_class::get_auth_item(null,"auth_code,auth_title");
		$perm_rule= keke_privission_class::get_model_priv_item ($model_id,$op_code,'op_id,op_code,condit,op_name,allow_times','op_code');
		$perm_item = keke_privission_class::get_priv_item($model_id);
		break;
	case "1":
		if($sbt_action){
			$perm_item_obj=new Keke_witkey_priv_item_class();
			$perm_item_obj->setWhere(" op_id = '".$fds['op_id']."'");
			isset($fds['condit']) or $fds['condit']=array();
			$perm_item_obj->setCondit(implode(",",$fds['condit']));
			$perm_item_obj->edit_keke_witkey_priv_item();
			$perm_rule_obj=new Keke_witkey_priv_rule_class();
			if($fds['rule'])
				foreach ($fds['rule'] as $k => $v){
					$perm_rule_obj->setWhere(" r_id = '$k'");
					$v!=1 and $perm_rule_obj->setRule(intval($fds['rule'][$k]));
					$v==1 and $perm_rule_obj->setRule(intval($fds['times'][$k]));
					$perm_rule_obj->edit_keke_witkey_priv_rule();
			}
			$file_obj = new keke_file_class();
			$file_obj->delete_files(S_ROOT."./data/data_cache/");
			kekezu::admin_show_msg($_lang['rights_edit_successfully'],$_SERVER['HTTP_REFERER'],3,'','success');
		}
		break;
}
require keke_tpl_class::template ( ADMIN_DIRECTORY.'/tpl/admin_' . $do );