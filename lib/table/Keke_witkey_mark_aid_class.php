<?php
class Keke_witkey_mark_aid_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_aid;	public $_aid_name;	public $_aid_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_mark_aid_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_mark_aid";	}	 
	public function getAid(){		return $this->_aid ;	}	public function getAid_name(){		return $this->_aid_name ;	}	public function getAid_type(){		return $this->_aid_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setAid($value){		$this->_aid = $value;	}	public function setAid_name($value){		$this->_aid_name = $value;	}	public function setAid_type($value){		$this->_aid_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_mark_aid(){		$data =  array();		if(!is_null($this->_aid)){			$data['aid']=$this->_aid;		}		if(!is_null($this->_aid_name)){			$data['aid_name']=$this->_aid_name;		}		if(!is_null($this->_aid_type)){			$data['aid_type']=$this->_aid_type;		}		return $this->_aid = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_mark_aid(){		$data =  array();		if(!is_null($this->_aid)){			$data['aid']=$this->_aid;		}		if(!is_null($this->_aid_name)){			$data['aid_name']=$this->_aid_name;		}		if(!is_null($this->_aid_type)){			$data['aid_type']=$this->_aid_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('aid' => $this->_aid);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_mark_aid($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_mark_aid(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_mark_aid(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where aid = $this->_aid ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>