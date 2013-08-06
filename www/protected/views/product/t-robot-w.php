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
        <a href="<?php echo $this->url("Product","TRobotO");?>" class="c1"></a>
        <a href="<?php echo $this->url("Product","TRobotW");?>" class="c2  hover"></a>
        <a href="<?php echo $this->url("Product","TRobotS");?>" class="c3"></a>
    </div>
    <div style="top:321px; left:195px;">
        <a href="<?php echo $this->url('Robot', 'Trob'); ?>">
            <img src="<?php echo $this->url("img/robot-w.png");?>" width="240" id="tpropic_0"/>
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
            <img src="<?php echo $this->url("img/w-1.png");?>" class="img"/>
            <h2>物联响应、智慧安保</h2>
            <p>T-ROBOT-W可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。</p>
        </div>
    </div>
    <div style="top: 421px; left: 10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:31px;">
            <img src="<?php echo $this->url("img/w-2.png");?>" class="img" style="left:-15px;"/>
            <h2>操控精确、机动灵活</h2>
            <p style="width:177px;">T-ROBOT-W时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。</p>
        </div>
    </div>
    <div style="top: 463px; left: 318px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:75px; width:250px;">
            <img src="<?php echo $this->url("img/w-3.png");?>" class="img"/>
            <h2>坐立两用、随心所欲</h2>
            <p style="width:177px;">T-ROBOT-W具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。</p>
        </div>
    </div>
    <div style="top: 385px; left: 25px;width: 197px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin:100px 0 0 15px;">
            <img src="<?php echo $this->url("img/w-4.png");?>" class="img" style="margin-right:-30px;"/>
            <h2>车载无线音视频传播</h2>
            <p style="width:177px;">T-ROBOT-W车载无线传输系统具有无线图像传输功能、GPS定位功能、视频点播功能、漫游与切换管理功能、动态系统拓扑显示功能以及灵活的扩展功能。</p>
        </div>
    </div>
    <div style="top:506px; left:364px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/w-5.png");?>" class="img"/>
            <h2>低碳环保、节能零排放</h2>
            <p style="width:177px;">T-ROBOT-W采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。</p>
        </div>
    </div>
    <div style="top:600px; left:327px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px;">
            <img src="<?php echo $this->url("img/w-6.png");?>" class="img"/>
            <h2>智能驻车、随行随止</h2>
            <p style="width:177px;">T-ROBOT-W能够实现驾驶人员只需一键就能完成上下车、停车以及锁车等动作，同时，自动驻车支脚能够瞬间伸出。在人员回到车辆后，也只需一键就能启动车辆。</p>
        </div>
    </div>
</div>
    <div class="d3">
        <h3>T-ROBOT-W</h3>
        <p>T-ROBOT-W驾驶者只需一键就能对行进中的车辆暂停并自动加锁，所有非法移动和拆卸工作都将引起语音警告，大大提高了警用人员交通工具的安全性便捷性。更强调突发事件的临场应用，注定了其将在公安、武警、军队、海关、机场、车站、码头、街头、大型场馆、景区、高尔夫球场等领域展现巨大前景。</p>
        <p>内置的精密陀螺系统灵敏感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。完美诠释了简单易用、车随身动。</p>
    </div>
<?php }else{?>
<div id="hot_points">
    <div style="top:360px; left:292px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/w-1.png");?>" class="img"/>
            <h2><?php echo $info['title1'];?></h2>
            <p><?php echo $info['info1'];?></p>
        </div>
    </div>
    <div style="top: 421px; left: 10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:31px;">
            <img src="<?php echo $this->url("img/w-2.png");?>" class="img" style="left:-15px;"/>
            <h2><?php echo $info['title2'];?></h2>
            <p style="width:177px;"><?php echo $info['info2'];?></p>
        </div>
    </div>
    <div style="top: 463px; left: 318px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:75px; width:250px;">
            <img src="<?php echo $this->url("img/w-3.png");?>" class="img"/>
            <h2><?php echo $info['title3'];?></h2>
            <p style="width:177px;"><?php echo $info['info3'];?></p>
        </div>
    </div>
    <div style="top: 385px; left: 25px;width: 197px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin:100px 0 0 15px;">
            <img src="<?php echo $this->url("img/w-4.png");?>" class="img" style="margin-right:-30px;"/>
            <h2><?php echo $info['title4'];?></h2>
            <p style="width:177px;"><?php echo $info['info4'];?></p>
        </div>
    </div>
    <div style="top:506px; left:364px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/w-5.png");?>" class="img"/>
            <h2><?php echo $info['title5'];?></h2>
            <p style="width:177px;"><?php echo $info['info5'];?></p>
        </div>
    </div>
    <div style="top:600px; left:327px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:60px;">
            <img src="<?php echo $this->url("img/w-6.png");?>" class="img"/>
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
        <a href="<?php echo $this->url("Product", "TRobotWPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "TRobotWDv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "TRobotWSpec");?>">参数</a>
    </div>
    <div class="pro-list">
        <a class="a1" id="prev_pro"></a>
        <a class="a2" id="next_pro"></a>
        <ul class="fix">
            <li class="hovered-pro pro-li" id="tpro_0"><img src="<?php echo $this->url("img/robot-w.png");?>" ></li>
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
