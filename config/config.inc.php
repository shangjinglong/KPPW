<?php
error_reporting ( 0 );
define ( 'ADMIN_UID', '1' );
define ( 'DBHOST', 'localhost' );
define ( 'DBNAME', 'kppw25' );
define ( 'DBUSER', 'root' );
define ( 'DBPASS', '123456' );
define ( 'DBCHARSET', 'utf8' );
define ( 'CHARSET', 'utf-8' );
define ( 'DBTYPE', 'mysql' );
define ( 'TABLEPRE', 'keke_' ); // 表前缀
define ( 'ENCODE_KEY', 'keke' ); // 加密KEY
define ( 'GZIP', TRUE ); // 开启GIZP
define ( 'KEKE_DEBUG', 0); // 开启调试模式
define ( "TPL_CACHE", 1); // 模板缓存
define ( 'IS_CACHE', 1);
define ( 'CACHE_TYPE', 'file' ); // 缓存类型

define ( 'COOKIE_DOMAIN', '' ); // Cookie 作用域
define ( 'COOKIE_PATH', '/' ); // Cookie 作用路径
define ( 'COOKIE_PRE', 'kekeWitkey' );
define ( 'COOKIE_TTL', 0 ); // Cookie 生命周期，0 表示随浏览器进程

define ( 'SESSION_MODULE', 'files' );
define ( 'SYS_START_TIME', time () );

// 设置时区
function_exists ( 'date_default_timezone_set' ) and date_default_timezone_set ( 'PRC' );
define('ADMIN_DIRECTORY','admin');