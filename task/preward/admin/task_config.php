<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$ops = array ("config", "control", "priv" );
in_array ( $op, $ops ) or $op = 'config';
$ac_url="index.php?do=model&model_id=$model_id&view=config&op=$op";
$config = $kekezu->_sys_config;
kekezu::empty_cache();
switch ($op) {
	case "config" : 
		if($sbt_edit){
			$model_obj=keke_table_class::get_instance("witkey_model");
			! empty ( $fds ['indus_bid'] ) and $fds['indus_bid'] = implode ( ",", $fds ['indus_bid'] ) or $fds['indus_bid'] = '';
			$fds['on_time']=time();
			$fds=kekezu::escape($fds);
			$res=$model_obj->save($fds,$pk);
			kekezu::admin_show_msg ( $_lang['update_success'],$ac_url, 3,'','success' );
			}else{
				$indus_arr = $kekezu->_indus_arr;
				$indus_index =kekezu::get_indus_by_index ();
			}
		break;
	case "control" : 
		if($ac){
			switch ($ac){
				case "del_time_rule":
					$rule_id and keke_task_config::del_time_rule($rule_id);
					break;
				case "del_delay_rule":
					$rule_id and keke_task_config::del_delay_rule($rule_id);
					break;
			}
		}elseif($sbt_edit){
			if(floatval($conf['min_cash']) == 0){
				kekezu::admin_show_msg ( '任务最小金额不能小于￥0元', $ac_url, 3,'','warning' );
			}
			$res.=keke_task_config::set_time_rule($model_id,$timeOld,$timeNew); 
			$res.=keke_task_config::set_delay_rule($model_id,$delayOld,$delayNew);
			is_array($conf) and $res.=keke_task_config::set_task_ext_config($model_id,$conf);
			kekezu::admin_show_msg ( $_lang['update_success'],$ac_url, 3 ,'','success');
		}else{
			$confs = unserialize($model_info['config']);
			is_array($confs)&&extract($confs);
			$time_rule=keke_task_config::get_time_rule($model_id);
			$delay_rule=keke_task_config::get_delay_rule($model_id);
		}
		break;
	case "priv" : 
		if ($sbt_edit) {
			if ($fds ['allow_times']){
				$perm_item_obj = new Keke_witkey_priv_item_class ();
					foreach ( $fds ['allow_times'] as $k => $v ) {
						$perm_item_obj->setWhere ( " op_id = '$k'" );
						$perm_item_obj->setAllow_times ( intval ( $v ) );
						$perm_item_obj->edit_keke_witkey_priv_item ();
					}
			}
			kekezu::admin_show_msg ( $model_info['model_name'].$_lang['permissions_config_update_success'], "$ac_url",'3','','success');
		} else {
			$perm_item = keke_privission_class::get_model_priv_item($model_id);
		}
		break;
}
if($sbt_edit){
	$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	$log_op_arr = array("config"=>$_lang['basic_config'],"control"=>$_lang['control_config'],"priv"=>$_lang['private_config']);
	$log_msg = $_lang['revised_piece_reward_task'].$log_op_arr[$op];
	kekezu::admin_system_log($log_msg);
}
require keke_tpl_class::template ( 'task/' . $model_info ['model_dir'] . '/admin/tpl/task_' . $op );