$(function(){
		//用户中心商品/服务订单操作
		$(".UserCenterServiceApiOp").click(function(){
			var intOrderId 	= $(this).attr('data-orderid');//订单ID
			var intSId 		= $(this).attr('data-sid');		//服务ID
			var intUid 		= $(this).attr('data-uid');		//对方UID
			var strType 	= $(this).attr('data-type');	//订单类型
			var strOp 		= $(this).attr('data-op');
			var strText		= $(this).text();

			if(isNaN(intOrderId) === true){
				tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> data-orderid缺少参数</div>');return;
			}
			if(strOp == undefined || strOp == ''||strOp == null ||!strOp){
				tipsOp('<div class="alert alert-danger"><i class="fa fa-ban"></i> data-op缺少参数</div>');return;
			}
			if(strOp == 'mark'){
				if(strType == 'gy'){
					window.location.href = 'index.php?do=gy&id='+intUid+'&orderId='+intOrderId;
				}else{
					window.location.href = 'index.php?do=order&sid='+intSId+'&orderId='+intOrderId;
				}
				
			}else{
				confirmOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 你确定'+strText+'吗？</div>',function(){
					formSubmit(strUrl+'&orderId='+intOrderId+'&action='+strOp,'url');
				},false);
			}

		});

});
/**
 * 编辑作品
 * @param sid
 */
function editWork(sid,taskId){
		var url = 'index.php?do=user&view=transaction&op=editwork&objId='+sid;
		var taskId = parseInt(taskId)+0;
		if(taskId>0){
			url = url+'&taskId='+taskId;
		}
		var modal = $.scojs_modal({
			remote : url,
			title : '编辑作品'
		});
		modal.show();
}
/**
 * 联系客服
 */
function showKf(sid,orderId){
	var url = 'index.php?do=order&sid='+sid+'&orderId='+orderId+'&action=showKf';
	var modal = $.scojs_modal({
		remote : url,
		title : '联系客服'
	});
	modal.show();
}