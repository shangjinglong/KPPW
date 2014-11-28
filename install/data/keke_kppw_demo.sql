/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.99
Source Server Version : 50135
Source Host           : 192.168.1.99:3306
Source Database       : keke_kppw25_demo

Target Server Type    : MYSQL
Target Server Version : 50135
File Encoding         : 65001

Date: 2014-05-13 11:57:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `keke_witkey_ad`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad`;
CREATE TABLE `keke_witkey_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `target_id` int(11) DEFAULT NULL,
  `ad_type` char(20) DEFAULT NULL,
  `ad_position` char(20) DEFAULT NULL,
  `ad_name` varchar(300) DEFAULT NULL,
  `ad_file` varchar(300) DEFAULT NULL,
  `ad_content` text,
  `ad_url` varchar(100) DEFAULT NULL,
  `start_time` int(11) DEFAULT '0',
  `end_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `tpl_type` char(20) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  KEY `index_1` (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_ad
-- ----------------------------
INSERT INTO keke_witkey_ad VALUES ('292', '21', 'image', null, '任务易', 'data/uploads/sys/ad/1675652870536c795d1dfd6.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', 'default', '1', '1399947260');
INSERT INTO keke_witkey_ad VALUES ('236', '3', 'image', 'global', 'KPPW2.5震撼上市', 'data/uploads/sys/ad/776678491536ca983218f7.jpg', '0', 'http://www.renwuyi.com', '0', '0', '0', '0', '1', '950', '400', 'default', '1', '1399630211');
INSERT INTO keke_witkey_ad VALUES ('291', '20', 'image', null, '任务易', 'data/uploads/sys/ad/1387277226536c7937e788b.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '1190', 'default', '1', '1399887536');
INSERT INTO keke_witkey_ad VALUES ('290', '19', 'image', null, '任务易', 'data/uploads/sys/ad/2036152251536c7919e11a7.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399890218');
INSERT INTO keke_witkey_ad VALUES ('288', '17', 'image', null, '任务易', 'data/uploads/sys/ad/978353020536c777655d2d.jpg', '<img src=\"data/uploads/sys/ad/adv.jpg\" />', 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', 'default', '1', '1399947256');
INSERT INTO keke_witkey_ad VALUES ('289', '18', 'image', null, '任务易', 'data/uploads/sys/ad/1437714323536c779eeb036.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399947256');
INSERT INTO keke_witkey_ad VALUES ('287', '16', 'image', null, '任务易', 'data/uploads/sys/ad/451098971536c775072555.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399944997');
INSERT INTO keke_witkey_ad VALUES ('286', '15', 'image', null, '任务易', '', null, 'http://www.renwuyi.com', '0', '0', null, null, null, null, null, 'default', '1', '1395625510');
INSERT INTO keke_witkey_ad VALUES ('240', '3', 'image', 'global', 'KPPW2.5震撼上市', 'data/uploads/sys/ad/1611812343536d84aa59fb7.jpg', '0', 'http://www.renwuyi.com', '0', '0', '0', '0', '5', '1920', '620', '0', '1', '1399686314');
INSERT INTO keke_witkey_ad VALUES ('285', '14', 'image', null, '任务易', 'data/uploads/sys/ad/174758400536c774524fd1.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399944997');
INSERT INTO keke_witkey_ad VALUES ('284', '13', 'image', null, '任务易', 'data/uploads/sys/ad/550834858536c7736c9e68.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399944993');
INSERT INTO keke_witkey_ad VALUES ('283', '12', 'image', null, '任务易', '', null, 'http://www.renwuyi.com', '0', '0', null, null, null, null, null, 'default', '1', '1395625505');
INSERT INTO keke_witkey_ad VALUES ('282', '11', 'image', null, '任务易', 'data/uploads/sys/ad/1696327901536c77281cf1a.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', 'default', '1', '1399944993');
INSERT INTO keke_witkey_ad VALUES ('281', '10', 'image', null, '任务易', 'data/uploads/sys/ad/285894720536c7706e1db0.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399950515');
INSERT INTO keke_witkey_ad VALUES ('280', '9', 'code', null, '任务易', '', '<java src=\"text/ja<x>vasc<x>ript\">000000</java>', 'http://www.renwuyi.com', '0', '0', null, null, '0', '', '', 'default', '1', '1395309405');
INSERT INTO keke_witkey_ad VALUES ('279', '8', 'image', null, '任务易', 'data/uploads/sys/ad/1923097710536c76e767210.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', null, null, 'default', '1', '1399950515');
INSERT INTO keke_witkey_ad VALUES ('261', '3', 'image', 'global', 'KPPW2.5震撼上市', 'data/uploads/sys/ad/89235556536ca99c8bed7.jpg', '0', 'http://www.renwuyi.com', '0', '0', '0', '0', '2', '950', '400', '0', '1', '1399630236');
INSERT INTO keke_witkey_ad VALUES ('277', '6', 'image', null, '任务易', 'data/uploads/sys/ad/2039848477536c76cadef81.jpg', '<img src=\"data/uploads/sys/ad/adv.jpg\" />', 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', 'default', '1', '1399947743');
INSERT INTO keke_witkey_ad VALUES ('276', '5', 'image', null, '任务易', 'data/uploads/sys/ad/260311800536c76b00f82b.jpg', '<sc<x>ript type=\"text/ja<x>vasc<x>ript\"> \r\nwindow.on<x>load=function(){ \r\nvar obj=document.getElementById(\'menu\').getElementsByTagName(\'li\');/\r\n详细出处参考：http://www.jb51.net/article/38615.htm', 'http://www.renwuyi.com', '0', '0', null, null, '0', '980', '60', 'default', '1', '1399947743');
INSERT INTO keke_witkey_ad VALUES ('275', '4', 'image', null, '任务易', 'data/uploads/sys/ad/1641708713536c769741298.jpg', '<img src=\"data/uploads/sys/ad/adv.jpg\" />', 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', 'default', '1', '1399947743');
INSERT INTO keke_witkey_ad VALUES ('293', '22', 'image', null, '任务易', 'data/uploads/sys/ad/1940116789536c796f5666d.jpg', '<B>000000000000000000000000000000000000000000000000000000000000</B>', 'http://www.renwuyi.com', '0', '0', null, null, '0', '', '', 'default', '1', '1399947260');
INSERT INTO keke_witkey_ad VALUES ('296', '1523', 'image', null, '任务易', 'data/uploads/sys/ad/1320794295536c798ac5ab1.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', null, '1', '1399890218');
INSERT INTO keke_witkey_ad VALUES ('297', '1522', 'image', null, '任务易', 'data/uploads/sys/ad/1042562539536c797f72bce.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '950', '50', null, '1', '1399887536');
INSERT INTO keke_witkey_ad VALUES ('298', '1524', 'image', null, '任务易', 'data/uploads/sys/ad/1659884648536c7ac240778.jpg', null, 'http://www.renwuyi.com', '0', '0', null, null, '0', '485', '245', null, '1', '1399945021');

-- ----------------------------
-- Table structure for `keke_witkey_ad_target`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad_target`;
CREATE TABLE `keke_witkey_ad_target` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `code` char(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `targets` varchar(255) DEFAULT '',
  `position` varchar(150) DEFAULT NULL,
  `ad_size` varchar(255) DEFAULT NULL,
  `ad_num` int(11) DEFAULT NULL,
  `sample_pic` varchar(100) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`target_id`),
  KEY `target_id` (`target_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1525 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_ad_target
-- ----------------------------
INSERT INTO keke_witkey_ad_target VALUES ('4', '首页_中部一栏广告', 'HOME_CENTAL_ONE', '首页_中部一栏广告', '', null, null, '1', 'data/adpic/home_cental_one.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('5', '首页_中部二栏广告', 'HOME_CENTAL_TWO', '首页_中部二栏广告', '', null, null, '1', 'data/adpic/home_cental_two.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('6', '首页_中部三栏广告', 'HOME_CENTAL_THREE', '首页_中部三栏广告', '', null, null, '1', 'data/adpic/home_cental_three.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('8', '任务大厅_头部广告', 'TASKLIST_HEAD', '任务大厅_头部广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('10', '任务大厅_底部广告', 'TASKLIST_BOTTOM', '任务大厅_底部广告', '', null, null, '1', 'data/adpic/tasklist_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('11', '威客商城_头部广告', 'SHOPLIST_HEAD', '威客商城_头部广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('13', '威客商城_底部广告', 'SHOPLIST_BOTTOM', '威客商城_底部广告', '', null, null, '1', 'data/adpic/tasklist_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('14', '服务商_头部广告', 'SELLERLIST_HEAD', '服务商_头部广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('16', '服务商_底部广告', 'SELLERLIST_BOTTOM', '服务商_底部广告', '', null, null, '1', 'data/adpic/tasklist_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('17', '资讯中心_头部广告', 'NEWSLIST_HEAD', '资讯中心_头部广告', '', null, null, '1', 'data/adpic/newslist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('18', '资讯中心_底部广告', 'NEWSLIST_BOTTOM', '资讯中心_底部广告', '', null, null, '1', 'data/adpic/newslist_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('19', '任务详情_底部广告', 'TASKINFO_BOTTOM', '任务详情_底部广告', '', null, null, '1', 'data/adpic/taskinfo_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('20', '商品详情_底部广告', 'GOODINFO_BOTTOM', '商品详情_底部广告', '', null, null, '1', 'data/adpic/taskinfo_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('21', '资讯详情_头部广告', 'NEWSINFO_HEAD', '资讯详情_头部广告', '', null, null, '1', 'data/adpic/newslist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('22', '资讯详情_底部广告', 'NEWSINFO_BOTTOM', '资讯详情_底部广告', '', null, null, '1', 'data/adpic/newslist_bottom.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('3', '首页_顶部幻灯广告', 'HOME_TOP_SLIDE', '首页_顶部幻灯广告', '', null, null, '6', 'data/adpic/home_top_slide.jpg', '1', '{loop $datalist $k $v}<div data-img=\"{$v[ad_file]}\" data-caption=\"{$v[ad_name]}\"><a href=\"{$v[ad_url]}\" data-video=\"false\" target=\"_blank\" title=\"{$v[ad_name]}\"></a></div>{/loop}');
INSERT INTO keke_witkey_ad_target VALUES ('1522', '商品详情_头部广告', 'GOODINFO_HEAD', '商品详情_头部广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('1523', '任务详情_头部广告', 'TASKINFO_HEAD', '任务详情_头部广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);
INSERT INTO keke_witkey_ad_target VALUES ('1524', '登录注册_左侧广告', 'LOGIN_LEFT', '登录注册_左侧广告', '', null, null, '1', 'data/adpic/tasklist_head.jpg', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_agreement`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_agreement`;
CREATE TABLE `keke_witkey_agreement` (
  `agree_id` int(11) NOT NULL AUTO_INCREMENT,
  `agree_status` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `buyer_uid` int(11) DEFAULT NULL,
  `buyer_status` int(11) DEFAULT NULL,
  `buyer_accepttime` int(11) DEFAULT NULL,
  `buyer_confirmtime` int(11) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_status` int(11) DEFAULT NULL,
  `seller_accepttime` int(11) DEFAULT NULL,
  `seller_confirmtime` int(11) DEFAULT NULL,
  `agree_title` varchar(100) DEFAULT NULL,
  `file_ids` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`agree_id`),
  KEY `agree_id` (`agree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=386 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_agreement
-- ----------------------------
INSERT INTO keke_witkey_agreement VALUES ('363', '5', '1', '3322', '2047', '1', '1', null, null, '5495', '1', null, null, '嵌入式软硬件开发~改装POS机-2047', null, '1398743760');
INSERT INTO keke_witkey_agreement VALUES ('364', '3', '1', '3338', '2055', '5500', '4', '1398826310', '1398826365', '1', '4', '1398826297', '1398826343', '阿里巴巴全国专业批发市场大调研-2055', '', '1398826276');
INSERT INTO keke_witkey_agreement VALUES ('365', '3', '1', '3327', '2065', '5495', '4', '1398853999', '1398854030', '5508', '4', '1398853976', '1398854013', '小说原创网站建设-2065', '5715', '1398853970');
INSERT INTO keke_witkey_agreement VALUES ('366', '5', '1', '3347', null, '5495', '1', null, null, null, '1', null, null, '网站论坛推广营销方案-', null, '1399167706');
INSERT INTO keke_witkey_agreement VALUES ('367', '3', '1', '3381', '2095', '1', '4', '1399344643', '1399344997', '5501', '4', '1399344652', '1399344876', '网站Logo设计-2095', '5724', '1399344607');
INSERT INTO keke_witkey_agreement VALUES ('368', '5', '1', '3382', '2097', '1', '1', null, null, '5504', '1', null, null, '突然有人同意让他-2097', null, '1399345138');
INSERT INTO keke_witkey_agreement VALUES ('369', '3', '1', '3386', '2101', '1', '4', '1399346625', '1399346968', '5501', '4', '1399346586', '1399346701', '小太阳取暖器外观设计和结构设计-2101', '5728', '1399346298');
INSERT INTO keke_witkey_agreement VALUES ('370', '2', '1', '3389', '2108', '1', '3', '1399348669', null, '5495', '3', '1399348687', '1399348706', '撒旦撒旦阿萨德-2108', '', '1399348660');
INSERT INTO keke_witkey_agreement VALUES ('371', '2', '1', '3392', '2112', '1', '2', '1399354776', null, '5495', '2', '1399354790', null, '说的发送到-2112', null, '1399354768');
INSERT INTO keke_witkey_agreement VALUES ('372', '2', '1', '3398', '2114', '5495', '2', '1399365563', null, '1', '2', '1399365571', null, '发斯蒂芬斯蒂芬-2114', null, '1399365553');
INSERT INTO keke_witkey_agreement VALUES ('373', '2', '1', '3403', '2120', '1', '2', '1399366180', null, '5495', '2', '1399366184', null, '肉肉发发是的发送到-2120', null, '1399366169');
INSERT INTO keke_witkey_agreement VALUES ('374', '2', '1', '3404', '2121', '1', '3', '1399366349', null, '5495', '3', '1399366359', '1399366368', '发斯蒂芬斯蒂芬-2121', '', '1399366339');
INSERT INTO keke_witkey_agreement VALUES ('375', '2', '1', '3410', '2123', '1', '2', '1399450334', null, '5495', '2', '1399450324', null, '的撒打算的阿萨德-2123', null, '1399450314');
INSERT INTO keke_witkey_agreement VALUES ('376', '1', '1', '3412', '2127', '1', '1', null, null, '5495', '1', null, null, '啊三发生地方第-2127', null, '1399454351');
INSERT INTO keke_witkey_agreement VALUES ('377', '2', '1', '3419', '2134', '1', '2', '1399529947', null, '5501', '2', '1399529939', null, '政府集群网站开发-2134', null, '1399529654');
INSERT INTO keke_witkey_agreement VALUES ('378', '3', '1', '3428', '2137', '1', '4', '1399702873', '1399702925', '5495', '4', '1399702893', '1399702911', 'V刹需现场-2137', '5756', '1399702745');
INSERT INTO keke_witkey_agreement VALUES ('379', '3', '1', '3432', '2140', '1', '4', '1399710370', '1399710389', '5495', '4', '1399710357', '1399710382', '斯蒂芬斯蒂芬-2140', '', '1399710182');
INSERT INTO keke_witkey_agreement VALUES ('380', '3', '1', '3415', '2135', '5502', '4', '1399715000', '1399715022', '1', '4', '1399715012', '1399715017', '酒店会员卡设计-2135', '', '1399714911');
INSERT INTO keke_witkey_agreement VALUES ('381', '1', '1', '3438', '2144', '5523', '1', null, null, '5517', '1', null, null, '动漫周边商城网站-2144', null, '1399867232');
INSERT INTO keke_witkey_agreement VALUES ('382', '1', '1', '3379', '2092', '1', '1', null, null, '5501', '1', null, null, '艺术照处理-2092', null, '1399878541');
INSERT INTO keke_witkey_agreement VALUES ('383', '1', '1', '3384', '2100', '1', '1', null, null, '5501', '1', null, null, '汇诚Logo设计-2100', null, '1399878544');
INSERT INTO keke_witkey_agreement VALUES ('384', '1', '1', '3439', '2146', '1', '1', null, null, '4', '1', null, null, '发大幅度发送到-2146', null, '1399879932');
INSERT INTO keke_witkey_agreement VALUES ('385', '1', '1', '3445', '2165', '1', '1', null, null, '4', '1', null, null, '斯蒂芬是的发送到-2165', null, '1399886231');

-- ----------------------------
-- Table structure for `keke_witkey_article`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article`;
CREATE TABLE `keke_witkey_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `art_title` varchar(200) DEFAULT NULL,
  `cat_type` char(20) DEFAULT NULL,
  `art_source` varchar(200) DEFAULT NULL,
  `art_pic` varchar(100) DEFAULT NULL,
  `content` longtext,
  `is_recommend` int(11) DEFAULT '0',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `seo_desc` varchar(500) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '1',
  `is_delineas` int(11) DEFAULT '0',
  `pub_time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`art_id`),
  KEY `index_2` (`art_cat_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=334 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_article
-- ----------------------------
INSERT INTO keke_witkey_article VALUES ('13', '217', '0', 'admin', '广告位招租', null, 'yertyetry', 'data/uploads/2011/09/13/89244e6f0512d32b3.gif', '广告位招租', '0', '广告位招租', '广告位招租', '广告位招租', '0', '1', '0', '1200758400', '103');
INSERT INTO keke_witkey_article VALUES ('14', '367', '0', 'admin', '注册协议', null, 'yertyetry', 'data/uploads/2012/01/14/276764f10f578bada0.png', '注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议', '0', '筷子爱情wss', '筷子爱情wss', '有人说，爱情像水，温柔明亮；也有人说，爱情像酒，越久越醇；还有人说，爱情像风，来去无踪...我说，爱情像一双筷子。男人是一根筷子，女人是一根筷子，两根筷子有缘握在一起，成为一双筷子，那就是爱情。  一双筷子，心往一处想，力往一处使，才能把美好的日子夹起来，送进我们的口中。男人和女人，少了哪一个都不行，一', '1', '1', '0', '1326511480', '136');
INSERT INTO keke_witkey_article VALUES ('246', '5', '0', '匿名', '威客营销的成功之路及潜在危机分析', 'article', '', '', '&lt;p&gt;现在威客网也算是比较火的一个网赚平台，只要大家有一定的特长都能够找到合适的兼职，就算是你只会风水，起名测字往往都能够找到不错的任务，而且这方面的任务还是比较多的，但是这上面的任务要么价格低廉的惊人，要么是价格很具有诱惑力，对于价格低的，往往会成为搅乱市场的罪魁祸首，因为会有整体降低行业的价值趋势，比如发帖子，现在有的人就出一毛钱发一个帖子，实在是荒唐，连五毛都胜率了，还有那些价格非常诱人的，往往都不会让一个人中标，实在有点欺诈之嫌，当然这些都不是威客网的过错，实在是很多人的蓄意所为!&lt;/p&gt;&lt;p&gt;　　正是越来越多的人参与到威客当中，威客网的发展也迎来的极大的机遇，那么威客网本身如何进行营销呢?我们知道猪八戒威客网营销的非常成功，有&lt;a href=\"http://www.0202010.com/\"&gt;网络推广&lt;/a&gt;，甚至央视也来做报道，这些营销也算是堪称经典，迅速的让猪八戒的知名度串升了很多!而且威客的市场也是十分巨大的，现在互联网人口也达到四五亿了，这些人其实都能够成为威客，只要你有知识，有经验，都能够通过威客的平台转化为实际收益，那么威客网的成功之路自然要从发展威客开始!&lt;/p&gt;&lt;p&gt;　　第一步自然是把人变成威客，首先就是利用威客能够赚钱的效应，能够让你在家上上网就把钱挣了这样的广告词肯定是非常吸引人的，而注册成为一名威客自然是非常简单的过程，同时威客网本身还可以给你提供推广的机会，推广一个人参加威客就能够给你积分，提成，发布任务甚至也会给你提成，成功完成任务也能够给你提成，这些都能够有效的转化为收益，自然就能够把很多人改变成为威客!&lt;/p&gt;&lt;p&gt;　　第二步那就是让企业也成为威客，现在很多在威客网上发布任务的大多数都来自于企业，毕竟企业还是财大气粗嘛，几万的项目随便就能够推出来，而对于个人来说推出的任务超过几千元，那就是大手笔了，大部分还是停留在一稿两贴一元的阶段，大大降低了发帖的成本，却苦了很多发帖手，赚的钱越来越少，长期以往肯定会对威客的发展不利，所以威客营销要想办法改变这个局面，那么最好的方法自然就是打开企业这个缺口，从而获得大量的任务来源，提高任务的门槛!从而让威客网走到正确的轨道上来!&lt;/p&gt;&lt;p&gt;　　其实威客营销也是一把双刃剑，可能也会给自己造成毁灭的打击，假如上面的营销不成功，那么威客的赚钱效应就会大大降低，甚至还会遭到&lt;a href=\"http://www.36job.com/\"&gt;行业&lt;/a&gt;的抵制，毕竟&lt;a href=\"http://www.nfrencai.com/trade.shtml\"&gt;行业&lt;/a&gt;价值会被某些个人的低价而毁掉了，另外威客网也存在着巨大的竞争力，威客网的监管系统不一定面面俱到，当出现纠纷的时候，或者欺骗的时候，威客网总会成为风口浪尖上的第一个受害者，所以威客网的诞生之初就带着一把双刃剑来的，只有真正懂得运营威客网，才能够真正取得成功!&lt;/p&gt;', '0', '威客营销的成功之路及潜在危机分析', '威客营销的成功之路及潜在危机分析', '威客营销的成功之路及潜在危机分析', '0', '1', '0', '1365664413', '40');
INSERT INTO keke_witkey_article VALUES ('333', '5', '0', '', '威客平台—打开生活的另一扇门', 'article', '', 'data/uploads/2014/05/05/45564700153672819d785b.jpg', '&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; 初识&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;概念，可以追溯到八九年前的大学时代。那时候我很穷，来自农村的孩子必须活得分外努力，发传单、卖电器、当家教、做礼仪……不能放弃任何一个可以赚钱的机会。后来听说做&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;可以赚钱，立刻跑到网吧，打开电脑，搜出&lt;a href=\"http://daohang.renwuyi.com/19.html\" target=\"_blank\"&gt;猪八戒&lt;/a&gt;的网站，盯着&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;后面的标价，心潮澎湃。&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; 那时候流行一个案例，给一个高姓男孩起名，后来中标的名字是高胜寒，来自苏轼的句子“我欲乘风归去，又恐琼楼玉宇，高处不胜寒”，这个名字诗意中又透着自信的霸气，是不折不扣的杰作。在这个经典案例的鼓动下，我也绞尽脑汁，冥思苦想，那一段时间完成了好几个起名&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;，结果无一入选。我垂头丧气地败下阵来，耽误这么多时间，还不如多去发发传单。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; 这件事一搁置就是五六年。一直到两年前，我被卷入车祸，陷入人生低谷，休养的日子很漫长，在这种漫长的无奈中，往事一一浮现在眼前。我想起来在&lt;a href=\"http://daohang.renwuyi.com/19.html\" target=\"_blank\"&gt;猪八戒&lt;/a&gt;疯狂起名的那段时间。于是我又打开电脑，浏览起&lt;a href=\"http://daohang.renwuyi.com/19.html\" target=\"_blank\"&gt;猪八戒&lt;/a&gt;的&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;来。我反思了一下自己过去的失败，起名字毕竟是见仁见智，即使是自己认为的好名字，任主也不一定这样认为。所以，最好的办法是，找一些相对容易衡量、有一定核定标准的&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;，努力去做好，也许才能有些成果。另外，可能是出身贫困的原因，一度导致我对金钱和成功有着特别的渴望，做事总希望立竿见影，马上看到效果，立即得到自己的酬劳。这种心态让我有些急躁，也让每一次失败都成了打击。所以，我调整了自己的心态，抱着长期学习和兼职的想法，在所有&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;中圈定了自己较为擅长的写作和翻译两项，开始坚持自己的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;生活。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; 这一次，我选的第一次投标是一篇80后伤感回忆类的短文写作。酬劳只有五块钱。我写得很投入很认真，在投标之前传给QQ上的朋友看了一眼，朋友很久没说话，我急了，催他给点意见，他这才说看着看着哭了，想起了小时候。这次第一次投标就中标了。从那以后，我爱上了做&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;，它为我打开了生活中的另一扇门，让我领略到更多的精彩。&lt;/span&gt;&lt;/p&gt;&lt;p align=\"right\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;本文来自&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易官网&nbsp;http://www.renwuyi.com/&nbsp;&nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p align=\"right\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;如有任何转载，请注明出处！&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;', '0', '', '', '', '0', '1', '0', '1399269404', '15');
INSERT INTO keke_witkey_article VALUES ('38', '100', '0', 'ert', '如果您有创意服务需求', 'help', 'yertyetry', '0', '<h6>这里是一个创意人才库，他们竞相为您提供卓越的创意服务<br />他们各自提交自己的方案供您挑选，被您相中的方案将会得到您提供的报酬。 </h6><br />时间财富汇聚了来自世界各地区、各行各业不同职业领域的专业人才数十万人（每天都以上千人递增）。<br />他们可为您提供各类平面设计、网站建设、软件开发、编程制作、动漫创作、多媒体制作、创意策划、文字创作、企划文案、起名构思、编撰翻译、作词谱曲、宣传推广、线索征集、市场调查、出谋划策等服务，为您提供最及时、最全面的解决办法。<br />如果您有创意需求，您只需发布您的项目需求，再将悬赏酬金托管到时间财富，您的需求就将出现在时间财富悬赏中心，那些世界各地的创意人才就开始为您提供创意服务了！<br />接下来，他们各自会把自己的创意方案提交到您的项目下，任您挑选！<br /><p>只有您最终选中了谁的方案，他便拿到您的赏金！</p><p>目前已有近万家企业和个人发布项目，悬赏解决他们面临的创意难题。<br />如果您有创意能力，您只需前往<a title=\"这里有成百上千的项目！\" href=\"http://www.vikecn.com/Task/List/\"></a>，寻找自己感兴趣的项目，在项目期结束前递交自己的方案，就可以了。<br />接下来，您的方案如果被项目发布者选中，您将因此而获得该项目的赏金！<br />这里是一个公平的能力竞技场，不需要看您的学历、职业经历，更不需要看上司的脸色，没有办公室政治的烦扰，一切凭作品说话！<br />一些人提交创意方案并非全为了中标，他们在竞争当中学习、成长。<br />时间财富还提供了全方位的能力展示系统，这有助于手握赏金的企业更准确地主动找到您。1<br /></p><br />', '0', '如果您有创意服务需求', '如果您有创意服务需求', '这里是一个创意人才库，他们竞相为您提供卓越的创意服务他们各自提交自己的方案供您挑选，被您相中的方案将会得到您提供的报酬。 时间财富汇聚了来自世界各地区、各行各业不同职业领域的专业人才数十万人（每天都以上千人递增）。他们可为您提供各类平面设计、网站建设、软件开发、编程制作、动漫创作、多媒体制作、创意策', '0', '1', '0', '1325903242', '2');
INSERT INTO keke_witkey_article VALUES ('131', '100', '0', '', '时间财富', 'help', '', 'data/uploads/2012/01/07/624f081ec7d15c6.jpg', '&nbsp;&nbsp;&nbsp; 1、注册成为时间财富网会员。&nbsp; &lt;a class=\"ta\" href=\"http://www.vikecn.com/reg.asp\" target=\"_blank\"&gt;&lt;/a&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;2、填写有效的联系方式，联系方式可自行选择公开或者保密。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3、进入发布悬赏项目页面。 &lt;a class=\"ta\" href=\"http://user.vikecn.com/vkitem_add.asp\" target=\"_blank\"&gt;&lt;/a&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;4、按要求选择分类、确定悬赏金、悬赏周期、中标模式，简明扼要地填写项目要求。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;5、有附件请上传附件，如果附件超过5M，请使用威客网盘上传或者联系时间财富客服协助上传。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;6、预付悬赏金，时间财富支持支付宝、财付通、快钱、网上银行、银行汇款、自动取款机转账、预充值余额等支付悬赏。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;7、时间财富审核通过、悬赏正式进行。&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;二、项目评标规则 &lt;/strong&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;1、发布者在项目发布后应及时查看项目成果，项目截止后发布方有7天评标期。在7天时间内确定中标结果或作出加价、延期决定。如在项目结束前就产生了满意作品也可提前评标。 &lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;2、如果有特殊原因不能按时评标，请提前向时间财富网项目管理中心申请备案，可适当延长评标时间。 &lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3、若项目到期不按时评标，项目发布方又无合理原因提前告知时间财富网备案，项目管理中心将按客户提供的联系方式一周内发出两次评标通知，若15日内客户仍未做出任何选择或合理处理办法，将视为客户自动放弃评标权利，时间财富网将按照产生中标结果，并支付中标报酬。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;4、项目发布方应本着诚信、公平的态度，尊重威客工作者的劳动成果权益，不得以任何方式选择产生出不公平、不公正、不诚信的中标结果。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;5、项目发布方若有评标不诚信行为（指与项目发布者有直接关连的人员参与了该项目且获得中标的行为），时间财富网有权取消其项目评标资格，该项目将作为废标项目进行相应处理。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;6、时间财富网始终坚持不懈地保护知识产权，坚定中立公信原则维护项目发布方利益和威客工作者劳动成果权益，坚决反对作品抄袭侵权行为，坚决反对套取中标金及剽窃作品成果行为，坚决反对发布者以任何作弊方式影响中标结果的公平产生。&lt;br /&gt;', '0', '时间财富', '时间财富', '&#160;&#160;&#160; 1、注册成为时间财富网会员。&#160; &#160;&#160;&#160;&#160;2、填写有效的联系方式，联系方式可自行选择公开或者保密。&#160;&#160;&#160;&#160;3、进入发布悬赏项目页面。 &#160;&#160;&#160;&#160;4、按要求选择分类、确定悬赏金', '0', '1', '0', '1365665362', '4');
INSERT INTO keke_witkey_article VALUES ('66', '100', '0', '', '为什么要有交付协议?', 'help', '', null, '协议能够对发布者和中标者双方提供公平公正的依据，倘若引起任何版权或者利益双方有分歧，此文件将作为评判依据。此文件居有《中华人民共和国劳动法》的法律效益。一经签订即日生效。<br />', '0', '为什么要有交付协议?', '为什么要有交付协议?', '协议能够对发布者和中标者双方提供公平公正的依据，倘若引起任何版权或者利益双方有分歧，此文件将作为评判依据。此文件居有《中华人民共和国劳动法》的法律效益。一经签订即日生效。', '0', '1', '0', '1326184206', '6');
INSERT INTO keke_witkey_article VALUES ('67', '100', '0', '', '对协议的内容有异议', 'help', '', null, '本协议符合最基本的行业规范，通用性比较强，倘若有附加条件请与我们联系<!--{eval echo $_K[\'phone\']}-->。此协议不得做任何更改或修改，增加附加协议将会以系统消息的形式告知双方，具体内容将在线下双方互相告知，但此附加协议只限于发布者与中标者两者之间，与本平台无关<br />', '0', '', '', '', '0', '1', '0', '1326185007', '5');
INSERT INTO keke_witkey_article VALUES ('228', '17', '0', '', '2012推广你的梦想！', 'article', '', '', '&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;在2011年，经过我们不断的努力，优化和完善平台，以诚信、公平、公正、公开的原则，得到很多雇主和推手的认可。我们的服务宗旨是：让每一个雇主都获得推广效果，让每一个推手都能赚到钱。然而，在过去的一年里，我们多多少少会留下一点遗憾，或者有些渴望实现的梦想，在即将到来的2012年，将为你推广你的梦想，让梦想变为现实。让我们一起来帮助你实现吧！&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　1、您是要推广&lt;span style=\"color:#ff0000;\"&gt;工业产品&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　2、您是要推广&lt;span style=\"color:#ff0000;\"&gt;快消品&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　3、您是要推广&lt;span style=\"color:#ff0000;\"&gt;公司服务&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　4、您是要推广&lt;span style=\"color:#ff0000;\"&gt;招商加盟项目&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　5、您是要推广&lt;span style=\"color:#ff0000;\"&gt;平台网站&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　6、您是要推广您的&lt;span style=\"color:#ff0000;\"&gt;淘宝店&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;或者你还存在疑虑，你也可以直接联系我们的客服，他们会为你做最专业的网络推广指导。&lt;/span&gt;&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459458', '5');
INSERT INTO keke_witkey_article VALUES ('224', '100', '0', '客客小记', '认证中心', 'help', '客客族', '', '&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;亲爱的用户朋友们：&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;许多用户对客客实名认证的审核规则不了解，经常会出现认证审核不能通过的情况。现将认证审核规则告知用户，希望能给大家的认证申请带来帮助。&lt;br /&gt;规则如下：&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;实名认证：&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、上传的图片必须是身份证的有效图片&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若上传的图片为身份证无关的图片，将不能通过认证。并且这种无效的申请会影响其他用户的认证速度，所以会限制该用户一个月内不能再重新提交认证信息。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、图片清晰&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;图片模糊不清，无法辨认证件信息的，将无法通过认证。必须使用清晰的身份证原件的扫描件或彩色数码照，复印件的照片无效。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、身份证信息需与注册信息相符&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若身份证上的信息与用户提交的信息不符，将无法通过验证。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;如果您提交的证件是护照，请您查看证件上是否有证件号码，如果没有则无法核实您的身份，不可以通过。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、身份证有效期大于90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;证件有效期小于&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天、临时身份证或无效的证件都是不能用来认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5、需年满&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;周岁&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;未满&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18周岁是无法通过身份认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6、上传的证件图片显示完整&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;使用数码相机拍证件时，要将整个证件拍下来进行上传，如果上传的证件图片显示不完整将不予通过。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、第二代身份证需要提供双面的图片，第一代身份证需要提供含有个人信息那一面的图片。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;第一代身份证只需要提供身份证正面的图片，即含有个人信息那一面。而第二代身份证需要提供双面的图片。否则，将不能通过认证审核。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8、与公安机关的认证一致&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;身份证信息与公安系统认证不一致的，将不能通过猪八戒网认证审核。&lt;br /&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;企业认证：&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、上传的图片必须是营业执照的有效图片&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若上传的图片为营业执照无关的图片，将不能通过认证。并且这种无效的申请会影响其他用户的认证速度，所以会限制该用户一个月内不能再重新提交。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、图片清晰&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;图片模糊不清，无法辨认证件信息的，将无法通过认证。必须使用清晰的营业执照原件的扫描件或彩色数码照，复印件的照片无效。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、营业执照信息需与注册信息相符&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;若营业执照上的信息与用户提交的信息不符，将无法通过验证。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、证件有效期大于90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;证件有效期小于&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天或无效的证件都是不能用来认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5、上传的证件图片显示完整&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;使用数码相机拍证件时，要将整个证件拍下来进行上传，如果上传的证件图片显示不完整将不予通过。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6、与工商机关的认证一致&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;营业执照信息与工商系统认证不一致的，将不能通过客客认证审核。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '1', '认证中心', '认证中心', '', '0', '1', '0', '1365665328', '0');
INSERT INTO keke_witkey_article VALUES ('229', '17', '0', '', '如何做一个网络推手', 'article', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt; 一、首先要求具备每天长时间在线的条件,拥有个人电脑或在单位具备干私活的条件,在网吧的就&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;不推荐了,毕竟在网吧上网不合适.其次就是网络的选择,最好是宽带,可以拨号的那种,不管是电信&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;网通还是铁通,有了较快的网络,工作效率才会高,当然了,局域网的也可以,就怕速度不好,还有就&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;是有的时候需要换IP的话就不方便了.无线网卡或3G上网的还是别做了,无线网卡那真是无限卡啊,&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;慢的要命,3G上网呢速度还可以,但是费用就有点贵了,不合适的.&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;二、工具：工具是网络推手的必备，就跟军人一样，没有枪就不能上战场，想要挣钱，还得工具齐全。推手的工具简单说就是ID，各大论坛ID，而且ID注册时间尽量早，带头像，ID注册时尽量与人名相似，尽量在2~3个汉字之间最好，这样才有质量。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;三、执行：在推广过程中，执行是需要重要把关，就拿发帖、顶贴来说：质量得到保证才能对推广有所效果。而不仅仅是把信息发布、回复完就完事！发帖－需要找正确论坛、版块，而且在操作过程中，需要根据雇主提供实际要求而发帖！这样才能容易通过。顶贴－顶贴不是一味顶，不仅回复信息内容要有质量，而且在回复过程中需要扮演各种角色，并且不要一面倒、同一种语气、并能提取一些网友信息来做应答；同时顶贴尽量间隔时间回复，而不要一口气回复完，这样容易导致帖子被锁、被封、被删，同时回帖的作用也没有得到发挥；实事求是，诚实是最好的美德！自己回复多少帖子就是多少帖，而不要将网民回复的都算在自己头上，这点往往是很多推手都是不在意，其实只要有经验的推手仔细观察就能发现哪些是推手回的哪些是网民回的！&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;四、资源：做推手仅仅有ID是不够的！还得发展其他资源，如不仅是论坛ID，还有一些广告信息网站ID，同时最好能养ID，发展ID好友、空间好友、博客好友社区好友、博客、SNS社区等等，有了这些资源才能保证推手的活能源源不断。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;五、学习：不管你现在处于什么地位、不管你现在身在何处、不管你做的是什么工作，想要不断成长都离不开对知识的充实。只想到做任务挣钱是远远不够的，更多时候还要学习新兴的推广方式、新兴的推广技术、以及一些推广理论知识、推广经验等等。如：SEO，名人推广经验等。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;六、目标：有目标才有前进的方向，把自己的事情当成事业来做，做推手，给自己定一个目标！即便是每个月挣多少钱为目标！不要以为谈到钱就显得俗，这个社会离开了钱还能活吗？这是现实，我们离不开，只能面对！有了目标做起事来才有方向，同时也更能激励自己&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459503', '2');
INSERT INTO keke_witkey_article VALUES ('69', '298', '0', '', '怎么注册成为威客会员？', 'help', '', null, '<p>1、点击首页的免费注册按钮，进入注册页面。</p><p>2、按要求填写相关注册信息。比如：用户名、邮箱、密码等</p><p>3、点击“注册”按钮提交，提示注册成功。</p><br />', '0', '怎么注册成为威客会员？', '怎么注册成为威客会员？', '1、点击首页的免费注册按钮，进入注册页面。2、按要求填写相关注册信息。比如：用户名、邮箱、密码等3、点击“注册”按钮提交，提示注册成功。', '0', '1', '0', '1325901897', '2');
INSERT INTO keke_witkey_article VALUES ('70', '298', '0', '', '用户注册时应注意哪些问题？', 'help', '', null, '1、考虑好用户名。因为注册后将不可更改。<br />2、填写真实信息。以便管理员在确认评标与中标通知时联系。<br />3、密码设置。为保证用户名安全，请设置一个复杂的密码。<br />4、注册时请仔细阅读《注册条款》，详细了解威客中国的相关规则，使您更准确的了解您所拥有的权利。<br />', '0', '用户注册时应注意哪些问题？', '用户注册时应注意哪些问题？', '1、考虑好用户名。因为注册后将不可更改。2、填写真实信息。以便管理员在确认评标与中标通知时联系。3、密码设置。为保证用户名安全，请设置一个复杂的密码。4、注册时请仔细阅读《注册条款》，详细了解威客中国的相关规则，使您更准确的了解您所拥有的权利。', '0', '1', '0', '1322120479', '2');
INSERT INTO keke_witkey_article VALUES ('71', '328', '0', '', '注册时需要注意哪些问题？', 'help', '', null, '<p>1、会员名：5-15个字符，英文、数字、下划线，注册成功将不能修改。不能使用中文用户名。 </p><p>2、密码：6-16位组成，建议使用英文字母加数字或符号的组合提高密码安全度。详见“如何设置安全密码”。 </p><p>3、邮箱：邮箱认证是可以用来取回密码的，完成注册后请点击进行邮箱认证。 </p><p>4、验证码：请参照右边的验证码，将数字填入左侧输入框中，不分大小写。如填写错误需重新填写正确才能顺利注册。 </p><br />', '0', '注册时需要注意哪些问题？', '注册时需要注意哪些问题？', '1、会员名：5-15个字符，英文、数字、下划线，注册成功将不能修改。不能使用中文用户名。 2、密码：6-16位组成，建议使用英文字母加数字或符号的组合提高密码安全度。详见“如何设置安全密码”。 3、邮箱：邮箱认证是可以用来取回密码的，完成注册后请点击进行邮箱认证。 4、验证码：请参照右边的验证码，将数字填入左侧输', '0', '1', '0', '1322120640', '2');
INSERT INTO keke_witkey_article VALUES ('72', '298', '0', '', '什么是验证码？', 'help', '', null, '1、注册时填写的验证码均是阿拉伯数字。 <br />2、看不到验证码，有可能是您的IE没有启用“活动脚本”、安全级别设置的过高。 <br />您可以如下处理： <br />点击“工具”—“Internet选项”—“安全”—“默认级别”—“确定” <br />同时还请您删除一下您电脑上的临时文件，方法如下： <br />IE6.0版本的处理方法： <br />1、打开浏览器，点击“工具”菜单，打开“INTERNET选项”的对话框 。<br />2、点击“常规”选项卡，选择“删除COOKIES”，在弹出的对话框内按确定；然后点击“删除文件”，在删除所有脱机内容前打上钩，再按确定。 <br />3、点击“安全”选项卡，点击右下角的“默认级别”，如果是灰色的不可按的按钮，则跳过此步骤即可。 <br />4、点击“隐私”选项卡，选择右下角的“默认”，如果是灰色的不可按的按钮，则跳过此步骤即可。点击“高级”，在弹出的页面上把“覆盖自动cookie处理”选中。下面的第一方cookie 和第三方cookie选择“接受”，再点击“确定”。 <br />5、点击“高级”选项卡，然后选择右下角的“还原默认设置”按钮，然后点击最下面的“确定”按钮 。<br />6、关闭所有的浏览器，然后打开，重新进入本站，看一下问题是否已经解决。                <br />', '0', '什么是验证码？', '什么是验证码？', '1、注册时填写的验证码均是阿拉伯数字。 2、看不到验证码，有可能是您的IE没有启用“活动脚本”、安全级别设置的过高。 您可以如下处理： 点击“工具”—“Internet选项”—“安全”—“默认级别”—“确定” 同时还请您删除一下您电脑上的临时文件，方法如下： IE6.0版本的处理方法： 1、打开浏览器，点击“工具”菜单，打', '0', '1', '0', '1322120818', '3');
INSERT INTO keke_witkey_article VALUES ('73', '299', '0', '', '忘记用户名怎么办？', null, '', null, '<span style=\"font-family:Times New Roman;font-size:13px;\">请联系客服，并尽可能的提供您当时注册时留下的信息，包括注册邮箱、真实姓名、身份证号、银行卡号。如果有以上信息有注册记录，客服会帮您找回用户名。</span><br />', '0', '忘记用户名怎么办？', '忘记用户名怎么办？', '请联系客服，并尽可能的提供您当时注册时留下的信息，包括注册邮箱、真实姓名、身份证号、银行卡号。如果有以上信息有注册记录，客服会帮您找回用户名。', '0', '1', '0', '1322121583', '1');
INSERT INTO keke_witkey_article VALUES ('74', '299', '0', '', '忘记登录密码怎么办？', null, '', null, '忘记密码可在“登录”页面，（图1）<p><br /></p><p>点击“忘记密码？” 即可以看到输入您的用户名和您已经绑定邮箱地址，然后点击“请立即发送密码重置邮件”按钮，系统会发一个密码重置邮件到您的认证邮箱。<br />&nbsp;收到邮件后，请立即点击邮件内的链接至专属页面并重新设置您的新登录密码。<br /></p>                        <br />', '0', '忘记登录密码怎么办？', '忘记登录密码怎么办？', '忘记密码可在“登录”页面，（图1）点击“忘记密码？” 即可以看到输入您的用户名和您已经绑定邮箱地址，然后点击“请立即发送密码重置邮件”按钮，系统会发一个密码重置邮件到您的认证邮箱。&nbsp;收到邮件后，请立即点击邮件内的链接至专属页面并重新设置您的新登录密码。', '0', '1', '0', '1322121745', '1');
INSERT INTO keke_witkey_article VALUES ('75', '329', '0', '', '在线下单交易有什么好处？', 'help', '', null, '&lt;p&gt;1、如果您是在线下单，并选择在线托管款项交易，一旦服务发生纠纷，您可以发起退款申请。&lt;/p&gt;&lt;p&gt;2、如果您是在线下单，选择的服务商是诚信会员或已加入交易保障服务，一旦服务发生纠纷并给您造成损失，您可以申请先行赔付。&lt;/p&gt;&lt;p&gt;3、如果您是在线下单，您还可以对服务商提供的服务进行全面评价，掌握服务商信用的主动权，促使服务商提供满意服务。&lt;/p&gt;&lt;br /&gt;', '0', '在线下单交易有什么好处？', '在线下单交易有什么好处？', '1、如果您是在线下单，并选择在线托管款项交易，一旦服务发生纠纷，您可以发起退款申请。2、如果您是在线下单，选择的服务商是诚信会员或已加入交易保障服务，一旦服务发生纠纷并给您造成损失，您可以申请先行赔付。3、如果您是在线下单，您还可以对服务商提供的服务进行全面评价，掌握服务商信用的主动权，促使服务商提供', '2', '1', '0', '1364981299', '1');
INSERT INTO keke_witkey_article VALUES ('76', '298', '0', '', '注册流程', 'help', '', null, '<p>1、登录XX网，点击页面右上方的“免费注册”； </p><p>&nbsp;</p><p>2、进入填写“用户资料”页面，根据页面提示，填写您的用户资料； <span class=\"Wbt547\"></span></p><p>&nbsp;&nbsp;&nbsp; </p><p>3、在确认信息无误，并阅读过用户使用条款后，点击“同意以下使用条款，提交注册信息”按钮；即可成功注册成为XX用户。</p>                        <br />', '0', '注册流程', '注册流程', '1、登录XX网，点击页面右上方的“免费注册”； &#160;2、进入填写“用户资料”页面，根据页面提示，填写您的用户资料； &#160;&#160;&#160; 3、在确认信息无误，并阅读过用户使用条款后，点击“同意以下使用条款，提交注册信息”按钮；即可成功注册成为XX用户。', '0', '1', '0', '1325902035', '3');
INSERT INTO keke_witkey_article VALUES ('77', '297', '0', '', '提现流程', 'help', '', null, '&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;登录XX网后，进入“我的XX网”页面后，页面左侧下方“财务管理”专区点击“提现申请” &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;或点击页面最上方“会员中心”后，在“账务管理”栏目下的“提现申请”。 &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 首先需要设置一个银行账号，或支付宝或是财付通帐号用来将您在XXX网中的金额转入您指定的帐户中，这样您才可以通过银行提取到现金。 &lt;/p&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;p&gt;&nbsp;输入提现金额后，点立即提现后。XXX网财务管理人员会在1-2个工作日提现到您指定的帐号！&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;/p&gt;                        &lt;br /&gt;', '1', '提现流程', '提现流程', '登录XX网后，进入“我的XX网”页面后，页面左侧下方“财务管理”专区点击“提现申请” &#160;或点击页面最上方“会员中心”后，在“账务管理”栏目下的“提现申请”。 &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; 首先需要设置一个银行账号，或支付宝或是财付通帐号用来将您在', '2', '1', '0', '1365665850', '2');
INSERT INTO keke_witkey_article VALUES ('78', '297', '0', '', '充值流程', 'help', '', null, '&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;1、登录“XXX网”进入“我的XXX网”然后点左侧“财务管理”页面：点击“在线充值”按钮；&nbsp;&lt;br /&gt;&nbsp;&nbsp; &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp; 或者登录“万能网”进入“我的XXX网”，点击中间的“我的账户”—“立即充值” ； &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;&lt;br /&gt;&nbsp; &lt;br /&gt;&nbsp;&lt;br /&gt;&nbsp; &lt;br /&gt;2、进入到充值页面 ；输入您想冲入个人账户的金额，并选择支付方式，然后点“去充值”&lt;br /&gt;点击“下一步”按钮； &lt;br /&gt;&nbsp;&lt;br /&gt;&nbsp;&nbsp; &lt;br /&gt;3、自动为您转入到您选择的支付方式页面进行转账充值操作。&lt;/span&gt;&lt;/p&gt;                        &lt;br /&gt;', '0', '充值流程', '充值流程', '1、登录“XXX网”进入“我的XXX网”然后点左侧“财务管理”页面：点击“在线充值”按钮；&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160; 或者登录“万能网”进入“我的XXX网”，点击中间的“我的账户”—“立即充值” ； &#160; &#160;&#160; 2、进入到充值页面 ；输入您', '1', '1', '0', '1362793024', '4');
INSERT INTO keke_witkey_article VALUES ('79', '310', '0', '', '认证流程', 'help', '', null, '<p><span style=\"font-family:Arial;\">登录“XX网”进入“我的万能网”然后点左侧“认证中心”页面。</span></p><p><span style=\"font-family:Arial;\">万能网现在提供的认证有：实名认证，银行认证，企业认证，邮箱认证，VIP会员认证；</span></p><p><span style=\"font-family:Arial;\">按您自己的实际情况要进行哪个认证，只要点“立即认证”按提示操作就行！</span></p>                        <br />', '0', '认证流程', '认证流程', '登录“XX网”进入“我的万能网”然后点左侧“认证中心”页面。万能网现在提供的认证有：实名认证，银行认证，企业认证，邮箱认证，VIP会员认证；按您自己的实际情况要进行哪个认证，只要点“立即认证”按提示操作就行！', '0', '1', '0', '1322122540', '2');
INSERT INTO keke_witkey_article VALUES ('80', '329', '0', '', '招标任务流程', 'help', '', null, '&lt;span style=\"font-family:Arial;\"&gt;雇主选择发布招标任务；为了杜绝发布恶意信息，招标任务象征性收费10元，招标任务发布后，威客进行投标，经协商后，雇主选定具体的威客执行任务，招标任务自动跳转到“指定承接”任务进行。&lt;/span&gt;&lt;br /&gt;', '0', '招标任务流程', '招标任务流程', '雇主选择发布招标任务；为了杜绝发布恶意信息，招标任务象征性收费10元，招标任务发布后，威客进行投标，经协商后，雇主选定具体的威客执行任务，招标任务自动跳转到“指定承接”任务进行。', '1', '1', '0', '1364981283', '1');
INSERT INTO keke_witkey_article VALUES ('81', '301', '0', '', '全款悬赏任务流程', 'help', '', null, '&lt;span style=\"font-family:Arial;\"&gt;一、雇主发布全款悬赏任务（原威客任务）后，等待其他威客来参加该全款悬赏任务。&lt;br /&gt;二、XXX网威客可以通过搜索查看到该全款悬赏任务，并依据任务雇主的需求，提交作品。&lt;br /&gt;三、雇主查看到最合适最优秀的作品后，即可将此威客设置为中标者，并为其发放任务赏金后，全款悬赏任务成功结束。&lt;/span&gt;&lt;br /&gt;', '0', '全款悬赏任务流程', '全款悬赏任务流程', '一、雇主发布全款悬赏任务（原威客任务）后，等待其他威客来参加该全款悬赏任务。二、XXX网威客可以通过搜索查看到该全款悬赏任务，并依据任务雇主的需求，提交作品。三、雇主查看到最合适最优秀的作品后，即可将此威客设置为中标者，并为其发放任务赏金后，全款悬赏任务成功结束。', '4', '1', '0', '1364981451', '2');
INSERT INTO keke_witkey_article VALUES ('82', '312', '0', '', '如何赚钱？', 'help', '', null, '<span style=\"font-family:Arial;\">目前XX网上一共有四种赚钱途径。在将来还会有更多的赚钱方法开放出来。<br />a) 主要途径：完成任务。买家的所有需求都是通过“任务”的形式发布的，完成任务后，被买家选择为中标就可以获得报酬。现在就去【任务列表】挑选任务吧<br />b) 出售服务/作品，如果您在您的【人才铺】出售服务或作品案例，被买家购买后，您也有些收入。<br />c) 参加推广员联盟，获得提成。您可以介绍朋友来注册万能、发“悬赏任务”，也可以介绍朋友加入万能网完成任务。详情了解【推广员】<br />d) 直接交易。您只需要和买家谈好需求和价钱，就可以和他建立起直接交易，更方便更快捷的获得报酬。</span>                        <br />', '0', '如何赚钱？', '如何赚钱？', '目前XX网上一共有四种赚钱途径。在将来还会有更多的赚钱方法开放出来。a) 主要途径：完成任务。买家的所有需求都是通过“任务”的形式发布的，完成任务后，被买家选择为中标就可以获得报酬。现在就去【任务列表】挑选任务吧b) 出售服务/作品，如果您在您的【人才铺】出售服务或作品案例，被买家购买后，您也有些收入。c) 参', '0', '1', '0', '1322122817', '1');
INSERT INTO keke_witkey_article VALUES ('83', '301', '0', '', '如何知道自己中标了？', 'help', '', null, '&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;a) 登录XXX网，进入“我的XXX网”后台&lt;br /&gt;b) 进入“我是威客”——我参加的悬赏任务&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;c) 点击“中标任务”便可查看自己参与的任务是否中标&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&nbsp;&lt;span style=\"font-family:Arial;\"&gt;d) 任务中标后，便会生成一个订单，在上方：交易订单管理---“我收到的交易”中可以查看到。&lt;/span&gt;&lt;/p&gt;                        &lt;br /&gt;', '0', '如何知道自己中标了？', '如何知道自己中标了？', 'a) 登录XXX网，进入“我的XXX网”后台b) 进入“我是威客”——我参加的悬赏任务c) 点击“中标任务”便可查看自己参与的任务是否中标&#160;d) 任务中标后，便会生成一个订单，在上方：交易订单管理---“我收到的交易”中可以查看到。', '3', '1', '0', '1364981432', '1');
INSERT INTO keke_witkey_article VALUES ('84', '301', '0', '', 'XX威客网用户全款悬赏任务使用规则', 'help', '', null, '&nbsp; 本着保护雇主和威客权益的宗旨，本着公开、公平、公正和诚实信用的原则，致力于打造中国最大的外包项目交易平台。请在您使用前仔细阅读以下全款悬赏任务（威客任务）规则。&lt;br /&gt;&nbsp;&lt;br /&gt;一、XXX威客网雇主发布规则&lt;br /&gt;&lt;br /&gt;　　1、雇主可自由定价，自由确定全款悬赏任务的时间、任务描述及联系电话，雇主自主确定中标工作者和中标方案。&lt;br /&gt;&nbsp;&lt;br /&gt;　　2、全额悬赏任务款100%托管在万能威客网，以向威客们表达充分诚意。托管款项可通过您在万能威客网的个人账户余额、网上银行付款、银行转帐、支付宝转帐方式支付。其中80%分给中标威客，20%作为网站运营的手续费。&lt;br /&gt;&lt;br /&gt;　　3、每个全额悬赏任务至少有一个威客/作品中标，除任务无人参加或作品无效的情况外，一般不得撤销任务及退款。&lt;br /&gt;&lt;br /&gt;　　4、雇主自己所在组织及关联方的任何人均不能以任何形式参加自己所发布的任务。一经查实，万能威客网将有权自行处理，包括并不限于通过法律等各种途径，确保交易双方的合法权益。&lt;br /&gt;&lt;br /&gt;　　5、当所发布任务的金额不多于100元时，该任务的期限最多为7天。&lt;br /&gt;&lt;br /&gt;　　6、任务提交并托管款项后，万能威客网客服将在30分钟内（工作时间）审核发布到网站，如遇非工作时间将顺延。对不合理的任务需求，可在审核驳回后将任务款退回您的帐户。&lt;br /&gt;&nbsp;&lt;br /&gt;　　7、采用银行汇款为任务预付费的用户，在汇款成功后请在用户管理后台的账务申诉内为任务发起账务申诉，申诉时请注明[任务编号]等相关信息 ，万能威客网财务人员将尽快对申诉进行处理，以确保任务及时发布。对于提交的任务如一周内未收到托管到平台的任务款，则所提交任务信息将被自动删除，不做保留。&lt;br /&gt;&lt;br /&gt;　　8、如遇任务结果不满意，雇主可选择加价延期任务。金额在100元以上（含100元）的任务有3次加价延期机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金额的20%，第3次不得低于任务总金额的50%。金额在100元以下的任务如需加价延期，则至少加价100元。每次延期不能超过10天，特殊任务可以适当加长。&lt;br /&gt;&lt;br /&gt;　　9、 雇主可在任务进行期间任意时刻选标结束任务，最晚在公示期结束后3天进行选标，最终中标的威客作品及其一切知识产权（包括但不限于版权、著作权）均归雇主所有。如万能威客网在3日内电话通知2次后仍不选稿或不加价，将视为雇主委托万能威客网选稿。&lt;br /&gt;&lt;br /&gt;　　10、雇主选标48小时后万能威客网客服将审核中标作品。此48小时将留给所有应征者查看该任务是否有抄袭作弊的情况。&lt;br /&gt;&lt;br /&gt;　　11、如遇任务在中标后被举报作品涉嫌抄袭，经过调查核实，将取消中标人中标资格。同时将免费为此任务延期1次，不超过7天。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp; 12、充入用户账户的资金未用于悬赏任务，在账户余额不少于100元的条件下才可以申请提现（提现最小金额为100元），提现时完全免费。&lt;br /&gt;&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;br /&gt;二、提取现金的规则&lt;br /&gt;&lt;br /&gt;　　1、提取现金的最小额度为50元。&lt;br /&gt;&lt;br /&gt;　　2、申请提取现金在审核通过后，即可在2-5个工作日内收到款项，目前不收取任何手续费。&lt;br /&gt;&lt;br /&gt;三、任务撤销的规则&lt;br /&gt;&nbsp;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 以下几种情况可以撤消任务并退款：&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1、任务进行中撤消：任务不适合在万能威客网发布，违反了任务发布规则，任务取消后任务款100%返还雇主帐户中。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、任务结束后撤消，又分为以下几种处理方式：&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a、任务无威客提交结果，雇主可申请任务撤销，任务款100%返还雇主帐户中；&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b、任务有1人以上（含1人）威客提交结果，经万能威客网客服判定后认为此结果为无效作品、非原创作品或垃圾广告等，雇主可申请任务撤消，撤消时如果威客没有异议，任务款100%返还雇主帐户中；&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c、任务有1人以上（含1人）威客提交结果，经万能威客网客服判定后认为此结果为无效作品、非原创作品或垃圾广告等，雇主可申请任务撤消，撤消时如果威客持有异议，需雇主和威客互相向万能威客网客服举证，以证明自己的立场：如威客拿不出有力证据证明自己作品为有效作品，且雇主理由充分的情况下，任务款100%返还雇主帐户中；&lt;br /&gt;&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;br /&gt;四、公示的规则&lt;br /&gt;&lt;br /&gt;　　在默认情况下，每个威客任务都会有公示期，下面我们对公示进行说明。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公示是指在某一时间内，万能威客网会将公开本任务的所有作品供用户查阅监督。不论购买雇主保障服务的威客是否设置了作品保密，万能威客网会员可以对作品进行评论。通过实名认证的会员还可对作品进行“顶”和“踩”的操作。&lt;br /&gt;&nbsp;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公示目的在于促进威客间的交流和学习，同时对任务结果进行群众监督，质量良好的任务作品通过大众的投票及评论予以肯定和鼓励。若公示时任务尚未结束，那么雇主可以通过作品被“顶”和“踩”的情况来优先看到这些良好的作品，起到一定的作品筛选作用。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 一旦公示开始，一日不选出中标作品，公示就不结束。在选出中标作品（客服通过雇主中标申请，任务结束）那一刻，还要公示10天。&lt;br /&gt;&lt;br /&gt;', '0', 'XX威客网用户全款悬赏任务使用规则', 'XX威客网用户全款悬赏任务使用规则', '&#160; 本着保护雇主和威客权益的宗旨，本着公开、公平、公正和诚实信用的原则，致力于打造中国最大的外包项目交易平台。请在您使用前仔细阅读以下全款悬赏任务（威客任务）规则。&#160;一、XXX威客网雇主发布规则　　1、雇主可自由定价，自由确定全款悬赏任务的时间、任务描述及联系电话，雇主自主确定中标工作者', '2', '1', '0', '1364981418', '0');
INSERT INTO keke_witkey_article VALUES ('85', '301', '0', '', 'XXX威客网用户参加招标任务规则', 'help', '', null, '此版招标任务参加规则将从2011年1月1日起开始执行&lt;br /&gt;&lt;br /&gt;参加招标任务规则&lt;br /&gt;&lt;br /&gt;1）、为提高招标任务的方案质量，认真阅读发布者的要求后，才可以提交任务方案。&lt;br /&gt;&lt;br /&gt;2）、对于已参加的尚在招标期的招标任务，您可以提交任务方案，并可多次对方案作出修改。一旦招标期结束将不能提交及修改方案。&lt;br /&gt;&lt;br /&gt;3）、招标任务整个生命周期中，所有参加者提交的方案均处于保密状态，除发布者及方案对应的提交者之外，其他用户均不可见。&lt;br /&gt;&lt;br /&gt;4）、发布者会选择满意的方案，并邀请其提交者书写任务执行合同。&lt;br /&gt;&nbsp;&lt;br /&gt;5）、执行合同经发布者审核通过且发布者充入不少于执行合同中第一期任务款的金额到任务上后，任务进入到执行中（对于直接交易任务在发布者审核通过执行计划后直接结束）。同时该执行计划的书写者成为该任务的承接者，且已中标。&lt;br /&gt;&lt;br /&gt;6）、承接者需按照所写的执行合同进行工作，执行中承接者可修改任务合同，但修改任务合同后需经发布者审核通过后方能生效。&lt;br /&gt;&lt;br /&gt;7）、承接者通过工作按顺序完成任务合同所写的用于验收的关键指标后，将成果提交给发布人后，可申请发放对应期的任务款，发布人同意后该期任务款将直接发放进入承接者的账户。&lt;br /&gt;&lt;br /&gt;8）、承接者逐一完成任务合同的各期并得到发放的任务款后任务结束。&lt;br /&gt;&nbsp;&lt;br /&gt;9）、任务结束后发布者将对承接者进行评价，该评价将体现在承接者用户的信用页面，同时承接者用户的信用值将随着获得的任务款而增加。&lt;br /&gt;&lt;br /&gt;10）、若在任务执行中双方出现无法调解的分歧，则承接者和发布者任一方可提出仲裁申请，仲裁将根据实际情况对已充入任务但尚未发放的任务款进行分配并导致任务结束（仲裁结束）&lt;br /&gt;&lt;br /&gt;11）、任务在结束后承接者可在“已中标”页面中查看中标任务，参看自己提交的方案，查看所写的任务执行计划，查看来自发布人的评价。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;', '0', 'XXX威客网用户参加招标任务规则', 'XXX威客网用户参加招标任务规则', '此版招标任务参加规则将从2011年1月1日起开始执行参加招标任务规则1）、为提高招标任务的方案质量，认真阅读发布者的要求后，才可以提交任务方案。2）、对于已参加的尚在招标期的招标任务，您可以提交任务方案，并可多次对方案作出修改。一旦招标期结束将不能提交及修改方案。3）、招标任务整个生命周期中，所有参加者提交', '1', '1', '0', '1364981397', '0');
INSERT INTO keke_witkey_article VALUES ('86', '300', '0', '', 'XXX威客网用户参加威客任务规则', 'help', '', null, '此版全款悬赏任务参加规则将从2011年1月1日起开始执行<br /><br />参加全款悬赏任务规则<br /><br />1）、万能威客网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。<br />&nbsp;<br />2）、为保证公平，万能威客网员工将不参加任何一个任务的竞标。<br /><br />3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。<br /><br />4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。<br /><br />5）、竞标期间工作者可以提交及多次修改作品进行竞标，任务截止则不可提交和修改作品。在任务规定期限内提交符合任务需求的解决结果，不得提交与任务要求无关的、非原创涉嫌抄袭的提交结果，此类情况将将视其情况删除提交结果或作出相应的处理。<br /><br />6）、竞标成功后，本站将根据任务性质向竞标成功的工作者支付任务额80%的悬赏金额（如遇网站举办活动则以活动内的规则为准）<br /><br />7）、如果任务发布者违规进行作弊行为，万能威客网将通过投票形式选出中标者，并向投票中标者发放任务款。对于作弊的发布者，万能威客网将以网站公告的形式公布其资料。<br /><br /><br />', '0', 'XXX威客网用户参加威客任务规则', 'XXX威客网用户参加威客任务规则', '此版全款悬赏任务参加规则将从2011年1月1日起开始执行参加全款悬赏任务规则1）、万能威客网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。&nbsp;2）、为保证公平，万能威客网员工将不参加任何一个任务的竞标。3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。4）', '0', '1', '0', '1322123040', '4');
INSERT INTO keke_witkey_article VALUES ('87', '300', '0', '', 'XXX网用户参加威客任务规则', 'help', '', null, '参加全款悬赏任务规则<br />1）、XXX网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。<br />2）、为保证公平，XXX网员工将不参加任何一个任务的竞标。<br />3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。<br />4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。<br />5）、竞标期间工作者可以提交及多次修改作品进行竞标，任务截止则不可提交和修改作品。在任务规定期限内提交符合任务需求的解决结果，不得提交与任务要求无关的、非原创涉嫌抄袭的提交结果，此类情况将将视其情况删除提交结果或作出相应的处理。<br />6）、竞标成功后，本站将根据任务性质向竞标成功的工作者支付任务额80%的悬赏金额（如遇网站举办活动则以活动内的规则为准）<br />7）、如果任务发布者违规进行作弊行为，XXX网将通过投票形式选出中标者，并向投票中标者发放任务款。对于作弊的发布者，XXX网将以网站公告的形式公布其资料。<br /><br />此版全款悬赏任务参加规则将从2011年1月1日起开始执行<br /><br /><br />', '0', 'XXX网用户参加威客任务规则', 'XXX网用户参加威客任务规则', '参加全款悬赏任务规则1）、XXX网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。2）、为保证公平，XXX网员工将不参加任何一个任务的竞标。3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。5）、竞', '0', '1', '0', '1322123151', '3');
INSERT INTO keke_witkey_article VALUES ('88', '300', '0', '', '我发布的任务可以退款吗？', 'help', '', null, '<span style=\"font-family:Verdana;\">答：发布任务需先托管赏金，且不能退款。只有这样，威客才坚信你的诚意，并提交最佳创意作品。如出现没有竞标稿件的特殊情况，网站个案处理，双方协商。</span>                         <br />', '0', '我发布的任务可以退款吗？', '我发布的任务可以退款吗？', '答：发布任务需先托管赏金，且不能退款。只有这样，威客才坚信你的诚意，并提交最佳创意作品。如出现没有竞标稿件的特殊情况，网站个案处理，双方协商。', '0', '1', '0', '1322123196', '3');
INSERT INTO keke_witkey_article VALUES ('89', '300', '0', '', '任务发布后，雇主能不能修改任务？', 'help', '', null, '<span style=\"font-family:Verdana;\">答：任务进行期间，可以联系您的专属客服为您修改。您也可以增加补充说明，修改仅限于任务描述本身，不涉及到加重任务量。</span>                         <br />', '0', '任务发布后，雇主能不能修改任务？', '任务发布后，雇主能不能修改任务？', '答：任务进行期间，可以联系您的专属客服为您修改。您也可以增加补充说明，修改仅限于任务描述本身，不涉及到加重任务量。', '0', '1', '0', '1322123229', '3');
INSERT INTO keke_witkey_article VALUES ('90', '296', '0', '', '如何保障自己帐户的安全', 'help', '', null, '如果您通过了实名认证，当您忘记密码或帐号被盗时，只要提供相关的有效证件到XXX网进行申诉，您就可以重新拿回您的帐号密码：<br />　申请实名认证的方法：<br />　１,登录XXX网。<br />　２,进入认证中心<br />　３,点击实名认证下面的“申请实名认证”<br />　４,填写您的身份信息<br />&nbsp;&nbsp;&nbsp; ５,填写好正确的信息后，提交认证，我们的工作人员将在一个工作日内给您回复 <br /><br />', '0', '如何保障自己帐户的安全', '如何保障自己帐户的安全', '如果您通过了实名认证，当您忘记密码或帐号被盗时，只要提供相关的有效证件到XXX网进行申诉，您就可以重新拿回您的帐号密码：　申请实名认证的方法：　１,登录XXX网。　２,进入认证中心　３,点击实名认证下面的“申请实名认证”　４,填写您的身份信息&nbsp;&nbsp;&nbsp; ５,填写好正确的信息后，提交认证，我们', '0', '1', '0', '1322123315', '2');
INSERT INTO keke_witkey_article VALUES ('91', '296', '0', '', '帐号被盗或者忘记用户名密码怎么办', 'help', '', null, '如果你注册时填写了邮箱或您通过了邮箱认证，您可以通过找回密码功能来重新得到您的帐号。<br />使用方法：<br />１,进入登录页面<br />２,点击“ 忘记密码了？”链接，进入找回密码程序。<br />３,填写您的用户名，点击下一步<br />４,填写您的邮箱地，点击“取回密码”按钮<br />５,您会看到如下消息：<br />取回密码的方法已经通过 Email 发送到您的信箱中，<br />请在 3 天之内修改您的密码。<br />６,请按系统提示操作即可取回您的密码。 <br /><br />', '0', '帐号被盗或者忘记用户名密码怎么办', '帐号被盗或者忘记用户名密码怎么办', '如果你注册时填写了邮箱或您通过了邮箱认证，您可以通过找回密码功能来重新得到您的帐号。使用方法：１,进入登录页面２,点击“ 忘记密码了？”链接，进入找回密码程序。３,填写您的用户名，点击下一步４,填写您的邮箱地，点击“取回密码”按钮５,您会看到如下消息：取回密码的方法已经通过 Email 发送到您的信箱中，请在 3', '0', '1', '0', '1322123351', '1');
INSERT INTO keke_witkey_article VALUES ('92', '328', '0', '', '怎样发布悬赏项目？', 'help', '', null, '1、&nbsp; 登录状态下，点击发布任务按钮；<br /><br />2、&nbsp; 选择发布任务类型：悬赏任务<br /><br />3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；<br /><br />4、&nbsp; 根据任务情况可填写高级选项，任务高级模式可选择多人中标和计件中标或单人中标；任务宣传可选择用户推广此任务；<br /><br />5、&nbsp; 任务确认，并付款。如账户有余额点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。<br /><br /><br />', '0', '怎样发布悬赏项目？', '怎样发布悬赏项目？', '1、&nbsp; 登录状态下，点击发布任务按钮；2、&nbsp; 选择发布任务类型：悬赏任务3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；4、&nbsp; 根据任务情况可填写高级选项，任务高级模式可选择多人中标和计件中标或单人中标；任务宣传可选择用户推广此', '0', '1', '0', '1322123441', '2');
INSERT INTO keke_witkey_article VALUES ('93', '328', '0', '', '悬赏任务发布有周期限制？', 'help', '', null, '<p>悬赏任务发布周期限制为了保证本系统内悬赏任务有效性，做出的适当控制。目前对悬赏任务的周期限制与任务金额形成一定的比例，如:</p><p>100元以上任务，可以持续7天</p><p>500元以上任务，可以持续15天</p><p>1500元以上任务，可以持续30天</p><p>具体时间是根据您的任务量判断的！</p><br />', '0', '悬赏任务发布有周期限制？', '悬赏任务发布有周期限制？', '悬赏任务发布周期限制为了保证本系统内悬赏任务有效性，做出的适当控制。目前对悬赏任务的周期限制与任务金额形成一定的比例，如:100元以上任务，可以持续7天500元以上任务，可以持续15天1500元以上任务，可以持续30天具体时间是根据您的任务量判断的！', '0', '1', '0', '1322123496', '2');
INSERT INTO keke_witkey_article VALUES ('94', '328', '0', '', '什么是多人中标任务？', 'help', '', null, '<p>雇主选择多人中标模式，说明此次任务需要多人来完成。即雇主可选择两个以上的作品中标。</p><p>多人中标模式，雇主可以自行设计奖项个数（最多可设三个奖项），每个奖项相应的人数和赏金。如雇主悬赏1000元，设置以下三个奖项：</p><p>一等奖&nbsp;&nbsp; 若1人&nbsp;&nbsp; 平均分配&nbsp; 若干300钱</p><p>二等奖&nbsp;&nbsp; 若2人&nbsp;&nbsp; 平均分配&nbsp; 若干400钱</p><p>三等奖&nbsp;&nbsp; 若3人&nbsp;&nbsp; 平均分配&nbsp; 若干300元钱</p>                        <br />', '0', '什么是多人中标任务？', '什么是多人中标任务？', '雇主选择多人中标模式，说明此次任务需要多人来完成。即雇主可选择两个以上的作品中标。多人中标模式，雇主可以自行设计奖项个数（最多可设三个奖项），每个奖项相应的人数和赏金。如雇主悬赏1000元，设置以下三个奖项：一等奖&nbsp;&nbsp; 若1人&nbsp;&nbsp; 平均分配&nbsp; 若干300钱二等奖&nbs', '0', '1', '0', '1322123538', '2');
INSERT INTO keke_witkey_article VALUES ('95', '328', '0', '', '什么是计件任务？', 'help', '', null, '<p>计件任务是多人中标模式的一种延伸，由于计件任务要求合格稿件达到一定的量，因此只要威客所提稿件符合雇主要求，即可中标。雇主在发布任务时先确定任务的总赏金及要求稿件的数目，系统会据此算出每个稿件的赏金。威客参与计件任务，每达标一个即可获得单个稿件金额。</p>                        <br />', '0', '什么是计件任务？', '什么是计件任务？', '计件任务是多人中标模式的一种延伸，由于计件任务要求合格稿件达到一定的量，因此只要威客所提稿件符合雇主要求，即可中标。雇主在发布任务时先确定任务的总赏金及要求稿件的数目，系统会据此算出每个稿件的赏金。威客参与计件任务，每达标一个即可获得单个稿件金额。', '0', '1', '0', '1322123563', '2');
INSERT INTO keke_witkey_article VALUES ('96', '304', '0', '', '选稿评标有期限吗？', 'help', '', null, '<p>任务选稿的期限是根据悬赏金额来计算判断的。</p><p>雇主的项目都有选稿评标期限，尽可能最大限度的保障威客会员的劳动成果权益。 </p><p>因项目无满意作品的情况，很大程度上是悬赏酬金价格不合理原因所致，建议发布者将任务进行加价延期，已确保任务能够顺利完成。</p>                        <br />', '0', '选稿评标有期限吗？', '选稿评标有期限吗？', '任务选稿的期限是根据悬赏金额来计算判断的。雇主的项目都有选稿评标期限，尽可能最大限度的保障威客会员的劳动成果权益。 因项目无满意作品的情况，很大程度上是悬赏酬金价格不合理原因所致，建议发布者将任务进行加价延期，已确保任务能够顺利完成。', '0', '1', '0', '1322123608', '3');
INSERT INTO keke_witkey_article VALUES ('97', '304', '0', '', '怎样参与项目？', 'help', '', null, '<p>1、注册成为会员。</p><p>2、浏览项目，点击参与。(已经结束的或处于评标状态的项目不能再参与)。<br />3、方案完成后，进入管理中心，找到我参与的项目，上传即可（分为文字及附件形式的方案，文字方案可直接写在方案说明里）。<br />4、在未评标之前可以修改方案。<br />5、等待客户评标。<br />6、客户选定中标作品后，系统将发出中标通知，并公布中标者及其作品。</p>                        <br />', '0', '怎样参与项目？', '怎样参与项目？', '1、注册成为会员。2、浏览项目，点击参与。(已经结束的或处于评标状态的项目不能再参与)。3、方案完成后，进入管理中心，找到我参与的项目，上传即可（分为文字及附件形式的方案，文字方案可直接写在方案说明里）。4、在未评标之前可以修改方案。5、等待客户评标。6、客户选定中标作品后，系统将发出中标通知，并公布中标者', '0', '1', '0', '1322123648', '2');
INSERT INTO keke_witkey_article VALUES ('98', '304', '0', '', '项目失败退款', 'help', '', null, '<p>1、项目如无人承接或进行失败后，系统会扣除任务发布费用。</p><p>2、推广任务失败，系统不收取佣金。</p>                        <br />', '0', '项目失败退款', '项目失败退款', '1、项目如无人承接或进行失败后，系统会扣除任务发布费用。2、推广任务失败，系统不收取佣金。', '0', '1', '0', '1322123697', '2');
INSERT INTO keke_witkey_article VALUES ('99', '218', '0', '', '延期或加价流程', null, '', null, '<p>1、&nbsp; 客户发布项目后应及时查看项目成果，项目截止后发布方有7天评标期。在7天时间内确定中标结果或作出加价、延期决定。 </p><p>2、&nbsp; 项目首次悬赏无人参与的项目，可享有一次免费延期，延期时间不超过7天。</p><p>3、&nbsp; 延期任务只有3次加价机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金额的20%，第3次不得低于任务总金额的50%。每次延期不能超过10天，加价金额不低于50元</p>                        <br />', '0', '延期或加价流程', '延期或加价流程', '1、&nbsp; 客户发布项目后应及时查看项目成果，项目截止后发布方有7天评标期。在7天时间内确定中标结果或作出加价、延期决定。 2、&nbsp; 项目首次悬赏无人参与的项目，可享有一次免费延期，延期时间不超过7天。3、&nbsp; 延期任务只有3次加价机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金', '0', '1', '0', '1322123727', '0');
INSERT INTO keke_witkey_article VALUES ('100', '311', '0', '', '怎样发布招标任务？', 'help', '', null, '<p>1、&nbsp; 登录状态下，点击发布任务按钮；</p><p>2、&nbsp; 选择发布任务类型：招标任务</p><p>3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；</p><p>4、&nbsp; 任务确认，并付款。如账户有余额点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。招标任务仅扣除固定的任务发布费用。</p>                        <br />', '0', '怎样发布招标任务？', '怎样发布招标任务？', '1、&nbsp; 登录状态下，点击发布任务按钮；2、&nbsp; 选择发布任务类型：招标任务3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；4、&nbsp; 任务确认，并付款。如账户有余额点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。', '0', '1', '0', '1322123771', '1');
INSERT INTO keke_witkey_article VALUES ('101', '312', '0', '', '我们有哪些支付方式？', 'help', '', null, '<span style=\"font-size:16px;\">支付宝账户余额支付、易宝账户余额支付、快钱账户余额支付、各个银行网营支付、信用卡支付。<br />                        </span><br />', '0', '我们有哪些支付方式？', '我们有哪些支付方式？', '支付宝账户余额支付、易宝账户余额支付、快钱账户余额支付、各个银行网营支付、信用卡支付。', '0', '1', '0', '1322123831', '0');
INSERT INTO keke_witkey_article VALUES ('102', '260', '0', '', '如何发布自己的服务需求？', null, '', null, '在人中心，中击发布服务<br />', '0', '如何发布自己的服务需求？', '如何发布自己的服务需求？', '在人中心，中击发布服务', '0', '1', '0', '1322123870', '0');
INSERT INTO keke_witkey_article VALUES ('103', '260', '0', '', '什么是个人服务店铺？', null, '', null, '个人店铺是威客商城专为个人服务商开发的店铺产品，该产品可以充分体现个人服务商的服务价值，以吸引客户光顾。您注册开通后就相当于自己的免费个人网站，可以自己编辑、管理、发布、报价。个人服务店铺为免费产品，您可以完全免费使用该产品。                                                <br />', '0', '什么是个人服务店铺？', '什么是个人服务店铺？', '个人店铺是威客商城专为个人服务商开发的店铺产品，该产品可以充分体现个人服务商的服务价值，以吸引客户光顾。您注册开通后就相当于自己的免费个人网站，可以自己编辑、管理、发布、报价。个人服务店铺为免费产品，您可以完全免费使用该产品。', '0', '1', '0', '1322123902', '0');
INSERT INTO keke_witkey_article VALUES ('104', '260', '0', '', '如何开通个人店铺?', null, '', null, '<p>开通店铺仅需三步：注册 &#187; 填写必填资料 &#187; 发布服务</p>                        <br />', '0', '如何开通个人店铺?', '如何开通个人店铺?', '开通店铺仅需三步：注册 &#187; 填写必填资料 &#187; 发布服务', '0', '1', '0', '1322123931', '0');
INSERT INTO keke_witkey_article VALUES ('105', '239', '0', '', '怎样查看我参与的项目？', null, '', null, '<p>1、登录状态下进管理中心<br />2、点击我参与的项目，就会显示您所参与的所有项目，如有中标项目，会显示“中标”字样，未提交方案的项目有“上传字样”。</p>                        <br />', '0', '怎样查看我参与的项目？', '怎样查看我参与的项目？', '1、登录状态下进管理中心2、点击我参与的项目，就会显示您所参与的所有项目，如有中标项目，会显示“中标”字样，未提交方案的项目有“上传字样”。', '0', '1', '0', '1322123962', '0');
INSERT INTO keke_witkey_article VALUES ('106', '260', '0', '', '什么是团队服务店铺？', null, '', null, '<p class=\"text02\">团队店铺是威客商城专为服务型企业与团队型工作室用户开发的店铺产品，该产品可以充分体现团队服务商的服务价值，其主要有以下几点优点：</p><p class=\"text03\">(1)企业级站点，树立团队品牌形象；<br />(2)全方位展示，精确体现服务价值；<br />(3)置身大商圈，免费获更多得客户；<br />(4)适合企业、多人工作室等团队用户。</p>                        <br />', '0', '什么是团队服务店铺？', '什么是团队服务店铺？', '团队店铺是威客商城专为服务型企业与团队型工作室用户开发的店铺产品，该产品可以充分体现团队服务商的服务价值，其主要有以下几点优点：(1)企业级站点，树立团队品牌形象；(2)全方位展示，精确体现服务价值；(3)置身大商圈，免费获更多得客户；(4)适合企业、多人工作室等团队用户。', '0', '1', '0', '1322123986', '0');
INSERT INTO keke_witkey_article VALUES ('107', '237', '0', '', '如何知道自己的作品中标？', null, '', null, '<p>1、&nbsp; 网站上会发出中标通知的。</p><p>2、&nbsp; 在管理中心，我参与的项目处会显示“中标”字样。</p><p>3、在个人消息中心，可以收到中标的系统消息。</p>                        4、本站会以邮件的形式发送到你注册的邮箱里去。<br />', '0', '如何知道自己的作品中标？', '如何知道自己的作品中标？', '1、&nbsp; 网站上会发出中标通知的。2、&nbsp; 在管理中心，我参与的项目处会显示“中标”字样。3、在个人消息中心，可以收到中标的系统消息。                        4、本站会以邮件的形式发送到你注册的邮箱里去。', '0', '1', '0', '1322124066', '0');
INSERT INTO keke_witkey_article VALUES ('108', '265', '0', '', '退款注意事项', null, '', null, '<p>1、客户提出申请退款时，请详细告知相关内容（包括交易内容、沟通记录、聊天记录等）证明服务不符合要求的证据。</p><p>2、 威客商城收到客户退款申请，会在24小时内联系服务提供商，以第三方名义了解核实情况，协商调解并作出合理的仲裁，请双方给予配合！</p><p>3、最高退款金额不高于客户在威客商城托管的交易金额。</p>                        <br />', '0', '退款注意事项', '退款注意事项', '1、客户提出申请退款时，请详细告知相关内容（包括交易内容、沟通记录、聊天记录等）证明服务不符合要求的证据。2、 威客商城收到客户退款申请，会在24小时内联系服务提供商，以第三方名义了解核实情况，协商调解并作出合理的仲裁，请双方给予配合！3、最高退款金额不高于客户在威客商城托管的交易金额。', '0', '1', '0', '1322124097', '0');
INSERT INTO keke_witkey_article VALUES ('109', '312', '0', '', '如何付款/付款方式', 'help', '', null, '&lt;p&gt;在线下单，在线托管交易付款方式&lt;/p&gt;&lt;p class=\"text02\"&gt;1、用帐户余额支付&lt;/p&gt;&lt;p class=\"text02\"&gt;2、用网上银行充值到帐户支付&lt;/p&gt;&lt;p class=\"text02\"&gt;3、用支付宝充值到帐户支付&lt;/p&gt;&lt;p class=\"text02\"&gt;4、用财付通充值到帐户支付&lt;/p&gt;&lt;p class=\"text02\"&gt;5、线下去银行汇款，汇款打电话通知客服为你帐号充值。&lt;/p&gt;&lt;p class=\"text02\"&gt;&nbsp;&lt;/p&gt;                        &lt;br /&gt;', '0', '如何付款/付款方式', '如何付款/付款方式', '在线下单，在线托管交易付款方式1、用帐户余额支付2、用网上银行充值到帐户支付3、用支付宝充值到帐户支付4、用财付通充值到帐户支付5、线下去银行汇款，汇款打电话通知客服为你帐号充值。&#160;', '0', '1', '0', '1365665443', '0');
INSERT INTO keke_witkey_article VALUES ('110', '313', '0', '', '什么是威客？', null, '', null, '<p>&nbsp;&nbsp;&nbsp; 威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;在新经济（商业）环境中做威客的人，种类各式各样，除了各个行业、各个领域之外，还包括掌握各类创新理论（经济和管理）的人。在这些掌握各类创新理论（经济和管理）的人中，有经济威客、管理威客和网络威客等各个领域的威客。甚至可以夸张地说，在互联网威客这平台上，没有所谓的经济学家、管理学家等各式各样的专家学者，只有威客。而威客类网站的出现，为有知识生产加工能力的个人创造了一个销售知识产品的商业平台和机会。<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;总而言之，威客模式的出现，为个人的知识（资源）买卖带来商机。随着威客时代的来临，每一个威客都可以将自己的知识、经验和学术研究成果作为一种无形的“知识商品”和服务在网络上来销售。威客通过威客网站这个平台买卖“知识产品”，让自己的知识、经验和学术研究成果逐步转化成个人财富。在威客模式下，个人的知识（资源）不但是力量，而且又是个人的财富。在以知识资源应用开发的新经济（商业）时代，无论是个人或组织拥有知识就拥有财富。</p>                        <br />', '0', '什么是威客？', '什么是威客？', '&nbsp;&nbsp;&nbsp; 威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '0', '1', '0', '1322124296', '0');
INSERT INTO keke_witkey_article VALUES ('111', '313', '0', '', '什么是雇主？', null, '', null, '<span style=\"font-family:Arial;\">雇主</span>：均是指在本网站上发布任务的会员。', '0', '什么是雇主？', '什么是雇主？', '雇主：均是指在本网站上发布任务的会员。', '0', '1', '0', '1322124385', '0');
INSERT INTO keke_witkey_article VALUES ('112', '294', '0', '', '作为推手需要什么条件', 'help', '', null, '1、没有专业、学历的限制，只要自己感兴趣，能完成相应的任务，就可参与。&lt;br /&gt;&lt;br /&gt;2、XXX网是一个网上工作平台，只要注册为XXX网会员就能成为了一名推手。&lt;br /&gt;&lt;br /&gt;3、XXX网提倡竞争、成长与学习。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;', '0', '作为推手需要什么条件', '作为推手需要什么条件', '1、没有专业、学历的限制，只要自己感兴趣，能完成相应的任务，就可参与。2、XXX网是一个网上工作平台，只要注册为XXX网会员就能成为了一名推手。3、XXX网提倡竞争、成长与学习。', '0', '1', '0', '1365665459', '0');
INSERT INTO keke_witkey_article VALUES ('113', '346', '0', '', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', 'help', '', null, '答：算的，点击推广代码之后浏览器会自动作记录，只要不清除浏览器Cookie记录的情况下15天内注册会员都算成功推广。                        &lt;br /&gt;', '1', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', '答：算的，点击推广代码之后浏览器会自动作记录，只要不清除浏览器Cookie记录的情况下15天内注册会员都算成功推广。', '0', '1', '0', '1365665659', '0');
INSERT INTO keke_witkey_article VALUES ('114', '311', '0', '', '我做推广员能得到什么？', 'help', '', null, '&nbsp;                                                        答：在实践推广过程中不仅能学习许多网络营销知识锻炼自己的意志，同时能结交许多志同道合的朋友，当然在有效推广之后还可以获得非常丰厚的现金报酬。                                                &lt;br /&gt;', '0', '我做推广员能得到什么？', '我做推广员能得到什么？', '&#160;                                                        答：在实践推广过程中不仅能学习许多网络营销知识锻炼自己的意志，同时能结交许多志同道合的朋友，当然在有效推广之后还可以获得非常丰厚的现金报酬。', '0', '1', '0', '1365665422', '0');
INSERT INTO keke_witkey_article VALUES ('115', '294', '0', '', '什么是推广链接？', 'help', '', null, '&lt;span style=\"font-family:Arial;\"&gt;答：推广链接也是用于记录推广成绩的工具，由于是链接形式因此能通过浏览器地址访问。&lt;/span&gt;&lt;br /&gt;', '0', '什么是推广链接？', '什么是推广链接？', '答：推广链接也是用于记录推广成绩的工具，由于是链接形式因此能通过浏览器地址访问。', '0', '1', '0', '1365665409', '1');
INSERT INTO keke_witkey_article VALUES ('331', '7', '0', '', '三驾马车的深化与升级：任务易领军威客行业', 'article', '', '', '任务易网，全球唯一为威客会员服务的平台，整合各大威客网站任务，对任务进行分析，整合，匹配，让威客找任务接任务更容易。想网络兼职，网络赚钱，任务易是你开启网上兼职、赚钱的平台。点此&lt;a href=\"http://task.renwuyi.com\" target=\"_blank\"&gt;立即赚钱&lt;/a&gt;&lt;div class=\"info_bot\"&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　当电子商务应用沟通了知识传递的桥梁，&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;模式便应运而生。自05年&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;创始人刘峰在中国科学院研究生学院提出利用互联网进行知识管理的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;模式新概念后，国内&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;行业迅速由最初的萌芽状态发展为群雄逐鹿的竞争局势。然而十年春秋已过，纵观如今行业内能够在&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;群体中产生重要影响力的，唯有以提出&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;模式三驾马车深化与升级的新兴&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;网站——&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易依旧处于强势崛起的领军地位中。&lt;/div&gt;&lt;div style=\"text-align: center;\"&gt;&lt;img src=\"http://baike.renwuyi.com/dongtai/2014-04/data/uploads/17253842285358b4175ab5d.jpg\" alt=\"三驾马车的深化与升级：&lt;a href=http://task.renwuyi.com/ target=\'_blank\'&gt;任务&lt;/a&gt;易领军&lt;a href=http://baike.renwuyi.com/citiao/12.html target=\'_blank\'&gt;威客&lt;/a&gt;行业\" align=\"middle\" /&gt;&lt;br /&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;color:#333333;line-height: 25.200000762939453px; text-align: left;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;div style=\"text-align: left;\"&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　一、上游强势资源确保体制运营厚度&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易由武汉客客信息技术有限公司研发运营，相比较传统&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;模式利用网络进行引资招商的项目创立模式和人才吸引模式，&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易依托华中地区的地理优势，成功与中科院、湖北标准研究院及华中科技大学、武汉理工大学等高等院校达成战略合作伙伴，将高端科学化、高端人才化、高端技能化的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;实用力量导引入网站服务体质的运营厚度中，保障了所有&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;项目能够在高效、高质的前提下圆满完成。&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　二、中层核心技术维系环境发展深度&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易针对互联网行业电子商务&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;系统进行技术研发和创新，通过&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;系统和交易系统的技术核心发展，其php开源产品客客出品专业&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;系统kppw不仅改进了固有&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;行业在线承接商务交易和线上线下的多种交易模式，而且凭借武汉传神翻译公司和中国最大在线交易服务提供商的优势，成功研发了全球化&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;市场的影响和开发，目前&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;系统已经拥有超过两万五千次的安装量、超过六百家的商业授权，超过五十项的商业定制及四家天使一家VC的成功合作。&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　三、底气群体政策促进安全效益力度&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;　　&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易目前的运营重心除了体制与技术层面的领先性外，更将&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;群体利益保障的传统多发问题置于关键高度中，一方面制定了完善的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;利益保障政策，尤其是项目评价、佣金结算及纠纷问题解决等多项环节，通过召开&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;调查、&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;访谈、&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;评选等方式，从大众化的群体角度妥善制定相关政策；而另一方面施行了口碑化的政策试行制度，将雇主评判的依据从个人主观角度向方案实用效益角度调整，以口碑化促进&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;及雇主利益保障，成为业内第一家创新化解决安全效益问题的专业&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;网站，在业内产生了巨大的影响浪潮。&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;&lt;br /&gt;&lt;/div&gt;&lt;div style=\"margin: 0px auto; padding: 0px; list-style: none; border: 0px; line-height: 25.200000762939453px; color: rgb(51, 51, 51); word-break: break-all; font-family: 微软雅黑, Arial, Helvetica, sans-serif;\"&gt;&lt;span style=\"font-family:\'Microsoft Yahei\', \'Open Sans\', sans-serif;color:#333333;line-height: 20px;\"&gt;出自：&lt;/span&gt;&lt;br style=\"color: rgb(51, 51, 51); font-family: \'Microsoft Yahei\', \'Open Sans\', sans-serif; line-height: 20px;\" /&gt;&lt;span style=\"font-family:\'Microsoft Yahei\', \'Open Sans\', sans-serif;color:#333333;line-height: 20px;\"&gt;&lt;/span&gt;新华网, 地址：http://www.sn.xinhuanet.com/2014-04/22/c_1110353153.htm&lt;br /&gt;中国日报网，地址：http://chuangxin.chinadaily.com.cn/plus/view.php?aid=33129&lt;br /&gt;凤凰网，地址：http://js.ifeng.com/business/comment/detail_2014_04/22/2170304_0.shtml&lt;span style=\"font-family:\'Microsoft Yahei\', \'Open Sans\', sans-serif;color:#333333;line-height: 20px;\"&gt;&lt;/span&gt;&lt;br /&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;p class=\"info_bot\"&gt;来源：&lt;a href=\"http://baike.renwuyi.com\" target=\"_blank\"&gt;威客百科&lt;/a&gt;&lt;span&gt;本文地址：&lt;a href=\"http://baike.renwuyi.com/dongtai/2014-04/537.html\" target=\"_blank\"&gt;baike.renwuyi.com/dongtai/2014-04/537.html&lt;/a&gt; 转载请注明出处。&lt;/span&gt;&lt;/p&gt;', '0', '', '', '', '0', '1', '0', '1398838568', '9');
INSERT INTO keke_witkey_article VALUES ('227', '203', '0', '匿名', '警惕交易诈骗，注意帐户安全', 'article', '', 'data/uploads/2013/04/11/47035166639dbbaf7.jpg', '&lt;p&gt;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;网络交易骗术不断升级，客客网提醒所有用户：万变不离其宗。只要注意防范，任何骗术都无法得逞。&nbsp;以下展现几种常见的安全隐患和骗术，请所有会员注意！&lt;/p&gt;&lt;p&gt;【&lt;strong&gt;设置复杂密码，注意保管账户&lt;/strong&gt;】&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目前网站提供的是双重密码的安全保障，对于登录等基本操作需要验证登录密码，对于提现、打款等涉及到资金的操作，需要验证安全密码。从近期资金被盗的几起案例中，发现了这些用户的密码都过于简单，有的甚至未设置安全密码，以致于密码很容易被猜中破解。&lt;br /&gt;&lt;strong&gt;安全提示：&lt;/strong&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;广大会员应当注意设置并妥善保管密码，采取以下措施，防止密码被盗：&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;&nbsp;&nbsp;设置较为复杂的密码，不要使用与用户名一致、简单的数字组合等密码；&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;&nbsp;&nbsp;设置不同的登录密码和安全密码；&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;&nbsp;&nbsp;&nbsp;保管好账号密码，尽量不要在公共场所的电脑上登录使用。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;', '1', '警惕交易诈骗，注意帐户安全', '警惕交易诈骗，注意帐户安全', '警惕交易诈骗，注意帐户安全', '0', '1', '0', '1365664673', '64');
INSERT INTO keke_witkey_article VALUES ('126', '100', '0', '', '网站公告5', 'help', '', null, '&lt;p&gt;作品是以文件付费下载的形式出售的；提供服务是以消耗劳动力和时间作为出售条件的。作品版权归作者所有，购买者只享有使用权和修改权；提供服务版权归购买者所有。作品相同的购买者只需要进行一次性消费就可以永久下载；提供服务相同的购买者根据需求次数付费。&lt;/p&gt;&lt;br /&gt;', '0', '网站公告5', '网站公告5', '&lt;p&gt;作品是以文件付费下载的形式出售的；提供服务是以消耗劳动力和时间作为出售条件的。作品版权归作者所有，购买者只享有使用权和修改权；提供服务版权归购买者所有。作品相同的购买者只需要进行一次性消费就可以永久下载；提供服务相同的购买者根据需求次数付费。&lt;/p&gt;', '0', '1', '0', '1365665369', '2');
INSERT INTO keke_witkey_article VALUES ('243', '17', '0', '', '威客必看：发帖任务参与须知', 'article', '', '', '&lt;h1&gt;&lt;strong&gt;1、威客如何参加发帖任务赚钱？&lt;/strong&gt;&lt;br /&gt;点击进入具体的发帖任务页面(&lt;a href=\"http://jijian.taskcn.com/list/index/\" target=\"_blank\"&gt;所有发帖任务列表&lt;/a&gt;)，&lt;u&gt;下载&lt;/u&gt;任务页面附件中的txt文章，把文章内容全部&lt;u&gt;复制&lt;/u&gt;后，&lt;u&gt;粘贴&lt;/u&gt;到雇主指定的网站中(如果雇主没有指定，则表示可以发到其他任意的网站上面)，然后点击任务页面“参加任务”的按钮，把发好的URL&lt;u&gt;链接地址&lt;/u&gt;在提交一下即可。如果推广的链接提交后，保持24小时有效(即可以正常访问，不被删除)，那么就可以直接获得相应的任务款奖励了。&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2、发帖任务一般周期多久呢？&lt;/strong&gt;&lt;br /&gt;发帖类任务默认进行时间为30天，系统会自动延期征集有效作品，直到任务金额消耗完毕后，该任务将自动停止征集。&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3、如何判断我提交的链接是否有效？&lt;/strong&gt;&lt;br /&gt;发帖任务采用先进的智能抓取技术来判别各个作品是否为有效的提交，默认情况下系统将会在某个作品提交后的24小时内完成自动抓取，并判断该作品链接是否存在及信息是否正确，正确无误的作品将自动获得任务赏金，已不存在的作品链接或信息有误将不会得到任务赏金。&lt;br /&gt;&lt;strong&gt;&lt;span style=\"color:red;\"&gt;以下提交为无效提交：&lt;br /&gt;&lt;/span&gt;&lt;/strong&gt;a. 没有提交到雇主指定的网站（雇主未指定除外）；&lt;br /&gt;b. 威客原创的内容(即与雇主附件中的推广文章无关的内容)；&lt;br /&gt;c. 将雇主提供的文章进行二次创作（增删、修改）；&lt;br /&gt;d. 登录会员后方可见的网站链接。&lt;br /&gt;e. 无人气的新建博客；&lt;br /&gt;f. 同一博客下重复发帖2篇以上（含2篇）。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4、我能无限参加某个发帖任务吗？&lt;/strong&gt;&lt;br /&gt;&lt;a href=\"http://my.taskcn.com/audite\" target=\"_blank\"&gt;实名认证&lt;/a&gt;的威客参加每个任务提交推广链接的上限为10个网址，且每个域名不得提交3次以上，多出部分系统将自动丢弃不作处理；非实名认证威客不能参加发帖任务。&lt;/h1&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664421', '16');
INSERT INTO keke_witkey_article VALUES ('241', '4', '0', '', '免责声明', 'article', '', '', '1、本网站发布悬赏任务、技术项目转让，其版权均归原作者所有，内容必须真实合法，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;2、其他任何媒体、网站或个人从本网下载使用，须自负版权等法律责任，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;3、本网站刊发、转载文章，版权归原作者所有，仅代表本人的观点和看法，文责自负，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;4、当本网站以链接形式推荐其他网站内容时，本网站不保证这些网站或资源的可用性负责、真实性、合法性。&lt;br /&gt;&lt;br /&gt;5、对于任何因使用链接的其他网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;6、由于与本网站链接的其它网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;7、任何单位或个人认为通过本站的内容可能涉嫌侵犯其合法权益，应该及时向本站管理员书面反馈，并提供身份证明、权属证明及详细侵权情况证明，我们在收到上述法律文件后，将会尽快安排处理。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664407', '3');
INSERT INTO keke_witkey_article VALUES ('242', '203', '0', '', '支付方式', 'article', '', '', '&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;支付方式一：银行汇款&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;开 户 行：XXXXXXX银行　　帐 号：000-000-000-000&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;注：开户行所在城市为：xxxxx&nbsp; .....&lt;/p&gt;&lt;p&gt;在线QQ：xxxxxxxx、xxxxxxx&lt;/p&gt;&lt;p&gt;联系电话：027-0000000、00000000、000000、000000&lt;/p&gt;&lt;p&gt;付款后请及时通知我们，请注明所汇银行、金额、您在威客的用户名或者所发项目名称。&lt;/p&gt;&lt;p&gt;企业如需开据发票，请把公司名称、地址、邮编等相关信息发至邮箱（&lt;a href=\"mailto:xxxx@xxx.com\"&gt;xxxx@xxx.com&lt;/a&gt;）,费用另计。 &lt;br /&gt;&lt;br /&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;支付方式二：通过财付通付款&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;strong&gt;如何通过财付通预付赏金？&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664429', '7');
INSERT INTO keke_witkey_article VALUES ('247', '7', '0', '', '拥有梦想的快乐威客', 'article', '', '', '本期我们采访的威客是netslave——黄之平，他是一名外贸公司的设计师，在任务中国一直在做兼职威客。他是一个热爱生活，随和乐观的人，喜欢看书、旅行。梦想就是可以利用威客赚的钱买个属于自己的车，可以带上老婆到各处走走，爬遍中国的三山五岳，名川大湖。闲暇时喜欢带上相机到公园、山上摄影，追逐一切美的事物。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664392', '3');
INSERT INTO keke_witkey_article VALUES ('248', '4', '0', '', '诚信体系之诚信保障', 'article', '', '', '&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;诚信保障金是加入&lt;span style=\"TEXT-DECORATION: underline\"&gt;诚信保障服务&lt;/span&gt;的卖家向阿里巴巴自缴的&lt;span style=\"color:red;\"&gt;诚信保证金&lt;/span&gt;及/或阿里巴巴授予的&lt;span style=\"color:red;\"&gt;诚信保障额度&lt;/span&gt;的总和。诚信保证金是指加入诚信保障服务的卖家自主向阿里巴巴预缴的诚信保障资金，用于确保交易中的买家合法权益能得到切实保障，在发生贸易争议且买家赔付申请成立时，将相应的保障资金赔付给买家，最大程度降低买家的合理损失。一定条件下，卖家可以支取、申请退回诚信保障金，并授权阿里巴巴冻结、处置诚信保障金。诚信保障额度是指阿里巴巴根据买家的需求，通过一定的评估模型，对加入诚信保障服务的卖家，授予一定额度的诚信保障金。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;诚信保障金是卖家为交易预交的一笔先行赔付金。可以有多种方式来展示&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664384', '6');
INSERT INTO keke_witkey_article VALUES ('249', '5', '0', '', '依法诚信纳税共建和谐社会', 'article', '', '', '&lt;span style=\"FONT-SIZE: 14px; LINE-HEIGHT: 25px\"&gt; 依法诚信纳税是社会主义和谐社会建设的客观要求，是广大纳税人共建共享和谐社会的具体体现。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;一、依法诚信纳税是社会主义和谐社会建设的重要物质保障&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;税收是国家参与国民收入分配最主要、最规范的形式，筹集财政收入稳定可靠。我国的税收收入已占财政收入的95%左右，是财政收入最主要的来源。我国实行社会主义制度，国家、集体和个人之间的根本利益是一致的，税收的性质是“取之于民，用之于民”。国家运用税收筹集财政收入，通过预算安排用于财政支出，提供公共产品和公共服务，进行交通、水利等基础设施和城市公共建设，支持“三农”发展，用于环境保护和生态建设，促进教育、科学、文化、卫生等社会事业发展，用于社会保障和社会福利，促进地区协调发展，进行国防建设，维护社会治安，用于政府行政管理，开展外交活动，保障国家安全，促进经济社会发展，满足人民群众日益增长的物质文化等方面的需要。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;近年来，我国税收收入保持持续快速增长势头。2006年达到37636亿元，比上年增长21.9%。这是国民经济快速增长和企业效益大幅提高的反映，是各级党委政府、社会各界对税收工作的支持和全国税务系统推进依法治税、加强税收征管的结果，也是广大纳税人依法诚信纳税为国家作出的贡献。国家税收较快增长，大大增强了财政实力，为增加公共产品和服务，改善民生提供了财力保障。要构建社会主义和谐社会，需要着力解决我国存在的经济社会、城乡发展不平衡等问题，支持农村发展和农民增收，发展医疗卫生、教育、文化等社会事业，促进就业和社会保障，进一步改善民生。这些都需要国家有强大的财力作保证。这就要求税收随着经济发展保持平稳增长，依法筹集更多的财政收入。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;二、依法诚信纳税是构建社会主义和谐社会的重要内容&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;诚信友爱就是全社会互帮互助、诚实守信，全体人民平等友爱、融洽相处。法制是社会和谐的重要保障，诚信是社会和谐的重要标志。这实际上就是要求坚持依法治国与以德治国相结合，推进社会主义和谐社会建设。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;依法诚信纳税从法律和道德两个方面规范、约束税务机关和纳税人的行为，是构建社会主义和谐社会的题中应有之义。我国宪法明确规定，中华人民共和国公民有依照法律纳税的义务。任何不依法纳税的行为，都要受到法律的惩处。依法诚信纳税也是纳税人最好的信用证明。诚信不仅是一种品行，更是一种责任；不仅是一种道义，更是一种准则；不仅是一种声誉，更是一种资源。就个人而言，诚信是高尚的人格力量；就企业而言，诚信是宝贵的无形资产。“人无信不立，商无信不兴。”失去了信用就难以在市场竞争中立足。只有坚持守法经营、诚信纳税，才能树立良好的商业信誉和形象，实现长远发展。广大纳税人必须依法诚信纳税，才能推动形成全社会诚实守信、文明守法的良好风气。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;三、依法诚信纳税、共建和谐社会需要征纳双方共同努力&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;税收征管法及其实施细则明确规定了税务机关和纳税人的权利与义务。就税务机关而言，就是要严格执法，文明服务。就纳税人而言，就是要自觉履行纳税义务，依照法律、行政法规的规定及时足额缴纳税款。同时，纳税人还享有依法申请减免缓税、行政复议、选择申报方式、检举、控告税务人员的违法行为等权利。实现依法诚信纳税，促进和谐社会建设，是纳税人与税务机关的共同责任。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;加大税法宣传力度，增强全社会依法诚信纳税意识。要进一步改进宣传方式，切实提高税法宣传的效果，广泛、及时、准确地向纳税人宣传税收法律、法规和政策，普及纳税知识；要加强办税服务、政策咨询和纳税操作实务知识的宣传培训，既要使纳税人明确纳税义务，又要使纳税人掌握如何履行纳税义务，为纳税人学法、用法和守法创造条件；要加强税收职能作用、税收取之于民、用之于民的宣传，使广大群众了解税收为各级政府社会管理和公共服务提供财力保障，调节经济和调节分配，促进国家经济建设和社会事业发展的重要作用，从而进一步增强依法诚信纳税的荣誉感和自觉性。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;改进和优化纳税服务，构建和谐的税收征纳关系。和谐的税收征纳关系是促进国家税收事业发展，发挥税收职能作用的重要条件，也是和谐社会的重要组成部分。要以提高税法遵从度和方便纳税人及时足额纳税为目标，加强和改进纳税服务工作，切实维护纳税人合法权益，构建和谐的税收征纳关系。在税收征管中要注意减轻纳税人办税负担，下大力气清理、简并要求纳税人报送的各种报表资料，避免纳税人重复报送。国、地税局要进一步做好联合办理税务登记、开展税法宣传、评定纳税信用等级以及加强税务检查协调等方面工作。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;大力推进依法治税，创造公平竞争的税收环境。认真落实依法征税，应收尽收，坚决不收过头税，坚决防止和制止越权减免税的组织收入原则，正确处理依法征税与支持经济发展、依法征税与完成税收计划、依法征税与纳税服务、依法征税与完善税制之间的关系，做到依法治税、依法征管。要强化税收执法监督。深入推行税收执法责任制，推广税收执法管理信息系统，严格执法过错责任追究。扎实开展税收执法检查，大力整顿和规范税收秩序。加强税务稽查，坚决打击涉税违法行为，继续严厉打击虚开和故意接受虚开增值税专用发票和其他可抵扣票，骗取出口退税，以及利用做假账、两套账、账外经营偷税等行为。对房地产、建筑安装、餐饮娱乐、食品药品生产、连锁经营超市等行业纳税情况以及高收入行业个人所得税缴纳情况开展专项检查，对一些税收秩序比较混乱、征管基础比较薄弱的地区进行税收专项整治。&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664375', '13');
INSERT INTO keke_witkey_article VALUES ('250', '358', '0', '匿名', '中金香港直销Facebook股权：初定100万股门槛', 'article', '21世纪经济报道', '', '&lt;p&gt;&nbsp; 　上帝关上了一扇门，也会开启一扇窗。&lt;/p&gt;&lt;p&gt;　　与平安信托“QDII股权挂钩结构性产品-脸谱(Facebook)未上市股权信托产品”失之交臂数天后(2011年1月6日、2月10日23版《高盛被指转手Facebook股权 平安信托密售内地富人》、《平安信托折戟Facebook 中国富豪梦碎IPO盛宴》曾予报道)，国内一家大型民营企业负责人王刚(化名)意外接到来自中金公司(香港)的电话，再度点燃他淘金Facebook上市盛宴的希望。&lt;/p&gt;&lt;p&gt;　　尽管Facebook一纸上市申请书已递进美国证券交易委员会(SEC)办公室，看似股权大局已定，但中金公司(香港)私人银行部依旧悄然为中国高端投资客，提供了一条投资Facebook未上市股权的“捷径”。&lt;/p&gt;&lt;p&gt;　　“相比平安信托由于赶不上Facebook上市进度被迫暂停信托产品销售，高端投资者可以通过中金(香港)引荐，直接与Facebook股权卖出方签订股权转让协议，并通过代持等手法避开Facebook(由于递交IPO申请)被冻结的限制。”一位接近中金(香港)人士透露，但中金(香港)并不参与具体的投资条款协商，仅仅作为交易撮合方。&lt;/p&gt;&lt;p&gt;　　然而，对境外公司股权投资经验并不多的王刚而言，这无疑是摸着石头过河。变数究竟有多少？&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;3700万美元门槛的诱惑&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　中金香港推介的Facebook未上市股权初定每股37美元，转让条款需投资者与卖方面谈商定。&lt;/p&gt;&lt;p&gt;　　相比此前“夭折”的平安信托QDII产品1000万元人民币投资门槛，中金(香港)暂定的投资门槛必须满足一次性投资100万股Facebook未上市股票。按中金(香港)暂定的每股37美元测算，每位参与者的投资门槛至少在3700万美元(约2.3亿人民币)。目前，准入门槛等细节还存在变数。&lt;/p&gt;&lt;p&gt;　　“其实中金(香港)只会精选几位有资金实力的高端投资者，参与投资Facebook未上市股权，主要面向境内。”一位接近中金(香港)的人士透露，目前中金(香港)给到潜在投资者的，只有一份Facebook招股说明书，具体的股权转让条款需要境内投资者与卖方面谈商定。&lt;/p&gt;&lt;p&gt;　　王刚迫切想了解的，是为何中金(香港)方面给出的Facebook收购价格要比平安信托高出2美元/股。&lt;/p&gt;&lt;p&gt;　　“因为中金(香港)的Facebook未上市股权转出方，与平安信托是截然不同的。”上述接近中金(香港)人士透露，“这也决定双方给境内高端投资者提供两种不同的投资路径。”&lt;/p&gt;&lt;p&gt;　　相比平安信托通过发行一款QDII股权挂钩结构性产品认购Facebook未上市股权，中金(香港)交易中，高端投资者则直接与买方签订股权转让协议。记者了解到，中金(香港)仅作为交易中介，股权转让的条款由买卖双方自主协商确定。&lt;/p&gt;&lt;p&gt;　　国内私人银行发起一款海外信托产品架构申请投资移民的阅历，让王刚对境外信托架构或结构性票据在避税与规避法规监管方面的比较优势有所了解。以平安信托“夭折”的信托产品为例，通过将Facebook未上市股权、境内出资人、股权转出方与投资收益分配条款共同设计成一款结构性票据，基于投资主体借鉴离岸信托产品架构，既能规避境内按自然人或公司法人纳税的监管规定，还能通过海外信托架构绕开美国金融投资的监管法规。&lt;/p&gt;&lt;p&gt;　　记者了解到，平安信托这一产品只需承担10%利息税，无需缴资本利得税。“但如果在中金(香港)通过转让方式得到Facebook未上市股权，能否避税及避开境外金融监管，却是未知数。”王刚说。&lt;/p&gt;&lt;p&gt;　　他更担心的是，由中金(香港)推荐的Facebook股权转让投资是否存在“代持”行为。&lt;/p&gt;&lt;p&gt;　　由于Facebook已递交上市申请且股权转让全部被冻结，此时投资其未上市股权，似乎只剩下“代持”路径。即投资者购买的股票Facebook可能先被原股东或某个特定机构代持，待股票解禁后，才通过特定方式划拨到他们的境外账户。一旦如此，代持期间投资者本身不属于上述Facebook股权的实际控制人，存在投资风险。&lt;/p&gt;&lt;p&gt;　　为此，王刚专门向某些了解境外代持架构的涉外律师咨询，却被告知代持往往涉及内幕交易等问题，可能面临当地监管部门调查。此外，代持交易本身的信息不透明问题，也容易引发股权转让条款纠纷。&lt;/p&gt;&lt;p&gt;　　王刚无奈表示，目前他对中金(香港)所推荐Facebook未上市股权转让的了解，仅局限在知道股份存在6个月禁售期，且由于Facebook已递交上市申请，代持行为似乎难以避免。&lt;/p&gt;&lt;p&gt;　　“条条大路通罗马。”一位了解境外代持架构的律师事务所合伙人透露，最常见的解决办案，是类似前述平安信托产品先采取某种离岸信托产品架构，将Facebook未上市股权、境内出资人、股权转出方、股票代持及划拨条款、投资收益分配条款共同设计在一个离岸信托产品中，然后将离岸信托产品注册在开曼群岛等金融监管相对宽松的“避税天堂”，“或者是通过一个特定的壳投资公司(SPV，如由王刚控制)，通过签订某些条款绑定Facebook未上市股权投资归属权，间接代持Facebook未上市股权。但这类代持行为通常是悄悄进行。”&lt;/p&gt;&lt;p&gt;　　“如果一定通过代持方式投资Facebook未上市股权，其中必有玄机。”王刚的直觉是，当Facebook上市步步临近时，一批原始股东急切向美国海外高端投资客抛售Facebook未上市股权，或许暗藏着某种不能说的“秘密”。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;股份来源：Facebook管理层？&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　令王刚不解的是，谁愿意在Facebook上市只差临门一脚时，宁可割舍IPO投资收益，也要抛售Facebook股权？&lt;/p&gt;&lt;p&gt;　　他很快找到答案——个别Facebook管理团队成员正暗中抛售Facebook未上市股权；而平安信托“夭折”信托产品所认购的Facebook未上市股权，极有可能来自高盛集团去年初发行的一款用于购买Facebook约2%股权的14亿美元规模特殊投资工具。目前，特殊投资工具以Facebook单一股东Glodman Sachs Clients的名义显示。&lt;/p&gt;&lt;p&gt;　　“巧合的是，特别投资工具的某些利益分成条款，和平安信托此前宣传的QDII产品类似。”王刚进行对比后发现，一是高盛所发行的特别投资工具约定“当海外投资者套现时，还需要向高盛缴纳5%投资收益”，平安信托也要求投资者的投资收益一旦超过20%，平安信托有权分享5%佣金提成；其次是平安信托这款QDII产品条款明确一旦Facebook上市，信托产品所投资结构性票据将自动转为100%参与Facebook股价波动的业绩挂钩票据，但这部分股权持有人仍将显示“海外投行”，似乎与“Glodman Sachs Clients”的代持方式不谋而合。&lt;/p&gt;&lt;p&gt;　　而且，王刚发现高盛这款特别投资工具出资人也有IPO前提前套现的动机。高盛发行特别投资工具目的之一，是通过设定某些条款将全球投资者“限定”为Facebook单一股东，但随着当前SEC着手调查Facebook登记在册的股东实际人数，个别“不合规”出资人可能需要提前套现，规避金融监管，“也不排除个别投资者自己想套现。”&lt;/p&gt;&lt;p&gt;　　不过，记者致电高盛方面求证时，其明确否认平安信托曾欲购买的Facebook未上市股权来自高盛。&lt;/p&gt;&lt;p&gt;　　相比而言，中金(香港)所推荐的Facebook未上市股权卖方背景更单纯。“据说Facebook个别高层管理人员打算趁IPO被热捧期间套现一部分股权，暂定的37美元/股转让定价，较Facebook内部讨论的上市发行价预期要低15%-20%。”&lt;/p&gt;&lt;p&gt;　　记者多方了解到，在Facebook内部，关于公司是否需要IPO仍存在争议，部分管理层认为公司上市主要是受到投行“逼迫”，而产生提前套现所持Facebook股权转而自主创业的打算。&lt;/p&gt;&lt;p&gt;　　“目前中金(香港)主要是寻找潜在的境内高端投资人，还没落实到邀请他们与Facebook股权卖方(或委托律师)协商具体投资条款的环节。但卖方希望一次性投资的100万Facebook股票最好不要分拆出售，避免出资人数过多而影响到代持架构的设立。”前述接近中金香港的人士强调，转让方式基本确定为股权直接转让，“代持”仅仅是Facebook上市申请期间相关股票被冻结的“过渡产物”，卖方愿意协助境内高端投资者完成“相关股票划转”。&lt;/p&gt;', '0', '中金香港直销Facebook股权：初定100万股门槛', '中金香港直销Facebook股权：初定100万股门槛', '中金香港直销Facebook股权：初定100万股门槛', '0', '1', '0', '1365664369', '8');
INSERT INTO keke_witkey_article VALUES ('226', '17', '0', '', '浪漫情人节专题活动：亲爱的，我们约会吧！', 'article', '', '', '&lt;div&gt;&lt;span style=\"font-size:16px;\"&gt;痴情的你和你爱的人有哪些感人爱情故事呢？&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;/span&gt;&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt; &lt;/span&gt;&lt;div&gt;&lt;br /&gt;今天，你最想对爱的人送出怎么样的话语呢？&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;span style=\"font-size:16px;\"&gt;请将你的真情、真心、真爱留在我们的社区平台吧！祝愿天下所有有情人珍惜爱情的分分秒秒，携手共度美好生活！&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&nbsp;&lt;span style=\"color:#e53333;\"&gt;要求：&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;1.可以讲述一个发生在你身上的感人爱情故事；&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;2.可以写一些对你爱的人最想说的话；&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459290', '3');
INSERT INTO keke_witkey_article VALUES ('203', '100', '0', '', '资讯测试', 'help', '', 'data/uploads/2011/12/19/133474eeeb5f4d626c.png', '你比发生大幅度是&lt;img src=\"data/uploads/2011/12/19/228664eeeb5f262e6f.gif\" alt=\"\" /&gt;&lt;br /&gt;', '0', '资讯测试', '资讯测试', '333333333333333333333333333333333333', '0', '2', '0', '1365665334', '63');
INSERT INTO keke_witkey_article VALUES ('218', '200', '0', '', '登录协议', null, '', '', '这里是登录协议内容这里<img alt=\"微笑\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"生气\" src=\"resource/js/xheditor/xheditor_emot/default/mad.gif\" /><img alt=\"敲打\" src=\"resource/js/xheditor/xheditor_emot/default/knock.gif\" /><img alt=\"抓狂\" src=\"resource/js/xheditor/xheditor_emot/default/crazy.gif\" />，这里是登录协议，这里是登录协议<br />', '0', '', '', '', '0', '1', '0', '1326704236', '0');
INSERT INTO keke_witkey_article VALUES ('219', '200', '0', '', '注册协议', null, '', '', '<p>这里是注册协议内容</p><p>内容自定啊啊啊<img alt=\"微笑\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"大哭\" src=\"resource/js/xheditor/xheditor_emot/default/wail.gif\" /><img alt=\"尴尬\" src=\"resource/js/xheditor/xheditor_emot/default/awkward.gif\" /><img alt=\"疑问\" src=\"resource/js/xheditor/xheditor_emot/default/doubt.gif\" />，哈呛楏堙压顶无可奈何花落去楏堙在<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704927', '0');
INSERT INTO keke_witkey_article VALUES ('220', '200', '0', '', '任务发布协议', null, '', '', '<p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议</p><p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议</p><p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704968', '0');
INSERT INTO keke_witkey_article VALUES ('221', '200', '0', '', '商品出售协议', null, '', '', '<p><span class=\"font14\" style=\"text-indent: 2em;\">此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。</span></p><p><span class=\"font14\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">买</span><span class=\"font14 block\" style=\"text-indent: 2em;\">成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份）</span></p><p><span class=\"font14 block\" style=\"text-indent: 2em;\">，就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。</span><span class=\"font14 block\" style=\"text-indent: 2em;\">如果不止一个卖方卖家，那么买家将被</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。</span></p>', '0', '', '', '', '0', '1', '0', '1326764543', '0');
INSERT INTO keke_witkey_article VALUES ('225', '358', '0', '新浪科技', '唯冠召开iPad维权发布会：起诉苹果是维权', 'article', '新浪科技', '', '&lt;p&gt;新浪科技讯 2月17日午间消息，深圳唯冠今日联合和君创业总裁李肃、国浩伙律师马东晓在北京召开发布会，说明唯冠与苹果之间的iPad商标权纠纷。唯冠创始人杨荣山表示，苹果公司当年购买iPad在全球多个国家商标权时存在欺诈行为，现在起诉苹果是维护权益。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;唯冠iPad的前世今生&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　深圳唯冠今天召开的维权发布会引来极大关注，在国浩律师事务所北京办公室的一间会议室里，60多家媒体挤满了整个会议室，很多最后赶到的媒体只能站在参与会议。&lt;/p&gt;&lt;p&gt;　　唯冠创始人杨荣山开场介绍了唯冠生产的iPad产品。据他介绍，iPad是一款产品名称(全称是internet Personal Access Device)，同是也是一个商标。唯冠公司在1998年下半年开始设计iPad产品，研发投入超过3000万美金。&lt;/p&gt;&lt;p&gt;　　杨荣山指出，iPad是唯冠iFamily系列产品之一，2000年正式对外发布。“这在当时是一款概念性产品。”2003年，唯冠研发新一代iPad产品。由于唯冠并不拥有iPad在美国的商标，iPad只能以OEM方式卖给惠普&lt;a href=\"http://weibo.com/hpchina?zw=tech\" target=\"_blank\" __sina1329459174687=\"7\"&gt;(微博)&lt;/a&gt;。&lt;/p&gt;&lt;p&gt;　　在今天的发布会上，唯冠公司向现场媒体散发了唯冠iPad的介绍资料。根据提供的材料，唯冠iPad是一款有鼠标、键盘、显示器的小型台式机，与苹果公司现在出售的iPad平板电脑完全不同。另外，唯冠iFamily系列产品还包括iNote、iPDA、iDVD、iClient等。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;苹果购买iPad商标过程存在欺诈&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　据杨荣山回忆，在iPad商标上唯冠与苹果曾有过“交火”。2003年，苹果曾在欧洲注册iPod商标，因为iPod与iPad有很大的相似性，唯冠花了很多精力阻止苹果，但最后选择放弃。&lt;/p&gt;&lt;p&gt;　　杨荣山说，2008年苹果公司经过“精心设计”，在英国成立了一家名称为IP Application Development的公司(简称“英国IP公司”)，主动与唯冠联系，说公司简称与iPad商标很相似，要求购买。双方最初商谈的只是iPad在欧洲地区的商标权。&lt;/p&gt;&lt;p&gt;　　杨荣山说，英国IP公司最初出价是2万英镑，“这还不够注册费用，所以最初没有同意出售。”不过，后来英国IP公司向唯冠公司发了一封邮件，称这一价格合适，同时表示“如果不卖，就会发起法律诉讼。”&lt;/p&gt;&lt;p&gt;　　杨荣山表示，2009年唯冠出现财务危机，公司正在打算收缩海外业务，唯冠台北公司主张卖掉iPad商标，因为如果诉讼，公司要花很多律师费。&lt;/p&gt;&lt;p&gt;　　于是，2009年12月，杨荣山授权员工麦世宏签署相关协议，将10个商标的全部权益以3.5万英镑的价格转让给英国IP公司。&lt;/p&gt;&lt;p&gt;　　因为双方签订的协议附件中提到包括中国内地的iPad商标转让协议，于是这也成为了苹果与唯冠公司双方产生纠纷的根源所在。&lt;/p&gt;&lt;p&gt;　　杨荣山认为，苹果在这一过程中存在欺诈行为。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;唯冠没有提出具体赔偿&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　针对网络上流传的100亿元索赔，杨荣山也做出回应。他表示，虽然唯冠现在存在财务危机，但我们现在还没有公开要求具体赔偿数字。&lt;/p&gt;&lt;p&gt;　　“我们现在是根据中国法律，维护权益。网络上流传的索赔100亿元，并不是唯冠的要求，那是专业人士的看法。”杨荣山表示。&lt;/p&gt;&lt;p&gt;　　他还表示，苹果确实把iPad做到尽善尽美，受到全球用户喜欢，但他们确实没有商标就进入中国，唯冠现在的行为就是为了维护权益。&lt;/p&gt;&lt;p&gt;　　他还表示，“很多人认为我们抢注商标，但实际上，iPad从1998年就伴着唯冠到今天。唯冠现在很委屈。”&lt;/p&gt;&lt;p&gt;　　他透露，唯冠正在寻求新的机会重新站起来，并表示现在已经有了重组计划和投资人。(罗亮)&lt;/p&gt;&lt;!-- publish_helper_end --&gt;&lt;!-- 分享到 begin --&gt;', '1', '唯冠召开iPad维权发布会：起诉苹果是维权', '唯冠召开iPad维权发布会：起诉苹果是维权', '唯冠召开iPad维权发布会：起诉苹果是维权', '0', '1', '0', '1329459262', '21');
INSERT INTO keke_witkey_article VALUES ('230', '203', '0', '匿名', '客户如何保障帐户安全', 'article', '客客', '', '&lt;div class=\"con clearfix\"&gt;网上交易，安全第一。&lt;br /&gt;&lt;br /&gt;大家都比较关心交易过程中的安全问题，而往往疏忽了第一道安全防线，哪就是自己的帐号密码！&nbsp;&lt;br /&gt;比较安全的密码至少应该符合下面的条件：&lt;br /&gt;&lt;br /&gt;1,组成部分：字母，数字，特殊字符。&lt;br /&gt;2,长度：密码的长度应该在6至18位之间。&lt;br /&gt;&lt;br /&gt;示例：&lt;br /&gt;&nbsp;just@1108556&lt;br /&gt;&nbsp;hellococo#38324&lt;br /&gt;&nbsp;3638&amp;heyjude&lt;br /&gt;&lt;br /&gt;如果您的密码符合以下条件，您的帐号现在正在面临安全威胁！&lt;br /&gt;&lt;br /&gt;1,密码中包含用户名。&lt;br /&gt;2,密码中包含简单的数字串（如12345）、字符串(如abcd,asdf)。&lt;br /&gt;3,密码中包含您常用的信息，如电话号码、生日、邮编、区号等。 &nbsp;&lt;/div&gt;', '0', '客户如何保障帐户安全', '客户如何保障帐户安全', '客户如何保障帐户安全', '5', '1', '0', '1364866260', '6');
INSERT INTO keke_witkey_article VALUES ('231', '17', '0', '', '提现公告申明', 'article', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;提现打款申明：我们是在每周二统一处理对推手上周的提现。因为现在每周提现的推手人数较多，当天处理提现的时间将会受影响，届时将会延后继续处理推手的提现。对于推手提出已收到款，但后台的提现未处理问题，我们在这里作出以下说明，我们是在全部打完款之后，再进行统一处理。&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459594', '2');
INSERT INTO keke_witkey_article VALUES ('232', '17', '0', '', '关于推手抄袭他人作品交稿的处罚规定', 'article', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;近来，网站接到举报，有推手通过抄袭他人作品来交稿，侵犯他人知识产权，严重违反了网站的规定。&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 为此，网站对抄袭他人作品的，情节轻微的进行警告处理（抄袭稿件做废），情节严重的进行ID禁封处理。&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459681', '8');
INSERT INTO keke_witkey_article VALUES ('233', '358', '0', '新浪科技', '中国电信下周宣布引入iPhone 4S', 'article', '新浪科技', '', '&lt;p id=\"[object]\"&gt;新浪科技讯 2月17日消息，知情人士透露，中国电信&lt;a href=\"http://weibo.com/ct189?zw=tech\" target=\"_blank\" __sina1329459735968=\"7\"&gt;(微博)&lt;/a&gt;将于下周宣布引入iPhone 4S。届时，CDMA版iPhone 4S的价格和补贴政策将明了。&lt;/p&gt;&lt;p&gt;　　此前的1月中旬，中国联通&lt;a href=\"http://weibo.com/chinaunicom?zw=tech\" target=\"_blank\"&gt;(微博)&lt;/a&gt;率先引入了WCDMA版的iPhone 4S，但随后也传来了中国电信与苹果达成iPhone 4S的协议，目前，关于电信版iPhone 4S的资费等传言漫天飞，但其实很多具体情况将于下周揭晓。&lt;/p&gt;&lt;p&gt;　　而且，关于电信版iPhone 4S还有很多矛盾的说法，比如其到底是机卡分离的还是机卡一体的，这也需要中国电信自己来透露。&lt;/p&gt;', '0', '中国电信下周宣布引入iPhone 4S', '中国电信下周宣布引入iPhone 4S', '中国电信下周宣布引入iPhone 4S', '0', '1', '0', '1329459777', '5');
INSERT INTO keke_witkey_article VALUES ('234', '203', '0', '', '客服真实性验证', 'article', '', '', '请根据网站的联系电话致电本公司验证。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459878', '2');
INSERT INTO keke_witkey_article VALUES ('235', '358', '0', '人民网', '国际权威组织称中国手机网速排全球倒数第二', 'article', '人民网', '', '&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;继国内固网宽带被爆价格高、网速慢后，再有国际权威组织报告显示，国内手机互联网连接速度排在世界末端，仅比印度好。有分析显示，手机互联网速度慢制约了国内手机视频网站发展。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;根 据GSMA(全球移动通信协会)近日公布的报告，手机宽带连接速度最慢的两个国家分别是印度和中国。相反地、韩国、澳大利亚、新西兰等亚太地区和国家，手 机网速均较快。截至2010年，印度和中国平均连接速度分别仅为19 kbps和50 kpbs。而日本和韩国，平均速度已达1400 kbps。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;不 过由于中印两国手机互联网发展迅速，GSMA也给予乐观的估计。GSMA认为，按照现在的发展速度，到2015年，印度运营商的移动宽带平均速度将达到 1037 Kbps，中国可达到1384 Kbps。但这仍然大大落后于其他国家——因为届时韩国将达到4984 Kbps，澳大利亚和新西兰将达到5194 Kbps。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;对于GSMA的报告，有业内人士分析认为，中国2009年才发3G牌，3G用户人数直到2011年才出现突飞猛进。因此，GSMA的报告引用2010年的数据进行比较有失偏颇。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;“目前国内手机网速对手机视频业务影响最大。”国内某视频网站一高管向表示，国内手机视频网站发展缓慢，很大程度上源于手机上网速度普遍不快，而且资费价格相对高。因此，尽管手机视频业务普遍被视为“黄金业务”，但短期内仍难有重大突破。&lt;/p&gt;', '0', '国际权威组织称中国手机网速排全球倒数第二', '国际权威组织称中国手机网速排全球倒数第二', '国际权威组织称中国手机网速排全球倒数第二', '0', '1', '0', '1329460032', '2');
INSERT INTO keke_witkey_article VALUES ('236', '203', '0', '', '为什么采用“实名认证”？', 'article', '', '', '&lt;strong&gt;&lt;/strong&gt; 为确保所有用户的权益能得到有效保护，保障会员帐户资金的安全。用户在申请会员帐户资金提现时，为使你能及时、准确的收到汇款，我们采取了 实名认证措施，以防止冒领或密码遗失等意外原因而导致你的损失。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460211', '4');

INSERT INTO keke_witkey_article VALUES ('238', '5', '0', '新京报', '威客国内人数超3000万：部分欺诈行为仍难控制', 'article', '新京报', '', '&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11352678\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-family:KaiTi_GB2312, KaiTi;\"&gt;&lt;/span&gt;&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11319103\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　目前大多威客会通过各种威客网站来寻找任务，完成交易。有些热门行业竞争激烈，一开始未必能够中标，准备做威客要多学习并有自己的专项技能。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客，一般指那些通过互联网把自己的知识、智慧、经验、技能转换成实际收益的人。这一概念最早于2005年出现，后来经过媒体的宣传报道，威客群体不断发展壮大，国内人数如今已经超过3000万。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　而且由于威客与网络息息相关，工作形式灵活自由，所以备受年轻人的青睐，更有机构在去年将威客评为“90后”最为推崇的十大时尚职业之一。有专家以及资深威客提醒，虽然现在专职做威客的人越来越多，但兼职仍然是主流。专职做威客挑战较大，需谨慎。兼职做威客也需调整好与本职工作的关系。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　IT、设计、网站建设、网络营销等任务最热门&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客(witkey)模式即人的知识、智慧、经验、技能通过互联网转换成实际收益的互联网新模式。主要应用包括解决科学、技术、工作、生活、学习等领域的问题，体现了互联网按劳取酬和以人为中心的新理念。这一理论最早由国人刘锋于2005年提出。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“其实，威客最初的定义并不算一项职业，只算是一种互联网现象，但渐渐地互联网帮助‘回答问题’成为一种职业。”威客理论首创者、威客网创始人刘锋解释，“威客的产生就是鼓励知识是值钱的：知识和技能越多，财富才会越多。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　记者了解到，目前大多威客会通过各种威客网站来寻找任务，完成交易。而任务的门类则会有几百项之多，除了设计、建筑、法律、翻译等较专业的任务外，还有如爱情表白、道歉短信、捧场、排队、宝宝取名等非常生活化的任务。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　据国内最大的威客网站猪八戒网&lt;a href=\"http://weibo.com/zhubajiewang?zw=finance\" target=\"_blank\"&gt;(微博)&lt;/a&gt;副总裁刘川郁介绍，目前IT、设计、网站建设、网络营销等门类的任务是最热门的。威客寻找任务的方式一般有两种，现在较多的是客户发布悬赏任务，威客拿出自己的方案来竞标，另一种是一对一速配，客户直接寻找威客来完成任务。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　好的威客要有独当一面的专业技能&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“威客工作的最大优点是公平：在这里没有人会去看一个人的学历、毕业于什么学校、家庭背景等等，威客凭的是真刀真枪的实干能力。而且随着电子商务不断向服务业发展，威客的发展前景将会很好。”刘川郁指出，“现在大部分的威客仍然是兼职，但也呈现出专职威客越来越多的趋势。有的威客有了一定的知名度之后，还会成立自己的工作室或者建立公司，进行创业。而从年龄段来讲，80后、90后的威客占大多数，超过了60%。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　高旭是河南建筑职业技术学院的一名大三学生，去年3月份他开始利用课余时间做威客，主要完成一些网络营销的任务，如帮人发广告信息等等。“刚开始做时比较难，有时一天就挣几毛钱、几块钱，后来慢慢开发出市场之后，平均一天能挣50块钱。但网络营销门槛低，竞争比较激烈，现在也不太好做。”高旭坦言，作为学生，难的任务做不好，简单的任务又没前途，威客也不是那么好当的。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“一名好的威客一定要有某方面的专业技能，能够独当一面。”向阳生涯管理咨询集团首席职业规划师洪向阳指出，“从综合角度看，威客还需要具有项目管理的能力、时间管理的能力、与客户的沟通能力。同时，还需要一定的自我约束能力。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客要有满足客户需求的能力&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　资深威客刘羽也认为，做威客需要耐心，尤其专职威客很可能会天天对着电脑工作，不能三天打鱼两天晒网。几年前从事平面广告设计工作的刘羽兼职做威客，后来他辞去工作成为专职威客，现在月收入基本稳定在两万多。他建议，刚做威客时要多收集、多研究别人的案例，可以从兼职做起，等到技术过硬、收入稳定之后，如有需要可以考虑专职来做。他同时表示，专职做威客肯定会有一定的压力。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“其实，我们网站注册的威客大概也就60%左右可以挣到钱，当然有些注册用户可能只是看，并没有真正参与。但确实有些威客在开始的几个月里是挣不到钱的。”刘川郁评价，“在这个平台上，威客要有能满足客户需求的能力。很多年轻人喜欢这个平台，因为一个人的能力在这里可以得到真正的检验。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　■ 威客说&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　兴趣为先并分辨行业的整体水平&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●武烨，专职威客&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　以前我在一家事业单位上班，在上班之余做威客，主要做网页设计。刚开始做的时候我不知道自己是什么水平，也没有什么案例，只是做悬赏任务，幸运的是我交的第一个稿子就中标了。后来我做的东西逐渐被人们所认可，加上我喜欢自己支配时间，所以去年就辞职专职做威客了。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我觉得做威客首先要自己感兴趣，至少要能让自己在工作中得到满足，这样才能坚持下去。其次对行业的整体水平要有所分辨，不能妄自尊大。可以试着先做一做，如果自己的东西能被人认可，或者自己提高得很快，一次比一次完成得好，中标的把握越来越大，甚至有客户主动来找你，就可以考虑继续做下去。否则，就要想想自己是否真的适合威客的工作。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　一些欺诈行为还没有好的机制去控制&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●罗萌，兼职威客&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　两年前，我看到周围有人在做威客，我觉得好玩也兼职做起平面设计的威客。威客的能力要求和具体岗位的要求是差不多的，你必须要有某项特殊的技能。刚开始的时候我一个月的收入也就一千多，后来慢慢做好之后一个月可以挣到三四千。我现在一天大概做四、五个任务，不会觉得累。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我个人建议人们不要做专职威客，那样会很累。像平面设计的门槛并不高，竞争很激烈。要想挣得多一些，就要每天完成很多任务。当然有些行业可能完成任务的钱会多一些。有时能否中标不光靠实力，也要看运气好不好。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　值得注意的是，做威客有时也会遇到欺诈行为，造成经济损失，但目前威客网站也还没有特别好的机制去控制。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　■ 业内建议&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　线下交易隐患大保障少&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●刘川郁，猪八戒网副总裁&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　现在的威客网站有很多，良莠不齐。如果想做威客一定要选择大的、知名的正规威客网站，这样才能获得更好的平台保障。如今部分威客还选择进行线下交易，这样隐患也很大，双方都得不到保障。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我认为虽然术业有专攻，但威客最好也不要把自己局限在很窄的范围内。在平台上，很多都是真实的案例，比如从设计来讲，你可以看到某家公司中标的标志，可以看看其他威客是怎样按照客户的要求来完成设计的，这些都是可以学习的。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　最好能促进本职工作&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●洪向阳，向阳生涯管理咨询集团首席职业规划师&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　目前来看，威客达到职业化的人并不是太多，大部分人还是把它当作一份兼职来做。我认为，以学习的、参与的态度来做威客是一个比较好的对待方式，尤其对很多年轻的学生和职场人来讲，这是一种很好的学习方式，参与进来也比较容易，而且自身的能力也可以得到检验。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　但是兼职做威客一定要避免跟自己的本职工作有冲突，要调整好与本职工作的关系，毕竟一个人的精力是有限的。同时也要注意是否对本职工作会有促进作用，最好选择能给本职工作带来正面影响的兼职工作。&lt;/span&gt;&lt;/p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;/h1&gt;&lt;br /&gt;&lt;/p&gt;&lt;/h1&gt;', '0', '威客国内人数超3000万：部分欺诈行为仍难控制', '威客国内人数超3000万：部分欺诈行为仍难控制', '威客国内人数超3000万：部分欺诈行为仍难控制', '0', '1', '0', '1329460459', '14');
INSERT INTO keke_witkey_article VALUES ('299', '0', '0', '客客族', '关于我们', 'about', 'http://www.kekezu.com', null, '&lt;span style=\"font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif;color:#555555;font-size: 14px; line-height: 30px; \"&gt;&lt;/span&gt;&lt;h1 style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 2px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; font-size: 24px; font: normal normal normal 24px/30px \'Microsoft Yahei\'; color: rgb(51, 51, 51); border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); \"&gt;武汉客客信息技术有限公司&lt;/h1&gt;&lt;p style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 14px; \"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;武汉客客信息技术有限公司是中国领先的客文化交易平台解决方案提供商，扎根于高校林立的学府之都武汉，是一家拥有自主知识产权的高科技软件企业。&lt;/p&gt;&lt;p style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 14px; \"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客客以互联网急速发展的客文化现象为背景，积极创新深度分析用户社区行为和传统电子商务交易模式，客客团队新电子商务模式和互联网前沿开发技术的研究得到了更广泛的站长和用户群的支持。&lt;/p&gt;&lt;p style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 14px; \"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客客团队由产品策划、文档撰写、UI设计、WEB前端、程序开发、售前/售后支持等各方面富有激情和创造力的专业人才组成，团队成员均有长期的互联网产品研发和运营经验。&lt;/p&gt;&lt;p style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 14px; \"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2010年07月，客客团队正式推出了客客出品专业威客系统(KPPW)，很快成为了国内最知名使用站长最多的威客系统。且经过团队技术不断的沉淀和创新，新的KPPW2.0完成了以“基础框架+任务模型+商品模型”为基本的产品理念，提供了更多符合创意型、知识型、经验型产品特性，并深入行业垂直化发展的威客交易模式，成为了威客行业发展新的方向标。&lt;/p&gt;&lt;br /&gt;&lt;p style=\"border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 14px; \"&gt;企业使命：垂直专业威客交易解决方案提供商，网络客文化推广！&lt;br /&gt;企业文化：快乐 专注 创新 分享&lt;/p&gt;', '0', '武汉客客信息技术有限公司是中国领先的客文化交易平台解决方案提供商，扎根于高校林立的学府之都武汉，是一家拥有自主知识产权的高科技软件企业。\r\n企业文化：快乐 专注 创新 分享', '武汉客客信息技术有限公司是中国领先的客文化交易平台解决方案提供商，扎根于高校林立的学府之都武汉，是一家拥有自主知识产权的高科技软件企业。\r\n企业文化：快乐 专注 创新 分享', '武汉客客信息技术有限公司是中国领先的客文化交易平台解决方案提供商，扎根于高校林立的学府之都武汉，是一家拥有自主知识产权的高科技软件企业。\r\n企业文化：快乐 专注 创新 分享', '0', '1', '0', '1399621368', '56');
INSERT INTO keke_witkey_article VALUES ('308', '0', '0', '客客族', 'KPPW2.2震撼上线1', 'bulletin', 'http://www.kekezu.com', null, 'KPPW2.2震撼上线1', '0', 'KPPW2.2震撼上线1', 'KPPW2.2震撼上线1', 'KPPW2.2震撼上线1', '1', '1', '0', '1365663816', '8');
INSERT INTO keke_witkey_article VALUES ('302', '0', '0', '客客族', 'KPPW2.2震撼上线2', 'bulletin', 'http://www.kekezu.com', null, 'KPPW2.1震撼上线2', '0', 'KPPW2.2震撼上线2', 'KPPW2.2震撼上线2', 'KPPW2.2震撼上线2', '2', '1', '0', '1365663829', '5');
INSERT INTO keke_witkey_article VALUES ('303', '0', '0', '客客族', 'KPPW2.2震撼上线3', 'bulletin', 'http://www.kekezu.com', null, '&lt;span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;color:#666666;line-height: 25px; \"&gt;&lt;a href=\"http://localhost/kppw21/control/admin/index.php?do=article&amp;view=edit&amp;art_id=302&amp;type=bulletin&amp;page=1\" style=\"margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 2px; padding-right: 5px; padding-bottom: 2px; padding-left: 5px; list-style-type: none; -webkit-transition-property: background; -webkit-transition-duration: 0.1s; -webkit-transition-timing-function: ease-out; -webkit-transition-delay: 0s; text-decoration: none; border-top-left-radius: 3px 3px; border-top-right-radius: 3px 3px; border-bottom-right-radius: 3px 3px; border-bottom-left-radius: 3px 3px; color: rgb(102, 153, 204); \"&gt;KPPW2.1震撼上线3&lt;/a&gt;&lt;/span&gt;', '0', 'KPPW2.2震撼上线3', 'KPPW2.2震撼上线3', 'KPPW2.2震撼上线3', '3', '1', '0', '1365663840', '6');
INSERT INTO keke_witkey_article VALUES ('304', '0', '0', '客客族', 'KPPW2.2震撼上线4', 'bulletin', 'http://www.kekezu.com', null, 'KPPW2.2震撼上线4', '1', 'KPPW2.2震撼上线4', 'KPPW2.2震撼上线4', 'KPPW2.2震撼上线4', '4', '1', '0', '1365664147', '13');
INSERT INTO keke_witkey_article VALUES ('300', '0', '0', '客客族', '联系我们', 'about', 'http://www.kekezu.com', null, '&lt;a href=\"http://wpa.qq.com/msgrd?v=3&amp;uin=1552193416&amp;site=qq&amp;menu=yes\" target=\"_blank\"&gt;&lt;img title=\"点击这里给我发消息\" alt=\"点击这里给我发消息\" src=\"http://wpa.qq.com/pa?p=2:1552193416:41 &amp;r=0.2431360476765686\" border=\"0\" /&gt;&lt;/a&gt;&lt;h1 style=\"border-width: 0px 0px 2px;\" normal=\"\" none=\"\" solid=\"\" 204=\"\" rgb=\"\" 51=\"\" 0px=\"\" 5px=\"\" 10px=\"\" yahei=\"\" microsoft=\"\"&gt;联系我们&lt;/h1&gt;&lt;div class=\"col2\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 454px; height: 312px; font-size: 14px; float: left;\"&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;公司地址：武汉市洪山区雄楚大街御景名门3号楼1005室&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;咨询热线：027 87733922&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;客服QQ：&lt;span style=\"color:#ff660;font: 15px/normal 微软雅黑, 宋体; text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; float: none; display: inline !important; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\"&gt;&lt;span style=\"color:#000000;\"&gt;&lt;a href=\"http://wpa.qq.com/msgrd?v=3&amp;uin=293459571&amp;site=qq&amp;menu=yes\" target=\"_blank\"&gt;293459571&lt;/a&gt;&lt;span style=\"font: 15px/normal 微软雅黑, 宋体; text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; float: none; display: inline !important; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\"&gt;&lt;/span&gt;,&lt;a href=\"http://wpa.qq.com/msgrd?v=3&amp;uin=1552193416&amp;site=qq&amp;menu=yes\" target=\"_blank\"&gt;1552193416&lt;/a&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;固定电话:18971533922&lt;/p&gt;&lt;/div&gt;&lt;div class=\"col2\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 454px; font-size: 14px; float: left;\"&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;&lt;img style=\"border-width: 0px; margin: 15px auto; padding: 0px; color: transparent; clear: both; font-size: 0px; vertical-align: middle; display: block; max-width: 100%;\" alt=\"武汉市洪山区雄楚大街御景名门3号楼1005室\" src=\"http://www.kekezu.com/tpl/default/img/map.gif\" /&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=\"col3\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 299px; font-size: 14px; float: left;\"&gt;&lt;h2 style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;售前咨询&lt;/h2&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;如果您欲成为客客出品系统商业授权用户或项目定制开发，请进入官网右侧网上客服系统，直接与工作人员进行在线咨询。&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日视情况而定）&lt;/p&gt;&lt;/div&gt;&lt;div class=\"col3\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 299px; font-size: 14px; float: left;\"&gt;&lt;h2 style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;售后咨询&lt;/h2&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;如果您欲成为客客出品系统商业授权用户或项目定制开发，请进入官网右侧网上客服系统，直接与工作人员进行在线咨询。&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日视情况而定）&lt;/p&gt;&lt;/div&gt;&lt;div class=\"col3\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 299px; font-size: 14px; float: left;\"&gt;&lt;h2 style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;技术协助&lt;/h2&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;我们特别为企业授权及项目定制开发用户提供了即时在线技术支持快速通道，如果您在使用过程中遇到技术问题，请直接与您技术支持取得联系，或通过客客官网论坛商业用户服务区留言，我们会即时与您取得联系。&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日不予受理）&lt;/p&gt;&lt;/div&gt;&lt;div class=\"col3\" style=\"border-width: 0px; margin: 0px; padding: 0px; width: 299px; font-size: 14px; float: left;\"&gt;&lt;h2 style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;战略合作&lt;/h2&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;如果您欲与武汉客客信息技术有限公司建立战略合作关系，请发邮件至&lt;a style=\"border-width: 0px; margin: 0px; padding: 0px; color: rgb(25, 77, 176); font-size: 14px; text-decoration: none;\" href=\"mailto:293459571@qq.com\"&gt;293459571@qq.com&lt;/a&gt;&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;为了能及时与您取得联系，请留下有效的联系方式（如：手机号码或QQ、MSN）及合作意向内容&lt;/p&gt;&lt;p style=\"border-width: 0px; margin: 0px; padding: 0px; font-size: 14px;\"&gt;受理时间：工作人员会正常收取邮件后24小时内给予回复（周末及节假日受理时间顺延）&lt;/p&gt;&lt;/div&gt;&lt;div style=\"top: 0px;\"&gt;﻿﻿&lt;/div&gt;&lt;div style=\"top: 0px;\"&gt;﻿﻿&lt;/div&gt;', '0', '联系我们\r\n公司地址：武汉市洪山区雄楚大街御景名门3号楼1005室\r\n咨询热线：027 87733922', '联系我们\r\n公司地址：武汉市洪山区雄楚大街御景名门3号楼1005室\r\n咨询热线：027 87733922', '联系我们\r\n公司地址：武汉市洪山区雄楚大街御景名门3号楼1005室\r\n咨询热线：027 87733922', '0', '1', '0', '1398854897', '48');
INSERT INTO keke_witkey_article VALUES ('310', '325', '0', '发生地方', '生生世世', 'help', '放松放松', null, 'ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooollbcghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '0', '放到沙发上的', '发生地方是否', '分公司发送', '0', '1', '0', '1365665323', '1');
INSERT INTO keke_witkey_article VALUES ('312', '0', '0', '', '服务条款', 'about', '', null, '本服务协议双方为本网站与本网站用户，本服务协议具有合同效力。 &lt;br /&gt;您确认本服务协议后，本服务协议即在您和本网站之间产生法律效力。请您务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向本网站咨询。 &lt;br /&gt;无论您事实上是否在注册之前认真阅读了本服务协议，只要您点击协议正本下方的&quot;注册&quot;按钮并按照本网站注册程序成功注册为用户，您的行为仍然表示您同意并签署了本服务协议。&nbsp; &lt;br /&gt;1．本网站服务条款的确认和接纳&nbsp; &lt;br /&gt;本网站各项服务的所有权和运作权归本网站拥有。本服务协议双方为本网站与本网站用户，本服务协议具有合同效力。&lt;u&gt; &lt;br /&gt;&lt;/u&gt;您确认本服务协议后，本服务协议即在您和本网站之间产生法律效力。请您务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向本网站咨询。 &lt;br /&gt;无论您事实上是否在注册之前认真阅读了本服务协议，只要您点击协议正本下方的&lt;u&gt;&quot;注&lt;/u&gt;册&quot;按钮并按照本网站注册程序成功注册为用户，您的行为仍然表示您同意并签署了本服务协议。&nbsp; &lt;br /&gt;1．本网站服务条款的确认和接纳&nbsp; &lt;br /&gt;本网站各项服务的所有权和运作权归本网站拥有。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1399621350', '38');
INSERT INTO keke_witkey_article VALUES ('313', '0', '0', '', '隐私政策', 'about', '', null, '&lt;h5&gt;1.使用者非个人化信息&lt;/h5&gt;&lt;p class=\"colorp\"&gt;我们将通过您的IP地址来收集非个人化的信息，例如您的浏览器性质、操作系统种类、给您提供接入服务的ISP的域名等，以优化在您计算机屏幕上显示的页面。通过收集上述信息，我们亦进行客流量统计，从而改进网站的管理和服务。&lt;/p&gt;&lt;h5&gt;&lt;span style=\"background-color: rgb(255, 255, 255);\"&gt;2.个人资料&lt;/span&gt;&lt;/h5&gt;&lt;p class=\"colorp\"&gt;&lt;span style=\"background-color: rgb(255, 255, 255);\"&gt; 2.1当您在本网站进行用户注册登记、参加网上或公共论坛等各种活动时，在您的同意及确认下，本网站将通过注册表格等形式要求您提供一些个人资料。这些个人资料包括:&lt;/span&gt;&lt;/p&gt;&lt;p class=\"colorp\"&gt;&lt;span style=\"background-color: rgb(255, 255, 255);\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1 个人识别资料：如姓名、性别、年龄、出生日期、身份证号码（或护照号码）、电话、通信地址、住址、电子邮件地址等资料。 &lt;/span&gt;&lt;/p&gt;&lt;p class=\"colorp\"&gt;&lt;span style=\"background-color: rgb(255, 255, 255);\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;2.1.2 个人背景： 职业、教育程度、收入状况、婚姻、家庭状况。&lt;/span&gt;&lt;/p&gt;&lt;p class=\"colorp\"&gt;&lt;span style=\"background-color: rgb(255, 255, 255);\"&gt; 2.2 我们承诺在未经您同意及确认之前，本网站不会将您为参加本网站之特定活动所提供的资料利用于其它目的(惟按下列第6条规定应政府及法律要求披露时不在此限)。&lt;/span&gt;&lt;/p&gt;', '0', '', '', '', '0', '1', '0', '1399621424', '27');
INSERT INTO keke_witkey_article VALUES ('317', '17', '0', '', '什么是威客？', 'article', '', '', '威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;在新经济（商业）环境中做威客的人，种类各式各样，除了各个行业、各个领域之外，还包括掌握各类创新理论（经济和管理）的人。在这些掌握各类创新理论（经济和管理）的人中，有经济威客、管理威客和网络威客等各个领域的威客。甚至可以夸张地说，在互联网威客这平台上，没有所谓的经济学家、管理学家等各式各样的专家学者，只有威客。而威客类网站的出现，为有知识生产加工能力的个人创造了一个销售知识产品的商业平台和机会。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;总而言之，威客模式的出现，为个人的知识（资源）买卖带来商机。随着威客时代的来临，每一个威客都可以将自己的知识、经验和学术研究成果作为一种无形的“知识商品”和服务在网络上来销售。威客通过威客网站这个平台买卖“知识产品”，让自己的知识、经验和学术研究成果逐步转化成个人财富。在威客模式下，个人的知识（资源）不但是力量，而且又是个人的财富。在以知识资源应用开发的新经济（商业）时代，无论是个人或组织拥有知识就拥有财富。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1365664401', '5');
INSERT INTO keke_witkey_article VALUES ('329', '358', '0', '', '交易规则测试文单', 'article', '', 'data/uploads/2014/04/26/4491535b6cd2eee5e.jpg', '交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单交易规则测试文单', '0', '交易规则测试文单', '交易规则测试文单', '交易规则测试文单', '0', '1', '0', '1398500565', '14');
INSERT INTO keke_witkey_article VALUES ('330', '358', '0', '', '网上做威客 调查赚钱', 'article', '', 'data/uploads/2014/04/30/184469097953604e828dd1e.jpg', '&lt;span style=\"FonT-siZe: 22px\"&gt;&lt;span style=\"FonT-siZe: 24px\"&gt;&lt;span style=\"color:#268311;\"&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;“做威客也不是那么容易。”第一单任务就给了晓丽当头一棒。&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;这单任务悬赏3000元，是帮一家公司做一个网站，由于跟客户沟通、需求了解不够，做出来的网站客户却不满意，“差点就白辛苦了。”&nbsp;&lt;wbr&gt;&lt;/wbr&gt;&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;最终，通过猪八戒网的仲裁裁决，双方各让一步，邱锋才拿到1800元。&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;做威客业务扩展到了美国&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;有了第一单任务的教训，晓丽把“与客户充分沟通”摆在了首位，中标的任务也越来越多，晓丽还成立了一个工作室，专门做网站规划、建设，任务从重庆，扩展到了北京上海广州深圳，甚至美国。&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;“做威客，就像在淘宝网上开店一样，要的不仅是业务，更要客户的好评。”依托于猪八戒网在国内影响力和市场占有率的提升，晓丽的等级已到了猪六戒（猪八戒为最高等级，猪一戒为起始等级），是重庆本地等级最高的威客。“做威客不仅改变了我的择业观，更彻底改变了我的创业观。”&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;大学生曲线就业的新选择&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;人物&gt;&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;9月23日，四川广安的张勇，在电话那头与晨报记者聊了聊他的威客生活。已经是猪八戒网“猪八戒”级别威客的张勇觉得，“当威客，是大学生曲线就业的一个新选择。”&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"FonT-siZe: 12pt\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&lt;wbr&gt;&nbsp;&lt;wbr&gt;做威客，不做啃老族；里面任务有复杂的设计，建站，编程，等也有很多简单的，发帖，微博推广，祝福短信，qq留言等适合新手做的简单任务。&lt;/wbr&gt;&lt;/wbr&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;', '0', '', '', '', '0', '1', '0', '1398820508', '5');
INSERT INTO keke_witkey_article VALUES ('332', '1', '0', '', '中不中标真的那么重要吗？', 'article', '', 'data/uploads/2014/04/30/7716277545360964d7b3d0.jpg', '&lt;span style=\"font-family:\'Microsoft YaHei\'; \"&gt;&nbsp; 我知道，其实大多数&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;都是以兼职为主，都是为了增加收入给自己搞的第二职业。然而这第二职业并不是努力就能赚钱的职业，往往一个只有100元的&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;，几百号人在抢，简直一番狼多肉少的状态。最后中标的那一个，除了拥有真材实料，实为幸中之幸。&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp;“中不中标真的那么重要嘛”？最初对于我来说，中标还是十分的重要，毕竟辛苦的工作最终是希望得到人家的认可，要不这一天甚至多天的努力岂不是白费了。再者中标除了能得到money最直接的实惠外，还能收获一份快乐的心情，尤其是在几百号人中脱颖而出的时候，那是何等一份荣耀？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; &nbsp;不过幸运不会天天降临在一个人头上，再高的高手也不能保证天天都能中标，这就是&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;里的现实状况。慢慢地，我改变了自己最初的想法，如果天天把中标当作&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;的唯一标准，看来有些不太现实。后来我就这样的开导自己：中标了，是对自己工作的一种回报，不中标，全当一种历练和学习的过程，目的是为了以后多一些中标的经验。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; &nbsp;果然，我的心情在自我开导的过程中好了许多，不再像以前一样，因为某个稿件的中标问题烦恼不已。遇上连续几天没有中标的时候，我会拿出时间来去看看高级&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;的中标经历，用他们的等级来激励自己不断努力，期待自己哪一天能像他们一样成功。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; &nbsp;2013年的某一天，我终于成长为一名还算不错的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;手，前来约稿的客户日益多了起来。&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;多了，钱多了，人也变得自信起来！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp; &nbsp; &nbsp; &nbsp;在此我想用自己的成长经历告诉大家：无论任何时候都要摆正自己的心态去面对问题，这样才能机会成长为一名合格的&lt;a href=\"http://baike.renwuyi.com/citiao/12.html\" target=\"_blank\"&gt;威客&lt;/a&gt;。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;&lt;p align=\"right\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;本文来自&lt;a href=\"http://task.renwuyi.com/\" target=\"_blank\"&gt;任务&lt;/a&gt;易官网&nbsp;http://www.renwuyi.com/&nbsp;&nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p align=\"right\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;如有任何转载，请注明出处！&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;', '0', '', '', '', '0', '1', '0', '1398838863', '2');

-- ----------------------------
-- Table structure for `keke_witkey_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article_category`;
CREATE TABLE `keke_witkey_article_category` (
  `art_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_pid` int(11) DEFAULT '0',
  `cat_name` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `cat_type` char(10) DEFAULT '0',
  `art_index` varchar(100) DEFAULT NULL,
  `seo_title` varchar(50) DEFAULT NULL,
  `seo_keyword` varchar(50) DEFAULT NULL,
  `seo_desc` text,
  PRIMARY KEY (`art_cat_id`),
  KEY `index_1` (`art_cat_id`),
  KEY `index_2` (`art_cat_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=369 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_article_category
-- ----------------------------
INSERT INTO keke_witkey_article_category VALUES ('1', '0', '客客资讯', '10', '1', '1372152435', 'article', '{1}{1}{1}{1}', '', '', '');
INSERT INTO keke_witkey_article_category VALUES ('5', '1', '行业动态', '1', '1', '1366186082', 'article', '{1}{1}{1}{5}', '本行业的动态度恶劣', '是风格撒的，撒的发，说法士大夫，撒反对', '的是法国的师傅给的是法国的是法国的风格和法国恢复到工会发的规划的法国恢复规划的是法国是大法官上的风格的师傅告诉对方过得舒服过的是法国的师傅给的是法国的师傅告诉对方');
INSERT INTO keke_witkey_article_category VALUES ('7', '1', '媒体报导', '1', '1', '1365665081', 'article', '{1}{1}{1}{7}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('17', '1', '网站公告', '1', '1', '1365665089', 'article', '{1}{1}{1}{17}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('4', '1', '政策法规', '3', '1', '1365665065', 'article', '{1}{1}{1}{4}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('203', '1', '安全交易', '1', '0', '1365665106', 'article', '{1}{1}{1}{203}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('328', '290', '我是买家', '2', '0', '1323165361', 'help', '{100}{290}{328}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('358', '1', '新闻列表', '1', '0', '1365665114', 'article', '{1}{1}{1}{358}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('345', '294', '名词解答', '5', '0', '1325746402', 'help', '{100}{294}{345}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('290', '100', '任务大厅', '2', '0', '1365666122', 'help', '{100}{100}{290}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('298', '294', '注册登陆', '1', '0', '1323158406', 'help', '{100}{294}{298}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('300', '290', '任务中标', '2', '0', '1323158451', 'help', '{100}{290}{300}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('304', '290', '雇佣任务', '6', '0', '1323158531', 'help', '{100}{290}{304}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('291', '100', '威客商城', '1', '0', '1365666128', 'help', '{100}{100}{291}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('100', '0', '帮助中心', '3', '1', '1365666115', 'help', '{100}{100}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('310', '294', '相关认证', '1', '0', '1323158633', 'help', '{100}{294}{310}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('316', '292', '推广注册', '1', '0', '1323158833', 'help', '{100}{292}{316}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('329', '290', '我是服务商', '1', '0', '1323165371', 'help', '{100}{290}{329}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('327', '294', '账号管理', '3', '0', '1323165351', 'help', '{100}{327}{294}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('296', '294', '账号安全', '1', '0', '1323158348', 'help', '{100}{294}{296}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('312', '294', '如何支付', '1', '0', '1323158707', 'help', '{100}{294}{312}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('311', '294', '如何赚钱', '1', '0', '1323158698', 'help', '{100}{294}{311}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('315', '292', '推广规则', '1', '0', '1323158822', 'help', '{100}{292}{315}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('297', '294', '提现充值', '1', '0', '1323158368', 'help', '{100}{294}{297}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('346', '294', '交易维权', '1', '0', '1324028081', 'help', '{100}{294}{346}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('295', '289', '本站规则', '6', '0', '1323158308', 'help', '{100}{289}{295}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('293', '100', '常见问题', '5', '0', '1365666138', 'help', '{100}{100}{293}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('294', '100', '新手上路', '1', '0', '1365666145', 'help', '{100}{100}{294}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('301', '290', '参与任务', '3', '0', '1323158461', 'help', '{100}{290}{301}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('302', '290', '评价&等级', '4', '0', '1323158473', 'help', '{100}{290}{302}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('303', '290', '任务问题', '5', '0', '1323158488', 'help', '{100}{290}{303}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('305', '290', '悬赏任务', '7', '0', '1323158544', 'help', '{100}{290}{305}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('306', '290', '招标任务', '8', '0', '1323158554', 'help', '{100}{290}{306}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('307', '290', '线下交易', '9', '0', '1323158565', 'help', '{100}{290}{307}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('308', '290', '任务选标', '10', '0', '1323158580', 'help', '{100}{290}{308}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('309', '290', '支付汇款', '11', '0', '1323158589', 'help', '{100}{290}{309}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('317', '292', '推广任务', '1', '0', '1323158840', 'help', '{100}{292}{317}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('318', '292', '推广网站', '1', '0', '1323158848', 'help', '{100}{292}{318}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('319', '293', '账号充值', '1', '0', '1323158882', 'help', '{100}{293}{319}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('320', '271', '线上支付', '1', '0', '1323158894', 'help', '{100}{271}{320}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('321', '271', '线下支付', '1', '0', '1323158902', 'help', '{100}{271}{321}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('322', '271', '担保交易', '1', '0', '1323158916', 'help', '{100}{271}{322}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('323', '291', '商城规则', '1', '0', '1323158935', 'help', '{100}{291}{323}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('324', '291', '威客作品', '1', '0', '1323158964', 'help', '{100}{291}{324}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('325', '291', '威客服务', '0', '0', '1364866607', 'help', '{100}{291}{325}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('326', '293', '交易付款', '4', '0', '1323158986', 'help', '{100}{293}{326}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('347', '294', '违规', '1', '0', '1324028127', 'help', '{100}{294}{347}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('361', '203', 'ffffff', '1', '0', '1346985730', 'article', '{1}{203}{361}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('362', '298', 'dddd', '1', '0', '1346986455', 'help', '{100}{294}{298}{362}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('364', '345', '234', '1', '0', '1346988623', 'help', '{100}{294}{345}{364}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('365', '359', 'rrrrrr', '1', '0', '1346988958', 'article', '{1}{203}{359}{365}', null, null, null);
INSERT INTO keke_witkey_article_category VALUES ('368', '300', 'sdsds', '1', '0', '1365667519', 'help', '{100}{290}{300}{368}', null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_article_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article_keyword`;
CREATE TABLE `keke_witkey_article_keyword` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `keyword_status` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `show_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_article_keyword
-- ----------------------------
INSERT INTO keke_witkey_article_keyword VALUES ('12', '再来一个亲', 'http://localhost/kppw2.2/index.php?do=task_list&path=H2&search_key=再来一个亲', '1', null, '1365757093', '0');
INSERT INTO keke_witkey_article_keyword VALUES ('10', '小样儿的', 'http://localhost/kppw2.2/index.php?do=task_list&path=H2&search_key=小样儿的', '1', null, '1365757058', '0');
INSERT INTO keke_witkey_article_keyword VALUES ('11', '他不可信', 'http://localhost/kppw2.2/index.php?do=task_list&path=H2&search_key=他不可信', '1', null, '1365757117', '0');

-- ----------------------------
-- Table structure for `keke_witkey_auth_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_bank`;
CREATE TABLE `keke_witkey_auth_bank` (
  `bank_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `deposit_area` varchar(100) DEFAULT NULL,
  `deposit_name` varchar(100) DEFAULT NULL,
  `pay_to_user_cash` decimal(10,2) DEFAULT '0.00',
  `user_get_cash` decimal(10,2) DEFAULT '0.00',
  `pay_time` int(11) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `bank_sname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`bank_a_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_bank
-- ----------------------------
INSERT INTO keke_witkey_auth_bank VALUES ('144', '5503', '下线', '6212263202000189349', 'icbc', '219', '11,175', null, '1.00', '1.00', '1398848269', '1.00', '1398848254', '1398848254', '1', null);
INSERT INTO keke_witkey_auth_bank VALUES ('145', '5504', '下线的下线', '3782 338842 10510', 'icbc', '220', '8,130', null, '1.00', '1.00', '1398848633', '1.00', '1398848623', '1398848623', '1', null);
INSERT INTO keke_witkey_auth_bank VALUES ('146', '5505', 'shangk1', '3782 212120 35030', 'icbc', '221', '5,97', null, '10.00', '0.00', '1398849657', '1.00', '1398849632', '1398849632', '0', null);

-- ----------------------------
-- Table structure for `keke_witkey_auth_email`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_email`;
CREATE TABLE `keke_witkey_auth_email` (
  `email_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_time` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`email_a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_email
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_enterprise`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_enterprise`;
CREATE TABLE `keke_witkey_auth_enterprise` (
  `enterprise_auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `licen_num` varchar(100) DEFAULT NULL,
  `licen_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `legal` varchar(50) DEFAULT NULL,
  `staff_num` int(11) DEFAULT NULL,
  `run_years` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`enterprise_auth_id`),
  KEY `index_1` (`enterprise_auth_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_enterprise
-- ----------------------------
INSERT INTO keke_witkey_auth_enterprise VALUES ('165', '5503', '下线', '下线的企业', '42021322041554', 'data/uploads/2014/04/30/20737869895360ba2b2f79a.jpg', '0.00', '1398848045', '1398848045', '1', null, null, null, null);
INSERT INTO keke_witkey_auth_enterprise VALUES ('166', '5504', '下线的下线', '企业', '455215215545', 'data/uploads/2014/04/30/13029741865360bbaf0522f.jpg', '0.00', '1398848433', '1398848433', '1', null, null, null, null);
INSERT INTO keke_witkey_auth_enterprise VALUES ('167', '5505', 'shangk1', 'shangk1', '1234567', 'data/uploads/2014/04/30/15251671365360c003433e4.jpg', '0.00', '1398849541', '1398849541', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_item`;
CREATE TABLE `keke_witkey_auth_item` (
  `auth_code` char(20) NOT NULL,
  `auth_title` varchar(100) DEFAULT NULL,
  `auth_day` varchar(100) DEFAULT NULL,
  `auth_small_ico` varchar(100) DEFAULT NULL,
  `auth_small_n_ico` varchar(100) DEFAULT NULL,
  `auth_big_ico` varchar(100) DEFAULT NULL,
  `auth_desc` text,
  `auth_cash` decimal(10,2) DEFAULT '0.00',
  `auth_expir` int(11) DEFAULT NULL,
  `auth_open` int(11) DEFAULT NULL,
  `auth_show` int(11) DEFAULT NULL,
  `muti_auth` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `auth_dir` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`auth_code`),
  KEY `index_2` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_item
-- ----------------------------
INSERT INTO keke_witkey_auth_item VALUES ('realname', '实名认证', '1-3', 'data/uploads/2014/04/30/19968075045360cbb4c1d9a.gif', 'data/uploads/2014/04/30/9387293575360cbb15190f.gif', 'data/uploads/2014/04/30/8261241925360c008e1611.gif', '身份证认证', '0.00', '0', '1', '0', null, '1398852944', 'realname', '0', null);
INSERT INTO keke_witkey_auth_item VALUES ('enterprise', '企业认证', '1-3', 'data/uploads/2014/04/30/6833481645360c04e945d5.gif', 'data/uploads/2014/04/30/17578068825360c095d9e81.gif', 'data/uploads/2014/04/30/13649877875360bfe0723a8.gif', '企业认证', '0.00', '0', '1', '0', null, '1398852980', 'enterprise', '0', null);
INSERT INTO keke_witkey_auth_item VALUES ('bank', '银行认证', '1-3', 'data/uploads/2014/04/30/14968064885360c0311f4cf.gif', 'data/uploads/2014/04/30/11668319785360c083a3709.gif', 'data/uploads/2014/04/30/11812999235360c027955a9.gif', '银行认证', '1.00', '0', '1', '0', null, '1398852990', 'bank', '0', null);
INSERT INTO keke_witkey_auth_item VALUES ('email', '邮箱认证', '1-2', 'data/uploads/2014/04/30/18524532935360c066c63b6.gif', 'data/uploads/2014/04/30/9619152635360c06d80d48.gif', 'data/uploads/2014/04/30/2082409295360c06134aec.gif', '点击发送，系统将自动发送一封邮件到您的邮箱，\r\n		请在24小时之内点击邮件里的链接进行邮箱验证（24之内有效）', '1.00', '0', '1', '0', null, '1398853024', 'email', '0', null);

-- ----------------------------
-- Table structure for `keke_witkey_auth_mobile`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_mobile`;
CREATE TABLE `keke_witkey_auth_mobile` (
  `mobile_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `mobile` char(11) DEFAULT NULL,
  `valid_code` char(6) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_status` tinyint(1) DEFAULT NULL,
  `auth_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`mobile_a_id`),
  KEY `uid` (`uid`),
  KEY `mobile_a_id` (`mobile_a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_mobile
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_realname`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_realname`;
CREATE TABLE `keke_witkey_auth_realname` (
  `realname_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `id_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`realname_a_id`),
  KEY `auth_status` (`auth_status`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_realname
-- ----------------------------
INSERT INTO keke_witkey_auth_realname VALUES ('162', '5501', 'luoke', 'hhh', '424254544348536544', 'data/uploads/2014/04/30/52139367053606b8cccd72.jpg', '0.00', '1398827920', '1398827920', '1');
INSERT INTO keke_witkey_auth_realname VALUES ('163', '5506', 'shangk2', 'shangk2', '420117198901016332', 'data/uploads/2014/04/30/14819474145360c1003b1d6.jpg', '0.00', '1398849793', '1398849793', '1');
INSERT INTO keke_witkey_auth_realname VALUES ('164', '5507', '推广下线', '推广下线', '420683198811025487', 'data/uploads/2014/04/30/2508976175360cdeb3b843.jpg', '0.00', '1398853111', '1398853111', '1');
INSERT INTO keke_witkey_auth_realname VALUES ('165', '5508', '安德敏的下线', '安德敏的下线', '420683198902154287', 'data/uploads/2014/04/30/7720310555360cebb114ea.jpg', '0.00', '1398853309', '1398853309', '1');
INSERT INTO keke_witkey_auth_realname VALUES ('166', '5495', '小鸟', '小鸟', '420683198901221547', 'data/uploads/2014/05/10/1316434725536de7d5e81b2.jpg', '0.00', '1399711704', '1399711704', '1');

-- ----------------------------
-- Table structure for `keke_witkey_auth_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_record`;
CREATE TABLE `keke_witkey_auth_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_code` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `ext_data` text,
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM AUTO_INCREMENT=732 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_auth_record
-- ----------------------------
INSERT INTO keke_witkey_auth_record VALUES ('721', 'realname', '5501', 'luoke', '1398827920', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('722', 'enterprise', '5503', '下线', '1398848045', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('723', 'bank', '5503', '下线', '1398848254', '1', '144');
INSERT INTO keke_witkey_auth_record VALUES ('724', 'enterprise', '5504', '下线的下线', '1398848433', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('725', 'bank', '5504', '下线的下线', '1398848623', '1', '145');
INSERT INTO keke_witkey_auth_record VALUES ('726', 'enterprise', '5505', 'shangk1', '1398849541', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('727', 'bank', '5505', 'shangk1', '1398849632', '0', '146');
INSERT INTO keke_witkey_auth_record VALUES ('728', 'realname', '5506', 'shangk2', '1398849793', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('729', 'realname', '5507', '推广下线', '1398853111', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('730', 'realname', '5508', '安德敏的下线', '1398853309', '1', null);
INSERT INTO keke_witkey_auth_record VALUES ('731', 'realname', '5495', '小鸟', '1399711704', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_basic_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_basic_config`;
CREATE TABLE `keke_witkey_basic_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` char(20) DEFAULT NULL,
  `v` text,
  `type` char(20) DEFAULT NULL,
  `desc` text,
  `listorder` int(10) DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  KEY `config_id` (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_basic_config
-- ----------------------------
INSERT INTO keke_witkey_basic_config VALUES ('1', 'website_name', '客客专业威客系统', 'web', '0', '1');
INSERT INTO keke_witkey_basic_config VALUES ('2', 'website_title', 'KPPW', 'web', '0', '2');
INSERT INTO keke_witkey_basic_config VALUES ('3', 'website_url', 'http://demo.kppw.cn', 'web', '0', '3');
INSERT INTO keke_witkey_basic_config VALUES ('4', 'install_path', '0', '0', '0', '4');
INSERT INTO keke_witkey_basic_config VALUES ('5', 'web_logo', 'data/uploads/2014/05/10/2082620170536dca8fc0ef0.png', 'web', '0', '5');
INSERT INTO keke_witkey_basic_config VALUES ('6', 'index_seo_title', '威客|系统—客客出品,专业威客建站系统开源平台', 'sys', '0', '6');
INSERT INTO keke_witkey_basic_config VALUES ('7', 'index_seo_keyword', '威客,客客,威客建站,威客系统,威客开源,威客平台,客客出品,开源平台,建站系统', 'sys', '0', '7');
INSERT INTO keke_witkey_basic_config VALUES ('8', 'index_seo_desc', '客客-专业威客建站系统，国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统。', 'sys', '0', '8');
INSERT INTO keke_witkey_basic_config VALUES ('9', 'company', '武汉客客信息技术有限公司', 'web', '0', '9');
INSERT INTO keke_witkey_basic_config VALUES ('10', 'address', '湖北省武汉市', 'web', '0', '10');
INSERT INTO keke_witkey_basic_config VALUES ('11', 'phone', '', 'web', '0', '11');
INSERT INTO keke_witkey_basic_config VALUES ('12', 'kf_phone', '027-8866888,027-8845754,027-5478548,027-1245741,027-8475478,027-8956478,027-6201541,027-5412541', 'web', '0', '12');
INSERT INTO keke_witkey_basic_config VALUES ('13', 'postcode', '430001', 'web', '0', '13');
INSERT INTO keke_witkey_basic_config VALUES ('14', 'filing', '鄂B2-20080005', 'web', '0', '14');
INSERT INTO keke_witkey_basic_config VALUES ('15', 'is_close', '2', 'web', '0', '15');
INSERT INTO keke_witkey_basic_config VALUES ('16', 'close_reason', '网站正在升级维护中，预计于2012年12月21日开放，请耐心等待！期间您如果有任何疑问，请联系网站站长或者客服。', 'web', '0', '16');
INSERT INTO keke_witkey_basic_config VALUES ('17', 'stats_code', '<java src=\"javascript\">000</java>', 'web', '0', '17');
INSERT INTO keke_witkey_basic_config VALUES ('18', 'max_size', '2', 'sys', '0', '18');
INSERT INTO keke_witkey_basic_config VALUES ('19', 'file_type', 'pdf|doc|docx|xls|ppt|wps|zip|rar|txt|jpg|jpeg|gif|bmp|swf|png|lsp', 'sys', '0', '19');
INSERT INTO keke_witkey_basic_config VALUES ('20', 'ban_users', 'admin|胡哥|亚麻跌|思密达', 'sys', '0', '20');
INSERT INTO keke_witkey_basic_config VALUES ('21', 'ban_content', '胡萝卜|太上黄', 'sys', '0', '21');
INSERT INTO keke_witkey_basic_config VALUES ('22', 'reg_limit', '0', 'sys', '0', '22');
INSERT INTO keke_witkey_basic_config VALUES ('24', 'mail_server_cat', 'smtp', 'mail', '0', '24');
INSERT INTO keke_witkey_basic_config VALUES ('25', 'mail_server_port', '25', 'mail', '0', '25');
INSERT INTO keke_witkey_basic_config VALUES ('26', 'mail_ssl', '1', 'mail', '0', '26');
INSERT INTO keke_witkey_basic_config VALUES ('27', 'smtp_url', 'smtp.qq.com', 'mail', '0', '27');
INSERT INTO keke_witkey_basic_config VALUES ('28', 'post_account', '', 'mail', '0', '28');
INSERT INTO keke_witkey_basic_config VALUES ('29', 'account_pwd', '', 'mail', '0', '29');
INSERT INTO keke_witkey_basic_config VALUES ('30', 'mail_replay', '', 'mail', '0', '30');
INSERT INTO keke_witkey_basic_config VALUES ('31', 'mail_charset', 'utf-8', 'mail', '0', '31');
INSERT INTO keke_witkey_basic_config VALUES ('33', 'user_intergration', '1', '0', '0', '33');
INSERT INTO keke_witkey_basic_config VALUES ('34', 'is_rewrite', '0', 'sys', '0', '34');
INSERT INTO keke_witkey_basic_config VALUES ('35', 'mark_start_status', '1', '0', '0', '35');
INSERT INTO keke_witkey_basic_config VALUES ('36', 'auto_mark_time', '3', '0', '0', '36');
INSERT INTO keke_witkey_basic_config VALUES ('37', 'auto_mark_status', '1', '0', '0', '37');
INSERT INTO keke_witkey_basic_config VALUES ('38', 'credit_rename', '元宝', 'sys', '0', '38');
INSERT INTO keke_witkey_basic_config VALUES ('39', 'exp_rename', '荣誉', '0', '0', '39');
INSERT INTO keke_witkey_basic_config VALUES ('44', 'qq_app_id', '101085285', 'interface', 'QQ登入appid', '44');
INSERT INTO keke_witkey_basic_config VALUES ('45', 'qq_app_secret', '84b5ec05a91da984108ec056c6d436f6', 'interface', 'QQ登录appSecret', '45');
INSERT INTO keke_witkey_basic_config VALUES ('48', 'taobao_app_id', '21466920', 'interface', '淘宝登入appid', '48');
INSERT INTO keke_witkey_basic_config VALUES ('49', 'taobao_app_secret', '7cc2c0cbcb6672cb33a698bf96f9ad96', 'interface', '淘宝登入secret', '49');
INSERT INTO keke_witkey_basic_config VALUES ('50', 'allow_reg_action', '0', 'sys', '0', '50');
INSERT INTO keke_witkey_basic_config VALUES ('64', 'mobile_password', '123456', 'mobile', '0', '0');
INSERT INTO keke_witkey_basic_config VALUES ('63', 'mobile_username', '66391', 'mobile', '0', '0');
INSERT INTO keke_witkey_basic_config VALUES ('62', 'oauth_api_open', 'a:3:{s:4:\"sina\";s:1:\"1\";s:2:\"qq\";s:1:\"1\";s:6:\"renren\";s:1:\"1\";}', 'oauth_api', '0', '62');
INSERT INTO keke_witkey_basic_config VALUES ('54', 'sina_app_id', '959834249', 'weibo', '新浪登入appid', '54');
INSERT INTO keke_witkey_basic_config VALUES ('55', 'sina_app_secret', '5418011336712c5fee4cd4afdc536717', 'weibo', '新浪登入secret', '55');
INSERT INTO keke_witkey_basic_config VALUES ('60', 'ten_app_id', 'd473b10bd8304bcc976ceba92d4a0c8f', 'weibo', '腾讯登入appid', '60');
INSERT INTO keke_witkey_basic_config VALUES ('61', 'ten_app_secret', '7e2b26f916164891768af6e2c9184ccb', 'weibo', '腾讯登入secret', '61');
INSERT INTO keke_witkey_basic_config VALUES ('65', 'alipay_app_id', '2088301857503158', 'interface', '支付宝登录app_id', '0');
INSERT INTO keke_witkey_basic_config VALUES ('66', 'alipay_app_secret', 'wzn723ysa5qotelr2jcau4b7edb1livt', 'interface', '支付宝登录app_secret', '0');
INSERT INTO keke_witkey_basic_config VALUES ('69', 'copyright', ' Copyright &#169; 2009 -2014 kekezu. All rights reserved', '0', '网站版权', '0');
INSERT INTO keke_witkey_basic_config VALUES ('70', 'prom_open', '1', 'prom', '推广开关', '0');
INSERT INTO keke_witkey_basic_config VALUES ('71', 'prom_period', '30', 'prom', '推广有效期', '0');
INSERT INTO keke_witkey_basic_config VALUES ('82', 'info_static', 'article', 'static', '静态化配置', '82');
INSERT INTO keke_witkey_basic_config VALUES ('83', 'second_domain', '0', 'seo', '二级域名启用', '83');
INSERT INTO keke_witkey_basic_config VALUES ('84', 'top_domain', 't.com', 'seo', '顶级域名', '84');
INSERT INTO keke_witkey_basic_config VALUES ('85', 'currency', 'CNY', 'curr', '默认币种', '85');
INSERT INTO keke_witkey_basic_config VALUES ('86', 'set_index', 'index', 'nav', '后台导航里面设置首页', '86');
INSERT INTO keke_witkey_basic_config VALUES ('87', 'mobile_version', '1.0', 'sys', '升级了', null);
INSERT INTO keke_witkey_basic_config VALUES ('88', 'apk_url', null, 'sys', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('89', 'lang', 'cn', 'sys', '默认语言', '89');
INSERT INTO keke_witkey_basic_config VALUES ('90', 'renren_app_id', '267949', 'weibo', '人人登入appid', null);
INSERT INTO keke_witkey_basic_config VALUES ('91', 'renren_app_secret', '4d8435bf37be4d4ea56ed5caa77a712a', 'weibo', '人人登入secret', null);
INSERT INTO keke_witkey_basic_config VALUES ('92', 'douban_app_id', '0746aec06ddc286715d40c4149947935', 'weibo', '豆瓣登入appid', null);
INSERT INTO keke_witkey_basic_config VALUES ('93', 'douban_app_secret', 'aef76cf2102adc02', 'weibo', '豆瓣登入secret', null);
INSERT INTO keke_witkey_basic_config VALUES ('94', 'task_seo_title', '任务大厅—客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('95', 'task_seo_keyword', '客客,任务大厅,任务模式,任务状态', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('96', 'task_seo_desc', '客客-专业威客建站系统，任务大厅版块，任务模式，任务状态，任务展示的平台。国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('97', 'goods_seo_title', '威客商城—客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('98', 'goods_seo_keyword', '威客商城,威客超市', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('99', 'goods_seo_desc', '客客-专业威客建站系统，威客商城版块，国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统。', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('100', 'seller_seo_title', '服务商—客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('101', 'seller_seo_keyword', '服务商,威客服务商,服务商列表', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('102', 'seller_seo_desc', '客客-专业威客建站系统，服务商版块，国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统。', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('103', 'case_seo_title', '成功案例—客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('104', 'case_seo_keyword', '成功案例,威客案例,案例展示', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('105', 'case_seo_desc', '客客-专业威客建站系统，成功案例版块，国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统。', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('106', 'article_seo_title', '资讯中心—客客专业威客建站系统', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('107', 'article_seo_keyword', '资讯中心,行业动态,媒体报导,网站公告,政策法规,安全交易，新闻列表', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('108', 'article_seo_desc', '客客-专业威客建站系统，资讯中心版块，国内外最知名使用站长最多的威客系统，做威客平台，选威客系统，就选客客专业威客建站系统。', '', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('109', 'sitecss', 'css', 'sys', '网站基本色调', null);
INSERT INTO keke_witkey_basic_config VALUES ('110', 'theme', '', 'sys', '首页启用主题', null);

-- ----------------------------
-- Table structure for `keke_witkey_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_case`;
CREATE TABLE `keke_witkey_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `case_img` varchar(150) DEFAULT NULL,
  `case_title` varchar(50) DEFAULT NULL,
  `case_desc` varchar(500) DEFAULT NULL,
  `case_price` decimal(10,2) DEFAULT '0.00',
  `case_auther` varchar(20) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_case
-- ----------------------------
INSERT INTO keke_witkey_case VALUES ('124', '3344', 'task', 'data/uploads/2014/04/29/1451432850535f61cb45ae5.jpg', '求创意照片生日礼物', '', '1000.00', null, '1398761137');
INSERT INTO keke_witkey_case VALUES ('125', '3319', 'task', 'data/uploads/2014/04/29/490897841535f6843b8161.jpg', '典当行Logo设计Logo设计', '', '1000.00', null, '1398761541');
INSERT INTO keke_witkey_case VALUES ('126', '1160', 'service', 'data/uploads/2014/04/30/531808088536050fc0d428.jpg', '二维码网站建设', '', '100.00', null, '1398821117');
INSERT INTO keke_witkey_case VALUES ('127', '1161', 'service', 'data/uploads/2014/04/30/23813749753605117080a3.png', '包装袋设计', '', '500.00', null, '1398821144');
INSERT INTO keke_witkey_case VALUES ('128', '1162', 'service', 'data/uploads/2014/04/30/5363934455360512a4bf17.jpg', '银器银制礼品设计', '', '150.00', null, '1398821163');
INSERT INTO keke_witkey_case VALUES ('129', '1163', 'service', 'data/uploads/2014/04/30/10798013115360513c3dbcf.jpg', '开发静态页面设计新网站', '', '1000.00', null, '1398821181');
INSERT INTO keke_witkey_case VALUES ('130', '1164', 'service', 'data/uploads/2014/04/30/408537908536051538e216.jpg', '公司名称起名', '', '100.00', null, '1398821205');
INSERT INTO keke_witkey_case VALUES ('131', '1165', 'service', 'data/uploads/2014/04/30/213337841653605166ad205.jpg', '游戏评测报告', '', '150.00', null, '1398821224');
INSERT INTO keke_witkey_case VALUES ('132', '1166', 'service', 'data/uploads/2014/04/30/2437744155360517ab6244.jpg', '设计管理平台（页面改造）', '', '220.00', null, '1398821244');
INSERT INTO keke_witkey_case VALUES ('133', '1168', 'service', 'data/uploads/2014/04/30/9930447675360518fb97b2.jpg', '找一个熟悉“方维”系统的程序员长期合作', '', '100.00', null, '1398821264');
INSERT INTO keke_witkey_case VALUES ('134', '3350', 'task', 'data/uploads/2014/04/30/851625113536051af00773.jpg', '茶餐厅营销策略撰写', '', '1000.00', null, '1398821296');
INSERT INTO keke_witkey_case VALUES ('135', '1167', 'service', 'data/uploads/2014/04/30/1976225263536051c943749.jpg', '设计高考升学宴祝贺卡片', '', '50.00', null, '1398821322');
INSERT INTO keke_witkey_case VALUES ('136', '3344', 'task', 'data/uploads/2014/04/30/785945063536051d6b28cf.jpg', '求创意照片生日礼物', '', '1000.00', null, '1398821336');
INSERT INTO keke_witkey_case VALUES ('137', '1168', 'service', 'data/uploads/2014/04/30/1910523126536051fa8c984.jpg', '找一个熟悉“方维”系统的程序员长期合作', '', '100.00', null, '1398821371');
INSERT INTO keke_witkey_case VALUES ('138', '3319', 'task', 'data/uploads/2014/04/30/1292878844536067fab560c.jpg', '典当行Logo设计Logo设计', '', '1000.00', null, '1398827003');
INSERT INTO keke_witkey_case VALUES ('139', '3359', 'task', 'data/uploads/2014/04/30/18486544395360922c0f99f.jpg', '设计酒店的Logo和VI设计', '', '1000.00', null, '1398837805');
INSERT INTO keke_witkey_case VALUES ('140', '1160', 'service', 'data/uploads/2014/04/30/99873116253609290d058f.jpg', '二维码网站建设', '', '100.00', null, '1398837906');
INSERT INTO keke_witkey_case VALUES ('141', '1174', 'service', 'data/uploads/2014/04/30/17317792555360935424eb8.jpg', '图片美工处理', '', '120.00', null, '1398838101');
INSERT INTO keke_witkey_case VALUES ('142', '1173', 'service', 'data/uploads/2014/04/30/64516463953609368d745f.jpg', '制作生日贺卡', '', '50.00', null, '1398838121');
INSERT INTO keke_witkey_case VALUES ('143', '3348', 'task', 'data/uploads/2014/04/30/20602334035360939eba520.jpg', '航天员发布的作品', '', '1000.00', null, '1398838175');
INSERT INTO keke_witkey_case VALUES ('144', '1171', 'service', 'data/uploads/2014/04/30/1503731053536093f0a485e.jpg', '女生节妇女节必备礼物', '', '100.00', null, '1398838257');

-- ----------------------------
-- Table structure for `keke_witkey_comment`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_comment`;
CREATE TABLE `keke_witkey_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `origin_id` int(11) DEFAULT '0',
  `obj_type` char(20) DEFAULT NULL,
  `p_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `index_1` (`comment_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`p_id`),
  KEY `index_4` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=27903 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_comment
-- ----------------------------
INSERT INTO keke_witkey_comment VALUES ('27893', '357', '3318', 'work', '0', '1', 'admin', '稿件不错，雇主也不错，支持啊', '1398664112', '1');
INSERT INTO keke_witkey_comment VALUES ('27894', '361', '3342', 'work', '0', '5501', 'luoke', '不错哈', '1398738741', '1');
INSERT INTO keke_witkey_comment VALUES ('27895', '2050', '3351', 'work', '0', '5501', 'luoke', '稿件不错', '1398827077', '0');
INSERT INTO keke_witkey_comment VALUES ('27896', '1174', '1174', 'service', '0', '1', 'admin', '走过路过不要错过，欢迎大家来看一看瞧一瞧啊', '1398838353', '0');
INSERT INTO keke_witkey_comment VALUES ('27897', '365', '3346', 'work', '0', '1', 'admin', '稿件不错，雇主也不错，支持啊', '1398838508', '0');
INSERT INTO keke_witkey_comment VALUES ('27902', '3428', '3428', 'task', '0', '1', 'admin', '任务挺好的', '1399702530', '0');

-- ----------------------------
-- Table structure for `keke_witkey_currencies`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_currencies`;
CREATE TABLE `keke_witkey_currencies` (
  `currencies_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL DEFAULT '',
  `code` char(3) NOT NULL DEFAULT '',
  `symbol_left` varchar(24) DEFAULT NULL,
  `symbol_right` varchar(24) DEFAULT NULL,
  `decimal_point` char(1) DEFAULT NULL,
  `thousands_point` char(1) DEFAULT NULL,
  `decimal_places` char(1) DEFAULT NULL,
  `value` float(13,8) DEFAULT NULL,
  `last_updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`currencies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of keke_witkey_currencies
-- ----------------------------
INSERT INTO keke_witkey_currencies VALUES ('1', 'US Dollar', 'USD', '$', '', '.', ',', '2', '0.15744600', '1346410909');
INSERT INTO keke_witkey_currencies VALUES ('2', '人民币', 'CNY', '￥', '元', '.', ',', '2', '1.00000000', '1347246785');
INSERT INTO keke_witkey_currencies VALUES ('3', 'Euro', 'EUR', '', '', '.', ',', '2', '0.12568532', '1346397242');
INSERT INTO keke_witkey_currencies VALUES ('4', 'GB Pound', 'GBP', '&#163;', '', '.', ',', '2', '0.09942911', '1346397091');
INSERT INTO keke_witkey_currencies VALUES ('5', 'Canadian Dollar', 'CAD', '$', '', '.', ',', '2', '0.15563595', '1346294682');
INSERT INTO keke_witkey_currencies VALUES ('6', 'Australian Dollar', 'AUD', '$', '', '.', ',', '2', '0.15194558', '1346319601');
INSERT INTO keke_witkey_currencies VALUES ('7', '港币', 'HKD', '$', '港元', '.', ',', '2', '1.22107005', '1346320221');
INSERT INTO keke_witkey_currencies VALUES ('8', '韩元', 'KRW', '#', '*', '.', ',', '2', '178.71282959', '1347246352');
INSERT INTO keke_witkey_currencies VALUES ('14', '卢布', 'RUB', 'РУб', '卢布', '.', ',', '4', '4.96759844', '1348709431');

-- ----------------------------
-- Table structure for `keke_witkey_district`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_district`;
CREATE TABLE `keke_witkey_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `upid` int(11) NOT NULL COMMENT '上级id',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `type` int(11) NOT NULL COMMENT '类型',
  `displayorder` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `upid` (`upid`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `displayorder` (`displayorder`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地区表';

-- ----------------------------
-- Records of keke_witkey_district
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_favorite`;
CREATE TABLE `keke_witkey_favorite` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `keep_type` char(20) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `on_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=318 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_favorite
-- ----------------------------
INSERT INTO keke_witkey_favorite VALUES ('310', 'service', 'goods', '1162', '1162', '银器银制礼品设计', '1', 'admin', '1399875099');
INSERT INTO keke_witkey_favorite VALUES ('303', 'service', 'goods', '1171', '1171', '女生节妇女节必备礼物', '1', 'admin', '1398838529');
INSERT INTO keke_witkey_favorite VALUES ('305', 'task', 'dtender', '3409', '3409', '第三方说法', '5498', 'shangk', '1399450082');
INSERT INTO keke_witkey_favorite VALUES ('306', 'service', 'goods', '1176', '1176', '编辑为商品的稿件s', '5501', 'luoke', '1399527496');
INSERT INTO keke_witkey_favorite VALUES ('307', 'task', 'sreward', '3415', '3415', '酒店会员卡设计', '5502', '洛克', '1399702137');
INSERT INTO keke_witkey_favorite VALUES ('308', 'task', 'sreward', '3415', '3415', '酒店会员卡设计', '1', 'admin', '1399859388');
INSERT INTO keke_witkey_favorite VALUES ('309', 'work', 'sreward', '3415', '2135', '酒店会员卡设计的稿件', '5495', '小鸟', '1399859411');
INSERT INTO keke_witkey_favorite VALUES ('311', 'work', 'mreward', '3440', '2149', '入围热污染的稿件', '1', 'admin', '1399882415');
INSERT INTO keke_witkey_favorite VALUES ('312', 'task', 'sreward', '3414', '3414', '发短信跟我四年的男朋友表白', '1', 'admin', '1399882806');
INSERT INTO keke_witkey_favorite VALUES ('313', 'task', 'sreward', '3361', '3361', '需要会开发借口的程序员', '1', 'admin', '1399882810');
INSERT INTO keke_witkey_favorite VALUES ('314', 'task', 'dtender', '3360', '3360', '圣诞节的祝福语', '1', 'admin', '1399882812');
INSERT INTO keke_witkey_favorite VALUES ('315', 'task', 'sreward', '3415', '3415', '酒店会员卡设计', '4', '注册', '1399882821');
INSERT INTO keke_witkey_favorite VALUES ('316', 'task', 'sreward', '3414', '3414', '发短信跟我四年的男朋友表白', '4', '注册', '1399882824');
INSERT INTO keke_witkey_favorite VALUES ('317', 'service', 'goods', '1177', '1177', '求新年祝福的短信', '4', '注册', '1399883555');

-- ----------------------------
-- Table structure for `keke_witkey_feed`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_feed`;
CREATE TABLE `keke_witkey_feed` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `obj_link` varchar(100) DEFAULT NULL,
  `feedtype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `icon` char(10) DEFAULT '0',
  `title` text,
  `feed_desc` text,
  `feed_pic` varchar(100) DEFAULT NULL,
  `feed_time` int(11) DEFAULT '0',
  `ext_data` text,
  PRIMARY KEY (`feed_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7798 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_feed
-- ----------------------------
INSERT INTO keke_witkey_feed VALUES ('7748', '1181', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1181\">服务服务服务服务服务服务</a>', 'service', '5501', 'luoke', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"luoke\";s:3:\"url\";s:27:\"index.php?do=seller&id=5501\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:36:\"服务服务服务服务服务服务\";s:3:\"url\";s:26:\"index.php?do=goods&id=1181\";}}', null, null, '1399687155', null);
INSERT INTO keke_witkey_feed VALUES ('7749', '1162', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1162\">银器银制礼品设计</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:24:\"银器银制礼品设计\";s:3:\"url\";s:26:\"index.php?do=goods&id=1162\";}}', null, null, '1399688071', null);
INSERT INTO keke_witkey_feed VALUES ('7750', '1162', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1162\">银器银制礼品设计</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:24:\"银器银制礼品设计\";s:3:\"url\";s:26:\"index.php?do=goods&id=1162\";}}', null, null, '1399688123', null);
INSERT INTO keke_witkey_feed VALUES ('7751', '1163', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1163\">开发静态页面设计新网站</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:33:\"开发静态页面设计新网站\";s:3:\"url\";s:26:\"index.php?do=goods&id=1163\";}}', null, null, '1399688319', null);
INSERT INTO keke_witkey_feed VALUES ('7752', '1167', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1167\">设计高考升学宴祝贺卡片</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:33:\"设计高考升学宴祝贺卡片\";s:3:\"url\";s:26:\"index.php?do=goods&id=1167\";}}', null, null, '1399688687', null);
INSERT INTO keke_witkey_feed VALUES ('7753', '3427', '', 'pub_task', '5495', '小鸟', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"小鸟\";s:3:\"url\";s:27:\"index.php?do=seller&id=5495\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:18:\"的撒打算打算\";s:3:\"url\";s:25:\"index.php?do=task&id=3427\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399689474', null);
INSERT INTO keke_witkey_feed VALUES ('7783', '3440', '', 'work_accept', '4', '注册', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"注册\";s:3:\"url\";s:24:\"index.php?do=seller&id=4\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:16:\"入围热污染 \";s:3:\"url\";s:25:\"index.php?do=task&id=3440\";s:4:\"cash\";d:50;}}', null, null, '1399880215', null);
INSERT INTO keke_witkey_feed VALUES ('7782', '3440', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:15:\"入围热污染\";s:3:\"url\";s:25:\"index.php?do=task&id=3440\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"2\";}}', null, null, '1399880012', null);
INSERT INTO keke_witkey_feed VALUES ('7780', '3438', '', 'pub_task', '5523', '扬帆逐梦', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:12:\"扬帆逐梦\";s:3:\"url\";s:27:\"index.php?do=seller&id=5523\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:24:\"动漫周边商城网站\";s:3:\"url\";s:25:\"index.php?do=task&id=3438\";s:4:\"cash\";s:7:\"2000.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399865446', null);
INSERT INTO keke_witkey_feed VALUES ('7758', '1176', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:25:\"编辑为商品的稿件s\";s:3:\"url\";s:26:\"index.php?do=goods&id=1176\";}}', null, null, '1399705299', null);
INSERT INTO keke_witkey_feed VALUES ('7779', '3433', '', 'pub_task', '5516', '奈客', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"奈客\";s:3:\"url\";s:27:\"index.php?do=seller&id=5516\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:15:\"平面设计员\";s:3:\"url\";s:25:\"index.php?do=task&id=3433\";s:4:\"cash\";s:4:\"0.01\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399865183', null);
INSERT INTO keke_witkey_feed VALUES ('7778', '3437', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:26:\"评审招标测试流程33\";s:3:\"url\";s:25:\"index.php?do=task&id=3437\";s:4:\"cash\";s:2:\"30\";s:8:\"model_id\";s:1:\"5\";}}', null, null, '1399864937', null);
INSERT INTO keke_witkey_feed VALUES ('7776', '3435', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:25:\"航天员发布的作品3\";s:3:\"url\";s:25:\"index.php?do=task&id=3435\";s:4:\"cash\";s:6:\"120.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399864797', null);
INSERT INTO keke_witkey_feed VALUES ('7775', '1162', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1162\">银器银制礼品设计</a>', 'service', '5501', 'luoke', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"luoke\";s:3:\"url\";s:27:\"index.php?do=seller&id=5501\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:24:\"银器银制礼品设计\";s:3:\"url\";s:26:\"index.php?do=goods&id=1162\";}}', null, null, '1399857703', null);
INSERT INTO keke_witkey_feed VALUES ('7763', '1182', '', 'pub_service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布服务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:21:\"的范德萨发生的\";s:3:\"url\";s:26:\"index.php?do=goods&id=1182\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"7\";}}', null, null, '1399707231', null);
INSERT INTO keke_witkey_feed VALUES ('7764', '1182', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1182\">的范德萨发生的</a>', 'service', '5495', '小鸟', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"小鸟\";s:3:\"url\";s:27:\"index.php?do=seller&id=5495\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:21:\"的范德萨发生的\";s:3:\"url\";s:26:\"index.php?do=goods&id=1182\";}}', null, null, '1399707249', null);
INSERT INTO keke_witkey_feed VALUES ('7765', '1177', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1177\">求新年祝福的短信</a>', 'service', '5495', '小鸟', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"小鸟\";s:3:\"url\";s:27:\"index.php?do=seller&id=5495\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:24:\"求新年祝福的短信\";s:3:\"url\";s:26:\"index.php?do=goods&id=1177\";}}', null, null, '1399707730', null);
INSERT INTO keke_witkey_feed VALUES ('7766', '1182', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1182\">的范德萨发生的</a>', 'service', '5500', '艾仁', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"艾仁\";s:3:\"url\";s:27:\"index.php?do=seller&id=5500\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:21:\"的范德萨发生的\";s:3:\"url\";s:26:\"index.php?do=goods&id=1182\";}}', null, null, '1399709947', null);
INSERT INTO keke_witkey_feed VALUES ('7767', '1173', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1173\">制作生日贺卡</a>', 'service', '5495', '小鸟', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"小鸟\";s:3:\"url\";s:27:\"index.php?do=seller&id=5495\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:18:\"制作生日贺卡\";s:3:\"url\";s:26:\"index.php?do=goods&id=1173\";}}', null, null, '1399709956', null);
INSERT INTO keke_witkey_feed VALUES ('7781', '3439', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:21:\"发大幅度发送到\";s:3:\"url\";s:25:\"index.php?do=task&id=3439\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399879835', null);
INSERT INTO keke_witkey_feed VALUES ('7772', '3415', '', 'work_accept', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:1:\"1\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:21:\"酒店会员卡设计\";s:3:\"url\";s:25:\"index.php?do=task&id=3415\";s:4:\"cash\";s:5:\"90.00\";}}', null, null, '1399715022', null);
INSERT INTO keke_witkey_feed VALUES ('7770', '0', '', 'realname_auth', '5495', '小鸟', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"小鸟\";s:3:\"url\";s:27:\"index.php?do=seller&id=5495\";}s:6:\"action\";a:2:{s:7:\"content\";s:9:\"已通过\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:12:\"实名认证\";s:3:\"url\";s:0:\"\";}}', null, null, '1399711723', null);
INSERT INTO keke_witkey_feed VALUES ('7777', '3436', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:26:\"评审招标测试流程22\";s:3:\"url\";s:25:\"index.php?do=task&id=3436\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"2\";}}', null, null, '1399864892', null);
INSERT INTO keke_witkey_feed VALUES ('7784', '3441', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:18:\"风尚大典地方\";s:3:\"url\";s:25:\"index.php?do=task&id=3441\";s:4:\"cash\";s:2:\"41\";s:8:\"model_id\";s:1:\"5\";}}', null, null, '1399880247', null);
INSERT INTO keke_witkey_feed VALUES ('7785', '3440', '', 'work_accept', '4', '注册', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"注册\";s:3:\"url\";s:24:\"index.php?do=seller&id=4\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:16:\"入围热污染 \";s:3:\"url\";s:25:\"index.php?do=task&id=3440\";s:4:\"cash\";d:25;}}', null, null, '1399880763', null);
INSERT INTO keke_witkey_feed VALUES ('7786', '3440', '', 'work_accept', '4', '注册', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"注册\";s:3:\"url\";s:24:\"index.php?do=seller&id=4\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:16:\"入围热污染 \";s:3:\"url\";s:25:\"index.php?do=task&id=3440\";s:4:\"cash\";d:25;}}', null, null, '1399880772', null);
INSERT INTO keke_witkey_feed VALUES ('7787', '3442', '', 'pub_task', '5527', '我爱小护士', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:15:\"我爱小护士\";s:3:\"url\";s:27:\"index.php?do=seller&id=5527\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:21:\"诚招护士看护师\";s:3:\"url\";s:25:\"index.php?do=task&id=3442\";s:4:\"cash\";s:6:\"900.00\";s:8:\"model_id\";s:1:\"2\";}}', null, null, '1399884551', null);
INSERT INTO keke_witkey_feed VALUES ('7788', '3443', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:18:\"打算打算是的\";s:3:\"url\";s:25:\"index.php?do=task&id=3443\";s:4:\"cash\";s:2:\"41\";s:8:\"model_id\";s:1:\"5\";}}', null, null, '1399884710', null);
INSERT INTO keke_witkey_feed VALUES ('7789', '3444', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:18:\"按时发生发的\";s:3:\"url\";s:25:\"index.php?do=task&id=3444\";s:4:\"cash\";s:2:\"34\";s:8:\"model_id\";s:1:\"4\";}}', null, null, '1399884844', null);
INSERT INTO keke_witkey_feed VALUES ('7790', '3442', '', 'work_accept', '5528', '扬破帆逐美梦', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:18:\"扬破帆逐美梦\";s:3:\"url\";s:27:\"index.php?do=seller&id=5528\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:22:\"诚招护士看护师 \";s:3:\"url\";s:25:\"index.php?do=task&id=3442\";s:4:\"cash\";d:50;}}', null, null, '1399885004', null);
INSERT INTO keke_witkey_feed VALUES ('7791', '3442', '', 'work_accept', '5528', '扬破帆逐美梦', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:18:\"扬破帆逐美梦\";s:3:\"url\";s:27:\"index.php?do=seller&id=5528\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:22:\"诚招护士看护师 \";s:3:\"url\";s:25:\"index.php?do=task&id=3442\";s:4:\"cash\";d:150;}}', null, null, '1399885032', null);
INSERT INTO keke_witkey_feed VALUES ('7792', '3442', '', 'work_accept', '5528', '扬破帆逐美梦', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:18:\"扬破帆逐美梦\";s:3:\"url\";s:27:\"index.php?do=seller&id=5528\";}s:6:\"action\";a:2:{s:7:\"content\";s:15:\"成功中标了\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:3:{s:7:\"content\";s:22:\"诚招护士看护师 \";s:3:\"url\";s:25:\"index.php?do=task&id=3442\";s:4:\"cash\";d:75;}}', null, null, '1399885049', null);
INSERT INTO keke_witkey_feed VALUES ('7793', '1177', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1177\">求新年祝福的短信</a>', 'service', '4', '注册', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:6:\"注册\";s:3:\"url\";s:24:\"index.php?do=seller&id=4\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:24:\"求新年祝福的短信\";s:3:\"url\";s:26:\"index.php?do=goods&id=1177\";}}', null, null, '1399885491', null);
INSERT INTO keke_witkey_feed VALUES ('7794', '1176', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:25:\"编辑为商品的稿件s\";s:3:\"url\";s:26:\"index.php?do=goods&id=1176\";}}', null, null, '1399885532', null);
INSERT INTO keke_witkey_feed VALUES ('7795', '3445', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:24:\"斯蒂芬是的发送到\";s:3:\"url\";s:25:\"index.php?do=task&id=3445\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399886153', null);
INSERT INTO keke_witkey_feed VALUES ('7796', '3446', '', 'pub_task', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:12:\"发布任务\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:4:{s:7:\"content\";s:15:\"特瑞特人物\";s:3:\"url\";s:25:\"index.php?do=task&id=3446\";s:4:\"cash\";s:6:\"100.00\";s:8:\"model_id\";s:1:\"1\";}}', null, null, '1399886834', null);
INSERT INTO keke_witkey_feed VALUES ('7797', '1183', '<a href=\"http://demo.kppw.cn/index.php?do=goods&id=1183\">我编辑了个作品销售</a>', 'service', '1', 'admin', '', 'a:3:{s:13:\"feed_username\";a:2:{s:7:\"content\";s:5:\"admin\";s:3:\"url\";s:24:\"index.php?do=seller&id=1\";}s:6:\"action\";a:2:{s:7:\"content\";s:6:\"购买\";s:3:\"url\";s:0:\"\";}s:5:\"event\";a:2:{s:7:\"content\";s:27:\"我编辑了个作品销售\";s:3:\"url\";s:26:\"index.php?do=goods&id=1183\";}}', null, null, '1399886962', null);

-- ----------------------------
-- Table structure for `keke_witkey_file`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_file`;
CREATE TABLE `keke_witkey_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(20) DEFAULT NULL,
  `task_id` int(11) DEFAULT '0',
  `work_id` int(11) DEFAULT NULL,
  `task_title` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `save_name` varchar(200) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`file_id`),
  KEY `index_3` (`task_id`),
  KEY `index_4` (`uid`),
  KEY `work_id` (`work_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5774 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_file
-- ----------------------------
INSERT INTO keke_witkey_file VALUES ('5566', 'task', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/04/28/1915779478535dc0e54de34.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5567', 'task', null, '0', '0', null, 'chahua3280.jpg', 'data/uploads/2014/04/28/1390471015535dc0fd4a685.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5568', 'task', null, '0', '0', null, 'chahua3278.jpg', 'data/uploads/2014/04/28/1659851306535dc1273decc.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5569', 'task', null, '0', '0', null, 'chahua3280.jpg', 'data/uploads/2014/04/28/284049414535dc127761cd.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5570', 'task', null, '0', '0', null, '531ea49901baa.png', 'data/uploads/2014/04/28/1227267329535dc1e171dfb.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5571', 'task', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/04/28/1921139880535dc69beaee5.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5572', 'task', null, '0', '0', null, 'chahua3278.jpg', 'data/uploads/2014/04/28/846495695535dc69c35905.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5573', 'task', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/04/28/330759852535dcc174371d.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5574', 'task', null, '3319', '0', '典当行Logo设计Logo设计', '6608733_111642062000_2.jpg', 'data/uploads/2014/04/28/152059162535dedc5b9c39.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5575', 'task', null, '3319', '0', '典当行Logo设计Logo设计', '18297251_105907091369_2.jpg', 'data/uploads/2014/04/28/559876323535dedc5dfc37.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5576', 'task', null, '0', '0', null, '164827596951e661bba5527.jpg', 'data/uploads/2014/04/28/1670392269535e1410e487d.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5577', 'task', null, '0', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/28/1108706269535e14113a2c2.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5578', 'task', null, '0', '0', null, '202549517651e661af77e85.jpg', 'data/uploads/2014/04/28/742453164535e14116e679.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5579', 'task', null, '0', '0', null, '18297251_105907091369_2.jpg', 'data/uploads/2014/04/28/1869260173535e1642e3efb.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5580', 'task', null, '0', '0', null, '6608733_111642062000_2.jpg', 'data/uploads/2014/04/28/2024200519535e1690d35ef.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5581', 'task', null, '0', '0', null, 'chahua3280.jpg', 'data/uploads/2014/04/28/1000612080535e1697d88a4.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5582', 'task', null, '0', '0', null, '531ea49901baa.png', 'data/uploads/2014/04/28/628000498535e19feacd72.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5583', 'task', null, '0', '0', null, 'chahua3265.jpg', 'data/uploads/2014/04/28/1781514201535e19ff2c487.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5584', 'task', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/04/28/554099864535e19ff8b130.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5585', 'task', null, '0', '0', null, 'chahua3278.jpg', 'data/uploads/2014/04/28/766044630535e1a00f05d9.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5586', 'task', null, '0', '0', null, 'chahua3280.jpg', 'data/uploads/2014/04/28/1524310709535e1a0192069.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5587', 'task', null, '0', '0', null, '10295_223414697231_2.jpg', 'data/uploads/2014/04/28/228068524535e1b035e107.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5588', 'task', null, '0', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/28/1110061010535e1b03aa04c.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5589', 'task', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/28/593987602535e1b03e9caa.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5590', 'task', null, '0', '0', null, '6453660_121953566329_2.jpg', 'data/uploads/2014/04/28/77482332535e1b0439c26.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5591', 'task', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/28/1496730930535e1c101c76c.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5592', 'work', null, '3342', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/28/1050340192535e1c8db2fde.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5593', 'task', null, '0', '0', null, 'py.jpg', 'data/uploads/2014/04/28/275037804535e1d18f3ecb.jpg', '5498', 'shangk', '0');
INSERT INTO keke_witkey_file VALUES ('5594', 'task', null, '0', '0', null, 's.jpg', 'data/uploads/2014/04/28/863522449535e1d24c0a95.jpg', '5498', 'shangk', '0');
INSERT INTO keke_witkey_file VALUES ('5595', 'task', null, '0', '0', null, 's.jpg', 'data/uploads/2014/04/28/779614576535e1d338930d.jpg', '5498', 'shangk', '0');
INSERT INTO keke_witkey_file VALUES ('5596', 'work', null, '3322', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/28/1838796999535e1d76698bf.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5597', 'work', null, '3325', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/28/1613316791535e1dbeeba70.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5598', 'work', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/28/1144878549535e2047d76d0.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5599', 'work', null, '0', '0', null, '6453660_121953566329_2.jpg', 'data/uploads/2014/04/28/1142724289535e207015ba8.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5600', 'work', null, '3341', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/28/1382268160535e20d1af702.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5601', 'service', null, '0', '0', null, '6608733_111642062000_2.jpg', 'data/uploads/2014/04/29/2058980536535f00a2bbd8e.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5602', 'service', null, '0', '0', null, '6608733_111642062000_2.jpg', 'data/uploads/2014/04/29/266952105535f01c7af420.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5603', 'work', null, '3343', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/29/748665033535f068781db0.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5604', 'task', null, '0', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/29/1392352741535f086f10843.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5605', 'task', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/29/1614113784535f08786a791.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5606', 'task', null, '0', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/29/81117338535f0cd214563.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5607', 'work', null, '3343', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/29/789912177535f0df52c274.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5608', 'work', null, '3344', '0', null, 'QQ图片20140409194229.jpg', 'data/uploads/2014/04/29/263767809535f0e2723918.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5609', 'work', null, '3344', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/29/3496059535f0e274ecf5.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5610', 'work', null, '3344', '0', null, 'QQ图片20140409194229.jpg', 'data/uploads/2014/04/29/780012464535f156035b16.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5611', 'work', null, '3344', '0', null, 'QQ图片20140409194229.jpg', 'data/uploads/2014/04/29/1096408896535f162eb89cb.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5612', 'work', null, '0', '0', null, 'QQ图片20140409202743.jpg', 'data/uploads/2014/04/29/1359329712535f1d48dd7bc.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5613', 'work', null, '3322', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/29/1064926600535f218a249eb.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5614', 'task', null, '3347', '0', '网站论坛推广营销方案', 'Chrysanthemum.jpg', 'data/uploads/2014/04/29/1747244658535f366ed3981.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5615', 'service', null, '0', '0', null, '2222.jpg', 'data/uploads/2014/04/29/1451432850535f61cb45ae5.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5616', 'task', null, '3348', '0', '航天员发布的作品', 'jjs.jpg', 'data/uploads/2014/04/29/826568328535f647fd9f8b.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5617', 'task', null, '0', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/29/1211936608535f64d0176ed.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5618', 'task', null, '3349', '0', '男装店起名', '20081023115234637_2.jpg', 'data/uploads/2014/04/29/762343433535f6615660ad.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5619', 'service', null, '0', '0', null, '184676987351e66177a8910.jpg', 'data/uploads/2014/04/29/490897841535f6843b8161.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5620', 'task', null, '3350', '0', '茶餐厅营销策略撰写', 'chahua3278.jpg', 'data/uploads/2014/04/29/1017870768535f6970d5880.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5621', 'task', null, '0', '0', null, '6244a327tcb8c198f2abb&690.jpg', 'data/uploads/2014/04/30/184469097953604e828dd1e.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5622', 'service', null, '0', '0', null, '6608733_111642062000_2.jpg', 'data/uploads/2014/04/30/531808088536050fc0d428.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5623', 'service', null, '0', '0', null, '531ea49901baa.png', 'data/uploads/2014/04/30/23813749753605117080a3.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5624', 'service', null, '0', '0', null, '202549517651e661af77e85.jpg', 'data/uploads/2014/04/30/5363934455360512a4bf17.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5625', 'service', null, '0', '0', null, 'chahua3265.jpg', 'data/uploads/2014/04/30/10798013115360513c3dbcf.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5626', 'service', null, '0', '0', null, '18297251_105907091369_2.jpg', 'data/uploads/2014/04/30/408537908536051538e216.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5627', 'service', null, '0', '0', null, 'chahua3280.jpg', 'data/uploads/2014/04/30/213337841653605166ad205.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5628', 'service', null, '0', '0', null, 'chahua3278.jpg', 'data/uploads/2014/04/30/2437744155360517ab6244.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5629', 'service', null, '0', '0', null, '164827596951e661bba5527.jpg', 'data/uploads/2014/04/30/9930447675360518fb97b2.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5630', 'service', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/30/851625113536051af00773.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5631', 'service', null, '0', '0', null, '10295_223414697231_2.jpg', 'data/uploads/2014/04/30/1976225263536051c943749.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5632', 'service', null, '0', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/30/785945063536051d6b28cf.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5633', 'service', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/04/30/1910523126536051fa8c984.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5634', 'task', null, '0', '0', null, '164827596951e661bba5527.jpg', 'data/uploads/2014/04/30/34437625153605916a4287.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5635', 'work', null, '3342', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/04/30/198317782753605e9a465cf.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5636', 'task', null, '0', '0', null, '1.jpg', 'data/uploads/2014/04/30/17855050015360637ebbf41.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5637', 'task', null, '0', '0', null, '2.jpg', 'data/uploads/2014/04/30/18675817975360637fee511.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5638', 'task', null, '0', '0', null, '3.JPG', 'data/uploads/2014/04/30/5507712425360638330499.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5639', 'task', null, '0', '0', null, '4.jpg', 'data/uploads/2014/04/30/161834771053606385e01b4.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5640', 'task', null, '3356', '0', '表白信息撰写', '1.jpeg', 'data/uploads/2014/04/30/197264495853606718dd89f.jpeg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5641', 'task', null, '3356', '0', '表白信息撰写', '2.jpg', 'data/uploads/2014/04/30/18292775575360671c05519.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5642', 'task', null, '3356', '0', '表白信息撰写', '3.JPG', 'data/uploads/2014/04/30/7399943355360671f8f720.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5643', 'task', null, '3356', '0', '表白信息撰写', '4.jpg', 'data/uploads/2014/04/30/151463793153606721dce06.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5644', 'service', null, '0', '0', null, '1.jpg', 'data/uploads/2014/04/30/1292878844536067fab560c.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5645', 'task', null, '3357', '0', '公司标识设计', '3.jpg', 'data/uploads/2014/04/30/17103520595360698fa1d6c.jpg', '5501', 'luoke', '0');
INSERT INTO keke_witkey_file VALUES ('5646', 'task', null, '3357', '0', '公司标识设计', '1.jpg', 'data/uploads/2014/04/30/14724826625360698fc6e71.jpg', '5501', 'luoke', '0');
INSERT INTO keke_witkey_file VALUES ('5647', 'task', null, '3357', '0', '公司标识设计', '2.jpg', 'data/uploads/2014/04/30/18066863455360698feb401.jpg', '5501', 'luoke', '0');
INSERT INTO keke_witkey_file VALUES ('5648', 'work', null, '3358', '0', null, '1.jpg', 'data/uploads/2014/04/30/150927644753606b6d1f21b.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5649', 'task', null, '0', '0', null, '5.jpg', 'data/uploads/2014/04/30/52139367053606b8cccd72.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5650', 'work', '2059', '3355', '2059', '金融行业投资公司LOGO设计', '4.jpg', 'data/uploads/2014/04/30/22762866153606bd6eaf54.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5651', 'task', null, '0', '0', null, '1.jpg', 'data/uploads/2014/04/30/189385801553606c945e75e.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5652', 'task', null, '0', '0', null, '2.jpg', 'data/uploads/2014/04/30/24869494353606c980f280.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5653', 'task', null, '0', '0', null, '3.jpg', 'data/uploads/2014/04/30/194097185653606c9b4ce94.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5654', 'task', null, '0', '0', null, '1.rar', 'data/uploads/2014/04/30/181638899553606cd295ad7.rar', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5655', 'task', null, '0', '0', null, '3610-img52623.jpg', 'data/uploads/2014/04/30/172019608053606ff162f22.jpg', '5500', '艾仁', '0');
INSERT INTO keke_witkey_file VALUES ('5656', 'task', null, '0', '0', null, '6453660_121953566329_2.jpg', 'data/uploads/2014/04/30/214798445536074c3a3f73.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5657', 'task', null, '0', '0', null, '10295_223414697231_2.jpg', 'data/uploads/2014/04/30/520935891536074c40f305.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5658', 'task', null, '0', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/30/1653678097536074c457aa2.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5659', 'task', null, '0', '0', null, '2786001_161410782000_2.jpg', 'data/uploads/2014/04/30/1680551409536074c4aaf26.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5660', 'task', null, '0', '0', null, '20081023115234637_2.jpg', 'data/uploads/2014/04/30/1657671057536084d30cbec.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5661', 'task', null, '0', '0', null, '测试.zip', 'data/uploads/2014/04/30/1387290036536084eb2e4ee.zip', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5662', 'work', null, '0', '0', null, '6608733_111642062000_2.jpg', 'data/uploads/2014/04/30/6190118555360860c15bf9.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5663', 'work', '2060', '3327', '2060', '小说原创网站建设', '4.jpg', 'data/uploads/2014/04/30/8156446155360880468429.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5664', 'service', null, '0', '0', null, 'OOOPIC_sly1988_2009110324783492a7bfd0ae.jpg', 'data/uploads/2014/04/30/18486544395360922c0f99f.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5665', 'service', null, '0', '0', null, 'OOOPIC_zhaohua0825_200909055d472c56e7882944.jpg', 'data/uploads/2014/04/30/99873116253609290d058f.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5666', 'service', null, '0', '0', null, 'QQ图片20140430140714.jpg', 'data/uploads/2014/04/30/17317792555360935424eb8.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5667', 'service', null, '0', '0', null, '793798_001018093_2.jpg', 'data/uploads/2014/04/30/64516463953609368d745f.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5668', 'service', null, '0', '0', null, 'QQ图片20140430140908.jpg', 'data/uploads/2014/04/30/20602334035360939eba520.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5669', 'service', null, '0', '0', null, '4e7215ec10539.jpg', 'data/uploads/2014/04/30/1503731053536093f0a485e.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5670', 'task', null, '0', '0', null, 'QQ图片20140430140714.jpg', 'data/uploads/2014/04/30/277958365536096139c552.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5671', 'task', null, '0', '0', null, '0040060019.jpg', 'data/uploads/2014/04/30/7716277545360964d7b3d0.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5672', 'task', null, '0', '0', null, 'QQ图片20140430135351.jpg', 'data/uploads/2014/04/30/20737869895360ba2b2f79a.jpg', '5503', '下线', '0');
INSERT INTO keke_witkey_file VALUES ('5673', 'task', null, '0', '0', null, 'QQ图片20140430135501.jpg', 'data/uploads/2014/04/30/13029741865360bbaf0522f.jpg', '5504', '下线的下线', '0');
INSERT INTO keke_witkey_file VALUES ('5674', 'task', null, '0', '0', null, '61224f3b754fa45b2.png', 'data/uploads/2014/04/30/1993347145360be4dbe531.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5675', 'task', null, '0', '0', null, '223734f3b09ff3b85d.png', 'data/uploads/2014/04/30/1040167055360be5248c28.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5676', 'task', null, '0', '0', null, '223734f3b09ff3b85d.png', 'data/uploads/2014/04/30/18817572555360be5ff3924.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5677', 'task', null, '0', '0', null, '61224f3b754fa45b2.png', 'data/uploads/2014/04/30/16529091445360be865efed.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5678', 'task', null, '0', '0', null, '226204f3b09f878636.png', 'data/uploads/2014/04/30/16977793585360be8954832.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5679', 'task', null, '0', '0', null, '223734f3b09ff3b85d.png', 'data/uploads/2014/04/30/18508987695360be9f624c8.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5680', 'task', null, '0', '0', null, '226204f3b09f878636.png', 'data/uploads/2014/04/30/371621985360beb29750c.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5681', 'task', null, '0', '0', null, '223734f3b09ff3b85d.png', 'data/uploads/2014/04/30/8432762075360beb591dd0.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5682', 'task', null, '0', '0', null, '222604f3b0a950dbef.png', 'data/uploads/2014/04/30/13152361055360bf090514a.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5683', 'task', null, '0', '0', null, '36134f3b0aa420af9.png', 'data/uploads/2014/04/30/16188896455360bf0d1be45.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5684', 'task', null, '0', '0', null, '21944f3b0aa6ee63f.png', 'data/uploads/2014/04/30/3490939025360bf102c405.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5685', 'task', null, '0', '0', null, '12494f3b0a4e3f184.png', 'data/uploads/2014/04/30/18396466165360bf4b8b54e.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5686', 'task', null, '0', '0', null, '209984f3b0a5d75a91.png', 'data/uploads/2014/04/30/14618029015360bf4faa5a4.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5687', 'task', null, '0', '0', null, '288714f3b0a610f12e.png', 'data/uploads/2014/04/30/14184939525360bf55aae9e.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5688', 'task', null, '0', '0', null, '235435192f790c6a14.gif', 'data/uploads/2014/04/30/11274065225360bfb321487.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5689', 'task', null, '0', '0', null, '25615192f79d6f729.gif', 'data/uploads/2014/04/30/544278795360bfc229261.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5690', 'task', null, '0', '0', null, '165505192f7a605fb6.gif', 'data/uploads/2014/04/30/12659901985360bfc756bac.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5691', 'task', null, '0', '0', null, '160885192f711e500f.gif', 'data/uploads/2014/04/30/13649877875360bfe0723a8.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5692', 'task', null, '0', '0', null, '113224f3b0a2787aef.png', 'data/uploads/2014/04/30/6763925255360bfe396304.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5693', 'task', null, '0', '0', null, '125234f3b0a2b64ffa.png', 'data/uploads/2014/04/30/20098069825360bfe8084b6.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5694', 'task', null, '0', '0', null, 'py.jpg', 'data/uploads/2014/04/30/15251671365360c003433e4.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5695', 'task', null, '0', '0', null, '214595192f74dc37c0.gif', 'data/uploads/2014/04/30/8261241925360c008e1611.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5696', 'task', null, '0', '0', null, '40775192f7be465a6.gif', 'data/uploads/2014/04/30/11812999235360c027955a9.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5697', 'task', null, '0', '0', null, '124675192f7d06db02.gif', 'data/uploads/2014/04/30/14968064885360c0311f4cf.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5698', 'task', null, '0', '0', null, '197345192f72191206.gif', 'data/uploads/2014/04/30/6833481645360c04e945d5.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5699', 'task', null, '0', '0', null, '104045192f6d52e6e1.gif', 'data/uploads/2014/04/30/2082409295360c06134aec.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5700', 'task', null, '0', '0', null, '270745192f6f846a31.gif', 'data/uploads/2014/04/30/18524532935360c066c63b6.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5701', 'task', null, '0', '0', null, '302215192f6eb94609.gif', 'data/uploads/2014/04/30/9619152635360c06d80d48.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5702', 'task', null, '0', '0', null, '118105192f7c4b13de.gif', 'data/uploads/2014/04/30/11668319785360c083a3709.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5703', 'task', null, '0', '0', null, '169455192f719d6061.gif', 'data/uploads/2014/04/30/17578068825360c095d9e81.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5704', 'task', null, '0', '0', null, 'py.jpg', 'data/uploads/2014/04/30/14819474145360c1003b1d6.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5705', 'task', null, '0', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/04/30/3815774855360c9f275459.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5706', 'task', null, '0', '0', null, '0040060019.jpg', 'data/uploads/2014/04/30/3074847645360ca37a81c3.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5707', 'task', null, '0', '0', null, '4e7215ec10539.jpg', 'data/uploads/2014/04/30/7256277015360cad96b7f7.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5708', 'task', null, '0', '0', null, '214595192f74dc37c0.gif', 'data/uploads/2014/04/30/5564655835360cb8d189cc.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5709', 'task', null, '0', '0', null, '110245192f756a5209.gif', 'data/uploads/2014/04/30/10600707005360cb9f0bdb0.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5710', 'task', null, '0', '0', null, '223734f3b09ff3b85d.png', 'data/uploads/2014/04/30/17748582325360cba1a6c32.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5711', 'task', null, '0', '0', null, '110245192f756a5209.gif', 'data/uploads/2014/04/30/9387293575360cbb15190f.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5712', 'task', null, '0', '0', null, '261215192f7600e084.gif', 'data/uploads/2014/04/30/19968075045360cbb4c1d9a.gif', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5713', 'task', null, '0', '0', null, 'Tulips.jpg', 'data/uploads/2014/04/30/2508976175360cdeb3b843.jpg', '5507', '推广下线', '0');
INSERT INTO keke_witkey_file VALUES ('5714', 'task', null, '0', '0', null, 'Tulips.jpg', 'data/uploads/2014/04/30/7720310555360cebb114ea.jpg', '5508', '安德敏的下线', '0');
INSERT INTO keke_witkey_file VALUES ('5715', 'agreement', null, '0', '0', null, 'Penguins.jpg', 'data/uploads/2014/04/30/6240860105360d17980aee.jpg', '5508', '安德敏的下线', '0');
INSERT INTO keke_witkey_file VALUES ('5716', 'task', null, '0', '0', null, 'QQ图片20140430140714.jpg', 'data/uploads/2014/05/05/45564700153672819d785b.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5717', 'task', null, '3378', '0', '网页动画设计', '11.jpg', 'data/uploads/2014/05/06/11894442675368485acf9b4.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5718', 'task', null, '3379', '0', '艺术照处理', '11.jpg', 'data/uploads/2014/05/06/1326771099536849a537334.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5719', 'work', '2092', '3379', '2092', '艺术照处理', '11.jpg', 'data/uploads/2014/05/06/1576166063536849f485760.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5720', 'work', null, '3379', '0', null, '11.jpg', 'data/uploads/2014/05/06/91315060953684a29d6874.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5721', 'work', '2091', '3379', '2091', '艺术照处理', '11.jpg', 'data/uploads/2014/05/06/7237002153684a54e3d89.jpg', '5502', '洛克', '0');
INSERT INTO keke_witkey_file VALUES ('5722', 'work', '2092', '3379', '2092', '艺术照处理', '11.jpg', 'data/uploads/2014/05/06/119900229753684a6234662.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5723', 'task', null, '3381', '0', '网站Logo设计', '11.jpg', 'data/uploads/2014/05/06/117186011353684daa22f32.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5724', 'agreement', null, '0', '0', null, '11.jpg', 'data/uploads/2014/05/06/163580444853684e7ad65ed.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5725', 'work', '2100', '3384', '2100', '汇诚Logo设计', '11.jpg', 'data/uploads/2014/05/06/762399506536853365ee24.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5726', 'task', null, '0', '0', null, 'Penguins - 副本.jpg', 'data/uploads/2014/05/06/2136376209536854cfe6a8e.jpg', '5504', '下线的下线', '0');
INSERT INTO keke_witkey_file VALUES ('5727', 'task', null, '0', '0', null, '测试.zip', 'data/uploads/2014/05/06/1607711387536854e296d14.zip', '5504', '下线的下线', '0');
INSERT INTO keke_witkey_file VALUES ('5728', 'agreement', null, '0', '0', null, '11.jpg', 'data/uploads/2014/05/06/191082237536856008aa35.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5729', 'work', null, '3398', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/13932296525368911ab6987.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5730', 'work', null, '3398', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/05/06/744638804536891e0d94ac.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5731', 'work', null, '3399', '0', null, 'Desert.jpg', 'data/uploads/2014/05/06/14174799035368953e74255.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5732', 'work', null, '3400', '0', null, 'Hydrangeas.jpg', 'data/uploads/2014/05/06/773269625536895e6f25f5.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5733', 'work', null, '3401', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/1075510788536896f7a106c.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5734', 'work', null, '3402', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/11757623953689b5f492c3.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5735', 'work', null, '3402', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/207040702453689cf15c401.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5736', 'work', null, '3398', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/21979835953689fe0306ee.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5737', 'work', null, '3403', '0', null, 'QQ图片20140409202743.jpg', 'data/uploads/2014/05/06/3085399235368a254ef001.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5738', 'work', null, '3404', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/346117155368a2f7b0d74.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5739', null, null, '0', null, null, 'windows_9-002.jpg', 'data/uploads/2014/05/06/16832917515368a4f714f21.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5740', 'task', null, '3405', '0', '红烧鸡翅-红烧鱼', 'phpsdk2.1.2.zip', 'data/uploads/2014/05/06/14071446965368a503d7ec5.zip', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5741', 'work', '2122', '3405', '2122', '红烧鸡翅-红烧鱼', 'windows_9-006.jpg', 'data/uploads/2014/05/06/6885032435368a547106b5.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5742', 'work', '2122', '3405', '2122', '红烧鸡翅-红烧鱼', 'windows_9-011.jpg', 'data/uploads/2014/05/06/18460514935368a54b126c5.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5743', 'work', null, '0', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/05/06/19247727735368a878af8b6.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5744', 'work', null, '0', '0', null, 'QQ图片20140417190752.jpg', 'data/uploads/2014/05/06/9207624265368aef02f0fd.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5745', 'work', null, '0', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/06/12537557025368af96543c3.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5746', 'task', null, '0', '0', null, '6453660_121953566329_2.jpg', 'data/uploads/2014/05/07/9280396455369aa7982eee.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5747', 'work', null, '0', '0', null, 'QQ图片20140409202743.jpg', 'data/uploads/2014/05/07/5448844825369ae31cbde1.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5748', 'work', null, '3406', '0', null, 'QQ图片20140409202743.jpg', 'data/uploads/2014/05/07/7263870985369cc766b43e.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5749', 'work', null, '3361', '0', null, 'QQ图片20140409202743.jpg', 'data/uploads/2014/05/07/9535496785369d62e9195d.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5750', null, null, '0', null, null, 'QQ图片20140430135501.jpg', 'data/uploads/2014/05/07/8736588775369ea2f72bc6.jpg', '1', 'admin', '0');
INSERT INTO keke_witkey_file VALUES ('5751', null, null, '0', null, null, 'QQ图片20140417182419.jpg', 'data/uploads/2014/05/07/19498854765369eaafe9528.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5752', 'work', null, '0', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/05/09/1554413919536c895b99b67.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5753', 'task', null, '0', '0', null, '11.jpg', 'data/uploads/2014/05/10/1306460666536d847aad538.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5754', 'work', null, '3360', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/05/10/911312243536dc0fe94422.jpg', '5502', '洛克', '0');
INSERT INTO keke_witkey_file VALUES ('5755', 'task', null, '0', '0', null, 'QQ图片20140430140908.jpg', 'data/uploads/2014/05/10/876449918536dc1ad2cd1d.jpg', '5502', '洛克', '0');
INSERT INTO keke_witkey_file VALUES ('5756', 'agreement', null, '0', '0', null, 'QQ图片20140417184412.jpg', 'data/uploads/2014/05/10/1487830333536dc57a89381.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5757', 'att', null, '0', '0', null, 'brand-logo.png', 'data/uploads/2014/05/10/2082620170536dca8fc0ef0.png', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5758', 'task', null, '0', '0', null, 'QQ图片20140409194732.jpg', 'data/uploads/2014/05/10/1316434725536de7d5e81b2.jpg', '5495', '小鸟', '0');
INSERT INTO keke_witkey_file VALUES ('5759', 'task', null, '3442', '0', '诚招护士看护师', 'phpsdk2.1.2.zip', 'data/uploads/2014/05/12/148318893153708aba23891.zip', '5527', '我爱小护士', '0');
INSERT INTO keke_witkey_file VALUES ('5760', 'work', '2152', '3442', '2152', '诚招护士看护师', 'store_banner.jpg', 'data/uploads/2014/05/12/136843459053708bc6131bb.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5761', 'work', '2153', '3442', '2153', '诚招护士看护师', 'windows_9-002.jpg', 'data/uploads/2014/05/12/105308317753708be32e57d.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5762', 'work', '2154', '3442', '2154', '诚招护士看护师', 'store_banner.jpg', 'data/uploads/2014/05/12/87653601353708bf96f689.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5763', 'work', '2155', '3442', '2155', '诚招护士看护师', 'windows_9-006.jpg', 'data/uploads/2014/05/12/136399847253708c147fcbe.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5764', 'work', '2156', '3442', '2156', '诚招护士看护师', 'windows_9-015.jpg', 'data/uploads/2014/05/12/48215459653708c265367e.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5765', 'work', '2157', '3442', '2157', '诚招护士看护师', 'windows_9-015.jpg', 'data/uploads/2014/05/12/12688971153708c4264d58.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5766', 'work', '2158', '3442', '2158', '诚招护士看护师', 'windows_9-006.jpg', 'data/uploads/2014/05/12/188461945953708c5273979.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5767', 'work', '2159', '3442', '2159', '诚招护士看护师', 'store_banner.jpg', 'data/uploads/2014/05/12/156561250253708c5e8e037.jpg', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5768', 'work', '2160', '3442', '2160', '诚招护士看护师', '002.png', 'data/uploads/2014/05/12/80032249853708c816b847.png', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5769', 'work', '2161', '3442', '2161', '诚招护士看护师', '秒杀.png', 'data/uploads/2014/05/12/194730778953708ca097db2.png', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5770', 'work', '2162', '3442', '2162', '诚招护士看护师', '4.png', 'data/uploads/2014/05/12/42750729753708cb299f33.png', '5528', '扬破帆逐美梦', '0');
INSERT INTO keke_witkey_file VALUES ('5771', 'task', null, '0', '0', null, 'Chrysanthemum.jpg', 'data/uploads/2014/05/12/73868425853708e7a3e99a.jpg', '0', null, '0');
INSERT INTO keke_witkey_file VALUES ('5772', 'task', null, '0', '0', null, 'chahua3277.jpg', 'data/uploads/2014/05/12/1248435235370942e387ae.jpg', '4', '注册', '0');
INSERT INTO keke_witkey_file VALUES ('5773', 'task', null, '0', '0', null, '测试.zip', 'data/uploads/2014/05/12/46786230553709449227dc.zip', '4', '注册', '0');

-- ----------------------------
-- Table structure for `keke_witkey_finance`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_finance`;
CREATE TABLE `keke_witkey_finance` (
  `fina_id` int(11) NOT NULL AUTO_INCREMENT,
  `fina_type` char(10) DEFAULT '0',
  `fina_action` char(20) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(10) DEFAULT NULL,
  `fina_cash` decimal(10,3) DEFAULT '0.000',
  `user_balance` decimal(10,3) DEFAULT '0.000',
  `fina_credit` decimal(10,3) DEFAULT '0.000',
  `user_credit` decimal(10,3) DEFAULT '0.000',
  `fina_source` char(20) DEFAULT NULL,
  `fina_time` int(11) DEFAULT '0',
  `recharge_cash` decimal(10,2) DEFAULT '0.00',
  `site_profit` decimal(10,3) DEFAULT '0.000',
  `fina_mem` varchar(200) DEFAULT NULL,
  `is_trust` int(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  PRIMARY KEY (`fina_id`),
  KEY `index_1` (`fina_id`),
  KEY `index_2` (`order_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=23300 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_finance
-- ----------------------------
INSERT INTO keke_witkey_finance VALUES ('23263', 'out', 'buy_service', '80005389', '5495', '小鸟', 'service', '1182', '50.000', '11785.000', '0.000', '0.000', null, '1399707289', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1182\">的范德萨发生的</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23264', 'out', 'buy_service', '0', '5495', '小鸟', 'service', '1177', '101.000', '11684.000', '0.000', '0.000', null, '1399707737', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23265', 'out', 'buy_service', '0', '5495', '小鸟', 'service', '1173', '50.000', '11634.000', '0.000', '0.000', null, '1399709971', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23266', 'out', 'buy_service', '80005391', '5500', '艾仁', 'service', '1182', '100.000', '9871.000', '0.000', '0.000', null, '1399709975', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1182\">的范德萨发生的</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23267', 'out', 'pub_task', '0', '1', 'admin', 'task', '3432', '100.000', '2241759.010', '0.000', '0.000', null, '1399710136', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3432\">斯蒂芬斯蒂芬</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23268', 'in', 'task_bid', '0', '5495', '小鸟', 'task', '3432', '90.000', '11724.000', '0.000', '0.000', '', '1399710389', '0.00', '10.000', '参与任务<a href=\"index.php?do=task&id=3432\">斯蒂芬斯蒂芬</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23269', 'in', 'task_bid', '0', '5500', '艾仁', 'task', '3430', '45.000', '9916.000', '0.000', '0.000', '', '1399714447', '0.00', '5.000', '参与任务<a href=\"index.php?do=task&id=3430\">范德萨发斯蒂芬</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23270', 'in', 'task_bid', '0', '1', 'admin', 'task', '3415', '90.000', '2241849.010', '0.000', '0.000', '', '1399715022', '0.00', '10.000', '参与任务<a href=\"index.php?do=task&id=3415\">酒店会员卡设计</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23271', 'in', 'sale_service', '0', '1', 'admin', 'service', '1173', '45.000', '2241894.010', '0.000', '0.000', '', '1399857066', '0.00', '5.000', '卖出服务或商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>所得', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23272', 'in', 'sale_service', '0', '1', 'admin', 'service', '1177', '90.900', '2241984.910', '0.000', '0.000', '', '1399857069', '0.00', '10.100', '卖出服务或商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>所得', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23273', 'in', 'task_bid', '0', '5502', '洛克', 'task', '3339', '80.000', '80.000', '0.000', '0.000', '', '1399857073', '0.00', '20.000', '参与任务<a href=\"index.php?do=task&id=3339\">人格心理学线上問卷，每份7元</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23274', 'out', 'buy_service', '0', '5501', 'luoke', 'service', '1162', '150.000', '9999999.999', '0.000', '0.000', null, '1399857707', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1162\">银器银制礼品设计</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23275', 'in', 'rights_return', '0', '5501', 'luoke', null, null, '10.000', '9999999.999', '0.000', '0.000', null, '1399858001', '0.00', '0.000', '维权返还', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23276', 'in', 'rights_return', '0', '5500', '艾仁', null, null, '140.000', '10056.000', '0.000', '0.000', null, '1399858001', '0.00', '0.000', '维权返还', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23277', 'out', 'pub_task', '0', '1', 'admin', 'task', '3435', '120.000', '2241864.910', '0.000', '0.000', null, '1399864797', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3435\">航天员发布的作品3</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23278', 'out', 'pub_task', '0', '1', 'admin', 'task', '3436', '100.000', '2241764.910', '0.000', '0.000', null, '1399864892', '0.00', '0.000', '发布多人悬赏任务<a href=\"index.php?do=task&id=3436\">评审招标测试流程22</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23279', 'out', 'pub_task', '0', '1', 'admin', 'task', '3437', '30.000', '2241734.910', '0.000', '0.000', null, '1399864937', '0.00', '0.000', '发布:model_name任务<a href=\"index.php?do=task&id=:task_id\">:task_title</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23280', 'out', 'pub_task', '0', '5523', '扬帆逐梦', 'task', '3438', '2000.000', '9999999.999', '0.000', '0.000', null, '1399865446', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3438\">动漫周边商城网站</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23281', 'out', 'pub_task', '0', '1', 'admin', 'task', '3439', '100.000', '2241634.910', '0.000', '0.000', null, '1399879835', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3439\">发大幅度发送到</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23282', 'out', 'pub_task', '0', '1', 'admin', 'task', '3440', '100.000', '2241534.910', '0.000', '0.000', null, '1399880012', '0.00', '0.000', '发布多人悬赏任务<a href=\"index.php?do=task&id=3440\">入围热污染</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23283', 'out', 'pub_task', '0', '1', 'admin', 'task', '3441', '30.000', '2241504.910', '0.000', '0.000', null, '1399880247', '0.00', '0.000', '发布:model_name任务<a href=\"index.php?do=task&id=:task_id\">:task_title</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23284', 'in', 'task_bid', '0', '4', '注册', 'task', '3440', '20.000', '20.000', '0.000', '0.000', '', '1399881017', '0.00', '5.000', '参与任务<a href=\"index.php?do=task&id=3440\">入围热污染</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23285', 'in', 'task_bid', '0', '4', '注册', 'task', '3440', '20.000', '40.000', '0.000', '0.000', '', '1399881018', '0.00', '5.000', '参与任务<a href=\"index.php?do=task&id=3440\">入围热污染</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23286', 'in', 'task_bid', '0', '4', '注册', 'task', '3440', '40.000', '80.000', '0.000', '0.000', '', '1399881018', '0.00', '10.000', '参与任务<a href=\"index.php?do=task&id=3440\">入围热污染</a>，稿件被选为中标稿件', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23287', 'in', 'task_fail', '0', '1', 'admin', 'task', '3437', '27.000', '2241531.910', '0.000', '0.000', '', '1399883127', '0.00', '3.000', '订金招标任务<a href=\"index.php?do=task&id=3437\">评审招标测试流程33</a>失败退款', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23288', 'out', 'pub_task', '0', '5527', '我爱小护士', 'task', '3442', '900.000', '999100.000', '0.000', '0.000', null, '1399884551', '0.00', '0.000', '发布多人悬赏任务<a href=\"index.php?do=task&id=3442\">诚招护士看护师</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23289', 'out', 'pub_task', '0', '1', 'admin', 'task', '3443', '30.000', '2241501.910', '0.000', '0.000', null, '1399884710', '0.00', '0.000', '发布:model_name任务<a href=\"index.php?do=task&id=:task_id\">:task_title</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23290', 'in', 'online_charge', '0', '5525', '同步', 'user_charge', '570', '0.010', '0.010', '0.000', '0.000', 'user_charge', '1399884813', '0.00', '0.000', '在线余额充值', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23291', 'out', 'pub_task', '0', '1', 'admin', 'task', '3444', '50.000', '2241451.910', '0.000', '0.000', null, '1399884844', '0.00', '1000.000', '发布普通招标任务<a href=\"index.php?do=task&id=3444\">按时发生发的</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23292', 'in', 'sale_service', '0', '1', 'admin', 'service', '1182', '80.000', '2241531.910', '0.000', '0.000', '', '1399885525', '0.00', '20.000', '卖出服务或商品<a href=\"index.php?do=goods&id=1182\">的范德萨发生的</a>所得', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23293', 'out', 'buy_service', '0', '1', 'admin', 'service', '1176', '100.000', '2241431.910', '0.000', '0.000', null, '1399885539', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23294', 'in', 'sale_service', '0', '5504', '下线的下线', 'service', '1176', '90.000', '550.000', '0.000', '0.000', '', '1399885541', '0.00', '10.000', '卖出服务或商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>所得', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23295', 'out', 'pub_task', '0', '1', 'admin', 'task', '3445', '100.000', '2241331.910', '0.000', '0.000', null, '1399886153', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3445\">斯蒂芬是的发送到</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23296', 'in', 'online_charge', '0', '5526', '女老板好狠', 'user_charge', '574', '0.010', '0.010', '0.000', '0.000', 'user_charge', '1399886770', '0.00', '0.000', '在线余额充值', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23297', 'out', 'pub_task', '0', '1', 'admin', 'task', '3446', '100.000', '2241231.910', '0.000', '0.000', null, '1399886834', '0.00', '0.000', '发布单人悬赏任务<a href=\"index.php?do=task&id=3446\">特瑞特人物</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23298', 'out', 'buy_service', '0', '1', 'admin', 'service', '1183', '100.000', '2241131.910', '0.000', '0.000', null, '1399886975', '0.00', '0.000', '购买服务或商品<a href=\"index.php?do=goods&id=1183\">我编辑了个作品销售</a>', '0', null);
INSERT INTO keke_witkey_finance VALUES ('23299', 'in', 'sale_service', '0', '4', '注册', 'service', '1183', '90.000', '170.000', '0.000', '0.000', '', '1399886977', '0.00', '10.000', '卖出服务或商品<a href=\"index.php?do=goods&id=1183\">我编辑了个作品销售</a>所得', '0', null);

-- ----------------------------
-- Table structure for `keke_witkey_free_follow`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_free_follow`;
CREATE TABLE `keke_witkey_free_follow` (
  `follow_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏ID',
  `uid` int(11) DEFAULT NULL,
  `fuid` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL COMMENT '关注的免费需求ID',
  `service_id` int(11) DEFAULT NULL COMMENT '关注的免费商品服务ID',
  `on_time` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_free_follow
-- ----------------------------
INSERT INTO keke_witkey_free_follow VALUES ('166', '5501', '5495', null, null, '1398738924', null);
INSERT INTO keke_witkey_free_follow VALUES ('179', '5501', '1', null, null, '1399432212', null);
INSERT INTO keke_witkey_free_follow VALUES ('171', '5498', '5504', null, null, '1398851991', null);
INSERT INTO keke_witkey_free_follow VALUES ('176', '5495', '5501', null, null, '1399358113', null);
INSERT INTO keke_witkey_free_follow VALUES ('177', '1', '5508', null, null, '1399361405', null);
INSERT INTO keke_witkey_free_follow VALUES ('178', '1', '5495', null, null, '1399361641', null);
INSERT INTO keke_witkey_free_follow VALUES ('180', '5501', '5508', null, null, '1399432486', null);
INSERT INTO keke_witkey_free_follow VALUES ('182', '1', '5501', null, null, '1399860742', null);

-- ----------------------------
-- Table structure for `keke_witkey_industry`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_industry`;
CREATE TABLE `keke_witkey_industry` (
  `indus_id` int(11) NOT NULL AUTO_INCREMENT,
  `indus_pid` int(11) DEFAULT '0',
  `indus_name` varchar(100) DEFAULT NULL,
  `is_recommend` int(11) DEFAULT NULL,
  `indus_type` int(11) DEFAULT '1',
  `listorder` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `list_type` varchar(20) DEFAULT NULL,
  `list_tpl` varchar(20) DEFAULT NULL,
  `indus_intro` varchar(200) DEFAULT NULL,
  `list_desc` text,
  `totask` int(10) DEFAULT NULL COMMENT '适用任务',
  `togoods` int(10) DEFAULT NULL COMMENT '适用商品',
  `seo_title` varchar(20) DEFAULT NULL COMMENT 'SEO标题',
  `seo_keyword` varchar(20) DEFAULT NULL COMMENT 'SEO关键字',
  `seo_desc` varchar(50) DEFAULT NULL COMMENT 'SEO描述',
  PRIMARY KEY (`indus_id`),
  KEY `indus_id` (`indus_id`),
  KEY `indus_pid` (`indus_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=443 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_industry
-- ----------------------------
INSERT INTO keke_witkey_industry VALUES ('2', '0', '网站开发', '0', '1', '2', '1398245893', '0', '0', '0', '0', '1', '0', '', '', '');
INSERT INTO keke_witkey_industry VALUES ('3', '0', '设计', '1', '1', '16', '1398670154', '0', '0', '0', '0', '1', '1', '', '', '');
INSERT INTO keke_witkey_industry VALUES ('229', '218', 'Palm插件', '0', '1', '9', '1292554457', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('228', '218', '黑莓插件', '0', '1', '6', '1292554432', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('8', '3', '标志设计', '1', '1', '0', '1398491779', '0', '0', '0', '0', '0', '0', '', '', '');
INSERT INTO keke_witkey_industry VALUES ('9', '3', 'VI设计', '1', '1', '0', '1324288332', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('10', '3', '名片设计', '1', '1', '0', '1324288376', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('11', '3', '海报设计', '0', '1', '0', '1324288546', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('12', '3', '宣传册页', '0', '1', '0', '1324288827', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('13', '3', '卡通设计', '0', '1', '0', '1324086640', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('14', '3', '招牌设计', '0', '1', '0', '1324288851', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('16', '3', '横幅设计', '0', '1', '0', '1324086655', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('121', '0', '软件开发', '0', '1', '101', '1332569956', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('27', '3', '网站美工', '0', '1', '0', '1345706999', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('28', '2', '网站模板', '0', '1', '0', '1292549137', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('29', '2', '开源修改', '0', '1', '32', '1326087725', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('30', '2', '网站广告', '0', '1', '0', '1292549182', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('31', '2', '网页动画', '1', '1', '0', '1292549199', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('32', '2', '商城开发', '1', '1', '0', '1292549217', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('33', '2', '数据库操作', '1', '1', '30', '1292549237', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('34', '2', '接口操作', '1', '1', '0', '1292549255', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('35', '2', '服务器系统', '1', '1', '31', '1292549279', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('36', '121', '程序开发', '1', '1', '0', '1292549438', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('37', '121', '编写脚本', '1', '1', '0', '1292549500', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('38', '121', '软件皮肤', '1', '1', '0', '1292549533', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('39', '121', '插件开发', '1', '1', '0', '1292549558', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('40', '2', '其它', '1', '1', '100', '0', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('41', '3', '宣传软文', '1', '1', '0', '1292551396', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('42', '3', '广告语写作', '1', '1', '0', '1292551430', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('43', '3', '策划', '1', '1', '0', '1292551453', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('44', '3', '写文章', '1', '1', '0', '1292551482', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('45', '3', '编辑校对', '1', '1', '0', '1292551502', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('46', '3', '写新闻', '0', '1', '0', '1292551528', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('47', '3', '产品说明', '0', '1', '0', '1292551569', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('48', '3', '剧本脚本', '0', '1', '0', '1292551594', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('49', '3', '写书', '0', '1', '0', '1292551633', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('50', '3', '撰写报告', '0', '1', '0', '1292551666', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('51', '3', '应用文写作', '0', '1', '0', '1292551705', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('52', '3', '演讲稿', '0', '1', '0', '1292551734', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('169', '2', 'FLASH', '0', '1', '1', '1326087790', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('57', '3', '其它', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('227', '218', 'Windows mobile插件', '0', '1', '5', '1292554412', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('226', '218', 'PalmOS插件', '0', '1', '30', '1292554374', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('225', '218', 'Symbian SDK插件', '0', '1', '2', '1292554348', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('223', '218', 'iOS插件', '0', '1', '3', '1292554295', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('222', '218', 'Android插件', '0', '1', '1', '1292554274', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('336', '335', '新房装修', '1', '1', '1', '1326088071', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('219', '218', '天翼插件', '0', '1', '4', '1292554146', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('218', '0', '移动应用', '0', '1', '30', '1292556202', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('217', '211', '问卷调查', '0', '1', '0', '1292554039', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('216', '211', '意见建议', '0', '1', '0', '1292553967', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('215', '211', '写评论', '0', '1', '0', '1292553942', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('214', '211', '征集创意', '0', '1', '0', '1292553913', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('213', '211', '收集金点子', '0', '1', '0', '1292553863', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('212', '211', '策划', '0', '1', '0', '1292553842', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('211', '0', '头脑风暴', '1', '1', '18', '1326259260', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('236', '234', '法律咨询', '0', '1', '0', '1292554638', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('235', '234', '聘请律师', '0', '1', '0', '1292554609', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('234', '0', '法律服务', '0', '1', '19', '1292556230', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('233', '218', '手机应用汉化', '0', '1', '13', '1292554545', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('232', '218', '手机应用创意', '0', '1', '11', '1292554522', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('231', '218', '手机游戏开发', '0', '1', '8', '1292554501', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('230', '218', 'Amazon kindle插件', '0', '1', '7', '1292554478', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('96', '249', '网游创意', '1', '1', '0', '1326091312', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('122', '121', '软件测试', '0', '1', '0', '1292549609', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('123', '121', '游戏开发', '0', '1', '0', '1292549642', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('130', '3', '字体设计', '0', '1', '1', '1326078327', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('131', '3', '贺卡设计', '0', '1', '2', '1326078338', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('132', '3', '礼品设计', '0', '1', '3', '1326078346', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('133', '3', 'QQ表情', '0', '1', '22', '1292549906', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('134', '3', '四格漫画', '0', '1', '4', '1326078355', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('135', '3', '动漫设计', '0', '1', '5', '1326078363', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('136', '3', '排版设计', '0', '1', '6', '1326078371', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('137', '3', '服饰设计', '0', '1', '7', '1326078379', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('138', '3', 'ppt设计', '0', '1', '100', '1326078722', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('140', '3', '台历设计', '0', '1', '8', '1326078388', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('144', '3', '工业设计', '0', '1', '0', '1292550272', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('145', '3', '按钮图标', '0', '1', '0', '1292550300', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('147', '2', '店标设计', '0', '1', '8', '1292550405', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('148', '2', '店招设计', '0', '1', '4', '1292550489', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('149', '335', '房屋建筑设计', '0', '1', '200', '1292550886', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('151', '335', '展会设计', '0', '1', '0', '1292550942', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('152', '335', '办公装修', '0', '1', '0', '1292550977', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('153', '335', '园林景观', '0', '1', '0', '1292551003', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('154', '2', '网店取名', '0', '1', '5', '1292550671', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('155', '2', '网店模板', '0', '1', '6', '1292550700', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('156', '2', '数码摄影', '0', '1', '7', '1326091215', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('158', '335', '形象墙设计', '0', '1', '20', '1292550817', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('159', '335', '店面装修', '0', '1', '0', '1292550854', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('160', '0', '起名取名', '0', '1', '19', '1292556019', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('161', '160', '宝宝起名', '0', '1', '0', '1292551095', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('162', '160', '成人起名', '0', '1', '0', '1292551118', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('163', '160', '公司起名', '0', '1', '0', '1292551152', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('164', '160', '店铺起名', '0', '1', '0', '1292551193', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('165', '160', '品牌起名', '0', '1', '0', '1292551246', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('166', '160', '改名', '0', '1', '0', '1292551260', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('170', '2', '视频制作', '0', '1', '9', '1292552050', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('172', '2', '三维渲染', '0', '1', '11', '1292552099', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('177', '240', '搜索引擎优化', '0', '1', '0', '1292552302', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('178', '240', '论坛推广', '0', '1', '0', '1292552348', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('179', '240', 'QQ群推广', '0', '1', '0', '1292552376', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('180', '240', '博客推广', '0', '1', '0', '1292552410', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('181', '240', '推广注册', '0', '1', '0', '1292552445', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('192', '0', '生活服务', '0', '1', '25', '1292556114', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('193', '192', '市场调查', '0', '1', '0', '1292552891', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('194', '192', '心理咨询', '0', '1', '0', '1292552932', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('195', '192', '移民咨询', '0', '1', '0', '1292552957', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('196', '192', '理财咨询', '0', '1', '0', '1292553000', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('197', '192', '帮我投票', '0', '1', '0', '1292553035', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('198', '192', '跑腿排队', '0', '1', '0', '1292553065', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('199', '192', '家政服务', '0', '1', '0', '1292553095', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('200', '192', '数据导入', '0', '1', '0', '1292553126', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('201', '0', '创意祝福', '0', '1', '13', '1332569940', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('202', '201', '生日祝福', '1', '1', '2', '1292553296', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('203', '201', '爱情表白', '1', '1', '1', '1326080754', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('204', '201', '圣诞祝福', '0', '1', '3', '1292553343', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('205', '201', '新年祝福', '0', '1', '4', '1292553378', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('206', '201', '道歉短信', '0', '1', '9', '1292553406', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('207', '201', '纪念日祝福', '1', '1', '8', '1326080770', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('208', '201', '感恩回馈', '0', '1', '7', '1292553475', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('209', '201', '祝福喜得贵子', '0', '1', '5', '1292553507', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('210', '201', '祝福乔迁新居', '0', '1', '6', '1292553556', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('237', '234', '写法律合同', '0', '1', '0', '1292554661', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('238', '234', '写律师函', '0', '1', '0', '1292554683', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('239', '234', '写诉讼状', '0', '1', '0', '1292554712', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('240', '0', '招聘找人', '0', '1', '40', '1292556254', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('241', '240', '招聘', '0', '1', '0', '1292554785', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('242', '240', '求职', '0', '1', '0', '1292554817', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('243', '240', '寻人', '0', '1', '0', '1292554925', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('245', '240', '找生产商', '0', '1', '0', '1292554973', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('246', '240', '找客户', '0', '1', '0', '1292554993', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('247', '240', '找供应商', '0', '1', '0', '1292555016', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('248', '240', '找人脉', '0', '1', '0', '1292555036', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('249', '0', '网游服务', '1', '1', '14', '1346403489', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('250', '249', '手机游戏', '0', '1', '0', '1292555192', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('251', '249', '游戏试玩', '0', '1', '0', '1292555216', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('252', '249', '评测报告', '0', '1', '0', '1292555239', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('253', '249', '版本设计', '0', '1', '0', '1292555270', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('254', '249', '剧情策划', '0', '1', '0', '1292555293', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('255', '249', '压力测试', '0', '1', '0', '1292555312', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('256', '249', '代写攻略', '0', '1', '0', '1292555335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('257', '249', '活动策划', '0', '1', '0', '1292555359', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('258', '249', '补丁制作', '0', '1', '0', '1292555388', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('259', '249', '游戏视频', '0', '1', '0', '1292555405', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('263', '3', '其他', '0', '1', '40', '1292555839', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('324', '121', '软件汉化', '1', '1', '0', '1326079451', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('325', '121', '程序功能开发', '0', '1', '2', '1326079476', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('326', '121', '软件美工', '0', '1', '0', '1326079503', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('327', '121', '开发文档编写', '0', '1', '0', '1326079573', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('328', '121', '功能完善', '0', '1', '0', '1326079657', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('334', '240', '简历设计', '1', '1', '0', '1326087903', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('331', '201', '彩信', '0', '1', '30', '1326079987', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('332', '249', '问卷调查', '0', '1', '0', '1326080222', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('337', '335', '二手房装修', '1', '1', '2', '1326088083', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('335', '0', '建筑/装修', '1', '1', '17', '1326088053', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('338', '335', '风水咨询', '0', '1', '4', '1326088094', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('339', '335', '装修监理', '0', '1', '8', '1326088103', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('340', '335', '庭院景观设计', '0', '1', '3', '1326088114', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('341', '335', '办公商铺装修', '1', '1', '6', '1326088123', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('342', '335', '自建房设计', '0', '1', '10', '1326088131', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('343', '335', '景观设计', '0', '1', '12', '1326088142', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('344', '335', '3D模型设计', '0', '1', '14', '1326088150', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('348', '3', 'logo设计', '0', '1', '0', '1329450844', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('349', '3', 'vi设计', '0', '1', '0', '1329450844', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('350', '0', '照片美化/编辑', '1', '1', '18', '1329451426', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('351', '350', '艺术照处理', '0', '1', '1', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('352', '350', '照片变卡通', '0', '1', '2', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('353', '350', '电子相册', '0', '1', '3', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('354', '350', '照片美化', '0', '1', '4', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('355', '350', '婚纱照美化', '0', '1', '5', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('356', '350', '图片编辑', '0', '1', '6', '1329451052', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('357', '0', '影视/配音/歌词', '1', '1', '19', '1329451198', '0', '0', '0', '0', '1', '0', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('358', '357', '写剧本', '0', '1', '1', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('359', '357', '影视制作', '0', '1', '2', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('360', '357', '广告配音', '0', '1', '3', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('361', '357', '影视配音', '0', '1', '4', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('362', '357', '动画配音', '0', '1', '5', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('363', '357', '彩铃配音', '0', '1', '6', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('364', '357', '方言配音', '0', '1', '7', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('365', '357', '外语配音', '0', '1', '8', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('366', '357', '创意配音', '0', '1', '9', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('367', '357', '歌词创作', '0', '1', '10', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('368', '357', '歌词谱曲', '0', '1', '11', '1329451335', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('370', '3', '游戏封面', '0', '1', '0', '1330410030', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('376', '3', 'lee牛仔裤', '0', '1', '0', '1330411423', '0', '0', '0', '0', '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('408', '2', '网站推广', null, '1', '0', '0', null, null, null, null, '1', '1', null, null, null);
INSERT INTO keke_witkey_industry VALUES ('442', '2', '新添加', null, '1', '0', '1398490810', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_link`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_link`;
CREATE TABLE `keke_witkey_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type` int(11) DEFAULT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `link_pic` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `link_status` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `on_time` (`on_time`)
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_link
-- ----------------------------
INSERT INTO keke_witkey_link VALUES ('1', '1', '任务易', 'http://www.renwuyi.com', '0', '0', '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('2', '1', '任务大厅', 'http://task.renwuyi.com', null, null, '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('3', '1', '威客导航 ', 'http://daohang.renwuyi.com', null, null, '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('4', '1', '威客百科 ', 'http://baike.renwuyi.com', null, null, '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('5', '1', '客客族', 'http://www.kekezu.com', null, null, '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('6', '1', '威客系统', 'http://www.kppw.cn', null, null, '1', '1399529540', null, null);
INSERT INTO keke_witkey_link VALUES ('7', '1', '威客系统演示', 'http://demo.kppw.cn', null, null, '1', '1399529540', null, null);

-- ----------------------------
-- Table structure for `keke_witkey_mark`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark`;
CREATE TABLE `keke_witkey_mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` char(20) DEFAULT '0',
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT '0',
  `obj_cash` decimal(10,0) DEFAULT '0',
  `mark_status` int(11) DEFAULT '0',
  `mark_content` text,
  `mark_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(20) DEFAULT NULL,
  `mark_max_time` int(11) DEFAULT '0',
  `by_uid` int(11) DEFAULT '0',
  `by_username` varchar(20) DEFAULT NULL,
  `aid` varchar(50) DEFAULT NULL,
  `aid_star` varchar(50) DEFAULT NULL,
  `mark_value` decimal(10,2) DEFAULT '0.00',
  `mark_type` int(1) DEFAULT NULL,
  `mark_count` int(10) DEFAULT '0',
  PRIMARY KEY (`mark_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`obj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2582 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_mark
-- ----------------------------
INSERT INTO keke_witkey_mark VALUES ('2418', 'service', '1161', '80005211', '400', '2', '热人儿we肉味儿额温柔', '1398656041', '1', 'admin', '1398915241', '5495', '小鸟', '1,2,3', '4.0,4.0,4.0', '200.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2419', 'service', '1161', '80005211', '500', '2', '发斯蒂芬斯蒂芬三的发生的范德萨', '1398656041', '5495', '小鸟', '1398915241', '1', 'admin', '4,5', ',', '250.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2420', 'dtender', '3318', '357', '1000', '1', null, '1398664435', '1', 'admin', '1398923635', '5495', '小鸟', '4,5', '5.0,5.0', '1000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2421', 'dtender', '3318', '357', '900', '1', null, '1398664435', '5495', '小鸟', '1398923635', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2422', 'dtender', '3319', '358', '1000', '1', null, '1398664828', '1', 'admin', '1398924028', '5495', '小鸟', '4,5', '5.0,5.0', '1000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2423', 'dtender', '3319', '358', '900', '1', null, '1398664828', '5495', '小鸟', '1398924028', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2424', 'service', '1161', '80005213', '400', '1', null, '1398677148', '1', 'admin', '1398936348', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '400.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2425', 'service', '1161', '80005213', '500', '1', null, '1398677148', '5495', '小鸟', '1398936348', '1', 'admin', '4,5', '5.0,5.0', '500.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2426', 'service', '1168', '80005242', '80', '1', '而卧肉味儿热威武人', '1398677367', '5495', '小鸟', '1398936567', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2427', 'service', '1168', '80005242', '100', '2', '对你中品地方', '1398677367', '1', 'admin', '1398936567', '5495', '小鸟', '4,5', '4.0,4.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2428', 'preward', '3343', '2046', '50', '1', null, '1398736576', '1', 'admin', '1398995776', '5495', '小鸟', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2429', 'preward', '3343', '2046', '45', '1', null, '1398736576', '5495', '小鸟', '1398995776', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2430', 'goods', '1167', '80005250', '45', '1', 'eeqweqwewqe', '1398761869', '5495', '小鸟', '1399021069', '5501', 'luoke', '1,2,3', '4.5,5.0,4.5', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2431', 'goods', '1167', '80005250', '50', '1', null, '1398761869', '5501', 'luoke', '1399021069', '5495', '小鸟', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2432', 'preward', '3352', '2051', '25', '1', null, '1398764007', '1', 'admin', '1399023207', '5501', 'luoke', '4,5', '5.0,5.0', '25.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2433', 'preward', '3352', '2051', '23', '1', null, '1398764007', '5501', 'luoke', '1399023207', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '23.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2434', 'dtender', '3350', '367', '1000', '1', null, '1398764034', '1', 'admin', '1399023234', '5495', '小鸟', '4,5', '5.0,5.0', '1000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2435', 'dtender', '3350', '367', '900', '1', null, '1398764034', '5495', '小鸟', '1399023234', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2436', 'service', '1161', '80005257', '96', '2', '地方的发地方地方吧', '1398823207', '1', 'admin', '1399082407', '5495', '小鸟', '1,2,3', '3.5,4.0,4.0', '48.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2437', 'service', '1161', '80005257', '120', '1', null, '1398823207', '5495', '小鸟', '1399082407', '1', 'admin', '4,5', '5.0,5.0', '120.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2438', 'sreward', '3338', '2055', '130', '2', '但是发地方的发地方', '1398826365', '5500', '艾仁', '1399085565', '1', 'admin', '4,5', '3.5,4.0', '65.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2439', 'sreward', '3338', '2055', '117', '1', '的说法都是范德萨范德萨发的说法', '1398826365', '1', 'admin', '1399085565', '5500', '艾仁', '1,2,3', '5.0,5.0,5.0', '117.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2440', 'dtender', '3359', '371', '1000', '1', null, '1398828593', '1', 'admin', '1399087793', '5500', '艾仁', '4,5', '5.0,5.0', '1000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2441', 'dtender', '3359', '371', '900', '1', null, '1398828593', '5500', '艾仁', '1399087793', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2442', 'goods', '1172', '80005264', '90', '1', null, '1398830036', '5500', '艾仁', '1399089236', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2443', 'goods', '1172', '80005264', '100', '1', null, '1398830036', '1', 'admin', '1399089236', '5500', '艾仁', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2444', 'goods', '1173', '80005265', '45', '2', '法第三方是的发斯蒂芬', '1398830712', '1', 'admin', '1399089912', '5500', '艾仁', '1,2,3', '4.0,3.5,3.5', '22.50', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2445', 'goods', '1173', '80005265', '50', '1', null, '1398830712', '5500', '艾仁', '1399089912', '1', 'admin', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2446', 'goods', '1174', '80005266', '108', '1', null, '1398834623', '1', 'admin', '1399093823', '5500', '艾仁', '1,2,3', '5.0,5.0,5.0', '108.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2447', 'goods', '1174', '80005266', '120', '1', null, '1398834623', '5500', '艾仁', '1399093823', '1', 'admin', '4,5', '5.0,5.0', '120.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2448', 'goods', '1171', '80005267', '90', '1', '很好，不错', '1398838693', '5501', 'luoke', '1399097893', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2449', 'goods', '1171', '80005267', '100', '1', null, '1398838693', '1', 'admin', '1399097893', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2450', 'mreward', '3332', '2063', '100', '1', null, '1398853691', '5495', '小鸟', '1399112891', '5508', '安德敏的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2451', 'mreward', '3332', '2063', '80', '1', null, '1398853691', '5508', '安德敏的下线', '1399112891', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2452', 'mreward', '3332', '2064', '100', '1', null, '1398853691', '5495', '小鸟', '1399112891', '5508', '安德敏的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2453', 'mreward', '3332', '2064', '80', '1', null, '1398853691', '5508', '安德敏的下线', '1399112891', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2454', 'sreward', '3327', '2065', '100', '1', '发的说法地方但是是的发是的', '1398854030', '5495', '小鸟', '1399113230', '5508', '安德敏的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2455', 'sreward', '3327', '2065', '90', '1', '斯蒂芬斯蒂芬的范德萨发送到范德萨发', '1398854030', '5508', '安德敏的下线', '1399113230', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2456', 'preward', '3362', '2066', '50', '1', null, '1398854353', '1', 'admin', '1399113553', '5508', '安德敏的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2457', 'preward', '3362', '2066', '45', '1', null, '1398854353', '5508', '安德敏的下线', '1399113553', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2458', 'mreward', '3358', '2057', '80', '1', null, '1399167703', '1', 'admin', '1399426903', '5500', '艾仁', '4,5', '5.0,5.0', '80.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2459', 'mreward', '3358', '2057', '64', '1', null, '1399167703', '5500', '艾仁', '1399426903', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '64.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2460', 'mreward', '3358', '2058', '20', '1', null, '1399167704', '1', 'admin', '1399426904', '5501', 'luoke', '4,5', '5.0,5.0', '20.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2461', 'mreward', '3358', '2058', '16', '1', null, '1399167704', '5501', 'luoke', '1399426904', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '16.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2462', 'sreward', '3363', '2068', '50', '1', null, '1399278768', '1', 'admin', '1399537968', '5495', '小鸟', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2463', 'sreward', '3363', '2068', '45', '1', null, '1399278768', '5495', '小鸟', '1399537968', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2464', 'sreward', '3363', '2069', '50', '1', null, '1399278769', '1', 'admin', '1399537969', '5503', '下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2465', 'sreward', '3363', '2069', '45', '1', null, '1399278769', '5503', '下线', '1399537969', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2466', 'sreward', '3364', '2070', '50', '1', null, '1399281339', '1', 'admin', '1399540539', '5503', '下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2467', 'sreward', '3364', '2070', '45', '1', null, '1399281339', '5503', '下线', '1399540539', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2468', 'preward', '3369', '2074', '50', '1', null, '1399282970', '1', 'admin', '1399542170', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2469', 'preward', '3369', '2074', '45', '1', null, '1399282970', '5504', '下线的下线', '1399542170', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2470', 'preward', '3369', '2073', '50', '1', null, '1399282997', '1', 'admin', '1399542197', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2471', 'preward', '3369', '2073', '45', '1', null, '1399282997', '5504', '下线的下线', '1399542197', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2472', 'preward', '3370', '2076', '50', '1', null, '1399283159', '1', 'admin', '1399542359', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2473', 'preward', '3370', '2076', '45', '1', null, '1399283159', '5504', '下线的下线', '1399542359', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2474', 'sreward', '3371', '2077', '50', '1', null, '1399283315', '1', 'admin', '1399542515', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2475', 'sreward', '3371', '2077', '45', '1', null, '1399283315', '5504', '下线的下线', '1399542515', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2476', 'sreward', '3371', '2078', '50', '1', null, '1399283315', '1', 'admin', '1399542515', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2477', 'sreward', '3371', '2078', '45', '1', null, '1399283315', '5504', '下线的下线', '1399542515', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2478', 'mreward', '3372', '2080', '0', '1', null, '1399283668', '1', 'admin', '1399542868', '5504', '下线的下线', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2479', 'mreward', '3372', '2080', '0', '1', null, '1399283668', '5504', '下线的下线', '1399542868', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2480', 'mreward', '3373', '2081', '0', '1', null, '1399340331', '1', 'admin', '1399599531', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2481', 'mreward', '3373', '2081', '0', '1', null, '1399340331', '5495', '小鸟', '1399599531', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2482', 'mreward', '3373', '2082', '0', '1', null, '1399340332', '1', 'admin', '1399599532', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2483', 'mreward', '3373', '2082', '0', '1', null, '1399340332', '5495', '小鸟', '1399599532', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2484', 'mreward', '3373', '2083', '0', '1', null, '1399340333', '1', 'admin', '1399599533', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2485', 'mreward', '3373', '2083', '0', '1', null, '1399340333', '5495', '小鸟', '1399599533', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2486', 'mreward', '3374', '2084', '0', '1', null, '1399340487', '1', 'admin', '1399599687', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2487', 'mreward', '3374', '2084', '0', '1', null, '1399340487', '5495', '小鸟', '1399599687', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2488', 'mreward', '3374', '2085', '0', '1', null, '1399340488', '1', 'admin', '1399599688', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2489', 'mreward', '3374', '2085', '0', '1', null, '1399340488', '5495', '小鸟', '1399599688', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2490', 'mreward', '3375', '2086', '0', '1', null, '1399340699', '1', 'admin', '1399599899', '5495', '小鸟', '4,5', '5.0,5.0', '0.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2491', 'mreward', '3375', '2086', '0', '1', null, '1399340699', '5495', '小鸟', '1399599899', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '0.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2492', 'preward', '3380', '2094', '50', '1', null, '1399344511', '1', 'admin', '1399603711', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2493', 'preward', '3380', '2094', '45', '1', null, '1399344511', '5504', '下线的下线', '1399603711', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2494', 'preward', '3380', '2093', '50', '1', null, '1399344540', '1', 'admin', '1399603740', '5504', '下线的下线', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2495', 'preward', '3380', '2093', '45', '1', null, '1399344540', '5504', '下线的下线', '1399603740', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2496', 'sreward', '3381', '2095', '100', '1', null, '1399344997', '1', 'admin', '1399604197', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2497', 'sreward', '3381', '2095', '90', '1', null, '1399344997', '5501', 'luoke', '1399604197', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2498', 'goods', '1176', '80005295', '90', '1', null, '1399346581', '5504', '下线的下线', '1399605781', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2499', 'goods', '1176', '80005295', '100', '1', null, '1399346581', '1', 'admin', '1399605781', '5504', '下线的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2500', 'sreward', '3386', '2101', '100', '1', null, '1399346968', '1', 'admin', '1399606168', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2501', 'sreward', '3386', '2101', '90', '1', null, '1399346968', '5501', 'luoke', '1399606168', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2502', 'mreward', '3388', '2102', '25', '1', null, '1399347251', '1', 'admin', '1399606451', '5501', 'luoke', '4,5', '5.0,5.0', '25.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2503', 'mreward', '3388', '2102', '20', '1', null, '1399347251', '5501', 'luoke', '1399606451', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '20.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2504', 'mreward', '3388', '2104', '25', '1', null, '1399347253', '1', 'admin', '1399606453', '5501', 'luoke', '4,5', '5.0,5.0', '25.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2505', 'mreward', '3388', '2104', '20', '1', null, '1399347253', '5501', 'luoke', '1399606453', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '20.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2506', 'mreward', '3388', '2105', '50', '1', null, '1399347254', '1', 'admin', '1399606454', '5501', 'luoke', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2507', 'mreward', '3388', '2105', '40', '1', null, '1399347254', '5501', 'luoke', '1399606454', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '40.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2508', 'preward', '3390', '2107', '50', '1', null, '1399348275', '1', 'admin', '1399607475', '5495', '小鸟', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2509', 'preward', '3390', '2107', '45', '1', null, '1399348275', '5495', '小鸟', '1399607475', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2510', 'preward', '3391', '2111', '25', '1', null, '1399354569', '1', 'admin', '1399613769', '5501', 'luoke', '4,5', '5.0,5.0', '25.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2511', 'preward', '3391', '2111', '23', '1', null, '1399354569', '5501', 'luoke', '1399613769', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '23.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2512', 'mreward', '3394', '2113', '100', '1', null, '1399355253', '5495', '小鸟', '1399614453', '1', 'admin', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2513', 'mreward', '3394', '2113', '80', '1', null, '1399355253', '1', 'admin', '1399614453', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2514', 'dtender', '3395', '379', '5000', '1', null, '1399357620', '1', 'admin', '1399616820', '5501', 'luoke', '4,5', '5.0,5.0', '5000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2515', 'dtender', '3395', '379', '4500', '1', null, '1399357620', '5501', 'luoke', '1399616820', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '4500.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2516', 'goods', '1175', '80005310', '90', '1', null, '1399358445', '1', 'admin', '1399617645', '5501', 'luoke', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2517', 'goods', '1175', '80005310', '100', '1', null, '1399358445', '5501', 'luoke', '1399617645', '1', 'admin', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2518', 'goods', '1173', '80005311', '45', '1', null, '1399358564', '1', 'admin', '1399617764', '5501', 'luoke', '1,2,3', '5.0,5.0,5.0', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2519', 'goods', '1173', '80005311', '50', '1', null, '1399358564', '5501', 'luoke', '1399617764', '1', 'admin', '4,5', '5.0,5.0', '50.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2520', 'service', '1170', '80005312', '80', '1', null, '1399359343', '5501', 'luoke', '1399618543', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2521', 'service', '1170', '80005312', '100', '1', null, '1399359343', '1', 'admin', '1399618543', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2522', 'goods', '1174', '80005322', '108', '1', null, '1399368994', '1', 'admin', '1399628194', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '108.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2523', 'goods', '1174', '80005322', '120', '1', null, '1399368994', '5495', '小鸟', '1399628194', '1', 'admin', '4,5', '5.0,5.0', '120.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2524', 'goods', '1160', '80005325', '90', '1', null, '1399369230', '1', 'admin', '1399628430', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2525', 'goods', '1160', '80005325', '100', '1', null, '1399369230', '5495', '小鸟', '1399628430', '1', 'admin', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2526', 'goods', '1171', '80005328', '90', '1', null, '1399433755', '5501', 'luoke', '1399692955', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2527', 'goods', '1171', '80005328', '100', '1', null, '1399433755', '5495', '小鸟', '1399692955', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2528', 'goods', '1177', '80005329', '91', '1', null, '1399433977', '1', 'admin', '1399693177', '5495', '小鸟', '1,2,3', '5.0,5.0,5.0', '91.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2529', 'goods', '1177', '80005329', '101', '1', null, '1399433977', '5495', '小鸟', '1399693177', '1', 'admin', '4,5', '5.0,5.0', '101.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2530', 'dtender', '3409', '390', '2000', '1', null, '1399445553', '1', 'admin', '1399704753', '5495', '小鸟', '4,5', '5.0,5.0', '2000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2531', 'dtender', '3409', '390', '1800', '1', '发生发的撒发斯蒂芬是的', '1399445553', '5495', '小鸟', '1399704753', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '1800.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2532', 'mreward', '3411', '2125', '100', '1', null, '1399453969', '1', 'admin', '1399713169', '5504', '下线的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2533', 'mreward', '3411', '2125', '80', '1', null, '1399453969', '5504', '下线的下线', '1399713169', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2534', 'service', '1170', '80005346', '80', '1', null, '1399516476', '5501', 'luoke', '1399775676', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '80.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2535', 'service', '1170', '80005346', '100', '1', null, '1399516476', '1', 'admin', '1399775676', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2536', 'goods', '1176', '80005347', '90', '1', null, '1399527623', '5504', '下线的下线', '1399786823', '5501', 'luoke', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2537', 'goods', '1176', '80005347', '100', '1', null, '1399527623', '5501', 'luoke', '1399786823', '5504', '下线的下线', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2538', 'goods', '1174', '80005348', '108', '1', '额外任务热我日我日', '1399527712', '1', 'admin', '1399786912', '5501', 'luoke', '1,2,3', '5.0,5.0,5.0', '108.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2539', 'goods', '1174', '80005348', '120', '1', null, '1399527712', '5501', 'luoke', '1399786912', '1', 'admin', '4,5', '5.0,5.0', '120.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2540', 'dtender', '3420', '392', '1000', '1', null, '1399531348', '1', 'admin', '1399790548', '5495', '小鸟', '4,5', '5.0,5.0', '1000.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2541', 'dtender', '3420', '392', '900', '1', '我第一次评价，那里为何是2', '1399531348', '5495', '小鸟', '1399790548', '1', 'admin', '1,2,3', '4.0,4.0,4.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2542', 'goods', '1177', '80005364', '91', '1', null, '1399687487', '1', 'admin', '1399946687', '5501', 'luoke', '1,2,3', '5.0,5.0,5.0', '91.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2543', 'goods', '1177', '80005364', '101', '1', null, '1399687487', '5501', 'luoke', '1399946687', '1', 'admin', '4,5', '5.0,5.0', '101.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2544', 'goods', '1171', '80005365', '90', '1', null, '1399687966', '5501', 'luoke', '1399947166', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2545', 'goods', '1171', '80005365', '100', '1', null, '1399687966', '1', 'admin', '1399947166', '5501', 'luoke', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2546', 'sreward', '3428', '2137', '100', '1', '中评发发斯蒂芬斯蒂芬才', '1399702925', '1', 'admin', '1399962125', '5495', '小鸟', '4,5', ',', '100.00', '1', '2');
INSERT INTO keke_witkey_mark VALUES ('2547', 'sreward', '3428', '2137', '90', '1', '说的萨达萨达撒的撒的撒的', '1399702925', '5495', '小鸟', '1399962125', '1', 'admin', '1,2,3', ',,', '90.00', '2', '2');
INSERT INTO keke_witkey_mark VALUES ('2548', 'service', '1179', '80005359', '80', '0', null, '1399705286', '5501', 'luoke', '1399964486', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2549', 'service', '1179', '80005359', '100', '0', null, '1399705286', '1', 'admin', '1399964486', '5501', 'luoke', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2550', 'goods', '1176', '80005385', '90', '0', null, '1399705335', '5504', '下线的下线', '1399964535', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2551', 'goods', '1176', '80005385', '100', '0', null, '1399705335', '1', 'admin', '1399964535', '5504', '下线的下线', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2552', 'mreward', '3429', '2138', '100', '0', null, '1399705360', '1', 'admin', '1399964560', '5495', '小鸟', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2553', 'mreward', '3429', '2138', '80', '1', '我西安中评吧，看哈摊款的额的撒发的发', '1399705360', '5495', '小鸟', '1399964560', '1', 'admin', '1,2,3', '4.5,5.0,5.0', '80.00', '2', '2');
INSERT INTO keke_witkey_mark VALUES ('2554', 'preward', '3430', '2139', '50', '0', null, '1399705467', '1', 'admin', '1399964667', '5495', '小鸟', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2555', 'preward', '3430', '2139', '45', '1', '发撒发斯蒂芬是的发送到', '1399705467', '5495', '小鸟', '1399964667', '1', 'admin', '1,2,3', '4.5,5.0,4.5', '45.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2556', 'dtender', '3431', '398', '1000', '0', null, '1399707109', '1', 'admin', '1399966309', '5495', '小鸟', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2557', 'dtender', '3431', '398', '900', '1', '说地方第三方斯蒂芬', '1399707109', '5495', '小鸟', '1399966309', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '900.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2558', 'sreward', '3432', '2140', '100', '0', null, '1399710389', '1', 'admin', '1399969589', '5495', '小鸟', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2559', 'sreward', '3432', '2140', '90', '1', '第三方斯蒂芬斯蒂芬', '1399710389', '5495', '小鸟', '1399969589', '1', 'admin', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2560', 'preward', '3430', '2141', '50', '0', null, '1399714448', '1', 'admin', '1399973648', '5500', '艾仁', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2561', 'preward', '3430', '2141', '45', '0', null, '1399714448', '5500', '艾仁', '1399973648', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2562', 'sreward', '3415', '2135', '100', '1', '啊说大撒旦撒旦撒', '1399715022', '5502', '洛克', '1399974222', '1', 'admin', '4,5', '5.0,5.0', '100.00', '1', '1');
INSERT INTO keke_witkey_mark VALUES ('2563', 'sreward', '3415', '2135', '90', '1', '特特热太热特然', '1399715022', '1', 'admin', '1399974222', '5502', '洛克', '1,2,3', '5.0,5.0,5.0', '90.00', '2', '1');
INSERT INTO keke_witkey_mark VALUES ('2564', 'goods', '1173', '80005392', '45', '0', null, '1399857066', '1', 'admin', '1400116266', '5495', '小鸟', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2565', 'goods', '1173', '80005392', '50', '0', null, '1399857066', '5495', '小鸟', '1400116266', '1', 'admin', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2566', 'goods', '1177', '80005390', '91', '0', null, '1399857069', '1', 'admin', '1400116269', '5495', '小鸟', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2567', 'goods', '1177', '80005390', '101', '0', null, '1399857069', '5495', '小鸟', '1400116269', '1', 'admin', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2568', 'mreward', '3339', '2142', '100', '0', null, '1399857074', '5500', '艾仁', '1400116274', '5502', '洛克', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2569', 'mreward', '3339', '2142', '80', '0', null, '1399857074', '5502', '洛克', '1400116274', '5500', '艾仁', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2570', 'mreward', '3440', '2150', '25', '0', null, '1399881018', '1', 'admin', '1400140218', '4', '注册', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2571', 'mreward', '3440', '2150', '20', '0', null, '1399881018', '4', '注册', '1400140218', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2572', 'mreward', '3440', '2149', '25', '0', null, '1399881018', '1', 'admin', '1400140218', '4', '注册', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2573', 'mreward', '3440', '2149', '20', '0', null, '1399881018', '4', '注册', '1400140218', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2574', 'mreward', '3440', '2148', '50', '0', null, '1399881019', '1', 'admin', '1400140219', '4', '注册', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2575', 'mreward', '3440', '2148', '40', '0', null, '1399881019', '4', '注册', '1400140219', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2576', 'service', '1182', '80005391', '80', '0', null, '1399885525', '1', 'admin', '1400144725', '5500', '艾仁', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2577', 'service', '1182', '80005391', '100', '0', null, '1399885525', '5500', '艾仁', '1400144725', '1', 'admin', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2578', 'goods', '1176', '80005409', '90', '0', null, '1399885541', '5504', '下线的下线', '1400144741', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2579', 'goods', '1176', '80005409', '100', '0', null, '1399885541', '1', 'admin', '1400144741', '5504', '下线的下线', null, null, '0.00', '1', '0');
INSERT INTO keke_witkey_mark VALUES ('2580', 'goods', '1183', '80005412', '90', '0', null, '1399886977', '4', '注册', '1400146177', '1', 'admin', null, null, '0.00', '2', '0');
INSERT INTO keke_witkey_mark VALUES ('2581', 'goods', '1183', '80005412', '100', '0', null, '1399886977', '1', 'admin', '1400146177', '4', '注册', null, null, '0.00', '1', '0');

-- ----------------------------
-- Table structure for `keke_witkey_mark_aid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_aid`;
CREATE TABLE `keke_witkey_mark_aid` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aid_name` varchar(255) DEFAULT NULL,
  `aid_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_mark_aid
-- ----------------------------
INSERT INTO keke_witkey_mark_aid VALUES ('1', '工作速度', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('2', '工作质量', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('3', '工作态度', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('4', '付款及时性', '1');
INSERT INTO keke_witkey_mark_aid VALUES ('5', '合作愉快度', '1');

-- ----------------------------
-- Table structure for `keke_witkey_mark_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_config`;
CREATE TABLE `keke_witkey_mark_config` (
  `mark_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` char(20) DEFAULT NULL,
  `good` int(3) DEFAULT NULL,
  `normal` int(3) DEFAULT NULL,
  `bad` int(3) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`mark_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_mark_config
-- ----------------------------
INSERT INTO keke_witkey_mark_config VALUES ('2', 'sreward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('3', 'mreward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('4', 'mreward', '100', '70', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('5', 'preward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('6', 'preward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('7', 'dtender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('8', 'dtender', '100', '50', '1', '1');
INSERT INTO keke_witkey_mark_config VALUES ('9', 'tender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('10', 'tender', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('11', 'goods', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('12', 'goods', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('13', 'service', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('14', 'service', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('1', 'sreward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('15', 'match', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('16', 'match', '100', '50', '0', '2');

-- ----------------------------
-- Table structure for `keke_witkey_mark_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_rule`;
CREATE TABLE `keke_witkey_mark_rule` (
  `mark_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_value` int(11) DEFAULT NULL,
  `m_value` int(11) DEFAULT NULL,
  `g_title` varchar(50) DEFAULT NULL,
  `m_title` varchar(50) DEFAULT NULL,
  `g_ico` varchar(200) DEFAULT NULL,
  `m_ico` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mark_rule_id`),
  KEY `index_1` (`mark_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_mark_rule
-- ----------------------------
INSERT INTO keke_witkey_mark_rule VALUES ('1', '200', '200', '一级雇主', '一级威客', 'data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881', 'data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067');
INSERT INTO keke_witkey_mark_rule VALUES ('2', '500', '500', '二级雇主', '二级威客', 'data/uploads/sys/mark/98734f3b080f7c2ee.gif?fid=2068', 'data/uploads/sys/mark/189344f3b081362561.gif?fid=2069');
INSERT INTO keke_witkey_mark_rule VALUES ('3', '1000', '1000', '三级雇主', '三级威客', 'data/uploads/sys/mark/98544f3b082a11c00.gif?fid=2070', 'data/uploads/sys/mark/306874f3b082e22fc3.gif?fid=2071');
INSERT INTO keke_witkey_mark_rule VALUES ('4', '2000', '2000', '四级雇主', '四级威客', 'data/uploads/sys/mark/140154f3b084cba568.gif?fid=2072', 'data/uploads/sys/mark/126844f3b085182758.gif?fid=2073');
INSERT INTO keke_witkey_mark_rule VALUES ('5', '3000', '3000', '五级雇主', '五级威客', 'data/uploads/sys/mark/262274f3b086f5cbfe.gif?fid=2074', 'data/uploads/sys/mark/228324f3b0872c6f04.gif?fid=2075');
INSERT INTO keke_witkey_mark_rule VALUES ('6', '3500', '3500', '六级雇主', '六级威客', 'data/uploads/sys/mark/188574f3b088a50adf.gif?fid=2076', 'data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077');

-- ----------------------------
-- Table structure for `keke_witkey_member`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member`;
CREATE TABLE `keke_witkey_member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `rand_code` char(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5529 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member
-- ----------------------------
INSERT INTO keke_witkey_member VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '7sghrm', '760573252@qq.com');
INSERT INTO keke_witkey_member VALUES ('5528', '扬破帆逐美梦', '14e1b600b1fd579f47433b88e8d85291', 'tj51cf', 'yangfanzhumeng@163.com');
INSERT INTO keke_witkey_member VALUES ('5527', '我爱小护士', '14e1b600b1fd579f47433b88e8d85291', 'sh596l', 'hushi@qq.com');
INSERT INTO keke_witkey_member VALUES ('5526', '女老板好狠', 'e10adc3949ba59abbe56e057f20f883e', 'k7usrn', '65987@163.com');
INSERT INTO keke_witkey_member VALUES ('5525', '同步', 'e10adc3949ba59abbe56e057f20f883e', 'ozjl94', '1569854@qq.com');
INSERT INTO keke_witkey_member VALUES ('5524', '账号同步测试', 'e10adc3949ba59abbe56e057f20f883e', 'njxp4b', 'lihangkeke@163.com');
INSERT INTO keke_witkey_member VALUES ('4', '注册', 'e10adc3949ba59abbe56e057f20f883e', '24mceq', '123554545@qq.com');
INSERT INTO keke_witkey_member VALUES ('3', '测试注册', 'e10adc3949ba59abbe56e057f20f883e', '3xy8bm', '659865@qq.com');
INSERT INTO keke_witkey_member VALUES ('2', '考霸', 'e10adc3949ba59abbe56e057f20f883e', '45cojo', '25487@qq.com');
INSERT INTO keke_witkey_member VALUES ('5523', '扬帆逐梦', 'e10adc3949ba59abbe56e057f20f883e', 'oa6rt7', '350279243@qq.com');
INSERT INTO keke_witkey_member VALUES ('5522', 'qwerty678', '25d55ad283aa400af464c76d713c07ad', 'nmqq6i', '614987950@qq.com');
INSERT INTO keke_witkey_member VALUES ('5520', '咯咯', 'e10adc3949ba59abbe56e057f20f883e', 'klzarv', '1233@qq.com');
INSERT INTO keke_witkey_member VALUES ('5521', 'wang1982', 'e10adc3949ba59abbe56e057f20f883e', 'gamwnc', 'asdfsd@asd.com');
INSERT INTO keke_witkey_member VALUES ('5517', '想玲', 'e10adc3949ba59abbe56e057f20f883e', 'mhown5', '10088784@qq.com');
INSERT INTO keke_witkey_member VALUES ('5516', '奈客', 'eda7732dfbd8435d6fced51e136f6c75', 'ghlcfo', '2734070740@qq.com');
INSERT INTO keke_witkey_member VALUES ('5508', '安德敏的下线', 'e10adc3949ba59abbe56e057f20f883e', '0vdar4', '15454312545@qq.com');
INSERT INTO keke_witkey_member VALUES ('5507', '推广下线', 'e10adc3949ba59abbe56e057f20f883e', '8ncl2z', '4512315458@qq.com');
INSERT INTO keke_witkey_member VALUES ('5506', 'shangk2', 'e10adc3949ba59abbe56e057f20f883e', '8ipj8w', 'shangk2@qq.com');
INSERT INTO keke_witkey_member VALUES ('5505', 'shangk1', 'e10adc3949ba59abbe56e057f20f883e', 'ybftuo', 'shangk1@qq.com');
INSERT INTO keke_witkey_member VALUES ('5504', '下线的下线', 'e10adc3949ba59abbe56e057f20f883e', '26k2oy', '25454512485@qq.com');
INSERT INTO keke_witkey_member VALUES ('5503', '下线', 'e10adc3949ba59abbe56e057f20f883e', 'p1wni7', '7845487878@qq.com');
INSERT INTO keke_witkey_member VALUES ('5502', '洛克', 'e10adc3949ba59abbe56e057f20f883e', '9dkpck', '5424245201@qq.com');
INSERT INTO keke_witkey_member VALUES ('5501', 'luoke', 'e10adc3949ba59abbe56e057f20f883e', 'ux3ohy', '2698026020@qq.com');
INSERT INTO keke_witkey_member VALUES ('5500', '艾仁', 'e10adc3949ba59abbe56e057f20f883e', '3byy5x', '760573251@qq.com');
INSERT INTO keke_witkey_member VALUES ('5499', '七星设计', 'e10adc3949ba59abbe56e057f20f883e', '40vxof', '548445115@qq.com');
INSERT INTO keke_witkey_member VALUES ('5498', 'shangk', 'e10adc3949ba59abbe56e057f20f883e', '75qm4l', 'sjl.55555@163.com');
INSERT INTO keke_witkey_member VALUES ('5495', '小鸟', 'e10adc3949ba59abbe56e057f20f883e', 'o4j8b0', '2386484541@qq.com');
INSERT INTO keke_witkey_member VALUES ('5494', 'hahapa', '4297f44b13955235245b2497399d7a93', 'p6wjcq', 'afasdf@123.com');

-- ----------------------------
-- Table structure for `keke_witkey_member_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_bank`;
CREATE TABLE `keke_witkey_member_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `real_name` char(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `card_id` char(20) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_address` varchar(150) DEFAULT NULL,
  `bank_sub_name` varchar(100) DEFAULT NULL,
  `card_num` char(20) DEFAULT NULL,
  `bank_type` int(1) DEFAULT NULL,
  `bind_status` int(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `bank_full_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `bank_id` (`bank_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_bank
-- ----------------------------
INSERT INTO keke_witkey_member_bank VALUES ('219', '5503', null, '下线企业', null, 'icbc', '11,175', null, '6212263202000189349', '2', '1', '1398848242', '中国工商银行');
INSERT INTO keke_witkey_member_bank VALUES ('220', '5504', null, '企业', null, 'icbc', '8,130', null, '3782 338842 10510', '2', '1', '1398848609', '中国工商银行');
INSERT INTO keke_witkey_member_bank VALUES ('221', '5505', 'shangk1', null, null, 'icbc', '5,97', null, '3782 212120 35030', '0', '1', '1398849622', '中国建设银行湖北分行');

-- ----------------------------
-- Table structure for `keke_witkey_member_black`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_black`;
CREATE TABLE `keke_witkey_member_black` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `expire` int(10) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `login_times` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_id` (`b_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_black
-- ----------------------------
INSERT INTO keke_witkey_member_black VALUES ('225', '5175', '1346997849', '1346911449', '4');
INSERT INTO keke_witkey_member_black VALUES ('229', '5235', '86400', '1350268196', null);

-- ----------------------------
-- Table structure for `keke_witkey_member_ext`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_ext`;
CREATE TABLE `keke_witkey_member_ext` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `k` varchar(50) DEFAULT NULL,
  `v1` varchar(255) DEFAULT NULL,
  `v2` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  `type` char(20) DEFAULT NULL,
  PRIMARY KEY (`ext_id`),
  KEY `ext_id` (`ext_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=650 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_ext
-- ----------------------------
INSERT INTO keke_witkey_member_ext VALUES ('533', '5189', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('534', '5189', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('535', '5189', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('536', '5189', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('537', '5189', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('538', '5202', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('539', '5202', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('540', '5202', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('541', '5202', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('542', '5202', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('543', '5220', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('544', '5220', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('545', '5220', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('546', '5220', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('547', '5220', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('548', '5281', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('549', '5281', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('550', '5281', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('551', '5281', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('552', '5281', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('553', '1', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('554', '1', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('555', '1', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('556', '1', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('557', '1', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('558', '5200', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('559', '5200', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('560', '5200', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('561', '5200', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('562', '5200', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('601', '5372', null, '2013-05-07', '2013-05-08', 'dfgdfgfdgfdgdfgdfdsfsdfdsfsdfdfdsfdsf', '1368004688', null, 'exp');
INSERT INTO keke_witkey_member_ext VALUES ('568', '5280', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('569', '5280', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('570', '5280', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('571', '5280', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('572', '5280', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('573', '5213', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('574', '5213', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('575', '5213', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('576', '5213', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('577', '5213', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('578', '5355', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('579', '5355', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('580', '5355', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('581', '5355', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('582', '5355', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('583', '5355', null, '2013-04-02', '2013-04-03', '对萨达萨达飒飒的萨达撒的小萨达萨达萨达撒的', '1364985173', null, 'exp');
INSERT INTO keke_witkey_member_ext VALUES ('584', '5357', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('585', '5357', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('586', '5357', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('587', '5357', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('588', '5357', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('589', '1', null, '5656', 'data/uploads/2013/04/08/323835162599f00208.jpg', '4415', null, null, 'cert');
INSERT INTO keke_witkey_member_ext VALUES ('614', '1', null, '风景', 'data/uploads/2013/09/29/1930252478d55ca25c.jpg', '5004', null, null, 'cert');
INSERT INTO keke_witkey_member_ext VALUES ('591', '5339', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('592', '5339', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('593', '5339', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('594', '5339', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('595', '5339', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('596', '5367', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('597', '5367', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('598', '5367', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('599', '5367', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('600', '5367', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('602', '5388', null, '2013-05-28', '2013-05-29', '个反对过分的广泛的规范的发大肆宣传发盛大发生的发生的发生的发生的盛大发生的范德萨发生的发盛大发生的说的发生的发生的', '1369798255', null, 'exp');
INSERT INTO keke_witkey_member_ext VALUES ('603', '5388', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('604', '5388', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('605', '5388', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('606', '5388', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('607', '5388', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('608', '5388', null, '2010-05-27', '2013-05-29', '说打法风的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生的生反对双方都是范德萨发生', '1369798357', null, 'exp');
INSERT INTO keke_witkey_member_ext VALUES ('609', '5206', 'email', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('610', '5206', 'mobile', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('611', '5206', 'qq', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('612', '5206', 'msn', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('613', '5206', 'phone', '2', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('615', '5444', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('616', '5444', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('617', '5444', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('618', '5444', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('619', '5444', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('620', '0', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('621', '0', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('622', '0', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('623', '0', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('624', '0', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('625', '5470', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('626', '5470', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('627', '5470', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('628', '5470', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('629', '5470', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('630', '5184', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('631', '5184', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('632', '5184', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('633', '5184', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('634', '5184', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('635', '5495', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('636', '5495', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('637', '5495', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('638', '5495', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('639', '5495', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('640', '5500', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('641', '5500', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('642', '5500', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('643', '5500', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('644', '5500', 'phone', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('645', '5498', 'email', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('646', '5498', 'mobile', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('647', '5498', 'qq', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('648', '5498', 'msn', '1', null, null, null, null, 'sect');
INSERT INTO keke_witkey_member_ext VALUES ('649', '5498', 'phone', '1', null, null, null, null, 'sect');

-- ----------------------------
-- Table structure for `keke_witkey_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_group`;
CREATE TABLE `keke_witkey_member_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(20) DEFAULT NULL,
  `group_roles` text,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_group
-- ----------------------------
INSERT INTO keke_witkey_member_group VALUES ('3', '财务人员', '3,76,5,33,36,147,68,70,71,77,38,34,37,35,139,m10', '1365744726');
INSERT INTO keke_witkey_member_group VALUES ('7', '客服', '80,81,82,147,58', '1365744734');
INSERT INTO keke_witkey_member_group VALUES ('2', '外围客服', '10,11,33,13,12,36,78,79,80,81,82,147,68,70,71,77,38,34,37,35,148,41,7,8,63,141,66,2,73,138,139,59,58,61,156,157,16,14,42,44,154,142,19,21,20,153,28,30,57,32,m610,m611,m612,m713,m714,m715', '1365744743');
INSERT INTO keke_witkey_member_group VALUES ('1', '管理员', '152,6,4,76,5,155,10,11,33,13,12,36,78,79,38,70,77,71,80,81,82,34,37,35,41,148,7,8,63,66,73,2,138,139,156,157,16,14,44,42,154,171,172,59,58,61,19,21,20,28,30,57,32,m610,m611,m612,m713,m714,m715,m10,m11,m22,m23,m34,m35,m46,m47,m58,m59,m816,m817,m918,m919,m1020,m1021,m1222,m1223', '1385615960');
INSERT INTO keke_witkey_member_group VALUES ('8', '编辑', '11,156,157,16,14,44,42,154,59,58,61', '1378259868');

-- ----------------------------
-- Table structure for `keke_witkey_member_oauth`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oauth`;
CREATE TABLE `keke_witkey_member_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` char(20) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `oauth_id` varchar(50) DEFAULT NULL,
  `bind_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_oauth
-- ----------------------------
INSERT INTO keke_witkey_member_oauth VALUES ('211', 'sina', '威武的灵儿', '5498', 'shangk', '1399860811', '2964840732', null);
INSERT INTO keke_witkey_member_oauth VALUES ('209', 'qq', '客客-潇客', '5495', '小鸟', '1399860245', '45A5642B88454BC69D7ABD05BC3A9CDE', null);
INSERT INTO keke_witkey_member_oauth VALUES ('212', 'sina', 'tobecto_com', '5517', '想玲', '1399860871', '1847685135', null);
INSERT INTO keke_witkey_member_oauth VALUES ('215', 'qq', '弥小海', '5519', '卡卡', '1399861323', '5115A0CA3CB8679811922CF760A2F30C', null);
INSERT INTO keke_witkey_member_oauth VALUES ('216', 'qq', '弥迦', '5520', '咯咯', '1399861476', 'C639426B2E94F3A6460742891753DFF6', null);
INSERT INTO keke_witkey_member_oauth VALUES ('220', 'qq', '客客-谦客', '5527', '我爱小护士', '1399884358', 'F8B4DDE47D85F51BA7FFBDF12301600F', null);
INSERT INTO keke_witkey_member_oauth VALUES ('221', 'qq', '扬帆逐梦', '5528', '扬破帆逐美梦', '1399884682', '683D6BCEA738B3D7DF70D0DEBAA9C2C2', null);

-- ----------------------------
-- Table structure for `keke_witkey_member_oltime`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oltime`;
CREATE TABLE `keke_witkey_member_oltime` (
  `oltime_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `last_op_time` int(11) DEFAULT NULL,
  `online_total_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`oltime_id`),
  KEY `oltime_id` (`oltime_id`)
) ENGINE=MyISAM AUTO_INCREMENT=709 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_member_oltime
-- ----------------------------
INSERT INTO keke_witkey_member_oltime VALUES ('1', '1', 'admin', '1', '1399947421', '4113030');
INSERT INTO keke_witkey_member_oltime VALUES ('8', '1', '邮箱激活', '0', '1399947421', '4091400');
INSERT INTO keke_witkey_member_oltime VALUES ('708', '5528', '扬破帆逐美梦', null, '1399887552', '1800');
INSERT INTO keke_witkey_member_oltime VALUES ('707', '5527', '我爱小护士', null, '1399885594', '600');
INSERT INTO keke_witkey_member_oltime VALUES ('706', '5526', '女老板好狠', null, '1399886352', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('705', '5525', '同步', null, '1399885259', '1200');
INSERT INTO keke_witkey_member_oltime VALUES ('704', '5', '账号同步测试', null, '1399878541', '600');
INSERT INTO keke_witkey_member_oltime VALUES ('703', '4', '注册', null, '1399886844', '5400');
INSERT INTO keke_witkey_member_oltime VALUES ('702', '3', '测试注册', null, '1399880322', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('701', '2', '考霸', null, '1399877334', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('700', '5523', '扬帆逐梦', null, '1399867387', '1800');
INSERT INTO keke_witkey_member_oltime VALUES ('699', '5522', 'qwerty678', null, '1399862167', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('698', '5521', 'wang1982', null, '1399877276', '3000');
INSERT INTO keke_witkey_member_oltime VALUES ('697', '5520', '咯咯', null, '1399861585', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('696', '5519', '卡卡', null, '1399861227', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('695', '5518', '五月天', null, '1399861021', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('694', '5517', '想玲', null, '1399877377', '3600');
INSERT INTO keke_witkey_member_oltime VALUES ('693', '5516', '奈客', null, '1399713758', '600');
INSERT INTO keke_witkey_member_oltime VALUES ('685', '5508', '安德敏的下线', null, '1398853875', '600');
INSERT INTO keke_witkey_member_oltime VALUES ('684', '5507', '推广下线', null, '1398852915', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('683', '5506', 'shangk2', null, '1398849738', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('682', '5505', 'shangk1', null, '1398849485', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('681', '5504', '下线的下线', null, '1399701683', '9000');
INSERT INTO keke_witkey_member_oltime VALUES ('680', '5503', '下线', null, '1399282101', '600');
INSERT INTO keke_witkey_member_oltime VALUES ('679', '5502', '洛克', null, '1399860828', '4800');
INSERT INTO keke_witkey_member_oltime VALUES ('678', '5501', 'luoke', null, '1399857692', '32400');
INSERT INTO keke_witkey_member_oltime VALUES ('677', '5500', '艾仁', null, '1399717169', '9600');
INSERT INTO keke_witkey_member_oltime VALUES ('676', '5499', '七星设计', null, '1398670816', '3000');
INSERT INTO keke_witkey_member_oltime VALUES ('675', '5498', 'shangk', null, '1399860811', '6000');
INSERT INTO keke_witkey_member_oltime VALUES ('674', '5497', 'shangk', null, '1398663740', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('673', '5496', 'shangk', null, '1398663597', '0');
INSERT INTO keke_witkey_member_oltime VALUES ('672', '5495', '小鸟', null, '1399873916', '44400');
INSERT INTO keke_witkey_member_oltime VALUES ('671', '5494', 'hahapa', null, '1398654326', '0');

-- ----------------------------
-- Table structure for `keke_witkey_model`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_model`;
CREATE TABLE `keke_witkey_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(20) DEFAULT NULL,
  `model_name` varchar(20) DEFAULT NULL,
  `model_dir` varchar(20) DEFAULT NULL,
  `model_type` char(10) DEFAULT NULL,
  `model_dev` varchar(20) DEFAULT NULL,
  `model_status` int(11) DEFAULT NULL,
  `model_desc` text,
  `on_time` int(11) DEFAULT NULL,
  `hide_mode` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `model_intro` varchar(255) DEFAULT NULL,
  `indus_bid` text,
  `config` text,
  PRIMARY KEY (`model_id`),
  KEY `model_id` (`model_id`),
  KEY `on_time` (`on_time`),
  KEY `model_status` (`model_status`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_model
-- ----------------------------
INSERT INTO keke_witkey_model VALUES ('3', 'preward', '计件悬赏', 'preward', 'task', 'kekezu', '1', '计件悬赏任务的一般流程是：&lt;br /&gt;1、雇主发布任务将任务金额托管到网站平台&lt;br /&gt;2、众多威客参与并提交方案&lt;br /&gt;3、雇主选择满意方案，设置方案中标状态&lt;br /&gt;4、方案中标发放赏金&lt;br /&gt;', '1397731057', '0', '3', '计件悬赏任务是威客完成的任务的数量支付报酬的一种任务模式。此任务模式适合技术含量比较低，报酬微少5', '217,216,215,214', 'a:11:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"80\";s:9:\"task_rate\";s:2:\"10\";s:14:\"task_fail_rate\";s:1:\"5\";s:7:\"min_day\";s:1:\"2\";s:11:\"choose_time\";s:1:\"1\";s:8:\"mark_day\";s:1:\"1\";s:14:\"min_delay_cash\";s:1:\"1\";s:9:\"max_delay\";s:1:\"2\";s:12:\"work_percent\";s:3:\"200\";s:15:\"is_auto_adjourn\";s:1:\"2\";}');
INSERT INTO keke_witkey_model VALUES ('2', 'mreward', '多人悬赏', 'mreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 多人悬赏任务是指您在发布任务时，先将任务赏金全额托管到平台，再从交稿中选出满意的稿件任务。该任务获奖任务为雇主发布任务时设置的奖项总数目（一等奖，二等奖，三等奖的总和）,获奖者将会根据自己的奖项排名获取相应的赏金。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;strong&gt;多人悬赏任务的一般流程是：&lt;/strong&gt;&lt;br /&gt;1、雇主发布任务会将对应的任务金额托管到网站平台；&lt;br /&gt;2、众多威客参与任务并提交方案，等待雇主选择方案；&lt;br /&gt;3、雇主会根据方案的优劣，设置相应的稿件奖项排名（如：一等奖，二等奖等）；&lt;br /&gt;4、雇主分配奖项后，如果选稿期结束该任务会进入公示期，在该时期威客可以用相应操作权限，一旦公示期结束，平台会给获奖的威客支付赏金（平台提成一定的比例），如果该任务还有多余的金额，平台会将多余的金额返还给雇主（平台提成一定的比例）。&lt;p&gt;&lt;/p&gt;', '1397730650', '0', '2', '多人悬赏任务是按威客在该任务中获奖的排名来获取支付报酬的一种任务模式。', '203,202,204,205,209,210,208,207,206,331', 'a:11:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"80\";s:9:\"task_rate\";s:2:\"20\";s:14:\"task_fail_rate\";s:1:\"5\";s:13:\"notice_period\";s:1:\"1\";s:7:\"min_day\";s:1:\"2\";s:11:\"choose_time\";s:1:\"1\";s:14:\"min_delay_cash\";s:1:\"2\";s:9:\"max_delay\";s:1:\"3\";s:10:\"end_action\";s:6:\"refund\";s:16:\"auto_choose_rule\";s:9:\"work_time\";}');
INSERT INTO keke_witkey_model VALUES ('5', 'dtender', '订金招标', 'dtender', 'task', 'kekezu', '1', '&lt;div class=\"mod-top\"&gt;&lt;div class=\"card-summary nslog-area\" data-nslog-type=\"72\"&gt;&lt;div class=\"card-summary-content\"&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 订金招标是指托管任务订金，选择应标威客完成任务的任务类型。任务采用选择威客完成任务的方式，避免了全款悬赏任务威客作品浪费的现象。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 订金招标流程较复杂，用时较长，但效果较好且能有效防止诈骗，特别适合大中型任务的发布这些任务可以考虑使用订金招标：VI/SI等大型设计项目，长期的画册设计外包，多页面的网页设计，电子杂志设计，网站程序开发，软件开发，音视频拍摄/调整，视频短片，大型翻译…… &lt;br /&gt;&lt;/p&gt;&lt;p&gt;　&lt;strong&gt;任务流程：雇主发布订金招标任务并托管任务款后，等待威客来参加任务。威客可以通过搜索等方式查看到该订金招标任务，并依据任务雇主的需求，提出解决方案。雇主查看到最合适最优秀的方案后，即可邀请提交此方案的威客写任务合同。双方对任务合同协调无异议后，即可确定该合同生效，并进入任务实施阶段。分期发放任务赏金。订金招标任务成功结束&lt;/strong&gt;。&lt;br /&gt;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;br /&gt;', '1397731903', '0', '5', '订金招标任务是采用选择威客完成任务的方式，避免了全款悬赏任务威客作品浪费的现象。', '153,159,336,337', 'a:8:{s:10:\"open_audit\";s:5:\"close\";s:7:\"deposit\";s:2:\"30\";s:9:\"task_rate\";s:2:\"10\";s:14:\"task_fail_rate\";s:2:\"10\";s:12:\"bid_max_time\";s:2:\"50\";s:12:\"bid_min_time\";s:1:\"1\";s:14:\"pay_limit_time\";s:1:\"2\";s:18:\"confirm_limit_time\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('6', 'goods', '威客作品', 'goods', 'shop', 'kekezu', '1', '&lt;strong&gt;威客作品的一般流程是：&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1、卖家在网站平台上上传作品（作品价格小于一定金额需要后台进行审核）&lt;/p&gt;&lt;p&gt;2、买家购买作品后，付款&lt;/p&gt;&lt;p&gt;4、付款后，等待卖家提供作品（有站内下载和站外交付两种）&lt;/p&gt;&lt;p&gt;5、买家确认作品后，卖家即可得到相应的作品金额&lt;/p&gt;&lt;p&gt;如果交易过程中不满意，可以申请仲裁a&lt;br /&gt;&lt;/p&gt;&lt;br /&gt;', '1398047646', '0', '6', '威客作品是网络商城的一种交易模式。666', '28,31,32', 'a:4:{s:8:\"min_cash\";s:2:\"30\";s:15:\"confirm_max_day\";s:1:\"1\";s:14:\"service_profit\";s:2:\"10\";s:13:\"max_filecount\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('7', 'service', '威客服务', 'service', 'shop', 'kekezu', '1', '&lt;strong&gt;威客作品的一般流程是：&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1、卖家在网站平台上上传服务&lt;/p&gt;&lt;p&gt;2、买家购买服务后，付款&lt;/p&gt;&lt;p&gt;3、付款后，等待卖家提供服务&lt;/p&gt;&lt;br /&gt;', '1394781049', '0', '7', '', null, 'a:4:{s:14:\"service_profit\";s:2:\"20\";s:8:\"min_cash\";s:2:\"10\";s:15:\"confirm_max_day\";s:1:\"2\";s:8:\"defeated\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('1', 'sreward', '单人悬赏', 'sreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt; 单人悬赏常用于发布一些时间短，需要创意型的任务，例如给宝宝起名，店铺起名，设计网站logo，贺卡设计，找人排队跑腿，写广告语，策划活动等等是的吧&lt;/strong&gt;&lt;/p&gt;', '1397811962', '0', '1', '单人悬赏常用于发布一些时间短，需要创意型的任务，例如给宝宝起名，店铺起名，设计网站logo，贺卡设计', '96,250,251,252,253', 'a:15:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:4:\"0.01\";s:9:\"task_rate\";s:2:\"10\";s:14:\"task_fail_rate\";s:2:\"10\";s:13:\"notice_period\";s:1:\"0\";s:7:\"min_day\";s:1:\"2\";s:11:\"vote_period\";s:1:\"1\";s:14:\"reg_vote_limit\";s:1:\"1\";s:11:\"choose_time\";s:1:\"1\";s:19:\"agree_complete_time\";s:1:\"2\";s:14:\"min_delay_cash\";s:1:\"1\";s:9:\"max_delay\";s:1:\"2\";s:10:\"end_action\";s:6:\"refund\";s:10:\"witkey_num\";s:1:\"2\";s:16:\"auto_choose_rule\";s:9:\"work_time\";}');
INSERT INTO keke_witkey_model VALUES ('4', 'tender', '普通招标', 'tender', 'task', 'kekezu', '1', '&lt;p&gt;普通招标，雇主选择中标者后，交付将在线下完成，雇主确认后，任务完成，普能招标，网站只收取固定的服务费用,&lt;/p&gt;&lt;p&gt;普通招标将不能增涨双方的信誉值，与能力值&lt;br /&gt;&lt;/p&gt;&lt;br /&gt;', '1397731365', '0', '4', '普通招标，网站不托管招标金额，所发生任何纠份网站不负责', '10,12,13', 'a:5:{s:8:\"zb_audit\";s:1:\"2\";s:7:\"zb_fees\";s:2:\"50\";s:11:\"zb_max_time\";s:3:\"100\";s:11:\"zb_min_time\";s:1:\"2\";s:11:\"choose_time\";s:1:\"2\";}');

-- ----------------------------
-- Table structure for `keke_witkey_msg`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg`;
CREATE TABLE `keke_witkey_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_pid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(50) DEFAULT NULL,
  `msg_status` tinyint(4) DEFAULT '0',
  `view_status` tinyint(4) DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `msg_pid` (`msg_pid`),
  KEY `on_time` (`on_time`),
  KEY `recive_uid` (`to_uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=47692 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_msg
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_msg_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_config`;
CREATE TABLE `keke_witkey_msg_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(30) DEFAULT NULL,
  `obj` char(20) DEFAULT NULL,
  `desc` varchar(30) DEFAULT NULL,
  `v` varchar(255) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_msg_config
-- ----------------------------
INSERT INTO keke_witkey_msg_config VALUES ('9', 'task_pub', 'task', '任务发布', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('10', 'task_bid', 'task', '任务中标', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('3', 'pay_success', 'found', '支付成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('4', 'pay_fail', 'found', '支付失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('11', 'task_auth_fail', 'task', '审核失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('12', 'task_auth_success', 'task', '审核通过', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('5', 'draw_success', 'found', '提现成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('2', 'freeze', 'user', '用户冻结', 'a:3:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;s:15:\"send_mobile_sms\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('13', 'task_freeze', 'task', '任务冻结', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('21', 'update_password', 'safe', '更新密码', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1322020124');
INSERT INTO keke_witkey_msg_config VALUES ('1', 'reg', 'user', '注册成功', 'a:3:{s:8:\"send_sms\";i:0;s:10:\"send_email\";i:0;s:15:\"send_mobile_sms\";i:0;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('6', 'recharge_success', 'found', '充值成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('7', 'recharge_fail', 'found', '充值失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('20', 'update_sec_code', 'safe', '更改安全码', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('8', 'space_change', 'space', '空间变更', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1367550090');
INSERT INTO keke_witkey_msg_config VALUES ('16', 'transrights_pass', 'trans', '交易维权成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('17', 'transrights_nopass', 'trans', '交易维权不成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('18', 'transrights_accept', 'trans', '交易维权受理', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('19', 'transrights_freeze', 'trans', '交易维权冻结', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('14', 'task_sign', 'task', '任务报名', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('15', 'task_hand', 'task', '任务交稿', 'a:3:{s:8:\"send_sms\";i:0;s:10:\"send_email\";i:0;s:15:\"send_mobile_sms\";i:0;}', '1366440916');
INSERT INTO keke_witkey_msg_config VALUES ('81', 'agreement', 'task', '协议签署', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1363163885');
INSERT INTO keke_witkey_msg_config VALUES ('82', 'agreement_file', 'task', '协议文件交付', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1363163885');
INSERT INTO keke_witkey_msg_config VALUES ('83', 'service_pub', 'service', '服务发布', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('84', 'service_order', 'service', '服务订单提交', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('99', 'unfreeze', 'user', '用户解冻', 'a:3:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;s:15:\"send_mobile_sms\";i:1;}', '1364996161');
INSERT INTO keke_witkey_msg_config VALUES ('88', 'order_change', 'service', '订单状态变更', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('87', 'auto_choose', 'task', '自动选稿', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1363163885');
INSERT INTO keke_witkey_msg_config VALUES ('100', 'get_password', 'user', '密码找回', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1364996161');
INSERT INTO keke_witkey_msg_config VALUES ('101', 'dispose_task', 'task', '稿件结算', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1335428501');
INSERT INTO keke_witkey_msg_config VALUES ('102', 'match_task', 'task', '速配任务', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1335428501');
INSERT INTO keke_witkey_msg_config VALUES ('108', 'task_unbid', 'task', '稿件淘汰', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('109', 'bank_auth', 'auth', '银行认证', 'a:1:{s:8:\"send_sms\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('110', 'auth_success', 'auth', '认证成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('111', 'auth_fail', 'auth', '认证失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('114', 'prom_succes', 'prom', '推广成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('113', 'withdraw_fail', 'finance', '提现失败', 'a:1:{s:8:\"send_sms\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('136', 'task_unfrize', 'task', '任务解冻', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('116', 'task_edit', 'task', '管理员编辑任务', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('117', 'plan_confirm_pay', 'task', '计划确认付款', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('118', 'reward_cash_trust', 'task', '诚意金托管', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('119', 'task_over', 'task', '任务圆满结束', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('120', 'plan_haved_pay', 'task', '计划已经付款', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('121', 'group_set', 'manage', '分组设置', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('122', 'timeout', 'task', '过期', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('123', 'kf_set', 'manage', '客服设置', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('124', 'task_fail_nopeople', 'task', '任务无人参与失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('128', 'work_get_prize', 'task', '稿件获奖', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('126', 'task_jf', 'task', '任务交付', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('127', 'task_fail', 'task', '任务失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('129', 'task_unfreeze', 'task', '任务解冻', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1343204483');
INSERT INTO keke_witkey_msg_config VALUES ('130', 'work_no_recept', 'task', '稿件未采纳', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('131', 'work_bid', 'task', '稿件中标', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('132', 'task_js_one', 'task', '获得一等奖', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('134', 'task_complete', 'task', '任务完成', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('135', 'auto_choose', 'task', '自动选稿', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('137', 'suggest_reply', 'user', '建议反馈', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('140', 'work_rw', 'task', '稿件入围', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('138', 'reported_nopass', 'trans', '被举报不成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('139', 'reported_pass', 'trans', '被举报成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440944');
INSERT INTO keke_witkey_msg_config VALUES ('141', 'work_out', 'task', '稿件淘汰', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('142', 'admin_charge', 'manage', '手动充值', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('143', 'shop_auth_success', 'user', '审核通过', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('144', 'shop_auth_fail', 'user', '审核失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('145', 'report_notice', 'user', '举报通知', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('146', 'shop_open', 'user', '店铺开启', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('147', 'shop_close', 'user', '店铺关闭', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('85', 'goods_order', 'service', '商品订单提交', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1366440936');
INSERT INTO keke_witkey_msg_config VALUES ('148', 'gy_notice_to_seller', 'service', '雇佣通知卖家', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1402106715');
INSERT INTO keke_witkey_msg_config VALUES ('149', 'gy_order_notice', 'service', '雇佣订单消息', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1402106715');
INSERT INTO keke_witkey_msg_config VALUES ('150', 'gy_notice_to_buyer', 'service', '雇佣通知买家', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1402106715');

-- ----------------------------
-- Table structure for `keke_witkey_msg_tpl`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_tpl`;
CREATE TABLE `keke_witkey_msg_tpl` (
  `tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_code` varchar(30) DEFAULT '0',
  `content` text,
  `send_type` int(1) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`tpl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_msg_tpl
-- ----------------------------

INSERT INTO keke_witkey_msg_tpl VALUES ('1', 'reg', '<p>尊敬的 {用户名}：</p><p>&nbsp;感谢您对{网站名称}的信任，当您收到这封信的时候，您已经成功注册为{网站名称}会员。在这里，您可以感受到诚信、活泼、高效的网络交易文化。</p><p>如有任何疑问，欢迎随时与我们联系，我们将竭诚为您服务！<br />&nbsp;&nbsp;&nbsp;　 欢迎继续关注{网站名称}！ </p><p>&nbsp;&nbsp;&nbsp; 祝：</p><p>　&nbsp; 工作学习顺利， 生活愉快！ </p><p>{网站名称}客服中心</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('33', 'task_pub', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;您的任务{任务编号}{任务标题}{任务状态}，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;任务编号：{任务编号}&lt;/p&gt;&lt;p&gt;任务标题：{任务链接}&lt;/p&gt;&lt;p&gt;任务状态：{任务状态}&lt;/p&gt;&lt;p&gt;开始时间：{开始时间}&lt;/p&gt;&lt;p&gt;投稿结束时间：{投稿结束时间}&lt;/p&gt;&lt;p&gt;选稿结束时间：{选稿结束时间}&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('35', 'task_bid', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&nbsp; 您的稿件被雇主{稿件状态}，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;任务编号：{任务编号}&lt;/p&gt;&lt;p&gt;任务标题：{任务标题}中标金额:{中标金额}&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('5', 'pay_success', '<p>尊敬的 {用户名}：</p><p>您成功充值{充值金额}元，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('7', 'draw_success', '<p>您在{网站名称}的提现申请已被受理，您的提现金额为{提现金额}元,提现账户:{帐户}请查收！</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('37', 'task_auth_success', '<p>尊敬的 {用户名}：</p><p>您的发布的任务已通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>任务编号：{任务编号}</p><p>任务链接：{任务链接}</p><p>开始时间：{开始时间}</p><p>结束时间：{结束时间}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('39', 'task_auth_fail', '<p>尊敬的 {用户名}：</p><p>您的发布的任务 {任务标题} 未通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('4', 'freeze', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;您的用户已被冻结，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('31', 'task_freeze', '<p>尊敬的 {用户名}：</p><p>您的任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>已被{原因}，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('13', 'update_password', '<p>尊敬的 {用户名}：</p><p>您的密码已经修改，新密码是：<u>（{新密码}）</u>，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('6', 'pay_fail', '<p>尊敬的 {用户名}：您充值{充值金额}元业务失败，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('41', 'agreement', '<p>尊敬的 {用户名}：</p><p>{协议状态}：</p><p>协议链接：{协议链接}</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('9', 'recharge_success', '<p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理成功，充值金额：{充值金额}元，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('12', 'recharge_fail', '<p></p><p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理失败，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('15', 'update_sec_code', '<p>尊敬的 {用户名}：</p><p>您的安全码修改成功，您的新安全码为：{安全码}。感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('19', 'transrights_pass', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;您举报的{交易维权编号}的{交易维权名称}记录网站已经受理完成，{交易维权名称}处理结果为：&lt;/p&gt;&lt;p&gt;{处理结果}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('20', 'reported_pass', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;您被网站用户举报的{交易维权编号}的{交易维权名称}记录网站已经受理完成，{交易维权名称}处理结果为：{处理结果}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('21', 'transrights_nopass', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;您举报的{交易维权编号}的{交易维权名称}记录网站确认为不成立，原因是：&lt;/p&gt;&lt;p&gt;{处理结果}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('22', 'reported_nopass', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;您被网站用户举报的{交易维权编号}的{交易维权名称}记录网站确认为不成立，原因是：&lt;/p&gt;&lt;p&gt;{处理结果}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('23', 'transrights_accept', '<p>尊敬的 {用户名}：</p><p>与您相关的编号为{交易维权编号}的{交易维权名称}记录网站确已经受理，相应{交易维权类型}{交易维权对象}已被{动作}。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('25', 'transrights_freeze', '<p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>由{发起方}对{交易维权对象}发起的维权记录已经提交成功，相应{交易维权类型}已被冻结，请等待网站受理。提交原因：</p><p>{提交原因}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('29', 'task_hand', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;{用户}向{称谓}的{任务标题}提交了稿件。&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('156', 'unfreeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您的用户已被解封，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('142', 'agreement_file', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>用户{发起者}已经{动作}：</p><p>协议链接：{协议链接}</p><p>协议状态：{协议状态}<br /></p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('144', 'service_pub', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;您的{服务类型}已发布成功。{服务类型}信息：&lt;/p&gt;&lt;p&gt;{服务类型}链接：{商品链接}&lt;/p&gt;&lt;p&gt;&lt;em&gt;&lt;strong&gt;发布时间：{发布时间}&lt;/strong&gt;&lt;/em&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;{服务类型}状态：{商品状态}&lt;br /&gt;&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('148', 'goods_order', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;{用户动作}了您的{服务类型}：{服务名称}。&lt;/p&gt;&lt;p&gt;买家留言：{买家留言}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('146', 'service_order', '&lt;div style=\"top: 0px;\"&gt;尊敬的 {用户名}：&lt;/div&gt;&lt;p&gt;{用户动作}了您的{服务类型}：{服务名称}。&lt;/p&gt;&lt;p&gt;&nbsp;订单详情：{订单链接}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('154', 'order_change', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}{动作}，请尽快前往用户中心处理，订单信息：</p><p>订单编号：{订单编号}</p><p></p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('152', 'auto_choose', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您参与的任务{任务编号}进行了自动选稿，任务信息：</p><p>任务标题：{任务标题}</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('158', 'get_password', '<p>尊敬的 {用户名}：</p><p>&nbsp;感谢您对{网站名称}的信任，您的新密码为{密码}，安全码为{安全码}，请保护好您的账号。</p><p>如有任何疑问，欢迎随时与我们联系，我们将竭诚为您服务！<br />&nbsp;&nbsp;&nbsp;　 欢迎继续关注{网站名称}！ </p><p>&nbsp;&nbsp;&nbsp; 祝：</p><p>　&nbsp; 工作学习顺利， 生活愉快！ </p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('160', 'dispose_task', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您参与的任务已经结束。</p><p>任务编号：{任务编号}</p><p>任务链接：{任务链接}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('163', 'match_task', '<p></p><p>尊敬的 {用户名}：{描述}。</p><p>任务标题：{任务标题}。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('177', 'task_unbid', '<p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您参与的任务：{任务标题}的任务稿件，已被雇主淘汰，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>任务编号：{任务编号}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('179', 'bank_auth', '<p>您申请的银行认证已经受理，管理员已经打款到您的账户，请及时查收，并填写您收到的金额数，以便你认证成功！</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('181', 'auth_success', '&lt;p&gt;您的{认证代码}已通过，请到&lt;a href=\"{认证链接}\"&gt;认证中心&lt;/a&gt;查看详细&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('182', 'auth_fail', '<p>您的{认证代码}没通过，请到<a href=\"{认证链接}\">认证中心</a>查看详细</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('185', 'withdraw_fail', '<p>您在{网站名称}通过{提现方式}提现，提现账户：{帐户},提现金额{提现金额}元,提现审核未通过</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('186', 'prom_succes', '<p>您的下线：{推广用户名},{事件}。</p><p>您获得了推广金额：{推广金额}元</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('188', 'plan_confirm_pay', '<p>您的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>中标者已完成第{几}阶段计划，请确认及付款</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('187', 'task_edit', '<p>管理员{管理员名称}在{时间}成功编辑了您的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>请注意查看</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('189', 'reward_cash_trust', '<p>您在发布的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>已成功托管赏金{金额}元</p><p>您可以去<a href=\"index.php?do=user&view=finance\">财务中心账目明细中查看<p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('190', 'task_over', '<p>您发布的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>已圆满结束，感谢您对本站的支持!</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('191', 'plan_haved_pay', '<p>您在{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>中，您的第{几}阶段计划已得到雇主确认，对方已付款，您获得了{金额}元,请注意查收</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('192', 'group_set', '<p>尊敬的 {用户名}：管理员{管理员名称}设置了您的后台用户组</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('195', 'kf_set', '<p>尊敬的 {用户名}：管理员{管理员名}设置了您为客服</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('202', 'task_unfrize', '<p>尊敬的 {用户名}：</p><p>您的任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>已被{原因}，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('197', 'task_jf', '<p>您参与的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>,雇主{雇主名称}已成功托管任务赏金{金额}元，请尽快完成任务计划</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('198', 'task_fail', '<p>您发布的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>因{理由}已经失败。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('199', 'timeout', '<p>您发布的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>{投标}期已过，任务在自动进入下一阶段', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('206', 'task_complete', '<p>您发布的{模型名称}任务<a href=\"index.php?do=task&id={任务编号}\">{任务标题}</a>{理由}<p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('28', 'task_sign', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;1尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;{用户}报名了{称谓}的{任务标题}。&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('18', 'space_change', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;由于您重置了自己的企业认证信息，您的空间：{空间名}变更为【个人空间】。请尽快完成企业认证，完成后您可以在用户中心重新升级为企业空间。&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服zxczxc&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('241', 'task_js_one', '自定义内容', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('243', 'work_bid', '自定义内容', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('245', 'task_unfreeze', '自定义内容', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('247', 'task_fail_nopeople', '自定义内容cxvdv', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('249', 'work_get_prize', '自定义内容', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('250', 'suggest_reply', '&lt;p&gt;亲爱的{用户名}：&lt;/p&gt;&lt;p&gt;建议编号：#{建议编号}&lt;/p&gt;&lt;p&gt;管理员回复：{回复内容}&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&nbsp;{网站名称}&lt;br /&gt;&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('251', 'work_rw', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&nbsp; 您的稿件被雇主{稿件状态}，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;任务编号：{任务编号}&lt;/p&gt;&lt;p&gt;任务标题：{任务标题}&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('252', 'work_out', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&nbsp; 您的稿件被雇主{稿件状态}，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;任务编号：{任务编号}&lt;/p&gt;&lt;p&gt;任务标题：{任务标题}&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('253', 'admin_charge', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;&nbsp; 后台管理员{金额动作}您现金{金额}，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。&lt;/p&gt;&lt;p&gt;--------------------------------------------------------------------------------------------------------------------&lt;/p&gt;&lt;p&gt;此邮件为系统自动发出的邮件，请勿直接回复。&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('256', 'report_notice', '<p>尊敬的{用户名}：您发布的{模型名称}{类型}{标题}被其他用户举报！</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', null, '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('259', 'gy_notice_to_buyer', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;你对{用户}发出雇佣，{状态变更}&lt;/p&gt;&lt;p&gt;请尽快前往用户中心处理。&lt;/p&gt;&lt;p&gt;雇佣信息：雇佣订单编号：{订单编号}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('257', 'gy_notice_to_seller', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;{用户}对你发出雇佣，{状态变更}&lt;/p&gt;&lt;p&gt;请尽快前往用户中心处理。&lt;/p&gt;&lt;p&gt;雇佣信息：雇佣订单编号：{订单编号}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。如有特殊情况，请致电客服&lt;/p&gt;', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('258', 'gy_order_notice', '&lt;p&gt;尊敬的 {用户名}：&lt;/p&gt;&lt;p&gt;{用户}对您发出雇佣操作：{雇佣订单链接}&lt;/p&gt;&lt;p&gt;感谢您对{网站名称}的信任。&lt;/p&gt;&lt;p&gt;如有特殊情况，请致电客服&lt;/p&gt;', '1', '0');

-- ----------------------------
-- Table structure for `keke_witkey_nav`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_nav`;
CREATE TABLE `keke_witkey_nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_url` varchar(200) DEFAULT NULL,
  `nav_title` varchar(20) DEFAULT NULL,
  `nav_style` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `newwindow` int(11) DEFAULT '0',
  `ishide` int(11) DEFAULT '0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_nav
-- ----------------------------
INSERT INTO keke_witkey_nav VALUES ('14', 'index.php?do=tasklist', '任务大厅', 'task', '2', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('5', 'index.php?do=goodslist', '威客商城', 'goods', '3', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('6', 'index.php?do=articlelist', '资讯中心', 'article', '6', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('7', 'index.php?do=case', '成功案例', 'case', '5', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('17', 'index.php?do=sellerlist', '服务商', 'seller', '4', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('33', 'index.php?do=index', '首页', 'index', '1', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order`;
CREATE TABLE `keke_witkey_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(150) DEFAULT NULL,
  `order_time` int(10) DEFAULT NULL,
  `order_amount` decimal(12,2) DEFAULT '0.00',
  `order_status` char(20) DEFAULT NULL,
  `order_body` varchar(200) DEFAULT NULL,
  `order_uid` int(11) DEFAULT NULL,
  `order_username` varchar(20) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_username` varchar(30) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `to_seller_message` varchar(255) DEFAULT NULL,
  `ys_end_time` int(11) DEFAULT NULL,
  `service_end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80005413 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_order
-- ----------------------------
INSERT INTO keke_witkey_order VALUES ('80005210', ' 包装袋设计', '1398653548', '500.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1161\"> 包装袋设计</a>', '5470', '小鸟', '1', 'admin', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005211', ' 包装袋设计', '1398654628', '500.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1161\"> 包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, '1398828828', '1398914209');
INSERT INTO keke_witkey_order VALUES ('80005212', ' 包装袋设计', '1398657215', '500.00', 'close', '购买商品<a href=\"index.php?do=goods&id=1161\"> 包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005213', ' 包装袋设计', '1398657651', '500.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1161\"> 包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, '1398657651', '1398920622');
INSERT INTO keke_witkey_order VALUES ('80005242', '找一个熟悉“方维”系统的程序员长期合作', '1398677176', '100.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1168\">找一个熟悉“方维”系统的程序员长期合作</a>', '1', 'admin', '5495', '小鸟', '7', null, '1398677176', '1398713306');
INSERT INTO keke_witkey_order VALUES ('80005214', '集团公司起名，要求大气上档次', '1398662706', '30.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3317\">集团公司起名，要求大气上档次</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005215', '集团公司起名，要求大气上档次', '1398662789', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3318\">集团公司起名，要求大气上档次</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005216', '集团公司起名，要求大气上档次#任务', '1398664137', '470.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3318\">集团公司起名，要求大气上档次</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005217', '典当行Logo设计Logo设计', '1398664656', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3319\">典当行Logo设计Logo设计</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005218', '典当行Logo设计Logo设计#任务', '1398664783', '970.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3319\">典当行Logo设计Logo设计</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005219', '网上商城全套页面设计', '1398665360', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3320\">网上商城全套页面设计</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005220', '急！！行车记录仪外观工业设计', '1398668348', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3321\">急！！行车记录仪外观工业设计</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005221', '嵌入式软硬件开发~改装POS机', '1398669009', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3322\">嵌入式软硬件开发~改装POS机</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005222', '白酒书法字体设计', '1398669170', '120.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3323\">白酒书法字体设计</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005223', 'app交互体验及UI设计, 高质高价', '1398670325', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3324\">app交互体验及UI设计, 高质高价</a>', '5499', '七星设计', '5499', '七星设计', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005224', '用“I DO\" 作一个图标设计', '1398671144', '200.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3325\">用“I DO\" 作一个图标设计</a>', '5499', '七星设计', '5499', '七星设计', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005225', '做一个网站开发', '1398671408', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3326\">做一个网站开发</a>', '5499', '七星设计', '5499', '七星设计', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005226', '小说原创网站建设', '1398671775', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3327\">小说原创网站建设</a>', '5495', '小鸟', '5495', '小鸟', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005227', '厨卫电器活动促销宣传口号设计', '1398671977', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3328\">厨卫电器活动促销宣传口号设计</a>', '5495', '小鸟', '5495', '小鸟', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005228', '生化危机4电影预告片', '1398672291', '150.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3329\">生化危机4电影预告片</a>', '5495', '小鸟', '5495', '小鸟', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005229', '老照片翻新', '1398672546', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3330\">老照片翻新</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005230', '游戏脚本设计开发', '1398672640', '200.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3331\">游戏脚本设计开发</a>', '5495', '小鸟', '5495', '小鸟', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005231', '代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '1398672736', '200.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3332\">代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略</a>', '5495', '小鸟', '5495', '小鸟', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005232', '表示我对领导感激之情的稿件', '1398673397', '120.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3333\">表示我对领导感激之情的稿件</a>', '5500', '艾仁', '5500', '艾仁', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005233', '个人名字征集', '1398673563', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3334\">个人名字征集</a>', '5500', '艾仁', '5500', '艾仁', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005234', '情人节祝福短信急征', '1398673637', '180.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3335\">情人节祝福短信急征</a>', '5500', '艾仁', '5500', '艾仁', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005235', '合同撰写', '1398673716', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3336\">合同撰写</a>', '5500', '艾仁', '5500', '艾仁', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005236', '学术问卷，2元一稿', '1398673849', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3337\">学术问卷，2元一稿</a>', '5500', '艾仁', '5500', '艾仁', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005237', '阿里巴巴全国专业批发市场大调研', '1398673973', '130.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3338\">阿里巴巴全国专业批发市场大调研</a>', '5500', '艾仁', '5500', '艾仁', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005238', '人格心理学线上問卷，每份7元', '1398674089', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3339\">人格心理学线上問卷，每份7元</a>', '5500', '艾仁', '5500', '艾仁', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005239', '关于威客和雇主的问卷调查，两元一稿', '1398674143', '150.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3340\">关于威客和雇主的问卷调查，两元一稿</a>', '5500', '艾仁', '5500', '艾仁', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005240', '在线职业调查问卷,2元一稿', '1398674200', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3341\">在线职业调查问卷,2元一稿</a>', '5500', '艾仁', '5500', '艾仁', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005241', '市场调查，2元一稿', '1398674254', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3342\">市场调查，2元一稿</a>', '5500', '艾仁', '5500', '艾仁', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005243', '生日祝福短信征集', '1398736284', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3343\">生日祝福短信征集</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005244', '求创意照片生日礼物', '1398738136', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3344\">求创意照片生日礼物</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005245', '需要开发人员', '1398739145', '80.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3345\">需要开发人员</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005246', '测试问题，一会删掉', '1398741573', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3346\">测试问题，一会删掉</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005247', '网站论坛推广营销方案', '1398748786', '150.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3347\">网站论坛推广营销方案</a>', '5495', '小鸟', '5495', '小鸟', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005248', '航天员发布的作品', '1398760601', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3348\">航天员发布的作品</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005249', '男装店起名', '1398761007', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3349\">男装店起名</a>', '5495', '小鸟', '5495', '小鸟', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005250', '设计高考升学宴祝贺卡片', '1398761841', '50.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1167\">设计高考升学宴祝贺卡片</a>', '5501', 'luoke', '5495', '小鸟', '6', 'sfsfsfsfsfs', '1398848255', null);
INSERT INTO keke_witkey_order VALUES ('80005251', '茶餐厅营销策略撰写', '1398761846', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3350\">茶餐厅营销策略撰写</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005252', '【加急】给女友道歉的短信', '1398762810', '150.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3351\">【加急】给女友道歉的短信</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005253', '茶餐厅营销策略撰写#任务', '1398763904', '970.00', 'ok', '任务<a href=\"http://www.kppw25.cc/index.php?do=task&id=3350\">茶餐厅营销策略撰写</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005254', '额滴神放松放松发顺丰', '1398763970', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3352\">额滴神放松放松发顺丰</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005255', '的发生地方第三个的', '1398764662', '100.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3353\">的发生地方第三个的</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005256', 'rewrewrwrewrwerwr', '1398765019', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3354\">rewrewrwrewrwerwr</a>', '5501', 'luoke', '5501', 'luoke', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005257', ' 包装袋设计', '1398822296', '120.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1161\"> 包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, '1398995998', '1399082349');
INSERT INTO keke_witkey_order VALUES ('80005258', '金融行业投资公司LOGO设计', '1398825257', '4000.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3355\">金融行业投资公司LOGO设计</a>', '5501', 'luoke', '5501', 'luoke', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005259', '表白信息撰写', '1398826790', '200.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3356\">表白信息撰写</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005260', '公司标识设计', '1398827412', '1000.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3357\">公司标识设计</a>', '5501', 'luoke', '5501', 'luoke', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005261', '小型设备图标设计', '1398827625', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3358\">小型设备图标设计</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005262', '设计酒店的Logo和VI设计', '1398828379', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3359\">设计酒店的Logo和VI设计</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005263', '设计酒店的Logo和VI设计#任务', '1398828528', '970.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3359\">设计酒店的Logo和VI设计</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005264', '编辑的稿件变成商品咯', '1398830006', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1172\">编辑的稿件变成商品咯</a>', '1', 'admin', '5500', '艾仁', '6', '我要买你家的东西，好吗？', '1398830034', null);
INSERT INTO keke_witkey_order VALUES ('80005265', '制作生日贺卡', '1398830640', '50.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>', '5500', '艾仁', '1', 'admin', '6', '我要购买你的商品，你金额的怎么样', '1398917052', null);
INSERT INTO keke_witkey_order VALUES ('80005266', '图片美工处理', '1398834539', '120.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1174\">图片美工处理</a>', '5500', '艾仁', '1', 'admin', '6', '购买可直接下载的商品测试。', '1398920991', null);
INSERT INTO keke_witkey_order VALUES ('80005267', '女生节妇女节必备礼物', '1398838598', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1171\">女生节妇女节必备礼物</a>', '1', 'admin', '5501', 'luoke', '6', '这个商品不错，很喜欢啊', '1398925018', null);
INSERT INTO keke_witkey_order VALUES ('80005268', '圣诞节的祝福语', '1398850355', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3360\">圣诞节的祝福语</a>', '5504', '下线的下线', '5504', '下线的下线', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005269', '需要会开发借口的程序员', '1398850974', '150.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3361\">需要会开发借口的程序员</a>', '5504', '下线的下线', '5504', '下线的下线', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005270', '发斯蒂芬斯蒂芬', '1398854278', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3362\">发斯蒂芬斯蒂芬</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005271', '单人举报测试', '1399278589', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3363\">单人举报测试</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005272', '单人举报测试', '1399279220', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3364\">单人举报测试</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005273', '定金招标测试', '1399281108', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3365\">定金招标测试</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005274', '斯蒂芬是的发送到', '1399281470', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3366\">斯蒂芬是的发送到</a>', '5504', '下线的下线', '5504', '下线的下线', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005275', '普通招标的举报测试', '1399281831', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3367\">普通招标的举报测试</a>', '5504', '下线的下线', '5504', '下线的下线', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005276', '单人举报在测试吧', '1399282242', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3368\">单人举报在测试吧</a>', '5504', '下线的下线', '5504', '下线的下线', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005277', '计件悬赏举报任务测试', '1399282898', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3369\">计件悬赏举报任务测试</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005278', '范德萨发斯蒂芬', '1399283101', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3370\">范德萨发斯蒂芬</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005279', '发送到发送到', '1399283239', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3371\">发送到发送到</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005280', '多人悬赏举报任务', '1399283562', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3372\">多人悬赏举报任务</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005281', '说法地方撒到底是', '1399340133', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3373\">说法地方撒到底是</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005282', '斯蒂芬发送到', '1399340426', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3374\">斯蒂芬发送到</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005283', '撒大师的撒', '1399340654', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3375\">撒大师的撒</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005284', '大啊是的撒', '1399341094', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3376\">大啊是的撒</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005285', '中标稿件但是的是', '1399343067', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3377\">中标稿件但是的是</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005286', '网页动画设计', '1399343220', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3378\">网页动画设计</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005287', '艺术照处理', '1399343533', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3379\">艺术照处理</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005288', '发送到但是发送到', '1399344443', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3380\">发送到但是发送到</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005289', '网站Logo设计', '1399344559', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3381\">网站Logo设计</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005290', '突然有人同意让他', '1399344649', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3382\">突然有人同意让他</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005291', '大三的撒旦是', '1399345259', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3383\">大三的撒旦是</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005292', '汇诚Logo设计', '1399345889', '200.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3384\">汇诚Logo设计</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005293', '小Z小ZX啊', '1399345896', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3385\">小Z小ZX啊</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005294', '小太阳取暖器外观设计和结构设计', '1399346266', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3386\">小太阳取暖器外观设计和结构设计</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005295', '编辑为商品的稿件s', '1399346557', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', '1', 'admin', '5504', '下线的下线', '6', '我要买你这个稿件，你买不', '1399346580', null);
INSERT INTO keke_witkey_order VALUES ('80005296', '大师的撒萨达', '1399346809', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3387\">大师的撒萨达</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005297', '向朋友表白，求丽江视频', '1399347165', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3388\">向朋友表白，求丽江视频</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005298', '撒旦撒旦阿萨德', '1399348072', '0.01', 'ok', '发布任务<a href=\"index.php?do=task&id=3389\">撒旦撒旦阿萨德</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005299', '计件循环是哪', '1399348113', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3390\">计件循环是哪</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005300', '向朋友表白，制作一本个性相册，向各地朋友征稿', '1399354457', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3391\">向朋友表白，制作一本个性相册，向各地朋友征稿</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005301', '说的发送到', '1399354739', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3392\">说的发送到</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005302', '工业设计', '1399354826', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3393\">工业设计</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005303', '多人悬赏维权', '1399355198', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3394\">多人悬赏维权</a>', '5495', '小鸟', '5495', '小鸟', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005304', '比特侠 主题人物设计', '1399355355', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3395\">比特侠 主题人物设计</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005305', '订金招标维权', '1399355441', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3396\">订金招标维权</a>', '5495', '小鸟', '5495', '小鸟', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005306', '订金招标维权#任务', '1399355943', '970.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3396\">订金招标维权</a>赏金托管', '5495', '小鸟', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005307', '比特侠 主题人物设计#任务', '1399356098', '1970.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3395\">比特侠 主题人物设计</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005308', '订金的覅是发送到', '1399356939', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3397\">订金的覅是发送到</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005309', '订金的覅是发送到#任务', '1399357007', '970.00', 'ok', '任务<a href=\"http://www.kppw.cn/demo/kppw25/index.php?do=task&id=3397\">订金的覅是发送到</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005310', '新编辑的商品', '1399357978', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1175\">新编辑的商品</a>', '5501', 'luoke', '1', 'admin', '6', '这个商品不错啊，买一个', '1399358442', null);
INSERT INTO keke_witkey_order VALUES ('80005311', '制作生日贺卡', '1399358502', '50.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>', '5501', 'luoke', '1', 'admin', '6', '哈哈，不错啊不错啊不错啊', '1399444943', null);
INSERT INTO keke_witkey_order VALUES ('80005312', '手绘鞋定制手绘T恤定制', '1399358605', '100.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '1', 'admin', '5501', 'luoke', '7', null, '1399531895', '1399963452');
INSERT INTO keke_witkey_order VALUES ('80005313', '发斯蒂芬斯蒂芬', '1399360875', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3398\">发斯蒂芬斯蒂芬</a>', '5495', '小鸟', '5495', '小鸟', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005314', '的鬼地方梵蒂冈地方', '1399362613', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3399\">的鬼地方梵蒂冈地方</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005315', '君傲范德萨', '1399363005', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3400\">君傲范德萨</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005316', '萨达萨达是', '1399363131', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3401\">萨达萨达是</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005317', '污染物而污染物而', '1399364118', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3402\">污染物而污染物而</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005318', '肉肉发发是的发送到', '1399366148', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3403\">肉肉发发是的发送到</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005319', '发斯蒂芬斯蒂芬', '1399366318', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3404\">发斯蒂芬斯蒂芬</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005320', '红烧鸡翅-红烧鱼', '1399366926', '900.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3405\">红烧鸡翅-红烧鱼</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005321', '图片美工处理', '1399367762', '120.00', 'close', '购买商品<a href=\"index.php?do=goods&id=1174\">图片美工处理</a>', '5495', '小鸟', '1', 'admin', '6', '我要打算的撒的阿萨德撒', '1399454176', null);
INSERT INTO keke_witkey_order VALUES ('80005322', '图片美工处理', '1399368196', '120.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1174\">图片美工处理</a>', '5495', '小鸟', '1', 'admin', '6', '的撒的撒打算程序创造性创造性', '1399454658', null);
INSERT INTO keke_witkey_order VALUES ('80005323', '制作生日贺卡', '1399368383', '50.00', 'close', '购买商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>', '5495', '小鸟', '1', 'admin', '6', '我要购买的撒发斯蒂芬是的', '1399454803', null);
INSERT INTO keke_witkey_order VALUES ('80005324', '设计管理平台（页面改造）', '1399369029', '220.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1166\">设计管理平台（页面改造）</a>', '5495', '小鸟', '1', 'admin', '6', '说法地方斯蒂芬是的发送到', '1399455438', null);
INSERT INTO keke_witkey_order VALUES ('80005325', '二维码网站建设', '1399369204', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1160\">二维码网站建设</a>', '5495', '小鸟', '1', 'admin', '6', '发的撒发斯蒂芬是的发送到', '1399455612', null);
INSERT INTO keke_witkey_order VALUES ('80005326', '包装袋设计', '1399369329', '200.00', 'close', '购买商品<a href=\"index.php?do=goods&id=1161\">包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, '1399542242', '1399628557');
INSERT INTO keke_witkey_order VALUES ('80005327', '包装袋设计', '1399369511', '100.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1161\">包装袋设计</a>', '5495', '小鸟', '1', 'admin', '7', null, null, '1399628764');
INSERT INTO keke_witkey_order VALUES ('80005328', '女生节妇女节必备礼物', '1399433602', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1171\">女生节妇女节必备礼物</a>', '5495', '小鸟', '5501', 'luoke', '6', '我要买商品。的萨达萨达', '1399520067', null);
INSERT INTO keke_witkey_order VALUES ('80005329', '求新年祝福的短信', '1399433924', '101.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '5495', '小鸟', '1', 'admin', '6', '联系客服够买测试，用户中心按钮', '1399520360', null);
INSERT INTO keke_witkey_order VALUES ('80005330', '求新年祝福的短信', '1399434768', '101.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '5495', '小鸟', '1', 'admin', '6', '发的 方式地方的说法斯蒂芬是的', '1399521184', null);
INSERT INTO keke_witkey_order VALUES ('80005331', '定金招标维权测试', '1399442456', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3406\">定金招标维权测试</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005332', '定金招标维权测试#任务', '1399442524', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3406\">定金招标维权测试</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005333', '为二位肉味儿', '1399442676', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3407\">为二位肉味儿</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005334', '为二位肉味儿#任务', '1399442836', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3407\">为二位肉味儿</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005335', '人气儿微微', '1399442887', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3408\">人气儿微微</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005336', '第三方说法', '1399445453', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3409\">第三方说法</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005337', '第三方说法#任务', '1399445508', '470.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3409\">第三方说法</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005338', '的撒打算的阿萨德', '1399450167', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3410\">的撒打算的阿萨德</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005339', '多人悬赏巨白', '1399453889', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3411\">多人悬赏巨白</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005340', '啊三发生地方第', '1399454314', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3412\">啊三发生地方第</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005341', '斯蒂芬斯蒂芬是', '1399454401', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3413\">斯蒂芬斯蒂芬是</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005342', '发短信跟我四年的男朋友表白', '1399455604', '100.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3414\">发短信跟我四年的男朋友表白</a>', '5501', 'luoke', '5501', 'luoke', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005343', '酒店会员卡设计', '1399513406', '100.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3415\">酒店会员卡设计</a>', '5502', '洛克', '5502', '洛克', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005344', '多人玄幻说那个聚吧', '1399514438', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3416\">多人玄幻说那个聚吧</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005345', '说发送到发的', '1399514625', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3417\">说发送到发的</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005346', '手绘鞋定制手绘T恤定制', '1399516190', '100.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '1', 'admin', '5501', 'luoke', '7', null, '1399689267', '1400121205');
INSERT INTO keke_witkey_order VALUES ('80005347', '编辑为商品的稿件s', '1399527578', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', '5501', 'luoke', '5504', '下线的下线', '6', '不错不错不错不错不错不错不错不错不错不错不错不错', '1399527622', null);
INSERT INTO keke_witkey_order VALUES ('80005348', '图片美工处理', '1399527647', '120.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1174\">图片美工处理</a>', '5501', 'luoke', '1', 'admin', '6', '方法是放松放松放松放松', '1399614060', null);
INSERT INTO keke_witkey_order VALUES ('80005349', '展会设计师', '1399527749', '100.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1178\">展会设计师</a>', '5501', 'luoke', '1', 'admin', '7', null, null, '1399564056');
INSERT INTO keke_witkey_order VALUES ('80005350', '测试任务，一会儿删掉', '1399528091', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3418\">测试任务，一会儿删掉</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005351', '展会设计师', '1399528285', '100.00', 'seller_confirm', '购买商品<a href=\"index.php?do=goods&id=1178\">展会设计师</a>', '5501', 'luoke', '1', 'admin', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005352', '展会设计师', '1399528287', '100.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1178\">展会设计师</a>', '5501', 'luoke', '1', 'admin', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005353', '手绘鞋定制手绘T恤定制', '1399528414', '100.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '1', 'admin', '5501', 'luoke', '7', null, null, '1400133254');
INSERT INTO keke_witkey_order VALUES ('80005354', '政府集群网站开发', '1399529626', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3419\">政府集群网站开发</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005355', '测试任务，一会儿删掉#任务', '1399530301', '270.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3418\">测试任务，一会儿删掉</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005356', '设计管理平台（页面改造）', '1399530747', '220.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1166\">设计管理平台（页面改造）</a>', '5501', 'luoke', '1', 'admin', '6', '额企鹅企鹅去去企鹅企鹅企鹅', '1399617154', null);
INSERT INTO keke_witkey_order VALUES ('80005357', '设计管理平台（页面改造）', '1399530748', '220.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1166\">设计管理平台（页面改造）</a>', '5501', 'luoke', '1', 'admin', '6', '额企鹅企鹅去去企鹅企鹅企鹅', null, null);
INSERT INTO keke_witkey_order VALUES ('80005358', '求游戏策划', '1399531121', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3420\">求游戏策划</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005359', '【趣味服务】写对联(藏头、抒情），用对联表白，祝福', '1399531195', '100.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1179\">【趣味服务】写对联(藏头、抒情），用对联表白，祝福</a>', '1', 'admin', '5501', 'luoke', '7', null, '1399704073', '1399556445');
INSERT INTO keke_witkey_order VALUES ('80005360', '求游戏策划#任务', '1399531290', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3420\">求游戏策划</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005361', '活动策划', '1399531365', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3421\">活动策划</a>', '5501', 'luoke', '5501', 'luoke', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005362', '测试任务打算', '1399542711', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3422\">测试任务打算</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005363', '测试任务打算#任务', '1399542761', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3422\">测试任务打算</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005364', '求新年祝福的短信', '1399600984', '101.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '5501', 'luoke', '1', 'admin', '6', 'tyfhdhdhdhd', '1399687390', null);
INSERT INTO keke_witkey_order VALUES ('80005365', '女生节妇女节必备礼物', '1399601085', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1171\">女生节妇女节必备礼物</a>', '1', 'admin', '5501', 'luoke', '6', '的后的后代丰厚的后的', '1399687492', null);
INSERT INTO keke_witkey_order VALUES ('80005366', '手绘鞋定制手绘T恤定制', '1399601250', '100.00', 'seller_confirm', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '1', 'admin', '5501', 'luoke', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005367', '手绘鞋定制手绘T恤定制', '1399601253', '100.00', 'seller_confirm', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '1', 'admin', '5501', 'luoke', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005368', '手绘鞋定制手绘T恤定制', '1399621773', '50.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1170\">手绘鞋定制手绘T恤定制</a>', '5495', '小鸟', '5501', 'luoke', '7', null, null, '1400226719');
INSERT INTO keke_witkey_order VALUES ('80005369', '求新年祝福的短信', '1399622440', '101.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '5495', '小鸟', '1', 'admin', '6', '买一个吧，看哈信息是什么', null, null);
INSERT INTO keke_witkey_order VALUES ('80005370', '测试定金招标', '1399628630', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3423\">测试定金招标</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005371', '测试定金招标#任务', '1399628861', '1470.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3423\">测试定金招标</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005372', '测试测试测试', '1399685904', '100.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3424\">测试测试测试</a>', '5502', '洛克', '5502', '洛克', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005373', '作品作品作品作品作品作品作品作品作品', '1399687106', '100.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1180\">作品作品作品作品作品作品作品作品作品</a>', '5501', 'luoke', '1', 'admin', '6', 'sdfdfdsafsf', null, null);
INSERT INTO keke_witkey_order VALUES ('80005374', '服务服务服务服务服务服务', '1399687154', '100.00', 'seller_confirm', '购买商品<a href=\"index.php?do=goods&id=1181\">服务服务服务服务服务服务</a>', '5501', 'luoke', '1', 'admin', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005375', 'drhgfghfghfghfghfghfghfetertretretret', '1399688034', '100.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3425\">drhgfghfghfghfghfghfghfetertretretret</a>', '5502', '洛克', '5502', '洛克', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005376', '银器银制礼品设计', '1399688070', '150.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1162\">银器银制礼品设计</a>', '1', 'admin', '5500', '艾仁', '6', 'ryrtytryrtyrtyrt', null, null);
INSERT INTO keke_witkey_order VALUES ('80005377', '银器银制礼品设计', '1399688122', '150.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1162\">银器银制礼品设计</a>', '1', 'admin', '5500', '艾仁', '6', 'twtewtewtwewtwtw', null, null);
INSERT INTO keke_witkey_order VALUES ('80005378', '开发静态页面设计新网站', '1399688318', '1000.00', 'seller_confirm', '购买商品<a href=\"index.php?do=goods&id=1163\">开发静态页面设计新网站</a>', '1', 'admin', '5500', '艾仁', '7', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005379', '设计高考升学宴祝贺卡片', '1399688686', '50.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1167\">设计高考升学宴祝贺卡片</a>', '1', 'admin', '5495', '小鸟', '6', 'dfgsddggsgg', null, null);
INSERT INTO keke_witkey_order VALUES ('80005380', 'FFFFFFFFFFFFFFFFFFF', '1399689375', '1000.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3426\">FFFFFFFFFFFFFFFFFFF</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005381', '的撒打算打算', '1399689451', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3427\">的撒打算打算</a>', '5495', '小鸟', '5495', '小鸟', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005382', '圣诞节的祝福语#任务', '1399701697', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3360\">圣诞节的祝福语</a>赏金托管', '5504', '下线的下线', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005383', 'V刹需现场', '1399702388', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3428\">V刹需现场</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005384', '跳转的撒的撒的', '1399705127', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3429\">跳转的撒的撒的</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005385', '编辑为商品的稿件s', '1399705299', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', '1', 'admin', '5504', '下线的下线', '6', 'mmmmmmmmmmmmmmmm', '1399705333', null);
INSERT INTO keke_witkey_order VALUES ('80005386', '范德萨发斯蒂芬', '1399705430', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3430\">范德萨发斯蒂芬</a>', '1', 'admin', '1', 'admin', '3', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005387', '个梵蒂冈地方', '1399705551', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3431\">个梵蒂冈地方</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005388', '个梵蒂冈地方#任务', '1399705610', '970.00', 'ok', '任务<a href=\"http://demo.kppw.cn/index.php?do=task&id=3431\">个梵蒂冈地方</a>赏金托管', '1', 'admin', '0', '', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005389', '的范德萨发生的', '1399707248', '50.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1182\">的范德萨发生的</a>', '5495', '小鸟', '1', 'admin', '7', null, null, '1399743289');
INSERT INTO keke_witkey_order VALUES ('80005390', '求新年祝福的短信', '1399707729', '101.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '5495', '小鸟', '1', 'admin', '6', '发生的范德萨发生的发送到', '1399794137', null);
INSERT INTO keke_witkey_order VALUES ('80005391', '的范德萨发生的', '1399709946', '100.00', 'complete', '购买商品<a href=\"index.php?do=goods&id=1182\">的范德萨发生的</a>', '5500', '艾仁', '1', 'admin', '7', null, '1399883321', '1399745975');
INSERT INTO keke_witkey_order VALUES ('80005392', '制作生日贺卡', '1399709955', '50.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1173\">制作生日贺卡</a>', '5495', '小鸟', '1', 'admin', '6', '发的发第三方的所发生的', '1399796371', null);
INSERT INTO keke_witkey_order VALUES ('80005393', '斯蒂芬斯蒂芬', '1399710135', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3432\">斯蒂芬斯蒂芬</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005409', '编辑为商品的稿件s', '1399885532', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1176\">编辑为商品的稿件s</a>', '1', 'admin', '5504', '下线的下线', '6', '打算打打死房产税的范德萨', '1399885539', null);
INSERT INTO keke_witkey_order VALUES ('80005394', '平面设计员', '1399713197', '0.01', 'wait', '发布任务<a href=\"index.php?do=task&id=3433\">平面设计员</a>', '5516', '奈客', '5516', '奈客', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005395', '银器银制礼品设计', '1399857699', '150.00', 'arbitral', '购买商品<a href=\"index.php?do=goods&id=1162\">银器银制礼品设计</a>', '5501', 'luoke', '5500', '艾仁', '6', 'tgretertertetete', '1399944107', null);
INSERT INTO keke_witkey_order VALUES ('80005396', '银器银制礼品设计', '1399857701', '150.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1162\">银器银制礼品设计</a>', '5501', 'luoke', '5500', '艾仁', '6', 'tgretertertetete', null, null);
INSERT INTO keke_witkey_order VALUES ('80005397', '678t8tyuytutyutyutut', '1399857916', '1000.00', 'wait', '发布任务<a href=\"index.php?do=task&id=3434\">678t8tyuytutyutyutut</a>', '5502', '洛克', '5502', '洛克', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005398', '航天员发布的作品3', '1399864795', '120.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3435\">航天员发布的作品3</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005399', '评审招标测试流程22', '1399864890', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3436\">评审招标测试流程22</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005400', '评审招标测试流程33', '1399864936', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3437\">评审招标测试流程33</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005401', '动漫周边商城网站', '1399865443', '2000.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3438\">动漫周边商城网站</a>', '5523', '扬帆逐梦', '5523', '扬帆逐梦', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005402', '发大幅度发送到', '1399879833', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3439\">发大幅度发送到</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005403', '入围热污染', '1399880010', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3440\">入围热污染</a>', '1', 'admin', '1', 'admin', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005404', '风尚大典地方', '1399880245', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3441\">风尚大典地方</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005405', '诚招护士看护师', '1399884484', '900.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3442\">诚招护士看护师</a>', '5527', '我爱小护士', '5527', '我爱小护士', '2', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005406', '打算打算是的', '1399884709', '30.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3443\">打算打算是的</a>', '1', 'admin', '1', 'admin', '5', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005407', '按时发生发的', '1399884842', '50.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3444\">按时发生发的</a>', '1', 'admin', '1', 'admin', '4', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005408', '求新年祝福的短信', '1399885489', '101.00', 'wait', '购买商品<a href=\"index.php?do=goods&id=1177\">求新年祝福的短信</a>', '4', '注册', '1', 'admin', '6', '发生地方第三方斯蒂芬是', null, null);
INSERT INTO keke_witkey_order VALUES ('80005410', '斯蒂芬是的发送到', '1399886152', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3445\">斯蒂芬是的发送到</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005411', '特瑞特人物', '1399886832', '100.00', 'ok', '发布任务<a href=\"index.php?do=task&id=3446\">特瑞特人物</a>', '1', 'admin', '1', 'admin', '1', null, null, null);
INSERT INTO keke_witkey_order VALUES ('80005412', '我编辑了个作品销售', '1399886961', '100.00', 'confirm', '购买商品<a href=\"index.php?do=goods&id=1183\">我编辑了个作品销售</a>', '1', 'admin', '4', '注册', '6', '发送到发送到发送到斯蒂芬斯蒂芬斯蒂芬', '1399886975', null);

-- ----------------------------
-- Table structure for `keke_witkey_order_charge`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_charge`;
CREATE TABLE `keke_witkey_order_charge` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_type` varchar(20) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT '0',
  `return_order_id` int(11) DEFAULT '0',
  `obj_id` int(11) DEFAULT '0',
  `uid` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT '0',
  `pay_time` int(11) DEFAULT '0',
  `pay_money` decimal(11,2) DEFAULT '0.00',
  `order_status` char(20) DEFAULT NULL,
  `pay_info` text,
  PRIMARY KEY (`order_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=575 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_order_charge
-- ----------------------------
INSERT INTO keke_witkey_order_charge VALUES ('570', 'online_charge', 'alipaydual', '0', '0', '5525', '同步', '1399884381', '0.01', 'ok', '');
INSERT INTO keke_witkey_order_charge VALUES ('571', 'online_charge', 'alipayjs', '0', '0', '5525', '同步', '1399883446', '0.01', 'wait', '');
INSERT INTO keke_witkey_order_charge VALUES ('572', 'online_charge', 'alipayjs', '0', '0', '1', 'admin', '1399883703', '0.01', 'wait', '');
INSERT INTO keke_witkey_order_charge VALUES ('573', 'online_charge', 'alipaydual', '0', '0', '1', 'admin', '1399883714', '0.01', 'wait', '');
INSERT INTO keke_witkey_order_charge VALUES ('574', 'online_charge', 'alipaydual', '0', '0', '5526', '女老板好狠', '1399886451', '0.01', 'ok', '');

-- ----------------------------
-- Table structure for `keke_witkey_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_detail`;
CREATE TABLE `keke_witkey_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_name` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `detail_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_id` (`detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6452 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_order_detail
-- ----------------------------
INSERT INTO keke_witkey_order_detail VALUES ('6249', ' 包装袋设计', '80005210', 'service', '1161', '500', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6250', ' 包装袋设计', '80005211', 'service', '1161', '500', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6251', ' 包装袋设计', '80005212', 'service', '1161', '500', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6252', ' 包装袋设计', '80005213', 'service', '1161', '500', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6253', '集团公司起名，要求大气上档次', '80005214', 'task', '3317', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6254', '集团公司起名，要求大气上档次', '80005215', 'task', '3318', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6255', '集团公司起名，要求大气上档次', '80005216', 'hosted', '3318', '470', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6256', '典当行Logo设计Logo设计', '80005217', 'task', '3319', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6257', '典当行Logo设计Logo设计', '80005218', 'hosted', '3319', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6258', '网上商城全套页面设计', '80005219', 'task', '3320', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6259', '急！！行车记录仪外观工业设计', '80005220', 'task', '3321', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6260', '嵌入式软硬件开发~改装POS机', '80005221', 'task', '3322', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6261', '白酒书法字体设计', '80005222', 'task', '3323', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6262', 'app交互体验及UI设计, 高质高价', '80005223', 'task', '3324', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6263', '用“I DO\" 作一个图标设计', '80005224', 'task', '3325', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6264', '做一个网站开发', '80005225', 'task', '3326', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6265', '小说原创网站建设', '80005226', 'task', '3327', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6266', '厨卫电器活动促销宣传口号设计', '80005227', 'task', '3328', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6267', '生化危机4电影预告片', '80005228', 'task', '3329', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6268', '老照片翻新', '80005229', 'task', '3330', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6269', '游戏脚本设计开发', '80005230', 'task', '3331', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6270', '代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '80005231', 'task', '3332', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6271', '表示我对领导感激之情的稿件', '80005232', 'task', '3333', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6272', '个人名字征集', '80005233', 'task', '3334', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6273', '情人节祝福短信急征', '80005234', 'task', '3335', '180', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6274', '合同撰写', '80005235', 'task', '3336', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6275', '学术问卷，2元一稿', '80005236', 'task', '3337', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6276', '阿里巴巴全国专业批发市场大调研', '80005237', 'task', '3338', '130', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6277', '人格心理学线上問卷，每份7元', '80005238', 'task', '3339', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6278', '关于威客和雇主的问卷调查，两元一稿', '80005239', 'task', '3340', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6279', '在线职业调查问卷,2元一稿', '80005240', 'task', '3341', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6280', '市场调查，2元一稿', '80005241', 'task', '3342', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6281', '找一个熟悉“方维”系统的程序员长期合作', '80005242', 'service', '1168', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6282', '生日祝福短信征集', '80005243', 'task', '3343', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6283', '求创意照片生日礼物', '80005244', 'task', '3344', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6284', '需要开发人员', '80005245', 'task', '3345', '80', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6285', '测试问题，一会删掉', '80005246', 'task', '3346', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6286', '网站论坛推广营销方案', '80005247', 'task', '3347', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6287', '航天员发布的作品', '80005248', 'task', '3348', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6288', '男装店起名', '80005249', 'task', '3349', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6289', '设计高考升学宴祝贺卡片', '80005250', 'service', '1167', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6290', '茶餐厅营销策略撰写', '80005251', 'task', '3350', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6291', '【加急】给女友道歉的短信', '80005252', 'task', '3351', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6292', '茶餐厅营销策略撰写', '80005253', 'hosted', '3350', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6293', '额滴神放松放松发顺丰', '80005254', 'task', '3352', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6294', '的发生地方第三个的', '80005255', 'task', '3353', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6295', 'rewrewrwrewrwerwr', '80005256', 'task', '3354', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6296', ' 包装袋设计', '80005257', 'service', '1161', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6297', '金融行业投资公司LOGO设计', '80005258', 'task', '3355', '4000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6298', '表白信息撰写', '80005259', 'task', '3356', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6299', '公司标识设计', '80005260', 'task', '3357', '1000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6300', '小型设备图标设计', '80005261', 'task', '3358', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6301', '设计酒店的Logo和VI设计', '80005262', 'task', '3359', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6302', '设计酒店的Logo和VI设计', '80005263', 'hosted', '3359', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6303', '编辑的稿件变成商品咯', '80005264', 'service', '1172', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6304', '制作生日贺卡', '80005265', 'service', '1173', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6305', '图片美工处理', '80005266', 'service', '1174', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6306', '女生节妇女节必备礼物', '80005267', 'service', '1171', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6307', '圣诞节的祝福语', '80005268', 'task', '3360', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6308', '需要会开发借口的程序员', '80005269', 'task', '3361', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6309', '发斯蒂芬斯蒂芬', '80005270', 'task', '3362', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6310', '单人举报测试', '80005271', 'task', '3363', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6311', '单人举报测试', '80005272', 'task', '3364', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6312', '定金招标测试', '80005273', 'task', '3365', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6313', '斯蒂芬是的发送到', '80005274', 'task', '3366', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6314', '普通招标的举报测试', '80005275', 'task', '3367', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6315', '单人举报在测试吧', '80005276', 'task', '3368', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6316', '计件悬赏举报任务测试', '80005277', 'task', '3369', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6317', '范德萨发斯蒂芬', '80005278', 'task', '3370', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6318', '发送到发送到', '80005279', 'task', '3371', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6319', '多人悬赏举报任务', '80005280', 'task', '3372', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6320', '说法地方撒到底是', '80005281', 'task', '3373', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6321', '斯蒂芬发送到', '80005282', 'task', '3374', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6322', '撒大师的撒', '80005283', 'task', '3375', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6323', '大啊是的撒', '80005284', 'task', '3376', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6324', '中标稿件但是的是', '80005285', 'task', '3377', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6325', '网页动画设计', '80005286', 'task', '3378', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6326', '艺术照处理', '80005287', 'task', '3379', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6327', '发送到但是发送到', '80005288', 'task', '3380', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6328', '网站Logo设计', '80005289', 'task', '3381', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6329', '突然有人同意让他', '80005290', 'task', '3382', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6330', '大三的撒旦是', '80005291', 'task', '3383', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6331', '汇诚Logo设计', '80005292', 'task', '3384', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6332', '小Z小ZX啊', '80005293', 'task', '3385', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6333', '小太阳取暖器外观设计和结构设计', '80005294', 'task', '3386', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6334', '编辑为商品的稿件s', '80005295', 'service', '1176', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6335', '大师的撒萨达', '80005296', 'task', '3387', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6336', '向朋友表白，求丽江视频', '80005297', 'task', '3388', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6337', '撒旦撒旦阿萨德', '80005298', 'task', '3389', '0', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6338', '计件循环是哪', '80005299', 'task', '3390', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6339', '向朋友表白，制作一本个性相册，向各地朋友征稿', '80005300', 'task', '3391', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6340', '说的发送到', '80005301', 'task', '3392', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6341', '工业设计', '80005302', 'task', '3393', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6342', '多人悬赏维权', '80005303', 'task', '3394', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6343', '比特侠 主题人物设计', '80005304', 'task', '3395', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6344', '订金招标维权', '80005305', 'task', '3396', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6345', '订金招标维权', '80005306', 'hosted', '3396', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6346', '比特侠 主题人物设计', '80005307', 'hosted', '3395', '1970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6347', '订金的覅是发送到', '80005308', 'task', '3397', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6348', '订金的覅是发送到', '80005309', 'hosted', '3397', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6349', '新编辑的商品', '80005310', 'service', '1175', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6350', '制作生日贺卡', '80005311', 'service', '1173', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6351', '手绘鞋定制手绘T恤定制', '80005312', 'service', '1170', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6352', '发斯蒂芬斯蒂芬', '80005313', 'task', '3398', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6353', '的鬼地方梵蒂冈地方', '80005314', 'task', '3399', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6354', '君傲范德萨', '80005315', 'task', '3400', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6355', '萨达萨达是', '80005316', 'task', '3401', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6356', '污染物而污染物而', '80005317', 'task', '3402', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6357', '肉肉发发是的发送到', '80005318', 'task', '3403', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6358', '发斯蒂芬斯蒂芬', '80005319', 'task', '3404', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6359', '红烧鸡翅-红烧鱼', '80005320', 'task', '3405', '900', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6360', '图片美工处理', '80005321', 'service', '1174', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6361', '图片美工处理', '80005322', 'service', '1174', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6362', '制作生日贺卡', '80005323', 'service', '1173', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6363', '设计管理平台（页面改造）', '80005324', 'service', '1166', '220', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6364', '二维码网站建设', '80005325', 'service', '1160', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6365', '包装袋设计', '80005326', 'service', '1161', '200', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6366', '包装袋设计', '80005327', 'service', '1161', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6367', '女生节妇女节必备礼物', '80005328', 'service', '1171', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6368', '求新年祝福的短信', '80005329', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6369', '求新年祝福的短信', '80005330', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6370', '定金招标维权测试', '80005331', 'task', '3406', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6371', '定金招标维权测试', '80005332', 'hosted', '3406', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6372', '为二位肉味儿', '80005333', 'task', '3407', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6373', '为二位肉味儿', '80005334', 'hosted', '3407', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6374', '人气儿微微', '80005335', 'task', '3408', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6375', '第三方说法', '80005336', 'task', '3409', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6376', '第三方说法', '80005337', 'hosted', '3409', '470', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6377', '的撒打算的阿萨德', '80005338', 'task', '3410', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6378', '多人悬赏巨白', '80005339', 'task', '3411', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6379', '啊三发生地方第', '80005340', 'task', '3412', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6380', '斯蒂芬斯蒂芬是', '80005341', 'task', '3413', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6381', '发短信跟我四年的男朋友表白', '80005342', 'task', '3414', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6382', '酒店会员卡设计', '80005343', 'task', '3415', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6383', '多人玄幻说那个聚吧', '80005344', 'task', '3416', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6384', '说发送到发的', '80005345', 'task', '3417', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6385', '手绘鞋定制手绘T恤定制', '80005346', 'service', '1170', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6386', '编辑为商品的稿件s', '80005347', 'service', '1176', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6387', '图片美工处理', '80005348', 'service', '1174', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6388', '展会设计师', '80005349', 'service', '1178', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6389', '测试任务，一会儿删掉', '80005350', 'task', '3418', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6390', '展会设计师', '80005351', 'service', '1178', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6391', '展会设计师', '80005352', 'service', '1178', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6392', '手绘鞋定制手绘T恤定制', '80005353', 'service', '1170', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6393', '政府集群网站开发', '80005354', 'task', '3419', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6394', '测试任务，一会儿删掉', '80005355', 'hosted', '3418', '270', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6395', '设计管理平台（页面改造）', '80005356', 'service', '1166', '220', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6396', '设计管理平台（页面改造）', '80005357', 'service', '1166', '220', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6397', '求游戏策划', '80005358', 'task', '3420', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6398', '【趣味服务】写对联(藏头、抒情），用对联表白，祝福', '80005359', 'service', '1179', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6399', '求游戏策划', '80005360', 'hosted', '3420', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6400', '活动策划', '80005361', 'task', '3421', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6401', '测试任务打算', '80005362', 'task', '3422', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6402', '测试任务打算', '80005363', 'hosted', '3422', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6403', '求新年祝福的短信', '80005364', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6404', '女生节妇女节必备礼物', '80005365', 'service', '1171', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6405', '手绘鞋定制手绘T恤定制', '80005366', 'service', '1170', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6406', '手绘鞋定制手绘T恤定制', '80005367', 'service', '1170', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6407', '手绘鞋定制手绘T恤定制', '80005368', 'service', '1170', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6408', '求新年祝福的短信', '80005369', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6409', '测试定金招标', '80005370', 'task', '3423', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6410', '测试定金招标', '80005371', 'hosted', '3423', '1470', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6411', '测试测试测试', '80005372', 'task', '3424', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6412', '作品作品作品作品作品作品作品作品作品', '80005373', 'service', '1180', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6413', '服务服务服务服务服务服务', '80005374', 'service', '1181', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6414', 'drhgfghfghfghfghfghfghfetertretretret', '80005375', 'task', '3425', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6415', '银器银制礼品设计', '80005376', 'service', '1162', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6416', '银器银制礼品设计', '80005377', 'service', '1162', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6417', '开发静态页面设计新网站', '80005378', 'service', '1163', '1000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6418', '设计高考升学宴祝贺卡片', '80005379', 'service', '1167', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6419', 'FFFFFFFFFFFFFFFFFFF', '80005380', 'task', '3426', '1000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6420', '的撒打算打算', '80005381', 'task', '3427', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6421', '圣诞节的祝福语', '80005382', 'hosted', '3360', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6422', 'V刹需现场', '80005383', 'task', '3428', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6423', '跳转的撒的撒的', '80005384', 'task', '3429', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6424', '编辑为商品的稿件s', '80005385', 'service', '1176', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6425', '范德萨发斯蒂芬', '80005386', 'task', '3430', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6426', '个梵蒂冈地方', '80005387', 'task', '3431', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6427', '个梵蒂冈地方', '80005388', 'hosted', '3431', '970', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6428', '的范德萨发生的', '80005389', 'service', '1182', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6429', '求新年祝福的短信', '80005390', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6430', '的范德萨发生的', '80005391', 'service', '1182', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6431', '制作生日贺卡', '80005392', 'service', '1173', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6432', '斯蒂芬斯蒂芬', '80005393', 'task', '3432', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6433', '平面设计员', '80005394', 'task', '3433', '0', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6434', '银器银制礼品设计', '80005395', 'service', '1162', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6435', '银器银制礼品设计', '80005396', 'service', '1162', '150', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6436', '678t8tyuytutyutyutut', '80005397', 'task', '3434', '1000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6437', '航天员发布的作品3', '80005398', 'task', '3435', '120', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6438', '评审招标测试流程22', '80005399', 'task', '3436', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6439', '评审招标测试流程33', '80005400', 'task', '3437', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6440', '动漫周边商城网站', '80005401', 'task', '3438', '2000', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6441', '发大幅度发送到', '80005402', 'task', '3439', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6442', '入围热污染', '80005403', 'task', '3440', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6443', '风尚大典地方', '80005404', 'task', '3441', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6444', '诚招护士看护师', '80005405', 'task', '3442', '900', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6445', '打算打算是的', '80005406', 'task', '3443', '30', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6446', '按时发生发的', '80005407', 'task', '3444', '50', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6447', '求新年祝福的短信', '80005408', 'service', '1177', '101', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6448', '编辑为商品的稿件s', '80005409', 'service', '1176', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6449', '斯蒂芬是的发送到', '80005410', 'task', '3445', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6450', '特瑞特人物', '80005411', 'task', '3446', '100', '1', null);
INSERT INTO keke_witkey_order_detail VALUES ('6451', '我编辑了个作品销售', '80005412', 'service', '1183', '100', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_payitem`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem`;
CREATE TABLE `keke_witkey_payitem` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(100) DEFAULT NULL,
  `item_code` char(20) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  `big_pic` varchar(100) DEFAULT NULL,
  `item_name` char(20) DEFAULT NULL,
  `user_type` char(20) DEFAULT NULL,
  `item_cash` decimal(10,2) DEFAULT '0.00',
  `item_standard` char(20) DEFAULT NULL,
  `item_limit` int(11) DEFAULT NULL,
  `item_desc` text,
  `ext` text,
  `is_open` int(1) DEFAULT NULL,
  `item_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_payitem
-- ----------------------------
INSERT INTO keke_witkey_payitem VALUES ('3', 'sreward,mreward,preward,tender,dtender,taobao,match', 'urgent', 'data/uploads/sys/tools/29088512d80ca7c44d.gif?fid=3711', '', '任务加急', 'employer', '10.00', 'day', '10', '任务加急任务加急任务加', null, '1', 'task');
INSERT INTO keke_witkey_payitem VALUES ('2', 'sreward,mreward,preward,tender,dtender,goods,service,match', 'top', 'data/uploads/sys/tools/74064f3b0ba6a17c3.gif?fid=2095', '', '任务置顶', 'employer', '20.00', 'day', '10', '任务置顶后，该任务将在首页、任务列表、任务首页优先显示，更方面搜索查看', '0', '1', 'task_service');
INSERT INTO keke_witkey_payitem VALUES ('1', 'sreward,mreward,preward,tender,dtender,match', 'workhide', 'data/uploads/sys/tools/210914f3b0bca96811.gif?fid=2097', '', '稿件隐藏', 'witkey', '10.00', 'times', '10', '针对任务交稿处理，稿件隐藏能更好的保障你的人个权利', '0', '1', 'work');
INSERT INTO keke_witkey_payitem VALUES ('4', 'sreward,mreward,preward,tender,dtender,goods,service,match', 'map', 'data/uploads/sys/tools/288854f3b0beadf0a3.gif?fid=2099', '', '标记地图', 'employer', '10.00', 'times', '10', '地图定位，任务发布后，可以在地图上指定位置显示', '0', '1', 'task_service');
INSERT INTO keke_witkey_payitem VALUES ('5', 'sreward,mreward,preward,tender', 'seohide', 'data/uploads/sys/tools/303205192f84576323.gif?fid=4510', '', '屏蔽搜索引擎', 'employer', '20.00', 'times', '10', '让您发布的信息不被百度，google等搜索引擎收录，保护您的隐私', null, '1', 'task');

-- ----------------------------
-- Table structure for `keke_witkey_payitem_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem_record`;
CREATE TABLE `keke_witkey_payitem_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `use_cash` decimal(10,2) DEFAULT '0.00',
  `use_num` int(2) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `record_id` (`record_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=3086 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_payitem_record
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_pay_api`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_api`;
CREATE TABLE `keke_witkey_pay_api` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(50) NOT NULL,
  `type` char(20) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_pay_api
-- ----------------------------
INSERT INTO keke_witkey_pay_api VALUES ('3', 'chinabank', 'online', 'a:4:{s:10:\"pay_status\";s:1:\"1\";s:9:\"seller_id\";s:4:\"1001\";s:7:\"safekey\";s:4:\"test\";s:8:\"descript\";s:72:\"支持招商、工行、建行、中行等主流银行的网银支付。\";}');
INSERT INTO keke_witkey_pay_api VALUES ('2', 'alipayjs', 'online', 'a:6:{s:10:\"pay_status\";s:1:\"1\";s:7:\"account\";s:14:\"pay@kekezu.com\";s:9:\"seller_id\";s:16:\"2088301857503158\";s:7:\"safekey\";s:32:\"wzn723ysa5qotelr2jcau4b7edb1livt\";s:12:\"account_name\";s:36:\"武汉客客信息技术有限公司\";s:8:\"descript\";s:30:\"支付宝即时到帐接口...\";}');
INSERT INTO keke_witkey_pay_api VALUES ('10', 'paypal', 'online', 'a:3:{s:10:\"pay_status\";s:1:\"1\";s:7:\"account\";s:28:\"325479_1292309609_biz@qq.com\";s:8:\"descript\";s:72:\"支持招商、工行、建行、中行等主流银行的网银支付。\";}');
INSERT INTO keke_witkey_pay_api VALUES ('1', 'tenpay', 'online', 'a:4:{s:10:\"pay_status\";s:1:\"1\";s:9:\"seller_id\";s:10:\"1211494301\";s:7:\"safekey\";s:32:\"0e330414776f09f7e2f6303142eaf562\";s:8:\"descript\";s:9:\"财富通\";}');
INSERT INTO keke_witkey_pay_api VALUES ('5', 'icbc', 'offline', 'a:5:{s:8:\"pay_name\";s:27:\"武汉市中国工商银行\";s:10:\"pay_status\";s:1:\"1\";s:11:\"pay_account\";s:18:\"454545454545454545\";s:8:\"pay_user\";s:6:\"阿乐\";s:9:\"pay_phone\";s:11:\"024-7777777\";}');
INSERT INTO keke_witkey_pay_api VALUES ('6', 'aboc', 'offline', 'a:5:{s:8:\"pay_name\";s:18:\"中国农业银行\";s:10:\"pay_status\";s:1:\"1\";s:11:\"pay_account\";s:18:\"284248736584356847\";s:8:\"pay_user\";s:6:\"张三\";s:9:\"pay_phone\";s:11:\"18234883434\";}');
INSERT INTO keke_witkey_pay_api VALUES ('4', 'yeepay', 'online', 'a:7:{s:10:\"pay_status\";i:0;s:9:\"seller_id\";s:11:\"10001126856\";s:7:\"safekey\";s:60:\"69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl\";s:10:\"per_charge\";N;s:8:\"per_high\";N;s:7:\"per_low\";N;s:8:\"descript\";s:0:\"\";}');
INSERT INTO keke_witkey_pay_api VALUES ('11', 'ccb', 'offline', 'a:5:{s:8:\"pay_name\";s:8:\"dsjjdhjs\";s:10:\"pay_status\";s:1:\"0\";s:11:\"pay_account\";s:17:\"12125454545454545\";s:8:\"pay_user\";s:7:\"dsfdsfd\";s:9:\"pay_phone\";s:11:\"15021451214\";}');
INSERT INTO keke_witkey_pay_api VALUES ('12', 'bocm', 'offline', 'a:5:{s:8:\"pay_name\";s:16:\"aaaaaaaaaaaaaaaa\";s:10:\"pay_status\";s:1:\"1\";s:11:\"pay_account\";s:16:\"1111111111111111\";s:8:\"pay_user\";s:9:\"aaaaaaaaa\";s:9:\"pay_phone\";s:11:\"15827130789\";}');
INSERT INTO keke_witkey_pay_api VALUES ('14', 'alipaydual', 'online', 'a:6:{s:10:\"pay_status\";s:1:\"1\";s:7:\"account\";s:14:\"pay@kekezu.com\";s:9:\"seller_id\";s:16:\"2088301857503158\";s:7:\"safekey\";s:32:\"wzn723ysa5qotelr2jcau4b7edb1livt\";s:12:\"account_name\";s:36:\"武汉客客信息技术有限公司\";s:8:\"descript\";s:28:\"支付宝双功能接口....\";}');

-- ----------------------------
-- Table structure for `keke_witkey_pay_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_config`;
CREATE TABLE `keke_witkey_pay_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(50) DEFAULT NULL,
  `v` varchar(150) DEFAULT NULL,
  `t` char(20) DEFAULT NULL,
  `d` char(50) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_pay_config
-- ----------------------------
INSERT INTO keke_witkey_pay_config VALUES ('1', 'recharge_min', '0.01', null, null);
INSERT INTO keke_witkey_pay_config VALUES ('2', 'withdraw_min', '2', null, null);
INSERT INTO keke_witkey_pay_config VALUES ('3', 'withdraw_max', '20000', null, null);
INSERT INTO keke_witkey_pay_config VALUES ('4', 'per_charge', '2', null, null);
INSERT INTO keke_witkey_pay_config VALUES ('5', 'per_low', '1', null, null);
INSERT INTO keke_witkey_pay_config VALUES ('6', 'per_high', '25', null, null);

-- ----------------------------
-- Table structure for `keke_witkey_plug`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_plug`;
CREATE TABLE `keke_witkey_plug` (
  `plug_id` int(11) NOT NULL AUTO_INCREMENT,
  `plug_desc` text,
  `status` int(11) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `plug_name` varchar(50) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `plug_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`plug_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_plug
-- ----------------------------
INSERT INTO keke_witkey_plug VALUES ('1', '广场是威客系统用户交互中心，在这里用户可以发布免费供需信息，威客付费任务和商品动态交互，适合需要加强用户关系的站点试用。', '1', '客客族', '1366782560', '广场', '47', 'square');
INSERT INTO keke_witkey_plug VALUES ('2', '推广营销是威客系统用户交互中心，在这里用户可以发布免费供需信息，威客付费任务和商品动态交互，适合需要加强用户关系的站点试用。', '1', '客客族', '1364959065', '推广营销', '27', 'prom');


-- ----------------------------
-- Table structure for `keke_witkey_priv_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_item`;
CREATE TABLE `keke_witkey_priv_item` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `op_code` varchar(20) DEFAULT NULL,
  `op_name` varchar(50) DEFAULT NULL,
  `allow_times` int(1) DEFAULT NULL,
  `limit_obj` int(111) DEFAULT NULL,
  `condit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`op_id`),
  KEY `op_id` (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_priv_item
-- ----------------------------
INSERT INTO keke_witkey_priv_item VALUES ('1', '1', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('58', '5', 'work_hand', '交稿', '0', '1', '0');
INSERT INTO keke_witkey_priv_item VALUES ('5', '2', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('9', '3', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('2', '1', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('8', '2', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('59', '5', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('11', '3', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('49', '4', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('50', '4', 'work_hand', '交稿', '0', '1', '0');
INSERT INTO keke_witkey_priv_item VALUES ('62', '8', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('63', '8', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('66', '9', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('67', '9', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('74', '12', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('75', '12', 'pub', '发布任务', '0', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('70', '10', 'work_hand', '交稿', '0', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('71', '10', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('51', '4', 'comment', '留言', '0', '1', 'realname');

-- ----------------------------
-- Table structure for `keke_witkey_priv_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_rule`;
CREATE TABLE `keke_witkey_priv_rule` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `mark_rule_id` char(5) DEFAULT NULL,
  `rule` char(5) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `r_id` (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_priv_rule
-- ----------------------------
INSERT INTO keke_witkey_priv_rule VALUES ('1', '1', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('2', '1', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('3', '1', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('4', '1', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('5', '1', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('7', '2', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('8', '2', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('9', '2', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('10', '2', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('11', '2', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('13', '3', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('14', '3', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('15', '3', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('16', '3', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('17', '3', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('19', '4', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('20', '4', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('21', '4', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('22', '4', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('23', '4', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('25', '5', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('26', '5', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('27', '5', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('28', '5', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('29', '5', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('145', '49', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('147', '59', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('148', '59', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('149', '59', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('55', '8', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('56', '8', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('57', '8', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('58', '8', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('59', '8', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('140', '57', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('142', '49', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('143', '49', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('144', '49', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('67', '9', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('68', '9', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('69', '9', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('70', '9', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('71', '9', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('73', '10', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('74', '10', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('75', '10', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('76', '10', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('77', '10', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('136', '57', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('137', '57', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('138', '57', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('139', '57', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('85', '11', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('86', '11', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('87', '11', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('88', '11', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('89', '11', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('130', '52', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('131', '52', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('132', '52', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('133', '52', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('134', '52', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('121', '12', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('122', '12', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('123', '12', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('124', '12', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('125', '12', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('126', '12', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('127', '49', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('128', '50', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('129', '51', '1', '1');
INSERT INTO keke_witkey_priv_rule VALUES ('150', '59', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('151', '59', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('152', '59', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('153', '58', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('154', '58', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('155', '58', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('156', '58', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('157', '58', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('158', '58', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('159', '60', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('160', '60', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('161', '60', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('162', '60', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('163', '60', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('165', '61', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('166', '61', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('167', '61', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('168', '61', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('169', '61', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('170', '61', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('171', '62', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('172', '62', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('173', '62', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('174', '62', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('175', '62', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('176', '62', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('177', '63', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('178', '63', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('179', '63', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('180', '63', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('181', '63', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('182', '63', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('183', '64', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('184', '64', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('185', '64', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('186', '64', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('187', '64', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('189', '65', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('190', '65', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('191', '65', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('192', '65', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('193', '65', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('195', '66', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('196', '66', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('197', '66', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('198', '66', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('199', '66', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('200', '67', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('201', '67', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('202', '67', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('203', '67', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('204', '67', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('205', '68', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('206', '68', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('207', '68', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('208', '68', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('209', '68', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('210', '69', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('211', '69', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('212', '69', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('213', '69', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('214', '69', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('215', '1', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('217', '2', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('220', '3', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('222', '4', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('292', '6', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('224', '5', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('294', '51', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('226', '7', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('295', '51', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('228', '8', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('296', '51', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('230', '9', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('297', '51', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('232', '10', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('298', '51', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('234', '11', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('300', '50', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('299', '50', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('301', '50', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('238', '49', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('302', '50', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('240', '52', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('241', '57', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('303', '50', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('248', '60', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('252', '62', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('253', '63', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('256', '64', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('258', '65', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('260', '66', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('262', '67', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('264', '68', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('266', '69', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('268', '70', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('269', '70', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('270', '70', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('271', '70', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('272', '70', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('273', '70', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('293', '71', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('275', '71', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('276', '71', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('277', '71', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('278', '71', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('279', '71', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('280', '72', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('281', '72', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('282', '72', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('283', '72', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('284', '72', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('285', '72', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('286', '73', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('287', '73', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('288', '73', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('289', '73', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('290', '73', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('291', '73', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('304', '74', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('305', '74', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('306', '74', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('307', '74', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('308', '74', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('309', '74', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('310', '75', '1', '');
INSERT INTO keke_witkey_priv_rule VALUES ('311', '75', '2', '');
INSERT INTO keke_witkey_priv_rule VALUES ('312', '75', '3', '');
INSERT INTO keke_witkey_priv_rule VALUES ('313', '75', '4', '');
INSERT INTO keke_witkey_priv_rule VALUES ('314', '75', '5', '');
INSERT INTO keke_witkey_priv_rule VALUES ('315', '75', '6', '');
INSERT INTO keke_witkey_priv_rule VALUES ('316', '76', '1', null);
INSERT INTO keke_witkey_priv_rule VALUES ('317', '76', '2', null);
INSERT INTO keke_witkey_priv_rule VALUES ('318', '76', '3', null);
INSERT INTO keke_witkey_priv_rule VALUES ('319', '76', '4', null);
INSERT INTO keke_witkey_priv_rule VALUES ('320', '76', '5', null);
INSERT INTO keke_witkey_priv_rule VALUES ('321', '76', '6', null);
INSERT INTO keke_witkey_priv_rule VALUES ('322', '77', '1', null);
INSERT INTO keke_witkey_priv_rule VALUES ('323', '77', '2', null);
INSERT INTO keke_witkey_priv_rule VALUES ('324', '77', '3', null);
INSERT INTO keke_witkey_priv_rule VALUES ('325', '77', '4', null);
INSERT INTO keke_witkey_priv_rule VALUES ('326', '77', '5', null);
INSERT INTO keke_witkey_priv_rule VALUES ('327', '77', '6', null);

-- ----------------------------
-- Table structure for `keke_witkey_prom_event`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_event`;
CREATE TABLE `keke_witkey_prom_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_desc` varchar(250) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `parent_uid` int(11) DEFAULT NULL,
  `parent_username` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `rake_cash` decimal(10,2) DEFAULT '0.00',
  `rake_credit` decimal(10,2) DEFAULT '0.00',
  `event_status` tinyint(1) DEFAULT NULL,
  `event_time` int(10) DEFAULT NULL,
  `action` char(20) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=609 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_prom_event
-- ----------------------------
INSERT INTO keke_witkey_prom_event VALUES ('605', '邀请注册', '5506', 'shangk2', '5498', 'shangk', '5506', '20.00', '0.00', '1', '1398849738', 'reg');
INSERT INTO keke_witkey_prom_event VALUES ('606', '邀请注册', '5508', '安德敏的下线', '1', 'admin', '5508', '20.00', '0.00', '2', '1398853269', 'reg');
INSERT INTO keke_witkey_prom_event VALUES ('607', '任务承接', '5508', '安德敏的下线', '1', 'admin', '3332', '2.00', '0.00', '2', '1398853617', 'bid_task');
INSERT INTO keke_witkey_prom_event VALUES ('608', '任务承接', '5508', '安德敏的下线', '1', 'admin', '3327', '1.00', '0.00', '2', '1398853946', 'bid_task');

-- ----------------------------
-- Table structure for `keke_witkey_prom_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_item`;
CREATE TABLE `keke_witkey_prom_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` char(20) DEFAULT NULL,
  `prom_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_pic` varchar(200) DEFAULT NULL,
  `item_content` text,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_prom_item
-- ----------------------------
INSERT INTO keke_witkey_prom_item VALUES ('54', 'img', 'reg', '0', '54545', '117894ef12f8313145.gif', '445454545', '1325035553');

-- ----------------------------
-- Table structure for `keke_witkey_prom_relation`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_relation`;
CREATE TABLE `keke_witkey_prom_relation` (
  `relation_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_type` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `prom_uid` int(11) DEFAULT NULL,
  `prom_username` varchar(20) DEFAULT NULL,
  `relation_status` int(1) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_id`),
  KEY `relation_id` (`relation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=592 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_prom_relation
-- ----------------------------
INSERT INTO keke_witkey_prom_relation VALUES ('590', 'reg', '5506', 'shangk2', '5498', 'shangk', '1', '1398849738');
INSERT INTO keke_witkey_prom_relation VALUES ('591', 'reg', '5508', '安德敏的下线', '1', 'admin', '2', '1398853269');

-- ----------------------------
-- Table structure for `keke_witkey_prom_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_rule`;
CREATE TABLE `keke_witkey_prom_rule` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_item` varchar(50) DEFAULT NULL,
  `prom_code` varchar(30) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `credit` decimal(10,2) DEFAULT '0.00',
  `rate` int(10) DEFAULT NULL,
  `config` text,
  `is_open` int(1) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`prom_id`),
  KEY `prom_id` (`prom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_prom_rule
-- ----------------------------
INSERT INTO keke_witkey_prom_rule VALUES ('5', '邀请注册', 'reg', '20', '20.00', '0.00', '0', 'a:1:{s:4:\"auth\";a:1:{i:0;s:8:\"realname\";}}', '1', 'reg');
INSERT INTO keke_witkey_prom_rule VALUES ('1', '实名认证', 'realname', '20', '20.00', '1.00', '0', '0', '1', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('3', '发布推广', 'pub_task', '40', '5.00', '0.00', '20', 'a:3:{s:5:\"model\";s:1:\"2\";s:18:\"pub_task_rake_type\";s:1:\"2\";s:13:\"pub_task_rate\";d:20;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('4', '任务承接', 'bid_task', '2', '0.00', '0.00', '10', 'a:2:{s:5:\"model\";s:3:\"2,1\";s:13:\"bid_task_rake\";i:10;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('6', '企业认证', 'enterprise', '20', '3.00', '3.00', '0', '0', '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('8', '银行认证', 'bank', '20', '2.00', '5.00', '0', '0', '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('9', '邮箱认证', 'email', '20', '50.00', '2.00', '0', '0', '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('10', '商品宣传', 'service', '3', '0.00', '0.00', '10', 'a:2:{s:12:\"indus_string\";s:11:\"460,452,454\";s:5:\"model\";s:1:\"6\";}', '1', 'service');

-- ----------------------------
-- Table structure for `keke_witkey_proposal`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_proposal`;
CREATE TABLE `keke_witkey_proposal` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pro_type` tinyint(1) DEFAULT NULL,
  `pro_desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pro_time` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `op_uid` int(11) DEFAULT NULL,
  `op_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `op_content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `op_time` int(11) DEFAULT NULL,
  `pro_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of keke_witkey_proposal
-- ----------------------------

INSERT INTO keke_witkey_proposal VALUES ('5', '中小城镇中小城镇', '2', '中小城镇中小城镇中小城镇', '1361350768', '1', 'admin', null, null, null, null, '1');
INSERT INTO keke_witkey_proposal VALUES ('18', '关于首页显示问题', '1', '关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页显示问题关于首页关于首页显示问题关于首页显示问题', '1361409562', '5298', 'keke001', '1', 'admin', '于首页显示问题关于首页显示问题关于首页显示问题关于首于首页显示问题关于首页显示问题关于首页显示问题关于首于首页显示问题关于首页显示问题关于首页显示问题关于首于首页显示问题关于首页显示问题关于首页显示问题关于首于首页显示问题关于首页显示问题关于首页显示问题关于首', '1361409667', '2');
INSERT INTO keke_witkey_proposal VALUES ('19', '怎么好打算的', '2', '怎么好打算的怎么好打算的怎么好打算的怎么好打算的怎么好打算的', '1361499666', '1', 'admin', '1', 'admin', '怎么好打算的怎么好打算的怎么好打算的怎么好打算的怎么好打算的', '1361499678', '2');
INSERT INTO keke_witkey_proposal VALUES ('22', '这个是用几代表的呢', '1', '过的法国号低功耗的更好的法国号的非官方低功耗低功耗的法国号的法国皇帝风光好的法国皇帝风格好的法国皇帝风光好的法国皇帝风光好的法国号的法国皇帝风光好的法国皇帝风格好的法国恢复的规划', '1365387030', '1', 'admin', '1', 'admin', '公开更何况就好了更何况好加快个回家回家', '1365389603', '2');
INSERT INTO keke_witkey_proposal VALUES ('35', '我要建议', '2', '为啥用户中心不给建议列表', '1399361443', '1', 'admin', '1', 'admin', 'admi你，你咋还有问题，', '1399361469', '2');
INSERT INTO keke_witkey_proposal VALUES ('36', '我要提交建议啊', '1', '从V刹V刹徐下次V型从V型从V型从V型从v需需下次', '1399535095', '5495', '小鸟', null, null, null, null, '1');
INSERT INTO keke_witkey_proposal VALUES ('40', '发斯蒂芬', '1', '发的三法第三方的发斯蒂芬是的fsdfsd说发生地方的撒发斯蒂芬是的', '1399614714', '5495', '小鸟', null, null, null, null, '1');
INSERT INTO keke_witkey_proposal VALUES ('41', '我要提建议', '1', '我的饿的的的法第三方但是范德萨范德萨发送到发，的撒的撒打算的阿萨德安生的撒 。', '1399619205', '5495', '小鸟', '1', 'admin', '给你回复， 你看好了，呵呵', '1399619239', '2');

-- ----------------------------
-- Table structure for `keke_witkey_report`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_report`;
CREATE TABLE `keke_witkey_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `front_status` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(20) DEFAULT NULL,
  `is_hide` tinyint(1) DEFAULT NULL,
  `report_desc` text,
  `report_file` varchar(200) DEFAULT NULL,
  `report_status` int(11) DEFAULT '0',
  `on_time` int(10) DEFAULT NULL,
  `report_type` tinyint(1) DEFAULT NULL,
  `op_uid` int(11) DEFAULT NULL,
  `op_username` varchar(20) DEFAULT NULL,
  `op_result` text,
  `op_time` int(10) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `report_reason` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  KEY `report_id` (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=866 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_report
-- ----------------------------
INSERT INTO keke_witkey_report VALUES ('768', 'task', '3342', '3342', '2', '5495', '小鸟', '1', '5500', '艾仁', '1', '是的发斯蒂芬斯蒂芬是的发', null, '1', '1398676624', '2', null, null, null, null, null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('769', 'work', '2045', '3322', '2', '5500', '艾仁', '1', '5499', '七星设计', '1', '为二位内容味儿味儿我，人味儿而卧肉味儿', 'data/uploads/2014/04/28/1838796999535e1d76698bf.jpg', '3', '1398676860', '2', '1', 'admin', 'Array', '1398676883', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('770', 'task', '3325', '3325', '2', '1', 'admin', '1', '5499', '七星设计', '1', '地方第三方斯蒂芬斯蒂芬', 'data/uploads/2014/04/28/1613316791535e1dbeeba70.jpg', '2', '1398676930', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('771', 'product', '1167', '1167', '2', '1', 'admin', '2', '5495', '小鸟', '1', '儿玩儿儿玩儿微博', '', '3', '1398677578', '2', '1', 'admin', 'Array', '1398677600', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('772', 'product', '1165', '1165', '2', '1', 'admin', '2', '5500', '艾仁', '1', 'were肉味儿肉味儿肉味儿人', '', '2', '1398677619', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('773', 'task', '3341', '3341', '2', '1', 'admin', '1', '5500', '艾仁', '1', 'V大分发发的发送到发送到发', '', '2', '1398677716', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('774', 'task', '3343', '3343', '2', '5495', '小鸟', '1', '1', 'admin', '1', '我要举报你', 'data/uploads/2014/04/29/748665033535f068781db0.jpg', '4', '1398736528', '2', '1', 'admin', '系统选稿', '1398736571', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('775', 'task', '3344', '3344', '2', '5495', '小鸟', '1', '1', 'admin', '1', '斯蒂芬地方的范德萨发是的', 'data/uploads/2014/04/29/263767809535f0e2723918.jpg|data/uploads/2014/04/29/3496059535f0e274ecf5.jpg', '3', '1398738474', '2', '1', 'admin', 'Array', '1398738504', null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('776', 'work', '362', '3344', '4', '1', 'admin', '2', '5495', '小鸟', '1', '撒旦奥苏的撒的撒 啊', 'data/uploads/2014/04/29/780012464535f156035b16.jpg', '4', '1398740323', '2', '1', 'admin', '', '1398740361', null, null, '虚假交稿');
INSERT INTO keke_witkey_report VALUES ('777', 'work', '363', '3344', '4', '1', 'admin', '2', '5500', '艾仁', '1', '任务二二额肉味儿肉味儿', 'data/uploads/2014/04/29/1096408896535f162eb89cb.jpg', '3', '1398740529', '2', '1', 'admin', 'Array', '1398740555', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('778', 'product', '1162', '1162', '2', '1', 'admin', '2', '5500', '艾仁', '1', '范德萨发送到发送到发的说法的', 'data/uploads/2014/04/29/1359329712535f1d48dd7bc.jpg', '2', '1398742347', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('779', 'work', '2045', '3322', '2', '1', 'admin', '2', '5499', '七星设计', '1', '斯蒂芬的发的说法但是发是第十三发送到', 'data/uploads/2014/04/29/1064926600535f218a249eb.jpg', '3', '1398743437', '2', '1', 'admin', 'Array', '1398743462', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('780', 'work', '2049', '3347', '5', '5495', '小鸟', '2', '5500', '艾仁', '1', '是的安生安生发送到发斯蒂芬是的发', '', '4', '1398748882', '2', '1', 'admin', '取消中标', '1398748899', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('781', 'work', '2050', '3351', '5', '1', 'admin', '2', '5495', '小鸟', '1', 'sdfsdf sdf sdf dsf sd fs d', '', '4', '1398763150', '2', '1', 'admin', '取消中标，系统选稿', '1398763179', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('782', 'work', '361', '3342', '2', '1', 'admin', '1', '5501', 'luoke', '1', '斯蒂芬斯蒂芬是的发发但是范德萨', '', '4', '1398824459', '2', '1', 'admin', '', '1398824484', null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('783', 'work', '368', '3342', '4', '5500', '艾仁', '2', '5495', '小鸟', '1', '说法地方第三方但是范德萨范德萨发', 'data/uploads/2014/04/30/198317782753605e9a465cf.jpg', '3', '1398824604', '2', '1', 'admin', 'Array', '1398824629', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('784', 'product', '1174', '1174', '2', '5500', '艾仁', '2', '1', 'admin', '1', '范德萨地方是的范德萨方式的', '', '3', '1398834484', '2', '1', 'admin', 'Array', '1398834504', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('785', 'product', '1172', '1172', '2', '1', 'admin', '2', '5500', '艾仁', '1', '发送到发斯蒂芬地方但是', 'data/uploads/2014/04/30/6190118555360860c15bf9.jpg', '4', '1398834702', '2', '1', 'admin', '商品下架', '1398834733', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('786', 'work', '2066', '3362', '2', '1', 'admin', '2', '5508', '安德敏的下线', '1', '举报这个稿件', '', '2', '1398854386', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('787', 'task', '3363', '3363', '2', '5495', '小鸟', '1', '1', 'admin', '1', '范德萨发但是发斯蒂芬是的发送到发是的', '', '3', '1399278663', '2', '1', 'admin', 'Array', '1399278686', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('788', 'task', '3363', '3363', '2', '5503', '下线', '1', '1', 'admin', '1', '飞洒的范德萨发斯蒂芬是的发送到 但是', '', '4', '1399278725', '2', '1', 'admin', '系统选稿', '1399278767', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('789', 'task', '3364', '3364', '2', '5503', '下线', '1', '1', 'admin', '1', '斯蒂芬范德萨发斯蒂芬是的发送到发送到发是的', '', '2', '1399279265', '2', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('790', 'task', '3364', '3364', '2', '5495', '小鸟', '1', '1', 'admin', '1', '东方闪电范德萨发发是的发送到发', '', '4', '1399279411', '2', '1', 'admin', '系统选稿', '1399281338', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('791', 'task', '3365', '3365', '2', '5495', '小鸟', '1', '1', 'admin', '1', '发的撒发斯蒂芬是的发送到', '', '4', '1399281379', '2', '1', 'admin', '', '1399281421', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('792', 'task', '3366', '3366', '2', '1', 'admin', '1', '5504', '下线的下线', '1', '地方撒发斯蒂芬是的发送到范德萨', '', '4', '1399281484', '2', '1', 'admin', '账号禁用', '1399281495', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('793', 'task', '3367', '3367', '2', '1', 'admin', '1', '5504', '下线的下线', '1', '第三方的广泛地个电饭锅梵蒂冈梵蒂冈地方', '', '3', '1399281994', '2', '1', 'admin', 'Array', '1399282016', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('794', 'task', '3367', '3367', '2', '5495', '小鸟', '1', '5504', '下线的下线', '1', '发斯蒂芬斯蒂芬说发送到范德萨', '', '4', '1399282040', '2', '1', 'admin', '账号禁用', '1399282057', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('795', 'task', '3367', '3367', '2', '5503', '下线', '1', '5504', '下线的下线', '1', '发撒发斯蒂芬是的法第三方是的', '', '4', '1399282107', '2', '1', 'admin', '', '1399282115', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('796', 'work', '2072', '3368', '5', '5504', '下线的下线', '2', '1', 'admin', '1', '中标稿件的举报', '', '4', '1399282357', '2', '1', 'admin', '取消中标，系统选稿', '1399282417', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('797', 'work', '2071', '3368', '5', '5504', '下线的下线', '2', '1', 'admin', '1', '未中标稿件的举报', '', '4', '1399282371', '2', '1', 'admin', '屏蔽稿件', '1399282390', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('798', 'task', '3369', '3369', '2', '5504', '下线的下线', '1', '1', 'admin', '1', '特瑞特人太热特瑞特让他', '', '4', '1399282978', '2', '1', 'admin', '系统选稿', '1399282996', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('799', 'task', '3370', '3370', '2', '5504', '下线的下线', '1', '1', 'admin', '1', '发送到发送到发送到发送到', '', '4', '1399283146', '2', '1', 'admin', '系统选稿', '1399283158', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('800', 'task', '3371', '3371', '5', '5504', '下线的下线', '1', '1', 'admin', '1', '第三方斯蒂芬范德萨', '', '4', '1399283295', '2', '1', 'admin', '系统选稿', '1399283314', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('801', 'task', '3372', '3372', '5', '5504', '下线的下线', '1', '1', 'admin', '1', '啊三大的撒打算打算的撒的撒', '', '4', '1399283657', '2', '1', 'admin', '系统选稿', '1399283667', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('802', 'task', '3373', '3373', '2', '5495', '小鸟', '1', '1', 'admin', '1', '斯蒂芬范德萨发送到', '', '4', '1399340311', '2', '1', 'admin', '系统选稿', '1399340328', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('803', 'task', '3374', '3374', '2', '5495', '小鸟', '1', '1', 'admin', '1', '热热热舞热舞', '', '4', '1399340475', '2', '1', 'admin', '系统选稿', '1399340485', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('804', 'task', '3375', '3375', '2', '5495', '小鸟', '1', '1', 'admin', '1', '我认为热舞肉味儿', '', '4', '1399340687', '2', '1', 'admin', '系统选稿', '1399340697', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('805', 'task', '3376', '3376', '2', '5495', '小鸟', '1', '1', 'admin', '1', '第三方的范德萨范德萨地方是的', '', '4', '1399341124', '2', '1', 'admin', '系统选稿', '1399341203', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('806', 'work', '2087', '3376', '2', '1', 'admin', '2', '5495', '小鸟', '1', '盛大的萨达四大飒飒的', '', '3', '1399341295', '2', '1', 'admin', 'Array', '1399341312', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('807', 'work', '2087', '3376', '5', '5504', '下线的下线', '1', '5495', '小鸟', '1', '斯蒂芬是的范德萨范德萨', '', '4', '1399341365', '2', '1', 'admin', '取消中标，系统选稿', '1399341375', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('808', 'work', '2090', '3377', '2', '1', 'admin', '2', '5504', '下线的下线', '1', '温热我认为热舞肉味儿吧吧', '', '4', '1399343319', '2', '1', 'admin', '取消中标，系统选稿', '1399343331', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('809', 'task', '3378', '3378', '2', '5501', 'luoke', '1', '1', 'admin', '1', '额外为', '', '4', '1399343326', '2', '1', 'admin', '系统选稿', '1399343378', null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('810', 'work', '2092', '3379', '5', '1', 'admin', '2', '5501', 'luoke', '1', '浴火凤凰凤凰发热同一日一日', '', '3', '1399344037', '2', '1', 'admin', 'Array', '1399344142', null, null, '涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('811', 'work', '2091', '3379', '5', '1', 'admin', '2', '5502', '洛克', '1', '让他一日一日一日', '', '4', '1399344090', '2', '1', 'admin', '屏蔽稿件', '1399344121', null, null, '重复交稿');
INSERT INTO keke_witkey_report VALUES ('812', 'work', '2094', '3380', '2', '1', 'admin', '2', '5504', '下线的下线', '1', '地方撒地方第三方斯蒂芬斯蒂芬', '', '4', '1399344520', '2', '1', 'admin', '取消中标，系统选稿', '1399344539', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('813', 'work', '2099', '3383', '5', '1', 'admin', '2', '5504', '下线的下线', '1', '刚认为刚发生的规范松德股份', '', '4', '1399345317', '2', '1', 'admin', '取消中标，系统选稿', '1399345327', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('814', 'work', '375', '3385', '2', '1', 'admin', '2', '5495', '小鸟', '1', '发送到发送到发送到发送到', '', '4', '1399346001', '2', '1', 'admin', '', '1399346017', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('815', 'task', '3385', '3385', '4', '5495', '小鸟', '1', '1', 'admin', '1', '三的发生的范德萨第三方', '', '4', '1399346046', '2', '1', 'admin', '', '1399346059', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('816', 'product', '1176', '1176', '2', '1', 'admin', '2', '5504', '下线的下线', '1', '发的撒发斯蒂芬是的发送到', '', '4', '1399346444', '2', '1', 'admin', '账号禁用', '1399346457', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('817', 'work', '377', '3387', '2', '1', 'admin', '2', '5495', '小鸟', '1', '斯蒂芬第三方的所发生的', '', '4', '1399346874', '2', '1', 'admin', '', '1399346883', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('818', 'task', '3387', '3387', '4', '5495', '小鸟', '1', '1', 'admin', '1', '发斯蒂芬斯蒂芬第三方', '', '3', '1399346903', '2', '1', 'admin', 'Array', '1399346914', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('819', 'work', '2102', '3388', '8', '1', 'admin', '2', '5501', 'luoke', '1', '恶方式发顺丰撒飞洒', '', '4', '1399347275', '2', '1', 'admin', '取消中标，系统选稿', '1399347292', null, null, '虚假交稿');
INSERT INTO keke_witkey_report VALUES ('820', 'work', '2106', '3390', '2', '1', 'admin', '2', '5504', '下线的下线', '1', '阿迪撒打算打算的阿萨德阿萨德安生的', '', '4', '1399348202', '2', '1', 'admin', '屏蔽稿件', '1399348216', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('821', 'work', '2109', '3389', '2', '1', 'admin', '2', '5495', '小鸟', '1', '范德萨发送到范德萨发生', '', '4', '1399348580', '2', '1', 'admin', '屏蔽稿件', '1399348593', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('822', 'work', '2108', '3389', '6', '1', 'admin', '2', '5495', '小鸟', '1', '给的额额 萨达的说法斯蒂芬是的发送到发的', '', '4', '1399348716', '1', '1', 'admin', '雇主（admin）分配：0.01元，威客（小鸟）分配：0元。', '1399348767', null, null, '威客（卖家）涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('823', 'work', '2106', '3390', '2', '5495', '小鸟', '1', '5504', '下线的下线', '1', '是的撒打算的撒旦撒的撒', '', '1', '1399349181', '2', null, null, null, null, null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('824', 'task', '3392', '3392', '6', '5495', '小鸟', '1', '1', 'admin', '1', '法第三方第三方第三方斯蒂芬', '', '1', '1399354804', '1', null, null, null, null, null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('825', 'task', '3396', '3396', '6', '5495', '小鸟', '2', '5495', '小鸟', '1', '撒旦啊大安生打算的阿萨德阿萨德，的撒的安生的撒的撒的啊。', '', '4', '1399356171', '1', '1', 'admin', '雇主（小鸟）分配：900元，威客（小鸟）分配：0元。', '1399356553', null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('826', 'task', '3397', '3397', '6', '1', 'admin', '2', '1', 'admin', '1', '的撒打算打算打算', '', '4', '1399357119', '1', '1', 'admin', '雇主（admin）分配：400元，威客（admin）分配：50元。', '1399357447', null, null, '雇主（买家）其它');
INSERT INTO keke_witkey_report VALUES ('827', 'product', '1175', '1175', '2', '5501', 'luoke', '2', '1', 'admin', '1', '我让我让我二温热污染', '', '3', '1399357937', '2', '1', 'admin', 'Array', '1399357958', null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('828', 'task', '3398', '3398', '2', '1', 'admin', '1', '5495', '小鸟', '1', 'were肉味儿肉味儿肉味儿热舞儿我', 'data/uploads/2014/05/06/13932296525368911ab6987.jpg', '3', '1399361821', '2', '1', 'admin', 'Array', '1399361988', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('829', 'work', '2115', '3398', '2', '5495', '小鸟', '2', '1', 'admin', '1', '发生地方的撒发斯蒂芬是的', 'data/uploads/2014/05/06/744638804536891e0d94ac.jpg', '4', '1399362019', '2', '1', 'admin', '屏蔽稿件', '1399362462', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('830', 'work', '2114', '3398', '2', '5495', '小鸟', '2', '1', 'admin', '1', '的撒旦撒爱上', '', '3', '1399362113', '2', '1', 'admin', 'Array', '1399362489', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('831', 'work', '2114', '3398', '2', '5504', '下线的下线', '1', '1', 'admin', '1', '发送到发送到发送到方式', '', '3', '1399362298', '2', '1', 'admin', 'Array', '1399362479', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('832', 'task', '3399', '3399', '2', '5495', '小鸟', '1', '1', 'admin', '1', '规范的鬼地方规定发鬼地方', '', '1', '1399362636', '2', null, null, null, null, null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('833', 'work', '2116', '3399', '2', '1', 'admin', '2', '5495', '小鸟', '1', '详细页的举报', '', '3', '1399362850', '2', '1', 'admin', 'Array', '1399362968', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('834', 'work', '2117', '3399', '2', '1', 'admin', '2', '5495', '小鸟', '1', '列表的待图片举报', 'data/uploads/2014/05/06/14174799035368953e74255.jpg', '4', '1399362886', '2', '1', 'admin', '屏蔽稿件', '1399362954', null, null, '虚假交稿');
INSERT INTO keke_witkey_report VALUES ('835', 'work', '2119', '3400', '2', '1', 'admin', '2', '5495', '小鸟', '1', '威武认为二位二位', 'data/uploads/2014/05/06/773269625536895e6f25f5.jpg', '1', '1399363052', '2', null, null, null, null, null, null, '重复交稿');
INSERT INTO keke_witkey_report VALUES ('836', 'work', '2118', '3400', '2', '1', 'admin', '2', '5495', '小鸟', '1', '第三方斯蒂芬是的发送到方式', '', '4', '1399363064', '2', '1', 'admin', '屏蔽稿件', '1399363102', null, null, '违规信息');
INSERT INTO keke_witkey_report VALUES ('837', 'work', '382', '3401', '2', '1', 'admin', '2', '5495', '小鸟', '1', '鬼地方规定发鬼地方个第三个', '', '1', '1399363172', '2', null, null, null, null, null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('838', 'work', '383', '3401', '2', '1', 'admin', '2', '5504', '下线的下线', '1', '味儿我二位二位二位吧 味儿', 'data/uploads/2014/05/06/1075510788536896f7a106c.jpg', '4', '1399363321', '2', '1', 'admin', '', '1399363331', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('839', 'work', '385', '3402', '2', '1', 'admin', '2', '5495', '小鸟', '1', '斯蒂芬第三方的所发生的', 'data/uploads/2014/05/06/11757623953689b5f492c3.jpg', '3', '1399364449', '2', '1', 'admin', 'Array', '1399518152', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('840', 'task', '3398', '3398', '6', '1', 'admin', '1', '5495', '小鸟', '1', '电饭锅地方个地方官发', 'data/uploads/2014/05/06/21979835953689fe0306ee.jpg', '1', '1399365602', '1', null, null, null, null, null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('841', 'task', '3403', '3403', '6', '5495', '小鸟', '1', '1', 'admin', '1', '我是威客，要要维权', 'data/uploads/2014/05/06/3085399235368a254ef001.jpg', '1', '1399366232', '1', null, null, null, null, null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('842', 'work', '2121', '3404', '6', '1', 'admin', '2', '5495', '小鸟', '1', '我是买家，我要维权', 'data/uploads/2014/05/06/346117155368a2f7b0d74.jpg', '4', '1399366394', '1', '1', 'admin', '雇主（admin）分配：90元，威客（小鸟）分配：0元。', '1399518132', null, null, '威客（卖家）涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('843', 'order', '1174', '80005321', 'ok', '5495', '小鸟', '2', '1', 'admin', '1', '是的撒是的范德萨发斯蒂芬是的', 'data/uploads/2014/05/06/19247727735368a878af8b6.jpg', '4', '1399367803', '1', '1', 'admin', '买家（小鸟）分配：120元，卖家（admin）分配：0元。', '1399367938', null, null, '涉嫌欺诈');
INSERT INTO keke_witkey_report VALUES ('844', 'order', '1173', '80005323', 'ok', '5495', '小鸟', '2', '1', 'admin', '1', '的说法发送到发送到发斯蒂芬斯蒂芬斯蒂芬是的', '', '4', '1399368704', '1', '1', 'admin', '买家（小鸟）分配：50元，卖家（admin）分配：0元。', '1399368902', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('845', 'order', '1161', '80005326', 'confirm_complete', '5495', '小鸟', '2', '1', 'admin', '1', '是的撒打算打算', 'data/uploads/2014/05/06/9207624265368aef02f0fd.jpg', '4', '1399369459', '1', '1', 'admin', '买家（小鸟）分配：200元，买家（admin）分配：0元。', '1399369489', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('846', 'order', '1161', '80005327', 'working', '1', 'admin', '1', '5495', '小鸟', '1', '地方所发生的斯蒂芬', 'data/uploads/2014/05/06/12537557025368af96543c3.jpg', '2', '1399369625', '1', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('847', 'order', '80005330', '1177', 'ok', '5495', '小鸟', '2', '1', 'admin', '1', '我要仲裁商品，子啊列表仲裁', 'data/uploads/2014/05/07/5448844825369ae31cbde1.jpg', '2', '1399434804', '1', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('848', 'task', '3406', '3406', '6', '5495', '小鸟', '1', '1', 'admin', '1', '法第三方但是发送到发是的发', 'data/uploads/2014/05/07/7263870985369cc766b43e.jpg', '4', '1399442552', '1', '1', 'admin', '雇主（admin）分配：900元，威客（小鸟）分配：0元。', '1399442586', null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('849', 'work', '387', '3407', '2', '1', 'admin', '2', '5495', '小鸟', '1', '温热热舞肉味儿为v发送到但是发送到方式', '', '4', '1399442733', '2', '1', 'admin', '', '1399518110', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('850', 'work', '387', '3407', '6', '1', 'admin', '2', '5495', '小鸟', '1', '特然他热太热特瑞特', '', '4', '1399442844', '1', '1', 'admin', '雇主（admin）分配：900元，威客（小鸟）分配：0元。', '1399518067', null, null, '威客（卖家）涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('851', 'work', '2062', '3361', '2', '5495', '小鸟', '1', '1', 'admin', '1', '地方发斯蒂芬斯蒂芬打算打算', 'data/uploads/2014/05/07/9535496785369d62e9195d.jpg', '3', '1399445041', '2', '1', 'admin', 'Array', '1399445060', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('852', 'work', '2061', '3361', '2', '5495', '小鸟', '1', '1', 'admin', '1', '说发斯蒂芬斯蒂芬斯蒂芬', '', '4', '1399445113', '2', '1', 'admin', '屏蔽稿件', '1399445122', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('853', 'task', '3410', '3410', '6', '5495', '小鸟', '1', '1', 'admin', '1', '盛大的撒旦撒旦', '', '4', '1399450359', '1', '1', 'admin', '雇主（admin）分配：90元，威客（小鸟）分配：0元。', '1399453651', null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('854', 'work', '2125', '3411', '8', '1', 'admin', '2', '5504', '下线的下线', '1', '发送到发送到发送到发送到发斯蒂芬斯蒂芬', '', '4', '1399453979', '2', '1', 'admin', '取消中标，系统选稿', '1399454040', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('855', 'work', '2129', '3413', '5', '1', 'admin', '2', '5504', '下线的下线', '1', '说范德萨范德萨方式地方斯蒂芬斯蒂芬是的', '', '4', '1399454453', '2', '1', 'admin', '取消中标，系统选稿', '1399454464', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('856', 'work', '2131', '3416', '2', '1', 'admin', '2', '5495', '小鸟', '1', '我要举报你', '', '4', '1399514499', '2', '1', 'admin', '取消中标，系统选稿', '1399518084', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('857', 'work', '2133', '3417', '5', '1', 'admin', '2', '5495', '小鸟', '1', '我要据八婆是的说法的说法是的方式的', '', '4', '1399514666', '2', '1', 'admin', '取消中标，系统选稿', '1399514716', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('858', 'order', '80005349', '1178', 'working', '1', 'admin', '1', '5501', 'luoke', '1', '欺诈欺诈欺诈欺诈欺诈欺诈', '', '2', '1399528116', '1', '0', '', '', '0', null, null, '涉嫌欺诈');
INSERT INTO keke_witkey_report VALUES ('859', 'order', '80005353', '1170', 'ok', '1', 'admin', '2', '5501', 'luoke', '1', '额外特瑞特热特特特', '', '2', '1399528603', '1', '0', '', '', '0', null, null, '滥发广告');
INSERT INTO keke_witkey_report VALUES ('860', 'work', '2134', '3419', '6', '1', 'admin', '2', '5501', 'luoke', '1', '若是放松放松发顺丰', '', '4', '1399529966', '1', '1', 'admin', '雇主（admin）分配：20元，威客（luoke）分配：70元。', '1399530003', null, null, '威客（卖家）涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('861', 'order', '80005356', '1166', 'ok', '5501', 'luoke', '2', '1', 'admin', '1', '发顺丰的发生的发生风', '', '2', '1399530780', '1', '0', '', '', '0', null, null, '威客（卖家）未按时完成工作');
INSERT INTO keke_witkey_report VALUES ('862', 'order', '80005368', '1170', 'ok', '5495', '小鸟', '2', '5501', 'luoke', '1', '我申请个维权看看', 'data/uploads/2014/05/09/1554413919536c895b99b67.jpg', '4', '1399621982', '1', '1', 'admin', '买家（小鸟）分配：50元，买家（luoke）分配：0元。', '1399622151', null, null, '威客（卖家）涉嫌抄袭');
INSERT INTO keke_witkey_report VALUES ('863', 'task', '3360', '3360', '6', '5502', '洛克', '1', '5504', '下线的下线', '1', '我要维权，请批准吧', 'data/uploads/2014/05/10/911312243536dc0fe94422.jpg', '2', '1399701763', '1', '0', '', '', '0', null, null, '雇主（买家）涉嫌作弊');
INSERT INTO keke_witkey_report VALUES ('864', 'order', '80005389', '1182', 'ok', '5495', '小鸟', '2', '1', 'admin', '1', '目目目目目目目目目目目h', '', '1', '1399710426', '1', null, null, null, null, null, null, '威客（卖家）要求追加赏金');
INSERT INTO keke_witkey_report VALUES ('865', 'order', '80005395', '1162', 'ok', '5501', 'luoke', '2', '5500', '艾仁', '1', 'ytu8rururur', '', '4', '1399857951', '1', '1', 'admin', '买家（luoke）分配：10元，卖家（艾仁）分配：140元。', '1399858001', null, null, '威客（卖家）涉嫌抄袭');

-- ----------------------------
-- Table structure for `keke_witkey_resource`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource`;
CREATE TABLE `keke_witkey_resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(20) DEFAULT NULL,
  `resource_url` varchar(100) DEFAULT NULL,
  `submenu_id` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`resource_id`),
  KEY `resource_id` (`resource_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_resource
-- ----------------------------
INSERT INTO keke_witkey_resource VALUES ('2', '支付接口', 'index.php?do=config&view=pay', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('173', '银行认证', 'index.php?do=auth&view=list&code=bank', '29', '0');
INSERT INTO keke_witkey_resource VALUES ('4', '用户流水', 'index.php?do=finance&view=all', '2', '2');
INSERT INTO keke_witkey_resource VALUES ('5', '提现审核', 'index.php?do=finance&view=withdraw', '2', '5');
INSERT INTO keke_witkey_resource VALUES ('7', '行业管理', 'index.php?do=task&view=industry', '5', '1');
INSERT INTO keke_witkey_resource VALUES ('10', '添加用户', 'index.php?do=user&view=add', '7', '1');
INSERT INTO keke_witkey_resource VALUES ('11', '用户管理', 'index.php?do=user&view=list', '7', '2');
INSERT INTO keke_witkey_resource VALUES ('12', '添加系统组', 'index.php?do=user&view=group_add&op=add', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('13', '系统组管理', 'index.php?do=user&view=group_list', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('14', '文章分类', 'index.php?do=article&view=cat_list&type=art', '9', '3');
INSERT INTO keke_witkey_resource VALUES ('155', '手动充值', 'index.php?do=user&view=charge', '2', '6');
INSERT INTO keke_witkey_resource VALUES ('16', '文章管理', 'index.php?do=article&view=list', '9', '1');
INSERT INTO keke_witkey_resource VALUES ('19', '系统日志', 'index.php?do=tool&view=log', '10', '4');
INSERT INTO keke_witkey_resource VALUES ('20', '更新缓存', 'index.php?do=tool&view=cache&sbt_edit=1&ckb_obj_cache=1&ckb_tpl_cache=1', '10', '7');
INSERT INTO keke_witkey_resource VALUES ('21', '附件管理', 'index.php?do=tool&view=file', '10', '5');
INSERT INTO keke_witkey_resource VALUES ('28', '模板管理', 'index.php?do=config&view=tpl', '12', '1');
INSERT INTO keke_witkey_resource VALUES ('152', '财务概况', 'index.php?do=finance&view=revenue', '2', '0');
INSERT INTO keke_witkey_resource VALUES ('30', '友情链接', 'index.php?do=tpl&view=ink', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('32', '广告管理', 'index.php?do=tpl&view=ad', '12', '4');
INSERT INTO keke_witkey_resource VALUES ('33', '用户组', 'index.php?do=user&view=custom_list', '7', '20');
INSERT INTO keke_witkey_resource VALUES ('34', '全局配置', 'index.php?do=config&view=basic&op=info', '1', '0');
INSERT INTO keke_witkey_resource VALUES ('35', '会员整合', 'index.php?do=config&view=integration', '1', '20');
INSERT INTO keke_witkey_resource VALUES ('36', '信誉规则', 'index.php?do=config&view=mark', '14', '1');
INSERT INTO keke_witkey_resource VALUES ('37', '模型管理', 'index.php?do=config&view=model', '1', '10');
INSERT INTO keke_witkey_resource VALUES ('38', '认证项目', 'index.php?do=auth&view=item_list', '29', '0');
INSERT INTO keke_witkey_resource VALUES ('40', '客服留言', 'index.php?do=task&view=custom', '371', '0');
INSERT INTO keke_witkey_resource VALUES ('41', '自定义导航', 'index.php?do=config&view=nav', '1', '100');
INSERT INTO keke_witkey_resource VALUES ('42', '帮助管理', 'index.php?do=article&view=list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('44', '帮助分类', 'index.php?do=article&view=cat_list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('46', '店铺主题', 'index.php?do=shop&view=banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('47', '添加主题', 'index.php?do=shop&view=edit_banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('49', '用户组', 'index.php?do=group', '22', '0');
INSERT INTO keke_witkey_resource VALUES ('53', '单页管理', 'index.php?do=article&view=list&type=single', '24', '0');
INSERT INTO keke_witkey_resource VALUES ('148', '汇率配置', 'index.php?do=config&view=currencies', '1', '100');
INSERT INTO keke_witkey_resource VALUES ('139', '购买记录', 'index.php?do=payitem&view=buy', '34', '1');
INSERT INTO keke_witkey_resource VALUES ('138', '服务项管理', 'index.php?do=payitem', '34', '0');
INSERT INTO keke_witkey_resource VALUES ('57', '动态管理', 'index.php?do=tpl&view=feed', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('58', '推广关系管理', 'index.php?do=prom&view=relation', '27', '5');
INSERT INTO keke_witkey_resource VALUES ('59', '推广配置管理', 'index.php?do=prom&view=config', '27', '1');
INSERT INTO keke_witkey_resource VALUES ('60', '推广素材管理', 'index.php?do=prom&view=item', '0', '2');
INSERT INTO keke_witkey_resource VALUES ('61', '推广财务管理', 'index.php?do=prom&view=event', '27', '6');
INSERT INTO keke_witkey_resource VALUES ('63', 'OAuth登录', 'index.php?do=msg&view=weibo', '28', '1');
INSERT INTO keke_witkey_resource VALUES ('70', '实名认证', 'index.php?do=auth&view=list&code=realname', '29', '3');
INSERT INTO keke_witkey_resource VALUES ('71', '邮箱认证', 'index.php?do=auth&view=list&code=email', '29', '4');
INSERT INTO keke_witkey_resource VALUES ('73', '短信模板', 'index.php?do=msg&view=internal', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('76', '充值审核', 'index.php?do=finance&view=recharge', '2', '4');
INSERT INTO keke_witkey_resource VALUES ('78', '互评配置', 'index.php?do=config&view=mark&op=config', '14', '2');
INSERT INTO keke_witkey_resource VALUES ('79', '互评记录', 'index.php?do=config&view=mark&op=log', '14', '3');
INSERT INTO keke_witkey_resource VALUES ('81', '交易举报', 'index.php?do=trans&view=report', '30', '2');
INSERT INTO keke_witkey_resource VALUES ('82', '投诉建议', 'index.php?do=user&view=suggest', '30', '3');
INSERT INTO keke_witkey_resource VALUES ('80', '交易维权', 'index.php?do=trans&view=rights', '30', '1');
INSERT INTO keke_witkey_resource VALUES ('133', '联盟API', 'index.php?do=keke&view=account', '33', '1');
INSERT INTO keke_witkey_resource VALUES ('134', '财务中心', 'index.php?do=keke&view=finance', '33', '2');
INSERT INTO keke_witkey_resource VALUES ('135', '推广站长', 'index.php?do=keke&view=getlist', '33', '3');
INSERT INTO keke_witkey_resource VALUES ('137', '雇主站长', 'index.php?do=keke&view=postlist', '33', '4');
INSERT INTO keke_witkey_resource VALUES ('154', '案例管理', 'index.php?do=case&view=list', '42', '0');
INSERT INTO keke_witkey_resource VALUES ('147', '企业认证', 'index.php?do=auth&view=list&code=enterprise', '29', '1');
INSERT INTO keke_witkey_resource VALUES ('153', '标签管理', 'index.php?do=tpl&view=taglist', '12', '0');
INSERT INTO keke_witkey_resource VALUES ('157', '网站介绍', 'index.php?do=article&view=list&type=about', '43', '2');
INSERT INTO keke_witkey_resource VALUES ('158', '', 'index.php?do=keke&view=prompub', '33', '5');
INSERT INTO keke_witkey_resource VALUES ('159', '推广管理', 'index.php?do=app&view=app_center', '44', '1');
INSERT INTO keke_witkey_resource VALUES ('163', '免费需求', 'index.php?do=app&view=task_list', '47', '1');
INSERT INTO keke_witkey_resource VALUES ('164', '免费服务', 'index.php?do=app&view=service_list', '47', '2');
INSERT INTO keke_witkey_resource VALUES ('165', '留言管理', 'index.php?do=app&view=message_list', '47', '3');
INSERT INTO keke_witkey_resource VALUES ('166', '动态管理', 'index.php?do=app&view=weibo_list', '47', '4');
INSERT INTO keke_witkey_resource VALUES ('167', '举报管理', 'index.php?do=app&view=denounce_list', '47', '5');
INSERT INTO keke_witkey_resource VALUES ('6', '网站收支', 'index.php?do=finance&view=budget', '2', '1');
INSERT INTO keke_witkey_resource VALUES ('170', '店铺管理', 'index.php?do=store&view=list', '49', '0');

-- ----------------------------
-- Table structure for `keke_witkey_resource_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource_submenu`;
CREATE TABLE `keke_witkey_resource_submenu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `submenu_name` varchar(20) DEFAULT NULL,
  `menu_name` varchar(10) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`submenu_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_resource_submenu
-- ----------------------------
INSERT INTO keke_witkey_resource_submenu VALUES ('1', '系统配置', 'config', '1', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('2', '财务模块', 'finance', '0', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('5', '行业技能', 'config', '2', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('7', '用户管理', 'user', '0', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('8', '系统组管理', 'user', '0', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('9', '文章模块', 'article', '2', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('10', '站长工具', 'tool', '1', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('12', '模板标签', 'tool', '2', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('14', '用户体系', 'user', '3', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('17', '帮助模块', 'article', '3', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('27', '推广营销', 'app', '3', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('28', '接口管理', 'config', '3', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('29', '认证管理', 'user', '4', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('30', '用户反馈', 'user', '4', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('42', '成功案例', 'article', '6', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('43', '关于网站', 'article', '1', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('49', '店铺管理', 'shop', '5', '1');
-- ----------------------------
-- Table structure for `keke_witkey_service`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service`;
CREATE TABLE `keke_witkey_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `indus_path` varchar(100) DEFAULT NULL,
  `cus_cate_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `unite_price` varchar(50) DEFAULT NULL,
  `service_time` int(255) DEFAULT NULL,
  `unit_time` varchar(50) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `pic` text,
  `ad_pic` varchar(200) DEFAULT NULL,
  `area_range` varchar(100) DEFAULT NULL,
  `key_word` varchar(50) DEFAULT NULL,
  `submit_method` char(20) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT NULL,
  `is_stop` int(11) DEFAULT '0',
  `sale_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `pay_item` char(20) DEFAULT NULL,
  `att_cash` decimal(10,2) DEFAULT '0.00',
  `refresh_time` int(11) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `total_sale` decimal(10,2) DEFAULT '0.00',
  `service_status` int(1) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `point` char(20) DEFAULT NULL,
  `city` char(20) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  `exist_time` int(11) DEFAULT NULL,
  `confirm_max` int(11) DEFAULT NULL,
  `seo_title` varchar(50) DEFAULT NULL,
  `seo_keyword` varchar(50) DEFAULT NULL,
  `seo_desc` text,
  `province` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `goodstop` int(11) DEFAULT '0',
  PRIMARY KEY (`service_id`),
  KEY `indus_id` (`indus_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=1184 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_service
-- ----------------------------
INSERT INTO keke_witkey_service VALUES ('1160', '6', null, '81', '1', 'admin', '10', '408', '2', null, null, '二维码网站建设', '100.00', '个', null, null, null, 'data/uploads/2014/04/28/1915779478535dc0e54de34.jpg,data/uploads/2014/04/28/1390471015535dc0fd4a685.jpg,data/uploads/2014/04/28/1659851306535dc1273decc.jpg,data/uploads/2014/04/28/284049414535dc127761cd.jpg', null, null, null, 'outside', null, '可以批量生成二维码，并可以在后台找到指定二维码并修改内容。可做该网站商业码所有功能，请登录试用体验。可以创建个人账户管理自己的二维码并修改内容。', '1398653233', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000039;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1161', '7', null, '81', '1', 'admin', '20', '356', '350', null, null, '包装袋设计', '500.00', '个', '3', '天', null, 'data/uploads/2014/04/28/1227267329535dc1e171dfb.png', null, null, null, null, null, '●收费标准：本类设计费用500元/款。 ●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。●具体需求项目可在线沟通商定。◆设计中途如果更改设计内容及名称则视为二次设计◇您需要在设计前，确定好设计内容及名称。◇确定您对本次设计的想法及要求。◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '1398653426', '0', '3', '0', '6', '0', '0', null, '0.00', null, null, '1120.00', '1', '1', null, null, 'a:1:{s:3:\"top\";i:1000000009;}', '1399478400', '2', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1162', '6', null, '408', '5500', '艾仁', '10', '144', '3', null, null, '银器银制礼品设计', '150.00', '件', null, null, null, 'data/uploads/2014/04/28/1670392269535e1410e487d.jpg,data/uploads/2014/04/28/1108706269535e14113a2c2.jpg,data/uploads/2014/04/28/742453164535e14116e679.jpg', null, null, null, 'outside', null, '1.  设计种类：产品设计    2.  用途：礼品（礼赠）    3.  设计内容：银条 / 银币 / 银章 / 工艺品（设计师可四选一设计，进行投稿）    4.  材质界定：银材质 / 可搭配其他材质（因后期生产需要）    5.  设计主题： 甲午马年主题    6.  设计风格：典雅大器   融入中国风元素   符合礼品条件', '1398674464', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000021;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1163', '7', null, '408', '5500', '艾仁', '20', '325', '121', null, null, '开发静态页面设计新网站', '1000.00', '件', '10', '天', null, null, null, null, null, null, null, '一、网站开发：交友类、论坛社区类、门户站、资讯类、商城类、企业类等各种网站定制开发。二、安卓开发：各类安卓手机和平板应用研发定制。三、iOS开发：iphone、ipad各类软件定制开发。 四、WP开发：wp8各类软件定制开发', '1398674877', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000270;}', '1403107200', '2', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1164', '6', null, '408', '5500', '艾仁', '10', '163', '160', null, null, '公司名称起名', '100.00', '个', null, null, null, 'data/uploads/2014/04/28/1869260173535e1642e3efb.jpg', null, null, null, 'outside', null, '专业起名，有上千好名等您挑选名称响亮，易记，文雅，有创意但不失稳重;', '1398675018', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000113;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1165', '7', null, '408', '5500', '艾仁', '20', '252', '249', null, null, '游戏评测报告', '150.00', '个', '1', '天', null, 'data/uploads/2014/04/28/2024200519535e1690d35ef.jpg,data/uploads/2014/04/28/1000612080535e1697d88a4.jpg', null, null, null, null, null, '专业玩家，玩过很多游戏，写过很多攻略，对网友有独特的认识，能给您提供最好的测试评价报告', '1398675113', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000030;}', '1403625600', '2', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1166', '6', null, '81', '1', 'admin', '10', '326', '121', null, null, '设计管理平台（页面改造）', '220.00', '个', null, null, null, 'data/uploads/2014/04/28/628000498535e19feacd72.png,data/uploads/2014/04/28/1781514201535e19ff2c487.jpg,data/uploads/2014/04/28/554099864535e19ff8b130.jpg,data/uploads/2014/04/28/766044630535e1a00f05d9.jpg,data/uploads/2014/04/28/1524310709535e1a0192069.jpg', null, null, null, 'outside', null, '做过多次这样的项目，有案例可供参考，欢迎购买', '1398675976', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000014;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1167', '6', null, '403', '5495', '小鸟', '10', '131', '3', null, null, '设计高考升学宴祝贺卡片', '50.00', '个', null, null, null, 'data/uploads/2014/04/28/228068524535e1b035e107.jpg,data/uploads/2014/04/28/1110061010535e1b03aa04c.jpg,data/uploads/2014/04/28/593987602535e1b03e9caa.jpg,data/uploads/2014/04/28/77482332535e1b0439c26.jpg|data/uploads/2014/04/28/1496730930535e1c101c76c.jpg', null, null, null, 'outside', '', '一年一度的高考即将来临，在我地有子女考上大学请客的习俗。我是经营酒店的，可以承接大型中餐宴席，我需制作对高考金榜题名的考生祝贺同事引导其来酒店办升学宴的贺卡。同时开展促销活动：凡在我酒店举办升学宴的，均可获得知名品牌旅行包一个或（可在酒店餐饮、客房、茶坊等部门消费）. 酒店名称：安阁瑞大酒店 订餐热线：6269996 8027666 卡片大小：A4，双面都有内容 祝贺内容：预留 XXXX同学，然后是正文 卡片上最好有图片，体现学生成才的', '1398676233', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '50.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000198;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1168', '7', null, '403', '5495', '小鸟', '20', '242', '240', null, null, '找一个熟悉“方维”系统的程序员长期合作', '100.00', '次', '10', '小时', null, null, null, null, null, null, null, '如题，手里很多单子的，忙不过来，找一个熟悉方维系统的程序员，要有经验，易沟通，必须是在重庆，便于交流。', '1398676386', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000036;}', '1413302400', '2', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1170', '7', null, '409', '5501', 'luoke', '20', '12', '3', null, null, '手绘鞋定制手绘T恤定制', '100.00', '个', '7', '天', null, 'data/uploads/2014/04/30/17855050015360637ebbf41.jpg,data/uploads/2014/04/30/18675817975360637fee511.jpg,data/uploads/2014/04/30/5507712425360638330499.jpg,data/uploads/2014/04/30/161834771053606385e01b4.jpg', null, null, null, null, null, '<p>手绘鞋定制手绘T恤定制</p><p>可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。</p>', '1398825905', '0', '2', '0', '4', '0', '0', null, '0.00', null, null, '200.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000001025;}', '1401379200', '2', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1171', '6', null, '409', '5501', 'luoke', '10', '208', '201', null, null, '女生节妇女节必备礼物', '100.00', '个', null, null, null, 'data/uploads/2014/04/30/189385801553606c945e75e.jpg,data/uploads/2014/04/30/24869494353606c980f280.jpg,data/uploads/2014/04/30/194097185653606c9b4ce94.jpg', null, null, null, 'inside', 'data/uploads/2014/04/30/181638899553606cd295ad7.rar', '知道明天是啥日子么？如果你不记得的话，别怪没提醒你，你女朋友会生气的。知道后天是啥日子么？别怪没提醒你，你麻麻会伤心的。女生节+妇女节，知道要送啥礼物么？看看下面几款非常漂亮的叉子手镯吧，我觉得只要是女生，一般都会喜欢的。', '1398828252', '0', '3', '0', '6', '2', '0', null, '0.00', null, null, '300.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000046;}', null, '1', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1172', '6', null, null, '5500', '艾仁', '10', '145', '3', null, null, '编辑的稿件变成商品咯', '100.00', null, null, null, null, 'data/uploads/2014/04/30/172019608053606ff162f22.jpg', null, null, null, null, null, '按钮图标设计', '1398829046', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '3', '0', null, null, null, null, null, null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1173', '6', null, '81', '1', 'admin', '10', '202', '201', null, null, '制作生日贺卡', '50.00', '个', null, null, null, 'data/uploads/2014/04/30/7256277015360cad96b7f7.jpg', null, null, null, 'outside', null, '&lt;p&gt;要求：&lt;/p&gt;&lt;p&gt;&lt;span style=\"color:#FF0000;\"&gt;&lt;strong&gt;我女朋友的生日要到了，征集贺卡，自己制作，并送上自己的祝福。然后寄到我女朋友的公司。&lt;br /&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;', '1398830285', '0', '3', '0', '6', '0', '0', null, '0.00', null, null, '150.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000024;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1176', '6', null, null, '5504', '下线的下线', '10', '204', '201', null, null, '编辑为商品的稿件s', '100.00', '个', null, null, null, 'data/uploads/2014/05/06/2136376209536854cfe6a8e.jpg', null, null, null, 'inside', 'data/uploads/2014/05/06/1607711387536854e296d14.zip', '地方三的发生的范德萨发送到的撒发斯蒂芬是的', '1399346406', '0', '4', '0', '8', '0', '0', null, '0.00', null, null, '400.00', '2', '1', null, null, null, null, null, null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1174', '6', null, '81', '1', 'admin', '10', '351', '350', null, null, '图片美工处理', '120.00', '个', null, null, null, 'data/uploads/2014/04/30/1657671057536084d30cbec.jpg', null, null, null, 'inside', 'data/uploads/2014/04/30/1387290036536084eb2e4ee.zip', '擅长处理老旧照片，还原色彩，美化等功能，期待与您的合作', '1398834431', '0', '3', '0', '6', '1', '0', null, '0.00', null, null, '360.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000029;}', null, '1', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1175', '6', null, null, '1', 'admin', '10', '34', '2', null, null, '新编辑的商品', '100.00', null, null, null, null, 'data/uploads/2014/04/30/3074847645360ca37a81c3.jpg', null, null, null, null, null, '我要出售这个商品，是我的稿件', '1398852155', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '0', null, null, null, null, null, null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1177', '6', null, '81', '1', 'admin', '10', '205', '201', null, null, '求新年祝福的短信', '101.00', '个', null, null, null, 'data/uploads/2014/05/07/9280396455369aa7982eee.jpg', null, null, null, 'outside', null, '求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信求新年祝福的短信', '1399433858', '0', '3', '0', '6', '0', '0', null, '0.00', null, null, '303.00', '2', '1', null, null, 'a:1:{s:3:\"top\";i:1000000018;}', null, '1', '', '', '', null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1178', '7', null, '81', '1', 'admin', '20', '151', '335', null, null, '展会设计师', '100.00', '个', '10', '小时', null, null, null, null, null, null, null, '展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师', '1399434226', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000023;}', '1403712000', '2', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1179', '7', null, '409', '5501', 'luoke', '20', '202', '201', null, null, '【趣味服务】写对联(藏头、抒情），用对联表白，祝福', '100.00', '个', '7', '小时', null, null, null, null, null, null, null, '<span style=\"color:#**;\">你只需将你的大概情况说明，提供相关的情景,或相关的名字，<br />我总能顺景生情，写成藏头、抒情对联，让你会心一笑，开心买单！<br /></span><br /><span style=\"color:#**;\">比如下面这几副,就有藏头形式,,,和抒情形式:</span><br /><span style=\"color:#**;\"></span><br /><span style=\"color:#**;\">日省吾身常思学问须趁早,</span><br /><span style=\"color:#**;\">阅览群书多添品德好成才</span><br /><span style=\"color:#**;\"><br /></span><span style=\"color:#**;\">倩影翩翩至,</span><br /><span style=\"color:#**;\">颖慧满满来!</span>', '1399531151', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000024;}', '1400774400', '2', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1180', '6', null, '81', '1', 'admin', '10', '229', '218', null, null, '作品作品作品作品作品作品作品作品作品', '100.00', '个', null, null, null, 'data/uploads/2014/05/10/1306460666536d847aad538.jpg', null, null, null, 'outside', null, '作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品作品', '1399686269', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000514;}', null, '1', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1181', '7', null, '81', '1', 'admin', '20', '203', '201', null, null, '服务服务服务服务服务服务', '100.00', '个', '10', '小时', null, null, null, null, null, null, null, '服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务服务', '1399686312', '0', '0', '0', '0', '0', '0', null, '0.00', null, null, '0.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000474;}', '1400774400', '2', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1182', '7', null, '81', '1', 'admin', '20', '96', '249', null, null, '的范德萨发生的', '100.00', '个', '10', '小时', null, null, null, null, null, null, null, '的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的', '1399707209', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '0', null, null, 'a:1:{s:3:\"top\";i:1000000022;}', '1403712000', '2', null, null, null, null, null, '0');
INSERT INTO keke_witkey_service VALUES ('1183', '6', null, null, '4', '注册', '10', '48', '3', null, null, '我编辑了个作品销售', '100.00', '件', null, null, null, 'data/uploads/2014/05/12/1248435235370942e387ae.jpg', null, null, null, 'inside', 'data/uploads/2014/05/12/46786230553709449227dc.zip', '我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售我编辑了个作品销售', '1399886924', '0', '1', '0', '2', '0', '0', null, '0.00', null, null, '100.00', '2', '0', null, null, null, null, null, null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for `keke_witkey_service_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service_order`;
CREATE TABLE `keke_witkey_service_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '服务订单ID',
  `uid` int(11) unsigned NOT NULL COMMENT '买家ID',
  `username` varchar(100) DEFAULT NULL COMMENT '买家用户名',
  `service_id` int(11) unsigned NOT NULL COMMENT '购买服务的ID',
  `order_id` int(11) unsigned NOT NULL COMMENT '购买服务产生的订单的ID',
  `title` varchar(255) NOT NULL COMMENT '购买服务的标题，也可能是编辑过的标题',
  `indus_pid` int(11) unsigned NOT NULL COMMENT '购买服务的类型的父分类，也可能是编辑过父分类',
  `indus_id` int(11) unsigned NOT NULL COMMENT '购买服务的类型的子分类，也可能是编辑过子分类',
  `content` text NOT NULL COMMENT '购买服务的详细需求，也可能是编辑过的详细需求',
  `file_ids` varchar(100) NOT NULL COMMENT '购买服务上传的需求附件ids',
  `price` decimal(10,2) unsigned NOT NULL COMMENT '购买服务的需求预算',
  `workfile` varchar(100) DEFAULT NULL COMMENT '卖家工作完成上传的附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_service_order
-- ----------------------------
INSERT INTO keke_witkey_service_order VALUES ('5', '5470', '小鸟', '1161', '80005210', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 \n●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。\n●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。\n●具体需求项目可在线沟通商定。\n◆设计中途如果更改设计内容及名称则视为二次设计\n◇您需要在设计前，确定好设计内容及名称。\n◇确定您对本次设计的想法及要求。\n◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。\n我要加一条要求，看显示不显示。', '', '450.00', null);
INSERT INTO keke_witkey_service_order VALUES ('6', '5495', '小鸟', '1161', '80005211', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 \n●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。\n●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。\n●具体需求项目可在线沟通商定。\n◆设计中途如果更改设计内容及名称则视为二次设计\n◇您需要在设计前，确定好设计内容及名称。\n◇确定您对本次设计的想法及要求。\n◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。\n再来买一次', '5571,5572', '450.00', '0,5573');
INSERT INTO keke_witkey_service_order VALUES ('7', '5495', '小鸟', '1161', '80005212', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 \n●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。\n●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。\n●具体需求项目可在线沟通商定。\n◆设计中途如果更改设计内容及名称则视为二次设计\n◇您需要在设计前，确定好设计内容及名称。\n◇确定您对本次设计的想法及要求。\n◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '', '400.00', null);
INSERT INTO keke_witkey_service_order VALUES ('8', '5495', '小鸟', '1161', '80005213', '包装袋设计啊', '350', '356', '●收费标准：本类设计费用500元/款。 \n●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。\n●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。\n●具体需求项目可在线沟通商定。\n◆设计中途如果更改设计内容及名称则视为二次设计\n◇您需要在设计前，确定好设计内容及名称。\n◇确定您对本次设计的想法及要求。\n◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '', '400.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('9', '1', 'admin', '1168', '80005242', '找一个熟悉“方维”系统的程序员长期合作', '240', '242', '如题，手里很多单子的，忙不过来，找一个熟悉方维系统的程序员，要有经验，易沟通，必须是在重庆，便于交流。', '', '100.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('10', '5495', '小鸟', '1161', '80005257', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 \n●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。\n●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。\n●具体需求项目可在线沟通商定。\n◆设计中途如果更改设计内容及名称则视为二次设计\n◇您需要在设计前，确定好设计内容及名称。\n◇确定您对本次设计的想法及要求。\n◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '', '120.00', '0,5634');
INSERT INTO keke_witkey_service_order VALUES ('11', '1', 'admin', '1170', '80005312', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '100.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('12', '5495', '小鸟', '1161', '80005326', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 ●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。●具体需求项目可在线沟通商定。◆设计中途如果更改设计内容及名称则视为二次设计◇您需要在设计前，确定好设计内容及名称。◇确定您对本次设计的想法及要求。◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '', '200.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('13', '5495', '小鸟', '1161', '80005327', '包装袋设计', '350', '356', '●收费标准：本类设计费用500元/款。 ●初稿时间：设计时间一般为3-5天。不满意可重新设计，满意为止。●合作流程：联系金蕾 阐述需求--雇佣金蕾 托管赏金--提交初稿 反馈意见--确认稿件 付款好评--提交源档 合作愉快。●具体需求项目可在线沟通商定。◆设计中途如果更改设计内容及名称则视为二次设计◇您需要在设计前，确定好设计内容及名称。◇确定您对本次设计的想法及要求。◇如果中途改变内容及名称或者要求的，需要加收一定服务费用，具体可与客服协商。', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('14', '1', 'admin', '1170', '80005346', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '100.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('15', '5501', 'luoke', '1178', '80005349', '展会设计师', '335', '151', '展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师的萨芬撒飞洒飞洒发顺丰', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('16', '5501', 'luoke', '1178', '80005351', '展会设计师', '335', '151', '展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('17', '5501', 'luoke', '1178', '80005352', '展会设计师', '335', '151', '展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师展会设计师', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('18', '1', 'admin', '1170', '80005353', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('19', '1', 'admin', '1179', '80005359', '【趣味服务】写对联(藏头、抒情），用对联表白，祝福', '201', '202', '&lt;span style=\"color:#**;\"&gt;你只需将你的大概情况说明，提供相关的情景,或相关的名字，&lt;br /&gt;我总能顺景生情，写成藏头、抒情对联，让你会心一笑，开心买单！&lt;br /&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;比如下面这几副,就有藏头形式,,,和抒情形式:&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;日省吾身常思学问须趁早,&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;阅览群书多添品德好成才&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;span style=\"color:#**;\"&gt;倩影翩翩至,&lt;/span&gt;&lt;br /&gt;&lt;span style=\"color:#**;\"&gt;颖慧满满来!&lt;/span&gt;', '', '100.00', '0');
INSERT INTO keke_witkey_service_order VALUES ('20', '1', 'admin', '1170', '80005366', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('21', '1', 'admin', '1170', '80005367', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('22', '5495', '小鸟', '1170', '80005368', '手绘鞋定制手绘T恤定制', '3', '12', '&lt;p&gt;手绘鞋定制手绘T恤定制&lt;/p&gt;&lt;p&gt;可以自己提供图案我们这边进行制作，也可以直接由我们进行设计。&lt;/p&gt;', '', '50.00', null);
INSERT INTO keke_witkey_service_order VALUES ('23', '5501', 'luoke', '1181', '80005374', '服务服务服务服务服务服务', '201', '203', 'fhggfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '', '100.00', null);
INSERT INTO keke_witkey_service_order VALUES ('24', '1', 'admin', '1163', '80005378', '开发静态页面设计新网站', '121', '325', '一、网站开发：交友类、论坛社区类、门户站、资讯类、商城类、企业类等各种网站定制开发。二、安卓开发：各类安卓手机和平板应用研发定制。三、iOS开发：iphone、ipad各类软件定制开发。 四、WP开发：wp8各类软件定制开发', '', '1000.00', null);
INSERT INTO keke_witkey_service_order VALUES ('25', '5495', '小鸟', '1182', '80005389', '的范德萨发生的', '249', '96', '的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的', '', '50.00', null);
INSERT INTO keke_witkey_service_order VALUES ('26', '5500', '艾仁', '1182', '80005391', '的范德萨发生的', '249', '96', '的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的的范德萨发生的', '', '100.00', '0');

-- ----------------------------
-- Table structure for `keke_witkey_session`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_session`;
CREATE TABLE `keke_witkey_session` (
  `session_id` char(100) NOT NULL,
  `session_expirse` int(10) DEFAULT NULL,
  `session_data` text,
  `session_ip` char(15) DEFAULT NULL,
  `session_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_session
-- ----------------------------
INSERT INTO keke_witkey_session VALUES ('49iv6jo54gdiu2ro0bhutpsbu6', '1393819808', 'currency|s:3:\"CNY\";', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for `keke_witkey_shop`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop`;
CREATE TABLE `keke_witkey_shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `shop_type` int(1) DEFAULT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `service_range` varchar(50) DEFAULT NULL,
  `shop_desc` text,
  `work` varchar(100) DEFAULT NULL,
  `work_year` int(2) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `shop_background` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `banner` text,
  `shop_slogans` varchar(255) DEFAULT NULL,
  `shop_skin` char(20) DEFAULT NULL,
  `shop_backstyle` varchar(255) DEFAULT NULL,
  `shop_font` char(20) DEFAULT NULL,
  `shop_active` char(20) DEFAULT NULL,
  `is_close` int(1) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  `homebanner` text,
  `on_sale` int(5) DEFAULT '0',
  `shop_status` int(11) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `seo_title` varchar(50) DEFAULT NULL,
  `seo_keyword` varchar(50) DEFAULT NULL,
  `seo_desc` text,
  PRIMARY KEY (`shop_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=440 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_shop
-- ----------------------------
INSERT INTO keke_witkey_shop VALUES ('81', '1', 'admin', '2', 'ADMIN的店铺111', null, '&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;&lt;span style=\"color:#6d6d6d;\"&gt;&lt;span style=\"font-family:微软雅黑, Arial, Helvetica, sans-serif;\"&gt;风大哥地方规范的规定非多少分四大发生反对反对反对反对双方的是否&lt;/span&gt;&lt;/span&gt;11122&lt;br /&gt;', null, null, null, null, null, 'data/uploads/2013/08/06/246415200c4523f0b8.gif', 'ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺ADMIN的店铺77777777', 'default', 'a:3:{s:6:\"repeat\";s:8:\"repeat-x\";s:6:\"scroll\";s:5:\"fixed\";s:8:\"position\";s:8:\"left top\";}', null, null, null, '175', '0', '1369208527', 'a:7:{s:2:\"sy\";s:45:\"data/uploads/2013/04/09/3270516403f447681.jpg\";s:4:\"gsjs\";s:41:\"tpl/default/img/enterprise/banner_img.jpg\";s:4:\"qycy\";s:42:\"tpl/default/img/enterprise/qycy_banner.jpg\";s:4:\"xgrw\";s:40:\"tpl/default/img/enterprise/rw_banner.jpg\";s:4:\"spzs\";s:40:\"tpl/default/img/enterprise/sp_banner.jpg\";s:4:\"cgal\";s:41:\"tpl/default/img/enterprise/suc_banner.jpg\";s:4:\"gstj\";s:42:\"tpl/default/img/enterprise/gstj_banner.jpg\";}', '290', '1', 'yangjuankeke', 'ADMIN的店铺ADMIN的555', 'ADMIN的店铺ADMIN的店66666', 'ADMIN的店铺ADMIN的店777');
INSERT INTO keke_witkey_shop VALUES ('439', '5528', '扬破帆逐美梦', '1', '扬破帆逐美梦', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('438', '5527', '我爱小护士', '1', '我爱小护士', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('437', '5526', '女老板好狠', '1', '女老板好狠', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('436', '5525', '同步', '1', '同步', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('435', '5', '账号同步测试', '1', '账号同步测试', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('434', '4', '注册', '1', '注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('433', '3', '测试注册', '1', '测试注册', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('432', '2', '考霸', '1', '考霸', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('431', '5523', '扬帆逐梦', '1', '扬帆逐梦', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('430', '5522', 'qwerty678', '1', 'qwerty678', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('429', '5521', 'wang1982', '1', 'wang1982', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('428', '5520', '咯咯', '1', '咯咯', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('427', '5519', '卡卡', '1', '卡卡', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('426', '5518', '五月天', '1', '五月天', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('425', '5517', '想玲', '1', '想玲', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('424', '5516', '奈客', '1', '奈客', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('416', '5508', '安德敏的下线', '1', '安德敏的下线', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('415', '5507', '推广下线', '1', '推广下线', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('414', '5506', 'shangk2', '1', 'shangk2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('413', '5505', 'shangk1', '2', 'shangk1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('412', '5504', '下线的下线', '2', '下线的下线', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('411', '5503', '下线', '2', '下线', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('410', '5502', '洛克', '1', '洛克', null, null, null, null, null, 'data/uploads/2014/05/10/876449918536dc1ad2cd1d.jpg', null, null, null, null, 'a:1:{s:8:\"position\";s:8:\"left top\";}', null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('409', '5501', 'luoke', '1', 'luoke', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '4', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('408', '5500', '艾仁', '1', '艾仁', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '4', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('407', '5499', '七星设计', '1', '七星设计', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('406', '5498', 'shangk', '1', 'MR.TABLE', null, null, null, null, null, 'data/uploads/2014/04/28/779614576535e1d338930d.jpg', null, 'data/uploads/2014/04/28/275037804535e1d18f3ecb.jpg', '累么。累就对了，舒服是留给死人的', null, 'a:2:{s:8:\"position\";s:8:\"left top\";s:6:\"repeat\";s:8:\"repeat-x\";}', null, null, null, '0', '0', null, null, '0', '1', null, 'MR.TABLE', 'MR.TABLE', 'MR.TABLE');
INSERT INTO keke_witkey_shop VALUES ('405', '5497', 'shangk', '1', 'shangk', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('404', '5496', 'shangk', '1', 'shangk', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);
INSERT INTO keke_witkey_shop VALUES ('403', '5495', '小鸟', '1', '小鸟', null, null, null, null, null, null, null, null, '我是一只小鸟，只能翱翔在天际', null, null, null, null, null, '0', '0', null, null, '2', '1', null, '', '', '');
INSERT INTO keke_witkey_shop VALUES ('402', '5494', 'hahapa', '1', 'hahapa', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_shop_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_case`;
CREATE TABLE `keke_witkey_shop_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `case_type` int(1) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `case_name` varchar(100) DEFAULT NULL,
  `case_desc` text,
  `case_pic` varchar(100) DEFAULT NULL,
  `case_url` varchar(200) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_shop_case
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shortcuts`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shortcuts`;
CREATE TABLE `keke_witkey_shortcuts` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `resource_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=319 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_shortcuts
-- ----------------------------
INSERT INTO keke_witkey_shortcuts VALUES ('313', '1', '20');
INSERT INTO keke_witkey_shortcuts VALUES ('314', '1', '38');

-- ----------------------------
-- Table structure for `keke_witkey_space`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_space`;
CREATE TABLE `keke_witkey_space` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sec_code` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_pic` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `isvip` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_type` varchar(50) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `marry` char(10) DEFAULT NULL,
  `hometown` char(10) DEFAULT NULL,
  `residency` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `truename` char(20) DEFAULT NULL,
  `idcard` varchar(20) DEFAULT NULL,
  `idpic` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `msn` varchar(50) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `skill_ids` varchar(150) DEFAULT NULL,
  `summary` text,
  `experience` text,
  `reg_time` int(11) DEFAULT NULL,
  `reg_ip` varchar(20) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `credit` decimal(11,3) DEFAULT '0.000',
  `balance` decimal(11,3) DEFAULT '0.000',
  `balance_status` int(11) DEFAULT NULL,
  `pub_num` int(11) DEFAULT '0',
  `take_num` int(11) DEFAULT '0',
  `nominate_num` int(11) DEFAULT '0',
  `accepted_num` int(11) DEFAULT '0',
  `vip_start_time` int(11) DEFAULT NULL,
  `vip_end_time` int(11) DEFAULT NULL,
  `pay_zfb` varchar(100) DEFAULT NULL,
  `pay_cft` varchar(100) DEFAULT NULL,
  `pay_bank` text,
  `score` int(11) DEFAULT NULL,
  `buyer_credit` int(11) DEFAULT '0',
  `buyer_good_num` int(11) DEFAULT '0',
  `buyer_level` text,
  `buyer_total_num` int(11) DEFAULT '0',
  `seller_credit` int(11) DEFAULT '0',
  `seller_good_num` int(11) DEFAULT '0',
  `seller_level` text,
  `seller_total_num` int(11) DEFAULT '0',
  `studio_id` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT '0',
  `client_status` char(10) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `union` tinyint(1) DEFAULT '0',
  `union_assoc` tinyint(1) DEFAULT '0',
  `union_rid` tinyint(1) DEFAULT '0',
  `union_user` varchar(100) DEFAULT NULL,
  `province` int(11) DEFAULT '0',
  `city` int(11) DEFAULT '0',
  `area` int(11) DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5529 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_space
-- ----------------------------
INSERT INTO keke_witkey_space VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'eab30216d5ec03add0a2258be8eb1adb', '760573252@qq.com', '2', '1', '1', '1', '2', '男', '0', '0', '1,40,592', 'dsfdsjfdsfdsfds', '1989-03-03', '超级管理员', '123456789987987987', '0', '654654', 'adfasdfasfdasfd@qq.com', '027-88888888', '027-99999999', '15007141883', '204', '201', 'OpenGL编程,给对方锅底,别热不热别热播热不热vb', '哈哈哈哈哈哈哈和哈哈哈哈哈，是多少级打火机撒发生的就发多少发送的地方圣达菲第三方圣达菲是的发生的发生的飞圣达菲圣达菲圣达菲但是但是发生的', '55啊啊啊啊啊啊啊啊啊啊啊', '1306266767', '127.0.0.1', '0', '1745.500', '2241131.910', '0', '2228', '633', '8', '172', '0', '0', '0', '0', '0', '2945', '348618', '911', 'a:8:{s:8:\"score_id\";s:1:\"6\";s:5:\"value\";i:348618;s:5:\"title\";s:12:\"六级雇主\";s:5:\"level\";i:6;s:8:\"level_up\";s:1:\"0\";s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:6:\"100.00\";s:3:\"pic\";s:162:\"<img src=\"data/uploads/sys/mark/188574f3b088a50adf.gif?fid=2076\" align=\"absmiddle\" title=\"头衔 ：六级雇主&#13;&#10;信誉值：348618&#13;&#10;等级：6\">\";}', '1031', '55166', '236', 'a:8:{s:8:\"score_id\";s:1:\"6\";s:5:\"value\";i:55166;s:5:\"title\";s:12:\"六级威客\";s:5:\"level\";i:6;s:8:\"level_up\";s:1:\"0\";s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:6:\"100.00\";s:3:\"pic\";s:160:\"<img src=\"data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077\" align=\"absmiddle\" title=\"头衔 ：六级威客&#13;&#10;能力值：55166&#13;&#10;等级：6\">\";}', '251', '0', '1399944973', 'offline', '1', null, '0', '0', null, '27', '438', '4669');
INSERT INTO keke_witkey_space VALUES ('5528', '扬破帆逐美梦', '14e1b600b1fd579f47433b88e8d85291', 'a3c7a8316d446dfdf8902e2f2f154c38', 'yangfanzhumeng@163.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399884682', '27.17.25.231', null, '0.000', '0.000', null, '0', '11', '0', '3', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399884682', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5527', '我爱小护士', '14e1b600b1fd579f47433b88e8d85291', '500666c3db3eba70867e113faa477e91', 'hushi@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399884358', '27.17.25.231', null, '0.000', '999100.000', null, '1', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399884577', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5526', '女老板好狠', 'e10adc3949ba59abbe56e057f20f883e', '1d5e300462539e532f20caeaa641aa3c', '65987@163.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399878988', '27.17.25.231', null, '0.000', '0.010', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399886352', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5525', '同步', 'e10adc3949ba59abbe56e057f20f883e', '8fae5b2a739fb5771cbf9f01838ea6ed', '1569854@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399878578', '27.17.25.231', null, '0.000', '0.010', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399883340', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5524', '账号同步测试', 'e10adc3949ba59abbe56e057f20f883e', 'e5d10a63b9823217d7e9b524f24f34c9', 'lihangkeke@163.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399877926', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399877926', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('4', '注册', 'e10adc3949ba59abbe56e057f20f883e', '9c035a2779d6483552b6fff20f26139c', '123554545@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '网站模板', null, null, '1399877493', '27.17.25.231', null, '0.000', '170.000', null, '0', '15', '0', '6', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399886165', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('3', '测试注册', 'e10adc3949ba59abbe56e057f20f883e', 'c8b6e097b87716c24ea6c546470e0805', '659865@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399877390', '27.17.25.231', null, '0.000', '0.000', null, '0', '1', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399880322', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('2', '考霸', 'e10adc3949ba59abbe56e057f20f883e', '0438003a356febb0ca6cd9d55f422b6e', '25487@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399877201', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399877334', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5523', '扬帆逐梦', 'e10adc3949ba59abbe56e057f20f883e', 'ca0f113baa622458eff42ab03e2a4ae7', '350279243@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399864940', '27.17.25.231', null, '0.000', '19998000.000', null, '1', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399864957', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5520', '咯咯', 'e10adc3949ba59abbe56e057f20f883e', 'bcba203dc91863278d15fabf03ed40c3', '1233@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399861476', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399861585', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5522', 'qwerty678', '25d55ad283aa400af464c76d713c07ad', '7acebbec8d092af5fc36bbfa2c2c5d81', '614987950@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399862167', '123.125.40.249', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399862170', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5521', 'wang1982', 'e10adc3949ba59abbe56e057f20f883e', '28bc9929f3ae888f0602dba65c4fed19', 'asdfsd@asd.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399861596', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399861599', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5517', '想玲', 'e10adc3949ba59abbe56e057f20f883e', '688b8f03d4b0cbdaa4e85e25be2168d1', '10088784@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399860871', '27.17.25.231', null, '0.000', '0.000', null, '0', '1', '0', '1', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399865482', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5516', '奈客', 'eda7732dfbd8435d6fced51e136f6c75', '55725bf4d694cb8f7c7b91ce248ec3d7', '2734070740@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1399713123', '27.17.25.231', null, '0.000', '0.000', null, '1', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399713127', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5508', '安德敏的下线', 'e10adc3949ba59abbe56e057f20f883e', '7960d3d73c345ac7e6d170bb9cf637ca', '15454312545@qq.com', null, null, null, '1', '1', null, null, null, null, null, '1989-02-15', '安德敏的下线', '420683198902154287', null, null, null, null, null, null, null, null, null, null, null, '1398853269', '27.17.25.231', null, '0.000', '295.000', null, '0', '5', '0', '3', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '295', '4', 'a:8:{s:8:\"score_id\";s:1:\"2\";s:5:\"value\";i:295;s:5:\"title\";s:12:\"二级威客\";s:5:\"level\";i:2;s:8:\"level_up\";i:205;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"31.67\";s:3:\"pic\";s:159:\"<img src=\"data/uploads/sys/mark/189344f3b081362561.gif?fid=2069\" align=\"absmiddle\" title=\"头衔 ：二级威客&#13;&#10;能力值：295&#13;&#10;等级：2\">\";}', '4', null, '1398853272', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5507', '推广下线', 'e10adc3949ba59abbe56e057f20f883e', '9fce506be70880840f6f66c2df7804b5', '4512315458@qq.com', null, null, null, '1', '1', null, null, null, null, null, '1988-11-02', '推广下线', '420683198811025487', null, null, null, null, null, null, null, null, null, null, null, '1398852915', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1398852918', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5506', 'shangk2', 'e10adc3949ba59abbe56e057f20f883e', 'e6fdbecd0d84a0e6bbf6a25cafba4b53', 'shangk2@qq.com', null, null, null, '1', '1', null, null, null, null, null, '1989-01-01', 'shangk2', '420117198901016332', null, null, null, null, null, null, null, null, null, null, null, '1398849738', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1398849741', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5505', 'shangk1', 'e10adc3949ba59abbe56e057f20f883e', '33a7fc9ed85632fb1d0df5d7ee2d750c', 'shangk1@qq.com', null, null, null, '1', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398849156', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1398849485', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5504', '下线的下线', 'e10adc3949ba59abbe56e057f20f883e', '64aaa8862bbece44875f010c4caf81c9', '25454512485@qq.com', null, null, null, '1', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398848378', '27.17.25.231', null, '0.000', '550.000', null, '5', '28', '0', '9', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '575', '11', 'a:8:{s:8:\"score_id\";s:1:\"3\";s:5:\"value\";i:575;s:5:\"title\";s:12:\"三级威客\";s:5:\"level\";i:3;s:8:\"level_up\";i:425;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"15.00\";s:3:\"pic\";s:159:\"<img src=\"data/uploads/sys/mark/306874f3b082e22fc3.gif?fid=2071\" align=\"absmiddle\" title=\"头衔 ：三级威客&#13;&#10;能力值：575&#13;&#10;等级：3\">\";}', '11', null, '1399701683', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5503', '下线', 'e10adc3949ba59abbe56e057f20f883e', 'd3cfc48bf91476ea72254bb0ad75f035', '7845487878@qq.com', null, null, null, '1', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398847962', '27.17.25.231', null, '0.000', '90.000', null, '0', '2', '0', '-2', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '90', '2', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:90;s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:110;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"45.00\";s:3:\"pic\";s:158:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：90&#13;&#10;等级：1\">\";}', '2', null, '1399282101', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5502', '洛克', 'e10adc3949ba59abbe56e057f20f883e', '1ecf1d45afd12b3c261b5989d06eb117', '5424245201@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398835572', '27.17.25.231', null, '0.000', '80.000', null, '4', '3', '0', '2', null, null, null, null, null, null, '100', '1', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:100;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:100;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"50.00\";s:3:\"pic\";s:159:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：100&#13;&#10;等级：1\">\";}', '1', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399857879', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5501', 'luoke', 'e10adc3949ba59abbe56e057f20f883e', '4783657a4f82ede5f377a8cb94384a09', '2698026020@qq.com', null, null, null, '1', '1', '女', null, null, null, null, '0000-00-00', 'hhh', '424254544348536544', null, null, null, null, null, null, '8', '3', null, null, null, '1398737771', '27.17.25.231', null, '0.000', '45440064.000', null, '5', '18', '0', '13', null, null, null, null, null, null, '521', '6', 'a:8:{s:8:\"score_id\";s:1:\"3\";s:5:\"value\";i:521;s:5:\"title\";s:12:\"三级雇主\";s:5:\"level\";i:3;s:8:\"level_up\";i:479;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"4.20\";s:3:\"pic\";s:158:\"<img src=\"data/uploads/sys/mark/98544f3b082a11c00.gif?fid=2070\" align=\"absmiddle\" title=\"头衔 ：三级雇主&#13;&#10;信誉值：521&#13;&#10;等级：3\">\";}', '6', '5252', '14', 'a:8:{s:8:\"score_id\";s:1:\"6\";s:5:\"value\";i:5252;s:5:\"title\";s:12:\"六级威客\";s:5:\"level\";i:6;s:8:\"level_up\";s:1:\"0\";s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:6:\"100.00\";s:3:\"pic\";s:159:\"<img src=\"data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077\" align=\"absmiddle\" title=\"头衔 ：六级威客&#13;&#10;能力值：5252&#13;&#10;等级：6\">\";}', '14', null, '1399857692', null, '0', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5500', '艾仁', 'e10adc3949ba59abbe56e057f20f883e', '37ad2c04dcd72004fb7fa0ff7cb60b6c', '760573251@qq.com', null, null, null, '1', null, '-1', null, null, null, null, '1980-11-13', '艾仁', null, null, '760573251', '760573251', null, '6212065', '15023658945', '256', '249', null, null, null, '1398672805', '27.17.25.231', null, '0.000', '10056.000', null, '10', '8', '0', '5', null, null, null, null, null, null, '235', '2', 'a:8:{s:8:\"score_id\";s:1:\"2\";s:5:\"value\";i:235;s:5:\"title\";s:12:\"二级雇主\";s:5:\"level\";i:2;s:8:\"level_up\";i:265;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"11.67\";s:3:\"pic\";s:158:\"<img src=\"data/uploads/sys/mark/98734f3b080f7c2ee.gif?fid=2068\" align=\"absmiddle\" title=\"头衔 ：二级雇主&#13;&#10;信誉值：235&#13;&#10;等级：2\">\";}', '3', '1054', '3', 'a:8:{s:8:\"score_id\";s:1:\"4\";s:5:\"value\";i:1054;s:5:\"title\";s:12:\"四级威客\";s:5:\"level\";i:4;s:8:\"level_up\";i:946;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"5.40\";s:3:\"pic\";s:160:\"<img src=\"data/uploads/sys/mark/126844f3b085182758.gif?fid=2073\" align=\"absmiddle\" title=\"头衔 ：四级威客&#13;&#10;能力值：1054&#13;&#10;等级：4\">\";}', '3', null, '1399717169', null, '0', '0', '0', '0', null, '17', '258', '0');
INSERT INTO keke_witkey_space VALUES ('5495', '小鸟', 'e10adc3949ba59abbe56e057f20f883e', '3c55b5c031beca8fea45f4733417369e', '2386484541@qq.com', null, null, null, '1', '1', '-1', null, null, null, null, '1989-01-22', '小鸟', '420683198901221547', null, '2386484541', '2386484541@qq.com', null, '027-6215420', '15021201210', '354', '350', '网站模板,接口操作,网站推广,网站广告,网页动画', null, null, '1398654573', '27.17.25.231', null, '0.000', '11724.000', null, '11', '53', '0', '26', null, null, null, null, null, null, '1691', '10', 'a:8:{s:8:\"score_id\";s:1:\"4\";s:5:\"value\";i:1691;s:5:\"title\";s:12:\"四级雇主\";s:5:\"level\";i:4;s:8:\"level_up\";i:309;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:5:\"69.10\";s:3:\"pic\";s:160:\"<img src=\"data/uploads/sys/mark/140154f3b084cba568.gif?fid=2072\" align=\"absmiddle\" title=\"头衔 ：四级雇主&#13;&#10;信誉值：1691&#13;&#10;等级：4\">\";}', '11', '6796', '19', 'a:8:{s:8:\"score_id\";s:1:\"6\";s:5:\"value\";i:6796;s:5:\"title\";s:12:\"六级威客\";s:5:\"level\";i:6;s:8:\"level_up\";s:1:\"0\";s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:6:\"100.00\";s:3:\"pic\";s:159:\"<img src=\"data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077\" align=\"absmiddle\" title=\"头衔 ：六级威客&#13;&#10;能力值：6796&#13;&#10;等级：6\">\";}', '21', null, '1399860947', null, '1', '0', '0', '0', null, '17', '258', '0');
INSERT INTO keke_witkey_space VALUES ('5498', 'shangk', 'e10adc3949ba59abbe56e057f20f883e', '69b32404cfc48370a051d12274c11830', 'sjl.55555@gmail.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, '64064216', '64064216', null, '15827130789', '15827130789', null, null, 'PHP Web,高级php,apache,iis,高级java', null, null, '1398663808', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1399860811', null, '1', '0', '0', '0', null, '16', '253', '2773');
INSERT INTO keke_witkey_space VALUES ('5499', '七星设计', 'e10adc3949ba59abbe56e057f20f883e', 'd1075a5822f774b85ad9bc6194dcf03b', '548445115@qq.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398665980', '27.17.25.231', null, '0.000', '9720.000', null, '3', '2', '0', '1', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1398665983', null, '1', '0', '0', '0', null, '0', '0', '0');
INSERT INTO keke_witkey_space VALUES ('5494', 'hahapa', '4297f44b13955235245b2497399d7a93', '26341439775a178524572b2a269b46bc', 'afasdf@123.com', null, null, null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1398654326', '27.17.25.231', null, '0.000', '0.000', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";i:0;s:5:\"title\";s:12:\"一级雇主\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/211574fbede3ae7ae9.gif?fid=2881\" align=\"absmiddle\" title=\"头衔 ：一级雇主&#13;&#10;信誉值：0&#13;&#10;等级：1\">\";}', '0', '0', '0', 'a:8:{s:8:\"score_id\";s:1:\"1\";s:5:\"value\";s:1:\"0\";s:5:\"title\";s:12:\"一级威客\";s:5:\"level\";i:1;s:8:\"level_up\";i:200;s:10:\"level_name\";s:6:\"等级\";s:10:\"grade_rate\";s:4:\"0.00\";s:3:\"pic\";s:157:\"<img src=\"data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067\" align=\"absmiddle\" title=\"头衔 ：一级威客&#13;&#10;能力值：0&#13;&#10;等级：1\">\";}', '0', null, '1398654329', null, '1', '0', '0', '0', null, '0', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_system_log`;
CREATE TABLE `keke_witkey_system_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `log_content` varchar(250) DEFAULT NULL,
  `log_ip` char(15) DEFAULT NULL,
  `log_time` int(11) DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4679 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_system_log
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_tag`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_tag`;
CREATE TABLE `keke_witkey_tag` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(50) DEFAULT NULL,
  `tag_type` int(11) DEFAULT NULL,
  `task_type` int(11) DEFAULT NULL,
  `task_indus_id` int(11) DEFAULT NULL,
  `task_indus_ids` varchar(100) DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL,
  `start_time1` int(11) DEFAULT NULL,
  `start_time2` int(11) DEFAULT NULL,
  `end_time1` int(11) DEFAULT NULL,
  `end_time2` int(11) DEFAULT NULL,
  `left_day` int(11) DEFAULT NULL,
  `left_hour` int(11) DEFAULT NULL,
  `task_cash1` int(11) DEFAULT NULL,
  `task_cash2` int(11) DEFAULT NULL,
  `prom_cash1` int(11) DEFAULT NULL,
  `prom_cash2` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `task_ids` varchar(100) DEFAULT NULL,
  `open_is_top` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `art_cat_id` int(11) DEFAULT NULL,
  `art_cat_ids` varchar(100) DEFAULT NULL,
  `art_iscommend` int(11) DEFAULT NULL,
  `art_hasimg` int(11) DEFAULT NULL,
  `art_time1` int(11) DEFAULT NULL,
  `art_time2` int(11) DEFAULT NULL,
  `art_ids` varchar(100) DEFAULT NULL,
  `loadcount` int(11) DEFAULT NULL,
  `perpage` int(11) DEFAULT NULL,
  `tplname` varchar(20) DEFAULT NULL,
  `cat_type` int(11) DEFAULT NULL,
  `cat_cat_id` int(11) DEFAULT NULL,
  `cat_cat_ids` varchar(100) DEFAULT NULL,
  `cat_loadsub` int(11) DEFAULT NULL,
  `cat_onlyrecommend` int(11) DEFAULT NULL,
  `tag_sql` text,
  `code` text,
  `cache_time` int(11) DEFAULT NULL,
  `tag_code` text,
  `tpl_type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tagname` (`tagname`),
  KEY `tag_id` (`tag_id`),
  KEY `cat_cat_id` (`cat_cat_id`),
  KEY `cache_time` (`cache_time`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_tag
-- ----------------------------
INSERT INTO keke_witkey_tag VALUES ('153', '热门活动', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '2', '0', '0', '0', '0', '0', '&lt;div class=\"pb_5\"&gt;  &lt;div class=\"pb_5\"&gt;  &lt;a href=\"http://localhost/kppw2.2/control/admin/index.php?do=tpl&amp;view=edit_tag&amp;tagid=153&amp;tag_type=5&amp;type=1#\"&gt;&lt;img src=\"http://localhost/kppw2.2/resource/img/system/adv.jpg\" alt=\"\" height=\"90\" width=\"165\" /&gt;&lt;/a&gt;&lt;/div&gt;&lt;br /&gt;&lt;/div&gt;&lt;div class=\"clearfix\"&gt;&lt;ul class=\"small_list clearfix\"&gt;&lt;li&gt;&lt;div class=\"item clearfix\"&gt;&lt;a ti&lt;x&gt;tle=&quot;网站活动&quot; href=&quot;#&quot;&gt;网站活动&lt;/x&gt;&lt;/div&gt;&lt;/li&gt;&lt;li&gt;&lt;div class=\"item clearfix\"&gt;&lt;a ti&lt;x&gt;tle=&quot;网站活动&quot; href=&quot;#&quot;&gt;网站活动&lt;/x&gt;&lt;/div&gt;&lt;/li&gt;&lt;li&gt;&lt;div class=\"item clearfix\"&gt;&lt;a ti&lt;x&gt;tle=&quot;网站活动&quot; href=&quot;#&quot;&gt;网站活动&lt;/x&gt;&lt;/div&gt;&lt;/li&gt;&lt;li&gt;&lt;div class=\"item clearfix\"&gt;&lt;a ti&lt;x&gt;tle=&quot;网站活动&quot; href=&quot;#&quot;&gt;网站活动&lt;/x&gt;&lt;/div&gt;&lt;/li&gt;&lt;li&gt;&lt;div class=\"item clearfix\"&gt;&lt;a ti&lt;x&gt;tle=&quot;网站活动&quot; href=&quot;#&quot;&gt;网站活动&lt;/x&gt;&lt;/div&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;', '666', '0', 'default');
INSERT INTO keke_witkey_tag VALUES ('154', '注册协议', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '2', '0', '0', '0', '0', '0', '注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;注册协议&lt;br /&gt;', '3600', '0', 'default');
INSERT INTO keke_witkey_tag VALUES ('53', '文件交付协议', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '<p><span style=\"font-family:Arial;\">一、关于任务的规定 <br />1、甲方在威客网站发布任务　　<br /></span><span style=\"font-family:Arial;\">　　　　　　&nbsp;&nbsp;&nbsp;&nbsp; <br /></span><span style=\"font-family:Arial;\">二、甲方的权利义务 <br />1、甲方在发布任务期间，确定乙方稿件为中标稿件，乙方有义务将稿件的源文件及生成效果图及时转交给威客网网，威客网收到源文件后交给甲方，甲方收到源文件后，通知威客网将悬赏任务赏金的80%，支付给乙方。 <br />2、甲方选中乙方的中标稿件并在威客网向乙方支付任务赏金后，即拥有该稿件的知识产权。 <br />3、甲方有权对已支付任务赏金的中标稿件进行复制、发行、出租、展览、表演、放映、广播、网络传播、摄制、改编、翻译、汇编以及应当由著作权人享有的其他权利。其他任何单位和个人不得侵犯甲方上述权利，否则，甲方有权追究其法律责任。 <br />4、甲方有权利向国家知识产权部门申请知识产权保护，如果中标稿件被采用投产，获奖者将有优先权进行产品的细化设计，并获取相应的报酬。 <br />5、甲方在威客网向乙方支付任务赏金后，可以要求乙方对中标稿件进行适当修改，修改报酬由甲乙双方自由商定。 </span></p><p><span style=\"font-family:Arial;\">三、乙方的权利义务 <br />甲方在任务中确定的乙方中标稿件应符合以下规定。否则，由乙方承担该稿件引起的任何法律责任，与甲方无关： <br />1、中标稿件不得违反国家关于知识产权的法律法规的相关规定； <br />2、中标稿件应为原创，此前未以任何形式发表，不属于公开稿件； <br />3、中标稿件应明显区别于中国或者其他任何国家或地区的各类活动或组织的标志； <br />4、中标稿件或任何用于创作参选稿件的素材均不得侵犯第三方的专利权、著作权、商标权或其他任何专有权利； <br />5、中标稿件交付后，其知识产权归甲方所有； <br />6、中标稿件不得含有任何涉嫌民族歧视、宗教歧视、威胁国家间睦邻友好关系以及其他有悖于社会道德风尚的内容。 </span></p><p><span style=\"font-family:Arial;\">四、关于知识产权纠纷的处理 <br />1、甲、乙双方签订本协议即表示双方同意以上条款，同时接受威客网关于知识产权的声明。 <br />2、如果甲方因该中标稿件侵犯了其他任何第三人的权利而遭到损失，有权利向乙方追偿。 <br />3、本协议一式两份，甲、乙双方各保存一份。 <br />4、本协议自甲乙双方签定之日起生效（在网上点击确认的视为签订本协议）。</span></p>', '0', '0', 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('54', '威客交稿协议', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '2', '0', '0', '0', '0', '0', '&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;一、本网站仅为会员提供一个信息交流平台，是买家发布任务需求和卖家提供解决方案的一个交易市场，本网站对交易双方均不加以监视或控制，亦不介入交易的过程。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;二、本网站有义务在现有技术水平的基础上努力确保整个网上交流平台的正常运行，尽力避免服务中断或将中断时间限制在最短时间内，保证会员网上交流活动的顺利进行。　 &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;三、本网站有义务对会员在注册使用本网站信息平台中所遇到的与交易或注册有关的问题及反映的情况及时作出回复。　 　&lt;br /&gt;&nbsp;&nbsp;&nbsp; 四、本网站有权对会员的注册资料进行审查，对存在任何问题或怀疑的注册资料，本网站有权发出通知询问会员并要求会员做出解释、改正。　 　 &lt;br /&gt;&nbsp;&nbsp;&nbsp; 五、会员因在本网站网上交易与其他会员产生纠纷的，会员将纠纷告知本网站，或本网站知悉纠纷情况的，经审核后，本网站有权通过电子邮件及电话联系向纠纷双方了解纠纷情况，并将所了解的情况通过电子邮件互相通知对方；会员通过司法机关依照法定程序要求本网站提供相关资料，本网站将积极配合并提供有关资料。　　&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;六、因网上信息平台的特殊性，本网站没有义务对所有会员的交易行为以及与交易有关的其他事项进行事先审查，但如发生以下情形，本网站有权无需征得会员的同意限制会员的活动、向会员核实有关资料、发出警告通知、暂时中止、无限期中止及拒绝向该会员提供服务：&lt;br /&gt;&nbsp;&nbsp; （一）、会员违反本协议或因被提及而纳入本协议的相关规则；　　&lt;br /&gt;&nbsp;&nbsp; （二）、存在会员或其他第三方通知本网站，认为某个会员或具体交易事项存在违法或不当行为，并提供相关证据，而本网站无法联系到该会员核证或验证该会员向本网站提供的任何资料；　　 &lt;br /&gt;&nbsp;&nbsp; （三）、存在会员或其他第三方通知本网站，认为某个会员或具体交易事项存在违法或不当行为，并提供相关证据。本网站以普通非专业交易者的知识水平标准对相关内容进行判别，可以明显认为这些内容或行为可能对本网站会员或本网站造成财务损失或法律责任。　 　&lt;br /&gt;&nbsp;&nbsp;&nbsp; 七、根据国家法律、法规、行政规章规定、本协议的内容和本网站所掌握的事实依据，可以认定该会员存在违法或违反本协议行为以及在本网站交易平台上的其他不当行为，本网站有权无需征得会员的同意在本网站交易平台及所在网站上以网络发布形式公布该会员的违法行为，并有权随时作出删除相关信息、终止服务提供等处理。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Arial;\"&gt;八、本网站依据本协议及相关规则，可以冻结、使用、先行赔付、退款、处置会员缴存并冻结在本网站账户内的资金。　　&lt;br /&gt;&nbsp;&nbsp;&nbsp; 九、本网站有权在不通知会员的前提下，删除或采取其他限制性措施处理下列信息：包括但不限于以规避费用为目的；以炒作信用为目的；存在欺诈等恶意或虚假内容；与网上交易无关或不是以交易为目的；存在恶意竞价或其他试图扰乱正常交易秩序因素；该信息违反公共利益或可能严重损害本网站和其他会员合法利益的。&lt;/span&gt;&lt;/p&gt;', '0', '0', 'default');
INSERT INTO keke_witkey_tag VALUES ('59', '底部', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '<ul><li><p>谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富</p></li><li><p>谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。</p></li><li><p>谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。</p></li><li><p>谋学天下，谋天下学问创大众财富。谋学天下，谋谋天下学问创大众财富谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。</p></li><li><p>谋学天下，谋天下学问创大众财富。谋学天下，谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。</p></li></ul>', '0', '0', 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('123', '交付协议', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '2', '0', '0', '0', '0', '0', '<p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\">此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。买家在悬赏中选出一个中标设计，或在设计成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份），就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。如果不止一个卖方卖家，那么买家将被视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。</p><span class=\"font14 block\" style=\"text-indent:2em\">此服务协议的使用必须同意我们的综合服务协议。 </span><span class=\"font14 block\" style=\"text-indent:2em\"></span><span class=\"font14 block\" style=\"text-indent:2em\"></span>', '3600', '0', 'default,red');
INSERT INTO keke_witkey_tag VALUES ('125', '作品出售协议', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '2', '0', '0', '0', '0', '0', '<span class=\"font14\" style=\"text-indent:2em\">此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。</span> <span class=\"font14 block\" style=\"text-indent:2em\">买家在悬赏中选出一个中标设计，或在设计<br />成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。</span> <span class=\"font14 block\" style=\"text-indent:2em\">除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份），就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。</span><span class=\"font14 block\" style=\"text-indent:2em\">如果不止一个卖方卖家，那么买家将被视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。</span><br />', '3600', '0', 'default,red');
INSERT INTO keke_witkey_tag VALUES ('158', '任务交付协议简介', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '任务交付协议简介<br />', '300', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('172', '服务出售协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '<span class=\"font14\" style=\"text-indent:2em\">此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。</span> <span class=\"font14 block\" style=\"text-indent:2em\">买家在悬赏中选出一个中标设计，或在设计<br />成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。</span> <span class=\"font14 block\" style=\"text-indent:2em\">除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份），就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。</span><span class=\"font14 block\" style=\"text-indent:2em\">如果不止一个卖方卖家，那么买家将被视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。</span><br />', '3600', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('173', '任务发布协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '任务发布协议<br />', '3600', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('178', 'hah活动', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '特尔说染色大过年&nbsp;&lt;img src=\"data/uploads/2013/04/09/40815163c0b757bde.jpg\" height=\"100\" width=\"100\" alt=\"\" /&gt;', '0', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('179', '协助流程协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍服协助交付的流程介绍', '0', null, 'default');

-- ----------------------------
-- Table structure for `keke_witkey_task`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task`;
CREATE TABLE `keke_witkey_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` char(10) DEFAULT NULL,
  `work_count` int(11) DEFAULT NULL,
  `single_cash` float(10,2) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `task_fail_rate` int(3) DEFAULT NULL,
  `task_status` int(11) DEFAULT '0',
  `task_title` varchar(100) DEFAULT NULL,
  `task_desc` text,
  `task_file` varchar(100) DEFAULT NULL,
  `task_pic` text,
  `indus_id` int(11) DEFAULT '0',
  `indus_pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `start_time` int(10) DEFAULT '0',
  `sub_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT '0',
  `sp_end_time` int(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `task_cash` decimal(10,2) DEFAULT '0.00',
  `real_cash` decimal(10,2) DEFAULT '0.00',
  `task_cash_coverage` int(11) DEFAULT NULL,
  `cash_cost` decimal(10,2) DEFAULT '0.00',
  `credit_cost` decimal(10,2) DEFAULT '0.00',
  `view_num` int(11) DEFAULT '0',
  `work_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `is_delineas` int(11) DEFAULT '0',
  `kf_uid` int(11) DEFAULT '0',
  `pay_item` varchar(50) DEFAULT NULL,
  `att_cash` decimal(8,2) DEFAULT '0.00',
  `contact` varchar(255) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `ext_time` int(11) DEFAULT NULL,
  `ext_desc` text,
  `task_union` tinyint(1) DEFAULT '0',
  `alipay_trust` tinyint(1) DEFAULT NULL,
  `is_delay` tinyint(1) DEFAULT '0',
  `r_task_id` int(11) DEFAULT NULL,
  `is_trust` tinyint(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `is_auto_bid` int(1) DEFAULT '0',
  `point` varchar(100) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  `age_requirement` int(11) DEFAULT '0',
  `seo_title` varchar(50) DEFAULT NULL,
  `seo_keyword` varchar(50) DEFAULT NULL,
  `seo_desc` text,
  `province` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `tasktop` int(11) DEFAULT '0',
  `urgent` int(11) DEFAULT '0',
  `seohide` int(11) DEFAULT '0',
  `workhide` int(11) DEFAULT '0',
  PRIMARY KEY (`task_id`),
  KEY `task_id` (`task_id`),
  KEY `model_id` (`model_id`),
  KEY `uid` (`uid`),
  KEY `indus_id` (`indus_id`),
  KEY `task_status` (`task_status`)
) ENGINE=MyISAM AUTO_INCREMENT=3447 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task
-- ----------------------------
INSERT INTO keke_witkey_task VALUES ('3318', '5', null, '500.00', '10', '10', '8', '集团公司起名，要求大气上档次', '集团公司旗下部门：&lt;br /&gt;1旅游业&nbsp;&lt;br /&gt;2&nbsp;房地产&nbsp;&lt;br /&gt;3中小型企业咨询&nbsp;&lt;br /&gt;4金融担保&nbsp;&lt;br /&gt;5早教&lt;br /&gt;&lt;br /&gt;要求：&lt;br /&gt;1、名字的字数：不限，要求大气上档次，有寓意。&lt;br /&gt;2、集团名字可以延展&nbsp;：&nbsp;如绿地房产&nbsp;绿地建材&nbsp;这种的可以延展的&nbsp;&lt;br /&gt;3、希望是中文。&lt;br /&gt;4、名字要和周易有出处&lt;br /&gt;5、不要单纯的名字&nbsp;要能说明含义出处的&lt;br /&gt;6、利于今后的品牌树立', '', null, '163', '160', '1', 'admin', '1398662803', '1400390803', '1400390803', '1400053154', null, '1000.00', '30.00', '41', '2470.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3319', '5', null, '1000.00', '10', '10', '8', '典当行Logo设计Logo设计', '本公司为一家典当行企业，通过这里征集公司Logo；&lt;br /&gt;请大家以包含“北京广惠济”“广惠济”“BJGHJ”“GHJ”等关键字或相关字母符号进行设计，当然各位设计师可以完全按照自己的对典当行的理解和想法进行设计！不用拘泥于必须包含以上所说的关键字！&lt;br /&gt;注意：提交的作品最好提供100字左右的文字说明及创意理念', '5574,5575', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/28/152059162535dedc5b9c39.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/28/559876323535dedc5dfc37.jpg', '348', '3', '1', 'admin', '1398664665', '1400392665', '1400392665', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3320', '5', null, null, '10', '10', '9', '网上商城全套页面设计', '&lt;h3&gt;具体要求：&lt;/h3&gt;1.已有商城改版&lt;br /&gt;2.需要设计各页面&lt;br /&gt;3.进行切图&lt;br /&gt;4.无需程序&lt;br /&gt;5.有母婴类网站设计经验的优先考虑', '', null, '349', '3', '1', 'admin', '1398665368', '1400393368', '1400393368', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, '1398665889', '再补充点需求吧，设计师能更好的完成', '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3321', '5', null, null, '10', '10', '9', '急！！行车记录仪外观工业设计', '&lt;h3&gt;具体要求：&lt;/h3&gt;标题：摄录仪外观设计&lt;br /&gt;公司名称：深圳途沃得科技有限公司&lt;br /&gt;经营范围：行车记录仪，运动DV，执法仪等&lt;br /&gt;参考样本：市面上所有类似产品&lt;br /&gt;主要用途：用于行车全程摄录，及手持摄录，即可以用于行车记录仪，也可以用于随身摄录仪，对旅游爱好者在旅行途中既可以用于行车记录仪，又可以用于随身摄像，结构设计合理，各功能键位置方便操作，可仿日韩台产品，可参考附件！！&lt;br /&gt;具体要求：&lt;br /&gt;1.无显示屏（此产品带WIFI,可以通过APP在手机显示屏上观看录影）；&lt;br /&gt;2.整体外观简洁曲面流畅圆润，尽量以简洁的形式展示；&lt;br /&gt;3.全铝合金金属外观：铝合金轻便且有质地感；&lt;br /&gt;4.便携：方便携带。&lt;br /&gt;5.高端：从设计和材质的运用，让消费者感觉此产品属高品质产品。&lt;br /&gt;6.大概参考尺寸：60MM*35MM', '', null, '263', '3', '1', 'admin', '1398668356', '1398668356', '1400396356', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3322', '1', null, null, '10', '10', '13', '嵌入式软硬件开发~改装POS机', '需要功能：&lt;br /&gt;&lt;br /&gt;1.&nbsp;读卡，写卡，可以读，可以写，带存储功能；&lt;br /&gt;&lt;br /&gt;2.&nbsp;定时上传存储的数据到服务器上，比如晚上00:00分上传数据到服务器；&lt;br /&gt;&lt;br /&gt;3.&nbsp;读写卡带比较难破解的加密方式；&lt;br /&gt;&lt;br /&gt;请留下你的联系方式，和QQ或电话，上面金额不准确', '', null, '204', '201', '1', 'admin', '1398669009', '1399101009', '1399187409', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3323', '2', null, null, '20', '5', '9', '白酒书法字体设计', '要求，按照附件的书写风格重新写一下，使三个子更加协调，最好是原创手写的', '', null, '130', '3', '1', 'admin', '1398669170', '1399360370', '1399446770', '1400053154', null, '120.00', '96.00', null, '120.00', '0.00', '2', '0', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3324', '5', null, null, '10', '10', '2', 'app交互体验及UI设计, 高质高价', '200元每小时打底,&nbsp;按满意度另外支付奖金,&nbsp;最高是基础小时费的200%!&nbsp;要求高大上的体验,&nbsp;至少每周可来上海当面沟通一次.觉得自己够NB,屌炸天的设计师来,&nbsp;只会执行没有设计思路的滚远些,谢谢!', '', null, '370', '3', '5499', '七星设计', '1398670376', '1402990376', '1402990376', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '13945485412', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3325', '2', null, null, '20', '5', '9', '用“I DO\" 作一个图标设计', '公司新产品工业机器人，又称机械手，需要设计一个商标图案，英文名字：&nbsp;I&nbsp;&nbsp;DO,&nbsp;（大小写可根据设计需求自己调节）。&nbsp;&lt;br /&gt;一、设计要求：&lt;br /&gt;1、表现要求简约大气。&lt;br /&gt;2、作品风格、形式不限，但必须原创。&lt;br /&gt;3、必须提供彩色原稿，能以不同的比例尺寸清晰显示。&lt;br /&gt;4、标识应为平面形式，可用于各类广告、宣传品及办公用品的印刷和各尺寸的铭牌制作。', '', null, '348', '3', '5499', '七星设计', '1398671144', '1401522344', '1401608744', '1400053154', null, '200.00', '160.00', null, '200.00', '0.00', '9', '0', '0', '0', '0', '0', '0', null, '0.00', '13462154225', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3326', '4', null, null, null, null, '2', '做一个网站开发', '需要一个交互网站，我们公司内部使用.设计简介，容易上手', '', null, '31', '2', '5499', '七星设计', '1398671408', '1407311408', '1407484208', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15201201451', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3327', '1', null, null, '10', '10', '8', '小说原创网站建设', '要求简单的说，就是风格和以下几个目标网站差不多，可以实现其全部的功能，属于仿照网站，但是也别真的一模一样，这样有纠纷。功能一样，风格简单，大气，网页上稍微有差异。&lt;br /&gt;乱抬价，欺负新人的别来，技术神来接走。给一个实在的价钱。请在楼下留言，会及时回复。&lt;br /&gt;时间可以为一个月，不急。', '', null, '155', '2', '5495', '小鸟', '1398671775', '1401868575', '1401954975', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '2', '0', '0', '2', '0', '0', null, '0.00', '15302120145', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3328', '5', null, null, '10', '10', '2', '厨卫电器活动促销宣传口号设计', '&lt;p&gt;厨卫电器节日活动促销宣传口号（宣传车喇叭用的）&lt;/p&gt;&lt;p&gt;我是开厨卫电器专卖店的，为了在促销活动中能起到更好的促销宣传，能够吸引到消费者的耳朵。&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#333333;line-height: 20px;\"&gt;大气、简洁、明快;&lt;/span&gt;所以请各位威客尽量发挥想象力。&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#333333;line-height: 20px;\"&gt;不能太过于做作.要有针对性。&lt;/span&gt;做一个好的促销宣传口号出来。在此先谢谢各位啦！&lt;/p&gt;', '', null, '360', '357', '5495', '小鸟', '1398671995', '1402991995', '1402991995', '1400053154', null, '1000.00', '30.00', '41', '-1.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15032562325', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3329', '3', '5', '30.00', '10', '5', '9', '生化危机4电影预告片', '&lt;p&gt;生化危机4宣传片 要包含影片中的重要情节 片长2.5分钟 制作软件AE 求大神帮忙&lt;br /&gt;&lt;/p&gt;&lt;p&gt;温馨提醒：任务征集期间，交易双方交流可通过站内信联系雇主！&lt;/p&gt;', '', null, '359', '357', '5495', '小鸟', '1398672291', '1400832291', '1400918691', '1400053154', null, '150.00', '135.00', null, '150.00', '0.00', '2', '0', '0', '0', '0', '0', '0', null, '0.00', '15023201451', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3330', '4', null, null, null, null, '2', '老照片翻新', '&lt;div class=\"task_desc ript\"&gt;&lt;p&gt;1、将相片尺寸扩大到八寸；&lt;/p&gt;&lt;p&gt;2、清除照片中的痕迹及污点；&lt;/p&gt;&lt;p&gt;3、锐化突出人物形象；&lt;/p&gt;&lt;p&gt;4、重新构建老照片中的整体颜色，并为人物着上色彩（相片位80年代结婚照）&lt;/p&gt;&lt;/div&gt;', '', null, '354', '350', '1', 'admin', '1398672546', '1407312546', '1407485346', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3331', '3', '5', '40.00', '10', '5', '9', '游戏脚本设计开发', '自动登陆，换号，换角色，自动打怪，吃药，识别捡东西，指定飞坐标，指定交易', '', null, '256', '249', '5495', '小鸟', '1398672640', '1400832640', '1400919040', '1400053154', null, '200.00', '180.00', null, '200.00', '0.00', '3', '0', '0', '0', '0', '0', '0', null, '0.00', '15021236584', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3332', '2', null, null, '20', '5', '8', '代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '代写游戏攻略，代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '', null, '256', '249', '5495', '小鸟', '1398672736', '1402992736', '1403079136', '1400053154', null, '200.00', '160.00', null, '200.00', '0.00', '9', '2', '0', '0', '4', '0', '0', null, '0.00', '15021320120', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3333', '1', null, null, '10', '10', '9', '表示我对领导感激之情的稿件', '&lt;div class=\"task_desc ript\"&gt;导对我工作很关心和支持，但是我不善于表达和沟通，给人冷冰冰和不开心的感觉，不让人接近并拉远了距离，我是慢热的人，还不知如何同男同事相处。求一种表达感激之情的方式方法。谢谢&lt;/div&gt;&lt;span class=\"blank10\"&gt;&lt;/span&gt;', '', null, '208', '201', '5500', '艾仁', '1398673397', '1400833397', '1400919797', '1400053154', null, '120.00', '108.00', null, '120.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3334', '2', null, null, '20', '5', '2', '个人名字征集', '&lt;div class=\"task_desc ript\" style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 宋体, Arial, Helvetica, sans-serif;\"&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;不喜欢现在的名字想改名字&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;其他要求：&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;1.姓名要吉利，避免冲害；&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;2.名字要品味高雅、内涵深远、阳刚大气，叫起来要顺口响亮；&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;3.不选多音字，生僻字和与不雅词谐音的字（如候岩（喉炎），韩渊（喊冤）），尽量不用太俗、洋化的字，如李二、胡平娃、约翰等；&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;4.改后的名字不能太俗气，平凡，尽可能减少生活中重名的机会。但也不能太怪异和另类。&lt;/span&gt;&lt;/p&gt;&lt;span style=\"border: 0px; margin: 0px; padding: 0px;\"&gt;5.双名，字形结构不要太单一，要有变化的美感，比如不能都是左右结构等。&lt;/span&gt;&lt;/div&gt;', '', null, '162', '160', '5500', '艾仁', '1398673563', '1402388763', '1402475163', '1400053154', null, '100.00', '80.00', null, '100.00', '0.00', '2', '0', '0', '0', '0', '0', '0', null, '0.00', '15023658954', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3335', '3', '6', '30.00', '10', '5', '9', '情人节祝福短信急征', '由于情人节不在女朋友身边，希望朋友们帮助送短信祝福！任务要求：&lt;br /&gt;&lt;br /&gt;1.表达虽然不在一起，但满心思念与祝福的主题；&lt;br /&gt;&lt;br /&gt;2.文字有创新，不落俗套，不得抄袭；&lt;br /&gt;&lt;br /&gt;3.内容格式如下：你好，我是来自某地的XX，代你的王建文，向你送来情人节祝福：（自由发挥）&lt;br /&gt;', '', null, '203', '201', '5500', '艾仁', '1398673637', '1400833637', '1400920037', '1400053154', null, '180.00', '162.00', null, '180.00', '0.00', '2', '0', '0', '0', '0', '0', '0', null, '0.00', '18965245142', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3336', '4', null, null, null, null, '2', '合同撰写', '&lt;p&gt;其实我做这件事情，是因为北京想要申请外国人来华访问时要提供这样一个合同而已，因为来华的人公司是做石油贸易的，对这方面的技术咨询，本人不是很擅长，需要高人来帮忙。在此先谢谢大家了！&lt;/p&gt;&lt;p&gt;我自己在网上查到过写合同范本，上面让写出：咨询内容：[&nbsp; ]。咨询要求：[&nbsp; ]。咨询方式：[&nbsp; ]。本人实在不知该写什么内容，烦请各位帮忙。&lt;/p&gt;', '', null, '236', '234', '5500', '艾仁', '1398673716', '1407313716', '1407486516', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '13845452120', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3337', '5', null, null, '10', '10', '2', '学术问卷，2元一稿', '&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;font-size:18px;color:#666666;border: 0px; padding: 0px; margin: 0px;\"&gt;本问卷是学术性调查问卷，所需时间约5-6分钟。本问卷所收集数据仅作学术研究，完全保密。非常感谢您的宝贵时间与合作。&lt;/span&gt;', '', null, '193', '192', '5500', '艾仁', '1398673849', '1402993849', '1402993849', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15023625894', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3338', '1', null, null, '10', '10', '8', '阿里巴巴全国专业批发市场大调研', '&lt;span style=\"font-size:16px;\"&gt;　阿里巴巴(中国)网络科技有限公司为了解浙江、广东、福建、山东及全国其他区域产业带及专业市场，促进国内相关产业及行业健康稳定发展，特重赏四万五千元，一品威客接受其市场调研任务，特诚邀平台500万威客对全国100个专业市场进行市场调研。广东、浙江为重点调研区域，优先调研。&lt;/span&gt;', '', null, '193', '192', '5500', '艾仁', '1398673973', '1402475573', '1402561973', '1400053154', null, '130.00', '117.00', null, '130.00', '0.00', '0', '3', '0', '0', '2', '0', '0', null, '0.00', '15201220021', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3339', '2', null, null, '20', '5', '8', '人格心理学线上問卷，每份7元', '&lt;p&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;我们希望可以了解有关人格心理學的信息。 本问卷大约需要15分钟就能完成请大家用心回答我们的问题, 谢谢。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; padding: 0px; margin: 0px;\"&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;审核通过的要求：&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; padding: 0px; margin: 0px;\"&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;-&nbsp;每人只能做一次（我们会以随机代码，电脑IP等来验证）&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; padding: 0px; margin: 0px;\"&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;- 不能乱做&lt;/span&gt;&lt;/p&gt;&lt;p style=\"border: 0px; padding: 0px; margin: 0px;\"&gt;&lt;span style=\"font-family:SimSun;font-size:16px;\"&gt;-&nbsp;做完问卷后请把验证代码输入在留言中，以待我们验证&nbsp;&lt;/span&gt;&lt;/p&gt;', '', null, '193', '192', '5500', '艾仁', '1398674089', '1402994089', '1403080489', '1400053154', null, '100.00', '80.00', null, '100.00', '0.00', '46', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201458', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3340', '3', '3', '50.00', '10', '5', '9', '关于威客和雇主的问卷调查，两元一稿', '&lt;p&gt;威客发包方、接包方问卷调研&lt;/p&gt;&lt;p&gt;&nbsp;尊敬的女士/先生，您好！&lt;br /&gt;　　这是一份学术性研究问卷，目的是了解众包参与者的基本特征，以及影响众包参与者（发包方、接包方）参与众包的关键影响因素。&lt;br /&gt;　　根据您在众包应用和发展方面的经验和想法，请您回答以下问卷，您的回答将对此研究有重要的参考价值。本研究所得资料仅供本学术研究参考，若您对本研究结论有兴趣，请在问卷后注明邮箱地址，本研究完成之后，将为您发送研究结论。&lt;/p&gt;', '', null, '193', '192', '5500', '艾仁', '1398674143', '1400834143', '1400920543', '1400053154', null, '150.00', '135.00', null, '150.00', '0.00', '2', '0', '0', '0', '0', '0', '0', null, '0.00', '15023652145', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3341', '4', null, null, null, null, '2', '在线职业调查问卷,2元一稿', '&lt;p&gt;&lt;span style=\"font-size:16px;\"&gt;在线职业调查问卷，每稿2元！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;\"&gt;亲们，填在线职业调查问卷，2元每份。效果以下面以截图为准（见附件样本）。&lt;br /&gt;这是关于如何找到更好工作的问卷&lt;/span&gt;&lt;/p&gt;', '', null, '193', '192', '5500', '艾仁', '1398674200', '1407314200', '1407487000', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15023698457', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3342', '5', null, null, '10', '10', '9', '市场调查，2元一稿', '&lt;p align=\"left\"&gt;回答没有对错，只需根据您的实际情况填写即可。您的意见对我们非常重要！如果您回答不认真或不完整，将不能获得奖励。&lt;/p&gt;&lt;p align=\"left\"&gt;对此调查提供诚实和周到的答案是确保市场调研成功的关键，是我们以及我们的客户寻求事实的依据，并在此基础上作出重要决策，此决策不仅影响到包括您在内的消费者，还有其他人。&lt;br /&gt;这是一个社区调查项目，最终成功完成调查的会员将获得2元现金。&lt;/p&gt;', '', null, '193', '192', '5500', '艾仁', '1398674254', '1402994254', '1402994254', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15032695854', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3343', '3', '2', '50.00', '10', '5', '8', '生日祝福短信征集', '&lt;p&gt;陌生的你们帮我送给她最真挚的幸福&lt;/p&gt;我喜欢的女孩要过生日了，我想要在她生日那天，收到来自天涯海角的人送来的祝福。短信内容大概是：生日快乐！我是来自xx的路人，代表xx向你送上生日的祝福 ...... 其实他很喜欢你，你知道么？祝你们永远幸福@。......区域的内容可以自由发挥', '', null, '202', '201', '1', 'admin', '1398736284', '1400896284', '1400982684', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '7', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3344', '4', null, null, null, null, '8', '求创意照片生日礼物', '跟女朋友谈了很久了，想在生日当天送给她一份精心的礼物，亲们&nbsp;敢不敢&nbsp;给我一张图片，让我们相信爱情也可以天长地久！&lt;br /&gt;先谢谢大家，具体要求如下：&lt;br /&gt;1.&nbsp;必须要露出您（若是情侣或多个朋友更完美）的脸，手机、相机都成，但拒绝PS。照片要清晰、角度要好，突出背景和祝福的话，人物要微笑着拍，拜托了！一定要微笑，微笑，表情不要太生硬哦。&lt;br /&gt;2.&nbsp;拍摄地点：最好是在你所在的城市里具有标志性建筑的地方，当然家里也可以，有点创意当然更好啦嘿嘿。&lt;br /&gt;3.&nbsp;祝福一定要手写，有真实的人和自然景物一体。&nbsp;希望多一点真诚。多多帮忙！相片要求清晰。因为要洗出来。谢谢&lt;br /&gt;5.&nbsp;字的颜色不限&nbsp;彩色最好&nbsp;照出来的照片字要清晰认得出来&lt;br /&gt;6.&nbsp;拜托大家用心完成，因为我真的很想有个特别礼物送给他&nbsp;大家的照片相信她会珍藏回味的&nbsp;所以我希望尽量完美&nbsp;真心的感谢大家了&nbsp;尽量是情侣&nbsp;、全家福或者多个朋友或者美丽的风景&nbsp;因为我真的很爱她。&lt;br /&gt;', '', null, '202', '201', '1', 'admin', '1398738136', '1407378136', '1407550936', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15023652154', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3345', '3', '4', '20.00', '10', '5', '9', '需要开发人员', '需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员需要开发人员', '', null, '230', '218', '1', 'admin', '1399518534', '1401678534', '1401764934', '1400053154', null, '80.00', '72.00', null, '80.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3347', '1', null, null, '10', '10', '13', '网站论坛推广营销方案', '&lt;p&gt;推广一个网站论坛&lt;/p&gt;&lt;p&gt;推广一个论坛，需要制定详细的推广计划，符合seo的，不是盲目的去干外联，堆积外链。&lt;/p&gt;', '5614', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/29/1747244658535f366ed3981.jpg', '41', '3', '5495', '小鸟', '1398748786', '1402982386', '1403068786', '1400053154', null, '150.00', '135.00', null, '150.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15023256984', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3348', '4', null, null, null, null, '8', '航天员发布的作品', '航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品航天员发布的作品', '5616', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/29/826568328535f647fd9f8b.jpg', '257', '249', '1', 'admin', '1398760601', '1407400601', '1407573401', '1400053154', null, '1000.00', '50.00', '34', '1000.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '13245125623', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3349', '4', null, null, null, null, '2', '男装店起名', '&nbsp;准备开一家男装店，准备以H.G开头，寓意：Have a good start。拥有一个好的开始，也就是当顾客进入商店以后就还有一个好的开始。另外H代表我的媳妇侯海，G代表我自己郭培伟。现备选店名“H.G名品折扣”、“H.G男人装”、“H.G男人衣柜”。但是哪一个都不够有更深的寓意。需要你给我来想出一个最为有创意的店名。除了店名以外，给出一个开店以后的营销方案，也就是开拓市场的方法和会员制度等。希望，这个任务，你能胜任。', '5618', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/29/762343433535f6615660ad.jpg', '164', '160', '5495', '小鸟', '1398761007', '1407401007', '1407573807', '1400053154', null, '1000.00', '50.00', '34', '-1.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '15023658947', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3350', '5', null, '1000.00', '10', '10', '8', '茶餐厅营销策略撰写', '&lt;div class=\"task_desc ript\"&gt;&lt;p&gt;我想开一间茶餐厅，要一进去就很难忘，给人感觉很深刻，特别突出某一种感觉，让人觉得很舒适温馨，只想静静的呆在店里，有什么经营策略让人留恋往返，大家帮我出一下主意，有什么新奇的点子。&lt;/p&gt;&lt;p&gt;主要是要威客撰写一篇营销方案&lt;/p&gt;&lt;/div&gt;', '5620', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/29/1017870768535f6970d5880.jpg', '212', '211', '1', 'admin', '1398761846', '1403081846', '1403081846', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3351', '2', null, null, '20', '5', '8', '【加急】给女友道歉的短信', '&lt;p&gt;&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#666666;LINE-HEIGHT: 25px\"&gt;本稿每人限做一次。请勿重复提交！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#666666;LINE-HEIGHT: 25px\"&gt;&nbsp;1.文字创新，不落俗套，不得抄袭&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:宋体;color:#666666;\"&gt;&nbsp;注：请选择139邮箱，定时发送，详情看附件&lt;/span&gt;&lt;/p&gt;&lt;p&gt;2短信内容&lt;span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#666666;LINE-HEIGHT: 25px\"&gt;.&lt;/span&gt;： &lt;span style=\"color:#3366ff;\"&gt;你好，虹虹，我是来自XX省XX市的朋友，代Liusy向你道歉&nbsp;：无心让我伤害了你。我的心里也不好受!希望你能理解，所有的理由和解释都是苍白无力的，我选择在沉默中等待你的原谅。&lt;/span&gt;&lt;/p&gt;', '', null, '331', '201', '1', 'admin', '1398762810', '1402996410', '1403082810', '1400053154', null, '150.00', '120.00', null, '150.00', '0.00', '6', '1', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3355', '1', null, null, '10', '10', '9', '金融行业投资公司LOGO设计', '&lt;p&gt;公司名称：武汉天鹰管理有限公司&lt;/p&gt;&lt;p&gt;主要用途：设计logo应用到公司门头、名片、邀请函等。&lt;/p&gt;&lt;p&gt;公司描述：我公司是一家专注于金融产品的投资，是首家为企业、金融机构和普通投资者提供证券、商品期货、金融期货、渤海商品现货等金融衍生产品的一站式投资服务中心。我们以“稳健务实、创造财富”为投资理念，旨在为投资者带来长期、持续、稳定的汇报，矢志做全疆最优秀的财富管理公司，并成为金融投资行业的先行者。&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p&gt;设计要求：&lt;/p&gt;&lt;p&gt;1、设计要求主题突出、寓意深刻。&lt;/p&gt;&lt;p&gt;2、LOGO要求必须原创，不得抄袭他人。&lt;/p&gt;&lt;p&gt;3、LOGO设计应以图形为主，亦可是图文结合的形式。&lt;/p&gt;&lt;p&gt;4、必须是彩色原稿，能以不同的比例尺寸清晰显示；需附有创作思路和设计说明，解释LOGO创作理念及内涵。&lt;/p&gt;&lt;p&gt;5、标识应为平面形式，可用于各类广告、宣传品及办公用品的印刷。　　 &lt;/p&gt;&lt;p&gt;6、要求作品简洁明了，富有寓意，有一定深度，创意性，具有较强的视觉冲击力，易于识别与传播。&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p&gt;知识产权说明：&lt;/p&gt;&lt;p&gt;1、 所设计的作品为原创，为第一次发布。未侵犯他人的著作权。如有侵犯他人著作权，由设计者承担所有法律责任。&lt;/p&gt;&lt;p&gt;2、 中标的设计作品，我方支付设计制作费。即拥有该作品的知识产权，包括著作权、使用权和发布权等，并有权对设计作品进行修改、组合和应用，设计者不得再向其他任何地方使用该设计作品。&lt;/p&gt;', '', null, '348', '3', '5501', 'luoke', '1398825257', '1400985257', '1401071657', '1400053154', null, '4000.00', '3600.00', null, '4000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3356', '2', null, null, '20', '5', '9', '表白信息撰写', '&lt;p&gt;喜欢上一个人，但是想要用情书的方式进行表白，&lt;/p&gt;&lt;p&gt;现在征集表白情书，需要有新意而不失文艺，&lt;/p&gt;&lt;p&gt;通俗而不庸俗，希望各位帮忙，&lt;/p&gt;&lt;p&gt;赏金已托管，交稿后会尽快选稿、。&lt;br /&gt;&lt;/p&gt;', '5640,5641,5642,5643', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/197264495853606718dd89f.jpeg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/18292775575360671c05519.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/7399943355360671f8f720.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/151463793153606721dce06.jpg', '203', '201', '1', 'admin', '1398826790', '1400986790', '1401073190', '1400053154', null, '200.00', '160.00', null, '200.00', '0.00', '6', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3357', '1', null, null, '10', '10', '9', '公司标识设计', '&lt;p&gt;我们是一家商贸公司，主要经营各种服装，针对的是国外的用户，现在想要征集公司的标识。&lt;/p&gt;&lt;p&gt;主要是用于每件衣服的吊牌上面，希望标识有创意，&lt;/p&gt;&lt;p&gt;我们这里的衣服主要是女装，春装、夏装、秋装都有的。&lt;/p&gt;&lt;p&gt;面对的也是一些职场女性，所以希望带着一种严谨但轻快的味道，&lt;/p&gt;', '5645,5646,5647', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/17103520595360698fa1d6c.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/14724826625360698fc6e71.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/18066863455360698feb401.jpg', '8', '3', '5501', 'luoke', '1398827412', '1400987412', '1401073812', '1400053154', null, '1000.00', '900.00', null, '1000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3358', '2', null, null, '20', '5', '8', '小型设备图标设计', '项目描述：&lt;br /&gt;一套嵌入式设备图标设计&lt;br /&gt;&lt;br /&gt;10张图片左右&lt;br /&gt;&lt;br /&gt;输出格式要求BMP，24位色&lt;br /&gt;&lt;br /&gt;图片透明部分使用RGB255,255,255（纯白色），所有纯白的颜色在显示到界面上时都表现为纯透明（不显示纯白这个颜色）&lt;br /&gt;&lt;br /&gt;&lt;p&gt;美工人员要求美术感很好、纯粹只会熟练使用画图工具而无任何美术灵感的人勿扰&lt;/p&gt;', '', null, '145', '3', '1', 'admin', '1398827625', '1401938025', '1402024425', '1400053154', null, '100.00', '80.00', null, '100.00', '0.00', '8', '3', '0', '0', '4', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3359', '5', null, '1000.00', '10', '10', '8', '设计酒店的Logo和VI设计', '&lt;p&gt;&lt;strong&gt;设计要求：&lt;/strong&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/p&gt;&lt;ul class=\"ml_20\"&gt;&lt;li&gt;1、大气、简洁、明快;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/li&gt;&lt;li&gt;2、有视觉冲击力，醒目易识别，突出餐饮品牌元素;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/li&gt;&lt;li&gt;3、能体现特色，&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/li&gt;&lt;li&gt;4、附上创意说明。&nbsp;&nbsp; &lt;br /&gt;&lt;/li&gt;&lt;/ul&gt;', '', null, '348', '3', '1', 'admin', '1398828379', '1402975579', '1402975579', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '15023652154', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3360', '5', null, '1000.00', '10', '10', '11', '圣诞节的祝福语', '圣诞节快到了，希望大家能帮我给我女儿寄上一张圣诞贺卡，写上你们的祝福语。', '', null, '204', '201', '5504', '下线的下线', '1398850355', '1402911155', '1402911155', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '15021210045', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3361', '1', null, null, '10', '10', '2', '需要会开发借口的程序员', '需呀一个熟练开发接口的程序员，能帮我们短时间内处理接口问题', '', null, '34', '2', '5504', '下线的下线', '1398850974', '1402998174', '1403084574', '1400053154', null, '150.00', '135.00', null, '150.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021230201', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3378', '1', null, null, '10', '10', '8', '网页动画设计', '&lt;p&gt;新建的网站需要一些动画宣传，&lt;/p&gt;&lt;p&gt;我们是服装行业的，希望动画设计作品能够好玩、有趣，&lt;/p&gt;&lt;p&gt;更重要的是能够吸引人。&lt;br /&gt;&lt;/p&gt;', '5717', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/11894442675368485acf9b4.jpg', '31', '2', '1', 'admin', '1399343220', '1401503220', '1401589620', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3440', '2', null, null, '20', '5', '8', '入围热污染', '入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染入围热污染', '', null, '204', '201', '1', 'admin', '1399880010', '1402040010', '1402126410', '1399880010', null, '100.00', '80.00', null, '100.00', '0.00', '5', '3', '0', '0', '6', '0', '0', null, '0.00', '15023652154', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3439', '1', null, null, '10', '10', '13', '发大幅度发送到', '发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到发大幅度发送到', '', null, '442', '2', '1', 'admin', '1399879833', '1402039833', '1402126233', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '3', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3436', '2', null, null, '20', '5', '9', '评审招标测试流程22', '22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22评审招标测试流程22', '', null, '57', '3', '1', 'admin', '1399864890', '1402024890', '1402111290', '1400053154', null, '100.00', '80.00', null, '100.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '13245125623', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3418', '5', null, '300.00', '10', '10', '6', '测试任务，一会儿删掉', '测试任务，一会儿删掉测试任务，一会儿删掉测试任务，一会儿删掉测试任务，一会儿删掉测试任务，一会儿删掉测试任务，一会儿删掉', '', null, '408', '2', '1', 'admin', '1399528091', '1403848091', '1403848091', '1400053154', null, '1000.00', '30.00', '41', '2270.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3419', '1', null, null, '10', '10', '9', '政府集群网站开发', '政府类型1个主站，3类子网站开发。&lt;br /&gt;具体要求详见附件，网站模块名称可调整但要完全展现其内容，也可以增加补充内容。&lt;br /&gt;具体联系沟通。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;', '', null, '34', '2', '1', 'admin', '1399529626', '1401689626', '1401776026', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3379', '1', null, null, '10', '10', '13', '艺术照处理', '&lt;p&gt;新拍的艺术照，照完之后别人也处理过，&lt;/p&gt;&lt;p&gt;但是觉得真心不满意，怎么是这样的效果，&lt;/p&gt;&lt;p&gt;一共有10张，想找高手进行处理一下，&lt;/p&gt;&lt;p&gt;没有别的要求，好看就行啊，&lt;/p&gt;&lt;p&gt;实在是之前的太不怎么样了。&lt;br /&gt;&lt;/p&gt;', '5718', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/1326771099536849a537334.jpg', '351', '350', '1', 'admin', '1399343533', '1401503533', '1401589933', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3441', '5', null, null, '10', '10', '9', '风尚大典地方', '风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方风尚大典地方', '', null, '169', '2', '1', 'admin', '1399880245', '1404200245', '1404200245', '1400053154', null, '1000.00', '30.00', '41', '1000.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3433', '1', null, null, '10', '10', '9', '平面设计员', '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;', '', null, '241', '240', '5516', '奈客', '1399865183', '1402025183', '1402111583', '1400053154', null, '0.01', '0.01', null, '0.01', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '15827454284', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3381', '1', null, null, '10', '10', '8', '网站Logo设计', '&lt;p&gt;新建的网站logo设计，服装行业网站，logo需要严肃一点的，&lt;/p&gt;&lt;p&gt;因为我们是针对于商务服装，男女都有&lt;/p&gt;&lt;p&gt;网站名称是&nbsp; 美亚丽&lt;/p&gt;&lt;p&gt;可以百度看下进入我们网站看下其大致风格，&lt;/p&gt;&lt;p&gt;然后设计出类似风格的logo。&lt;/p&gt;', '5723', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/117186011353684daa22f32.jpg', '348', '3', '1', 'admin', '1399344559', '1401504559', '1401590959', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3382', '1', null, null, '10', '10', '13', '突然有人同意让他', '突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他突然有人同意让他', '', null, '203', '201', '1', 'admin', '1399344649', '1401504649', '1401591049', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3384', '1', null, null, '10', '10', '13', '汇诚Logo设计', '&lt;div class=\"task-logo-content\"&gt;&lt;div class=\"section logo-title\"&gt;&lt;span class=\"highlight\"&gt;Logo名称：汇诚&lt;/span&gt;&lt;/div&gt;&lt;div class=\"section logo-industry\"&gt;&lt;span class=\"title_hi\"&gt;所属行业：&lt;/span&gt;&lt;br /&gt;会计/金融/银行/保险&lt;/div&gt;&lt;div class=\"section logo-card\"&gt;&lt;span class=\"highlight\"&gt;我同时还需要VI设计，包含             名片        ，    信封信纸        ，    员工胸牌            ，    手提袋        ，    纸杯        ，    T恤衫        。请设计师交稿时一并提供。&lt;/span&gt;&lt;/div&gt;&lt;div class=\"section logo-type clearfix\"&gt;    &lt;p&gt;&lt;span class=\"title_hi\"&gt;我喜欢这样的Logo，请至少按照以下一种类型进行设计：&lt;/span&gt;&lt;/p&gt;    &lt;ul&gt;&lt;li&gt;            &lt;img src=\"http://t5.zbjimg.com/logoshow/img/logo_2.png\" alt=\"\" /&gt;            &lt;div&gt;                &lt;div&gt;抽象，一个抽象图形或者符号&lt;/div&gt;            &lt;/div&gt;        &lt;/li&gt;&lt;li&gt;            &lt;img src=\"http://t5.zbjimg.com/logoshow/img/logo_3.png\" alt=\"\" /&gt;            &lt;div&gt;                &lt;div&gt;字母，公司/产品的缩写名称或字母&lt;/div&gt;            &lt;/div&gt;        &lt;/li&gt;&lt;li&gt;            &lt;img src=\"http://t5.zbjimg.com/logoshow/img/logo_4.png\" alt=\"\" /&gt;            &lt;div&gt;                &lt;div&gt;徽章，使用徽章代表公司/产品&lt;/div&gt;            &lt;/div&gt;        &lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;div class=\"section logo-values\"&gt;&lt;p&gt;&lt;span class=\"title_hi\"&gt;Logo需要传递这样的价值观：&lt;/span&gt;&lt;/p&gt;    &lt;ul&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;男人&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;女人&lt;/span&gt;                    &lt;/li&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;年轻&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;成熟&lt;/span&gt;                    &lt;/li&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;豪华&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;经济&lt;/span&gt;                    &lt;/li&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;现代&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;经典&lt;/span&gt;                    &lt;/li&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;活泼&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;严肃&lt;/span&gt;                    &lt;/li&gt;&lt;li&gt;&lt;span class=\"logo-values-min\"&gt;简单&lt;/span&gt;&lt;span class=\"logo-values-max\"&gt;复杂&lt;/span&gt;                    &lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;div class=\"task_content\"&gt;&lt;span class=\"title_hi\"&gt;公司或者产品描述：&lt;/span&gt;&lt;br /&gt;我们公司主要从事金融支付线下支付POS收单行业，即银联刷卡机，公司业务包括：固定POS机、移动POS机安装、业务办理、商户培训、终端维修等专业化服务。&lt;/div&gt;&lt;div class=\"section logo-extrainfo\"&gt;&lt;span class=\"title_hi\"&gt;还想告诉设计师：&lt;/span&gt;&lt;br /&gt;1、汇诚的核心就是汇聚诚意。（突出核心）&lt;br /&gt;2、LOGO要印象深刻。&lt;br /&gt;3、正式也要时尚。&lt;br /&gt;4、带给人激情以及信赖。&lt;/div&gt;&lt;/div&gt;', '', null, '348', '3', '1', 'admin', '1399345889', '1401505889', '1401592289', '1400053154', null, '200.00', '180.00', null, '200.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3386', '1', null, null, '10', '10', '8', '小太阳取暖器外观设计和结构设计', '&lt;h1 style=\"margin-bottom: 10px;\"&gt;&lt;p&gt;&lt;strong&gt;需求号：4047622&lt;/strong&gt;&lt;/p&gt;                                        &lt;h3&gt;具体要求：&lt;/h3&gt;一、&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客户群和使用环境：&lt;br /&gt;办公室白领阶层，集体办公的办公室，学生，学校。&lt;br /&gt;二、&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;要求：&lt;br /&gt;1、高度不超过300mm&lt;br /&gt;2、外观要求，简洁，大方；&lt;br /&gt;3、功率不超过1000W；&lt;br /&gt;4、过3C；&lt;br /&gt;5、要求有&lt;a target=\"_blank\" href=\"http://www.zhubajie.com/c-logovi/\"&gt;设计&lt;/a&gt;过类似产品的公司参与，请及时联系我，价格另议。&lt;br /&gt;三、&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;参考产品：&lt;br /&gt;&lt;a href=\"http://task.zhubajie.com/4047622/#\" class=\"_target-url\"&gt;http://detail.tmall.com/item.htm?spm=a230r.1.14.172.J1bwkS&amp;id=35851030835&lt;/a&gt;&lt;/h1&gt;', '', null, '8', '3', '1', 'admin', '1399346266', '1401506266', '1401592666', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3438', '1', null, null, '10', '10', '13', '动漫周边商城网站', '需要整体网站建设，做动漫周边类，网站需精简实用。&lt;br /&gt;&lt;p&gt;以下功能，&lt;/p&gt;1. 注册登录 购物车&lt;br /&gt;2 产品展示 信息发布区&lt;br /&gt;3 后台数据统计 会员管理&lt;br /&gt;4 加拿大本地银行卡付款&lt;br /&gt;5 快递计算页面&lt;br /&gt;6 中英文支持&lt;br /&gt;基本要求就是这些，希望大家报价诚恳，在接受范围内。欢迎个人或公司，谢谢。&lt;br /&gt;开发方向&lt;br /&gt;全新网站 [电子商务网站]&lt;br /&gt;参考网站&lt;br /&gt;daigoujp.com 我有自己的域名和服务器，需要网站建设&lt;br /&gt;网站所属行业&lt;br /&gt;动漫周边&lt;br /&gt;是否已准备好网站所需要内容？&lt;br /&gt;否&lt;br /&gt;网站所需功能&lt;br /&gt;用户注册，生成用户账号&lt;br /&gt;在线支付&lt;br /&gt;用户发表评论及反馈&lt;br /&gt;多语言&lt;br /&gt;全站搜索&lt;br /&gt;补充说明：&lt;br /&gt;会员中心，购物车，订单管理&lt;br /&gt;搜索引擎优化（SEO）&lt;br /&gt;需要', '', null, '32', '2', '5523', '扬帆逐梦', '1399865443', '1402025443', '1402111843', '1400053154', null, '2000.00', '1800.00', null, '2000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '18986868787', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3388', '2', null, null, '20', '5', '8', '向朋友表白，求丽江视频', '&lt;h3&gt;具体要求：&lt;/h3&gt;求丽江各个景点的照片。主要是景点稍带纸内容。用一张稍微漂亮的纸，上面写着：“丽霞，做金泉对象吧。&lt;br /&gt;字迹清晰，能写漂亮最好咯&nbsp;&lt;br /&gt;因为还要一起编辑，为保画质，请发送34**********邮箱，麻烦啦', '', null, '203', '201', '1', 'admin', '1399347165', '1401507165', '1401593565', '1400053154', null, '100.00', '80.00', null, '100.00', '0.00', '3', '4', '0', '0', '10', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3391', '3', '4', '25.00', '10', '5', '8', '向朋友表白，制作一本个性相册，向各地朋友征稿', '&lt;h3&gt;具体要求：&lt;/h3&gt;用一张稍微漂亮的纸，上面写着：“丽霞，金泉喜欢你。”然后找一个有地理位置标示的地方拍一张照片，照片清晰就好啦。&lt;br /&gt;1、地理位置标示（比如省的省界标识，或者学校的大门名字处等。地点最好比较有名）&lt;br /&gt;2、字迹清晰，能写漂亮最好咯&lt;br /&gt;3、可以不出现人，要是有朋友想要本人露脸支持，请微笑~&lt;br /&gt;4、书写内容：丽霞，金泉喜欢你。（符号可以选择“。！~(^o^)/“等&lt;br /&gt;因为还要一起编辑，为保画质，请发送n邮箱，麻烦啦', '', null, '203', '201', '1', 'admin', '1399354457', '1401514457', '1401600857', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '4', '2', '0', '0', '2', '0', '0', null, '0.00', '12345678998', null, '1399704787', '踊跃报名吧，赏金可谈的哦', '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3437', '5', null, null, '10', '10', '9', '评审招标测试流程33', '评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程评审招标测试流程', '', null, '219', '218', '1', 'admin', '1399864936', '1399864936', '1399864936', '1399864936', null, '5000.00', '30.00', '30', '5000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '13245125623', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3393', '4', null, null, null, null, '4', '工业设计', '&lt;p&gt;工业设计&lt;/p&gt;&lt;p&gt;详细信息可以站内信&lt;br /&gt;&lt;/p&gt;', '', null, '144', '3', '1', 'admin', '1399354826', '1399527626', '1399700426', '1400053154', null, '3000.00', '50.00', '35', '3000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3395', '5', null, '2000.00', '10', '10', '8', '比特侠 主题人物设计', '英文名： BITMAN 中文名：比特侠&lt;br /&gt;人物概述：BITMAN 它是数字货币的保护神，人物精神的精神堡垒：类似于超人、蝙蝠侠等人物&lt;br /&gt;&lt;br /&gt;设计要求：&lt;br /&gt;1、有数码货币的特性，元素简单、神秘、具有强烈的视觉冲击、未来人物角色可塑性强；&lt;br /&gt;2、人物需要2-3个不同人物属性的形象设计&lt;br /&gt;3、最好有bitcoin的logo体现&lt;br /&gt;4、原创，可注册商标&lt;br /&gt;&lt;br /&gt;提示：设计之前希望设计者了解一下bitcoin这种数字货币(bitcoin-03.jpg)。&lt;br /&gt;最后说一点：充分发挥你的才华吧，可以天马行空的开始思考', '', null, '13', '3', '1', 'admin', '1399355355', '1399700955', '1399700955', '1400053154', null, '5000.00', '30.00', '30', '11970.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3435', '1', null, null, '10', '10', '9', '航天员发布的作品3', '3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3航天员发布的作品3', '', null, '214', '211', '1', 'admin', '1399864795', '1402024795', '1402111195', '1400053154', null, '120.00', '108.00', null, '120.00', '0.00', '0', '0', '0', '0', '0', '0', '0', null, '0.00', '13245125623', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3442', '2', null, null, '20', '5', '9', '诚招护士看护师', '诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师诚招护士看护师', '5759', '', '241', '240', '5527', '我爱小护士', '1399884484', '1402044484', '1402130884', null, null, '900.00', '720.00', null, '900.00', '0.00', '2', '11', '0', '0', '0', '0', '0', null, '0.00', '18672345799', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3446', '1', null, null, '10', '10', '9', '特瑞特人物', '特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物特瑞特人物', '', null, '408', '2', '1', 'admin', '1399886832', '1402046832', '1402133232', null, null, '100.00', '90.00', null, '100.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '15023652154', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3414', '1', null, null, '10', '10', '9', '发短信跟我四年的男朋友表白', '我和我男朋友认识四年了，我比他小四岁，和他在一起的时候我才大四，现在毕业也好几年了，可以说最美好的时光都给他了。&lt;br /&gt;今年年初开始和他住在一起，昨天下午有一个异性朋友来家里玩，就坐了坐，再普通不过，啥暧昧都木有，就喝了一杯白开水，我也没打算瞒他，还想着可以一起吃个饭。碰巧他提前下班回来看到了，结果就很生气，晚上也没有回家。我四年里就他一个男人，是最用心的一段恋爱。&lt;br /&gt;朋友们帮我和他表白，我想挽回一下。', '', null, '203', '201', '5501', 'luoke', '1399518012', '1401678012', '1401764412', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '3', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3415', '1', null, null, '10', '10', '8', '酒店会员卡设计', '标题：酒店&lt;a target=\"_blank\" href=\"http://www.zhubajie.com/c-mpkpsj/hyksj/p.html\"&gt;会员卡设计&lt;/a&gt;&lt;br /&gt;公司名称：邦禾酒店&nbsp;&nbsp;梦兰家纺旗舰店&lt;br /&gt;经营范围：精品酒店客户销售、梦兰品牌高档床上用品销售&lt;br /&gt;参考样本：昆明云上四季、星巴克等各类会员卡。（可上去哪儿、携程等网站搜索“芒市邦禾酒店&quot;,和百度“梦兰”对&lt;a target=\"_blank\" href=\"http://www.zhubajie.com/c-logovi/\"&gt;设计&lt;/a&gt;主体进行了解）&lt;br /&gt;主要用途：酒店会员卡和床品销售打折卡&lt;br /&gt;&lt;br /&gt;具体要求：&lt;br /&gt;一、设计要求：&lt;br /&gt;1、设计要求正面为：邦禾酒店会员面，背面为：梦兰床品优惠面（一张卡两用，两店均为一家公司投资）&lt;br /&gt;2、表现要求:酒店面有东南亚风格或傣族风情，床品面与梦兰宣传主题风格为主，简洁高雅。&lt;br /&gt;3、作品风格、外观形式可多样化，如上述第2点对设计思路有限制，也可不做考虑，大胆创新，但不可改变原.（酒店LOGO可在附件中下载,床品LOGO可从江苏梦兰官网或百度图片搜索根据设计来选定。）&lt;br /&gt;4、设计规格均为正度8开或16开，&nbsp;同时配有简要或详细说明。&lt;br /&gt;5、必须是彩色原稿，能以不同的&nbsp;比例尺寸清晰显示。&lt;br /&gt;6、标识应为平面形式，可用于各类广告、宣传品及办公用品的印刷。请在设计中考虑二维码图案的摆放位置。', '', null, '222', '218', '5502', '洛克', '1399518008', '1401678008', '1401764408', '1400053154', null, '100.00', '90.00', null, '100.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '1', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3420', '5', null, '1000.00', '10', '10', '8', '求游戏策划', '想制作一个手游，急需好的策划，我们共同合作', '', null, '96', '249', '1', 'admin', '1399531121', '1403851121', '1403851121', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '2', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3421', '4', null, null, null, null, '8', '活动策划', '&lt;p&gt;大型活动策划&lt;/p&gt;&lt;p&gt;需要有经验的人士，只要起到一定的反响，赏金绝对不是问题&lt;br /&gt;&lt;/p&gt;', '', null, '257', '249', '5501', 'luoke', '1399531365', '1408171365', '1408344165', '1400053154', null, '3000.00', '50.00', '35', '3000.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '12345678998', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3422', '5', null, '1000.00', '10', '10', '6', '测试任务打算', '测试任务打算测试任务打算测试任务打算测试任务打算测试任务打算测试任务打算', '', null, '205', '201', '1', 'admin', '1399542711', '1403862711', '1403862711', '1400053154', null, '1000.00', '30.00', '41', '2970.00', '0.00', '0', '1', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');
INSERT INTO keke_witkey_task VALUES ('3423', '5', null, '1500.00', '10', '10', '6', '测试定金招标', '测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标测试定金招标', '', null, '204', '201', '1', 'admin', '1399628630', '1403948630', '1403948630', '1400053154', null, '1000.00', '30.00', '41', '3470.00', '0.00', '0', '2', '0', '0', '0', '0', '0', null, '0.00', '15021201201', null, null, null, '0', null, '0', null, '0', null, '0', '0', null, 'a:2:{s:3:\"top\";i:1000000000;s:6:\"urgent\";i:1000000000;}', '0', null, null, null, null, null, '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_task_bid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_bid`;
CREATE TABLE `keke_witkey_task_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `quote` decimal(8,2) DEFAULT '0.00',
  `cycle` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `message` text,
  `bid_status` int(11) DEFAULT '0',
  `bid_time` int(11) DEFAULT '0',
  `hidden_status` int(11) DEFAULT NULL,
  `ext_status` int(11) DEFAULT NULL,
  `comment_num` int(11) DEFAULT '0',
  `is_view` tinyint(1) DEFAULT '0',
  `hasdel` tinyint(4) unsigned NOT NULL COMMENT '用户中心我的稿件删除后的状态，如果删除状态为1,默认为0,当状态为1的时候 不在我的稿件中显示。',
  `workhide` int(11) DEFAULT '0',
  PRIMARY KEY (`bid_id`),
  KEY `index_2` (`task_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`bid_status`)
) ENGINE=MyISAM AUTO_INCREMENT=404 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_bid
-- ----------------------------
INSERT INTO keke_witkey_task_bid VALUES ('361', '3342', '5501', 'luoke', '100.00', '10', '浙江省,湖州市,德清县', '哈哈哈，这个我可以做啊。不错啊', '7', '1398738734', '2', null, '1', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('362', '3344', '5495', '小鸟', '1000.00', '6', '湖北省,武汉市,', '我交稿你怎么看，但是 是的发的', '8', '1398739554', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('363', '3344', '5500', '艾仁', '200.00', '1', '湖北省,武汉市,', '个地方官发给发给地方鬼地方个发的', '4', '1398740490', null, '2', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('364', '3346', '5500', '艾仁', '1000.00', '15', '湖北省,武汉市,', '润物无声范德萨的发斯蒂芬是的发送到范德萨发送到', '0', '1398741783', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('365', '3346', '5495', '小鸟', '1200.00', '12', '湖北省,武汉市,', '味儿我儿味儿儿we热舞人我，人儿我热舞人味儿我。', '4', '1398741828', null, '2', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('366', '3349', '1', 'admin', '1000.00', '12', '陕西省,西安市,新城区', '发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对发的反对反对反对反对', '0', '1398761223', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('367', '3350', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '发第三方斯蒂芬斯蒂芬', '4', '1398762291', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('368', '3342', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '我要交稿的发地方地方地方地方地方的', '4', '1398824546', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('369', '3348', '5501', 'luoke', '100.00', '10', '江苏省,镇江市,丹阳市', '我能完成任务，就交给我吧', '0', '1398827139', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('370', '3348', '5500', '艾仁', '1000.00', '10', '湖北省,武汉市,', '我交稿发但是发的范德萨发的发送到发是的', '4', '1398828095', null, '2', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('371', '3359', '5500', '艾仁', '1000.00', '10', '湖北省,武汉市,', '地方撒发送到发的范德萨发的说法，说法斯蒂芬是的范德萨', '4', '1398828499', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('372', '3365', '0', null, '1000.00', '10', '湖北省,武汉市,', '发斯蒂芬斯蒂芬是的发送到发送到发送到方式地方斯蒂芬是的发是的', '0', '1399281148', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('373', '3367', '1', 'admin', '1000.00', '10', '陕西省,西安市,新城区', '范围而为热舞肉味儿玩儿玩儿玩儿', '0', '1399281985', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('374', '3385', '5504', '下线的下线', '1000.00', '10', '湖南省,长沙市,', '不是好朋友，大是的是的撒的撒的撒的撒。', '4', '1399345941', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('375', '3385', '5495', '小鸟', '1200.00', '10', '湖北省,武汉市,', '大撒旦撒旦撒的撒打算', '7', '1399345976', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('376', '3387', '5504', '下线的下线', '1000.00', '10', '湖北省,武汉市,', '斯蒂芬三的发生的范德萨', '4', '1399346845', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('377', '3387', '5495', '小鸟', '1000.00', '9', '湖北省,武汉市,', '是的范德萨范德萨发生的发送到发送到', '7', '1399346862', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('378', '3393', '5501', 'luoke', '2000.00', '7', '湖北省,武汉市,', '报名，有这方面的经验啊', '4', '1399354885', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('379', '3395', '5501', 'luoke', '2000.00', '8', '北京市,朝阳区,三里屯街道', '撒的范德萨发顺丰丰东股份', '4', '1399355417', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('380', '3396', '1', 'admin', '1000.00', '10', '陕西省,西安市,新城区', '我要打算的说法的方式地方斯蒂芬，发是的发送到范德萨发斯蒂芬是的。', '4', '1399355611', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('381', '3397', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '撒打算打算发送到方式', '4', '1399356981', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('382', '3401', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '的萨达萨达飒飒大师打算发送到发送到', '7', '1399363152', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('383', '3401', '5504', '下线的下线', '1000.00', '10', '广东省,广州市,', '阿萨德撒打算打算打算发送到发送到', '7', '1399363303', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('384', '3402', '5504', '下线的下线', '1000.00', '10', '湖南省,长沙市,', '发送到发送到发送到的萨达萨达', '0', '1399364172', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('385', '3402', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '发斯蒂芬斯蒂芬是的发送到发送到，发是的发送到发送到发是。', '0', '1399364271', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('386', '3406', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '我要报价但是发的撒旦发斯蒂芬说的地方，斯蒂芬斯蒂芬是的发的发是的。', '4', '1399442510', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('387', '3407', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '发发生地方第三方但是发送到发送到发是的，方式地方斯蒂芬是的发送到发是。', '8', '1399442714', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('388', '3408', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '儿玩儿而卧肉味儿热舞儿we，热温柔we热舞人我', '4', '1399442909', null, '2', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('389', '3408', '5504', '下线的下线', '1200.00', '12', '湖南省,长沙市,', '斯蒂芬地方是的发送到发送到发的发是的', '0', '1399442945', null, null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('390', '3409', '5495', '小鸟', '500.00', '5', '湖北省,武汉市,', '肉味儿味儿额外地方的范德萨，的撒发斯蒂芬是的方式的。', '4', '1399445488', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('391', '3418', '5501', 'luoke', '300.00', '10', '湖北省,潜江市,潜江市', '额特特特特特特温热污染', '4', '1399530218', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('392', '3420', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', 'V大分说地方个梵蒂冈梵蒂冈地方', '4', '1399531204', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('393', '3421', '1', 'admin', '2000.00', '10', '贵州省,六盘水市,盘县', '我可以参加，绝对没有问题', '4', '1399531653', null, '2', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('394', '3422', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '我要搬家咯范德萨发的发送到', '4', '1399542746', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('395', '3423', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '我的斯蒂芬地方斯蒂芬是的发送到范德萨发是的', '7', '1399628756', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('396', '3423', '5504', '下线的下线', '1500.00', '12', '湖北省,武汉市,', '发斯蒂芬是的范德萨方式地方的说法是的', '4', '1399628835', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('397', '3360', '5502', '洛克', '1000.00', '10', '湖北省,武汉市,', '我要报价的撒的撒的安生的，的撒的撒的撒的撒打算。的阿萨德撒的撒的撒的。', '4', '1399701651', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('398', '3431', '5495', '小鸟', '1000.00', '10', '湖北省,武汉市,', '的说法斯蒂芬的发送到，地方是的发斯蒂芬是的方式。', '4', '1399705583', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('399', '3441', '4', '注册', '1000.00', '10', '湖北省,武汉市,', '发的说发送到范德萨发第三方是的范德萨范德萨', '4', '1399880278', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('400', '3441', '3', '测试注册', '1000.00', '10', '江西省,南昌市,', '斯蒂芬是的发送到方式发斯蒂芬斯蒂芬', '0', '1399880345', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('401', '3437', '4', '注册', '1000.00', '10', '广东省,广州市,', '发第三方说地方斯蒂芬是的发送到发生大放送', '0', '1399882667', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('402', '3443', '4', '注册', '1000.00', '10', '江西省,南昌市,', '发第三方的所发生的发送到', '0', '1399884741', '2', null, '0', '1', '0', '0');
INSERT INTO keke_witkey_task_bid VALUES ('403', '3444', '4', '注册', '1000.00', '10', '广东省,广州市,', '发的撒发斯蒂芬是的归属地发生的故事的法规发送到', '7', '1399884867', null, null, '0', '1', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_task_cash_cove`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_cash_cove`;
CREATE TABLE `keke_witkey_task_cash_cove` (
  `cash_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_cove` float(10,0) DEFAULT NULL,
  `end_cove` float(10,0) DEFAULT NULL,
  `cove_desc` varchar(250) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `model_code` char(20) DEFAULT NULL,
  PRIMARY KEY (`cash_rule_id`),
  KEY `cash_rule_id` (`cash_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_cash_cove
-- ----------------------------
INSERT INTO keke_witkey_task_cash_cove VALUES ('34', '1', '1000', '1.00元-1000.00元', '1364809796', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('29', '1000', '2000', '1000.00元-2000.00元', '1335433861', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('35', '1000', '3000', '1000.00元-3000.00元', '1335433911', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('30', '2000', '5000', '2000.00元-5000.00元', '1335433868', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('31', '5000', '10000', '5000.00元-10000.00元', '1335433874', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('32', '10000', '20000', '10000.00元-20000.00元', '1361777385', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('49', '1', '1000', '1.00元-1000.00元', '1373009791', 'match');
INSERT INTO keke_witkey_task_cash_cove VALUES ('36', '3000', '6000', '3000.00元-6000.00元', '1335433916', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('37', '6000', '10000', '6000.00元-10000.00元', '1364794823', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('38', '10000', '20000', '10000.00元-20000.00元', '1335433927', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('39', '20000', '30000', '20000.00元-30000.00元', '1335433933', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('40', '30000', '50000', '30000.00元-50000.00元', '1337765520', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('41', '100', '1000', '100.00元-1000.00元', '1364613461', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('42', '30000', '40000', '30000.00元-40000.00元', '1354850418', 'dtender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('43', '50000', '60000', '50000.00元-60000.00元', '1354850436', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('50', '40000', '50000', '40000.00元-50000.00元', '1397731932', 'dtender');

-- ----------------------------
-- Table structure for `keke_witkey_task_delay`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay`;
CREATE TABLE `keke_witkey_task_delay` (
  `delay_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `delay_cash` decimal(10,2) DEFAULT '0.00',
  `delay_day` int(10) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `delay_status` int(11) DEFAULT '0',
  PRIMARY KEY (`delay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_delay
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_delay_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay_rule`;
CREATE TABLE `keke_witkey_task_delay_rule` (
  `defer_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `defer_times` int(11) DEFAULT '0',
  `defer_rate` float(11,2) DEFAULT '0.00',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`defer_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_delay_rule
-- ----------------------------
INSERT INTO keke_witkey_task_delay_rule VALUES ('31', '1', '10.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('28', '3', '2.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('27', '2', '3.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('36', '3', '2.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('38', '2', '10.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('35', '3', '5.00', '2');
INSERT INTO keke_witkey_task_delay_rule VALUES ('37', '1', '20.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('29', '1', '10.00', '2');
INSERT INTO keke_witkey_task_delay_rule VALUES ('19', '2', '20.00', '2');

-- ----------------------------
-- Table structure for `keke_witkey_task_frost`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_frost`;
CREATE TABLE `keke_witkey_task_frost` (
  `frost_id` int(11) NOT NULL AUTO_INCREMENT,
  `frost_status` int(11) DEFAULT '0',
  `task_id` int(11) DEFAULT '0',
  `frost_time` int(11) DEFAULT '0',
  `restore_time` int(11) DEFAULT '0',
  `admin_uid` int(11) DEFAULT '0',
  `admin_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`frost_id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_frost
-- ----------------------------
INSERT INTO keke_witkey_task_frost VALUES ('184', '2', '2874', '1370760188', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('183', '2', '2878', '1370759951', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('182', '2', '2916', '1370759756', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('181', '2', '2869', '1370759530', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('146', '2', '1447', '1353638098', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('149', '2', '1451', '1354071610', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('157', '2', '1472', '1355552595', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('161', '2', '1533', '1356398117', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('162', '2', '1623', '1356498815', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('164', '2', '1278', '1359104030', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('165', '2', '1287', '1359104031', '0', '1', 'admin');
INSERT INTO keke_witkey_task_frost VALUES ('166', '2', '2836', '1369383902', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('179', '2', '2864', '1370592556', '0', '0', '');
INSERT INTO keke_witkey_task_frost VALUES ('168', '2', '2867', '1370587131', '0', '0', '');

-- ----------------------------
-- Table structure for `keke_witkey_task_plan`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_plan`;
CREATE TABLE `keke_witkey_task_plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `plan_title` varchar(150) DEFAULT NULL,
  `plan_desc` text,
  `plan_step` tinyint(4) DEFAULT NULL,
  `plan_amount` decimal(10,2) DEFAULT '0.00',
  `plan_status` char(10) DEFAULT NULL,
  `start_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT NULL,
  `over_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`plan_id`),
  UNIQUE KEY `plan_id` (`plan_id`),
  KEY `task_id` (`task_id`),
  KEY `bid_id` (`bid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=390 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_plan
-- ----------------------------
INSERT INTO keke_witkey_task_plan VALUES ('350', '357', '3318', '给一部分名字', '', '1', '300.00', '0', '1398614400', '1398787200', null);
INSERT INTO keke_witkey_task_plan VALUES ('351', '357', '3318', '沟通后挑选更适合的名字', '', '2', '200.00', '2', '1398787200', '1398873600', '1398667784');
INSERT INTO keke_witkey_task_plan VALUES ('352', '358', '3319', '第一步设计', '', '1', '500.00', '2', '1398528000', '1398787200', '1398668395');
INSERT INTO keke_witkey_task_plan VALUES ('353', '358', '3319', '第二部完工', '', '2', '500.00', '2', '1398873600', '1398960000', '1398668420');
INSERT INTO keke_witkey_task_plan VALUES ('354', '359', '3320', '一次性完成工作吧', '', '1', '1000.00', '0', '1398441600', '1398960000', null);
INSERT INTO keke_witkey_task_plan VALUES ('355', '360', '3320', '第一步计划', '', '1', '200.00', '0', '1398441600', '1398614400', null);
INSERT INTO keke_witkey_task_plan VALUES ('356', '360', '3320', '第二部完成', '', '2', '300.00', '0', '1398700800', '1398787200', null);
INSERT INTO keke_witkey_task_plan VALUES ('357', '361', '3342', '完成第一阶段任务', '', '1', '50.00', '0', '1398700800', '1398787200', null);
INSERT INTO keke_witkey_task_plan VALUES ('358', '361', '3342', '', '', '2', '0.00', '0', '0', '0', null);
INSERT INTO keke_witkey_task_plan VALUES ('359', '367', '3350', '第一阶段的工作完成', '', '1', '500.00', '2', '1398441600', '1398614400', '1398767524');
INSERT INTO keke_witkey_task_plan VALUES ('360', '367', '3350', '第二阶段的工作完成', '', '2', '500.00', '2', '1398614400', '1398873600', '1398767623');
INSERT INTO keke_witkey_task_plan VALUES ('361', '368', '3342', '计划工作全部完成交付', '', '1', '1000.00', '0', '1398441600', '1399305600', null);
INSERT INTO keke_witkey_task_plan VALUES ('362', '371', '3359', '第一阶段万得城', '', '1', '500.00', '2', '1398441600', '1398700800', '1398832167');
INSERT INTO keke_witkey_task_plan VALUES ('363', '371', '3359', '第二阶段完成吧', '', '2', '500.00', '2', '1398873600', '1399046400', '1398832186');
INSERT INTO keke_witkey_task_plan VALUES ('364', '372', '3365', '全部完工', '', '1', '500.00', '0', '1398528000', '1398700800', null);
INSERT INTO keke_witkey_task_plan VALUES ('365', '379', '3395', '完成第一阶段', '', '1', '1000.00', '2', '1399392000', '1399478400', '1399361158');
INSERT INTO keke_witkey_task_plan VALUES ('366', '379', '3395', '', '', '2', '1000.00', '2', '1399478400', '1399564800', '1399361201');
INSERT INTO keke_witkey_task_plan VALUES ('367', '380', '3396', '计划一', '', '1', '500.00', '0', '1399305600', '1399564800', null);
INSERT INTO keke_witkey_task_plan VALUES ('368', '380', '3396', '计划2', '', '2', '500.00', '0', '1399651200', '1399996800', null);
INSERT INTO keke_witkey_task_plan VALUES ('369', '381', '3397', '1', '', '1', '500.00', '2', '1399392000', '1399737600', '1399360656');
INSERT INTO keke_witkey_task_plan VALUES ('370', '381', '3397', '2', '', '2', '500.00', '0', '1399824000', '1400688000', null);
INSERT INTO keke_witkey_task_plan VALUES ('371', '384', '3402', '工商的', '', '1', '1000.00', '0', '1399392000', '1399219200', null);
INSERT INTO keke_witkey_task_plan VALUES ('372', '385', '3402', '1', '', '1', '500.00', '0', '1399305600', '1399564800', null);
INSERT INTO keke_witkey_task_plan VALUES ('373', '385', '3402', '2', '', '2', '500.00', '0', '1399478400', '1399651200', null);
INSERT INTO keke_witkey_task_plan VALUES ('374', '386', '3406', '1cx0', '', '1', '1000.00', '0', '1399478400', '1400601600', null);
INSERT INTO keke_witkey_task_plan VALUES ('375', '387', '3407', '魂飞胆丧发的', '', '1', '1000.00', '0', '1399478400', '1400515200', null);
INSERT INTO keke_witkey_task_plan VALUES ('376', '390', '3409', '非常手段', '', '1', '500.00', '2', '1399478400', '1400515200', '1399449115');
INSERT INTO keke_witkey_task_plan VALUES ('377', '391', '3418', '完成第一阶段任务', '', '1', '100.00', '0', '1399564800', '1399651200', null);
INSERT INTO keke_witkey_task_plan VALUES ('378', '391', '3418', '', '', '2', '200.00', '0', '1399651200', '1399910400', null);
INSERT INTO keke_witkey_task_plan VALUES ('379', '392', '3420', '计划一', '', '1', '500.00', '2', '1399478400', '1399737600', '1399534909');
INSERT INTO keke_witkey_task_plan VALUES ('380', '392', '3420', '计划二', '', '2', '500.00', '2', '1399737600', '1399910400', '1399534940');
INSERT INTO keke_witkey_task_plan VALUES ('381', '394', '3422', '完工', '', '1', '1000.00', '0', '1399564800', '1400342400', null);
INSERT INTO keke_witkey_task_plan VALUES ('382', '395', '3423', '10', '', '1', '1000.00', '0', '1399651200', '1400515200', null);
INSERT INTO keke_witkey_task_plan VALUES ('383', '396', '3423', '15', '', '1', '1500.00', '0', '1399651200', '1400947200', null);
INSERT INTO keke_witkey_task_plan VALUES ('384', '397', '3360', '10', '', '1', '1000.00', '0', '1399737600', '1400601600', null);
INSERT INTO keke_witkey_task_plan VALUES ('385', '398', '3431', '10', '', '1', '1000.00', '2', '1399737600', '1400515200', '1399710698');
INSERT INTO keke_witkey_task_plan VALUES ('386', '399', '3441', '10', '', '1', '1000.00', '0', '1399910400', '1400169600', null);
INSERT INTO keke_witkey_task_plan VALUES ('387', '400', '3441', '10', '', '1', '1000.00', '0', '1400083200', '1400947200', null);
INSERT INTO keke_witkey_task_plan VALUES ('388', '401', '3437', '10', '', '1', '1000.00', '0', '1399996800', '1400860800', null);
INSERT INTO keke_witkey_task_plan VALUES ('389', '402', '3443', '10', '', '1', '1000.00', '0', '1399910400', '1400774400', null);

-- ----------------------------
-- Table structure for `keke_witkey_task_prize`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_prize`;
CREATE TABLE `keke_witkey_task_prize` (
  `prize_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `prize` int(11) DEFAULT NULL,
  `prize_count` int(11) DEFAULT NULL,
  `prize_cash` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`prize_id`),
  KEY `task_id` (`task_id`),
  KEY `prize_id` (`prize_id`)
) ENGINE=MyISAM AUTO_INCREMENT=568 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_prize
-- ----------------------------
INSERT INTO keke_witkey_task_prize VALUES ('527', '3323', '1', '1', '120.00');
INSERT INTO keke_witkey_task_prize VALUES ('528', '3325', '1', '1', '150.00');
INSERT INTO keke_witkey_task_prize VALUES ('529', '3325', '2', '2', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('530', '3332', '1', '2', '200.00');
INSERT INTO keke_witkey_task_prize VALUES ('531', '3334', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('532', '3339', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('533', '3351', '1', '1', '150.00');
INSERT INTO keke_witkey_task_prize VALUES ('534', '3353', '1', '1', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('535', '3353', '2', '2', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('536', '3354', '1', '1', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('537', '3354', '2', '2', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('538', '3356', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('539', '3356', '2', '2', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('540', '3358', '1', '1', '80.00');
INSERT INTO keke_witkey_task_prize VALUES ('541', '3358', '2', '1', '20.00');
INSERT INTO keke_witkey_task_prize VALUES ('542', '3372', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('543', '3373', '1', '1', '80.00');
INSERT INTO keke_witkey_task_prize VALUES ('544', '3373', '2', '2', '20.00');
INSERT INTO keke_witkey_task_prize VALUES ('545', '3374', '1', '1', '80.00');
INSERT INTO keke_witkey_task_prize VALUES ('546', '3374', '2', '2', '20.00');
INSERT INTO keke_witkey_task_prize VALUES ('547', '3375', '1', '2', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('548', '3376', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('549', '3377', '1', '1', '80.00');
INSERT INTO keke_witkey_task_prize VALUES ('550', '3377', '2', '2', '20.00');
INSERT INTO keke_witkey_task_prize VALUES ('551', '3388', '1', '1', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('552', '3388', '2', '2', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('553', '3394', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('554', '3399', '1', '2', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('555', '3405', '1', '1', '300.00');
INSERT INTO keke_witkey_task_prize VALUES ('556', '3405', '2', '2', '300.00');
INSERT INTO keke_witkey_task_prize VALUES ('557', '3405', '3', '3', '300.00');
INSERT INTO keke_witkey_task_prize VALUES ('558', '3411', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('559', '3416', '1', '2', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('560', '3417', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('561', '3429', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('562', '3436', '1', '1', '100.00');
INSERT INTO keke_witkey_task_prize VALUES ('563', '3440', '1', '1', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('564', '3440', '2', '2', '50.00');
INSERT INTO keke_witkey_task_prize VALUES ('565', '3442', '1', '2', '300.00');
INSERT INTO keke_witkey_task_prize VALUES ('566', '3442', '2', '4', '300.00');
INSERT INTO keke_witkey_task_prize VALUES ('567', '3442', '3', '6', '300.00');

-- ----------------------------
-- Table structure for `keke_witkey_task_time_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_time_rule`;
CREATE TABLE `keke_witkey_task_time_rule` (
  `day_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_cash` float(10,2) DEFAULT '0.00',
  `rule_day` int(11) DEFAULT '0',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`day_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1364 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_time_rule
-- ----------------------------
INSERT INTO keke_witkey_task_time_rule VALUES ('1361', '100.00', '50', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1318', '100.00', '10', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1358', '100.00', '50', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1360', '200.00', '60', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1319', '500.00', '20', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1320', '2000.00', '30', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1321', '4000.00', '40', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1323', '2000.00', '10', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1324', '3000.00', '20', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1325', '4000.00', '30', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1328', '7000.00', '50', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1329', '10000.00', '60', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1332', '1000.00', '5', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1340', '100.00', '5', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1362', '1000.00', '100', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1363', '100.00', '50', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1341', '500.00', '10', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1342', '1000.00', '15', '10');
-- ----------------------------
-- Table structure for `keke_witkey_task_work`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_work`;
CREATE TABLE `keke_witkey_task_work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` char(50) DEFAULT NULL,
  `work_title` varchar(100) DEFAULT NULL,
  `work_price` decimal(10,3) DEFAULT '0.000',
  `work_desc` text,
  `work_file` varchar(100) DEFAULT NULL,
  `work_pic` text,
  `work_time` int(11) DEFAULT '0',
  `hide_work` int(11) DEFAULT NULL,
  `vote_num` int(11) unsigned DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `work_status` int(11) DEFAULT '0',
  `is_view` tinyint(1) DEFAULT '0',
  `hasdel` tinyint(4) unsigned NOT NULL COMMENT '用户中心我的稿件删除后的状态，如果删除状态为1,默认为0,当状态为1的时候 不在我的稿件中显示。',
  `workhide` int(11) DEFAULT '0',
  PRIMARY KEY (`work_id`),
  KEY `task_id` (`task_id`),
  KEY `uid` (`uid`),
  KEY `work_status` (`work_status`),
  KEY `work_time` (`work_time`)
) ENGINE=MyISAM AUTO_INCREMENT=2153 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_task_work
-- ----------------------------
INSERT INTO keke_witkey_task_work VALUES ('2045', '3322', '5499', '七星设计', '嵌入式软硬件开发~改装POS机的稿件', '0.000', '我很有经验，开发过很多，选我吧', null, null, '1398669963', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2046', '3343', '5495', '小鸟', '生日祝福短信征集', '0.000', '我想替你送祝福，接受我的稿件吧&lt;img alt=\"微笑\" src=\"static/js/xheditor/xheditor_emot/default/smile.gif\" /&gt;', null, null, '1398736323', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2047', '3322', '5495', '小鸟', '嵌入式软硬件开发~改装POS机的稿件', '0.000', '梵蒂冈梵蒂冈地方个梵蒂冈发的刚v法规发送到', null, null, '1398743492', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2048', '3347', '1', 'admin', '网站论坛推广营销方案的稿件', '0.000', '的撒旦奥苏打算的撒打算的撒大是', null, null, '1398748808', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2049', '3347', '5500', '艾仁', '网站论坛推广营销方案的稿件', '0.000', '师傅的说法斯蒂芬是的发送到发送到发送到&nbsp;', null, null, '1398748841', '0', '0', '0', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2050', '3351', '5495', '小鸟', '【加急】给女友道歉的短信', '0.000', '&lt;p&gt;&nbsp; &nbsp;我要交稿&lt;/p&gt;&lt;p&gt;可以选我吗？我能做到你想要的&lt;/p&gt;', null, null, '1398762873', '0', '0', '1', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2051', '3352', '5501', 'luoke', '额滴神放松放松发顺丰', '0.000', '3ewrwrwtrwrw', null, null, '1398763989', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2052', '3354', '1', 'admin', 'rewrewrwrewrwerwr', '0.000', 't特瑞特热特特n郭德纲的刚', null, null, '1398765037', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2053', '3338', '1', 'admin', '阿里巴巴全国专业批发市场大调研的稿件', '0.000', '&lt;p&gt;我但是方式地方的说法是的范德萨&lt;/p&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp; 范德萨方式的的说法是的发送到发送到是的&lt;/p&gt;', null, null, '1398824944', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2054', '3338', '1', 'admin', '阿里巴巴全国专业批发市场大调研的稿件', '0.000', '&lt;p&gt;我要测试编辑框的作用，&lt;/p&gt;&lt;p&gt;但是好像有问题啊，这改怎么办呢？&lt;br /&gt;&lt;/p&gt;', null, null, '1398824979', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2055', '3338', '1', 'admin', '阿里巴巴全国专业批发市场大调研的稿件', '0.000', '&lt;span style=\"color:#CC0000;\"&gt;范德萨法第三方但是法第三方&lt;/span&gt;&lt;br /&gt;', null, null, '1398825402', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2056', '3358', '5500', '艾仁', '小型设备图标设计', '0.000', '&lt;p&gt;&lt;span style=\"color:#ff9966;\"&gt;我要交稿啊，你要漩涡啊&lt;/span&gt;&lt;/p&gt;', null, null, '1398827687', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2057', '3358', '5500', '艾仁', '小型设备图标设计', '0.000', '再交一个，提高中标率', null, null, '1398827706', '0', '0', '0', '1', '1', '1', '0');
INSERT INTO keke_witkey_task_work VALUES ('2058', '3358', '5501', 'luoke', '小型设备图标设计', '0.000', '我能完成这个任务，交给我吧', null, null, '1398827884', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2059', '3355', '1', 'admin', '金融行业投资公司LOGO设计的稿件', '0.000', '我能完成这个工作，交给我没问题', '5650', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/22762866153606bd6eaf54.jpg', '1398827993', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2060', '3327', '1', 'admin', '小说原创网站建设的稿件', '0.000', '我可以完成这个任务，请选择我吧', '5663', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/04/30/8156446155360880468429.jpg', '1398835205', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2061', '3361', '1', 'admin', '需要会开发借口的程序员的稿件', '0.000', '&lt;p&gt;&lt;span style=\"color:#FF0000;\"&gt;法第三方地方但是范德萨发送到&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color:#FF0000;\"&gt;&nbsp;&nbsp; 范德萨发地方的发送到发送到但是发送到发&lt;/span&gt;&lt;br /&gt;&lt;/p&gt;', null, null, '1398851041', '0', '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2062', '3361', '1', 'admin', '需要会开发借口的程序员的稿件', '0.000', '&lt;p&gt;&lt;span style=\"color:#FF0000;\"&gt;&lt;strong&gt;说的发送到发送到发送到发是，&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color:#FF0000;\"&gt;&lt;strong&gt;&nbsp;发送到发送到发送到发送到发送到发是的&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;/p&gt;', null, null, '1398851064', '0', '0', '0', '0', '1', '1', '0');
INSERT INTO keke_witkey_task_work VALUES ('2063', '3332', '5508', '安德敏的下线', '代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '0.000', '我要交稿，看看，推广我的人admin有没有得到钱', null, null, '1398853559', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2064', '3332', '5508', '安德敏的下线', '代写游戏（凡人修真2、神曲、热血三国2）原创游戏攻略', '0.000', '大撒旦撒旦撒热舞肉味儿额外', null, null, '1398853603', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2065', '3327', '5508', '安德敏的下线', '小说原创网站建设的稿件', '0.000', '推广测试，单人的额是的撒发斯蒂芬斯蒂芬是的', null, null, '1398853886', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2066', '3362', '5508', '安德敏的下线', '发斯蒂芬斯蒂芬', '0.000', '斯蒂芬第三方是的范德萨发送到', null, null, '1398854293', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2067', '3362', '5508', '安德敏的下线', '发斯蒂芬斯蒂芬', '0.000', '第二个稿件第二个稿件第二个稿件第二个稿件第二个稿件第二个稿件', null, null, '1398854331', null, '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2089', '3377', '5504', '下线的下线', '中标稿件但是的是', '0.000', '的撒旦撒旦撒旦撒旦d啊实打实大师', null, null, '1399343098', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2088', '3377', '5504', '下线的下线', '中标稿件但是的是', '0.000', '中创信测自行车想创造性重新装才，才最新操作下次自行车最新创造性&nbsp;', null, null, '1399343088', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2091', '3379', '5502', '洛克', '艺术照处理的稿件', '0.000', '萨芬撒飞洒飞洒发顺丰', '5721', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/7237002153684a54e3d89.jpg', '1399343702', '0', '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2090', '3377', '5504', '下线的下线', '中标稿件但是的是', '0.000', '的倒萨打算打算的撒旦长达撒大师的撒', null, null, '1399343105', '0', '0', '0', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2092', '3379', '5501', 'luoke', '艺术照处理的稿件', '0.000', '我能完成任务t容易让他', '5719,5722', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/1576166063536849f485760.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/119900229753684a6234662.jpg', '1399343718', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2073', '3369', '5504', '下线的下线', '计件悬赏举报任务测试', '0.000', '我要交稿的是但是发的说法的说法是的发', null, null, '1399282924', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2074', '3369', '5504', '下线的下线', '计件悬赏举报任务测试', '0.000', '大撒旦撒旦撒的撒的撒', null, null, '1399282932', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2075', '3369', '5504', '下线的下线', '计件悬赏举报任务测试', '0.000', '发斯蒂芬斯蒂芬说法的说法斯蒂芬是的发的', null, null, '1399282939', null, '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2076', '3370', '5504', '下线的下线', '范德萨发斯蒂芬', '0.000', '儿额儿童热太热特瑞特', null, null, '1399283132', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2093', '3380', '5504', '下线的下线', '发送到但是发送到', '0.000', '我要交稿但是的是发送到方式地方是的v', null, null, '1399344466', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2079', '3372', '5504', '下线的下线', '多人悬赏举报任务', '0.000', 'r味儿我二位二位二位热热肉味儿', null, null, '1399283579', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2080', '3372', '5504', '下线的下线', '多人悬赏举报任务', '0.000', 'f但是的撒发斯蒂芬是的发送到发斯蒂芬', null, null, '1399283592', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2081', '3373', '5495', '小鸟', '说法地方撒到底是', '0.000', '发斯蒂芬说的发送到发送到发是的吗，是的发的说法但是发送到发送到发是的。', null, null, '1399340158', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2082', '3373', '5495', '小鸟', '说法地方撒到底是', '0.000', '大撒旦撒旦撒的撒大大撒', null, null, '1399340167', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2083', '3373', '5495', '小鸟', '说法地方撒到底是', '0.000', '的大撒旦撒旦撒的撒打算', null, null, '1399340182', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2084', '3374', '5495', '小鸟', '斯蒂芬发送到', '0.000', '第三方的说法是范德萨发送到的说法，鬼地方规定发鬼地方', null, null, '1399340446', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2085', '3374', '5495', '小鸟', '斯蒂芬发送到', '0.000', '阿萨德撒的撒旦撒，大撒旦撒旦撒的撒', null, null, '1399340457', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2086', '3375', '5495', '小鸟', '撒大师的撒', '0.000', '威尔额外认为二位，发送到发送到发送到', null, null, '1399340672', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2087', '3376', '5495', '小鸟', '大啊是的撒', '0.000', '啊的撒大师的撒撒打算打算说大撒旦撒旦撒', null, null, '1399341110', '0', '0', '0', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2094', '3380', '5504', '下线的下线', '发送到但是发送到', '0.000', '斯蒂芬是的范德萨范德萨发送到说法的说法三大', null, null, '1399344473', null, '0', '0', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2095', '3381', '5501', 'luoke', '网站Logo设计的稿件', '0.000', '我能完成这个任务，选择我吧', null, null, '1399344592', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2096', '3382', '5504', '下线的下线', '突然有人同意让他的稿件', '0.000', '我压迫交稿啊 &nbsp;的撒的是的撒打算的阿萨德啊', null, null, '1399345123', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2097', '3382', '5504', '下线的下线', '突然有人同意让他的稿件', '0.000', '斯蒂芬第三方的所发生的法第三方第三方', null, null, '1399345132', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2143', '3414', '1', 'admin', '发短信跟我四年的男朋友表白的稿件', '0.000', '日我让我确认温热污染我热温热污染', null, null, '1399860768', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2144', '3438', '5517', '想玲', '动漫周边商城网站的稿件', '0.000', '本投标仅雇主可见。 若您是该任务的雇主，请登录后查看。', null, null, '1399867189', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2100', '3384', '5501', 'luoke', '汇诚Logo设计的稿件', '0.000', '我能完成我能完成。。。。', '5725', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/762399506536853365ee24.jpg', '1399345975', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2101', '3386', '5501', 'luoke', '小太阳取暖器外观设计和结构设计的稿件', '0.000', '撒大大的大大大的阿达的', null, null, '1399346287', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2102', '3388', '5501', 'luoke', '向朋友表白，求丽江视频', '0.000', '11111111111111', null, null, '1399347192', '0', '0', '0', '8', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2103', '3388', '5501', 'luoke', '向朋友表白，求丽江视频', '0.000', '222222222222', null, null, '1399347199', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2104', '3388', '5501', 'luoke', '向朋友表白，求丽江视频', '0.000', '33333333333', null, null, '1399347206', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2105', '3388', '5501', 'luoke', '向朋友表白，求丽江视频', '0.000', '4444444444444444', null, null, '1399347214', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2106', '3390', '5504', '下线的下线', '计件循环是哪', '0.000', '的撒旦阿萨德阿萨德阿萨德安生，的阿萨德安生打算&lt;img alt=\"微笑\" src=\"static/js/xheditor/xheditor_emot/default/smile.gif\" /&gt;', null, null, '1399348149', null, '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2107', '3390', '5495', '小鸟', '计件循环是哪', '0.000', '阿打算打算大声道的撒打算', null, null, '1399348265', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2142', '3339', '5502', '洛克', '人格心理学线上問卷，每份7元', '0.000', '第三方说地方第三方斯蒂芬', null, null, '1399717159', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2110', '3391', '5501', 'luoke', '向朋友表白，制作一本个性相册，向各地朋友征稿', '0.000', '放松放松放松放松的冯绍峰孙菲菲萨芬撒飞洒飞洒发顺丰撒', null, null, '1399354515', null, '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2111', '3391', '5501', 'luoke', '向朋友表白，制作一本个性相册，向各地朋友征稿', '0.000', '的郭德纲的刚的打个盹', null, null, '1399354529', null, '0', '0', '6', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2112', '3392', '5495', '小鸟', '说的发送到的稿件', '0.000', '我但是的是发送到发送到发送到发送到发', null, null, '1399354759', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2113', '3394', '1', 'admin', '多人悬赏维权', '0.000', 'v需现场V型从V型从v程序程序程序程序程序', null, null, '1399355229', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2114', '3398', '1', 'admin', '发斯蒂芬斯蒂芬的稿件', '0.000', '第三方说地方斯蒂芬是的发送到', null, null, '1399360891', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2115', '3398', '1', 'admin', '发斯蒂芬斯蒂芬的稿件', '0.000', '啊实打实大师打算的撒', null, null, '1399361804', '0', '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2116', '3399', '5495', '小鸟', '的鬼地方梵蒂冈地方', '0.000', '发送到发送到发送到发送到', null, null, '1399362629', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2117', '3399', '5495', '小鸟', '的鬼地方梵蒂冈地方', '0.000', '斯蒂芬是的发送到方式发送到发送到发送到', null, null, '1399362838', '0', '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2118', '3400', '5495', '小鸟', '君傲范德萨', '0.000', '测试范德萨发送到发送到', null, null, '1399363024', null, '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2119', '3400', '5495', '小鸟', '君傲范德萨', '0.000', '三的发生的范德萨发送到方式', null, null, '1399363033', null, '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2120', '3403', '5495', '小鸟', '肉肉发发是的发送到的稿件', '0.000', '萨达四大四大大撒旦撒旦撒打算', null, null, '1399366164', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2121', '3404', '5495', '小鸟', '发斯蒂芬斯蒂芬的稿件', '0.000', '的范德萨发生的斯蒂芬说地方斯蒂芬是的发送到', null, null, '1399366333', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2122', '3405', '5495', '小鸟', '红烧鸡翅-红烧鱼', '0.000', '&lt;span class=\"meida-heading\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, \'Hiragino Sans GB\'; background-color: rgb(250, 250, 250);\"&gt;红烧鸡翅-红烧鱼不错&lt;/span&gt;', '5741,5742', 'http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/6885032435368a547106b5.jpg,http://www.kppw.cn/demo/kppw25/data/uploads/2014/05/06/18460514935368a54b126c5.jpg', '1399366989', '0', '0', '0', '3', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2147', '3439', '4', '注册', '发大幅度发送到的稿件', '0.000', '发送到斯蒂芬斯蒂芬是发送到发送到', null, null, '1399879869', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2135', '3415', '1', 'admin', '酒店会员卡设计的稿件', '0.000', '&lt;ol&gt;&lt;li&gt;特特瑞特人的郭德纲的刚的&lt;/li&gt;&lt;/ol&gt;', null, null, '1399600032', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2134', '3419', '5501', 'luoke', '政府集群网站开发的稿件', '0.000', '温热污染我让我让我确认', null, null, '1399529643', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2126', '3412', '5504', '下线的下线', '啊三发生地方第的稿件', '0.000', '发范德萨发生地方第三方地方第三方', null, null, '1399454328', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2127', '3412', '5495', '小鸟', '啊三发生地方第的稿件', '0.000', '斯蒂芬说地方斯蒂芬是的发送到', null, null, '1399454344', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2150', '3440', '4', '注册', '入围热污染', '0.000', '发斯蒂芬斯蒂芬斯蒂芬发生地方的吧', null, null, '1399880087', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2151', '3356', '4', '注册', '表白信息撰写', '0.000', '发斯蒂芬斯蒂芬第三方发送到发送到发送到', null, null, '1399884302', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2149', '3440', '4', '注册', '入围热污染', '0.000', '是的范德萨方式斯蒂芬范德萨范德萨范德萨发生的&nbsp;', null, null, '1399880076', '0', '0', '0', '2', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2148', '3440', '4', '注册', '入围热污染', '0.000', '人为污染味儿我斯蒂芬斯蒂芬，发送到发送到', null, null, '1399880068', '0', '0', '0', '1', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2146', '3439', '4', '注册', '发大幅度发送到的稿件', '0.000', '发生地方第三方第三方斯蒂芬发送到发送到', null, null, '1399879856', '0', '0', '0', '4', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2136', '3357', '1', 'admin', '公司标识设计的稿件', '0.000', '特温特而特特尔特蛋糕', null, null, '1399600148', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2145', '3439', '4', '注册', '发大幅度发送到的稿件', '0.000', '第三方第三方但是范德萨发送到发送到发送到', null, null, '1399879848', '0', '0', '0', '7', '1', '0', '0');
INSERT INTO keke_witkey_task_work VALUES ('2152', '3442', '5528', '扬破帆逐美梦', '诚招护士看护师', '0.000', '&lt;span style=\"color: rgb(51, 51, 51); font-family: \'Microsoft YaHei\', Arial, Helvetica, sans-1serif; line-height: 20px; text-align: justify;\"&gt;我死国生，我死犹荣，身虽死精神长生，成功成仁，实现大同。——赵博生　　2、大江歌罢掉头东，邃密群科济世穷。面壁十年图破壁，难酬蹈海亦英雄。——周恩来&lt;/span&gt;', '5760', 'http://demo.kppw.cn/data/uploads/2014/05/12/136843459053708bc6131bb.jpg', '1399884744', '0', '0', '0', '0', '1', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_vote`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_vote`;
CREATE TABLE `keke_witkey_vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `vote_ip` varchar(50) DEFAULT '0',
  `vote_time` int(11) DEFAULT '0',
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_withdraw`;
CREATE TABLE `keke_witkey_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_cash` decimal(10,2) DEFAULT '0.00',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `pay_username` char(20) DEFAULT NULL,
  `withdraw_status` int(11) DEFAULT '0',
  `applic_time` int(11) DEFAULT '0',
  `process_uid` int(11) DEFAULT '0',
  `process_username` varchar(50) DEFAULT NULL,
  `process_time` int(11) DEFAULT '0',
  `pay_account` varchar(100) DEFAULT NULL,
  `pay_type` char(20) DEFAULT '0',
  `fee` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keke_witkey_withdraw
-- ----------------------------
