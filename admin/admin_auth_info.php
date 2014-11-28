<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$code or kekezu::admin_show_msg ( $_lang['error_param'], "index.php?do=auth",3,'','warning');
$code and require S_ROOT.'./auth/'.$auth_dir.'/admin/auth_info.php';
