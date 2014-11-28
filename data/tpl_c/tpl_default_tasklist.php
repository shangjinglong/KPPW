<?php keke_tpl_class::checkrefresh('tpl/default/tasklist', '1399975736' );?><!DOCTYPE HTML>
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


<div class="container">
<div id="main">

  <div class="for-advertise">
  	<?php keke_loaddata_class::ad_show('TASKLIST_HEAD','tasklist','') ?>
  <!-- <img src="" data-src="holder.js/950x50/#f8f8f8:#ddd/text:AD">-->
  </div>
  <!-- for-advertise end -->

  <div class="category-list category-xs">
      <a href="#" class="category-title"><i class="fa fa-list-ul"></i> 分类 <i class="fa fa-angle-down"></i></a>
      <ul class="category-down">
      	<?php if(is_array($arrNewIndusC)) { foreach($arrNewIndusC as $key => $value) { ?>
        <li class="category-item">
          <div class="category-top">
          	<?php if(is_array($value)) { foreach($value as $k1 => $v1) { ?>
<?php if($k1<2) { ?>
            <a href="<?php echo $strUrl;?>&i=<?php echo $v1['indus_id']?>"  <?php if($v1['is_recommend']==1) { ?>class="hot"<?php } ?> tabindex="-1"><?php echo $v1['indus_name']?></a>、
<?php } ?>
<?php } } ?>
            <i class="fa fa-angle-right"></i>
          </div>
          <div class="category-inner">
          	<h3 class="category-inner-title">全部<?php echo $arrIndusP[$key]['indus_name'];?></h3>
  <?php if(is_array($value)) { foreach($value as $k2 => $v2) { ?>
 <a href="<?php echo $strUrl;?>&i=<?php echo $v2['indus_id']?>" tabindex="-1" <?php if($v2['is_recommend']==1) { ?>class="hot"<?php } ?>><?php echo $v2['indus_name']?></a>
 <?php } } ?>
          </div>
        </li>
<?php } } ?>
      </ul>
  </div>
  <!-- category-list end -->

  <div class="tab tab-darken">
    <a href="index.php?do=tasklist" class="selected">所有任务</a>
  </div>
  <!-- tab end -->

<?php if($pd||$i||$ky) { ?>

  <ul class="nav nav-pills second-nav">
    <?php if($pd) { ?><li class="active"><a href="<?php echo $strUrl;?>&pd=0"><?php echo $arrIndusPInfo['indus_name'];?> <i class="fa fa-times"></i></a></li><?php } ?>
    <?php if($i) { ?><li class="active"><a href="<?php echo $strUrl;?>&i=0"><?php echo $arrIndusInfo['indus_name'];?> <i class="fa fa-times"></i></a></li><?php } ?>
    <?php if($ky) { ?><li class="active"><a href="<?php echo $strUrl;?>&ky=0"><?php echo $ky;?> <i class="fa fa-times"></i></a></li><?php } ?>
    <li>共<?php echo intval($intCount); ?>条类似任务</li>
  </ul>


  <?php } ?>

  <!-- second-nav end -->

  <ul class="list-filter">
    <li>
      <label class="col-xs-1">任务模式</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&m=0" <?php if(!$m) { ?> class="selected" <?php } ?>>全部</a>
        <?php if(is_array($arrTaskNavs)) { foreach($arrTaskNavs as $k => $v) { ?>
        	<a href="<?php echo $strUrl;?>&m=<?php echo $v['model_id'];?>" <?php if($v['model_id'] == $m) { ?> class="selected" <?php } ?>><?php echo $v['model_name']?></a>
        <?php } } ?>

      </div>
    </li>
    <li>
      <label class="col-xs-1">赏金状态</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&r=0" <?php if(!$r) { ?> class="selected" <?php } ?>>全部</a>
        <a href="<?php echo $strUrl;?>&r=1" <?php if(1==$r) { ?> class="selected" <?php } ?>>未托管</a>
        <a href="<?php echo $strUrl;?>&r=2" <?php if(2==$r) { ?> class="selected" <?php } ?>>已托管</a>
      </div>
    </li>
    <li>
      <label class="col-xs-1">任务状态</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&s=0" <?php if(!$s) { ?> class="selected" <?php } ?>>全部</a>
        <a href="<?php echo $strUrl;?>&s=1" <?php if(1==$s) { ?> class="selected" <?php } ?>>工作中</a>
        <a href="<?php echo $strUrl;?>&s=2" <?php if(2==$s) { ?> class="selected" <?php } ?>>选稿中</a>
<a href="<?php echo $strUrl;?>&s=3" <?php if(3==$s) { ?> class="selected" <?php } ?>>交付中</a>
        <a href="<?php echo $strUrl;?>&s=4" <?php if(4==$s) { ?> class="selected" <?php } ?>>已结束</a>
      </div>
    </li>
  </ul>
  <!-- filter end -->


  <div class="tool-bar">
    <div class="actions">
    <?php if($o == 1) { ?>
    	<a href="<?php echo $strUrl;?>&o=2" class="tool-bar-item selected">剩余时间  <i class="fa fa-sort-amount-desc"></i></a>
    <?php } elseif($o == 2) { ?>
    	<a href="<?php echo $strUrl;?>&o=1" class="tool-bar-item selected">剩余时间 <i class="fa fa-sort-amount-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=1" class="tool-bar-item ">剩余时间</a>
    <?php } ?>

    <?php if($o == 3) { ?>
    	<a href="<?php echo $strUrl;?>&o=4" class="tool-bar-item selected">金额  <i class="fa fa-sort-numeric-desc"></i></a>
    <?php } elseif($o == 4) { ?>
    	<a href="<?php echo $strUrl;?>&o=3" class="tool-bar-item selected">金额 <i class="fa fa-sort-numeric-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=3" class="tool-bar-item ">金额</a>
    <?php } ?>
    <?php if($o == 5) { ?>
    	<a href="<?php echo $strUrl;?>&o=6" class="tool-bar-item selected">稿件数  <i class="fa fa-sort-numeric-desc"></i></a>
    <?php } elseif($o == 6) { ?>
    	<a href="<?php echo $strUrl;?>&o=5" class="tool-bar-item selected">稿件数 <i class="fa fa-sort-numeric-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=5" class="tool-bar-item ">稿件数</a>
    <?php } ?>
    </div>
<div class="actions">
      <a href="#" class="tool-bar-item" data-toggle="dropdown" ><?php if($arrProvinces[$p]['name']) { ?><?php echo $arrProvinces[$p]['name']?><?php } else { ?>所在地区<?php } ?> <span class="caret"></span></a>
      <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel" >
        <li <?php if(!$p) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>">所有地区</a></li>
<?php if(is_array($arrDisplaypro)) { foreach($arrDisplaypro as $k => $v) { ?>
        <li <?php if($p==$v['id']) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&p=<?php echo $v['id']?>" role="menuitem" tabindex="-1" ><?php echo $v['name']?></a></li>
<?php } } ?>
      </ul>
    </div>
  </div>
  <!-- tool-bar end -->

  <div class="list list-dl">
    <dl class="list-body"  id="ajax_dom">
      <dt class="list-label">
        <ul>
          <li class="w4">名称</li>
          <li class="w2">赏金</li>
          <li class="w1">模式</li>
          <li class="w1">查看/投稿</li>
          <li class="w1">状态</li>
          <li class="w1"></li>
        </ul>
      </dt>
      <?php if($arrTaskLists) { ?>
      <?php if(is_array($arrTaskLists)) { foreach($arrTaskLists as $k => $v) { ?>
      <dd class="list-item">
        <ul class="list-item-body">

          <li class="w4">
            <a href="index.php?do=task&id=<?php echo $v['task_id'];?>" class="list-title"  title="<?php echo kekezu::chinesesubstr($v['task_title'],0,50) ?>">
            <!-- 增值工具显示区域 start --> <!-- <span class="marked marked-speed">加急</span> -->

               <?php if($v['top_time']>time()&&$arrPayitemConfig['2']['small_pic']) { ?> <img src="<?php echo $_K['siteurl'];?>/<?php echo $arrPayitemConfig['2']['small_pic'];?>" alt="<?php echo $_lang['top'];?>" title="<?php echo $_lang['top'];?>"><?php } ?>
               <?php if($v['urgent_time']>time()&&$arrPayitemConfig['3']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $arrPayitemConfig['3']['small_pic'];?>" alt="<?php echo $_lang['hurry_up'];?>" title="<?php echo $_lang['hurry_up'];?>"><?php } ?>
   <?php if($v['pay_item'] == '1') { ?> <img src="<?php echo $_K['siteurl'];?>/<?php echo $arrPayitemConfig['1']['small_pic'];?>" alt="隐藏" title="隐藏"><?php } ?>
           <?php if(stristr($v['pay_item'],'4')&&$arrPayitemConfig['4']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $arrPayitemConfig['4']['small_pic'];?>" alt="<?php echo $_lang['map'];?>" title="<?php echo $_lang['map'];?>"><?php } ?>
   <?php if(stristr($v['pay_item'],'5')&&$arrPayitemConfig['5']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $arrPayitemConfig['5']['small_pic'];?>" alt="屏蔽搜索引擎" title="屏蔽搜索引擎"><?php } ?>
   <?php if($v['is_top'] == '1') { ?><img src="<?php echo $_K['siteurl'];?>/static/img/ico/tj.png" alt="<?php echo $_lang['recommend'];?>" title="<?php echo $_lang['recommend'];?>"><?php } ?>
   <?php if($v['task_union'] == '2') { ?><img src="<?php echo $_K['siteurl'];?>/static/img/ico/lm.png" alt="<?php echo $_lang['union'];?>" title="<?php echo $_lang['union'];?>"><?php } ?>
   <?php if($v['is_delay'] == '1') { ?><img src="<?php echo $_K['siteurl'];?>/static/img/ico/yq.png" alt="<?php echo $_lang['delay'];?>" title="<?php echo $_lang['delay'];?>"><?php } ?>

            <!-- 增值工具显示区域 start -->

              <?php echo kekezu::chinesesubstr($v['task_title'],0,50) ?>
            </a>
          </li>
<!-- 赏金 START  -->
          <li class="w2">
            <span class="money">
            	<?php if($v['task_cash_coverage']) { ?>
            		<sub>￥</sub><?php echo $arrCashCoves[$v['task_cash_coverage']]['cove_desc'];?>
            	<?php } else { ?>
            		<sub>￥</sub><?php echo $v['task_cash'];?>
            	<?php } ?>
              </span>
          </li>
<!-- 赏金 END  -->
          <li class="w1"><?php echo $arrTaskNavs[$v['model_id']]['model_name'];?></li>
          <li class="w1"><?php echo intval($v['view_num']); ?>/<?php echo intval($v['work_num']); ?></li>
          <li class="w1d5">
          <!-- 2天后投稿截止 -->&nbsp;
          <?php $end_time = $arrTaskTimeDesc[$v[task_status]]['time']; ?>
          	<?php echo keke_search_class::task_time_desc($v['task_status'],$v[$end_time]) ?>

          </li>

        <!-- 收藏  START-->
        <li class="wd5" >
<?php if($v['favorite']) { ?>

          	<a href="javascript:cancelFavorite('task',<?php echo $v['task_id'];?>);" id="favorite<?php echo $v['task_id'];?>" title="取消收藏" class="action-collect on"><i class="fa fa-star"></i></a>
  <?php } else { ?>

          	<a href="javascript:addFavorite('task',<?php echo $v['task_id'];?>);" id="favorite<?php echo $v['task_id'];?>" title="收藏" class="action-collect"><i class="fa fa-star"></i></a>

 <?php } ?>
  </li>
        <!-- 收藏 END -->

        </ul>
        <ul class="list-item-body list-visible">
          <li class="w8">
            <div class="list-desc">
            	<?php echo kekezu::chinesesubstr($v['task_desc'],0,300) ?>
            </div>
          </li>
          <li class="w2">
            <a href="index.php?do=pubtask&id=<?php echo $v['model_id'];?>"  class="btn btn-primary btn-sm">发布一个类似任务</a>
          </li>
        </ul>
      </dd>
      <?php } } ?>
      <?php } else { ?>
<dd class="list-item text-center">

<?php if($do=='tasklist') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无任务显示  <a href="index.php?do=pubtask">我来发布</a></p>
</div>
<?php } ?>
<?php if($do=='goodslist') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无商品显示  <a href="index.php?do=pubgoods">我来发布</a></p>
</div>
<?php } ?>
<?php if($do=='case') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无成功案例，去<?php if($t =='1') { ?><a href="index.php?do=tasklist">任务大厅</a><?php } else { ?><a href="index.php?do=goodslist">威客商城</a><?php } ?>看看</p>
</div>
<?php } ?>
<?php if($do=='task') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 还没有人投稿，赶快来投稿吧！</p>
</div>
<?php } ?>

<?php if($do!='tasklist'&&$do!='goodslist'&&$do!='case'&&$do!='task') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无相关记录</p>
</div>
<?php } ?>
        </dd>
      <?php } ?>

    </dl>
  </div>
  <!-- list end-->

  <div class="list-page">
    <div class="page-tips pull-left">
      	显示 <?php echo $arrDatas['st'];?>~<?php echo $arrDatas['en'];?> 项 共  <?php echo intval($intCount); ?> 个任务
    </div>

   	<?php if($strPages) { ?>
      <ul class="pagination pagination-sm pull-right">
       <?php echo $strPages;?>
      </ul>
    <?php } ?>


  </div>
  <!-- list-page end -->

  <div class="for-advertise">
   <?php keke_loaddata_class::ad_show('TASKLIST_BOTTOM','tasklist','') ?>
  </div>
  <!-- for-advertise end -->


</div>
</div>
<!-- container end -->

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
</html>
<?php keke_tpl_class::ob_out();?>