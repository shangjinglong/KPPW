<?php
class Keke_witkey_member_oauth_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_id;	public $_source;	public $_account;	public $_uid;	public $_username;	public $_on_time;	public $_oauth_id;
	public $_bind_key;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_member_oauth_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_member_oauth";	}
	public function getId(){		return $this->_id ;	}	public function getSource(){		return $this->_source ;	}	public function getAccount(){		return $this->_account ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getOauth_id(){		return $this->_oauth_id ;	}
	public function getBind_key(){
		return $this->_bind_key ;
	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setId($value){		$this->_id = $value;	}	public function setSource($value){		$this->_source = $value;	}	public function setAccount($value){		$this->_account = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setOauth_id($value){		$this->_oauth_id = $value;	}
	public function setBind_key($value){
		$this->_bind_key = $value;
	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_member_oauth(){		$data =  array();		if(!is_null($this->_id)){			$data['id']=$this->_id;		}		if(!is_null($this->_source)){			$data['source']=$this->_source;		}		if(!is_null($this->_account)){			$data['account']=$this->_account;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_oauth_id)){			$data['oauth_id']=$this->_oauth_id;		}
		if(!is_null($this->_bind_key)){
			$data['bind_key']=$this->_bind_key;
		}		return $this->_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_member_oauth(){		$data =  array();		if(!is_null($this->_id)){			$data['id']=$this->_id;		}		if(!is_null($this->_source)){			$data['source']=$this->_source;		}		if(!is_null($this->_account)){			$data['account']=$this->_account;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_oauth_id)){			$data['oauth_id']=$this->_oauth_id;		}
		if(!is_null($this->_bind_key)){
			$data['bind_key']=$this->_bind_key;
		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('id' => $this->_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_member_oauth($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_member_oauth(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_member_oauth(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where id = $this->_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>