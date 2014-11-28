<?php	defined ( 'ADMIN_KEKE' ) or die ( 'Access Denied' );
kekezu::admin_check_role ( 59 );
! isset ( $op ) && $op = 'config'; 
$url = 'index.php?do=' . $do . '&view=' . $view . '&op=' . $op;
$table_name = 'witkey_prom_rule';
if (isset ( $sbt_edit )) {
	switch ($op) {
		case 'config' : 
			$config = array ();
			$rule_obj = new Keke_witkey_prom_rule_class ();
			$rule_obj->setWhere ( 'prom_id="' . $prom_id . '"' );
			$rule_obj->setIs_open ( $prom_reg_is_open );
			$config ['auth'] = $auth; 
			$rule_obj->setCash ( floatval ( $prom_cash ) ); 
			$rule_obj->setConfig ( serialize ( $config ) );
			$result .= $rule_obj->edit_keke_witkey_prom_rule ();
			$prom_cash = keke_curren_class::convert($prom_cash,0,true);
			$prom_credit= keke_curren_class::convert($prom_credit,0,true);;
			$result .= db_factory::execute ( 'update ' . TABLEPRE . 'witkey_basic_config set v="' . intval ( $prom_reg_is_open ) . '" where k="prom_open";' );
			$result .= db_factory::execute ( 'update ' . TABLEPRE . 'witkey_basic_config set v="' . intval ( $prom_period ) . '" where k="prom_period";' );
			$plug_info = $kekezu->_plug_arr[prom];
			db_factory::execute(sprintf("update %switkey_plug set status=%d where plug_code='prom'",TABLEPRE,intval ( $prom_reg_is_open )));
			db_factory::execute(sprintf("update %switkey_resource_submenu set status=%d where submenu_id=%d",TABLEPRE,intval ( $prom_reg_is_open ),$plug_info['submenu_id']));
			if($prom_reg_is_open==1){
				db_factory::execute(sprintf("update %switkey_nav set ishide=0 where nav_style='prom'",TABLEPRE));
			}else{
				db_factory::execute(sprintf("update %switkey_nav set ishide=1 where nav_style='prom'",TABLEPRE));
			}
			$message = $result ? $_lang['register_prom_config_edit_success'] : $_lang['no_change'];
			kekezu::admin_system_log ( $_lang['edit_register_prom_config'] );
			kekezu::admin_show_msg ( $message, $url,3,'','success' );
		case 'pub_task' :
		case 'bid_task' :
		case 'service' :
			$ext_config = array ();
			$ckb_indus and $ext_config ['indus'] = intval ( $ckb_indus );
			 $s_indus_select and $ext_config ['indus_string'] =  implode ( ',', $s_indus_select );
			($ckb_model && is_array ( $ckb_model )) and $ext_config ['model'] = implode ( ',', $ckb_model );
			switch ($op) {
				case 'pub_task' :
					isset ( $pub_task_rake_type ) && $ext_config ['pub_task_rake_type'] = $pub_task_rake_type;
					$pub_task_cash && $pub_task_cash = keke_curren_class::convert ( $pub_task_cash,0,true );
					$pub_task_credit && $pub_task_credit = keke_curren_class::convert ( $pub_task_credit,0,true );
					$pub_task_rate && $ext_config ['pub_task_rate'] = floatval ( $pub_task_rate ); 
					$ext_config = serialize ( $ext_config );
					$result = db_factory::execute ( 'update ' . TABLEPRE . $table_name . " set config='$ext_config',cash='" . $pub_task_cash . "' , credit='" . $pub_task_credit . "' , rate='" . $pub_task_rate . "' where prom_code='pub_task';" );
					kekezu::admin_system_log ( $_lang['update_task_prom_config'] );
					$result and kekezu::admin_show_msg($_lang['task_prom_config_update_success'],$url,3,'','success') or kekezu::admin_show_msg( $_lang['record_no_change'],$url,3,'','warning');
					break;
				case 'bid_task' :
					$bid_task_rake && $ext_config ['bid_task_rake'] = intval ( $bid_task_rake );
					$ext_config = serialize ( $ext_config );
					$result = db_factory::execute ( 'update ' . TABLEPRE . $table_name . " set config='$ext_config',rate='" . intval ( $bid_task_rake ) . " ' where prom_code='bid_task';" );
					kekezu::admin_system_log ( $_lang['update_bid_prom_config'] );
					$result and kekezu::admin_show_msg ($_lang['bid_prom_config_update_success'],$url,3,'','success') or kekezu::admin_show_msg($_lang['record_no_change'],$url,3,'','warning');
					break;
				case 'service' :
					$ext_config = serialize ( $ext_config );
					$result = db_factory::execute ( 'update ' . TABLEPRE . $table_name . " set rate='" . intval ( $service_rate ) . "', config='" . $ext_config . "' where prom_code='service';" );
					kekezu::admin_system_log ( $_lang['update_goods_prom_config'] );
					$result and kekezu::admin_show_msg ($_lang['goods_prom_config_success'],$url,3,'','success') or kekezu::admin_show_msg($_lang['record_no_change'],$url,3,'','warning');
					break;
			}
			break;
	}
}
switch ($op) {
	case 'config' : 
		$reg_config = $kekezu->get_table_data ( '*', $table_name, ' type="reg" ', '', '', '', 'prom_code', null );
		$reg_config = $reg_config ['reg']; 
		$reg_mode = unserialize ( $reg_config ['config'] ); 
		$global_config = $kekezu->get_table_data ( '*', 'witkey_basic_config', ' type="prom"', '', '', '', 'k' );
		$auth_info = $kekezu->get_table_data ( '*', $table_name, ' type="auth" ', '', '', '', 'prom_code', null ); 
		break;
	case 'pub_task' : 
	case "bid_task" : 
	case "service" : 
		$op == 'pub_task' || $op == 'bid_task' and $model_type = 'task' or $model_type = 'shop';
		$indus_arr = kekezu::get_industry (); 
		$indus_index = kekezu::get_indus_by_index (); 
		$model_info = kekezu::get_table_data ( 'model_id,model_dir,model_name,config,model_type', 'witkey_model', "model_status=1 and model_dir!='employtask' and model_dir!='tender' and model_type='$model_type'", '', '', '', 'model_name' );
		$prom_config = $kekezu->get_table_data ( '*', 'witkey_prom_rule', "prom_code='$op'", '', '', '', 'prom_code' );
		$prom_config = array_merge ( $prom_config [$op], unserialize ( $prom_config [$op] ['config'] ) ); 
		$config_model = explode(',', $prom_config['model']);
		break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );