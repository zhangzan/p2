<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("[id^='job_']").click(function(){
		var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
		var id=$(this).attr("id").replace("job_","");
		kajax("AjaxAdmin","DelJob",{id:id},function(obj){
			if(obj.code==1){
				alert("删除成功");
				window.location.reload();
			}else{
				alert("出错了。");
			}
		},this);
	});
});
</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		职位列表
	</div>
	<div><a href="<?php echo $this->url("Admin", "AddJob"); ?>" style="font-size:15px;color:blue;">添加</a></div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="">职位名</th>
			<th width="">发布时间</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($list as $val){
				?>
				<tr>
					<td align='center'>
						<?php echo $val['title'];?>
					</td>
					<td align='center'>
						<?php echo date("Y-m-d H:i:s", $val['publish_time']);?>
					</td>
					<td align='center'>
						<a href='<?php echo $this->url("Admin","JobDetail", array('id'=>$val['id']));?>'>查看详细</a>&nbsp;&nbsp;
						<a href="javascript:void(0)" id="job_<?php echo $val["id"];?>">删除</a>&nbsp;&nbsp;
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>