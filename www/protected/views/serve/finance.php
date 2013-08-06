<div class="m">
	<img src="<?php echo $this->url('images/ban-finance.jpg')?>"/>
    <div class="c-nav">
    	<i>
          <a href="<?php echo $this->url('Serve','Great');?>">大客户服务</a>
          <a href="<?php echo $this->url('Serve','AfterSale');?>">售后服务</a>
          <a href="<?php echo $this->url('Serve','Seller');?>">商家联盟</a>
          <a href="<?php echo $this->url('Serve','Finance');?>" class="hover">金融服务</a>
      </i>
      <span>我们的服务</span>
    </div><!--c-nav-end-->
<?php
/* 获取售后服务的页面内容信息 */
	$pagearr = MServe::getPageInfoById(4);
?>
<?php if($pagearr['status']==1){?>
	    <div class="finance">
    	<div class="fin-t bg2">
            <h2>保险业务</h2>
            <h3>享安全  行人生</h3>
            <p class="p1">上海新世纪机器人有限公司联合品牌车险<br/>上海新世纪机器人有限公司现联合中国人民人寿保险有限公司为您竭诚提供专业、可靠、周到、贴心的驾驶保险方案。创新、安全、舒适与可控，您希望在我司产品上拥有的一切，在我们的保险服务中同样可以实现。</p>
        </div>
        <dl class="fin-t bg2 fix" style="padding-right:0;">
          <dt class="l"><img src="<?php echo $this->url('images/i-23.jpg')?>"/></dt>
          <dd class="l" style="width:560px;padding-top:20px;">
              <h2>贷款业务</h2>
              <h3>无忧贷&nbsp;&nbsp;&nbsp;&nbsp;行自由</h3>
              <p class="p1">
                为客户提供符合需要的金融产品和服务，让您的i-ROBOT代步机器人梦想成真！<br/>
                i-ROBOT代步机器人金融服务，包括标准贷款产品、标准弹性贷款产品两项金融产品，其优势在于：<br/>
                您可以通过贷款拥有i-ROBOT代步机器人的所有权，提前享受驾驭i-ROBOT代步机器人的乐趣；<br/>
                自由选择并升级您所钟爱的i-ROBOT代步机器人，拓展可拥有i-ROBOT代步机器人的范围；<br/>
                把握家庭的资金积累，投资于其他的理财或保险组合，以获得更高回报；<br/>
                节省企业现金支出，将资金用于商业运营并取得投资回报；<br/>
                建立良好的个人信用纪录，助力未来的发展计划；<br/>
                享有高端现场服务，由专人协助您完成贷款购车的每一个步骤。
              </p>
            </dd>
        </dl>
    </div>
<?php }else{ ?>
	<?=$pagearr['content']?>
<?php } ?>
</div><!--m-end-->
<script language="javascript">
zzjs_net=function (btn,bar,title){
 if(btn=="btn"){
     this.flag=0;
 }else{
     this.flag=1;
 }
 this.btn=document.getElementById(btn);
 this.bar=document.getElementById(bar);
 this.title=document.getElementById(title);
 this.step=this.bar.getElementsByTagName("i")[0];
 this.init();
};
zzjs_net.prototype={
 init:function (){
  var f=this,g=document,b=window,m=Math;
  f.btn.onmousedown=function (e){
   var x=(e||b.event).clientX;
   var l=this.offsetLeft;
   var max=f.bar.offsetWidth-this.offsetWidth;
   g.onmousemove=function (e){
    var thisX=(e||b.event).clientX;
    var to=m.min(max,m.max(-2,l+(thisX-x)))+1;
    f.btn.style.left=to+'px';
    f.ondrag(m.round(m.max(0,to/max)*100),to);
    b.getSelection ? b.getSelection().removeAllRanges() : g.selection.empty();
   };
   g.onmouseup=new Function('this.onmousemove=null');
  };
 },
 ondrag:function (pos,x){
  this.step.style.width=Math.max(0,x)+'px';
  if(this.flag==0){
      this.title.innerHTML=Math.floor(36*pos/100)+'月';
  }else{
      this.title.innerHTML=Math.floor(12000*pos/100)+'人民币';
  }

 }
}
new zzjs_net('btn','bar','title');
new zzjs_net('btn1','bar1','title1');
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
	$('#r-robot-select').change(function(){
		var r_img=$(this).children('option:selected').val();//这就是selected的值
		var r_name=$(this).children('option:selected').text();//这就是selected的值
		$("#r-robot").attr('src',get_url('img/'+r_img));
		$("#select-type").text(r_name);
	})
	$('#t-robot-select').change(function(){
		var t_img=$(this).children('option:selected').val();//这就是selected的值
		var t_name=$(this).children('option:selected').text();//这就是selected的值
		$("#t-robot").attr('src',get_url('img/'+t_img));
		$("#select-type").text(t_name);
	})
})
</script>

