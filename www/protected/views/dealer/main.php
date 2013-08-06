<script type="text/javascript">
$(document).ready(function(){
	$('[id^="promotion_"]').click(function(){
		var info_type_id=$(this).attr("id").replace("promotion_","");
		$("#detail_"+info_type_id).slideToggle();
		$(this).find("i").toggleClass("play-1 play");
	});
	$("#btn_dealer_order").click(function(){
		var order_content=$.trim($("#order_content").val());
		if(order_content==""){
			alert("订单内容不能为空。");
			$("#order_content").focus();
			return;
		}
		var ret=window.confirm("确定提交吗？");
		if (!ret) {
			return;
		}
		kajax("AjaxDealer","SubmitOrder",{content:order_content},function(obj){
			if(obj.code==1){
				alert("订单提交成功。");
				window.location.reload();
			}else{
				alert("提交失败。");
			}
		},this);
	});
});
</script>
<img src="<?php echo $this->url("images/ban-dealers-login.jpg");?>"/>
<div class="c-nav">
	<i class="r">
		<a href="<?php echo $this->url("Dealer", "Index");?>">经销商查询</a>
		<a href="<?php echo $this->url("Dealer", "Register");?>">经销商加盟</a>
		<a href="<?php echo $this->url("Dealer", "Login");?>" class="hover">经销商登入口</a>
	</i>
	<span>关于新世纪</span>
</div><!--c-nav-end-->
<div class="main-t">
	<h2><u><?php echo $dealer['company']; ?></u>&nbsp;经销商&nbsp;您好</h2>
	<?php $level_map=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五');?>
	<p style="font-size:18px;color:#595757;">您为<?php echo $level_map[$dealer['level']];?>级代理</p>
	<h3>促销信息&活动行程</h3>
</div>
<div class="news-m fix">
    <?php $n = 0;?>
    <?php foreach ($info_list as $info) { ?>
    <?php $n++;?>
    <dl>
        <dt id="promotion_<?php echo $info['type'].'_'.$info['id'];?>"><i class="<?php if ($n==1) {echo "play-1";}else{echo "play";}?>"></i>[<?php echo date("Y/m/d", $info['publish_time']);?>](<?php echo $info['type']==1?'促销信息':'活动行程'; ?>)<?php echo $info['title'];?></dt>
        <dd id="detail_<?php echo $info['type'].'_'.$info['id'];?>" class="fix <?php if ($n>1) {echo "dn";}?>">
            <p><?php echo $info['content'];?></p>
            <span></span>
        </dd>
    </dl>
    <?php } ?>
    <?php $j=0;?>
    <div class="news-f fix">
        <a <?php if($page>1) {?>href="<?php echo $this->url("Dealer", "Main", array("page"=>$page-1));?>"<?php } else {?> class="gray"<?php }?>>&lt;</a>
    <?php for ($i=max(1,$page-2);($j<min($page_count,5)&&$i<=$page_count);$i++) { ?>
        <?php $j++;?>
        <a <?php if($i!=$page){ ?>href="<?php echo $this->url("Dealer", "Main", array("page"=>$i));?>" <?php }else{?> class="gray"<?php }?>><?php echo $i;?></a>
    <?php } ?>
        <a <?php if($page<$page_count) {?>href="<?php echo $this->url("Dealer", "Main", array("page"=>$page+1));?>"<?php } else {?> class="gray"<?php }?>>&gt;</a>
    </div>
</div>
<div class="main-t">
	<p style="font-size:14px;">下订单：</p>
	<textarea id="order_content" style="width:600px;height:120px;"></textarea><br />
	<button id="btn_dealer_order">提交</button>
</div>
<div class="main-f bg2">
	<h3>下载文件</h3>
	<ul class="fix">
		<?php foreach ($file_list as $row) {?>
			<li><a target="_blank" href="<?php echo $this->url("Dealer", "Download", array("id"=>$row['id'])); ?>"><img style="width:146px;height:75px;" src="<?php echo $this->url("thumbnails/" . ($row['thumbnail']==""?"default2.png":$row['thumbnail']));?>"/><p><span><?php echo $row['title']!=''?$row['title']:$row['filename']; ?></span><i class="arr"></i></a></p></li>
		<?php } ?>
	</ul>
</div>