<?php
if (isset($formhash)&&kekezu::submitcheck($formhash)){
	if (strtoupper ( CHARSET ) == 'GBK') {
		$tar_content = kekezu::utftogbk( $tar_content );
	}
	$tar_content = kekezu::escape($tar_content);
	$aid = implode(",",array_keys($star));
	$aid_star = implode(",",array_values($star));
	$res = keke_user_mark_class::exec_mark($markId, $tar_content,$mark_status,$aid,$aid_star);
    if($res===true){
    	kekezu::show_msg ( '操作成功', $strJumpUrl, 3, NULL, 'ok' );
    }else{
    	kekezu::show_msg ( $res, $strJumpUrl, 3, NULL, 'fail' );
    }
} else {
	$arrMark = keke_user_mark_class::get_mark_info ( array ('model_code' => $code, 'obj_id' => $objId,'by_uid'=>$uid,'uid'=>$to_uid) );
	$markInfo = $arrMark ['mark_info'] ['0'];
	$markInfo or   kekezu::show_msg($_lang['operate_notice'],"","",$_lang['mark_sya_busy_try_later'],"error");
	$aidList = keke_user_mark_class::get_mark_aid ( $roleType );
	$aidInfo=keke_user_mark_class::get_user_aid($markInfo['by_uid'],$markInfo['mark_type'],$markInfo['mark_status'],2,$markInfo['model_code'],$objId);
}
require keke_tpl_class::template ( "tpl/default/ajax/mark" );die;