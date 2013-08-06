<script type="text/javascript">
var year=<?php echo json_encode($year);?>;
var p=<?php echo json_encode($page);?>;
var page_count=<?php echo json_encode($page_count);?>;
var current_t_news=1;
$(document).ready(function(){
	$('[id^="news_m_"]').click(function(){
		var news_id=$(this).attr("id").replace("news_m_","");
		$("#detail_m_"+news_id).slideToggle();
		$(this).find("i").toggleClass("play-1 play");
	});
    $('[id^="news_f_"]').click(function(){
        var news_id=$(this).attr("id").replace("news_f_","");
        $('[id^="news_t_"]').hide();
        $("#news_t_"+news_id).fadeIn();
        $("#news_t_"+news_id).show();
        current_t_news=news_id;
        $('[id^="news_f_"]').removeClass();
        $(this).addClass("gray");
    });
    $("#select_news_year").change(function(){
        location.href=get_url("About","News",{time:$(this).val()});
    });
});
</script>
<img src="<?php echo $this->url("images/ban-news.jpg");?>"/>
<div class="c-nav h27">
    <i>
        <a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
        <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
        <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
        <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
        <a href="<?php echo $this->url("About", "News");?>" class="hover">新闻资讯</a>
        <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
    </i>
    <span>关于新世纪</span>
</div>
<div class="news pr">
    <div class="news-t fix">
    	<i class="tel"></i>
        <h2>
            <select id="select_news_year" style="margin-top:35px;">
                <option value="">请选择</option>
                <?php foreach ($year_list as $row) {?>
                <option value="<?php echo $row;?>" <?php echo $year==$row?'selected="selected"':"";?>><?php echo $row;?>年</option>
                <?php } ?>
            </select>新闻资讯</h2>
        <ul>
        <?php $n = 0;?>
        <?php foreach ($top_news_list as $news) { ?>
        <?php if($n > 0){continue;} ?>
        <?php $n++;?>
            <li class="fix <?php if ($n>1) {echo "dn";} ?>" id="news_t_<?php echo $n; ?>">
                <div class="l"><img width=326 src="<?php echo $this->url($news['img']);?>"/></div>
                <div class="r">
                    <h3><?php echo $news['title'];?></h3>
                    <p><?php echo date("Y年m月d日", $news['publish_time']); ?></p>
                    <p><?php echo $news['content'];?></p>
                </div>
            </li>
        <?php } ?>
         </ul>
         <div class="news-f fix">
            <?php //$n = 0;?>
            <?php //foreach ($top_news_list as $news) { ?>
            <!--a id="news_f_<?php //echo ++$n;?>" class="<?php //echo $n>1?"":"gray"; ?>" href="javascript:void(0);"><?php //echo $n;?></a-->
            <?php //} ?>
         </div>
    </div>
    <div class="news-m fix">
        <?php $n = 0;?>
        <?php foreach ($news_list as $news) { ?>
        <?php $n++;?>
        <dl>
            <a id="news-id-<?php echo $news['id'];?>" name="news-id-<?php echo $news['id'];?>"><dt id="news_m_<?php echo $news['id'];?>"><i class="<?php if ($news['id']==$id) {echo "play-1";}else{echo "play";}?>"></i>[<?php echo date("Y/m/d", $news['publish_time']);?>]<?php echo $news['title'];?></dt></a>
            <dd id="detail_m_<?php echo $news['id'];?>" class="fix <?php if (!($news['id']==$id)) {echo "dn";}?>">
                <p><?php echo $news['content'];?></p>
                <span><?php if ($news['img']) { ?><img style="max-height:300px;max-width:210px;" src="<?php echo $this->url($news['img']);?>"/><?php } ?></span>
            </dd>
        </dl>
        <?php } ?>
        <?php $j=0;?>
        <div class="news-f fix">
            <a <?php if($page>1) {?>href="<?php echo $this->url("About", "News", array("p"=>$page-1,"time"=>$year));?>"<?php } else {?> class="gray"<?php }?>>&lt;</a>
        <?php for ($i=max(1,$page-2);($j<min($page_count,5)&&$i<=$page_count);$i++) { ?>
            <?php $j++;?>
            <a <?php if($i!=$page){ ?>href="<?php echo $this->url("About", "News", array("p"=>$i,"time"=>$year));?>" <?php }else{?> class="gray"<?php }?>><?php echo $i;?></a>
        <?php } ?>
            <a <?php if($page<$page_count) {?>href="<?php echo $this->url("About", "News", array("p"=>$page+1,"time"=>$year));?>"<?php } else {?> class="gray"<?php }?>>&gt;</a>
        </div>
    </div>
</div><!--news-end-->
