<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-29 13:51:34
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$detail_list = db_factory::query(sprintf("select a.*,b.title,b.uid,b.username from %switkey_order_detail as a left join %switkey_service as b on a.obj_id=b.service_id where a.obj_type='service' and a.order_id='%d'",TABLEPRE,TABLEPRE,$order_id));
		
require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/admin/tpl/goods_' . $view );