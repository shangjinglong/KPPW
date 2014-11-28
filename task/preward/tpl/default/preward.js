

$(function(){
	//第一步
	$('#pubTaskFormstep1').scojs_valid({
	    rules:{
	    	txt_task_cash: ['not_empty','decimal',{'max_length': 8}],
	    	txt_task_day:['not_empty'],
	    	txt_work_count:['not_empty','digit']

	    },
	    messages: {
	    	txt_task_cash: {
				not_empty: "请输入您的预算",
				decimal:'输入格式不正确',
				max_length:'输入最大长度不得超过8位'
			},
			txt_task_day:{
				not_empty: "请选择结束日期"
			},
			txt_work_count:{
				not_empty: "请输入所需稿件"
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
	//第二步
	$('#pubTaskFormstep2').scojs_valid({
		rules: {
			indus_pid:	['not_empty'],
			indus_id: 	['not_empty'],
			txt_title:	['not_empty',{min_length:2}, {max_length:50} ],
	    	tar_content:['not_empty',{min_length:20},{max_length:65565} ],
	    	txt_mobile:	['not_empty',{min_length:11},{max_length:11},'digit' ]
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
			txt_mobile:{
				not_empty : "请输入手机号码",
				digit     : "请输入正确的手机号码",
				min_length: '请检查手机号码是否输入正确',
				max_length: '请检查手机号码是否输入正确'
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
	$('#pubTaskFormstep3').scojs_valid({
		rules: {
			txt_urgent:		['not_empty',{regex: /[01]/}],
			txt_tasktop:	['not_empty','digit'],
			txt_workhide:	['not_empty',{regex: /[01]/}],
			txt_seohide:	['not_empty',{regex: /[01]/}],
		},
		messages: {
			txt_urgent:{
				not_empty : "如不需要请填写'0'",
				regex     : "最多购买一次"
			},
			txt_tasktop:{
				not_empty : "如不需要请填写'0'",
				digit     : "请填写有效的数字"
			},
			txt_workhide:{
				not_empty : "如不需要请填写'0'",
				regex     : "最多购买一次"
			},
			txt_seohide:{
				not_empty : "如不需要请填写'0'",
				regex     : "最多购买一次"
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
    /**
     * 稿件单价自动显示*/
	checkSingleCash();
	$("#txt_task_cash").keyup(function(){
		checkSingleCash();
	});
	$("#txt_work_count").keyup(function(){
		checkSingleCash();
	})
})

/**
 * 稿件单价计算*/
	function checkSingleCash(){
		var floatTotleCash = Number($("#txt_task_cash").val())+0;
		var intWorkCount = Number($("#txt_work_count").val())+0;
		var floatSingleCash = 0;
		if(intWorkCount){
			floatSingleCash = parseFloat(floatTotleCash/intWorkCount);
			floatSingleCash = formatnumber(floatSingleCash,2);
		}
		$("#txt_single_cash").val(floatSingleCash);
	}
/**
 * 格式化稿件单价数据
 * @param value
 * @param num
 * @returns
 */
function formatnumber(value,num){
	var a,b,c,i
	a = value.toString();
	b = a.indexOf('.');
	c = a.length;
	if(b!=-1){
		if(num>0){
			a = a.substring(0,b+num+1);
			for (i=c;i<=b+num;i++){
				a = a + "0";
			}
		}else{
			a = a + ".";
			for (i=1;i<=num;i++){
				a = a + "0";
			}
		}
	}
	return Number(a);
}