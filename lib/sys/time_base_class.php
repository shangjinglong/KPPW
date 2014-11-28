<?php
abstract class time_base_class {
	var $_basic_config;
	var $_model_id;
	var $_a_uinfo;
	var $_a_winfo;
	var $_a_pinfo;
	var $_a_prinfo;
	var $_a_fina_arr;
	var $_a_tedit_arr;
	var $_a_uedit_arr;
	var $_a_wedit_arr;
	var $_a_predit_arr;
	var $_a_feed_arr;
	var $_a_notify_arr;
	var $_a_agree_arr;
	function __construct(){
		global $basic_config;
		$this->_basic_config=$basic_config;
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
	abstract public function validtaskstatus();
	protected function get_user_info($uid){
		if (!$this->_a_uinfo[$uid])
		{
			$this->_a_uinfo[$uid] = kekezu::get_user_info($uid);
		}
		return $this->_a_uinfo[$uid];
	}
	protected function getusercredit($uid){
		if (!$this->_a_uinfo[$uid])
		{
			$this->_a_uinfo[$uid] = kekezu::get_user_info($uid);
		}
		return $this->_a_uinfo[$uid]['credit']+$this->_a_uedit_arr[$uid]['credit'];
	}
	protected function getusercash($uid){
		if (!$this->_a_uinfo[$uid])
		{
			$this->_a_uinfo[$uid] = kekezu::get_user_info($uid);
		}
		return $this->_a_uinfo[$uid]['balance']+$this->_a_uedit_arr[$uid]['balance'];
	}
	protected function timeaddnotify($title,$content,$uid,$username){
		$temp = array();
		$temp['title']=$title;
		$temp['on_time']=time();
		$temp['content']=$content;
		$temp['recive_uid']=$uid;
		$temp['username']=$username;
		$this->_a_notify_arr[] = $temp;
	}
	protected function timeaddfeed($title,$uid,$username="",$feedtype="",$objid=0){
		$temp = array();
		$temp['title']=$title;
		$temp['uid']=$uid;
		$temp['username']=$username;
		$temp['feedtype']=$feedtype;
		$temp['obj_id'] = $objid;
		$temp['feed_time']=time();
		$this->_a_feed_arr[] = $temp;
	}
	protected function excuteupdate(){
	}
	protected function excutecommon(){
		if ($this->_a_uedit_arr){
				$user_sql = "update ".TABLEPRE."witkey_space set balance = balance+case uid";
				$t_temp_sql = "";
				$t_task_tids = array();
				foreach ($this->_a_uedit_arr as $k=>$v){
					$user_sql.=" when $k then '".($v['balance']+0)."'";
					$t_temp_sql.=" when $k then '".($v['credit']+0)."'";
					$t_user_uids[] = $k;
				}
				$user_sql .= " end,";
				$user_sql .= " credit = credit+case uid ".$t_temp_sql." end";
				$user_sql .= " where uid in (".implode(',',$t_user_uids).")";
				db_factory::execute($user_sql);
		}
		if ($this->_a_notify_arr){
			$noti_sql = "insert into ".TABLEPRE."witkey_message (title,content,recive_uid,recive_username,on_time) values";
			$i =0;
			foreach ($this->_a_notify_arr as $noti){
				if ($i++){
					$noti_sql.=",";
				}
				$noti_sql .="('".$noti['title']."','".($noti['content'])."','".($noti['recive_uid']+0)."','{$noti['username']}',".(($noti['on_time']+0)).")";
			}
			db_factory::execute($noti_sql);
		}
		if ($this->_a_feed_arr){
			$feed_sql = "insert into ".TABLEPRE."witkey_feed (title,uid,username,feedtype,obj_id,feed_time) values";
			$i =0;
			foreach ($this->_a_feed_arr as $feed){
				if ($i++){
					$feed_sql.=",";
				}
				$feed_sql .="('".$feed['title']."','".($feed['uid']+0)."','".$feed['username']."','{$feed['feedtype']}','".($feed['obj_id']+0)."','".($feed['feed_time']+0)."')";
			}
			db_factory::execute($feed_sql);
		}
		if ($this->_a_fina_arr){
			$fina_sql = "insert into ".TABLEPRE."witkey_finance (fina_type,fina_action,uid,username,obj_id,fina_cash,user_balance,fina_credit,user_credit,fina_time,site_profit)  values ";
			$i =0;
			foreach ($this->_a_fina_arr as $fina){
				if ($i++){
					$fina_sql.=",";
				}
				$fina_sql .="('".$fina['fina_type']."','".$fina['fina_action']."','".($fina['uid']+0)."','{$fina['username']}','".($fina['task_id']+0)."','".($fina['fina_cash']+0)."','".($fina['user_balance']+0)."','".($fina['fina_credit']+0)."','".($fina['user_credit']+0)."','".($fina['fina_time']+0)."','".($fina['site_profit']+0)."')";
			}
			db_factory::execute($fina_sql);
			db_factory::execute("update ".TABLEPRE."witkey_finance set unique_num = CONCAT('88',LPAD(fina_id,8,'0')) where !ifnull(unique_num,0) ");
		}
	}
}
?>