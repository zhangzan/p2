<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="1000" height="700" id="product" align="middle" >
	<param name="movie" value="<?php echo $this->url("swf/product.swf");?>" />
	<param name="FlashVars" value="param=<?php echo $part;?>&base=<?php echo Yii::app ()->getBaseUrl() . '/swf/';?>&colors=<?php echo $color;?>" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#e2e2e2" />
	<param name="play" value="true" />
	<param name="loop" value="true" />
	<param name="wmode" value="transparent" />
	<param name="scale" value="showall" />
	<param name="menu" value="true" />
	<param name="devicefont" value="false" />
	<param name="salign" value="" />
	<param name="allowScriptAccess" value="sameDomain" />
	<!--[if !IE]>-->
	<object type="application/x-shockwave-flash" data="<?php echo $this->url("swf/product.swf");?>" width="1000" height="700" >
		<param name="movie" value="<?php echo $this->url("swf/product.swf");?>" />
		<param name="FlashVars" value="param=<?php echo $part;?>&base=<?php echo Yii::app ()->getBaseUrl() . '/swf/';?>&colors=<?php echo $color;?>" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#e2e2e2" />
		<param name="play" value="true" />
		<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
		<param name="scale" value="showall" />
		<param name="menu" value="true" />
		<param name="devicefont" value="false" />
		<param name="salign" value="" />
		<param name="allowScriptAccess" value="sameDomain" />
	<!--<![endif]-->
		<a href="http://www.adobe.com/go/getflash">
			<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获得 Adobe Flash Player" />
		</a>
	<!--[if !IE]>-->
	</object>
	<!--<![endif]-->
</object>