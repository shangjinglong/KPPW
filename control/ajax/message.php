<?php
if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	$objMsgM = new Keke_witkey_msg_class ();
	if (strtoupper ( CHARSET ) == 'GBK') {
		$to_username = kekezu::utftogbk($to_username );
	}
	$arrSpaceInfo = kekezu::get_user_info ( $to_username, 1 );
	if (! $arrSpaceInfo) {
		$tips['errors']['to_username'] = '用户不存在';
		kekezu::show_msg($tips,NULL,NULL,NULL,'error');
	}
	if ($arrSpaceInfo ['uid'] == $gUid) {
		$tips['errors']['to_username'] = '无法给自己发送';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	if (strtoupper ( CHARSET ) == 'GBK') {
		$title = kekezu::utftogbk($title );
		$content = kekezu::utftogbk($content );
	}
	$objMsgM->setUid ( $gUid );
	$objMsgM->setUsername ( $username );
	$objMsgM->setTo_uid ( $arrSpaceInfo ['uid'] );
	$objMsgM->setTo_username ( $arrSpaceInfo ['username'] );
	$objMsgM->setTitle ( kekezu::str_filter ( kekezu::escape ( $title ) ) );
	$objMsgM->setContent ( kekezu::str_filter ( kekezu::escape ( $content ) ) );
	$objMsgM->setOn_time ( time () );
	$objMsgM->create_keke_witkey_msg ();
	unset ( $objMsgM );
	kekezu::show_msg ( '已发送', NULL, NULL, NULL, 'ok' );
}else{
	$userArrData = keke_user_class::get_user_info($id);
}
