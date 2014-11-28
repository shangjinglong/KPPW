<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (73);
$msg_obj = new Keke_witkey_msg_config_class();
$message_send_type = keke_glob_class::get_message_send_type ();
$message_send_obj  = keke_glob_class::get_message_send_obj();
if (isset ( $sbt_edit )) {
	if (is_array ( $fds )) {
		foreach ( $fds as $k => $v ) {
			$send_type = array ();
			switch ($v ['send_open']) {
				case 0 : 
					foreach ( $message_send_type ['0'] as $v2 ) {
						$send_type [$v2] = intval ( 0 );
					}
					break;
				case 1 : 
					switch (! empty ( $ckb [$k] )) {
						case 1 :
							foreach ( $ckb [$k] as $k3 => $v3 ) {
								$send_type [$k3] = intval ( $v3 );
							}
							break;
						case 0 :
							foreach ( $message_send_type ['0'] as $v2 ) {
								$send_type [$v2] = intval ( 0 );
							}
							break;
					}
					break;
			}
			$msg_obj->setWhere ( "config_id= $k" );
			$send_type = serialize ( $send_type );
			$msg_obj->setV ( $send_type );
			$msg_obj->setOn_time ( time () );
			$res .= $msg_obj->edit_keke_witkey_msg_config();
		}
	}
	if ($res) {
		kekezu::admin_system_log($_lang['msg_config_log']);
		$kekezu->_cache_obj->set ( "keke_witkey_msg_config", $msg_config );
		kekezu::admin_show_msg ( $_lang['sms_internal_config_success'], "index.php?do=msg&view=internal",3,'','success' );
	}
}else{
	$page_obj=$kekezu->_page_obj;
	$where=" 1 = 1 ";
	intval($page) 	   or $page='1';
	intval($page_size) or $page_size='10';
	$url="index.php?do=$do&view=$view&obj=$obj";
	$obj  and $where.=" and obj = '$obj' ";
	$where .=" order by config_id asc ";
	$msg_obj->setWhere($where);
	$count=intval($msg_obj->count_keke_witkey_msg_config());
	$pages=$page_obj->getPages($count, $page_size, $page, $url);
	$msg_obj->setWhere($where.$pages['where']);
	$msg_config =$msg_obj->query_keke_witkey_msg_config();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_msg_' . $view );