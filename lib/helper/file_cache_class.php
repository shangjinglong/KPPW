<?php
class file_cache_class extends acache_class {
	var $ci;
	var $path;
	var $contents;
	var $filename;
	var $expires=60;
	var $created;
	var $dependencies;
	var $mp_cache_dir = "data/data_cache/";
	var $cache_expiration = 0;
	function __construct() {
		$this->reset ();
		$this->path = S_ROOT . './' . $this->mp_cache_dir;
		$default_expires = $this->cache_expiration;
		if ($default_expires !== FALSE && $default_expires > 0)
			$this->default_expires = time () + $default_expires;
		else
			$this->default_expires = NULL;
		if ($this->path == '')
			return FALSE;
	}
	function reset() {
		$this->contents = NULL;
		$this->name = NULL;
		$this->expires = NULL;
		$this->created = NULL;
		$this->dependencies = array ();
	}
	function set_name($name) {
		$this->reset ();
		$this->filename = $name;
		return $this;
	}
	function get_name() {
		return $this->filename;
	}
	function set_contents($contents) {
		$this->contents = $contents;
		return $this;
	}
	function get_contents() {
		return $this->contents;
	}
	function set_dependencies($dependencies) {
		if (is_array ( $dependencies )) {
			$this->dependencies = $dependencies;
		} else {
			$this->dependencies = array ($dependencies);
		}
		return $this;
	}
	function add_dependencies($dependencies) {
		if (is_array ( $dependencies ))
			$this->dependencies = array_merge ( $this->dependencies, $dependencies );
		else
			$this->dependencies [] = $dependencies;
		return $this;
	}
	function get_dependencies() {
		return $this->dependencies;
	}
	function set_expires($expires) {
		$this->expires = time () + $expires;
		return $this;
	}
	function get_expires() {
		return $this->expires;
	}
	function get_created($created) {
		return $this->created;
	}
	function mget($ids) {
	}
	function add($id, $value, $expire = 0, $dependency = null) {
	}
	function get($filename, $use_expires = TRUE) {
		if ($filename !== NULL) {
			$this->reset ();
			$this->filename = $filename;
		}
		if (! is_dir ( $this->path ) or ! is_writable ( $this->path )) {
			return FALSE;
		}
		$filepath = $this->path . $this->filename . '.cache.php';
		if (! @file_exists ( $filepath )) {
			return FALSE;
		}
		$content = file_get_contents ( $filepath );
		if (! $content) {
			return false;
		}
		$content = ltrim ( $content, '<?php \'' );
		$content = rtrim ( $content, '\';' );
		$this->contents = unserialize ( stripslashes ( $content ) );
		if ($use_expires && ! empty ( $this->contents ['__mp_cache_expires'] ) && $this->contents ['__mp_cache_expires'] < time ()) {
			$this->del ( $filename );
			return FALSE;
		}
		if ($this->contents ['__mp_cache_dependencies']) {
			foreach ( $this->contents ['__mp_cache_dependencies'] as $dep ) {
				$cache_created = filemtime ( $this->path . $this->filename . '.cache.php' );
				if (! file_exists ( $this->path . $dep . '.cache.php' ) or filemtime ( $this->path . $dep . '.cache.php' ) > $cache_created) {
					$this->delete ( $filename );
					return FALSE;
				}
			}
		}
		$this->expires = (isset ( $this->contents ['__mp_cache_expires'] ) ? $this->contents ['__mp_cache_expires'] : NULL);
		$this->dependencies = (isset ( $this->contents ['__mp_cache_dependencies'] ) ? $this->contents ['__mp_cache_dependencies'] : NULL);
		$this->created = (isset ( $this->contents ['__mp_cache_created'] ) ? $this->contents ['__mp_cache_created'] : NULL);
		$this->contents = $this->contents ['__mp_cache_contents'];
		return $this->contents;
	}
	function set($filename, $contents, $expires = NULL, $dependencies = array()) {
		global $_lang;
		if(mt_rand(0,1000000)<100){
			$this->flush();
		}
		if ($contents !== NULL) {
			$this->reset ();
			$this->contents = $contents;
			$this->filename = $filename;
			if ($expires !== NULL)
				$this->expires = time () + $expires;
			$this->dependencies = $dependencies;
		}
		$this->contents = array (
				'__mp_cache_contents' => $this->contents 
		);
		if (! is_dir ( $this->path ) or ! is_writable ( $this->path )) {
			return "error";
		}
		$subdirs = explode ( '/', $this->filename );
		if (count ( $subdirs ) > 1) {
			array_pop ( $subdirs );
			$test_path = $this->path . implode ( '/', $subdirs );
			if (! @file_exists ( $test_path )) {
				if (! @mkdir ( $test_path, 0777, TRUE ))
					return $_lang ['build_fail'];
			}
		}
		$cache_path = $this->path . $this->filename . '.cache.php';
		if (! @file_exists ( $cache_path )) {
			@file_put_contents ( $cache_path, "" );
		} else {
			chmod ( $cache_path, 0777 );
		}
		if (! $fp = @fopen ( $cache_path, "w+" )) {
			return "Unable to write MP_cache file1: " . $cache_path;
		}
		$this->contents ['__mp_cache_created'] = time ();
		$this->contents ['__mp_cache_dependencies'] = $this->dependencies;
		if (! empty ( $this->expires ) && $this->expires > time ()) {
			$this->contents ['__mp_cache_expires'] = $this->expires;
		} elseif (! empty ( $this->default_expires ) && $this->expires !== 0) {
			$this->contents ['__mp_cache_expires'] = $this->default_expires;
		}
		if (flock ( $fp, LOCK_EX )) {
			$now_content = "<?php '";
			$now_content .= addslashes ( serialize ( $this->contents ) );
			$now_content .= "';";
			$sccs = fwrite ( $fp, $now_content );
			flock ( $fp, LOCK_UN );
		} else {
			return "Unable to write MP_cache file2: " . $cache_path;
			;
		}
		fclose ( $fp );
		@chmod ( $cache_path, 0777 );
		$this->reset ();
	}
	function del($filename) {
		if ($filename !== NULL)
			$this->filename = $filename;
		$file_path = $this->path . $this->filename . '.cache.php';
		if (file_exists ( $file_path )) {
			chmod ( $file_path, 0777 );
			unlink ( $file_path );
		}
		$this->reset ();
	}
	function flush($dirname = '') {
		if (empty ( $this->path ))
			return FALSE;
		if (file_exists ( $this->path . $dirname ))
			$this->deldir ( $this->path . $dirname );
		$this->reset ();
	}
	function deldir($dir = '') {
		$files = glob ( $dir . '*', GLOB_MARK );
		if(!empty($files)){
			foreach ( $files as $file ) {
				if (substr ( $file, - 1 ) == '/') {
					chmod ( $file, 0755 );
					$this->deldir ( $file );
				} else {
					chmod ( $file, 0755 );
					unlink ( $file );
				}
			}
		}
	}
}
?>