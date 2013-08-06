<script type="text/javascript" src="<?php echo $this->url('js/area.js')?>"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
    _init_area();
	$("#btn_add_dealer").click(function(){
		var username 	 = $.trim($('#username').val());
		var password 	 = $.trim($('#password').val());
		var level 		 = $.trim($('#level').val());
		var company 	 = $.trim($('#company').val());
		var contact_name = $.trim($('#contact_name').val());
		var address 	 = $.trim($('#address').val());
		var point 	  	 = $.trim($('#point').val());
		var postcode 	 = $.trim($('#postcode').val());
		var tel 		 = $.trim($('#tel').val());
		var mobile 	  	 = $.trim($('#mobile').val());
		var fax 	  	 = $.trim($('#fax').val());
		var email 		 = $.trim($('#email').val());
		var can_order 	 = ($('#can_order').attr("checked")=="checked")?1:0;

		var province = $.trim($("#s_province").val());
		var city = $.trim($("#s_city").val());

		if(username==""){
			alert("用户名 不能为空");
			$("#username").focus();
			return;
		}
		if(password==""){
			alert("密码 不能为空");
			$("#password").focus();
			return;
		}
		if(level==0){
			alert("请选择等级");
			$("#level").focus();
			return;
		}
		if(company==""){
			alert("公司名称 不能为空");
			$("#company").focus();
			return;
		}
		if(contact_name==""){
			alert("联系人名称 不能为空");
			$("#contact_name").focus();
			return;
		}
		if(address==""){
			alert("地址 不能为空");
			$("#address").focus();
			return;
		}
		if(province==""||province=="请选择省份"){
			alert("省 不能为空");
			$("#province").focus();
			return;
		}
		if(city==""||city=="请选择城市"){
			alert("市 不能为空");
			$("#city").focus();
			return;
		}
		var point_regex=/^[0-9]{1,3}(\.[0-9]{1,}){0,1}\,{1}[0-9]{1,3}(\.[0-9]{1,}){0,1}$/;
		if (point&&!point_regex.test(point)) {
			alert("请输入有效的座标");
			$("#point").focus();
			return;
		};
		
		if(tel==""&&mobile==""){
			alert("电话,手机必须填写一个");
			$("#tel").focus();
			return;
		}
		var mobile_regex=/^[0-9]{11}$/;
		if(mobile&&!mobile_regex.test(mobile)){
			alert("请输入有效的手机号码");
			$("#mobile").focus();
			return;
		}
		var email_regex=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/;
		if(email==""||!email_regex.test(email)){
			alert("请输入有效的邮箱");
			$("#email").focus();
			return;
		}
		kajax("AjaxAdmin","AddDealer",{username:username,
							password:password,
							level:level,
							company:company,
							contact_name:contact_name,
							address:address,
							province:province,
							city:city,
							point:point,
							postcode:postcode,
							tel:tel,
							mobile:mobile,
							fax:fax,
							email:email,
							can_order:can_order},function(obj){
								if(obj.code==1){
									alert("注册成功。");
									location.href=get_url("Admin","DealerLoginList");
								}else if(obj.code==2){
									alert("注册失败。用户名重复");
									$("#username").focus();
								}else{
									alert("注册失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">新增经销商登录</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">用户名</th>
			<td>
				<input type="text" name="username" id="username" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">密码</th>
			<td>
				<input type="text" name="password" id="password" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">经销商级别</th>
			<td>
				<select id="level">
					<option value="0">请选择</option>
					<option value="1">一级经销商</option>
					<option value="2">二级经销商</option>
					<option value="3">三级经销商</option>
					<option value="4">四级经销商</option>
					<option value="5">五级经销商</option>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">公司名称</th>
			<td>
				<input type="text" name="company" id="company" value=""  style="height:20px;" size="40"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">联系人名称</th>
			<td>
				<input type="text" name="contact_name" id="contact_name" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">地址</th>
			<td>
				<input type="text" name="address" id="address" value=""  style="height:20px;" size="40"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">省</th>
			<td>
                <select id="s_province" name="s_province" style="width:105px;"></select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">市</th>
			<td>
                <select id="s_city" name="s_city" style="width:105px;"></select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">座标</th>
			<td>
				<input type="text" name="point" id="point" value=""  style="height:20px;" size="40"/>
				<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">获取座标</a>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">邮编</th>
			<td>
				<input type="text" name="postcode" id="postcode" value=""  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">电话</th>
			<td>
				<input type="text" name="tel" id="tel" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*(电话,手机,传真至少填写一个)</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">手机</th>
			<td>
				<input type="text" name="mobile" id="mobile" value=""  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">传真</th>
			<td>
				<input type="text" name="fax" id="fax" value=""  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">邮箱</th>
			<td>
				<input type="text" name="email" id="email" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">是否有试驾链接</th>
			<td>
				<input type="checkbox" name="can_order" id="can_order"  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_add_dealer">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>