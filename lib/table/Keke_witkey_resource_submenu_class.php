<?php
  class Keke_witkey_resource_submenu_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_submenu_id;  		 public $_submenu_name; 		 public $_menu_name; 		 public $_listorder; 		 public $_status; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_resource_submenu_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_resource_submenu";		 }	    
	    		public function getSubmenu_id(){			 return $this->_submenu_id ;		}		public function getSubmenu_name(){			 return $this->_submenu_name ;		}		public function getMenu_name(){			 return $this->_menu_name ;		}		public function getListorder(){			 return $this->_listorder ;		}		public function getStatus(){			 return $this->_status ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setSubmenu_id($value){ 			 $this->_submenu_id = $value;		}		public function setSubmenu_name($value){ 			 $this->_submenu_name = $value;		}		public function setMenu_name($value){ 			 $this->_menu_name = $value;		}		public function setListorder($value){ 			 $this->_listorder = $value;		}		public function setStatus($value){ 			 $this->_status = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
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
	    		function create_keke_witkey_resource_submenu(){		 		 $data =  array(); 					if(!is_null($this->_submenu_id)){ 				 $data['submenu_id']=$this->_submenu_id;			}			if(!is_null($this->_submenu_name)){ 				 $data['submenu_name']=$this->_submenu_name;			}			if(!is_null($this->_menu_name)){ 				 $data['menu_name']=$this->_menu_name;			}			if(!is_null($this->_listorder)){ 				 $data['listorder']=$this->_listorder;			}			if(!is_null($this->_status)){ 				 $data['status']=$this->_status;			}			 return $this->_submenu_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_resource_submenu(){ 		 		 $data =  array();  					if(!is_null($this->_submenu_id)){ 				 $data['submenu_id']=$this->_submenu_id;			}			if(!is_null($this->_submenu_name)){ 				 $data['submenu_name']=$this->_submenu_name;			}			if(!is_null($this->_menu_name)){ 				 $data['menu_name']=$this->_menu_name;			}			if(!is_null($this->_listorder)){ 				 $data['listorder']=$this->_listorder;			}			if(!is_null($this->_status)){ 				 $data['status']=$this->_status;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('submenu_id' => $this->_submenu_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_resource_submenu($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_resource_submenu(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_resource_submenu(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where submenu_id = $this->_submenu_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>