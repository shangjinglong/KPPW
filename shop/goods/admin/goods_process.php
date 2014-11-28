<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-11-01 11:31:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

$process_obj=goods_report_class::get_instance($report_id,$report_info,$obj_info,$user_info,$to_userinfo);//实例化处理对象

if(!empty($op_result) ){
//	$log_type_arr = array("rights"=>"维权","report"=>"举报","complaint"=>"投诉");
//	$log_msg = "对威客作品进行了".$log_type_arr[$op_result]."操作";
//	kekezu::admin_system_log($log_msg);
	switch ($type){
		case "rights"://维权
			$res=$process_obj->process_rights($op_result,$type);
			break;
		case "report"://举报
			$res=$process_obj->process_report($op_result,$type);
			break;
		case "complaint"://投诉
			break;
	}
}else{
	$gz_info  =$process_obj->user_role('gz');//雇主信息
	$wk_info  =$process_obj->user_role('wk');//威客信息
	$credit_info=$process_obj->_credit_info;//扣除信誉、能力信息
	$process_can=$process_obj->_process_can;//可以进行的处理动作
}
require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/goods_' . $view );