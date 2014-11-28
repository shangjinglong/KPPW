<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$payitem=keke_payitem_class::get_payitem_config(null,null,$item_code,0);
$payitem_type = keke_glob_class::get_payitem_type();
$ac=='download' and keke_file_class::file_down($file_name, $file_path);
if($sbt_edit){
	$payitem_obj=keke_table_class::get_instance("witkey_payitem");
	is_array($model_code) and $fds['model_code']=implode(",",$model_code);
	$fds['small_pic']=$hdn_small_pic ? $hdn_small_pic : '';
	$fds['small_pic']!=$payitem['small_pic'] and keke_file_class::del_file($payitem['small_pic']);
	$fds['big_pic']= $hdn_big_pic ? $hdn_big_pic : '';
	$fds['big_pic']!=$payitem['big_pic'] and keke_file_class::del_file($payitem['big_pic']);
	$res=$payitem_obj->save($fds,$pk);
	kekezu::admin_system_log($_lang['edit'].$payitem['item_name']);
	kekezu::admin_show_msg($payitem['item_name'].$_lang['edit_success'],$_SERVER['HTTP_REFERER'],"3",'','success');
}else{
	$model_list=$kekezu->_model_list;
    $code_arr=explode(",",$payitem['model_code']);
}
$kekezu->_cache_obj->gc();
require keke_tpl_class::template("/control/payitem/$item_code/tpl/admin_config");
function get_fid($path){
	if(!path){ return false;}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}
