<?php
header('Content-Type: text/html; charset=UTF-8');
$arrOauthConfig = $weibo_list;
define( "QQ_AKEY" , $arrOauthConfig['qq_app_id'] );
define( "QQ_SKEY" , $arrOauthConfig['qq_app_secret'] );
define( "QQ_CALLBACK_URL" , $kekezu->_sys_config['website_url'].'/index.php?do=callbackqq' );
define( "TEN_AKEY" , $arrOauthConfig['ten_app_id'] );
define( "TEN_SKEY" , $arrOauthConfig['ten_app_secret'] );
define( "TEN_CALLBACK_URL" , $kekezu->_sys_config['website_url'].'/index.php?do=callbackten' );
define( "WB_AKEY" , $arrOauthConfig['sina_app_id'] );
define( "WB_SKEY" , $arrOauthConfig['sina_app_secret'] );
define( "WB_CALLBACK_URL" , $kekezu->_sys_config['website_url'].'/index.php?do=callbacksina' );
define ( "APP_KEY", $arrOauthConfig['renren_app_id'] );
define ( "APP_SECRET", $arrOauthConfig['renren_app_secret'] );
define ( "CALLBACK_URL", $kekezu->_sys_config['website_url']."/index.php?do=callbackrenren" );
define ( "DB_APIKEY", $arrOauthConfig['douban_app_id'] );	
define ( "DB_SECRET", $arrOauthConfig['douban_app_secret'] );					
define ( "DB_CALLBACK_URL", $kekezu->_sys_config['website_url']."/index.php?do=callbackdb" );
define ( "DB_SCOPE", "douban_basic_common,shuo_basic_r" );		//权限列表，具体权限请查看官方的api文档