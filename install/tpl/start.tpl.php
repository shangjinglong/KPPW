<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo CHARSET; ?>">
<title><?php echo L('install_agreement'); ?> - <?php echo L('kppw_info'); ?></title>
<link href="./tpl/setup.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wrapper">
    	<div class="container">
        	<div class="header">
            </div>
            <div class="content">
            	<div class="setup">
                	<div class="menu">
                    	<div class="xeyi here"><p><?php echo L('install_agreement') ?></p></div>
                        <div class="hj"><p><?php echo L('evn_etc_test') ?></p></div>
                        <div class="bd"><p><?php echo L('admin_form_input') ?></p></div>
                        <div class="wch"><p><?php echo L('install_complete') ?></p></div>
                    </div>
                </div>
                <div class="cont">
                	<div class="sm">
                    <?php echo $license; ?>
                    </div>
                    </div>
                    <div class="footer">
                    	<div class="foot">
	                    	<div class="fo">
		                    	<div class="selt">
			                    	<select name="language" id="select_lang">
			                    		<option value=''><?php echo L('select_l'); ?></option>
			                    		<option value="cn" <?php if ($lan=='cn') echo 'selected="selected"' ?>>简体中文</option>

			                    	</select>
		                    	</div>
		                    	<a href="?step=checkset" class="buttom"><img src="./tpl/image/button.jpg"></a>
	                    	</div>
                        </div>
                        <div class="foot_o">
                        <p class="banquan"><?php echo L('copyright'); ?></p>
                        </div>
                    </div>
        </div>
	</div>
<script src='../admin/tpl/js/jquery.js' type='text/javascript'></script>
<script type="text/javascript">
	$(function(){
		$("#select_lang").change(function(){
			var val = $(this).val();
			if(val==''){
				return false;
			}
			window.location.href="?step=start&lang="+val;
		})
	})
</script>
</body>
</html>