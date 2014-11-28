<?php
class Keke_witkey_system_log_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_log_id;	public $_log_type;	public $_uid;	public $_username;	public $_user_type;	public $_log_content;	public $_log_ip;	public $_log_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_system_log_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_system_log";	}	 
	public function getLog_id(){		return $this->_log_id ;	}	public function getLog_type(){		return $this->_log_type ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getUser_type(){		return $this->_user_type ;	}	public function getLog_content(){		return $this->_log_content ;	}	public function getLog_ip(){		return $this->_log_ip ;	}	public function getLog_time(){		return $this->_log_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setLog_id($value){		$this->_log_id = $value;	}	public function setLog_type($value){		$this->_log_type = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setUser_type($value){		$this->_user_type = $value;	}	public function setLog_content($value){		$this->_log_content = $value;	}	public function setLog_ip($value){		$this->_log_ip = $value;	}	public function setLog_time($value){		$this->_log_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	public  function __set($property_name, $value) {
		$this->$property_name = $value;
	}
	public function __get($property_name) {
		if (isset ( $this->$property_name )) {
			return $this->$property_name;
		} else {
			return null;
		}
	}
		function create_keke_witkey_system_log(){		$data =  array();		if(!is_null($this->_log_id)){			$data['log_id']=$this->_log_id;		}		if(!is_null($this->_log_type)){			$data['log_type']=$this->_log_type;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_user_type)){			$data['user_type']=$this->_user_type;		}		if(!is_null($this->_log_content)){			$data['log_content']=$this->_log_content;		}		if(!is_null($this->_log_ip)){			$data['log_ip']=$this->_log_ip;		}		if(!is_null($this->_log_time)){			$data['log_time']=$this->_log_time;		}		return $this->_log_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_system_log(){		$data =  array();		if(!is_null($this->_log_id)){			$data['log_id']=$this->_log_id;		}		if(!is_null($this->_log_type)){			$data['log_type']=$this->_log_type;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_user_type)){			$data['user_type']=$this->_user_type;		}		if(!is_null($this->_log_content)){			$data['log_content']=$this->_log_content;		}		if(!is_null($this->_log_ip)){			$data['log_ip']=$this->_log_ip;		}		if(!is_null($this->_log_time)){			$data['log_time']=$this->_log_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('log_id' => $this->_log_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_system_log($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_system_log(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_system_log(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where log_id = $this->_log_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>