<img src="<?php echo $this->url("images/ban-about.jpg");?>"/>
<div class="c-nav">
    <span>友情链接</span>
</div><!--c-nav-end-->
<div class="culture bg2 pr" style="color:#888889;line-height:24px;padding: 100px 20px;">
	<?php foreach($link_list as $k =>$row) {?>
		<a href="<?php echo $row['href'];?>"><?php echo $row['name'];?></a>
	<?php } ?>
</div>