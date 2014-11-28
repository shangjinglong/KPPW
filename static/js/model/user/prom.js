$(function() {
	$("a#copy-promurl").zclip({
		path : 'static/js/zclip/ZeroClipboard.swf',
		copy : $('#promReg').val(),
		beforeCopy : function() {
			$('#promReg').offsetParent().addClass('has-info');
			$(this).removeClass('btn-default').addClass('btn-info');
		},
		afterCopy : function() {
			$('#promReg').offsetParent().addClass('has-success');
      		$(this).removeClass('btn-info').addClass('btn-success');
			$(this).next('.check').show();
		}
	});
});
