<div id="colTwo">
<div class="bg2">
	<div class="title">新增新闻</div>
	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px"  valign="top">内容</th>
			<td>
	            <textarea type="hidden" id="content" name="content"  style="display:none" ></textarea>
	            <INPUT id=n_note___Config style="DISPLAY: none" type=hidden>
	            <IFRAME id=n_note___Frame src="../../fckeditor/editor/fckeditor.html?InstanceName=content&Toolbar=Default" frameBorder=0 width=709px scrolling=no height=400></IFRAME>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="修改" name="add"  onclick="return checkSubmit();"/>
				<input type="reset" value="还原"  name="add2"/>
				
			</td>
		</tr>
	</table>
	</form>
</div>
</div>