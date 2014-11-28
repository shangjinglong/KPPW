<?php
class cookie {
	public static $pre = COOKIE_PRE;
	public static $expiration = COOKIE_TTL;
	public static $path = COOKIE_PATH;
	public static $domain = COOKIE_DOMAIN;
	public static $secure = FALSE;
	public static $httponly = FALSE;
	public static function get($key,$pre=NULL)
	{
		$pre===NULL&&$pre = self::$pre;
		$key	= $pre.$key;
		if ( ! isset($_COOKIE[$key])){
			return null;
		}
		return $_COOKIE[$key];
	}
	public static function set($name, $value, $expiration = NULL)
	{
		if ($expiration === NULL){
			$expiration = cookie::$expiration;
		}
		if ($expiration !== 0){
			$expiration += time();
		}
		return setcookie($name, $value, $expiration, self::$path, self::$domain, self::$secure, self::$httponly);
	}
	public static function delete($name)
	{
		unset($_COOKIE[$name]);
		return setcookie($name, NULL, -86400, self::$path, self::$domain, self::$secure, self::$httponly);
	}
}