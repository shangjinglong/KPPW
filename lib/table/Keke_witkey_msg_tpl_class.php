<?php
class Keke_witkey_msg_tpl_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_tpl_id;	public $_tpl_code;	public $_content;	public $_send_type;	public $_listorder;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_msg_tpl_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_msg_tpl";	}	 
	public function getTpl_id(){		return $this->_tpl_id ;	}	public function getTpl_code(){		return $this->_tpl_code ;	}	public function getContent(){		return $this->_content ;	}	public function getSend_type(){		return $this->_send_type ;	}	public function getListorder(){		return $this->_listorder ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setTpl_id($value){		$this->_tpl_id = $value;	}	public function setTpl_code($value){		$this->_tpl_code = $value;	}	public function setContent($value){		$this->_content = $value;	}	public function setSend_type($value){		$this->_send_type = $value;	}	public function setListorder($value){		$this->_listorder = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_msg_tpl(){		$data =  array();		if(!is_null($this->_tpl_id)){			$data['tpl_id']=$this->_tpl_id;		}		if(!is_null($this->_tpl_code)){			$data['tpl_code']=$this->_tpl_code;		}		if(!is_null($this->_content)){			$data['content']=$this->_content;		}		if(!is_null($this->_send_type)){			$data['send_type']=$this->_send_type;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		return $this->_tpl_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_msg_tpl(){		$data =  array();		if(!is_null($this->_tpl_id)){			$data['tpl_id']=$this->_tpl_id;		}		if(!is_null($this->_tpl_code)){			$data['tpl_code']=$this->_tpl_code;		}		if(!is_null($this->_content)){			$data['content']=$this->_content;		}		if(!is_null($this->_send_type)){			$data['send_type']=$this->_send_type;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('tpl_id' => $this->_tpl_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_msg_tpl($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_msg_tpl(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_msg_tpl(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where tpl_id = $this->_tpl_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>