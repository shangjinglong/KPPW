<?php
  class Keke_witkey_service_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_service_id;
		 public $_model_id;
		 public $_service_type;
		 public $_shop_id;
		 public $_uid;
		 public $_username;
		 public $_profit_rate;
		 public $_indus_id;
		 public $_indus_pid;
		 public $_indus_path;
		 public $_cus_cate_id;
		 public $_title;
		 public $_price;
		 public $_unite_price;
		 public $_service_time;
		 public $_unit_time;
		 public $_obj_name;
		 public $_pic;
		 public $_ad_pic;
		 public $_area_range;
		 public $_key_word;
		 public $_submit_method;
		 public $_file_path;
		 public $_content;
		 public $_on_time;
		 public $_is_stop;
		 public $_sale_num;
		 public $_focus_num;
		 public $_mark_num;
		 public $_leave_num;
		 public $_views;
		 public $_pay_item;
		 public $_att_cash;
		 public $_refresh_time;
		 public $_unique_num;
		 public $_total_sale;
		 public $_service_status;
		 public $_is_top;
		 public $_point;
		 public $_city;
		 public $_payitem_time;
		 public $_exist_time;
		 public $_confirm_max;
		 public $_seo_title;
		 public $_seo_keyword;
		 public $_seo_desc;
		 public $_province;
		 public $_area;
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;
	    public $_where;
	     function  keke_witkey_service_class(){
			 $this->_db = new db_factory ( );
			 $this->_dbop = $this->_db->create(DBTYPE);
			 $this->_tablename = TABLEPRE."witkey_service";
		 }
	    		public function getService_id(){
			 return $this->_service_id ;
		}
		public function getModel_id(){
			 return $this->_model_id ;
		}
		public function getService_type(){
			 return $this->_service_type ;
		}
		public function getShop_id(){
			 return $this->_shop_id ;
		}
		public function getUid(){
			 return $this->_uid ;
		}
		public function getUsername(){
			 return $this->_username ;
		}
		public function getProfit_rate(){
			 return $this->_profit_rate ;
		}
		public function getIndus_id(){
			 return $this->_indus_id ;
		}
		public function getIndus_pid(){
			 return $this->_indus_pid ;
		}
		public function getIndus_path(){
			 return $this->_indus_path ;
		}
		public function getCus_cate_id(){
			 return $this->_cus_cate_id ;
		}
		public function getTitle(){
			 return $this->_title ;
		}
		public function getPrice(){
			 return $this->_price ;
		}
		public function getUnite_price(){
			 return $this->_unite_price ;
		}
		public function getService_time(){
			 return $this->_service_time ;
		}
		public function getUnit_time(){
			 return $this->_unit_time ;
		}
		public function getObj_name(){
			 return $this->_obj_name ;
		}
		public function getPic(){
			 return $this->_pic ;
		}
		public function getAd_pic(){
			 return $this->_ad_pic ;
		}
		public function getArea_range(){
			 return $this->_area_range ;
		}
		public function getKey_word(){
			 return $this->_key_word ;
		}
		public function getSubmit_method(){
			 return $this->_submit_method ;
		}
		public function getFile_path(){
			 return $this->_file_path ;
		}
		public function getContent(){
			 return $this->_content ;
		}
		public function getOn_time(){
			 return $this->_on_time ;
		}
		public function getIs_stop(){
			 return $this->_is_stop ;
		}
		public function getSale_num(){
			 return $this->_sale_num ;
		}
		public function getFocus_num(){
			 return $this->_focus_num ;
		}
		public function getMark_num(){
			 return $this->_mark_num ;
		}
		public function getLeave_num(){
			 return $this->_leave_num ;
		}
		public function getViews(){
			 return $this->_views ;
		}
		public function getPay_item(){
			 return $this->_pay_item ;
		}
		public function getAtt_cash(){
			 return $this->_att_cash ;
		}
		public function getRefresh_time(){
			 return $this->_refresh_time ;
		}
		public function getUnique_num(){
			 return $this->_unique_num ;
		}
		public function getTotal_sale(){
			 return $this->_total_sale ;
		}
		public function getService_status(){
			 return $this->_service_status ;
		}
		public function getIs_top(){
			 return $this->_is_top ;
		}
		public function getPoint(){
			 return $this->_point ;
		}
		public function getCity(){
			 return $this->_city ;
		}
		public function getPayitem_time(){
			 return $this->_payitem_time ;
		}
		public function getExist_time(){
			 return $this->_exist_time ;
		}
		public function getConfirm_max(){
			 return $this->_confirm_max ;
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
		public function getProvince(){
			 return $this->_province ;
		}
		public function getArea(){
			 return $this->_area ;
		}
		public function getWhere(){
			 return $this->_where ;
		}
		public function getCache_config() {
			return $this->_cache_config;
		}
	    		public function setService_id($value){
			 $this->_service_id = $value;
		}
		public function setModel_id($value){
			 $this->_model_id = $value;
		}
		public function setService_type($value){
			 $this->_service_type = $value;
		}
		public function setShop_id($value){
			 $this->_shop_id = $value;
		}
		public function setUid($value){
			 $this->_uid = $value;
		}
		public function setUsername($value){
			 $this->_username = $value;
		}
		public function setProfit_rate($value){
			 $this->_profit_rate = $value;
		}
		public function setIndus_id($value){
			 $this->_indus_id = $value;
		}
		public function setIndus_pid($value){
			 $this->_indus_pid = $value;
		}
		public function setIndus_path($value){
			 $this->_indus_path = $value;
		}
		public function setCus_cate_id($value){
			 $this->_cus_cate_id = $value;
		}
		public function setTitle($value){
			 $this->_title = $value;
		}
		public function setPrice($value){
			 $this->_price = $value;
		}
		public function setUnite_price($value){
			 $this->_unite_price = $value;
		}
		public function setService_time($value){
			 $this->_service_time = $value;
		}
		public function setUnit_time($value){
			 $this->_unit_time = $value;
		}
		public function setObj_name($value){
			 $this->_obj_name = $value;
		}
		public function setPic($value){
			 $this->_pic = $value;
		}
		public function setAd_pic($value){
			 $this->_ad_pic = $value;
		}
		public function setArea_range($value){
			 $this->_area_range = $value;
		}
		public function setKey_word($value){
			 $this->_key_word = $value;
		}
		public function setSubmit_method($value){
			 $this->_submit_method = $value;
		}
		public function setFile_path($value){
			 $this->_file_path = $value;
		}
		public function setContent($value){
			 $this->_content = $value;
		}
		public function setOn_time($value){
			 $this->_on_time = $value;
		}
		public function setIs_stop($value){
			 $this->_is_stop = $value;
		}
		public function setSale_num($value){
			 $this->_sale_num = $value;
		}
		public function setFocus_num($value){
			 $this->_focus_num = $value;
		}
		public function setMark_num($value){
			 $this->_mark_num = $value;
		}
		public function setLeave_num($value){
			 $this->_leave_num = $value;
		}
		public function setViews($value){
			 $this->_views = $value;
		}
		public function setPay_item($value){
			 $this->_pay_item = $value;
		}
		public function setAtt_cash($value){
			 $this->_att_cash = $value;
		}
		public function setRefresh_time($value){
			 $this->_refresh_time = $value;
		}
		public function setUnique_num($value){
			 $this->_unique_num = $value;
		}
		public function setTotal_sale($value){
			 $this->_total_sale = $value;
		}
		public function setService_status($value){
			 $this->_service_status = $value;
		}
		public function setIs_top($value){
			 $this->_is_top = $value;
		}
		public function setPoint($value){
			 $this->_point = $value;
		}
		public function setCity($value){
			 $this->_city = $value;
		}
		public function setPayitem_time($value){
			 $this->_payitem_time = $value;
		}
		public function setExist_time($value){
			 $this->_exist_time = $value;
		}
		public function setConfirm_max($value){
			 $this->_confirm_max = $value;
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
		public function setProvince($value){
			 $this->_province = $value;
		}
		public function setArea($value){
			 $this->_area = $value;
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
		function create_keke_witkey_service(){
		 		 $data =  array();
					if(!is_null($this->_service_id)){
				 $data['service_id']=$this->_service_id;
			}
			if(!is_null($this->_model_id)){
				 $data['model_id']=$this->_model_id;
			}
			if(!is_null($this->_service_type)){
				 $data['service_type']=$this->_service_type;
			}
			if(!is_null($this->_shop_id)){
				 $data['shop_id']=$this->_shop_id;
			}
			if(!is_null($this->_uid)){
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_profit_rate)){
				 $data['profit_rate']=$this->_profit_rate;
			}
			if(!is_null($this->_indus_id)){
				 $data['indus_id']=$this->_indus_id;
			}
			if(!is_null($this->_indus_pid)){
				 $data['indus_pid']=$this->_indus_pid;
			}
			if(!is_null($this->_indus_path)){
				 $data['indus_path']=$this->_indus_path;
			}
			if(!is_null($this->_cus_cate_id)){
				 $data['cus_cate_id']=$this->_cus_cate_id;
			}
			if(!is_null($this->_title)){
				 $data['title']=$this->_title;
			}
			if(!is_null($this->_price)){
				 $data['price']=$this->_price;
			}
			if(!is_null($this->_unite_price)){
				 $data['unite_price']=$this->_unite_price;
			}
			if(!is_null($this->_service_time)){
				 $data['service_time']=$this->_service_time;
			}
			if(!is_null($this->_unit_time)){
				 $data['unit_time']=$this->_unit_time;
			}
			if(!is_null($this->_obj_name)){
				 $data['obj_name']=$this->_obj_name;
			}
			if(!is_null($this->_pic)){
				 $data['pic']=$this->_pic;
			}
			if(!is_null($this->_ad_pic)){
				 $data['ad_pic']=$this->_ad_pic;
			}
			if(!is_null($this->_area_range)){
				 $data['area_range']=$this->_area_range;
			}
			if(!is_null($this->_key_word)){
				 $data['key_word']=$this->_key_word;
			}
			if(!is_null($this->_submit_method)){
				 $data['submit_method']=$this->_submit_method;
			}
			if(!is_null($this->_file_path)){
				 $data['file_path']=$this->_file_path;
			}
			if(!is_null($this->_content)){
				 $data['content']=$this->_content;
			}
			if(!is_null($this->_on_time)){
				 $data['on_time']=$this->_on_time;
			}
			if(!is_null($this->_is_stop)){
				 $data['is_stop']=$this->_is_stop;
			}
			if(!is_null($this->_sale_num)){
				 $data['sale_num']=$this->_sale_num;
			}
			if(!is_null($this->_focus_num)){
				 $data['focus_num']=$this->_focus_num;
			}
			if(!is_null($this->_mark_num)){
				 $data['mark_num']=$this->_mark_num;
			}
			if(!is_null($this->_leave_num)){
				 $data['leave_num']=$this->_leave_num;
			}
			if(!is_null($this->_views)){
				 $data['views']=$this->_views;
			}
			if(!is_null($this->_pay_item)){
				 $data['pay_item']=$this->_pay_item;
			}
			if(!is_null($this->_att_cash)){
				 $data['att_cash']=$this->_att_cash;
			}
			if(!is_null($this->_refresh_time)){
				 $data['refresh_time']=$this->_refresh_time;
			}
			if(!is_null($this->_unique_num)){
				 $data['unique_num']=$this->_unique_num;
			}
			if(!is_null($this->_total_sale)){
				 $data['total_sale']=$this->_total_sale;
			}
			if(!is_null($this->_service_status)){
				 $data['service_status']=$this->_service_status;
			}
			if(!is_null($this->_is_top)){
				 $data['is_top']=$this->_is_top;
			}
			if(!is_null($this->_point)){
				 $data['point']=$this->_point;
			}
			if(!is_null($this->_city)){
				 $data['city']=$this->_city;
			}
			if(!is_null($this->_payitem_time)){
				 $data['payitem_time']=$this->_payitem_time;
			}
			if(!is_null($this->_exist_time)){
				 $data['exist_time']=$this->_exist_time;
			}
			if(!is_null($this->_confirm_max)){
				 $data['confirm_max']=$this->_confirm_max;
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
			if(!is_null($this->_province)){
				 $data['province']=$this->_province;
			}
			if(!is_null($this->_area)){
				 $data['area']=$this->_area;
			}
			 return $this->_service_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);
		 }
		function edit_keke_witkey_service(){
		 		 $data =  array();
					if(!is_null($this->_service_id)){
				 $data['service_id']=$this->_service_id;
			}
			if(!is_null($this->_model_id)){
				 $data['model_id']=$this->_model_id;
			}
			if(!is_null($this->_service_type)){
				 $data['service_type']=$this->_service_type;
			}
			if(!is_null($this->_shop_id)){
				 $data['shop_id']=$this->_shop_id;
			}
			if(!is_null($this->_uid)){
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_profit_rate)){
				 $data['profit_rate']=$this->_profit_rate;
			}
			if(!is_null($this->_indus_id)){
				 $data['indus_id']=$this->_indus_id;
			}
			if(!is_null($this->_indus_pid)){
				 $data['indus_pid']=$this->_indus_pid;
			}
			if(!is_null($this->_indus_path)){
				 $data['indus_path']=$this->_indus_path;
			}
			if(!is_null($this->_cus_cate_id)){
				 $data['cus_cate_id']=$this->_cus_cate_id;
			}
			if(!is_null($this->_title)){
				 $data['title']=$this->_title;
			}
			if(!is_null($this->_price)){
				 $data['price']=$this->_price;
			}
			if(!is_null($this->_unite_price)){
				 $data['unite_price']=$this->_unite_price;
			}
			if(!is_null($this->_service_time)){
				 $data['service_time']=$this->_service_time;
			}
			if(!is_null($this->_unit_time)){
				 $data['unit_time']=$this->_unit_time;
			}
			if(!is_null($this->_obj_name)){
				 $data['obj_name']=$this->_obj_name;
			}
			if(!is_null($this->_pic)){
				 $data['pic']=$this->_pic;
			}
			if(!is_null($this->_ad_pic)){
				 $data['ad_pic']=$this->_ad_pic;
			}
			if(!is_null($this->_area_range)){
				 $data['area_range']=$this->_area_range;
			}
			if(!is_null($this->_key_word)){
				 $data['key_word']=$this->_key_word;
			}
			if(!is_null($this->_submit_method)){
				 $data['submit_method']=$this->_submit_method;
			}
			if(!is_null($this->_file_path)){
				 $data['file_path']=$this->_file_path;
			}
			if(!is_null($this->_content)){
				 $data['content']=$this->_content;
			}
			if(!is_null($this->_on_time)){
				 $data['on_time']=$this->_on_time;
			}
			if(!is_null($this->_is_stop)){
				 $data['is_stop']=$this->_is_stop;
			}
			if(!is_null($this->_sale_num)){
				 $data['sale_num']=$this->_sale_num;
			}
			if(!is_null($this->_focus_num)){
				 $data['focus_num']=$this->_focus_num;
			}
			if(!is_null($this->_mark_num)){
				 $data['mark_num']=$this->_mark_num;
			}
			if(!is_null($this->_leave_num)){
				 $data['leave_num']=$this->_leave_num;
			}
			if(!is_null($this->_views)){
				 $data['views']=$this->_views;
			}
			if(!is_null($this->_pay_item)){
				 $data['pay_item']=$this->_pay_item;
			}
			if(!is_null($this->_att_cash)){
				 $data['att_cash']=$this->_att_cash;
			}
			if(!is_null($this->_refresh_time)){
				 $data['refresh_time']=$this->_refresh_time;
			}
			if(!is_null($this->_unique_num)){
				 $data['unique_num']=$this->_unique_num;
			}
			if(!is_null($this->_total_sale)){
				 $data['total_sale']=$this->_total_sale;
			}
			if(!is_null($this->_service_status)){
				 $data['service_status']=$this->_service_status;
			}
			if(!is_null($this->_is_top)){
				 $data['is_top']=$this->_is_top;
			}
			if(!is_null($this->_point)){
				 $data['point']=$this->_point;
			}
			if(!is_null($this->_city)){
				 $data['city']=$this->_city;
			}
			if(!is_null($this->_payitem_time)){
				 $data['payitem_time']=$this->_payitem_time;
			}
			if(!is_null($this->_exist_time)){
				 $data['exist_time']=$this->_exist_time;
			}
			if(!is_null($this->_confirm_max)){
				 $data['confirm_max']=$this->_confirm_max;
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
			if(!is_null($this->_province)){
				 $data['province']=$this->_province;
			}
			if(!is_null($this->_area)){
				 $data['area']=$this->_area;
			}
			if($this->_where){
				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());
			 }
			 else{
				 $where = array('service_id' => $this->_service_id);
				 return $this->_db->updatetable($this->_tablename,$data,$where);
			}
		 }
		function query_keke_witkey_service($is_cache=0, $cache_time=0){
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
		function count_keke_witkey_service(){
			 if($this->_where){
				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where;
			 }
			 else{
				 $sql = "select count(*) as count from $this->_tablename";
			 }
			 $this->_where = "";
			 return $this->_dbop->getCount($sql);
		 }
		function del_keke_witkey_service(){
			 if($this->_where){
				 $sql = "delete from $this->_tablename where ".$this->_where;
			 }
			 else{
				 $sql = "delete from $this->_tablename where service_id = $this->_service_id ";
			 }
			 $this->_where = "";
			 return $this->_dbop->execute($sql);
		 }
   }
 ?>