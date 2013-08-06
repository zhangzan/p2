<div class="m">
	<img src="<?php echo $this->url('images/ban-robot-live.jpg')?>"/>
    <div class="c-nav">
    	<i class="r">
            <a href="<?php echo $this->url("Robot", "RobotLive");?>" class="hover">ROBOT生活</a>
            <a href="<?php echo $this->url("Robot", "Order");?>">预约试驾</a>
            <a href="<?php echo $this->url("Robot", "Custom");?>">个性选择</a>
            <a href="<?php echo $this->url("Main", "Download");?>">图片视频&下载</a>
         </i>
         <span>感受ROBOT</span>
    </div><!--c-nav-end-->
<?php if($content['status']==1){ ?>
    <div class="live">
    	<h2>ROBOT的原理</h2>
        <h3>新世纪机器人要改善的是您的生活方式</h3>
        <p class="p1">我们的使命很简单，就是为我们的客户提供智能、绿色、个性化的出行体验，从而改善他们的工作、学习、娱乐、生活情况。我们保证每款新世纪机器人拥有者都是出行灵活而富有效率的，并且还会将实实在在的环保意识融入到日常生活中。
		   自您拥有一辆属于自己的i-robot后，您就会明白，它不光便捷了您的生活，它还带来了一种全新的生活方式。您会明显的感受到生活质量的提高，处处伴随简单、自由、随心。
		   i-robot同步的网上社区还会有千千万万的用户和您一起感受分享，您的每个关于i-robot的心情都会有人来互动回应，在i-robot的圈子中，您的每个感受都很重要。</p>
        <ul class="fix">
        	<li><a href="#"><img src="<?php echo $this->url('images/v-1.jpg')?>"/></a></li>
            <li><a href="#"><img src="<?php echo $this->url('images/v-2.jpg')?>"/></a></li>
            <li><a href="#"><img src="<?php echo $this->url('images/v-3.jpg')?>"/></a></li>
        </ul>
        <p class="p2"><a href="<?php echo $this->url("Main","Download")?>"><i class="play"></i>更多内容分享</a></p>
    </div>
<?php }else{?>
    <?php echo $content['content'];?>
<?php } ?>

</div><!--m-end-->