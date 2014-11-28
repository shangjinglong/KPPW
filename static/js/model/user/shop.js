$(function(){

	//店铺设置
	$('#editShopForm').scojs_valid({
	    rules: {
	    	shop_name: ['not_empty',{'min_length': 2}]
	    },
	    messages: {
	    	truename: {
				not_empty: "请输入店铺名称",
				min_length: "最少输入两位字符"
			}
	    },
	    wrapper:'.form-group'
	    ,onSuccess: function(response, validator, $form) {
	    	$(':submit').prop('disabled', 'disabled').addClass('disabled');
	    	  tipsUser(response.data,response.status);
	    }
	});

	//店铺设置
	$('#editCaseForm').scojs_valid({
	    rules: {
	    	case_name: ['not_empty',{'min_length': 2}],
	    	case_url:['not_empty','url'],
	    	filepath:['not_empty'],
	    	case_desc:['not_empty',{'min_length': 10}]
	    },
	    messages: {
	    	case_name: {
				not_empty: "请输入案例名称",
				min_length: "最少输入两位字符"
			},
			case_url:{
				not_empty: "请输入案例链接",
				url: "案例链接输入格式有误"
			},
			filepath:{
				not_empty: "请上传案例图片",
			},
			case_desc: {
				not_empty: "请输入案例描述",
				min_length: "案例描述不得少于10个字符"
			},
	    },
	    wrapper:'.form-group'
	    ,onSuccess: function(response, validator, $form) {
	    	$(':submit').prop('disabled', 'disabled').addClass('disabled');
	    	  tipsUser(response.data,response.status);
	    		if(response.url){
					window.location.href=response.url;
				}
	    }
	});

});