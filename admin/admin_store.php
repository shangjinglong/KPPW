<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array (
		"list" ,"config","info"
);
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'list';
require "admin_store_$view.php";
