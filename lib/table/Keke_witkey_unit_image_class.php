<?php
class Keke_witkey_unit_image_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_unit_id;	public $_unit_name;	public $_unit_pic;	public $_unit_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_unit_image_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_unit_image";	}	 
	public function getUnit_id(){		return $this->_unit_id ;	}	public function getUnit_name(){		return $this->_unit_name ;	}	public function getUnit_pic(){		return $this->_unit_pic ;	}	public function getUnit_type(){		return $this->_unit_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setUnit_id($value){		$this->_unit_id = $value;	}	public function setUnit_name($value){		$this->_unit_name = $value;	}	public function setUnit_pic($value){		$this->_unit_pic = $value;	}	public function setUnit_type($value){		$this->_unit_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_unit_image(){		$data =  array();		if(!is_null($this->_unit_id)){			$data['unit_id']=$this->_unit_id;		}		if(!is_null($this->_unit_name)){			$data['unit_name']=$this->_unit_name;		}		if(!is_null($this->_unit_pic)){			$data['unit_pic']=$this->_unit_pic;		}		if(!is_null($this->_unit_type)){			$data['unit_type']=$this->_unit_type;		}		return $this->_unit_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_unit_image(){		$data =  array();		if(!is_null($this->_unit_id)){			$data['unit_id']=$this->_unit_id;		}		if(!is_null($this->_unit_name)){			$data['unit_name']=$this->_unit_name;		}		if(!is_null($this->_unit_pic)){			$data['unit_pic']=$this->_unit_pic;		}		if(!is_null($this->_unit_type)){			$data['unit_type']=$this->_unit_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('unit_id' => $this->_unit_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_unit_image($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_unit_image(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_unit_image(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where unit_id = $this->_unit_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>