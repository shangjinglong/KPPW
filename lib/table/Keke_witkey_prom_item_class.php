<?php
class Keke_witkey_prom_item_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_item_id;	public $_item_type;	public $_prom_type;	public $_obj_id;	public $_item_name;	public $_item_pic;	public $_item_content;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_prom_item_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_prom_item";	}	 
	public function getItem_id(){		return $this->_item_id ;	}	public function getItem_type(){		return $this->_item_type ;	}	public function getProm_type(){		return $this->_prom_type ;	}	public function getObj_id(){		return $this->_obj_id ;	}	public function getItem_name(){		return $this->_item_name ;	}	public function getItem_pic(){		return $this->_item_pic ;	}	public function getItem_content(){		return $this->_item_content ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setItem_id($value){		$this->_item_id = $value;	}	public function setItem_type($value){		$this->_item_type = $value;	}	public function setProm_type($value){		$this->_prom_type = $value;	}	public function setObj_id($value){		$this->_obj_id = $value;	}	public function setItem_name($value){		$this->_item_name = $value;	}	public function setItem_pic($value){		$this->_item_pic = $value;	}	public function setItem_content($value){		$this->_item_content = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_prom_item(){		$data =  array();		if(!is_null($this->_item_id)){			$data['item_id']=$this->_item_id;		}		if(!is_null($this->_item_type)){			$data['item_type']=$this->_item_type;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_item_name)){			$data['item_name']=$this->_item_name;		}		if(!is_null($this->_item_pic)){			$data['item_pic']=$this->_item_pic;		}		if(!is_null($this->_item_content)){			$data['item_content']=$this->_item_content;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_item_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_prom_item(){		$data =  array();		if(!is_null($this->_item_id)){			$data['item_id']=$this->_item_id;		}		if(!is_null($this->_item_type)){			$data['item_type']=$this->_item_type;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_item_name)){			$data['item_name']=$this->_item_name;		}		if(!is_null($this->_item_pic)){			$data['item_pic']=$this->_item_pic;		}		if(!is_null($this->_item_content)){			$data['item_content']=$this->_item_content;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('item_id' => $this->_item_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_prom_item($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_prom_item(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_prom_item(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where item_id = $this->_item_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>