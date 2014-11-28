$(function(){
	var strSubmitMethod = $(":radio[name='submit_method']:checked");
	if(strSubmitMethod.val()=='outside'){
		$("#submit_method").hide();
	}
	$(":radio[name='submit_method']").click(function(){
		if($(this).val()=='outside'){
			$("#submit_method").hide();
			$("#kefu_help").show();
			$("#file_btn").show();
			$("#cfile_btn").hide();
		}else{
			$("#submit_method").show();
			$("#kefu_help").hide();
			$("#cfile_btn").show();
			$("#file_btn").hide();
		}
	});


	//我的稿件 编辑并出售
	$('#editWorkForm').scojs_valid({
	    rules: {
	    	goodsname: ['not_empty'],
	    	goodsdesc:['not_empty'],
	    	goodsprice:['not_empty','decimal']
	    },
	    messages: {
	    	goodsname: {
				not_empty: "请输入作品名称"
			},
			goodsdesc:{
				not_empty: "请输入作品描述",
			},
			goodsprice:{
				not_empty: "请输入出售价格",
				decimal: "输入的价格无法识别，请重新输入"
			}
	    },
	    wrapper:'.form-group'
	    ,onSuccess: function(response, validator, $form) {
	    	  tipsUser(response.data,response.status);
	    	  if(response.url){
					window.location.href=response.url;
			  }
	    }
	});

	/**
	 * 日期选择插件*/
	$('.form_datetime').datetimepicker({
	      language:  'zh-CN',
	      weekStart: 1,
	      todayBtn:  1,
	      autoclose: 1,
	      todayHighlight: 1,
	      startView: 2,
	      minView: 2,
	      forceParse: 0
	  });
});

/**
 *检查是否上传图片及源文件*/
function isNextChecked(){
   var strType = $("input[name='submit_method']:checked").val();
   if($("#file_ids").val()){
		$("#uploadShopImg").addClass('hidden');
		 if(strType=='inside'){
		    	if($("#file_path_2").val()){
					$("#uploadShopFile").addClass('hidden');return true;
				}else{
					$("#uploadShopFile").removeClass('hidden');return false;
				}
		    }else{
		    	return true;
		    }
	}else{
		$("#uploadShopImg").removeClass('hidden');return false;
	}
}
