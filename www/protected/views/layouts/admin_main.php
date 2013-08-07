<?php
$model = select_dba ()->select_row ( "select name from admin where id = :id", array (
		':id' => Yii::app ()->user->id
) );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<link type="text/css" href="<?=Yii::app()->getBaseUrl()?>/admin/default.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$this->url('js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/utils.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/listtable.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/jquery.blockUI.js')?>"></script>
<script type="text/javascript">
var STATIC_BASE_URL=<?=json_encode(Yii::app()->getBaseUrl())?>;
var CODE_BASE_URL=<?=json_encode(Yii::app()->getBaseUrl()."/index.php")?>;
var LANG=<?=json_encode(Yii::app()->language)?>;
var TEST_SERVER_FLAG = <?php echo TEST_SERVER_FLAG;?>;
</script>
<script type="text/javascript" src="<?=$this->url('js/main.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/url.js')?>"></script>
<script type="text/javascript" src="<?=$this->url('js/helper.js')?>"></script>
<style type="text/css">
.left { float: left; display: inline; }
input.btn { width: 60px; margin-top: 30px; background-color: #D3E862; }
.login-body { width: 250px; padding: 0px 0 20px 100px; }
.login-title { font-weight: bold; font-size: 14px; color: #D3E862; }
.login-form { height: 280px; margin: 10px 0 10px auto; padding-top: 20px; border-right: 1px solid #D3E862; }
.login-form span.key { width: 60px; height: 16px; line-height: 16px; display: inline; float: left; margin-bottom: 10px; padding: 2px; text-align: right; font-weight: bold; border-top: 1px solid #aaa; border-left: 1px solid #aaa; border-bottom: 1px solid #ccc; background-color: #fff; }
.login-form input.txt { width: 140px; height: 16px; line-height: 16px; display: inline; float: left; margin-bottom: 10px; padding: 2px; border-top: 1px solid #aaa; border-left: 0; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc; background-color: #fff; }
.login-info { width: 400px; padding: 50px 20px 20px 30px; ; }
</style>
</head>
<body>
	<div id="header">
		<h1>ADMIN管理工具</h1>
<?php
if (! Yii::app ()->user->isGuest) {
	?>
	<h2>欢迎回来，<?=$model['name']?></h2>
		<ul>
			<li><a href="<?=$this->url('Admin','Logout')?>">登出</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="colOne">
			<h3>友情链接</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','LinksList')?>">友情链接管理</a></li>
					<li><a href="<?=$this->url('Admin','AddLinks')?>">添加友情链接</a></li>
				</ul>
			</div>
			<h3>新闻管理</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','NewsClassList')?>">新闻类别管理</a></li>
					<li><a href="<?=$this->url('Admin','AddNews')?>">添加新闻</a></li>
					<li><a href="<?=$this->url('Admin','NewsManage')?>">新闻管理</a></li>
				</ul>
			</div>
			<h3>首页banner管理</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','BigBanner')?>">大banner列表</a></li>
					<li><a href="<?=$this->url('Admin','SmallBanner')?>">小banner列表</a></li>
				</ul>
			</div>
			<h3>常见问题管理</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','ClientProblemList')?>">问题列表</a></li>
				</ul>
			</div>
			<h3>经销商</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','Dealer')?>">经销商加盟</a></li>
					<li><a href="<?=$this->url('Admin','DealerLoginList')?>">经销商登录列表</a></li>
					<li><a href="<?=$this->url('Admin','PromotionList')?>">优惠政策</a></li>
					<li><a href="<?=$this->url('Admin','EventList')?>">活动行程</a></li>
					<li><a href="<?=$this->url('Admin','DealerOrderList')?>">订单</a></li>
					<li><a href="<?=$this->url('Admin','DocList')?>">文件列表</a></li>
				</ul>
			</div>
			<h3>预约试驾一览</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','Order')?>">预约列表</a></li>
				</ul>
			</div>
			<h3>我们的服务</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','PageContent?act=edit&id=1')?>">大客户服务</a></li>
					<li><a href="<?=$this->url('Admin','PageContent?act=edit&id=2')?>">售后服务</a></li>
					<li><a href="<?=$this->url('Admin','PageContent?act=edit&id=3')?>">商家联盟</a></li>
					<li><a href="<?=$this->url('Admin','PageContent?act=edit&id=4')?>">金融服务</a></li>
				</ul>
			</div>
			<h3>关于新世纪</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','JobList')?>">职位列表</a></li>
					<li><a href="<?=$this->url('Admin','PageContenta',array('id'=>11,'act'=>'edit'))?>">品牌介绍</a></li>
					<li><a href="<?=$this->url('Admin','PageContenta',array('id'=>12,'act'=>'edit'))?>">企业文化</a></li>
					<li><a href="<?=$this->url('Admin','PageContenta',array('id'=>13,'act'=>'edit'))?>">尖端科技</a></li>
					<li><a href="<?=$this->url('Admin','PageContenta',array('id'=>14,'act'=>'edit'))?>">联系我们</a></li>
				</ul>
			</div>
			<h3>产品</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','ProductInfoList')?>">产品列表</a></li>
					<li><a href="<?=$this->url('Admin','ProductFileList')?>">产品参数文件列表</a></li>
					<li><a href="<?=$this->url('Admin','DvList')?>">视频上传</a></li>
					<li><a href="<?=$this->url('Admin','ProductList')?>">介绍下方小图列表</a></li>
					<li><a href="<?=$this->url('Admin','ProductApply')?>">应用</a></li>
					<li><a href="<?=$this->url('Admin','ProductPicList')?>">应用下方图</a></li>
				</ul>
			</div>
			<h3>感受robot</h3>
			<div class="bg1">
				<ul>
					<li><a href="<?=$this->url('Admin','PageContenta',array('id'=>21,'act'=>'edit'))?>">ROBOT生活</a></li>
					<li><a href="<?=$this->url('Admin','MediaList')?>">媒体列表</a></li>
					<li><a href="<?=$this->url('Admin','ColorList')?>">颜色管理</a></li>
					<li><a href="<?=$this->url('Admin','CustomColorList')?>">个性定制颜色</a></li>
					<li><a href="<?=$this->url('Admin','PartList')?>">部件管理</a></li>
				</ul>
			</div>
		</div>
	<?php
} else {
	?>
	 	</div>
<?php }?>
			<?php echo $content; ?>
	<div id="footer"> </div>
</body>
</html>