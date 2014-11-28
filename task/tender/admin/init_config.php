<?php
defined('ADMIN_KEKE') or 	exit('Access Denied');
$init_menu = array(
	$_lang['task_manage']=>'index.php?do=model&model_id=4&view=list&status=0',
	$_lang['task_config']=>'index.php?do=model&model_id=4&view=config',
);
$init_config = array(
	'model_id'=>4,
	'model_code'=>'tender',
	'model_type'=>'task',
	'model_name'=>$_lang['normal_tender'],
	'model_dir'=>'tender',
	'model_dev'=>'kekezu',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'zb_fees'=>20,
	'zb_audit'=>2,
	'zb_max_time'=>2,
);
