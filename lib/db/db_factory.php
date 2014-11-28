<?php
class keke_db {
	private $_db_provider;
	private $_dbtype = DBTYPE;
	public $_mydb;
	private static $dbs = array ('mysql'=>null,'mysqli'=>null,'odbc'=>null);
	public static function &get_instance($dbtype = DBTYPE) {
		static $obj = null;
		! is_object ( $obj ) && $obj = new keke_db ( $dbtype );
		return $obj;
	}
	function __construct($dbtype = DBTYPE) {
		if (is_object ( self::$dbs [$dbtype] )) {
			$this->_mydb = self::$dbs [$dbtype];
		} else {
			$this->_mydb = $this->create ( $dbtype );
		}
	}
	public function create($dbtype) {
		if (is_object ( self::$dbs [$dbtype] )) {
			return self::$dbs [$dbtype];
		} else {
			switch ($dbtype) {
				case "odbc" :
					$this->_dbtype = $dbtype;
					if (empty ( self::$dbs [$dbtype] )) {
						kekezu::keke_require_once ( S_ROOT . '/lib/db/odbc_driver.php' );
						return self::$dbs [$dbtype] = new odbc_driver ();
					} else {
						return self::$dbs [$dbtype];
					}
					break;
				case "pdo_sqlite" :
					$this->_dbtype = "pdo_sqlite";
					kekezu::keke_require_once ( S_ROOT . '/lib/db/sqlite_driver.php' );
					break;
				case "mysqli" :
					$this->_dbtype = "mysqli";
					if (empty ( self::$dbs [$dbtype] )) {
						kekezu::keke_require_once ( S_ROOT . '/lib/db/mysqli_driver.php' );
						return self::$dbs [$dbtype] = new mysqli_drver ();
					} else {
						return self::$dbs [$dbtype];
					}
					break;
				default :
					$this->_dbtype = $dbtype;
					if (empty ( self::$dbs [$dbtype] )) {
						kekezu::keke_require_once ( S_ROOT . '/lib/db/mysql_driver.php' );
						return self::$dbs [$dbtype] = new mysql_drver ();
					} else {
						return self::$dbs [$dbtype];
					}
					break;
			}
		}
	}
	public function inserttable($tablename, $insertsqlarr, $returnid = 0, $replace = false) {
		return $this->_mydb->insert ( $tablename, $insertsqlarr, $returnid, $replace );
	}
	public function updatetable($tablename, $setsqlarr, $wheresqlarr) {
		return $this->_mydb->update ( $tablename, $setsqlarr, $wheresqlarr );
	}
	public function execute($sql) {
		$res = $this->_mydb->execute ( $sql );
		return $res ? $res : 0;
	}
	public function get_query_num() {
		return $this->_mydb->get_query_num ();
	}
	public function select($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '') {
		return $this->_mydb->select ( $fileds, $table, $where, $order, $group, $limit, $pk );
	}
	public function getCount($sql, $row = 0, $filed = null) {
		return $this->_mydb->getCount ( $sql, $row, $filed );
	}
	public function get_one($sql) {
		return $this->_mydb->get_one_row ( $sql );
	}
	public function query($sql, $is_unbuffer = 0) {
		return $this->_mydb->query ( $sql, $is_unbuffer );
	}
	public function __destruct() {
		$this->_mydb->close ();
	}
}
class db_factory {
	private static $db_obj = null;
	public static function init($dbtype =DBTYPE) {
		$db_obj = &keke_db::get_instance ( $dbtype );
		return self::$db_obj = $db_obj;
	}
	public static function execute($sql) {
		self::init ();
		return self::$db_obj->execute ( $sql );
	}
	public static function query($sql, $is_cache = 0, $cache_time = 0, $is_unbuffer = 0) {
		$db = self::init ();
		$result='';
		if(IS_CACHE){
			$cache_time > 0||is_null($cache_time) and ($result = self::db_cache ( 1, $sql, $cache_time ) and $cached=1);
			$result or ($result = self::$db_obj->query ( $sql, $is_unbuffer ) and $cached=0);
			if($result&&$result!='QUERY_EMPTY'){
				!$cached&&self::db_set_cache ($sql, $cache_time, $result );
				return $result;
			}else{
				!$cached&&self::db_set_cache ($sql, $cache_time);
				return array();
			}
		}else{
			return $result = self::$db_obj->query ( $sql, $is_unbuffer );
		}
	}
	public static function inserttable($tablename, $insertsqlarr, $returnid = 1, $replace = false) {
		$db = self::init ();
		$result = $db->inserttable ( $tablename, $insertsqlarr, $returnid, $replace );
		return $result == 0 ? true : $result;
	}
	public static function updatetable($tablename, $setsqlarr, $wheresqlarr) {
		$db = self::init ();
		return $db->updatetable ( $tablename, $setsqlarr, $wheresqlarr );
	}
	public static function create($dbtype = DBTYPE) {
		return self::init ( $dbtype );
	}
	public static function get_one($sql, $cache_time = 0) {
		$db = self::init ();
		if(IS_CACHE){
			$cache_time > 0||is_null($cache_time) and ($result = self::db_cache ( 1, $sql, $cache_time ) and $cached=1);
			$result or 	($result = self::$db_obj->get_one ( $sql) and $cached=0);
			if($result&&$result!='QUERY_EMPTY'){
				!$cached&&self::db_set_cache ($sql, $cache_time, $result );
				return $result;
			}else{
				!$cached&&self::db_set_cache ($sql, $cache_time, $result);
				return array();
			}
		}else{
			return $result = self::$db_obj->get_one ( $sql);
		}
	}
	public static function get_count($sql, $row = 0, $filed = null, $cache_time = 0) {
		$db = self::init ();
		if(IS_CACHE){
			$cache_time > 0||is_null($cache_time) and ($result = self::db_cache ( 1, $sql, $cache_time ) and $cached=1);
			$result or ($result = $db->getCount ( $sql, $row, $filed ) and $cached=0);
			if($result&&$result!='QUERY_EMPTY'){
				!$cached&&self::db_set_cache ($sql, $cache_time, $result );
				return $result;
			}else{
				!$cached&&self::db_set_cache ($sql, $cache_time);
				return $result=0;
			}
		}else{
			return $result = $db->getCount ( $sql, $row, $filed );
		}
	}
	public static function db_set_cache($sql,$cache_time,$result='QUERY_EMPTY'){
		self::db_cache ( 0, $sql, $cache_time, $result );
	}
	private static function db_cache($is_get, $sql, $ttl, $result='QUERY_EMPTY') {
		global $_K;
		$cache_obj = new keke_cache_class ( CACHE_TYPE, $_K ['cache_config'] );
		$key = $cache_obj->generate_id ( $sql );
		if($is_get==1){
			$res = $cache_obj->get ( $key );
		}else{
			$res = $cache_obj->set ( $key, $result, $ttl );
		}
		return $res;
	}
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		global $_K;
		$wh = "";
		if(is_array($where)){
			while ( list ( $k, $v ) = each ( $where ) ) {
				$wh .= " 1=1 and " . $k . " = '$v'";
			}
		}
		$wh and $where = $wh;
		$db = self::init ();
		$sql = $table .$fileds. $where . $pk . $cachetime;
		if(IS_CACHE){
			$cachetime>0||is_null($cachetime) and ($result = self::db_cache ( 1, $sql, $cachetime ) and $cached=1);
			$result or ($result = $db->select ( $fileds, $table, $where, $order, $group, $limit, $pk ) and $cached=0);
			if($result&&$result!='QUERY_EMPTY'){
				!$cached&&self::db_set_cache ($sql, $cachetime, $result );
				return $result;
			}else{
				!$cached&&self::db_set_cache ($sql, $cachetime);
				return array();
			}
		}else{
			return $result = $db->select ( $fileds, $table, $where, $order, $group, $limit, $pk );
		}
	}
}
?>