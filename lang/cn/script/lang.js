/**
 * js语言包
 */
var L = {
		    /**全局变量**/
			at:'于',
			day:'天',
			hour:'小时',
			minutes:'分',
			seconds:'秒',
			file:'文件',
			point:'点',
			a:'个',
			d:'日',
			word:'字',
			has_left:'还剩：',
			del:'删除',
			
			close:'关闭',
			cancel:'取消',
			submit:'确定',
			
			share:'分享',
			
			operate_confirm:'确定进行此操作吗?',
			
			operate_notice:'操作提示',
			operate_warning:'操作警告',
			upload_file:'上传文件',
			can_input:'你还能输入',
			select_sub_industry:'请选择子行业',
			
			/** release.js Chen**/
			t_require:'任务需求',
			t_allow_min_day:' 预计的任务持续天数,当前预算允许最小天数为:',
			t_allow_max_day:'天,最大截止时间：',
			t_amount_allowable_period:'当前任务金额允许最大周期为:',
			t_publishing_agreement:'请先同意任务发布协议',
			
			/** service.js Chen**/
			s_can_not_buy_your_own:'您无法购买自己的',
			s_confirm_to_buy:'您确认下单购买吗?',
			
			/** shelves.js Chen**/
			s_publishing_agreement:'请先同意商品发布协议',
			s_description:'服务描述',
			
			/** task.js Chen**/
			t_delay_time_over:'延期次数超过',
			t_delay_forbidden:'次,无法继续延期',
			t_only_master_can_comment_work:'只有雇主才能评论稿件',
			t_reply_over_word_limit:'您的回复超过字数限制',
			t_100_word_allow:'你还能输入100个字!',
			t_say_something:'我要说几句...',
			t_comments:'评论:',
			t_confirm_delete_this_work:'确认删除此稿件吗?',
			t_do_not_duplicate_submissions:'请勿过快操作',
			/** uploadify.js Chen**/
			u_file_has_not_added_into_quene:'文件未被加入上传队列:',
			u_cancel:' - 已取消',
			u_file:'文件 "',
			u_replace_this_file:'"的文件已在上传队列中.您希望替换吗?',
			u_files_over_allowed_num:'选择文件过多,还可上传',
			u_files:'个文件.',
			u_select_num_over_allowed:'选择文件个数超出上传文件限制(',
			u_over_size_limit:'"超出大小限制(',
			u_r_backets:')."',
			u_is_null:'"为空.',
			u_not_allowed_file_ext:'"不符合文件格式(',
			u_lack_upload_path:'缺少上传路径',
			u_io_warning:'IO警告',
			u_security_error:'安全性错误',
			u_failed:'已失败',
			u_sign_error:'验证错误',
			u_canceled:'已取消',
			u_stoped:'已终止',
			u_success:' - 已完成',
			u_method:'方法',
			u_not_exists_in_control:' 在控件中不存在',
			
			/** preward_task.js/ mreward_task.js Chen**/
			t_master_can_operate_work:'只有雇主才能操作稿件',
			t_work_num_than_expected:'操作无效，所交稿件已达到任务所需的最大量，不能再交稿了',
			t_hand_forbidden:'操作无效，用户无法对自己发布的任务交稿!',
			
			/** dtender_task.js**/
			t_have_handed:'您已经对任务投过标了',
			t_only_master_can_host_amount:'只有雇主才能进行赏金托管',
			t_wait_pay:'待付款',
			t_work_over:'完成',
			t_work_plan_stage_limit:'工作计划最多不得超过5步',
			t_plan_amount:'计划金额',
			t_plan_amount_fill_error:'计划金额填写有误',
			t_fill_in_plan_amount:'填写计划金额',
			t_start_time:'开始时间',
			t_start_time_fill_error:'开始时间填写有误',
			t_fill_in_start_time:'填写开始时间',
			t_end_time:'结束时间',
			t_end_time_fill_error:'结束时间填写有误',
			t_fill_in_end_time:'填写结束时间',
			t_work_target:'工作目标',
			t_target_fill_error:'工作目标填写有误',
			t_fill_in_target:'填写工作目标',
			t_reset_plan_amount:'所填计划总金额与报价不符，请重新设置',
			
			
			/** tender_task.js**/
			t_vote_forbidden:'无法对自己进行投票',
		
			/** system/custom.js zc**/
			input_task_service:'输入任务/商品',
			i_want_say:'我要说几句...',
			input_100_words:'你还能输入100个字!',
			select_a_subsector:'请选择子行业',
			has_input_length:'已输入长度',
			can_also_input:'还可以输入',
			can_input:'可输入',
			has_exceeded_length:'已超出长度',
			
			/** system/script_calendar.js zc**/
			pre_month:'上一月',
			next_month:'下一月',
			c_choice_year:'点击选择年份',
			c_choice_month:'点击选择月份',
			today:'今天',
			mon:'月',

			/** tpl/default/js/help.js**/
			want_to_know:'想了解什么?',	
			
			/** tpl/default/js/skill.js**/
			no_project:'没有项目',
			you_have_selected:'您已选择了',

			ability_label:'能力标签',
			you_can_choose:'还有可以选择',
			all_clear:'全部清空',
		
			/** task/sreward/tpl/default/sreward_task.js**/
			operation_invalid:'操作无效',
			released_task_turnaround:'用户对自己发布的任务交稿!',
			operation_failed_tips:'操作失败提示',
			
			website_desc_not_null:'网站描述不能为空',
			/** task/sreward/tpl/default/sreward_agreement.js**/
			you_upload:'你上传了',
			other_upload:'对方上传了',
			source_file_confirm_delivery:'个源文件，确认交付吗?',
			not_initiated_arbitration:'无法对自己发起仲裁',
			not_upload_is_or_not_receive:'对方没有上传源文件,确认接收吗?',
			not_upload_is_or_not_deliver:'你没有上传源文件,确认交付吗?',
			
			/** admin/tpl/js/table.js**/	
			double_click:'双击',
			
			/** 文件名：admin/tpl/js/table.js**/	
			t_hand_forbidden:'操作无效，用户无法对自己发布的任务交稿!',
			
			/** 文件名：system/keke.js  xj * */
			you_not_login_now_login:'你还没有登陆，是否现在登陆？',
			login_tips:'登陆消息提示',
			content_is_empty:'内容不得为空',
			content_not_more_than:'内容不得多于',
			content_not_less_than:'内容不得少于',
			words:'个字',
			file_upload_exceeds_limit_the_maximum:'文件上传数量超过限制,最大',
			error_tips:'错误提示',
			rights:'维权',
			report:'举报',
			complaints:'投诉',
			can_not_be_initiated:'无法对自己发起',
			can_not_give_yourself_send_message:'无法给自己发送站内短信',
			xml_parsing_error:'XML解析错误',
			loading:'请稍候...',
			oneday:'一天',
			sevendays:'7 天',
			fourteendays:'14 天',
			month:'一个月',
			three_month:'三个月',
			custom:'自定义',
			six_month:'半年',
			year:'一年',
			lasting:'永久',
			this_content_requires_the_adobe_flash_player_9_or_later:'此内容需要 Adobe Flash Player 9.0.124 或更高版本',
			click_copy:'点此复制到剪贴板',
			/**resource/js/system/form_and_validation.js xj**/
			ele:'元素',
			error_config_val:'值类型配置有误',
			file_format_error:'的文件格式不正确',
			/**task/match/tpl/default/match_task.js**/
			non_employers_not_view_contact:'非雇佣双方无法查看联系方式',
			operation_invalid_the_high_bids_released_task:'操作无效，用户对自己发布的任务进行抢标!',
			non_tender_witkey_not_los_bid:'非投标威客无法放弃投标',
			sure_give_up_tender:'确定放弃投标吗?',
			non_employment_can_not_send_message:'非雇佣双方无法发送消息提醒',
			only_employers_can_out_work:'只有雇主才可淘汰稿件',
			sure_out_user:'确定淘汰该用户吗?',
			only_employers_host:'只有雇主才可托管赏金',
			only_tender_work_confirm:'只有投标威客才可进行工作确认',
			start_work:'确定开始工作吗?',
			only_tender_confirm_completion:'只有投标威客才可确认完工',
			only_employer_acceptance:'只有雇主才可验收工作',
			confirm_acceptance_work:'确定验收工作吗?',
		   /*resource/js/system/script_calendar.js*/	
			
			/*zone.js*/
			z_access_forbidden:'您无权设置空间',
			z_setting_fail:'空间风格设置失败',
			z_successfully_set:'设置成功',
			z_fail_set:'设置失败',
				
			set_top:'设置推荐',
			add_first_level:'增加父节点',
			select_one_node:'请先选择一个节点',
			can_not_set_first_top:'不能对一级分类进行推荐',
			confirm_del:'确认删除--',
			ma:'吗？',
			nodename_can_not_null:'节点名称不能为空',
			not_be_first_level:'无法拖动为父节点',
		    can_not_add_bottom_level:' 叶子节点被锁定，无法增加子节点',
		    //user_basic_cert.htm
		    uploading:'上传中!',
		   //login.htm
		    password_not_empty:'用户密码不能为空',
		    //admin_index.htm
		    clear_success:'清除成功'
		    
			
};