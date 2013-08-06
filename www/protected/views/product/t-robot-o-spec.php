<script type="text/javascript">
$(document).ready(function(){
    $("#b_download").click(function(){
        $("#download_dialog").show();
    });
    $("#b_close").click(function(){
        $("#download_dialog").hide();
    });
});
</script>
<div class="product3">
<div class="pro-m">
    <img src="<?php echo $this->url("images/logo3.png");?>" style="position:absolute;top:120px; left:25px;"/>
    <div class="pro-m-t1">
        <a href="<?php echo $this->url("Product","TRobotOSpec");?>" class="c1 hover"></a>
        <a href="<?php echo $this->url("Product","TRobotWSpec");?>" class="c2"></a>
        <a href="<?php echo $this->url("Product","TRobotSSpec");?>" class="c3"></a>
    </div>
    <div class="d3" style="top:145px; left:489px;"><h3>T-ROBOT-O</h3></div>
    <div style="bottom:140px; left:90px;"><img src="<?php echo $this->url("img/robot-o.png");?>" width="250"/></div>
	<div style="top:220px;left:510px;"><img src="<?php echo $this->url("img/o-table.png");?>"/></div>
    <dl class="pro-down">
            <dt><s class="play-1"></s><a id="b_download" href="javascript:void(0)" style="color:#fff;">资料下载</a></dt>
            <dd id="download_dialog" class="bg13" style="display:<?php echo (isset($_GET['download'])&&$_GET['download']==1)?'block':'none';?>;">
                <a id="b_close" class="close"></a>
                <?php foreach($file_list as $row){ ?>
                <p style="word-wrap:break-word;width:200px;"><a href="<?php echo $this->url('Product','Download',array('filename'=>$row['filename']));?>" target="_blank"><?php echo $row['filename'];?></a></p>
                <?php } ?>
            </dd>
    </dl>
    <div class="pro-m-f fix">
        <a href="<?php echo $this->url("Product", "TRobotO");?>">介绍</a>
        <a href="<?php echo $this->url("Product", "TRobotOPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "TRobotODV");?>">DV</a>
        <a class="hover">参数</a>
    </div>
    
</div>

</div>