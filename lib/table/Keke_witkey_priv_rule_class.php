<?php
class Keke_witkey_priv_rule_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_r_id;	public $_item_id;	public $_mark_rule_id;	public $_rule;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_priv_rule_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_priv_rule";	}	 
	public function getR_id(){		return $this->_r_id ;	}	public function getItem_id(){		return $this->_item_id ;	}	public function getMark_rule_id(){		return $this->_mark_rule_id ;	}	public function getRule(){		return $this->_rule ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setR_id($value){		$this->_r_id = $value;	}	public function setItem_id($value){		$this->_item_id = $value;	}	public function setMark_rule_id($value){		$this->_mark_rule_id = $value;	}	public function setRule($value){		$this->_rule = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_priv_rule(){		$data =  array();		if(!is_null($this->_r_id)){			$data['r_id']=$this->_r_id;		}		if(!is_null($this->_item_id)){			$data['item_id']=$this->_item_id;		}		if(!is_null($this->_mark_rule_id)){			$data['mark_rule_id']=$this->_mark_rule_id;		}		if(!is_null($this->_rule)){			$data['rule']=$this->_rule;		}		return $this->_r_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_priv_rule(){		$data =  array();		if(!is_null($this->_r_id)){			$data['r_id']=$this->_r_id;		}		if(!is_null($this->_item_id)){			$data['item_id']=$this->_item_id;		}		if(!is_null($this->_mark_rule_id)){			$data['mark_rule_id']=$this->_mark_rule_id;		}		if(!is_null($this->_rule)){			$data['rule']=$this->_rule;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('r_id' => $this->_r_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_priv_rule($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_priv_rule(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_priv_rule(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where r_id = $this->_r_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>