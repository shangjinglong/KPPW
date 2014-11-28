<?php
if($op=='add'){
	$objFollowT = keke_table_class::get_instance('witkey_free_follow');
	$countFollow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($gUid),intval($id)));
	if($countFollow){
		kekezu::show_msg ( '你已经关注过该用户', NULL, NULL, NULL, 'fail' );
	}else{
		$arrFd['uid'] = $gUid;
		$arrFd['fuid'] = intval($id);
		$arrFd['on_time'] = time();
		 $objFollowT->save($arrFd);
		kekezu::show_msg ( '关注成功', NULL, NULL, NULL, 'ok' );
	}
}elseif($op=='del'){
	$objFollowT = new Keke_witkey_free_follow_class();
	$objFollowT->setWhere('uid = '.intval($gUid).' and fuid = '.intval($id));
	$objFollowT->del_keke_witkey_free_follow();
	kekezu::show_msg ( '取消关注成功', NULL, NULL, NULL, 'ok' );
}
die();