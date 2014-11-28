<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(67);
include_once S_ROOT . '/keke_client/sms/d9.php';
$account_info=$kekezu->_sys_config;
$mobile_u=$account_info['mobile_username'];
$mobile_p=$account_info['mobile_password'];
switch ($ac){
	case "ser":
		$type=='uid' and $where=" uid='$u' " or $where=" INSTR(username,'".kekezu::utftogbk($u)."')>0 ";
		$user_info=db_factory::get_one(" select uid,username,phone,mobile from ".TABLEPRE."witkey_space where $where ");
		if(!$user_info){
			kekezu::echojson($_lang['he_came_from_mars'],'3');die();
		}else{
			if(!$user_info['mobile']){
				kekezu::echojson($_lang['no_record_of_his_cellphone'],'2');die();
			}else{
				kekezu::echojson($user_info['mobile'],'1');die();
			}
		}
		break;
	case "send":
		$tar_content=strip_tags($tar_content);
		if($slt_type=='normal'){
				$tel_arr=db_factory::query(" select mobile from ".TABLEPRE."witkey_space where mobile is not null ");
				$tel_group=array();
				foreach ($tel_arr as $v){
					$tel_group[]=$v['mobile'];
				}
				$txt_tel = implode(",",$tel_group);
		}
		$sms = new sms_d9($txt_tel,$tar_content);
		$m = $sms->send();
		if($m=='操作成功'){
			kekezu::admin_system_log($_lang['sms_send_success']);
			kekezu::admin_show_msg($_lang['sms_send_success'],"index.php?do=$do&view=$view",3,'','success');
		}else{
			kekezu::admin_show_msg($_lang['sms_send_fail'],"index.php?do=$do&view=$view",3,'','warning');
		}
		break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'.$do.'_'.$view);