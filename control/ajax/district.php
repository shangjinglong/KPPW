<?php
if(intval($id)){
	$arrZones = CommonClass::getDistrictByPid($id,'id,upid,name');
	foreach ($arrZones as $k=>$v) {
		$html.='<option value='.$v['id'].'>'.$v['name'].'</option>';
	}
	echo($html);
}
die();