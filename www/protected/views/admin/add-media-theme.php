<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#btn_submit").click(function(){
		var theme=$.trim($("#theme").val());
		if(theme==""){
			alert("主题 不能为空");
			return;
		}
		kajax("AjaxAdmin","AddMediaTheme",{theme:theme},function(obj){
			if(obj.code==1){
				alert("添加成功");
				window.location.href=get_url("Admin","MediaThemeList");
			}else{
				alert("添加失败");
				window.location.reload();
			}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">添加主题</div>
	<div>
        <a href="<?=$this->url('Admin','MediaThemeList')?>" style="font-size:15px;color:blue;">返回主题列表</a>
    </div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">主题</th>
			<td>
				<input type="text" name="theme" id="theme" value="" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="btn_submit" type="submit" value="提交" />
			</td>
		</tr>
	</table>
</div>
</div>