<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
if ($op == 'repair') { 
	if ($is_submit) {
		$table_arr = db_factory::query ( " SHOW TABLES" );
		foreach ( $table_arr as $v ) {
			db_factory::execute ( "REPAIR TABLE " . $v ['Tables_in_' . DBNAME] ); 
		}
		kekezu::admin_show_msg ( $_lang ['operate_notice'], 'index.php?do=tool&view=dboptim&op=repair', 3, kekezu::lang ( "operate_success" ), 'success' );
	}
} else {
	if ($is_submit) {
		$optimizetables or kekezu::admin_show_msg ( $_lang ['operate_notice'], 'index.php?do=tool&view=dboptim', 3, $_lang ['no_select_table'], 'warning' );
		foreach ( $optimizetables as $v ) {
			db_factory::execute ( "OPTIMIZE TABLE " . $v ); 
		}
		kekezu::admin_show_msg ( $_lang ['operate_notice'], 'index.php?do=tool&view=dboptim', 3, kekezu::lang ( "operate_success" ), 'success' );
	} else {
		$table_arr = db_factory::query ( "SHOW TABLE STATUS FROM `" . DBNAME . "` LIKE '" . TABLEPRE . "%'" );
		foreach ( $table_arr as $k => $v ) { 
			$v ['Data_free'] > 0 and $table_free_list [$k] = $v;
		}
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );