<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DeleteDv",{id:id},function(obj){
            if(obj.code==1){
                location.href=get_url("Admin","DvList");
            }else{
                alert("错误。删除失败");
                location.href=get_url("Admin","DvList");
            }
        },this);
    });
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">视频列表</div>
        <div>
            <a href="<?=$this->url('Admin','AddDv')?>" style="font-size:15px;color:blue;">上传</a>&nbsp;&nbsp;
            <a href="<?=$this->url('Admin','AddDv2')?>" style="font-size:15px;color:blue;">上传(仅插入数据)</a>
        </div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="">文件名</th>
    			<th width="">标题</th>
                <th width="">页面</th>
                <th width="9%">操作</th>
    		</tr>
    <?php
    if(count($list)!=0){
        foreach($list as $v){?>
                <tr id="media_file_<?php echo $v['id'];?>">
                    <td><?=$v['file']?></td>
                    <td><?=$v['title']?></td>
                    <td><?=$v['page']?></td>
                    <td><a href="<?php echo $this->url('Admin','EditDv', array('id'=>$v['id']));?>">修改</a>&nbsp;<a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无文件
    <?php }?>
        
    	</table>
    </div>
</div>