<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('list', 'edit', 'cat_edit', 'cat_list','keyword_list','keyword_edit' );
(! empty ( $view ) && in_array ( $view, $views )) or $view = 'list';
if (file_exists ( ADMIN_ROOT . 'admin_article_' . $view . '.php' )) {
	require ADMIN_ROOT . 'admin_article_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}
