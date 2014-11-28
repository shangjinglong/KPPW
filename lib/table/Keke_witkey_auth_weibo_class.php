<?php
class Keke_witkey_auth_weibo_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_weibo_id;	public $_uid;	public $_weibo_type;	public $_account;	public $_auth_status;	public $_account_data;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_auth_weibo_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_auth_weibo";	}	 
	public function getWeibo_id(){		return $this->_weibo_id ;	}	public function getUid(){		return $this->_uid ;	}	public function getWeibo_type(){		return $this->_weibo_type ;	}	public function getAccount(){		return $this->_account ;	}	public function getAuth_status(){		return $this->_auth_status ;	}	public function getAccount_data(){		return $this->_account_data ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setWeibo_id($value){		$this->_weibo_id = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setWeibo_type($value){		$this->_weibo_type = $value;	}	public function setAccount($value){		$this->_account = $value;	}	public function setAuth_status($value){		$this->_auth_status = $value;	}	public function setAccount_data($value){		$this->_account_data = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_auth_weibo(){		$data =  array();		if(!is_null($this->_weibo_id)){			$data['weibo_id']=$this->_weibo_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_weibo_type)){			$data['weibo_type']=$this->_weibo_type;		}		if(!is_null($this->_account)){			$data['account']=$this->_account;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		if(!is_null($this->_account_data)){			$data['account_data']=$this->_account_data;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_weibo_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_auth_weibo(){		$data =  array();		if(!is_null($this->_weibo_id)){			$data['weibo_id']=$this->_weibo_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_weibo_type)){			$data['weibo_type']=$this->_weibo_type;		}		if(!is_null($this->_account)){			$data['account']=$this->_account;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		if(!is_null($this->_account_data)){			$data['account_data']=$this->_account_data;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('weibo_id' => $this->_weibo_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_auth_weibo($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_auth_weibo(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_auth_weibo(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where weibo_id = $this->_weibo_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>