<?php
keke_lang_class::load_lang_class('keke_user_mark_class');
class keke_user_mark_class {
	public function __construct() {
	}
	public static function get_mark_config($type = null, $obj = null) {
		$where = " where 1 = 1 ";
		$type and $where .= " and type='$type' ";
		$obj and $where .= " and obj='$obj'";
		$sql = " select * from " . TABLEPRE . "witkey_mark_config  $where ";
		$type && $obj and $mark_conf = db_factory::get_one ( $sql ) or $mark_conf = db_factory::query ( $sql );
		;
		return $mark_conf;
	}
	public static function create_mark_log($model_code,$user_type,$by_uid,$uid, $obj_id,$obj_cash,$origin_id = null, $by_username = null, $username = null) {
		global $basic_config;
		$mark_obj = new Keke_witkey_mark_class (); 
		! $by_username and $by_username = self::get_user_name ( $by_uid );
		! $username and $username = self::get_user_name ( $uid );
	    if($model_code!='service'){
		$mark_info = self::mark_info_exists($model_code, $obj_id,$by_uid,$uid);
		if ($mark_info){
			return false;
		}
	    }
		$mark_obj->_mark_id = null;
		$mark_obj->setBy_uid ( $by_uid );
		$mark_obj->setBy_username ( $by_username );
		$mark_obj->setUid ( $uid );
		$mark_obj->setUsername ( $username );
		$mark_obj->setModel_code($model_code );
		$mark_obj->setOrigin_id ( $origin_id );
		$mark_obj->setObj_id ( $obj_id );
		$mark_obj->setMark_type ($user_type);
		$mark_obj->setMark_status ( 0 );
		$mark_obj->setObj_cash($obj_cash);
		$mark_obj->setMark_time ( time () );
		$mark_obj->setMark_max_time ( time () + $basic_config ['auto_mark_time'] * 24 * 3600 );
		return $mark_obj->create_keke_witkey_mark();
	}
	public static function mark_info_exists($model_code,$obj_id,$by_uid,$uid){
		return db_factory::execute(sprintf(" select model_code from %switkey_mark where model_code='%s' and obj_id = '%d' and uid='%d' and by_uid ='%d'",TABLEPRE,$model_code,$obj_id,$uid,$by_uid));
	}
	public static function exec_mark($mark_id, $content, $mark_status = '1', $aid = null, $aid_star = null) {
		global $_lang,$_K;
		$res = self::exec_mark_process($mark_id, $content, $mark_status, $aid, $aid_star);
		if($res){
			return true;
		}else{
			return  $_lang['sorry_mark_fail'];
		}
	}
	public static function exec_mark_process($mark_id, $content, $mark_status = '1', $aid = null, $aid_star = null){
		global $_lang;
		$log_obj = new Keke_witkey_mark_class ();
		$mark_info = self::get_single_mark ( $mark_id );
		$log_obj->setWhere ( "mark_id = '$mark_id'" );
		if (! $mark_info ['mark_status'] || $mark_status < $mark_info ['mark_status']) {
			$log_obj->setMark_status ( $mark_status );
		}else{
			 kekezu::keke_show_msg('',$_lang['sorry_fail_level_not_down'],'error','json');
		}
		$log_obj->setMark_content ( $content );
		$log_obj->setAid($aid);
		$log_obj->setAid_star($aid_star);
		$log_obj->setMark_count($mark_info['mark_count']+1);
		$mark_value = self::get_mark_score ( $mark_info ['mark_type'], $mark_info[model_code], $mark_info['obj_cash'],$mark_status );
		$log_obj->setMark_value($mark_value);
		$res = $log_obj->edit_keke_witkey_mark();
		 !$mark_info ['mark_status'] and self::exec_rate ( $mark_status,$mark_info ['uid'], $mark_info ['obj_cash'], $mark_info ['model_code'], $mark_info ['mark_type'] ); 
		return $res;
	}
	public static function get_single_mark($mark_id){
		return db_factory::get_one(sprintf(" select * from %switkey_mark where mark_id = '%d'",TABLEPRE,$mark_id));
	}
	public static function exec_rate($mark_status,$uid, $mark_cash, $model_code, $mark_type = '2') {
		$mark_type == 1 and $edit_col = "buyer_credit" or $edit_col = "seller_credit";
 		if($model_code=='preward'&&floatval($mark_cash)<1){
 			$mark_value=0;
 		}else{
 			$mark_value = self::get_mark_score ( $mark_type, $model_code, $mark_cash,$mark_status );
 		}
		$mark_status==1 and $seller_good_num = 1 or $seller_good_num = 0;
		$credit_value = db_factory::get_count(sprintf("select %s from %switkey_space where uid = '%d'",$edit_col,TABLEPRE,$uid));
		$mark_type =='2' and $level_role = '1' or $level_role ='2';
		$user_levels = self::get_mark_level($credit_value+$mark_value,$level_role);
		$user_level = serialize($user_levels);
		if($mark_type==1){
			$space_array = array("buyer_credit"=>"`buyer_credit` + $mark_value","buyer_good_num"=>"`buyer_good_num`+$seller_good_num",
			"buyer_total_num"=>"`buyer_total_num`+1","buyer_level"=>"$user_level");
		}elseif($mark_type==2){
			$space_array = array("seller_credit"=>"`seller_credit`+ $mark_value","seller_good_num"=>"`seller_good_num` +$seller_good_num",
			"seller_total_num"=>"`seller_total_num`+1","seller_level"=>"$user_level");
		}
		$wheresqlarr = array("uid"=>$uid);
		keke_table_class::updateself("witkey_space", $space_array, $wheresqlarr);
	}
	public static function get_mark_level($credit_value, $user_type = '1') {
		global $_lang;
		$level_name = $_lang['level']; 
		$user_type == '1' and $credit_name = "m_value" or $credit_name = "g_value"; 
		$user_type == '1' and $title = "m_title" or $title = "g_title"; 
		$user_type == '1' and $ico = "m_ico" or $ico = "g_ico"; 
		$user_type == '1' and $tips = $_lang['ability_value'] or $tips = $_lang['credit_value'];
		$score_rule = kekezu::get_table_data ( "*", "witkey_mark_rule", "", "$credit_name asc ", '', '', '', null );
		$size = sizeof ( $score_rule );
		for($i = 0; $i < $size; $i ++) {
			if ($credit_value <= $score_rule [0] [$credit_name]) { 
				$title = $score_rule [0] [$title]; 
				$level = 1;
				$pic = $score_rule [0] [$ico]; 
				$sc_id =$score_rule [0] ['mark_rule_id']; 
				$level_up = $score_rule [0] [$credit_name] - $credit_value; 
				$grade_rate =number_format ( $credit_value/ ($score_rule [0] [$credit_name]), 4 ) * 100;
				break;
			} elseif ($credit_value <= $score_rule [$i] [$credit_name] && $credit_value >= $score_rule [$i-1] [$credit_name]) {
				$title = $score_rule [$i] [$title];
				$level = $i + 1;
				$pic = $score_rule [$i] [$ico];
				$sc_id = $score_rule [$i] ['mark_rule_id'];
				$level_up = $score_rule [$i] [$credit_name] - $credit_value;
				$grade_rate = number_format ( ($credit_value-$score_rule [$i-1] [$credit_name]) / ($score_rule [$i] [$credit_name] - $score_rule [$i-1] [$credit_name]), 4 ) * 100;
				break;
			} elseif ($credit_value > $score_rule [$size - 1] [$credit_name]) { 
				$title = $score_rule [$size - 1] [$title];
				$level = $size;
				$pic = $score_rule [$size - 1] [$ico];
				$sc_id = $score_rule [$size - 1] ['mark_rule_id'];
				$level_up = '0';
				$grade_rate = "100";
				break;
			}
		}
		$experience_level_arr ['score_id'] = $sc_id;
		$experience_level_arr ['value'] = $credit_value;
		$experience_level_arr ['title'] = $title;
		$experience_level_arr ['level'] = $level;
		$experience_level_arr ['level_up'] = $level_up;
		$experience_level_arr ['level_name'] = $level_name;
		$experience_level_arr ['grade_rate'] = number_format($grade_rate,2);
		$experience_level_arr ['pic'] = '<img src="' . $pic . '" align="absmiddle" title="' . $_lang['title'] . ' ：' . $title . '&#13;&#10;'.$tips.'：' . $credit_value . '&#13;&#10;'.$level_name.'：'.$level.'">';
		return $experience_level_arr;
	}
	public static function get_mark_rule($type = null) {
		$score_rule = kekezu::get_table_data ( "*", "witkey_mark_rule", "", "g_value asc,m_value asc ", '', '', '', "3600" );
		$size = sizeof ( $score_rule );
		$score ['wiki'] = array (); 
		$score ['ploy'] = array (); 
		$size = sizeof ( $score_rule );
		for($i = 0; $i < $size; $i ++) {
			$score ['wiki'] [0] ['min'] = "0";
			$score ['wiki'] [0] ['max'] = $score_rule [0] ['m_value'];
			$score ['wiki'] [$i + 1] ['min'] = $score_rule [$i] ['m_value'];
			$i <= $size - 1 and $score ['wiki'] [$i + 1] ['max'] = $score_rule [$i + 1] ['m_value'] or $score ['wiki'] [$i + 1] ['max'] = $score_rule [$size] ['m_value'];
			$score ['wiki'] [$i + 1] ['title'] = $score_rule [$i] ['m_title'];
			$score ['wiki'] [$i + 1] ['pic'] = $score_rule [$i] ['m_ico'];
			$score ['ploy'] [0] ['min'] = "0";
			$score ['ploy'] [0] ['max'] = $score_rule [0] ['g_value'];
			$score ['ploy'] [$i + 1] ['min'] = $score_rule [$i] ['g_value'];
			$i <= $size - 1 and $score ['wiki'] [$i + 1] ['max'] = $score_rule [$i + 1] ['g_value'] or $score ['wiki'] [$i + 1] ['max'] = $score_rule [$size] ['g_value'];
			$score ['ploy'] [$i + 1] ['title'] = $score_rule [$i] ['g_title'];
			$score ['ploy'] [$i + 1] ['pic'] = $score_rule [$i] ['g_ico'];
		}
		if ($type)
			return $score [$type];
		else
			return $score;
	}
	public static function get_mark_info($w=array(),$p=array(),$order=null,$ext=null) {
		global $kekezu;
		$where = " select * from ".TABLEPRE."witkey_mark where 1 = 1";
		$ext and $where.=" and $ext ";
		$arr       = keke_table_class::format_condit_data($where,$order,$w,$p);
		$mark_info = db_factory::query ($arr['where'] );
		$mark_arr ['mark_info'] = $mark_info;
		$mark_arr ['pages'] = $arr['pages'];
		return $mark_arr;
	}
	public static function get_obj_mark_data($model_code, $obj_id, $pk = null) {
		$mark_log_obj = new Keke_witkey_mark_class ();
		if (is_array ( $obj_id )) {
			$mark_log_obj->setWhere ( "model_code = '$model_code' and obj_id in (" . implode ( ',', $obj_id ) . ") " );
		} else {
			$mark_log_obj->setWhere ( "model_code = '$model_code' and obj_id = '$obj_id'" );
		}
		$mark_arr = $mark_log_obj->query_keke_witkey_mark_log ();
		if (! is_array ( $mark_arr )) {
			return false;
		}
		$pk = $pk ? $pk : 'by_uid';
		$return = array ();
		foreach ( $mark_arr as $k => $v ) {
			if (is_array ( $obj_id )) {
				$return [$v ['obj_id']] [$v [$pk]] = $v;
			} else {
				$return [$pk] = $v;
			}
		}
		return $return;
	}
	public static function get_user_name($uid) {
		return db_factory::get_count ( " select username from " . TABLEPRE . "witkey_member where uid ='$uid' " );
	}
	public static function get_mark_score($type, $model_code, $cash, $mark_status = null) {
		$mark_config = self::get_mark_config ( $type, $model_code ); 
		$mark_status = intval ( $mark_status );
		$mark_status or $mark_status = 'good'; 
		$mark_status == 1 and $mark_status = 'good';
		$mark_status == 2 and $mark_status = 'normal';
		$mark_status == 3 and $mark_status = 'bad';
		return $mark_config [$mark_status] * $cash / 100;
	}
	public static function get_user_aid($uid, $mark_type, $mark_status = null, $role_type = null, $model_code = null, $obj_id = null) {
		$aid_config = self::get_mark_aid ( $mark_type ); 
		$where = "  mark_type='$mark_type' ";
		$role_type == '1' and $where .= " and uid='$uid'";
		$role_type == '2' and $where .= " and by_uid='$uid'";
		if(is_null($mark_status)){
			$where .= " and mark_status > 0";
		}else{
			$where .= " and mark_status = $mark_status";
		}
		$model_code and $where .= " and model_code='$model_code' ";
		$obj_id and $where .= " and obj_id = '$obj_id' ";
		$aid_arr = db_factory::query ( " select aid,aid_star from " . TABLEPRE . "witkey_mark where $where " );
		$aid_info = array ();
		$si = sizeof ( $aid_arr );
		foreach ( $aid_config as $k => $v ) {
			if($aid_arr){
				for($i = 0; $i < $si; $i ++) {
					$aid_arr [$i] ['aid'] and $aid = explode ( ",", $aid_arr [$i] ['aid'] ) or $aid = array (); 
					$aid_arr [$i] ['aid_star'] and $star = explode ( ",", $aid_arr [$i] ['aid_star'] ) or $star = array (); 
					$aid&&$star and $aid_s = array_combine ( $aid, $star ); 
					$aid_info [$k] ['aid_name'] = $v ['aid_name']; 
					$aid_info [$k] ['star'] += floatval($aid_s [$k] ); 
					$aid_info [$k] ['count'] += 1; 
				}
			}else{
				$aid_info [$k] ['aid_name'] = $v ['aid_name']; 
				$aid_info [$k] ['star']     = 0; 
				$aid_info [$k] ['count']    = 0; 
			}
		}
		return self::consider_star ( $aid_info );
	}
	public static function get_user_mark($uid,$role_type=1,$mark_type=null,$mark_status=null,$model_code=null) {
		global $kekezu;
		$task_open = $kekezu->_task_open;
		$shop_open = $kekezu->_shop_open;
		$where = ' 1=1 ';
		$role_type == 1 and $where .= " and a.uid='$uid' ";
		$role_type == 2 and $where .= " and a.by_uid='$uid' ";
		is_null($mark_type) or $where .= " and a.`mark_type`=$mark_type ";
		is_null($mark_status) or $where .=" and a.`mark_status`=$mark_status ";
		$model_code and $where .= " and a.`model_code`='{$model_code}' ";
		$where .= "and a.mark_status > 0";
		$sql = ' select  a.*';
		$task_open and $sql.=',b.task_title';
		$shop_open and $sql.=',c.title';
		$sql .= ',d.seller_level from '.TABLEPRE.'witkey_mark a ';
		$task_open and $sql.=' left join '.TABLEPRE.'witkey_task b on a.origin_id = b.task_id ';;
		$shop_open and $sql.=' left join '.TABLEPRE.'witkey_service c on a.origin_id = c.service_id';
		$sql.=' left join '.TABLEPRE.'witkey_space d on a.by_uid = d.uid';
		$sql.=' where '.$where;
		if($task_open||$shop_open){
			$model_list = $kekezu->_model_list;
			$t='';
			$s='';
			foreach($model_list as $k=>$v){
				if($v['model_type']=='task'){
					$t.='"'.$v['model_code'].'",';
				}
				if($v['model_type']=='shop'){
					$s.='"'.$v['model_code'].'",';
				}
			}
			$t=rtrim($t,',');
			$s=rtrim($s,',');
			$task_open or $sql.=' and a.model_code not in ('.$t.')';
			$shop_open or $sql.=' and a.model_code not in ('.$s.')';
		}else{
			$sql.=' and model_code="none" ';
		}
		$rs = db_factory::query($sql);
		$aid_config = kekezu::get_table_data('aid,aid_name,aid_type','witkey_mark_aid','','','','','aid');
		foreach ($rs as $k =>$v){
			$aid_arr = explode(',', $v['aid']);
			$aid_star_arr = explode(',', $v['aid_star']);
			$aid_star = array_combine($aid_arr,$aid_star_arr);
			$tmp = array();
			foreach($aid_config as $ks=>$vs){
				if($vs['aid_type']==$v['mark_type']){
					$tmp[$ks]['aid_name'] = $vs['aid_name'];
					$tmp[$ks]['aid'] = $vs['aid'];
					$tmp[$ks]['score'] = 0;
				}
			}
			foreach ($aid_star as $ak =>$av){
				if(intval($ak)){
					$tmp[$ak]['aid_name'] = $aid_config[$ak]['aid_name'];
					$tmp[$ak]['aid'] = $aid_config[$ak]['aid'];
					$tmp[$ak]['score'] = $aid_star[$ak]?$aid_star[$ak]:0;
				}
			}
			$v['pj'] = $tmp;
			$result[$k]=$v;
		}
		return $result;
	}
	public static function consider_star($aid_info = array()) {
		foreach ( $aid_info as $k => $v ) {
			$v ['count'] and $avg=$v ['star'] / $v ['count'] or $avg=0;
			$aid_info [$k] ['avg'] = number_format ($avg, 1 );
		}
		return $aid_info;
	}
	public static function get_mark_aid($aid_type = null) {
		$aid_arr = kekezu::get_table_data ( "*", "witkey_mark_aid" );
		$aid = array ();
		foreach ( $aid_arr as $v ) {
			$aid [$v ['aid_type']] [$v ['aid']] = $v;
		}
		if ($aid_type)
			return $aid [$aid_type];
		else
			return $aid;
	}
	public static function gen_star($num, $name,$disabled=true, $star_len=10) {
		$j = round ( $num * 2 );
		$str = "";
		$s = "";
		$disabled  and $ds = " disabled=\"disabled\" ";
		for($i = 1; $i <= $star_len; $i ++) {
			if ($j == $i){
				$s = " checked ";
			}else{
				$s = "";
			}
			$str .= "<input name=\"star_$name\" type=\"radio\" class=\" star {split:2} star_$name\" value=\"$i\"
     		$ds $s />";
		}
		$str.="<span id=\"span_star_$name\"></span>";
		return  $str;
	}
	public static function gen_star2($num, $len=5) {
		$num = floatval($num);
		$arr = explode('.',$num);
		if($arr[1]>5){
			++$arr[0];
		}
		if($arr[1]>5){
			$arr[1]=0;
		}else{
			$arr[1]!=0 and $arr[1]=5 or $arr[1]=0;
		}
		$str = '<span class="stars ';
		$str.= 'a'.$len;
		$str.= ' s'.$arr[0];
		$arr[1]==5 and $str.='d'.$arr[1] ;
		$str.='">';
		$str.= '<span class="star_selected"></span></span>';
		return  $str;
	}
}
?>