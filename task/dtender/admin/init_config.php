<?php
if(!defined('ADMIN_KEKE')) {
	exit('Access Denied');
}
$init_menu= array(
	$_lang['task_manage']=>'index.php?do=model&model_id=5&view=list&status=0',
	$_lang['task_config']=>'index.php?do=model&model_id=5&view=config',
);
$init_config = array(
	'model_id'=>5,
	'model_code'=>'dtender',
	'model_type'=>'task',
	'model_name'=>$_lang['deposit_tender'],
	'model_dir'=>'dtender',
	'model_dev'=>'kekezu',
	'open_audit'=>'open',
	'deposit'=>'100',
	'task_rate'=>20,
	'task_fail_rate'=>10,
	'bid_time'=>3,
	'select_time'=>4,
	'pay_limit_time'=>5,
	'open_select'=>'open',
	'on_time'=>time(),
);
