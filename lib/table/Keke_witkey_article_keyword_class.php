<?php
  class Keke_witkey_article_keyword_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_keyword_id;  		 public $_word; 		 public $_url; 		 public $_keyword_status; 		 public $_edit_time; 		 public $_on_time; 		 public $_show_count; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_article_keyword_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_article_keyword";		 }	    
	    		public function getKeyword_id(){			 return $this->_keyword_id ;		}		public function getWord(){			 return $this->_word ;		}		public function getUrl(){			 return $this->_url ;		}		public function getKeyword_status(){			 return $this->_keyword_status ;		}		public function getEdit_time(){			 return $this->_edit_time ;		}		public function getOn_time(){			 return $this->_on_time ;		}		public function getShow_count(){			 return $this->_show_count ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setKeyword_id($value){ 			 $this->_keyword_id = $value;		}		public function setWord($value){ 			 $this->_word = $value;		}		public function setUrl($value){ 			 $this->_url = $value;		}		public function setKeyword_status($value){ 			 $this->_keyword_status = $value;		}		public function setEdit_time($value){ 			 $this->_edit_time = $value;		}		public function setOn_time($value){ 			 $this->_on_time = $value;		}		public function setShow_count($value){ 			 $this->_show_count = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
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
	    		function create_keke_witkey_article_keyword(){		 		 $data =  array(); 					if(!is_null($this->_keyword_id)){ 				 $data['keyword_id']=$this->_keyword_id;			}			if(!is_null($this->_word)){ 				 $data['word']=$this->_word;			}			if(!is_null($this->_url)){ 				 $data['url']=$this->_url;			}			if(!is_null($this->_keyword_status)){ 				 $data['keyword_status']=$this->_keyword_status;			}			if(!is_null($this->_edit_time)){ 				 $data['edit_time']=$this->_edit_time;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_show_count)){ 				 $data['show_count']=$this->_show_count;			}			 return $this->_keyword_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_article_keyword(){ 		 		 $data =  array();  					if(!is_null($this->_keyword_id)){ 				 $data['keyword_id']=$this->_keyword_id;			}			if(!is_null($this->_word)){ 				 $data['word']=$this->_word;			}			if(!is_null($this->_url)){ 				 $data['url']=$this->_url;			}			if(!is_null($this->_keyword_status)){ 				 $data['keyword_status']=$this->_keyword_status;			}			if(!is_null($this->_edit_time)){ 				 $data['edit_time']=$this->_edit_time;			}			if(!is_null($this->_on_time)){ 				 $data['on_time']=$this->_on_time;			}			if(!is_null($this->_show_count)){ 				 $data['show_count']=$this->_show_count;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('keyword_id' => $this->_keyword_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_article_keyword($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_article_keyword(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_article_keyword(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where keyword_id = $this->_keyword_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>