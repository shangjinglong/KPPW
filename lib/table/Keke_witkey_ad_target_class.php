<?php
class Keke_witkey_ad_target_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_target_id;	public $_name;	public $_code;	public $_description;	public $_targets;	public $_position;	public $_ad_size;	public $_ad_num;	public $_sample_pic;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_ad_target_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_ad_target";	}
	public function getTarget_id(){		return $this->_target_id ;	}	public function getName(){		return $this->_name ;	}	public function getCode(){		return $this->_code ;	}	public function getDescription(){		return $this->_description ;	}	public function getTargets(){		return $this->_targets ;	}	public function getPosition(){		return $this->_position ;	}	public function getAd_size(){		return $this->_ad_size ;	}	public function getAd_num(){		return $this->_ad_num ;	}	public function getSample_pic(){		return $this->_sample_pic ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setTarget_id($value){		$this->_target_id = $value;	}	public function setName($value){		$this->_name = $value;	}	public function setCode($value){		$this->_code = $value;	}	public function setDescription($value){		$this->_description = $value;	}	public function setTargets($value){		$this->_targets = $value;	}	public function setPosition($value){		$this->_position = $value;	}	public function setAd_size($value){		$this->_ad_size = $value;	}	public function setAd_num($value){		$this->_ad_num = $value;	}	public function setSample_pic($value){		$this->_sample_pic = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_ad_target(){		$data =  array();		if(!is_null($this->_target_id)){			$data['target_id']=$this->_target_id;		}		if(!is_null($this->_name)){			$data['name']=$this->_name;		}		if(!is_null($this->_code)){			$data['code']=$this->_code;		}		if(!is_null($this->_description)){			$data['description']=$this->_description;		}		if(!is_null($this->_targets)){			$data['targets']=$this->_targets;		}		if(!is_null($this->_position)){			$data['position']=$this->_position;		}		if(!is_null($this->_ad_size)){			$data['ad_size']=$this->_ad_size;		}		if(!is_null($this->_ad_num)){			$data['ad_num']=$this->_ad_num;		}		if(!is_null($this->_sample_pic)){			$data['sample_pic']=$this->_sample_pic;		}		return $this->_target_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_ad_target(){		$data =  array();		if(!is_null($this->_target_id)){			$data['target_id']=$this->_target_id;		}		if(!is_null($this->_name)){			$data['name']=$this->_name;		}		if(!is_null($this->_code)){			$data['code']=$this->_code;		}		if(!is_null($this->_description)){			$data['description']=$this->_description;		}		if(!is_null($this->_targets)){			$data['targets']=$this->_targets;		}		if(!is_null($this->_position)){			$data['position']=$this->_position;		}		if(!is_null($this->_ad_size)){			$data['ad_size']=$this->_ad_size;		}		if(!is_null($this->_ad_num)){			$data['ad_num']=$this->_ad_num;		}		if(!is_null($this->_sample_pic)){			$data['sample_pic']=$this->_sample_pic;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('target_id' => $this->_target_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_ad_target($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_ad_target(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_ad_target(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where target_id = $this->_target_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>