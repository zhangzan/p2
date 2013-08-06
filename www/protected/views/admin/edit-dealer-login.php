<script type="text/javascript" src="<?php echo $this->url('js/area.js')?>"></script>
<script type="text/javascript" language="javascript">
var can_order=<?php echo $dealer_login['can_order'];?>;
var selected_province=<?php echo json_encode($dealer_login['province']);?>;
var selected_city=<?php echo json_encode($dealer_login['city']);?>;
$(document).ready(function(){
    _init_area();
    $("#s_province").children().each(function(){
        if ($(this).text()==selected_province){
            this.selected = true;
            change(1);
        }
    });
    $("#s_city").children().each(function(){
        if ($(this).text()==selected_city){
            this.selected = true;
        }
    });
    //$("#s_province").get(0).value=selected_province;
    //$("#s_city").get(0).value=selected_city;
	$("#can_order").click(function(){
		if(can_order==1){
			can_order=0;
		}else{
			can_order=1;
		}
	});
	$("#btn_edit_dealer").click(function(){
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

		var province = $.trim($("#s_province").val());
		var city = $.trim($("#s_city").val());

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
		kajax("AjaxAdmin","EditDealerLogin",{id:<?php echo $dealer_login['id'];?>,
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
									alert("修改成功。");
									location.href=get_url("Admin","DealerLoginList");
								}else if(obj.code==2){
									alert("没有改动。");
									$("#username").focus();
								}else{
									alert("修改失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">修改经销商登录信息</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">用户名</th>
			<td>
				<span><?php echo $dealer_login['username'];?></span>
			</td>
		</tr>
		<tr>
			<th width="70px">密码</th>
			<td>
				<input type="text" name="password" id="password" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>仅在需要修改时填写</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">经销商级别</th>
			<td>
				<select id="level">
					<option value="0" <?php echo $dealer_login['level']==0?'selected="selected"':'';?>>请选择</option>
					<option value="1" <?php echo $dealer_login['level']==1?'selected="selected"':'';?>>一级经销商</option>
					<option value="2" <?php echo $dealer_login['level']==2?'selected="selected"':'';?>>二级经销商</option>
					<option value="3" <?php echo $dealer_login['level']==3?'selected="selected"':'';?>>三级经销商</option>
					<option value="4" <?php echo $dealer_login['level']==4?'selected="selected"':'';?>>四级经销商</option>
					<option value="5" <?php echo $dealer_login['level']==5?'selected="selected"':'';?>>五级经销商</option>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">公司名称</th>
			<td>
				<input type="text" name="company" id="company" value="<?php echo $dealer_login['company'];?>"  style="height:20px;" size="40"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">联系人名称</th>
			<td>
				<input type="text" name="contact_name" id="contact_name" value="<?php echo $dealer_login['contact_name'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">地址</th>
			<td>
				<input type="text" name="address" id="address" value="<?php echo $dealer_login['address'];?>"  style="height:20px;" size="40"/>
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
				<input type="text" name="point" id="point" value="<?php echo $dealer_login['point'];?>"  style="height:20px;" size="40"/>
				<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">获取座标</a>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">邮编</th>
			<td>
				<input type="text" name="postcode" id="postcode" value="<?php echo $dealer_login['postcode'];?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">电话</th>
			<td>
				<input type="text" name="tel" id="tel" value="<?php echo $dealer_login['tel'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*(电话,手机至少填写一个)</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">手机</th>
			<td>
				<input type="text" name="mobile" id="mobile" value="<?php echo $dealer_login['mobile'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">传真</th>
			<td>
				<input type="text" name="fax" id="fax" value="<?php echo $dealer_login['fax'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">邮箱</th>
			<td>
				<input type="text" name="email" id="email" value="<?php echo $dealer_login['email'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">是否有试驾链接</th>
			<td>
				<input type="checkbox" name="can_order" id="can_order" <?php echo $dealer_login['can_order']==1?'checked="checked"':'';?>  style="height:20px;" size="30"/>
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_edit_dealer">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>