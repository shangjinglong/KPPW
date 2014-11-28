<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('buy','list','edit');
(! empty ( $view ) && in_array ( $view, $views ))  or  $view = 'list';
require ADMIN_ROOT . 'admin_payitem_' . $view . '.php';
