<script type="text/javascript">
$(document).ready(function(){
    $("#maindiv").css({"background-color":"#E2E2E1"});
    var info_h=document.getElementById("info_zone").offsetHeight;
    $(".product1").css({"height":(883+info_h)+"px"});
    $('[id^="img_s_"]').click(function(){
        var img_id=$(this).attr("id").replace("img_s_","");
        $('[id^="img_b_"]').hide();
        $("#img_b_"+img_id).show();
    });
});
</script>
<div class="product1">
<div class="pro-m">
    <img src="<?php echo $this->url("images/logo3.png");?>" style="position:absolute;top:120px; left:25px;"/>
    <div class="pro-m-t1">
        <a href="<?php echo $this->url("Product","TRobotOPic");?>" class="c1"></a>
        <a href="<?php echo $this->url("Product","TRobotWPic");?>" class="c2 hover"></a>
        <a href="<?php echo $this->url("Product","TRobotSPic");?>" class="c3"></a>
    </div>
<?php if ($apply && $apply['title'] && $apply['title'] != '' && $apply['text'] && $apply['text'] != '') {?>
    <div id="info_zone">
        <p style="font-size:16px;"><?php echo $apply['title'];?></p>
        <br>
        <p><?php echo $apply['text'];?></p>
    </div>
    <?php if ($apply['img'] && $apply['img'] != '') { ?>
    <img class="info_zone_img" src="<?php echo $this->url($apply['img']);?>">
    <?php } ?>
<?php } ?>
    <div class="d5">
        <?php foreach ($pic_list as $k => $row) {?>
        <img id="img_b_<?php echo $k+1;?>" src="<?php echo $this->url(($row['filename']&&$row['filename']!='')?$row['filename']:"img/w-".($k+1).".png");?>" style="height:323px;<?php echo $k==0?'':'display:none;';?>" />
        <?php } ?>
    </div>
    <div class="d4">
        <?php foreach ($pic_list as $k => $row) {?>
        <a href="javascript:void(0);"><img id="img_s_<?php echo $k+1;?>" src="<?php echo $this->url(($row['filename']&&$row['filename']!='')?$row['filename']:"img/w-".($k+1).".png");?>" style="height:95px;<?php echo $k==3?'margin-left:-32px;':'';?>" /></a>
        <?php } ?>
    </div>
    
    <div class="pro-m-f fix">
        <a href="<?php echo $this->url("Product", "TRobotW");?>">介绍</a>
        <a class="hover">应用</a>
        <a href="<?php echo $this->url("Product", "TRobotWDv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "TRobotWSpec");?>">参数</a>
    </div>
    
</div>

</div>
