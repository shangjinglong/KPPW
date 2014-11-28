<?php
require ('DataBase.php');
final class mysqli_drver extends DataBase {
	public $_dbhost;
	public $_dbname;
	public $_dbuser;
	public $_dbpass;
	public $_dbcharset;
	public $_link;
	public $_last_query_id = null;
	public $_query_num = 0;
	public $_query_sql= array();
	function __construct() {
		$this->_dbhost = DataBase::$dbhost;
		$this->_dbname = DataBase::$dbname;
		$this->_dbuser = DataBase::$dbuser;
		$this->_dbpass = DataBase::$dbpass;
		$this->_dbcharset = DataBase::$dbcharset;
	}
	public function dbConnection() {
		function_exists('mysqli_connect') or exit('function mysqli is not support!');
		$this->_link = mysqli_connect ( $this->_dbhost, $this->_dbuser, $this->_dbpass) or $this->halt ( 'connect mysql server fail!' );
		if($this->version()>'4.1'){
			$this->_dbcharset and $serverset = "character_set_connection={$this->_dbcharset}, character_set_results={$this->_dbcharset}, character_set_client=binary";
			$this->version() > '5.0.1' and $serverset .= ((empty($serverset) ? '' : ',').'sql_mode=\'\'') ;
			$serverset and mysqli_query($this->_link,"SET $serverset");
		}
		mysqli_select_db ($this->_link,$this->_dbname) or $this->halt ( 'select database:' . $this->_dbname . ' fail!' );
		return $this->_link;
	}
	public function query($sql, $is_unbuffer = 0) {
		$this->execute_sql ( $sql, $is_unbuffer );
		$result = array ();
		while ( ($rs = $this->fetch_array ()) != false ) {
			$result [] = $rs;
		}
		$this->free_result ();
		return $result;
	}
	public function getCount($sql, $row = 0, $field = null) {
		$query = $this->execute_sql ( $sql );
		(is_object($query) and mysqli_num_rows($query)) and  $result = $this->fetch_one($query, $row, $field ) or $result = 0;
		$this->free_result ();
		return $result;
	}
	public function fetch_one($query,$row=0,$field=null){
		while ($row=mysqli_fetch_array($query)){
			$field and $res = $row[$field] or $res = $row[0];
		}
		return $res;
	}
	public function start_trans() {
		if ($this->_trans == 0) {
			$sql = "start transaction";
			$this->execute_sql ( $sql );
		}
		$this->_trans ++;
		return;
	}
	public function commit() {
		if ($this->_trans > 0) {
			$this->execute_sql ( "commit" );
		}
		return true;
	}
	public function rollback() {
		if ($this->_trans > 0) {
			$this->execute_sql ( "ROLLBACK" );
			$this->_trans = 0;
		}
		return true;
	}
	public function get_trans_num() {
		return $this->_trans;
	}
	public function get_one_row($sql) {
		$this->execute_sql ( $sql );
		$res = $this->fetch_array ();
		$this->free_result ();
		return $res;
	}
	public function insert_id($insertSql) {
		$query = $this->execute_sql ( $insertSql );
		$id = mysqli_insert_id ( $this->_link );
		$this->free_result ();
		return $id;
	}
	public function insert($tablename, $insertsqlarr, $returnid = 0, $replace = false) {
		if (! is_array ( $insertsqlarr )) {
			return false;
		}
		$insertkeysql = $insertvaluesql = $comma = '';
		foreach ( $insertsqlarr as $insert_key => $insert_value ) {
			$insertkeysql .= $comma . '`' . $insert_key . '`';
			$insertvaluesql .= $comma . $this->mysqliEscapeString($insert_value);
			$comma = ', ';
		}
		$method = $replace ? 'replace' : 'insert';
		$sql = $method . ' into ' . $tablename . ' (' . $insertkeysql . ') values (' . $insertvaluesql . ')';
		$lsid = $this->insert_id ( $sql );
		if ($returnid && ! $replace) {
			return $lsid;
		} else {
			return true;
		}
	}
	public function update($tablename, $setsqlarr, $wheresqlarr) {
		$setsql = '';
		$fields = array ();
		foreach ( $setsqlarr as $k => $v ) {
			if(@get_magic_quotes_gpc())$v = stripslashes($v);
			$fileds [] = $this->special_filed ( $k ) . '=' .  $this->mysqliEscapeString ( $v );
		}
		$setsql = implode ( ',', $fileds );
		$where = "";
		if (empty ( $wheresqlarr )) {
			$where = 1;
		} elseif (is_array ( $wheresqlarr )) {
			$temp = array ();
			foreach ( $wheresqlarr as $k => $v ) {
				$temp [] = $this->special_filed ( $k ) . '=' . $this->escape_string ( $v );
			}
			$where = implode ( ' and ', $temp );
		} else {
			$where = $wheresqlarr;
		}
		return $affectrows = $this->execute ( 'UPDATE ' . $tablename . ' SET ' . $setsql . ' WHERE ' . $where );
	}
	public function select($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		$where and $where = ' WHERE ' . $where;
		$order and $order = ' ORDER BY ' . $order;
		$group and $group = ' GROUP BY ' . $group;
		$limit and $limit = ' LIMIT ' . $limit;
		$fileds != '*' and $filed = explode ( ',', $fileds );
		if (isset($filed)&&is_array ( $filed )) {
			array_walk ( $filed, array ($this, 'special_filed' ) );
			$fileds = implode ( ',', $filed );
		}
		$sql = 'SELECT ' . $fileds . ' FROM `' . $this->_dbname . '`.`' . TABLEPRE . $table . '`' . $where . $group . $order . $limit;
		$this->execute_sql ( $sql );
		$datalist = array ();
		while ( ($rs = $this->fetch_array ()) != false ) {
			$pk and $datalist [$rs [$pk]] = $rs or $datalist [] = $rs;
		}
		$this->free_result ();
		return $datalist;
	}
	public function execute($updatesql) {
		$this->execute_sql ( $updatesql );
		$res = mysqli_affected_rows ( $this->_link );
		$this->free_result ();
		return $res;
	}
	protected function execute_sql($sql, $is_nubuffer = 0) {
		! is_resource ( $this->_link ) and $this->dbConnection ();
		$is_nubuffer == 1 and $query_type = "mysqli_store_result" or $query_type = "mysqli_query";
		array_push($this->_query_sql, $sql);
		$this->_last_query_id = $query_type ($this->_link,$sql) or $this->halt ( mysql_error (), $sql );
		$this->_query_num ++;
		return $this->_last_query_id;
	}
	public function get_query_num() {
		return $this->_query_num;
	}
	public function fetch_array($type = MYSQL_ASSOC) {
		$res = mysqli_fetch_array ( $this->_last_query_id, $type );
		if($res){
			foreach ($res as $k=>$v){
				$res[$k] = stripcslashes($v);
			}
		}else{
			$this->free_result ();
		}
		return $res;
	}
	public function free_result() {
		if (is_resource ( $this->_last_query_id )) {
			mysqli_free_result ( $this->_last_query_id );
			$this->_last_query_id = null;
		}
	}
	public function close() {
		is_resource ( $this->_link ) and mysqli_close ( $this->_link );
	}
	public function getError() {
		return ($this->_link) ? mysqli_error ( $this->_link ) : mysqli_errno ();
	}
	public function getErrno() {
		return ($this->_link) ? mysqli_errno ( $this->_link ) : mysqli_errno ();
	}
	public function halt($message = '', $sql = '') {
		throw new keke_exception ( ':error [ :query ]', array (':error' => mysql_error ( $this->_link ), ':query' => $sql ), mysql_errno ( $this->_link ) );
		exit ();
	}
	public function special_filed(&$value) {
		if ('*' == $value || false !== strpos ( $value, '(' ) || false !== strpos ( $value, '.' ) || false !== strpos ( $value, '`' )) {
		} else {
			$value = '`' . trim ( $value ) . '`';
		}
		return $value;
	}
	public function escape_string(&$value) {
		$q = '\'';
		$value = $q . $value . $q;
		return $value;
	}
	public function mysqliEscapeString(&$value) {
		if(@get_magic_quotes_gpc())$value = stripslashes($value);
		return '\''.mysqli_real_escape_string($this->_link, $value).'\'';
	}
	public function __destruct() {
		is_resource ( $this->_link ) and mysqli_close ( $this->_link );
	}
	public function version(){
		return mysqli_get_server_info($this->_link);
	}
}
?>