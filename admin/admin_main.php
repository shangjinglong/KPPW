<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$task_obj = new Keke_witkey_task_class (); 
$user_obj = new Keke_witkey_space_class (); 
$file_obj = new keke_file_class ();
$file_size = $file_obj->getdirsize ( S_ROOT . '/data/uploads' );
$file_size = intval ( $file_size / 1024 / 1024 ); 
$tables = db_factory::query ( "SHOW TABLE STATUS " );
foreach ( $tables as $table ) { 
	$dbsize += $table ['Data_length'] + $table ['Index_length'];
}
$dbsize = round ( $dbsize / 1024 / 1024, 2 ); 
if(DBTYPE=='mysql'){
	$mysql_ver = mysql_get_server_info (); 
}else{
	$db = db_factory::init();
	$mysql_ver = mysqli_get_server_info ($db->_mydb->_link); 
}
$sys_info ['os'] = PHP_OS;
$sys_info ['ip'] = $_SERVER ['SERVER_ADDR'];
$sys_info ['web_server'] = $_SERVER ['SERVER_SOFTWARE'];
$sys_info ['php_ver'] = PHP_VERSION;
$sys_info ['mysql_ver'] = $mysql_ver;
$sys_info ['safe_mode'] = ( boolean ) ini_get ( 'safe_mode' ) ? $_LANG ['yes'] : $_LANG ['no'];
$sys_info ['safe_mode_gid'] = ( boolean ) ini_get ( 'safe_mode_gid' ) ? $_LANG ['yes'] : $_LANG ['no'];
$sys_info ['timezone'] = function_exists ( 'date_default_timezone_set' ) ? date_default_timezone_set ( 'Asia/Shanghai' ) : date_default_timezone_set ( 'Asia/Shanghai' );
$sys_info ['max_filesize'] = ini_get ( 'upload_max_filesize' );
$sys_info ['file_uploads'] = ini_get ( 'file_uploads' );
$model_list = kekezu::get_table_data ( '*', 'witkey_model', " model_type = 'task' and model_status='1'", 'listorder asc ', '', '', 'model_id', 3600 );
$shop_list = kekezu::get_table_data ( '*', 'witkey_model', " model_type = 'shop' and model_status='1'", 'listorder asc ', '', '', 'model_id', 3600 );
$task_count = kekezu::get_table_data ( "model_id,count(task_id) as count", "witkey_task", " DATE(from_unixtime(start_time))=DATE('".date ( 'Y-m-d', time () )."')", '', 'model_id', '', 'model_id' );
$shop_all_count =  intval ( db_factory::get_count ( sprintf ( " select count(service_id) from %switkey_service where DATE(from_unixtime(on_time))=DATE('%s') ", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$shop_count = kekezu::get_table_data("model_id,count(service_id) as count", "witkey_service", " DATE(from_unixtime(on_time))=DATE('".date ( 'Y-m-d', time () )."')", '', 'model_id', '', 'model_id' );
$news_count = intval ( db_factory::get_count ( sprintf ( " select count(msg_id) from %switkey_msg where to_uid='%d' and  uid>0 ", TABLEPRE, $admin_info [uid] ) ) );
$task_all_count = intval ( db_factory::get_count ( sprintf ( " select count(task_id) from %switkey_task where DATE(from_unixtime(start_time))=DATE('%s') ", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$user_count = intval ( db_factory::get_count ( sprintf ( " select count(uid) from %switkey_space where DATE(from_unixtime(reg_time))=DATE('%s')", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$withdraw_count = intval ( db_factory::get_count ( sprintf ( " select count(withdraw_id) from %switkey_withdraw where DATE(from_unixtime(applic_time))=DATE('%s')", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$charge_count = intval ( db_factory::get_count ( sprintf ( " select count(order_id) from %switkey_order_charge where DATE(from_unixtime(pay_time))=DATE('%s') ", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$apply_shop_count = intval ( db_factory::get_count ( sprintf ( " select count(shop_id) from %switkey_shop where DATE(from_unixtime(on_time))=DATE('%s') and shop_status is null ", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$right_count = intval ( db_factory::get_count ( sprintf ( " select count(report_id) from %switkey_report where DATE(from_unixtime(on_time))=DATE('%s') and report_type = 1", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$proposal_count = intval (db_factory::get_count ( sprintf ( " select count(p_id) from %switkey_proposal where DATE(from_unixtime(pro_time))=DATE('%s')", TABLEPRE, date ( 'Y-m-d', time () ) ) ));
$report_count = intval ( db_factory::get_count ( sprintf ( " select count(report_id) from %switkey_report where DATE(from_unixtime(on_time))=DATE('%s') and report_type = 2", TABLEPRE, date ( 'Y-m-d', time () ) ) ) );
$pars = array (
		'ac' => 'run',
		'sitename' => urlencode ( $basic_config ['website_name'] ),
		'siteurl' => htmlentities ( $basic_config ['website_url'] ),
		'charset' => $_K ['charset'],
		'version' => KEKE_VERSION,
		'release' => KEKE_RELEASE,
		'os' => PHP_OS,
		'php' => $_SERVER ['SERVER_SOFTWARE'],
		'mysql' => $mysql_ver,
		'browser' => urlencode ( $_SERVER ['HTTP_USER_AGENT'] ),
		'username' => urlencode ( $_SESSION ['username'] ),
		'email' => $basic_config ['email'] ? $basic_config ['email'] : 'noemail',
		'p_name' => P_NAME
);
$data = http_build_query ( $pars );
$lic = $_K ['ci'];
$str_lic = kekezu::set_star($lic,5,5,'3','*');
$verify = md5 ( $data . $lic );
$notice = "http://www.kekezu.com/update.php?" . $data . "&lic=" . urlencode ( $lic ) . "&verify=" . $verify ;
$sys = array (
		"ac" => "sysinfo",
		'charset' => $_K ['charset'],
		'p_name' => P_NAME
);
$sysinfo = "http://www.kekezu.com/news.php?" . http_build_query ( $sys );
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do );