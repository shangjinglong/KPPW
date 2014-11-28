<?php
$tpl_mode = 1;
define('ADMIN_KEKE',TRUE);
require '../app_comm.php';
define ( 'ADMIN_ROOT', S_ROOT . '/'.ADMIN_DIRECTORY.'/' ); 
$_K ['admin_tpl_path'] = S_ROOT . '/'.ADMIN_DIRECTORY.'/tpl/'; 
if ($do == 'previewtag')
{
	$tagid = intval($tagid);
	if (!$tagid){
		die();
	}
	$taglist = kekezu::get_tag(1);
	$tag_info = $taglist[$tagid];
	if($tag_info['tag_type']==9){
		keke_loaddata_class::preview_addgroup($tag_info['tagname'],$tag_info['loadcount']);
	}
    else{
		keke_loaddata_class::previewtag($tag_info);
	}
}