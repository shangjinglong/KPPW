/**
 * 单人悬赏交付js
 */

/**
 * 签署协议
 * @param user_type 用户角色
 */
function taskAgree(user_type){
	$.getJSON(strUrl,{op:'sign',user_type:user_type},function(json){
		tipsOp(json.data);
		if(json.url){
			setTimeout(document.location.reload(), 2000);
		}
		return false;

	});
}
/**
 * 确认提交附件
 */
function confirmUpload(){
	var fileNum = 0;
	if($("#fileid").val()){
		fileNum = $("#fileid").val().split('|').length;
	}
	if(fileNum){
		confirmOp('你上传了'+fileNum+'个源文件，确认交付吗?',function() {
			 confirmForAjax();
		 },false);
	}else{
		confirmOp('你没有上传源文件,确认交付吗?',function() {
			 confirmForAjax();
		 },false);
	}
}
/**
 * ajax提交
 */
function confirmForAjax(){
	$.getJSON(strUrl,{op:'confirm',file_ids:$("#fileid").val()},function(json){
		tipsOp(json.data);
		if(json.url){
			setTimeout(document.location.reload(), 2000);
		}
		return false;

	});
}
/**
 * 确认接收附件
 */
function confirmFile(){
	var fileNum = $("#fileSource li").length;

	if(fileNum){
		confirmOp('对方上传了'+fileNum+'个源文件，确认交付吗?',function() {
			Complete();
		 },false);
	}else{
		confirmOp('对方没有上传源文件,确认接收吗?',function() {
			Complete();
		 },false);
	}
}

/**
 * 协议完成
 */
function Complete(){
	$.getJSON(strUrl,{op:'accept'},function(json){
		tipsOp(json.data);
		if(json.url){
			setTimeout(document.location.reload(), 2000);
		}
		return false;

	});
}



function checkInner(obj,event){

	var num = parseInt($(obj).val().length)+0;
		if(num<=100)
			$(obj).next().find(".answer_word").text(L.can_input+(100-num)+L.words);
		else{
			var nt = $(obj).val().toString().substr(0,100);
			$(obj).val(nt);
		}
}


$(".action_show").toggle(function(){
    $('#help_center').removeClass('hidden');
	   $(this).children('span').removeClass('arrow_b').addClass('arrow_t');
 },function(){
		$('#help_center').addClass('hidden');
		$(this).children('span').removeClass('arrow_t').addClass('arrow_b');
});