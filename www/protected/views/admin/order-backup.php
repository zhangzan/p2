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
<?php
$robot = array (
		1 => 'i-ROBOT-BO',
		2 => 'i-ROBOT-SC',
		3 => 'i-ROBOT-LA',
		4 => 'T-ROBOT-S',
		5 => 'T-ROBOT-W',
		6 => 'T-ROBOT-O'
);
$plan_buy_time = array (
		0 => '没有时间要求',
		1 => '0-6月之内',
		2 => '7-12月之内',
		3 => '1-2年之内',
		4 => '2年以上'
);
$expect_feedback_time = array (
		0 => '没有时间要求',
		1 => '0-12小时之内',
		2 => '1天之内',
		3 => '3天之内',
		4 => '一周之内'
);
?>
 <?php //print_r($ret);die;?>
<div id="colTwo">
	<div class="bg2">
		<div class="title">预约试驾 — 总览</div>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<th width="55">姓名</th>
				<th width="70">预约车型</th>
				<th width="30">性别</th>
				<th width="73">手机</th>
				<th width="100">预约城市</th>
				<th width="">邮箱</th>
				<th width="40">状态</th>
			</tr>
<?php

if (count ( $ret ) > 0) {
	foreach ( $ret as $v ) {
		?>
		<tr>
				<td><?=$v['name']?></td>
				<td><?=$robot[$v['type']]?></td>
				<td><?=$v['sex']?></td>
				<td><?=$v['mobile']==''?'无':$v['mobile'];?></td>
				<td><?=$v['province']?>-<?=$v['city']?></td>
				<td><?=$v['email']?></td>
				<td><?=$v['status_type']?></td>
			</tr>
<?php } }else{?>
                暂无相关列表
<?php } ?>
	</table>
	</div>
</div>