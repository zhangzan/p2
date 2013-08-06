<script type="text/javascript" src="<?php echo $this->url('js/area.js')?>"></script>
<script type="text/javascript">
var sex=1;
$(document).ready(function(){
	_init_area();
	$("[id^='sex_']").click(function(){
		sex=$(this).val();
	});
	$("#register_submit").click(function(){
		var email_regex=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/;
		var mobile_regex=/^[0-9]{11}$/;
		var name=$("#name").val();
		if(name==''){
			alert("请输入公司名称");
            return;
		}
		var mobile=$("#mobile").val();
		if(!mobile_regex.test(mobile)){
			alert("请输入有效的手机号码");
			$("#mobile").focus();
            return;
		}

		var tel_1=$("#tel_1").val();
		var tel_2=$("#tel_2").val();
		var tel_3=$("#tel_3").val();
		var tel=tel_1+"-"+tel_2+"-"+tel_3;
		var fax=$("#fax").val();

		if($("#s_province").get(0).selectedIndex==0){
            alert("请选择省份");
            return;
        }
        if($("#s_city").get(0).selectedIndex==0){
            alert("请选择城市");
            return;
        }
        if(!email_regex.test($("#email").val())){
			alert('请输入有效的E-mail');
			$("#email").focus();
			return;
		}
		var province=$('#s_province').find("option:selected").text();
		var city=$('#s_city').find("option:selected").text();
		var email=$("#email").val();
		kajax("AjaxDealer","AjaxRegister",{name:name,sex:sex,mobile:(mobile),tel:tel,fax:fax,province:province,city:city,email:email},function(obj){
			if(obj.code==1){
				alert("信息已提交成功。");
			}else if(obj.code==2){
				alert("您已提交过，请不要重复提交。");
			}
		},this);
	});
});
</script>
<img src="<?php echo $this->url("images/ban-dealers-reg.jpg");?>"/>
<div class="c-nav">
	<i class="r">
		<a href="<?php echo $this->url("Dealer", "Index");?>">经销商查询</a>
		<a href="<?php echo $this->url("Dealer", "Register");?>" class="hover">经销商加盟</a>
		<a href="<?php echo $this->url("Dealer", "Login");?>">经销商登入口</a>
	</i>
	<span>关于新世纪</span>
</div><!--c-nav-end-->
<div class="reg bg2 fix">
	<div class="l">
		<h2>经销商加盟申请</h2>
		<form action="" method="get">
			<table border="0" cellpadding="5" cellspacing="10">
				<tr>
				  <td width="105"><select><option>公司名称</option></select></td>
				  <td width="280"><input type="text" id="name" class="w280"/></td>
				</tr>
				<tr>
				  <td>性别</td>
				  <td class="v-3"><input type="radio" id="sex_1" name="sex" value="1" checked="checked"/>男<input type="radio" name="sex" id="sex_2" value="2" class="ml20"/>女</td>
				</tr>
				<tr>
				  <td>手机</td>
				  <td><input type="text" id="mobile" class="w280"/></td>
				</tr>
				<tr>
				  <td>座机</td>
				  <td><input type="text" id="tel_1" class="w50 mr6"/><input type="text" id="tel_2" class="mr6 w70"/><input type="text" id="tel_3" class="w145"/></td>
				</tr>
				<tr>
				  <td>传真</td>
				  <td><input type="text" id="fax" class="w280"/></td>
				</tr>
				<tr class="s1">
				  <td>地址</td>
				  <td>
					  <select id="s_province" name="s_province" class="w135 mr6"><option>请选择省份</option></select>
					  <select id="s_city" name="s_city" class="w135"><option>请选择城市</option></select>
				  </td>
				</tr>
				<tr>
				  <td>邮箱</td>
				  <td><input type="text" id="email" class="w280"/></td>
				</tr>
				<tr>
				  <td colspan="2"><a href="javascript:void(0);" id="register_submit" class="btn2">提交</a></td>
				</tr>
			  </table>
		</form>
	</div>
	<div class="reg-r r">
		<p><img src="<?php echo $this->url("images/tel.jpg");?>"/></p>
		<h3>全国招商</h3>
            <p class="p1">              
			   <br/>华东区：徐先生 电话：13917780725 
			   <br/>北方区：程先生 电话：13901393007 
			   <br/>南方区：许小姐 电话：13816400684
			</p>

		<p>周一至周五（早8：00-晚8：00）<br/>&nbsp;周六至周日（早10：00-晚6：00）</p>
		<a href="##"><em class="play"></em>经销商须知，经销商加盟合同</a>
	</div>  
</div>