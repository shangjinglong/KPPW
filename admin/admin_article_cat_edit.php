<?php defined ( 'ADMIN_KEKE' )or exit ( 'Access Denied' );
$art_cat_obj = new Keke_witkey_article_category_class();
$types =  array ('help', 'art');
$type = (! empty ( $type ) && in_array ( $type, $types )) ? $type : 'art';
if($type=='art'){
	kekezu::admin_check_role(14);
	$art_cat_arr = kekezu::get_table_data('*',"witkey_article_category","art_cat_pid =1 or art_cat_id = 1","  art_cat_id desc",'','','art_cat_id',null);
}elseif($type=='help'){
	kekezu::admin_check_role(44);
	$art_cat_arr = kekezu::get_table_data('*',"witkey_article_category","art_index like '%{100}%'"," art_cat_id desc",'','','art_cat_id',null);
}
if($art_cat_id){
	$art_cat_obj->setWhere('art_cat_id='.intval($art_cat_id));
	$art_cat_info = $art_cat_obj->query_keke_witkey_article_category();
	$art_cat_info = $art_cat_info[0];
	$art_cat_pid = $art_cat_info[art_cat_pid];
}
if($sbt_edit){
	$flag = null;
	if($hdn_art_cat_id){
		$art_cat_obj->setWhere('art_cat_id='.intval($hdn_art_cat_id));
		$art_cat_info = $art_cat_obj->query_keke_witkey_article_category();
		$art_cat_info = $art_cat_info[0];
		if($art_cat_info['art_cat_pid']>0){
			$art_cat_obj->setArt_cat_pid($slt_cat_id);
		}
	}else{
		$art_cat_obj->setArt_cat_pid($slt_cat_id);
	}
	$art_cat_obj->setCat_name(kekezu::escape($txt_cat_name));
	$art_cat_obj->setListorder($txt_listorder?$txt_listorder:0);
	$art_cat_obj->setIs_show(intval($chk_is_show));
	$art_cat_obj->setSeo_title($seo_title);
	$art_cat_obj->setSeo_keyword($seo_keyword);
	$art_cat_obj->setSeo_desc($seo_desc);
	$art_cat_obj->setOn_time(time());
	if($type=="art"){
		$art_cat_obj->setCat_type("article");
		$top_index='{1}';
	}else if($type=="help"){
		$art_cat_obj->setCat_type("help");
		$top_index='{100}';
	}else if ($type=="single"){
		$art_cat_obj->setCat_type("single");
	}
	if($slt_cat_id==0){
		$art_index = $top_index;
	}else{
	    $art_index = $art_cat_arr[$slt_cat_id]['art_index'];
	}
	$flag = $art_cat_arr[$slt_cat_id];
	while ($flag['art_cat_pid']){
		$flag = $art_cat_arr[$flag['art_cat_pid']];
	}
	if($hdn_art_cat_id){
		$art_cat_obj->setArt_cat_id($hdn_art_cat_id);
		$art_index = $art_index."{{$hdn_art_cat_id}}";
		$art_cat_obj->setArt_index($art_index);
		$res = $art_cat_obj->edit_keke_witkey_article_category();
		if($res){
			kekezu::admin_system_log($_lang['edit_article_cat'].$txt_cat_name);
			kekezu::admin_show_msg($_lang['edit_article_cat_success'],'index.php?do='.$do.'&view='.$view.'&type='.$type.'&art_cat_id='.$hdn_art_cat_id,3,'','success');
		}
	}else{
		$res = $art_cat_obj->create_keke_witkey_article_category();
		$art_index = $art_index."{{$res}}";
		if($res){
			$art_cat_obj->setWhere("art_cat_id='$res'");
			$art_cat_obj->setArt_index($art_index);
			$art_cat_obj->edit_keke_witkey_article_category();
			kekezu::admin_system_log($_lang['add_article_cat'] . $txt_cat_name);
			kekezu::admin_show_msg($_lang['add_article_cat_success'],'index.php?do='.$do.'&view=cat_list&type='.$type,3,'','success');
		}
	}
}
$temp_arr = array();
kekezu::get_tree($art_cat_arr,$temp_arr,'option',$art_cat_pid,'art_cat_id','art_cat_pid','cat_name');
$cat_arr = $temp_arr;
unset($temp_arr);
require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'. $do .'_'. $view);