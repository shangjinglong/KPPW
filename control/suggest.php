<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
if (kekezu::submitcheck(isset($formhash))) {
	  if($code){
		$strCodeCheck = kekezu::check_secode ( $code );
		if ($strCodeCheck!=1) {
			$tips['errors']['code'] = $strCodeCheck;
			kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
		}
	   }
	   if (strtoupper ( CHARSET ) == 'GBK') {
	   	$tar_content = kekezu::utftogbk($tar_content );
	   	$txt_title = kekezu::utftogbk($txt_title );
	   }
		$strDesc = kekezu::escape($tar_content);
		$strTitle = kekezu::escape($txt_title);
		$objSuggest = new Keke_witkey_proposal_class();
		$objSuggest->setPro_title($strTitle);
		$objSuggest->setPro_type($slt_type);
		$objSuggest->setPro_desc($strDesc);
		$objSuggest->setPro_status(1);
		$objSuggest->setPro_time(time());
		$objSuggest->setUid($uid);
		$objSuggest->setUsername($username);
		$intSuggestId = $objSuggest->create_keke_witkey_proposal();
		unset($objSuggest);
		if ($intSuggestId) {
			kekezu::show_msg ('提交成功，感谢您的参与', $_K['siteurl'].'/index.php' , NULL, NULL, 'ok' );
		} else {
			kekezu::show_msg ( '提交失败',NULL , NULL, NULL, 'fail' );
		}
	}
