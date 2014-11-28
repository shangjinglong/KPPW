<?php
abstract class acache_class {
	public abstract function get($id);
	public abstract function mget($ids);
	public abstract function set($id, $value, $expire = 0, $dependency = null);
	public abstract function add($id, $value, $expire = 0, $dependency = null) ;
	public abstract function del($id) ;
	public abstract function flush() ;
}
?>