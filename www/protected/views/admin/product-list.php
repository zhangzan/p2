<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DeleteProductList",{id:id},function(obj){
            if(obj.code==1){
                location.href=get_url("Admin","ProductList");
            }else{
                alert("错误。删除失败");
                location.href=get_url("Admin","ProductList");
            }
        },this);
    });
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">文件列表</div>
        <div><a href="<?=$this->url('Admin','AddProductList')?>" style="font-size:15px;color:blue;">添加</a></div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
                <?php $robot_map = array(1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-o',5=>'t-robot-w',6=>'t-robot-s'); ?>
    			<th width="10%">类别</th>
    			<th width="">图</th>
                <th width="">标题</th>
                <th>内容</th>
                <th width="10%">操作</th>
    		</tr>
    <?php
    if(count($pro_list)!=0){
        foreach($pro_list as $v){?>
                <tr id="media_file_<?php echo $v['id'];?>">
                    <td><?=$robot_map[$v['type']]?></td>
                    <td><img src="<?php echo $this->url($v['img']);?>" width="100"></td>
                    <td><?=$v['title']?></td>
                    <td><?=$v['text']?></td>
                    <td><a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无
    <?php }?>
    	</table>
    </div>
</div>