<?php
class Keke_witkey_member_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_uid;	public $_username;	public $_password;	public $_rand_code;	public $_email;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_member_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_member";	}	 
	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getPassword(){		return $this->_password ;	}	public function getRand_code(){		return $this->_rand_code ;	}	public function getEmail(){		return $this->_email ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setPassword($value){		$this->_password = $value;	}	public function setRand_code($value){		$this->_rand_code = $value;	}	public function setEmail($value){		$this->_email = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_member(){		$data =  array();		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_password)){			$data['password']=$this->_password;		}		if(!is_null($this->_rand_code)){			$data['rand_code']=$this->_rand_code;		}		if(!is_null($this->_email)){			$data['email']=$this->_email;		}		return $this->_uid = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_member(){		$data =  array();		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_password)){			$data['password']=$this->_password;		}		if(!is_null($this->_rand_code)){			$data['rand_code']=$this->_rand_code;		}		if(!is_null($this->_email)){			$data['email']=$this->_email;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('uid' => $this->_uid);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_member($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_member(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_member(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where uid = $this->_uid ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>