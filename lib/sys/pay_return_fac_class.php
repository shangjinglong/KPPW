<?php
keke_lang_class::load_lang_class('pay_return_fac_class');
class pay_return_fac_class {
	public $_model_id;
	public $_uid;
	public $_username;
	public $_charge_type;
	public $_order_id;
	public $_total_fee;
	public $_obj_id;
	public $_userinfo;
	public $_pay_type;
	function __construct($charge_type, $model_id = '', $uid = '', $obj_id = '', $order_id = '', $total_fee = '', $pay_type) {
		$this->_userinfo = kekezu::get_user_info ( $uid );
		$this->_model_id = intval ( $model_id );
		$this->_uid = intval ( $uid );
		$this->_username = $this->_userinfo ['username'];
		$this->_charge_type = $charge_type;
		$this->_order_id = intval ( $order_id );
		$this->_total_fee = $total_fee;
		$this->_obj_id = intval ( $obj_id );
		$this->_pay_type = $pay_type;
	}
	function load() {
		global $model_list;
		$type 	  = $this->_charge_type;
		$response = $this->user_charge ();
		$model_id = $this->_model_id;
		if($type=='payitem_charge'){
			PayitemClass::dispose_order($this->_order_id);
		}else{
			if ($model_id) {
				$model_dir = $model_list [$this->_model_id] ['model_dir'];
				$m = $model_dir . "_pay_return_class";
				$pay_obj = new $m ( $type, $this->_model_id, $this->_uid, $this->_obj_id, $this->_order_id, $this->_total_fee );
				$response = $pay_obj->order_charge ();
			}
		}
		return $response;
	}
	private function user_charge() {
		global $_K;
		global $_lang;
		$uid = $this->_uid;
		$order_id = $this->_order_id;
		if ($this->_charge_type == 'order_charge') {
			$order_id = keke_order_class::create_user_charge_order ( 'online_charge', $this->_pay_type, $this->_total_fee,$this->_obj_id,$_lang['user_recharge'], 'wait', $this->_uid, $this->_username );
		}
		$order_info = db_factory::get_one ( sprintf ( " select order_status,order_type from %switkey_order_charge where order_id='%d' and uid='%d'", TABLEPRE, $order_id, $uid ) );
		if ($order_info ['order_status'] == 'wait') { 
			db_factory::execute ( sprintf ( " update %switkey_order_charge set order_status='ok' where order_id='%d'", TABLEPRE, $order_id ) );
			$res = keke_finance_class::cash_in ( $uid, $this->_total_fee, $order_info ['order_type'], $this->_charge_type, 'user_charge', $order_id );
			$v_arr = array ($_lang['recharge_account'] => $this->_total_fee );
			keke_shop_class::notify_user ( $this->_uid, $this->_username, "pay_success", $_lang['online_recharge_success'], $v_arr );
		}else{
			$res = true;
		}
		if($res){
			return $this->struct_response($_lang['operate_notice'],$_lang['online_recharge_success'],$url,'success');
		}else{
			return $this->struct_response($_lang['operate_notice'],$_lang['online_recharge_fail'],$url,'warning');
		}
	}
	public function return_notify($pay_mode,$response=array()){
		global $_K;
		global $_lang;
		$pay_config   = kekezu::get_payment_config ( $pay_mode );
		if(empty($response)){
			$response['title']   = $_lang['operate_notice'];
			$response['content'] = $_lang['pay'].$_lang['fail'];
			$response['url'] 	= $_K['siteurl'];
			$response['type'] 	= 'warning';
		}else{
			$response['title']   = $_lang['operate_notice'];
			$response['type']=='success';
			$response['content'] = $pre.$response['content'];
		}
		header('Location:'.$response['url']);
	}
	public static function struct_response($title,$content,$url,$type='success'){
		$response = array();
		$response['title'] 	 = $title;
		$response['content'] = $content;
		$response['url']  	 = $url;
		$response['type'] 	 = $type;
		return $response;
	}
}