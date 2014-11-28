<?php
class ServiceClass {
	public static function getEnabledServiceModelList(){
		return db_factory::get_table_data('*','witkey_model',' model_status = 1 and model_type = "shop" ',' listorder asc','','','model_id',3600);
	}
}
