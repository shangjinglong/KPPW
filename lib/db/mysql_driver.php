<?php
require ('DataBase.php');
final class mysql_drver extends DataBase {
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
		if(!$this->_link = mysql_connect ( $this->_dbhost, $this->_dbuser, $this->_dbpass, 1 )){
			exit( 'connect mysql server fail!' );
		}
		if($this->version()>'4.1'){
			$this->_dbcharset and $serverset = "character_set_connection={$this->_dbcharset}, character_set_results={$this->_dbcharset}, character_set_client=binary";
			$this->version() > '5.0.1' and $serverset .= ((empty($serverset) ? '' : ',').'sql_mode=\'\'') ;
			$serverset and mysql_query("SET $serverset", $this->_link);
		}
		mysql_select_db ( $this->_dbname, $this->_link ) or $this->halt ( 'select database:' . $this->_dbname . ' fail!' );
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
		(is_resource ( $query ) and mysql_num_rows($query)) and  $result = mysql_result ( $query, $row, $field ) or $result = 0;
		$this->free_result ();
		return $result;
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
		$id = mysql_insert_id ( $this->_link );
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
			$insertvaluesql .= $comma . $this->mysqlEscapeString($insert_value);
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
			$fileds [] = $this->special_filed ( $k ) . '=' . $this->mysqlEscapeString ( $v );
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
		$filed="";
		$fileds != '*' and $filed = explode ( ',', $fileds );
		if (is_array ( $filed )) {
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
		$res = mysql_affected_rows ( $this->_link );
		$this->free_result ();
		return $res;
	}
	protected function execute_sql($sql, $is_nubuffer = 0) {
		! is_resource ( $this->_link ) and $this->dbConnection ();
		$is_nubuffer == 1 and $query_type = "mysql_unbuffered_query" or $query_type = "mysql_query";
		array_push($this->_query_sql, $sql);
		$this->_last_query_id = $query_type ( $sql, $this->_link ) or $this->halt ( mysql_error (), $sql );
		$this->_query_num ++;
		return $this->_last_query_id;
	}
	public function get_query_num() {
		return $this->_query_num;
	}
	public function fetch_array($type = MYSQL_ASSOC) {
		$res = mysql_fetch_array ( $this->_last_query_id, $type );
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
			mysql_free_result ( $this->_last_query_id );
			$this->_last_query_id = null;
		}
	}
	public function close() {
		is_resource ( $this->_link ) and mysql_close ( $this->_link );
	}
	public function getError() {
		return ($this->_link) ? mysql_error ( $this->_link ) : mysql_errno ();
	}
	public function getErrno() {
		return ($this->_link) ? mysql_errno ( $this->_link ) : mysql_errno ();
	}
	public function halt($message = '', $sql = '') {
		throw new keke_exception ( ':error [ :query ]', array ('msg'=>$message,':error' => mysql_error ( $this->_link ), ':query' => $sql ), mysql_errno ( $this->_link ) );
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
	public function mysqlEscapeString(&$value) {
		if(@get_magic_quotes_gpc())$value = stripslashes($value);
		return '\''.mysql_real_escape_string( $value,$this->_link).'\'';
	}
	public function __destruct() {
		is_resource ( $this->_link ) and mysql_close ( $this->_link );
	}
	public function version(){
		return mysql_get_server_info($this->_link);
	}
}
?>