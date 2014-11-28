<?php
class keke_oauth_login_class extends keke_oauth_base_class {
	public $_url ;
 	function __construct($wb_type) {
 		parent::__construct ( $wb_type );
	}
	function login($call_back,$url) {
		global $oauth_verifier,$code,$_K;
		if (isset($code) && $this->_wb_type=='sina'){
			$oauth_verifier = array('code'=>$code,'redirect_uri'=>$url);
		}
		if ($call_back) {
			if(isset($code) && $this->_wb_type=='sina'){
				if($oauth_verifier){
					oauth_api_factory::create_access_token ( $oauth_verifier, $this->_wb_type, $this->_app_id, $this->_app_secret );
					$oauth_user_info = $this->get_login_user_info ();
					$bind_info = keke_register_class::is_oauth_bind ( $this->_wb_type, $oauth_user_info ['account'] );
					if ($oauth_user_info && $bind_info) {
						$user_info = kekezu::get_user_info ( $bind_info ['uid'] );
						$login_obj = new keke_user_login_class ();
						$login_user_info = $login_obj->user_login ( $user_info ['username'], $user_info ['password'], null, 1 );
						$login_obj->save_user_info ( $login_user_info, 1 );
					}else{
						$_SESSION['wb_type'] = $this->_wb_type;
						header ( "Location:$_K[siteurl]/index.php?do=index");
						die ();
					}
				}else{
					header("Location:$_K[siteurl]/index.php?do=login");die();
				}
			}else{
				oauth_api_factory::create_access_token ( $oauth_verifier, $this->_wb_type, $this->_app_id, $this->_app_secret );
				$oauth_user_info = $this->get_login_user_info ();
				$bind_info = keke_register_class::is_oauth_bind ( $this->_wb_type, $oauth_user_info ['account'] );
				if ($oauth_user_info && $bind_info) {
					$user_info = kekezu::get_user_info ( $bind_info ['uid'] );
					$login_obj = new keke_user_login_class ();
					$login_user_info = $login_obj->user_login ( $user_info ['username'], $user_info ['password'], null, 1 );
					$login_obj->save_user_info ( $login_user_info, 1 );
				}else{
					$_SESSION['wb_type'] = $this->_wb_type;
					header ( "Location:$_K[siteurl]/index.php?do=index");
					die ();
				}
			}
		}
		$this->_url = $url;
		if (oauth_api_factory::get_access_token ( $this->_wb_type, $this->_app_id, $this->_app_secret )) {
			return true;
		} else {
			$aurl = oauth_api_factory::get_auth_url ("$url&call_back=1", $this->_wb_type, $this->_app_id, $this->_app_secret );
			header ( 'Location:' . $aurl );
			die ();
		}
	}
	function get_login_user_info(){
		$user_auth_info = oauth_api_factory::get_login_info ( $this->_wb_type, $this->_app_id, $this->_app_secret );
		if($user_auth_info){
			return oauth_api_factory::user_data_format ( $user_auth_info, $this->_wb_type, $this->_app_id, $this->_app_secret );	
		}else{
			return false;
		}
	}
	function logout() {
		oauth_api_factory::clear_access_token($this->_wb_type, $this->_app_id, $this->_app_secret);
	}
	function get_user_info() {
	}
}
?>