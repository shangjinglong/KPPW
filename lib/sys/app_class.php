<?php
class app_class {
	public static function response($array) {
		global $_R;
		$array ['sessionid'] = session_id ();
		if (KEKE_DEBUG) {
			$array ['param'] = $_R;
		}
		echo json_encode ( $array );
		die ();
	}
	public static function getUserInfo($field, $value) {
		$userInfo = db_factory::get_one ( sprintf ( 'select uid,username,password,truename,balance,credit,seller_credit,pub_num,accepted_num,buyer_good_num,buyer_total_num,seller_good_num,seller_total_num,residency from %switkey_space where ' . $field . ' = "%s"', TABLEPRE, $value ) );
		return $userInfo;
	}
	public static function getUserInfoExt($userInfo){
		if(!$userInfo['seller_good_num']||!$userInfo['seller_total_num']){
			$userInfo['seller_good'] =  sprintf('%.2f%%',100);
		}else{
			$userInfo['seller_good'] = sprintf('%.2f%%',$userInfo['seller_good_num']/$userInfo['seller_total_num']*100);
		}
		if(!$userInfo['buyer_good_num']||!$userInfo['buyer_total_num']){
			$userInfo['buyer_good_num'] =  sprintf('%.2f%%',100);
		}else{
			$userInfo['buyer_good'] =sprintf('%.2f%%',$userInfo['buyer_good_num']/$userInfo['buyer_total_num']*100);
		}
		$userInfo['balance'] = sprintf("%.2f", $userInfo['balance'] );
		$infoExt = self::getUserLevelPic($userInfo['seller_credit'],1);
		$info = array_merge($userInfo,$infoExt);
		return $info;
	}
	public  static function getTaskObj($id){
		$taskInfo = db_factory::get_one(sprintf('select * from %switkey_task where task_id =%d',TABLEPRE,intval($id)));
		switch (intval($taskInfo['model_id'])) {
			case 1:
				$taskObj = sreward_task_class::get_instance($taskInfo);
			;
			break;
			case 2:
				$taskObj = mreward_task_class::get_instance($taskInfo);
				;
			break;
			case 3:
				$taskObj = preward_task_class::get_instance($taskInfo);
				;
			break;
			default:
				$taskObj = sreward_task_class::get_instance($taskInfo);
				;
			break;
		}
		unset($taskInfo);
		return $taskObj;
	}
	public  static function getTaskReleaseObj($model=1){
		switch (intval($model)) {
			case 1:
				$releaseObj = sreward_release_class::get_instance(1);
				;
				break;
			case 2:
				$releaseObj = mreward_release_class::get_instance(2);
				;
				break;
			case 3:
				$releaseObj = preward_release_class::get_instance(3);
				;
				break;
			default:
				$releaseObj = sreward_release_class::get_instance(1);
				;
				break;
		}
		return $releaseObj;
	}
	public static function getServiceReleaseObj($model=6){
		switch (intval($model)) {
			case 6:
				$releaseObj = goods_release_class::get_instance(6);
				;
				break;
			case 7:
				$releaseObj = service_release_class::get_instance(7);
				;
				break;
			default:
				$releaseObj = goods_release_class::get_instance(6);
				;
				break;
		}
		return $releaseObj;
	}
	public static function getUserAvatar($id){
		global $_K;
		$bigAvatar = keke_user_avatar_class::get_avatar ( $id,'big' );
		$middleAvatar = keke_user_avatar_class::get_avatar ( $id,'middle' );
		$smallAvatar = keke_user_avatar_class::get_avatar ( $id,'small' );
		$avatar['bigavatar'] = $_K['siteurl'].'/data/avatar/'.$bigAvatar;
		$avatar['middleavatar'] = $_K['siteurl'].'/data/avatar/'.$middleAvatar;
		$avatar['smallavatar'] = $_K['siteurl'].'/data/avatar/'.$smallAvatar;
		return $avatar;
	}
	public static function getUserLevelPic($credit_value, $user_type = '1'){
		global $_K;
		$user_type == '1' and $credit_name = "m_value" or $credit_name = "g_value"; 
		$user_type == '1' and $ico = "m_ico" or $ico = "g_ico"; 
		$score_rule = kekezu::get_table_data ( "*", "witkey_mark_rule", "", "$credit_name asc ", '', '', '', null );
		$size = sizeof ( $score_rule );
		for($i = 0; $i < $size; $i ++) {
			if ($credit_value <= $score_rule [0] [$credit_name]) { 
				$level = 1;
				$pic = $score_rule [0] [$ico]; 
				break;
			} elseif ($credit_value <= $score_rule [$i] [$credit_name] && $credit_value >= $score_rule [$i-1] [$credit_name]) {
				$level = $i + 1;
				$pic = $score_rule [$i] [$ico];
				break;
			} elseif ($credit_value > $score_rule [$size - 1] [$credit_name]) { 
				$level = $size;
				$pic = $score_rule [$size - 1] [$ico];
				break;
			}
		}
		$levelInfo ['level'] = $level;
		$levelInfo ['level_pic'] = $_K['siteurl'].'/'.$pic;
		return $levelInfo;
	}
	static function getServicePic($path, $pre = 210) {
		global $_K;
		$tmp = explode (',', $path . ',' );
		$tmp = array_unique ( array_filter ( $tmp ) );
		if ($tmp) {
			$s = sizeof ( $tmp );
			$image =  keke_img_class::get_filepath_by_size($tmp [$s-1],$pre);
		}
		$image = $_K['siteurl'].'/'.$image;
		return $image;
	}
}