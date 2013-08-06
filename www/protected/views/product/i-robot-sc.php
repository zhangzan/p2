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
            $("#big_pic_c").css({"bottom":"213px","left":"180px","top":"auto"});
            $("#pro_text").hide();
        }else{
            $("#hot_points").hide();
            $("#big_pic_c").css({"top":"321px","left":"195px","bottom":"auto"});
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
	<img src="<?php echo $this->url("images/logo2.png");?>" style="position:absolute;top:120px; left:25px;"/>
	<div class="pro-m-t1">
    	<a href="<?php echo $this->url("Product","IRobotLA");?>" class="c4"></a>
        <a href="<?php echo $this->url("Product","IRobotSC");?>" class="c5 hover"></a>
        <a href="<?php echo $this->url("Product","IRobotBO");?>" class="c6"></a>
    </div>
    <div style="bottom:213px; left:180px;" id="big_pic_c">
        <a href="<?php echo $this->url('Robot', 'Irob'); ?>">
            <img src="<?php echo $this->url("img/robot-sc.png");?>" width="250" id="tpropic_0"/>
            <?php foreach ($pro_list as $key => $row) {?>
            <img src="<?php echo $this->url($row['img']);?>" class="dn" width="240" id="tpropic_<?php echo $key+1;?>" />
            <?php } ?>
        </a>
    </div>
<?php if($info['status']==1){ ?>
<div id="hot_points">
    <div style="top:360px; left:300px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/sc-1.png");?>" class="img"/>
            <h2>物联响应、智慧安保</h2>
            <p>i-ROBOT-SC可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。</p>
        </div>
    </div>
    <div style="top:453px; left:10px; width:180px;" class="d1  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/sc-2.png");?>" class="img" style="margin-right:-55px;"/>
            <h2>时尚美观、科技创新</h2>
            <p style="width:177px;">i-ROBOT-SC创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，同时也是交通领域的一次革命，必将风靡为新世纪新代步工具。</p>
        </div>
    </div>
    <div style="top:464px; left:360px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/sc-5.png");?>" class="img"/>
            <h2>低碳环保、节能零排放</h2>
            <p>i-ROBOT-SC采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。</p>
        </div>
    </div>
    <div style="top:513px; left:402px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/sc-6.png");?>" class="img"/>
            <h2>智能操控、车随身动</h2>
            <p style="width:177px;">i-ROBOT-SC以内置的精密陀螺系统来感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。完美诠释了简单易用、车随身动。</p>
        </div>
    </div>
    <div style="top:580px; left:10px; width:180px; " class="d1  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>" /></a>
        <div class="h_content dn" style="padding-right:50px;">
            <img src="<?php echo $this->url("img/sc-3.png");?>" class="img" style="padding-right:0px;margin-right:-5px;"/>
            <h2>操控精确、机动灵活</h2>
            <p style="width:177px;">T-ROBOT-SC时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。/p>
        </div>
    </div>
    <div style="top:600px; left:337px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn"  style="margin-left:45px;">
            <img src="<?php echo $this->url("img/sc-4.png");?>" class="img"/>
            <h2>原地转弯、节省空间</h2>
            <p>i-ROBOT-SC具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-SC可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。</p>
        </div>
    </div>
</div>
    <div class="d3">
        <h3>i-ROBOT-SC</h3>
        <p>人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-SC系列以炫酷动感的外型，敏锐的动作捕捉；完美演绎了“车随心动，我行我SHOW”的理念。</p>
        <p>i-ROBOT-SC作为智能交通工具，除了外观时尚的左右两轮造型，i-robot还可以非常轻松的保持您的身体平衡状态。无论是在行驶中还是停立中，它就像您身体的延伸，几乎完美的融为一体。</p>
    </div>
<?php }else{?>
<div id="hot_points">
    <div style="top:360px; left:300px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/sc-1.png");?>" class="img"/>
            <h2><?php echo $info['title1'];?></h2>
            <p><?php echo $info['info1'];?></p>
        </div>
    </div>
    <div style="top:453px; left:10px; width:180px;" class="d1  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/sc-2.png");?>" class="img" style="margin-right:-55px;"/>
            <h2><?php echo $info['title2'];?></h2>
            <p style="width:177px;"><?php echo $info['info2'];?></p>
        </div>
    </div>
    <div style="top:464px; left:360px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/sc-5.png");?>" class="img"/>
            <h2><?php echo $info['title3'];?></h2>
            <p><?php echo $info['info3'];?></p>
        </div>
    </div>
    <div style="top:513px; left:402px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/sc-6.png");?>" class="img"/>
            <h2><?php echo $info['title4'];?></h2>
            <p style="width:177px;"><?php echo $info['info4'];?></p>
        </div>
    </div>
    <div style="top:580px; left:10px; width:180px; " class="d1  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="padding-right:50px;">
            <img src="<?php echo $this->url("img/sc-3.png");?>" class="img" style="padding-right:0px;margin-right:-5px;"/>
            <h2><?php echo $info['title5'];?></h2>
            <p style="width:177px;"><?php echo $info['info5'];?></p>
        </div>
    </div>
    <div style="top:600px; left:337px;" class="d2  img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn"  style="margin-left:45px;">
            <img src="<?php echo $this->url("img/sc-4.png");?>" class="img"/>
            <h2><?php echo $info['title6'];?></h2>
            <p><?php echo $info['info6'];?></p>
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
        <a href="<?php echo $this->url("Product", "IRobotSCPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "IRobotSCDv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "IRobotSCSpec");?>">参数</a>
    </div>
	<div class="pro-list">
        <a class="a1" id="prev_pro"></a>
        <a class="a2" id="next_pro"></a>
        <ul class="fix">
            <li class="hovered-pro pro-li" id="tpro_0"><img src="<?php echo $this->url("img/robot-sc.png");?>" ></li>
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