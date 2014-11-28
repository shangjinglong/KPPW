<?php
/**
 * 安装kppw2.0
 * @copyright keke-tech
 * @author hr
 * @version v 2.0
 * @date 2012-1-13 下午5:31:35
 */
//error_reporting ( 0 );
error_reporting(1);
set_magic_quotes_runtime ( 0 );
session_start ();

define ( 'INSTALL_ROOT', dirname ( __FILE__ ) . DIRECTORY_SEPARATOR ); // 安装目录
define ( 'KEKE_ROOT', dirname ( INSTALL_ROOT ) . DIRECTORY_SEPARATOR ); // 根目录
require_once '../lib/inc/keke_base_class.php';
require_once '../lib/inc/keke_tpl_class.php';
require_once '../lib/inc/keke_lang_class.php';
require_once '../lib/helper/keke_file_class.php';
require_once KEKE_ROOT . 'config/keke_version.php'; // 版本信息
require_once KEKE_ROOT . 'config/config.inc.php'; // 配置信息
require_once INSTALL_ROOT . 'install_function.php'; // func
require_once INSTALL_ROOT . 'install_var.php'; // 环境变量检测相关
require_once INSTALL_ROOT . 'install_mysql.php'; // db install class
require_once INSTALL_ROOT . 'install_lang.php'; // language

$lock_sign = KEKE_ROOT . '/data/keke_kppw_install.lck'; // lock sign

$config_path = KEKE_ROOT . 'config/config.inc.php'; // 配置信息
$sqlfile = INSTALL_ROOT . 'data/keke_kppw_install.sql'; // 初始化

$sqldemofile = INSTALL_ROOT . 'data/keke_kppw_demo.sql'; // 带演示


$data_cache_path = KEKE_ROOT . './data/data_cache/';
$tpl_cache_path = KEKE_ROOT . './data/tpl_c/';
$_REQUEST ['lang'] && $_SESSION ['lang'] = addslashes ( $_REQUEST ['lang'] );
$lan = isset ( $_SESSION ['lang'] ) ? $_SESSION ['lang'] : 'cn';
header ( "Content-Type:text/html; charset=" . CHARSET );
// 已安装
file_exists ( $lock_sign ) and exit ( L ( 'has_been_installed' ) );

// sql文件不存在
file_exists ( INSTALL_ROOT . 'data/keke_kppw_install.sql' ) or exit ( L ( 'main_sql_file_does_not_exist' ) );

$step = $_REQUEST ['step'] ? $_REQUEST ['step'] : 'start';
switch ($step) {
	case 'start' :
		$license_path = INSTALL_ROOT . 'data/license_' . $lan . '.txt';
		$license = file_get_contents ( $license_path );
		$license = nl2br ( str_replace ( ' ', '&nbsp;', $license ) );
		include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step . '.tpl.php';
		break;
	case 'checkset' : // 环境，文件权限，函数等检测
		$error_num = 0; // 不符合要求的个数
		                // 版本
		$check_version = phpversion (); // 版本
		if ($check_version < $env_items ['php'] ['r']) {
			$error_num += 1;
		}
		// GD
		$check_gd = function_exists ( 'gd_info' ) ? gd_info () : array (); // GD
		$check_gd = $check_gd ['GD Version'] ? $check_gd ['GD Version'] : 0;
		if ($check_gd < $env_items ['gdversion'] ['r']) {
			$error_num += 1;
		}
		// 目录、文件执行权限
		$check_dir = array ();
		foreach ( $dirfile_items as $key => $value ) {
			$dir_path = $value ['path'];
			$dir_perm = ''; // 文件权限, 1表示正常、0表示目录不可写、-1表示不存在
			if ($value ['type'] == 'dir') {
				if (! dir_writeable ( KEKE_ROOT . $dir_path )) {
					$dir_perm = is_dir ( KEKE_ROOT . $dir_path ) ? 0 : - 1; // 如果is_dir==true则为不可写,否则就是不存在咯
					$error_num += 1;
				} else {
					$dir_perm = 1;
				}
			} else {
				if (file_exists ( KEKE_ROOT . $dir_path )) {
					if (is_writable ( KEKE_ROOT . $dir_path )) {
						$dir_perm = 1;
					} else {
						$dir_perm = 0;
						$error_num += 1;
					}
				} else {
					if (dir_writeable ( dirname ( KEKE_ROOT . $dir_path ) )) {
						$dir_perm = 1;
					} else {
						$dir_perm = - 1;
						$error_num += 1;
					}
				}
			}
			$check_dir [$dir_path] = $dir_perm;
		}
		// 函数依赖
		$check_func = array ();
		foreach ( $func_items as $value ) {
			if (function_exists ( $value )) {
				$func_result = 1;
			} else {
				$func_result = 0;
				$error_num += 1;
			}
			$check_func [$value] = $func_result;
		}
		include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step . '.tpl.php';
		break;
	// 数据库表单信息
	case 'sql' :
		$defalut_config_path = INSTALL_ROOT . 'data' . DIRECTORY_SEPARATOR . 'config.inc.php';
		if (file_exists ( $defalut_config_path )) { // 默认配置
			include $defalut_config_path;
			$dbhost = $keke_config ['db'] ['dbhost'];
			$dbname = $keke_config ['db'] ['dbname'];
			$dbuser = $keke_config ['db'] ['dbuser'];
			$dbpw = $keke_config ['db'] ['dbpass'];
			$tablepre = $keke_config ['db'] ['tablepre'];
		}
		include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step . '.tpl.php';
		break;
	case 'sql_execute' :
		$c_path = substr ( $_SERVER [REQUEST_URI], 0, - 34 );
		if (! $_POST) {
			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
			break;
		}
		extract ( $_POST );
		// check database info
		empty ( $dbhost ) && $error_arr ['dbhost'] = L ( 'dbhost_cannot_be_null' );
		empty ( $dbname ) && $error_arr ['dbname'] = L ( 'dbname_cannot_be_null' );
		empty ( $dbuser ) && $error_arr ['dbuser'] = L ( 'dbaccount_cannot_be_null' );
		empty ( $dbpw ) && $error_arr ['dbpw'] = L ( 'dbpwd_cannot_be_null' );
		// check admin account
		empty ( $admin_account ) && $error_arr ['admin_account'] = L ( 'admin_account_cannot_be_null' );
		empty ( $admin_password ) && $error_arr ['admin_password'] = L ( 'admin_pwd_cannot_be_null' );
		(empty ( $admin_password2 ) || $admin_password2 != $admin_password) && $error_arr ['admin_password2'] = L ( 'password_different_wrong' );
		empty ( $data_type ) && $error_arr ['data_type'] = L ( 'select_init_type' );
		preg ( $dbname ) == false && $error_arr ['dbname'] = L ( 'error_formate' );
		(strpos ( $tablepre, '.' ) !== false || preg ( $tablepre ) == false) && $error_arr ['tablepre'] = L ( 'table_pre_error' );
		if ($error_arr) {
			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
			break;
		}
		if (! $link = mysql_connect ( $dbhost, $dbuser, $dbpw )) {

			$error_arr ['dbpw'] = L ( 'connect_error_login_failed' );
			$error_arr ['dbname'] = L ( 'connect_error_login_failed' );
			$error_arr ['dbuser'] = L ( 'connect_error_login_failed' );

			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
			break;
		}
		$_SESSION ['link'] = mysql_get_server_info ();
		// 检测数据库是否存在,并提示是否覆盖安装
		if (mysql_select_db ( $dbname, $link ) && ! $cover_data [0] == 'cover') {
			$error_arr ['cover_data'] = L ( 'cover_db_tips' ); // 提示是否重复安装
			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
			break;
		}
		if (mysql_get_server_info () > '4.1') {
			mysql_query ( "CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET " . DBCHARSET, $link );
		} else {
			mysql_query ( "CREATE DATABASE IF NOT EXISTS `$dbname`", $link );
		}
		if (mysql_errno ()) {
			$error_arr ['dbname'] = 'database_errno_1044' . mysql_error ();
			include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . 'sql.tpl.php';
			break;
		}
		mysql_close ( $link );
		$db = new db_tool ();
		$db->connect ( $dbhost, $dbuser, $dbpw, $dbname, DBCHARSET );
		$temp_arr = array (
				"dbhost" => $dbhost,
				"dbname" => $dbname,
				"dbuser" => $dbuser,
				"dbpass" => $dbpw,
				"tablepre" => $tablepre,
				'cookie_path' => $c_path
		);
		$config_content = keke_tpl_class::sreadfile ( $config_path );
		foreach ( $temp_arr as $key => $value ) {
			$key = strtoupper ( $key );
			$config_content = preg_replace ( "/define\s?+\(\s?+'($key)'\s?+,\s?+.*'\s?+\);/i", "define ( '$key', '$value');", $config_content );
		}
		keke_tpl_class::swritefile ( $config_path, $config_content ); // 写配置文件

		if ($data_type == 'b') { // 带演示版本
			$sqlfile = $sqldemofile;
		}

		$sql = file_get_contents ( $sqlfile );
		$sql = str_replace ( "\r\n", "\n", $sql );

		include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step . '.tpl.php';

		runquery ( $sql, $tablepre, $db ); // ob


		for($i=1;$i<=3;$i++){
			$sql_district = file_get_contents(INSTALL_ROOT . 'data/keke_witkey_district_'.$i.'.sql');
			$sql_district = str_replace ( "\r\n", "\n", $sql_district );
			runquery ( $sql_district, $tablepre, $db ); // ob
		}




		$password = md5 ( $admin_password );

		$slt = randomkeys ( 6 ); // 随机码
		$sec_code = get_password ( $password, $slt );
		if ($data_type == 'b') { // 演示版本,更新数据
			$db->query ( "update `{$tablepre}witkey_member` set username = '$admin_account',password = '$password',email = '$admin_email',rand_code='$slt' where uid = 1" );
			$db->query ( "update `{$tablepre}witkey_space` set username = '$admin_account',password = '$password',email = '$admin_email',sec_code='$sec_code',group_id = 1,status = 1 where uid = 1" );
		} else { // 纯净版本、插入数据
			$db->query ( "replace INTO `{$tablepre}witkey_member`(`uid`,`username`,`password`,`email`,`rand_code`) VALUES ('1', '$admin_account','$password','$admin_email','$slt')" );
			$db->query ( "replace INTO `{$tablepre}witkey_space` (`uid`,`username`,`password`,`email`,`sec_code`,`group_id`,`status`,`reg_time`) VALUES('1','$admin_account','$password','$admin_email','$sec_code','1','1','" . time () . "')" );
		}
		$db->query ( "update `{$tablepre}witkey_basic_config` set v = '$weburl' where config_id=3" );

		$file_obj = new keke_file_class ();
		$file_obj->delete_files ( $data_cache_path );
		$file_obj->delete_files ( $tpl_cache_path );

		$pars = array (
				'ac' => 'install',
				'sitename' => '',
				'siteurl' => $weburl,
				'charset' => CHARSET,
				'version' => KEKE_VERSION,
				'release' => KEKE_RELEASE,
				'os' => PHP_OS,
				'php' => $_SERVER ['SERVER_SOFTWARE'],
				'mysql' => mysql_get_server_info (),
				'browser' => urlencode ( $_SERVER ['HTTP_USER_AGENT'] ),
				'username' => urlencode ( $_SESSION ['username'] ),
				'email' => $admin_email,
				'ip' => $_SERVER ['SERVER_ADDR']
		);
		$data = http_build_query ( $pars );
		// sleep(3);
		echo "<script>window.location.replace('index.php?step=finish&$data');</script>";

		break;
	// finally
	case 'finish' :
		$str = md5 ( random ( 100 ) . '_' . time () ) . '_keke_install.lck';
		@touch ( $lock_sign ); // 设定lock sign文件的访问和修改时间
		file_put_contents ( $lock_sign, $str );
		$version = $_SESSION ['link'];
		unset ( $_SESSION ['link'], $_SESSION ['lang'] );
		if (file_exists ( KEKE_ROOT . "./config/lic.php" )) {
			require KEKE_ROOT . "./config/lic.php";
			$lic = $_K ['ci'];
		}
		$data = http_build_query ( $_GET );
		$verify = md5 ( $data . $lic );
		$url = "http://www.kekezu.com/update.php?" . $data . "&lic=" . $lic . "&verify=" . $verify . "&p_name=" . P_NAME;
		if (is_resource ( curl_init () )) {
			keke_base_class::curl_request ( $url );
		} else {
			keke_base_class::socket_request ( $url );
		}
		include INSTALL_ROOT . 'tpl' . DIRECTORY_SEPARATOR . $step . '.tpl.php';
		break;
}
/**
 * 随机生成字符串
 *
 * @param Int $length
 * @return String Time Elapsed
 * @author shangjinglong
 * @copyright keke-tech
 */
function randomkeys($length) {
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ'; // 字符池
	for($i = 0; $i < $length; $i ++) {
		$key .= $pattern {mt_rand ( 0, 35 )}; // 生成php随机数
	}
	return $key;
}
/**
 * 成生密码
 *
 * @param 原始密码 $pwd
 * @param 随机码 $slt
 * @return password
 */
function get_password($pwd, $slt) {
	if ($pwd && $slt) {
		$passwordmd5 = preg_match ( '/^\w{32}$/', $pwd ) ? $pwd : md5 ( $pwd );
		return md5 ( $passwordmd5 . $slt );
	} else {
		return false;
	}
}
function preg($string) {
	if (preg_match ( "/\W+/i", $string )) {
		return false;
	}
	return true;
}
function L($lang_key) {
	global $lan; // session中的语言设定
	global $lang; // install_lang.php中的对应的array
	$lang_c = $lang [$lan] [$lang_key];
	return $lang_c ? $lang_c : 'unknow';
}
