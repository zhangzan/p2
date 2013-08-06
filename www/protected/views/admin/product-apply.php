<script type="text/javascript">
$(document).ready(function(){
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">文件列表</div>
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
    if(count($apply_list)!=0){
        foreach($apply_list as $v){?>
                <tr id="media_file_<?php echo $v['id'];?>">
                    <td><?=$robot_map[$v['type']]?></td>
                    <td><img src="<?php echo $this->url($v['img']);?>" width="100"></td>
                    <td><?=$v['title']?></td>
                    <td><?=$v['text']?></td>
                    <td><a href="<?php echo $this->url('Admin','EditProductApply', array('type'=>$v['type']));?>" id="btn_edit_<?php echo $v['id'];?>">修改</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无
    <?php }?>
    	</table>
    </div>
</div>