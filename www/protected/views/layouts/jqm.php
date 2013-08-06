<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $this->pageTitle;?></title>
<link href="<?php echo $this->url('css/css.css'); ?>" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="<?php echo $this->url('js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
var CODE_BASE_URL=<?php echo json_encode(Yii::app()->getBaseUrl()); ?>;
var STATIC_BASE_URL=<?php echo json_encode(Yii::app()->getBaseUrl()); ?>;
var LANG=<?php echo json_encode(Yii::app()->language); ?>;
var STIME=<?php echo json_encode(getTime());?>;
var CTIME=new Date().getTime();
var TEST_SERVER_FLAG = <?php echo TEST_SERVER_FLAG;?>;
</script>
<script type="text/javascript" src="<?php echo $this->url('js/main.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $this->url('js/url.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $this->url('js/helper.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $this->url('js/jscroll.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $this->url('js/swfobject.js'); ?>"></script>

</head>
<body>
<div class="header">
	<div class="l">
        <div class="cite"><a href="http://www.i-robot.com.cn/en/">ENGLISH</a><a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a></div>
        <ul class="nav fix">
            <li><a id="main_index" href="<?php echo $this->url("Main", "Index");?>">首页</a></li>
            <li>
            	<a id="about" href="<?php echo $this->url("About", "Brand");?>">关于新世纪</a>
                <div>
                	<a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
                    <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
                    <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
                    <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
                    <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
                    <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
                </div>
            </li>
            <li id="products">
                <a>全部车型</a>
                <div class="nav-pro fix">
                    <i class="nav-pro-l">
                        <h3>
                            <a href="<?php echo $this->url("Robot","Irob");?>" style="font-size:16px;margin-bottom:8px;">i系列<img style="width:158px;bottom:10px;left:55px;" src="<?php echo $this->url('images/irob-all.png');?>"></a>
                        </h3>
                        <a href="<?php echo $this->url("Product","IRobotLA");?>">i系列-LA<img src="<?php echo $this->url("img/robot-la-s.png");?>" style=" bottom:-10px; right:10px;"/></a>
                        <a href="<?php echo $this->url("Product","IRobotSC");?>">i系列-SC<img src="<?php echo $this->url("img/robot-sc.png");?>"/></a>
                        <a href="<?php echo $this->url("Product","IRobotBO");?>" class="bo">i系列-BO<img src="<?php echo $this->url("img/robot-bo-s.png");?>"/></a>
                    </i>
                    <i class="nav-pro-r">
                        <h3>
                            <a href="<?php echo $this->url("Robot","Trob");?>" style="font-size:16px;margin-bottom:8px;">T系列<img style="width:158px;bottom:10px;left:55px;" src="<?php echo $this->url('images/trob-all.png');?>"></a>
                        </h3>
                        <a href="<?php echo $this->url("Product","TRobotO");?>">T系列-O<img src="<?php echo $this->url("img/robot-o.png");?>"/></a>
                        <a href="<?php echo $this->url("Product","TRobotW");?>">T系列-W<img src="<?php echo $this->url("img/robot-w.png");?>"/></a>
                        <a href="<?php echo $this->url("Product","TRobotS");?>">T系列-S<img src="<?php echo $this->url("img/robot-s.png");?>"/></a>
                    </i>
                </div>
            </li>
            <li>
            	<a id="services" href="<?php echo $this->url("Serve", "Serve");?>">我们的服务</a>
                <div>
                	<a href="<?php echo $this->url("Serve", "Serve");?>">服务概述</a>
                    <a href="<?php echo $this->url("Serve", "Great");?>">大客户服务</a>
                    <a href="<?php echo $this->url("Serve", "AfterSale");?>">售后服务</a>
                    <a href="<?php echo $this->url("Serve", "Seller");?>">商家联盟</a>
                    <a href="<?php echo $this->url("Serve", "Finance");?>">金融服务</a>
                </div>
            </li>
            <li>
                <a id="dealers_zone" href="<?php echo $this->url("Dealer", "Index");?>">经销商专区</a>
                <div>
                	<a href="<?php echo $this->url("Dealer", "Index");?>">经销商查询</a>
                    <a href="<?php echo $this->url("Dealer", "Register");?>">经销商加盟</a>
                    <a href="<?php echo $this->url("Dealer", "Login");?>">经销商登入口</a>
                </div>
            </li>
            <li class="w109">
            	<a id="feel_robot" href="<?php echo $this->url("Robot", "RobotLive");?>">感受ROBOT</a>
            	<div class="last">
                	<a href="<?php echo $this->url("Robot", "RobotLive");?>">ROBOT生活</a>
                    <a href="<?php echo $this->url("Robot", "Order");?>">预约试驾</a>
                    <a href="<?php echo $this->url("Robot", "Custom");?>">个性选择</a>
                    <a href="<?php echo $this->url("Main", "Download");?>">图片&视频下载</a>
                </div>
            </li>
        </ul>
     </div>
     <div class="r"><a><img src="<?php echo $this->url("images/logo.png");?>" alt="Robot_logo"></a></div>
</div><!--header-end-->
<div id="maindiv" class="m">
<?php echo $content; ?>
</div>
<div class="footer">
	<div class="fix f-m">
    	<p>
        	<a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
            <a href="<?php echo $this->url("Main", "Download");?>">媒体中心</a>
            <a href="<?php echo $this->url("Dealer", "Register");?>">特许经销商招募</a>
            <a href="<?php echo $this->url("Main", "SiteMap");?>">网站地图</a>
            <a href="<?php echo $this->url("Main", "Declare");?>">法律声明</a>
            <a href="<?php echo $this->url("Main", "GroupLink");?>">集团公司链接</a>
            <span>服务热线:400-090-9191</span>
        </p>
        <div class="s"><input placeholder="搜索" id="search_text"/><span id="search_btn"></span></div>
    </div>
    <h3>版权所有&copy;上海新世纪机器人有限公司2009-<?php echo date('Y')?>&nbsp;&nbsp;沪ICP备10220107号 </h3>
</div><!--footer-end-->
</body>
</html>
