<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 30 );
$link_obj = new Keke_witkey_link_class ();
if ($link_id) {
	$link_info = $link_obj->setWhere ( 'link_id=' . $link_id );
	$link_info = $link_obj->query_keke_witkey_link ();
	$link_info = $link_info [0];
	strpos($link_info['link_pic'],"data/")!==FALSE and $mode = 2 or $mode = 1;
}
if ($sbt_edit) {
	$link_obj->setLink_type ( 1 );
	$link_obj->setLink_name ( $txt_link_name );
	if($showMode==1){
		$link_pic = $txt_link_pic;
	}elseif($showMode==2){
		if($_FILES[fle_link_pic][name]){
			$link_pic = keke_file_class::upload_file("fle_link_pic");
		}
	}
	if(!$link_pic){
		$link_pic = 0;
	}
	$link_obj->setLink_pic ( $link_pic );
	$link_obj->setLink_url ( $txt_link_url );
	$link_obj->setLink_status ( 1 );
	$link_obj->setListorder ( intval ( $txt_listorder ) );
	$link_obj->setOn_time ( time () );
	if ($hdn_link_id) {
		$link_obj->setLink_id ( $hdn_link_id );
		$res = $link_obj->edit_keke_witkey_link (); 
		if ($res) {
			kekezu::admin_system_log ( $_lang['links_edit'] . $hdn_link_id );
			kekezu::admin_show_msg ( $_lang['links_edit_success'], 'index.php?do=' . $do . '&view=ink&page='.$page,3,'','success' );
		}
	} else {
		$res = $link_obj->create_keke_witkey_link (); 
		if ($res) {
			kekezu::admin_system_log ( $_lang['links_add'] . $res );
			kekezu::admin_show_msg ( $_lang['links_edit_success'], 'index.php?do=' . $do . '&view=ink&page='.$page,3,'','success' );
		}
	}
}
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );