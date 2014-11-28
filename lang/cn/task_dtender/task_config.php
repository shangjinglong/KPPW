<?php
/**
 * 多人悬赏配置页语言包
 * 数组键的定义:
 * 单词与单词之间必须用下划线来连接,首字母必须用小写，适用于所有的lang数组；
 * @version kppw2.0
 * @author S
 * @2011-12-22
 */
$lang = array(
//task_config_php
 	'modified_success'=>'修改成功',
	'op_success'=>'操作成功',
	'op_fail'=>'操作失败',
	'modified_fail'=>'修改失败',
	'access_config_modified_success'=>'权限配置修改成功',
	'modified_deposit_bidding_task'=>'修改了定金招标任务的',
//task_config_htm
	'whether_private_model'=>'是否为私有模型',
	'private_model_not_release_task_list'=>'私有模型不会出现在发布任务的选择列表上',
 	'industry_binding'=>'行业绑定',
	'select_industry'=>'选择行业',
	'you_can_choose'=>'行业绑定后的任务模型只能在选择该行业时候使用,可以多选.',
 	'model_introduction'=>'模型简介',
	'limit_50_bytes'=>'限50字节',
	'model_description'=>'模型描述',
 	'last_modified_time'=>'上次修改时间',

	  'cash_cove_config'=>'金额区间设置',
	  'add_new_cove'=>'添加新区间',
      'edit_tender_interval'=>'编辑区间',
      'tender_interval_edit_success'=>'招标区间编辑成功',
      'add_tender_interval'=>'添加招标区间',
      'cash_interval'=>'金额区间',
      'interval_description'=>'区间描述',
	  'start_cove_can_not_be_null'=>'开始金额不得为空',
	  'enter_start_cove'=>'请填写开始金额',
	  'end_cove_can_not_be_null'=>'结束金额不得为空,且须比开始区间大',
	  'enter_end_cove'=>'请填写结束金额',
	  'y'=>'元',

//task_priv_htm

 	'project_name'=>'项目名称',
	'user_identity'=>'用户身份',
	'limit_number'=>'次数限制',
//task_control_htm

 	'task_commission_tactics_setting'=>'任务佣金策略设定',
	'tender_deposit'=>'招标订金',
	'tender_deposit_input_error'=>'招标订金输入有误',
 	'tender_deposit_range'=>'招标订金的范围是10-10000元',
	'yuan'=>'元(发布任务需要缴纳的订金)',
 
	'task_percentage'=>'任务提成比例',
 	'bidding_percentage_input_error'=>'招标提成比例输入有误',
	'bidding_percentage_is'=>'招标提成比例是0%-100%',
	'bidding_percentage_range_is'=>'招标提成比例的范围是0-100%，招标提成比例是计算招标成交金额的百分比',
 	'task_fail_percentage'=>'任务失败提成比例',
	'fail_bidding'=>'招标失败提成比例输入有误',
    'fail_bidding_percentage_is'=>'招标失败提成比例是0%-100%',
	'fail_bidding_commission_ratio_is'=>'招标提成比例的范围是0%-100%，招标提成比例是计算招标成交金额的百分比',
	'deal_fail_task'=>'任务失败处理',
	'return_cash'=>'返还现金',
	'return_credit'=>'返还代金券',
 	'deduction_commission_after_money'=>'扣除拥金后的钱',
	'task_time_rule_set'=>'任务时间规则设定',
 	
 	'task_time_rule_set_enter_err'=>'竞标时间输入有误',
	'bid_time_range'=>'竞标时间的范围是1-100天',
	'bid_day'=>'天(竞标时间的范围是1-100天)',
 	'choose_standard_time'=>'竞标截止最小时间',
	
	'choose_standard_time_enter_err'=>'选标时间输入有误',
	'choose_standard_time_range'=>'选标时间的范围是1-100天',
 	'select_day'=>'天(选标时间的范围是1-100天)',
 	'work_day'=>'（中标后允许设定的最大工作时长，正整数）',
	'payment_term'=>'打款期限',
	'payment_term_enter_err'=>'打款期限输入有误',
 	'payment_term_enter_range'=>'打款期限的范围是1-100天',
	'payment_day'=>'(雇主打款等待的最大时长正整数，逾期后自动打款确认)',
	'audit_tender_set'=>'招标审核设定',
 	'whether_open_audit'=>'任务审核设定',
	
	'bidding_standard_selection_set'=>'招标选标设定',
	'whether_open_in_standard_selection'=>'是否开启进行中选标',
 	'last_edit_time'=>'上次编辑时间',

);