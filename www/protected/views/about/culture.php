<script type="text/javascript">
$(document).ready(function(){
    
});
</script>
<img src="<?php echo $this->url("images/ban-culture.jpg");?>"/>
<div class="c-nav">
    <i>
        <a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
        <a href="<?php echo $this->url("About", "Culture");?>" class="hover">企业文化</a>
        <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
        <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
        <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
        <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
    </i>
    <span>关于新世纪</span>
</div>
<?php if($content['status']==1){ ?>
<div class="culture bg2 pr">
	<i class="tel"></i>
    <h2>企业精神</h2>
    <p>开拓进取，创新卓越</p>
    <h2>经营理念</h2>
    <p>创新，引领新世纪</p>
    <h2>核心思想</h2>
    <p>新世纪机器人是行动的巨人</p>
    <h2>价值观</h2>
    <p>每个创新，百尺竿头，我们只为更进一步，每次把控，开拓进取，我们追求创新卓越</p>
    <h2>企业愿景</h2>
    <p>和每一个伟大的公司一样，梦想越大成长历程就越艰难，但结果总是让人们惊异称奇，那些巨人企业：微软、IBM、苹果都是如此，现在是"新世纪机器人"。新世纪机器人公司的创建理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球"交通革命"。</p>
    <h2>企业使命</h2>
    <p>新世纪机器人要改善的是您的生活
        <br/>我们的使命是为我们的客户提供智能、绿色、个性化的出行体验，从而改善他们的工作、学习、娱乐、生活情况。真正体会"悦智慧&nbsp;&nbsp;享自由"的乐趣。
    </p>
    <ul>
        <li><img src="<?php echo $this->url("images/i-20.jpg");?>"/></li>
        <li><img src="<?php echo $this->url("images/i-21.jpg");?>"/></li>
        <li><img src="<?php echo $this->url("images/i-22.jpg");?>"/></li>
    </ul>
<?php }else{?>
    <?php echo $content['content'];?>
<?php } ?>
</div>
	
