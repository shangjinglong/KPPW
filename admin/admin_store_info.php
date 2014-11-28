<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
intval ( $shop_id ) or kekezu::admin_show_msg ( $_lang ['param_error'], 'index.php?do=store&view=list', 3, '', 'warning' );
$shop_info = db_factory::get_one ( sprintf ( " select * from %switkey_shop where shop_id='%d'", TABLEPRE, $shop_id ) );
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY.'/tpl/admin_store_info' );