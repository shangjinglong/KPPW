<?php
$refer = parse_url($_SERVER['HTTP_REFERER']);
$refer_do = array('do'=>null);
isset($refer['query']) and parse_str($refer['query'],$refer_do);
!$refer_do['do']&&$do='logout' and $refer_do['do']='logout';
$_SESSION ['uid'] = '';
$_SESSION ['username'] = '';
$_SESSION['auid']="";
unset($uid);
unset($_SESSION);
if (isset ( $_COOKIE ['user_login'] )) {
	setcookie ( 'user_login', '' );
}
if (isset ( $_COOKIE ['prom'] )) {
	setcookie ( 'prom', '' );
}
$synhtml = keke_user_class::user_synlogout();
unset($_COOKIE);
unset($_COOKIE['username']);
session_destroy();
in_array($refer_do['do'],array('user','pubtask','pubgoods','logout','register')) and  $jump = 'index.php?do=login' or $jump =$_SERVER['HTTP_REFERER'];
setcookie('keke_auto_login','',time()-1);
echo $synhtml;
echo '<script type="text/javascript">location.href="'.$jump.'"</script>';
die();