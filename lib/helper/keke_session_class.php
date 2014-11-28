<?php
class keke_session_class {
	public $_session_obj ;
	public static function get_instance() {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_session_class ();
		}
		return $obj;
	}
	function __construct() {
		 $this->init ();
	}
	function init() {
		switch (SESSION_MODULE) {
			case 'mysql' :
				$this->_session_obj = new session_mysql_class ();
				break;
			case 'files' :
				$this->_session_obj = new session_file_class ();
				break;
		}
	}
}
class session_mysql_class {
	public $_left_time = 1800;
	public $_db;
	function __construct() {
		ini_set ( "session.save_handler", "user" );
		session_module_name ( "user" );
		session_set_save_handler ( array (&$this, "open" ), array (&$this, "close" ), array (&$this, "read" ), array (&$this, "write" ), array (&$this, "destroy" ), array (&$this, "gc" ) );
		session_start ();
	}
	function open($save_path, $sess_name) {
		$this->_left_time = get_cfg_var ( "session.gc_maxlifetime" );
		$this->_db = db_factory::create ();
		return true;
	}
	function close() {
		return $this->gc ( $this->_left_time );
	}
	function read($session_id) {
		$sql = "select session_data from " . TABLEPRE . "witkey_session where session_id = '$session_id' and session_expirse>" . time ();
		$session_arr = $this->_db->get_one( $sql, 1 );
		empty ( $session_arr ) and $session_data = '' or $session_data = $session_arr['session_data'];
		return $session_data;
	}
	function write($session_id, $session_data) {
		$tablename = TABLEPRE . "witkey_session";
		$_SESSION [uid] > 0 and $uid = $_SESSION ['uid'] or $uid = 0;
		$data_arr = array ('session_id' => $session_id, 'session_data' => $session_data, 'session_expirse' => time () + $this->_left_time, 'session_ip' => kekezu::get_ip (), 'session_uid' => $uid );
		return $this->_db->inserttable ( $tablename, $data_arr, 1, 1 );
	}
	function destroy($session_id) {
		$sql = "delete from " . TABLEPRE . "witkey_session where session_id ='$session_id' ";
		return db_factory::execute ( $sql );
	}
	function gc($max_left_time) {
		$sql = "delete from " . TABLEPRE . "witkey_session where session_expirse <" . time ();
		return db_factory::execute ( $sql );
	}
}
class session_file_class {
	function __construct() {
		$path = S_ROOT . 'data' . DIRECTORY_SEPARATOR . 'session';
		ini_set ( 'session.save_handler', 'files' );
		session_save_path ( $path );
		session_start ();
	}
}
?>