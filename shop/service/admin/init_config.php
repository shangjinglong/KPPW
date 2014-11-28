<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-10 13:51:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

$init_menu = array(
    $_lang['order_manage']=>'index.php?do=model&model_id=7&view=order',
	$_lang['service_manage']=>'index.php?do=model&model_id=7&view=list&status=0',
	$_lang['service_config']=>'index.php?do=model&model_id=7&view=config'
);
$init_config = array(
	'model_id'=>7,
	'model_code'=>'service',
	'model_name'=>$_lang['witkey_service'],
	'model_dir'=>'service',
	'model_dev'=>'kekezu',
	'model_type'=>'shop',
	'model_status'=>1,
	'deduct_scale'=>2,
	'defeated_money'=>1,
	'task_min_cash'=>1,
	'max_filecount'=>5,
	
);
