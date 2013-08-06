<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("[id^='b_del_']").click(function(){
		var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
		var id=$(this).attr('id').replace("b_del_","");
		kajax("AjaxAdmin","DelPart",{id:id},function(obj){
			if(obj.code==1){
				window.location.reload();
			}else{
				alert("错误。删除失败");
				window.location.reload();
			}
		},this);
	});
});
</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		部件列表
	</div>
	<div><a href="<?php echo $this->url("Admin", "AddPart"); ?>" style="font-size:15px;color:blue;">添加</a></div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<?php $robot_map = array(0=>'',1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-w',5=>'t-robot-s'); ?>
		<tr>
			<th width="">部件名称</th>
			<!--<th>车型</th>-->
			<th>价格</th>
			<th>预览</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($list as $val){
				?>
				<tr>
					<td align='center'>
						<?php echo $val['name'];?>
					</td>
				<!--
					<td align='center'>
						<?php echo $robot_map[$val['type']];?>
					</td>
				-->
					<td align='center'>
						￥<?php echo $val['price'];?>
					</td>
					<td align='center'>
						<img src="<?php echo $this->url('upload/part/'.$val['thumbnail']);?>" style="height:45px;width:45px;" />
					</td>
					<td align='center'>
						<a href="javascript:void(0)" id="b_del_<?php echo $val['id'];?>">删除</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>