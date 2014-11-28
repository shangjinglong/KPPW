<?php
final class eaccelerator_cache_class extends acache_class {
	function __construct(){
		if(!function_exists('eaccelerator_get')){ 
			die("eaccelerator dosn't load ,please loaded!");
		}
	}
	public function get($id) {
		$result = eaccelerator_get ( $id );
		return $result !== NULL ? $result : false;
	}
	public function mget($ids) {
		if (empty ( $ids )) {
			return false;
		}
		foreach ( $ids as $v ) {
			$result [$v] = $this->get ( $v );
		}
		return $result !== null ? $result : false;
	}
	public function set($id, $value, $expire = 0, $dependency = null) {
		return eaccelerator_put($id,$value,$expire);
	}
	public function add($id, $value, $expire = 0, $dependency = null) {
	    return (NULL === eaccelerator_get($id)) ? $this->set($id,$value,$expire) : false;
	}
	public function del($id) {
		return eaccelerator_rm($id);
	}
	public function flush() {
		eaccelerator_gc();
		eaccelerator_clear();
		eaccelerator_removed_scripts();
	}
}
?>