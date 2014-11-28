<?php
/**
* 上传文件
*
* @file  upload.php
* @author shangjinglong <sjl.55555@gmail.com>
* @time  2014-4-2 下午3:13:11
* @Copyright (c) 2007-2014 http://www.kekezu.com All rights reserved.
*/
$___y = date ( 'Y' );$___m = date ( 'm' );$___d = date ( 'd' );
define ( 'UPLOAD_RULE', "$___y/$___m/$___d/" );
$fileFormat = explode('|',$kekezu->_sys_config['file_type']);
$maxSize = intval($kekezu->_sys_config['max_size'])*1024*1024;
//$upload = new keke_upload_class(S_ROOT.'/data/uploads/'.UPLOAD_RULE ,$fileFormat,$maxSize);
$pathDir = setUploadPath($fileType, $objType);
$upload = new keke_upload_class(S_ROOT.$pathDir ,$fileFormat,$maxSize);
$savename = $upload->run( $filename , 1);

if (is_array ( $savename )) {
	$name = $savename [0] ['name'];
	//$path = 'data/uploads/'.UPLOAD_RULE. $savename [0] ['saveName'];
	$path = $pathDir. $savename [0] ['saveName'];
	if($fileType == 'service'){
		$size_a = array (100, 100 );
		$size_b = array (210, 210 );
		$result = keke_img_class::resize ( $path, $size_a, $size_b, true ); //缩放后进行裁切
	}

	$objFileT = keke_table_class::get_instance('witkey_file');
	$arrData = array(
			'file_name'	=>CHARSET =='gbk'?kekezu::utftogbk($savename [0] ['name']):$savename [0] ['name'],
			'save_name'	=>$path,
			'uid'		=>$gUid,
			'username'	=>$gUsername,
			'obj_type'	=>$objType,
			'task_id'	=>$taskId,
			'work_id'	=>$workId,
			'on_time'   =>time()
	);
	$fileId = $objFileT->save ( $arrData);
	$msg = array ('url' => $path,'filename' => $filename, 'name' => $name,'fileid'=>intval($fileId));
}
else{
	$err = $msg = $savename;
}
echo json_encode(array ('err' => $err, 'msg' => $msg));die();

function setUploadPath($fileType,$objType){
	$pathDir = 'data/uploads/';
	if($fileType =='sys'&&$objType =='auth'){		//认证图片存放目录
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='ad'){	//广告存放目录
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='mark'){	//等级图片存放目录
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='tools'){	//增值服务图片存放目录
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='space'){					//用户空间图片存放目录
		$pathDir .= $fileType.'/';
	}else{
		$pathDir .= UPLOAD_RULE;
	}
	return $pathDir;
}