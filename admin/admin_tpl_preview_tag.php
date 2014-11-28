<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(52);
$tagid = $tagid?$tagid:kekezu::admin_show_msg($_lang['error_param'],"index.php?do=tpl&view=taglist",3,'','warning');
$tag_obj = new Keke_witkey_tag_class();
$tag_obj->setWhere("tag_id='{$tagid}'");
$tag_info = $tag_obj->query_keke_witkey_tag();
$tag_info = $tag_info[0];
if ($tag_info['tag_type']==1)
	{
		$task_obj = new Keke_witkey_task_class();
		$where = "1=1 ";
		if ($tag_info['task_ids'])
		{
			$where .= "adn task_id in ({$tag_info['task_ids']})";
		}
		else{
			if ($tag_info['model_id'])
			{
				$where.="and model_id = '{$tag_info['model_id']}' ";
			}
			if ($tag_info['task_indus_ids'])
			{
				$where.="and indus_id in ({$tag_info['task_indus_ids']}) ";
			}
			else if($tag_info['task_indus_id']){
				$where.="and indus_id = '{$tag_info['task_indus_id']}' ";
			}
			if ($tag_info['task_status'])
			{
				$where.="and task_status = '{$tag_info['task_status']}' ";
			}
			else {
				$where.="and task_status in (2,3,4,7) ";
			}
			if ($tag_info['start_time1'])
			{
				$where.="and start_time >{$tag_info['start_time1']} ";
			}
			if ($tag_info['start_time2'])
			{
				$where.="and start_time <{$tag_info['start_time2']} ";
			}
			if ($tag_info['end_time1'])
			{
				$where.="and end_time >{$tag_info['end_time1']} ";
			}
			if ($tag_info['end_time2'])
			{
				$where.="and end_time <{$tag_info['end_time2']} ";
			}
			$lefttime = 0;
			if ($tag_info['left_day'])
			{
				$lefttime += $tag_info['left_day']*24*60*60;
			}
			if ($tag_info['left_hour'])
			{
				$lefttime += $tag_info['left_hour']*60*60;
			}
			if ($lefttime)
			{
				$lefttime+= time('now()');
				$where.="and end_time >{$lefttime} ";
			}
			if ($tag_info['task_cash1'])
			{
				$where.="and task_cash >{$tag_info['task_cash1']} ";
			}
			if ($tag_info['task_cash2'])
			{
				$where.="and task_cash <{$tag_info['task_cash2']} ";
			}
			if ($tag_info['prom_cash1'])
			{
				$where.="and prom_cash >{$tag_info['prom_cash1']} ";
			}
			if ($tag_info['prom_cash2'])
			{
				$where.="and prom_cash <{$tag_info['prom_cash2']} ";
			}
			if ($tag_info['username'])
			{
				$where.="and username = '{$tag_info['username']}' ";
			}
		}
		$where.=$tag_info['open_is_top']? "order by istop desc,":"order by ";
		switch ($tag_info['listorder'])
		{
			case 1:
			default:
				$where.= "task_id desc ";
				break;
			case 2:
				$where.= "task_id asc ";
				break;
			case 3:
				$where.= "task_cash desc ";
				break;
			case 4:
				$where.= "task_cash asc ";
				break;
			case 5:
				$where.= "prom_cash desc ";
				break;
			case 6:
				$where.= "prom_cash asc ";
				break;
			case 7:
				$where.= "start_time desc ";
				break;
			case 8:
				$where.= "start_time asc ";
				break;
			case 9:
				$where.= "end_time desc ";
				break;
			case 10:
				$where.= "end_time asc ";
				break;
		}
		if ($tag_info['loadcount'])
		{
			$where.= "limit 0,{$tag_info['loadcount']} ";
		}
		$task_arr = $task_obj->query_keke_witkey_task();
		$temp_arr = array();
		$indus_arr = kekezu::get_industry();
		foreach ($task_arr as $v)
		{
			$a = array();
			$a['id']=$v['task_id'];
			$a['type']=$v['task_type'];
			$a['status']=$v['task_status'];
			$a['title']=$v['task_title'];
			$a['pic']=$v['task_pic'];
			$a['catid']=$v['indus_id'];
			$a['uid']=$v['uid'];
			$a['username']=$v['username'];
			$a['starttime']=$v['start_time'];
			$a['endtime']=$v['start_time'];
			$a['cash']=$v['task_cash'];
			$a['views']=$v['view_num'];
			$a['prom']=$v['prom_cash'];
			$a['top']=$v['istop'];
			$a['time']=$v['pub_time'];
			$temp_arr[] = $a;
		}
	}
	elseif ($tag_info['tag_type']==2)
	{
		$art_obj = new Keke_witkey_article_class();
		$where = "1=1 ";
		if($tag_info['art_ids']){
			$where.="and art_id in ({$tag_info['art_ids']}) ";
		}
		else{
			if ($tag_info['art_cat_ids'])
			{
				$where.="and art_cat_id in ({$tag_info['art_cat_ids']}) ";
			}
			else if($tag_info['art_cat_id']){
				$where.="and art_cat_id = '{$tag_info['art_cat_id']}' ";
			}
			if ($tag_info['art_time1'])
			{
				$where.="and pub_time <{$tag_info['art_time1']} ";
			}
			if ($tag_info['art_time2'])
			{
				$where.="and pub_time >{$tag_info['art_time2']} ";
			}
			if ($tag_info['art_hasimg'])
			{
				$where.="and art_pic !='' ";
			}
			if ($tag_info['art_iscommend'])
			{
				$where.="and is_recommend=1 ";
			}
		}
		switch ($tag_info['listorder'])
		{
			case 1:
			default:
				$where.= "order by art_id desc ";
				break;
			case 2:
				$where.= "order by art_id asc ";
				break;
			case 3:
				$where.= "order by pub_time desc ";
				break;
			case 4:
				$where.= "order by pub_time asc ";
				break;
		}
		if ($tag_info['loadcount'])
		{
			$where.= "limit 0,{$tag_info['loadcount']} ";
		}
		$art_obj->setWhere($where);
		$art_arr = $art_obj->query_keke_witkey_article();
		$temp_arr = array();
		$cat_arr = keke_admin_class::get_article_cate();
		foreach ($art_arr as $v)
		{
			$a = array();
			$a['id']=$v['art_id'];
			$a['catid']=$v['art_cat_id'];
			$a['catname']=$cat_arr[$v['art_cat_id']]['cat_name'];
			$a['uid']=$v[uid];
			$a['catid']=$v['art_cat_id'];
			$a['title']=$v['art_title'];
			$a['pic']=$v['art_pic'];
			$a['time']=$v['pub_time'];
			$temp_arr[] = $a;
		}
	}
	elseif ($tag_info['tag_type']==3)
	{
		$cat_obj = null;
		if($tag_info['cat_type']==2){
			$cat_obj = new Keke_witkey_article_category_class();
			$where = "1=1 ";
			$where .= $tag_info['cat_cat_ids']?"and art_cat_id in ({$tag_info['cat_cat_ids']}) ":$tag_info['cat_cat_ids']?"and art_cat_id = '{$tag_info['cat_cat_id']}') ":"";
			if ($tag_info['cat_loadsub'])
			{
				$where .= $tag_info['cat_cat_ids']?"and art_cat_pid in ({$tag_info['cat_cat_ids']}) ":$tag_info['cat_cat_ids']?"and art_cat_pid = '{$tag_info['cat_cat_id']}') ":"";
			}
			$where .= $tag_info['cat_onlyrecommend']?"and is_show = 1 ":"";
			$cat_obj->setWhere($where." order by listorder");
			$cat_arr = $cat_obj->query_keke_witkey_article_category();
			$temp_arr = array();
			foreach ($cat_arr as $v){
				$a = array();
				$a['id']=$v['art_cat_id'];
				$a['name']=$v['cat_name'];
				$temp_arr[] = $a;
			}
		}
		else {
			$cat_obj = new Keke_witkey_industry_class();
			$where = "1=1 ";
			$where .= $tag_info['cat_cat_ids']?"and indus_id in ({$tag_info['cat_cat_ids']})":$tag_info['cat_cat_ids']?"and indus_id = '{$tag_info['cat_cat_id']}')":"";
			if ($tag_info['cat_loadsub'])
			{
				$where .= $tag_info['cat_cat_ids']?"and indus_pid in ({$tag_info['cat_cat_ids']})":$tag_info['cat_cat_ids']?"and indus_pid = '{$tag_info['cat_cat_id']}')":"";
			}
			$where .= $tag_info['cat_onlyrecommend']?"and is_recommend = 1 ":"";
			$cat_obj->setWhere($where." order by listorder");
			$cat_arr = $cat_obj->query_keke_witkey_industry();
			$temp_arr = array();
			foreach ($cat_arr as $v){
				$a = array();
				$a['id']=$v['indus_id'];
				$a['name']=$v['indus_name'];
				$temp_arr[] = $a;
			}
		}
	}
	elseif ($tag_info['tag_type']==4)
	{
		$sql = $tag_info['sql'];
		$temp_arr = db_factory::query($sql);
	}
	elseif ($tag_info['tag_type']==5)
	{
		die($tag_info['code']);
	}
	$datalist = $temp_arr;
require_once $template_obj->template(ADMIN_DIRECTORY.'/tpl/template_tag_'.$tag_info['tplname'] );