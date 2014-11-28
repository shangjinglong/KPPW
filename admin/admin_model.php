<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$model_id or kekezu::admin_show_msg ( $_lang['error_model_param'], "index.php?do=info",3,'','warning' );
$model_info = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_model where model_id = '$model_id'" );
if (! $model_info ['model_status']) {
	header ( "location:index.php?do=config&view=model" );
	die ();
}
keke_lang_class::package_init ( "task_{$model_info ['model_dir']}" );
keke_lang_class::loadlang ( "admin_{$do}_{$view}" );
keke_lang_class::loadlang("task_{$view}");
keke_lang_class::package_init ( "shop" );
keke_lang_class::loadlang("{$model_info [model_dir]}_{$view}");
require S_ROOT . $model_info ['model_type'] . "/" . $model_info ['model_dir'] . "/admin/admin_route.php";
