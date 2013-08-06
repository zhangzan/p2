<script type="text/javascript" language="javascript">
	function checkSubmit(){
		var obj_name	 = document.getElementById('name');		/*标题*/
		var obj_category  = document.getElementById('category');		/*类别*/
		var obj_product_image = document.getElementById('product_image');		/*图片*/
		var obj_xijie1 = document.getElementById('xijie1');		/*细节图片*/
		var obj_xijie2 = document.getElementById('xijie2');		/*细节图片*/
		var obj_xijie3 = document.getElementById('xijie3');		/*细节图片*/
		var obj_xijie4 = document.getElementById('xijie4');		/*细节图片*/
		var obj_xijie5 = document.getElementById('xijie5');		/*细节图片*/
		var obj_xijie6 = document.getElementById('xijie6');		/*细节图片*/

		/*name是否为空*/
		if(obj_name.value==""){
			alert("产品名不能为空!");
			return false;
		}

		/*请选择类别*/
		if(obj_category.value==0){
			alert("请选择类别!");
			return false;
		}

		/*检查图片的格式是否正确*/
		if(obj_product_image.value!=""){
			var strtype = obj_product_image.value.substring(obj_product_image.value.length-3,obj_product_image.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品图片格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*细节1*/
		if(obj_xijie1.value!=""){
			var strtype = obj_xijie1.value.substring(obj_xijie1.value.length-3,obj_xijie1.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片1格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*细节2*/
		if(obj_xijie2.value!=""){
			var strtype = obj_xijie2.value.substring(obj_xijie2.value.length-3,obj_xijie2.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片2格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*obj_xijie3*/
		if(obj_xijie3.value!=""){
			var strtype = obj_xijie3.value.substring(obj_xijie3.value.length-3,obj_xijie3.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片3格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*obj_xijie4*/
		if(obj_xijie4.value!=""){
			var strtype = obj_xijie4.value.substring(obj_xijie4.value.length-3,obj_xijie4.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片4格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*obj_xijie5*/
		if(obj_xijie5.value!=""){
			var strtype = obj_xijie5.value.substring(obj_xijie5.value.length-3,obj_xijie5.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片5格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}


		/*obj_xijie6*/
		if(obj_xijie6.value!=""){
			var strtype = obj_xijie6.value.substring(obj_xijie6.value.length-3,obj_xijie6.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("产品细节图片6格式错误，只能为以下格式：jpg、png、gif、jpeg");
				return false;
			}
		}

	}

	function showtable(ss){
		var obj = document.getElementById(ss);
		if(ss=="zhineng"){
			obj.style.display='block';
			document.getElementById("tupian").style.display="none";
		}else if(ss=="tupian"){
			obj.style.display='block';
			document.getElementById("zhineng").style.display="none";
		}

	}
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title"><?php if($act=="add"){echo "新增";}elseif($act =="edit"){echo "编辑";}?>产品</div>
	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<div>
		<span><a href="#" style="cursor:pointer; font-size:16px;" onclick="showtable('zhineng');">智能</a></span>&nbsp
		<span><a href="#" style="cursor:pointer; font-size:16px;" onclick="showtable('tupian');">图片</a></span>
	</div>

<!-- 产品性能信息 -->
	<table cellpadding="0" cellspacing="0" width="100%" id="zhineng" style="display:block">
		<tr>
			<td width="70px">产品名称</td>
			<td width="90%">
				<input type="text" name="name" id="name" value="<?php if($act=="edit"){echo $productinfo['name'];} ?>"    size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td >产品类别</td>
			<td>
				<select name="category" id="category">
					<option value="0" >请选择</option>
					<option value="I-ROBOT" <?php if($act=="edit"){if($productinfo['category']=='I-ROBOT'){echo "selected='selected'";}}?> >I-ROBOT</option>
					<option value="T-ROBOT" <?php if($act=="edit"){if($productinfo['category']=='T-ROBOT'){echo "selected='selected'";}}?>>T-ROBOT</option>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td>产品图片</td>
			<td>
				<input type="file" name="product_image" id="product_image"/>
				<?php
					if($act=="edit"){
						if(!empty($productinfo['product_image'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['product_image']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_product_image' value='".$productinfo['product_image']."'>";
					}
				?>
			</td>

		</tr>
		<tr>
			<td width="70px" valign="top">产品描述</td>
			<td>
				<textarea id="product_desc" name="product_desc" style="width: 694px; height: 90px;"><?php if($act=="edit"){echo $productinfo['product_description'];}?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td>产品特点1</td>
			<td><input type="text" name="tedian1" id="tedian1" value="<?php if($act=="edit"){echo $productinfo['tedian1'];}?>" /></td>
		</tr>
		<tr>
			<td valign="top">特点1描述</td>
			<td><textarea name="tedian1_desc" id="tedian1_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian1_desc'];}?></textarea></td>
		</tr>
		<tr>
			<td>产品特点2</td>
			<td><input type="text" name="tedian2" id="tedian2" value="<?php if($act=="edit"){echo $productinfo['tedian2'];}?>" /></td>
		</tr>
		<tr>
			<td valign="top">特点2描述</td>
			<td><textarea name="tedian2_desc" id="tedian2_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian2_desc'];}?></textarea></td>
		</tr>
		<tr>
			<td>产品特点3</td>
			<td><input type="text" name="tedian3" id="tedian3" value="<?php if($act=="edit"){echo $productinfo['tedian3'];}?>" /></td>
		</tr>
		<tr>
			<td valign="top">特点3描述</td>
			<td><textarea name="tedian3_desc" id="tedian3_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian3_desc'];}?></textarea></td>
		</tr>
		<tr>
			<td>产品特点4</td>
			<td><input type="text" name="tedian4" id="tedian4" value="<?php if($act=="edit"){echo $productinfo['tedian4'];}?>" /></td>
		</tr>
		<tr>
			<td valign="top">特点4描述</td>
			<td><textarea name="tedian4_desc" id="tedian4_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian4_desc'];}?></textarea></td>
		</tr>
		<tr>
			<td>产品特点5</td>
			<td><input type="text" name="tedian5" id="tedian5" value="<?php if($act=="edit"){echo $productinfo['tedian5'];}?>"/></td>
		</tr>
		<tr>
			<td valign="top">特点5描述</td>
			<td><textarea name="tedian5_desc" id="tedian5_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian5_desc'];}?></textarea></td>
		</tr>
		<tr>
			<td>产品特点6</td>
			<td><input type="text" name="tedian6" id="tedian6" value="<?php if($act=="edit"){echo $productinfo['tedian6'];}?>"/></td>
		</tr>
		<tr>
			<td valign="top">特点6描述</td>
			<td><textarea name="tedian6_desc" id="tedian6_desc" style="width: 695px; height: 57px;"><?php if($act=="edit"){echo $productinfo['tedian6_desc'];}?></textarea></td>
		</tr>

	</table>

<!-- 产品图片 -->
	<table cellpadding="0" cellspacing="0" width="100%" id="tupian" style="display:none">
		<tr>
			<td width="90px">产品细节图片1</td>
			<td width="88%">
				<input type="file" name="xijie1" id="xijie1" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie1'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie1']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie1' value='".$productinfo['xijie1']."'>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="90px">产品细节图片2</td>
			<td>
				<input type="file" name="xijie2" id="xijie2" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie2'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie2']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie2' value='".$productinfo['xijie2']."'>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="90px">产品细节图片3</td>
			<td>
				<input type="file" name="xijie3" id="xijie3" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie3'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie3']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie3' value='".$productinfo['xijie3']."'>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="90px">产品细节图片4</td>
			<td>
				<input type="file" name="xijie4" id="xijie4" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie4'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie4']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie4' value='".$productinfo['xijie4']."'>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="90px">产品细节图片5</td>
			<td>
				<input type="file" name="xijie5" id="xijie5" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie5'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie5']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie5' value='".$productinfo['xijie5']."'>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="90px">产品细节图片6</td>
			<td>
				<input type="file" name="xijie6" id="xijie6" />
				<?php
					if($act=="edit"){
						if(!empty($productinfo['xijie6'])){
							echo "&nbsp;&nbsp;&nbsp;<a href='../../".$productinfo['xijie6']."' target='_blank' title='点击查看原图'>原图片</a>";
						}
						echo "<input type='hidden' name='y_xijie6' value='".$productinfo['xijie6']."'>";
					}
				?>
			</td>
		</tr>
	</table>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="提交" name="submit"  onclick="return checkSubmit();"/>
				<?php if($act=="add"){?>
					<input type="reset" value="重置"  name="reset"/>
				<?php }else if($act=="edit"){?>
					<input type="button" value="返回" onclick="history.go(-1);"  name="reset"/>
				<?php }?>

				<?php if($act=='edit'){ ?>
					<input type="hidden" value="<?=$productinfo['id']?>" name="product_id" />
				<?php } ?>
			</td>
		</tr>
	</table>
	</form>
</div>
</div>