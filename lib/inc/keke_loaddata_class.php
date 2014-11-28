<?php
keke_lang_class::load_lang_class('keke_loaddata_class');
class keke_loaddata_class {
	static function readfeed($loadcount, $type = '', $uid = '', $objid = '', $templatename = "", $cachename = "", $cachetime = 300) {
		global $kekezu,$_lang;
		$tag_arr = $kekezu->_tag;
		$tag_info = $tag_arr [$templatename];
		$feed_arr = $cachename ? $kekezu->_cache_obj->get ( "feed_" . $cachename . "_cache" ) : null;
		if (! $feed_arr) {
			$feed_obj = new Keke_witkey_feed_class ();
			$limit = $loadcount ? "limit 0,$loadcount" : "";
			$where = "1=1 ";
			$where .= $type ? "and feedtype='$type' " : "";
			$where .= $uid ? "and uid='$uid' " : "";
			$where .= $objid ? "and obj_id='$objid' " : "";
			$where .= " order by feed_time desc ";
			$feed_obj->setWhere ( $where . $limit );
			$feed_arr = $feed_obj->query_keke_witkey_feed ();
			$temp_arr = array ();
			if (is_array ( $feed_arr )) {
				foreach ( $feed_arr as $v ) {
					$v ['on_time'] = kekezu::get_gmdate ( $v ['feed_time'] );
					$temp_arr [] = $v;
				}
			}
			$feed_arr = $temp_arr;
			$cachename ? $kekezu->_cache_obj->set ( "feed_" . $cachename . "_cache", $feed_arr, $cachetime ) : null;
		}
		$datalist = $feed_arr;
		require keke_tpl_class::parse_code ( htmlspecialchars_decode ( $tag_info [tag_code] ), $tag_info [tag_id] );
	}
	static function readtag($name) {
		global $kekezu,$_lang;
		$arrTag = db_factory::get_one(sprintf('select * from %s where tagname = "%s"',TABLEPRE.'witkey_tag',$name));
	    if ($arrTag ['tag_type'] == 5) {
			echo htmlspecialchars_decode ( $arrTag ['code'] );
		}else{
	 		if ($arrTag ['cache_time']) {
				$cid = 'db_tag_' . $arrTag ['tag_id'];
				$datalist = $kekezu->_cache_obj->get ( $cid );
				if (! $datalist) {
					$datalist = keke_loaddata_class::loaddata ( $arrTag );
					$kekezu->_cache_obj->set ( $cid, $datalist, $arrTag ['cache_time'] );
				}
				require keke_tpl_class::parse_code ( htmlspecialchars_decode ( $arrTag [tag_code] ), $arrTag [tag_id] );
			} else if ($arrTag) { 
				keke_loaddata_class::previewtag ( $arrTag );
			} else {
				echo $_lang['tag'] . $name . $_lang['not_found'];
			}
		}
	}
	static function gettagHTML($tagid) {
		global $_K, $kekezu;
		$url = $_K ['siteurl'] . "/".ADMIN_DIRECTORY."/plu.php?do=previewtag&tagid=" . $tagid;
		if (function_exists ( "curl_init" )) {
			$content = kekezu::curl_request($url) ;
		} else {
			$content = file_get_contents ( $url );
		}
		return $content;
	}
	static function previewtag($tag_info) {
		global $_K;
		$datalist = keke_loaddata_class::loaddata ( $tag_info );
		if ($tag_info ['tag_type'] == 5) {
			$find = '/'.'src="data'.'/i';
			$replase = 'src="'.$_K[siteurl].'/data';
			$tag_info[code] =  preg_replace ($find, $replase,$tag_info[code] );
			echo htmlspecialchars_decode ( $tag_info ['code'] );
		} else {
			require keke_tpl_class::parse_code ( htmlspecialchars_decode ( $tag_info [tag_code] ), $tag_info [tag_id] );
		}
	}
	static function preview_addgroup($adname,$loadcount) {
		self::adgroup ( $adname,$loadcount);
	}
	static function loaddata($tag_info) {
		global $_K;
		$tag_type = keke_glob_class::get_tag_type ();
		if ($tag_info [tag_type] != 5) {
			$func_name = "load_" . $tag_type [$tag_info ['tag_type']] [2] . "_data";
			$temp_arr = self::$func_name ( $tag_info );
			return $temp_arr;
		}
	}
	static function load_autosql_data($tag_info) {
		$sql = stripslashes ( $tag_info ['tag_sql'] );
		$temp_arr = db_factory::query ( $sql );
		return $temp_arr;
	}
	static function ad_show($code, $do = 'index',$is_slide=null) {
		global $_lang,$_K;
		$ad_target = db_factory::get_one ( sprintf ( " select * from %switkey_ad_target where code='%s' and is_allow=1", TABLEPRE, $code ),3600*24);
			if ($ad_target) {
			if(intval($is_slide)){
			   return self::get_adgroup_by_target($ad_target['target_id'],$ad_target['name'],$ad_target ['ad_num']);
			}
			$sql = " select a.ad_id,a.ad_name,a.ad_file,a.ad_content,a.ad_url,a.width,a.height,
			a.ad_type,a.ad_position,a.on_time from %switkey_ad a left join %switkey_ad_target b on a.target_id=b.target_id
			where b.code='%s' and a.is_allow='1' order by a.ad_id desc limit 0,%d";
			$ad_info = db_factory::get_one( sprintf ( $sql, TABLEPRE, TABLEPRE, $code, $ad_target ['ad_num'] ),true,$_K['timespan'] );
			if($ad_info){
					$ad_str .= "<div class='adv'>";
					switch ($ad_info ['ad_type']) {
						case "flash" :
							$ad_str.=keke_file_class::flash_codeout($ad_info ['ad_file'], $ad_info ['width'], $ad_info ['height'],$ad_info['ad_url']);
							break;
						case "text" :
						case "code" :
							$ad_str .=  "<a href='" . $ad_info ['ad_url'] . "' target='_blank' title='".$ad_info['ad_name']."'>".kekezu::k_stripslashes($ad_info ['ad_content'])."</a>";;
							break;
						case "image" :
							if($ad_info ['ad_file']){
							$ad_str .= "<a href='" . $ad_info ['ad_url'] . "' target='_blank' title='".$ad_info['ad_name']."'><img src='tpl/default/img/grey.gif' width='".$ad_info ['width']."' class='lazy' data-original='" . $ad_info ['ad_file']
									 . "'  height='".$ad_info ['height']."' alt='".$ad_info['ad_name']."' title='".$ad_info['ad_name']."'></a>";
							}else{
								$ad_str .= "<a href='" . $ad_info ['ad_url'] . "' target='_blank' title='".$ad_info['ad_name']."'><img src='" . $ad_info ['ad_file']
								. "'data-src='holder.js/950x50/#f8f8f8:#ddd/text:AD'  width='".$ad_info ['width']."' height='".$ad_info ['height']."' alt='".$ad_info['ad_name']."' title='".$ad_info['ad_name']."'></a>";
							}
							break;
					}
					self::update_ad($ad_info);
					$ad_str .= "</div>";
				}
			}
			echo $ad_str;
		}
	static function update_ad($ad_info){
	   global $_K,$kekezu;
	     if((SYS_START_TIME - intval($ad_info['on_time']))>$_K['timespan']){
	      db_factory::execute(sprintf('update %switkey_ad set on_time  = %s where ad_id = %d',TABLEPRE,time()+$_K['timespan'],$ad_info['ad_id']));
	      db_factory::execute(sprintf("update %switkey_ad set is_allow='0' where ad_id='%d' and  end_time>0 and end_time<%d",TABLEPRE,$ad_info['ad_id'],time()));
	   }
	}
	static function ad($adid) {
		$ad_arr = kekezu::get_ad ();
		$size = sizeof ( $ad_arr );
		$temp = array ();
		for($i = 0; $i < $size; $i ++) {
			$temp [$ad_arr [$i] ['ad_id']] = $ad_arr [$i];
		}
		$ad_arr = $temp;
		unset ( $temp );
		$ad_info = $ad_arr [$adid];
		if ($ad_info ['ad_type'] == 1) {
			$adstr = '<embed src="' . $ad_info ['ad_file'] . '" quality="high" width="' . $ad_info ['width'] . '" height="' . $ad_info ['height'] . '" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>';
		} elseif ($ad_info ['ad_type'] == 3) {
			$adstr = htmlspecialchars_decode ( $ad_info ['ad_content'] );
		} else {
			$adstr = '<img src="' . $ad_info ['ad_file'] . '" ';
			$adstr .= $ad_info ['width'] ? "width={$ad_info['width']} " : '';
			$adstr .= $ad_info ['height'] ? "height={$ad_info['height']} " : '';
			$adstr .= '>';
			if ($ad_info ['ad_url']) {
				$adstr = '<a target="_blank" href="' . $ad_info ['ad_url'] . '">' . $adstr . '</a>';
			}
		}
		echo $adstr;
	}
	static function adgroup($adname,$ad_limit_num) {
		global $kekezu,$_K;
		$kekezu->_tag or $kekezu->init_tag();
		$datalist = kekezu::get_ad ( $adname,$ad_limit_num );
		$tag_arr = $kekezu->_tag;
		$tag_info = $tag_arr [$adname];
		require keke_tpl_class::parse_code ( htmlspecialchars_decode ( $tag_info ['tag_code'] ), $tag_info ['tag_id'] );
	}
	static function get_adgroup_by_target($target_id,$target_name,$ad_list_num){
		global $kekezu,$_K;
		$arrTag = db_factory::get_one(sprintf('select * from %s where target_id = %d',TABLEPRE.'witkey_ad_target',intval($target_id)));
		$datalist = kekezu::get_table_data ( '*', 'witkey_ad', '1=1 and is_allow=1 and target_id = '.intval($target_id), 'listorder', '', $ad_list_num, '', 3600 );
		require keke_tpl_class::parse_code ( htmlspecialchars_decode ( $arrTag ['content'] ), $arrTag ['target_id'] );
	}
}
?>