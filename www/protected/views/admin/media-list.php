<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DeleteMediaFile",{id:id},function(obj){
            if(obj.code==1){
                location.href=get_url("Admin","MediaList");
            }else{
                alert("错误。删除失败");
                location.href=get_url("Admin","MediaList");
            }
        },this);
    });
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">媒体列表</div>
        <div>
            <a href="<?=$this->url('Admin','UploadFile')?>" style="font-size:15px;color:blue;">上传</a>&nbsp;&nbsp;
            <a href="<?=$this->url('Admin','MediaThemeList')?>" style="font-size:15px;color:blue;">管理主题</a>
        </div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="22%">文件名</th>
    			<th width="10%">标题</th>
                <th width="5%">类型</th>
    			<th width="">描述</th>
    			<th width="15%">缩略图</th>
                <th width="5%">主题</th>
                <th width="9%">操作</th>
    		</tr>
    <?php
    $level_map=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五');
    if(count($file_list)!=0){
        foreach($file_list as $v){?>
                <tr id="media_file_<?php echo $v['id'];?>">
                    <td><?=$v['filename']?></td>
                    <td><?=$v['title']?></td>
                    <td><?php echo $v['type']==1?'视频':($v['type']==2?'图片':'其他');?></td>
                    <td><?=$v['desc']?></td>
                    <td><?php if($v['thumbnail']==''){echo "默认";}else{?><img src="<?php echo $this->url("thumbnails/" . $v['thumbnail']);?>" style="max-height:80px;max-width:110px;"/><?php }?></td>
                    <td><?php echo isset($theme_map[$v['theme']])?$theme_map[$v['theme']]['title']:$v['theme'];?></td>
                    <td><!--<a href="<?php echo $this->url('Admin','EditMeida', array('id'=>$v['id']));?>">修改</a>&nbsp;--><a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无文件
    <?php }?>
        <tr>
            <td align='right' colspan="5" style="border:none;"><br>
            <?php $this->widget('CLinkPager',array(
                'pages'=>$pages,
                'nextPageLabel'=>'下一页', 
                'prevPageLabel'=>'上一页', 
                'header'=>'', 
            ));?> 
            </td>
        </tr>
    	</table>
    </div>
</div>