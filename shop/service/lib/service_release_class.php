<?php
class service_release_class extends keke_shop_release_class {
	public static function get_instance($model_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new service_release_class ( $model_id );
		}
		return $obj;
	}
	function __construct($model_id) {
		parent::__construct ( $model_id );
		$this->get_service_config ();
	}
	public function get_service_config() {
		global $model_list;
		$model_list [$this->_model_id] ['config'] and $this->_service_config = unserialize ( $model_list [$this->_model_id] ['config'] ) or $this->_service_config = array ();
	}
	public function pub_service() {
		$service_obj = $this->_service_obj;
		$std_obj = $this->_std_obj;
		$this->public_pubservice();
		$rel_time = $time_arr ['hours'] * 3600 + $time_arr ['minutes'] * 60 + $time_arr ['seconds'];
		$service_obj->setExist_time(strtotime ( $this->_std_obj->_release_info ['txt_exist_day'] ) + $rel_time );
		$service_cash = $this->_std_obj->_release_info['txt_price'];
		$service_obj->setService_status(1);
		$service_id = $service_obj->create_keke_witkey_service();
		return $service_id;
	}
}