<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo CHARSET; ?>">
<title><?php echo L('test_env'); ?> - <?php echo L('kppw_info'); ?></title>
<link href="./tpl/setup.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="wrapper">
    	<div class="container">
        	<div class="header">
            </div>
            <div class="content">
            	<div class="setup_two">
                	<div class="menu">
                    	<div class="xy_o"><p><?php echo L('install_agreement') ?></p></div>
                        <div class="huanj"><p><?php echo L('evn_etc_test') ?></p></div>
                        <div class="bd"><p><?php echo L('admin_form_input') ?></p></div>
                        <div class="wch"><p><?php echo L('install_complete') ?></p></div>
                    </div>
                </div>
                <div class="cont">
                	<div class="conts">
                    	<div class="conts_top"><p class="huan_j"><?php echo L('detec_env'); ?>：</p></div>
                    <div class="conts_m">
                    	<table width="790px" border="0" cellspacing="10px" cellpadding="0">
  <tr class="tls"><td class="cha"><?php echo L('test_items'); ?></td><td class="cz"><?php echo L('kppw_require'); ?></td><td class="zj"><?php echo L('kppw_best'); ?></td><td><?php echo L('your_server'); ?></td></tr>
  <tr>
    <td><?php echo L('op_system'); ?></td>
    <td><?php echo L($env_items['os']['r']); ?></td>
    <td><?php echo $env_items['os']['b']; ?></td>
    <td><?php echo PHP_OS; ?></td>
  </tr>
  <tr>
    <td><?php echo L('php_version'); ?></td>
    <td><?php echo $env_items['php']['r']; ?></td>
    <td><?php echo $env_items['php']['b']; ?></td>
    <td><?php echo phpversion(); ?></td>
  </tr>
  <tr>
    <td><?php echo L('attachment_upload'); ?></td>
    <td><?php echo L($env_items['attachmentupload']['r']); ?></td>
    <td><?php echo $env_items['attachmentupload']['b']; ?></td>
    <td><?php echo @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'unknow'; ?></td>
  </tr>
  <tr>
    <td><?php echo L('gd_version'); ?></td>
    <td><?php echo $env_items['gdversion']['r']; ?></td>
    <td><?php echo $env_items['gdversion']['b']; ?></td>
    <td><?php echo $check_gd; ?></td>
  </tr>
  <tr>
    <td><?php echo L('disk_space'); ?></td>
    <td><?php echo $env_items['diskspace']['r']; ?></td>
    <td><?php echo L($env_items['diskspace']['b']); ?></td>
    <td><?php echo floor(disk_free_space(KEKE_ROOT) / (1024*1024)).'M'; ?></td>
  </tr>
</table>
	<div class="conts_t"><p class="huan_j"><?php echo L('directory_test'); ?>：</p></div>
                    <div class="conts_m">
                    	<table width="790px" border="0" cellspacing="10px" cellpadding="0">
  <tr class="tls">
    <td class="ml"><?php echo L('dir_or_file'); ?></td>
    <td class="sx"><?php echo L('r_status'); ?></td>
    <td class="dq"><?php echo L('current_status'); ?></td>
  </tr>
  <?php foreach ($check_dir as $key=>$value){ ?>
  <tr>
    <td><?php echo $key; ?></td>
    <td><img src="./tpl/image/gou.jpg"><span class="kx"><?php echo L('writable'); ?></span></td>
    <td><img src="./tpl/image/<?php echo $value==1 ? 'gou-o.jpg' : 'w.png'; ?>"><span class="kx"><?php if ($value==1) echo L('writable');; 
														  if ($value==0) echo L('n_writable');
														  if ($value==-1) echo L('not_exist');
													?></span></td>
  </tr>
  <?php } ?>
</table>
                    </div>  
                    
                    <div class="conts_ts"><p class="huan_j"><?php echo L('func_test'); ?>：</p></div>
                    <div class="conts_m">
                    	<table width="790px" border="0" cellspacing="10px" cellpadding="0">
  <tr class="tls">
    <td class="ml"><?php echo L('func_name'); ?></td>
    <td class="sx"><?php echo L('check_result'); ?></td>
    <td class="dq"><?php echo L('suggest'); ?></td>
  </tr>
  <?php foreach($check_func as $key=>$value){ ?>
  <tr>
    	 <td><?php echo $key; ?></td>
   		 <?php if($value==1){ ?>
    	<td><img src="./tpl/image/gou.jpg"><span class="kx"><?php echo L('yes'); ?></span></td>
    	<?php }else{ ?>
    	<td><img src="./tpl/image/w.png"><span class="kx"><?php echo L('no'); ?></span></td>
    	<?php } ?>
    	<td><img src="./tpl/image/gou-o.jpg"><span class="kx"><?php echo L('nothing'); ?></span></td>
  </tr>
  <?php } ?>   
</table>
                    </div>  
                </div>
                
                <div>
            </div>
        </div>
	</div>
    		</div>
      		<div class="footer">
                    	<div class="footer">
                    	<div class="foot">
                    	<div class="fo">
                    	<div class="selt">
                    	<a href="javascript:history.go(-1);" class="yu"><?php echo L('return'); ?></a>
                    	</div>
                        <?php if($error_num<=0){ ?>
                        <a href="?step=sql" class="buttoms"><img src="./tpl/image/jx.jpg"></a>
                        <?php } ?>
                        </div>
                        </div>
                        <div class="foot_o">
                        <p class="banquan"><?php echo L('copyright'); ?></p>
                        </div>
                    </div>
                        
                    </div>
       </div>
   </div>
</body>
</html>

