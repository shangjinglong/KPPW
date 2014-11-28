<?php
kekezu::admin_check_role(138);
$unit = array ('times' =>$_lang['times'], 'month' =>$_lang['month'], 'year' =>$_lang['year'],'day'=>$_lang['day']);
$payitem_arr = PayitemClass::getPayitemConfig (0,null);
$url = "index.php?do=$do&view=$view";
$kekezu->_cache_obj->gc();
if ($item_id) {
	switch ($op) {
		case 'close' :
			$res = PayitemClass::editPayitem ( $item_id, array ('is_open' => '2' ) );
			kekezu::admin_system_log($_lang['close'].$payitem_name);
			$res and kekezu::admin_show_msg ($_lang['payitem_close_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['payitem_close_fail'], $url,3,'','warning' );
		case 'open' :
			$res = PayitemClass::editPayitem ( $item_id, array ('is_open' => '1' ) );
			kekezu::admin_system_log($_lang['open'].$payitem_name);
			$res and kekezu::admin_show_msg ( $_lang['payitem_open_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['payitem_open_fail'], $url,3,'','warning' );
			break;
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_payitem_' . $view );
