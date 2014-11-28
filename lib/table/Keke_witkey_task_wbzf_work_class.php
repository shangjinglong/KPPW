<?php
class Keke_witkey_task_wbzf_work_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_zfwk_id;
	public $_task_id;
	public $_work_id;
	public $_wb_type;
	public $_fans;
	public $_wb_url;
	public $_wb_account;
	public $_wb_sid;
	public $_get_cash;
	public $_wb_data;
	public $_hf_num;
	public $_focus_num;
	public $_wb_num;
	public $_faver_num;
	public $_create_day;
	public $_fgd_num;
	public $_hyd_num;
	public $_cbd_num;
	public $_yxl_num;
	public $_wb_leve;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_task_wbzf_work_class(){
		$this->_db = new db_factory ( );
		$this->_dbop = $this->_db->create(DBTYPE);
		$this->_tablename = TABLEPRE."witkey_task_wbzf_work";
	}
	public function getZfwk_id(){
		return $this->_zfwk_id ;
	}
	public function getTask_id(){
		return $this->_task_id ;
	}
	public function getWork_id(){
		return $this->_work_id ;
	}
	public function getWb_type(){
		return $this->_wb_type ;
	}
	public function getFans(){
		return $this->_fans ;
	}
	public function getWb_url(){
		return $this->_wb_url ;
	}
	public function getWb_account(){
		return $this->_wb_account ;
	}
	public function getWb_sid(){
		return $this->_wb_sid ;
	}
	public function getGet_cash(){
		return $this->_get_cash ;
	}
	public function getWb_data(){
		return $this->_wb_data ;
	}
	public function getHf_num(){
		return $this->_hf_num ;
	}
	public function getFocus_num(){
		return $this->_focus_num ;
	}
	public function getWb_num(){
		return $this->_wb_num ;
	}
	public function getFaver_num(){
		return $this->_faver_num ;
	}
	public function getCreate_day(){
		return $this->_create_day ;
	}
	public function getFgd_num(){
		return $this->_fgd_num ;
	}
	public function getHyd_num(){
		return $this->_hyd_num ;
	}
	public function getCbd_num(){
		return $this->_cbd_num ;
	}
	public function getYxl_num(){
		return $this->_yxl_num ;
	}
	public function getWb_leve(){
		return $this->_wb_leve ;
	}
	public function getWhere(){
		return $this->_where ;
	}
	public function getCache_config() {
		return $this->_cache_config;
	}
	public function setZfwk_id($value){
		$this->_zfwk_id = $value;
	}
	public function setTask_id($value){
		$this->_task_id = $value;
	}
	public function setWork_id($value){
		$this->_work_id = $value;
	}
	public function setWb_type($value){
		$this->_wb_type = $value;
	}
	public function setFans($value){
		$this->_fans = $value;
	}
	public function setWb_url($value){
		$this->_wb_url = $value;
	}
	public function setWb_account($value){
		$this->_wb_account = $value;
	}
	public function setWb_sid($value){
		$this->_wb_sid = $value;
	}
	public function setGet_cash($value){
		$this->_get_cash = $value;
	}
	public function setWb_data($value){
		$this->_wb_data = $value;
	}
	public function setHf_num($value){
		$this->_hf_num = $value;
	}
	public function setFocus_num($value){
		$this->_focus_num = $value;
	}
	public function setWb_num($value){
		$this->_wb_num = $value;
	}
	public function setFaver_num($value){
		$this->_faver_num = $value;
	}
	public function setCreate_day($value){
		$this->_create_day = $value;
	}
	public function setFgd_num($value){
		$this->_fgd_num = $value;
	}
	public function setHyd_num($value){
		$this->_hyd_num = $value;
	}
	public function setCbd_num($value){
		$this->_cbd_num = $value;
	}
	public function setYxl_num($value){
		$this->_yxl_num = $value;
	}
	public function setWb_leve($value){
		$this->_wb_leve = $value;
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
	function create_keke_witkey_task_wbzf_work(){
		$data =  array();
		if(!is_null($this->_zfwk_id)){
			$data['zfwk_id']=$this->_zfwk_id;
		}
		if(!is_null($this->_task_id)){
			$data['task_id']=$this->_task_id;
		}
		if(!is_null($this->_work_id)){
			$data['work_id']=$this->_work_id;
		}
		if(!is_null($this->_wb_type)){
			$data['wb_type']=$this->_wb_type;
		}
		if(!is_null($this->_fans)){
			$data['fans']=$this->_fans;
		}
		if(!is_null($this->_wb_url)){
			$data['wb_url']=$this->_wb_url;
		}
		if(!is_null($this->_wb_account)){
			$data['wb_account']=$this->_wb_account;
		}
		if(!is_null($this->_wb_sid)){
			$data['wb_sid']=$this->_wb_sid;
		}
		if(!is_null($this->_get_cash)){
			$data['get_cash']=$this->_get_cash;
		}
		if(!is_null($this->_wb_data)){
			$data['wb_data']=$this->_wb_data;
		}
		if(!is_null($this->_hf_num)){
			$data['hf_num']=$this->_hf_num;
		}
		if(!is_null($this->_focus_num)){
			$data['focus_num']=$this->_focus_num;
		}
		if(!is_null($this->_wb_num)){
			$data['wb_num']=$this->_wb_num;
		}
		if(!is_null($this->_faver_num)){
			$data['faver_num']=$this->_faver_num;
		}
		if(!is_null($this->_create_day)){
			$data['create_day']=$this->_create_day;
		}
		if(!is_null($this->_fgd_num)){
			$data['fgd_num']=$this->_fgd_num;
		}
		if(!is_null($this->_hyd_num)){
			$data['hyd_num']=$this->_hyd_num;
		}
		if(!is_null($this->_cbd_num)){
			$data['cbd_num']=$this->_cbd_num;
		}
		if(!is_null($this->_yxl_num)){
			$data['yxl_num']=$this->_yxl_num;
		}
		if(!is_null($this->_wb_leve)){
			$data['wb_leve']=$this->_wb_leve;
		}
		return $this->_zfwk_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);
	}
	function edit_keke_witkey_task_wbzf_work(){
		$data =  array();
		if(!is_null($this->_zfwk_id)){
			$data['zfwk_id']=$this->_zfwk_id;
		}
		if(!is_null($this->_task_id)){
			$data['task_id']=$this->_task_id;
		}
		if(!is_null($this->_work_id)){
			$data['work_id']=$this->_work_id;
		}
		if(!is_null($this->_wb_type)){
			$data['wb_type']=$this->_wb_type;
		}
		if(!is_null($this->_fans)){
			$data['fans']=$this->_fans;
		}
		if(!is_null($this->_wb_url)){
			$data['wb_url']=$this->_wb_url;
		}
		if(!is_null($this->_wb_account)){
			$data['wb_account']=$this->_wb_account;
		}
		if(!is_null($this->_wb_sid)){
			$data['wb_sid']=$this->_wb_sid;
		}
		if(!is_null($this->_get_cash)){
			$data['get_cash']=$this->_get_cash;
		}
		if(!is_null($this->_wb_data)){
			$data['wb_data']=$this->_wb_data;
		}
		if(!is_null($this->_hf_num)){
			$data['hf_num']=$this->_hf_num;
		}
		if(!is_null($this->_focus_num)){
			$data['focus_num']=$this->_focus_num;
		}
		if(!is_null($this->_wb_num)){
			$data['wb_num']=$this->_wb_num;
		}
		if(!is_null($this->_faver_num)){
			$data['faver_num']=$this->_faver_num;
		}
		if(!is_null($this->_create_day)){
			$data['create_day']=$this->_create_day;
		}
		if(!is_null($this->_fgd_num)){
			$data['fgd_num']=$this->_fgd_num;
		}
		if(!is_null($this->_hyd_num)){
			$data['hyd_num']=$this->_hyd_num;
		}
		if(!is_null($this->_cbd_num)){
			$data['cbd_num']=$this->_cbd_num;
		}
		if(!is_null($this->_yxl_num)){
			$data['yxl_num']=$this->_yxl_num;
		}
		if(!is_null($this->_wb_leve)){
			$data['wb_leve']=$this->_wb_leve;
		}
		if($this->_where){
			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());
		}
		else{
			$where = array('zfwk_id' => $this->_zfwk_id);
			return $this->_db->updatetable($this->_tablename,$data,$where);
		}
	}
	function query_keke_witkey_task_wbzf_work($is_cache=0, $cache_time=0){
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
	function count_keke_witkey_task_wbzf_work(){
		if($this->_where){
			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;
		}
		else{
			$sql = "select count(*) as count from $this->_tablename";
		}
		$this->_where = "";
		return $this->_dbop->getCount($sql);
	}
	function del_keke_witkey_task_wbzf_work(){
		if($this->_where){
			$sql = "delete from $this->_tablename where ".$this->_where;
		}
		else{
			$sql = "delete from $this->_tablename where zfwk_id = $this->_zfwk_id ";
		}
		$this->_where = "";
		return $this->_dbop->execute($sql);
	}
}
?>