<?php
define('D_ROOT', 'sqlite');
abstract class DataBase {
	static protected $dbhost = DBHOST;
	static protected $dbname = DBNAME;
	static protected $dbuser = DBUSER;
	static protected $dbpass = DBPASS;
	static protected $dbcharset = DBCHARSET;
	static protected $datapath = D_ROOT;
	static protected $tablepre = TABLEPRE;
	abstract   function  dbConnection();
	abstract   function  query($sql);
	abstract   function  insert_id($sql);
	abstract   function  getCount($sql);
}
?>