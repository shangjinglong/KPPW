<?php
class keke_xml_op_class {
	var $_filepath;    
	var $_xmlnode;    
	var $_nodevalue;   
	var $_nodeattr;    
	var $_doc;
	var $_xpath;
    var $_K;
	function __construct($filepath='')
	{
		global $_K;
		$this->_K = $_K;
		$this->_filepath = $filepath;
		$this->_doc = new DOMDocument();
		$this->_doc->load($this->_filepath);
		$this->_xpath = new DOMXPath($this->_doc);
	}
	function get_xml_node($nodename='') {
		$node = $this->_doc->getElementsByTagName ( $nodename );
		return $node->item ( 0 )->nodeValue;
	}
	function setxml($nodename='',$nodevalue='') {
		global $_K;
		if ($_K['charset']=="gbk"){
			$nodevalue = kekezu::gbktoutf($nodevalue);
		}
		$node = $this->_doc->getElementsByTagName ( $nodename );
		$node->item ( 0 )->nodeValue = $nodevalue;
		return $this->_doc->save ( $this->_filepath );
	}
	static function get_xml_toarr($xml_path=''){
		global $_K;
		$xml_o =  simplexml_load_file($xml_path); 
		$xml_arr = kekezu::objtoarray($xml_o);
        if ($_K['charset']=="gbk"||$_K['charset']=="GBK"){
        	return  kekezu::utftogbk($xml_arr);
        }
        else {
        	return $xml_arr;
        }
	}
	function  create_node($nodename='',$nodetext=''){
	  if($this->_K['charset']!='utf-8'){
		   $nodename = kekezu::gbktoutf($nodename);
		   $nodetext = kekezu::gbktoutf($nodetext);
		}
	  $xmlroot = $this->_doc->getElementsByTagName('root')->item(0);
	  $ele = new DOMElement($nodename,$nodetext);
	  $xmlroot->appendChild($ele);
	  $this->_doc->save($this->_filepath);
	}
	function create_child_node($ele='',$nodename='',$nodetext=''){
		if($this->_K['charset']!='utf-8'){
		   $nodename = kekezu::gbktoutf($nodename);
		   $nodetext = kekezu::gbktoutf($nodetext);
		}
		$child_node = new DOMElement($nodename,$nodetext);
		$ele->appendChild($child_node);
		$this->_doc->save($this->_filepath);
	}
	function create_node_attr($element='',$attrname='',$attrvalue=''){
	if($this->_K['charset']!='utf-8'){
		   $attrname = kekezu::gbktoutf($attrname);
		   $attrvalue = kekezu::gbktoutf($attrvalue);
		}
		$attr = new DOMAttr($attrname,$attrvalue);
		$element->appendChild($attr);
		$this->_doc->save($this->_filepath);
	}
	function reomve_node($element){
		$element->parentNode->removeChild($element);
		$this->_doc->save($this->_filepath);
	}
	function query_node($query,$item){
		$node  = $this->_xpath->query($query)->item($item);
		return $node;
	}
}
?>