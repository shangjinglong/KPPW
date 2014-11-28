<?php
keke_lang_class::load_lang_class('pay_batch_fac_class');
class pay_batch_fac_class {
	private $_pay_mode;
	private $_pay_config;
	public static function get_instance($pay_mode) {
		static $obj = null;
		if ($obj == null) {
			$obj = new pay_batch_fac_class ( $pay_mode );
		}
		return $obj;
	}
	public function __construct($pay_mode) {
		$this->_pay_mode = $pay_mode;
		$this->_pay_config = kekezu::get_payment_config ( $pay_mode );
	}
	public function format_money($fee) {
		$func_name = $this->_pay_mode . "_format_money";
		return $this->$func_name ( $fee );
	}
	public function stack_batch($detail_data) {
		$func_name = $this->_pay_mode . "_stack_batch";
		return $this->$func_name ( $detail_data );
	}
	public function success_notify($success_str, $fail_str) {
		$func_name = $this->_pay_mode . "_success_notify";
		$detail_arr = $this->unpack_detail_data ( $success_str, $fail_str );
		return $this->$func_name ( $detail_arr );
	}
	public function unpack_detail_data($success_str, $fail_str) {
		$func_name = $this->_pay_mode . "_unpack_detail";
		return $this->$func_name ( $success_str, $fail_str );
	}
 	public function alipayjs_format_money($fee) {
		return keke_finance_class::get_to_cash($fee);
	}
	public function alipayjs_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		$detail_str = $success_str . $fail_str;
		if ($detail_str) {
			$arr1 = array_filter ( explode ( "|", $detail_str ) );
			foreach ( $arr1 as $vs ) {
				$v = explode ( "^", $vs );
				if (! empty ( $v )) {
					$detail_arr [$v [0]] = array ("withdraw_id" => $v [0], "fee" => $v [3], "status" => $v [4], "desc" => $v [5], "time" => $v [7] );
				}
			}
		}
		return array_filter ( $detail_arr );
	}
	public function alipayjs_success_notify($detail_arr, $status = true) {
		global $_lang,$_K;
		$ids = implode ( ",", array_keys ( $detail_arr ) );
		$info = kekezu::get_table_data ( "withdraw_id,uid,username,withdraw_status,withdraw_cash,pay_username,pay_account", "witkey_withdraw", " withdraw_id in ($ids)", "", "", "", "withdraw_id" );
		foreach ( $detail_arr as $k => $v ) {
			if ($info [$k] ['withdraw_status'] == 1) {
				switch ($v ['status']) {
					case "S" :
						$fee = $info [$k]['withdraw_cash'] - keke_finance_class::get_to_cash($info [$k]['withdraw_cash']);
						$res = db_factory::execute ( sprintf ( " update %switkey_withdraw set withdraw_status='2',fee=%.2f where withdraw_id ='%d'", TABLEPRE,$fee, $k ) );
						$arr = array($_lang['sitename']=>$_K['sitename'],$_lang['tx_cash']=>$v ['fee']);
						keke_msg_class::notify_user($info[$k]['uid'], $info [$k]['username'], 'draw_success', $_lang['tx_success'],$arr);
						break; 
					case "F" :
						$res = db_factory::execute ( sprintf ( " update %switkey_withdraw set withdraw_status='3' where withdraw_id ='%d'", TABLEPRE, $k ) );
						$v_arr = array('网站名称'=>$_K['sitename'],'提现方式'=>$pay_way[$withdraw_info[0]['pay_type']],'帐户'=>$withdraw_info[0]['pay_account'],'提现金额'=>$v ['withdraw_cash']);
						keke_msg_class::notify_user($info[$k]['uid'], $info [$k]['username'],'withdraw_fail',$_lang['tx_fail'],$v_arr);
				 		break;
				}
			}
		}
	}
	public function alipayjs_stack_batch($detail_data) {
		$detail_arr = array ();
		$detail_str = '';
		$batch_fee = 0;
		if (is_array ( $detail_data )) {
			foreach ( $detail_data as $v ) {
				$v ['fee'] = $this->format_money ( $v ['fee'] );
				$detail_str .= "|" . implode ( "^", $v );
				$batch_fee += floatval ( $v ['fee'] );
			}
			$detail_str = substr ( $detail_str, 1 );
		}
		$detail_arr ['batch_fee'] = $batch_fee;
		$detail_arr ['detail_data'] = $detail_str;
		$detail_arr ['batch_num'] = count ( $detail_data );
		return $detail_arr;
	}
	public function chinabank_format_money($fee) {
	}
	public function chinabank_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		return $detail_arr;
	}
	public function chinabank_success_notify($detail_arr, $status = true) {
	}
	public function chinabank_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
	public function tenpay_format_money($fee) {
	}
	public function tenpay_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		return $detail_arr;
	}
	public function tenpay_success_notify($detail_arr, $status = true) {
	}
	public function tenpay_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
	public function paypal_format_money($fee) {
	}
	public function paypal_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		return $detail_arr;
	}
	public function paypal_success_notify($detail_arr, $status = true) {
	}
	public function paypal_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
}