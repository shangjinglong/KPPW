

$(function(){

	//基本资料
	$('#editBasicForm').scojs_valid({
	    rules: {
	    	truename: ['not_empty',{'min_length': 2}],
	    	birthday:['not_empty'],
	    },
	    messages: {
	    	truename: {
				not_empty: "请输入真实姓名",
				min_length: "最少输入两位字符"
			},
	    	birthday:{
				not_empty: "请选择出生日期",
			}
	    },
	    wrapper:'.form-group'
	    ,onSuccess: function(response, validator, $form) {
	    	  tipsUser(response.data,response.status);
	    }
	});
	//基本资料--企业资料
	$('#editBasicEnterPriseForm').scojs_valid({
		rules: {
			company: ['not_empty',{'min_length': 2}],
			licen_num:['not_empty'],
			staff_num:['digit'],
			run_years: ['digit'],
			url:['url']
		},
		messages: {
			company: {
				not_empty: "请输入企业/机构名称",
				min_length: "最少输入两位字符"
			},
			licen_num: {
				not_empty: "请输入营业执照号码"
			},
			staff_num: {
				digit: "请输入营业执照号码"
			},
			run_years: {
				digit: "请输入营业执照号码"
			},
			url: {
				url: "请输入正确的URL"
			}

		},
		wrapper:'.form-group'
			,onSuccess: function(response, validator, $form) {
				tipsUser(response.data,response.status);
			}
	});


	//联系方式
	$('#editContactForm').scojs_valid({
		rules: {
			email  : ['not_empty','email'],
			mobile : ['not_empty','digit',{min_length:11},{max_length:11}],
			qq : ['digit',{max_length:12}],
			phone : ['not_empty','alpha_dash'],
		},
		messages: {
			email: {
				not_empty: "请输入邮箱",
				email: "请输入正确的邮箱"
			},
			mobile:{
				not_empty: "请输入手机号码",
				digit: "请输入正确的手机号码",
				min_length:'请检查手机号码是否输入正确',
				max_length:'请检查手机号码是否输入正确'
			},
			qq:{

				digit: "请输入正确的QQ号码",
				max_length:'输入长度不符'
			},

			phone:{
				not_empty: "请输入固定电话号码",
				alpha_dash: "请输入正确的固定电话号码"
			}
		},
		wrapper:'.form-group'
		,onSuccess: function(response, validator, $form) {
	    	  tipsUser(response.data,response.status);
	    }
	});

	//安全设置  --修改安全码
	$('#editSecurityForm').scojs_valid({
		rules: {
			old_code  : ['not_empty',{'min_length': 6}],
			new_code : ['not_empty', {'min_length': 6}],
			confirm_code :[{matches: 'new_code'}]
		},
		messages: {
			old_code: {
				not_empty: "请输入安全密码，区分大小写",
				min_length: "安全密码太短了，至少要6位哦"
			},
			new_code:{
				not_empty: "请输入新的安全密码，区分大小写",
				min_length:'安全密码太短了，至少要6位哦'
			},
			confirm_code:{
				matches: "两次输入密码不一致",
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
	//安全设置--修改登陆密码
	$('#editPasswordForm').scojs_valid({
		rules: {
			old_password  : ['not_empty',{'min_length': 6}],
			new_password : ['not_empty', {'min_length': 6}],
			confirm_password :[{matches: 'new_password'}]
		},
		messages: {
			old_password: {
				not_empty: "请输入登陆密码，区分大小写",
				min_length: "密码太短了，至少要6位哦"
			},
			new_password:{
				not_empty: "请输入新的登陆密码，区分大小写",
				min_length:'密码太短了，至少要6位哦'
			},
			confirm_password:{
				matches: "两次输入密码不一致",
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

});
