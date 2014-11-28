<?php
class Keke_witkey_priv_item_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_op_id;	public $_model_id;	public $_op_code;	public $_op_name;	public $_allow_times;	public $_limit_obj;	public $_condit;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_priv_item_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_priv_item";	}	 
	public function getOp_id(){		return $this->_op_id ;	}	public function getModel_id(){		return $this->_model_id ;	}	public function getOp_code(){		return $this->_op_code ;	}	public function getOp_name(){		return $this->_op_name ;	}	public function getAllow_times(){		return $this->_allow_times ;	}	public function getLimit_obj(){		return $this->_limit_obj ;	}	public function getCondit(){		return $this->_condit ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setOp_id($value){		$this->_op_id = $value;	}	public function setModel_id($value){		$this->_model_id = $value;	}	public function setOp_code($value){		$this->_op_code = $value;	}	public function setOp_name($value){		$this->_op_name = $value;	}	public function setAllow_times($value){		$this->_allow_times = $value;	}	public function setLimit_obj($value){		$this->_limit_obj = $value;	}	public function setCondit($value){		$this->_condit = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_priv_item(){		$data =  array();		if(!is_null($this->_op_id)){			$data['op_id']=$this->_op_id;		}		if(!is_null($this->_model_id)){			$data['model_id']=$this->_model_id;		}		if(!is_null($this->_op_code)){			$data['op_code']=$this->_op_code;		}		if(!is_null($this->_op_name)){			$data['op_name']=$this->_op_name;		}		if(!is_null($this->_allow_times)){			$data['allow_times']=$this->_allow_times;		}		if(!is_null($this->_limit_obj)){			$data['limit_obj']=$this->_limit_obj;		}		if(!is_null($this->_condit)){			$data['condit']=$this->_condit;		}		return $this->_op_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_priv_item(){		$data =  array();		if(!is_null($this->_op_id)){			$data['op_id']=$this->_op_id;		}		if(!is_null($this->_model_id)){			$data['model_id']=$this->_model_id;		}		if(!is_null($this->_op_code)){			$data['op_code']=$this->_op_code;		}		if(!is_null($this->_op_name)){			$data['op_name']=$this->_op_name;		}		if(!is_null($this->_allow_times)){			$data['allow_times']=$this->_allow_times;		}		if(!is_null($this->_limit_obj)){			$data['limit_obj']=$this->_limit_obj;		}		if(!is_null($this->_condit)){			$data['condit']=$this->_condit;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('op_id' => $this->_op_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_priv_item($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_priv_item(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_priv_item(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where op_id = $this->_op_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>