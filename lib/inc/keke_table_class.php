<?php
class keke_table_class {
	public $_table_name;
	public $_table_obj;
	public $_page_obj;
	public $_count;
	public $_pre = 'keke_';
	public static function get_instance($table_name) {
		return new keke_table_class ( $table_name );
	}
	function __construct($table_name) {
		global $kekezu;
		$this->_page_obj = $kekezu->_page_obj;
		$this->_page_obj->_style = 'BootPagination';
		$this->_table_name = $table_name;
		$table_class = ucfirst($this->_pre).$table_name . "_class";
		$this->_table_obj = new $table_class ();
	}
	function get_grid($wh = '1=1', $url_str, $page, $page_size = 10, $order = null,$ajax=0,$ajax_dom=null) {
		$page_obj = $this->_page_obj;
		if($ajax){
			$page_obj->setAjax('1');
			$page_obj->setAjaxDom($ajax_dom);
		}
		if (is_array ( $wh )) {
			$where = " 1 = 1";
			$wh [w] = array_filter ( $wh [w] );
			foreach ( $wh [w] as $k => $v ) {
				$where .= " and $k = '$v'";
			}
			foreach ( $wh [ord] as $k => $v ) {
				$where .= " order by $k $v";
			}
		} else {
			$where = $wh;
		}
		$this->_table_obj->setWhere ( $where );
		$count_query = "count_" . $this->_pre . $this->_table_name;
		$this->_count = $count = $this->_table_obj->$count_query ();
		$pages = $page_obj->getPages ( $count, $page_size, $page, $url_str );
		$where .= $order .= $pages [where];
		$this->_table_obj->setWhere ( $where );
		$query = "query_" . $this->_pre . $this->_table_name;
		$res_info [data] = $this->_table_obj->$query ();
		$res_info ['count'] = $this->_count;
		$res_info [pages] = $pages;
		if ($res_info) {
			return $res_info;
		} else {
			return false;
		}
	}
	function save($fields, $pk = array()) {
		foreach ( $fields as $k => $v ) {
			$kk = ucfirst ( $k );
			$set_query = "set" . $kk;
			$this->_table_obj->$set_query ( $v );
		}
		$keys = array_keys ( $pk );
		$key = $keys [0];
		if (! empty ( $pk [$key] )) {
			$this->_table_obj->setWhere ( " $key = '" . $pk [$key] . "'" );
			$edit_query = "edit_" . $this->_pre . $this->_table_name;
			$res = $this->_table_obj->$edit_query ();
		} else {
			$create_query = "create_" . $this->_pre . $this->_table_name;
			$res = $this->_table_obj->$create_query ();
		}
		if ($res) {
			return $res;
		} else {
			return false;
		}
	}
	function del($pk, $val, $url = null) {
		if (! $val) {
			return false;
		}
		if (is_array ( $val ) && ! empty ( $val )) {
			$ids = implode ( ',', $val );
			$this->_table_obj->setWhere ( " $pk in ($ids)" );
		} elseif ($val) {
			$this->_table_obj->setWhere ( "$pk = " . $val );
		}
		$del_query = "del_" . $this->_pre . $this->_table_name;
		return $this->_table_obj->$del_query ();
	}
	function get_table_info($index_key, $index_val) {
		$this->_table_obj->setWhere ( " $index_key = '$index_val'" );
		$query = "query_" . $this->_pre . $this->_table_name;
		$table_info = $this->_table_obj->$query ();
		$table_info = $table_info [0];
		if ($table_info) {
			return $table_info;
		} else {
			return false;
		}
	}
	public static function generate_row($fname, $str) {
		$a = "";
		if (is_numeric ( $str )) {
			$a .= "select 1 as $fname";
			for($i = 2; $i <= $str; $i ++) {
				$a .= " union all select $i";
			}
		} elseif (is_array ( $str )) {
			foreach ( $str as $k => $v ) {
				if ($k == 0) {
					$a .= " select $v as $fname";
				} else {
					$a .= " union all select $v ";
				}
			}
		}
		return $a;
	}
	public static function updateself($table_name, $fiedsarr, $wherearr) {
		$size = sizeof ( $fiedsarr );
		$keys = array_keys ( $fiedsarr );
		for($i = 0; $i < $size; $i ++) {
			stristr ( $fiedsarr [$keys [$i]], '`' ) != false and $value = $fiedsarr [$keys [$i]] or $value = "'{$fiedsarr[$keys[$i]]}'";
			$i == $size - 1 and $set_value .= "`$keys[$i]` = $value " or $set_value .= " `$keys[$i]` = $value,";
		}
		$size = sizeof ( $wherearr );
		$keys = array_keys ( $wherearr );
		$where = " 1=1 ";
		for($i = 0; $i < $size; $i ++) {
			$where .= " and  `$keys[$i]` = '{$wherearr[$keys[$i]]}'";
		}
		return db_factory::execute ( " update ".TABLEPRE. $table_name . " set $set_value where $where" );
	}
	public static function format_condit_data($where,$order,$w=array(),$p = array()){
		global $kekezu;
		$arr = array();
		if (! empty ( $w )) {
			$w = array_filter ( $w );
			foreach ( $w as $k => $v ) {
				$where .= " and $k = '$v' ";
			}
		}
		$order and $where.=" order by $order ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$count = intval ( db_factory::execute ($where ));
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
		}
		$arr['where']  = $where;
		$arr['pages']  = $pages;
		return $arr;
	}
	public static function all_table_info($table_name,$arr){
		 list($key,$val)= each($arr);
		 $sql = sprintf("select * from %s where %s='%s'",TABLEPRE.$table_name,$key,$val);
		 return db_factory::query($sql);
	}
}