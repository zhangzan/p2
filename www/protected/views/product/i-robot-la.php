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
            $("#big_pic_c").css({"bottom":"135px","left":"140px","top":"auto"});
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
    	<a href="<?php echo $this->url("Product","IRobotLA");?>" class="c4 hover"></a>
        <a href="<?php echo $this->url("Product","IRobotSC");?>" class="c5"></a>
        <a href="<?php echo $this->url("Product","IRobotBO");?>" class="c6"></a>
    </div>
    <div style="bottom:135px; left:140px;" id="big_pic_c">
        <a href="<?php echo $this->url('Robot', 'Irob'); ?>">
            <img src="<?php echo $this->url("img/robot-la-s.png");?>" width="280" id="tpropic_0"/>
            <?php foreach ($pro_list as $key => $row) {?>
            <img src="<?php echo $this->url($row['img']);?>" class="dn" width="240" id="tpropic_<?php echo $key+1;?>" />
            <?php } ?>
        </a>
    </div>
<?php if($info['status']==1){ ?>
<div id="hot_points">
    <div style="top:310px; left:328px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img  src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-1.png");?>" class="img"/>
            <h2>物联响应、智慧安保</h2>
            <p class="" >i-ROBOT-LA可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。</p>
        </div>
    </div>
    <div style="top:422px; left:308px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-2.png");?>" class="img"/>
            <h2>时尚美观、科技创新</h2>
            <p>i-ROBOT-LA创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，必将风靡为新世纪新代步工具。</p>
        </div>
    </div>
    <div style="top:661px; left:366px;"class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-4.png");?>" class="img"/>
            <h2>原地转弯、节省空间</h2>
            <p style="width:150px;">i-ROBOT-LA具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-LA可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。</p>
        </div>
    </div>
    <div style="top:574px; left:366px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-5.png");?>" class="img"/>
            <h2>智能操控、车随身动</h2>
            <p style="width:176px;">i-ROBOT-LA以内置的精密陀螺系统来感知车身所处的姿势状态，驾驶者只要改变身体的角度往前或往后倾，i-ROBOT-LA就会智能的根据倾斜的方向前进或后退，而速度则与驾驶者身体倾斜的程度呈正比。</p>
        </div>
    </div>
    <div style="top:588px; left:10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:43px;">
            <img src="<?php echo $this->url("img/la-3.png");?>" class="img"/>
            <h2>低碳环保、节能零排放</h2>
       	    <p style=" width:177px; margin-right:20px;">i-ROBOT-LA采用持久耐用的锂离子电池，可以保证一次充电行驶高达30公里，同时其工作过程中不产生任何二氧化碳，保护了您和环境的健康。</p>
        </div>
    </div>
    <div style="top:460px; left:8px;"  class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:80px;">
            <img src="<?php echo $this->url("img/la-6.png");?>" class="img"/>
            <h2>操控精确、机动灵活</h2>
            <p style="width:177px;">i-ROBOT-LA时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。</p>
        </div>
    </div>
</div>
    <div class="d3">
    	<h3>i-ROBOT-LA</h3>
        <p>人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-LA系列以简约流线的外型，敏锐捕捉身心的意念；引领人类进入智能时尚的至酷时代。</p>
 		<p>i-ROBOT-LA集成了世界上最先进的数字媒体平台之一，可便捷的实现远端及群组间的信息交换和网络通信。当您的i-robot想要有wifi、gps定位、音乐电影功能，抑或您想让它可以即时通讯，所有的一切都可以大胆告诉我们。</p>
    </div>
<?php }else{ ?>
<div id="hot_points">
    <div style="top:310px; left:328px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img  src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-1.png");?>" class="img"/>
            <h2><?php echo $info['title1'];?></h2>
            <p class="" ><?php echo $info['info1'];?></p>
        </div>
    </div>
    <div style="top:422px; left:308px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-2.png");?>" class="img"/>
            <h2><?php echo $info['title2'];?></h2>
            <p><?php echo $info['info2'];?></p>
        </div>
    </div>
    <div style="top:680px; left:397px;"class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-4.png");?>" class="img"/>
            <h2><?php echo $info['title3'];?></h2>
            <p style="width:150px;"><?php echo $info['info3'];?></p>
        </div>
    </div>
    <div style="top:574px; left:366px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/la-5.png");?>" class="img"/>
            <h2><?php echo $info['title4'];?></h2>
            <p style="width:177px;"><?php echo $info['info4'];?></p>
        </div>
    </div>
    <div style="top:588px; left:10px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:43px;">
            <img src="<?php echo $this->url("img/la-3.png");?>" class="img"/>
            <h2><?php echo $info['title5'];?></h2>
             <p style=" width:177px; margin-right:20px;"><?php echo $info['info5'];?></p>
        </div>
    </div>
    <div style="top:460px; left:8px;"  class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:80px;">
            <img src="<?php echo $this->url("img/la-6.png");?>" class="img"/>
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
        <a href="<?php echo $this->url("Product", "IRobotLAPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "IRobotLADv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "IRobotLASpec");?>">参数</a>
    </div>
    <div class="pro-list">
        <a class="a1" id="prev_pro"></a>
        <a class="a2" id="next_pro"></a>
        <ul class="fix">
            <li class="hovered-pro pro-li" id="tpro_0"><img src="<?php echo $this->url("img/robot-la-s-c.png");?>" ></li>
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