<?php	defined ( 'ADMIN_KEKE' )  or 	exit ( 'Access Denied' );
$title='任务地图设置';
$task_info = db_factory::get_one(sprintf("select * from %switkey_task where task_id=%d",TABLEPRE,$task_id));
$owner_info = kekezu::get_user_info($task_info['uid']);
$owner_info ['residency']&&$local = explode(',', $owner_info['residency']);
if ($_K['map_api']=='baidu'){
	require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_map_baidu' );
}else{
	require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_task_map_google' );
}
