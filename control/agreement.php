<?php
$taskId  = intval($taskId);
$agreeId = intval($agreeId);
$arrAgreeInfo = db_factory::get_one(sprintf("select model_id,buyer_uid,seller_uid from %switkey_agreement where agree_id='%d'",TABLEPRE,$agreeId));
$arrAgreeInfo or kekezu::show_msg ( '非法进入，不存在此交付协议', 'index.php', 3, NULL, 'warning' );
!$uid and header('Location:index.php?do=login');
$arrAgreeInfo['buyer_uid']!=$gUid&&$arrAgreeInfo['seller_uid']!=$gUid and kekezu::show_msg ( '警告,您不是雇佣双方,无法进入此页面', 'index.php', 3, NULL, 'warning' );
$arrModelInfo = $kekezu->_model_list[$arrAgreeInfo['model_id']];
$arrModelInfo or kekezu::show_msg ( '当前任务模型不存在或已关闭,无法进入交付页面，请联系管理员解决', 'index.php', 3, NULL, 'warning' );
keke_lang_class::package_init("task_".$arrModelInfo['model_dir']);
keke_lang_class::loadlang("task_agreement");
require "task/".$arrModelInfo['model_dir']."/control/agreement.php";
