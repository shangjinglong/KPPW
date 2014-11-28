<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$objMsgT = keke_table_class::get_instance ( 'witkey_msg' );
$strUrl = 'index.php?do=user&view=message&op=notice';
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
if (isset ( $action )) {
	switch ($action) {
		case 'mulitDel' :
			if ($ckb) {
				$objMsgT->del ( 'msg_id', $ckb );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
		case 'delSingle' :
			if ($objId) {
				$objMsgT->del ( 'msg_id', $objId );
				kekezu::show_msg ( '删除成功', $strUrl, NULL, NULL, 'ok' );
			} else {
				kekezu::show_msg ( '删除失败', NULL, NULL, NULL, 'error' );
			}
			break;
		case 'mulitView' :
			if ($ckb) {
				is_array ( $ckb ) and $strMsgId = implode ( ",", $ckb );
				$arrDatas = db_factory::query ( "select * from " . TABLEPRE . "witkey_msg where msg_id in ($strMsgId)" );
				foreach ( $arrDatas as $v ) {
					if ($gUid == $v ['to_uid'] && $v ['view_status'] < 1) {
						db_factory::execute ( "update " . TABLEPRE . "witkey_msg set view_status=1 where msg_id = " . intval ( $v ['msg_id'] ) );
					}
				}
			} else {
				kekezu::show_msg ( '设置失败', NULL, NULL, NULL, 'error' );
			}
			kekezu::show_msg ( '设置成功', $strUrl, NULL, NULL, 'ok' );
			break;
	}
} else {
	$strWhere = " uid<1 and to_uid=" . intval ( $gUid );
	$page and $intPage = intval ( $page );
	$intPage = intval ( $intPage ) ? $intPage : 1;
	$intPagesize = intval ( $intPagesize ) ? $intPagesize : 10;
	$strWhere .= " order by msg_id desc";
	$arrDatas = $objMsgT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
	$arrMessageLists = $arrDatas ['data'];
	$strPages = $arrDatas ['pages'];
}
