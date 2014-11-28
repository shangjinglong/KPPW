<?php
keke_lang_class::load_lang_class('keke_admin_class');
class keke_admin_class {
	public $_uid;
	public function __construct() {
		$_SESSION ['uid'] and $this->_uid = $_SESSION ['uid'];
	}
	static function get_admin_menu() {
		global $kekezu,$_lang;
		$menuset_arr = $kekezu->_cache_obj->get ( 'menu_resource_cache' );
		if (! $menuset_arr) {
			$resource_obj = new Keke_witkey_resource_class ();
			$resource_obj->setWhere ( "1=1 order by listorder asc" );
			$resource_arr = $resource_obj->query_keke_witkey_resource ();
			$resource_submenu_obj = new Keke_witkey_resource_submenu_class ();
			$resource_submenu_obj->setWhere ( "1=1 and status=1 order by listorder" );
			$resource_sub_arr = $resource_submenu_obj->query_keke_witkey_resource_submenu ();
			$temp_arr = array ();
			$temp_arr2 = array ();
			$resource_set_arr = array ();
			$submenu_set_arr = array ();
			foreach ( $resource_arr as $r_tp ) {
				$resource_set_arr [$r_tp ['resource_id']] = $r_tp;
				$temp_arr [$r_tp ['submenu_id']] [] = $r_tp;
			}
			foreach ( $resource_sub_arr as $r_tp ) {
				$submenu_set_arr [$r_tp ['submenu_id']] = $r_tp;
				$temp_arr2 [$r_tp ['menu_name']] [] = array ('name' => $r_tp ['submenu_name'], 'items' => $temp_arr [$r_tp ['submenu_id']] );
			}
			$resource_arr = $temp_arr2;
			$menuset_arr = array ('navgat' => $navgation_arr, 'menu' => $resource_arr, 'submenu' => $submenu_set_arr, 'resource' => $resource_set_arr );
			$model_list = $kekezu->_model_list;
			$i = 0;
			foreach ( $model_list as $model ) {
				$init_menu = array ();
				if (! file_exists ( S_ROOT . $model ['model_type'] . '/' . $model ['model_dir'] . '/admin/init_config.php' )) {
					continue;
				}
				require S_ROOT . $model ['model_type'] . '/' . $model ['model_dir'] . '/admin/init_config.php';
				$mulist_arr = array ();
				foreach ( $init_menu as $k => $v ) {
					$mulist_arr [] = array ('resource_id' => "m{$model['model_id']}" . $i ++, 'resource_name' => $k, 'resource_url' => $v );
				}
				$menuset_arr ['menu'] [$model ['model_type']] [] = array ('name' => $model ['model_name'], 'items' => $mulist_arr );
			}
			$kekezu->_cache_obj->set ( 'menu_resource_cache', $menuset_arr, null );
		}
		return $menuset_arr;
	}
	static function get_user_group() {
		global $kekezu;
		$group_arr = $kekezu->_cache_obj->get ( "member_group_cache" );
		if (! $group_arr) {
			$membergroup_obj = new Keke_witkey_member_group_class ();
			$group_arr = $membergroup_obj->query_keke_witkey_member_group ();
			$temp_arr = array ();
			foreach ( $group_arr as $v ) {
				$temp_arr [$v ['group_id']] = $v;
				$temp_arr [$v ['group_id']] ['group_roles'] = explode ( ',', $v ['group_roles'] );
			}
			$group_arr = $temp_arr;
			$kekezu->_cache_obj->set ( 'member_group_cache', $group_arr, null );
		}
		return $group_arr;
	}
	function screen_lock() {
		$_SESSION ['lock_screen'] = 1;
	}
	function check_screen_lock() {
		$screen_lock = '0';
		isset ( $_SESSION ['lock_screen'] ) && $_SESSION ['lock_screen'] == 1 and $screen_lock = '1';
		return $screen_lock;
	}
	function screen_unlock($unlock_num, $unlock_pwd) {
		global $kekezu;
		global $_lang;
		($_SESSION ['uid'] && $_SESSION ['auid']) or $kekezu->admin_show_msg ( $_lang['you_not_login'], 'index.php' );
		if ($unlock_num > 0) { 
			$admin_pwd = db_factory::get_count ( " select password from " . TABLEPRE . "witkey_member where uid = '" . $_SESSION ['uid'] . "'" );
			$unlock_pwd = md5 ( $unlock_pwd ); 
			if ($admin_pwd == $unlock_pwd) {
				$_SESSION ['lock_screen'] = '0';
				$kekezu->echojson ( '', '2' );
				die (); 
			} else {
				if ($unlock_num > 1) {
					$_SESSION ['allow_times']=--$unlock_num;
					$kekezu->echojson ( $_lang['unlock_fail'].".", '1', $unlock_num );
					die (); 
				} else { 
					$_SESSION ['allow_times']='0';
					$_SESSION ['lock_screen'] = '0';
					$_SESSION ['uid'] = '';
					$_SESSION ['username'] = '';
					$kekezu->echojson ( $_lang['wrong_times_much_login_again'], '0' );
					die ();
				}
			}
		}
	}
	function admin_check_role($roleid) {
		global $_K, $admin_info;
		$grouplist_arr = self::get_user_group ();
		if ($_SESSION ['uid'] != ADMIN_UID && ! in_array ( $roleid, $grouplist_arr [$admin_info ['group_id']] ['group_roles'] )) {
			echo "<script>location.href='index.php?do=main'</script>";
			die ();
		}
	}
	function search_nav($ser_resource) {
		$resource_info = db_factory::query ( " select resource_name,resource_url from " . TABLEPRE . "witkey_resource where INSTR(resource_name,'$ser_resource') > 0 " );
		if ($resource_info)
			return $resource_info;
		else {
			return db_factory::query ( "select resource_name,resource_url from " . TABLEPRE . "witkey_resource a left join " . TABLEPRE . "witkey_resource_submenu b
			 on a.submenu_id = b.submenu_id where INSTR(b.submenu_name,'$ser_resource')>0" );
		}
	}
	public function get_shortcuts_list() {
		return db_factory::query ( " select b.resource_id,b.resource_name,b.resource_url from " . TABLEPRE . "witkey_shortcuts a left join " . TABLEPRE . "witkey_resource b on a.resource_id = b.resource_id where a.uid = '$this->_uid' order by a.s_id desc " );
	}
	function add_fast_menu($r_id) {
		global $_lang;
		$shortcuts_obj = new Keke_witkey_shortcuts_class ();
		$in_shortcuts_list = db_factory::execute ( " select resource_id from " . TABLEPRE . "witkey_shortcuts where resource_id = '$r_id'" );
		if (! $in_shortcuts_list) {
			$shortcuts_obj->_s_id = null;
			$shortcuts_obj->setUid ( $this->_uid );
			$shortcuts_obj->setResource_id ( $r_id );
			$success = $shortcuts_obj->create_keke_witkey_shortcuts ();
			if ($success) {
				kekezu::echojson ( $_lang['shortcuts_add_success'], '4' );
				die ();
			} else {
				kekezu::echojson ( $_lang['shortcuts_add_fail'], '1' );
				die ();
			}
		} else {
			kekezu::echojson ( $_lang['the_shortcuts_has_exist'], '0' );
			die ();
		}
	}
	function rm_fast_menu($r_id) {
		global $_lang;
		$shortcuts_obj = new Keke_witkey_shortcuts_class ();
		$shortcuts_list = db_factory::get_one ( " select uid,resource_id from " . TABLEPRE . "witkey_shortcuts where resource_id = '$r_id' and uid = '$this->_uid'" );
		if ($shortcuts_list) {
			if ($shortcuts_list ['uid'] != $this->_uid) {
				kekezu::echojson ( $_lang['not_delete_others_shortcuts'], '2' );
			} else {
				$success = db_factory::execute ( " delete from " . TABLEPRE . "witkey_shortcuts where resource_id = '$r_id' and uid = '$this->_uid'" );
				if ($success) {
					kekezu::echojson ( $_lang['shortcuts_delete_success'], '4' );
					die ();
				} else {
					kekezu::echojson ( $_lang['shortcuts_delete_fail'], '3' );
					die ();
				}
			}
		} else {
			kekezu::echojson ( $_lang['please_choose_shortcut_menu'], '0' );
			die ();
		}
	}
	static function get_article_cate() {
		return kekezu::get_table_data ( "*", "witkey_article_category", "", "listorder asc ", "", "", "art_cat_id", null );
	}
	public function admin_login($username, $password, $allow_times, $formhash='') {
		global $_lang;
		global $kekezu;
			if (!kekezu::submitcheck($formhash, true)) {
				$hash = kekezu::formhash();
				$kekezu->echojson($_lang['repeat_form_submit'], 6, array('formhash'=>$hash));
				die();
			}
			$user_info = keke_user_class::user_login ( $username, $password ); 
			$hash = kekezu::formhash();
			if ($user_info == - 1) {
				$kekezu->echojson ( $_lang['username_input_error'], "6", array('formhash'=>$hash) );
				die ();
			} else if ($user_info == - 2) {
					$kekezu->echojson ( $_lang['username_password_input_error'], "5", array('formhash'=>$hash) );
				die ();
			}
			if (! $user_info) { 
					$kekezu->echojson ( $_lang['login_fail'], "4", array('formhash'=>$hash) );
				die ();
			} else {  
				$user_info = kekezu::get_user_info ( $user_info['uid'] ); 
			}
			if (! $user_info) {
				$kekezu->echojson ( $_lang['no_rights_login_backstage'], "3", array('formhash'=>$hash) );
				die ();
			} else if (! $user_info ['group_id'] && $user_info ['uid'] != ADMIN_UID) {
					$kekezu->echojson ( $_lang['no_rights_login_backstage'], "2", array('formhash'=>$hash) );
				die ();
			} else {
				$_SESSION ['auid'] = $_SESSION ['uid'] = $user_info ['uid'];
				$_SESSION ['username'] = $user_info ['username'];
				kekezu::admin_system_log ( $user_info ['username'] . date ( 'Y-m-d H:i:s', time () ) . $_lang['login_system'] );
				$kekezu->echojson ( $_lang['login_success'], "1" );
				die ();
			}
	}
	public function set_login_limit_time($t = '') {
		$t and $_SESSION ['login_limit'] = time () + 3600 or $_SESSION ['login_limit'] = '';
	}
	public function times_limit($times = null) {
		if (isset ( $times )) {
			$allow_times = $times;
		} else { 
			$_SESSION ['allow_times'] and $allow_times = $_SESSION ['allow_times'] or $allow_times = $_SESSION ['allow_times'] = '5';
		}
		return $allow_times;
	}
	public static function get_withdraw_cash($cash){
		$fee = floatval ( $cash );
		$pay_config = kekezu::get_table_data ( "*", "witkey_pay_config", '', '', "", '', 'k' );
		$site_per_charge = $pay_config[per_charge][v];
		$site_per_low = $pay_config[per_low][v];
		$site_per_high =$pay_config[per_high][v]; 
		$alipay_per_charge = 0.5;
		$alipay_per_low = 1;
		$alipay_per_high = 25; 
		if ($fee <= $site_per_low) {
			$pay_cash = $fee;
		} elseif ($fee > $site_per_low && $fee <= 200) {
			$pay_cash = $fee + $alipay_per_low - $site_per_low;
		} elseif ($fee > 200 && $fee < 5000) {
			$pay_cash = number_format ( $fee * (100 - $site_per_charge) / (100 - $alipay_per_charge), 2, ".", "" );
		} else {
			$pay_cash = $fee + $alipay_per_high - $site_per_high;
		}
		return $pay_cash;
	}
}
?>