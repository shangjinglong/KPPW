/**
	任务评论JS
*/

/**
 * 发布评论
 */
function addComment(objId,originId,objType,pId){
	var content = $.trim($("#addcontent").val());

	if(!content){
		tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> 留言不得为空</div>');return false;
	}
	if(content.length > 100){
		tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> 留言不得超过100字</div>');return false;
	}
	$.post('index.php?do=taskcomment',{objId:objId,originId:originId,objType:objType,pId:pId,content:content,action:'add'}, function(data){
		if(data === '你操作的太频繁了，请稍后再试!'){

			tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> 你操作的太频繁了，请稍后再试!</div>');
			return false;
		}
		$("#commentArea").after(data);
		$("#addcontent").val('');
	});
}

/**
 * 显示/隐藏回复输入框
 * @param cid 评论ID
 */
function toggleReplyArea(cid){
	$("#replyComment_"+cid).toggleClass('hidden');
}
/**
 * 评论的回复
 * @param cid 评论ID
 * @param objId	评论对象ID
 * @param originId 评论对象的对象ID
 * @param objType  评论对象类型
 * @param pId  评论的上级评论ID
 */
function replyAddComment(cid,objId,originId,objType,pId){
	var content = $.trim($("#replyAddContent_"+cid).val());
	$.post('index.php?do=taskcomment',{objId:objId,originId:originId,objType:objType,pId:pId,content:content,action:'reply'}, function(data){
		$("#replyComment_"+pId).after(data);
		$("#replyAddContent_"+cid).val('');
		$("#replyComment_"+cid).toggleClass('hidden');

	});
}
/**
 * 删除评论
 * @param cid 评论ID
 */
function delComment(cid){
	$.post('index.php?do=taskcomment',{cid:cid,action:'del'}, function(json){
		if(json.status === 'success'){
			$("#replyCommentList_"+cid).remove();return false;
		}
		tipsOp(json.data);return false;
	},'json');
}