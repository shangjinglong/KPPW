<?php
if($gUid){
	$spreadUrl = SITEURL.'/'.$_SESSION['spread'].'&u='.intval($gUid);
}else{
	$spreadUrl = SITEURL.'/'.$_SESSION['spread'];
}
