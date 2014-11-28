<?php
class Keke_witkey_mark_config_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_mark_config_id;	public $_obj;	public $_good;	public $_normal;	public $_bad;	public $_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_mark_config_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_mark_config";	}	 
	public function getMark_config_id(){		return $this->_mark_config_id ;	}	public function getObj(){		return $this->_obj ;	}	public function getGood(){		return $this->_good ;	}	public function getNormal(){		return $this->_normal ;	}	public function getBad(){		return $this->_bad ;	}	public function getType(){		return $this->_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setMark_config_id($value){		$this->_mark_config_id = $value;	}	public function setObj($value){		$this->_obj = $value;	}	public function setGood($value){		$this->_good = $value;	}	public function setNormal($value){		$this->_normal = $value;	}	public function setBad($value){		$this->_bad = $value;	}	public function setType($value){		$this->_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_mark_config(){		$data =  array();		if(!is_null($this->_mark_config_id)){			$data['mark_config_id']=$this->_mark_config_id;		}		if(!is_null($this->_obj)){			$data['obj']=$this->_obj;		}		if(!is_null($this->_good)){			$data['good']=$this->_good;		}		if(!is_null($this->_normal)){			$data['normal']=$this->_normal;		}		if(!is_null($this->_bad)){			$data['bad']=$this->_bad;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		return $this->_mark_config_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_mark_config(){		$data =  array();		if(!is_null($this->_mark_config_id)){			$data['mark_config_id']=$this->_mark_config_id;		}		if(!is_null($this->_obj)){			$data['obj']=$this->_obj;		}		if(!is_null($this->_good)){			$data['good']=$this->_good;		}		if(!is_null($this->_normal)){			$data['normal']=$this->_normal;		}		if(!is_null($this->_bad)){			$data['bad']=$this->_bad;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('mark_config_id' => $this->_mark_config_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_mark_config($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_mark_config(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_mark_config(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where mark_config_id = $this->_mark_config_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>