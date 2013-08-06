<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DeleteEvent",{id:id},function(obj){
            if(obj.code==1){
                location.href=get_url("Admin","EventList");
            }else{
                alert("错误。删除失败");
                location.href=get_url("Admin","EventList");
            }
        },this);
    });
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">活动行程列表</div>
        <div><a href="<?php echo $this->url("Admin", "AddEvent"); ?>" style="font-size:15px;color:blue;">添加</a></div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="18%">标题</th>
    			<th >内容</th>
    			<th width="15%">经销商级别</th>
    			<th width="10%">发布时间</th>
                <th width="5%">状态</th>
                <th width="12%">操作</th>
    		</tr>
    <?php
    $level_map=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五');
    if(count($event_list)!=0){
        foreach($event_list as $v){?>
                <tr id="event_<?php echo $v['id'];?>">
                    <td><?=$v['title']?></td>
                    <td><?=$v['content']?></td>
                    <td><?php 
                    $level_list = array();
                    foreach ($v['level_list'] as $row) {
                        $level_list[] = $level_map[$row] . '级';
                    }
                    echo implode(",", $level_list);
                    ?></td>
                    <td><?=date('Y-m-d H:i:s', $v['publish_time'])?></td>
                    <td><?php echo $v['status']==1?'正常':'隐藏'; ?></td>
                    <td><a href="<?php echo $this->url('Admin','EditEvent', array('id'=>$v['id']));?>">修改</a>&nbsp;<a href="<?php echo $this->url('Admin','HideShowEvent', array('id'=>$v['id'], 'status'=>$v['status']==1?2:1));?>"><?php echo $v['status']==1?"隐藏":"开启"; ?></a>&nbsp;<a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }

        }else{ ?>
                    暂无活动行程
    <?php }?>
    	</table>
    </div>
</div>