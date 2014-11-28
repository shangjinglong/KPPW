<?php
final class mem_cache_class extends acache_class {
	public $useMemcached = false;
	private $_cache = null;
	private $_servers = array ();
	function __construct($config){
		$this->setServers($config);
		$this->init();
	}
	public function init() {
		$servers = $this->getServers ();
		$cache = $this->getMemCache ();
		if (count ( $servers )) {
			foreach ( $servers as $server ) {
				if ($this->useMemcached)
					$cache->addServer ( $server->host, $server->port, $server->weight );
				else
					$cache->addServer ( $server->host, $server->port, $server->persistent, $server->weight, $server->timeout, $server->status );
			}
		} else {
			$cache->addServer ( 'localhost', 11211 );
		}
	}
	public function getMemCache() {
		if ($this->_cache !== null)
			return $this->_cache;
		else
			return $this->_cache = $this->useMemcached ? new Memcached : new memcache ;
	}
	public function getServers() {
		return $this->_servers;
	}
	public function setServers($config) {
		foreach ( $config as $c )
			$this->_servers [] = new MemCacheServerconfig ( $c );
	}
	public function get($id) {
		return $this->_cache->get ( $id );
	}
	public function mget($ids) {
		return $this->useMemcached ? $this->_cache->getMulti ( $ids ) : $this->_cache->get ( $ids );
	}
	public function set($id, $value, $expire = 0, $dependency = null) {
		if ($expire > 0) {
			$expire += time ();
		} else {
			$expire = 0;
		}
		return $this->useMemcached ? $this->_cache->set ( $id, $value, $expire ) : $this->_cache->set ( $id, $value, 0, $expire );
	}
	public function add($id, $value, $expire = 0, $dependency = null) {
		if ($expire > 0) {
			$expire += time ();
		} else {
			$expire = 0;
		}
		return $this->useMemcached ? $this->_cache->set ( $id, $value, $expire ) : $this->_cache->set ( $id, $value, 0, $expire );
	}
	public function del($id) {
		return $this->_cache->delete ( $id );
	}
	public function flush() {
		return $this->_cache->flush ();
	}
}
class MemCacheServerconfig {
	public $host;
	public $port = 11211;
	public $persistent = true;
	public $weight = 1;
	public $timeout = 15;
	public $retryInterval = 15;
	public $status = true;
	public function __construct($config) {
		if (is_array ( $config )) {
			foreach ( $config as $key => $value )
				$this->$key = $value;
			if ($this->host === null)
				die ( 'MemCache server config must have "host" value.' );
		} else {
			die ( 'MemCache server config must be an array.' );
		}
	}
}
?>