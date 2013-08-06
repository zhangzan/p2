<script type="text/javascript" language="javascript">
	function check_submit(){
		var obj_banner_1 = document.getElementById('banner_1');		/*big banner 1*/
		var obj_banner_2 = document.getElementById('banner_2');		/*big banner 2*/
		var obj_banner_3 = document.getElementById('banner_3');		/*big banner 3*/
		var obj_banner_4 = document.getElementById('banner_4');		/*big banner 4*/

		/*1*/
		if(obj_banner_1.value!=""){
			var strtype = obj_banner_1.value.substring(obj_banner_1.value.length-3,obj_banner_1.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*2*/
		if(obj_banner_2.value!=""){
			var strtype = obj_banner_2.value.substring(obj_banner_2.value.length-3,obj_banner_2.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*3*/
		if(obj_banner_3.value!=""){
			var strtype = obj_banner_3.value.substring(obj_banner_3.value.length-3,obj_banner_3.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*4*/
		if(obj_banner_4.value!=""){
			var strtype = obj_banner_4.value.substring(obj_banner_4.value.length-3,obj_banner_4.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}
	}

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		首页小banner列表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font style="font-size:14px;"><a href="#" onclick="location='SmallBanner?act=add'">新增banner</a></font>
	</div>

<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="65px">编号</th>
			<th width="130px">图片（缩略图）</th>
			<th width="130px">名称</th>
			<th width="130px">连接地址</th>
			<th width="130px">最后更新时间</th>
			<th width="	">操作</th>
		</tr>
		<?php
		if(!empty($bannerlist)){
			foreach($bannerlist as $key=>$val){
				?>
				<tr>
					<td align='center'><?=$val['id']?></td>
					<td align='center' >
						<?php
							if(!empty($val['image_url'])){
								echo "<a href='".$val['image_url']."' title='点击查看大图' target='_blank'><img style='max-height:70px' src='../../".$val['image_url']."'></a>";
							}else{
								echo "无";
							}
						?>
					</td>
					<td align='center'><?=$val['name']?></td>
					<td align='center'><?=$val['url']?></td>
					<td align='center'><?=$val['update_time']?></td>
					<td align='left'><a href="SmallBanner?act=edit&id=<?=$val['id']?>">编辑</a></td>
				</tr>

		<?php	}
		}else{
			echo "<tr><td align='center' colspan=6>无</td></tr>";
		}
		?>

	</table>
</form>
</div>
</div>