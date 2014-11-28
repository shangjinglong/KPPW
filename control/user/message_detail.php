<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=message&op=detail';
$objMsgT = keke_table_class::get_instance('witkey_msg');
$msgId and $arrMsgInfo  = $objMsgT->get_table_info("msg_id", intval($msgId));
$strType = $type;
if($gUid!=$arrMsgInfo['to_uid']&&$uid!=$arrMsgInfo['uid']){
	kekezu::show_msg($_lang['operate_tips'],$strUrl,1,"您无权查看此消息","warning");
}
if (isset ( $action )&&$action=='delSingle') {
			if ($msgId) {
				$objMsgT->del ( 'msg_id', $msgId );
				kekezu::show_msg ( '删除成功', 'index.php?do=user&view=message&op='.$type.'&intPage='.$intPage, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
}
if($gUid==$arrMsgInfo['to_uid']&&$arrMsgInfo['view_status']<1){
	db_factory::execute("update ".TABLEPRE."witkey_msg set view_status=1 where msg_id = ".intval($msgId));
}
$strWhere = '1=1';
if($strType){
	switch($strType){
		case 'notice':
			$strWhere .= " and uid<1 and to_uid=" . intval ( $gUid );
			break;
		case 'private':
			$strWhere .= " and msg_status<>2 and to_uid = " . intval ( $gUid ) . " and uid>0 ";
			break;
		case 'outbox':
			$strWhere .= " and msg_status<>1 and uid = " . intval ( $gUid );
			break;
	}
}
$arrNext = db_factory::get_one('select * from '.TABLEPRE.'witkey_msg where msg_id<'.$msgId.' and '.$strWhere.' order by msg_id desc limit 0,1');
$arrPre  = db_factory::get_one('select * from '.TABLEPRE.'witkey_msg where msg_id>'.$msgId.' and '.$strWhere.' order by msg_id asc limit 0,1');