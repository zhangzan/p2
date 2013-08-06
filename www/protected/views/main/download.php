<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="1000" height="600" id="show_images" align="middle">
        <param name="movie" value="<?php echo $this->url("swf/show_images.swf");?>" />
        <param name="FlashVars" value="xml_path=<?php echo $this->url("xml/thumbnail_list.xml");?>&theme_param=<?php echo $theme;?>&media_param=1,视频;2,图片" />
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
        <object type="application/x-shockwave-flash" data="<?php echo $this->url("swf/show_images.swf");?>" width="1000" height="600">
            <param name="movie" value="<?php echo $this->url("swf/show_images.swf");?>" />
            <param name="FlashVars" value="xml_path=<?php echo $this->url("xml/thumbnail_list.xml");?>&theme_param=<?php echo $theme;?>&media_param=1,视频;2,图片" />
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