<?php
final class apc_cache_class extends acache_class {
	function __construct() {
		if(!extension_loaded('apc')) { 
			die ( "apc_cache dosn't load ,please loaded!");
		}
	}
	public function get($id) {
		return apc_fetch($id);
	}
	public function mget($ids) {
		return apc_fetch($keys);
	}
	public function set($id, $value, $expire = 0, $dependency = null) {
		return apc_store($id,$value,$expire);
	}
	public function add($id, $value, $expire = 0, $dependency = null) {
		return apc_add($id,$value,$expire);
	}
	public function del($id) {
		return apc_delete($id);
	}
	public function flush() {
		return apc_clear_cache('user');
	}
}
?>