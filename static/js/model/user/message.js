
$(function(){
	//发送私信
	$('#addMsgForm').scojs_valid({
		rules: {
	    	to_username : ['not_empty'],
	    	title: ['not_empty',{'min_length': 4}],
	    	content:['not_empty'],
	    },
	    messages: {
	    	to_username:{
	    		not_empty:"请输入收件人"
	    	},
	    	title: {
				not_empty: "请输入信息标题",
				min_length: "最少输入四位字符"
			},
			content:{
				not_empty: "信息内容",
				min_length: "最少输入10位字符，最多输入500位字符"
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

