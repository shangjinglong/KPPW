/**
 * 支付提醒
 */
function payTips(){
	$("#payfor-progress-li-2").addClass('action');
	tipsOp('<div  id="payTips"><p class="info">请您在新打开的页面上完成付款。<span class="text-danger">付款完成前请不要关闭此窗口。</span></p><p class="mb_20">完成付款后请根据您的情况点击下面的按钮：</p><p class="text-center"><a href="index.php?do=user&view=finance&op=details" class="btn btn-success mr_10" data-dismiss="modal">已完成付款</a><a href="index.php?do=help"  class="btn btn-danger"  data-dismiss="modal">付款遇到问题</a>	</p><p class="retry"><a href="javascript:void(0)" id="order-pay-dialog-back" class="back" data-dismiss="modal">返回选择其他支付方式</a></p></div>');
}