<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 2 );
$url = "index.php?do=$do&view=$view";
$default_currency =$kekezu->_sys_config['currency'];
if(!empty($cid)){
	$sql = sprintf("select * from %switkey_currencies where currencies_id ='%d' limit 0,1",TABLEPRE,$cid);
	$currency_config = db_factory::get_one($sql);
}
if($conf and $sbt_edit){
	if(preg_match('/([a-z])+/i', $conf['code'])){ 
		$currencies_obj = new keke_table_class('witkey_currencies');
		$conf['last_updated']=time();
		if($default_cur){
			$default_currency_conf = db_factory::execute(sprintf("update %switkey_basic_config set v='%s' where k='currency'",TABLEPRE,$default_cur));
			$_SESSION['currency'] = $default_cur;
		}$res = $currencies_obj->save($conf,$pk);
			kekezu::admin_show_msg($_lang['operate_success'],$url,2,$_lang['edit_success'],"success");
	}else{
		kekezu::admin_show_msg($_lang['operate_fail'],$url,2,$_lang['currency_code_fill_error'],"error");
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view.'_'.$op );