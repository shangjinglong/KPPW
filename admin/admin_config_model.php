<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 37 );
$model_type or $model_type = 'task';
kekezu::empty_cache();
if ($op == "open") {
	$model_obj = new Keke_witkey_model_class ();
	$model_obj->setWhere ( "model_id = $model_id" );
	$model_obj->setModel_status ( 1 );
	$model_obj->edit_keke_witkey_model ();
	$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	kekezu::admin_system_log ( $_lang ['open_task_model'] . $model_list [$model_id] [model_name] );
	kekezu::admin_show_msg ( $_lang ['operate_success'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'success' );
} elseif ($op == 'close') {
	$model_obj = new Keke_witkey_model_class ();
	$model_obj->setWhere ( "model_id = $model_id" );
	$model_obj->setModel_status ( 0 );
	$model_obj->edit_keke_witkey_model ();
		$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	kekezu::admin_system_log ( $_lang ['close_task_model'] . $model_list [$model_id] [model_name] );
	kekezu::admin_show_msg ( $_lang ['operate_success'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'success' );
} elseif ($op == 'add') {
	$root_dir = S_ROOT . './' . $model_type . '/' . $txt_model_name;
	if (! is_dir ( $root_dir )) {
		kekezu::admin_show_msg ( $_lang ['model_dir_not_exists'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'warning' );
	} else {
		$install_dir = $root_dir . '/admin/install/install.php';
		if (! file_exists ( $install_dir )) {
			kekezu::admin_show_msg ( $_lang ['install_file_not_exists'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'warning' );
		} else {
			include $install_dir;
			kekezu::admin_system_log ( $_lang ['create_task_model'] . $model_name );
			kekezu::admin_show_msg ( $_lang ['model_add_success'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'success' );
		}
	}
	$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
} elseif ($op == 'del') {
	$model_obj = new Keke_witkey_model_class ();
	$model_obj->setModel_id ( $model_id );
	$model_info = $model_list [$model_id];
	if ($model_type == 'task' && file_exists ( S_ROOT . "./" . $model_type . "/" . $model_info [model_dir] . "/admin/uninstall_sql.php" )) {
		require "../../task/" . $model_info [model_dir] . "/admin/uninstall_sql.php";
	}
	$model_obj->del_keke_witkey_model ();
		$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	kekezu::admin_system_log ( $_lang ['delete_task_model'] . $model_list [$model_id] [model_name] );
	kekezu::admin_show_msg ( $_lang ['model_unloading_success'], "index.php?do=config&view=model&model_type=$model_type", 2, '', 'success' );
} elseif ($op == 'listorder') {
	$model_obj = new Keke_witkey_model_class ();
	$model_obj->setWhere ( "model_id='$model_id'" );
	$model_obj->setListorder ( $value ? $value : 0 );
	$model_obj->edit_keke_witkey_model ();
		$file_obj = new keke_file_class();
	$file_obj->delete_files(S_ROOT."./data/data_cache/");
	kekezu::admin_system_log ( $_lang ['edit_task_model'] . $model_list [$model_id] [model_name] );
	die ();
}
$model_list = $kekezu->_model_list;
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_model' );