<?php
class Keke_witkey_shop_cate_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_cate_id;	public $_type;	public $_shop_id;	public $_cate_name;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_shop_cate_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_shop_cate";	}	 
	public function getCate_id(){		return $this->_cate_id ;	}	public function getType(){		return $this->_type ;	}	public function getShop_id(){		return $this->_shop_id ;	}	public function getCate_name(){		return $this->_cate_name ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setCate_id($value){		$this->_cate_id = $value;	}	public function setType($value){		$this->_type = $value;	}	public function setShop_id($value){		$this->_shop_id = $value;	}	public function setCate_name($value){		$this->_cate_name = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_shop_cate(){		$data =  array();		if(!is_null($this->_cate_id)){			$data['cate_id']=$this->_cate_id;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		if(!is_null($this->_shop_id)){			$data['shop_id']=$this->_shop_id;		}		if(!is_null($this->_cate_name)){			$data['cate_name']=$this->_cate_name;		}		return $this->_cate_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_shop_cate(){		$data =  array();		if(!is_null($this->_cate_id)){			$data['cate_id']=$this->_cate_id;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		if(!is_null($this->_shop_id)){			$data['shop_id']=$this->_shop_id;		}		if(!is_null($this->_cate_name)){			$data['cate_name']=$this->_cate_name;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('cate_id' => $this->_cate_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_shop_cate($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_shop_cate(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_shop_cate(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where cate_id = $this->_cate_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>