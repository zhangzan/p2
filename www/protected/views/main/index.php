<div class="ban">
    <ul class="f hd">
     <?php foreach($bigbannerlist as $kk=>$vv){echo "<li></li>"; } ?>
    </ul>
    <ul class="bd">
     <?php foreach($bigbannerlist as $kk=>$vv){echo "<li><a href='".$vv['url']."' ><img style='width:1000px;height:473px;' src='".$this->url($vv['image_url'])."'></a></li>"; } ?>
    </ul>
</div>
<div class="pro">
    <div class="pro-in">
        <ul>
            <?php
                foreach($smallbannerlist as $k=>$v){
                    echo "<li><a href='".$v['url']."'><img width='160px' height='81px' src='".$this->url($v['image_url'])."'></a><p>".$v['name']."</p></li>";
                    if ($k==3||$k==7) echo "<li><a href='".$this->url('About','Contact')."'><img width='160px' height='101px' src='".$this->url('images/hot-line-pic.jpg')."'></a></li>";
                }
            ?>
        </ul>
    </div>
    <a class="arrl next"></a>
    <a class="arrr prev"></a>
</div>
<div class="note">
    <ul>
        <?php foreach ($news_list as $row) { ?>
            <li><a href="<?php echo $this->url("About", "News", array('id' => $row['id']));?>#news-id-<?php echo $row['id']; ?>"><?php echo $row['title'];?></a></li>
        <?php } ?>
    </ul>
</div>
<script type="text/javascript">
    $(".ban").slide({mainCell:".bd",autoPlay:true,delayTime:1000});
    $(".pro").slide({mainCell:"ul",autoPage:true,effect:"left",scroll:5,vis:5,trigger:"click"});
    $(".note").slide({mainCell:"ul",autoPage:true,effect:"top",autoPlay:true,pnLoop:false,delayTime:2000});
</script>