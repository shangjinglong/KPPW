<?php
  class Keke_witkey_task_cash_cove_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_cash_rule_id;  		 public $_start_cove; 		 public $_end_cove; 		 public $_cove_desc; 		 public $_on_time; 		 public $_model_code; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_task_cash_cove_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_task_cash_cove";		 }	    
	    		public function getCash_rule_id(){			 return $this->_cash_rule_id ;		}		public function getStart_cove(){			 return $this->_start_cove ;		}		public function getEnd_cove(){			 return $this->_end_cove ;		}		public function getCove_desc(){			 return $this->_cove_desc ;		}		public function getOn_time(){			 return $this->_on_time ;		}		public function getModel_code(){			 return $this->_model_code ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setCash_rule_id($value){ 			 $this->_cash_rule_id = $value;		}		public function setStart_cove($value){ 			 $this->_start_cove = $value;		}		public function setEnd_cove($value){ 			 $this->_end_cove = $value;		}		public function setCove_desc($value){ 			 $this->_cove_desc = $value;		}		public function setOn_time($value){ 			 $this->_on_time = $value;		}		public function setModel_code($value){ 			 $this->_model_code = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
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
	    		function create_keke_witkey_task_cash_cove(){		 		 $data =  array(); 					if(!is_null($this->_cash_rule_id)){ 				 $data['cash_rule_id']=$this->_cash_rule_id;			}			if(!is_null($this->_start_cove)){ 				 $data['start_cove']=$this->_start_cove;			}			if(!is_null($this->_end_cove)){ 				 $data['end_cove']=$this->_end_cove;			}			if(!is_null($this->_cove_desc)){ 				 $data['cove_desc']=$this->_cove_desc;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_model_code)){ 				 $data['model_code']=$this->_model_code;			}			 return $this->_cash_rule_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_task_cash_cove(){ 		 		 $data =  array();  					if(!is_null($this->_cash_rule_id)){ 				 $data['cash_rule_id']=$this->_cash_rule_id;			}			if(!is_null($this->_start_cove)){ 				 $data['start_cove']=$this->_start_cove;			}			if(!is_null($this->_end_cove)){ 				 $data['end_cove']=$this->_end_cove;			}			if(!is_null($this->_cove_desc)){ 				 $data['cove_desc']=$this->_cove_desc;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_model_code)){ 				 $data['model_code']=$this->_model_code;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('cash_rule_id' => $this->_cash_rule_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_task_cash_cove($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_task_cash_cove(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_task_cash_cove(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where cash_rule_id = $this->_cash_rule_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>