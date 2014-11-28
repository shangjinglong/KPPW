<?php
class keke_debug {
	public static function vars($var) {
		if (func_num_args () === 0)
			return;
		$variables = func_get_args ();
		$output = array ();
		foreach ( $variables as $k => $v ) {
			$output [] = keke_debug::_dump ( $v, 1024 );
		}
		echo $c = '<pre >' . implode ( "\n", $output ) . '</pre>';
		die ();
	}
	public static function dump($value, $length = 128) {
		return keke_debug::_dump ( $value, $length );
	}
	protected static function _dump(& $var, $length = 128, $level = 0) {
		ob_get_length () > 0 and ob_clean ();
		if ($var === NULL) {
			return '<small>NULL</small>';
		} elseif (is_bool ( $var )) {
			return '<small>bool</small> ' . ($var ? 'TRUE' : 'FALSE');
		} elseif (is_float ( $var )) {
			return '<small>float</small> ' . $var;
		} elseif (is_resource ( $var )) {
			if (($type = get_resource_type ( $var )) === 'stream' and $meta = stream_get_meta_data ( $var )) {
				$meta = stream_get_meta_data ( $var );
				if (isset ( $meta ['uri'] )) {
					$file = $meta ['uri'];
					if (function_exists ( 'stream_is_local' )) {
						if (stream_is_local ( $file )) {
							$file = keke_debug::path ( $file );
						}
					}
					return '<small>resource</small><span>(' . $type . ')</span> ' . htmlspecialchars ( $file, ENT_NOQUOTES, CHARSET );
				}
			} else {
				return '<small>resource</small><span>(' . $type . ')</span>';
			}
		} elseif (is_string ( $var )) {
			if (strlen ( $var ) > $length) {
				$str = htmlspecialchars ( substr ( $var, 0, $length ), ENT_NOQUOTES, CHARSET ) . '&nbsp;&hellip;';
			} else {
				$str = htmlspecialchars ( $var, ENT_NOQUOTES, CHARSET );
			}
			return '<small>string</small><span>(' . strlen ( $var ) . ')</span> "' . $str . '"';
		} elseif (is_array ( $var )) {
			$output = array ();
			$space = str_repeat ( $s = ' ', $level );
			static $marker;
			if ($marker === NULL) {
				$marker = uniqid ( "\x00" );
			}
			if (empty ( $var )) {
			} elseif (isset ( $var [$marker] )) {
				$output [] = "(\n$space$s*RECURSION*\n$space)";
			} elseif ($level < 5) {
				$output [] = "<span>(";
				$var [$marker] = TRUE;
				foreach ( $var as $key => & $val ) {
					if ($key === $marker)
						continue;
					if (! is_int ( $key )) {
						$key = '"' . htmlspecialchars ( $key, ENT_NOQUOTES, CHARSET ) . '"';
					}
					$output [] = "$space$s$key => " . keke_debug::_dump ( $val, $length, $level + 1 );
				}
				unset ( $var [$marker] );
				$output [] = "$space)</span>";
			} else {
				$output [] = "(\n$space$s...\n$space)";
			}
			return '<small>array</small><span>(' . count ( $var ) . ')</span> ' . implode ( "\n", $output );
		} elseif (is_object ( $var )) {
			$array = ( array ) $var;
			$output = array ();
			$space = str_repeat ( $s = ' ', $level );
			$hash = spl_object_hash ( $var );
			static $objects = array ();
			if (empty ( $var )) {
			} elseif (isset ( $objects [$hash] )) {
				$output [] = "{\n$space$s*RECURSION*\n$space}";
			} elseif ($level < 10) {
				$output [] = "<code>{";
				$objects [$hash] = TRUE;
				foreach ( $array as $key => & $val ) {
					if ($key [0] === "\x00") {
						$access = '<small>' . (($key [1] === '*') ? 'protected' : 'private') . '</small>';
						$key = substr ( $key, strrpos ( $key, "\x00" ) + 1 );
					} else {
						$access = '<small>public</small>';
					}
					$output [] = "$space$s$access $key => " . keke_debug::_dump ( $val, $length, $level + 1 );
				}
				unset ( $objects [$hash] );
				$output [] = "$space}</code>";
			} else {
				$output [] = "{\n$space$s...\n$space}";
			}
			return '<small>object</small> <span>' . get_class ( $var ) . '(' . count ( $array ) . ')</span> ' . implode ( "\n", $output );
		} else {
			return '<small>' . gettype ( $var ) . '</small> ' . htmlspecialchars ( print_r ( $var, TRUE ), ENT_NOQUOTES, CHARSET );
		}
	}
	public static function path($file) {
		return $file;
	}
	public static function source($file, $line_number, $padding = 5) {
		if (! $file or ! is_readable ( $file )) {
			return FALSE;
		}
		$file = fopen ( $file, 'r' );
		$line = 0;
		$range = array (
				'start' => $line_number - $padding,
				'end' => $line_number + $padding
		);
		$format = '% ' . strlen ( $range ['end'] ) . 'd';
		$source = '';
		while ( ($row = fgets ( $file )) !== FALSE ) {
			$row = htmlspecialchars ( print_r ( $row, TRUE ), ENT_NOQUOTES );
			if (++ $line > $range ['end'])
				break;
			if ($line >= $range ['start']) {
				$row = '<span class="number">' . sprintf ( $format, $line ) . '</span> ' . $row;
				if ($line === $line_number) {
					$row = '<span class="line highlight">' . $row . '</span>';
				} else {
					$row = '<span class="line">' . $row . '</span>';
				}
				$source .= $row;
			}
		}
		fclose ( $file );
		return '<pre class="source"><code>' . $source . '</code></pre>';
	}
	public static function trace(array $trace = NULL) {
		if ($trace === NULL) {
			$trace = debug_backtrace ();
		}
		$statements = array (
				'include',
				'include_once',
				'require',
				'require_once'
		);
		$output = array ();
		foreach ( $trace as $step ) {
			if (! isset ( $step ['function'] )) {
				continue;
			}
			if (isset ( $step ['file'] ) and isset ( $step ['line'] )) {
				$source = keke_debug::source ( $step ['file'], $step ['line'] );
			}
			if (isset ( $step ['file'] )) {
				$file = $step ['file'];
				if (isset ( $step ['line'] )) {
					$line = $step ['line'];
				}
			}
			$function = $step ['function'];
			if (in_array ( $step ['function'], $statements )) {
				if (empty ( $step ['args'] )) {
					$args = array ();
				} else {
					$args = array (
							$step ['args'] [0]
					);
				}
			} elseif (isset ( $step ['args'] )) {
				if (! function_exists ( $step ['function'] ) or strpos ( $step ['function'], '{closure}' ) !== FALSE) {
					$params = NULL;
				} else {
					if (isset ( $step ['class'] )) {
						if (method_exists ( $step ['class'], $step ['function'] )) {
							$reflection = new ReflectionMethod ( $step ['class'], $step ['function'] );
						} else {
							$reflection = new ReflectionMethod ( $step ['class'], '__call' );
						}
					} else {
						$reflection = new ReflectionFunction ( $step ['function'] );
					}
					$params = $reflection->getParameters ();
				}
				$args = array ();
				foreach ( $step ['args'] as $i => $arg ) {
					if (isset ( $params [$i] )) {
						$args [$params [$i]->name] = $arg;
					} else {
						$args [$i] = $arg;
					}
				}
			}
			if (isset ( $step ['class'] )) {
				$function = $step ['class'] . $step ['type'] . $step ['function'];
			}
			$output [] = array (
					'function' => $function,
					'args' => isset ( $args ) ? $args : NULL,
					'file' => isset ( $file ) ? $file : NULL,
					'line' => isset ( $line ) ? $line : NULL,
					'source' => isset ( $source ) ? $source : NULL
			);
			unset ( $function, $args, $file, $line, $source );
		}
		return $output;
	}
}
class keke_exception extends Exception {
	public static $php_errors = array (
			E_ERROR => 'Fatal Error',
			E_USER_ERROR => 'User Error',
			E_PARSE => 'Parse Error',
			E_WARNING => 'Warning',
			E_USER_WARNING => 'User Warning',
			E_STRICT => 'Strict',
			E_NOTICE => 'Notice',
			E_RECOVERABLE_ERROR => 'Recoverable Error'
	);
	public static $error_view = '';
	public function __construct($message, array $variables = NULL, $code = 0) {
		if (defined ( 'E_DEPRECATED' )) {
			keke_exception::$php_errors [E_DEPRECATED] = 'Deprecated';
		}
		$this->code = $code;
		$message = strtr ( $message, $variables );
		parent::__construct ( $message, ( int ) $code );
	}
	public function __toString() {
		return keke_exception::text ( $this );
	}
	public static function handler(Exception $e) {
		try {
			$type = get_class ( $e );
			$code = $e->getCode ();
			$message = $e->getMessage ();
			$file = $e->getFile ();
			$line = $e->getLine ();
			$trace = $e->getTrace ();
			if ($e instanceof ErrorException) {
				if (isset ( keke_exception::$php_errors [$code] )) {
					$code = keke_exception::$php_errors [$code];
				}
				if (version_compare ( PHP_VERSION, '5.3', '<' )) {
					for($i = count ( $trace ) - 1; $i > 0; -- $i) {
						if (isset ( $trace [$i - 1] ['args'] )) {
							$trace [$i] ['args'] = $trace [$i - 1] ['args'];
							unset ( $trace [$i - 1] ['args'] );
						}
					}
				}
			}
			$error = keke_exception::text ( $e );
			$data ['type'] = $type;
			$data ['code'] = $code;
			$data ['message'] = $message;
			$data ['file'] = $file;
			$data ['line'] = $line;
			$vars = array (
					'_SESSION',
					'_GET',
					'_POST',
					'_FILES',
					'_COOKIE',
					'_SERVER'
			);
			$data ['trace'] = array_reverse ( keke_debug::trace ( $trace ) );
			require S_ROOT . '/control/exception.php';
			die ();
		} catch ( Exception $e ) {
			ob_get_level () and ob_clean ();
			echo keke_exception::text ( $e ), "\n";
			exit ( 1 );
		}
	}
	public static function text(Exception $e) {
		return sprintf ( '%s [ %s ]: %s ~ %s [ %d ]', get_class ( $e ), $e->getCode (), strip_tags ( $e->getMessage () ), keke_debug::path ( $e->getFile () ), $e->getLine () );
	}
}
