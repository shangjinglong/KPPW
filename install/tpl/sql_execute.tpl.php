<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo CHARSET; ?>">
<title><?php echo L('in_detail_process'); ?> - <?php echo L('kppw_info'); ?></title>
<link href="./tpl/setup.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="wrapper">
    	<div class="container">
        	<div class="header">
            	
            </div>
            <div class="content">
            	<div class="setup_three">
                	<div class="menu">
                    	<div class="xy_o"><p><?php echo L('install_agreement') ?></p></div>
                        <div class="huang"><p><?php echo L('evn_etc_test') ?></p></div>
                        <div class="bd_o"><p><?php echo L('admin_form_input') ?></p></div>
                        <div class="wch"><p><?php echo L('install_complete') ?></p></div>
                    </div>
                </div>
                <div class="cont">
                <div class="cirl">
                <div class="circle">
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="25" height="25">
    <param name="movie" value="./tpl/image/circle.swf">
    <param name="quality" value="high">
    <param name="wmode" value="transparent">
    <param name="scale" value="noscale" />
    <param name="expressinstall" value="Scripts/expressInstall.swf">
    <embed src="./tpl/image/circle.swf" quality="high" wmode="transparent" scale="noscale" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="25" height="25"></embed>
  </object>
</div>
                 	<div class="proces"><?php echo L('installing'); ?>...</div>
                 	</div>
                	<div id="notice" class="conts">
            </div>
        </div>
	</div>
    <div class="footer"><!-- 
                    	<div class="foot">
                    	<a href="#" class="yu"></a>
                        <a href="#" class="buttoms"><img src="./tpl/image/fanhui.jpg"></a>
                        </div>  -->
                       
                        <div class="foot_o">
                        <p class="banquan"><?php echo L('copyright'); ?></p>
                        </div>
                    </div>
    		</div>
      		
       </div>
      <script type="text/javascript">
      function showmessage(message) {
          	var notice = '';
          	notice += '<p class="jianli">';
          	notice += message ;
          	notice += '</p>';
			document.getElementById('notice').innerHTML += notice;
			document.getElementById('notice').scrollTop = 100000000;
		}
      </script>
</body>
</html>