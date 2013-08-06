<script type="text/javascript" language="javascript">
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">职位详细</div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">职位名</th>
			<td>
				<input readonly="readonly" type="text" name="title" id="title" value="<?php echo $detail['title'] ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">招聘人数</th>
			<td>
				<input readonly="readonly" type="text" name="count" id="count" value="<?php echo $detail['count'] ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">截止日期</th>
			<td>
				<input readonly="readonly" type="text" name="expire_time" id="expire_time" value="<?php echo date("Y-m-d", $detail['expire_time']); ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">工作地点</th>
			<td>
				<input readonly="readonly" type="text" name="location" id="location" value="<?php echo $detail['location'] ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">工作年限</th>
			<td>
				<input readonly="readonly" type="text" name="experience" id="experience" value="<?php echo $detail['experience'] ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">学历</th>
			<td>
				<input readonly="readonly" type="text" name="education" id="education" value="<?php echo $detail['education'] ?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">岗位要求</th>
			<td>
				<p id="desc" ><?php echo $detail['desc']; ?></p>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">岗位职责</th>
			<td>
				<p id="responsibility" ><?php echo $detail['responsibility']; ?></p>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">任职资格</th>
			<td>
				<p id="qualification" ><?php echo $detail['qualification']; ?></p>
			</td>
		</tr>
	</table>
	
</div>
</div>