/**
 * 商品购买JS控制
 */
$(function(){
	$("#confirmPay").click(function(){
		confirmOp('确认付款！',function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=confirm_pay','url');
		},false);
	});

	$("#confirmfile").click(function(){
		confirmOp('确认源文件！',function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=confirm_file','url');
		},false);
	});

	//买家申请仲裁
	$("#buyerApplyArbitrament").click(function(){
		confirmOp('你确定要申请仲裁吗？',function(){
			formSubmit(strUrl+'&orderId='+orderId+'&action=arbitrament','url');
		},false);

	});


});
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
