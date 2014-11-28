<?php
class Keke_witkey_prom_cpc_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_cpc_id;	public $_ip;	public $_source;	public $_parent_uid;	public $_parent_username;	public $_cash;	public $_on_time;	public $_prom_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_prom_cpc_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_prom_cpc";	}	 
	public function getCpc_id(){		return $this->_cpc_id ;	}	public function getIp(){		return $this->_ip ;	}	public function getSource(){		return $this->_source ;	}	public function getParent_uid(){		return $this->_parent_uid ;	}	public function getParent_username(){		return $this->_parent_username ;	}	public function getCash(){		return $this->_cash ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getProm_type(){		return $this->_prom_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setCpc_id($value){		$this->_cpc_id = $value;	}	public function setIp($value){		$this->_ip = $value;	}	public function setSource($value){		$this->_source = $value;	}	public function setParent_uid($value){		$this->_parent_uid = $value;	}	public function setParent_username($value){		$this->_parent_username = $value;	}	public function setCash($value){		$this->_cash = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setProm_type($value){		$this->_prom_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_prom_cpc(){		$data =  array();		if(!is_null($this->_cpc_id)){			$data['cpc_id']=$this->_cpc_id;		}		if(!is_null($this->_ip)){			$data['ip']=$this->_ip;		}		if(!is_null($this->_source)){			$data['source']=$this->_source;		}		if(!is_null($this->_parent_uid)){			$data['parent_uid']=$this->_parent_uid;		}		if(!is_null($this->_parent_username)){			$data['parent_username']=$this->_parent_username;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		return $this->_cpc_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_prom_cpc(){		$data =  array();		if(!is_null($this->_cpc_id)){			$data['cpc_id']=$this->_cpc_id;		}		if(!is_null($this->_ip)){			$data['ip']=$this->_ip;		}		if(!is_null($this->_source)){			$data['source']=$this->_source;		}		if(!is_null($this->_parent_uid)){			$data['parent_uid']=$this->_parent_uid;		}		if(!is_null($this->_parent_username)){			$data['parent_username']=$this->_parent_username;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_prom_type)){			$data['prom_type']=$this->_prom_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('cpc_id' => $this->_cpc_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_prom_cpc($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_prom_cpc(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_prom_cpc(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where cpc_id = $this->_cpc_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>