$(function(){
	//返回顶部
	 $(window).scroll(function(){
	  if ($(window).scrollTop()>100){
	    $("#fix-box").fadeIn();
	  }
	  else
	  {
	    $("#fix-box").fadeOut();
	  }
	  });

	//当点击跳转链接后，回到页面顶部位置
	  $("a#top").click(function(){
	    $('body,html').animate({scrollTop:0},500);
	     return false;
	});

	  $('#searchOption a').click(function(){
		var rel = $(this).attr('rel');
		var word = $(this).text();
		$actionUrl = 'index.php?do='+rel;
		$("#topHeaderSearch").attr('action',$actionUrl);

	    $("#searchType").html(word+' <span class="caret"></span>');
	    $(this).parent('li').addClass('active').siblings().removeClass();
	  })

	  //旧浏览器提示
	  if(!$.support.leadingWhitespace){
	  	var msg= '<div class="alert alert-danger text-center mar0 ietips" style="padding:5px;display:none;">为达到最佳体验，建议使用浏览器IE9+、Firefox、Chrome、Safari！</div>';
		$('.header-top').after(msg);
		$('.ietips').delay(800).slideDown();
	  }
});
function searchKeydown(event){
    if ($.browser.msie) {
        if (window.event.keyCode == 13) {
        	$("#topHeaderSearch").submit();
        }
    }else {
        if (event.keyCode == 13) {
        	$("#topHeaderSearch").submit();
        }
    }
}

/**
 * 文件上传
 * @param paramReg
 * @param contrReg
 */
function uploadify(paramReg, contrReg,uploadResponse) {
	var paramReg = paramReg ? paramReg : {};
	var contrReg = contrReg ? contrReg : {};
	var uploadify = {};
	var auto = paramReg.auto == true ? true : false;//是否自动提交
	var debug = paramReg.debug == true ? true : false;//是否开启debug调试
	var hide = paramReg.hide == true ? true : false;//上传完成后是否隐藏文件域
	var swf = paramReg.swf ? paramReg.swf : 'static/js/uploadify/uploadify.swf';//flash路径
	var uploader = paramReg.uploader ? paramReg.uploader
			: 'index.php?do=ajax&view=upload&flash=1';////上传基本路径
	var deleter = paramReg.deleter ? paramReg.deleter
			: 'index.php?do=ajax&view=file&ajax=delete';//文件删除路径
	var file = fname = paramReg.file ? paramReg.file : 'upload';//file 表单名name=id=upload
	var size = paramReg.size;//文件大小限制
	var exts = paramReg.exts;//文件类型限制
	var method = paramReg.m ? paramReg.m : 'post';//上传方式
	var limit = paramReg.limit ? paramReg.limit : 1;//上传个数限制
	var qlimit = paramReg.qlimit ? paramReg.qlimit : 999;
	var objType   = contrReg.objType?contrReg.objType:'task';
	var taskId   =	parseInt(contrReg.taskId)+0;
	var workId   = parseInt(contrReg.workId)+0;
	var fileType  = contrReg.fileType?contrReg.fileType:'att';
	var text = paramReg.text ? paramReg.text : '上传文件';//按钮文字
	var pre = contrReg.mode == 'back' ? '../../' : '';
	swf = pre + swf;
	deleter = pre + deleter;
	uploader = pre + uploader + '&fileType='+fileType+'&filename=' + file+'&objType='+objType+'&taskId='+taskId+'&workId='+workId;
	uploadify.auto = auto;
	uploadify.debug = debug;
	uploadify.hide = hide;
	uploadify.swf = swf;
	uploadify.uploader = uploader;
	uploadify.deleter = deleter;
	uploadify.fileObjName = file;
	uploadify.fileSizeLimit = size;
	uploadify.fileTypeExts = exts;
	uploadify.uploadLimit = limit;
	uploadify.queueSizeLimit = qlimit;
	uploadify.method = method;
	uploadify.buttonText = text;
	uploadify.removeTimeout = 1;
	uploadify.onUploadSuccess = function(file, json, response) {
		json = eval('(' + json + ')');
		if (json.err) {
			if (msgType == 1) {
				tipsOp(decodeURI(json.err));
			} else {
				tipsOp(decodeURI(json.err));
			}
			return false;
		} else {

			if($("#filepath")){
				if ($("#filepath").val()) {
					$("#filepath").val($("#filepath").val() + '|' + json.msg.url);
				} else {
					$("#filepath").val(json.msg.url);
				}
			}
			if($("#fileid")){
				if ($("#fileid").val()) {
					$("#fileid").val($("#fileid").val() + '|' + json.msg.fileid);
				} else {
					$("#fileid").val(json.msg.fileid);
				}
			}
			typeof (uploadResponse) == 'function' && uploadResponse(json);
		}
	};
	$("#" + file).uploadify(uploadify);
}

/**
 * 选择城市
 * @param id
 * @param element
 */
function getZone(id, element) {
	if (id && element) {
		$.get('index.php?do=ajax&view=district', {
			id : id
		}, function(text) {
			$('#' + element).html(text);
		}, 'text')
	}
}

/**
 * 选择行业
 * @param id
 * @param element
 */
function getIndustry(id, element) {
	if (id && element) {
		$.get('index.php?do=ajax&view=industry', {
			id : id
		}, function(text) {
			$('#' + element).html(text);
		}, 'text')
	}
}


/**
 * ajax分页
 * 	  向指定容器中异步加载分页数据。
 * @param ajaxDom 需要加载内容的容器ID
 * @param loadUrl 数据请求链接
 * @param loadPage 加载页面
 * @param cove 是否覆盖
 */
function ajaxpage(ajaxDom, loadUrl, loadPage, cove) {
	var cove = cove == 1 ? 1 : 0;
	var showDom = $("#" + ajaxDom);
	switch (cove) {
	case 0:
		var pageDom = $("#page" + loadPage);
		if (pageDom.length == 0 && loadPage > 1) {
			showDom.load(loadUrl + ' #' + ajaxDom).show();
			showDom.siblings().hide();
			showDom.before(showDom.clone(true).hide());
			showDom.get(0).setAttribute("id", "page" + loadPage);
		} else {
			if (loadPage == 1) {
				showDom.show().siblings().hide();
			} else {
				pageDom.show().siblings().hide();
			}
		}
		break;
	case 1:
		showDom.parent().load(loadUrl + '&m_ajax=1' + ' #' + ajaxDom).show();
		break;
	}
	if ($("#taskScroll").length > 0) {
		$("html,body").animate({
			scrollTop : $("#taskScroll").offset().top
		});
	}
}

/**
 * 检查登录
 * @returns {Boolean}
 */
function checkLogin(url) {
	var returnValue = false;
	if (isNaN(uid) || uid == 0) {
		if (auid) {
			confirmOp('您现在是游客,需要绑定本站账号才可操作', 'index.php?do=oauthlogin&type='+ atype);
		} else {
			confirmOp('您还没有登录，立即登录？', 'index.php?do=login');
		}
		returnValue =  false;
	} else {
		returnValue =  true;
	}
	/**
	 * 如果指定url，并且是登陆状态，重定向到url
	 */
	if(url&&returnValue){
		window.location.href  =  url;
	}

	return returnValue;
}
/**
 * 操作提示
 * @param content
 * @param status   success=>成功提示
 * @param status   fail|error=>错误提示
 * @param status   warning=>警告提示
 * @param status   info=>信息提示
 */
function tipsOp(content,status) {
	var modal = $.scojs_modal({
		keyboard : true,
		title : '操作提示',
		content : '<div class="modal-body">' + tipsType(content, status) + '</div>'
	});
	modal.show();
}

function tipsType(content,status){
	if(status){
		switch (status) {
			case 'success':
				content = '<div class="alert alert-success"><i class="fa fa-check-circle"></i> '+content+'</div>';
				break;
			case 'fail':
			case 'error':
				content = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> '+content+'</div>';
				break;
			case 'warning':
				content = '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> '+content+'</div>';
				break;
			case 'info':
				content = '<div class="alert alert-info"><i class="fa fa-info-circle"></i> '+content+'</div>';
				break;
		}
	}
	return content;
}

function tipsUser(title,type){
	if(type=='success'){
		$('.form-group').removeClass('has-error');
		$('.help-block').remove();
		$(':submit').prop('disabled', 'disabled').addClass('disabled');
		$('#tipsUser').html('<i class="fa fa-check"></i> '+title);
		//$.scojs_message('<i class="icon-ok-sign icon-white"></i>'+title, $.scojs_message.TYPE_OK);
	}else if(type=='fail'){
		//$('#tipsUser').removeClass().addClass('text-danger');
		//$('#tipsUser').html('<i class="fa fa-times"></i> 服务器繁忙...');
		//$.scojs_message('<i class="icon-remove-sign icon-white"></i>'+title, $.scojs_message.TYPE_ERROR);
	}
}

/**
 * ajax表单提交
 * @param {String} id
 * @param {String} method=> post,get
 * @param {String} type=>form,url
 */
function formSubmit(id, type) {
	if (type == 'form') {
		var options = {
			type : 'post',
			dataType : "json",
			success : function(json) {
				tipsOp(json.data, json.status);
				if (json.url) {
					setTimeout(function() {
						window.location.href = json.url;
					}, 1000);
				}
			},
			error : function(json) {
				tipsOp('服务器繁忙,请重试...','error');
			}
		};
		$('#' + id).ajaxSubmit(options);
	} else if (type == 'url') {
		$.ajax({
			type : 'get',
			url : id,
			dataType : "json",
			success : function(json) {
				tipsOp(json.data, json.status);
				if (json.url) {
					setTimeout(function() {
						window.location.href = json.url;
					}, 1000);
				}
			},
			error : function(msg) {
				tipsOp('服务器繁忙,请重试...','error');
			}
		});
	}
}

/**
 * 确认框
 * @param content
 * @param url
 * @returns {Boolean}
 */
function confirmOp(content, url, ajax) {
	if (ajax == true) {
		var confirm = $.scojs_confirm({
			content : content,
			action : function() {
				formSubmit(url, 'url');
			}
		});
		confirm.show();
	} else {
		var confirm = $.scojs_confirm({
			content : content,
			action : url
		});
		confirm.show();
	}
	return false;
}

/**
 * 发送消息
 * @param id
 */
function sendMessage(id) {

	if(checkLogin()){

		if(id == uid){
			tipsOp('不能给自己发消息','error');return false;
		}

		if(UseIm == true){
			contactMe(id);
		}else{
			var modal = $.scojs_modal({
				remote : 'index.php?do=ajax&view=message&id=' + id,
				title : '发送消息'
			});
			modal.show();
		}




	}

}

/**
 * 提交意见
 *
 */
function sendSuggest(){
	if(checkLogin()){
		var modal = $.scojs_modal({
			remote : 'index.php?do=suggest',
			title : '提交意见'
		});
		modal.show();
	}
}

/**
 * 推广
 */
function spread(js){
	var url = 'index.php?do=ajax&view=spread';
	if(js){
		url= url+'&js=true';
	}
	var modal = $.scojs_modal({
		remote : url,
		title : '推广'
	});
	modal.show();
}
/**
 * 举报维权
 */
function report(type,objType,toUid,originId,objId){
	if(objType=='product'){
        var basicUrl =  'index.php?do=goods&op=report&id='+originId;
	}else if(objType=='order'){
		var basicUrl = 'index.php?do=order&action=rights&orderId='+objId+'&sid='+originId;
	}else if(objType=='gy_order'){
		var basicUrl = 'index.php?do=gy&action=rights&orderId='+objId+'&id='+originId;
	}else{
		var basicUrl = 'index.php?do=taskhandle&op=report&taskId='+originId;
	}
	var url = basicUrl+'&objType='+objType+'&type='+type+'&toUid='+toUid+'&objId='+objId;
	var modal = $.scojs_modal({
		remote : url,
		title : '举报维权'
	});
	modal.show();
}
/**
 * 增值工具购买
 */
function payitem(type,objId){
	var url = 'index.php?do=payitem';
		url= url+'&type='+type+'&objId='+objId;
	var modal = $.scojs_modal({
		remote : url,
		title : '增值工具'
	});
	modal.show();
}

/**
 * 加关注
 * @param id
 */
function addFollow(id){
	if(checkLogin()){
		$.post('index.php?do=ajax&view=follow&op=add',{id:id},function(json){
			if(json.status == 'fail'){
				tipsOp('你已经关注过该用户','info');

			}else{
				$('#follow'+id).replaceWith('<span class="label label-success"><i class="fa fa-check"></i> 已关注</span>');
			}
		},'json');
	}
}

/**
 * 取消关注
 * @param id
 */
function cancelFollow(id){
	if(checkLogin()){
		$.post('index.php?do=ajax&view=follow&op=del',{id:id},function(json){
			if(json.status == 'fail'){
				tipsOp('取消关注失败',json.status);
			}else{
				$('#follow'+id).prev().remove();
				$('#follow'+id).replaceWith('<a class="btn btn-default btn-xs" href="javascript:addFollow('+id+');void(0);" id="follow'+id+'"><i class="fa fa-plus"></i>加关注</button>');
			}
		},'json');
	}
}

/**
 * 加收藏
 * @param id
 */
function addFavorite(type,id){
	if(checkLogin()){
		type = type.toString();
		$.post('index.php?do=ajax&view=favorite&op=add',{type:type,id:id},function(json){
			if(json.status == 'fail'){
				tipsOp('你已经收藏过',json.status);
			}else if(json.status=='error'){
				tipsOp('不能对自己发布的任务进行收藏',json.status);
			}else{
				$('#favorite'+id).replaceWith('<a href="javascript:void(0);"  title="取消收藏" id="favorite'+id+'" class="action-collect on"><i class="fa fa-star"></i></a>');
			}
		},'json');
	}
}

/**
 * 取消收藏
 */
function cancelFavorite(type,id){
	if(checkLogin()){
		type = type.toString();
		$.post('index.php?do=ajax&view=favorite&op=del',{type:type,id:id},function(json){
			if(json.status == 'fail'){
				tipsOp('取消收藏失败',json.status);

			}else{
				$('#favorite'+id).replaceWith('<a id="favorite'+id+'"  title="收藏" class="action-collect"><i class="fa fa-star"></i></a>');
			}
		},'json');
	}
}

/**
 * 任务发布上传附件删除的Js操作
 */
$(function(){
	  var obj = $("a[data-class='delete-file']");
	  obj.live("click",function(){
		  var fileid = $(this).attr('data-file-id');
		  $.post(strUrl,{action:'delete_file',fileid:fileid},function(json){
			  if(json.status =='1'){
				  $("li[data-file-id='"+json.data.fileid+"']").remove();
				  var strFileIds = $("#fileid").val();
				  var arrfileids = strFileIds.split(splitStr);
				      arrfileids = returnNewArr(json.data.fileid,arrfileids);
				  $("#fileid").val(arrfileids.join(splitStr));
			  }
		  },'json');
	  });
});
/**
 * 商品发布上传附件删除图片的Js操作
 */
$(function(){
	var objimage = $("a[data-class='delete-image']");
	objimage.live("click",function(){
		var fileid = $(this).attr('delete-image-id');
		$.post(strUrl,{action:'delete_image',fileid:fileid},function(json){
			if(json.status =='1'){
				$("li[delete-image-id='"+json.data.fileid+"']").remove();
				var strFileIds = $("#file_ids").val();
				var arrfileids = strFileIds.split(splitStr);

				arrfileids = returnNewArr(json.data.save_name,arrfileids);
				console.log(arrfileids);
				$("#file_ids").val(arrfileids.join(splitStr));
			}
		},'json');
	});
});
/**
 * 商品发布上传附件删除附件的Js操作
 */
$(function(){
	var objgoodsfile = $("a[data-class='delete-goodsfile']");
	objgoodsfile.live("click",function(){
		var fileid = $(this).attr('delete-goodsfile-id');
		$.post(strUrl,{action:'delete_goodsfile',fileid:fileid},function(json){
			if(json.status =='1'){
				$("li[delete-goodsfile-id='"+json.data.fileid+"']").remove();
				var strFileIds = $("#file_path_2").val();
				var arrfileids = strFileIds.split(splitStr);
				arrfileids = returnNewArr(json.data.save_name,arrfileids);
				$("#file_path_2").val(arrfileids.join(splitStr));
			}
		},'json');
	});
});
//删除数组中的指定的值
function returnNewArr(value,arr){
	  var tmpArr = new Array();
	  for (var i = 0; i < arr.length; i++) {
        if (arr[i] != value){
     	    tmpArr.push(arr[i]);
        }
   }
	 return tmpArr;
}


/**
 * * 清除输入框的字符,只限制数据输入
 * 
 * @param {Object}
 *            inputobj
 */
function clearstr(inputobj){
    inputobj.value = inputobj.value.replace(/[^\d.]/g, '');
}
function clearNotNum(inputobj){
    inputobj.value = inputobj.value.replace(/\D/g, '');
}
/**
 * 清除特殊符号
 * 
 * @param {Object}
 *            inputobj
 */
function clearspecial(inputobj){
	inputobj.value = inputobj.value.replace(/[^a-z\d\u4e00-\u9fa5]/ig, '');
}

