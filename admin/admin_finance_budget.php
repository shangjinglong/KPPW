<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 6 );
$charge_type_arr=keke_glob_class::get_charge_type();
$bank_arr = keke_glob_class::get_bank();
$sql_in = "select * from ".TABLEPRE."witkey_order_charge where order_status ='ok' order by pay_time desc";
$count_in = db_factory::execute ( $sql_in );
$sql_out = "select * from " . TABLEPRE . "witkey_withdraw where withdraw_status = 2 order by process_time desc ";
$count_out = db_factory::execute ( $sql_out );
$kekezu->_page_obj->setAjax(1);
$kekezu->_page_obj->setAjaxDom('ajax_dom');
$page_size and $page_size = intval ( $page_size ) or $page_size = 10;
$page and $page = intval ( $page ) or $page = '1';
$url = "index.php?do=$do&view=$view&op=$op&page_size=$page_size&ord[]=$ord[0]&ord[]=$ord[1]";
$sum_out = db_factory::query(sprintf("select sum(withdraw_cash) as c from %switkey_withdraw where withdraw_status = 2",TABLEPRE));
$total_out = $sum_out[0]['c'];
$sum_in = db_factory::query(sprintf("select sum(pay_money) as c from %switkey_order_charge where order_status ='ok'",TABLEPRE));
$total_in = $sum_in[0]['c'];
$total_profit = $total_in - $total_out;
if($op&&$op == 'out'){
	$pages = $kekezu->_page_obj->getPages ( $count_out, $page_size, $page, $url );
	$website_out= db_factory::query($sql_out.$pages['where']);
}else{
	$pages = $kekezu->_page_obj->getPages ( $count_in, $page_size, $page, $url );
	$website_in = db_factory::query($sql_in.$pages['where']);
}
if (isset ( $export_in )) {
	$wh = " order_status ='ok' ";
	if($stime&&$etime){
		$filename = $stime.'-'.$etime . "内的网站收入.xls";
		$stime = strtotime($stime);
		$etime = strtotime($etime) + 24*3600;
		$wh .= " and pay_time BETWEEN {$stime} AND {$etime} ";
	}else {
		$filename = "所有网站收入.xls";
	}
	$wh .= "  order by pay_time desc ";
	$export_website_in_arr = db_factory::query(sprintf("select * from %switkey_order_charge where ".$wh,TABLEPRE));
	$contents = "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
           <caption height='25'> <b>".$filename."</b> </caption>
          <tr>
				<th width=\"60\" align=\"left\">编号</th>
				<th width=\"60\" align=\"left\">ID</th>
	            <th width=\"60\" align=\"left\">类型</th>
	            <th width=\"100\" >财务用途 </th>
				<th witdh=\"\" >充值用户</th>
				<th witdh=\"\">金额</th>
				<th witdh=\"\" >时间</th>
          </tr>
          ";
	$k = 1;
	foreach ( $export_website_in_arr as $key => $value ) {
		$contents .= "<tr>
				<td align=left>" . ($k ++) . "</td>
		    	<td align=left>" . $value[order_id] . "</td>
		    	<td align=left>" . $charge_type_arr[$value[order_type]] . "</td>
		    	<td align=left>" . $value[pay_info]. "</td>
		    	<td align=left>" . $value [username] . "</td>
		    	<td align=left>￥ " . $value [pay_money]  . " 元</td>
    			<td align=left>" . date ( "Y-m-d", $value [pay_time] )  . "</td>
    	</tr>";
	}
	$contents .= "</table>";
	header ( 'Content-type: application/vnd.ms-execl' );
	header ( 'Content-Disposition: attachment; filename=' . $filename );
	echo $contents;
	die ();
}
if (isset ( $export_out )) {
	$wh = " withdraw_status = 2 ";
	if($stime&&$etime){
		$filename = $stime.'至'.$etime . "内的网站支出.xls";
		$stime = strtotime($stime);
		$etime = strtotime($etime) + 24*3600;
		$wh .= " and process_time BETWEEN {$stime} AND {$etime} ";
	}else{
		$filename = "所有网站支出.xls";
	}
	$wh .=" order by process_time desc  ";
	$export_website_out_arr = db_factory::query(sprintf("select * from %switkey_withdraw where ".$wh,TABLEPRE));
	$bank_arr['alipayjs'] = "支付宝";
	$contents = "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
           <caption height='25'> <b>".$filename."</b> </caption>
          <tr>
				<th width=\"60\" align=\"left\">编号</th>
				<th width=\"60\" align=\"left\">ID</th>
	            <th width=\"60\" align=\"left\">提现类型</th>
	            <th width=\"100\" >金额 </th>
				<th witdh=\"\">申请提现时间</th>
				<th witdh=\"\">申请人 </th>
				<th witdh=\"\" >申请提现账号</th>
				<th witdh=\"\" >提现状态</th>
          </tr>
          ";
	$k = 1;
	foreach ( $export_website_out_arr as $key => $value ) {
		$contents .= "<tr>
				<td align=left>" . ($k ++) . "</td>
		    	<td align=left>" . $value[withdraw_id] . "</td>
		    	<td align=left>" . $bank_arr[$value[pay_type]]. "</td>
		    	<td align=left>￥ " . $value [withdraw_cash]  . "</td>
		    	<td align=left>" . date ( "Y-m-d", $value [applic_time] )  . "</td>
		    	<td align=left>" . $value [username] . "</td>
		    	<td align=left>'" . $value [pay_account]  . "</td>
    			<td align=left>提现成功</td>
    	</tr>";
	}
	$contents .= "</table>";
	header ( 'Content-type: application/vnd.ms-execl' );
	header ( 'Content-Disposition: attachment; filename=' . $filename );
	echo $contents;
	die ();
}
$order_obj = new Keke_witkey_order_charge_class();
if (isset ( $ac ) && $order_id) { //
	switch ($ac) {
		case "del" : //删除
			$order_obj->setWhere ( 'order_id=' . $order_id );
			$res = $order_obj->del_keke_witkey_order_charge ();
			kekezu::admin_system_log ( kekezu::lang(delete_financial_records) . "_$order_id" );
			$res and kekezu::admin_show_msg ( '网站收支记录删除成功', $url,3,'','success' ) or kekezu::admin_show_msg ( '网站收支记录删除失败', $url,3,'','warning' );
			break;
	}
} elseif (isset ( $ckb )) { //批量删除
	$ckb_string = implode ( ',', $ckb );
	$order_obj->setWhere ( 'order_id in (' . $ckb_string . ')' );
	switch ($sbt_action) {
		case $_lang['mulit_delete'] : //批量删除
			$res = $order_obj->del_keke_witkey_order_charge ();
			kekezu::admin_system_log ( $_lang['mulit_delete_financial_records'] . "_$ids" );
			break;
	}
	$res and kekezu::admin_show_msg ( $_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ( $_lang['mulit_operate_fail'], $url,3,'','warning' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );