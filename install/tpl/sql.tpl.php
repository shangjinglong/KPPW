<?php
	$url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	$url_this = explode('/install/',$url_this);
	$url_this = $url_this[0];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo CHARSET; ?>">
<title><?php echo L('form_and_so_on_check'); ?> - <?php echo L('kppw_info'); ?></title>
<link href="./tpl/setup.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="wrapper">
    	<div class="container">
    	<form id="form1" name="form1" method="post" action="?step=sql_execute">
        	<div class="header">

            </div>
            <div class="content">
            	<div class="setup_three">
                	<div class="menu">
                    	<div class="xy_o"><p><?php echo L('install_agreement') ?></p></div>
                        <div class="huang"><p><?php echo L('evn_etc_test') ?><p></div>
                        <div class="bd_o"><p><?php echo L('admin_form_input') ?><p></div>
                        <div class="wch"><p><?php echo L('install_complete') ?><p></div>
                    </div>
                </div>
                <div class="cont">
                	<div class="conts">
                    	<div class="conts_shuju"><p class="huan_j"><?php echo L('fillin_db_info'); ?>：</p></div>
                    <div class="conts_m">
                    	<lable>
                        <div class="form">
                        	<ul>
                            	<li><span class="title"><?php echo L('website'); ?>：</span><span class="inform"><input type="text" value="<?php echo $weburl ? $weburl : $url_this; ?>" name="weburl" id="weburl" class="input_in" limit="required:false" msgArea="weburl_msg"/>
                            		<div class="pass"><span class="url" id="weburl_msg"><?php echo L('website_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('db_server'); ?>：</span><span class="inform"><input type="text" value="<?php echo $dbhost; ?>" name="dbhost" id="dbhost" class="input_in" limit="required:false" msgArea="dbhost_msg"/>
                                	<div class="pass"><span class="url" id="dbhost_msg"><?php echo L('db_server_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('db_name'); ?>：</span><span class="inform"><input type="text" value="<?php echo $dbname; ?>" name="dbname" id="dbname" class="input_in" limit="required:true" msgArea="dbname_msg" msg="<font color='red'><?php echo L('db_name_error'); ?></font>"/><div class="pass"><span id="dbname_msg" class="url"><?php echo L('db_name_error'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('db_username'); ?>：</span><span class="inform"><input type="text" value="<?php echo $dbuser; ?>" name="dbuser" id="dbuser" class="input_in" limit="required:true" msgArea="dbuser_msg" msg="<font color='red'><?php echo L('db_username_error'); ?></font>"/><div class="pass"><span id="dbuser_msg" class="url"><?php echo L('db_name_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('db_password'); ?>：</span><span class="inform"><input type="text" value="<?php echo $dbpw; ?>" name="dbpw" id="dbpw" class="input_in"  limit="required:true" msgArea="dbpw_msg" msg="<font color='red'><?php echo L('db_password_error'); ?></font>"/><div class="pass"><span id="dbpw_msg" class="url"><?php echo L('db_password_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('table_pre'); ?>：</span><span class="inform"><input type="text" value="<?php echo $tablepre; ?>" name="tablepre" id="tablepre" class="input_in" limit="required:false" msgArea="tablepre_msg"/><div class="pass"><span id="tablepre_msg" class="url"><?php echo L('table_pre_tips'); ?></span></div></span></li>
                                <?php if (!is_null($error_arr['cover_data'])){ ?><li><span class="title"></span><span class="inform"><input type="checkbox" id="cover_data" name="cover_data[]" onclick="if ($(this).attr('checked')==true){$('#cover_data_msg').html('');}else if($('#dbname').val()==$('#check_dbname').val()){$('#cover_data_msg').html('<?php echo L('cover_db_tips') ?>');}" value="cover"/></span><?php echo L('cover_db'); ?><span class="url warn" id="cover_data_msg"></span><input type="hidden" id="check_dbname" name="check_dbname" value="<?php echo $dbname; ?>" /></li><?php } ?>
                            </ul>
                        </div>
                        </lable>
                    </div>
					<div class="conts_guanli"><p class="huan_j"><?php echo L('fillin_admin_info'); ?>：</p></div>
                    <div class="conts_m">
                    	<lable>
                        <div class="form">
                        	<ul>
                            	<li><span class="title"><?php echo L('admin_account'); ?>：</span><span class="inform"><input type="text" value="admin" name="admin_account" id="admin_account" limit="required:true;len:3-20" msgArea="admin_account_msg" msg="<font color='red'><?php echo L('admin_account_required');?></font>" class="input_in"/><div class="pass"><span id="admin_account_msg" class="url"><?php echo L('admin_account_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('admin_password'); ?>：</span><span class="inform"><input type="password" value="<?php echo $admin_password; ?>" name="admin_password" id="admin_password"  limit="required:true;len:6-20" msgArea="admin_password_msg" msg="<font color='red'><?php echo L('admin_password_tips'); ?></font>"  class="input_in"/><div class="pass"><span id="admin_password_msg" class="ur"><?php echo L('admin_password_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('admin_password_again'); ?>：</span><span class="inform"><input type="password" value="<?php echo $admin_password2; ?>" name="admin_password2" id="admin_password2" limit="required:true;equals:admin_password" msgArea="admin_password2_msg" msg="<font color='red'><?php echo L('admin_password_again_error'); ?></font>" class="input_in"/><div class="pass"><span id="admin_password2_msg"  class="ur"><?php echo L('admin_password_again_tips'); ?></span></div></span></li>
                                <li><span class="title"><?php echo L('admin_email'); ?>：</span><span class="inform"><input type="text" value="<?php if ($admin_email){ echo $admin_email;}else{ echo 'admin@admin.com';} ?>" name="admin_email" id="admin_email" limit="required:true;type:email" msgArea="admin_email_msg" msg="<font color='red'><?php echo L('admin_email_wrong'); ?></font>"  class="input_in"/><span id="admin_email_msg"class="url"><?php echo L('admin_email_required'); ?></span></span></li>
                                <!--<li><span class="title"><?php echo L('initialize_db'); ?>：</span><span class="inform"><input type="radio" name="data_type"<?php if (!$data_type || $data_type=='a'){ ?> checked="checked"<?php } ?> value="a" /><label for="radiobutton"><?php echo L('clear_data'); ?></label><span class="url"></span></span></li>-->
                             <li><span class="title"></span><span class="inform"><input type="radio" name="data_type" checked="checked" value="b" /><label for="radiobutton"><?php echo L('with_data_db'); ?></label><span class="url"></span></span></li>
                                <li><span class="title"></span><span class="inform"><input type="radio" name="data_type"<?php if ($data_type=='c'){ ?> checked="checked"<?php } ?> value="c" /><label for="radiobutton"><?php echo L('no_data_version')?></label><span class="url"></span></span></li>
							 		<span class="url"></span>
                            </ul>
                        </div>
                        </lable>
                    </div>
                </div>
       </div>
	</div>
    				<div class="footer">
                    	<div class="foot">
                    	<div class="for">
                    	<div class="selt">
                    	<input type="image" src="./tpl/image/tj.jpg" height=38px width=113px value="<?php echo L('sbt'); ?>"/>

                    	</div>

                       <!--  <button type="button" class="buttoms"><img src="./tpl/image/jx.jpg"></button>  -->
                       </div>
                        </div>
                        <div class="foot_o">
                        <p class="banquan"><?php echo L('copyright'); ?></p>
                        </div>
                    </div>
    		</form>
    		</div>

       </div>
<script src='../admin/tpl/js/jquery.js' type='text/javascript'></script>
<script src='../admin/tpl/js/form_and_validation.js'  type='text/javascript'></script>
<script src='../admin/tpl/js/keke.js' type='text/javascript'></script>
<script type="text/javascript">
$(function(){
<?php
//把$error_arr拼接成json格式,然后再客户端遍历,并赋给对应的容器
if(!is_null($error_arr)){
	$str = 'var error={';;
	foreach ($error_arr as $key=>$value){
		$str .= '"'.$key.'_msg":';
		$str .= '"'.$value.'",';
	}
	$str = rtrim($str, ',');
	$str .= '};';
	echo $str;
} ?>

	if(typeof(error)!="undefined"){
		for(var v in error){
			var obj = $("#"+v);
			obj.html('<font color="red">'+error[v]+'</font>');
		}
	}
	$(":image").click(function(){
		<?php if ($error_arr['cover_data']){/*客户端提示是否覆盖数据库安装的js*/ ?>
		if($("#cover_data").attr("checked")==false){
			if($("#dbname").val()==$("#check_dbname").val()){
				alert("<?php echo L('alert_info') ?>");
				return false;
			}

		}<?php } ?>
		return checkForm(this.form,false);
	})
	})
</script>
</body>
</html>