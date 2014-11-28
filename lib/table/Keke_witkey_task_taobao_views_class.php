<?php
class Keke_witkey_task_taobao_views_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_view_id;	public $_task_id;	public $_work_id;	public $_tbwk_id;	public $_refer_url;	public $_user_ip;	public $_user_agent;	public $_click_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_taobao_views_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_taobao_views";	}	 
	public function getView_id(){		return $this->_view_id ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getWork_id(){		return $this->_work_id ;	}	public function getTbwk_id(){		return $this->_tbwk_id ;	}	public function getRefer_url(){		return $this->_refer_url ;	}	public function getUser_ip(){		return $this->_user_ip ;	}	public function getUser_agent(){		return $this->_user_agent ;	}	public function getClick_time(){		return $this->_click_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setView_id($value){		$this->_view_id = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setWork_id($value){		$this->_work_id = $value;	}	public function setTbwk_id($value){		$this->_tbwk_id = $value;	}	public function setRefer_url($value){		$this->_refer_url = $value;	}	public function setUser_ip($value){		$this->_user_ip = $value;	}	public function setUser_agent($value){		$this->_user_agent = $value;	}	public function setClick_time($value){		$this->_click_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_taobao_views(){		$data =  array();		if(!is_null($this->_view_id)){			$data['view_id']=$this->_view_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_work_id)){			$data['work_id']=$this->_work_id;		}		if(!is_null($this->_tbwk_id)){			$data['tbwk_id']=$this->_tbwk_id;		}		if(!is_null($this->_refer_url)){			$data['refer_url']=$this->_refer_url;		}		if(!is_null($this->_user_ip)){			$data['user_ip']=$this->_user_ip;		}		if(!is_null($this->_user_agent)){			$data['user_agent']=$this->_user_agent;		}		if(!is_null($this->_click_time)){			$data['click_time']=$this->_click_time;		}		return $this->_view_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_taobao_views(){		$data =  array();		if(!is_null($this->_view_id)){			$data['view_id']=$this->_view_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_work_id)){			$data['work_id']=$this->_work_id;		}		if(!is_null($this->_tbwk_id)){			$data['tbwk_id']=$this->_tbwk_id;		}		if(!is_null($this->_refer_url)){			$data['refer_url']=$this->_refer_url;		}		if(!is_null($this->_user_ip)){			$data['user_ip']=$this->_user_ip;		}		if(!is_null($this->_user_agent)){			$data['user_agent']=$this->_user_agent;		}		if(!is_null($this->_click_time)){			$data['click_time']=$this->_click_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('view_id' => $this->_view_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_taobao_views($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_taobao_views(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_taobao_views(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where view_id = $this->_view_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>