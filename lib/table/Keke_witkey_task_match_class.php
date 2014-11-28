<?php
class Keke_witkey_task_match_class{
     public $_db;
	 public $_tablename;
	 public $_dbop;
	 public $_mt_id;
	 public $_task_id;
	 public $_hirer_deposit;
	 public $_deposit_cash;
	 public $_deposit_credit;
	 public $_host_amount;
	 public $_host_cash;
	 public $_host_credit;
	 public $_deposit_rate;
	 public $_replace = 0;
	 public $_where;
	 public $_cache_config = array (
					'is_cache' => 0,
					'time' => 0
				);
	function __construct(){
			$this->_db = new db_factory ();
			$this->_dbop = $this->_db->create ( DBTYPE );
			$this->_tablename = TABLEPRE."witkey_task_match";
		}
	public function __set($property_name, $value) {
			$this->$property_name = $value;
		}
	public function __get($property_name) {
			if (isset ( $this->$property_name )) {
				return $this->$property_name;
			} else {
				return null;
			}
		}
	 public function getMt_id(){
			return $this->_mt_id;
		}
	 public function getTask_id(){
			return $this->_task_id;
		}
	 public function getHirer_deposit(){
			return $this->_hirer_deposit;
		}
	 public function getDeposit_cash(){
			return $this->_deposit_cash;
		}
	 public function getDeposit_credit(){
			return $this->_deposit_credit;
		}
	 public function getHost_amount(){
			return $this->_host_amount;
		}
	 public function getHost_cash(){
			return $this->_host_cash;
		}
	 public function getHost_credit(){
			return $this->_host_credit;
		}
	 public function getDeposit_rate(){
			return $this->_deposit_rate;
		}
	 public function getWhere() {
		   return $this->_where;
		}
	public function getCache_config() {
			return $this->_cache_config;
		}
	 public function setMt_id($value){
			return $this->_mt_id=$value;
		}
	 public function setTask_id($value){
			return $this->_task_id=$value;
		}
	 public function setHirer_deposit($value){
			return $this->_hirer_deposit=$value;
		}
	 public function setDeposit_cash($value){
			return $this->_deposit_cash=$value;
		}
	 public function setDeposit_credit($value){
			return $this->_deposit_credit=$value;
		}
	 public function setHost_amount($value){
			return $this->_host_amount=$value;
		}
	 public function setHost_cash($value){
			return $this->_host_cash=$value;
		}
	 public function setHost_credit($value){
			return $this->_host_credit=$value;
		}
	 public function setDeposit_rate($value){
			return $this->_deposit_rate=$value;
		}
	 public function setWhere($value) {
			$this->_where = $value;
		}
	public function setCache_config($_cache_config) {
			$this->_cache_config = $_cache_config;
		}
	function create_keke_witkey_task_match() {
		$data = array ();
		if (! is_null ( $this->_mt_id)) {
			$data [mt_id] = $this->_mt_id;
			}
		if (! is_null ( $this->_task_id)) {
			$data [task_id] = $this->_task_id;
			}
		if (! is_null ( $this->_hirer_deposit)) {
			$data [hirer_deposit] = $this->_hirer_deposit;
			}
		if (! is_null ( $this->_deposit_cash)) {
			$data [deposit_cash] = $this->_deposit_cash;
			}
		if (! is_null ( $this->_deposit_credit)) {
			$data [deposit_credit] = $this->_deposit_credit;
			}
		if (! is_null ( $this->_host_amount)) {
			$data [host_amount] = $this->_host_amount;
			}
		if (! is_null ( $this->_host_cash)) {
			$data [host_cash] = $this->_host_cash;
			}
		if (! is_null ( $this->_host_credit)) {
			$data [host_credit] = $this->_host_credit;
			}
		if (! is_null ( $this->_deposit_rate)) {
			$data [deposit_rate] = $this->_deposit_rate;
			}
		return $this->_mt_id = $this->_db->inserttable ( $this->_tablename, $data, 1, $this->_replace );
	}
	 function delete_keke_witkey_task_match() {
		if ($this->_where) {
			$sql = "delete from $this->_tablename where " . $this->_where;
		} else {
			$sql = "delete from $this->_tablename where $this->_mt_id= $this->_mt_id ";
		}
		$this->_where = "";
		return $this->_dbop->execute ( $sql );
	}
	function edit_keke_witkey_task_match() {
		$data = array ();if (! is_null ( $this->_mt_id)) {
			$data [mt_id] = $this->_mt_id;
			}
		if (! is_null ( $this->_task_id)) {
			$data [task_id] = $this->_task_id;
			}
		if (! is_null ( $this->_hirer_deposit)) {
			$data [hirer_deposit] = $this->_hirer_deposit;
			}
		if (! is_null ( $this->_deposit_cash)) {
			$data [deposit_cash] = $this->_deposit_cash;
			}
		if (! is_null ( $this->_deposit_credit)) {
			$data [deposit_credit] = $this->_deposit_credit;
			}
		if (! is_null ( $this->_host_amount)) {
			$data [host_amount] = $this->_host_amount;
			}
		if (! is_null ( $this->_host_cash)) {
			$data [host_cash] = $this->_host_cash;
			}
		if (! is_null ( $this->_host_credit)) {
			$data [host_credit] = $this->_host_credit;
			}
		if (! is_null ( $this->_deposit_rate)) {
			$data [deposit_rate] = $this->_deposit_rate;
			}
		 if ($this->_where) {
					return $this->_db->updatetable ( $this->_tablename, $data, $this->getWhere () );
			} else {
				$where = array (
					'mt_id' => $this->_mt_id
			);
			return $this->_db->updatetable ( $this->_tablename, $data, $where );
			}
	}
	 function query_keke_witkey_task_match($is_cache = 0, $cache_time = 0) {
			if ($this->_where) {
				$sql = "select * from $this->_tablename where " . $this->_where;
			} else {
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
					$id = $this->_tablename . ($this->_where ? "_" . substr ( md5 ( $this->_where ), 0, 6 ) : '');
					$data = $keke_cache->get ( $id );
					if ($data) {
						return $data;
					} else {
						$res = $this->_dbop->query ( $sql );
						$keke_cache->set ( $id, $res, $this->_cache_config ['time'] );
						$this->_where = "";
						return $res;
					}
				}
			} else {
				$this->_where = "";
				return $this->_dbop->query ( $sql );
			}
	}
	 function count_keke_witkey_task_match() {
				if ($this->_where) {
					$sql = "select count(*) as count from $this->_tablename where " . $this->_where;
				} else {
					$sql = "select count(*) as count from $this->_tablename";
				}
				$this->_where = "";
				return $this->_dbop->getCount ( $sql );
	}
	}