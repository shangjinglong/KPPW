$(function(){

	//认证中心--银行认证--添加新账户
	$('#editAddBankInfoForm').scojs_valid({
		rules: {
			txt_name  : ['not_empty',{'max_length': 30}],
			bank_full_name  : ['not_empty',{'max_length': 50}],
			card_num  : ['not_empty','credit_card'],
			card_num2 :[{matches: 'card_num'}]
		},
		messages: {
			txt_name: {
				not_empty: '请输入'+strAccountName,
				max_length: strAccountName+'太长了哦'
			},
			bank_full_name: {
				not_empty: "请输入开户行名称",
				max_length: "开户行名称太长了哦"
			},
			card_num: {
				not_empty: "请输入银行卡号",
				credit_card: "银行卡号格式不正确"
			},
			card_num2:{
				matches: "两次输入银行卡号不一致",
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
