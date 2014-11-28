<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 41 );
$nav_list = kekezu::get_table_data ( '*', 'witkey_nav', '', 'listorder', '', '', "nav_id");
$nav_list_json = kekezu::json_encode_k(kekezu::gbktoutf($nav_list));
$nav_obj = new keke_table_class ( "witkey_nav" );
$url = "index.php?do=$do&view=$view";
if($ac == 'edit'){
	if(!empty($nav_id)){
		$sql = sprintf("select * from %switkey_nav where nav_id ='%d' limit 0,1",TABLEPRE,$nav_id);
		$nav_config = db_factory::get_one($sql);
		$readonly = nav_analysis($nav_config['nav_url']);
	}
	if($fds and $sbt_edit){
		if($set_index){
			$set_rs = db_factory::execute(sprintf("update %switkey_basic_config set v='%s' where k='set_index'",TABLEPRE,$fds['nav_style']));
		}else{
			$set_rs = db_factory::execute(sprintf("update %switkey_basic_config set v='index' where k='set_index'",TABLEPRE));
		}
		$res = $nav_obj->save($fds,$pk);
		($res || $set_rs) and kekezu::admin_show_msg($_lang['operate_success'],$url,2,$_lang['edit_success'],"success") or kekezu::admin_show_msg($_lang['operate_fail'],$url,2,$_lang['edit_fail'],"error");
	}
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view.'_edit' );
	die;
}
if ($ac == 'del') {
	$nav_obj->del ( 'nav_id', $nav_id, $url );
	kekezu::admin_show_msg ($_lang['delete_nav_success'], "index.php?do=config&view=nav",3,'','success' );
}
if($ac=='set_index'){
	$res = db_factory::execute(sprintf("update %switkey_basic_config set v='%s' where k='set_index'",TABLEPRE,$nav_style));
	kekezu::admin_show_msg ( $_lang['set_index_success'], "index.php?do=config&view=nav",3,'','success' );
}
if($sbt_edit){
	$sql = '';
	$nav = array_filter($nav);
	foreach($nav as $nav_id=>$v){
		$sql = ' update '.TABLEPRE.'witkey_nav set nav_title="'.$v['nav_title'].'"';
		$v['nav_url'] and $sql.=',nav_url="'.$v['nav_url'].'"';
		$sql.=',nav_style="'.$v['nav_style'].'"';
		$sql.=',listorder='.intval($v['listorder']);
		$sql.=' where nav_id='.intval($nav_id);
		db_factory::execute($sql);
	}
	kekezu::admin_system_log('编辑后台菜单');
	kekezu::admin_show_msg ('菜单编辑成功', "index.php?do=config&view=nav",3,'','success' );
}
function nav_analysis($url){
	global $_K;
	$front_route = kekezu::route_output();
	$readnonly = true;
	$site_ali = parse_url($_K['siteurl']);
	$nav_ali = parse_url($url);
	if(sizeof($nav_ali)>2&&$site_ali['scheme'].'://'.$site_ali['host']!=$nav_ali['scheme'].'://'.$nav_ali['host']){
		$readnonly=false;
	}else{
		parse_str($nav_ali['query'],$data);
		$data['do'] or $data['do']='index';
		in_array($data['do'],$front_route) or $readnonly=false;
	}
	return $readnonly;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );