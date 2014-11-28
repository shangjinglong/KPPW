<?php
abstract class keke_oauth_base_class {
	protected  $_wb_type ;
	protected  $_kekezu;
	protected  $_app_id;
	protected  $_app_secret;
	protected  $_oauth_obj; 
	public function __construct($wb_type){
		global $kekezu;
		$this->_kekezu = $kekezu;
		$this->_wb_type = $wb_type;
		require_once S_ROOT.'./keke_client/weibo/client.php';
		$this->init_api_config();
		$this->_oauth_obj = oauth_api_factory::get_o($wb_type, $this->_app_id, $this->_app_secret);
	}
	function init_api_config(){
		if($this->_wb_type){
			$this->_app_id  = $this->_kekezu->_sys_config[$this->_wb_type."_app_id"];
			$this->_app_secret = $this->_kekezu->_sys_config[$this->_wb_type."_app_secret"];
		}
	}
}
?>