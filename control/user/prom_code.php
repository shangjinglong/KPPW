<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$strUrl = 'index.php?do=user&view=prom&op=code';
$strLinkReg = $_K [siteurl] . "/index.php?do=index&u=" . $gUid;
$arrModeReg = keke_prom_class::get_prom_rule ( 'reg' );
$arrModePubTask = keke_prom_class::get_prom_rule('pub_task');
$arrModeBidTask = keke_prom_class::get_prom_rule ( 'bid_task' );
$arrModeService = keke_prom_class::get_prom_rule('service');