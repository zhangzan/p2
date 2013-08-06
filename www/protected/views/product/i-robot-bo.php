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
            $("#big_pic_c").css({"bottom":"150px","left":"88px","top":"auto"});
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
        <a href="<?php echo $this->url("Product","IRobotSC");?>" class="c5"></a>
        <a href="<?php echo $this->url("Product","IRobotBO");?>" class="c6 hover"></a>
    </div>
    <div style="bottom:150px; left:88px;" id="big_pic_c">
        <a href="<?php echo $this->url('Robot', 'Trob'); ?>">
            <img src="<?php echo $this->url("img/robot-bo-s.png");?>" width="400" id="tpropic_0"/>
            <?php foreach ($pro_list as $key => $row) {?>
            <img src="<?php echo $this->url($row['img']);?>" class="dn" width="240" id="tpropic_<?php echo $key+1;?>" />
            <?php } ?>
        </a>
    </div>
<?php if($info['status']==1){ ?>
<div id="hot_points">
    <div style="top:366px; left:313px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-1.png");?>" class="img"/>
            <h2>物联响应、智慧安保</h2>
            <p>i-ROBOT-BO可实现远端及群组间的信息交换和网络通信，通过各类感应器、全球定位系统等信息传感设备，达成各类智能化识别、定位、跟踪、监控和管理上的应用。</p>
        </div>
    </div>
    <div style="top:460px; left:324px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-2.png");?>" class="img"/>
            <h2>坐立两用、随心所欲</h2>
            <p style="margin-left:10px;">i-ROBOT-BO具有坐立两种驾驶方式，采用坐式驾驶可以避免长时间操纵带来的疲劳问题，而采用站式驾驶则具备更好的操控性，两种模式可适应不同的驾驶需求。</p>
        </div>
    </div>
    <div style="top: 434px; left: 10px; width:227px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/bo-3.png");?>" class="img" style="left:-30px;"/>
            <h2>时尚美观、科技创新</h2>
            <p style="width:177px;">i-ROBOT-BO创新性的应用了动态稳定平衡技术，将传统的的两轮车前后布置改为左右布置，是时尚界的一大创举，同时也是交通领域的一次革命，必将风靡为新世纪新代步工具。</p>
        </div>
    </div>
    <div style="top: 406px; left: 40px;width: 174px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-4.png");?>" class="img" style="left:-30px;"/>
            <h2>操控精确、机动灵活</h2>
            <p style="width:160px;">i-ROBOT-BO时速可达20 km/h，其独有的原地转弯能力可以让您即使在拥挤的环境里也可畅行无阻。</p>
        </div>
    </div>
    <div style="top: 553px; left: 404px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-5.png");?>" class="img"/>
            <h2>原地转弯、节省空间</h2>
            <p style="width:180px;">i-ROBOT-BO具有零转弯半径，完美实现原地转弯，驾驶i-ROBOT-BO可以随意地走街串巷出外勤，随时来去而不用担心空间狭窄无法转弯的问题。</p>
        </div>
    </div>
    <div style="top: 632px; left: 10px; width: 222px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/bo-6.png");?>" class="img" style="left:-30px;"/>
            <h2>智能操控、车随身动</h2>
            <p style="width:177px;">i-ROBOT-BO以内置的精密陀螺系统来感知车身所处的姿势状态，驾驶者只要改变身体的角度往前或往后倾，i-ROBOT-BO就会智能的根据倾斜的方向前进或后退。</p>
        </div>
    </div>
</div>
    <div class="d3">
        <h3>i-ROBOT-BO</h3>
        <p>人工智能与灵动载体的结合，诠释了人类安全与个性的出行方式。i-ROBOT-BO系列量身定制的酷炫时尚外形和智能头盔系统，将带给您前所未有的超级完美体验。</p>
        <p>i-ROBOT-BO完全靠电力来驱动，不产生任何尾气，内置了全球领先的精密陀螺系统来感知车身所处的姿势状态，透过高速的中央微处理器计算出适当的指令后，驱动伺服马达来完成平衡控制。</p>
    </div>
<?php }else{?>
<div id="hot_points">
    <div style="top:366px; left:313px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-1.png");?>" class="img"/>
            <h2><?php echo $info['title1'];?></h2>
            <p><?php echo $info['info1'];?></p>
        </div>
    </div>
    <div style="top:460px; left:324px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-2.png");?>" class="img"/>
            <h2><?php echo $info['title2'];?></h2>
            <p style="margin-left:10px;"><?php echo $info['info2'];?></p>
        </div>
    </div>
    <div style="top: 434px; left: 10px; width:227px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/bo-3.png");?>" class="img" style="left:-30px;"/>
            <h2><?php echo $info['title3'];?></h2>
            <p style="width:177px;"><?php echo $info['info3'];?></p>
        </div>
    </div>
    <div style="top: 406px; left: 40px;width: 174px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:25px;">
            <img src="<?php echo $this->url("img/bo-4.png");?>" class="img" style="left:-30px;"/>
            <h2><?php echo $info['title4'];?></h2>
            <p style="width:160px;"><?php echo $info['info4'];?></p>
        </div>
    </div>
    <div style="top: 553px; left: 404px;" class="d2 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn">
            <img src="<?php echo $this->url("img/bo-5.png");?>" class="img"/>
            <h2><?php echo $info['title5'];?></h2>
            <p style="width:180px;"><?php echo $info['info5'];?></p>
        </div>
    </div>
    <div style="top: 632px; left: 10px; width: 222px;" class="d1 img_dot">
        <a class="icon c_blue_dot"><img src="<?php echo $this->url("images/icon-3.gif");?>"/></a>
        <div class="h_content dn" style="margin-left:30px;">
            <img src="<?php echo $this->url("img/bo-6.png");?>" class="img" style="left:-30px;"/>
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
        <a href="<?php echo $this->url("Product", "IRobotBOPic");?>">应用</a>
        <a href="<?php echo $this->url("Product", "IRobotBODv");?>">DV</a>
        <a href="<?php echo $this->url("Product", "IRobotBOSpec");?>">参数</a>
    </div>
	<div class="pro-list">
        <a class="a1" id="prev_pro"></a>
        <a class="a2" id="next_pro"></a>
        <ul class="fix">
            <li class="hovered-pro pro-li" id="tpro_0"><img src="<?php echo $this->url("img/robot-bo-s-c.png");?>" ></li>
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