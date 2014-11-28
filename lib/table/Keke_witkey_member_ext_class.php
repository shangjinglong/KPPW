<?php
class Keke_witkey_member_ext_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_ext_id;	public $_uid;	public $_k;	public $_v1;	public $_v2;	public $_v3;	public $_v4;	public $_v5;	public $_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_member_ext_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_member_ext";	}	 
	public function getExt_id(){		return $this->_ext_id ;	}	public function getUid(){		return $this->_uid ;	}	public function getK(){		return $this->_k ;	}	public function getV1(){		return $this->_v1 ;	}	public function getV2(){		return $this->_v2 ;	}	public function getV3(){		return $this->_v3 ;	}	public function getV4(){		return $this->_v4 ;	}	public function getV5(){		return $this->_v5 ;	}	public function getType(){		return $this->_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setExt_id($value){		$this->_ext_id = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setK($value){		$this->_k = $value;	}	public function setV1($value){		$this->_v1 = $value;	}	public function setV2($value){		$this->_v2 = $value;	}	public function setV3($value){		$this->_v3 = $value;	}	public function setV4($value){		$this->_v4 = $value;	}	public function setV5($value){		$this->_v5 = $value;	}	public function setType($value){		$this->_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_member_ext(){		$data =  array();		if(!is_null($this->_ext_id)){			$data['ext_id']=$this->_ext_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_k)){			$data['k']=$this->_k;		}		if(!is_null($this->_v1)){			$data['v1']=$this->_v1;		}		if(!is_null($this->_v2)){			$data['v2']=$this->_v2;		}		if(!is_null($this->_v3)){			$data['v3']=$this->_v3;		}		if(!is_null($this->_v4)){			$data['v4']=$this->_v4;		}		if(!is_null($this->_v5)){			$data['v5']=$this->_v5;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		return $this->_ext_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_member_ext(){		$data =  array();		if(!is_null($this->_ext_id)){			$data['ext_id']=$this->_ext_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_k)){			$data['k']=$this->_k;		}		if(!is_null($this->_v1)){			$data['v1']=$this->_v1;		}		if(!is_null($this->_v2)){			$data['v2']=$this->_v2;		}		if(!is_null($this->_v3)){			$data['v3']=$this->_v3;		}		if(!is_null($this->_v4)){			$data['v4']=$this->_v4;		}		if(!is_null($this->_v5)){			$data['v5']=$this->_v5;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('ext_id' => $this->_ext_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_member_ext($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_member_ext(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_member_ext(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where ext_id = $this->_ext_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>