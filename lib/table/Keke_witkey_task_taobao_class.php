<?php
class Keke_witkey_task_taobao_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_taobao_id;	public $_task_id;	public $_wb_platform;	public $_is_focus;	public $_is_comment;	public $_is_at;	public $_is_zf;	public $_zf_url;	public $_wb_content;	public $_wb_img;	public $_at_num;	public $_at_user;	public $_assign;	public $_taobao_user;	public $_zf_obj;	public $_unit_price;
	public $_click_count;
	public $_pay_amount;	public $_sy_amount;	public $_is_repost;	public $_ten_content;	public $_prom_url;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_taobao_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_task_taobao";	}	 
	public function getTaobao_id(){		return $this->_taobao_id ;	}	public function getTask_id(){		return $this->_task_id ;	}	public function getWb_platform(){		return $this->_wb_platform ;	}	public function getIs_focus(){		return $this->_is_focus ;	}	public function getIs_comment(){		return $this->_is_comment ;	}	public function getIs_at(){		return $this->_is_at ;	}	public function getIs_zf(){		return $this->_is_zf ;	}	public function getZf_url(){		return $this->_zf_url ;	}	public function getWb_content(){		return $this->_wb_content ;	}	public function getWb_img(){		return $this->_wb_img ;	}	public function getAt_num(){		return $this->_at_num ;	}	public function getAt_user(){		return $this->_at_user ;	}	public function getAssign(){		return $this->_assign ;	}	public function getTaobao_user(){		return $this->_taobao_user ;	}	public function getZf_obj(){		return $this->_zf_obj ;	}	public function getUnit_price(){		return $this->_unit_price ;	}
	public function getClick_count(){
		return $this->_click_count ;
	}
	public function getPay_amount(){
		return $this->_pay_amount;
	}	public function getSy_amount(){		return $this->_sy_amount ;	}	public function getIs_repost(){		return $this->_is_repost ;	}	public function getTen_content(){		return $this->_ten_content ;	}	public function getProm_url(){		return $this->_prom_url ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setTaobao_id($value){		$this->_taobao_id = $value;	}	public function setTask_id($value){		$this->_task_id = $value;	}	public function setWb_platform($value){		$this->_wb_platform = $value;	}	public function setIs_focus($value){		$this->_is_focus = $value;	}	public function setIs_comment($value){		$this->_is_comment = $value;	}	public function setIs_at($value){		$this->_is_at = $value;	}	public function setIs_zf($value){		$this->_is_zf = $value;	}	public function setZf_url($value){		$this->_zf_url = $value;	}	public function setWb_content($value){		$this->_wb_content = $value;	}	public function setWb_img($value){		$this->_wb_img = $value;	}	public function setAt_num($value){		$this->_at_num = $value;	}	public function setAt_user($value){		$this->_at_user = $value;	}	public function setAssign($value){		$this->_assign = $value;	}	public function setTaobao_user($value){		$this->_taobao_user = $value;	}	public function setZf_obj($value){		$this->_zf_obj = $value;	}	public function setUnit_price($value){		$this->_unit_price = $value;	}	public function setSy_amount($value){		$this->_sy_amount = $value;	}
	public function setPay_amount($value){
		return $this->_pay_amount=$value;
	}
	public function setClick_count($value){
		return $this->_click_count=$value ;
	}	public function setIs_repost($value){		$this->_is_repost = $value;	}	public function setTen_content($value){		$this->_ten_content = $value;	}	public function setProm_url($value){		$this->_prom_url = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
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
		function create_keke_witkey_task_taobao(){		$data =  array();		if(!is_null($this->_taobao_id)){			$data['taobao_id']=$this->_taobao_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_wb_platform)){			$data['wb_platform']=$this->_wb_platform;		}		if(!is_null($this->_is_focus)){			$data['is_focus']=$this->_is_focus;		}		if(!is_null($this->_is_comment)){			$data['is_comment']=$this->_is_comment;		}		if(!is_null($this->_is_at)){			$data['is_at']=$this->_is_at;		}		if(!is_null($this->_is_zf)){			$data['is_zf']=$this->_is_zf;		}		if(!is_null($this->_zf_url)){			$data['zf_url']=$this->_zf_url;		}		if(!is_null($this->_wb_content)){			$data['wb_content']=$this->_wb_content;		}		if(!is_null($this->_wb_img)){			$data['wb_img']=$this->_wb_img;		}		if(!is_null($this->_at_num)){			$data['at_num']=$this->_at_num;		}		if(!is_null($this->_at_user)){			$data['at_user']=$this->_at_user;		}		if(!is_null($this->_assign)){			$data['assign']=$this->_assign;		}		if(!is_null($this->_taobao_user)){			$data['taobao_user']=$this->_taobao_user;		}		if(!is_null($this->_zf_obj)){			$data['zf_obj']=$this->_zf_obj;		}		if(!is_null($this->_unit_price)){			$data['unit_price']=$this->_unit_price;		}
		if(!is_null($this->_pay_amount)){
			$data['pay_amount']=$this->_pay_amount;
		}		if(!is_null($this->_sy_amount)){			$data['sy_amount']=$this->_sy_amount;		}
		if(!is_null($this->_click_count)){
			$data['click_count']=$this->_click_count;
		}		if(!is_null($this->_is_repost)){			$data['is_repost']=$this->_is_repost;		}		if(!is_null($this->_ten_content)){			$data['ten_content']=$this->_ten_content;		}		if(!is_null($this->_prom_url)){			$data['prom_url']=$this->_prom_url;		}		return $this->_taobao_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
		function edit_keke_witkey_task_taobao(){		$data =  array();		if(!is_null($this->_taobao_id)){			$data['taobao_id']=$this->_taobao_id;		}		if(!is_null($this->_task_id)){			$data['task_id']=$this->_task_id;		}		if(!is_null($this->_wb_platform)){			$data['wb_platform']=$this->_wb_platform;		}		if(!is_null($this->_is_focus)){			$data['is_focus']=$this->_is_focus;		}		if(!is_null($this->_is_comment)){			$data['is_comment']=$this->_is_comment;		}		if(!is_null($this->_is_at)){			$data['is_at']=$this->_is_at;		}		if(!is_null($this->_is_zf)){			$data['is_zf']=$this->_is_zf;		}		if(!is_null($this->_zf_url)){			$data['zf_url']=$this->_zf_url;		}		if(!is_null($this->_wb_content)){			$data['wb_content']=$this->_wb_content;		}		if(!is_null($this->_wb_img)){			$data['wb_img']=$this->_wb_img;		}		if(!is_null($this->_at_num)){			$data['at_num']=$this->_at_num;		}		if(!is_null($this->_at_user)){			$data['at_user']=$this->_at_user;		}		if(!is_null($this->_assign)){			$data['assign']=$this->_assign;		}		if(!is_null($this->_taobao_user)){			$data['taobao_user']=$this->_taobao_user;		}		if(!is_null($this->_zf_obj)){			$data['zf_obj']=$this->_zf_obj;		}		if(!is_null($this->_unit_price)){			$data['unit_price']=$this->_unit_price;		}		if(!is_null($this->_sy_amount)){			$data['sy_amount']=$this->_sy_amount;		}
		if(!is_null($this->_pay_amount)){
			$data['pay_amount']=$this->_pay_amount;
		}
		if(!is_null($this->_click_count)){
			$data['click_count']=$this->_click_count;
		}		if(!is_null($this->_is_repost)){			$data['is_repost']=$this->_is_repost;		}		if(!is_null($this->_ten_content)){			$data['ten_content']=$this->_ten_content;		}		if(!is_null($this->_prom_url)){			$data['prom_url']=$this->_prom_url;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('taobao_id' => $this->_taobao_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
		function query_keke_witkey_task_taobao($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
		function count_keke_witkey_task_taobao(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
		function del_keke_witkey_task_taobao(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where taobao_id = $this->_taobao_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}
}
?>