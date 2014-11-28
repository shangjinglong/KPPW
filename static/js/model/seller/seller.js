/**
 * 举报维权
 */
function changeBanner(id){
	var url = 'index.php?do=ajax&view=banner&id='+id;
	var modal = $.scojs_modal({
		remote : url,
		title : '个性化设置'
	});
	modal.show();
}