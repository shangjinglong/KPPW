<?php
keke_lang_class::load_lang_class ( 'keke_user_login_class' );
class keke_user_login_class {
	protected $_space_obj;
	protected $_login_uid;
	protected $_username;
	protected $_password;
	protected $_account;
	protected $_space_info;
	protected $_auth_record_obj;
	protected $_auth_email_obj;
	protected $_sys_config;
	protected $_accout_type;
	protected $_login_type;
	protected $_login_times;
	function __construct() {
		global $kekezu;
		$this->_space_obj = new Keke_witkey_space_class ();
		$this->_auth_record_obj = new Keke_witkey_auth_record_class ();
		$this->_auth_email_obj = new Keke_witkey_auth_email_class ();
		$this->_sys_config = $kekezu->_sys_config;
	}
	function account_init($account) {
		$this->_account = $account;
		$uu = $this->valid_username();
		$this->_login_uid = $uu['uid'];
		$this->_login_times = intval($_SESSION['login_times']);
	}
	function password_init($password) {
		$this->_password = $password;
	}
	function login_type($login_type) {
		$this->_login_type = intval ( $login_type );
	}
	function get_login_times($uid){
		$rs = db_factory::get_one(sprintf('select `login_times`,`expire`,`on_time` from %switkey_member_black where `uid`=%d',TABLEPRE,$this->_login_uid));
		return $rs;
	}
	function user_login($account, $password, $code = null, $login_type = 0) {
		global $_lang,$_K;
		$this->account_init ( $account );
		$this->password_init ( md5($password ));
		$this->login_type ( $login_type );
		if($this->_login_times){
			$this->check_code ( $code );
		}
		$accout_type = $this->get_login_type ();
		switch ($this->_sys_config ['user_intergration']) {
			case "1" :
				switch ($accout_type) {
					case 'mobile' :
						$user_info = $this->valid_moble_auth ();
						break;
					case 'email' :
						$user_info = $this->valid_email_auth ();
						break;
					case 'username' :
						$user_info = $this->valid_username ();
						break;
				}
				if ($user_info ['password'] !==  md5($password )) {
					$this->add_login_time();
					if($_K['refer']){
						$url = $_K['refer'];
					}else{
						$url = "index.php?do=login";
					}
					if($login_type){
						$url= "index.php";
					}
					$this->show_msg ( '用户名或密码错误，请检查账号是否输入正确', 3,$url,1 );
				} elseif ($user_info ['status'] == 2) {
					$this->show_msg ( $_lang ['account_has_freeze_or_unactivate'], 4,'index.php?do=login' );
				} elseif ($user_info ['status'] == 3) {
					$this->show_msg ($_lang['account_has_not_excited'], 6,'index.php?do=login' );
				}
				break;
			case "2" :
				$accout_type != 'username'&&$this->show_msg ( $_lang ['integrated_model_nust_use_name'], 5 );
				$user_info = $this->user_intergration ( $account, $password );
				break;
		}
		return $user_info;
	}
	function oauth_user_login($account, $password, $code = null, $login_type = 0) {
		global $_lang,$_K;
		$this->account_init ( $account );
		$this->password_init ( md5($password ));
		$this->login_type ( $login_type );
		if($this->_login_times){
			$this->check_code ( $code );
		}
		$accout_type = $this->get_login_type ();
				switch ($accout_type) {
					case 'mobile' :
						$user_info = $this->valid_moble_auth ();
						break;
					case 'email' :
						$user_info = $this->valid_email_auth ();
						break;
					case 'username' :
						$user_info = $this->valid_username ();
						break;
				}
				if ($user_info ['password'] !== $password) {
					$this->add_login_time();
					if($_K['refer']){
						$url = $_K['refer'];
					}else{
						$url = "index.php?do=login";
					}
					if($login_type){
						$url= "index.php";
					}
					$this->show_msg ( '用户名或密码错误，请检查账号是否输入正确', 3,$url,1 );
				} elseif ($user_info ['status'] == 2) {
					$this->show_msg ( '<div class="alert alert-danger"><i class="fa fa-ban"></i> '.$_lang ['account_has_freeze_or_unactivate'].'</div>', 4,'index.php?do=login' );
				} elseif ($user_info ['status'] == 3) {
					$this->show_msg ('<div class="alert alert-danger"><i class="fa fa-ban"></i> '.$_lang ['account_has_not_excited'].'</div>', 6,'index.php?do=login' );
				}
		return $user_info;
	}
	function login_freeze(){
		if($this->check_black()){
			$db_times = $this->get_login_times($this->_login_uid);
			$db_times!=0 and db_factory::execute(sprintf('update %switkey_member_black set `login_times`=`login_times`-1 where `uid`= %d',TABLEPRE,$this->_login_uid));
		}else{
			 $expire =time()+24*3600;
			 db_factory::execute(sprintf('insert into %switkey_member_black (`b_id`,`uid`,`expire`,`on_time`,`login_times`) values(NULL,%d,%d,%d,4)',TABLEPRE,$this->_login_uid,$expire,time()));
		}
		$db_times = $this->get_login_times($this->_login_uid);
		return $db_times['login_times'];
	}
	function check_black(){
		$rs = db_factory::get_one(sprintf('select `uid` from %switkey_member_black where `uid`=%d ',TABLEPRE,$this->_login_uid));
		if($rs['uid']){
			return true;
		}else {
			return false;
		}
	}
	function check_code($login_code) {
		global $_lang;
		if ($login_code) {
			$img = new Secode_class ();
			$login_code = $img->check ( $login_code, 1 );
			if (! $login_code) {
				$this->add_login_time();
				$this->show_msg ( $_lang ['verification_code_input_error'], 7 );
			} else {
				return true;
			}
		} else {
			return true;
		}
	}
	function get_login_type() {
		if (kekezu::is_email ( $this->_account )) {
			$this->_account_type = 'email';
		} elseif (kekezu::is_mobile ( $this->_account )) {
			$this->_account_type = 'mobile';
		} else {
			$this->_account_type = 'username';
		}
		return $this->_account_type;
	}
	function valid_moble_auth() {
		global $_lang;
		$sql = sprintf ( "select * from %switkey_auth_record where auth_code='mobile' and auth_status = 1", TABLEPRE, $this->_account );
		$auth_arr = db_factory::get_one ( $sql );
		if ($auth_arr) {
			$user_info = keke_user_class::get_user_info ( $auth_arr [uid] );
			$user_info [login_type] = 'mobile';
			return $user_info;
		} else {
			$this->add_login_time();
			$this->show_msg ( $_lang ['no_tel_auth_not_login'], 5 );
		}
	}
	function valid_email_auth() {
		global $_lang;
		$this->_auth_email_obj->setWhere ( "email  = '$this->_account' and auth_status=1" );
		$auth_info = $this->_auth_email_obj->query_keke_witkey_auth_email ();
		$auth_info = $auth_info [0];
		if ($auth_info) {
			$user_info = keke_user_class::get_user_info ( $auth_info [uid] );
			$user_info [login_type] = 'email';
			return $user_info;
		} else {
			$this->add_login_time();
			$this->show_msg ( $_lang ['no_email_auth_not_login'], 5 );
		}
	}
	function valid_username() {
		global $_lang;
		$user_info = kekezu::get_user_info ( $this->_account, 1 );
		if ($user_info) {
			$user_info ['login_type'] = 'username';
			return $user_info;
		} else {
			$this->add_login_time();
			$this->show_msg ( ' 用户名或密码错误，请检查账号是否输入正确', 3 ,'index.php?do=login',1);
		}
	}
	function add_login_time($t=1){
		$this->_login_times = $_SESSION['login_times']=intval($t);
	}
	function user_intergration($username, $pwd) {
		global $_lang;
		if($this->_sys_config ['user_intergration']==2){
			require_once S_ROOT . '/uc_client/client.php';
			$uc_info = uc_user_login ( $username, $pwd );
			if ($uc_info ['0'] > 0) {
				$u = array ('uid' => $uc_info ['0'], 'username' => $uc_info ['1'], 'email' => $uc_info ['3'] );
			} else {
				$u = $uc_info ['0'];
			}
		}
		if ($u == - 2) {
			$this->show_msg ( $_lang ['you_input_password_not_right'], 3 );
		} elseif ($u == - 1) {
			$this->show_msg ( $_lang ['you_input_username_not_exist'], 4 );
		} else {
			$exists = db_factory::get_count ( sprintf ( " select uid from %switkey_member where uid='%d' ", TABLEPRE, $u ['uid'] ) );
			if (! $exists) { 
				$reg_obj = new keke_register_class ();
				$reg_obj->_reg_pwd = md5($pwd);
				$reg_obj->save_userinfo ( $u ['username'], $u ['email'], $u ['uid'] );
			}
		}
		return $u;
	}
	public function save_user_info($user_info,$account, $ckb_cookie = 1, $login_type = 0,$auto_login=0, $oauth_login = 1) {
		global $kekezu, $_K,$handlekey;
		global $_lang;
		$_SESSION ['uid'] = $user_info ['uid'];
		$_SESSION ['username'] = $user_info ['username'];
		$_SESSION['last_login_time'] = $user_info['last_login_time'];
		$this->add_login_time(0);
		$login_type = $this->_login_type;
		if ($auto_login == '1'){
			$c = array();
			$c[0]= base64_encode($user_info ['uid']);
			$c[1]= base64_encode($account);
			$c[2] =base64_encode($user_info ['uid'].'|'.$user_info['password'].'|'.$account);
			setcookie('keke_auto_login', serialize($c), time()+3600*24*30);
		}
		if ($_K ['refer']) {
			$r = $_K ['refer'];
		} else {
			$r = 'index.php';
		}
		if($login_type){
			$r = 'index.php';
		}
		if($oauth_login){
			$r = 'index.php';
		}
		if ($this->_sys_config ['user_intergration'] ==2) { 
			$synhtml = keke_user_class::user_synlogin ( $user_info ['uid'], $this->_password );
		}
		$synhtml = isset($synhtml)?$synhtml:"";
		$user_obj = new Keke_witkey_space_class ();
		$user_obj->setLast_login_time ( time () );
		$user_obj->setWhere ( "uid = '{$user_info['uid']}'" );
		$user_obj->edit_keke_witkey_space ();
		$black_obj = new Keke_witkey_member_black_class();
		$black_obj->setWhere("uid = '{$user_info['uid']}'");
		$black_obj->del_keke_witkey_member_black();
		db_factory::execute ( sprintf ( "update %switkey_member_oltime set last_op_time=%d where uid = %d", TABLEPRE, time (), $user_info ['uid'] ) );
		if (isset($_COOKIE ['prom'])&&$_COOKIE ['prom']) {
			$prom_obj =  keke_prom_class::get_instance ();
			$url_data = $prom_obj->extract_prom_cookie ();
			$url_data ['p'] == 'reg' or $prom_obj->create_prom_relation ( $user_info ['uid'], $user_info ['username'], $url_data, '2' );
		}
		if ($login_type == 1) {
			if (strtolower ( $_SERVER ['REQUEST_METHOD'] ) == 'post') {
				$this->show_msg( $_lang ['login_success']."$synhtml",1,$r);
			} elseif (strtolower ( $_SERVER ['REQUEST_METHOD'] ) == 'get') {
				echo "$synhtml<script>window.location.href='$r';</script>";
				die ();
			}
		} else if ($login_type == 3||$login_type==4) {
			$info = $user_info;
			$return_info ['uid'] = $info ['uid'];
			$return_info ['username'] = $info ['username'];
			$return_info ['balance'] = intval ( $info ['balance'] );
			$return_info ['credit'] = intval ( $info ['credit'] );
			$return_info ['pic'] = keke_user_class::get_user_pic ( $user_info ['uid'] );
			$return_info ['syn'] = $synhtml;
			($user_info ['uid'] == ADMIN_UID || $user_info ['group_id'] > 0) and $return_info ['is_admin'] = 1;
			$return_info ['g_pic'] = unserialize($info['buyer_level']);
			$return_info ['s_pic'] = unserialize($info['seller_level']);
			$this->show_msg($_lang ['login_success'],1,$return_info );
			die ();
		}elseif($login_type == 2){
			return true;
		} else {
			$this->show_msg( $_lang ['login_success'] . "$synhtml", 1,$r);
		}
	}
	function show_msg($content, $status,$url='',$t=3) {
		global $_lang,$_K;
		switch ($this->_login_type) {
			case "3" :
				$data	=	$url;
				kekezu::echojson ( $content, $status,$data);
				die ();
				break;
			case "4":
				$data	=	$url;
				if(ISWAP==1){
					preg_match_all('/src=\'(.*)\'/iU',$data['pic'],$m);
					preg_match_all('/src=\"(.*)\?/i',$data['g_pic']['pic'],$m1);
					preg_match_all('/src=\"(.*)\?/i',$data['s_pic']['pic'],$m2);
					$data = array('uid'=>$data['uid'],
								  'username'=>$data['username'],
								  'pic'=>$m[1][0],
								  'g_pic'=>$_K['siteurl'].'/'.$m1[1][0],
								  's_pic'=>$_K['siteurl'].'/'.$m2[1][0]);
					$status!=1&&$content = array('r'=>$content);
				}
				kekezu::echojson ( $content, $status,$data);
				break;
			case "0" :
			case '2':
			case "1" :
				if($_K['inajax']){
					$status==1 and $type = 'ok' or $type='fail';
				}else{
					$status==1 and $type = 'ok' or $type='fail';
				}
				kekezu::show_msg ( $content,$url, 2, '',$type);
				break;
		}
	}
}