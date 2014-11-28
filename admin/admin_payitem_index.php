<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(138);
$unit = array ('times' =>$_lang['times'], 'month' =>$_lang['month'], 'year' =>$_lang['year'],'day'=>$_lang['day']);
$type_arr = array("witkey"=>$_lang['witkey'],"employer"=>$_lang['employer']);
$payitem_arr = keke_payitem_class::get_payitem_config ($user_type,null,null,0,null);
$url = "index.php?do=$do&view=$view";
$kekezu->_cache_obj->gc();
if ($item_id) {
	switch ($op) {
		case 'close' :
			$res = keke_payitem_class::payitem_edit ( $item_id, array ('is_open' => '2' ) );
			kekezu::admin_system_log($_lang['close'].$payitem_name);
			$res and kekezu::admin_show_msg ($_lang['payitem_close_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['payitem_close_fail'], $url,3,'','warning' );
		case 'open' :
			$res = keke_payitem_class::payitem_edit ( $item_id, array ('is_open' => '1' ) );
			kekezu::admin_system_log($_lang['open'].$payitem_name);
			$res and kekezu::admin_show_msg ( $_lang['payitem_open_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['payitem_open_fail'], $url,3,'','warning' );
			break;
		case 'del' : 
			$res = keke_payitem_class::payitem_uninstall ( $item_id );
			kekezu::admin_system_log($_lang['uninstall'].$payitem_name);
			$res and kekezu::admin_show_msg ($_lang['payitem_uninstall_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['payitem_uninstall_fail'], $url,3,'','warning' );
			break;
	}
} elseif ($op == 'add'&&$txt_item_code) {
	$res = keke_payitem_class::payitem_install ( $txt_item_code );
	kekezu::admin_system_log($_lang['install_new_add_manage']);
	$res and kekezu::admin_show_msg ($_lang['payitem_install_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['payitem_install_fail'], $url,3,'','warning' );
}
require $template_obj->template ( 'admin/tpl/admin_payitem_' . $view );
