<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-10 13:51:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$init_menu = array(
    $_lang['order_manage']=>'index.php?do=model&model_id=6&view=order',
	$_lang['goods_manage']=>'index.php?do=model&model_id=6&view=list&status=0',
	$_lang['goods_config']=>'index.php?do=model&model_id=6&view=config'
);
$init_config = array(
	'model_id'=>6,
	'model_code'=>'goods',
	'model_name'=>$_lang['witkey_goods'],
	'model_dir'=>'goods',
	'model_dev'=>'kekezu',
	'model_type'=>'shop',
	'model_status'=>1,//
	'hide_mode'=>1,//是否是私有模型
	'is_audit'=>1,//是否需要审核
	'goods_rate'=>20,//作品提成比例
	'goods_fail_rate'=>10,//失败提成比例
	'mark_day'=>'2',//默认互评天数
	'min_account'=>10//成交最小总额
);
