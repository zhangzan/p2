<script type="text/javascript">
$(document).ready(function(){
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">图片列表</div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
                <?php $robot_map = array(1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-o',5=>'t-robot-w',6=>'t-robot-s'); ?>
    			<th width="">预览</th>
    			<th width="">产品</th>
                <th width="">位置</th>
                <th width="">操作</th>
    		</tr>
    <?php
    if(count($list)!=0){
        foreach($list as $v){?>
                <tr id="media_file_<?php echo $v['id'];?>">
                    <td><img src="<?php echo $this->url("upload/product_pic/".$v['filename']);?>" height=80></td>
                    <td><?=$robot_map[$v['type']]?></td>
                    <td><?=$v['pos']?></td>
                    <td><a href="<?php echo $this->url('Admin', 'AddProductPic', array('type'=>$v['type'],'pos'=>$v['pos']));?>">编辑</a></td>
                </tr>
        <?php }
        }else{ ?>
                    暂无文件
    <?php }?>
    	</table>
    </div>
</div>