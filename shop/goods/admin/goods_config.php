<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 15:31:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

$goods_config = kekezu::get_task_config($model_id);
is_array($goods_config) and extract($goods_config) or $goods_config=array();
$model_obj = keke_table_class::get_instance('witkey_model');
$ops = array('config','control','rule');
in_array($op, $ops) or $op ='config';
$url = "index.php?do=model&model_id=$model_id&view=config&op=$op";
kekezu::empty_cache();
$indus_arr = $kekezu->_indus_arr; //任务行业	
$indus_index = kekezu::get_indus_by_index (); //索引行业
if (isset ( $sbt_edit )) {
	$log_op_arr = array("config"=>$_lang['goods_basic_config'],"control"=>$_lang['goods_flow_config'],"rule"=>$_lang['goods_permissions_config']);
	$log_msg = $_lang['has_update'].$log_op_arr[$op];
	kekezu::admin_system_log($log_msg);
	switch ($op){
		case 'config':		
			! empty ( $fds['indus_bid'] ) and $fds ['indus_bid'] = implode ( ",", $fds['indus_bid'] ) or $fds ['indus_bid'] = '';
			$fds['on_time']=time();
			$fds=kekezu::escape($fds);
			$res=$model_obj->save($fds,$pk);
			kekezu::admin_show_msg ( $_lang['goods_basic_config_update_success'], $url,3,'','success' );			
			break;
		case 'control':
		
			is_array($cont) and $res = keke_task_config::set_task_ext_config($model_id,$cont);
			kekezu::admin_show_msg($_lang['goods_flow_config_update_success'],$url,3,'','success');						
			break;
		case 'rule':
			if ($fds ['allow_times']){
				$perm_item_obj = new Keke_witkey_priv_item_class ();
				foreach ( $fds ['allow_times'] as $k=>$v ) {
					$perm_item_obj->setWhere ( " op_id = '$k'" );
					$perm_item_obj->setAllow_times ( intval ( $v ) );
					$perm_item_obj->edit_keke_witkey_priv_item ();
				}
				kekezu::admin_show_msg ( $_lang['goods_permissions_config_update_success'], "index.php?do=model&model_id=$model_id&view=config&op=rule",3,'','success');
			}
			break;
	}
}


require keke_tpl_class::template ( 'shop/'.$model_info['model_dir'].'/admin/tpl/goods_' . $view );