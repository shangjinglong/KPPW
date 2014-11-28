<?php

class PayResponseHandler extends ResponseHandler {
	
	function isTenpaySign() {
		$cmdno = $this->getParameter ( "cmdno" );
		$pay_result = $this->getParameter ( "pay_result" );
		$date = $this->getParameter ( "date" );
		$transaction_id = $this->getParameter ( "transaction_id" );
		$sp_billno = $this->getParameter ( "sp_billno" );
		$total_fee = $this->getParameter ( "total_fee" );
		$fee_type = $this->getParameter ( "fee_type" );
		$attach = $this->getParameter ( "attach" );
		$key = $this->getKey ();
		
		$signPars = "";
		
		$signPars = "cmdno=" . $cmdno . "&" . "pay_result=" . $pay_result . "&" . "date=" . $date . "&" . "transaction_id=" . $transaction_id . "&" . "sp_billno=" . $sp_billno . "&" . "total_fee=" . $total_fee . "&" . "fee_type=" . $fee_type . "&" . "attach=" . $attach . "&" . "key=" . $key;
		$sign = strtolower ( md5 ( $signPars ) );
		$tenpaySign = strtolower ( $this->getParameter ( "sign" ) );
		
		$this->_setDebugInfo ( $signPars . " => sign:" . $sign . " tenpaySign:" . $this->getParameter ( "sign" ) );
		
		return $sign == $tenpaySign;
	
	}

}

class ResponseHandler {
	
	var $key;
	
	var $parameters;
	
	var $debugInfo;
	
	function __construct() {
		$this->key = "";
		$this->parameters = array ();
		$this->debugInfo = "";
		foreach ( $_GET as $k => $v ) {
			$this->setParameter ( $k, $v );
		}
		foreach ( $_POST as $k => $v ) {
			$this->setParameter ( $k, $v );
		}
	}
	
	function getKey() {
		return $this->key;
	}
	
	function setKey($key) {
		$this->key = $key;
	}
	
	function getParameter($parameter) {
		return $this->parameters [$parameter];
	}
	
	function setParameter($parameter, $parameterValue) {
		$this->parameters [$parameter] = $parameterValue;
	}
	
	function getAllParameters() {
		return $this->parameters;
	}
	
	function isTenpaySign() {
		$signPars = "";
		ksort ( $this->parameters );
		foreach ( $this->parameters as $k => $v ) {
			if ("sign" != $k && "" != $v) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey ();
		
		$sign = strtolower ( md5 ( $signPars ) );
		
		$tenpaySign = strtolower ( $this->getParameter ( "sign" ) );
		
		$this->_setDebugInfo ( $signPars . " => sign:" . $sign . " tenpaySign:" . $this->getParameter ( "sign" ) );
		
		return $sign == $tenpaySign;
	
	}
	
	function getDebugInfo() {
		return $this->debugInfo;
	}
	
	function doShow($show_url) {
		$strHtml = "<html><head>\r\n" . "<meta name=\"TENCENT_ONLINE_PAYMENT\" content=\"China TENCENT\">" . "<script language=\"javascript\">\r\n" . "window.location.href='" . $show_url . "';\r\n" . "</script>\r\n" . "</head><body></body></html>";
		
		echo $strHtml;
		
		exit ();
	}
	
	function _isTenpaySign($signParameterArray) {
		
		$signPars = "";
		foreach ( $signParameterArray as $k ) {
			$v = $this->getParameter ( $k );
			if ("sign" != $k && "" != $v) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey ();
		
		$sign = strtolower ( md5 ( $signPars ) );
		
		$tenpaySign = strtolower ( $this->getParameter ( "sign" ) );
		
		$this->_setDebugInfo ( $signPars . " => sign:" . $sign . " tenpaySign:" . $this->getParameter ( "sign" ) );
		
		return $sign == $tenpaySign;
	
	}
	
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}

}

?>
