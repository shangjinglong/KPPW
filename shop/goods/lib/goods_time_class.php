<?php
final class goods_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->ys_end_time ();
		$this->goods_top_end();
	}
	public function ys_end_time() {
		$order_list = db_factory::query ( sprintf ( " select * from %switkey_order where order_status='ok' and model_id=6 and ys_end_time<%d order by order_id desc ", TABLEPRE, time () ) );
		if (is_array ( $order_list )) {
			foreach ( $order_list as $k => $v ) {
					$obj = new goods_shop_class();
		            $obj->dispose_order ( $v['order_id'], 'confirm','sys' );
			}
		}
	}
	public function goods_top_end() {
		$goods_list = db_factory::query ( sprintf ( " select a.service_id  ,b.end_time from %switkey_service a left join %switkey_payitem_record b on a.service_id=b.obj_id
				 where a.model_id=6 and a.goodstop=1 and b.obj_type='goods' and b.end_time<%d order by service_id desc ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $goods_list )) {
	  		foreach ( $goods_list as $k => $v ) {
	  			keke_shop_class::updateGoodsTop($v['service_id']);
	  		}
	  	}
	}
}