<?php
$url = "index.php?do=$do&view=$view&target_id=$target_id";
if (isset ( $stb_add )) {
	eval ("\$arr=".kekezu::k_stripslashes($position).";") ;
	$position = serialize( $arr);
	$insertsqlarr = array ('name' => $name, 'code' => $code, 'description' => $description, 'targets' => $targets, 'position' => $position, 'ad_size' => $ad_size, 'ad_num' => $ad_num, 'sample_pic' => $sample_pic );
	if ($target_id) {
		$result = db_factory::updatetable ( "keke_witkey_ad_target", $insertsqlarr, array ("target_id" => $target_id ) );
	} else {
		$result = db_factory::inserttable ( 'keke_witkey_ad_target', $insertsqlarr );
	}
	$result && kekezu::admin_show_msg ( $_lang['add_submit_success'],$url,3,'','success' );
}
if ($target_id) {
	$target_arr = db_factory::get_one ( "select * from ".TABLEPRE."witkey_ad_target where target_id='$target_id'" );
	$target_arr['position'] = var_export(unserialize($target_arr['position']),1);
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );