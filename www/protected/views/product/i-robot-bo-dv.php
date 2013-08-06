<div class="product2">
	<div class="pro-m">
    	<img src="<?php echo $this->url("images/logo2.png");?>" style="position:absolute;top:120px; left:25px;"/>
	    <a id="b_dv" style="cursor:pointer;"><img src="<?php echo $this->url("images/dv.png");?>" style="margin-top:177px;"/></a>
		<div class="pro-m-f fix">
	    	<a href="<?php echo $this->url("Product", "IRobotBO");?>">介绍</a>
	        <a href="<?php echo $this->url("Product", "IRobotBOPic");?>">应用</a>
	        <a class="hover">DV</a>
	        <a href="<?php echo $this->url("Product", "IRobotBOSpec");?>">参数</a>
	    </div>
	</div>
</div>
<div class="sale-net" id="player_container" style="display:none;position:fixed;width:420px;height:360px;padding:0px;top:30%;left:40%;">
    <p id="h_player"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</p>
    <p style="font-size:14px;margin-left:15px;margin-top:3px;color:black;"><?php echo $dv?$dv['title']:'';?></p>
    <a href="javascript:void(0)" class="close" id="b_close"></a>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var s1 = new SWFObject("/swf/flvplayer.swf","single","420","334","7");
	s1.addParam("allowfullscreen","true");
	s1.addVariable("file","<?php echo $dv ? '/upload/flv/'.$dv['file'] : '';?>");
	s1.addVariable("width","420");
	s1.addVariable("height","334");
	s1.write("h_player");

	$("#b_dv").click(function(){
		$("#player_container").show();
	});
	$("#b_close").click(function(){
		$("#player_container").hide();
	});
});
</script>