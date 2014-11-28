<?php
/**
 * 后台管理的公共语言包
 * @author xl
 * @version kppw2.0
 * 2011-12-13  上午11:18:21
 */
$lang = array (
		/**用户**/
		'zip_code' => '邮编',
		'contact_tel' => '联系电话', 
		'login_fail' => '登录失败',
		'login_success' => '登录成功', 
		'password_error' => '密码错误', 
		'public_admin_uid' => '创始人',
		'username_error' => '用户名错误', 
		'contact_address' => '联系地址', 
		'not_permissions' => '您没有管理权限', 
		'location'=>'位置',
		/**系统**/
		'public_menu_config' => '系统配置',
		/**长度**/
		'height' => '高', 
		'width' => '宽', 
		'length' => '长度',
		/**提示**/
		'tips'=>'小提示', 
		'error_notice' => '错误提示',
		'404_page'=>'您访问的页面不存在!',
		/*(批量)操作*/
		'release'=>'发布',
		'click' => '点击',
		'null'=>'无',
		
		'recycle' => '回收站',   
		'confirm_mulit_delete'=>'你确定要批量删除?',
		'confirm_recycle' => '你确定要放入回收站?', 
		'has_none_being_choose'=>'您没有选择任何操作项',
		'confirm_release' => '确认发布',
 
		/**页面中的查询**/
		'keywords' => '关键字',
		/**常用字段**/
		'all'=>'所有的',
		'error_param'=>'错误的参数',
		'is_recommend'=>'是否推荐',

		/**任务、商城**/
		'from' => '来源',
	    'update'=>'修改',
		'author' => '作者',
	    'role'=>'角色',
        'set_to_disable'=>'设为禁用',
        'set_to_enable'=>'设为启用',
	    'save_config'=>'保存配置',
	    'edit_config'=>'编辑配置',
	    'img'=>'图片',
        'system_log'=>'系统日志',
        'attachment_manage'=>'附件管理',
        'show_number'=>'显示条数',
        'is_disable'=>'是否禁用',
		'shop_manage'=>'商店管理',

		/**index.php**/
		'global_config'=>'全局配置',
		'article_manage'=>'资讯管理',
		'finance_manage'=>'财务管理',
		'user_manage'=>'用户管理',
		'charge'=>'手动充值',
		'system_tool'=>'站长工具',
		'witkey_union'=>'营销推广',
		'app_center'=>'应用中心',
		'union_building'=>'推广联盟建设中...',
		'store_manage'=>'店铺管理',
		/**admin_nav_search.htm**/
		'now_no_result'=>'暂无搜索结果',
		/* icon tips */
		'picture' => '图', 
		'slide' => '幻灯片',
		'recommend' => '荐',
		/*商城的菜单*/
		'goods_order' => '作品订单',	
        'order_manage'=>'订单管理',
        'goods_manage'=>'作品管理',
		'goods_list' => '作品列表',
        'order_list'=>'订单列表',	
		'goods_config' => '作品配置',	
       'witkey_goods'=>'威客作品',
       'goods_order_manage'=>'作品订单管理',
       'service_order_manage'=>'服务订单管理',
       'witkey_goods_manage'=>'威客作品管理',
       'witkey_service_manage'=>'威客服务管理',
	   'service_order'=>'服务订单',
       'service_list'=>'服务列表',
       'service_manage'=>'服务管理',
       'service_config'=>'服务配置',
       'witkey_service'=>'威客服务',

		/*批量操作页面菜单栏*/
		'category' => '分类',
		'section' => '栏目',
		/*行业与技能*/
		'skill'=>'技能',
		'add_skill'=>'添加技能',
		'edit_skill'=>'编辑技能',
		'skill_name'=>'技能名称',
		'by_industry'=>'所属行业',
		'add_industry'=>'添加行业',
		'industry_name'=>'行业名称',
		'skill_manage'=>'技能管理', 
		'task_industry_category'=>'任务行业分类',  
		'industry_manage'=>'行业管理',
        'industry_list'=>'行业列表',
		/**admin_tpl_export.php**/
		'tpl_backup_success'=>'模版备份成功',
		'tpl_backup_fail'=>'模版备份失败，请在此尝试',
		/**admin_model.php**/
		'error_model_param'=>'错误的模型参数',
		/**admin_footer.htm**/
		'you_comfirm_delete_operate'=>'你确认删除操作？',
		/*show_msg.htm*/
		'here'=>'这里',
		'jump_notice'=>'跳转提示', 
		'page_jump'=>'页面跳转中',
		'auto_location_later'=>'秒后将自动跳转',
		'click_jump'=>'如您的浏览器不能跳转，请点击', 
		/**auth_config_inc.php**/	
		'bank_auth'=>'银行认证',
		'email_auth'=>'邮箱认证',
		'enterprise_auth'=>'企业认证',
		'mobile_auth'=>'手机认证',
		'realname_auth'=>'实名认证',
		'id_card_auth'=>'身份证认证',
		'email_auth_desc'=>'点击发送，系统将自动发送一封邮件到您的邮箱，
		请在24小时之内点击邮件里的链接进行邮箱验证（24之内有效）',
		/*标签管理*/
		'tag'=>'标签',
		'code'=>'代码',
		'tag_edit'=>'标签编辑',
		'tag_code'=>'标签代码',
		'cache_time'=>'缓存时间',
		'tag_mode'=>'标签模式',
		'tag_name'=>'标签名称',
		'tag_manage'=>'标签管理',
		'read_number'=>'读取条数',
		'template_choose'=>'模板选择',
		'model_config_not_exists'=>'模型配置不存在',
		'seconds_notice'=>'秒为单位,留空为不缓存',
		'choose_tag_template'=>'(选择标签适用模板)',
		'default_read_number'=>'(读取数据条数，不填则默认为9条)',
		'tag_change_notice'=>'(标签创建后请不要随意更改名称,否则可能造成调用错误)',
		'user_a_single_charge_ratio'=>'用户提现单笔收费比率%',
		'illegal_parameter_or_authmadel_delete'=>'非法参数或认证模型已被删除',
		/*数据库管理*/
		'db_mange'=>'数据库管理',
		'backup'=>'备份',
		'restore'=>'恢复',
		'optim'=>'优化',
		'repair'=>'修复',
		'union_api_config_manage'=>'联盟API配置管理',
		'union_api_config'=>'联盟API配置',
		'union_api_id'=>'联盟提供的api编号',
		'union_app_secret_id'=>'联盟提供的app_secret编号',
		'for_task'=>'获取任务',
		'have_access'=>'已获取',
	    /*财务*/
		'financial_model'=>'财务模块',
		'statistical_info'=>'统计信息',
		'flow_record'=>'用户流水',
		'graphic_report'=>'财务分析',
		'withdraw_audit'=>'提现审核',
		'recharge_audit'=>'充值审核',
		'revenue'=>'营收明细',
		/**增值项里的初始化配置信息 init_config.php*/
		'map_loction'=>'地图定位', 
		'map_item_func'=>'地图定位，任务发布后，可以在地图上指定位置显示',
		'task_top'=>'任务置顶',
		'top_item_func'=>'任务置顶，任务发布后，可以指定位置显示',
		'task_urgent'=>'任务加急',
		'urgent_item_func'=>'任务加急，任务发布后，可以指定位置显示',
		'work_hide'=>'稿件隐藏',

	/*new add*/
        'system_tool'=>'站长工具',
        'update_cache'=>'更新缓存',
        'database_backup'=>'数据库备份',
        'database_restore'=>'数据库恢复',


	/*交易维权*/
		'process'=>'处理 ',
		'trans_rights'=>'交易维权',
		'now_status'=>'当前状态',
		/**web**/
		'keke_official_website'=>'kekezu官方网站',  
		/**其它**/
		'bind' => '绑定',
		'article'=>'文章',
		'bulletin'=>'网站公告',
		'about'=>'关于网站',
		'anonymous' => '匿名',
		'single_page' => '单页面',
		'last_modify' => '上次修改时间',
		'bind_account' => '绑定账号', 

); 