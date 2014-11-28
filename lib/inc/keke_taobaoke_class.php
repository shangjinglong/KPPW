<?php
require_once S_ROOT . '/keke_client/taoapi/lib/taoapi_get.php';
class keke_taobaoke_class {
	public static function get_shop_info($nick) {
		$taoapi = new taoapi_get ( 'shop', array('nick'=>$nick));
		$data = $taoapi->send ();
		$status=1;
		$data['code']&&$status=0;
		kekezu::echojson('',$status,$data);
	}
	public static function get_user_info($nick,$oauth=false) {
		$taoapi = new taoapi_get ( 'user', array('nick'=>$nick) );
		$data = $taoapi->send ();
		$status=1;
		$data['code']&&$status=0;
		if($oauth){
			return $data;	
		}
		kekezu::echojson('',$status,$data);
	}
	public static function get_item_info($num_iid) {
		$taoapi = new taoapi_get ( 'item', array('num_iid'=>$num_iid) );
		$data = $taoapi->send ();
		$status=1;
		$data['code']&&$status=0;
		kekezu::echojson('',$status,$data);
	}
	public static function get_items_info($nicks,$page_no='1',$page_size='6') {
		$taoapi = new taoapi_get ( 'items_search2', array('nicks'=>$nicks,'page_no'=>$page_no,'page_size'=>$page_size));
		$data = $taoapi->send ();
		return $data['item_search']['items']['item'];
	}
}
