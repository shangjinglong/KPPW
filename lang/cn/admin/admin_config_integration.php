<?php
/**
 * 数组键的定义:
 * 单词与单词之间必须用下划线来连接,首字母必须用小写，键的最长不能超过5个单词,
 * 超过一句话的用小于5个的单词简写,适用于所有的lang数组,提示信息加在notice
 * key,value 用单引
 * 用户整合
 * @version kppw2.0
 * @author hr
 */
$lang = array(
	/* admin_config_integration.php */
	'reinstall'=>'重新配置',
	'success_uninstall'=>'卸载成功',
	'uninstall_log_msg'=>'卸载用户整合成功',
	'add_log_msg'=>'uc通讯添加失败',
	'uc_integrate_log'=>'整合 Ucenter',
	'pw_integrate_log'=>'整合 PW',
	'uc_communication_fail' => 'UC通讯失败,请检查uc_api',
	'uc_different_version' => 'UC_Client的版本与ucenter版不一致,请检查版本号',
	'uc_different_coding'=>'ucenter的数据库编码与本应用的数据库编码不一致,请调整编码',
	'uc_app_fail_to_add'=>'应用添加失败请检查参数!',
	'uc_error_author_password'=>'ucenter创始人密码错误',
	'uc_app_invalid_to_add'=>'应用的数据添加无效',
	'uc_integrate_success'=>'Ucenter 用户整合设设成功',
	'phpwind_integrate_success'=>'phpwind用户整合参数设定成功',
	
	/* admin_config_integration.htm */
	'how_to_use'=>'使用方法',
	'if_need_integrate_other_system'=>'如果需要整合其他的用户系统，可以安装适当的版本号插件进行整合。',
	'if_need_integrate_exchange_system'=>'如果需要更换整合的用户系统，直接安装目标插件即可完成整合，同时自动卸载上一次整合插件。',
	'if_dont_need_can_uninstall'=>'如果不需要整合任何用户系统，可直接卸载。',
	'uc_user_integrate'=>'Ucenter用户整合',
	'uc_name'=>'名称',
	'uc_version'=>'版本',
	'uc_author'=>'作者',
	'up_8'=>'8.0以上',
	'steps_has_been_install'=>'已安装',	
	
	/* admin_config_integration_pw.htm */

	'integrate_vip'=>'会员整合',
	'integrate_user'=>'用户整合',
	'communication_key'=>'通信密钥',
	'phpwind_set_the_same_communication_key'=>'通信密钥用于在 PhpWind 和KPPW!之间传输信息的加密，可包含任何字母及数字，请在 PhpWind 与KPPW! 设置完全相同的通讯密钥，以确保两套系统能够正常通信',
	'official_website'=>'访问地址',
	'phpwind_important_reminder'=>'如果您的 PhpWind 访问地址发生了改变，请修改此项。不正确的设置可能导致站点功能异常，请小心修改。<br/>格式: http://www.phpwind.com (最后不要加"/")',
	'ip_address'=>'IP 地址',
	'phpwind_tips_about_domain_cannot_access'=>'如果您的服务器无法通过域名访问 PhpWind，可以输入 PhpWind 服务器的 IP 地址',
	'phpwind_tips_about_database_port'=>'可以是本地也可以是远程数据库服务器，如果 MySQL 端口不是默认的 3306，请填写如下形式：127.0.0.1:6033',
	'database_server_address'=>'数据库服务器',
	'database_username'=>'数据库用户名',
	'database_password'=>'数据库密码',
	'database_name'=>'数据库名',
	'database_prefix'=>'表前缀',
	'database_coding'=>'数据库编码',
	'which_coding'=>'编码',
	'app_id'=>'应用 ID',
	'phpwind_app_id'=>'该值为当前站点在 PhpWind 的应用 ID，一般情况请不要改动',
	'edit_config'=>'编辑配置',
	'add_config'=>'添加配置',
	
	
	/* admin_config_integration_uc.htm */

	'uc_connection_mode'=>'连接方式',
	'uc_tips_about_connection_mode'=>'该值为当前站点在 与ucenter的通信方式',
	'uc_author_password'=>'创始人密码',
	'uc_tips_about_author_password'=>'ucenter创始人的密码，用于验证您是否有ucenter的管理权限',
	'uc_tips_about_communication_key'=>'通信密钥用于在 UCenter 和KPPW!之间传输信息的加密，可包含任何字母及数字，请在 UCenter 与KPPW! 设置完全相同的通讯密钥，以确保两套系统能够正常通信',
	'uc_tips_about_official_website'=>'如果您的 UCenter 访问地址发生了改变，请修改此项。不正确的设置可能导致站点功能异常，请小心修改。<br/>格式: http://www.sitename.com/uc_server (最后不要加"/")',
	'uc_tips_about_ip_address'=>'如果您的服务器无法通过域名访问 UCenter，可以输入 UCenter 服务器的 IP 地址',
	'uc_tips_about_server_address'=>'可以是本地也可以是远程数据库服务器，如果 MySQL 端口不是默认的 3306，请填写如下形式：127.0.0.1:6033',
	'uc_tips_about_app_id'=>'该值为当前站点在 UCenter 的应用 ID，一般情况请不要改动',
);