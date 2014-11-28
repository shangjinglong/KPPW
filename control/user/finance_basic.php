<?php	defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl ="index.php?do=user&view=finance&op=basic";
$arrBankAuth = keke_auth_fac_class::auth_check ( 'bank', $gUid );