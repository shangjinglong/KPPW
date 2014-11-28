<?php
if (! defined ( 'IN_KEKE' )) {
	exit ( 'Access Denied' );
}
class keke_input_class {
	var $use_xss_clean = FALSE;
	var $xss_hash = '';
	var $ip_address = FALSE;
	var $user_agent = FALSE;
	var $allow_get_array = FALSE;
	var $never_allowed_str = array (
			'document.cookie' => '[removed]',
			'document.write' => '[removed]',
			'.parentNode' => '[removed]',
			'.innerHTML' => '[removed]',
			'window.location' => '[removed]',
			'-moz-binding' => '[removed]',
			'<!--' => '&lt;!--',
			'-->' => '--&gt;',
			'<![CDATA[' => '&lt;![CDATA[' 
	);
	var $never_allowed_regex = array (
			"javascript\s*:" => '[removed]',
			"expression\s*(\(|&\#40;)" => '[removed]', 
			"vbscript\s*:" => '[removed]',
			"Redirect\s+302" => '[removed]' 
	);
	function __construct() {
		$this->use_xss_clean = FALSE;
		$this->allow_get_array = TRUE;
		$this->_sanitize_globals ();
	}
	function _sanitize_globals() {
		$protected = array (
				'_SERVER',
				'_GET',
				'_POST',
				'_FILES',
				'_REQUEST',
				'_SESSION',
				'_ENV',
				'GLOBALS',
				'HTTP_RAW_POST_DATA',
				'system_folder',
				'application_folder',
				'BM',
				'EXT',
				'CFG',
				'URI',
				'RTR',
				'OUT',
				'IN' 
		);
		foreach ( array (
				$_GET,
				$_POST,
				$_COOKIE,
				$_SERVER,
				$_FILES,
				$_ENV,
				(isset ( $_SESSION ) && is_array ( $_SESSION )) ? $_SESSION : array () 
		) as $global ) {
			if (! is_array ( $global )) {
				if (! in_array ( $global, $protected )) {
					unset ( $GLOBALS [$global] );
				}
			} else {
				foreach ( $global as $key => $val ) {
					if (! in_array ( $key, $protected )) {
						unset ( $GLOBALS [$key] );
					}
					if (is_array ( $val )) {
						foreach ( $val as $k => $v ) {
							if (! in_array ( $k, $protected )) {
								unset ( $GLOBALS [$k] );
							}
						}
					}
				}
			}
		}
		if ($this->allow_get_array == FALSE) {
			$_GET = array ();
		} else {
			$_GET = $this->_clean_input_data ( $_GET );
		}
		$_POST = $this->_clean_input_data ( $_POST );
		unset ( $_COOKIE ['$Version'] );
		unset ( $_COOKIE ['$Path'] );
		unset ( $_COOKIE ['$Domain'] );
		$_COOKIE = $this->_clean_input_data ( $_COOKIE );
	}
	function _clean_input_data($str = "") {
		if (is_array ( $str )) {
			$new_array = array ();
			foreach ( $str as $key => $val ) {
				$new_array [$this->_clean_input_keys ( $key )] = $this->_clean_input_data ( $val );
			}
			return $new_array;
		}
		if (get_magic_quotes_gpc ()) {
			$str = stripslashes ( $str );
		}
		if ($this->use_xss_clean === TRUE) {
			$str = $this->xss_clean ( $str );
		}
		if (strpos ( $str, "\r" ) !== FALSE) {
			$str = str_replace ( array (
					"\r\n",
					"\r" 
			), "\n", $str );
		}
		return $str;
	}
	function _clean_input_keys($str) {
		if (! preg_match ( "/^[a-z0-9:_\/-]+$/i", $str )) {
			exit ( 'Disallowed Key Characters.' );
		}
		return $str;
	}
	function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE) {
		if (! isset ( $array [$index] )) {
			return FALSE;
		}
		if ($xss_clean === TRUE) {
			return $this->xss_clean ( $array [$index] );
		}
		return $array [$index];
	}
	function get($index = '', $xss_clean = FALSE) {
		return $this->_fetch_from_array ( $_GET, $index, $xss_clean );
	}
	function post($index = '', $xss_clean = FALSE) {
		return $this->_fetch_from_array ( $_POST, $index, $xss_clean );
	}
	function get_post($index = '', $xss_clean = FALSE) {
		if (! isset ( $_POST [$index] )) {
			return $this->get ( $index, $xss_clean );
		} else {
			return $this->post ( $index, $xss_clean );
		}
	}
	function cookie($index = '', $xss_clean = FALSE) {
		return $this->_fetch_from_array ( $_COOKIE, $index, $xss_clean );
	}
	function server($index = '', $xss_clean = FALSE) {
		return $this->_fetch_from_array ( $_SERVER, $index, $xss_clean );
	}
	function ip_address() {
		if ($this->ip_address !== FALSE) {
			return $this->ip_address;
		}
		if (config_item ( 'proxy_ips' ) != '' && $this->server ( 'HTTP_X_FORWARDED_FOR' ) && $this->server ( 'REMOTE_ADDR' )) {
			$proxies = preg_split ( '/[\s,]/', config_item ( 'proxy_ips' ), - 1, PREG_SPLIT_NO_EMPTY );
			$proxies = is_array ( $proxies ) ? $proxies : array (
					$proxies 
			);
			$this->ip_address = in_array ( $_SERVER ['REMOTE_ADDR'], $proxies ) ? $_SERVER ['HTTP_X_FORWARDED_FOR'] : $_SERVER ['REMOTE_ADDR'];
		} elseif ($this->server ( 'REMOTE_ADDR' ) and $this->server ( 'HTTP_CLIENT_IP' )) {
			$this->ip_address = $_SERVER ['HTTP_CLIENT_IP'];
		} elseif ($this->server ( 'REMOTE_ADDR' )) {
			$this->ip_address = $_SERVER ['REMOTE_ADDR'];
		} elseif ($this->server ( 'HTTP_CLIENT_IP' )) {
			$this->ip_address = $_SERVER ['HTTP_CLIENT_IP'];
		} elseif ($this->server ( 'HTTP_X_FORWARDED_FOR' )) {
			$this->ip_address = $_SERVER ['HTTP_X_FORWARDED_FOR'];
		}
		if ($this->ip_address === FALSE) {
			$this->ip_address = '0.0.0.0';
			return $this->ip_address;
		}
		if (strstr ( $this->ip_address, ',' )) {
			$x = explode ( ',', $this->ip_address );
			$this->ip_address = trim ( end ( $x ) );
		}
		if (! $this->valid_ip ( $this->ip_address )) {
			$this->ip_address = '0.0.0.0';
		}
		return $this->ip_address;
	}
	function valid_ip($ip) {
		$ip_segments = explode ( '.', $ip );
		if (count ( $ip_segments ) != 4) {
			return FALSE;
		}
		if ($ip_segments [0] [0] == '0') {
			return FALSE;
		}
		foreach ( $ip_segments as $segment ) {
			if ($segment == '' or preg_match ( "/[^0-9]/", $segment ) or $segment > 255 or strlen ( $segment ) > 3) {
				return FALSE;
			}
		}
		return TRUE;
	}
	function user_agent() {
		if ($this->user_agent !== FALSE) {
			return $this->user_agent;
		}
		$this->user_agent = (! isset ( $_SERVER ['HTTP_USER_AGENT'] )) ? FALSE : $_SERVER ['HTTP_USER_AGENT'];
		return $this->user_agent;
	}
	function filename_security($str) {
		$bad = array (
				"../",
				"./",
				"<!--",
				"-->",
				"<",
				">",
				"'",
				'"',
				'&',
				'$',
				'#',
				'{',
				'}',
				'[',
				']',
				'=',
				';',
				'?',
				"%20",
				"%22",
				"%3c", // <
				"%253c",
				"%3e",
				"%0e",
				"%28",
				"%29",
				"%2528",
				"%26",
				"%24",
				"%3f",
				"%3b",
				"%3d" 
		);
		return stripslashes ( str_replace ( $bad, '', $str ) );
	}
	function xss_clean($str, $is_image = FALSE) {
		if (is_array ( $str )) {
			while ( list ( $key ) = each ( $str ) ) {
				$str [$key] = $this->xss_clean ( $str [$key] );
			}
			return $str;
		}
		$str = $this->_remove_invisible_characters ( $str );
		$str = preg_replace ( '|\&([a-z\_0-9]+)\=([a-z\_0-9]+)|i', $this->xss_hash () . "\\1=\\2", $str );
		$str = preg_replace ( '#(&\#?[0-9a-z]{2,})([\x00-\x20])*;?#i', "\\1;\\2", $str );
		$str = preg_replace ( '#(&\#x?)([0-9A-F]+);?#i', "\\1\\2;", $str );
		$str = str_replace ( $this->xss_hash (), '&', $str );
		$str = rawurldecode ( $str );
		$str = preg_replace_callback ( "/[a-z]+=([\'\"]).*?\\1/si", array (
				$this,
				'_convert_attribute' 
		), $str );
		$str = preg_replace_callback ( "/<\w+.*?(?=>|<|$)/si", array (
				$this,
				'_html_entity_decode_callback' 
		), $str );
		$str = $this->_remove_invisible_characters ( $str );
		if (strpos ( $str, "\t" ) !== FALSE) {
			$str = str_replace ( "\t", ' ', $str );
		}
		$converted_string = $str;
		foreach ( $this->never_allowed_str as $key => $val ) {
			$str = str_replace ( $key, $val, $str );
		}
		foreach ( $this->never_allowed_regex as $key => $val ) {
			$str = preg_replace ( "#" . $key . "#i", $val, $str );
		}
		if ($is_image === TRUE) {
			$str = str_replace ( array (
					'<?php',
					'<?PHP' 
			), array (
					'&lt;?php',
					'&lt;?PHP' 
			), $str );
		} else {
			$str = str_replace ( array (
					'<?php',
					'<?PHP',
					'<?',
					'?' . '>' 
			), array (
					'&lt;?php',
					'&lt;?PHP',
					'&lt;?',
					'?&gt;' 
			), $str );
		}
		$words = array (
				'javascript',
				'expression',
				'vbscript',
				'script',
				'applet',
				'alert',
				'document',
				'write',
				'cookie',
				'window' 
		);
		foreach ( $words as $word ) {
			$temp = '';
			for($i = 0, $wordlen = strlen ( $word ); $i < $wordlen; $i ++) {
				$temp .= substr ( $word, $i, 1 ) . "\s*";
			}
			$str = preg_replace_callback ( '#(' . substr ( $temp, 0, - 3 ) . ')(\W)#is', array (
					$this,
					'_compact_exploded_words' 
			), $str );
		}
		do {
			$original = $str;
			if (preg_match ( "/<a/i", $str )) {
				$str = preg_replace_callback ( "#<a\s+([^>]*?)(>|$)#si", array (
						$this,
						'_js_link_removal' 
				), $str );
			}
			if (preg_match ( "/<img/i", $str )) {
				$str = preg_replace_callback ( "#<img\s+([^>]*?)(\s?/?>|$)#si", array (
						$this,
						'_js_img_removal' 
				), $str );
			}
			if (preg_match ( "/script/i", $str ) or preg_match ( "/xss/i", $str )) {
				$str = preg_replace ( "#<(/*)(script|xss)(.*?)\>#si", '[removed]', $str );
			}
		} while ( $original != $str );
		unset ( $original );
		$event_handlers = array (
				'[^a-z_\-]on\w*',
				'xmlns' 
		);
		if ($is_image === TRUE) {
			unset ( $event_handlers [array_search ( 'xmlns', $event_handlers )] );
		}
		$str = preg_replace ( "#<([^><]+?)(" . implode ( '|', $event_handlers ) . ")(\s*=\s*[^><]*)([><]*)#i", "<\\1\\4", $str );
		$naughty = 'alert|applet|audio|basefont|base|behavior|bgsound|blink|body|embed|expression|form|frameset|frame|head|html|ilayer|iframe|input|isindex|layer|link|meta|object|plaintext|style|script|textarea|title|video|xml|xss';
		$str = preg_replace_callback ( '#<(/*\s*)(' . $naughty . ')([^><]*)([><]*)#is', array (
				$this,
				'_sanitize_naughty_html' 
		), $str );
		$str = preg_replace ( '#(alert|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)(\s*)\((.*?)\)#si', "\\1\\2&#40;\\3&#41;", $str );
		foreach ( $this->never_allowed_str as $key => $val ) {
			$str = str_replace ( $key, $val, $str );
		}
		foreach ( $this->never_allowed_regex as $key => $val ) {
			$str = preg_replace ( "#" . $key . "#i", $val, $str );
		}
		if ($is_image === TRUE) {
			if ($str == $converted_string) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		return $str;
	}
	function xss_hash() {
		if ($this->xss_hash == '') {
			if (phpversion () >= 4.2)
				mt_srand ();
			else
				mt_srand ( hexdec ( substr ( md5 ( microtime () ), - 8 ) ) & 0x7fffffff );
			$this->xss_hash = md5 ( time () + mt_rand ( 0, 1999999999 ) );
		}
		return $this->xss_hash;
	}
	function _remove_invisible_characters($str) {
		static $non_displayables;
		if (! isset ( $non_displayables )) {
			$non_displayables = array (
					'/%0[0-8bcef]/',
					'/%1[0-9a-f]/',
					'/[\x00-\x08]/',
					'/\x0b/',
					'/\x0c/',
					'/[\x0e-\x1f]/' 
			);
		}
		do {
			$cleaned = $str;
			$str = preg_replace ( $non_displayables, '', $str );
		} while ( $cleaned != $str );
		return $str;
	}
	function _compact_exploded_words($matches) {
		return preg_replace ( '/\s+/s', '', $matches [1] ) . $matches [2];
	}
	function _sanitize_naughty_html($matches) {
		$str = '&lt;' . $matches [1] . $matches [2] . $matches [3];
		$str .= str_replace ( array (
				'>',
		), array (
				'&gt;',
				'&lt;' 
		), $matches [4] );
		return $str;
	}
	function _js_link_removal($match) {
		$attributes = $this->_filter_attributes ( str_replace ( array (
				'<',
		), '', $match [1] ) );
		return str_replace ( $match [1], preg_replace ( "#href=.*?(alert\(|alert&\#40;|javascript\:|charset\=|window\.|document\.|\.cookie|<script|<xss|base64\s*,)#si", "", $attributes ), $match [0] );
	}
	function _js_img_removal($match) {
		$attributes = $this->_filter_attributes ( str_replace ( array (
				'<',
		), '', $match [1] ) );
		return str_replace ( $match [1], preg_replace ( "#src=.*?(alert\(|alert&\#40;|javascript\:|charset\=|window\.|document\.|\.cookie|<script|<xss|base64\s*,)#si", "", $attributes ), $match [0] );
	}
	function _convert_attribute($match) {
		return str_replace ( array (
				'>',
				'<',
		), array (
				'&gt;',
				'&lt;',
		), $match [0] );
	}
	function _html_entity_decode_callback($match) {
		return $this->_html_entity_decode ( $match [0], strtoupper ( "utf-8" ) );
	}
	function _html_entity_decode($str, $charset = 'UTF-8') {
		if (stristr ( $str, '&' ) === FALSE)
			return $str;
		if (function_exists ( 'html_entity_decode' ) && (strtolower ( $charset ) != 'utf-8' or version_compare ( phpversion (), '5.0.0', '>=' ))) {
			$str = html_entity_decode ( $str, ENT_COMPAT, $charset );
			$str = preg_replace ( '~&#x(0*[0-9a-f]{2,5})~ei', 'chr(hexdec("\\1"))', $str );
			return preg_replace ( '~&#([0-9]{2,4})~e', 'chr(\\1)', $str );
		}
		$str = preg_replace ( '~&#x(0*[0-9a-f]{2,5});{0,1}~ei', 'chr(hexdec("\\1"))', $str );
		$str = preg_replace ( '~&#([0-9]{2,4});{0,1}~e', 'chr(\\1)', $str );
		if (stristr ( $str, '&' ) === FALSE) {
			$str = strtr ( $str, array_flip ( get_html_translation_table ( HTML_ENTITIES ) ) );
		}
		return $str;
	}
	function _filter_attributes($str) {
		$out = '';
		if (preg_match_all ( '#\s*[a-z\-]+\s*=\s*(\042|\047)([^\\1]*?)\\1#is', $str, $matches )) {
			foreach ( $matches [0] as $match ) {
				$out .= preg_replace ( "#/\*.*?\*/#s", '', $match );
			}
		}
		return $out;
	}
}
 