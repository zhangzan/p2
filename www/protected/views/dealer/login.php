<script type="text/javascript">
$(document).ready(function(){
	$("#btn_login").click(function(){
		var username=$("#username").val();
		var password=$("#password").val();
		var session_time=$("#session_time").val();
		if(username==''){
			alert("请输入经销商名称");
			return;
		}
		if(password==''){
			alert("请输入密码");
			return;
		}
		kajax("AjaxDealer","AjaxLogin",{username:username,password:password,session_time:session_time},function(obj){
			if(obj.code==1){
				location.href=get_url("Dealer","Main");
			}else if(obj.code==2){
				alert("经销商名称或密码错误！");
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
<div class="login">
	<h2>经销商专区</h2>
	<p><span>经销商名称</span><input type="text" id="username" class="w280"/></p>
	<p><span>输入密码</span><input type="password" id="password" class="w280"/><select id="session_time" class=""><option value="604800">保存一周</option></select></p>
	<div class="mt40"><a href="javascript:void(0);" id="btn_login" class="btn3 mr20">登陆</a> <a href="<?php echo $this->url("Dealer", "Register");?>" class="btn3">注册</a></div>
</div>