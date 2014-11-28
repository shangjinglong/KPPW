<?php
class Keke_witkey_auth_record_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_record_id;	public $_auth_code;	public $_uid;	public $_username;	public $_end_time;	public $_auth_status;	public $_ext_data;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_auth_record_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_auth_record";	}	 
	public function getRecord_id(){		return $this->_record_id ;	}	public function getAuth_code(){		return $this->_auth_code ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getEnd_time(){		return $this->_end_time ;	}	public function getAuth_status(){		return $this->_auth_status ;	}	public function getExt_data(){		return $this->_ext_data ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setRecord_id($value){		$this->_record_id = $value;	}	public function setAuth_code($value){		$this->_auth_code = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setEnd_time($value){		$this->_end_time = $value;	}	public function setAuth_status($value){		$this->_auth_status = $value;	}	public function setExt_data($value){		$this->_ext_data = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_auth_record(){		$data =  array();		if(!is_null($this->_record_id)){			$data['record_id']=$this->_record_id;		}		if(!is_null($this->_auth_code)){			$data['auth_code']=$this->_auth_code;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_end_time)){			$data['end_time']=$this->_end_time;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		if(!is_null($this->_ext_data)){			$data['ext_data']=$this->_ext_data;		}		return $this->_record_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_auth_record(){		$data =  array();		if(!is_null($this->_record_id)){			$data['record_id']=$this->_record_id;		}		if(!is_null($this->_auth_code)){			$data['auth_code']=$this->_auth_code;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_end_time)){			$data['end_time']=$this->_end_time;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		if(!is_null($this->_ext_data)){			$data['ext_data']=$this->_ext_data;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('record_id' => $this->_record_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_auth_record($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_auth_record(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_auth_record(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where record_id = $this->_record_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>