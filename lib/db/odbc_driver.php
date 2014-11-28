<?php
require ('DataBase.php');
class odbc_driver extends DataBase  {
    public $_dbhost;
	public $_dbname;
	public $_dbuser;
	public $_dbpass;
	public $_dbcharset;
	public $_link;
	function __construct() {
		$this->_dbhost = "Driver={Microsoft Access Driver (*.mdb)};Dbq=".S_ROOT."data\aaaa.mdb";
		$this->_dbuser = "";
		$this->_dbpass = "";
		if(function_exists("odbc_connect")){
			$this->_link = odbc_connect( $this->_dbhost, $this->_dbuser, $this->_dbpass );
		}else {
			$this->_link = FALSE;
			$this->halt('does not support odbc database connection');
		}
	}
	public function dbConnection() {
		if (! $this->_link) {
			  $this->halt('DataBase Connection Error') ;
		} else {
			return $this->_link;
		}
	}
	public function query($sql) {
		$rs = odbc_exec($this->dbConnection(),$sql);
		if(is_resource($rs)){
			while ($result[] = odbc_fetch_array($rs));
			odbc_free_result($rs);
			$this->close();
			return $result;
		}else{
			$this->halt('Database query error',$sql);
		}
	}
	public function getCount($sql, $row = 0, $field = null) {
		$query = odbc_exec( $this->dbConnection (),$sql );
		if ($query) {
			$result = odbc_result ( $query, $row, $field );
			return $result;
		} else {
			$this->halt('Database query error',$sql);
		}
	}
	public function insert_id($insertSql) {
		$query = odbc_execute($this->dbConnection(),$insertSql);
		if($query){
			return $query;
		}else {
			$this->halt('Database query error',$insertSql);
		}
	}
	public function execute($sql) {
		$query = odbc_do($this->dbConnection(),$sql);
		if ($query) {
			return  $query;
		} else {
			$this->halt('Database query error',$updatesql);
		}
	}
	public function close() {
		return odbc_close ( $this->_link );
	}
	public function getError() {
		return ($this->_link) ? odbc_error ( $this->dbConnection()) : odbc_errormsg($this->dbConnection());
	}
	public function getErrno(){
		return ($this->_link) ? odbc_errormsg ( $this->dbConnection()) : odbc_error($this->dbConnection());
	}
	function halt($message = '', $sql = '') {
		global $_K;
		$dberror = $this->getError();
		$dberrno = $this->getErrno();
		if(1)
		{
		 echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
				<b>ODBCSQL Error</b><br>
				<b>Message</b>: $message<br>
				<b>SQL</b>: $sql<br>
				<b>Error</b>: $dberror<br>
				<b>Error</b>: $dberrno<br>
				</div>";
		}
		else
		{
			echo "<div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\">
				<b>ODBCSQL	 Error</b><br>
				<b>Message</b>: $message<br>
				 </div>";
		}
		exit();
	}
   public function __destruct()
	{
		is_resource($this->_link) and odbc_close($this->_link);
	}
}
?>