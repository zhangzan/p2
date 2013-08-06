<img src="<?php echo $this->url("images/ban-about.jpg");?>"/>
<div class="c-nav">
    <i>
        <a href="<?php echo $this->url("About", "Brand");?>" class="hover">品牌简介</a>
        <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
        <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
        <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
        <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
        <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
    </i>
    <span>关于新世纪</span>
</div><!--c-nav-end-->
<div class="about pr">
<?php if($content['status']==1){ ?>
    <div class="about-t bg2">
    	<i class="tel"></i>
        <img src="<?php echo $this->url("images/logo4.png");?>" class="l"/>
        <dl class="oh">
            <dt>品牌简介</dt>
            <dd style="width:520px;">上海新世纪机器人有限公司（下称“新世纪机器人”）是以智能控制技术为核心，真正拥有自主知识产权和核心技术的新型科技企业。公司经过5年技术筹备，2010年在上海浦东成立，注册资本为5,000万人民币。公司主要致力于新能源机器人代步工具的研发、生产和销售，并以实现"智能科技服务社会"为自身发展定位的基本目标。</dd>
        </dl>
    </div>
    <div class="about-m bg2">
        <h3>创新，引领新世纪</h3>
        <dl>
            <dt>新世纪机器人致力于全球领先的新能源机器人的研发、生产和销售；为了将新能源机器人辐射世界每个角落，新世纪机器人坚持以智能科技服务社会。在日新月异的科技浪潮中，新世纪机器人始终强调发展自身强大的研发和创新能力，不断引进国内外高端科研人才，为新能源机器人能够便捷服务人们的每个细节功能而孜孜追求。 在质量参差的市场经济里，新世纪机器人始终秉承卓越品质，引进国际上先进的生产管理和质量监控体系，反复对产品检测实验，坚持领先的全自动一体化生产流水线。
                <p>我们坚信：创新，引领新世纪</p>
                目前，公司研制的创新产品"x-robot"系列产品是当今世界上最先进的代步机器人，具备智能环保、时尚科技等特征。其警用版本"T-robot"系列和民用版本 "I-robot"系列均已上市，并正在引领一场全新的"科技交通"革命。而我们诚邀您成为这场"交通革命"的弄潮者！
            </dt>
            <dd>
                <img src="<?php echo $this->url("images/i-7.jpg");?>"/><img src="<?php echo $this->url("images/i-8.jpg");?>"/>
            </dd>
        </dl>
    </div>
<?php }else{?>
    <?php echo $content['content'];?>
<?php } ?>
 </div>

