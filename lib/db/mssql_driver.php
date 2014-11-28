<?php
define ( "IN_KEKE", TRUE );
require ('DataBase.php');
class mssql_driver extends DataBase {
	public $_link;
	public function __construct($dbhost = null, $dbname = null, $dbuser = null, $dbpass = null, $dbcharset = null) {
		$dbhost and $this->dbhost = $dbhost;
		$dbname and $this->dbname = $dbname;
		$dbuser and $this->dbuser = $dbuser;
		$dbpass and $this->dbpass = $dbpass;
		$dbcharset and $this->dbcharset = $dbcharset;
		$this->_link = mssql_connect ( $this->dbhost, $this->dbuser, $this->dbpass );
		$this->dbConnection ();
	}
	public function dbConnection() {
		if (! $this->_link) {
			$this->halt ( "数据连接错误" );
		} else {
			mssql_select_db ( $this->dbname, $this->_link );
			return $this->_link;
		}
	}
	function halt($message = '', $sql = '') {
		$dberror = mssql_get_last_message ();
		if (DEBUG_MODE) {
			echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
			<b>MySQL Error</b><br>
			<b>Message</b>: $message<br>
			<b>SQL</b>: $sql<br>
			<b>Error</b>: $dberror<br>
			<b>Errno.</b>: $dberrno<br>
			</div>";
		} else {
			echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
		<b>MySQL Error</b><br>
		<b>Message</b>: $message<br>
		</div>";
		}
		exit ();
	}
	function insert_id($insertSql) {
		$flags = mssql_query ( $insertSql, $this->dbConnection () );
		if ($flags) {
			return $flags;
		} else {
			$this->halt ( "数据库查询错误", $insertSql );
		}
	}
	public function getCount($sql) {
		$query = mssql_query ( $sql, $this->dbConnection () );
		if ($query) {
			$result = mssql_num_rows ( $query );
			return $result;
		} else {
			$this->halt ( "数据库查询错误", $sql );
		}
	}
	public function query($sql, $start = null, $perpage = null, $nolimit = false) {
		$start and ! $perpage and $perpage = 10000;
		$query = mssql_query ( $sql, $this->dbConnection () );
		if ($start) {
			$qcount = mssql_num_rows ( $query );
			if ($qcount < $start) {
				return array ();
			} else {
				mssql_data_seek ( $query, $start );
			}
		}
		if ($query) {
			$result = array ();
			while ( $row = mssql_fetch_assoc ( $query ) ) {
				if (DBCHARSET == 'gbk' && CHARSET != 'gbk') {
					$row = Base_Class::gbktoutf ( $row );
				}
				$result [] = $row;
				if ($perpage && count ( $result ) >= $perpage) {
					break;
				}
			}
			return $result;
		} else {
			$this->halt ( "数据库查询错误", $sql );
		}
	}
	public function select($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		$where and $where = ' WHERE ' . $where;
		$order and $order = ' ORDER BY ' . $order;
		$group and $group = ' GROUP BY ' . $group;
		$limit and $limit = ' LIMIT ' . $limit;
		$filed = "";
		$fileds != '*' and $filed = explode ( ',', $fileds );
		if (is_array ( $filed )) {
			array_walk ( $filed, array (
					$this,
					'special_filed'
			) );
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
	public function insert($tablename, $insertsqlarr, $returnid = 0, $replace = false) {
		if (! is_array ( $insertsqlarr )) {
			return false;
		}
		$fs = array_keys ( $insertsqlarr );
		$vs = array_values ( $insertsqlarr );
		array_walk ( $fs, array (
				$this,
				'special_filed'
		) );
		array_walk ( $vs, array (
				$this,
				'escape_string'
		) );
		$field = implode ( ',', $fs );
		$value = implode ( ',', $vs );
		$method = $replace ? 'replace' : 'insert';
		$sql = $method . ' into ' . $tablename . ' (' . $field . ') values (' . $value . ')';
		$lsid = $this->insert_id ( $sql );
		if ($returnid && ! $replace) {
			return $lsid;
		} else {
			return true;
		}
	}
	public function execute($updatesql) {
		$query = mssql_query ( $updatesql, $this->dbConnection () );
		if ($query) {
			return @mssql_rows_affected ( $this->_link );
		} else {
			$this->halt ( "数据库查询错误", $updatesql );
		}
	}
}