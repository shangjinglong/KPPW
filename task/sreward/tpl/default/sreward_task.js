/**
 * 任务事件处理
 * 
 */

$(function() {
	var loading = parseInt($(".process li.selected").index()) + 1;
	$(".progress_bar").css("width", loading * 20 + "%");
	if (task_status == 9) {
		$(".progress_bar").css({
			width : "100%",
			background : "grey"
		});
	}
})

/** 稿件提交 */
function workHand() {
	if (check_user_login()) {
		if (uid == guid) {
			showDialog(L.operation_invalid+','+L.released_task_turnaround, 'alert', L.operation_failed_tips, '', 0);
			return false;
		} else {
			showWindow("work_hand", basic_url + '&op=work_hand', "get", '0');
			return false;
		}
	}
}
/**
 * 稿件进行投票
 * 
 * @param int
 *            work_id 稿件编号
 * @param int
 *            vote_uid 被投票人
 */
function workVote(work_id, vote_uid) {
	if (check_user_login()) {
		if (vote_uid == uid) {
			showDialog(L.t_vote_forbidden, 'alert', L.operate_notice);
			return false;
		}
		var url = basic_url + '&op=work_vote';
		$.post(url, {
			work_id : work_id
		}, function(json) {
			if (json.status == 1) {
				$("#work_vote_" + work_id).remove();
				var vote_num = $("#vote_num_" + work_id).html();
				num = parseInt(vote_num) + 1;
				$("#vote_num_" + work_id).html(num);
				showDialog(json.data, 'right', json.msg);
				return false;
			} else
				showDialog(json.data, 'alert', json.msg);
			return false;
		}, 'json')
	}
}
/**
 * 选择稿件
 * 
 * @param work_id
 *            稿件编号
 * @param to_status
 *            变更状态
 * @returns {Boolean}
 */

function workBid(work_id, to_status) {
	if (check_user_login()) {
		if (guid != uid&&uid!=1) {
			showDialog(L.t_master_can_operate_work, "alert", L.operate_notice);
			return false;
		} else {
			var url = basic_url + '&op=work_choose&work_id=' + work_id+'&to_status='+to_status;
			showWindow("work_choose", url, "get", '0');return false;
			
//			$.post(url, {
//				to_status : to_status
//			}, function(json) {
//				if (json.status == 1) {
//					showDialog(json.data, "right", json.msg,"location.href='" + basic_url + "&view=work'");
//				} else {
//					showDialog(json.data, "alert", json.msg);
//					return false;
//				}
//			}, 'json')
		}
	}
}
/**
 * 交付跳转
 * 
 * @param agree_id
 *            协议编号
 */
function taskAgree(agree_id) {
	if (check_user_login()) {
		location.href = "index.php?do=agreement&task_id=" + task_id
				+ "&agree_id=" + agree_id;
	}
}