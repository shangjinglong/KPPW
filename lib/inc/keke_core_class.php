<?php
(defined ( "IN_KEKE" ) || defined ( 'ADMIN_KEKE' )) or die ( "Access Denied" );
class keke_core_class extends keke_base_class {
	public static function route_output() {
		return array (
				'close',
				'sellerlist',
				'seller',
				'oauthregister',
				'case',
				'oauthlogin',
				'login',
				'ajax',
				'index',
				'register',
				'login',
				'logout',
				'help',
				'helplist',
				'helpinfo',
				'message',
				'user',
				'space',
				'task',
				'tasklist',
				'shop',
				'shoplist',
				'footer',
				'agreement',
				'report',
				'prom',
				'reset_email',
				'avatar',
				'recharge',
				'pay',
				'browser',
				'shop_release',
				'service',
				'article',
				'articlelist',
				'article',
				'activating',
				'link',
				'single',
				'callbacksina',
				'callbackqq',
				'callbackdb',
				'callbackrenren',
				'callbackten',
				'pubtask',
				'taskcomment',
				'taskhandle',
				'goodslist',
				'yepay',
				'retrieve',
				'pubgoods',
				'payitem',
				'goods',
				'mark',
				'test',
				'order',
				'suggest',
				'error',
				'gy','itest'
		);
	}
	static function admin_show_msg($title = "", $url = "", $time = 3, $content = "", $type = "info") {
		global $_K, $_lang;
		$url ? $url : $_K ['refer'];
		require keke_tpl_class::template (ADMIN_DIRECTORY.'/tpl/show_msg' );
		die ();
	}
	static function show_msg($title = "", $url = "", $time = 3, $content = "", $type = 'info') {
		global $_K, $basic_config, $username, $uid, $nav_list, $_lang, $strWebLogo, $task_open, $shop_open, $indus_arr, $arrTopIndus, $indus_goods_arr, $indus_task_arr;
		$msgtype = $type;
		if (isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest') {
			if ($msgtype == 'ok') {
				$json = array (
						'status' => 'success',
						'data' => $title,
						'url' => $url
				);
			} elseif ($msgtype == 'error') {
				$json = array (
						'status' => 'error',
						'data' => $title
				);
			} else {
				$json = array (
						'status' => 'fail',
						'data' => $title,
						'url' => $url
				);
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$json = kekezu::gbktoutf ( $json );
			}
			echo json_encode ( $json );
		} else {
			require keke_tpl_class::template ( 'error' );
		}
		unset ( $json, $_K, $basic_config, $username, $uid, $nav_list, $_lang, $strWebLogo, $task_open, $shop_open, $indus_arr, $arrTopIndus, $indus_goods_arr, $indus_task_arr );
		die ();
	}
	static function admin_check_role($roleid) {
		global $_K, $admin_info;
		$grouplist_arr = keke_admin_class::get_user_group ();
		if ($_SESSION ['auid'] != ADMIN_UID && ! in_array ( $roleid, $grouplist_arr [$admin_info ['group_id']] ['group_roles'] )) {
			echo "<script>location.href='index.php?do=main'</script>";
			die ();
		}
	}
	static function empty_cache() {
		global $kekezu;
		$file_obj = new keke_file_class ();
		TPL_CACHE and $file_obj->delete_files ( S_ROOT . "/data/tpl_c" );
		if (IS_CACHE === true) {
			$kekezu->_cache_obj->gc ();
		}
	}
	static function get_cash_consume($total) {
		global $kekezu, $user_info;
		$tmp = array ();
		$credit_allow = $kekezu->_sys_config ['credit_is_allow'];
		$ba = $user_info ['balance'];
		$cr = $user_info ['credit'];
		switch ($credit_allow) {
			case "1" : 
				if ($cr >= $total) {
					$credit = $total;
					$cash = 0;
				} else {
					$credit = $cr;
					$ba >= $total - $cr and $cash = $total - $cr or $cash = - 1;
				}
				break;
			case "2" : 
				if ($ba >= $total) {
					$cash = $total;
				} else {
					$cash = - 1;
				}
				$credit = 0;
				break;
		}
		$tmp ['cash'] = floatval ( $cash );
		$tmp ['credit'] = floatval ( $credit );
		return $tmp;
	}
	static function reset_secode_session($verify) {
		global $uid;
		if ($verify) {
			unset ( $_SESSION ['check_secode_' . $uid] );
			return TRUE;
		} else {
			if ($_SESSION ['check_secode_' . $uid]) { 
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	static function get_window_url() {
		global $_K;
		$post_url = $_SERVER ['QUERY_STRING'];
		preg_match ( '/(.*)&infloat/U', $post_url, $match );
		return $_K ['siteurl'] . '/index.php?' . $match ['1'];
	}
	static function admin_system_log($msg) {
		global $_K, $admin_info;
		$system_log_obj = new Keke_witkey_system_log_class ();
		$system_log_obj->setLog_content ( $msg );
		$system_log_obj->setLog_ip ( kekezu::get_ip () );
		$system_log_obj->setLog_time ( time () );
		$system_log_obj->setUser_type ( $admin_info ['group_id'] );
		$system_log_obj->setUid ( $admin_info ['uid'] ? $admin_info ['uid'] : $_SESSION ['uid'] );
		$system_log_obj->setUsername ( $admin_info ['username'] ? $admin_info ['username'] : $_SESSION ['username'] );
		$system_log_obj->create_keke_witkey_system_log ();
	}
	static function sort_tree($nodeid, $data_arr, $pid = "indus_pid", $id = "indus_id") {
		$res = array ();
		for($i = 0; $i < sizeof ( $data_arr ); $i ++)
			if ($data_arr [$i] ["$pid"] == $nodeid) {
				array_push ( $res, $data_arr [$i] );
				$subres = self::sort_tree ( $data_arr [$i] ["$id"], $data_arr, $pid, $id );
				for($j = 0; $j < sizeof ( $subres ); $j ++)
					array_push ( $res, $subres [$j] );
			}
		return $res;
	}
	public static function set_favor($pk, $keep_type, $model_code, $obj_uid, $obj_id, $obj_name, $origin_id, $url = '', $output = 'normal') {
		global $uid, $username;
		global $_lang;
		self::check_login ( $url, $output ); 
		self::check_if_favor ( $uid, $obj_uid, $pk, $keep_type, $model_code, $obj_id, $url, $output ); 
		$favor_type = keke_glob_class::get_favor_type ();
		$favor_obj = new Keke_witkey_favorite_class ();
		$favor_obj->_f_id = NULL;
		CHARSET == 'gbk' and $obj_name = kekezu::utftogbk ( $obj_name );
		$favor_obj->setKeep_type ( $keep_type );
		$favor_obj->setObj_type ( $model_code );
		$favor_obj->setObj_id ( $obj_id );
		$favor_obj->setObj_name ( $obj_name );
		$favor_obj->setOrigin_id ( $origin_id );
		$favor_obj->setUid ( $uid );
		$favor_obj->setUsername ( $username );
		$favor_obj->setOn_date ( time () );
		$f_id = $favor_obj->create_keke_witkey_favorite ();
		if ($f_id) {
			if (in_array ( $keep_type, array (
					'service',
					'task',
					'shop'
			) )) {
				$up_tab = TABLEPRE . "witkey_" . $keep_type;
				db_factory::execute ( sprintf ( "update %s set focus_num = focus_num+1 where %s='%d'", $up_tab, $pk, $obj_id ) );
			}
			kekezu::keke_show_msg ( $url, $favor_type [$keep_type] . $_lang ['collection_success'], "", $output );
		} else
			kekezu::keke_show_msg ( $url, $favor_type [$keep_type] . $_lang ['collection_fail'], "error", $output );
	}
	public static function check_login($url = 'index.php?do=login', $output = 'normal', $type = 'warning') {
		global $uid;
		global $_lang;
		if ($uid) {
			return TRUE;
		} else {
			header ( 'Location:' . 'index.php?do=login' );
			return false;
		}
	}
	public static function get_classify_indus($type = 'task', $mode = 'parent') {
		global $kekezu;
		$indus_arr = array ();
		if (in_array ( $type, array (
				'task',
				'shop'
		) )) {
			$indus_list = $kekezu->_indus_arr;
			$indus_c_list = $kekezu->_indus_c_arr;
			if ($type == 'task') {
				$indus_list = $kekezu->_indus_task_arr;
			} else {
				$indus_list = $kekezu->_indus_goods_arr;
			}
			$arrIndusIds = array_keys ( $indus_list );
			$indus_ids = array_unique ( array_filter ( $arrIndusIds ) );
			switch ($mode) {
				case 'parent' :
					$indus_arr = $indus_list;
					break;
				case 'total' :
					foreach ( $indus_list as $indus_id => $v ) {
						if (in_array ( $v ['indus_pid'], $indus_ids ) || in_array ( $v ['indus_id'], $indus_ids )) {
							$indus_arr [$indus_id] = $v;
						}
					}
					break;
				case 'child' :
					foreach ( $indus_c_list as $indus_id => $v ) {
						if (in_array ( $v ['indus_pid'], $indus_ids )) {
							$indus_arr [$indus_id] = $v;
						}
					}
					break;
			}
		}
		return $indus_arr;
	}
	public static function check_if_favor($uid, $obj_uid, $pk, $keep_type, $model_code, $obj_id, $url = '', $output = 'normal') {
		global $_lang;
		$favor_type = keke_glob_class::get_favor_type ();
		$favor_tab = TABLEPRE . "witkey_" . $keep_type;
		if ($obj_uid == $uid) {
			kekezu::keke_show_msg ( $url, $_lang ['you_can_not_collection_self'] . $favor_type [$keep_type] . "！", "error", $output );
		} else {
			$if_favor = db_factory::get_count ( sprintf ( " select f_id from %switkey_favorite where keep_type='%s' and obj_type='%s' and obj_id='%d' and uid='%d'", TABLEPRE, $keep_type, $model_code, $obj_id, $uid ) );
			if (! $if_favor) {
				return TRUE;
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['you_has_collection_this'] . $favor_type [$keep_type] . "," . $_lang ['no_need_continue_collection'], "error", $output );
				return false;
			}
		}
	}
	public static function get_between_where($field, $min_cash, $max_cash) {
		$where = " and $field >$min_cash and $field<$max_cash";
		return $where;
	}
	static function send_mail($address, $title, $body) {
		global $_K, $kekezu;
		$basicconfig = $kekezu->_sys_config;
		$mail = new Phpmailer_class ();
		if ($basicconfig ['mail_server_cat'] == "smtp" and function_exists ( 'fsockopen' )) {
			$mail->IsSMTP ();
			$mail->SMTPAuth = true;
			$mail->CharSet = strtolower ( $_K ['charset'] );
			$mail->Host = $basicconfig ['smtp_url'];
			$mail->Port = $basicconfig ['mail_server_port'];
			$mail->Username = $basicconfig ['post_account'];
			$mail->Password = base64_decode ( $basicconfig ['account_pwd'] );
		} else {
			$mail->IsMail ();
		}
		$mail->SetFrom ( $basicconfig ['post_account'], $basicconfig ['website_name'] );
		if ($basicconfig ['mail_replay'])
			$mail->AddReplyTo ( $basicconfig ['mail_replay'], $basicconfig ['website_name'] );
		$mail->Subject = $title;
		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		$mail->MsgHTML ( $body );
		$address_email = db_factory::get_one ( 'select username from ' . TABLEPRE . 'witkey_space where email="' . $address . '"' );
		$mail->AddAddress ( $address, $address_email ['username'] );
		return $mail->Send ();
	}
	static function get_show_day($cash = 0, $model_id = '') {
		global $_K;
		$reward_day_rule = keke_task_config::get_time_rule ( $model_id, '3600' );
		$count = count ( $reward_day_rule );
		for($i = 0; $i <= $count; $i ++) {
			if ($cash >= $reward_day_rule [$i] [rule_cash] && $cash < $reward_day_rule [$i + 1] [rule_cash]) {
				return $reward_day_rule [$i] [rule_day];
			} elseif ($cash < $reward_day_rule [0] [rule_cash]) {
				return ceil ( $reward_day_rule [0] [rule_day] / 2 );
			} elseif ($cash >= $reward_day_rule [count ( $reward_day_rule ) - 1] [rule_cash]) {
				return $reward_day_rule [count ( $reward_day_rule ) - 1] [rule_day];
			}
		}
	}
	static function get_rand_kf() {
		$kf_arr = kekezu::get_table_data ( '*', 'witkey_space', ' group_id = 7', '', '', '', '', null );
		$kf_arr_count = count ( $kf_arr );
		$randno = rand ( 0, $kf_arr_count - 1 );
		$kf_arr [$randno] [uid] and $kf_uid = $kf_arr [$randno] [uid] or $kf_uid = ADMIN_UID;
		$kf_info = kekezu::get_user_info ( $kf_uid );
		return $kf_info;
	}
	static function get_user_info($uid, $isusername = 0) {
		return keke_user_class::get_user_info ( $uid, $isusername );
	}
	static function check_user_by_name($user, $isusername = 0) {
		global $_K;
		$member_obj = new Keke_witkey_member_class ();
		if ($isusername) {
			$member_obj->setWhere ( "username='{$user}'" );
		} else {
			$member_obj->setWhere ( "uid='{$user}'" );
		}
		$user_count = $member_obj->count_keke_witkey_member ();
		return $user_count;
	}
	static function get_format_size($bytes) {
		$units = array (
				0 => 'B',
				1 => 'kB',
				2 => 'MB',
				3 => 'GB'
		);
		$log = log ( $bytes, 1024 );
		$power = ( int ) $log;
		$size = pow ( 1024, $log - $power );
		return round ( $size, 2 ) . ' ' . $units [$power];
	}
	static function pretty_format($number, $unit = '') {
		global $_lang;
		$unit == '' && $unit = $_lang ['million'];
		if ($number < 10000) {
			return $number;
		}
		return ((round ( $number / 1000 )) / 10) . $unit; 
	}
	static function save_feed($feed_arr, $uid, $username, $feedtype = "", $obj_id = 0, $obj_link = "", $icon = '') {
		$title = serialize ( $feed_arr );
		$insertsqlarr = array ();
		$insertsqlarr ['icon'] = $icon;
		$insertsqlarr ['feed_time'] = time ();
		$insertsqlarr ['feedtype'] = $feedtype;
		$insertsqlarr ['obj_link'] = $obj_link;
		$insertsqlarr ['obj_id'] = $obj_id;
		$insertsqlarr ['title'] = $title;
		$insertsqlarr ['uid'] = $uid;
		$insertsqlarr ['username'] = $username;
		return db_factory::inserttable ( TABLEPRE . 'witkey_feed', $insertsqlarr );
	}
	static function get_following_count($uid) {
		$c = db_factory::execute ( sprintf ( "select follow_id from %switkey_free_follow where uid = '%d'", TABLEPRE, $uid ) ); 
		return $c;
	}
	static function get_follower_count($uid) {
		$c = db_factory::execute ( sprintf ( "select follow_id from %switkey_free_follow where fuid = '%d'", TABLEPRE, $uid ) ); 
		return $c;
	}
	static function get_if_focus($uid, $fuid) {
		$c = db_factory::get_one ( sprintf ( "select follow_id from %switkey_free_follow where uid = '%d' and fuid = '%d'", TABLEPRE, $uid, $fuid ) );
		return $c;
	}
	static function get_feed($where_arr, $order, $limit) {
		$feed_arr = kekezu::get_table_data ( "*", "witkey_feed", $where_arr, $order, "", $limit, "feed_id" );
		$feed_new_arr = array ();
		foreach ( $feed_arr as $k => $v ) {
			$title_arr = unserialize ( $v ['title'] );
			if (is_array ( $title_arr )) {
				foreach ( $title_arr as $k1 => $v1 ) {
					$v [$k1] = $v1;
				}
			}
			$feed_new_arr [] = $v;
		}
		return $feed_new_arr;
	}
	static function feed_time($feed_time) {
		global $_lang;
		$time = time () - $feed_time;
		$time_desc = kekezu::time2Units ( $time, 'hour' );
		if ($time_desc) {
			return $_lang ['in'] . $time_desc . $_lang ['before'];
		} else {
			return $_lang ['just'];
		}
	}
	static function notify_user($title, $content, $uid, $username = "") {
		if (! $username) {
			$userinfo = kekezu::get_user_info ( $uid );
			$username = $userinfo ['username'];
		}
		if (is_array ( $content )) {
			$msg_tpl = new Keke_witkey_msg_tpl_class ();
			if (is_int ( $content ['tpl'] )) { 
				$wh = "`tpl_id` = '{$content['tpl']}' and `send_type`=1 limit 1";
			} elseif (is_string ( $content ['tpl'] )) { 
				$wh = "`tpl_code` = '{$content['tpl']}' and `send_type`=1 limit 1";
			}
			$msg_tpl->setWhere ( $wh );
			$res = $msg_tpl->query_keke_witkey_msg_tpl ();
			$content = strtr ( $res [0] ['content'], $content ['data'] );
		}
		$message_obj = new Keke_witkey_msg_class ();
		$message_obj->setTitle ( $title );
		$message_obj->setContent ( $content );
		$message_obj->setOn_time ( time () );
		$message_obj->setTo_uid ( $uid );
		$message_obj->setTo_username ( $username );
		$message_obj->create_keke_witkey_msg ();
	}
	static function get_shop_info($uid) {
		$shop_obj = new Keke_witkey_shop_class ();
		$shop_obj->setWhere ( " uid = $uid" );
		$shop_info = $shop_obj->query_keke_witkey_shop ();
		if ($shop_info) {
			return $shop_info [0];
		} else {
			return FALSE;
		}
	}
	static function del_att_file($fid = 0) {
		keke_file_class::del_att_file ( $fid );
	}
	static function check_secode($secode) {
		global $_lang;
		$img = new Secode_class ();
		$res_code = $img->check ( $secode, 1 );
		if (! $res_code) {
			return $_lang ['verification_code_input_error'];
		} else {
			return true;
		}
	}
	public static function autoload($class_name) {
		try {
			$file1 = S_ROOT . '/lib/table/' . $class_name . '.php';
			$file2 = S_ROOT . '/lib/inc/' . $class_name . '.php';
			$file3 = S_ROOT . '/lib/helper/' . $class_name . '.php';
			$file4 = S_ROOT . '/lib/sys/' . $class_name . '.php';
			if (is_file ( $file1 )) {
				self::keke_require_once ( $file1, $class_name );
				return class_exists ( $file1, false ) || interface_exists ( $file1, false );
			} elseif (is_file ( $file2 )) {
				self::keke_require_once ( $file2, $class_name );
				return class_exists ( $file2, false ) || interface_exists ( $file2, false );
			} elseif (is_file ( $file3 )) {
				self::keke_require_once ( $file3, $class_name );
				return class_exists ( $file3, false ) || interface_exists ( $file3, false );
			} elseif (is_file ( $file4 )) {
				self::keke_require_once ( $file4, $class_name );
				return class_exists ( $file4, false ) || interface_exists ( $file4, false );
			}
			self::keke_require_once ( S_ROOT . '/lib/db/db_factory.php', 'db_facotry' );
			global $i_model, $_K, $kekezu;
			if (! $i_model && isset ( $kekezu->_model_list )) {
				$model_arr = $kekezu->_model_list;
				foreach ( $model_arr as $value ) {
					$dir = $value ['model_code'];
					$type = $value ['model_type'];
					$f1 = S_ROOT . '/' . $type . '/' . $dir . '/lib/' . $class_name . '.php';
					$f2 = S_ROOT . '/' . $type . '/' . $dir . '/model/' . $class_name . '.php';
					if (file_exists ( $f1 )) {
						self::keke_require_once ( $f1, $class_name );
						return class_exists ( $f1, false ) || interface_exists ( $f1, false );
					}
					if (file_exists ( $f2 )) {
						self::keke_require_once ( $f2, $class_name );
						return class_exists ( $f2, false ) || interface_exists ( $f2, false );
					}
				}
				$auth_item = self::get_table_data ( 'auth_code,auth_dir', 'witkey_auth_item', '', 'listorder asc ', '', '', 'auth_code', null );
				foreach ( $auth_item as $v ) {
					$auth_dir = $v ['auth_dir'];
					$f3 = S_ROOT . '/auth/' . $auth_dir . '/lib/' . $class_name . '.php';
					if (file_exists ( $f3 )) {
						self::keke_require_once ( $f3, $class_name );
						return class_exists ( $f3, false ) || interface_exists ( $f3, false );
					}
				}
			}
		} catch ( Exception $e ) {
			keke_exception::handler ( $e );
		}
		return true;
	}
	public static function keke_show_msg($url, $content, $type = 'success', $output = 'normal') {
		global $_lang;
		switch ($output) {
			case "normal" :
				kekezu::show_msg ( $_lang ['operate_notice'], $url, '3', $content, $type );
				break;
			case "json" :
				$type == 'error' or $status = '1'; 
				$msg = $_lang ['operate_notice'];
				ISWAP == 1 and $msg = array (
						'r' => $content
				);
				kekezu::echojson ( $msg, intval ( $status ), $content );
				die ();
				break;
		}
	}
	public static function register_autoloader($callback = null) {
		spl_autoload_unregister ( array (
				'keke_core_class',
				'autoload'
		) );
		isset ( $callback ) and spl_autoload_register ( $callback );
		spl_autoload_register ( array (
				'keke_core_class',
				'autoload'
		) );
	}
	public static function keke_require_once($filename, $class_name = null) {
		isset ( $GLOBALS ['class'] [$filename] ) or (($GLOBALS ['class'] [$filename] = 1) and require $filename);
	}
	public static function get_config($configtype) {
		$v = "Keke_witkey_{$configtype}_config_class";
		$q = "query_keke_witkey_{$configtype}_config";
		$config_obj = new $v ();
		$config_arr = $config_obj->$q ( 1, null );
		return $config_arr [0];
	}
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		return db_factory::get_table_data ( $fileds, $table, $where, $order, $group, $limit, $pk, $cachetime );
	}
	public static function get_task_config($model_id = '') {
		global $kekezu;
		if ($model_id) {
			$where = " where model_id= '$model_id' ";
		}
		$model_config = db_factory::query ( ' select model_id,config from ' . TABLEPRE . "witkey_model $where ", true, 60 * 20 );
		if ($model_id) {
			$m_config = unserialize ( $model_config [0] ['config'] );
			if ($m_config) {
				$model_config [0] = array_merge ( $model_config [0], $m_config );
			}
			return $model_config [0];
		} else {
			$temp = array ();
			foreach ( $model_config as $mod ) {
				if (is_array ( $mod ) && is_array ( $mod ['config'] )) {
					$temp [$mod ['model_id']] = array_merge ( $mod, unserialize ( $mod ['config'] ) );
				}
			}
			return $temp;
		}
	}
	public static function get_pay_item() {
		global $kekezu;
		$pay_item = $kekezu->_cache_obj->get ( "task_pay_item" );
		if (! $pay_item) {
			$pay_item = array ();
			$item = db_factory::query ( " select a.*,b.model_id from " . TABLEPRE . "witkey_pay_item as a left join " . TABLEPRE . "witkey_model as b on a.model_code =b.model_dir" );
			foreach ( $item as $v ) {
				$pay_item [$v [model_code]] [$v [pay_item_id]] = $v;
			}
			$kekezu->_cache_obj->set ( "task_pay_item", $pay_item );
		}
		return $pay_item;
	}
	public static function get_payment_config($paymentname = "", $pay_type = 'online', $pay_status = null) {
		if ($paymentname) {
			if ($pay_type != 'offline') {
				if (! file_exists ( S_ROOT . "/include/payment/" . $paymentname . "/pay_config.php" )) {
					return FALSE;
				} else {
					require_once S_ROOT . "/include/payment/" . $paymentname . "/pay_config.php";
				}
			}
			$where = ' 1=1';
			if ($pay_type) {
				$where .= ' and type="' . $pay_type . '"';
			}
			if ($paymentname) {
				$where .= ' and payment="' . $paymentname . '"';
			}
			$list = kekezu::get_table_data ( '*', "witkey_pay_api", $where, "", '', '', '', null );
			if ($list) {
				$pay_config = $pay_basic;
				$pay_config ['payment'] = $list [0] ['payment'];
				$pay_config ['config'] = $list [0] ['config'];
				$pay_config ['type'] = $list [0] ['type'];
				$config = unserialize ( $pay_config ['config'] );
				$config and $pay_config = array_merge ( $pay_config, $config );
				$list = $pay_config;
				if (isset ( $pay_status )) {
					if ($list ['pay_status'] == intval ( $pay_status )) {
						return $list;
					}
				} else {
					return $list;
				}
			}
		} else {
			if ($pay_type == 'offline') {
				$list = kekezu::get_table_data ( 'payment', "witkey_pay_api", " type='offline'", '', '', '', '', null );
				$i = 0;
				while ( list ( $k, $v ) = each ( $list ) ) {
					$paymentlist [$v ['payment']] = self::get_payment_config ( $v ['payment'], $pay_type, $pay_status );
					$i = $i + 1;
				}
			} else {
				$filepath = S_ROOT . "/include/payment";
				$handle = opendir ( $filepath );
				$i = 0;
				while ( $file = readdir ( $handle ) ) {
					$paymentlist [$file] = self::get_payment_config ( $file, $pay_type, $pay_status );
					$i = $i + 1;
				}
				closedir ( $handle );
			}
			return array_filter ( $paymentlist );
		}
	}
	public static function get_config_rule($ruletype, $nokey = '') {
		global $kekezu;
		return kekezu::get_table_data ( "*", $ruletype, "", "", "", "", "", $nokey, null );
	}
	public static function get_industry($pid = NULL, $cache = NULL) {
		! is_null ( $pid ) and $where = " indus_pid = '" . intval ( $pid ) . "'";
		$indus_arr = self::get_table_data ( '*', "witkey_industry", $where, " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', $cache );
		return $indus_arr;
	}
	public static function get_indus_info($indus_id) {
		$indus_id and $indus_info = db_factory::get_one ( sprintf ( "select * from %switkey_industry where indus_id=%d", TABLEPRE, $indus_id ) );
		return $indus_info;
	}
	public static function get_indus_by_index($indus_type = "1", $pid = NULL) {
		global $kekezu;
		$indus_index_arr = $kekezu->_cache_obj->get ( 'indus_index_arr' . $indus_type . '_' . $pid );
		if (! $indus_index_arr) {
			$indus_arr = kekezu::get_industry ( $pid );
			$indus_index_arr = array ();
			foreach ( $indus_arr as $indus ) {
				$indus_index_arr [$indus ['indus_pid']] [$indus ['indus_id']] = $indus;
			}
			$kekezu->_cache_obj->set ( 'indus_index_arr' . $indus_type . '_' . $pid, $indus_index_arr, 3600 );
		}
		return $indus_index_arr;
	}
	public static function get_cash_cove($model_code = 'tender', $all = false) {
		$w = '';
		if ($all === false) {
			$w = " model_code ='$model_code'";
		}
		return self::get_table_data ( '*', "witkey_task_cash_cove", $w, "start_cove", '', '', 'cash_rule_id', null );
	}
	public static function get_ext_type() {
		global $kekezu;
		$basic_config = $kekezu->_sys_config;
		$flie_types = explode ( '|', $basic_config ['file_type'] );
		foreach ( $flie_types as $k => $v ) {
			$k and $ext .= ";";
			$ext .= '*.' . $v;
		}
		return $ext;
	}
	public static function get_ext_type_show() {
		global $kekezu;
		$basic_config = $kekezu->_sys_config;
		$flie_types = explode ( '|', $basic_config ['file_type'] );
		foreach ( $flie_types as $k => $v ) {
			$k and $ext .= " ";
			$ext .= '.' . $v;
		}
		return $ext;
	}
	public static function get_skill() {
		global $kekezu;
		$skill_arr = $kekezu->_cache_obj->get ( "keke_witkey_skill" );
		if (! $skill_arr) {
			$indus_arr = $kekezu->_indus_arr;
			$temparr = array ();
			foreach ( $indus_arr as $inarr ) {
				$temparr [$inarr ['indus_pid']] [] = $inarr;
			}
			$skill_arr = $temparr;
			$kekezu->_cache_obj->set ( "keke_witkey_skill", $skill_arr, 3600 );
		}
		return $skill_arr;
	}
	public static function get_tag($mode = '') {
		$tag_obj = new Keke_witkey_tag_class ();
		$taginfo = $tag_obj->query_keke_witkey_tag ( 1, null );
		$temp_arr = array ();
		if (! $mode) {
			foreach ( $taginfo as $tag ) {
				$temp_arr [$tag ['tagname']] = $tag;
			}
			$taginfo = $temp_arr;
		} else if ($mode == 1) {
			foreach ( $taginfo as $tag ) {
				$temp_arr [$tag ['tag_id']] = $tag;
			}
			$taginfo = $temp_arr;
		}
		return $taginfo;
	}
	static function get_ad($adname = null, $limit_num = null) {
		is_null ( $adname ) or $where = "and ad_name ='$adname'";
		$limit_num > 0 and $limit = $limit_num;
		return self::get_table_data ( '*', 'witkey_ad', '1=1 and is_allow=1 ' . $where, 'listorder', '', $limit, '', 3600 );
	}
	public static function check_session($type, $min, $count) {
		if ($_SESSION [$type . '_time']) { 
			if (time () - $_SESSION [$type . '_time'] < $min * 60) { 
				if ($_SESSION [$type . '_count'] >= $count) {
					return false;
				} else {
					$_SESSION [$type . '_count'] += 1;
					return true;
				}
			} else {
				$_SESSION [$type . '_time'] = time ();
				$_SESSION [$type . '_count'] = 1;
				return true;
			}
		} else {
			$_SESSION [$type . '_time'] = time ();
			$_SESSION [$type . '_count'] = 1;
			return true;
		}
	}
	static function execute_time() {
		if (function_exists ( 'xdebug_time_index' )) {
			$ex_time = xdebug_time_index ();
		} else {
			$stime = explode ( ' ', SYS_START_TIME );
			$etime = explode ( ' ', microtime () );
			$ex_time = number_format ( ($etime [1] + $etime [0] - $stime [1] - $stime [0]), 6 );
		}
		return $ex_time;
	}
	static function lang($key) {
		return keke_lang_class::lang ( $key );
	}
	static function nav_list($arr = array()) {
		global $kekezu, $_lang;
		if ($kekezu->_sys_config ['set_index'] && $kekezu->_sys_config ['set_index'] != 'index') {
			foreach ( $arr as $k => $v ) {
				if ($v ['nav_style'] == $kekezu->_sys_config ['set_index']) {
					unset ( $arr [$k] );
					array_unshift ( $arr, $v );
					return $arr;
				}
			}
		} else {
			return $arr;
		}
	}
	static function update_oltime() {
		global $_K, $kekezu;
		$res = null;
		$login_uid = $kekezu->_uid;
		$user_oltime = db_factory::get_one ( sprintf ( "select last_op_time from %switkey_member_oltime where uid = '%d'", TABLEPRE, $login_uid ) );
		if ((SYS_START_TIME - $user_oltime ['last_op_time']) > $_K ['timespan']) {
			$res = db_factory::execute ( sprintf ( "update %switkey_member_oltime set online_total_time = online_total_time+%d,last_op_time = '%d' where uid = '%d'", TABLEPRE, $_K ['timespan'], SYS_START_TIME, $login_uid ) );
		}
		return $res;
	}
	static function get_user_online($uid) {
		$user_oltime = db_factory::get_one ( sprintf ( "select last_op_time from %switkey_member_oltime where uid = '%d'", TABLEPRE, $uid ) );
		if ((SYS_START_TIME - $user_oltime ['last_op_time']) > 1200) {
			return false;
		} else {
			return true;
		}
	}
	static function error_handler($code, $error, $file = NULL, $line = NULL) {
		if (error_reporting () && $code !== 8) {
			ob_get_level () and ob_clean ();
			keke_exception::handler ( new ErrorException ( $error, $code, 0, $file, $line ) );
		}
		return TRUE;
	}
	static function shutdown_handler() {
		if (KEKE_DEBUG and $error = error_get_last () and in_array ( $error ['type'], array (
				E_PARSE,
				E_ERROR,
				E_USER_ERROR
		) )) {
			ob_get_level () and ob_clean ();
			keke_exception::handler ( new ErrorException ( $error ['message'], $error ['type'], 0, $error ['file'], $error ['line'] ) );
			exit ( 1 );
		}
	}
}
class kekezu extends keke_core_class {
	public $_inited = false;
	public $_sys_config;
	public $_basic_arr;
	public $_uid;
	public $_username;
	public $_userinfo;
	public $_template;
	public $_model_list;
	public $_task_open = 0;
	public $_shop_open = 0;
	public $_nav_list;
	public $_user_group;
	public $_tpl_obj;
	public $_cache_obj;
	public $_page_obj;
	public $_session_obj;
	public $_messagecount;
	public $_indus_p_arr;
	public $_indus_c_arr;
	public $_indus_arr;
	public $_indus_task_arr;
	public $_indus_goods_arr;
	public $_weibo_list;
	public $_api_open;
	public $_lang;
	public $_lang_list;
	public $_curr_list;
	public $_currency;
	public $_style_path;
	public $_is_allow_fxx = 1;
	public $_route;
	public static function &get_instance() {
		static $obj = null;
		if ($obj == null) {
			$obj = new kekezu ();
		}
		return $obj;
	}
	function __construct() {
		$this->init ();
		keke_lang_class::loadlang ( 'public', 'public' );
	}
	function init() {
		global $_K, $_lang;
		define ( "S_ROOT", substr ( dirname ( __FILE__ ), 0, - 7 ) );
		include (S_ROOT . '/config/config.inc.php');
		include (S_ROOT . '/config/keke_version.php');
		@include (S_ROOT . '/config/config_authorize.php');
		include (S_ROOT . '/lib/sys/keke_debug.php');
		if (! $this->_inited) {
			$this->init_session ();
			$this->_route = self::route_output ();
			$this->init_config ();
			$this->init_user ();
			$this->_cache_obj = new keke_cache_class ( CACHE_TYPE, $_K ['cache_config'] );
			$this->_tpl_obj = new keke_tpl_class ();
			$this->_page_obj = new keke_page_class ();
			$this->init_out_put ();
			$this->init_model ();
			$this->init_industry ();
			$this->init_oauth ();
			$this->init_curr ();
			if (! isset ( $_SESSION ['auid'] ) and $this->_sys_config ['is_close'] == 1 && $_GET ['do'] != 'close' && substr ( $_SERVER ['PHP_SELF'], - 16 ) != '/'.ADMIN_DIRECTORY.'/index.php') {
				header ( "Location:index.php?do=close" );
			}
		}
		$this->_inited = true;
	}
	function init_config() {
		global $i_model, $_lang, $_K;
		$this->_basic_arr = $basic_arr = db_factory::query ( 'select config_id,k,v,type,listorder from ' . TABLEPRE . 'witkey_basic_config' );
		$config_arr = array ();
		$size = sizeof ( $basic_arr );
		for($i = 0; $i < $size; $i ++) {
			$config_arr [$basic_arr [$i] ['k']] = trim($basic_arr [$i] ['v']);
			if($basic_arr [$i] ['k'] == 'ban_content' || $basic_arr [$i] ['k'] == 'ban_users'){
				$config_arr [$basic_arr [$i] ['k']] = trim(trim($basic_arr [$i] ['v']),'|');
			}
		}
		$mtime = explode ( ' ', microtime () );
		$nav_list = kekezu::get_table_data ( '*', 'witkey_nav', 'ishide!=1', 'listorder', '', '', "nav_id", null );
		$this->_nav_list = $nav_list;
		$_K ['timestamp'] = $mtime [1];
		$_K ['charset'] = CHARSET;
		$_K ['sitecss'] = $config_arr ['sitecss'];
		$_K ['theme'] = $config_arr ['theme'];
		$_K ['sitename'] = $config_arr ['website_name'];
		$_K ['siteurl'] = $config_arr ['website_url'];
		$_K ['inajax'] = 0;
		$_K ['block_search'] = array ();
		$_K ['is_rewrite'] = $config_arr ['is_rewrite'];
		$_K ['timespan'] = '600';
		$_K ['i'] = 0;
		if (isset ( $_SERVER ['HTTP_REFERER'] )) {
			$_K ['refer'] = $_SERVER ['HTTP_REFERER'];
		}
		$_K ['block_search'] = $_K ['block_replace'] = array ();
		$_lang = array ();
		@include (S_ROOT . '/config/lic.php');
		$config_arr ['seo_title'] and $_K ['html_title'] = $config_arr ['seo_title'] or $_K ['html_title'] = $config_arr ['website_name'];
		define ( 'SKIN_PATH', 'tpl/default' );
		define ( "EXP_NAME", $config_arr ['exp_rename'] ? $config_arr ['exp_rename'] : $_lang ['experience'] );
		define ( 'FORMHASH', kekezu::formhash () );
		define ( 'SITEURL', $config_arr ['website_url'] );
		define ( 'SITENAME', $config_arr ['website_name'] );
		$this->_sys_config = $config_arr;
		if (( int ) KEKE_DEBUG == 1) {
			set_error_handler ( array (
					'keke_core_class',
					'error_handler'
			) );
			set_exception_handler ( array (
					'keke_exception',
					'handler'
			) );
		}
		register_shutdown_function ( array (
				'keke_core_class',
				'shutdown_handler'
		) );
	}
	function init_user() {
		if ($_SESSION ['uid']) {
			$this->_uid = $_SESSION ['uid'];
			$this->_username = $_SESSION ['username'];
			$userinfo = keke_user_class::get_user_info ( $this->_uid );
			$sql = "select count(msg_id) from %switkey_msg where to_uid = '%d' and view_status=0 and msg_status!=1 and msg_status !=2";
			$this->_messagecount = db_factory::get_count ( sprintf ( $sql, TABLEPRE, $this->_uid ) );
			if (! $userinfo ['last_login_time']) { 
				db_factory::execute ( ' update ' . TABLEPRE . 'witkey_space set last_login_time=' . time () . ' where uid=' . $this->_uid );
				$userinfo ['last_login_time'] = time ();
			}
			$userinfo ['last_login_time'] = $_SESSION ['last_login_time'] ? $_SESSION ['last_login_time'] : time ();
			$this->_userinfo = $userinfo;
			$this->_user_group = $this->_userinfo ['group_id'];
		} elseif ($_COOKIE ['keke_auto_login']) {
			$loginInfo = unserialize ( $_COOKIE ['keke_auto_login'] );
			$pwdInfo = explode ( '|', base64_decode ( $loginInfo [2] ) );
			$uInfo = kekezu::get_table_data ( '*', 'witkey_space', " username='$pwdInfo[2]' and password = '$pwdInfo[1]'", '', '' );
			if ($uInfo [0] ['uid'] == $pwdInfo [0]) {
				$_SESSION ['uid'] = $uInfo [0] ['uid'];
				$_SESSION ['username'] = $uInfo [0] ['username'];
				$this->_uid = $_SESSION ['uid'];
				$this->_username = $uInfo [0] ['username'];
			}
		}
	}
	function init_industry() {
		$this->_indus_p_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		$tmpArrIndus= kekezu::get_table_data ( '*', 'witkey_industry', 'indus_type=1 and indus_pid >0', ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', NULL );
		if(is_array($tmpArrIndus)&&!empty($tmpArrIndus)){
			$this->_indus_c_arr = array();
			foreach ($this->_indus_p_arr  as $k1=>$v1){
				foreach ($tmpArrIndus as $k=>$v){
					if($v1['indus_id'] == $v['indus_pid']){
						$this->_indus_c_arr[$v['indus_id']] = $v;
					}
				}
			}
		}
		$this->_indus_arr = kekezu::get_table_data ( '*', 'witkey_industry', '', ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', NULL );
		$arrtotask = db_factory::query("show COLUMNS FROM ".TABLEPRE.'witkey_industry'." WHERE Field='totask' ");
		if($arrtotask[0]){
			$this->_indus_task_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 and totask=1 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		}
		$arrtogoods = db_factory::query("show COLUMNS FROM ".TABLEPRE.'witkey_industry'." WHERE Field='togoods' ");
		if($arrtogoods[0]){
			$this->_indus_goods_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 and togoods=1 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		}
	}
	function init_oauth() {
		foreach ( $this->_basic_arr as $k => $v ) {
			($v ['type'] == 'weibo' || $v ['type'] == 'interface') and $this->_weibo_list [$v ['k']] = $v ['v'];
		}
		$this->_api_open = unserialize ( $this->_sys_config ['oauth_api_open'] );
	}
	function init_lang() {
		$this->_lang_list = keke_lang_class::lang_type ();
		$this->_lang = keke_lang_class::get_lang ();
	}
	function init_curr() {
		if ($_SESSION ['currency']) {
			$this->_currency = $_SESSION ['currency'];
		} else {
			$this->_currency = $this->_sys_config ['currency'];
			$_SESSION ['currency'] = $this->_sys_config ['currency'];
		}
		$this->_curr_list = keke_lang_class::get_curr_list ();
	}
	function init_model() {
		$model_arr = db_factory::query ( 'select * from ' . TABLEPRE . 'witkey_model where 1=1 order by  model_id asc', 0, null );
		$this->_model_list = kekezu::get_arr_by_key ( $model_arr, 'model_id' );
		foreach ( $this->_model_list as $v ) {
			if ($v ['model_type'] == 'task') {
				$this->_task_open = $this->_task_open | $v ['model_status'];
			} else {
				$this->_shop_open = $this->_shop_open | $v ['model_status'];
			}
		}
		$route = $this->_route;
		foreach ( $route as $k => $v ) {
			if ($this->_task_open == 0) {
				if (strpos ( $v, 'task' ) !== FALSE || $v == 'weibo') {
					unset ( $route [$k] );
				}
			}
			if ($this->_shop_open == 0) {
				if (strpos ( $v, 'shop' ) !== FALSE || $v == 'seller_list') {
					unset ( $route [$k] );
				}
			}
			if ($this->_shop_open == 0 && $this->_task_open == 0) {
				if ($v == 'case') {
					unset ( $route [$k] );
				}
			}
		}
		$this->_route = $route;
		$this->nav_filter ();
	}
	public function nav_filter() {
		$nav_arr = $this->_nav_list;
		if (($this->_task_open && $this->_shop_open) == 0) {
			foreach ( $nav_arr as $k => $v ) {
				$url = parse_url ( $v ['nav_url'] );
				parse_str ( $url ['query'], $data );
				if ($this->_task_open == 0) {
					if (in_array ( $data ['do'], array (
							'task',
							'task_list',
							'weibo'
					) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if ($this->_shop_open == 0) {
					if (in_array ( $data ['do'], array (
							'shop',
							'shop_list',
							'seller_list'
					) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if ($this->_shop_open == 0 && $this->_task_open == 0) {
					if ($data ['do'] == 'case') {
						unset ( $nav_arr [$k] );
					}
				}
			}
		}
		$this->_nav_list = $nav_arr;
	}
	function init_session() {
		keke_session_class::get_instance ();
		isset ( $_REQUEST ['PHPSESSID'] ) && session_id ( $_REQUEST ['PHPSESSID'] );
		if (! isset ( $_SESSION )) {
			session_start ();
		}
	}
	function init_out_put() {
		($_SERVER ['REQUEST_METHOD'] == 'GET' && ! empty ( $_SERVER ['REQUEST_URI'] )) and kekezu::filter_xss ();
		ob_start ();
		header ( "Content-Type:text/html; charset=" . CHARSET );
	}
}
$ipath = dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "keke_kppw_install.lck";
file_exists ( $ipath ) == true or header ( "Location: install/index.php" );
kekezu::register_autoloader ();
$kekezu = &kekezu::get_instance ();
keke_lang_class::load_lang_class ( 'keke_core_class' );
$_cache_obj = $kekezu->_cache_obj;
$page_obj = $kekezu->_page_obj;
$template_obj = $kekezu->_tpl_obj;