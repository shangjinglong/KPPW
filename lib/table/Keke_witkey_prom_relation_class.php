<?php
class Keke_witkey_prom_relation_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_relation_id;	public $_prom_type;	public $_uid;	public $_username;	public $_prom_uid;	public $_prom_username;	public $_relation_status;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_prom_relation_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_prom_relation";	}	 
	public function getRelation_id(){		return $this->_relation_id ;	}	public function getProm_type(){		return $this->_prom_type ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getProm_uid(){		return $this->_prom_uid ;	}	public function getProm_username(){		return $this->_prom_username ;	}	public function getRelation_status(){		return $this->_relation_status ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setRelation_id($value){		$this->_relation_id = $value;	}	public function setProm_type($value){		$this->_prom_type = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setProm_uid($value){		$this->_prom_uid = $value;	}	public function setProm_username($value){		$this->_prom_username = $value;	}	public function setRelation_status($value){		$this->_relation_status = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_prom_relation(){		$data =  array();		if(!is_null($this->_relation_id)){			$data['relation_id']=$this->_relation_id;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_prom_uid)){			$data['prom_uid']=$this->_prom_uid;		}		if(!is_null($this->_prom_username)){			$data['prom_username']=$this->_prom_username;		}		if(!is_null($this->_relation_status)){			$data['relation_status']=$this->_relation_status;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_relation_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_prom_relation(){		$data =  array();		if(!is_null($this->_relation_id)){			$data['relation_id']=$this->_relation_id;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_prom_uid)){			$data['prom_uid']=$this->_prom_uid;		}		if(!is_null($this->_prom_username)){			$data['prom_username']=$this->_prom_username;		}		if(!is_null($this->_relation_status)){			$data['relation_status']=$this->_relation_status;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('relation_id' => $this->_relation_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_prom_relation($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_prom_relation(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_prom_relation(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where relation_id = $this->_relation_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>