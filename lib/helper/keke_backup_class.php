<?php
class keke_backup_class {
	static function run_backup() {
		global $_lang;
		$output = array();
		$db_factory = new db_factory ();
		$tables = $db_factory->query ( " show table status from `".DBNAME."`");
		$temp_arr = array ();
		foreach ( $tables as $v ) {
			if (substr ( $v [Name], 0, strlen ( TABLEPRE ) ) == TABLEPRE) {
				$temp_arr [] = $v;
			}
		}
		$tables = $temp_arr;
		$sqlmsg = '';
		foreach ( $tables as $tablesarr ) {
			$table_name = $tablesarr ['Name'];
			$table_type = $tablesarr ['Type'];
			$result = $db_factory->query ( "show fields from " . $table_name );
			$sqlmsg .= "#" . $_lang['table_name'] . "：<" . $table_name . ">\n";
			$sqlmsg .= "DROP TABLE IF EXISTS `" . $table_name . "`;\n####################\n";
			$sqlmsg .= "CREATE TABLE `" . $table_name . "`(\n";
			foreach ( $result as $fileds ) {
				$field_name = $fileds ['Field']; 
				$field_type = $fileds ['Type']; 
				$field_len = $fileds ['Null']; 
				if ($fileds ['Extra'] != "") {
					$fileds ['Extra'] = " " . $fileds ['Extra'];
				}
				if ($field_len != "") {
					$field_len = " " . $field_len;
				}
				if (isset ( $fileds ['Default'] )) {
					$field_flag = "default '" . $fileds ['Default'] . "'" . $fileds ['Extra']; 
				} else {
					$field_flag = "default NULL" . $fileds ['Extra']; 
				}
				if ($fileds ['Key'] == 'PRI') {
					$field_flag = " NOT NULL " . $fileds ['Extra']; 
				}
				$fields [] = "`" . $field_name . "`";
				$sqlmsg .= " `" . $field_name . "` " . $field_type . " " . $field_flag . ",\n";
			}
			$key_result = $db_factory->query ( "show keys from " . $table_name );
			foreach ( $key_result as $keyr ) {
				if ($keyr ["Key_name"] == "PRIMARY"){
					$sqlmsg .= " PRIMARY KEY (`" . $keyr ["Column_name"] . "`),\n";
				}elseif (($keyr ["Key_name"] != "PRIMARY") && ($keyr ["Non_unique"] == 0)){
					$sqlmsg .= " UNIQUE KEY " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}elseif ($keyr ["Comment"] == "FULLTEXT"){
					$sqlmsg .= " FULLTEXT " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}else{
					$sqlmsg .= " KEY " . $keyr ["Key_name"] . " (`" . $keyr ["Column_name"] . "`),\n";
				}
			}
			$r = $db_factory->query ( "show create table $table_name" );
			$eng = $r [0] ['Create Table'];
			preg_match ( '/engine=([^ ]+)/i', $eng, $arr );
			$sqlmsg = preg_replace ( "/\,$/", "", $sqlmsg );
			$sqlmsg .= " ) ENGINE=$arr[1] AUTO_INCREMENT=0 DEFAULT CHARSET=" . DBCHARSET . " ;\n####################\n";
			$field = join ( ",", $fields );
			$sql = $db_factory->query ( "select " . $field . " from " . $table_name );
			$field_a = explode ( ',', $field );
			foreach ( $sql as $r ) {
				$sqlmsg .= "insert into " . $table_name . " (" . $field . ") values(";
				$iii = 0;
				foreach ( $r as $k => $v ) {
					if ($iii ++) {
						$sqlmsg .= ",";
					}
					if ($v) {
						$sqlmsg .= "'" . kekezu::k_addslashes ( $v ) . "'";
					} else {
						$sqlmsg .= "'0'";
					}
				}
				$sqlmsg .= ");\n#####";
			}
			unset ( $fields ); 
			$output[] = str_replace(TABLEPRE.'witkey_', '**********************',$table_name);
		}
		$sqlmsg .= "\n "; 
		$path = S_ROOT . './data/backup/backup_' . time () . '_' . DBNAME . ".sql";
		keke_tpl_class::swritefile ( $path, $sqlmsg );
		kekezu::admin_system_log ( $_lang['backup_database'] . '' . "backup_" . time () . '_' . DBNAME . ".sql" );
		file_exists ( $path ) and kekezu::echojson('',1,$output) or kekezu::echojson('',0,$output);
		die();
	}
}