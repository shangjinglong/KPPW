<?php
	class keke_img_class {
		private static $_img_width;
		private static $_img_height;
		private static $_img_type;	  
		private static $quality=100; 
		function __construct(){}
		public static function resize($image, $size){
			self::init_img_info($image);
			$arg_length = func_num_args();
			if($arg_length==1){
				return false;
			}
			$arguments = func_get_args();
			$cut = false;
			$last_arg = $arguments[$arg_length-1];
			$length = $arg_length-1;
			if (is_bool($last_arg)){
				if ($arg_length<=2){ return false;}
				$length = $arg_length-2;
				$cut = $last_arg; 
			}
			$orig_width = self::$_img_width;
			$orig_height = self::$_img_height;
			$success = (int)0;
			for ($i=1;$i<=$length;$i++){
				if (!is_array($arguments[$i])){
					return false;
				}
				if ($orig_width <= $orig_height){
					$according = $arguments[$i][0]/$orig_width;
				} else {
					$according = $arguments[$i][1]/$orig_height;
				}
				$width = $orig_width * $according;
				$height = $orig_height * $according;
				$target = isset($arguments[$i][2]) ? $arguments[$i][2] : '';
				$result =  self::resize_pic($image, $width, $height, $target);
				if ($cut==true && file_exists($target)){
					$img_size_arr = getimagesize($target);
					$target_width = $arguments[$i][0];
					$target_height = $arguments[$i][1];
					$cut_x = $img_size_arr[0] < $target_width ? '0' : ($img_size_arr[0] - $target_width)/2;
					$cut_y = $img_size_arr[1] < $target_height ? '0' : ($img_size_arr[1] - $target_height)/2;
					self::cut_pic($target, $target_width,$target_height,$cut_x, $cut_y);
				}
				$result==true && $success++;
			}
			return $success>0 ? true : false;
		}
		public static function resize_pic($image, $width, $height, &$targetfile=''){
			$size = min($width, $height);
			if($targetfile==''){
				if(strtolower(substr($image, 0, 4))=='http'){ return false;}
				$targetfile = self::filepath_by_size($image, $size, false);
			}
			$result = self::cut_image($image, $targetfile, $width, $height);
			return $result;
		}
		public static function cut_pic($image, $cut_width,$cut_height,$cut_x=0, $cut_y=0, $targetfile=''){
			$targetfile=='' && $targetfile = $image;
			$result = self::cut_image($image, $targetfile, $cut_width, $cut_height,$cut_width,$cut_height,$cut_x, $cut_y);
			return $result;
		}
		private static function cut_image($image, $targetfile, $new_width, $new_height,$cut_width='',$cut_height='',$cut_x=0, $cut_y=0){
			if (!self::$_img_width || !self::$_img_height){
				self::init_img_info($image);
			}
			$cut_width=='' && $cut_width = self::$_img_width;
			$cut_height=='' && $cut_height= self::$_img_height;
			if (!self::$_img_type) return false;
			$extend = '';
			switch (intval(self::$_img_type)){
				case 1: $extend='gif'; break;
				case 2: $extend='jpeg'; break;
				case 3: $extend='png'; break;
				default: return false; break;
			}
			$img_creat_method = 'imagecreatefrom' . $extend ;
			$source = $img_creat_method($image);
			$target_source = imagecreatetruecolor ( $new_width, $new_height );
			imagecopyresampled ( $target_source, $source, 0, 0, $cut_x, $cut_y, $new_width, $new_height, $cut_width, $cut_height);
			$img_method = 'image' . $extend;
			if ($img_method=='imagepng'){
				$result = $img_method ( $target_source, $targetfile);
			}else{
				$quality = self::$quality ? intval(self::$quality) : 100;
				$result = $img_method ( $target_source, $targetfile, $quality);
			}
			imagedestroy($target_source);
			return $result;
		}
		private static function init_img_info($image){
			$img_arr = getimagesize($image);
			if(!$img_arr) { return false; }
			self::$_img_width = $img_arr[0] ? $img_arr[0] : false;
			self::$_img_height = $img_arr[1] ? $img_arr[1] : false;
			self::$_img_type = $img_arr[2] ? $img_arr[2] : false;
		}
		public static function filepath_by_size($file, $size, $default=true){
			$basename = basename($file);
			$dirname = dirname($file).'/';
			$new_path = $dirname . $size . '_' .$basename;
			if ($default==true && !file_exists($new_path)){
				$new_path = $size==210 ? SKIN_PATH.'/img/shop/shop_default_big.jpg' :'static/img/system/kppw.jpg';
			}
			return $new_path;
		}
		public static function get_filepath_by_size($file, $size=null, $default=true){
			if(file_exists($file)){
				$basename = basename($file);
				$new_path = dirname($file).'/';
				if(in_array($size,array(100,210))){
					$new_path .= $size . '_';
				}
				$new_path.= $basename;
			}else{
				$new_path='';
			}
			if ($default==true && !file_exists($new_path)){
				$new_path = $size==210 ? SKIN_PATH.'/img/shop/shop_default_big.jpg' :'tpl/default/img/shop/shop_default.gif';
			}
			return $new_path;
		}
	}
