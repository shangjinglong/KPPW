<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=user&view=account&op=banklist';
$objMemBankT=keke_table_class::get_instance("witkey_member_bank");
$arrBankList=keke_glob_class::get_bank();
if($action == 'removeBind'){
	if($intBankId){
		if($intBankAid){
			db_factory::execute(sprintf(" delete from %switkey_auth_bank where bank_a_id='%d'",TABLEPRE,$intBankAid));
			db_factory::execute(sprintf(" delete from %switkey_auth_record where ext_data='%d'",TABLEPRE,$intBankAid));
		}
		$res=db_factory::execute(sprintf(" delete from %switkey_member_bank where bank_id='%d'",TABLEPRE,$intBankId));
		$res and kekezu::show_msg('解除关联成功',$strUrl,null,null,'ok') or kekezu::show_msg('解除关联失败',$strUrl,null,null,'error');
	}else{
		kekezu::show_msg('请选择关联账户',null,null,null,null);
	}
}else{
	$arrBankLists = db_factory::query(sprintf(" select * from %switkey_member_bank where uid = '%d' and bind_status='1'",TABLEPRE,$gUid));
	$arrAuthLists    = kekezu::get_table_data('bank_a_id,bank_id',"witkey_auth_bank"," uid='.$gUid.' and auth_status!=2",'','','','bank_id',null);
}
