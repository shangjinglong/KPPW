<?php
/**
 * 任务杂项
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$page = max ( $page, 1 );
$limit = max ( $limit, 5 );
$url = 'index.php?do=' . $do . '&model_id=' . $model_id . '&view=edit&service_id=' . $service_id . '&op=' . $op;
switch ($op) {
	case 'order': //订单
		$order_obj = keke_table_class::get_instance('witkey_order');//订单
		$goods_obj = keke_table_class::get_instance('witkey_service');//作品表
		
		//订单状态数组
		$order_status_arr = goods_shop_class::get_order_status();
		//检索条件
		//获得当前商品的所有订单号
		$order_id_arr = db_factory::query(sprintf('select `order_id` from %switkey_order_detail where `obj_id`=%d and `obj_type`="service"',TABLEPRE,$service_id));
		$order_alls = array();
		foreach ($order_id_arr as $v){
			$order_alls[] = $v['order_id'];
		}
		$order_str = implode(',', $order_alls);
		if($order_str){
			$wh = "model_id = 6 and `order_id` in ({$order_str})";
			$w['order_id'] and $wh .= " and order_id like '%$w[order_id]%' ";
			$w['order_username'] and $wh.=" and order_username like '%$w[order_username]%' ";
			$w['order_status'] and $wh.=" and order_status = '$w[order_status]' ";
			
			$ord['0']&&$ord['1'] and  $wh .=' order by '.$ord['0'].' '.$ord['1'] or $wh.=" order by order_time desc";
			
			intval ( $page ) or $page = 1;
			intval ( $w['page_size'] ) and $page_size = intval ( $w['page_size'] ) or $page_size = '10';
			
			$url_str = "index.php?do=model&model_id=6&view=order&order_id={$w['order_id']}&order_name={$w['order_name']}&page=$page&w[page_size]=$page_size&ord[0]=$ord[0]&ord[1]=$ord[1]";
			//查询
			$table_arr = $order_obj->get_grid ( $wh, $url_str, $page, $page_size, null,1,'ajax_dom');
			$order_arr = $table_arr['data'];
			$pages = $table_arr['pages'];
		}else{
			//暂无数据
			//echo '<span style="color:red">暂无订单数据!</span>';die;
		}
		
		//删除操作
		switch ($ac){
			case 'del':
				$ac_name = db_factory::get_count(sprintf("select order_name from %switkey_order where order_id='%d' ",TABLEPRE,$order_id));
				kekezu::admin_system_log($_lang['has_delete_order_name_is'].$ac_name.$_lang['of_witkey_goods_order']);
		
				$res = $order_obj->del('order_id', $order_id,$url_str);
				kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_success'],'success');
				break;
		}
		
		//批量删除操作
		if(isset ( $sbt_action )){
			$keyids = $ckb;
			if(is_array($keyids)){
				kekezu::admin_system_log($_lang['has_mulit_delete_witkey_goods']);
				$order_obj->del('order_id',$keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_delete_success']);
			}
		}
		break;
	case 'comm' : //留言
		if ($ac && $comm_id) {
			$id = intval ( $comm_id );
			switch ($ac) {
				case 'del' : //删除留言
					$sql = ' delete from %switkey_comment where comment_id=%d';
					$type == 1 and $sql .= ' or p_id=%d'; //删除顶级留言，将相应楼层也删除
					$res = db_factory::execute ( sprintf ( $sql, TABLEPRE, $id, $id ) );
					$res and kekezu::echojson ( '', 1 ) or kekezu::echojson ( '', 0 );
					die ();
					break;
				case 'load' : //加载楼层
					$list = db_factory::query ( sprintf ( ' select * from %switkey_comment where p_id=%d', TABLEPRE, $id ) );
					require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/goods_edit_ext' );
					die ();
					break;
			}
		} else {
			$o = keke_table_class::get_instance ( 'witkey_comment' );
			$tmp = $o->get_grid ( 'obj_id=' . $service_id . ' and p_id=0', $url, $page, $limit, ' order by on_time desc ', 1, 'ajax_dom' );
			$list = $tmp ['data'];
			$pages = $tmp ['pages'];
		}
		break;
	case 'mark' : //互评
		$o = keke_table_class::get_instance ( 'witkey_mark' );
		$tmp = $o->get_grid ( "origin_id=$service_id and `mark_status`!=0 and model_code='{$model_info ['model_code']}'", $url, $page, $limit, ' order by mark_time desc ', 1, 'ajax_dom' );
		$list = $tmp ['data'];
		$pages = $tmp ['pages'];
		break;
}