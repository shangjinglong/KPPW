<?php
class keke_curren_class {
	const CONV_URL = 'http://www.google.com/ig/calculator?hl=en&q=1'; 
	static $_curr; 
	static $_now; 
	static $_default; 
	static $_currencies; 
	static $_symbol_right;
	public static function get_instance() {
		static $_obj = null;
		if ($_obj == null) {
			$_obj = new keke_curren_class ();
		}
		return $_obj;
	}
	public function __construct() {
		global $kekezu;
		self::$_currencies = self::get_curr_list();
		self::$_curr = strtoupper ( $kekezu->_sys_config ['currency'] ); 
		self::$_now = $kekezu->_currency;
		self::$_default = self::$_currencies [self::$_curr];
		self::$_symbol_right = self::$_currencies [self::$_curr]['symbol_right'];
	}
	public static function get_curr_list($code='*'){
		return self::$_currencies = kekezu::get_table_data ($code, 'witkey_currencies', '', '', '', '', 'code', 3600 );
	}
	public static function output($v,$dec=-1,$simple=false) {
		self::get_instance();
		$curr = self::$_now;
		$data = self::$_currencies [$curr];
		if ($curr != self::$_curr) {
			$v = self::convert ( $v,$dec );
		}
		$dec>-1 and $dec = intval($dec) or $dec = $data ['decimal_places'];
		if($simple){
			return kekezu::k_round($v,$dec);
		}else{
			return $data ['symbol_left'] . number_format ( $v, $dec, $data ['decimal_point'], $data ['thousands_point'] ) . $data ['symbol_right'];
		}
	}
	public static function convert($v,$dec=-1, $reverse = false) {
		self::get_instance();
		$curr = self::$_now; 
		$defa = self::$_default;
		$data = self::$_currencies [$curr];
		if ($v) {
			if ($curr != self::$_curr) {
				if ($reverse) {
					$rate = 1 / $data ['value'];
					$rate = kekezu::k_round ( $rate, $defa ['decimal_places'] );
				} else {
					$rate = $data ['value'];
				}
				$v = kekezu::k_round ( $v * $rate, $data ['decimal_places'] );
				if($dec==-1){
					$reverse == true and $dec = $defa ['decimal_places'] or $dec = $data ['decimal_places'];
				}else{
					$dec = intval($dec);
				}
				$v = kekezu::k_round ( $v, $dec );
			}
		}
		return $v;
	}
	static function currtags($v,$dec) {
		global $_K;
		$_K ['i'] ++;
		isset($dec) and $dec = intval($dec) or $dec = -1;
		$search = "<!--CURR_TAG_{$_K['i']}-->";
		$_K ['block_search'] [$_K ['i']] = $search;
		$_K ['block_replace'] [$_K ['i']] = "<?php  echo keke_curren_class::output(floatval({$v}),{$dec});  ?>";
		return $search;
	}
	public function update($mulit = false, $ex = '') {
		$ex = strtoupper ( $ex );
		$res = false;
		if ($mulit == true) {
			$data = self::$_currencies;
			unset ( $data [self::$_curr] );
			$s = sizeof ( $data );
			if ($s) {
				foreach ( $data as $k => $v ) {
					$res = $this->update ( false, $k );
					if ($res == false) {
						break;
					}
				}
			} else {
				$res = true;
			}
		} else {
			if ($ex) {
				if ($ex == self::$_curr) {
					$res = true;
				} else {
					$url = self::CONV_URL . self::$_curr . '=?' . $ex;
					$data = kekezu::get_remote_data ( $url );
					$data = explode ( '"', $data );
					$data = explode ( ' ', $data ['3'] );
					$rate = floatval ( $data [0] ); 
					$rate and $res = db_factory::execute ( sprintf ( " update %switkey_currencies set value='%.8f',last_updated='%s' where code='%s'", TABLEPRE, $rate, time (), $ex ) );
				}
			}
		}
		return $res;
	}
}