<script type="text/javascript">
$(document).ready(function(){
    
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">订单列表</div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="25%">经销商</th>
    			<th width="48%">订单内容</th>
    			<th width="15%">订单时间</th>
                <th width="12%">操作</th>
    		</tr>
    <?php
    $level_map=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五');
    if(count($order_list)!=0){
        foreach($order_list as $v){?>
                <tr id="event_<?php echo $v['id'];?>">
                    <td><?=$v['company']?></td>
                    <td><?=$v['content']?></td>
                    <td><?=date('Y-m-d H:i:s', $v['record_time'])?></td>
                    <td><a href="<?php echo $this->url('Admin','DealerOrderDetail', array('id'=>$v['id']));?>">详情</a></td>
                </tr>
        <?php }

        }else{ ?>
                    暂无订单
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