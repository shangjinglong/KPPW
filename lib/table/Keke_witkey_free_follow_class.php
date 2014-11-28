<?php
  class Keke_witkey_free_follow_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_follow_id;  		 public $_uid; 		 public $_fuid; 		 public $_task_id; 		 public $_service_id; 		 public $_on_time; 		 public $_type; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_free_follow_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_free_follow";		 }	    
	    		public function getFollow_id(){			 return $this->_follow_id ;		}		public function getUid(){			 return $this->_uid ;		}		public function getFuid(){			 return $this->_fuid ;		}		public function getTask_id(){			 return $this->_task_id ;		}		public function getService_id(){			 return $this->_service_id ;		}		public function getOn_time(){			 return $this->_on_time ;		}		public function getType(){			 return $this->_type ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setFollow_id($value){ 			 $this->_follow_id = $value;		}		public function setUid($value){ 			 $this->_uid = $value;		}		public function setFuid($value){ 			 $this->_fuid = $value;		}		public function setTask_id($value){ 			 $this->_task_id = $value;		}		public function setService_id($value){ 			 $this->_service_id = $value;		}		public function setOn_time($value){ 			 $this->_on_time = $value;		}		public function setType($value){ 			 $this->_type = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
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
	    		function create_keke_witkey_free_follow(){		 		 $data =  array(); 					if(!is_null($this->_follow_id)){ 				 $data['follow_id']=$this->_follow_id;			}			if(!is_null($this->_uid)){ 				 $data['uid']=$this->_uid;			}			if(!is_null($this->_fuid)){ 				 $data['fuid']=$this->_fuid;			}			if(!is_null($this->_task_id)){ 				 $data['task_id']=$this->_task_id;			}			if(!is_null($this->_service_id)){ 				 $data['service_id']=$this->_service_id;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_type)){ 				 $data['type']=$this->_type;			}			 return $this->_follow_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_free_follow(){ 		 		 $data =  array();  					if(!is_null($this->_follow_id)){ 				 $data['follow_id']=$this->_follow_id;			}			if(!is_null($this->_uid)){ 				 $data['uid']=$this->_uid;			}			if(!is_null($this->_fuid)){ 				 $data['fuid']=$this->_fuid;			}			if(!is_null($this->_task_id)){ 				 $data['task_id']=$this->_task_id;			}			if(!is_null($this->_service_id)){ 				 $data['service_id']=$this->_service_id;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_type)){ 				 $data['type']=$this->_type;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('follow_id' => $this->_follow_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_free_follow($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_free_follow(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_free_follow(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where follow_id = $this->_follow_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>