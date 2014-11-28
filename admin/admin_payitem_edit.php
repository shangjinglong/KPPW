<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$payitem=PayitemClass::getPayitemConfig($item_code,0);
if($sbt_edit){
	$payitem_obj=keke_table_class::get_instance("witkey_payitem");
	$res=$payitem_obj->save($fds,$pk);
	kekezu::admin_system_log($_lang['edit'].$payitem['item_name']);
	kekezu::admin_show_msg($payitem['item_name'].$_lang['edit_success'],$_SERVER['HTTP_REFERER'],"3",'','success');
}else{
	$model_list=$kekezu->_model_list;
}
$kekezu->_cache_obj->gc();
require keke_tpl_class::template(ADMIN_DIRECTORY."/tpl/admin_payitem_edit");
function get_fid($path){
	if(!path){ return false;}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}
