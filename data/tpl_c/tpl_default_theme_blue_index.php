<?php keke_tpl_class::checkrefresh('tpl/default/theme/blue/index', '1399975838' );?><!DOCTYPE HTML>
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6"> <![endif]--><!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7"> <![endif]--><!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
    <html dir="ltr" lang="zh-cn">
    <!--<![endif]-->
    <head>
        <title><?php echo $strPageTitle;?></title>
        <meta charset="<?php echo CHARSET;?>">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo $strPageKeyword;?>">
        <meta name="description" content="<?php echo $strPageDescription;?>">
        <meta name="generator" content="客客出品专业威客<?php echo KEKE_VERSION;?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style” content=black" />
        <meta name="author" content="kekezu" />
        <meta name="copyright" content="<?php echo $basic_config['copyright'];?>" />
  <meta property="qc:admins" content="1220311574763007636" />
<meta property="wb:webmaster" content="6b685cd5f06ba5f1" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="favicon.ico"/>

<!--[if lt IE 9]>
    <script src="static/js/html5.js" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
    <script src="static/js/respond.min.js" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<![endif]-->
<?php if($do=='index') { ?>
<script src="static/js/jquery.min.1.8.3.js" charset="<?php echo CHARSET;?>"></script>

<!-- 幻灯片 -->
<link href="static/js/jqplugins/fotorama/fotorama.css" rel="stylesheet">
<script src="static/js/jqplugins/fotorama/fotorama.js"></script>
<!-- 滚动视图 -->
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.control.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.autoscroll.js"></script>
<link href="tpl/default/theme/<?php echo $_K['theme'];?>/home.css" rel="stylesheet" type="text/css">
<?php } else { ?>
<script src="static/js/jquery.min.js" charset="<?php echo CHARSET;?>"></script>
<?php } ?>
<script src="static/js/bootstrap.min.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/jquery.form.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/jquery.lazyload.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/bootstrap-datetimepicker.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/bootstrap-datetimepicker.zh-CN.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/sco.confirm.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/sco.modal.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/sco.valid.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/holder.min.js" charset="<?php echo CHARSET;?>"></script>
<script src="static/js/model/common/base.js" charset="<?php echo CHARSET;?>"></script>
<?php if($do==user) { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/user.css" rel="stylesheet" type="text/css">
<?php } elseif($do==seller) { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/store.css" rel="stylesheet" type="text/css">
<?php } elseif($do!='index') { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/style.css" rel="stylesheet" type="text/css">
<?php } ?>

        <script type="text/javascript">
            var SITEURL = '<?php echo $_K['siteurl'];?>', SKIN_PATH = '<?php echo SKIN_PATH;?>', LANG = '<?php echo $language;?>', INDEX = '<?php echo $do;?>', CHARSET = 'CHARSET';
        </script>



    </head>
    <body id="<?php echo $do;?>">
        <div class="header-top">
            <div class="container">
                <ul class="left-nav">
                    <?php if($do!='index'||!$do) { ?>
                    <li class="nav-item">
                        <a href="index.php" class="nav-item-link active">回到首页</a>
                    </li>
                    <?php } ?>
                    <?php if($uid) { ?>
                    <li class="nav-item nav-static">
                        欢迎您，
                    </li>
                    <li class="nav-item has-sub">
                        <a href="index.php?do=user" class="nav-item-link"><?php echo $username;?> <span class="caret"></span></a>
                        <ul class="nav-item-sub nav-sub-list">
                            <li>
                                <a href="index.php?do=user&view=message&op=notice"><?php if($messagecount) { ?><span class="badge"><?php echo $messagecount;?></span><?php } ?> 消息提醒</a>
                            </li>
                            <li>
                                <a href="index.php?do=user">用户中心</a>
                            </li>
                            <li>
                                <a href="index.php?do=seller&id=<?php echo $uid;?>">我的店铺</a>
                            </li>
                            <li class="line">
                            </li>
                            <li>
                                <a href="index.php?do=logout">退出</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=logout" class="nav-item-link active">退出</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        欢迎您，<a href="index.php?do=login" class="nav-item-link active">请登录</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=register" class="nav-item-link active">免费注册</a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="right-nav">
                    <li class="nav-item">
                        <a href="index.php?do=pubtask"  class="nav-item-link active">发布任务</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=goodslist" class="nav-item-link active">购买文件</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=single&id=299" class="nav-item-link">关于我们</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=help" class="nav-item-link">帮助中心</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a href="javascript:void(0);" class="nav-item-link">分类导航 <span class="caret"></span></a>
                        <div class="nav-item-sub">
                            <dl>
                                <dt>
                                    任务
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_task_arr)) { foreach($indus_task_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=tasklist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                            <div class="line">
                            </div>
                            <dl>
                                <dt>
                                    商品
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_goods_arr)) { foreach($indus_goods_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=goodslist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:spread(<?php if($do=='article') { ?>true<?php } else { ?>false<?php } ?>);void(0);" class="nav-item-link">推广</a>
                    </li>
                </ul>
            </div>
        </div>

<header class="header">
  <div  class="container">
    <div class="header-website">
      <div class="brand-logo">
        <a href="<?php echo SITEURL;?>"><img src="<?php echo $strWebLogo;?>" alt="KPPW"></a>
      </div><!-- brand-logo end-->
      <!--<div class="header-location">
        全国站
        <div class="localtion-layer">
          <a href="javascript:void(0);" data-toggle="dropdown">[切换城市<span class="caret"></span>]</a>
          <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel">
          	<?php if(is_array($arrDisplaypro)) { foreach($arrDisplaypro as $k => $v) { ?>
            <li><a href="javascript:void(0);" role="menuitem" tabindex="-1"><?php echo $v['name']?></a></li>
<?php } } ?>
          </ul>
        </div>--><!-- localtion-layer end-->
      <!--</div>--><!-- header-location end-->
    </div><!-- header-website end-->

    <div class="header-function">
      <div class="header-search">
        <form action="<?php if($do =='tasklist'||$do =='goodslist'||$do =='sellerlist') { ?><?php echo $strUrl;?><?php } else { ?>index.php?do=tasklist<?php } ?>"  class="form-inline" role="search" id="topHeaderSearch" method="post" >
              <div class="btn-group">
                <button type="button" id="searchType" class="btn btn-default dropdown-toggle " data-toggle="dropdown">
                <?php if($do == 'goodslist') { ?>
                 		商品
                <?php } elseif($do == 'tasklist') { ?>
                		任务
                <?php } elseif($do == 'sellerlist') { ?>
                		服务商
                <?php } else { ?>
                	<?php if($task_open) { ?>
                		任务
<?php } elseif(!$task_open&&$shop_open) { ?>
               			 商品
<?php } ?>
                <?php } ?>
<span class="caret"></span></button>
                <ul class="dropdown-menu" id="searchOption">
                  <?php if($task_open) { ?>
                  <li <?php if($do == 'tasklist'||($do != 'goodslist'&&$do != 'sellerlist')) { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="tasklist" >任务</a></li>
  <?php } ?>
  <?php if($shop_open) { ?>
                  <li <?php if($do == 'goodslist') { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="goodslist">商品</a></li>
  <?php } ?>
                  <li <?php if($do == 'sellerlist') { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="sellerlist">服务商</a></li>
                </ul>
              </div>
            <div class="form-group search-input">
              <input type="text" name="ky" onkeydown="searchKeydown(event);" class="form-control" placeholder="<?php if($ky) { ?><?php echo $ky;?><?php } ?>" x-webkit-speech="" x-webkit-grammar="bUIltin:search" lang="zh-CN">
            </div>
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>

      </div><!-- header-search end-->
      <div class="header-keywords">
        热门搜索：
<?php if(is_array($arrTopIndus)) { foreach($arrTopIndus as $k => $v) { ?>
        <a href="index.php?do=tasklist&i=<?php echo $v['indus_id']?>" class="marked marked-tags"><?php echo $indus_arr[$v['indus_id']]['indus_name'];?></a>
<?php } } ?>
      </div><!-- header-keywords end-->
    </div><!-- header-function end-->
  </div>
</header><!-- header end-->

<nav class="site-nav">
<div class="container">
  <div role="navigation" class="navbar navbar-primary">
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav nav-primary">
      		<?php if(is_array($nav_arr)) { foreach($nav_arr as $k => $v) { ?>
 <li <?php if(isset($strNavActive) && $v['nav_style']==$strNavActive) { ?>class="active"<?php } ?> ><a href="<?php echo $v['nav_url'];?>" <?php if($v['newwindow']) { ?>target="_blank"<?php } ?>><span><?php echo $v['nav_title'];?></span></a></li>
              <li class="line"></li>
<?php } } ?>
      </ul>
      <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#">诚信保障</a></li>
        <li><a href="#">VIP特权</a></li>
        <li><a href="#">增值工具</a></li>
      </ul>-->
    </div><!--/.nav-collapse -->
  </div>
</div>
</nav>

<!-- 幻灯片 -->
<div  class="container">
<div class="home-top">
<div class="banner">
<div class="fotorama" data-autoplay="true" data-stopautoplayontouch="false"  data-loop="true" data-arrows="false" data-click="false" data-swipe="true">
<?php keke_loaddata_class::ad_show('HOME_TOP_SLIDE','index','1') ?>
</div>
<!-- fotorama end -->
</div>
<!-- banner end -->

<div class="site-noitce">
<div class="site-noitce-top">
<?php if($gUid) { ?>
<div class="after">
<ul class="nav nav-pills">
<li class="active mr_10">
<a href="#employer" data-toggle="tab">
<i class="fa fa-flag"></i>
我是雇主
</a>
</li>
<li>
<a href="#witkey" data-toggle="tab">
<i class="fa fa-user"></i>
我是威客
</a>
</li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="employer">
<a href="index.php?do=pubtask"  class="btn btn-info btn-sm btn-block">发布任务</a>
</div>

<div class="tab-pane" id="witkey">
<a href="index.php?do=pubgoods"  class="btn btn-info btn-sm btn-block">发布商品</a>
</div>
</div>
</div>
<?php } else { ?>

<div class="before ">
<div class="row">
<div class="col-xs-6">
<a href="index.php?do=register" class="btn btn-info btn-block">注册帐号</a>
</div>
<div class="col-xs-6">
<a href="index.php?do=login" class="btn btn-primary btn-block">用户登录</a>
</div>
</div>
<div class="site-other-login">
第三方帐号登录：
  <?php if(is_array($api_open)) { foreach($api_open as $k => $v) { ?>
<?php if($weibo_list[$k.'_app_id']) { ?>
<a href="index.php?do=oauthlogin&type=<?php echo $k;?>" title="<?php echo $api_name[$k]['name'];?>"><img src="static/img/ico/<?php echo $k;?>_t.gif" alt="<?php echo $api_name[$k]['name'];?>"></a>
<?php } ?>
<?php } } ?>
</div>
</div>

<!-- site-noitce-top end -->
<?php } ?>
</div>
<div class="site-noitce-bottom">
<ul class="site-noitce-nav">
<li class="active"><a href="#announcement" data-toggle="tab">公告</a></li>
<li><a href="#notification" data-toggle="tab">中标通知</a></li>
<li><a href="#withdrawal" data-toggle="tab">提现</a></li>
</ul>
<div class="tab-content">
<div id="announcement" class="tab-pane fade in active">
<ul class="site-noitce-list">
<?php if(is_array($arrBulletins)) { foreach($arrBulletins as $k => $v) { ?>
<li><i>&middot;</i><a href="index.php?do=article&id=<?php echo $v['art_id']?>" target="_blank"><?php echo $v['art_title'];?></a></li>
<?php } } ?>
</ul>
</div>
<div id="notification" class="tab-pane fade">
<ul class="site-noitce-list">
<?php if(is_array($arrDynamics)) { foreach($arrDynamics as $v) { ?>
<li><i>&middot;</i><?php echo $v['username'];?>成功中标 <a href="<?php echo $v['event']['url']?>" target="_blank"><?php echo $v['event']['content']?></a></li>
<?php } } ?>
</ul>
</div>
<div id="withdrawal" class="tab-pane fade">
<ul class="site-noitce-list">
<?php if(is_array($arrWithdraws)) { foreach($arrWithdraws as $v) { ?>
<li><i>&middot;</i><?php echo $v['username'];?>成功提现<span class="money"><?php echo $v['withdraw_cash'];?><sub>元</sub></span></li>
<?php } } ?>
</ul>
</div>
</div>
</div>
<!-- site-noitce-bottom end -->

</div><!-- site-noitce end -->



</div>
<!-- home-top end -->





<div class="home-task">
  		<div class="home-task-header">
<div class="category-list">
      <a href="#" class="category-title"><i class="fa fa-list-ul"></i> 任务 <i class="fa fa-angle-down"></i></a>
      <ul class="category-down">
      	<?php if(is_array($arrNewIndusCt)) { foreach($arrNewIndusCt as $key => $value) { ?>
        <li class="category-item">
          <div class="category-top">
          	<?php if(is_array($value)) { foreach($value as $k1 => $v1) { ?>
            <?php if($k1<2) { ?>
            <a href="index.php?do=tasklist&i=<?php echo $v1['indus_id']?>"  <?php if($v1['is_recommend']==1) { ?>class="hot"<?php } ?>  tabindex="-1"><?php echo $v1['indus_name']?></a>、
<?php } ?>
        <?php } } ?>
            <i class="fa fa-angle-right"></i>
          </div>
          <div class="category-inner">
            <h3 class="category-inner-title">全部<?php echo $arrIndusPt[$key]['indus_name'];?></h3>
  <?php if(is_array($value)) { foreach($value as $k2 => $v2) { ?>
              <a href="index.php?do=tasklist&i=<?php echo $v2['indus_id']?>" tabindex="-1" <?php if($v2['is_recommend']==1) { ?>class="hot"<?php } ?>><?php echo $v2['indus_name']?></a>
   <?php } } ?>
          </div>
        </li>
<?php } } ?>
      </ul>
  </div>
  <!-- category-list end -->

  			<a class="more-link" href="index.php?do=tasklist" target="_blank">更多<i class="fa fa-angle-double-right"></i></a>
  		</div>
  		<!-- home-task-header end-->
  		<div class="home-task-body">
  			<ul class="home-min-list">
  				<?php if(is_array($arrRecommTaskLists)) { foreach($arrRecommTaskLists as $k => $v) { ?>
  				<li>
  					<a href="index.php?do=task&id=<?php echo $v['task_id']?>" class="home-min-list-title" title="<?php echo $v['task_title']?>" target="_blank"><span class="money"><?php if($v['task_cash_coverage']) { ?><sub>￥</sub><?php echo $arrCashCoverage[$v['task_cash_coverage']]['start_cove'];?>-<sub>￥</sub><?php echo $arrCashCoverage[$v['task_cash_coverage']]['end_cove'];?><?php } else { ?><sub>￥</sub><?php echo $v['task_cash']?><?php } ?></span> <?php echo $v['task_title']?></a>
  					<span class="home-min-list-meta"><?php echo $v['username']?> 发布</span>
  					<span class="home-min-list-meta"><?php echo $v['work_num']?>投标</span>
  				</li>
<?php } } ?>
  			</ul>
  		</div>
  		<!-- home-task-body end -->
  	</div>
  	<!-- home-task end -->

<div class="home-record for-task">
<div class="home-record-header">
<div class="record-ctrl">
<a href="javascript:$('#jcarousel_bid').jcarousel('scroll', '-=1');void(0);" ><i class="fa fa-caret-down"></i></a>
<a href="javascript:$('#jcarousel_bid').jcarousel('scroll', '+=1');void(0);"><i class="fa fa-caret-up"></i></a>
</div>
<h3 class="min-title">中标动态</h3>
</div>
<!-- home-record-header end -->
<div id="jcarousel_bid" class="home-record-body jcarousel-vertical">
<ul class="record-list">
<?php if(is_array($arrDynamicPlays)) { foreach($arrDynamicPlays as $k => $v) { ?>
<li>
<?php $timeDesc = kekezu::time2Units(time()-$v['feed_time'],'hour'); ?>
<p class="record-list-title">
<time datetime="2008-02-14"><?php if($timeDesc) { ?><?php echo $timeDesc;?>前<?php } else { ?>刚刚<?php } ?></time>
<a href="<?php echo $v['feed_username']['url']?>">
<?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?><?php echo $v['username'];?>
</a>
</p>
<p><a href="<?php echo $v['event']['url']?>"><?php echo $v['event']['content']?> </a><span class="money"><?php if($v['event']['cash']) { ?><sub>￥</sub><?php echo $v['event']['cash']?></span><?php } ?></p>
</li>
<?php } } ?>
</ul>
</div>
<!-- home-record-body end -->
</div>
<!-- home-record end -->

<div class="for-advertise">
<?php keke_loaddata_class::ad_show('HOME_CENTAL_ONE','index','') ?>
 <!--<img src="" data-src="holder.js/950x50/#f8f8f8:#ddd/text:AD">-->
</div>
<!-- for-advertise end -->

<div class="home-shop">
  		<div class="home-shop-header">
<div class="category-list">
      <a href="#" class="category-title"><i class="fa fa-list-ul"></i> 商品 <i class="fa fa-angle-down"></i></a>
      <ul class="category-down">
       <?php if(is_array($arrNewIndusCs)) { foreach($arrNewIndusCs as $key => $value) { ?>
        <li class="category-item">
          <div class="category-top">
          	<?php if(is_array($value)) { foreach($value as $k1 => $v1) { ?>
            <?php if($k1<2) { ?>
            <a href="index.php?do=goodslist&i=<?php echo $v1['indus_id']?>"  <?php if($v1['is_recommend']==1) { ?>class="hot"<?php } ?>  tabindex="-1"><?php echo $v1['indus_name']?></a>、
<?php } ?>
        <?php } } ?>
            <i class="fa fa-angle-right"></i>
          </div>
          <div class="category-inner">
            <h3 class="category-inner-title">全部<?php echo $arrIndusPs[$key]['indus_name'];?></h3>
  <?php if(is_array($value)) { foreach($value as $k2 => $v2) { ?>
              <a href="index.php?do=goodslist&i=<?php echo $v2['indus_id']?>" tabindex="-1" <?php if($v2['is_recommend']==1) { ?>class="hot"<?php } ?>><?php echo $v2['indus_name']?></a>
   <?php } } ?>
          </div>
        </li>
<?php } } ?>
      </ul>
  </div>
  <!-- category-list end -->

  			<a class="more-link" href="index.php?do=goodslist" target="_blank">更多<i class="fa fa-angle-double-right"></i></a>
  		</div>
  		<!-- home-shop-header end-->
  		<div class="home-shop-body">
  			<ul class="home-min-list img">
  				<?php if(is_array($arrRecommGoodsLists)) { foreach($arrRecommGoodsLists as $k => $v) { ?>
  				<li>
  					<a href="index.php?do=goods&id=<?php echo $v['service_id']?>" title="<?php echo $v['title']?>" target="_blank">
  					<img src="tpl/default/img/grey.gif" class="lazy"  data-original="<?php echo keke_shop_class::output_pics($v['pic'],210,1) ?>"  alt="<?php echo $v['title']?>">
  					<div class="home-min-list-detail">
<span class="home-min-list-title"><?php echo $v['title']?> </span>
  					<span class="home-min-list-meta"><?php echo $v['username']?> 发布</span>
  					<span class="home-min-list-meta"><span class="money"><sub>￥</sub><?php echo $v['price']?></span></span>
  					</div>
  				</a>
</li>
<?php } } ?>
  			</ul>

  		</div>
  		<!-- home-shop-body end -->
  	</div>
  	<!-- home-shop end -->

<div class="home-record for-shop">
<div class="home-record-header">
<h3 class="min-title">推荐店铺</h3>
</div>
<!-- home-record-header end -->
<div class="home-record-body">
<ul class="record-list img">
<?php if(is_array($arrRecommShops)) { foreach($arrRecommShops as $k => $v) { ?>
<li>
<a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="avatar" title="<?php echo $v['shop_name']?>">
<?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?>
</a>

<div class="avatar-detail">
<p class="record-list-title">
<a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['shop_name']?>">
<?php echo $v['shop_name']?>
</a>
</p>
<p class="record-list-meta">好评率 <span><?php echo $v['good_rate']*100 ?><sub>%</sub></span></p>
<p>
<span class="marked marked-tags"><?php echo $indus_p_arr[$v['indus_pid']]['indus_name'];?></span>
<span class="marked marked-tags"><?php echo $indus_c_arr[$v['indus_id']]['indus_name'];?></span>
</p>
</div>
</li>
<?php } } ?>
</ul>
</div>
<!-- home-record-body end -->
</div>
<!-- home-record end -->

<div class="for-advertise">
        <?php keke_loaddata_class::ad_show('HOME_CENTAL_TWO','index','') ?>
<!---->
</div>
<!-- for-advertise end -->

<div class="home-case">
<div class="home-case-header">
<h2 class="home-case-title"><i class="fa fa-thumbs-up"></i> 成功案例</h2>
<a class="more-link" href="index.php?do=case" target="_blank">更多<i class="fa fa-angle-double-right"></i></a>
</div>
<!-- home-case-header end -->
<div class="home-case-body">
<ul class="home-min-list img">
<?php if(is_array($arrCaseLists)) { foreach($arrCaseLists as $k => $v) { ?>
  				<li>
  					<a <?php if($v['obj_type']=='task') { ?>href="index.php?do=task&id=<?php echo $v['obj_id']?>" <?php } else { ?> href="index.php?do=goods&id=<?php echo $v['obj_id']?>"<?php } ?> title="<?php echo $v['case_title'];?>" target="_blank">
  					<img alt="<?php echo $v['case_title'];?> " class="lazy" src="tpl/default/img/grey.gif"  data-original="<?php if(file_exists($v['case_img'])) { ?><?php echo keke_shop_class::output_pics($v['case_img'],210,1); ?><?php } else { ?>tpl/default/img/shop/shop_default_big.jpg<?php } ?>">
  					<div class="home-min-list-detail">
<span class="home-min-list-title"><?php echo $v['case_title'];?> </span>
  					<span class="home-min-list-meta"><?php if($v['obj_type']=='task') { ?>投稿：<?php echo $v['work_num'];?><?php } else { ?>售出：<?php echo $v['sale_num'];?><?php } ?>个</span>
  					<span class="home-min-list-meta"><span class="money"><sub>￥</sub><?php echo $v['case_price']?></span></span>
  					</div>
  				</a>
</li>
<?php } } ?>
  			</ul>
</div>
<!-- home-case-body end -->
</div>
<!-- home-case end -->


<div class="home-record for-news">
<div class="home-record-header">
<h3 class="min-title">资讯</h3>
</div>
<!-- home-record-header end -->
<div class="home-record-body">
<ul class="record-list">

<li>
<a href="index.php?do=article&id=<?php echo $arrArticleTop['art_id']?>" class="top-img"  title="<?php echo $arrArticleTop['art_title'];?>">
<img class="lazy"  alt="<?php echo $arrArticleTop['art_title'];?>"   src="tpl/default/img/grey.gif"  data-original="<?php echo $arrArticleTop['art_pic'];?>">
<span class="news-title"><?php echo $arrArticleTop['art_title'];?></span>
</a>
</li>
<?php if(is_array($arrArticleLists)) { foreach($arrArticleLists as $k => $v) { ?>
<li>
<p class="record-list-title">
<time><?php echo date('m-d',$v['pub_time']); ?></time>
<a href="index.php?do=article&id=<?php echo $v['art_id']?>" class="news-title" title="<?php echo $v['art_title']?>">
<?php echo $v['art_title']?>
</a>
</p>
</li>
<?php } } ?>
</ul>
</div>
<!-- home-record-body end -->
</div>
<!-- home-record end -->



<div class="home-stats">
<div class="home-stats-inner">
<div class="home-stats-ctrl">
<a href="javascript:$('#jcarousel_stats').jcarousel('scroll', '-=1');void(0);" ><i class="fa fa-caret-down"></i></a>
<a href="javascript:$('#jcarousel_stats').jcarousel('scroll', '+=1');void(0);" ><i class="fa fa-caret-up"></i></a>
</div>
<div id="jcarousel_stats" class="home-stats-list jcarousel-vertical">
<ul>
<li>
所有：
<div class="home-stats-meta">任务总数 <span><?php echo $arrPubAll['0']['count'];?></span> 个</div>
<div class="home-stats-meta">威客人数 <span><?php echo $arrAcceptAll;?></span> 人</div>
<div class="home-stats-meta">成交总额 <span><?php  echo keke_curren_class::output(floatval($arrCashAll['0']['cash']),-1);  ?></span> </div>
</li>
<li>
今日：
<div class="home-stats-meta">发布任务 <span><?php echo $arrPubToday['0']['count'];?></span> 个</div>
<div class="home-stats-meta">成交任务 <span><?php echo $arrAcceptToday;?></span> 个</div>
<div class="home-stats-meta">成交金额 <span><?php  echo keke_curren_class::output(floatval($arrCashToday['0']['cash']),-1);  ?></span> </div>
</li>
</ul>
</div>
</div>
</div>
<!-- home-stats end -->
    <div class="home-other">
    	<p>我对 <?php echo $_K['sitename'];?> 有意见或建议，现在就<a href="javascript:sendSuggest();void(0);">提交</a></p>

</div>
<div class="for-advertise">
<?php keke_loaddata_class::ad_show('HOME_CENTAL_THREE','index','') ?>
<!--<img src="" data-src="holder.js/950x50/#f8f8f8:#ddd/text:AD">-->
</div>
<!-- for-advertise end -->

</div>
<!-- container end -->
<script type="text/javascript">
    $(function(){

        $('#jcarousel_bid').jcarousel({
            wrap: 'circular',
            animation: 500,
            vertical: true
        }).jcarouselAutoscroll({
            scroll: '+=1',
            interval: 5000
        }).mouseenter(function(){
            $(this).jcarouselAutoscroll('stop');
        }).mouseleave(function(){
            $(this).jcarouselAutoscroll('start');
        });

        $('#jcarousel_stats').jcarousel({
            wrap: 'circular',
            vertical: true
        }).jcarouselAutoscroll({
            scroll: '+=1'
        }).mouseenter(function(){
            $(this).jcarouselAutoscroll('stop');
        }).mouseleave(function(){
            $(this).jcarouselAutoscroll('start');
        });
    });

</script>
<div class="footer">
  <div class="container">
      <?php if($do=='index') { ?>
      <ul class="friend-link">
        <li><strong>友情链接</strong></li>
<?php if(is_array($arrFlink)) { foreach($arrFlink as $k => $v) { ?>
        <li><a href="<?php echo $v['link_url'];?>" target="_blank"><?php echo $v['link_name'];?></a></li>
<?php } } ?>
      </ul>
  <?php } ?>
      <!-- 只在首页显示 friend-link end  -->

      <ul class="footer-link">
        <li><a href="index.php?do=single&id=299" target="_blank">关于我们</a></li>
        <li><a href="index.php?do=single&id=300" target="_blank">联系我们</a></li>
        <li><a href="index.php?do=single&id=312" target="_blank">服务条款</a></li>
        <li><a href="index.php?do=single&id=313" target="_blank">隐私政策</a></li>
      </ul>
      <!-- footer-link end -->
      <div class="footer-copyright">
        <p><?php if($basic_config['company']) { ?>公司名称:<?php echo $basic_config['company'];?><?php } ?> <?php if($basic_config['address']) { ?>地址:<?php echo $basic_config['address'];?><?php } ?> <?php if($basic_config['phone']) { ?>电话:<?php echo $basic_config['phone'];?><?php } ?></p>
        <p><?php if($basic_config['copyright']) { ?>Powered by <?php echo P_NAME;?><?php echo KEKE_VERSION;?> <?php echo $basic_config['copyright'];?><?php } ?> <?php if($basic_config['filing']) { ?> <a href="http://icp.valu.cn/" target="_blank"><?php echo $basic_config['filing'];?></a><?php } ?></p>
      </div>
      <!-- footer-copyright end -->
  </div><!-- container end -->
</div><!-- footer end -->


<div id="fix-box">
  <a id="top" href="javascript:void(0);"><i class="fa fa-arrow-circle-up"></i></a>
</div>
<!-- #fix-box end -->

<?php if($uid) { ?>
<?php kekezu::update_oltime($uid,$username) ?>
<?php } ?>
<script type="text/javascript">
var uid='<?php echo $uid;?>';
var actionDo = '<?php echo $do;?>';
var username='<?php echo $username;?>';
var auid = '<?php echo $oauth_user_info['account'];?>';
var atype ='<?php echo $wb_type;?>';
var xyq = "<?php echo $xyq = session_id(); ?>";

$(function(){
    $("img.lazy").lazyload({
        effect: "fadeIn"
    });
});

<?php if($exec_time_traver) { ?>
$(function(){
   $.get('js.php?op=time&r='+Math.random());
})
<?php } ?>
</script>
</body>
</html><?php keke_tpl_class::ob_out();?>