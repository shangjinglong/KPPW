<?php
keke_lang_class::load_lang_class ( 'keke_auth_bank_class' );
class keke_auth_bank_class extends keke_auth_base_class {
	public static function get_instance($code = 'bank') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_bank_class ( $code );
		}
		return $obj;
	}
	public function __construct($code = 'bank') {
		parent::__construct ( $code );
		$this->_primary_key = 'bank_a_id';
		$this->_tab_obj = keke_table_class::get_instance ( $this->_auth_table_name );
	}
	public static function get_auth_step($step = null, $auth_info = array()) {
		if ($step) {
			$step = $step;
		} elseif ($auth_info) {
			if ($auth_info ['auth_status']) {
				$step = "step3";
			} else {
				$auth_info [1] and $step = "step3" or $step = 'step2';
			}
		} else {
			$step = 'step1';
		}
		return $step;
	}
	public function add_auth($data, $file_name = '') {
		global $kekezu, $user_info, $_lang;
		$data = $this->format_auth_apply ( $data ); 
		$data ['pay_to_user_cash'] = '0';
		$data ['user_get_cash'] = '0';
		$data ['pay_time'] = '0';
		$success = $this->_tab_obj->save ( $data );
		if ($success) {
			$data ['start_time'] == $data ['end_time'] and $end_time = $data ['end_time'] or $end_time = 0;
			$this->add_auth_record ( $data ['uid'], $data ['username'], $this->_auth_code, $end_time, $success ); 
			return $success;
		}
		return false;
	}
	public function auth_confirm($auth_info, $user_get_cash) {
		global $user_info, $kekezu, $_lang;
		$uid = $user_info ['uid'];
		$username = $user_info ['username'];
		$intBankAid = $auth_info [$this->_primary_key];
		$pk [$this->_primary_key] = $intBankAid;
		$data ['user_get_cash'] = $user_get_cash;
		$this->_tab_obj->save ( $data, $pk ); 
		$ac_url = "index.php?do=user&view=account&op=auth&code=" . $this->_auth_code . "&intBankAid=" . $intBankAid . "#userCenter";
		if ($this->set_auth_status ( $intBankAid, '1' )) {
			$this->set_auth_record_status ( $uid, '1' ); 
			$objProm = keke_prom_class::get_instance ();
			$objProm->dispose_prom_event ( 'reg', $uid, $uid );
			$feed_arr = array (
					"feed_username" => array (
							"content" => $username,
							"url" => "index.php?do=seller&id=$uid"
					),
					"action" => array (
							"content" => $_lang ['have_passed'],
							"url" => ""
					),
					"event" => array (
							"content" => $this->auth_lang (),
							"url" => ""
					)
			);
			kekezu::save_feed ( $feed_arr, $uid, $username, $this->_auth_name );
			$v_arr = array (
					$_lang ['auth_code'] => $this->auth_lang (),
					$_lang ['auth_url'] => $ac_url
			);
			keke_msg_class::notify_user ( $uid, $username, 'auth_success', $this->auth_lang () . $_lang ['success'], $v_arr );
		}
	}
	public function authFail($auth_info, $user_get_cash) {
		global $user_info, $kekezu, $_lang;
		$uid = $user_info ['uid'];
		$username = $user_info ['username'];
		$intBankAid = $auth_info [$this->_primary_key];
		$ac_url = "index.php?do=user&view=account&op=auth&code=" . $this->_auth_code . "&intBankAid=" . $intBankAid . "#userCenter";
		$this->set_auth_status ( $intBankAid, '2' ); 
		$this->set_auth_record_status ( $uid, '2' ); 
		$v_arr = array (
				$_lang ['auth_code'] => $this->auth_lang (),
				$_lang ['auth_url'] => $ac_url
		);
		keke_msg_class::notify_user ( $uid, $username, 'auth_fail', $this->auth_lang () . $_lang ['fail'], $v_arr );
	}
}