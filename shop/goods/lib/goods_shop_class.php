<?php
keke_lang_class::load_lang_class ( 'goods_shop_class' );
class goods_shop_class {
	public static function get_order_status() {
		global $_lang;
		return array (
				"wait" 		=> '待付款',
				"ok" 		=> '已付款',
				'confirm' 	=> '交易完成',
				"close" 	=> '交易关闭',
				"arbitral" 	=> '交易仲裁',
		);
	}
	public static function get_goods_status() {
		global $_lang;
		return array (
				"1" => $_lang ['wait_audit'],
				"2" => $_lang ['on_shelf'],
				"3" => $_lang ['down_shelf'],
				"4" => '审核失败'
		);
	}
	public static function set_service_status($service_id, $service_status) {
		self::set_on_sale_num ( $service_id, $service_status );
		$service_obj = new Keke_witkey_service_class ();
		if (is_array ( $service_id )) {
			$service_arr = implode ( ',', array_unique ( $service_id ) );
			$service_obj->setWhere ( 'service_id in(' . $service_arr . ')' );
		} else {
			$service_obj->setWhere ( 'service_id=' . $service_id );
		}
		$service_obj->setService_status ( $service_status );
		$res = $service_obj->edit_keke_witkey_service ();
		if ($res && $service_status) {
			if (is_array ( $service_id )) {
				foreach ( $service_id as $key => $val ) {
					$service_info = keke_shop_class::get_service_info ( $val );
					$feed_arr = array (
							"feed_username" => array (
									"content" => $service_info['username'],
									"url" => "index.php?do=seller&id=" .$service_info['uid']
							),
							"action" => array (
									"content" => '发布作品',
									"url" => ""
							),
							"event" => array (
									"content" => "$service_info[title]",
									"url" => "index.php?do=goods&id=$val",
									"cash" => "$service_info[price]",
									"model_id" => "$service_info[model_id]"
							)
					);
					kekezu::save_feed ( $feed_arr, $service_info['uid'], $service_info['username'], 'pub_service', $val );
					PayitemClass::updateTopitem($service_info['service_id'], 'goods');
				}
			} else {
				$service_info = keke_shop_class::get_service_info ( $service_id );
				$feed_arr = array (
						"feed_username" => array (
								"content" => "$service_info[username]",
								"url" => "index.php?do=seller&id=$service_info[uid]"
						),
						"action" => array (
								"content" => '发布作品',
								"url" => ""
						),
						"event" => array (
								"content" => "$service_info[title]",
								"url" => "index.php?do=goods&id=$service_id",
								"cash" => "$service_info[price]",
								"model_id" => "$service_info[model_id]"
						)
				);
				kekezu::save_feed ( $feed_arr, $service_info['uid'], $service_info['username'], 'pub_service', $service_id );
				PayitemClass::updateTopitem($service_id, 'goods');
			}
		}
		return $res;
	}
	public static function set_on_sale_num($service_ids, $status = 2) {
		$service_ids = ( array ) $service_ids;
		$service_ids = implode ( ',', $service_ids );
		if ($service_ids) {
			$shop_ids = db_factory::query ( ' select shop_id,service_status ss from ' . TABLEPRE . 'witkey_service where service_id in (' . $service_ids . ')' );
			if ($shop_ids) {
				foreach ( $shop_ids as $v ) {
					$ss = intval ( $v ['ss'] );
					if ($ss != $status) {
						if ($status == 3 || ($ss == 2 && $status = - 1)) {
							$plus = - 1;
						} else {
							$plus = 1;
						}
						$ids .= $v ['shop_id'] . ',';
					}
				}
				$ids = rtrim ( $ids, ',' );
				$ids and db_factory::execute ( ' update ' . TABLEPRE . 'witkey_shop set on_sale=on_sale+' . $plus . ' where shop_id in (' . $ids . ')' );
			}
		}
	}
	public function dispose_order($order_id, $action, $is_kf = null, $ht_url = null, $kefu_uid = NULL,$isApp = false) {
		global $_lang, $uid, $username, $_K, $kekezu;
	if ($is_kf&&$is_kf!='sys' && $kefu_uid) {
			$u_info = kekezu::get_user_info ( $kefu_uid );
			if ($u_info ['group_id'] == 7) {
				$kefu = TRUE;
			} else {
				$kefu = false;
			}
		} else {
			$kefu = false;
		}
		if($is_kf =='sys'){
			$kefu = TRUE;
		}
		$order_info = keke_order_class::get_order_info ( $order_id ); 
		$service_info = keke_shop_class::get_service_info ( $order_info ['obj_id'] ); 
		if ($order_info) {
			$s_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=shop_order&sid=" . $service_info ['service_id'] . "&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			$b_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=shop_order&sid=" . $service_info ['service_id'] . "&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			if ($uid == $order_info ['order_uid'] || $uid == $order_info ['seller_uid'] || $uid == ADMIN_UID || $kefu) {
				if ($service_info ['service_status'] == '2') { 
					if ($action == 'delete') { 
						$res = keke_order_class::del_order ( $order_id, '', 'json' );
						if($isApp){
							$res and app_class::response(array('ret'=>1006)) or app_class::response(array('ret'=>1007));
						}
					} else {
						switch ($action) {
							case "ok" : 
								$data = array (
										':service_id' => $service_info ['service_id'],
										':title' => $service_info ['title']
								);
								keke_finance_class::init_mem ( 'buy_service', $data );
								if($order_info ['order_amount'] > 0){
									$suc = keke_finance_class::cash_out ( $order_info ['order_uid'], $order_info ['order_amount'], 'buy_service', '', 'service', $order_info ['obj_id'] );
								}else{
									$suc = 1;
								}
								if ($suc) {
									keke_order_class::set_order_status ( $order_id, $action ); 
									$exec_time = time () + $service_info ['confirm_max'] * 24 * 3600;
									db_factory::execute ( sprintf ( " update %switkey_order set ys_end_time='%d' where order_id='%d'", TABLEPRE, $exec_time, $order_id ) ); 
									$v_arr = array (
											$_lang ['user_msg'] => $order_info ['order_username'],
											$_lang ['action'] => $_lang ['haved_confirm_pay'],
											$_lang ['order_id'] => $order_id,
											$_lang ['order_link'] => $s_order_link
									);
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_confirm_pay'], $v_arr );
									$objProm = keke_prom_class::get_instance ();
									if ($objProm->is_meet_requirement ( "service", $order_info ['obj_id'] )) {
										$objProm->create_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'], $order_info ['order_amount'] );
									}
									if($isApp){
										app_class::response(array('ret'=>1010,'orderinfo'=>$order_info)) ;
									}else{
									    return true;
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
									$v_arr = array (
											$_lang ['user_msg'] => $order_info ['order_username'],
											$_lang ['action'] => $_lang ['close_order_have'],
											$_lang ['order_id'] => $order_id,
											$_lang ['order_link'] => $s_order_link
									);
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
									if($isApp){
										app_class::response(array('ret'=>1012,'orderinfo'=>$order_info)) ;
									}else{
										kekezu::show_msg ( $_lang['system prompt'],  "index.php?do=user&view=employer&op=shop&model_id=".$service_info['model_id'], '1',$_lang ['order_deal_complete_and_close'], 'alert_right' ) ;
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1013,'orderinfo'=>$order_info)) ;
									}else{
										kekezu::show_msg ( $_lang['system prompt'],  "index.php?do=user&view=employer&op=shop&model_id=".$service_info['model_id'], '1',$_lang ['order_deal_fail_and_link_kf'], 'alert_error' ) ;
									}
								}
								break;
							case "confirm" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									$model_info = $kekezu->_model_list [$order_info ['model_id']]; 
									$profit = $service_info ['profit_rate'] * $order_info ['order_amount'] / 100; 
									$data = array (
											':service_id' => $service_info ['service_id'],
											':title' => $service_info ['title']
									);
									keke_finance_class::init_mem ( 'sale_service', $data );
									keke_finance_class::cash_in ( $order_info ['seller_uid'], $order_info ['order_amount'] - $profit, 'sale_service', '', 'service', $order_info ['obj_id'], $profit );
									keke_shop_class::plus_sale_num ( $order_info ['obj_id'], $order_info ['order_amount'] );
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 2, $order_info ['order_uid'], $order_info ['seller_uid'], $order_id, $order_info ['order_amount'] - $profit, $order_info ['obj_id'], $order_info ['order_username'], $order_info ['seller_username'] );
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 1, $order_info ['seller_uid'], $order_info ['order_uid'], $order_id, $order_info ['order_amount'], $order_info ['obj_id'], $order_info ['seller_username'], $order_info ['order_username'] );
									keke_shop_class::plus_mark_num ( $order_info ['obj_id'] );
									$objProm = keke_prom_class::get_instance ();
									if ($objProm->is_meet_requirement ( "service", $order_info [obj_id] )) {
										$objProm->create_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'], $order_info ['order_amount'] );
									}
									$objProm->dispose_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'] );
									if ($is_kf != null) {
										$v_arr = array (
												$_lang ['user_msg'] => $order_info ['seller_username'],
												$_lang ['action'] => '客服协助作品已交付完成',
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $s_order_link
										);
										keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['work_order_complete'], $v_arr );
										$v_arr1 = array (
												$_lang ['user_msg'] => $order_info ['order_username'],
												$_lang ['action'] => '客服协助作品已交付完成',
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $s_order_link
										);
										keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['work_order_complete'], $v_arr1 );
										return true;
									} else {
										$v_arr = array (
												$_lang ['user_msg'] => $order_info ['order_username'],
												$_lang ['action'] => $_lang ['buy_work_coplete'],
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $s_order_link
										);
										keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['work_order_complete'], $v_arr );
										if($isApp){
											app_class::response(array('ret'=>1022,'orderinfo'=>$order_info)) ;
										}else{
											return true;
										}
									}
								} else {
									if($isApp){
										app_class::response(array('ret'=>1023,'orderinfo'=>$order_info)) ;
									}else{
										kekezu::show_msg ( $_lang['system prompt'],   "index.php?do=shop_order&sid=$order_info[obj_id]&order_id=$order_id&steps=step3", '1', $_lang ['order_deal_fail_and_link_kf'], 'alert_error' ) ;
									}
								}
								break;
							case "arbitral" : 
								$res = keke_order_class::set_order_status ( $order_id, $action ); 
								if ($res) {
									if ($uid == $order_info ['order_uid']) {
										$v_arr = array (
												$_lang ['user'] => $order_info ['order_username'],
												$_lang ['action'] => $_lang ['buyer_start_arbitrate'],
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $s_order_link
										);
										keke_shop_class::notify_user ( $order_id ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['sevice_order_arbitrate_submit'], $v_arr );
									} else {
										$v_arr = array (
												$_lang ['user_msg'] => $order_info ['seller_username'],
												$_lang ['action'] => $_lang ['seller_start_arbitrate'],
												$_lang ['order_id'] => $order_id,
												$_lang ['order_link'] => $b_order_link
										);
										keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['work_order_submit'], $v_arr );
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
						}
					}
				} else { 
					$res = keke_order_class::set_order_status ( $order_id, 'close' ); 
					keke_order_class::order_cancel_return ( $order_id ); 
					$v_arr = array (
							$_lang ['user_msg'] => $_lang ['system'],
							$_lang ['action'] => $_lang ['stop_your_order_and_your_cash_return'],
							$_lang ['order_id'] => $order_id,
							$_lang ['order_link'] => $b_order_link
					);
					keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
					$v_arr = array (
							$_lang ['user_msg'] => $_lang ['system'],
							$_lang ['action'] => $_lang ['stop_your_order_and_your_cash_return'],
							$_lang ['order_id'] => $order_id,
							$_lang ['order_link'] => $s_order_link
					);
					keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
					if($isApp){
						$res and app_class::response(array('ret'=>1006)) or app_class::response(array('ret'=>1007));
					}else{
						$res and kekezu::keke_show_msg ( '', $_lang['order_delete_success'], "",'json') or kekezu::keke_show_msg ( '', $_lang['order_delete_fail'], "error",'json');
					}
				}
			} else {
				if($isApp){
					app_class::response(array('ret'=>1024,'orderinfo'=>$order_info)) ;
				}else{
					kekezu::keke_show_msg ( '', $_lang ['error_order_num_notice'], 'error', 'json' );
				}
			}
		} else {
			if($isApp){
				app_class::response(array('ret'=>1025,'orderinfo'=>$order_info)) ;
			}else{
				kekezu::keke_show_msg ( '', $_lang ['no_exist_goods_order'], 'error', 'json' );
			}
		}
	}
	public static function userOpService($role = 1,$orderStatus){
		$role = (int)$role;
		$arrOp = array();
		switch ($orderStatus) {
			case 'wait': 				
				if($role ===  1){
				}else{
					$arrOp[1]['op'] = 'ok';  
					$arrOp[1]['text'] = '付款';
				}
				break;
			case 'ok': 					
				if($role ===  1){
				}else{
					$arrOp[1]['op'] = 'confirm';  
					$arrOp[1]['text'] = '确认源文件';
					$arrOp[2]['op'] = 'arbitral';  
					$arrOp[2]['text'] = '申请仲裁';
				}
				break;
			case 'confirm': 				
					$arrOp[2]['op'] = 'mark';  
					$arrOp[2]['text'] = '评价';
				break;
			case 'arbitral': 						
				break;
			case 'close': 							
				break;
			default:break;
		}
		return $arrOp;
	}
}