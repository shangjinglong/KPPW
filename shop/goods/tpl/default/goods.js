

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

	//第一步
	$('#pubGoodsFormstep1').scojs_valid({
		rules: {
			indus_pid:	['not_empty'],
			indus_id: 	['not_empty'],
			txt_title:	['not_empty',{min_length:2}, {max_length:50} ],
	    	tar_content:['not_empty',{min_length:20},{max_length:65565} ],
	    	txt_price:	['not_empty','decimal',{'max_length': 8}],
	    	agreementchecked:['not_empty'],
	    	file_ids:['not_empty']
		},
		messages: {
			indus_pid: {
				not_empty : "请选择父行业"
			},
			indus_id:{
				not_empty : "请选择子行业"
			},
			txt_title:{
				not_empty : "请输入标题名称",
				min_length: "标题名称最少2字符",
				max_length: "标题名称最多50字符"
			},
			tar_content:{
				not_empty : "请输入需求描述",
				min_length: "需求描述最少20字符",
				max_length: "需求描述最多65565字符"
			},
			txt_price: {
				not_empty: "请输入您的预算",
				decimal:'输入格式不正确',
				max_length:'输入最大长度不得超过8位'
			},
			agreementchecked:{
				not_empty: "请先同意发布协议",
			},
			file_ids:{
				not_empty: "请上传图片",
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
	//第三步
	$('#pubGoodsFormstep2').scojs_valid({
		rules: {
			txt_goodstop:	['not_empty','digit']
		},
		messages: {
			txt_goodstop:{
				not_empty : "如不需要请填写'0'",
				digit     : "请填写有效的数字"
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

	//查看更多
	$("#viewMoreContent").click(function(){
		if($(this).text() == '查看更多'){
			$("#fullContent").removeClass('hidden');
			$("#partContent").addClass('hidden');
			$(this).text('收起更多');
		}else{
			$("#fullContent").addClass('hidden');
			$("#partContent").removeClass('hidden');
			$(this).text('查看更多');
		}
	});
})
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
/**
 *推荐到首页*/
   function recommendTop(id){
	   confirmOp('确定推荐到首页？', function(){
		   var url = 'index.php?do=goods&op=recommendTop&id='+id;
		   formSubmit(url,'url');
	   });
   }
   /**
    *取消推荐到首页*/
      function cancelRecommendTop(id){
   	   confirmOp('确定取消推荐到首页？', function(){
   		   var url = 'index.php?do=goods&op=cancelRecommendTop&id='+id;
   		   formSubmit(url,'url');
   	   });
      }