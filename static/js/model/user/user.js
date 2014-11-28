

/**
 * ajax表单提交
 * @param {String} id
 * @param {String} method=> post,get
 * @param {String} type=>form,url
 */
function formSubmit(id,type){
	if(type=='form'){
		var options = {
		   type:'post',
	       dataType: "json",
	       success: function(json) {
	    	   tipsOp(json.data,json.status);
	    	   if(json.url){
           		window.location.href=json.url;
	    	   }
	       },error: function(json) {
	    	   tipsOp('服务器繁忙,请重试...','error');
	       }
	   };
	   $('#'+id).ajaxSubmit(options);
	}else if(type=='url'){
		$.ajax({
            type: 'get',
            url: id,
            dataType: "json",
            success: function (json) {
            	tipsOp(json.data,json.status);
            	if(json.url){
            		window.location.href=json.url;
            	}
            },
            error: function (msg) {
            	tipsOp('服务器繁忙,请重试...','error');
            }
        });
	}
}


/**
 * 单条删除
 * @param url
 * @returns {Boolean}
 */
function opSingle(url) {
	
	var confirm = $.scojs_confirm({
		content : tipsType('您确定删除吗？', 'warning'),
		action : function() {
			formSubmit(url, 'url');
		}
	});
	confirm.show();
	return false;
}


/**
 * 删除多条信息
 *
 * @returns {Boolean}
 */
function opMulit(action,form){
	$("#action").val(action);
	var conf = $(":checkbox[name='ckb[]']:checked").length;
	if(conf>0){
		formSubmit(form,'form');
	}else{
		tipsOp('您没有选择任何操作项','warning');
	}
	return false;
}



$(function(){
	/**
	 * 全选
	 */
	$('#checkbox').click(function(){
		 if ($(this).prop('value') == 0) {
		      $(this).prop("value",1);
		      $('input[type=checkbox]').prop('checked', true);
		    }  else {
		      $(this).prop("value",0);
		        $('input[type=checkbox]').prop('checked', false);
		    }
	});
})


/**
 * 取消关注
 * @param url
 * @returns {Boolean}
 */
function opCancelFocus (url) {
	var confirm = $.scojs_confirm({
			content : tipsType('您确定取消关注吗？', 'warning'),
			action : function() {
				formSubmit(url, 'url');
			}
		});
		confirm.show();
		return false;
}

/**
 * 加关注
 * @param action == add
 * @param id
 */
function opAddFollow(action,id){
	$.post('index.php?do=user&view=focus&op=fans',{action:action,fansId:id},function(json){
		if(json.status == 1){
			if(json.data.res == 'add_focus'){
				showDialog('关注成功','right','操作提示','window.location.reload()');
			}else{
				$("#add_follow_"+json.msg).replaceWith('<span class="label label-success"><i class="fa fa-exchange"></i> 相互关注</span>');
			}
		}
	},'json');
}

//jquery 调用
$(function(){

	//subtmi单击触发不可用
	//$(':submit').bind("click",function(){
	//	$(':submit').addClass('disabled');
	//});


	//选择页数以及排序自动提交表单
	$('.action-bar select').change(function() {
		$(this).parents('form').submit();
		$('select,input,button,textarea').attr({
			disabled: 'disabled'
		}).addClass('disabled');
	});

	//左边菜单目录
	$('.nav-list dt').click(function() {
		var inner_menu = $(this).next('dd'),
			title_icon = $(this).children('i'),
			op_class = 'fa-minus',
			cl_class = 'fa-plus';
		if(inner_menu.is(':visible')){
			title_icon.removeClass(op_class).addClass(cl_class);
			inner_menu.slideUp();
		}else{
			title_icon.removeClass(cl_class).addClass(op_class);
			inner_menu.slideDown();
		}
	});
});
