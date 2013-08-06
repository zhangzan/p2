<script type="text/javascript">
$(document).ready(function(){
    $("[id^='a_img_']").click(function(){
        var id=$(this).attr("id").replace("a_img_","");
        $(".c_b_img").hide();
        $("#b_img_"+id).show();
        $("#b_close").show();
    });
    $("#b_close").click(function(){
        $(".c_b_img").hide();
        $(this).hide();
    });

});
</script>
<div class="m">
	<img src="<?php echo $this->url('images/ban-hd.jpg')?>"/>
    <div class="c-nav">
         <span>车随心动 我行我秀i-ROBOT代步机器人新品发布会</span>
    </div><!--c-nav-end-->
    <div class="hd pr">
    	<i class="tel"></i>
    	<dl class="bg2 fix hd-t">
        		<dt>
                		<h2>车随心动 我行我秀i-ROBOT代步机器人新品发布会</h2>
                        <p>2012年11月19日，沐浴着“十八大”的春风，上海新世纪机器人有限公司在位于上海市金茂君悦大酒店内举办了主题为“车随心动我行我秀——i-ROBOT”代步机器人新品发布会。社会各界领导及专家出席了会议，50余家媒体以及经销商代表云集沪上出席了本次发布会。为了深入贯彻我国政府大力发展低碳环保科技产业，上海新世纪机器人有限公司坚持科技创新，顺应市场需求成功研发智慧环保代步产品，以缓解日益严峻的交通压力。作为近年来交通产业的新秀，新世纪机器人有限公司的创新理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球的“交通革命”，以更加新颖的代步理念引领时尚潮流。</p>
                		<p>本次发布会邀请了政府领导、经销商、全国新闻媒体及社会各界朋友。其中，全国人大教科文卫委员会委员，中国智能交通协会理事长，科技部原副部长，吴忠泽先生上台发言表述自己对于新世纪代步机器人未来的发展的期望！</p>
                        <p>新世纪机器人有限公司董事长郭启寅先生上台回答记者提问。他从宏观大局到区域经济阐述新世纪今后的发展道路，将为消费者提供一流的产品、把创新科技建设好、发展好！</p>
                		<p>本次活动对于节能科技产业的发展前景、X-ROBOT代步机器人今后的发展道路进行畅想！ 作为创始初期就致力于全球领先的新能源机器人研发、生产和销售的新世纪机器人有限公司，始终强调发展自身强大的研发和创新能力，不断引进国内外高端科研人才，为新能源机器人提升人们生活质量而孜孜追求。</p>
                </dt>
                <dd>
                		<img src="<?php echo $this->url('images/i-24.jpg')?>"/> <img src="<?php echo $this->url('images/i-25.jpg')?>"/>
                </dd>
        </dl>
        <dl class="hd-m bg2">
        		<dt>发布会图片下载</dt>
                <dd>
                		<ul class="fix">
                        		<li id="a_img_1"><img src="<?php echo $this->url('images/hd1.jpg')?>"/><p>发布会舞台背景</p></li>
                                <li id="a_img_2"><img src="<?php echo $this->url('images/hd2.jpg')?>"/><p>现场演说</p></li>
                                <li id="a_img_3"><img src="<?php echo $this->url('images/hd3.jpg')?>"/><p>对产品的介绍</p></li>
                                <li id="a_img_4"><img src="<?php echo $this->url('images/hd4.jpg')?>"/><p>模特展示</p></li>
                                <li id="a_img_5"><img src="<?php echo $this->url('images/hd5.jpg')?>"/><p>战略伙伴签署仪式</p></li>
                                <li id="a_img_6" style="margin-right:0;"><img src="<?php echo $this->url('images/hd6.jpg')?>"/><p>嘉宾领导合影</p></li>
                        </ul>
                        <div class="hd-img">
                        		<img class="c_b_img" id="b_img_1" src="<?php echo $this->url('images/hd1.jpg')?>"/>
                                <img class="c_b_img" id="b_img_2" src="<?php echo $this->url('images/hd2.jpg')?>"/>
                                <img class="c_b_img" id="b_img_3" src="<?php echo $this->url('images/hd3.jpg')?>"/>
                                <img class="c_b_img" id="b_img_4" src="<?php echo $this->url('images/hd4.jpg')?>"/>
                                <img class="c_b_img" id="b_img_5" src="<?php echo $this->url('images/hd5.jpg')?>"/>
                                <img class="c_b_img" id="b_img_6" src="<?php echo $this->url('images/hd6.jpg')?>"/>
                                <a class="close" style="display:none;" id="b_close"></a>
                        </div>
                        <p><a href="<?php echo $this->url("Main","Download");?>"><s class="play"></s>更多图片下载</a></p>
                </dd>
        </dl>
        
        
    </div>
</div><!--m-end-->

