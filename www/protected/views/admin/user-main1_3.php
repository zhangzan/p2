<script language="javascript">
function check_submit(){
	var starttime=document.getElementById("starttime").value;
	var endtime=document.getElementById("endtime").value;
    var starttime = new Date(Date.parse(starttime.replace(/-/g,"/"))).getTime();
    var endtime = new Date(Date.parse(endtime.replace(/-/g,"/"))).getTime();
	var dates = Math.abs((starttime - endtime))/(1000*60*60*24);
	if(dates >= 31){
		alert("查询范围不能超过一个月");
		return false;
	}
 	if(starttime =="" || endtime ==""){
	 	alert("请选择日期");
	 	return false;
    }else if(starttime>endtime){
    	alert("开始日期不得大于结束日期");
    	return false;
    }else{
    	return true;
    }
}
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">新闻 — 总览</div>
	<form method="get" onSubmit="return check_submit();">
	开始时间：
	<input type="text" name="starttime" id="starttime" readonly value="<?=$starttime?>" onClick="WdatePicker()"/>
	结束时间：
	<input type="text" name="endtime" id="endtime" readonly value="<?=$endtime?>" onClick="WdatePicker()"/>
	<button type="submit" name="submit" >查询</button>
	</form>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="9%">日期</th>
			<th width="10%">DNU</th>
			<th width="5%">DAU</th>
			<th width="10%">昨天登陆数</th>
			<th width="13%">昨天未登陆数</th>
			<th width="13%">总用户</th>
			<th width="14%">新增付费用户数</th>
			<th width="12%">付费用户总数</th>
			<th width="14%">独立付费用户数</th>
		</tr>
<?php foreach($userdata as $v){?>
		<tr>
				<td><?=$v['date']?></td>
				<td><?=$v['new_user_count'].'/'.$v['new_player_count']?></td>
				<td><?=$v['DAU']?></td>
				<td><?=$v['yesterday']?></td>
				<td><?=$v['not_yesterday']?></td>
				<td><?=$v['user_count'].'/'.$v['player_count']?></td>
				<td><?=$v['new_pay']?></td>
				<td><?=$v['pay']?></td>
				<td><?=$v['today_pay']?></td>
		</tr>
<?php } ?>
	</table>
</div>
</div>