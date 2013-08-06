<script type="text/javascript">
var pro_list=<?php echo json_encode($pro_list);?>;
var kp=1;
$(document).ready(function(){
    $(".img_dot").attr("toggle", "1");
    $(".img_dot").bind("mouseenter",function(){
        var me=$(this);
        if($(this).attr("toggle")=="0"){
            return;
        }
        $(this).attr("toggle", "0");
        $(this).find(".h_content").slideDown(400,function(){
            //$(me).attr("toggle", "1");
            return;
        });
    });
    $(".img_dot").bind("mouseleave",function(){
        var me=$(this);
        if($(me).attr("toggle")=="1"){
            return;
        }
        $(this).find(".h_content").slideUp(400,function(){
            $(me).attr("toggle", "1");
            return;
        });
    });
    $("[id^='tpro_']").click(function(){
        var id=$(this).attr("id").replace("tpro_","");
        $(".pro-li").removeClass("hovered-pro");
        $(this).addClass("hovered-pro");
        $("[id^='tpropic_']").hide();
        $("#tpropic_"+id).show();
        if(id==0){
            $("#hot_points").show();
            $("#pro_text").hide();
        }else{
            $("#hot_points").hide();
            $("#pro_text").find(".t_title").text(pro_list[id-1].title);
            $("#pro_text").find(".t_text").text(pro_list[id-1].text);
            $("#pro_text").show();
        }
    });
    $("#prev_pro").click(function(){
        if(kp<=1){
            return;
        }
        kp--;
        $("#tpro_"+(kp+3)).hide();
        $("#tpro_"+kp).show();
    });
    $("#next_pro").click(function(){
        if(kp>=pro_list.length-2){
            return;
        }
        kp++;
        $("#tpro_"+(kp+2)).show();
        $("#tpro_"+(kp-1)).hide();
    });
    // var flag=0;
    //     setInterval(function(){
    //         if(flag==0){
    //             flag=1;
    //             $(".c_blue_dot").css({"opacity":"0.5","filter":"alpha(opacity=50)"});
    //         }else{
    //             flag=0;
    //             $(".c_blue_dot").css({"opacity":"1","filter":"alpha(opacity=100)"});
    //         }
    //     },400);
});
</script>
<div class="product">
<div class="pro-m">
	<img src="<?php echo $this->url("images/logo3.png");?>" style="position:absolute;top:120px; left:25px;"/>
	<div class="pro-m-t1">
        <a href="<?php echo $this->url("Product","TRobotO");?>" class="c1 hover"></a>
        <a href="<?php echo $this->url("Product","TRobotW");?>" class="c2"></a>
        <a href="<?php echo $this->url("Product","TRobotS");?>" class="c3"></a>
    </div>
    <div style="top:321px; left:195px;">
        <a href="<?php echo $this->url('Robot', 'Trob'); ?>">
            <img src="<?php echo $this->url("img/robot-o.png");?>" width="240" id="tpropic_0"/>
            <?php foreach ($pro_list as $key => $row) {?>
            <img src="<?php echo $this->url($row['img']);?>" class="dn" width="240" id="tpropic_<?php echo $key+1;?>" />
            <?php } ?>
        </a>
    </div>
<?php if($info['status']==1){ ?>
<div id="hot_points">
    <div style="top:360px; left:292px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/o-1.png");?>" class="img"/>
            <h2>物联响应、智慧安保</h2>
            <p>T-ROBOT-O可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。</p>
        </div>
    </div>
    <div style="top: 421px; left: 10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:31px;">
            <img src="<?php echo $this->url("img/o-2.png");?>" class="img" style="left:-30px;"/>
            <h2>时尚美观、科技创新</h2>
            <p style="width:177px;">T-ROBOT-O创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，必将风靡为新世纪新代步工具。</p>
       </div>
    </div>
    <div style="top: 463px; left: 318px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px; width:250px;">
            <img src="<?php echo $this->url("img/o-3.png");?>" class="img"/>
            <h2>车载无线音视频传播</h2>
            <p style="width:177px;">T-ROBOT-O车载无线传输系统具有无线图像传输功能、GPS定位功能、视频点播功能、漫游与切换管理功能、动态系统拓扑显示功能以及灵活的扩展功能。</p>
        </div>
    </div>
    <div style="top: 385px; left: 25px;width: 197px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin:100px 0 0 20px;">
            <img src="<?php echo $this->url("img/o-4.png");?>" class="img" style="left:-35px;"/>
            <h2>智能防盗、安全可靠</h2>
            <p style="width:177px;">T-ROBOT-O全车设有电子指纹密码锁，在车辆驻车后的数秒内（待确认）能够自动落锁，所有非法移动和拆卸的动作都将引起警鸣声。</p>
        </div>
    </div>
    <div style="top:506px; left:364px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/o-5.png");?>" class="img"/>
            <h2>移动警务百宝箱</h2>
            <p style="width:177px;">T-ROBOT-O在车身两侧设有辅助附件箱，在附件箱内可配备小型干粉灭火器、警务工具以及其他便民用品，能够随时处理各类警务工作和突发事件。</p>
        </div>
    </div>
    <div style="top:600px; left:327px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px;">
            <img src="<?php echo $this->url("img/o-6.png");?>" class="img"/>
            <h2>操控精确、机动灵活</h2>
            <p style="width:177px;">T-ROBOT-O时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。</p>
        </div>
    </div>
</div>
    <div class="d3">
        <h3>T-ROBOT-O</h3>
        <p>T-ROBOT-O具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。</p>
        <p>T-ROBOT-O在车身两侧还设有辅助附件箱，在附件箱内配备了多种实用性警务工具以及其他便民用品，这相当于警务人员随身携带了一个警务支持平台，能够随时处理各类警务工作和突发事件。</p>
    </div>
<?php }else{?>
<div id="hot_points">
    <div style="top:360px; left:292px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/o-1.png");?>" class="img"/>
            <h2><?php echo $info['title1'];?></h2>
            <p><?php echo $info['info1'];?></p>
        </div>
    </div>
    <div style="top: 421px; left: 10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:31px;">
            <img src="<?php echo $this->url("img/o-2.png");?>" class="img" style="left:-30px;"/>
            <h2><?php echo $info['title2'];?></h2>
            <p style="width:177px;"><?php echo $info['info2'];?></p>
        </div>
    </div>
    <div style="top: 463px; left: 318px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px; width:250px;">
            <img src="<?php echo $this->url("img/o-3.png");?>" class="img"/>
            <h2><?php echo $info['title3'];?></h2>
            <p style="width:177px;"><?php echo $info['info3'];?></p>
        </div>
    </div>
    <div style="top: 385px; left: 25px;width: 197px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin:100px 0 0 20px;">
            <img src="<?php echo $this->url("img/o-4.png");?>" class="img" style="left:-35px;"/>
            <h2><?php echo $info['title4'];?></h2>
            <p style="width:177px;"><?php echo $info['info4'];?></p>
        </div>
    </div>
    <div style="top:506px; left:364px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/o-5.png");?>" class="img"/>
            <h2><?php echo $info['title5'];?></h2>
            <p style="width:177px;"><?php echo $info['info5'];?></p>
        </div>
    </div>
    <div style="top:600px; left:327px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px;">
            <img src="<?php echo $this->url("img/o-6.png");?>" class="img"/>
            <h2><?php echo $info['title6'];?></h2>
            <p style="width:177px;"><?php echo $info['info6'];?></p>
        </div>
    </div>
</div>
    <div class="d3">
        <h3><?php echo $info['name'];?></h3>
        <p><?php echo $info['main_info'];?></p>
    </div>
<?php } ?>
    <div class="pro-m-f fix" style="bottom:140px;">
    	<a class="hover">介绍</a>
        <a href="<?php echo $this->url("Product", "TRobotOPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "TRobotODv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "TRobotOSpec");?>">参数</a>
    </div>
	<div class="pro-list">
        <a class="a1" id="prev_pro"></a>
        <a class="a2" id="next_pro"></a>
        <ul class="fix">
            <li class="hovered-pro pro-li" id="tpro_0"><img src="<?php echo $this->url("img/robot-o.png");?>" ></li>
            <?php foreach ($pro_list as $key => $row) {?>
            <li class="pro-li <?php echo $key>2?"dn":"";?>" id="tpro_<?php echo $key+1;?>"><img src="<?php echo $this->url($row['img']);?>" ></li>
            <?php } ?>
        </ul>
    </div>
    <div id="pro_text" style="position:absolute;left:450px;top:290px;width:210px;">
        <h3 class="t_title" style="color:#231916;padding-bottom:5px;"></h3>
        <p class="t_text"></p>
    </div>
</div>
</div>