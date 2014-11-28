<?php
class Keke_witkey_task_frost_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_frost_id;	public $_frost_status;	public $_task_id;	public $_frost_time;	public $_restore_time;	public $_admin_uid;	public $_admin_username;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_frost_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_frost";	}	 
	public function getFrost_id(){		return $this->_frost_id ;	}	public function getFrost_status(){		return $this->_frost_status ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getFrost_time(){		return $this->_frost_time ;	}	public function getRestore_time(){		return $this->_restore_time ;	}	public function getAdmin_uid(){		return $this->_admin_uid ;	}	public function getAdmin_username(){		return $this->_admin_username ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setFrost_id($value){		$this->_frost_id = $value;	}	public function setFrost_status($value){		$this->_frost_status = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setFrost_time($value){		$this->_frost_time = $value;	}	public function setRestore_time($value){		$this->_restore_time = $value;	}	public function setAdmin_uid($value){		$this->_admin_uid = $value;	}	public function setAdmin_username($value){		$this->_admin_username = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_frost(){		$data =  array();		if(!is_null($this->_frost_id)){			$data['frost_id']=$this->_frost_id;		}		if(!is_null($this->_frost_status)){			$data['frost_status']=$this->_frost_status;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_frost_time)){			$data['frost_time']=$this->_frost_time;		}		if(!is_null($this->_restore_time)){			$data['restore_time']=$this->_restore_time;		}		if(!is_null($this->_admin_uid)){			$data['admin_uid']=$this->_admin_uid;		}		if(!is_null($this->_admin_username)){			$data['admin_username']=$this->_admin_username;		}		return $this->_frost_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_frost(){		$data =  array();		if(!is_null($this->_frost_id)){			$data['frost_id']=$this->_frost_id;		}		if(!is_null($this->_frost_status)){			$data['frost_status']=$this->_frost_status;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_frost_time)){			$data['frost_time']=$this->_frost_time;		}		if(!is_null($this->_restore_time)){			$data['restore_time']=$this->_restore_time;		}		if(!is_null($this->_admin_uid)){			$data['admin_uid']=$this->_admin_uid;		}		if(!is_null($this->_admin_username)){			$data['admin_username']=$this->_admin_username;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('frost_id' => $this->_frost_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_frost($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_frost(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_frost(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where frost_id = $this->_frost_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>