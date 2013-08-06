<div class="m">
	<img src="<?php echo $this->url('images/ban-great.jpg')?>"/>
    <div class="c-nav">
    	<i>
          <a class="hover">大客户服务</a>
          <a href="<?php echo $this->url('Serve','AfterSale');?>">售后服务</a>
          <a href="<?php echo $this->url('Serve','Seller');?>">商家联盟</a>
          <a href="<?php echo $this->url('Serve','Finance');?>">金融服务</a>
         </i>
         <span>我们的服务</span>
    </div><!--c-nav-end-->
<?php
/* 获取售后服务的页面内容信息 */
	$pagearr = MServe::getPageInfoById(1);
?>

<?php if($pagearr['status']==1){?>
	<div class="great">
    	<div class="great-t bg2">
        	<h2>大客户服务</h2>
            <p>为方便大客户批量购车，ROBOT特推出“大客户优惠专案”，为您奉上多项购车优惠，以精心打造的最佳购车方案、最贴心服务以及最安心的售后保障满足您的需求。参与“大客户优惠专案”，您可享受以下服务项目：</p>
        </div>
        <div class="great-m bg2">
        	<h3>购车优惠 </h3>
            <p>针对在国内上市的5款不同的ROBOT车型，我们将为您提供相应的购车现金优惠，您可以实惠价格购得满意的车款。</p>
            <h3>售后保障 </h3>
            <p>购买ROBOT车辆可以享受ROBOT独有的2年1000公里免费保修保养政策，您可安心驾驶，免除后顾之忧。</p>
            <h3>ROBOT金融方案</h3>
            <p>您可享受到ROBOT金融根据您的需求量身定制的汽车贷款方案，让您轻松拥有ROBOT座驾。
            	<br/>欲了解大客户优惠专案详情，敬请联络<a class="blue" href="<?php echo $this->url("Dealer","Index");?>">ROBOT或当地ROBOT特许经销商</a>。
            </p>
        </div>
    </div>
<?php }else{ ?>
<?=$pagearr['content']?>
<?php } ?>



</div>