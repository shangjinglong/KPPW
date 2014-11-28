<?php
  class Keke_witkey_task_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_task_id;
		 public $_model_id;
		 public $_work_count;
		 public $_single_cash;
		 public $_profit_rate;
		 public $_task_fail_rate;
		 public $_task_status;
		 public $_task_title;
		 public $_task_desc;
		 public $_task_file;
		 public $_task_pic;
		 public $_indus_id;
		 public $_indus_pid;
		 public $_uid;
		 public $_username;
		 public $_start_time;
		 public $_sub_time;
		 public $_end_time;
		 public $_sp_end_time;
		 public $_city;
		 public $_task_cash;
		 public $_real_cash;
		 public $_task_cash_coverage;
		 public $_cash_cost;
		 public $_credit_cost;
		 public $_view_num;
		 public $_work_num;
		 public $_leave_num;
		 public $_focus_num;
		 public $_mark_num;
		 public $_is_delineas;
		 public $_kf_uid;
		 public $_pay_item;
		 public $_att_cash;
		 public $_contact;
		 public $_unique_num;
		 public $_ext_time;
		 public $_ext_desc;
		 public $_task_union;
		 public $_alipay_trust;
		 public $_is_delay;
		 public $_r_task_id;
		 public $_is_trust;
		 public $_trust_type;
		 public $_is_top;
		 public $_is_auto_bid;
		 public $_point;
		 public $_payitem_time;
		 public $_age_requirement;
		 public $_seo_title;
		 public $_seo_keyword;
		 public $_seo_desc;
		 public $_province;
		 public $_area;
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;
	    public $_where;
	     function  keke_witkey_task_class(){
			 $this->_db = new db_factory ( );
			 $this->_dbop = $this->_db->create(DBTYPE);
			 $this->_tablename = TABLEPRE."witkey_task";
		 }
	    		public function getTask_id(){
			 return $this->_task_id ;
		}
		public function getModel_id(){
			 return $this->_model_id ;
		}
		public function getWork_count(){
			 return $this->_work_count ;
		}
		public function getSingle_cash(){
			 return $this->_single_cash ;
		}
		public function getProfit_rate(){
			 return $this->_profit_rate ;
		}
		public function getTask_fail_rate(){
			 return $this->_task_fail_rate ;
		}
		public function getTask_status(){
			 return $this->_task_status ;
		}
		public function getTask_title(){
			 return $this->_task_title ;
		}
		public function getTask_desc(){
			 return $this->_task_desc ;
		}
		public function getTask_file(){
			 return $this->_task_file ;
		}
		public function getTask_pic(){
			 return $this->_task_pic ;
		}
		public function getIndus_id(){
			 return $this->_indus_id ;
		}
		public function getIndus_pid(){
			 return $this->_indus_pid ;
		}
		public function getUid(){
			 return $this->_uid ;
		}
		public function getUsername(){
			 return $this->_username ;
		}
		public function getStart_time(){
			 return $this->_start_time ;
		}
		public function getSub_time(){
			 return $this->_sub_time ;
		}
		public function getEnd_time(){
			 return $this->_end_time ;
		}
		public function getSp_end_time(){
			 return $this->_sp_end_time ;
		}
		public function getCity(){
			 return $this->_city ;
		}
		public function getTask_cash(){
			 return $this->_task_cash ;
		}
		public function getReal_cash(){
			 return $this->_real_cash ;
		}
		public function getTask_cash_coverage(){
			 return $this->_task_cash_coverage ;
		}
		public function getCash_cost(){
			 return $this->_cash_cost ;
		}
		public function getCredit_cost(){
			 return $this->_credit_cost ;
		}
		public function getView_num(){
			 return $this->_view_num ;
		}
		public function getWork_num(){
			 return $this->_work_num ;
		}
		public function getLeave_num(){
			 return $this->_leave_num ;
		}
		public function getFocus_num(){
			 return $this->_focus_num ;
		}
		public function getMark_num(){
			 return $this->_mark_num ;
		}
		public function getIs_delineas(){
			 return $this->_is_delineas ;
		}
		public function getKf_uid(){
			 return $this->_kf_uid ;
		}
		public function getPay_item(){
			 return $this->_pay_item ;
		}
		public function getAtt_cash(){
			 return $this->_att_cash ;
		}
		public function getContact(){
			 return $this->_contact ;
		}
		public function getUnique_num(){
			 return $this->_unique_num ;
		}
		public function getExt_time(){
			 return $this->_ext_time ;
		}
		public function getExt_desc(){
			 return $this->_ext_desc ;
		}
		public function getTask_union(){
			 return $this->_task_union ;
		}
		public function getAlipay_trust(){
			 return $this->_alipay_trust ;
		}
		public function getIs_delay(){
			 return $this->_is_delay ;
		}
		public function getR_task_id(){
			 return $this->_r_task_id ;
		}
		public function getIs_trust(){
			 return $this->_is_trust ;
		}
		public function getTrust_type(){
			 return $this->_trust_type ;
		}
		public function getIs_top(){
			 return $this->_is_top ;
		}
		public function getIs_auto_bid(){
			 return $this->_is_auto_bid ;
		}
		public function getPoint(){
			 return $this->_point ;
		}
		public function getPayitem_time(){
			 return $this->_payitem_time ;
		}
		public function getAge_requirement(){
			 return $this->_age_requirement ;
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
	    		public function setTask_id($value){
			 $this->_task_id = $value;
		}
		public function setModel_id($value){
			 $this->_model_id = $value;
		}
		public function setWork_count($value){
			 $this->_work_count = $value;
		}
		public function setSingle_cash($value){
			 $this->_single_cash = $value;
		}
		public function setProfit_rate($value){
			 $this->_profit_rate = $value;
		}
		public function setTask_fail_rate($value){
			 $this->_task_fail_rate = $value;
		}
		public function setTask_status($value){
			 $this->_task_status = $value;
		}
		public function setTask_title($value){
			 $this->_task_title = $value;
		}
		public function setTask_desc($value){
			 $this->_task_desc = $value;
		}
		public function setTask_file($value){
			 $this->_task_file = $value;
		}
		public function setTask_pic($value){
			 $this->_task_pic = $value;
		}
		public function setIndus_id($value){
			 $this->_indus_id = $value;
		}
		public function setIndus_pid($value){
			 $this->_indus_pid = $value;
		}
		public function setUid($value){
			 $this->_uid = $value;
		}
		public function setUsername($value){
			 $this->_username = $value;
		}
		public function setStart_time($value){
			 $this->_start_time = $value;
		}
		public function setSub_time($value){
			 $this->_sub_time = $value;
		}
		public function setEnd_time($value){
			 $this->_end_time = $value;
		}
		public function setSp_end_time($value){
			 $this->_sp_end_time = $value;
		}
		public function setCity($value){
			 $this->_city = $value;
		}
		public function setTask_cash($value){
			 $this->_task_cash = $value;
		}
		public function setReal_cash($value){
			 $this->_real_cash = $value;
		}
		public function setTask_cash_coverage($value){
			 $this->_task_cash_coverage = $value;
		}
		public function setCash_cost($value){
			 $this->_cash_cost = $value;
		}
		public function setCredit_cost($value){
			 $this->_credit_cost = $value;
		}
		public function setView_num($value){
			 $this->_view_num = $value;
		}
		public function setWork_num($value){
			 $this->_work_num = $value;
		}
		public function setLeave_num($value){
			 $this->_leave_num = $value;
		}
		public function setFocus_num($value){
			 $this->_focus_num = $value;
		}
		public function setMark_num($value){
			 $this->_mark_num = $value;
		}
		public function setIs_delineas($value){
			 $this->_is_delineas = $value;
		}
		public function setKf_uid($value){
			 $this->_kf_uid = $value;
		}
		public function setPay_item($value){
			 $this->_pay_item = $value;
		}
		public function setAtt_cash($value){
			 $this->_att_cash = $value;
		}
		public function setContact($value){
			 $this->_contact = $value;
		}
		public function setUnique_num($value){
			 $this->_unique_num = $value;
		}
		public function setExt_time($value){
			 $this->_ext_time = $value;
		}
		public function setExt_desc($value){
			 $this->_ext_desc = $value;
		}
		public function setTask_union($value){
			 $this->_task_union = $value;
		}
		public function setAlipay_trust($value){
			 $this->_alipay_trust = $value;
		}
		public function setIs_delay($value){
			 $this->_is_delay = $value;
		}
		public function setR_task_id($value){
			 $this->_r_task_id = $value;
		}
		public function setIs_trust($value){
			 $this->_is_trust = $value;
		}
		public function setTrust_type($value){
			 $this->_trust_type = $value;
		}
		public function setIs_top($value){
			 $this->_is_top = $value;
		}
		public function setIs_auto_bid($value){
			 $this->_is_auto_bid = $value;
		}
		public function setPoint($value){
			 $this->_point = $value;
		}
		public function setPayitem_time($value){
			 $this->_payitem_time = $value;
		}
		public function setAge_requirement($value){
			 $this->_age_requirement = $value;
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
		function create_keke_witkey_task(){
		 		 $data =  array();
					if(!is_null($this->_task_id)){
				 $data['task_id']=$this->_task_id;
			}
			if(!is_null($this->_model_id)){
				 $data['model_id']=$this->_model_id;
			}
			if(!is_null($this->_work_count)){
				 $data['work_count']=$this->_work_count;
			}
			if(!is_null($this->_single_cash)){
				 $data['single_cash']=$this->_single_cash;
			}
			if(!is_null($this->_profit_rate)){
				 $data['profit_rate']=$this->_profit_rate;
			}
			if(!is_null($this->_task_fail_rate)){
				 $data['task_fail_rate']=$this->_task_fail_rate;
			}
			if(!is_null($this->_task_status)){
				 $data['task_status']=$this->_task_status;
			}
			if(!is_null($this->_task_title)){
				 $data['task_title']=$this->_task_title;
			}
			if(!is_null($this->_task_desc)){
				 $data['task_desc']=$this->_task_desc;
			}
			if(!is_null($this->_task_file)){
				 $data['task_file']=$this->_task_file;
			}
			if(!is_null($this->_task_pic)){
				 $data['task_pic']=$this->_task_pic;
			}
			if(!is_null($this->_indus_id)){
				 $data['indus_id']=$this->_indus_id;
			}
			if(!is_null($this->_indus_pid)){
				 $data['indus_pid']=$this->_indus_pid;
			}
			if(!is_null($this->_uid)){
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_start_time)){
				 $data['start_time']=$this->_start_time;
			}
			if(!is_null($this->_sub_time)){
				 $data['sub_time']=$this->_sub_time;
			}
			if(!is_null($this->_end_time)){
				 $data['end_time']=$this->_end_time;
			}
			if(!is_null($this->_sp_end_time)){
				 $data['sp_end_time']=$this->_sp_end_time;
			}
			if(!is_null($this->_city)){
				 $data['city']=$this->_city;
			}
			if(!is_null($this->_task_cash)){
				 $data['task_cash']=$this->_task_cash;
			}
			if(!is_null($this->_real_cash)){
				 $data['real_cash']=$this->_real_cash;
			}
			if(!is_null($this->_task_cash_coverage)){
				 $data['task_cash_coverage']=$this->_task_cash_coverage;
			}
			if(!is_null($this->_cash_cost)){
				 $data['cash_cost']=$this->_cash_cost;
			}
			if(!is_null($this->_credit_cost)){
				 $data['credit_cost']=$this->_credit_cost;
			}
			if(!is_null($this->_view_num)){
				 $data['view_num']=$this->_view_num;
			}
			if(!is_null($this->_work_num)){
				 $data['work_num']=$this->_work_num;
			}
			if(!is_null($this->_leave_num)){
				 $data['leave_num']=$this->_leave_num;
			}
			if(!is_null($this->_focus_num)){
				 $data['focus_num']=$this->_focus_num;
			}
			if(!is_null($this->_mark_num)){
				 $data['mark_num']=$this->_mark_num;
			}
			if(!is_null($this->_is_delineas)){
				 $data['is_delineas']=$this->_is_delineas;
			}
			if(!is_null($this->_kf_uid)){
				 $data['kf_uid']=$this->_kf_uid;
			}
			if(!is_null($this->_pay_item)){
				 $data['pay_item']=$this->_pay_item;
			}
			if(!is_null($this->_att_cash)){
				 $data['att_cash']=$this->_att_cash;
			}
			if(!is_null($this->_contact)){
				 $data['contact']=$this->_contact;
			}
			if(!is_null($this->_unique_num)){
				 $data['unique_num']=$this->_unique_num;
			}
			if(!is_null($this->_ext_time)){
				 $data['ext_time']=$this->_ext_time;
			}
			if(!is_null($this->_ext_desc)){
				 $data['ext_desc']=$this->_ext_desc;
			}
			if(!is_null($this->_task_union)){
				 $data['task_union']=$this->_task_union;
			}
			if(!is_null($this->_alipay_trust)){
				 $data['alipay_trust']=$this->_alipay_trust;
			}
			if(!is_null($this->_is_delay)){
				 $data['is_delay']=$this->_is_delay;
			}
			if(!is_null($this->_r_task_id)){
				 $data['r_task_id']=$this->_r_task_id;
			}
			if(!is_null($this->_is_trust)){
				 $data['is_trust']=$this->_is_trust;
			}
			if(!is_null($this->_trust_type)){
				 $data['trust_type']=$this->_trust_type;
			}
			if(!is_null($this->_is_top)){
				 $data['is_top']=$this->_is_top;
			}
			if(!is_null($this->_is_auto_bid)){
				 $data['is_auto_bid']=$this->_is_auto_bid;
			}
			if(!is_null($this->_point)){
				 $data['point']=$this->_point;
			}
			if(!is_null($this->_payitem_time)){
				 $data['payitem_time']=$this->_payitem_time;
			}
			if(!is_null($this->_age_requirement)){
				 $data['age_requirement']=$this->_age_requirement;
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
			 return $this->_task_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);
		 }
		function edit_keke_witkey_task(){
		 		 $data =  array();
					if(!is_null($this->_task_id)){
				 $data['task_id']=$this->_task_id;
			}
			if(!is_null($this->_model_id)){
				 $data['model_id']=$this->_model_id;
			}
			if(!is_null($this->_work_count)){
				 $data['work_count']=$this->_work_count;
			}
			if(!is_null($this->_single_cash)){
				 $data['single_cash']=$this->_single_cash;
			}
			if(!is_null($this->_profit_rate)){
				 $data['profit_rate']=$this->_profit_rate;
			}
			if(!is_null($this->_task_fail_rate)){
				 $data['task_fail_rate']=$this->_task_fail_rate;
			}
			if(!is_null($this->_task_status)){
				 $data['task_status']=$this->_task_status;
			}
			if(!is_null($this->_task_title)){
				 $data['task_title']=$this->_task_title;
			}
			if(!is_null($this->_task_desc)){
				 $data['task_desc']=$this->_task_desc;
			}
			if(!is_null($this->_task_file)){
				 $data['task_file']=$this->_task_file;
			}
			if(!is_null($this->_task_pic)){
				 $data['task_pic']=$this->_task_pic;
			}
			if(!is_null($this->_indus_id)){
				 $data['indus_id']=$this->_indus_id;
			}
			if(!is_null($this->_indus_pid)){
				 $data['indus_pid']=$this->_indus_pid;
			}
			if(!is_null($this->_uid)){
				 $data['uid']=$this->_uid;
			}
			if(!is_null($this->_username)){
				 $data['username']=$this->_username;
			}
			if(!is_null($this->_start_time)){
				 $data['start_time']=$this->_start_time;
			}
			if(!is_null($this->_sub_time)){
				 $data['sub_time']=$this->_sub_time;
			}
			if(!is_null($this->_end_time)){
				 $data['end_time']=$this->_end_time;
			}
			if(!is_null($this->_sp_end_time)){
				 $data['sp_end_time']=$this->_sp_end_time;
			}
			if(!is_null($this->_city)){
				 $data['city']=$this->_city;
			}
			if(!is_null($this->_task_cash)){
				 $data['task_cash']=$this->_task_cash;
			}
			if(!is_null($this->_real_cash)){
				 $data['real_cash']=$this->_real_cash;
			}
			if(!is_null($this->_task_cash_coverage)){
				 $data['task_cash_coverage']=$this->_task_cash_coverage;
			}
			if(!is_null($this->_cash_cost)){
				 $data['cash_cost']=$this->_cash_cost;
			}
			if(!is_null($this->_credit_cost)){
				 $data['credit_cost']=$this->_credit_cost;
			}
			if(!is_null($this->_view_num)){
				 $data['view_num']=$this->_view_num;
			}
			if(!is_null($this->_work_num)){
				 $data['work_num']=$this->_work_num;
			}
			if(!is_null($this->_leave_num)){
				 $data['leave_num']=$this->_leave_num;
			}
			if(!is_null($this->_focus_num)){
				 $data['focus_num']=$this->_focus_num;
			}
			if(!is_null($this->_mark_num)){
				 $data['mark_num']=$this->_mark_num;
			}
			if(!is_null($this->_is_delineas)){
				 $data['is_delineas']=$this->_is_delineas;
			}
			if(!is_null($this->_kf_uid)){
				 $data['kf_uid']=$this->_kf_uid;
			}
			if(!is_null($this->_pay_item)){
				 $data['pay_item']=$this->_pay_item;
			}
			if(!is_null($this->_att_cash)){
				 $data['att_cash']=$this->_att_cash;
			}
			if(!is_null($this->_contact)){
				 $data['contact']=$this->_contact;
			}
			if(!is_null($this->_unique_num)){
				 $data['unique_num']=$this->_unique_num;
			}
			if(!is_null($this->_ext_time)){
				 $data['ext_time']=$this->_ext_time;
			}
			if(!is_null($this->_ext_desc)){
				 $data['ext_desc']=$this->_ext_desc;
			}
			if(!is_null($this->_task_union)){
				 $data['task_union']=$this->_task_union;
			}
			if(!is_null($this->_alipay_trust)){
				 $data['alipay_trust']=$this->_alipay_trust;
			}
			if(!is_null($this->_is_delay)){
				 $data['is_delay']=$this->_is_delay;
			}
			if(!is_null($this->_r_task_id)){
				 $data['r_task_id']=$this->_r_task_id;
			}
			if(!is_null($this->_is_trust)){
				 $data['is_trust']=$this->_is_trust;
			}
			if(!is_null($this->_trust_type)){
				 $data['trust_type']=$this->_trust_type;
			}
			if(!is_null($this->_is_top)){
				 $data['is_top']=$this->_is_top;
			}
			if(!is_null($this->_is_auto_bid)){
				 $data['is_auto_bid']=$this->_is_auto_bid;
			}
			if(!is_null($this->_point)){
				 $data['point']=$this->_point;
			}
			if(!is_null($this->_payitem_time)){
				 $data['payitem_time']=$this->_payitem_time;
			}
			if(!is_null($this->_age_requirement)){
				 $data['age_requirement']=$this->_age_requirement;
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
				 $where = array('task_id' => $this->_task_id);
				 return $this->_db->updatetable($this->_tablename,$data,$where);
			}
		 }
		function query_keke_witkey_task($is_cache=0, $cache_time=0){
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
		function count_keke_witkey_task(){
			 if($this->_where){
				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where;
			 }
			 else{
				 $sql = "select count(*) as count from $this->_tablename";
			 }
			 $this->_where = "";
			 return $this->_dbop->getCount($sql);
		 }
		function del_keke_witkey_task(){
			 if($this->_where){
				 $sql = "delete from $this->_tablename where ".$this->_where;
			 }
			 else{
				 $sql = "delete from $this->_tablename where task_id = $this->_task_id ";
			 }
			 $this->_where = "";
			 return $this->_dbop->execute($sql);
		 }
   }
 ?>