<?php
class PayitemClass {
	public static function getTableObj($table = 'witkey_payitem') {
		return keke_table_class::get_instance ( $table );
	}
	public static function getPayitemList ($strType='task',$pk=null,$intIsOpen=1,$strUncode=null){
		if(TOOL === TRUE){
			intval($intIsOpen)==1 and $strWhere = " and is_open = 1";
			$strType and $strWhere .= " and item_type='$strType' ";
			$strUncode and $strWhere .= " and item_code!='$strUncode' ";
			$pk         or $pk = "item_code";
			$arrPayitemList = kekezu::get_table_data ( "*", "witkey_payitem", "1=1 $strWhere ", "", "", "", $pk,3600 );
			return $arrPayitemList;
		}
	}
  public static function getPayitemListDetail($strType = 'task',$objId){
  	if(TOOL === TRUE){
  	    $objInfo = self::getObjInfo($strType,$objId);
        if($strType=='task'){
        	switch($objInfo['task_status']){
        		case 0:
        		case 1:
        		case 8:
        		case 9:
        			$arrPayitemLists = null;
        			break;
        		case 2:
        			$arrPayitemLists = self::getPayitemListForPub($strType);
        			unset($arrPayitemLists['seohide']);
        	        break;
        		default:
        			$arrPayitemLists = self::getPayitemListForPub($strType);
        			unset($arrPayitemLists['seohide']);
        			unset($arrPayitemLists['tasktop']);
        			unset($arrPayitemLists['workhide']);
        			break;
        	}
        }else{
        	$arrPayitemLists = self::getPayitemListForPub($strType);
        }
        if(is_array($arrPayitemLists)){
        	foreach($arrPayitemLists as $k=>$v){
        		if($objInfo[$k]==1){
        			if($k=='tasktop'||$k=='goodstop'){
        				$arrRecordInfo = self::getPayitemRecord($strType,$objId,$k);
        				$strEndtime = date('Y-m-d H:i:s',$arrRecordInfo['end_time']);
        				$arrPayitemLists[$k]['buystatus'] = '已置顶至'.$strEndtime;
        			}else{
        				$arrPayitemLists[$k]['buystatus'] = '已购买此项增值服务';
        			}
        		}
        	}
        }
     return $arrPayitemLists;
  	}
  }
  public static function getPayitemRecord($strType='task',$objId,$code){
  	if( TOOL === TRUE){
      return db_factory::get_one(sprintf("select * from ".TABLEPRE."witkey_payitem_record where obj_type='%s' and obj_id=%d and item_code='%s'",$strType,$objId,$code));
  	}
  }
	public static function getPayitemListForPub($strType = 'task'){
		if(TOOL === TRUE){
		$arrPayitemLists = self::getPayitemList($strType);
		switch ($strType) {
			case 'task':
					$arrPayitemStyles = array(
							'urgent'=>array('style'=>'marked-speed','exttips'=>'一个任务仅限一次','abbr'=>'加急','maxlength'=>1),
							'tasktop'=>array('style'=>'marked-spread','exttips'=>'按天收费','abbr'=>'置顶','maxlength'=>3),
							'workhide'=>array('style'=>'marked-hot','exttips'=>'一个任务仅限一次','abbr'=>'隐藏','maxlength'=>1),
							'seohide'=>array('style'=>'marked-see','exttips'=>'一个任务仅限一次','abbr'=>'屏蔽','maxlength'=>1)
					);
			break;
			case 'goods':
					$arrPayitemStyles = array(
							'goodstop'=>array('style'=>'marked-spread','exttips'=>'按天收费','abbr'=>'置顶','maxlength'=>3)
					);
			break;
		}
		foreach ($arrPayitemLists as $k=>$v){
			foreach ($arrPayitemStyles as $k2=>$v2){
				if($k == $k2){
					$arrPayitemLists[$k]['style'] = $v2['style'];
					$arrPayitemLists[$k]['exttips'] = $v2['exttips'];
					$arrPayitemLists[$k]['abbr'] = $v2['abbr'];
					$arrPayitemLists[$k]['maxlength'] = $v2['maxlength'];
				}
			}
		}
		return $arrPayitemLists;
		}
	}
	public static function getPayitemPriceList($strType = 'task'){
		if(TOOL === TRUE){
		$arrPayitemLists = self::getPayitemList($strType);
		foreach ($arrPayitemLists as $k=>$v){
			$arrPayitemPriceLists[$k]= floatval($v['item_cash']);
		}
		return $arrPayitemPriceLists;
		}
	}
	public static function getPayitemOrderAmountByObjId($objId,$objType = 'task'){
		if(TOOL === TRUE){
		$returnArray = array();
		$payitemConfig = self::getPayitemConfig();
		$strDetailType = "'".implode("','", array_keys($payitemConfig))."'";
		$arrOrderDetailInfo = db_factory::get_one(sprintf("select order_id from ".TABLEPRE."witkey_order_detail where obj_id =%d and obj_type = '%s' and detail_type in(%s) order by detail_id desc limit 0,1",$objId,$objType,$strDetailType));
		$orderId = intval($arrOrderDetailInfo['order_id']);
		if($orderId > 0){
			$returnArray =  db_factory::get_one(sprintf("select order_id,order_name,order_amount from ".TABLEPRE."witkey_order where order_id ='%d' limit 1",$orderId));
		}
		return $returnArray;
		}
	}
	public static function validPayitemCount($arrPayitemNum,$endDate){
		if(TOOL === TRUE){
		$arrGetDate = getdate ();
		$relTime = $arrGetDate ['hours'] * 3600 + $arrGetDate ['minutes'] * 60 + $arrGetDate ['seconds'];
		$endTime = strtotime ( $endDate ) + $relTime ;
		foreach ($arrPayitemNum as $k =>$v){
			if($k == 'tasktop'){
				if($arrPayitemNum[$k] > 0){
					$IntMaxTopTime = $arrPayitemNum[$k] * 86400 + time(); 
					if($IntMaxTopTime>$endTime){
						$tips['errors']['txt_'.$k] = '置顶时间不能超过交稿时间：'.$endDate;
						kekezu::show_msg($tips,NULL,NULL,NULL,'error');
					}
				}
			}else{
				if (!in_array($arrPayitemNum[$k], array(0,1))) {
					$tips['errors']['txt_'.$k] = '最多可以购买一次';
					kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				}
			}
		}
		}
	}
	public static function validPayitemCosts($totalCosts){
		if(TOOL === TRUE){
		global $user_info;
		$totalCosts = floatval($totalCosts);
		$userYe 	= floatval($user_info['balance']);
		if($totalCosts > 0&&$userYe < $totalCosts){
			$tips['errors']['txt_goodstop'] = '当前的余额不足，不能购买该增值服务';
			kekezu::show_msg($tips,NULL,NULL,NULL,'error');
		}
		}
	}
	public static function getPayitemCash($arrPayitemNum,$type){
		if(TOOL === TRUE){
		$arrPayitemLists = self::getPayitemList($type);
	    $floatPayitemCash = '';
        foreach($arrPayitemNum as $k=>$v){
              if($v>0){
              	$floatPayitemCash += $v*$arrPayitemLists[$k]['item_cash'];
              }
        }
		return $floatPayitemCash;
		}
	}
	public static function creatPayitemOrder($arrPayitemBuy,$type,$objId,$taskOrderId = '0'){
		if(TOOL === TRUE){
		$taskOrderId = intval($taskOrderId);
		$floatCash = self::getPayitemCash($arrPayitemBuy,$type);
		$arrPayitemLists = self::getPayitemList($type);
		$arrObjInfo =  self::getObjInfo($type,$objId);
			if($taskOrderId>0){
				$intOrderId = $taskOrderId;
			}
			else{
				$intOrderId = keke_order_class::create_order($arrObjInfo['model_id'], '', '', '购买增值服务', $floatCash, '购买增值服务','wait');
			}
			if($intOrderId){
				foreach($arrPayitemBuy as $k=>$v){
					$cash = $v*$arrPayitemLists[$k]['item_cash'];
					keke_order_class::create_order_detail($intOrderId, '购买增值服务'.$arrPayitemLists[$k]['item_name'],$type, $arrObjInfo['id'], $cash,$v,$k);
				}
			}
		return $intOrderId;
		}
	}
	public static function payPayitemOrder($orderId){
		global $user_info;
		if(TOOL === TRUE){
        $arrOrderDetail = keke_order_class::get_order_detail($orderId);
        $arrOrderInfo = keke_order_class::get_order_info($orderId);
        $floatCash = floatval($arrOrderInfo['order_amount']);
        	$floatUserCash = $user_info['balance'];
        	if($floatUserCash>=$floatCash){
        		foreach($arrOrderDetail as $k=>$v){
        			PayitemClass::createPayitemRecord($v['detail_type'],$v['num'],$v['obj_type'],$v['obj_id']);
        		}
        		keke_order_class::set_order_status($orderId, 'ok');
        		unset($user_info);
        		return true;
        	}else{
        		unset($user_info);
        		return '余额不足';
        	}
        }
	}
	public static function dispose_order($orderId){
		if(TOOL === TRUE){
		$arrOrderDetail = keke_order_class::get_order_detail($orderId);
		$arrOrderInfo = keke_order_class::get_order_info($orderId);
		$floatCash = floatval($arrOrderInfo['order_amount']);
		foreach($arrOrderDetail as $k=>$v){
			PayitemClass::createPayitemRecord($v['detail_type'],$v['num'],$v['obj_type'],$v['obj_id']);
		}
		keke_order_class::set_order_status($orderId, 'ok');
		}
	}
	public static function createPayitemRecord($item,$num,$type,$objId){
		if(TOOL === TRUE){
		if($type=='task'){
			$objInfo = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $objId ) );
		}else{
			$objInfo = db_factory::get_one ( sprintf ( "select * from %switkey_service where service_id='%d'", TABLEPRE, $objId ) );
		}
		$uid = $objInfo['uid'];
		$username = $objInfo['username'];
		$arrPayitemLists = self::getPayitemList($type);
		$data = array(':item_name'=>$arrPayitemLists[$item]['item_name']);
		keke_finance_class::init_mem('payitem', $data);
		$cash = $num*$arrPayitemLists[$item]['item_cash'];
        if($cash){
        	$intFinaId = keke_finance_class::cash_out ( $uid, $cash, 'payitem', $cash, $type, $objId );
        }else{
        	$intFinaId = 1;
        }
		if($intFinaId){
			$objRecord = new Keke_witkey_payitem_record_class ();
			$objRecord->setItem_code ( $item );
			$objRecord->setUid ( $uid );
			$objRecord->setUsername ( $username );
			$objRecord->setUse_cash ( $cash );
			$objRecord->setUse_num ( intval ( $num ) );
			$objRecord->setObj_type ( $type );
			$objRecord->setObj_id ( $objId );
			$objRecord->setOn_time ( time () );
			if($item=='tasktop'||$item=='goodstop'){
				$arrRecordInfo = self::getPayitemRecord($type,$objId,$item);
				if($arrRecordInfo){
					$objRecord->setWhere ("record_id=".intval($arrRecordInfo['record_id']));
					$objRecord->setEnd_time ( $arrRecordInfo['end_time']+24*3600*$num );
				    $objRecord->edit_keke_witkey_payitem_record ();
				}else{
					$objRecord->setEnd_time ( time()+24*3600*$num );
					$objRecord->create_keke_witkey_payitem_record ();
				}
			}else{
				 $res = $objRecord->create_keke_witkey_payitem_record ();
			}
			self::updateObjStatus($item,$type,$objId);
		}
		}
	}
	public static function setTaskWorkHide($taskId){
		if(TOOL === TRUE){
		$arrTaskInfo = self::getObjInfo('task',$taskId);
        if(in_array($arrTaskInfo['model_id'],array(4,5))){
        	$strTable = TABLEPRE.'witkey_task_bid';
        }else{
        	$strTable = TABLEPRE.'witkey_task_work';
        }
		db_factory::execute(sprintf("update %s set workhide = 1 where task_id = %d",$strTable,$taskId));
		}
	}
	public static function updateObjStatus($item,$type,$objId){
		if(TOOL === TRUE){
		$arrObjInfo = self::getObjInfo($type,$objId);
		if ($type == 'task') {
			$strTable = TABLEPRE . 'witkey_task';
			$strPrimary = ' task_id ';
		} else {
			$strTable = TABLEPRE . 'witkey_service';
			$strPrimary = ' service_id ';
		}
        db_factory::execute(sprintf("update %s set %s = 1 where %s=%d",$strTable,$item,$strPrimary,$objId));
		if($item == 'workhide'){
			self::setTaskWorkHide($objId);
		}
		}
	}
	public static function getObjInfo($type = 'task', $objId) {
		if(TOOL === TRUE){
		if ($type == 'task') {
			$strTable = TABLEPRE . 'witkey_task';
			$strField = ' task_id as id,sub_time,model_id,task_status,tasktop,urgent,workhide';
			$strPrimary = ' task_id ';
		} else {
			$strTable = TABLEPRE . 'witkey_service';
			$strField = ' service_id as id,model_id,goodstop';
			$strPrimary = ' service_id ';
		}
		return db_factory::get_one ( sprintf ( "select %s from %s where %s=" . intval ( $objId ), $strField, $strTable, $strPrimary ) );
		}
		}
    public static function getPayitemConfig( $item_code = null,$pk=null) {
    	global $kekezu;
    	if(TOOL === TRUE){
		$pk or $pk = "item_code";
		$payitem_list = kekezu::get_table_data ( "*", "witkey_payitem", "1=1 $where ", "", "", "", $pk,3600 );
		if ($item_code) {
			$payitem_list [$item_code];
			return $payitem_list [$item_code];
		} else {
			return $payitem_list;
		}
    	}
	}
    public static function editPayitem($item_id, $item_info = array()) {
    	if(TOOL === TRUE){
		$obj = self::getTableObj ();
		return $obj->save ( $item_info, array ("item_id" => $item_id ) );
    	}
	}
	public static function refundPayitem($objId,$objType){
		if(TOOL === TRUE){
		$payitemConfig = self::getPayitemConfig();
		$strDetailType = "'".implode("','", array_keys($payitemConfig))."'";
		$arrOrderDetailLists = db_factory::query(sprintf("select * from ".TABLEPRE."witkey_order_detail where obj_id =%d and obj_type = '%s' and detail_type in(%s) ",$objId,$objType,$strDetailType));
		$orderId = intval($arrOrderDetailLists[0]['order_id']);
		if($orderId > 0){
			$arrOrderInfo =  db_factory::get_one(sprintf("select order_id,order_uid from ".TABLEPRE."witkey_order where order_id ='%d' and order_status = 'ok' limit 1",$orderId));
		}
		if($arrOrderInfo){
			foreach ($arrOrderDetailLists as $k=>$v){
				$data = array(':payitem_refund_item'=>$payitemConfig[$v['detail_type']]['item_name']);
				keke_finance_class::init_mem('payitem_refund', $data);
				keke_finance_class::cash_in ( $arrOrderInfo['order_uid'], $v['price'], $v['detail_type'], $payitemConfig[$v['detail_type']]['item_name'].'退款', $objType, $objId );
				db_factory::execute("update ".TABLEPRE."witkey_order set order_status = 'refunded' where order_id = '".$orderId."'");
				if($objType == 'goods'){
					db_factory::execute("update ".TABLEPRE."witkey_service set goodstop = '0' where service_id = '".$objId."'");
				}else{
					db_factory::execute("update ".TABLEPRE."witkey_task set ".$v['detail_type']." = '0' where task_id = '".$objId."'");
				}
			}
		}
		}
	}
	public static function updateTopitem($objId,$objType){
		if(TOOL === TRUE){
		$sql = "select * from ".TABLEPRE."witkey_order_detail where obj_id = '".$objId."' and obj_type = '".$objType."' and detail_type =  '".$objType."top'";
		$payitemRecordInfo = db_factory::get_one($sql);
		if($payitemRecordInfo){
			$topTime = intval($payitemRecordInfo['num']) * 86400 +time();
			db_factory::execute("update ".TABLEPRE."witkey_payitem_record set on_time = ".time().",end_time = ".$topTime." where obj_id = '".$objId."' and obj_type = '".$objType."' and item_code =  '".$objType."top'");
		}
	}
	}
}