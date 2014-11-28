<?php
$strUrl = 'index.php?do=user&view=shop&op=setting';
$shopInfo=db_factory::get_one(sprintf(" select * from %switkey_shop where uid='%d' ",TABLEPRE,$gUid));
$objShopT = keke_table_class::get_instance('witkey_shop');
if (isset($formhash)&&kekezu::submitcheck($formhash)) {
	if (strtoupper ( CHARSET ) == 'GBK') {
		$shop_name = kekezu::utftogbk($shop_name );
		$shop_slogans = kekezu::utftogbk($shop_slogans );
		$seo_title = kekezu::utftogbk($seo_title );
		$seo_keyword = kekezu::utftogbk($seo_keyword );
		$seo_desc = kekezu::utftogbk($seo_desc );
	}
	$arrData = array(
			'shop_name'	=>$shop_name,
			'shop_slogans'	=>$shop_slogans,
			'seo_title'	=>$seo_title,
			'seo_keyword'		=>$seo_keyword,
			'seo_desc'	=>$seo_desc,
	);
	$intRes = $objShopT->save($arrData,array('shop_id'=>$shopInfo['shop_id']));
	unset($objShopT);
	kekezu::show_msg('已保存',NULL,NULL,NULL,'ok');
}
