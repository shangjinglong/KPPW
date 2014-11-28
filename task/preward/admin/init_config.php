<?php
defined('ADMIN_KEKE') or 	exit('Access Denied');
$init_menu = array(
	$_lang['task_manage']=>'index.php?do=model&model_id=3&view=list&status=0',
	$_lang['task_config']=>'index.php?do=model&model_id=3&view=config',
);
$init_config = array(
	'model_id'=>3,
	'model_code'=>'preward',
	'model_name'=>$_lang['piece_reward'],
	'model_dir'=>'preward',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'audit_cash'=>10,
	'min_cash'=>10,
	'task_rate'=>20,
	'task_fail_rate'=>10,
	'defeated'=>1,
	'min_day'=>2,
	'is_auto_adjourn'=>1,
	'adjourn_num'=>2,
	'choose_time'=>4,
	'is_comment'=>1,
	'open_select'=>1,
);