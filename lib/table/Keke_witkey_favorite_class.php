<?php
class Keke_witkey_favorite_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_f_id;	public $_keep_type;	public $_obj_type;	public $_origin_id;	public $_obj_id;	public $_obj_name;	public $_uid;	public $_username;	public $_on_date;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_favorite_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_favorite";	}	 
	public function getF_id(){		return $this->_f_id ;	}	public function getKeep_type(){		return $this->_keep_type ;	}	public function getObj_type(){		return $this->_obj_type ;	}	public function getOrigin_id(){		return $this->_origin_id ;	}	public function getObj_id(){		return $this->_obj_id ;	}	public function getObj_name(){		return $this->_obj_name ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getOn_date(){		return $this->_on_date ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setF_id($value){		$this->_f_id = $value;	}	public function setKeep_type($value){		$this->_keep_type = $value;	}	public function setObj_type($value){		$this->_obj_type = $value;	}	public function setOrigin_id($value){		$this->_origin_id = $value;	}	public function setObj_id($value){		$this->_obj_id = $value;	}	public function setObj_name($value){		$this->_obj_name = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setOn_date($value){		$this->_on_date = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_favorite(){		$data =  array();		if(!is_null($this->_f_id)){			$data['f_id']=$this->_f_id;		}		if(!is_null($this->_keep_type)){			$data['keep_type']=$this->_keep_type;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_origin_id)){			$data['origin_id']=$this->_origin_id;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_obj_name)){			$data['obj_name']=$this->_obj_name;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_on_date)){			$data['on_date']=$this->_on_date;		}		return $this->_f_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_favorite(){		$data =  array();		if(!is_null($this->_f_id)){			$data['f_id']=$this->_f_id;		}		if(!is_null($this->_keep_type)){			$data['keep_type']=$this->_keep_type;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_origin_id)){			$data['origin_id']=$this->_origin_id;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_obj_name)){			$data['obj_name']=$this->_obj_name;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_on_date)){			$data['on_date']=$this->_on_date;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('f_id' => $this->_f_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_favorite($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_favorite(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_favorite(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where f_id = $this->_f_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>