<?php
keke_lang_class::load_lang_class ( 'sreward_task_class' );
class sreward_wap_task_class extends sreward_task_class {
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new sreward_wap_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		$this->process_can();
	}
	public function wap_info() {
		$task_info = array_merge($this->_process_can,$this->_task_info);
		unset($task_info[sp_end_time]);
		$task_info['mobile'] = unserialize($task_info[mobile]); 
		$task_info['task_desc'] = htmlspecialchars_decode($task_info['task_desc']);
		$task_info['task_file'] = $this->get_task_file();
		return $task_info;
	} 
	public function wap_work_count(){
		$data = array();
		$c = kekezu::get_table_data('count(work_id) c,work_status','witkey_task_work',' task_id='.$this->_task_id,'',' work_status','','work_status');
		$data['all'] = $this->_task_info['work_num'];
		$data['bid'] = intval($c['4']['c']);
		$data['out'] = intval($c['7']['c']);
		$data['in']  = intval($c['5']['c']);
		kekezu::echojson('',1,$data);die();
	}
	public function get_task_file(){
		global $_K;
		$data = array();
		$f    = $this->_task_info['task_file'];
		if($f){
			$data=db_factory::query(" select file_name as name,CONCAT('".$_K['siteurl']."/',`save_name`) path from ".TABLEPRE."witkey_file where file_id in (".$f.")");
		}
		return $data;
	}
	public function wap_hand($work_desc){
		parent::work_hand($work_desc,'',2,'','json');
	}
	public function wap_reqedit($desc){
		$this->set_task_reqedit($desc,'','json');
	}
	public function wap_favor(){
		kekezu::set_favor('task_id', 'task', $this->_model_code, $this->_task_info[uid], $this->_task_id, $this->_task_title, $this->_task_id,'','json');
	}
	public function wap_report($desc){
		$this->set_report("task", $this->_task_id, $this->_task_info[uid], $this->_task_info[username], 2, $file_name, $desc);
	}
	public function wap_list() {
		global $_K;
		$_D = $_REQUEST;
		$ls = intval($_D['ls']);
		$le = intval($_D['le']); 
		$s = isset($_D['work_status']) ? $_D['work_status'] : "all"; 
		$s!=="all" and  $w = ' and work_status = '.$s;
		$info = db_factory::query(sprintf('select * from %switkey_task_work where task_id=%d %s limit %d,%d',TABLEPRE,$this->_task_id,$w,$ls,$le),1,3600);
		$count = db_factory::get_count('select count(work_id) from '.TABLEPRE.'witkey_task_work where task_id='.$this->_task_id.$w);
		if($info){
			$ids   = implode(',',array_keys($info));
			$f_tmp = kekezu::get_table_data("obj_id,CONCAT('".$_K['siteurl']."/',`save_name`) file",'witkey_file'," obj_id in ('".ids."') and obj_type='work'",'','','','obj_id',3600);
			foreach ($f_tmp as $k=>$v){
				$info[$k]['work_file'] = $v['file'];
			}
			$info = array_values($info);
		} 
		kekezu::echojson(intval($count),1,$info);die();
	}
	public function wap_workinfo($work_id){ 
		global $_K;
		$work_info =  db_factory::get_one("select * from ".TABLEPRE."witkey_task_work where work_id=".intval($work_id));
		if($work_info[work_file]){
			$file_arr = db_factory::query("select file_id,file_name,save_name from ".TABLEPRE."witkey_file where file_id in ($work_info[work_file])");
			foreach ($file_arr as $k=>$v) {
				$v[save_name] =  $_K ['siteurl'].$v[save_name];
			} 
			$work_info[file] =  $file_arr;
		}
	 	kekezu::echojson('',1,$work_info);die();
	}
	public function wap_process($work_id, $ac) {
		$work_id = intval($work_id);
		if ($work_id) {
			switch ($ac) {
				case "work_bid" :
					$to = 4;
					break;
				case "work_in" :
					$to = 5;
					break;
				case "work_out" :
					$to = 7;
					break;
			}
			$this->work_choose ( $work_id, $to, '', 'json' );
		}else{
			kekezu::echojson(array('r'=>'Missiong work id'),0);die();
		}
	}
	public function wap_upload($f='uploadedfile',$work_id=0){
	 	$work_id and $type="work" or $type="task";
		$path = keke_file_class::upload_file($f);
		$file_obj = new Keke_witkey_file_class(); 
		$file_obj->setFile_name($_FILES[$f][name]); 
		$file_obj->setTask_id($this->_task_id);
		$file_obj->setObj_type($type);
		$file_obj->setSave_name($path);
		$file_obj->setOn_time(time());
		$file_obj->setUid($this->_uid);
		$file_obj->setUsername($this->_username);
		$file_obj->create_keke_witkey_file();
		if($path){
			$fid = db_factory::get_count(sprintf(" select file_id from %switkey_file where save_name='%s'",TABLEPRE,$path));
			if($work_id){
				db_factory::execute(sprintf("update %switkey_task_work set work_file='%d' where task_id='%d' and work_id='%d'",TABLEPRE,$fid,$this->_task_id,$work_id));
				db_factory::execute(sprintf(" update %switkey_file set obj_type='work',task_id='%d',obj_id='%d' where file_id='%d'",TABLEPRE,$this->_task_id,$work_id,$fid));
			}else{
				db_factory::execute(sprintf("update %switkey_task set task_file='%d' where task_id='%d'",TABLEPRE,$fid,$this->_task_id));
				db_factory::execute(sprintf(" update %switkey_file set obj_type='task',task_id='%d' where file_id='%d'",TABLEPRE,$this->_task_id,$fid));
			}
			kekezu::echojson('',1);
		}else{
			kekezu::echojson(array('r'=>'Upload failed'),0);
		}
		die();
	}
}