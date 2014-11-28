<?php
class Keke_witkey_task_relation_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_relation_id;	public $_task_id;	public $_r_task_id;	public $_app_id;	public $_uid;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_relation_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_relation";	}	 
	public function getRelation_id(){		return $this->_relation_id ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getR_task_id(){		return $this->_r_task_id ;	}	public function getApp_id(){		return $this->_app_id ;	}	public function getUid(){		return $this->_uid ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setRelation_id($value){		$this->_relation_id = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setR_task_id($value){		$this->_r_task_id = $value;	}	public function setApp_id($value){		$this->_app_id = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_relation(){		$data =  array();		if(!is_null($this->_relation_id)){			$data['relation_id']=$this->_relation_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_r_task_id)){			$data['r_task_id']=$this->_r_task_id;		}		if(!is_null($this->_app_id)){			$data['app_id']=$this->_app_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		return $this->_relation_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_relation(){		$data =  array();		if(!is_null($this->_relation_id)){			$data['relation_id']=$this->_relation_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_r_task_id)){			$data['r_task_id']=$this->_r_task_id;		}		if(!is_null($this->_app_id)){			$data['app_id']=$this->_app_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('relation_id' => $this->_relation_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_relation($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_relation(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_relation(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where relation_id = $this->_relation_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>