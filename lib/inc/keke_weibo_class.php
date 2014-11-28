<?php
class keke_weibo_class extends keke_oauth_base_class {
	function __construct($wb_type,$call_back=null,$url=null){
	  parent::__construct ( $wb_type );
      $oo= new keke_oauth_login_class($wb_type);
      $_SESSION['auth_'.$wb_type]['last_key'] or   	$oo->login($call_back, $url);
    }    
    function post_wb($txt,$img=null){
    	return oauth_api_factory::post_wb($txt,$img);
    }
    function repost_wb($sid, $text = null){
    	return oauth_api_factory::repost_wb($sid, $text);
    }
    function focus_by_uid($uid_or_name){
    	return oauth_api_factory::follow_wb_user($uid_or_name,$this->_wb_type,$this->_app_id,$this->_app_secret);
    }
    function unfocus_by_uid(){
    }
    function get_weibo_by_sid($sid){
    	return oauth_api_factory::get_wb_info($sid);    	
    }
    function get_weibo_list_by_uid(){
    }
    function get_followers_by_uid($wb_uid=null,$count=20){
    	return oauth_api_factory::get_fans_list($wb_uid,'',$count);
    }
	function get_good_followers_by_uid(){
    } 
    function get_user_info_by_uid(){
    }
    function comment_wb_by_wid($sid,$text){
    	return oauth_api_factory::send_comment($sid,$text);
    }
    function del_wb_by_wid(){
    }
    function query_sid($mid){
    	if ($this->_wb_type!='sina'){
    		return;
    	}
    	return oauth_api_factory::query_sid($mid);
    }
    static function build_wb_url($wb_type,$account_id,$sid){
		$r = "";
		switch ($wb_type) {
			case 'sina':
				$r ="http://api.t.sina.com.cn/{$account_id}/statuses/{$sid}";
			break;
			case 'ten':
				$r = "http://t.qq.com/p/t/{$sid}";
			break;
			case 'netease':
				$r = "http://t.163.com/{$account_id}/status/{$sid}";
			break;
			case 'souhu':
				$r = "http://t.sohu.com/u/$sid";
			break;
		}
		return $r;
	}
}
?>