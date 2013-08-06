<script type="text/javascript">
$(document).ready(function(){
    $('[id^="btn_del_"]').click(function(){
        var ret=window.confirm("确定删除吗?");
        if(!ret){
            return;
        }
        var id=$(this).attr("id").replace("btn_del_","");
        kajax("AjaxAdmin","DeleteDealerLogin",{id:id},function(obj){
            if(obj.code==1){
                location.href=get_url("Admin","DealerLoginList");
            }else{
                alert("错误。删除失败");
                location.href=get_url("Admin","DealerLoginList");
            }
        },this);
    });
});
</script>
<div id="colTwo">
    <div class="bg2">
    	<div class="title">经销商登录列表</div>
        <div><a href="<?=$this->url('Admin','AddDealer')?>" style="font-size:15px;color:blue;">添加经销商</a></div>
    	<table cellpadding="0" cellspacing="0" width="100%">
    		<tr>
    			<th width="9%">用户名</th>
    			<th width="15%">公司</th>
    			<th width="10%">经销商级别</th>
    			<th width="8%">联系人</th>
                <th>地址</th>
                <th width="6%">邮编</th>
                <th width="8%">电话</th>
                <th width="10%">手机</th>
    			<th width="12%">邮箱</th>
                <th width="9%">操作</th>
    		</tr>
    <?php
    $level_map=array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五');
    if(count($dealer_login_list)!=0){
        foreach($dealer_login_list as $v){?>
                <tr id="dealer_login_<?php echo $v['id'];?>">
                    <td><?=$v['username']?></td>
                    <td><?=$v['company']?></td>
                    <td><?=$level_map[$v['level']]?>级经销商</td>
                    <td><?=$v['contact_name']?></td>
                    <td><?=$v['address']?></td>
                    <td><?=$v['postcode']?></td>
                    <td><?=$v['tel']==''?'无':$v['tel']?></td>
                    <td><?=$v['mobile']==''?'无':$v['mobile'];?></td>
                    <td><?=$v['email']?></td>
                    <td><a href="<?php echo $this->url('Admin','EditDealerLogin', array('id'=>$v['id']));?>">修改</a>&nbsp;<a href="javascript:void(0);" id="btn_del_<?php echo $v['id'];?>">删除</a></td>
                </tr>
        <?php }

        }else{ ?>
                    暂无经销商列表
    <?php }?>
    	</table>
    </div>
</div>