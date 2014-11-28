<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
keke_lang_class::package_init("auth");
keke_lang_class::loadlang("{$do}_{$view}");
$views = array ('item_list', 'info', 'list', 'item_edit' );
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'item_list';
if (file_exists ( ADMIN_ROOT . 'admin_' . $do . '_' . $view . '.php' )) {
	keke_lang_class::package_init ( "auth" );
	keke_lang_class::loadlang ( "admin_$view" );
	if (! $auth_dir) { 
		$auth_item_list = keke_auth_base_class::get_auth_item (); 
		$keys = array_keys ( $auth_item_list );
		$code or $code = $keys ['0']; 
        if($view!='item_list'){
        	if($auth_item_list[$code]){
        		$auth_class = "keke_auth_" . $code . "_class";
        		$auth_obj = new $auth_class ( $code ); 
        		$auth_item = $auth_item_list [$code]; 
        		$auth_dir = $auth_item ['auth_dir']; 
        		keke_lang_class::loadlang ( $auth_dir );
        	}else{
        		kekezu::show_msg($_lang['illegal_parameter_or_authmadel_delete'],"index.php?do=auth&view=item_list",3,'','warning');
        	}
        }
	}
	require ADMIN_ROOT . 'admin_' . $do . '_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}