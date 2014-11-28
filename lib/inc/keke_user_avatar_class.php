<?php
keke_lang_class::load_lang_class('keke_user_avatar_class');
(defined ( "IN_KEKE" )|| defined("ADMIN_KEKE")) or die ( "Access Denied" );
define ( '_DATADIR', S_ROOT . "data/" );
global $_K;
define ( '_DATAURL', $_K ['siteurl'] . "/data" );
class keke_user_avatar_class extends keke_user_class {
	static function uploadavatar($uid) {
		@header ( "Expires: 0" );
		@header ( "Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE );
		@header ( "Pragma: no-cache" );
		if (empty ( $uid )) {
			return - 1;
		}
		if (empty ( $_FILES ['Filedata'] )) {
			return - 3;
		}
		list ( $width, $height, $type, $attr ) = getimagesize ( $_FILES ['Filedata'] ['tmp_name'] );
		$imgtype = array (1 => '.gif', 2 => '.jpg', 3 => '.png' );
		$filetype = $imgtype [$type];
		if (! $filetype)
			$filetype = '.jpg';
		$tmpavatar = _DATADIR . './tmp/upload' . $uid . $filetype;
		file_exists ( $tmpavatar ) && @unlink ( $tmpavatar );
		if (@copy ( $_FILES ['Filedata'] ['tmp_name'], $tmpavatar ) || @move_uploaded_file ( $_FILES ['Filedata'] ['tmp_name'], $tmpavatar )) {
			@unlink ( $_FILES ['Filedata'] ['tmp_name'] );
			list ( $width, $height, $type, $attr ) = getimagesize ( $tmpavatar );
			if ($width < 10 || $height < 10 || $type == 4) {
				@unlink ( $tmpavatar );
				return - 2;
			}
		} else {
			@unlink ( $_FILES ['Filedata'] ['tmp_name'] );
			return - 4;
		}
		$avatarurl = _DATAURL . '/tmp/upload' . $uid . $filetype;
		return $avatarurl;
	}
	static function rectavatar($uid) {
		@header ( "Expires: 0" );
		@header ( "Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE );
		@header ( "Pragma: no-cache" );
		header ( "Content-type: application/xml; charset=gbk" );
		if (empty ( $uid )) {
			return '<root><message type="error" value="-1" /></root>';
		}
		$home = self::get_home ( $uid );
		if (! is_dir ( _DATADIR . './avatar/' . $home )) {
			self::set_home ( $uid, _DATADIR . './avatar/' );
		}
		$puid = sprintf ( "%09d", $uid );
		$puid = substr ( $puid, - 2 );
		self::set_user_sys_pic($uid, $puid,$type='cus');
		$avatartype = self::getgpc ( 'avatartype', 'G' ) == 'real' ? 'real' : 'virtual';
		$bigavatarfile = _DATADIR . './avatar/' . self::get_avatar ( $uid, 'big', $avatartype );
		$middleavatarfile = _DATADIR . './avatar/' . self::get_avatar ( $uid, 'middle', $avatartype );
		$smallavatarfile = _DATADIR . './avatar/' . self::get_avatar ( $uid, 'small', $avatartype );
		$bigavatar = self::flashdata_decode ( self::getgpc ( 'avatar1', 'P' ) );
		$middleavatar = self::flashdata_decode ( self::getgpc ( 'avatar2', 'P' ) );
		$smallavatar = self::flashdata_decode ( self::getgpc ( 'avatar3', 'P' ) );
		if (! $bigavatar || ! $middleavatar || ! $smallavatar) {
			return '<root><message type="error" value="-2" /></root>';
		}
		$success = 1;
		$fp = fopen ( $bigavatarfile, 'wb' );
		fwrite ( $fp, $bigavatar );
		fclose ( $fp );
		$fp = fopen ( $middleavatarfile, 'wb' );
		fwrite ( $fp, $middleavatar );
		fclose ( $fp );
		$fp = fopen ( $smallavatarfile, 'wb' );
		fwrite ( $fp, $smallavatar );
		fclose ( $fp );
		$biginfo = @getimagesize ( $bigavatarfile );
		$middleinfo = @getimagesize ( $middleavatarfile );
		$smallinfo = @getimagesize ( $smallavatarfile );
		if (! $biginfo || ! $middleinfo || ! $smallinfo || $biginfo [2] == 4 || $middleinfo [2] == 4 || $smallinfo [2] == 4) {
			file_exists ( $bigavatarfile ) && unlink ( $bigavatarfile );
			file_exists ( $middleavatarfile ) && unlink ( $middleavatarfile );
			file_exists ( $smallavatarfile ) && unlink ( $smallavatarfile );
			$success = 0;
		}
		$filetype = '.jpg';
		@unlink ( _DATADIR . './tmp/upload' . $uid . $filetype );
		if ($success) {
			return '<?xml version="1.0" ?><root><face success="1"/></root>';
		} else {
			return '<?xml version="1.0" ?><root><face success="0"/></root>';
		}
	}
	static function flashdata_decode($s) {
		$r = '';
		$l = strlen ( $s );
		for($i = 0; $i < $l; $i = $i + 2) {
			$k1 = ord ( $s [$i] ) - 48;
			$k1 -= $k1 > 9 ? 7 : 0;
			$k2 = ord ( $s [$i + 1] ) - 48;
			$k2 -= $k2 > 9 ? 7 : 0;
			$r .= chr ( $k1 << 4 | $k2 );
		}
		return $r;
	}
	static function getgpc($k, $var = 'R') {
		switch ($var) {
			case 'G' :
				$var = &$_GET;
				break;
			case 'P' :
				$var = &$_POST;
				break;
			case 'C' :
				$var = &$_COOKIE;
				break;
			case 'R' :
				$var = &$_REQUEST;
				break;
		}
		return isset ( $var [$k] ) ? $var [$k] : NULL;
	}
	static function get_home($uid) {
		$uid = sprintf ( "%09d", $uid );
		$dir1 = substr ( $uid, 0, 3 );
		$dir2 = substr ( $uid, 3, 2 );
		$dir3 = substr ( $uid, 5, 2 );
		return $dir1 . '/' . $dir2 . '/' . $dir3;
	}
	static function set_home($uid, $dir = '.') {
		$uid = sprintf ( "%09d", $uid );
		$dir1 = substr ( $uid, 0, 3 );
		$dir2 = substr ( $uid, 3, 2 );
		$dir3 = substr ( $uid, 5, 2 );
		! is_dir ( $dir . '/' . $dir1 ) && mkdir ( $dir . '/' . $dir1, 0777 );
		! is_dir ( $dir . '/' . $dir1 . '/' . $dir2 ) && mkdir ( $dir . '/' . $dir1 . '/' . $dir2, 0777 );
		! is_dir ( $dir . '/' . $dir1 . '/' . $dir2 . '/' . $dir3 ) && mkdir ( $dir . '/' . $dir1 . '/' . $dir2 . '/' . $dir3, 0777 );
	}
	static function get_avatar($uid, $size = 'big', $type = '') {
		global $kekezu;
		global $_lang;
		$size = in_array ( $size, array ('big', 'middle', 'small' ) ) ? $size : 'big';
		$uid = abs ( intval ( $uid ) );
		$uid = sprintf ( "%09d", $uid );
		$dir1 = substr ( $uid, 0, 3 );
		$dir2 = substr ( $uid, 3, 2 );
		$dir3 = substr ( $uid, 5, 2 );
		$typeadd = $type == 'real' ? '_real' : '';
		$dir  = $dir1 . '/' . $dir2 . '/' . $dir3 . '/'. substr ( $uid, - 2 );
		$fpath = $dir. $typeadd . "_avatar_$size.jpg";
		return self::get_user_sys_pic ($fpath,$dir,$size);
	}
	static function avatar_html($uid, $avatartype = 'virtual') {
		global $_K;
		$_avatarflash = "static/img/system/camera.swf?inajax=1&appid=1&input=$uid&ucapi={$_K [siteurl]}&avatartype=virtual";
		$swf = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
		codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"
		width="520" height="280" id="mycamera" align="middle">
			<param name="allowScriptAccess" value="always" />
			<param name="scale" value="exactfit" />
			<param name="wmode" value="transparent" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<param name="movie" value="' . $_avatarflash . '" />
			<param name="menu" value="false" />
			<embed src="' . $_avatarflash . '" quality="high" bgcolor="#ffffff" width="520" height="280" name="mycamera" align="middle" allowScriptAccess="always" allowFullScreen="false" scale="exactfit"  wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object>';
		return $swf;
	}
	static function get_user_sys_pic($fpath,$dir,$size) {
		global $_K,$_lang,$kekezu;
		$path=S_ROOT."/data/avatar/";
		$log_file = $path.$dir.'_avatar.txt';
		if(file_exists($log_file)){
			$log_info = file_get_contents($log_file);
			$info     = explode("|", $log_info);
			switch ($info[0]){
				case "sys":
					$path = "system/" . $info[1] . "_" . $size . ".jpg";
					break;
				case "cus":
					$path=$fpath;
					break;
			}
		}else{
			$sex = $kekezu->_userinfo['sex'];
			$sex==$_lang['female'] and $u='women' or $u='man';
			$path =  "default/" . $u . "_" . $size . ".jpg";
		}
		return $path;
	}
	static function set_user_sys_pic($uid, $pic_id,$type='sys') {
		global $_K,$kekezu;
		$rpath=S_ROOT."/data/avatar/";
		$uid = abs ( intval ( $uid ) );
		$uid = sprintf ( "%09d", $uid );
		$dir1 = substr ( $uid, 0, 3 );
		$dir2 = substr ( $uid, 3, 2 );
		$dir3 = substr ( $uid, 5, 2 );
		$dir  = $dir1 . '/' . $dir2 . '/' . $dir3 . '/';
		$path = $rpath.$dir. substr ( $uid, - 2 ). "_avatar.txt";
		is_dir($rpath.$dir)==false and mkdir($rpath.$dir,0755,TRUE);
	    return file_put_contents($path,$type.'|'.$pic_id);
	}
}