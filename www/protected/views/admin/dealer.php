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
	<div class="title">预约试驾 — 总览</div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="9%">姓名</th>
			<th width="10%">手机</th>
			<th width="13%">省份</th>
			<th width="13%">城市</th>
			<th width="14%">邮箱</th>
                        <th width="9%">等级</th>
		</tr>
<?php
if(@$dealer_list[0]){
    foreach($dealer_list as $v){?>
                    <tr>
                                    <td><?=$v['name']?></td>
                                    <td><?=$v['mobile']==''?'无':$v['mobile'];?></td>
                                    <td><?=$v['province']?></td>
                                    <td><?=$v['city']?></td>
                                    <td><?=$v['email']?></td>
                                    <td><?=$v['level']?></td>
                    </tr>
    <?php }

    }else{ ?>
                暂无经销商列表
<?php }?>
	</table>
</div>
</div>