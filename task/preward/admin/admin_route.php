<?php
defined('ADMIN_KEKE') or exit('Access Denied');
keke_lang_class::package_init ( "task_{$model_info ['model_dir']}" );
keke_lang_class::loadlang("task_process");
$views = array('list','config','edit','task','op','cove','process');
in_array($view,$views) or $view = "list";
require "task_$view.php";
