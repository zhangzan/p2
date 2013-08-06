<script type="text/javascript" language="javascript">
	function del(id){
		y=confirm("确认删除该条记录么?");
		if(y==true){
			window.location="Order?act=del&id="+id;
		}
	}

</script>
<?php //print_r($ret);die;?>
<div id="colTwo">
	<div class="bg2">
		<div class="title">预约试驾 — 总览</div>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<th width="55">姓名</th>
				<th width="70">预约车型</th>
				<th width="73">手机</th>
				<th width="100">预约城市</th>
				<th width="">邮箱</th>
				<th width="40">状态</th>
				<th width="55">操作</th>
			</tr>
<?php

if (count ( $ret ) > 0) {
	foreach ( $ret as $v ) {
		?>
		<tr>
			<td><?=$v['name']?></td>
			<td><?=$robot[$v['type']]?></td>
			<td><?=$v['mobile']==''?'无':$v['mobile'];?></td>
			<td><?=$v['province']?>-<?=$v['city']?></td>
			<td><?=$v['email']?></td>
			<td>
				<?php
					if($v['status']==1){
						echo "<font color='blue'>";
					}elseif($v['status']==2){
						echo "<font color='green'>";
					}elseif($v['status']==3){
						echo "<font color='red'>";
					}
				?>
				<?=$status_type[$v['status']]?>
				</font>
			</td>
			<td>
				<a href="Order?act=edit&id=<?=$v['id']?>">查看</a>
				<a href="#" onclick='del(<?=$v['id']?>)'>删除</a>
			</td>
		</tr>
<?php } }else{?>
                暂无相关列表
<?php } ?>
	</table>
	</div>
</div>