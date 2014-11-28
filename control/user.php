<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$do = trim($do);
$view = trim($view);
$gUid = intval($uid);
$op = trim($op);
$gUserInfo = $user_info;
$arrView = array('index','account','message','transaction','shop','collect','focus','prom','finance','added','prom','finance');
if(false === in_array($view,$arrView)){
	$view ='index';
}
$gUid or header ( "location:index.php?do=login" );
$intCountNotice = db_factory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where uid<1 and view_status!=1 and  to_uid=".intval($gUid));
$intCountPrivate = db_factory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where to_uid = ".intval($gUid)." and view_status!=1 and uid>0 and msg_status<>2 ");
$intCountMessage = intval($intCountNotice+$intCountPrivate);
$strUsersUrl='index.php?do='.$do.'&view='.$view;
$page_title='用户中心';
$arrAuthRecords = kekezu::get_table_data('auth_code,auth_status','witkey_auth_record',"uid=".$gUid,'','','','auth_code');
if(!$op){
	require $do.'/index.php';
	require  $kekezu->_tpl_obj->template($do.'/index');die();
}else{
	require $do.'/'.$view.'_'.$op.'.php';
	require  $kekezu->_tpl_obj->template($do.'/'.$view.'_'.$op);die();
}