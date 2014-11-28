<?php
class Keke_witkey_mark_rule_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_mark_rule_id;	public $_g_value;	public $_m_value;	public $_g_title;	public $_m_title;	public $_g_ico;	public $_m_ico;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_mark_rule_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_mark_rule";	}	 
	public function getMark_rule_id(){		return $this->_mark_rule_id ;	}	public function getG_value(){		return $this->_g_value ;	}	public function getM_value(){		return $this->_m_value ;	}	public function getG_title(){		return $this->_g_title ;	}	public function getM_title(){		return $this->_m_title ;	}	public function getG_ico(){		return $this->_g_ico ;	}	public function getM_ico(){		return $this->_m_ico ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setMark_rule_id($value){		$this->_mark_rule_id = $value;	}	public function setG_value($value){		$this->_g_value = $value;	}	public function setM_value($value){		$this->_m_value = $value;	}	public function setG_title($value){		$this->_g_title = $value;	}	public function setM_title($value){		$this->_m_title = $value;	}	public function setG_ico($value){		$this->_g_ico = $value;	}	public function setM_ico($value){		$this->_m_ico = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_mark_rule(){		$data =  array();		if(!is_null($this->_mark_rule_id)){			$data['mark_rule_id']=$this->_mark_rule_id;		}		if(!is_null($this->_g_value)){			$data['g_value']=$this->_g_value;		}		if(!is_null($this->_m_value)){			$data['m_value']=$this->_m_value;		}		if(!is_null($this->_g_title)){			$data['g_title']=$this->_g_title;		}		if(!is_null($this->_m_title)){			$data['m_title']=$this->_m_title;		}		if(!is_null($this->_g_ico)){			$data['g_ico']=$this->_g_ico;		}		if(!is_null($this->_m_ico)){			$data['m_ico']=$this->_m_ico;		}		return $this->_mark_rule_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_mark_rule(){		$data =  array();		if(!is_null($this->_mark_rule_id)){			$data['mark_rule_id']=$this->_mark_rule_id;		}		if(!is_null($this->_g_value)){			$data['g_value']=$this->_g_value;		}		if(!is_null($this->_m_value)){			$data['m_value']=$this->_m_value;		}		if(!is_null($this->_g_title)){			$data['g_title']=$this->_g_title;		}		if(!is_null($this->_m_title)){			$data['m_title']=$this->_m_title;		}		if(!is_null($this->_g_ico)){			$data['g_ico']=$this->_g_ico;		}		if(!is_null($this->_m_ico)){			$data['m_ico']=$this->_m_ico;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('mark_rule_id' => $this->_mark_rule_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_mark_rule($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_mark_rule(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_mark_rule(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where mark_rule_id = $this->_mark_rule_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>