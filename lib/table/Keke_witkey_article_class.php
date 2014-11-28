<?php
  class Keke_witkey_article_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_art_id;  
		 public $_art_cat_id; 
		 public $_cat_type; 
		 public $_uid; 
		 public $_username; 
		 public $_art_title; 
		 public $_art_source; 
		 public $_art_pic; 
		 public $_content; 
		 public $_is_recommend; 
		 public $_seo_title; 
		 public $_seo_keyword; 
		 public $_seo_desc; 
		 public $_listorder; 
		 public $_is_show; 
		 public $_is_delineas; 
		 public $_pub_time; 
		 public $_views; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;
	    public $_where;
	     function  keke_witkey_article_class(){ 
			 $this->_db = new db_factory ( );
			 $this->_dbop = $this->_db->create(DBTYPE);
			 $this->_tablename = TABLEPRE."witkey_article";
		 }
	    		public function getArt_id(){
			 return $this->_art_id ;
		}
		public function getArt_cat_id(){
			 return $this->_art_cat_id ;
		}
		public function getCat_type(){
			 return $this->_cat_type ;
		}
		public function getUid(){
			 return $this->_uid ;
		}
		public function getUsername(){
			 return $this->_username ;
		}
		public function getArt_title(){
			 return $this->_art_title ;
		}
		public function getArt_source(){
			 return $this->_art_source ;
		}
		public function getArt_pic(){
			 return $this->_art_pic ;
		}
		public function getContent(){
			 return $this->_content ;
		}
		public function getIs_recommend(){
			 return $this->_is_recommend ;
		}
		public function getSeo_title(){
			 return $this->_seo_title ;
		}
		public function getSeo_keyword(){
			 return $this->_seo_keyword ;
		}
		public function getSeo_desc(){
			 return $this->_seo_desc ;
		}
		public function getListorder(){
			 return $this->_listorder ;
		}
		public function getIs_show(){
			 return $this->_is_show ;
		}
		public function getIs_delineas(){
			 return $this->_is_delineas ;
		}
		public function getPub_time(){
			 return $this->_pub_time ;
		}
		public function getViews(){
			 return $this->_views ;
		}
		public function getWhere(){
			 return $this->_where ;
		}
		public function getCache_config() {
			return $this->_cache_config;
		}
	    		public function setArt_id($value){ 
			 $this->_art_id = $value;
		}
		public function setArt_cat_id($value){ 
			 $this->_art_cat_id = $value;
		}
		public function setCat_type($value){ 
			 $this->_cat_type = $value;
		}
		public function setUid($value){ 
			 $this->_uid = $value;
		}
		public function setUsername($value){ 
			 $this->_username = $value;
		}
		public function setArt_title($value){ 
			 $this->_art_title = $value;
		}
		public function setArt_source($value){ 
			 $this->_art_source = $value;
		}
		public function setArt_pic($value){ 
			 $this->_art_pic = $value;
		}
		public function setContent($value){ 
			 $this->_content = $value;
		}
		public function setIs_recommend($value){ 
			 $this->_is_recommend = $value;
		}
		public function setSeo_title($value){ 
			 $this->_seo_title = $value;
		}
		public function setSeo_keyword($value){ 
			 $this->_seo_keyword = $value;
		}
		public function setSeo_desc($value){ 
			 $this->_seo_desc = $value;
		}
		public function setListorder($value){ 
			 $this->_listorder = $value;
		}
		public function setIs_show($value){ 
			 $this->_is_show = $value;
		}
		public function setIs_delineas($value){ 
			 $this->_is_delineas = $value;
		}
		public function setPub_time($value){ 
			 $this->_pub_time = $value;
		}
		public function setViews($value){ 
			 $this->_views = $value;
		}
		public function setWhere($value){ 
			 $this->_where = $value;
		}
		public function setCache_config($_cache_config) {
			 $this->_cache_config = $_cache_config; 
		}
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
		function create_keke_witkey_article(){
		 		 $data =  array(); 
					if(!is_null($this->_art_id)){ 
				 $data['art_id']=$this->_art_id;
			}
			if(!is_null($this->_art_cat_id)){ 
				 $data['art_cat_id']=$this->_art_cat_id;
			}
			if(!is_null($this->_cat_type)){ 
				 $data['cat_type']=$this->_cat_type;
			}
			if(!is_null($this->_uid)){ 
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){ 
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_art_title)){ 
				 $data['art_title']=$this->_art_title;
			}
			if(!is_null($this->_art_source)){ 
				 $data['art_source']=$this->_art_source;
			}
			if(!is_null($this->_art_pic)){ 
				 $data['art_pic']=$this->_art_pic;
			}
			if(!is_null($this->_content)){ 
				 $data['content']=$this->_content;
			}
			if(!is_null($this->_is_recommend)){ 
				 $data['is_recommend']=$this->_is_recommend;
			}
			if(!is_null($this->_seo_title)){ 
				 $data['seo_title']=$this->_seo_title;
			}
			if(!is_null($this->_seo_keyword)){ 
				 $data['seo_keyword']=$this->_seo_keyword;
			}
			if(!is_null($this->_seo_desc)){ 
				 $data['seo_desc']=$this->_seo_desc;
			}
			if(!is_null($this->_listorder)){ 
				 $data['listorder']=$this->_listorder;
			}
			if(!is_null($this->_is_show)){ 
				 $data['is_show']=$this->_is_show;
			}
			if(!is_null($this->_is_delineas)){ 
				 $data['is_delineas']=$this->_is_delineas;
			}
			if(!is_null($this->_pub_time)){ 
				 $data['pub_time']=$this->_pub_time;
			}
			if(!is_null($this->_views)){ 
				 $data['views']=$this->_views;
			}
			 return $this->_art_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 
		 } 
		function edit_keke_witkey_article(){ 
		 		 $data =  array(); 
					if(!is_null($this->_art_id)){ 
				 $data['art_id']=$this->_art_id;
			}
			if(!is_null($this->_art_cat_id)){ 
				 $data['art_cat_id']=$this->_art_cat_id;
			}
			if(!is_null($this->_cat_type)){ 
				 $data['cat_type']=$this->_cat_type;
			}
			if(!is_null($this->_uid)){ 
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){ 
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_art_title)){ 
				 $data['art_title']=$this->_art_title;
			}
			if(!is_null($this->_art_source)){ 
				 $data['art_source']=$this->_art_source;
			}
			if(!is_null($this->_art_pic)){ 
				 $data['art_pic']=$this->_art_pic;
			}
			if(!is_null($this->_content)){ 
				 $data['content']=$this->_content;
			}
			if(!is_null($this->_is_recommend)){ 
				 $data['is_recommend']=$this->_is_recommend;
			}
			if(!is_null($this->_seo_title)){ 
				 $data['seo_title']=$this->_seo_title;
			}
			if(!is_null($this->_seo_keyword)){ 
				 $data['seo_keyword']=$this->_seo_keyword;
			}
			if(!is_null($this->_seo_desc)){ 
				 $data['seo_desc']=$this->_seo_desc;
			}
			if(!is_null($this->_listorder)){ 
				 $data['listorder']=$this->_listorder;
			}
			if(!is_null($this->_is_show)){ 
				 $data['is_show']=$this->_is_show;
			}
			if(!is_null($this->_is_delineas)){ 
				 $data['is_delineas']=$this->_is_delineas;
			}
			if(!is_null($this->_pub_time)){ 
				 $data['pub_time']=$this->_pub_time;
			}
			if(!is_null($this->_views)){ 
				 $data['views']=$this->_views;
			}
			if($this->_where){ 
				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 
			 } 
			 else{ 
				 $where = array('art_id' => $this->_art_id); 
				 return $this->_db->updatetable($this->_tablename,$data,$where); 
			} 
		 } 
		function query_keke_witkey_article($is_cache=0, $cache_time=0){ 
			 if($this->_where){ 
				 $sql = "select * from $this->_tablename where ".$this->_where; 
			 } 
			 else{ 
				 $sql = "select * from $this->_tablename"; 
			 } 
			if ($is_cache) {
			 $this->_cache_config ['is_cache'] = $is_cache;
			}
			if ($cache_time) {
			 $this->_cache_config ['time'] = $cache_time;
			 }
			 if ($this->_cache_config ['is_cache']) {
			     if (CACHE_TYPE) {
					 $keke_cache = new keke_cache_class ( CACHE_TYPE );
					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');
						$data = $keke_cache->get ( $id );
							if ($data) {
								return $data; 
							} else { 
								$res = $this->_dbop->query ( $sql ); 
								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 
					 			$this->_where = ""; 
								return $res;
 							} 
						} 
			 }else{
			 	$this->_where = ""; 
				return  $this->_dbop->query ( $sql );
 			 }
		 } 
		function count_keke_witkey_article(){ 
			 if($this->_where){ 
				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 
			 } 
			 else{ 
				 $sql = "select count(*) as count from $this->_tablename"; 
			 } 
			 $this->_where = ""; 
			 return $this->_dbop->getCount($sql); 
		 } 
		function del_keke_witkey_article(){ 
			 if($this->_where){ 
				 $sql = "delete from $this->_tablename where ".$this->_where; 
			 } 
			 else{ 
				 $sql = "delete from $this->_tablename where art_id = $this->_art_id "; 
			 } 
			 $this->_where = ""; 
			 return $this->_dbop->execute($sql); 
		 } 
   }
 ?>