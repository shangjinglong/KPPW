<?php
class Keke_witkey_session_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_session_id;	public $_session_expirse;	public $_session_data;	public $_session_ip;	public $_session_uid;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_session_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_session";	}	 
	public function getSession_id(){		return $this->_session_id ;	}	public function getSession_expirse(){		return $this->_session_expirse ;	}	public function getSession_data(){		return $this->_session_data ;	}	public function getSession_ip(){		return $this->_session_ip ;	}	public function getSession_uid(){		return $this->_session_uid ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setSession_id($value){		$this->_session_id = $value;	}	public function setSession_expirse($value){		$this->_session_expirse = $value;	}	public function setSession_data($value){		$this->_session_data = $value;	}	public function setSession_ip($value){		$this->_session_ip = $value;	}	public function setSession_uid($value){		$this->_session_uid = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_session(){		$data =  array();		if(!is_null($this->_session_id)){			$data['session_id']=$this->_session_id;		}		if(!is_null($this->_session_expirse)){			$data['session_expirse']=$this->_session_expirse;		}		if(!is_null($this->_session_data)){			$data['session_data']=$this->_session_data;		}		if(!is_null($this->_session_ip)){			$data['session_ip']=$this->_session_ip;		}		if(!is_null($this->_session_uid)){			$data['session_uid']=$this->_session_uid;		}		return $this->_session_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_session(){		$data =  array();		if(!is_null($this->_session_id)){			$data['session_id']=$this->_session_id;		}		if(!is_null($this->_session_expirse)){			$data['session_expirse']=$this->_session_expirse;		}		if(!is_null($this->_session_data)){			$data['session_data']=$this->_session_data;		}		if(!is_null($this->_session_ip)){			$data['session_ip']=$this->_session_ip;		}		if(!is_null($this->_session_uid)){			$data['session_uid']=$this->_session_uid;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('session_id' => $this->_session_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_session($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_session(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_session(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where session_id = $this->_session_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>