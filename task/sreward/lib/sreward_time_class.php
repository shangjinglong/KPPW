<?php
final class sreward_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->task_hand_end ();
		$this->task_vote_end ();
		$this->task_choose_end ();
		$this->task_notice_end ();
		$this->task_agreement_freeze ();
		$this->task_top_end ();
	}
	public function task_hand_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task where task_status=2 and  sub_time < '%s' and model_id = '1' and task_union!=2", TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_hand_obj = new sreward_task_class($v);
				$task_hand_obj->time_hand_end ();
			}
		}
	}
	public function task_vote_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task where task_status=4 and  sp_end_time < '%s' and model_id = '1' and task_union!=2", TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_vote_obj = new sreward_task_class( $v );
				$task_vote_obj->time_vote_end ();
			}
		}
	}
	public function task_choose_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task where task_status=3 and  end_time < '%s' and model_id = '1' and task_union!=2 ", TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_choose_obj = new sreward_task_class( $v );
				$task_choose_obj->time_choose_end ();
			}
		}
	}
	public function task_notice_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task where task_status=5 and  sp_end_time < '%s' and model_id = '1' and task_union!=2", TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_notice_obj = new sreward_task_class( $v );
				$task_notice_obj->time_notice_end ();
			}
		}
	}
	public function task_top_end() {
		$task_list = db_factory::query ( sprintf ( " select * from %switkey_task a left join %switkey_payitem_record b
				on a.task_id=b.obj_id where a.tasktop=1 and a.model_id = '1' and  b.obj_type='task' and b.end_time < '%s'  ", TABLEPRE,TABLEPRE, time () ) );
		if (is_array ( $task_list )) {
			foreach ( $task_list as $k => $v ) {
				$task_obj = new sreward_task_class($v);
				$task_obj->task_top_end ();
			}
		}
	}
	public function task_agreement_freeze() {
		global $model_list, $_K, $_lang;
		$config = unserialize ( $model_list [1] ['config'] );
		$sql = " select a.agree_id,a.agree_status,a.seller_status,a.buyer_status,a.seller_uid,a.buyer_uid,a.task_id,a.on_time,b.task_title from %switkey_agreement a left join %switkey_task b on a.task_id=b.task_id where
				a.model_id=1  and b.task_status=6 and a.on_time<'%d'";
		$agree_list = db_factory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE, time () - intval ( $config ['agree_complete_time'] ) * 24 * 3600 ) );
		if (! empty ( $agree_list )) {
			$msg_obj = new keke_msg_class ();
			foreach ( $agree_list as $k => $v ) {
				$ginfo = kekezu::get_user_info ( $v ['seller_uid'] );
				$winfo = kekezu::get_user_info ( $v ['buyer_uid'] );
				db_factory::execute ( sprintf ( " update %switkey_task set task_status=13 where task_id='%d'", TABLEPRE, $v ['task_id'] ) );
				db_factory::execute ( sprintf ( " update %switkey_agreement set agree_status=5 where agree_id='%d'", TABLEPRE, $v ['agree_id'] ) );
				$url = "<a href=\"" . $_K ['siteurl'] . '/index.php?do=task&id=' . $v ['task_id'] . "\">" . $v ['task_title'] . "</a>";
				$v1 = array ('动作' => $_lang ['agree_g_ac'], '原因' => '由于超时未完成交付已被系统冻结,请尽快联系客服，由客服介入处理', '任务标题' => $url );
				$v2 = array ('动作' => $_lang ['agree_w_ac'], '原因' => '由于超时未完成交付已被系统冻结,请尽快联系客服，由客服介入处理', '任务标题' => $url );
				$msg_obj->send_message ( $ginfo ['uid'], $ginfo ['username'], "task_freeze", '协议交付超时冻结通知', $v1, $ginfo ['email'], $ginfo ['mobile'] );
				$msg_obj->send_message ( $winfo ['uid'], $winfo ['username'], "task_freeze", '协议交付超时冻结通知', $v2, $winfo ['email'], $winfo ['mobile'] );
			}
		}
	}
}