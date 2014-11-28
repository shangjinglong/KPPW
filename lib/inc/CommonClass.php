<?php
class CommonClass {
	public static function getAllDistrict($fields = '*'){
		$fields = strval(trim($fields));
		return db_factory::get_table_data($fields,'witkey_district',' 1=1 ','displayorder asc',NULL,NULL,'id',null);
	}
	public static function getDistrictById($id,$fields = '*'){
		$fields = strval(trim($fields));
		return db_factory::get_one(sprintf('select %s from %s where id = %d',$fields,TABLEPRE.'witkey_district',intval($id)));
	}
	public static function getDistrictByPid($pid,$fields = '*'){
		$fields = strval(trim($fields));
		return db_factory::get_table_data($fields,'witkey_district','1=1 and upid ='.intval($pid),'',NULL,NULL,'id',NULL);
	}
	public static function getIndustryByPid($pid,$fields = '*'){
		return kekezu::get_table_data ( $fields, 'witkey_industry', 'indus_type =1 and indus_pid ='.intval($pid), ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', 60 );
	}
	public static function getNearlyIncomeForDays($uid,$days = 30){
		$sqlIncome = "SELECT SUM(fina_cash) FROM `".TABLEPRE."witkey_finance`
				WHERE uid = ".intval($uid)." AND (fina_action = 'task_bid' or fina_action = 'sale_service')
				AND fina_type = 'in' AND DATE_SUB(CURDATE(),INTERVAL 30 day) <= date(from_unixtime(fina_time))";
		return $nearlyIncome = number_format(floatval(db_factory::get_count($sqlIncome)),2);
	}
	public static function getFileArray($delimiter, $string){
		$arrFileLists = array();
		if($string){
			$arrFilePath = explode($delimiter, $string);
			if(is_array($arrFilePath)){
				$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,implode(',', array_filter($arrFilePath)));
				$arrFileLists = db_factory::query($strSql);
			}
		}
		return $arrFileLists;
	}
	public static function getFileArrayByPath($delimiter, $string){
		$arrFileLists = array();
		if($string){
			$arrFilePath = explode($delimiter, $string);
			if(is_array($arrFilePath)){
				$arrFilePath = "'".implode("','", array_filter($arrFilePath))."'";
				$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where save_name in(%s)",TABLEPRE,$arrFilePath);
				$arrFileLists = db_factory::query($strSql);
			}
		}
		return $arrFileLists;
	}
	public static function delFileByFileId($fileId){
		$strSql = sprintf("select file_id,file_name,save_name from %switkey_file where file_id in(%s)",TABLEPRE,$fileId);
		$arrFileInfo = db_factory::get_one($strSql);
		$filename = S_ROOT.$arrFileInfo['save_name'];
		if(file_exists($filename)){
			unlink($filename);
		}
		return db_factory::execute("delete from ".TABLEPRE."witkey_file where file_id = ".$fileId);
	}
	public static function returnNewArr($val,$array){
		$newArr = array();
		foreach ($array as $v){
			if($v != $val){
				$newArr[]=$v;
			}
		}
		return $newArr;
	}
}
?>