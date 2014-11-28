<?php
/**
 * 单人悬赏页语言包
 * 数组键的定义:
 * 单词与单词之间必须用下划线来连接,首字母必须用小写，适用于所有的lang数组；
 * @version kppw2.0
 * @author S
 * @2011-12-23
 */
$lang = array(
//task_config_htm

	'whether_private_model'=>'是否为私有模型',
	'private_models_not_task_list'=>'私有模型不会出现在发布任务的选择列表上',
	'industry_binding'=>'行业绑定',
	'choose_industry'=>'选择行业',
	'industry_binding_notice'=>'行业绑定后的任务模型只能在选择该行业时候使用,可以多选',
	'model_about'=>'模型简介',
	'limit_50_bytes'=>'限50字节',
	'model_description'=>'模型说明',
	'last_modify'=>'上次修改时间',
	'task_min_money_error'=>'任务最小金额不正确，长度2-5',
	'yuan_over'=>'元以上',
	'continue'=>'持续',
	'day_not_null'=>'天数不能为空! 天数的长度1-2',
	'first_rule_not_delete'=>'第一条规则不能被删除',
	'times_info'=>'次 不低于悬赏总金额的',
	'percent_not_null'=>'百分比不能为空',
//task_config_php

	'update_success'=>'修改成功',
	'update_fail'=>'修改失败',
	'permissions_config_update_success'=>'权限配置修改成功',
	'revised_piece_reward_task'=>'修改了计件悬赏任务的',
//task_priv_htm

	'item_name'=>'项目名称',
	'user_identity'=>'用户身份',
	'times_limit'=>'次数限制',

//task_control_htm

	'task_commission_strategy'=>'任务佣金策略设定',
	'task_audit_money_set'=>'任务审核金额',
	'fill_in_right_audit_money'=>'填写正确任务审核金额',
	'task_audit_money_allow_decimal'=>'任务审核金额允许小数',
	'greater_money_not_audit_notice'=>'发布赏金低于该设定金额的任务需要审核，设为0即无限制',
	'task_min_money'=>'任务最小金额',
	'task_min_money_input_error'=>'任务最小金额填写错误',
	'task_min_money_allow_decimal'=>'任务最小金额为可以含小数',
	'task_min_money_positive_integer'=>'任务金额的最低下限，设为0即无限制',
	'task_royalty_rate'=>'任务提成比例',
	'task_royalty_rate_mount'=>'任务异常失败时站长佣金百分比，设为0即无抽佣，另计赏任务稿件不足情况下只表示部分失败',
	'task_royalty_rate_notice'=>'任务提成比例值为大于等于0的整数，长度：1-3',
	'task_royalty_rate_title'=>'站长提取任务佣金的百分比，设为0即无抽佣',
	'task_refund_processing'=>'任务退款处理',
	'deduction_rules'=>'任务异常失败后的返现规则，用户代金券无法提现',
	'task_time_rule_set_info'=>'任务交易时间规则和用户参与时间限制',
	'return_cash'=>'返还现金',
	'first_deduction_vouchers'=>'先扣代金券',
	'return_cash_coupon'=>'返还代金券',
	'task_fail_returned_smoke_scale'=>'任务失败返金抽成比例',
	'task_time_rule_set'=>'任务时间规则设定',
	'time_rule'=>'任务交稿截止时间最大规则',

	'task_min_money_error'=>'任务最小金额不正确',
	'please_carefully_input_min_money'=>'请仔细填写规则允许最小金额,',
	'day_must_greater_one'=>'天数必须为大于1的整数',
	'please_carefully_input_day'=>'请仔细填写天数，不得少于1天',
	'delete_rule'=>'删除规则',
	'add_rule'=>'添加规则',
	'task_min_day'=>'任务交稿截止最小天数',
	'task_delay_set_info'=>'任务投稿期结束前可延期，选稿期后无法延期',
	'task_least_one_day'=>'任务最小时间不对,最少一天',
	'task_min_time_one_day'=>'任务最小时间为1天',
	'days'=>'天（大于等于1的整数天，且需要小于等于交稿时间最大规则天数）',
	'choose_time_set'=>'选稿时间设置',
	'choose_time_input_error'=>'选稿时间输入有误',
	'choose_time_notice'=>'(大于等于1的整数天)',
	'largest_evaluation_delayed_days_set'=>'互评时间限制',
	'max_mark_info'=>'逾期未互评，系统默认好评',

	'auto_evaluation_not_correct'=>'自动互评天数不正确',
	'auto_evaluation_not_one_day'=>'自动互评天数不得小于1天',
	'in_selecting_manuscripts'=>'进行中选稿',
	'extension_set_rules'=>'延期规则设定',
	'min_amount_delay'=>'延期最小金额',
	'each_extension_least_money_err'=>'每次延期金额最少金额填写错误',
	'task_extension_least_1_yuan'=>'任务延期最少金额为1元',
	'extension_day_limit'=>'延期最大天数',
	'maximum_extension'=>'最大延期',
	'each_extension_maximum_day_err'=>'每次最大延期天数不正确',
	'task_extension_maximun_least_2day'=>'任务最大延期天数不得小于2天',
	'extension_rule'=>'延期规则添加',
	'not_less_reward_total_money'=>'不低于悬赏总金额的',
	'proportional_error_fill'=>'比例填写错误',
	'task_delay_ratio_for'=>'任务延期比例为0-100',
	'task_set_manuscripts'=>'选稿规则设定',
	'set_manuscripts'=>'稿件禁投设定',
	'automatic_selection_info'=>'选稿期结束系统自动选稿，投稿时间优先选择，稿件不足部分按失败处理',
	'task_set_manuscripts_info'=>'雇主选稿异常情况下的系统辅助流程规则',
	'ratio_number_incorrect_manuscripts'=>'稿件数比例不正确',
	'input_manuscript_number_proportion'=>'请输入稿件数比例',
	'not_more_required_number_manuscripts'=>'未审核稿件数大于所需稿件数百分比时任务禁止投稿，设为0即不限制',
	'automatic_selection'=>'系统自动选稿',
	'automatic_selection_former_N'=>'自动选前N个稿件中标',
	'manuscript_number_input_not_correct'=>'稿件数输入不正确',
	'enter_manuscript_number'=>'请输入稿件数',
	'if_open_automatic_info'=>'如果开启自动选稿件，选稿期过雇主没有选稿，将选所交稿件中前N个稿件中标',
	'mission_set'=>'任务评论设定',
	'whether_public'=>'是否公开',
	'check_comments_hide_end_open'=>'勾选则评论在任务进行中隐藏，任务结束公开',
	'not_less_total_money_reward'=>'不低于悬赏总金额的',
);