<?php
class Keke_witkey_member_group_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_group_id;	public $_groupname;	public $_group_roles;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_member_group_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_member_group";	}
	public function getGroup_id(){		return $this->_group_id ;	}	public function getGroupname(){		return $this->_groupname ;	}	public function getGroup_roles(){		return $this->_group_roles ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setGroup_id($value){		$this->_group_id = $value;	}	public function setGroupname($value){		$this->_groupname = $value;	}	public function setGroup_roles($value){		$this->_group_roles = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_member_group(){		$data =  array();		if(!is_null($this->_group_id)){			$data['group_id']=$this->_group_id;		}		if(!is_null($this->_groupname)){			$data['groupname']=$this->_groupname;		}		if(!is_null($this->_group_roles)){			$data['group_roles']=$this->_group_roles;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_group_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_member_group(){		$data =  array();		if(!is_null($this->_group_id)){			$data['group_id']=$this->_group_id;		}		if(!is_null($this->_groupname)){			$data['groupname']=$this->_groupname;		}		if(!is_null($this->_group_roles)){			$data['group_roles']=$this->_group_roles;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('group_id' => $this->_group_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_member_group($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_member_group(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_member_group(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where group_id = $this->_group_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>