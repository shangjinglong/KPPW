<?php
class Keke_witkey_ad_class {
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_ad_id;
	public $_target_id;
	public $_ad_type;
	public $_ad_position;
	public $_ad_name;
	public $_ad_file;
	public $_ad_content;
	public $_ad_url;
	public $_start_time;
	public $_end_time;
	public $_uid;
	public $_username;
	public $_listorder;
	public $_width;
	public $_height;
	public $_tpl_type;
	public $_is_allow;
	public $_on_time;
	public $_cache_config = array (
			'is_cache' => 0,
			'time' => 0 
	);
	public $_replace = 0;
	public $_where;
	function keke_witkey_ad_class() {
		$this->_db = new db_factory ();
		$this->_dbop = $this->_db->create ( DBTYPE );
		$this->_tablename = TABLEPRE . "witkey_ad";
	}
	public function getAd_id() {
		return $this->_ad_id;
	}
	public function getTarget_id() {
		return $this->_target_id;
	}
	public function getAd_type() {
		return $this->_ad_type;
	}
	public function getAd_position() {
		return $this->_ad_position;
	}
	public function getAd_name() {
		return $this->_ad_name;
	}
	public function getAd_file() {
		return $this->_ad_file;
	}
	public function getAd_content() {
		return $this->_ad_content;
	}
	public function getAd_url() {
		return $this->_ad_url;
	}
	public function getStart_time() {
		return $this->_start_time;
	}
	public function getEnd_time() {
		return $this->_end_time;
	}
	public function getUid() {
		return $this->_uid;
	}
	public function getUsername() {
		return $this->_username;
	}
	public function getListorder() {
		return $this->_listorder;
	}
	public function getWidth() {
		return $this->_width;
	}
	public function getHeight() {
		return $this->_height;
	}
	public function getTpl_type() {
		return $this->_tpl_type;
	}
	public function getIs_allow() {
		return $this->_is_allow;
	}
	public function getOn_time() {
		return $this->_on_time;
	}
	public function getWhere() {
		return $this->_where;
	}
	public function getCache_config() {
		return $this->_cache_config;
	}
	public function setAd_id($value) {
		$this->_ad_id = $value;
	}
	public function setTarget_id($value) {
		$this->_target_id = $value;
	}
	public function setAd_type($value) {
		$this->_ad_type = $value;
	}
	public function setAd_position($value) {
		$this->_ad_position = $value;
	}
	public function setAd_name($value) {
		$this->_ad_name = $value;
	}
	public function setAd_file($value) {
		$this->_ad_file = $value;
	}
	public function setAd_content($value) {
		$this->_ad_content = $value;
	}
	public function setAd_url($value) {
		$this->_ad_url = $value;
	}
	public function setStart_time($value) {
		$this->_start_time = $value;
	}
	public function setEnd_time($value) {
		$this->_end_time = $value;
	}
	public function setUid($value) {
		$this->_uid = $value;
	}
	public function setUsername($value) {
		$this->_username = $value;
	}
	public function setListorder($value) {
		$this->_listorder = $value;
	}
	public function setWidth($value) {
		$this->_width = $value;
	}
	public function setHeight($value) {
		$this->_height = $value;
	}
	public function setTpl_type($value) {
		$this->_tpl_type = $value;
	}
	public function setIs_allow($value) {
		$this->_is_allow = $value;
	}
	public function setOn_time($value) {
		$this->_on_time = $value;
	}
	public function setWhere($value) {
		$this->_where = $value;
	}
	public function setCache_config($_cache_config) {
		$this->_cache_config = $_cache_config;
	}
	public function __set($property_name, $value) {
		$this->$property_name = $value;
	}
	public function __get($property_name) {
		if (isset ( $this->$property_name )) {
			return $this->$property_name;
		} else {
			return null;
		}
	}
	function create_keke_witkey_ad() {
		$data = array ();
		if (! is_null ( $this->_ad_id )) {
			$data ['ad_id'] = $this->_ad_id;
		}
		if (! is_null ( $this->_target_id )) {
			$data ['target_id'] = $this->_target_id;
		}
		if (! is_null ( $this->_ad_type )) {
			$data ['ad_type'] = $this->_ad_type;
		}
		if (! is_null ( $this->_ad_position )) {
			$data ['ad_position'] = $this->_ad_position;
		}
		if (! is_null ( $this->_ad_name )) {
			$data ['ad_name'] = $this->_ad_name;
		}
		if (! is_null ( $this->_ad_file )) {
			$data ['ad_file'] = $this->_ad_file;
		}
		if (! is_null ( $this->_ad_content )) {
			$data ['ad_content'] = $this->_ad_content;
		}
		if (! is_null ( $this->_ad_url )) {
			$data ['ad_url'] = $this->_ad_url;
		}
		if (! is_null ( $this->_start_time )) {
			$data ['start_time'] = $this->_start_time;
		}
		if (! is_null ( $this->_end_time )) {
			$data ['end_time'] = $this->_end_time;
		}
		if (! is_null ( $this->_uid )) {
			$data ['uid'] = $this->_uid;
		}
		if (! is_null ( $this->_username )) {
			$data ['username'] = $this->_username;
		}
		if (! is_null ( $this->_listorder )) {
			$data ['listorder'] = $this->_listorder;
		}
		if (! is_null ( $this->_width )) {
			$data ['width'] = $this->_width;
		}
		if (! is_null ( $this->_height )) {
			$data ['height'] = $this->_height;
		}
		if (! is_null ( $this->_tpl_type )) {
			$data ['tpl_type'] = $this->_tpl_type;
		}
		if (! is_null ( $this->_is_allow )) {
			$data ['is_allow'] = $this->_is_allow;
		}
		if (! is_null ( $this->_on_time )) {
			$data ['on_time'] = $this->_on_time;
		}
		return $this->_ad_id = $this->_db->inserttable ( $this->_tablename, $data, 1, $this->_replace );
	}
	function edit_keke_witkey_ad() {
		$data = array ();
		if (! is_null ( $this->_ad_id )) {
			$data ['ad_id'] = $this->_ad_id;
		}
		if (! is_null ( $this->_target_id )) {
			$data ['target_id'] = $this->_target_id;
		}
		if (! is_null ( $this->_ad_type )) {
			$data ['ad_type'] = $this->_ad_type;
		}
		if (! is_null ( $this->_ad_position )) {
			$data ['ad_position'] = $this->_ad_position;
		}
		if (! is_null ( $this->_ad_name )) {
			$data ['ad_name'] = $this->_ad_name;
		}
		if (! is_null ( $this->_ad_file )) {
			$data ['ad_file'] = $this->_ad_file;
		}
		if (! is_null ( $this->_ad_content )) {
			$data ['ad_content'] = $this->_ad_content;
		}
		if (! is_null ( $this->_ad_url )) {
			$data ['ad_url'] = $this->_ad_url;
		}
		if (! is_null ( $this->_start_time )) {
			$data ['start_time'] = $this->_start_time;
		}
		if (! is_null ( $this->_end_time )) {
			$data ['end_time'] = $this->_end_time;
		}
		if (! is_null ( $this->_uid )) {
			$data ['uid'] = $this->_uid;
		}
		if (! is_null ( $this->_username )) {
			$data ['username'] = $this->_username;
		}
		if (! is_null ( $this->_listorder )) {
			$data ['listorder'] = $this->_listorder;
		}
		if (! is_null ( $this->_width )) {
			$data ['width'] = $this->_width;
		}
		if (! is_null ( $this->_height )) {
			$data ['height'] = $this->_height;
		}
		if (! is_null ( $this->_tpl_type )) {
			$data ['tpl_type'] = $this->_tpl_type;
		}
		if (! is_null ( $this->_is_allow )) {
			$data ['is_allow'] = $this->_is_allow;
		}
		if (! is_null ( $this->_on_time )) {
			$data ['on_time'] = $this->_on_time;
		}
		if ($this->_where) {
			return $this->_db->updatetable ( $this->_tablename, $data, $this->getWhere () );
		} else {
			$where = array (
					'ad_id' => $this->_ad_id 
			);
			return $this->_db->updatetable ( $this->_tablename, $data, $where );
		}
	}
	function query_keke_witkey_ad($is_cache = 0, $cache_time = 0) {
		if ($this->_where) {
			$sql = "select * from $this->_tablename where " . $this->_where;
		} else {
			$sql = "select * from $this->_tablename";
		}
		if ($is_cache) {
			$this->_cache_config ['is_cache'] = $is_cache;
		}
		if ($cache_time) {
			$this->_cache_config ['time'] = $cache_time;
		}
		if ($this->_cache_config ['is_cache']) {
			if (CACHE_TYPE) {
				$keke_cache = new keke_cache_class ( CACHE_TYPE );
				$id = $this->_tablename . ($this->_where ? "_" . substr ( md5 ( $this->_where ), 0, 6 ) : '');
				$data = $keke_cache->get ( $id );
				if ($data) {
					return $data;
				} else {
					$res = $this->_dbop->query ( $sql );
					$keke_cache->set ( $id, $res, $this->_cache_config ['time'] );
					$this->_where = "";
					return $res;
				}
			}
		} else {
			$this->_where = "";
			return $this->_dbop->query ( $sql );
		}
	}
	function count_keke_witkey_ad() {
		if ($this->_where) {
			$sql = "select count(*) as count from $this->_tablename where " . $this->_where;
		} else {
			$sql = "select count(*) as count from $this->_tablename";
		}
		$this->_where = "";
		return $this->_dbop->getCount ( $sql );
	}
	function del_keke_witkey_ad() {
		if ($this->_where) {
			$sql = "delete from $this->_tablename where " . $this->_where;
		} else {
			$sql = "delete from $this->_tablename where ad_id = $this->_ad_id ";
		}
		$this->_where = "";
		return $this->_dbop->execute ( $sql );
	}
}
?>