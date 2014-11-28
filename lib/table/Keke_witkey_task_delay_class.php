<?php
class Keke_witkey_task_delay_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_delay_id;	public $_task_id;	public $_delay_cash;	public $_delay_day;	public $_uid;	public $_on_time;	public $_delay_status;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_delay_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_delay";	}	 
	public function getDelay_id(){		return $this->_delay_id ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getDelay_cash(){		return $this->_delay_cash ;	}	public function getDelay_day(){		return $this->_delay_day ;	}	public function getUid(){		return $this->_uid ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getDelay_status(){		return $this->_delay_status ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setDelay_id($value){		$this->_delay_id = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setDelay_cash($value){		$this->_delay_cash = $value;	}	public function setDelay_day($value){		$this->_delay_day = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setDelay_status($value){		$this->_delay_status = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_delay(){		$data =  array();		if(!is_null($this->_delay_id)){			$data['delay_id']=$this->_delay_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_delay_cash)){			$data['delay_cash']=$this->_delay_cash;		}		if(!is_null($this->_delay_day)){			$data['delay_day']=$this->_delay_day;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_delay_status)){			$data['delay_status']=$this->_delay_status;		}		return $this->_delay_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_delay(){		$data =  array();		if(!is_null($this->_delay_id)){			$data['delay_id']=$this->_delay_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_delay_cash)){			$data['delay_cash']=$this->_delay_cash;		}		if(!is_null($this->_delay_day)){			$data['delay_day']=$this->_delay_day;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_delay_status)){			$data['delay_status']=$this->_delay_status;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('delay_id' => $this->_delay_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_delay($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_delay(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_delay(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where delay_id = $this->_delay_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>