<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (170);
$table_obj = keke_table_class::get_instance ( 'witkey_shop' );
$shop_obj = new Keke_witkey_shop_class (); 
intval ( $page ) or $page = 1;
intval ( $wh ['page_size'] ) or $wh ['page_size'] = 10;
$url = "index.php?do=$do&view=$view&txt_username=$txt_username&txt_shop_id=$txt_shop_id&page=$page&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}&wh[page_size]={$wh['page_size']}";
$status_arr = array("0"=>"待审核","1"=>"开启","2"=>"审核不通过","3"=>"关闭");
$shop_type_arr = array("1"=>"个人店铺","2"=>"企业店铺");
switch ($ac) {
	case "del" : 
		$shop_info = db_factory::get_one(sprintf("select * from %switkey_shop where shop_id=%d",TABLEPRE,$shop_id));
		$res = $table_obj->del('shop_id', $shop_id);
	    kekezu::admin_show_msg('操作提示',$url,3,'删除成功！','success');
		break;
	case "pass" : 
		$shop_info = db_factory::get_one(sprintf("select * from %switkey_shop where shop_id=%d",TABLEPRE,$shop_id));
		$shop_obj->setWhere("shop_id=".$shop_id);
		$shop_obj->setShop_status(1);
		$shop_obj->edit_keke_witkey_shop();
		$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=seller&id=" . $shop_info['uid'] . "\">" . $shop_info['shop_name']. "</a>";
		$v_arr = array($_lang['username']=>"{$shop_info['username']}",'店铺名称'=>$notice_url);
		keke_shop_class::notify_user($shop_info['uid'], $shop_info['username'], 'shop_auth_success', '店铺审核通过',$v_arr);
		kekezu::admin_show_msg($_lang['operate_notice'],$url,2,$_lang['examine_successfully'],'success');
		break;
	case "nopass" : 
		$shop_info = db_factory::get_one(sprintf("select * from %switkey_shop where shop_id=%d",TABLEPRE,$shop_id));
		$shop_obj->setWhere("shop_id=".$shop_id);
		$shop_obj->setShop_status(2);
		$shop_obj->edit_keke_witkey_shop();
		$v_arr = array($_lang['username']=>"{$shop_info['username']}",'店铺名称'=>$shop_info['shop_name']);
		keke_shop_class::notify_user($shop_info['uid'], $shop_info['username'], 'shop_auth_fail', $_lang['task_auth_fail'],$v_arr);
		kekezu::admin_show_msg($_lang['operate_notice'],$url,2,$_lang['operate_success'],'success');
		break;
	case "open" : 
		$shop_info = db_factory::get_one(sprintf("select * from %switkey_shop where shop_id=%d",TABLEPRE,$shop_id));
		$shop_obj->setWhere("shop_id=".$shop_id);
		$shop_obj->setShop_status(1);
		$res = $shop_obj->edit_keke_witkey_shop();
		$res and db_factory::execute(sprintf("update %switkey_service set service_status = 2 where uid = %d",TABLEPRE,$shop_info['uid']));
		$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=seller&member_id=" . $shop_info['uid'] . "\">" . $shop_info['shop_name']. "</a>";
		$v_arr = array($_lang['username']=>"{$shop_info['username']}",'店铺名称'=>$notice_url);
		keke_shop_class::notify_user($shop_info['uid'], $shop_info['username'], 'shop_open', '店铺开启',$v_arr);
		kekezu::admin_show_msg($_lang['operate_notice'],$url,2,$_lang['operate_success'],'success');
		break;
	case 'recommend':
		$sql = sprintf ( "update  %switkey_space set recommend=1 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang['recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], $url, 3, '', 'success' );
		break;
	case 'move_recommend':
		$sql = sprintf ( "update  %switkey_space set recommend=0 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang['move_recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_success'], $url, 3, '', 'success' );
		break;
}
$count = $shop_obj->count_keke_witkey_shop();
$sql = "select a.*,b.recommend from ".TABLEPRE."witkey_shop a left join ".TABLEPRE."witkey_space b on a.uid=b.uid ";
$where = ' where 1 = 1'; 
	empty ( $txt_shop_id ) or $where .= " and a.shop_id =" . intval ( $txt_shop_id );
	empty ( $txt_name ) or $where .= " and a.username like '%$txt_name%'";
	$w[ord][1]&&$w[ord][0] and $where .= " order by {$w['ord']['0']} {$w['ord']['1']}" or $where .= " order by shop_id desc ";
$kekezu->_page_obj->setAjax(1);
$kekezu->_page_obj->setAjaxDom("ajax_dom");
$pages = $kekezu->_page_obj->getPages ( $count, $wh['page_size'], $page, $url );
$sql.=$where.$pages['where'];
$shop_data =db_factory::query($sql);
function get_on_sale($uid){
	$order_count = db_factory::get_one(sprintf("select count(order_id) as count from %switkey_order where seller_uid = '%d'",TABLEPRE,$uid));
	return $order_count['count'];
}
function get_good_num($uid){
	$order_count = db_factory::get_one(sprintf("select count(service_id) as count from %switkey_service where uid = '%d'",TABLEPRE,$uid));
	return $order_count['count'];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );