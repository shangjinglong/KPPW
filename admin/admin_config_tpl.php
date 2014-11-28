<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 28 );
$strSelectTheme = $_K ['theme'];
$strSelectColor = $_K ['sitecss'];
$arrColors = array (
		array (
				'title' => 'css-responsive',
				'color' => '#2F549F'
		),
		array (
				'title' => 'css-google-responsive',
				'color' => '#db4a39'
		),
		array (
				'title' => 'css-taobao-responsive',
				'color' => '#f37c06'
		),
		array (
				'title' => 'css-android-responsive',
				'color' => '#a4c639'
		),
		array (
				'title' => 'css-skype-responsive',
				'color' => '#00aff0'
		),
		array (
				'title' => 'css-yahoo-responsive',
				'color' => '#720e9e'
		),
		array (
				'title' => 'css-font_as-responsive',
				'color' => '#1E9F75'
		),
		array (
				'title' => 'css-wordpressgrey-responsive',
				'color' => '#464646'
		),
		array (
				'title' => 'css-zbj-responsive',
				'color' => '#ff9400'
		)
);
$strThemePath = S_ROOT . SKIN_PATH . '/theme/';
$strColorPath = S_ROOT . SKIN_PATH . '/';
$skins = get_skin_type ( $strThemePath );
$intDirTheme = is_dir ( $strThemePath )?1:0;
function get_skin_type($strThemePath) {
	$skins = array ();
	if (is_dir ( $strThemePath )) {
		if ($fp = opendir ( $strThemePath )) {
			while ( $skin = readdir ( $fp ) ) {
				if (is_dir ( $strThemePath . $skin )) {
					$skin = str_replace ( '.', '', $skin );
					$skin && $skins [] = $skin;
				}
			}
		}
	}
	return array_filter ( $skins );
}
$objConfigBasicM = new Keke_witkey_basic_config_class ();
if (isset ( $ac )) {
	switch ($ac) {
		case 'ctheme' :
			$strObj = strval ( $obj );
			if (is_dir ( $strThemePath . $strObj )) {
				$objConfigBasicM->setWhere ( "k = 'theme'" );
				$objConfigBasicM->setV ( $strObj );
				$res = $objConfigBasicM->edit_keke_witkey_basic_config ();
				if ($res) {
					kekezu::admin_show_msg ( $_lang ['tpl_config_set_success'], 'index.php?do=config&view=tpl', 3, '', 'success' );
				} else {
					kekezu::admin_show_msg ( '设置失败', 'index.php?do=config&view=tpl', 3, '', 'warning' );
				}
			} else {
				kekezu::admin_show_msg ( '不存在的模板', 'index.php?do=config&view=tpl', 3, '', 'warning' );
			}
			break;
		case 'ccolor' :
			$strObj = strval ( $obj );
			if (is_dir ( $strColorPath . $strObj )) {
				$objConfigBasicM->setWhere ( "k = 'sitecss'" );
				$objConfigBasicM->setV ( $strObj );
				$res = $objConfigBasicM->edit_keke_witkey_basic_config ();
				if ($res) {
					kekezu::admin_show_msg ( '颜色设置成功', 'index.php?do=config&view=tpl', 3, '', 'success' );
				} else {
					kekezu::admin_show_msg ( '颜色设置失败', 'index.php?do=config&view=tpl', 3, '', 'warning' );
				}
			} else {
				kekezu::admin_show_msg ( '不存在的配置项', 'index.php?do=config&view=tpl', 3, '', 'warning' );
			}
			break;
	}
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );