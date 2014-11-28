<?php
class keke_base62_class {
	private $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	public function base62_encode($str) {
		$out = '';
		for($t=floor(log10($str)/log10(62)); $t>=0; $t--) {
			$a = floor($str / pow(62, $t));
			$out = $out.substr($this->string, $a, 1);
			$str = $str - ($a * pow(62, $t));
		}
		return $out;
	}
	public function base62_decode($str) {
		$out = 0;
		$len = strlen($str) - 1;
		for($t=0; $t<=$len; $t++) {
			$out = $out + strpos($this->string, substr($str, $t, 1)) * pow(62, $len - $t);
		}
		return substr(sprintf("%f", $out), 0, -7);
	}
}
?>