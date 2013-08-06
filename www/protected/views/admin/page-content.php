<div id="colTwo">
<div class="bg2">

	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px"  valign="top">页面内容</th>
			<td>
	            <textarea type="hidden" id="content" name="content"  style="display:none" ><?php if($act=="edit"){echo $pagearr['content'];}?></textarea>
	            <INPUT id=n_note___Config style="DISPLAY: none" type=hidden>
	            <IFRAME id=n_note___Frame src="../../fckeditor/editor/fckeditor.html?InstanceName=content&Toolbar=Default" frameBorder=0 width=709px scrolling=no height=450></IFRAME>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">是否替换</th>
			<td>
				<input type="checkbox" name="status" id="status" <?php echo $pagearr['status']==1?'':'checked="checked"';?> />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="修改" name="add"  onclick=""/>
				<input type="button" value="返回"  name="back" onclick="history.go(-1);"/>

			</td>
		</tr>
	</table>
	</form>
</div>
</div>