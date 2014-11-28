/**
 * 邮箱认证**********************************************************************************************
 * 邮箱认证**********************************************************************************************
 * */


$(function(){

	$('#editEmailForm').scojs_valid({
		rules: {
			email  : ['not_empty','email'],
		},
		messages: {
			email: {
				not_empty: "请输入邮箱",
				email: "请输入正确的邮箱"
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

/**
 * 查看邮件
 * @param type
 */
function viewMail(type){
	var url = 'http://mail.'+type+'';
	window.open(url);
}

/**
 * 重发邮件
 */
function reSend(){
	$.getJSON("index.php?do=user&view=account&op=auth&code=email&step=step2&resend=1",function(json){
		tipsOp(json.msg);;return false;
	});
}

/**
 * 实名认证**********************************************************************************************
 * 实名认证**********************************************************************************************
 * */

function saveAuthInfo(){
	var boolValue = false;
	var strIdPic = $("#filepath").val();
	if(strIdPic){
		boolValue = true;
	}else{
		tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 请上传身份证件图</div>');
	}
	return boolValue;
}

$(function(){

	$('#editRealnameForm').scojs_valid({
		rules: {
			truename : ['not_empty'],
			idcard : ['not_empty',{'min_length': 16},{'max_length':18}],
		},
		messages: {
			truename: {
				not_empty: "请输入真实姓名"
			},
			idcard:{
				not_empty: "请输入身份证号码",
				min_length:'请输入16-18位有效的身份证号码',
				max_length:'请输入16-18位有效的身份证号码'
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


/**
 * 企业认证**********************************************************************************************
 * 企业认证**********************************************************************************************
 * */
function saveLicensePic(){
	var boolValue = false;
	var strFilePath = $("#filepath").val();
	if(strFilePath){
		boolValue = true;
	}else{
		tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 请上传营业执照图片</div>');
	}
	return boolValue;
}

$(function(){

	$('#editEnterPriseForm').scojs_valid({
		rules: {
			enterprisename  : ['not_empty'],
			licensenum : ['not_empty',{'min_length': 5},{'max_length':30}]
		},
		messages: {
			enterprisename: {
				not_empty: "请输入企业名"
			},
			licensenum:{
				not_empty: "登记注册号码",
				min_length:'请输入5-30位有效的登记注册号码',
				max_length:'请输入5-30位有效的登记注册号码'
			}
		},
		wrapper:'.form-group',
		onSuccess: function(response, validator, $form) {
	    	  tipsUser(response.data,response.status);
	    	  if(response.url){
					window.location.href=response.url;
	    	  }
	    }
	});

});





/**
 * 手机认证**********************************************************************************************
 * 手机认证**********************************************************************************************
 * */
$(function(){

	$('#editMobileForm').scojs_valid({
		rules: {
			mobile  : ['not_empty','digit',{'min_length': 11},{'max_length':11}]
		},
		messages: {
			mobile: {
				not_empty: "请输入手机号码",
				digit:'请输入有效的手机号码',
				min_length:'请输入11位有效的手机号码',
				max_length:'请输入11位有效的手机号码'
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
	$('#editMobileValidForm').scojs_valid({
		rules: {
			valid_code  : ['not_empty',{'min_length': 4},{'max_length':4}]
		},
		messages: {
			valid_code: {
				not_empty: "请输入手机验证码",
				min_length:'请输入4位有效的手机验证码',
				max_length:'请输入4位有效的手机验证码'
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
	 * 重新发送验证码
	 */
	$("#reset").click(function(){
		$("#valid_code").val('');
		$.getJSON("index.php?do=user&view=account&op=auth&auth_code=mobile&auth_step=step2&resend=1",function(json){
			if(json.status ==='success'){
				tipsUser(json.data,json.status);
				if(json.url){
					window.location.href=json.url;
				}
				return false;
			}
			tipsOp(json.data);;return false;
		});
	});


});

/**
 * 银行认证**********************************************************************************************
 * 银行认证**********************************************************************************************
 * */
$(function(){

	$('#editBankForm').scojs_valid({
		rules: {
			user_get_cash  : ['not_empty','decimal']
		},
		messages: {
			user_get_cash: {
				not_empty: "请输入打款金额",
				decimal:'请输入有效的打款金额'
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
/**
 * 银行认证-列表操作(取消/解绑/删除等等...)
 * @param content
 * @param url
 * @returns {Boolean}
 */
function opBankAuth(content,url) {
	var confirm = $.scojs_confirm({
		content : content,
		action : function() {
			$.getJSON(url,function(json){
				if(json.url){
					window.location.href = json.url;
				}
				return false;
			});
		}
	});
	confirm.show();
	return false;
}