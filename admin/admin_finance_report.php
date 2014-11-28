<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 3 );
$year_arr = db_factory::query ( sprintf ( "SELECT DISTINCT(YEAR(FROM_UNIXTIME(fina_time))) as year from %switkey_finance order by year desc", TABLEPRE ) ); 
$income_path = 'tpl/anychart_files/xml/income_%s.xml';
$analysis_path = 'tpl/anychart_files/xml/analysis_%s.xml';
if (isset ( $ac ) && $ac == 'update') {
	income_data ( $income_path, true );
	$res = analysis_data ( $analysis_path, true );
	kekezu::admin_system_log ( $_lang['generation_finance_report'] );
	if ($res) {
		kekezu::admin_show_msg ( $_lang['report_generation_success'], 'index.php?do=finance&view=report', 3, '', 'success' ); 
	}
	kekezu::admin_show_msg ( $_lang['report_generation_success'], 'index.php?do=finance&view=report', 3, '', 'warning' );
}
function update_xml($path, $data, $category) {
	$init_path = $category == 'income' ? 'tpl/anychart_files/xml/income.xml' : 'tpl/anychart_files/xml/analysis.xml';
	$content = file_get_contents ( $init_path );
	$pattern = "/<data>.*<\/data>/is";
	$content = preg_replace ( $pattern, $data, $content );
	$res = file_put_contents ( $path, $content );
	return $res;
}
function income_data($path, $every_year = false) {
	global $_lang;
	$year_arr = db_factory::query ( sprintf ( "SELECT DISTINCT(YEAR(FROM_UNIXTIME(fina_time))) as year from %switkey_finance", TABLEPRE ) );
	$month_init_arr = array (); 
	$series_arr = array (); 
	for($i = 1; $i <= 12; $i ++) {
		$month_init_arr [$i] = '<point name="' . $i . '" y="0"/>';
	}
	if (strtolower ( CHARSET ) != 'utf-8') {
		$y = kekezu::gbktoutf ( $_lang['year'] );
	}
	foreach ( $year_arr as $key => $value ) {
		$month_arr = $month_init_arr;
		$sql = " SELECT MONTH(FROM_UNIXTIME(fina_time)) as mon,sum(fina_cash) as cash,sum(fina_credit) as credit from %switkey_finance where year(FROM_UNIXTIME(fina_time))='%s' GROUP BY mon order by mon desc";
		$temp = db_factory::query ( sprintf ( $sql, TABLEPRE, $value ['year'] ) );
		$point = array ();
		while ( list ( $k, $v ) = each ( $temp ) ) { 
			$point [$v ['mon']] = '<point name="' . ( int ) $v ['mon'] . '" y="' . ($v ['cash'] + $v ['credit']) . '"/>';
			unset ( $month_arr [$v ['mon']] );
		}
		$point = $month_arr + $point; 
		ksort ( $point ); 
		$point = implode ( '', $point );
		$series_arr [$value ['year']] = '<series name="' . $value ['year'] . $y . '">' . $point . '</series>';
		if ($every_year == true) { 
			$year_path = sprintf ( $path, $value ['year'] );
			update_xml ( $year_path, '<data>' . $series_arr [$value ['year']] . '</data>', 'income' );
		}
	}
	$series = implode ( '', $series_arr );
	update_xml ( sprintf ( $path, 'total' ), '<data>' . $series . '</data>', 'income' );
}
function analysis_data($path, $every_year = false) {
	global $year_arr,$_lang;
	$detail_arr = array ($_lang['total'], $_lang['witkey_task'], $_lang['witkey_shop'], $_lang['payitem_service'], $_lang['user_auth'] );
	if (strtolower ( CHARSET ) == 'gbk') {
		$detail_arr = kekezu::gbktoutf ( $detail_arr );
	}
	$series = '';
	$total = $bid_ins = $service_ins = $item_ins = $auth_ins = 0;
	foreach ( $year_arr as $key => $value ) {
		$bid_in = db_factory::get_count ( sprintf ( " select sum(site_profit) as cash from %switkey_finance where (fina_action='task_bid' or fina_action='pub_task') and site_profit>0   and (fina_type='in' or fina_type='out') and YEAR(FROM_UNIXTIME(fina_time))=%d", TABLEPRE, $value ['year'] ) );
		$bid_ins += $bid_in;
		$service_in = db_factory::get_count ( sprintf ( " select sum(site_profit) as cash from %switkey_finance where fina_action='sale_service' and fina_type='in' and YEAR(FROM_UNIXTIME(fina_time))=%d", TABLEPRE, $value ['year'] ) );
		$service_ins += $service_in;
		$item_in = db_factory::get_count ( sprintf ( " select sum(site_profit) as cash from %switkey_finance where fina_action='payitem' and fina_type='out' and YEAR(FROM_UNIXTIME(fina_time))=%d", TABLEPRE, $value ['year'] ) );
		$item_ins += $item_in;
		$auth_in = db_factory::get_count ( sprintf ( " select sum(site_profit) as cash from %switkey_finance where INSTR(fina_action,'_auth') and fina_type='out' and YEAR(FROM_UNIXTIME(fina_time))=%d", TABLEPRE, $value ['year'] ) );
		$auth_ins += $auth_in;
		$point = '';
		$point .= '<point name="' . $detail_arr ['1'] . '" y="' . $bid_in . '"/>';
		$point .= '<point name="' . $detail_arr ['2'] . '" y="' . $service_in . '"/>';
		$point .= '<point name="' . $detail_arr ['3'] . '" y="' . $item_in . '"/>';
		$point .= '<point name="' . $detail_arr ['4'] . '" y="' . $auth_in . '"/>';
		if ($every_year == true) {
			$year_path = sprintf ( $path, $value ['year'] );
			update_xml ( $year_path, '<data><series name="Series 1">' . $point . '</series></data>', 'analysis' );
		}
	}
	$str = '';
	$str .= '<series name="Series 1">';
	$str .= '<point name="' . $detail_arr ['1'] . '" y="' . $bid_ins . '"/>';
	$str .= '<point name="' . $detail_arr ['2'] . '" y="' . $service_ins . '"/>';
	$str .= '<point name="' . $detail_arr ['3'] . '" y="' . $item_ins . '"/>';
	$str .= '<point name="' . $detail_arr ['4'] . '" y="' . $auth_ins . '"/>';
	$str .= '</series>';
	return update_xml ( sprintf ( $path, 'total' ), '<data>' . $str . '</data>', 'analysis' );
}
require_once keke_tpl_class::template ( 'admin/tpl/admin_finance_report' );