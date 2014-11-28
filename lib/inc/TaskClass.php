<?php
class TaskClass {
	public static function getTaskCashCove(){
		return kekezu::get_table_data ( "*", "witkey_task_cash_cove", "", "", "", "", "cash_rule_id" );
	}
	public static function getEnabledTaskModelList(){
		return db_factory::get_table_data('*','witkey_model',' model_status = 1 and model_type = "task" ',' listorder asc','','','model_id',3600);
	}
}
