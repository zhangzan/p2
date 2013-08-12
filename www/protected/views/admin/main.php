<?php
$model = select_dba ()->select_row ( "select name from admin where id = :id", array (
		':id' => Yii::app ()->user->id
) );
?>
<section>
	<iframe id="m" src="<?=$this->url('Admin','LinksList')?>" frameborder="0" scrolling="no"></iframe>
</section>
<aside>
	<nav>
		<div>
			<h2 class="on"><a onclick="go(this,'<?=$this->url('Admin','LinksList')?>')">友情链接</a></h2>
			<ul style="display:block">
				<li><a class="on" onclick="go(this,'<?=$this->url('Admin','LinksList')?>')">管理友情链接</a></li>
				<li><a onclick="go(this,'<?=$this->url('Admin','AddLinks')?>')">添加友情链接</a></li>
			</ul>
		</div>
		<div>
			<h2><a onclick="go('<?=$this->url('Admin','NewsClassList')?>')">新闻管理</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','NewsClassList')?>')">新闻类别管理</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','AddNews')?>')">添加新闻</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','NewsManage')?>')">新闻管理</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','BigBanner')?>')">首页banner管理</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','BigBanner')?>')">大banner列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','SmallBanner')?>')">小banner列表</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','ClientProblemList')?>')">常见问题管理</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','ClientProblemList')?>')">问题列表</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','Dealer')?>')">经销商</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','Dealer')?>')">经销商加盟</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','DealerLoginList')?>')">经销商登录列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PromotionList')?>')">优惠政策</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','EventList')?>')">活动行程</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','DealerOrderList')?>')">订单</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','DocList')?>')">文件列表</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','Order')?>')">预约试驾一览</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','Order')?>')">预约列表</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','PageContent?act=edit&id=1')?>')">我们的服务</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContent?act=edit&id=1')?>')">大客户服务</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContent?act=edit&id=2')?>')">售后服务</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContent?act=edit&id=3')?>')">商家联盟</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContent?act=edit&id=4')?>')">金融服务</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','JobList')?>')">关于新世纪</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','JobList')?>')">职位列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>11,'act'=>'edit'))?>')">品牌介绍</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>12,'act'=>'edit'))?>')">企业文化</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>13,'act'=>'edit'))?>')">尖端科技</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>14,'act'=>'edit'))?>')">联系我们</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','ProductInfoList')?>')">产品</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','ProductInfoList')?>')">产品列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','ProductFileList')?>')">产品参数文件列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','DvList')?>')">视频上传</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','ProductList')?>')">介绍下方小图列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','ProductApply')?>')">应用</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','ProductPicList')?>')">应用下方图</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>21,'act'=>'edit'))?>')">感受robot</a></h2>
				<ul>
					<li><a onclick="go(this,'<?=$this->url('Admin','PageContenta',array('id'=>21,'act'=>'edit'))?>')">ROBOT生活</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','MediaList')?>')">媒体列表</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','ColorList')?>')">颜色管理</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','CustomColorList')?>')">个性定制颜色</a></li>
					<li><a onclick="go(this,'<?=$this->url('Admin','PartList')?>')">部件管理</a></li>
				</ul>
		</div>
		<div>
			<h2><a onclick="go(this,'<?=$this->url('Admin','User')?>')">登录信息</a></h2>
			<ul>
				<li><a onclick="go(this,'<?=$this->url('Admin','User')?>')">登录信息</a></li>
			</ul>
		</div>
	</nav>
</aside>
<aside class="r">
	<a class="logo" title="退出登录" href="<?=$this->url('Admin','Logout')?>"><?=$model['name']?></a>
	<a>修改密码</a>
	<footer>后台管理工具 by 47</footer>
</aside>
<script type="text/javascript">
	$('nav h2').click(function(){
		var me=$(this).hasClass('on');
		$('nav a').removeClass('on');
		$('nav h2').removeClass('on');
		$('nav ul').slideUp(500);
		if(!me){
			$(this).addClass('on');
			$(this).next('ul').find('li').find('a').first().addClass('on');
			$(this).next('ul').slideDown(500);
		}
	});
	$('nav li a').click(function(){
		$('nav li a').removeClass('on');
		$(this).addClass('on');
		iframe_auto_height();
	});
	function go(dom,href){
		$('iframe').attr('src',href)
	}
	function iframe_auto_height(){
		$("#m").height(0);
		$("#m").height($("#m").contents().height());
	}
	$("#m").load(function(){iframe_auto_height();})
</script>