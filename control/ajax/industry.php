<?php
if(intval($id)){
	$arrIndustrys = CommonClass::getIndustryByPid($id,'indus_id,indus_pid,indus_name');
	foreach ($arrIndustrys as $k=>$v) {
		$html.='<option value='.$v['indus_id'].'>'.$v['indus_name'].'</option>';
	}
	echo($html);
}
die();