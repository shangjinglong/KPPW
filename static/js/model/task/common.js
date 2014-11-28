/**
 * 稿件点评
 * @param obj 对象
 * @param obj_id 稿件ID
 * @returns {Boolean}
 */

$(function(){
	c_time();
})

var COMM = 0;
function workComment(taskId,workId) {
	if (checkLogin()) {
		if(uid!=uid){
			tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 雇主才能对稿件评论</div>');return false;
		}else if(COMM==1){
			tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> 不能重复操作</div>');return false;
		}else{
			var url = 'index.php?do=taskhandle&taskId='+taskId+'&op=workComment&intWorkId=' + workId;
			var strContent = $("#strTarComment"+workId).val();
			if(strContent.length<=0){
				tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 点评内容不能为空</div>');return false;
			}else if(strContent.length>100){
					tipsOp('最多只能输入100个字');return false;
			}else if(strContent.length>0){
					COMM=1;
					$.post(url,{strTarComment:strContent},function(json){
						COMM=0;
						if(json.status=='success'){
							 var h =  new Date().getHours();
							 if(h>0&&h<12){
								 var hDesc = '上午';
							 }else if(h>=12&h<19){
								 var hDesc = '下午';
							 }else{
								 var hDesc = '晚上';
							 }
	             			 var str=$('<dl class="manuscript-comment-item"> <dt class="manuscript-comment-item-title"><a href="index.php?do=seller&id='+uid+'">'+username+' </a>  于'+json.data.d
							+hDesc+json.data.t +'点评 </dt><dd class="manuscript-comment-item-body">'+strContent+'</span> </dd></dl>');
	             			  str.appendTo($("#div_comment"+workId));
	             			  $("#strTarComment"+workId).val('');
	             			 $("#strTarComment"+workId).attr('placeholder','点评不得超过100字');
						}else{
							tipsOp(json.msg);return false;
						}
					},'json')
				}
		}
	}
}


function c_time() {
	$(".d_time").each(
			function() {

				var ed = $(this).attr('ed');

				if (ed) {
					var djs = d_time(ed);
					var str = djs[0] + '天' + djs[1] + '时' + djs[2]
							+ '分' + djs[3] +'秒';
				} else {
					var str = $(this).attr("title");
				}
				$(this).html(str);
			})
	setTimeout('c_time()', 1000);
}
function d_time(end_time){
    var DifferenceHour = -1;
    var DifferenceMinute = -1;
    var DifferenceSecond = -1;
    var Tday = new Date(end_time * 1000); //**倒计时时间点-注意格式
    var daysms = 24 * 60 * 60 * 1000;
    var hoursms = 60 * 60 * 1000;
    var Secondms = 60 * 1000;
    var microsecond = 1000;
    var d_arr = new Array();

    var time = new Date();
    var hour = time.getHours();
    var minute = time.getMinutes();
    var second = time.getSeconds();

    var timevalue = "" + ((hour > 12) ? hour - 12 : hour);
    timevalue += ((minute < 10) ? ":0" : ":") + minute;
    timevalue += ((second < 10) ? ":0" : ":") + second;

    timevalue += ((hour > 12) ? " PM" : " AM");
    var convertHour = DifferenceHour;
    var convertMinute = DifferenceMinute;
    var convertSecond = DifferenceSecond;
    var Diffms = Tday.getTime() - time.getTime();
    DifferenceHour = Math.floor(Diffms / daysms);
    Diffms -= DifferenceHour * daysms;
    DifferenceMinute = Math.floor(Diffms / hoursms);
    Diffms -= DifferenceMinute * hoursms;
    DifferenceSecond = Math.floor(Diffms / Secondms);

    Diffms -= DifferenceSecond * Secondms;
    var dSecs = Math.floor(Diffms / microsecond);
	if (convertHour != DifferenceHour) {
	    d_arr.push(DifferenceHour);
	}else{
		d_arr.push(0);
	}
    if (convertMinute != DifferenceMinute){
		d_arr.push(DifferenceMinute);
	} else{
		d_arr.push(0);
	}
    if (convertSecond != DifferenceSecond)
         d_arr.push(DifferenceSecond);

    d_arr.push(dSecs);

    return d_arr;

}

/***
 * 选稿操作
 * @param id  稿件id
 * @param status  选择的状态
 */
function chooseWork(id,status){
	var page = $("#worklist-curpage").val();
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 确定设置此稿件为'+jsonWorkStatus[status]+'?'+'</div>','index.php?do=taskhandle&op=workchoose&taskId='+taskId+'&workId='+id+'&status='+status+'&page='+page,true);
}
/***
 * 投票操作
 * @param id  稿件id
 * @param status  选择的状态
 */
function voteWork(id){
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 确定？</div>','index.php?do=taskhandle&op=workvote&taskId='+taskId+'&workId='+id,true);
}
/**
 * 普通招标-威客发起完工协议
 */
function PubAgreement(taskId){
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 确定完工？</div>','index.php?do=taskhandle&op=pubAgreement&taskId='+taskId,true);
}
/**
 * 普通招标-雇主确认完工协议
 */
function WorkOver(taskId){
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 确定验收完工？</div>','index.php?do=taskhandle&op=workOver&taskId='+taskId,true);
}


/**
 * 单个任务操作(推荐到首页)  */
function singleTaskOp(id,op){
	$.post('index.php?do=taskhandle', {op:op,taskId:taskId}, function(json){
		tipsOp(json.data);
		if(json.url){
			setTimeout(function(){window.location.href = json.url;},2000);
		}
		return false;
	}, 'json');
}

/***
 *威客完成工作
 * @param id  稿件id
 * @param step  选择的状态
 */
function planComplete(id,step){
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 已经完成该工作计划?</div>','index.php?do=taskhandle&op=plancomplete&taskId='+taskId+'&planid='+id+'&planstep='+step,true);
}

/***
 *雇主确认工作完成
 * @param id  稿件id
 * @param step  选择的状态
 */
function planConfirm(id,step){
	confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 确定该工作已经完成?</div>','index.php?do=taskhandle&op=planconfirm&taskId='+taskId+'&planid='+id+'&planstep='+step,true);
}
/**
 * 补充需求
 */
function reqedit(){
	var url = 'index.php?do=taskhandle&op=reqedit&taskId='+taskId;
	var modal = $.scojs_modal({
		remote : url,
		title : '补充需求'
	});
	modal.show();
}
/**
 * 评价
 */
function mark(roleType,objId,taskId){
	var url = 'index.php?do=taskhandle&op=mark&roleType='+roleType+'&objId='+objId+'&taskId='+taskId;
	var modal = $.scojs_modal({
		remote : url,
		title : '评价'
	});
	modal.show();
}
