<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-08 11:31:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
//语言包初始化
keke_lang_class::package_init ( "shop" );
keke_lang_class::loadlang("service_process");

$views = array ('config','list', 'order', 'op','process' ,'edit');

$view = in_array ( $view, $views ) ? $view : "list";

require "service_$view.php";
