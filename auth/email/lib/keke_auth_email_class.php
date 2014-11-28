<?php
keke_lang_class::load_lang_class('keke_auth_email_class');
class keke_auth_email_class extends keke_auth_base_class{
public static function get_instance($code='email') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_email_class($code);
		}
		return $obj;
	}
	public function __construct($code='email') {
		parent::__construct($code);
		$this->_primary_key     ='email_a_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($step=null,$arrAuthInfo=array()){
		if($step){
			$step=$step;
		}elseif($arrAuthInfo){
			if($arrAuthInfo['auth_status']==1 || $arrAuthInfo['auth_status']==2){
				$step="step3";
			}else{
				$step="step2";
			}
		}else {
			$step='step1';
		}
		return $step;
	}
	public function add_auth($email,$file_name = ''){
		global $_K,$user_info,$_lang;
		$data['email']=$email;
		$data=$this->format_auth_apply($data);
		$data ['email'] or kekezu::show_msg ( $this->auth_lang().$_lang['apply_submit_fail'],$_SERVER['HTTP_REFERER'], 3, $this->auth_lang().$_lang['apply_fail_and_info_fail'], 'warning' );
		$data['auth_time'] = time();
		$arrAuthInfo=$this->get_user_auth_info($user_info[uid]);
		if($arrAuthInfo){
			$success=$this->_tab_obj->save($data,array($this->_primary_key=>$arrAuthInfo[$this->_primary_key]));
			$success and $success=$arrAuthInfo[$this->_primary_key];
				$this->set_auth_record_status($user_info['uid'], '0');
		}else{
			$success=$this->_tab_obj->save($data);
		}
		if ($success) {
			if($this->send_mail($success,$data)){
				$data['start_time']==$data['end_time'] and $end_time=$data['end_time'] or $end_time=0;
				db_factory::execute(" update ".TABLEPRE."witkey_space set email = '$data[email]' where uid = '$data[uid]'");
				db_factory::execute(" update ".TABLEPRE."witkey_member set email = '$data[email]' where uid = '$data[uid]'");
				return $this->add_auth_record($data['uid'], $data['username'], $this->_auth_code,$end_time);
			}
		}
	}
	public function audit_auth($active_code,$email_a_id){
		global $_K, $kekezu,$_lang;
		$user_info=$kekezu->_userinfo;
		if(md5($user_info['uid'].$user_info['username'].$user_info['email'])==$active_code){
			$arrAuthInfo=$this->get_auth_info($email_a_id);
			if(empty($arrAuthInfo[0])){
				return false;
			}
			$this->set_auth_status($arrAuthInfo[0][$this->_primary_key],'1');
			$this->set_auth_record_status($arrAuthInfo[0]['uid'], '1');
			$objProm = keke_prom_class::get_instance ();
			$objProm->dispose_prom_event('reg',$user_info['uid'],$user_info['uid']);
			$feed_arr = array(
			 		"feed_username"=>array("content"=>$user_info[username],"url"=>"index.php?do=seller&id=$user_info[uid]"),
					"action"=>array("content"=>$_lang['have_passed'],"url"=>""),
					"event"=>array("content"=>$this->auth_lang(),"url"=>"")
			 	);
			kekezu::save_feed($feed_arr, $user_info['uid'],$user_info['username'],'email_auth' );
			$v_arr = array($_lang['auth_code']=>$this->auth_lang(),$_lang['auth_url']=>$_K ['siteurl'] . '/index.php?do=user&view=account&op=auth&code=email&ver=1#userCenter');
			keke_msg_class::notify_user($user_info['uid'], $user_info['username'], 'auth_success',$this->auth_lang().$_lang['success'],$v_arr );
			return true;
		}
		return false;
	}
	public function send_mail($email_a_id,$data){
		global $_K,$_lang;
		$md5_code = md5($data['uid'].$data['username'].$data['email']);
		$title = $_K['html_title'].'--'.$_lang['email_auth'];
		$body = '<font color="red">'.$_K['html_title'].$_lang['__email_auth'].'</font><br><br>&nbsp;&nbsp;&nbsp;'.$_lang['please_click_email_auth_url'].'<a href="'
			.$_K[siteurl].'/index.php?do=user&view=account&op=auth&code=email&email_a_id='.$email_a_id.'&ac=check_email&step=step3&ver=1&active_code='.$md5_code.'">'
			.$_K[siteurl].'/index.php?do=user&view=account&op=auth&code=email&email_a_id='
			.$email_a_id.'&ac=check_email&step=step3&ver=1&active_code='.$md5_code.'</a>,如果链接无法点击，请复制以下链接到浏览器中执行'.$_K[siteurl].'/index.php?do=user&view=account&op=auth&code=email&email_a_id='.$email_a_id.'&ac=check_email&step=step3&ver=1&active_code='.$md5_code;
		return kekezu::send_mail($data['email'],$title,$body);
	}
}
?>