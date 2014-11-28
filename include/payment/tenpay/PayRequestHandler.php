<?php
class PayRequestHandler extends RequestHandler {
	
	function __construct() {
		$this->setGateURL("https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi");	
	}
	function init() {
		 
		$this->setParameter("cmdno", "1");
		
	 
		$this->setParameter("date",  date("Ymd"));
		
	 
		$this->setParameter("bargainor_id", "");
		
		 
		$this->setParameter("transaction_id", "");
		
		 
		$this->setParameter("sp_billno", "");
		
	 
		$this->setParameter("total_fee", "");
		
		 
		$this->setParameter("fee_type",  "1");
		
		 
		$this->setParameter("return_url",  "");
		
		 
		$this->setParameter("attach",  "");
		
		 
		$this->setParameter("spbill_create_ip",  "");
		
	 
		$this->setParameter("desc",  "");
		
	 
		$this->setParameter("bank_type",  "0");
		
	 
		$this->setParameter("cs",  "gbk");
		
	 
		$this->setParameter("sign",  "");
		
	}
	
 
	function createSign() {
		$cmdno = $this->getParameter("cmdno");
		$date = $this->getParameter("date");
		$bargainor_id = $this->getParameter("bargainor_id");
		$transaction_id = $this->getParameter("transaction_id");
		$sp_billno = $this->getParameter("sp_billno");
		$total_fee = $this->getParameter("total_fee");
		$fee_type = $this->getParameter("fee_type");
		$return_url = $this->getParameter("return_url");
		$attach = $this->getParameter("attach");
		$spbill_create_ip = $this->getParameter("spbill_create_ip");
		$key = $this->getKey();
		
		$signPars = "cmdno=" . $cmdno . "&" .
				"date=" . $date . "&" .
				"bargainor_id=" . $bargainor_id . "&" .
				"transaction_id=" . $transaction_id . "&" .
				"sp_billno=" . $sp_billno . "&" .
				"total_fee=" . $total_fee . "&" .
				"fee_type=" . $fee_type . "&" .
				"return_url=" . $return_url . "&" .
				"attach=" . $attach . "&";
		
		if($spbill_create_ip != "") {
			$signPars .= "spbill_create_ip=" . $spbill_create_ip . "&";
		}
		
		$signPars .= "key=" . $key;
		
		$sign = strtolower(md5($signPars));
		
		$this->setParameter("sign", $sign);
		
		 
		$this->_setDebugInfo($signPars . " => sign:" . $sign);
		
	}

}

 
class RequestHandler {
	
	 
	var $gateUrl;
	
 
	var $key;
	
	 
	var $parameters;
	
 
	var $debugInfo;
	
	function __construct() {
		$this->gateUrl = "https://www.tenpay.com/cgi-bin/v1.0/service_gate.cgi";
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
	}
	function init() {
		 
	}
	
 
	function getGateURL() {
		return $this->gateUrl;
	}
	
 
	function setGateURL($gateUrl) {
		$this->gateUrl = $gateUrl;
	}
	
 
	function getKey() {
		return $this->key;
	}
 
	function setKey($key) {
		$this->key = $key;
	}
	
 
	function getParameter($parameter) {
		return $this->parameters[$parameter];
	}
 
	function setParameter($parameter, $parameterValue) {
		$this->parameters[$parameter] = $parameterValue;
	}
	
 
	function getAllParameters() {
		return $this->parameters;
	}
	
 
	function getRequestURL() {
	
		$this->createSign();
		
		$reqPar = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			$reqPar .= $k . "=" . urlencode($v) . "&";
		}
		
	 
		$reqPar = substr($reqPar, 0, strlen($reqPar)-1);
		
		$requestURL = $this->getGateURL() . "?" . $reqPar;
		
		return $requestURL;
		
	}
		
 
	function getDebugInfo() {
		return $this->debugInfo;
	}
	
 
	function doSend() {
		header("Location:" . $this->getRequestURL());
		exit;
	}
	
 
	function createSign() {
		$signPars = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			if("" != $v && "sign" != $k) {
				$signPars .= $k . "=" . $v . "&";
			}
		}
		$signPars .= "key=" . $this->getKey();
		
		$sign = strtolower(md5($signPars));
		
		$this->setParameter("sign", $sign);
		
	 
		$this->_setDebugInfo($signPars . " => sign:" . $sign);
		
	}	
	
 
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}

}

?>
