$(function(){
	
	//选择服务
	$('.service-selected').click(function(){
		var title = $(this).attr('title');
		var price = $(this).attr('data-price');
//		var serviceid = $(this).attr('data-serviceid');
		$("#title").val(title);
		$("#content").val('我需要'+title);
		$("#price").val(price);
//		$("#service_id").val(serviceid);
	});
	
	//第一步
	$('#submitOrderFormstep1').scojs_valid({
		rules: {
			indus_pid:	['not_empty'],
			indus_id: 	['not_empty'],
			title:	['not_empty',{min_length:2}, {max_length:50} ],
	    	content:['not_empty',{min_length:20},{max_length:1000} ],
	    	price:	['not_empty','decimal',{'max_length': 8}]

		},
		messages: {
			indus_pid: {
				not_empty : "请选择父行业"
			},
			indus_id:{
				not_empty : "请选择子行业"
			},
			title:{
				not_empty : "请输入标题名称",
				min_length: "标题名称最少2字符",
				max_length: "标题名称最多50字符"
			},
			content:{
				not_empty : "请输入需求描述",
				min_length: "需求描述最少20字符",
				max_length: "需求描述最多1000字符"
			},
			price: {
				not_empty: "请输入您的预算",
				decimal:'输入格式不正确',
				max_length:'输入最大长度不得超过8位'
			}

		},
		wrapper:'.form-group'
			,onSuccess: function(response, validator) {
				tipsOp(response.data,response.status);
				if(response.url){
					setTimeout(function() {
						window.location.href = response.url;
					}, 3000);
				}
			}
	});

	//卖家接受订单
	$("#sellerAcceptOrder").click(function(){
		confirmOp(tipsType('你确定要接受该订单吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=accept','url');
		},false);

	});
	//卖家拒绝订单
	$("#sellerRefuseOrder").click(function(){
		confirmOp(tipsType('你确定要拒绝该订单吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=refuse','url');
		},false);

	});
	//卖家开始工作
	$("#sellerStartWorking").click(function(){
		confirmOp(tipsType('你确定要开始工作了吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=working','url');
		},false);

	});
	//卖家确认完成工作
	$("#sellerCompleteWork").click(function(){
		var workfile = $("#file_ids").val();
		confirmOp(tipsType('你确定完成工作了吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=complete&workfile='+workfile,'url');
		},false);

	});

	//买家现在去托管赏金
	$("#buyerPayNow").click(function(){
		confirmOp(tipsType('你确定要托管赏金吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=pay','url');
		},false);

	});
	//买家确认验收
	$("#buyerConfirmAcceptance").click(function(){
		confirmOp(tipsType('你确定对方完成工作了吗？','info'),function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=acceptance','url');
		},false);

	});

});

