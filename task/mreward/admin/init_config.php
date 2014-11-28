<?php
defined('ADMIN_KEKE') or 	exit('Access Denied');
$init_menu = array(
	$_lang['task_manage']=>'index.php?do=model&model_id=2&view=list&status=0',
	$_lang['task_config']=>'index.php?do=model&model_id=2&view=config',
);
$init_config = array(
	'model_id'=>2,
	'model_code'=>'mreward',
	'model_name'=>$_lang['more_reward'],
	'model_dir'=>'mreward',
	'model_type'=>'task',
	'model_dev'=>'kekezu',
	'model_status'=>1,
	'audit_cash'=>10,
	'is_auto_adjourn'=>1,
	'adjourn_day'=>2,
	'deduct_scale'=>1,
	'defeated_money'=>2,
	'is_comment'=>1,
	'task_min_cash'=>10,
	'vote_limit_time'=>2,
	'show_limit_time'=>1,
	'reg_vote_limit_time'=>2,
	'agree_is_open'=>1,
);