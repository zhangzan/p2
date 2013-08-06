<div class="m">
	<img src="<?php echo $this->url('images/ban-seller.png')?>"/>
    <div class="c-nav">
    	<i>
          <a href="<?php echo $this->url('Serve','Great');?>">大客户服务</a>
          <a href="<?php echo $this->url('Serve','AfterSale');?>">售后服务</a>
          <a class="hover">商家联盟</a>
          <a href="<?php echo $this->url('Serve','Finance');?>">金融服务</a>
         </i>
         <span>我们的服务</span>
    </div><!--c-nav-end-->
<?php
/* 获取售后服务的页面内容信息 */
	$pagearr = MServe::getPageInfoById(3);
?>
<?php if($pagearr['status']==1){?>
	<div class="seller bg2">
    	<h2>商家联盟</h2>
        <p>ROBOT油电混合动力技术，创造性的联合燃油动力与电动机动力。作为行业公认的强混合动力系统，油电混合动力意味着，既能单独使用汽油发动机动力或电动机动力作为能量来源，更可以将两种动力来源有效的联合起来，一同为车辆提供动力。于是让车辆涌现出令人叹服的澎湃动力与静谧、平顺的驾乘体验。与此同时，燃油消耗率也大幅降低，减少了碳排放量。</p>
    </div>
<?php }else{ ?>
<?=$pagearr['content']?>
<?php } ?>
</div><!--m-end-->