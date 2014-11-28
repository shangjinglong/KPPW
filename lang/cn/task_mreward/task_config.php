<?php
/**
 * 多人悬赏
 * @version kppw2.0
 * @author deng
 * 2011-12-22
 */
$lang = array(
/*task_config.php*/
      'update_success'=>'修改成功',
      'update_fail'=>'修改失败',
      'permissions_config_update_success'=>'权限配置修改成功',
      'has_update_more_reward'=>'修改了多人悬赏任务的',


/*task_config.htm*/
      'industry_binding'=>'行业绑定',
      'choose_industry'=>'选择行业',
      'industry_binding_notice'=>'(行业绑定后的任务模型只能在选择该行业时候使用,可以多选.)',
      'model_about'=>'模型简介',
      'limit_50_bytes'=>'限50字节',
      'model_description'=>'模型说明',
      'last_modify'=>'上次修改时间',
      'task_min_money_error'=>'任务最小金额不正确，长度2-5',
      'yuan_over'=>'元以上',
      'continue'=>'持续',
      'day_not_null'=>'天数不能为空! 天数的长度1-2',
      'first_rule_not_delete'=>'第一条规则不能被删除',
      'no_less_than_reward_total'=>'不低于悬赏总金额的',
      'percent_not_null'=>'百分比不能为空',


/*task_control.htm*/
      'task_commission_strategy'=>'任务佣金策略',
      'task_audit_money_set'=>'任务审核金额设定',
      'greater_money_not_audit_notice'=>'发布赏金低于该设定金额的任务需要审核，设为0即无限制',
      'task_min_money_set'=>'任务最小金额设定',
      'fill_in_right_audit_money'=>'填写正确任务审核金额',
      'task_audit_money_allow_decimal'=>'任务审核金额允许小数',
      'task_min_money_input_error'=>'任务最小金额填写错误',
      'task_min_money_allow_decimal'=>'任务最小金额为可以含小数',
      'task_min_money_positive_integer'=>'任务金额的最低下限，设为0即无限制',
      'task_royalty_rate'=>'任务提成比例',
      'task_royalty_rate_notice'=>'任务提成比例值为正整数，长度：1-3',
      'task_royalty_rate_title'=>'站长提取任务佣金的百分比，设为0即无抽佣',
      'task_success_platform_rate'=>'站长提取任务佣金的百分比，设为0即无抽佣',
      'task_fail_rate'=>'任务失败提成比例',
      'fail_notice'=>'任务异常失败时站长佣金百分比，设为0即无抽佣，另多赏任务中某奖项下稿件不足时只表示该奖项异常失败',
      'task_royalty_rate_msg'=>'任务提成比例值为正整数，长度：1-3',
      'task_royalty_rate_title'=>'任务提成比例值为正整数,0-100',
      'task_overdue_operate_set'=>'任务过期操作设定',
      'refund'=>'退钱',
      'auto_choose'=>'自动选稿',
      'return_cash'=>'返还现金',
      'return_cash_coupon'=>'返还代金券',
      'task_fail_process'=>'任务失败处理',
      'deduction_commission_money'=>'任务异常失败后的返现规则，用户代金券无法提现 ',
      'task_time_rule_set'=>'任务时间规则设定',
      'time_rule'=>'任务交稿截止时间最大规则 ',
      'task_min_money_error'=>'任务最小金额不正确',
      'please_carefully_input_min_money'=>'请仔细填写规则允许最小金额',
      'day_must_greater_one'=>'天数必须为大于1的整数',
      'please_carefully_input_day'=>'请仔细填写天数，不得少于1天',
      'delete_rule'=>'删除规则',
      'add_rule'=>'添加规则',
      'task_show_period_time'=>'任务公示期时间',
      'task_min_day'=>'任务交稿截止最小天数',
      'show_period_time_error'=>'公示期时间不对',
      'show_time_min_one_day'=>'任务公示期最小时间为1天',
      'min_one_day'=>'大于等于1的整数天，且需要小于等于交稿时间最大规则天数',
      'task_min_time_error'=>'任务最小时间不对,最少一天',
      'task_min_time_one_day'=>'任务最小时间为1天',
      'task_vote_period_time'=>'任务投票期时间',
      'vote_period_time_error'=>'投票期时间不对,长度',
      'vote_period_min_one_day'=>'任务投票期最小时间为1天',
      'task_no_final_to_vote'=>'任务没有定稿时，通过投票决定，不得少于1天',
      'choose_time_set'=>'选稿时间设置',
      'choose_time_input_error'=>'选稿时间输入有误',
      'choose_time_notice'=>'大于等于1的整数天',
      'in_choose'=>'进行中选稿',
      'delay_rule_set'=>'延期规则设定',
      'delay_min_money'=>'延期最小金额',
      'every_time_delay_money_error'=>'每次延期金额最少金额填写错误',
      'task_delay_min_one_yuan'=>'任务延期最少金额为1元',
      'delay_days_limit'=>'延期最大天数  ',

      'every_max_delay_days_error'=>'每次最大延期天数不正确',
      'max_delay_days_notice'=>'任务最大延期天数不得小于2天',
      'max_delay'=>'最大延期',
      'delay_set'=>'延期规则添加  ',
      'rate_input_error'=>'比例填写错误',
      'delay_rate_one_to_hundred'=>'任务延期比例为0-100',
      'task_comment_set'=>'任务评论设置',
      'is_public'=>'是否公开',
      'tick_comment_notice'=>'勾选则评论在任务进行中隐藏，任务结束公开',

/*task_priv.htm*/
      'item_name'=>'项目名称',
      'user_identity'=>'用户身份',
      'times_limit'=>'次数限制',


);