<?php
final class service_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->ys_end_time ();
		$this->service_end_time ();
		$this->work_end_time();
		$this->goods_top_end();
	}
	public function ys_end_time() {
		$order_list = db_factory::query ( sprintf ( " select * from %switkey_order where order_status='confirm_complete' and model_id=7 and ys_end_time<%d", TABLEPRE, time () ) );
		if (is_array ( $order_list )) {
			foreach ( $order_list as $k => $v ) {
					$obj = new service_shop_class ();
		            $obj->dispose_order ( $v['order_id'], 'complete' );
			}
		}
	}
	public function service_end_time() {
		$service_list = db_factory::query ( sprintf ( " select * from %switkey_service where service_status=2 and  exist_time < %d and model_id = 7 ", TABLEPRE, time () ) );
		if (is_array ( $service_list )) {
			foreach ( $service_list as $k => $v ) {
				db_factory::execute(sprintf("update %switkey_service set service_status=3 where service_id=%d",TABLEPRE,$v['service_id']));
			}
		}
	}
   public function work_end_time(){
   $order_list = db_factory::query ( sprintf ( " select * from %switkey_order where order_status='ok' and model_id=7 and service_end_time<%d", TABLEPRE, time () ) );
		if (is_array ( $order_list )) {
			foreach ( $order_list as $k => $v ) {
					$obj = new service_shop_class ();
		            $obj->dispose_order ( $v['order_id'], 'over_time_close' );
			}
		}
  }
  public function goods_top_end() {
  	$goods_list = db_factory::query ( sprintf ( " select a.service_id  ,b.end_time from %switkey_service a left join %switkey_payitem_record b on a.service_id=b.obj_id
				 where a.model_id=7 and a.goodstop=1 and b.obj_type='goods' and b.end_time<%d order by service_id desc ", TABLEPRE,TABLEPRE, time () ) );
  	if (is_array ( $goods_list )) {
  		foreach ( $goods_list as $k => $v ) {
  			keke_shop_class::updateGoodsTop($v['service_id']);
  		}
  	}
  }
}