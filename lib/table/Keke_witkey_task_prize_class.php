<?php
class Keke_witkey_task_prize_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_prize_id;	public $_task_id;	public $_prize;	public $_prize_count;	public $_prize_cash;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_prize_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_prize";	}
	public function getPrize_id(){		return $this->_prize_id ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getPrize(){		return $this->_prize ;	}	public function getPrize_count(){		return $this->_prize_count ;	}	public function getPrize_cash(){		return $this->_prize_cash ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setPrize_id($value){		$this->_prize_id = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setPrize($value){		$this->_prize = $value;	}	public function setPrize_count($value){		$this->_prize_count = $value;	}	public function setPrize_cash($value){		$this->_prize_cash = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_prize(){		$data =  array();		if(!is_null($this->_prize_id)){			$data['prize_id']=$this->_prize_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_prize)){			$data['prize']=$this->_prize;		}		if(!is_null($this->_prize_count)){			$data['prize_count']=$this->_prize_count;		}		if(!is_null($this->_prize_cash)){			$data['prize_cash']=$this->_prize_cash;		}		return $this->_prize_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_prize(){		$data =  array();		if(!is_null($this->_prize_id)){			$data['prize_id']=$this->_prize_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_prize)){			$data['prize']=$this->_prize;		}		if(!is_null($this->_prize_count)){			$data['prize_count']=$this->_prize_count;		}		if(!is_null($this->_prize_cash)){			$data['prize_cash']=$this->_prize_cash;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('prize_id' => $this->_prize_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_prize($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_prize(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_prize(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where prize_id = $this->_prize_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>