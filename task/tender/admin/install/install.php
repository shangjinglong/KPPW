<?php
define("IN_KEKE",true);
	$model_name = 'tender';
	/*********Table witkey_mark_config start **************/
	$table_exist = db_factory::query("SHOW   TABLES   LIKE   '".TABLEPRE."witkey_mark_config'");
	
	$table_exist = $table_exist[0]?true:false;
	
	if (!$table_exist){
	
	$res = db_factory::execute("CREATE TABLE IF NOT EXISTS `".TABLEPRE."witkey_mark_config` (
		`mark_config_id` int(11) NOT NULL auto_increment 	,PRIMARY KEY  (`mark_config_id`)
			,	`obj` char(20) default null 
			,	`good` int(3) default null 
			,	`normal` int(3) default null 
			,	`bad` int(3) default null 
			,	`type` int(1) default null 
			) ENGINE=MyISAM  DEFAULT CHARSET=".$_K["charset"]."");
		
	}else{
	
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='mark_config_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  mark_config_id mark_config_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add mark_config_id int(11) not null default null auto_increment");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='obj' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="char(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  obj obj char(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add obj char(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='good' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(3)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  good good int(3)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add good int(3) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='normal' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(3)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  normal normal int(3)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add normal int(3) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='bad' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(3)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  bad bad int(3)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add bad int(3) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_mark_config where Field='type' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(1)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_mark_config  change column  type type int(1)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_mark_config add type int(1) null default null ");
		}
		
	}
	$table_exist=false;
	if(!$table_exist){
	
	db_factory::execute("replace into ".TABLEPRE."witkey_mark_config (`mark_config_id`,`obj`,`good`,`normal`,`bad`,`type`) values ('9','tender','100','50',0,'2')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_mark_config (`mark_config_id`,`obj`,`good`,`normal`,`bad`,`type`) values ('10','tender','100','50',0,'1')");
					}
	/*********Table witkey_mark_config end **************/
	/*********Table witkey_model start **************/
	$table_exist = db_factory::query("SHOW   TABLES   LIKE   '".TABLEPRE."witkey_model'");
	
	$table_exist = $table_exist[0]?true:false;
	
	if (!$table_exist){
	
	$res = db_factory::execute("CREATE TABLE IF NOT EXISTS `".TABLEPRE."witkey_model` (
		`model_id` int(11) NOT NULL auto_increment 	,PRIMARY KEY  (`model_id`)
			,	`model_code` varchar(20) default null 
			,	`model_name` varchar(20) default null 
			,	`model_dir` varchar(20) default null 
			,	`model_type` char(10) default null 
			,	`model_dev` varchar(20) default null 
			,	`model_status` int(11) default null 
			,	`model_desc` text default null 
			,	`on_time` int(11) default null 
			,	`hide_mode` int(11) default null 
			,	`listorder` int(11) default null 
			,	`model_intro` varchar(50) default null 
			,	`indus_bid` text default null 
			,	`config` text default null 
			) ENGINE=MyISAM  DEFAULT CHARSET=".$_K["charset"]."");
		
	}else{
	
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_id model_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_id int(11) not null default null auto_increment");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_code' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_code model_code varchar(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_code varchar(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_name' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_name model_name varchar(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_name varchar(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_dir' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_dir model_dir varchar(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_dir varchar(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_type' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="char(10)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_type model_type char(10)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_type char(10) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_dev' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_dev model_dev varchar(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_dev varchar(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_status' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_status model_status int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_status int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_desc' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="text"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_desc model_desc text");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_desc text null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='on_time' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  on_time on_time int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add on_time int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='hide_mode' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  hide_mode hide_mode int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add hide_mode int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='listorder' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  listorder listorder int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add listorder int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='model_intro' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(50)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  model_intro model_intro varchar(50)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add model_intro varchar(50) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='indus_bid' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="text"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  indus_bid indus_bid text");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add indus_bid text null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_model where Field='config' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="text"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_model  change column  config config text");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_model add config text null default null ");
		}
		
	}
	$table_exist=false;
	if(!$table_exist){
	
	db_factory::execute("replace into ".TABLEPRE."witkey_model (`model_id`,`model_code`,`model_name`,`model_dir`,`model_type`,`model_dev`,`model_status`,`model_desc`,`on_time`,`hide_mode`,`listorder`,`model_intro`,`indus_bid`,`config`) values ('4','tender','普通招标','tender','task','kekezu','1','<p>普通招标，雇主选择中标者后，交付将在线下完成，雇主确认后，任务完成，普能招标，网站只收取固定的服务费用,</p><p>普通招标将不能增涨双方的信誉值，与能力值<br /></p><br />','1325150155',0,'4','普通招标，网站不托管招标金额，所发生任何纠份网站不负责','','a:5:{s:8:\"zb_audit\";s:1:\"2\";s:7:\"zb_fees\";s:2:\"20\";s:11:\"zb_max_time\";s:2:\"30\";s:11:\"choose_time\";s:1:\"7\";s:11:\"open_select\";s:4:\"open\";}')");
					}
	/*********Table witkey_model end **************/
	/*********Table witkey_priv_item start **************/
	$table_exist = db_factory::query("SHOW   TABLES   LIKE   '".TABLEPRE."witkey_priv_item'");
	
	$table_exist = $table_exist[0]?true:false;
	
	if (!$table_exist){
	
	$res = db_factory::execute("CREATE TABLE IF NOT EXISTS `".TABLEPRE."witkey_priv_item` (
		`op_id` int(11) NOT NULL auto_increment 	,PRIMARY KEY  (`op_id`)
			,	`model_id` int(11) default null 
			,	`op_code` varchar(20) default null 
			,	`op_name` varchar(50) default null 
			,	`allow_times` int(1) default null 
			,	`limit_obj` int(111) default null 
			,	`condit` varchar(200) default null 
			) ENGINE=MyISAM  DEFAULT CHARSET=".$_K["charset"]."");
		
	}else{
	
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='op_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  op_id op_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add op_id int(11) not null default null auto_increment");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='model_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  model_id model_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add model_id int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='op_code' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(20)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  op_code op_code varchar(20)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add op_code varchar(20) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='op_name' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(50)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  op_name op_name varchar(50)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add op_name varchar(50) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='allow_times' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(1)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  allow_times allow_times int(1)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add allow_times int(1) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='limit_obj' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(111)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  limit_obj limit_obj int(111)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add limit_obj int(111) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_item where Field='condit' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="varchar(200)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_item  change column  condit condit varchar(200)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_item add condit varchar(200) null default null ");
		}
		
	}
	$table_exist=false;
	if(!$table_exist){
	
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_item (`op_id`,`model_id`,`op_code`,`op_name`,`allow_times`,`limit_obj`,`condit`) values ('51','4','comment','留言','1','1','realname')");
					
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_item (`op_id`,`model_id`,`op_code`,`op_name`,`allow_times`,`limit_obj`,`condit`) values ('49','4','pub','发布任务','1','2','')");
					}
	/*********Table witkey_priv_item end **************/
	/*********Table witkey_priv_rule start **************/
	$table_exist = db_factory::query("SHOW   TABLES   LIKE   '".TABLEPRE."witkey_priv_rule'");
	
	$table_exist = $table_exist[0]?true:false;
	
	if (!$table_exist){
	
	$res = db_factory::execute("CREATE TABLE IF NOT EXISTS `".TABLEPRE."witkey_priv_rule` (
		`r_id` int(11) NOT NULL auto_increment 	,PRIMARY KEY  (`r_id`)
			,	`item_id` int(11) default null 
			,	`mark_rule_id` char(5) default null 
			,	`rule` char(5) default null 
			) ENGINE=MyISAM  DEFAULT CHARSET=".$_K["charset"]."");
		
	}else{
	
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_rule where Field='r_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_rule  change column  r_id r_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_rule add r_id int(11) not null default null auto_increment");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_rule where Field='item_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="int(11)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_rule  change column  item_id item_id int(11)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_rule add item_id int(11) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_rule where Field='mark_rule_id' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="char(5)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_rule  change column  mark_rule_id mark_rule_id char(5)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_rule add mark_rule_id char(5) null default null ");
		}
		
		$col_info = db_factory::query("show COLUMNS FROM ".TABLEPRE."witkey_priv_rule where Field='rule' ");
		$col_info = $col_info[0];
		if($col_info){
			if($col_info["Type"]!="char(5)"){
				db_factory::execute("alter  table ".TABLEPRE."witkey_priv_rule  change column  rule rule char(5)");
			}
		}
		else{
			db_factory::execute("alter table ".TABLEPRE."witkey_priv_rule add rule char(5) null default null ");
		}
		
	}
	$table_exist=false;
	if(!$table_exist){
	
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('145','49','5','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('140','57','5','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('142','49','2','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('143','49','3','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('144','49','4','')");
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('127','49','1','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('129','51','1','1')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('294','51','2','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('295','51','3','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('296','51','4','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('297','51','5','')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_priv_rule (`r_id`,`item_id`,`mark_rule_id`,`rule`) values ('298','51','6','')");
						}
	/*********Table witkey_priv_rule end **************/