<?php
define( "IN_KEKE" ,true);
	$model_name="service";
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
	
	db_factory::execute("replace into ".TABLEPRE."witkey_mark_config (`mark_config_id`,`obj`,`good`,`normal`,`bad`,`type`) values ('13','service','100','50',0,'1')");
					
	db_factory::execute("replace into ".TABLEPRE."witkey_mark_config (`mark_config_id`,`obj`,`good`,`normal`,`bad`,`type`) values ('14','service','100','50',0,'2')");
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
			,	`listorder` int(11) default 0 
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
	
	db_factory::execute("replace into ".TABLEPRE."witkey_model (`model_id`,`model_code`,`model_name`,`model_dir`,`model_type`,`model_dev`,`model_status`,`model_desc`,`on_time`,`hide_mode`,`listorder`,`model_intro`,`indus_bid`,`config`) values ('7','service','威客服务','service','shop','kekezu','1','<strong>威客作品的一般流程是：</strong><br /><p>1、买家在网站平台上上传服务，等待后台审核</p><p>2、审核通过后，该服务就会上架，在网站商城里显示</p><p>3、卖家购买服务后，付款</p><p>4、付款后，等待买家提供服务</p><br />','1325152856',0,'7','威客服务是网络商城的一种交易模式。','','a:5:{s:14:\"service_profit\";s:2:\"20\";s:8:\"min_cash\";s:1:\"5\";s:10:\"audit_cash\";s:2:\"20\";s:16:\"step_min_account\";s:1:\"6\";s:13:\"max_filecount\";s:1:\"2\";}')");
					}
	/*********Table witkey_model end **************/