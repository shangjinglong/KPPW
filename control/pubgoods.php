<?php
kekezu::check_login();
$strPageTitle = '发布商品-'.$_K ['html_title'];
$strPageKeyword = '发布商品,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$id = intval($id);
$step = strval(trim($step));
$strRandKf = kekezu::get_rand_kf ();
$arrModelLists = kekezu::get_table_data ( '*', 'witkey_model', " model_type = 'shop' and model_status='1'", 'listorder', '', '', 'model_id', 3600 );
if(0 === $id){
	$arrIds = array_keys($arrModelLists);
	$id = $arrIds['0'];
}
$arrModelInfo = $arrModelLists [$id];
if(empty($arrModelInfo)){
	kekezu::show_msg('不存在该任务模型,请重新选择','index.php?do=pubtask',3,null,'warning');
}
$arrTopIndustrys = $kekezu->_indus_goods_arr;
$arrPubProcess = array(
		1=>array('step'=>'step1','desc'=>'填写商品描述'),
		2=>array('step'=>'step2','desc'=>'核对商品清单'),
		3=>array('step'=>'step3','desc'=>'成功发布商品')
);
$arrPayitemLists = PayitemClass::getPayitemListForPub('goods');
$arrPayitemPriceLists = PayitemClass::getPayitemPriceList('goods');
$arrStep = array('step1','step2','step3');
if(!in_array($step, $arrStep)){
	$step = 'step1';
}
$strUrl = "index.php?do=pubgoods&id=".$id;
$_SESSION['spread'] = 'index.php?do=pubgoods';
require S_ROOT . "/shop/" . $arrModelInfo['model_dir'] . "/control/pub.php";
