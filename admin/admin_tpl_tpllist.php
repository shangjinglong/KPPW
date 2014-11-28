<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (28);
$filepath = S_ROOT.'./tpl/'.$tplname;
$file_obj = new keke_file_class();
$tpllist = $file_obj->get_dir_file_info($filepath,true,true);
arsort($tpllist);
require_once $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_tpl_tpllist');
