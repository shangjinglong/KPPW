<?php
keke_lang_class::load_lang_class('keke_auth_base_class');
abstract class keke_auth_base_class {
	public $_auth_item;
	public $_auth_code;
	public $_auth_name;
	public $_auth_obj;
	public $_auth_table_name;
	public $_tab_obj; 
	public $_primary_key; 
	public function __construct($auth_code) {
		$this->_auth_code = $auth_code;
		$this->_auth_name = $auth_code . "_auth";
		$this->_auth_table_name = "witkey_auth_" . $auth_code;
	}
	public static  function get_auth_item($auth_code=null,$find_str=null,$is_open=false,$w=null,$cache=true) {
		global $_cache_obj;
			$auth_code&&is_array($auth_code) and $auth_code=implode(",", $auth_code);
			$auth_code and ( is_array($auth_code) and  $where =" auth_code in ('$auth_code') " or $where =" auth_code = '$auth_code'" ) or $where = " 1 = 1";
			$find_str and $fds = $find_str or $fds = '*';
			$is_open and $where .= " and auth_open=1 ";
			$w      and $where.=" and ".$w;
			$cache==true and $c=null or $c=0;
			$auth_item=kekezu::get_table_data($fds,"witkey_auth_item", $where,'listorder asc','','','auth_code',$c);
			if($auth_code&&!is_array($auth_code)){
				return $auth_item[$auth_code];
			}else{
				return $auth_item;
			}
	}
	public function set_auth_record_status($uid,$status) {
		return db_factory::execute(sprintf(" update %switkey_auth_record set auth_status = '%d' where auth_code= '%s' and uid = '%d'",TABLEPRE,$status,$this->_auth_code,$uid));
	}
	public function set_auth_status($auth_id,$status){
		return db_factory::execute(sprintf(" update %s set auth_status = '$status' where %s = '%d'",TABLEPRE.$this->_auth_table_name,$this->_primary_key,$auth_id));
	}
	public function add_auth_record($uid,$username, $auth_code,$end_time, $data = array(),$auth_status='0') {
		$record_obj  = new Keke_witkey_auth_record_class ();
		$record_info = db_factory::get_one(sprintf(" select * from %switkey_auth_record where uid = '%d' and auth_code = '%s'",TABLEPRE,$uid,$auth_code));
		if ($record_info ['ext_data'] && $data) {
			$odata  =  unserialize ( $record_info ['ext_data'] );
			$odata and $data = array_merge ( $odata, $data );
		}
		$record_obj->setAuth_code ( $auth_code );
		$record_obj->setUid($uid );
		$record_obj->setUsername($username );
		if($data){
			is_array($data) and $data=serialize($data);
			$data and $record_obj->setExt_data ($data);
		}
		$record_obj->setEnd_time ($end_time);
		if ($record_info) {
			$record_obj->setWhere ( 'record_id = ' . $record_info ['record_id'] );
			return $record_obj->edit_keke_witkey_auth_record ();
		} else {
			$record_obj->setAuth_status ($auth_status);
			return $record_obj->create_keke_witkey_auth_record ();
		}
	}
	public function del_auth_record($uid) {
		return db_factory::execute(sprintf(" delete from %switkey_auth_record where uid= '%d' and auth_code = '%s'",TABLEPRE,$uid,$this->_auth_code));
	}
	public function format_auth_apply($data){
		global $kekezu;
		$auth_info           = $this->get_auth_item($this->_auth_code,'auth_expir,auth_cash,auth_code','','',false);
		$data['uid']         = $kekezu->_userinfo['uid'];
		$data['username']    = $kekezu->_userinfo['username'];
		$data['start_time']  = time();
		$data['cash']        = $auth_info['auth_cash'];
		$data['auth_status'] = '0';
		$data['end_time']    = time()+$auth_info ['auth_expir'] * 3600 * 24;
		return $data;
	}
	public function get_auth_info($auth_ids){
		if(isset($auth_ids)){
			if(!stristr($auth_ids,',')) {
			 	return  db_factory::query(sprintf(" select * from %s where %s = '%s'",TABLEPRE.$this->_auth_table_name,$this->_primary_key,$auth_ids));
			}else{
				return db_factory::query(sprintf(" select * from %s where %s in (%s) ",TABLEPRE.$this->_auth_table_name,$this->_primary_key,$auth_ids));
			}
		}else{
			return array();
		}
	}
	public function get_user_auth_info($uid,$is_username=0,$show_id=''){
		$sql="select * from ".TABLEPRE.$this->_auth_table_name;
		if($uid){
			$is_username=='0' and $sql.=" where uid = '$uid' " or $sql.=" where username = '$uid' ";
			$show_id and $sql.=" and ".$this->_primary_key."=".$show_id;
			$sql .=" order by $this->_primary_key desc";
			$data = db_factory::query($sql);
			if(sizeof($data)==1){
				return $data[0];
			}else{
				return $data;
			}
		}else{
			return array();
		}
	}
	public function auth_lang(){
		global $_lang;
		$lang=array("realname"=>$_lang['realname_auth'],
					"bank"=>$_lang['bank_auth'],
					"email"=>$_lang['email_auth'],
					"enterprise"=>$_lang['enterprise_auth'],
					"mobile"=>$_lang['mobile_auth'],
					"weibo"=>$_lang['weibo_auth']);
		return $lang[$this->_auth_code];
	}
	abstract function add_auth($data,$file_name = '');
	public function del_auth($auth_ids,$url=null) {
		global $_lang;
			$url ="index.php?do=auth&view=list&code=".$this->_auth_code;
		is_array($auth_ids) and $ids=implode(",",$auth_ids) or $ids=$auth_ids;
		$auth_info=$this->get_auth_info($ids);
		$size=sizeof($auth_info);
		$size==0 and kekezu::admin_show_msg($this->auth_lang(). $_lang['apply_not_exist_delete_fail'],$url);
		if($size==1){
			if($auth_info[0]['auth_status']!='1'){
				$res = $this->_tab_obj->del($this->_primary_key,$auth_ids);
				$this->del_auth_record($auth_info[0]['uid']);
			}else{
				kekezu::admin_show_msg('已通过认证的禁止删除',$url,3,'','warning');
			}
			$this->_auth_code=='enterprise' and $this->set_user_role($auth_info[0][uid],'not_pass');
		}elseif($size>1){
			foreach ($auth_info as $v){
				if($v['auth_status'] !=1){
					$this->_tab_obj->del($this->_primary_key,$auth_ids);
					$this->del_auth_record($v['uid']);
				}else{
					kekezu::admin_show_msg('已通过认证的禁止删除',$url,3,'','warning');
				}
			}
		}
		kekezu::admin_show_msg($this->auth_lang(). $_lang['apply_delete_success'],$url,3,'','success');
	}
	public function review_auth($auth_ids,$type='pass',$url=null){
		global $_lang;
		global $kekezu;
		if($url===null){
			$url = $_SERVER['HTTP_REFERER'];
		}
		$prom_obj = keke_prom_class::get_instance ();
		is_array($auth_ids) and $auth_ids=implode(",",$auth_ids);
		$auth_info=$this->get_auth_info($auth_ids);
		$size=sizeof($auth_info);
		$size>0&&$type=='pass' and $status='1' or $status='2';
		$size==0 and kekezu::admin_show_msg($this->auth_lang(). $_lang['apply_not_exist_audit_fail'],$_SERVER['HTTP_REFERER']);
		if($size==1&&$auth_info[0]['auth_status']!='1'){
			$this->set_auth_status($auth_info[0][$this->_primary_key],$status);
			$this->set_auth_record_status($auth_info[0]['uid'], $status);
			$this->_auth_code=='realname'&&$status==1 and $this->extract_birth($auth_info[0]['uid'],$auth_info[0]['id_card']);
		}elseif($size>1){
			foreach ($auth_info as $v){
				if($v['auth_status']!='1'){
				$this->set_auth_record_status($v['uid'], $status);
				$this->set_auth_status($v[$this->_primary_key],$status);
				$this->_auth_code=='realname'&&$status==1 and $this->extract_birth($v['uid'],$v['id_card']);
		 		}
			}
		}
		switch ($type){
			case "pass":
				kekezu::admin_system_log($this->auth_lang(). $_lang['apply_pass'] . "$auth_ids");
				foreach ($auth_info as $v){
					if($this->_auth_code=='enterprise'){
						$this->set_user_role($auth_info[0][uid],$type);
					}elseif($this->_auth_code=='realname'){
						$this->set_user_role($auth_info[0][uid],$type);
					}
					 $feed_arr = array(
				 		"feed_username"=>array("content"=>$v[username],"url"=>"index.php?do=seller&id=$v[uid]"),
						"action"=>array("content"=>$_lang['has_pass'],"url"=>""),
						"event"=>array("content"=>$this->auth_lang(),"url"=>"")
				 	);
					kekezu::save_feed($feed_arr, $v['uid'],$v['username'],$this->_auth_name );
					$prom_obj->dispose_prom_event('reg',$v['uid'], $v['uid']);
					$auth_arr  = keke_glob_class::get_finance_action();
					$arr[$_lang['auth_code']] =  $auth_arr[$this->_auth_name];
					$arr[$_lang['auth_url']] = "index.php?do=user&view=payitem&op=auth&auth_code=$this->_auth_code";
					keke_msg_class::notify_user($v['uid'],$v['username'],'auth_success', $auth_arr[$this->_auth_name].$_lang['through'],$arr);
				}
				$url = 'HTTP://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?do=auth&view=list&code={$this->_auth_code}";
				kekezu::admin_show_msg($this->auth_lang().$_lang['apply_audit_success'],$url,3,'','success');
				break;
			case "not_pass":
				kekezu::admin_system_log($this->auth_lang().$_lang['apply_not_pass']."$auth_ids");
				kekezu::admin_show_msg($this->auth_lang().$_lang['apply_audit_not_pass'],$url,3,'','success');
				break;
		}
	}
	public function set_user_role($uid,$action='pass'){
		if($this->_auth_code=='enterprise'){
			$action=='pass' and $user_role='2' or $user_role='1';
		}elseif($this->_auth_code=='realname'){
		    $user_role='1';
		}
		db_factory::execute(sprintf(" update %switkey_space set user_type='%d' where uid='%d'",TABLEPRE,$user_role,$uid));
		db_factory::execute(sprintf(" update %switkey_shop set shop_type='%d' where uid='%d'",TABLEPRE,$user_role,$uid));
	}
	private function extract_birth($uid,$idcard){
		switch (strlen($idcard)){
			case 15:
				$y = '19'.substr($idcard,6,2);
				$m = substr($idcard,8,2);
				$d = substr($idcard,10,2);
				break;
			case 18:
				$y = substr($idcard,6,4);
				$m = substr($idcard,10,2);
				$d = substr($idcard,12,2);
				break;
		}
		$f = $y.'-'.$m.'-'.$d;
		db_factory::execute(sprintf("update %switkey_space set birthday='%s' where uid='%d'",TABLEPRE,$f,$uid));
	}
}