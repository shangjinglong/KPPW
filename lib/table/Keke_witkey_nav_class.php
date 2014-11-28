<?php
class Keke_witkey_nav_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_nav_id;	public $_nav_url;	public $_nav_title;	public $_nav_style;	public $_listorder;	public $_newwindow;	public $_ishide;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_nav_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_nav";	}	 
	public function getNav_id(){		return $this->_nav_id ;	}	public function getNav_url(){		return $this->_nav_url ;	}	public function getNav_title(){		return $this->_nav_title ;	}	public function getNav_style(){		return $this->_nav_style ;	}	public function getListorder(){		return $this->_listorder ;	}	public function getNewwindow(){		return $this->_newwindow ;	}	public function getIshide(){		return $this->_ishide ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setNav_id($value){		$this->_nav_id = $value;	}	public function setNav_url($value){		$this->_nav_url = $value;	}	public function setNav_title($value){		$this->_nav_title = $value;	}	public function setNav_style($value){		$this->_nav_style = $value;	}	public function setListorder($value){		$this->_listorder = $value;	}	public function setNewwindow($value){		$this->_newwindow = $value;	}	public function setIshide($value){		$this->_ishide = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_nav(){		$data =  array();		if(!is_null($this->_nav_id)){			$data['nav_id']=$this->_nav_id;		}		if(!is_null($this->_nav_url)){			$data['nav_url']=$this->_nav_url;		}		if(!is_null($this->_nav_title)){			$data['nav_title']=$this->_nav_title;		}		if(!is_null($this->_nav_style)){			$data['nav_style']=$this->_nav_style;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_newwindow)){			$data['newwindow']=$this->_newwindow;		}		if(!is_null($this->_ishide)){			$data['ishide']=$this->_ishide;		}		return $this->_nav_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_nav(){		$data =  array();		if(!is_null($this->_nav_id)){			$data['nav_id']=$this->_nav_id;		}		if(!is_null($this->_nav_url)){			$data['nav_url']=$this->_nav_url;		}		if(!is_null($this->_nav_title)){			$data['nav_title']=$this->_nav_title;		}		if(!is_null($this->_nav_style)){			$data['nav_style']=$this->_nav_style;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_newwindow)){			$data['newwindow']=$this->_newwindow;		}		if(!is_null($this->_ishide)){			$data['ishide']=$this->_ishide;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('nav_id' => $this->_nav_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_nav($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_nav(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_nav(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where nav_id = $this->_nav_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>