<?php
class Keke_witkey_msg_config_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_config_id;	public $_k;	public $_obj;	public $_desc;	public $_v;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_msg_config_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_msg_config";	}	 
	public function getConfig_id(){		return $this->_config_id ;	}	public function getK(){		return $this->_k ;	}	public function getObj(){		return $this->_obj ;	}	public function getDesc(){		return $this->_desc ;	}	public function getV(){		return $this->_v ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setConfig_id($value){		$this->_config_id = $value;	}	public function setK($value){		$this->_k = $value;	}	public function setObj($value){		$this->_obj = $value;	}	public function setDesc($value){		$this->_desc = $value;	}	public function setV($value){		$this->_v = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_msg_config(){		$data =  array();		if(!is_null($this->_config_id)){			$data['config_id']=$this->_config_id;		}		if(!is_null($this->_k)){			$data['k']=$this->_k;		}		if(!is_null($this->_obj)){			$data['obj']=$this->_obj;		}		if(!is_null($this->_desc)){			$data['desc']=$this->_desc;		}		if(!is_null($this->_v)){			$data['v']=$this->_v;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_config_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_msg_config(){		$data =  array();		if(!is_null($this->_config_id)){			$data['config_id']=$this->_config_id;		}		if(!is_null($this->_k)){			$data['k']=$this->_k;		}		if(!is_null($this->_obj)){			$data['obj']=$this->_obj;		}		if(!is_null($this->_desc)){			$data['desc']=$this->_desc;		}		if(!is_null($this->_v)){			$data['v']=$this->_v;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('config_id' => $this->_config_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_msg_config($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_msg_config(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_msg_config(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where config_id = $this->_config_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>