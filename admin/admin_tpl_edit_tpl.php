<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 51 );
$filename = S_ROOT . './tpl/' . $tplname . '/' . $tname;
$code_content = htmlspecialchars ( keke_tpl_class::sreadfile ( $filename ) );
if ($sbt_edit) {
	$filename = S_ROOT . $tname;
	if (! is_writable ( $filename )) {
		kekezu::admin_show_msg ( $_lang['file'] . $filename . $_lang['can_not_write_please_check'], "index.php?do=tpl&view=tpllist&tplname=$tplname",3,'','warning' );
	}
	keke_tpl_class::swritefile ( $filename, htmlspecialchars_decode ( kekezu::k_stripslashes ( $txt_code_content ) ) );
	kekezu::admin_system_log ( $_lang['edit_template'] . $tplname . '/' . $tname );
	kekezu::admin_show_msg ( $_lang['tpl_edit_success'], "index.php?do=tpl&view=tpllist&tplname=$tplname",3,'','success' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_tpl_' . $view );