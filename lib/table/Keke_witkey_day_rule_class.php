<?php
class Keke_witkey_day_rule_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_day_rule_id;	public $_rule_cash;	public $_rule_day;	public $_model_id;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_day_rule_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_day_rule";	}
	public function getDay_rule_id(){		return $this->_day_rule_id ;	}	public function getRule_cash(){		return $this->_rule_cash ;	}	public function getRule_day(){		return $this->_rule_day ;	}	public function getModel_id(){		return $this->_model_id ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setDay_rule_id($value){		$this->_day_rule_id = $value;	}	public function setRule_cash($value){		$this->_rule_cash = $value;	}	public function setRule_day($value){		$this->_rule_day = $value;	}	public function setModel_id($value){		$this->_model_id = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_day_rule(){		$data =  array();		if(!is_null($this->_day_rule_id)){			$data['day_rule_id']=$this->_day_rule_id;		}		if(!is_null($this->_rule_cash)){			$data['rule_cash']=$this->_rule_cash;		}		if(!is_null($this->_rule_day)){			$data['rule_day']=$this->_rule_day;		}		if(!is_null($this->_model_id)){			$data['model_id']=$this->_model_id;		}		return $this->_day_rule_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_day_rule(){		$data =  array();		if(!is_null($this->_day_rule_id)){			$data['day_rule_id']=$this->_day_rule_id;		}		if(!is_null($this->_rule_cash)){			$data['rule_cash']=$this->_rule_cash;		}		if(!is_null($this->_rule_day)){			$data['rule_day']=$this->_rule_day;		}		if(!is_null($this->_model_id)){			$data['model_id']=$this->_model_id;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('day_rule_id' => $this->_day_rule_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_day_rule($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_day_rule(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_day_rule(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where day_rule_id = $this->_day_rule_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>