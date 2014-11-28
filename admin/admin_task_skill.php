<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 8);
$table_obj = new keke_table_class ( "witkey_skill" );
$industry=$kekezu->_indus_p_arr;
$temp_arr = array ();
$indus_option_arr = kekezu::get_industry ();
kekezu::get_tree ( $indus_option_arr, $temp_arr,"option",$w[indus_pid] );
$indus_option_arr = $temp_arr;
unset ( $temp_arr );
is_array($indus_arr)&&sort ( $indus_arr );
$indus_show_arr = array();
kekezu::get_tree($indus_arr, $indus_show_arr,'cat',NULL,'indus_id','indus_pid','indus_name');
$indus_show_arr = kekezu::get_table_data('*',"witkey_industry","",' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ','','','indus_id');
$where = ' 1 = 1';
$order_where.=" order by on_time desc ";
$url = "index.php?do=$do&view=$view&w[indus_pid]={$w[indus_pid]}&w[skill_name]={$w[skill_name]}&page_size=$page_size&page=$page&$ord[0]={$ord[1]}";
intval ( $page_size ) and $page_size = intval ( $page_size ) or $page_size = 10;
intval ( $page ) and $page = intval ( $page ) or $page = 1;
if(isset($sbt_search)){
	 $w [indus_id]  and $where .= " and indus_id = $w[indus_id]";
	strval ( $w [skill_name] ) and $where .= " and skill_name like '%$w[skill_name]%'";
	$ord [1] and $order_where = " order by $ord[0] $ord[1]";
}
$where =$where.$order_where;
$r = $table_obj->get_grid ( $where, $url, $page, $page_size );
$skill_arr = $r [data];
$pages = $r [pages];
if ($ac == 'del') {
	$skill_log = keke_table_class::all_table_info("witkey_skill", array("skill_id"=>$skill_id));
	$res = $table_obj->del('skill_id', $skill_id);
	kekezu::admin_system_log($_lang['delete_skill'].":".$skill_log[skill_name]);
	$res and kekezu::admin_show_msg($_lang['delete_success'], $url,'3','','success') or kekezu::admin_show_msg($_lang['delete_fail'], $url,'3','','warning');
}
if ($sbt_action) {
	if (! count($ckb)){
		kekezu::admin_show_msg ($_lang['choose_operation'], $url ,'3','','warning');
	}else{
		$res = $table_obj->del ('skill_id',$ckb);
		kekezu::admin_system_log($_lang['mulit_delete_skill']);
		$res and kekezu::admin_show_msg($_lang['delete_success'], $url,'3','','success') or kekezu::admin_show_msg($_lang['delete_fail'], $url,'3','','warning');
	}
}
$temp_arr = array ();
kekezu::get_tree ( $indus_arr, $temp_arr, 'option', NULL, 'indus_id', 'indus_pid', 'indus_name' );
$indus_arr = $temp_arr;
unset ( $temp_arr );
require $kekezu->_tpl_obj->template ( 'admin/tpl/admin_task_' . $view );
