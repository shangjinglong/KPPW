<?php
class db_tool {
	var $querynum = 0;
	var $link;
	var $histories;
	var $time;
	var $tablepre;
	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $dbcharset, $pconnect = 0, $tablepre='', $time = 0) {
		$this->time = $time;
		$this->tablepre = $tablepre;
		if($pconnect) {
			if(!$this->link = mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$this->halt('Can not connect to MySQL server');
			}
		} else {
			if(!$this->link = mysql_connect($dbhost, $dbuser, $dbpw, 1)) {
				$this->halt('Can not connect to MySQL server');
			}
		}
		if($this->version() > '4.1') {
			if($dbcharset) {
				mysql_query("SET character_set_connection=".$dbcharset.", character_set_results=".$dbcharset.", character_set_client=binary", $this->link);
			}

			if($this->version() > '5.0.1') {
				mysql_query("SET sql_mode=''", $this->link);
			}
		}
		if($dbname) {
			mysql_select_db($dbname, $this->link);
		}
	}
	function cache_gc() {
		$this->query("DELETE FROM {$this->tablepre}sqlcaches WHERE expiry<$this->time");
	}
	function query($sql, $type = '', $cachetime = FALSE) {
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ? 'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link)) && $type != 'SILENT') {
			$this->halt('SQL:', $sql);
		}
		$this->querynum++;
		$this->histories[] = $sql;
		return $query;
	}
	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}
	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}
	function result($query, $row) {
		$query = @mysql_result($query, $row);
		return $query;
	}
	function version() {
		return mysql_get_server_info($this->link);
	}
	function close() {
		return mysql_close($this->link);
	}
	function halt($message = '', $sql = '') {
		exit('run_sql_error:'. $message.$sql.'<br /> Error:'.$this->error().'<br />Errno:'.$this->errno());
	}
}
?>