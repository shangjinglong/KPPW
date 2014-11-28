<?php
$objCaptcha = new Secode_class ();
$objCaptcha->use_gd_font = false;
$objCaptcha->text_color = "#3399ff";
$objCaptcha->image_type = 2;
$objCaptcha->text_x_start = 8;
if ($objCaptcha->use_gd_font) {
	$objCaptcha->image_height = 45;
	$objCaptcha->image_width = 175;
	$objCaptcha->gd_font_size = 20;
	$objCaptcha->gd_font_file = realpath ( S_ROOT .DIRECTORY_SEPARATOR. "static/img/gdfonts/bubblebath.gdf" );
}
$objCaptcha->multi_text_color = "#3399ff,#3300cc,#3333cc,#6666ff";
$objCaptcha->ttf_file = realpath ( S_ROOT . DIRECTORY_SEPARATOR."static/img/gdfonts/elephant.ttf" );
$objCaptcha->use_transparent_text = true;
$objCaptcha->show();
die();