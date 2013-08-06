<script type="text/javascript" language="javascript">
$(document).ready(function(){
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">订单详细</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">经销商</th>
			<td>
				<span ><?php echo $order['company'];?></span>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">内容</th>
			<td>
				<pre><?php echo $order['content'];?></pre>
			</td>
		</tr>
		<tr>
			<th width="70px">订单时间</th>
			<td>
				<span><?php echo date("Y-m-d H:i:s", $order['record_time']);?></span>
			</td>
		</tr>
	</table>
	
</div>
</div>