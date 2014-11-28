<?php	defined ( 'ADMIN_KEKE' ) or 	exit ( 'Access Denied' );
kekezu::admin_check_role (29);
$filename = S_ROOT.'./admin/tpl/template_tag_'.$tplname.'.htm';
$code_content = "";
if (file_exists($filename)) {
	$fp=fopen($filename,"r");
	while (!feof($fp)) {
		$code_content  .= fgets($fp);
	}
	fclose($fp);
}
require_once $template_obj->template ( 'admin/tpl/admin_tpl_'.$view );