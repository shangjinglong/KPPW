<?php	defined ( "ADMIN_KEKE" ) or exit ( "Access Denied" );
kekezu::admin_check_role ( 33 );
$url = "index.php?do=$do&view=$view&mark_rule_id=$mark_rule_id";
$mark_rule_obj = new Keke_witkey_mark_rule_class ();
if (isset ( $op )) {
	switch ($op) {
		case "edit" : 
			if (intval ( $mark_rule_id )) {
				$mark_rule_obj->setWhere ( " mark_rule_id  =  " . $mark_rule_id . "" );
				$mark_info = $mark_rule_obj->query_keke_witkey_mark_rule ();
				$mark_info = $mark_info ['0'];
			}
			require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_" . $do . "_" . $view . "_edit" );
			break;
		case "del" :
			intval ( $mark_rule_id ) or kekezu::admin_show_msg ($_lang['parameter_error_fail_to_delete'], $url,3,'','warning' );
			$mark_rule_obj->setWhere ( " mark_rule_id  =  " . $mark_rule_id . "" );
			$res = $mark_rule_obj->del_keke_witkey_mark_rule ();
			kekezu::admin_system_log ($_lang['delete_credit_rules']);
			$res < 1 and kekezu::admin_show_msg ($_lang['delete_fail'], $url,3,'','warning' ) or kekezu::admin_show_msg ( $_lang['success_delete_a_credit_rules'], $url,3,'','success' );
			break;
		case "config":
			kekezu::admin_check_role(78);
			require ADMIN_ROOT . 'admin_config_' . $view . '_'.$op.'.php';
			break;
		case "config_add":
			kekezu::admin_check_role(78);
			require ADMIN_ROOT . 'admin_config_' . $view . '_'.$op.'.php';
			break;
		case "log":
			kekezu::admin_check_role(79);
		   require ADMIN_ROOT . 'admin_config_' . $view . '_'.$op.'.php';
			break;
	}
} elseif ($is_submit=='1'){    
	intval ( $hdn_mark_rule_id ) and $mark_rule_obj->setWhere ( " mark_rule_id = " . intval ( $hdn_mark_rule_id ) . "" );
	$mark_rule_obj->setM_value(intval( $txt_m_value ));
	$mark_rule_obj->setG_value(intval($txt_g_value));
	$mark_rule_obj->setG_title ( $txt_g_title );
	$mark_rule_obj->setM_title ( $txt_m_title );
	$mark_rule_obj->setG_ico($hdn_g_ico);
	$mark_rule_obj->setM_ico($hdn_m_ico);
	if(intval ( $hdn_mark_rule_id )){
		kekezu::admin_system_log($_lang['edit_mark_rule']);
	 	$res = $mark_rule_obj->edit_keke_witkey_mark_rule () ;
	}else{
		kekezu::admin_system_log($_lang['create_mark_rule']);
		 $res = $mark_rule_obj->create_keke_witkey_mark_rule ();
	}
	if($res){
	 	$u_list = db_factory::query(sprintf(" select buyer_credit,seller_credit,uid from %switkey_space",TABLEPRE));
		if($u_list){
			$s  = sizeof($u_list);
			for ($i=0;$i<$s;$i++){
				$b_level = keke_user_mark_class::get_mark_level($u_list[$i]['buyer_credit'],2);
				$s_level = keke_user_mark_class::get_mark_level($u_list[$i]['seller_credit'],1);
				$sql=" UPDATE ".TABLEPRE."witkey_space set buyer_level='".serialize($b_level)."',seller_level='".serialize($s_level)."' where uid='{$u_list[$i]['uid']}'";
				$sql!=''&&db_factory::execute($sql);
			}
		}
	}
	kekezu::admin_show_msg ($_lang['operate_notice'], $url,2,$_lang['submit_success'],'success');
} else {
	$mark_rule = $mark_rule_obj->query_keke_witkey_mark_rule ();
	require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_{$do}_{$view}" );
}