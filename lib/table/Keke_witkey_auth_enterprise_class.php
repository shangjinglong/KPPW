<?php
class Keke_witkey_auth_enterprise_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_enterprise_auth_id;
	public $_uid;
	public $_username;
	public $_company;
	public $_licen_num;
	public $_licen_pic;
	public $_cash;
	public $_start_time;
	public $_end_time;
	public $_auth_status;
	public $_legal;
	public $_staff_num;
	public $_run_years;
	public $_url;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_auth_enterprise_class(){
		$this->_db = new db_factory ( );
		$this->_dbop = $this->_db->create(DBTYPE);
		$this->_tablename = TABLEPRE."witkey_auth_enterprise";
	}
	public function getEnterprise_auth_id(){
		return $this->_enterprise_auth_id ;
	}
	public function getUid(){
		return $this->_uid ;
	}
	public function getUsername(){
		return $this->_username ;
	}
	public function getCompany(){
		return $this->_company ;
	}
	public function getLicen_num(){
		return $this->_licen_num ;
	}
	public function getLicen_pic(){
		return $this->_licen_pic ;
	}
	public function getCash(){
		return $this->_cash ;
	}
	public function getStart_time(){
		return $this->_start_time ;
	}
	public function getEnd_time(){
		return $this->_end_time ;
	}
	public function getAuth_status(){
		return $this->_auth_status ;
	}
	public function getLegal(){
		return $this->_legal ;
	}
	public function getStaff_num(){
		return $this->_staff_num ;
	}
	public function getRun_years(){
		return $this->_run_years ;
	}
	public function getUrl(){
		return $this->_url ;
	}
	public function getWhere(){
		return $this->_where ;
	}
	public function getCache_config() {
		return $this->_cache_config;
	}
	public function setEnterprise_auth_id($value){
		$this->_enterprise_auth_id = $value;
	}
	public function setUid($value){
		$this->_uid = $value;
	}
	public function setUsername($value){
		$this->_username = $value;
	}
	public function setCompany($value){
		$this->_company = $value;
	}
	public function setLicen_num($value){
		$this->_licen_num = $value;
	}
	public function setLicen_pic($value){
		$this->_licen_pic = $value;
	}
	public function setCash($value){
		$this->_cash = $value;
	}
	public function setStart_time($value){
		$this->_start_time = $value;
	}
	public function setEnd_time($value){
		$this->_end_time = $value;
	}
	public function setAuth_status($value){
		$this->_auth_status = $value;
	}
	public function setLegal($value){
		$this->_legal = $value;
	}
	public function setStaff_num($value){
		$this->_staff_num = $value;
	}
	public function setRun_years($value){
		$this->_run_years = $value;
	}
	public function setUrl($value){
		$this->_url = $value;
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
	function create_keke_witkey_auth_enterprise(){
		$data =  array();
		if(!is_null($this->_enterprise_auth_id)){
			$data['enterprise_auth_id']=$this->_enterprise_auth_id;
		}
		if(!is_null($this->_uid)){
			$data['uid']=$this->_uid;
		}
		if(!is_null($this->_username)){
			$data['username']=$this->_username;
		}
		if(!is_null($this->_company)){
			$data['company']=$this->_company;
		}
		if(!is_null($this->_licen_num)){
			$data['licen_num']=$this->_licen_num;
		}
		if(!is_null($this->_licen_pic)){
			$data['licen_pic']=$this->_licen_pic;
		}
		if(!is_null($this->_cash)){
			$data['cash']=$this->_cash;
		}
		if(!is_null($this->_start_time)){
			$data['start_time']=$this->_start_time;
		}
		if(!is_null($this->_end_time)){
			$data['end_time']=$this->_end_time;
		}
		if(!is_null($this->_auth_status)){
			$data['auth_status']=$this->_auth_status;
		}
		if(!is_null($this->_legal)){
			$data['legal']=$this->_legal;
		}
		if(!is_null($this->_staff_num)){
			$data['staff_num']=$this->_staff_num;
		}
		if(!is_null($this->_run_years)){
			$data['run_years']=$this->_run_years;
		}
		if(!is_null($this->_url)){
			$data['url']=$this->_url;
		}
		return $this->_enterprise_auth_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);
	}
	function edit_keke_witkey_auth_enterprise(){
		$data =  array();
		if(!is_null($this->_enterprise_auth_id)){
			$data['enterprise_auth_id']=$this->_enterprise_auth_id;
		}
		if(!is_null($this->_uid)){
			$data['uid']=$this->_uid;
		}
		if(!is_null($this->_username)){
			$data['username']=$this->_username;
		}
		if(!is_null($this->_company)){
			$data['company']=$this->_company;
		}
		if(!is_null($this->_licen_num)){
			$data['licen_num']=$this->_licen_num;
		}
		if(!is_null($this->_licen_pic)){
			$data['licen_pic']=$this->_licen_pic;
		}
		if(!is_null($this->_cash)){
			$data['cash']=$this->_cash;
		}
		if(!is_null($this->_start_time)){
			$data['start_time']=$this->_start_time;
		}
		if(!is_null($this->_end_time)){
			$data['end_time']=$this->_end_time;
		}
		if(!is_null($this->_auth_status)){
			$data['auth_status']=$this->_auth_status;
		}
		if(!is_null($this->_legal)){
			$data['legal']=$this->_legal;
		}
		if(!is_null($this->_staff_num)){
			$data['staff_num']=$this->_staff_num;
		}
		if(!is_null($this->_run_years)){
			$data['run_years']=$this->_run_years;
		}
		if(!is_null($this->_url)){
			$data['url']=$this->_url;
		}
		if($this->_where){
			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());
		}
		else{
			$where = array('enterprise_auth_id' => $this->_enterprise_auth_id);
			return $this->_db->updatetable($this->_tablename,$data,$where);
		}
	}
	function query_keke_witkey_auth_enterprise($is_cache=0, $cache_time=0){
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
	function count_keke_witkey_auth_enterprise(){
		if($this->_where){
			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;
		}
		else{
			$sql = "select count(*) as count from $this->_tablename";
		}
		$this->_where = "";
		return $this->_dbop->getCount($sql);
	}
	function del_keke_witkey_auth_enterprise(){
		if($this->_where){
			$sql = "delete from $this->_tablename where ".$this->_where;
		}
		else{
			$sql = "delete from $this->_tablename where enterprise_auth_id = $this->_enterprise_auth_id ";
		}
		$this->_where = "";
		return $this->_dbop->execute($sql);
	}
}
?>