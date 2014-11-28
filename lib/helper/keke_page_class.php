<?php
keke_lang_class::load_lang_class('keke_page_class');
class keke_page_class {
	public $_style = 'BootPagination';
	public $_ajax = 0;
	public $_ajax_dom;
	public $_cove = 1;
	public $_param;
	public $_data_arr = array ();
	public $_static;
	function setStyle($value) {
		$this->_style = $value;
	}
	function setAjax($value) {
		$this->_ajax = $value;
	}
	function setAjaxCove($value) {
		$this->_cove = intval($value);
	}
	function setAjaxDom($value) {
		$this->_ajax_dom = $value;
	}
	function setParam($value) {
		$this->_param = $value;
	}
	function setStatic($value) {
		$this->_static = $value;
	}
	function BootPagination($num, $perpage, $curpage, $mpurl,$anchor=''){
		global $_lang;
		$Paginationpage = '';
		$this->_static or $mpurl .= strpos ( $mpurl, '?' ) ? '&' : '?';
		$ajax_dom = $this->_ajax_dom;
		$cove     = $this->_cove;
		if ($num > $perpage) {
			$page = 10;
			$offset = 5;
			$pages = @ceil ( $num / $perpage );
			if ($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				$from = $curpage - $offset;
				$to = $curpage + $page - $offset - 1;
				if ($from < 1) {
					$to = $curpage + 1 - $from;
					$from = 1;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$to = $page;
					}
				} elseif ($to > $pages) {
					$from = $curpage - $pages + $to;
					$to = $pages;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$from = $pages - $page + 1;
					}
				}
			}
			if ($this->_ajax) {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? "<li><a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=1{$anchor}','1','{$cove}')>".$_lang['first_page']."</a></li>" : '') . ($curpage > 1 ? "<li><a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=" . ($curpage - 1). $anchor."','".($curpage-1)."','{$cove}')>&laquo;</a> </li>" : '');
			}elseif($this->_static){
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<li><a href="' . $mpurl . '1.htm'.$anchor.'">|&lt;</a></li> ' : '') . ($curpage > 1 ? '<li><a href="' . $mpurl .($curpage - 1).'.htm'.$anchor. '">&laquo;</a></li> ' : '');
			}
			else {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<li><a href="' . $mpurl . 'page=1'.$anchor.'">|&lt;</a></li> ' : '') . ($curpage > 1 ? '<li><a href="' . $mpurl . 'page=' . ($curpage - 1).$anchor. '">&laquo;</a></li> ' : '');
			}
			for($i = $from; $i <= $to; $i ++) {
				if ($this->_ajax) {
					$Paginationpage .= $i == $curpage ? '<li class="active"><a>' . $i . '</a></li>' : "<li><a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$i}{$anchor}','{$i}','{$cove}')>{$i}</a></li>";
				}
				elseif($this->_static){
					$Paginationpage .= $i == $curpage ? '<li class="active"><a>' . $i . '</a></li>' : '<li><a href="' . $mpurl. $i . '.htm' .$anchor. '">' . $i . '</a></li> ';
				} else {
					$Paginationpage .= $i == $curpage ? '<li class="active"><a>' . $i . '</a></li>' : '<li><a href="' . $mpurl . 'page=' . $i .$anchor. '">' . $i . '</a> </li>';
				}
			}
			if ($this->_ajax) {
				$Paginationpage .= ($curpage < $pages ? "<li><a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page=" . ($curpage + 1) .$anchor. "','".($curpage+1)."','{$cove}')>&raquo;>></a></li>" : '') . ($to < $pages ? " <li><a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$pages}{$anchor}','{$pages}','{$cove}')>&gt;|</a></li>" : '');
				$Paginationpage = $Paginationpage ? '<li><span> ' . $curpage . ' / ' . $pages . $_lang['page'].' </span></li> ' . $Paginationpage : '';
			}elseif($this->_static){
				$Paginationpage .= ($curpage < $pages ? '<li><a href="' . $mpurl .($curpage + 1).'.htm'.$anchor. '">&raquo;>></a>' : '') . ($to < $pages ? ' </li><a href="' . $mpurl . $pages.'.htm'.$anchor. '">&gt;|</a></li>' : '');
				$Paginationpage = $Paginationpage ? '<li><span> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span></li> ' . $Paginationpage : '';
			} else {
				$Paginationpage .= ($curpage < $pages ? '<li><a href="' . $mpurl . 'page=' . ($curpage + 1).$anchor. '">&raquo;</a></li>' : '') . ($to < $pages ? ' <li><a href="' . $mpurl . 'page=' . $pages.$anchor. '">&gt;|</a></li>' : '');
				$Paginationpage = $Paginationpage ?  $Paginationpage.'<li><span class="fl_l"> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span></li> ' : '';
			}
		}
		return $Paginationpage;
	}
	function Pagination($num, $perpage, $curpage, $mpurl,$anchor='') {
		global $_lang;
		$Paginationpage = '';
		$this->_static or $mpurl .= strpos ( $mpurl, '?' ) ? '&' : '?';
		$ajax_dom = $this->_ajax_dom;
		$cove     = $this->_cove;
		if ($num > $perpage) {
			$page = 10;
			$offset = 5;
			$pages = @ceil ( $num / $perpage );
			if ($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				$from = $curpage - $offset;
				$to = $curpage + $page - $offset - 1;
				if ($from < 1) {
					$to = $curpage + 1 - $from;
					$from = 1;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$to = $page;
					}
				} elseif ($to > $pages) {
					$from = $curpage - $pages + $to;
					$to = $pages;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$from = $pages - $page + 1;
					}
				}
			}
			if ($this->_ajax) {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=1{$anchor}','1','{$cove}')>".$_lang['first_page']."</a>" : '') . ($curpage > 1 ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=" . ($curpage - 1). $anchor."','".($curpage-1)."','{$cove}')><<".$_lang['Previous_page']."</a> " : '');
			}elseif($this->_static){
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<a href="' . $mpurl . '1.htm'.$anchor.'">'.$_lang['first_page'].'</a> ' : '') . ($curpage > 1 ? '<a href="' . $mpurl .($curpage - 1).'.htm'.$anchor. '"><<'.$_lang['Previous_page'].'</a> ' : '');
			}
			else {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<a href="' . $mpurl . 'page=1'.$anchor.'">'.$_lang['first_page'].'</a> ' : '') . ($curpage > 1 ? '<a href="' . $mpurl . 'page=' . ($curpage - 1).$anchor. '"><<'.$_lang['Previous_page'].'</a> ' : '');
			}
			for($i = $from; $i <= $to; $i ++) {
				if ($this->_ajax) {
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$i}{$anchor}','{$i}','{$cove}')>{$i}</a>";
				}
				elseif($this->_static){
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : '<a href="' . $mpurl. $i . '.htm' .$anchor. '">' . $i . '</a> ';
				} else {
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : '<a href="' . $mpurl . 'page=' . $i .$anchor. '">' . $i . '</a> ';
				}
			}
			if ($this->_ajax) {
				$Paginationpage .= ($curpage < $pages ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page=" . ($curpage + 1) .$anchor. "','".($curpage+1)."','{$cove}')>".$_lang['next_page'].">></a>" : '') . ($to < $pages ? " <a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$pages}{$anchor}','{$pages}','{$cove}')>".$_lang['last_page']."</a>" : '');
				$Paginationpage = $Paginationpage ? '<span> ' . $curpage . ' / ' . $pages . $_lang['page'].' </span> ' . $Paginationpage : '';
			}elseif($this->_static){
				$Paginationpage .= ($curpage < $pages ? '<a href="' . $mpurl .($curpage + 1).'.htm'.$anchor. '">'.$_lang['next_page'].'>></a>' : '') . ($to < $pages ? ' <a href="' . $mpurl . $pages.'.htm'.$anchor. '">'.$_lang['last_page'].'</a>' : '');
				$Paginationpage = $Paginationpage ? '<span> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span> ' . $Paginationpage : '';
			} else {
				$Paginationpage .= ($curpage < $pages ? '<a href="' . $mpurl . 'page=' . ($curpage + 1).$anchor. '">'.$_lang['next_page'].'>></a>' : '') . ($to < $pages ? ' <a href="' . $mpurl . 'page=' . $pages.$anchor. '">'.$_lang['last_page'].'</a>' : '');
				$Paginationpage = $Paginationpage ?  $Paginationpage.'<span class="fl_l"> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span> ' : '';
			}
		}
		return $Paginationpage;
	}
	function page_by_arr($data, $page_size, $curpage, $url) {
		$count = sizeof ( $data );
		($count > 0 && $page_size > 0) and $total_pages = ceil ( $count / $page_size ) or $total_pages = 0;
		$curpage > $total_pages and $curpage = $total_pages;
		$curpage = ($curpage <1 ?1:$curpage);
		$total_pages > 1 ? $offset = ($curpage-1) * $page_size : $offset = 0;
		$d = array();
		if($data){
			$d = array_slice ( $data, $offset, $page_size );
		}
		$style = $this->_style;
		$page ['page'] = $this->$style ( $count, $page_size, $curpage, $url );
		$page ['data'] = $d;
		return $page;
	}
	function getPages($count, $limit, $curpage, $url,$anchor='') {
		$count = intval($count);
		$limit = intval($limit);
		$style = $this->_style;
		if ($count > 0 && $limit > 0) {
			$total_pages = ceil ( $count / $limit );
		} else {
			$total_pages = 0;
		}
		if ($curpage > $total_pages) {
			$curpage = $total_pages;
		}
		$start = $limit * $curpage - $limit;
		if ($start < 0){
			$start = 0;
		}
		$where = '';
		$where .= " limit " . $start . " ," . $limit;
		$page ['page'] = $this->$style ( $count, $limit, $curpage, $url,$anchor );
		$page ['where'] = $where;
		$page['total_pages'] = $total_pages;
		if($total_pages <= 1){
			$page['st'] =1;
			$page['en'] = $count;
		}elseif($total_pages==$curpage){
			$page['st'] = ($curpage - 1) * $limit + 1;
			$page['en'] = $count ;
		}else{
			$page['st'] = ($curpage - 1) * $limit + 1;
			$page['en'] = $curpage * $limit;
		}
		return $page;
	}
}
?>