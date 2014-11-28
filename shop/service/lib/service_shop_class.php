<?php
keke_lang_class::load_lang_class ( 'service_shop_class' );
class service_shop_class {
	function service_del($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,-1);
		return db_factory::execute ( sprintf ( "delete from %switkey_service where service_id in(%s)", TABLEPRE, $ids ) );
	}
	function service_down($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,3);
		return db_factory::execute ( sprintf ( "update %switkey_service set service_status='%d'  where service_id in(%s)", TABLEPRE, 3, $ids ) );
	}
	function service_pass($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,2);
		$res = db_factory::execute ( sprintf ( "update %switkey_service set service_status='%d'  where service_id in(%s)", TABLEPRE, 2, $ids ) );
		if($res){
			if (is_array ( $service_ids )) {
				foreach ($service_ids as $key => $val){
					$service_info = keke_shop_class::get_service_info($val);
					$feed_arr = array ("feed_username" => array ("content" => $service_info['username'], "url" => "index.php?do=seller&id=$service_info[uid]" ), "action" => array ("content" => '发布服务', "url" => "" ), "event" => array ("content" => "$service_info[title]", "url" => "index.php?do=goods&id=$val", "cash" => "$service_info[price]",
								 "model_id" => "$service_info[model_id]" ) );
					kekezu::save_feed ( $feed_arr, $service_info['uid'], $service_info['username'], 'pub_service', $service_info['service_id'] );
				}
			} else {
				$service_info = db_factory::get_one(sprintf("select * from %switkey_service where service_id=%d",TABLEPRE,$service_ids));
				$feed_arr = array ("feed_username" => array ("content" => $service_info['username'], "url" => "index.php?do=seller&id=$service_info[uid]" ), "action" => array ("content" => '发布服务', "url" => "" ), "event" => array ("content" => "$service_info[title]", "url" => "index.php?do=goods&id=$service_ids", "cash" => "$service_info[price]",
								 "model_id" => "$service_info[model_id]" ) );
				kekezu::save_feed ( $feed_arr, $service_info['uid'], $service_info['username'], 'pub_service',  $service_info['service_id'] );
			}
		}
		return $res;
	}
	public static function set_on_sale_num($service_ids, $status = 2) {
		$service_ids = ( array ) $service_ids;
		$service_ids = implode ( ',', $service_ids );
		if ($service_ids) {
			$shop_ids = db_factory::query ( ' select shop_id,service_status ss from ' . TABLEPRE . 'witkey_service where service_id in ('.$service_ids. ')' );
			if ($shop_ids) {
				foreach ( $shop_ids as $v ) {
					$ss = intval ( $v ['ss'] );
					if ($ss != $status) {
						if ($status == 3 || ($ss == 2 && $status = - 1)) {
							$plus = - 1;
						} else {
							$plus = 1;
						}
						$ids .=$v['shop_id'].',';
					}
				}
				$ids = rtrim($ids,',');
				db_factory::execute ( ' update ' . TABLEPRE . 'witkey_shop set on_sale=on_sale+' . $plus . ' where shop_id in ('.$ids. ')' );
			}
		}
	}
	function order_del($order_ids) {
		is_array ( $order_ids ) and $ids = implode ( ",", $order_ids ) or $ids = $order_ids;
		return db_factory::execute ( sprintf ( "delete from %switkey_order where order_id in(%s)", TABLEPRE, $ids ) );
	}
	public function dispose_order($order_id, $action,$isApp = FALSE) {
		global $uid, $username, $_K, $kekezu, $_lang;
		$order_info = keke_order_class::get_order_info ( $order_id ); 
		if ($order_info) {
			$s_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=user&view=transaction&op=sold&intModelId=".$order_info['model_id']."&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			$b_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=user&view=transaction&op=orders&intModelId=".$order_info['model_id']."&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			if ($uid == $order_info ['order_uid'] || $uid == $order_info ['seller_uid']) {
				$service_info = keke_shop_class::get_service_info ( $order_info ['obj_id'] ); 
						switch ($action) {
							case "wait" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToBuyer($order_info, '对方已经接受了你的雇佣要求');
									}else{
										$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['recept_your_order'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
										keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['goods_order_recept'], $v_arr );
									}
									if($isApp){
										app_class::response(array('ret'=>1008,'orderid'=>$order_id)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1009,'orderid'=>$order_id)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case "ok" : 
								if($order_info['obj_type'] == 'gy'){
									$data = array (':title' =>$order_info ['order_name']  );
								}else{
									$data = array (':service_id' => $order_info ['obj_id'], ':title' =>$order_info ['order_name']  );
								}
								keke_finance_class::init_mem ( 'buy_'.$order_info['obj_type'], $data );
								if($order_info ['order_amount']>0){
									$suc = keke_finance_class::cash_out ( $order_info ['order_uid'], $order_info ['order_amount'], 'buy_'.$order_info['obj_type'], '', 'service', $order_info ['obj_id'] );
								}else{
									$suc = 1;
								}
								if ($suc) {
									db_factory::execute("update ".TABLEPRE."witkey_finance set order_id=$order_id where fina_id=$suc");
									keke_order_class::set_order_status ( $order_id, $action ); 
									if($order_info['obj_type'] == 'gy'){
										$complete_time = time()+3600*24*7;
									}else{
										if($service_info['unit_time']){
											$unit_time = $service_info['unit_time'];
											switch($unit_time){
												case '小时':
													$complete_time = time()+intval($service_info['service_time'])*3600;
													break;
												case '天':
													$complete_time = time()+intval($service_info['service_time'])*3600*24;
													break;
												case '周':
													$complete_time = time()+intval($service_info['service_time'])*3600*24*7;
													break;
												case '月':
													$complete_time = time()+intval($service_info['service_time'])*3600*24*30;
													break;
											}
										}
									}
									db_factory::execute("update ".TABLEPRE."witkey_order set service_end_time = $complete_time where order_id=$order_info[order_id]");
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToSeller($order_info, '对方已付款');
									}else{
										$v_arr = array (
												$_lang ['user_msg'] => $order_info ['order_username'],
												$_lang ['action'] => $_lang ['haved_confim_pay'],
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $s_order_link
										);
										keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_confirm_pay'], $v_arr );
									}
								if($isApp){
										app_class::response(array('ret'=>1010,'orderinfo'=>$order_info)) ;
									}else{
										return  true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1011,'orderinfo'=>$order_info)) ;
									}else{
										return '订单付款失败,您的账户余额不足以支付该订单<br />点击这里<a href="index.php?do=pay&id='.$order_info['order_id'].'&type=order">去充值</a>';
									}
								}
								break;
							case "close" : 
								$res = keke_order_class::order_cancel_return ( $order_id ); 
								if ($res) {
									keke_order_class::set_order_status ( $order_id, $action ); 
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToSeller($order_info, '对方关闭订单');
									}else{
									$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['close_order_have'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
									}
									if($isApp){
										app_class::response(array('ret'=>1012,'orderinfo'=>$order_info)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1013,'orderinfo'=>$order_info)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case 'over_time_close':
								$res = keke_order_class::order_cancel_return ( $order_id ); 
								if ($res) {
									keke_order_class::set_order_status ( $order_id, 'close' ); 
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToSeller($order_info, '对方超时未完成服务');
									}else{
									$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['close_order_have'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", '超时未完成服务', $v_arr );
									}
								}
								break;
							case "confirm_complete": 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									$objProm = keke_prom_class::get_instance ();
									if ($objProm->is_meet_requirement ( "service", $order_info [obj_id] )) {
										$objProm->create_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'], $order_info ['order_amount'] );
									}
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToBuyer($order_info, '对方确认服务工作完成');
									}else{
									$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => '服务完成', $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
									keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", '服务完成', $v_arr );
									}
									if($order_info['obj_type'] == 'gy'){
										$arrServiceConfig = unserialize($kekezu->_model_list[7]['config']);
										$cut_time = time()+intval($arrServiceConfig['confirm_max_day'])*24*3600;
									}else{
										$cut_time = time()+$service_info['confirm_max']*24*3600;
									}
									db_factory::execute(sprintf("update %switkey_order set ys_end_time = %d where order_id=%d",TABLEPRE,$cut_time,$order_id));
									if($isApp){
										app_class::response(array('ret'=>1014,'orderinfo'=>$order_info)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1015,'orderinfo'=>$order_info)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case "accept" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									$objProm = keke_prom_class::get_instance ();
									if ($objProm->is_meet_requirement ( "service", $order_info [obj_id] )) {
										$objProm->create_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'], $order_info ['order_amount'] );
									}
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToBuyer($order_info, '对方确认接收订单');
									}else{
									$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['recept_your_order'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
									keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['goods_order_recept'], $v_arr );
									}
									if($isApp){
										app_class::response(array('ret'=>1016,'orderinfo'=>$order_info)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1017,'orderinfo'=>$order_info)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case "working" : 
								$intRes  = keke_order_class::set_order_status ( $order_id, $action ); 
								if($order_info['obj_type'] == 'gy'){
									self::sendNoticeToBuyer($order_info, '对方已经开始工作');
								}
								if($intRes){
									return true;
								}else{
									return '操作失败';
								}
								break;
							case "send" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToBuyer($order_info, '对方确认服务完成');
									}else{
										$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['confirm_service_complete'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
										keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['service_order_confirm_complete'], $v_arr );
									}
									if($isApp){
										app_class::response(array('ret'=>1018,'orderinfo'=>$order_info)) ;
									}else{
										kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_and_order_comfirm'], '', 'json' );
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1019,'orderinfo'=>$order_info)) ;
									}else{
										kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
									}
								}
								break;
							case "complete" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									$model_info = $kekezu->_model_list [$order_info ['model_id']]; 
									if($order_info['obj_type'] == 'gy'){
										$arrServiceConfig = unserialize($kekezu->_model_list[7]['config']);
										$profit = floatval($arrServiceConfig['service_profit']) * $order_info ['order_amount'] / 100; 
									}else{
										$profit = $service_info ['profit_rate'] * $order_info ['order_amount'] / 100; 
									}
									if($order_info['obj_type'] == 'gy'){
										$data = array (':title' =>$order_info ['order_name']  );
									}else{
										$data = array (':service_id' => $order_info ['obj_id'], ':title' => $order_info ['order_name'] );
									}
									keke_finance_class::init_mem ( 'sale_'.$order_info['obj_type'], $data );
									keke_finance_class::cash_in ( $order_info ['seller_uid'], $order_info ['order_amount'] - $profit, 'sale_'.$order_info['obj_type'], '', 'service', $order_info ['obj_id'], $profit );
									keke_shop_class::plus_sale_num ( $order_info ['obj_id'], $order_info ['order_amount'] );
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 2, $order_info ['order_uid'], $order_info ['seller_uid'], $order_id, $order_info ['order_amount'] - $profit, $order_info ['obj_id'], $order_info ['order_username'], $order_info ['seller_username'] );
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 1, $order_info ['seller_uid'], $order_info ['order_uid'], $order_id, $order_info ['order_amount'], $order_info ['obj_id'], $order_info ['seller_username'], $order_info ['order_username'] );
									keke_shop_class::plus_mark_num ( $order_info ['obj_id'] );
									$objProm = keke_prom_class::get_instance ();
									$objProm->dispose_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'] );
									if($order_info['obj_type'] == 'gy'){
										self::sendNoticeToSeller($order_info, '对方工作验收完成');
									}else{
										$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['confirm_service_complete'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
										keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['service_order_confirm_complete'], $v_arr );
									}
									if($isApp){
										app_class::response(array('ret'=>1020,'orderinfo'=>$order_info)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1021,'orderinfo'=>$order_info)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case "arbitral" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									if($order_info['obj_type'] == 'gy'){
										if ($uid == $order_info ['order_uid']) {
												self::sendNoticeToSeller($order_info, $_lang ['sevice_order_arbitrate_submit']);
										} else {
											self::sendNoticeToBuyer($order_info, $_lang ['sevice_order_arbitrate_submit']);
										}
									}else{
										if ($uid == $order_info ['order_uid']) {
											$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['buyer_start_arbitrate'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
											keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['sevice_order_arbitrate_submit'], $v_arr );
										} else {
											$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['seller_start_arbitrate'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
											keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['sevice_order_arbitrate_submit'], $v_arr );
										}
									}
									if($isApp){
										app_class::response(array('ret'=>1022,'orderinfo'=>$order_info)) ;
									}else{
										return true;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1023,'orderinfo'=>$order_info)) ;
									}else{
										return $_lang ['order_deal_fail_and_link_kf'];
									}
								}
								break;
							case "delete" : 
									$res = keke_order_class::del_order ( $order_id);
									if($isApp){
										$res and app_class::response(array('ret'=>1006)) or app_class::response(array('ret'=>1007));
									}else{
										$res and kekezu::keke_show_msg ( '', $_lang['order_delete_success'], "",'json') or kekezu::keke_show_msg ( '', $_lang['order_delete_fail'], "error",'json');
									}
								break;
						}
			} else {
				if($isApp){
					app_class::response(array('ret'=>1024,'orderinfo'=>$order_info)) ;
				}else{
					return $_lang ['error_order_num_notice'];
				}
			}
		} else {
			if($isApp){
				app_class::response(array('ret'=>1025,'orderinfo'=>$order_info)) ;
			}else{
				return $_lang ['no_exist_goods_order'];
			}
		}
	}
	public static function userOpService($role = 1,$orderStatus){
		$role = (int)$role;
		$arrOp = array();
		switch ($orderStatus) {
			case 'seller_confirm':
				if($role ===  1){
					$arrOp[1]['op'] = 'wait';  
					$arrOp[1]['text'] = '接受订单';
					$arrOp[2]['op'] = 'close'; 
					$arrOp[2]['text'] = '取消订单';
				}else{
				}
				break;
			case 'wait': 				
				if($role ===  1){
				}else{
					$arrOp[1]['op'] = 'ok';  
					$arrOp[1]['text'] = '付款';
				}
				break;
			case 'ok': 					
				if($role ===  1){
					$arrOp[1]['op'] = 'working';  
					$arrOp[1]['text'] = '开始工作';
				}else{
					$arrOp[1]['op'] = 'arbitral';  
					$arrOp[1]['text'] = '申请仲裁';
				}
				break;
			case 'working': 			
				if($role ===  1){
					$arrOp[1]['op'] = 'confirm_complete';  
					$arrOp[1]['text'] = '完成工作';
				}else{
					$arrOp[1]['text'] = '对方正在工作';
				}
					$arrOp[2]['op'] = 'arbitral';  
					$arrOp[2]['text'] = '申请仲裁';
				break;
			case 'confirm_complete': 				
				if($role ===  1){
					$arrOp[1]['text'] = '等待验收工作';
				}else{
					$arrOp[1]['op'] = 'complete';  
					$arrOp[1]['text'] = '验收工作';
					$arrOp[2]['op'] = 'arbitral';  
					$arrOp[2]['text'] = '申请仲裁';
				}
				break;
			case 'complete': 						
				$arrOp[1]['op'] = 'mark';
				$arrOp[1]['text'] = '评价';
				break;
			case 'arbitral': 						
				break;
			case 'close': 							
				break;
			default:break;
		}
		return $arrOp;
	}
	public static function get_service_status() {
		global $_lang;
		return array ("1" => $_lang ['wait_audit'], "2" => $_lang ['on_shelf'], "3" => $_lang ['down_shelf'],"4"=>'审核失败' );
	}
	public static function get_order_status() {
		global $_lang;
		return array (
				"seller_confirm"=> '待接受',
				"wait" 			=> '待付款',
				"ok" 			=> '已付款',
				"working" 		=> '工作中',
				"confirm_complete"=>"完成工作",
				"complete" 		=> '交易完成',
				"close" 		=> '交易关闭',
				"arbitral" 		=> '交易仲裁'
		);
	}
	public static function sendNoticeToBuyer($order_info,$statusText) {
		global $uid, $username, $_K, $kekezu, $_lang;
		$order_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=gy&id=".$order_info ['seller_uid']."&orderId=" . $order_info['order_id'] . "\">" . $order_info['order_name'] . "</a>";
		$v_arr = array(
				'用户名' => $order_info['order_username'],
				'用户' => $order_info['seller_username'],
				'状态变更' => $statusText,
				'订单编号' => $order_url,
				'网站名称' => $kekezu->_sys_config['website_name']
		);
		$msg_obj = new keke_msg_class (); 
		$msg_obj->send_message($order_info['order_uid'], $order_info['order_username'], 'gy_notice_to_buyer', '雇佣状态消息',$v_arr);
	}
	public static function sendNoticeToSeller($order_info,$statusText) {
		global $uid, $username, $_K, $kekezu, $_lang;
		$order_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=gy&id=".$order_info ['seller_uid']."&orderId=" . $order_info['order_id'] . "\">" . $order_info['order_name'] . "</a>";
		$v_arr = array(
				'用户名' => $order_info['seller_username'],
				'用户' => $order_info['order_username'],
				'状态变更' => $statusText,
				'订单编号' => $order_url,
				'网站名称' => $kekezu->_sys_config['website_name']
		);
		$msg_obj = new keke_msg_class (); 
		$msg_obj->send_message($order_info['seller_uid'], $order_info['seller_username'], 'gy_notice_to_seller', '雇佣状态消息',$v_arr);
	}
}
?>