<?php
define ( "IN_KEKE", TRUE );
include 'app_comm.php';
$task_open = $kekezu->_task_open;
$shop_open = $kekezu->_shop_open;
$dos = $kekezu->_route; 
(! empty ( $do ) && in_array ( $do, $dos )) and $do or (! $_GET && ! $_POST and $do = $kekezu->_sys_config ['set_index'] or $do = 'index');
isset ( $m ) && $m == "user" and $do = "avatar";
keke_lang_class::package_init ( "index" );
keke_lang_class::loadlang ( $do );
$kekezu->init_lang ();
$page_keyword = $kekezu->_sys_config ['seo_keyword'];
$page_description = $kekezu->_sys_config ['seo_desc'];
$strWebLogo = $kekezu->_sys_config ['web_logo'];
$gUid = $uid = intval ( $kekezu->_uid );
$gUsername = $username = $kekezu->_username;
$messagecount = $kekezu->_messagecount;
$gUserInfo = $user_info = $kekezu->_userinfo;
$indus_p_arr = $kekezu->_indus_p_arr;
$indus_c_arr = $kekezu->_indus_c_arr;
$indus_arr = $kekezu->_indus_arr;
$indus_task_arr = $kekezu->_indus_task_arr;
$indus_goods_arr = $kekezu->_indus_goods_arr;
$arrModelList = $model_list = $kekezu->_model_list;
$nav_arr = kekezu::nav_list ( $kekezu->_nav_list ); 
$lang_list = $kekezu->_lang_list;
$language = $kekezu->_lang;
$currency = $kekezu->_currency; 
$curr_list = $kekezu->_curr_list; 
$api_open = $kekezu->_api_open;
$weibo_list = $kekezu->_weibo_list;
$f_c_list = keke_curren_class::get_curr_list ( 'code,title' );
$_currencies = keke_curren_class::get_curr_list ();
$log_account = null;
if (isset ( $_COOKIE ['log_account'] )) {
	$log_account = $_COOKIE ['log_account'];
}
$wb_type = $_SESSION ['wb_type'];
if ($wb_type && $_SESSION ['auth_' . $wb_type] ['last_key']) {
	$oa = new keke_oauth_login_class ( $wb_type );
	$oauth_user_info = $oa->get_login_user_info ();
}
if(intval($u)){
	if(!isset ( $_COOKIE ['prom'] )){
		$objProm = keke_prom_class::get_instance ();
		$objProm->create_prom_cookie ( $_SERVER ['QUERY_STRING'] );
	}
}
$arrTopIndus = db_factory::query("SELECT count(task_id) as count ,indus_id FROM  ".TABLEPRE."witkey_task where task_status>=2 group by indus_id order by count desc limit 5");
kekezu::redirect_second_domain ();
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
require 'control/' . $do . '.php';
require $kekezu->_tpl_obj->template ( $do );