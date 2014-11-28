<?php
/**
*标签管理
*@author deng
*@version KPPW 2.0
*@charset:GBK
*2011-12-15 下午03:47:44
*/
$lang=array(
/*admin_tpl_edit_tag.php*/
	  'enter_tag_name'=>'请输入标签名',
      'tag_name_inuse_please_replace'=>'该标签名已被使用,请更换',
      'edit_tag'=>'编辑标签',
      'create_tag'=>'创建标签',
	  'tag_call'=>'标签调用',
      'tag_change_success'=>'标签修改成功',
      'tag_change_fail'=>'标签修改失败',
/*admin_tpl_edit_tag_article.htm*/
      'call_class'=>'调用分类',
      'multi_class_input_number'=>'多个分类请在 这里输入编号',
      'multi_sort'=>'多个分类',
      'drop_down_list_fail_notice'=>'用,分隔(此项设置会导致下拉列表失效)',
      'article_id'=>'文章编号',
      'query_fail_notice'=>'用,分隔(此条件会导致其它查询条件失效)',
      'article_attribute'=>'文章属性',
      'is_picture'=>'是否有图',
      'after'=>'之后',
      'before'=>'之前',
	  'tag_add'=>'标签添加',
/*admin_tpl_edit_tag_category.htm*/
      'task_sort'=>'任务分类',
      'sort_tag'=>'分类标签',
	  'tpl_tip_msg'=>'(选择标签适用模板)',
      'task_sort_tag'=>'任务分类标签',
      'call_class'=>'调用分类',
      'multi_class_input_number'=>'多个分类请在下一行输入编号',
      'multi_sort'=>'多个分类',
      'drop_down_list_fail_notice'=>'用,分隔(此项设置会导致下拉列表失效)',
/*admin_tpl_edit_tag_autosql.htm*/
      'sql_sentence'=>'sql语句',
      'output_model_notice'=>'(此处可以自定义输出模式.可用<br>&#123;loop &#36;datalist &#36;k &#36;v&#125;
							                 <br> XXXX循环输出代码
											  <br>&#123;/loop&#125;
											  <br>其中,loop为模板循环语法。可以将数组循环输出。方法同php的foreach函数。<br>
											  &#36;datalist为数据源.&#36;k为可选参数。为获得的键值.&#36;v为必选.为循环出的结果
				)',
/*admin_tpl_edit_tag_service.htm*/
     'goods_tag'=>'商品标签',
     'goods_type'=>'商品类型',
     'works'=>'作品',
     'pay_method'=>'交付方式',
     'website_outside_pay'=>' 站外交付',
     'file_upload'=>'文件下载',
/*admin_tpl_edit_tag_artcate.htm*/
      'article_sort'=>'文章分类',
      'tag_model'=>'标签模式',
      'multi_class_input_number'=>'多个分类请在 这里输入编号',
      'drop_down_list_fail_notice'=>'用,分隔(此项设置会导致下拉列表失效)',
      'article_sort_tag'=>'文章分类标签',
	   'eg_code_patten'=>'标签代码格式:&#123;loop &#36;datalist &#36;k &#36;v&#125;</br>
									 　　　　　　　　　　　自定义代码
								</br>　　　　　　　　&#123;/loop&#125;',
		'param_detail'=>'参数详解',
		'article_tag_code'=>'&#36;v&#91;id&#93;:文章编号;　&#36;&#91;catid&#93;:文章分类编号;
								&#36;v&#91;catname&#93;:文章分类名称;　&#36;v&#91;uid&#93;:文章添加用户;　
								&#36;v&#91;title&#93;:文章标题;　&#36;v&#91;content&#93;:文章内容;　
								&#36;v&#91;url&#93;:文章链接;&#36;v&#91;pic&#93;:文章图片;　&#36;v&#91;time&#93;:文章添加时间;',
		'task_tag_code'=>'&#36;v&#91;id&#93;:任务编号;　&#36;v&#91;url&#93;:任务链接;　&#36;&#91;status&#93;:任务状态;</br>
								&#36;v&#91;title&#93;:任务标题;&#36;v&#91;indus_id&#93;:子行业ID;　
								&#36;v&#91;indus_pid&#93;:父行业ID;　&#36;v&#91;uid&#93;:发布者ID;　
								&#36;v&#91;cash&#93;:任务金额;　&#36;v&#91;url&#93;:任务链接;　
								&#36;v&#91;username&#93;:发布者;&#36;v&#91;starttime&#93;:开始时间;&#36;v&#91;endtime&#93;:结束时间;',
		'category_tag_code'=>'&#36;v&#91;indus_id&#93;:子行业ID;　&#36;v&#91;indus_pid&#93;:父行业ID;</br>
								&#36;v&#91;name&#93;:行业名称;　　
								&#36;v&#91;intro&#93;:行业简介;&#36;v&#91;url&#93;:行业链接;',
		'autosql_tag_code'=>'根据自定义sql查询的字段自行调整',
		'service_tag_code'=>'&#36;v&#91;sid&#93;:商品编号;　&#36;v&#91;title&#93;:商品名称;</br>
								&#36;v&#91;uid&#93;:发布者ID;　&#36;v&#91;username&#93;:发布者;　
								&#36;v&#91;pic&#93;:商品图片;　&#36;v&#91;url&#93;:商品链接;　
								&#36;v&#91;content&#93;:商品内容;&#36;v&#91;on_time&#93;:发布时间;',
);