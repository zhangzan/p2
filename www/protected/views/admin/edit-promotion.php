<script type="text/javascript" language="javascript">
<?php foreach (array(1,2,3,4,5) as $row) { ?>
var level_<?php echo $row;?>=<?php echo in_array($row, $promotion['level_list'])?'true':'false';?>;
<?php }?>
var level="<?php echo $promotion['level'];?>";
$(document).ready(function(){
	$.each([1,2,3,4,5],function(k,v){
		$("#level_"+v).click(function(){
			if(eval("level_"+v)==true){
				eval("level_"+v+"=false");
			}else{
				eval("level_"+v+"=true");
			}
		});
	});

	$("#btn_add_promotion").click(function(){
		var title = $.trim($('#title').val());
		var content = $.trim($('#promotion_content').val());
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
		level="";
		$.each([1,2,3,4,5],function(k,v){
			if(eval("level_"+v)==true){
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
		
		kajax("AjaxAdmin","EditPromotion",{id:<?php echo $promotion['id'];?>,
							title:title,
							content:content,
							level:level,
							publish_time:publish_time},function(obj){
								if(obj.code==1){
									alert("修改成功。");
									location.href=get_url("Admin","PromotionList");
								}else if(obj.code==2){
									alert("未改动。");
									location.href=get_url("Admin","PromotionList");
								}else{
									alert("修改失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">修改优惠政策</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">标题</th>
			<td>
				<input type="text" name="title" id="title" value="<?php echo $promotion['title'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">内容</th>
			<td>
				<textarea name="promotion_content" id="promotion_content" style="width:650px;height:100px;"><?php echo $promotion['content'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">允许级别</th>
			<td>
				<input type="checkbox" id="level_1" <?php echo in_array(1, $promotion['level_list'])?'checked="checked"':'';?>>一级经销商&nbsp;
				<input type="checkbox" id="level_2" <?php echo in_array(2, $promotion['level_list'])?'checked="checked"':'';?>>二级经销商&nbsp;
				<input type="checkbox" id="level_3" <?php echo in_array(3, $promotion['level_list'])?'checked="checked"':'';?>>三级经销商&nbsp;
				<input type="checkbox" id="level_4" <?php echo in_array(4, $promotion['level_list'])?'checked="checked"':'';?>>四级经销商&nbsp;
				<input type="checkbox" id="level_5" <?php echo in_array(5, $promotion['level_list'])?'checked="checked"':'';?>>五级经销商
			</td>
		</tr>
		<tr>
			<th width="70px">发布时间</th>
			<td>
				<input type="text" id="publish_date" onclick="WdatePicker();" value="<?php echo date("Y-m-d", $promotion['publish_time']);?>" />&nbsp;<input type="text" id="publish_h"  value="<?php echo date("H", $promotion['publish_time']);?>">时&nbsp;<input type="text" id="publish_m"  value="<?php echo date("i", $promotion['publish_time']);?>">分
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_add_promotion">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>