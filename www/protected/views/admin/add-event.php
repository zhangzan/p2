<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#btn_add_event").click(function(){
		var title = $.trim($('#title').val());
		var content = $.trim($('#event_content').val());
		var publish_date = $.trim($('#publish_date').val());
		var publish_h = $.trim($('#publish_h').val());
		var publish_m = $.trim($('#publish_m').val());

		if(title==""){
			alert("标题 不能为空");
			$("#username").focus();
			return;
		}
		if(content==""){
			alert("内容 不能为空");
			$("#password").focus();
			return;
		}
		var level="";
		$.each([1,2,3,4,5],function(k,v){
			if($('#level_'+v).attr("checked")){
				if(level!=""){
					level+=",";
				}
				level+=v;
			}
		});
		if(publish_date==""){
			alert("请填写发布时间");
			return;
		}
		var publish_time="";
		if(publish_h==""){
			publish_time=publish_date;
		}else if(publish_m==""){
			publish_time=publish_date+" "+publish_h+":00";
		}else{
			publish_time=publish_date+" "+publish_h+":"+publish_m;
		}
		
		kajax("AjaxAdmin","AddEvent",{title:title,
							content:content,
							level:level,
							publish_time:publish_time},function(obj){
								if(obj.code==1){
									alert("添加成功。");
									location.href=get_url("Admin","EventList");
								}else{
									alert("添加失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">新增活动行程</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">标题</th>
			<td>
				<input type="text" name="title" id="title" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">内容</th>
			<td>
				<textarea name="event_content" id="event_content" style="width:650px;height:100px;"></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">允许级别</th>
			<td>
				<input type="checkbox" id="level_1">一级经销商&nbsp;<input type="checkbox" id="level_2">二级经销商&nbsp;<input type="checkbox" id="level_3">三级经销商&nbsp;<input type="checkbox" id="level_4">四级经销商&nbsp;<input type="checkbox" id="level_5">五级经销商
			</td>
		</tr>
		<tr>
			<th width="70px">发布时间</th>
			<td>
				<input type="text" id="publish_date" onclick="WdatePicker();" />&nbsp;<input type="text" id="publish_h">时&nbsp;<input type="text" id="publish_m">分
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_add_event">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>