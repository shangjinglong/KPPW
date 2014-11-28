<?php
class Keke_witkey_resource_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_resource_id;	public $_resource_name;	public $_resource_url;	public $_submenu_id;	public $_listorder;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_resource_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_resource";	}	 
	public function getResource_id(){		return $this->_resource_id ;	}	public function getResource_name(){		return $this->_resource_name ;	}	public function getResource_url(){		return $this->_resource_url ;	}	public function getSubmenu_id(){		return $this->_submenu_id ;	}	public function getListorder(){		return $this->_listorder ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setResource_id($value){		$this->_resource_id = $value;	}	public function setResource_name($value){		$this->_resource_name = $value;	}	public function setResource_url($value){		$this->_resource_url = $value;	}	public function setSubmenu_id($value){		$this->_submenu_id = $value;	}	public function setListorder($value){		$this->_listorder = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_resource(){		$data =  array();		if(!is_null($this->_resource_id)){			$data['resource_id']=$this->_resource_id;		}		if(!is_null($this->_resource_name)){			$data['resource_name']=$this->_resource_name;		}		if(!is_null($this->_resource_url)){			$data['resource_url']=$this->_resource_url;		}		if(!is_null($this->_submenu_id)){			$data['submenu_id']=$this->_submenu_id;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		return $this->_resource_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_resource(){		$data =  array();		if(!is_null($this->_resource_id)){			$data['resource_id']=$this->_resource_id;		}		if(!is_null($this->_resource_name)){			$data['resource_name']=$this->_resource_name;		}		if(!is_null($this->_resource_url)){			$data['resource_url']=$this->_resource_url;		}		if(!is_null($this->_submenu_id)){			$data['submenu_id']=$this->_submenu_id;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('resource_id' => $this->_resource_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_resource($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_resource(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_resource(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where resource_id = $this->_resource_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>