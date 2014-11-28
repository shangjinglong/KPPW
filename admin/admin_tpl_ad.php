<?php	defined ( 'ADMIN_KEKE' ) or die ( 'Access Denied' );
kekezu::admin_check_role ( 32 );
$table_name = 'witkey_ad_target';
$target_arr = kekezu::get_table_data ( '*', $table_name, '', '', '', '', 'target_id', null ); 
$target_ad_num = kekezu::get_table_data('target_id, count(*) as num', 'witkey_ad', 'target_id is not null', '', 'target_id', '', 'target_id', null);
while (list($key, $value) = each($target_arr)){
	$target_ad_arr[$key] = $target_ad_num[$key]['num'] ? $target_ad_num[$key]['num'] : '0';
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );