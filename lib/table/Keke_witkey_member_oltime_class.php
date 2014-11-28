<?php
class Keke_witkey_member_oltime_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_oltime_id;	public $_uid;	public $_username;	public $_user_status;	public $_last_op_time;	public $_online_total_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_member_oltime_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_member_oltime";	}	 
	public function getOltime_id(){		return $this->_oltime_id ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getUser_status(){		return $this->_user_status ;	}	public function getLast_op_time(){		return $this->_last_op_time ;	}	public function getOnline_total_time(){		return $this->_online_total_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setOltime_id($value){		$this->_oltime_id = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setUser_status($value){		$this->_user_status = $value;	}	public function setLast_op_time($value){		$this->_last_op_time = $value;	}	public function setOnline_total_time($value){		$this->_online_total_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_member_oltime(){		$data =  array();		if(!is_null($this->_oltime_id)){			$data['oltime_id']=$this->_oltime_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_user_status)){			$data['user_status']=$this->_user_status;		}		if(!is_null($this->_last_op_time)){			$data['last_op_time']=$this->_last_op_time;		}		if(!is_null($this->_online_total_time)){			$data['online_total_time']=$this->_online_total_time;		}		return $this->_oltime_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_member_oltime(){		$data =  array();		if(!is_null($this->_oltime_id)){			$data['oltime_id']=$this->_oltime_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_user_status)){			$data['user_status']=$this->_user_status;		}		if(!is_null($this->_last_op_time)){			$data['last_op_time']=$this->_last_op_time;		}		if(!is_null($this->_online_total_time)){			$data['online_total_time']=$this->_online_total_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('oltime_id' => $this->_oltime_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_member_oltime($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_member_oltime(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_member_oltime(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where oltime_id = $this->_oltime_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>