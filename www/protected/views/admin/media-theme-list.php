<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("删除主题，会导致已上传的该主题的媒体文件出错！需要重新上传！确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DelMediaTheme",{id:id},function(obj){
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
    	<div class="title">主题列表</div>
        <div>
            <a href="<?=$this->url('Admin','MediaList')?>" style="font-size:15px;color:blue;">返回媒体列表</a>&nbsp;&nbsp;
            <a href="<?=$this->url('Admin','AddMediaTheme')?>" style="font-size:15px;color:blue;">添加主题</a>
        </div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="">主题</th>
                <th width="">操作</th>
    		</tr>
    <?php
    if(count($list)!=0){
        foreach($list as $v){?>
                <tr >
                    <td><?=$v['title']?></td>
                    <td><a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无文件
    <?php }?>
    	</table>
    </div>
</div>