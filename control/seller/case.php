<?php
$strUrl = 'index.php?do=seller&view=case&id='.intval($id);
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
$objTaskT = keke_table_class::get_instance ( 'witkey_shop_case' );
$strWhere .= "  shop_id=".intval($arrSellerInfo['shop_id']);
$page and $intPage = intval ( $page );
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
$strWhere .= " order by case_id desc";
$arrDatas = $objTaskT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );
$arrCaseLists = $arrDatas ['data'];
$strPages = $arrDatas ['pages'];