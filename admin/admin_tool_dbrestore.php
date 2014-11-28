<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 18 );
$db_factory = new db_factory ();
$file_obj = new keke_file_class ();
$backup_patch = S_ROOT . './data/backup/';
$file_arr = $file_obj->get_dir_file_info ( $backup_patch );
switch ($ac) {
	case 'restore' :
		set_time_limit ( 0 );
		$file_sql = file_get_contents ( $backup_patch . $file_arr [$restore_name] [name] );
		$file_sql = htmlspecialchars_decode ( $file_sql );
		$sql = str_replace ( "\r\n", "\n", $file_sql );
		$ret = array ();
		$num = 0;
		foreach ( explode ( ";\n#####", trim ( $sql ) ) as $query ) {
			$ret [$num] = '';
			$queries = explode ( "\n", trim ( $query ) );
			foreach ( $queries as $query ) {
				$ret [$num] .= (isset ( $query [0] ) && $query [0] == '#') || (isset ( $query [1] ) && isset ( $query [1] ) && $query [0] . $query [1] == '--') ? '' : $query;
			}
			$num ++;
		}
		foreach ( $ret as $vvv ) {
			empty ( $vvv ) or $res .= db_factory::execute ( $vvv );
		}
		if ($res) {
			kekezu::admin_system_log ( $_lang['restore_database_operate_success'] . $file_arr [$restore_name] [name] );
			kekezu::echojson ( $_lang['database_restore_success'], 1 );
		} else {
			kekezu::admin_system_log ( $_lang['restore_database_operate_fail'] );
			kekezu::echojson ( $_lang['database_restore_fail'], 0 );
		}
		break;
	case 'del' :
		$res = unlink ( $backup_patch . $file_arr [$restore_name] [name] );
		if ($res) {
			kekezu::admin_system_log ( $_lang['delete_database_backup_file'] . $file_arr [$restore_name] [name] );
			kekezu::admin_show_msg ( $_lang['delete_database_backup_file_success'], 'index.php?do=' . $do . '&view=' . $view ,3,'','success');
		} else {
			kekezu::admin_show_msg ( $_lang['delete_database_backup_file_fail'], 'index.php?do=' . $do . '&view=' . $view ,3,'','warning');
		}
		break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );