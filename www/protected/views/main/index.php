<script type="text/javascript">
var SellerScroll = function(options){
this.SetOptions(options);
this.lButton = this.options.lButton;
this.rButton = this.options.rButton;
this.oList = this.options.oList;
this.showSum = this.options.showSum;

this.iList = $("#" + this.options.oList + " > li");

this.iListSum = this.iList.length;
this.iListWidth = this.iList.outerWidth(true);

this.moveWidth = this.iListWidth * this.showSum;

this.dividers = Math.ceil(this.iListSum / this.showSum);//

this.moveMaxOffset = (this.dividers - 1) * this.moveWidth;
this.LeftScroll();
this.RightScroll();
};
SellerScroll.prototype = {
SetOptions: function(options){
this.options = {
lButton: "left_scroll",
rButton: "right_scroll",
oList: "carousel_ul",
showSum: 5//一喂俑items
};
$.extend(this.options, options || {});
},
ReturnLeft: function(){
return isNaN(parseInt($("#" + this.oList).css("left"))) ? 0 : parseInt($("#" + this.oList).css("left"));
},
LeftScroll: function(){
if(this.dividers == 1) return;
var _this = this, currentOffset;
$("#" + this.lButton).click(function(){
currentOffset = _this.ReturnLeft();

if(currentOffset == 0){
for(var i = 1; i <= _this.showSum; i++){
$(_this.iList[_this.iListSum - i]).prependTo($("#" + _this.oList));
}
$("#" + _this.oList).css({ left: -_this.moveWidth });
$("#" + _this.oList + ":not(:animated)").animate( { left: "+=" + _this.moveWidth }, { duration: "slow", complete: function(){

for(var j = _this.showSum + 1; j <= _this.iListSum; j++){
$(_this.iList[_this.iListSum - j]).prependTo($("#" + _this.oList));
}
$("#" + _this.oList).css({ left: -_this.moveWidth * (_this.dividers - 1) });
} } );
}else{
$("#" + _this.oList + ":not(:animated)").animate( { left: "+=" + _this.moveWidth }, "slow" );
}
});
},
RightScroll: function(){
if(this.dividers == 1) return;
var _this = this, currentOffset;
$("#" + this.rButton).click(function(){
currentOffset = _this.ReturnLeft();
if(Math.abs(currentOffset) >= _this.moveMaxOffset){
for(var i = 0; i < _this.showSum; i++){
$(_this.iList[i]).appendTo($("#" + _this.oList));
}
$("#" + _this.oList).css({ left: -_this.moveWidth * (_this.dividers - 2) });

$("#" + _this.oList + ":not(:animated)").animate( { left: "-=" + _this.moveWidth }, { duration: "slow", complete: function(){
for(var j = _this.showSum; j < _this.iListSum; j++){
$(_this.iList[j]).appendTo($("#" + _this.oList));
}
$("#" + _this.oList).css({ left: 0 });
} } );
}else{
$("#" + _this.oList + ":not(:animated)").animate( { left: "-=" + _this.moveWidth }, "slow" );
}
});
}
};

var currentindex=1;
function changeflash(i) {
    currentindex=i;
    $("#flash"+i).fadeIn("normal");
    $("#flash"+i).css("display","block");
    $("#f"+i).removeClass();
    $("#f"+i).addClass("a-hover");
    for (j=1;j<=4;j++){
        if (j==i) {
        }else{
            $("#flash"+j).css("display","none");
            $("#f"+j).removeClass();
        }
    }
}
function startAm(){
timerID = setInterval("timer_tick()",4000);
}
function stopAm(){
clearInterval(timerID);
}
function timer_tick() {
    currentindex=currentindex>=4?1:currentindex+1;
    changeflash(currentindex);
}

var Marquee=function(A,B,C,D,E,F){
    var $=function (id){return document.getElementById(id)},Y=+!!F;
    (A=$(A)).appendChild((B=$(B)).cloneNode(true));
    (function (){
        var m=A.scrollTop%C?(E||0):D;
        A.scrollTop=[0,B.offsetHeight][Y]==A.scrollTop?[B.offsetHeight-1,1][Y]:(A.scrollTop+[-1,1][Y]);
        setTimeout(arguments.callee,m);
    })()
    return arguments.callee;
}

$(document).ready(function(){
var ff = new SellerScroll();

$(".flash_bar a").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
startAm();

Marquee('google1','dhooo1',40,8000,30,1);
});
</script>
<div class="ban">
        <ul>
    <?php
        foreach($bigbannerlist as $kk=>$vv){
            echo "<li id='flash".$vv['id']."'";
            if($kk!=0){echo 'style="display:none"';}
            echo    " ><a href='".$vv['url']."' ><img style='width:1000px;height:473px;' src='".$this->url($vv['image_url'])."'></a></li>";
        }
    ?>
    </ul>

    <div class="f flash_bar">
        <a id="f1" href="javascript:void(0);" class="a-hover" onclick="changeflash(1)"></a>
        <a id="f2" href="javascript:void(0);" onclick="changeflash(2)"></a>
        <a id="f3" href="javascript:void(0);" onclick="changeflash(3)"></a>
        <a id="f4" href="javascript:void(0);" onclick="changeflash(4)"></a>
    </div>
</div><!--ban-end-->
<div class="pro">
        <div class="pro-in">
        <ul id="carousel_ul">
            <?php
                foreach($smallbannerlist as $k=>$v){
                    echo "<li><a href='".$v['url']."'><img width='160px' height='81px' src='".$this->url($v['image_url'])."'></a><p>".$v['name']."</p></li>";
                    if ($k==3||$k==7) echo "<li><a href='".$this->url('About','Contact')."'><img width='160px' height='101px' src='".$this->url('images/hot-line-pic.jpg')."'></a></li>";
                }
            ?>
        </ul>
    </div>
        <a class="arrl next" id="left_scroll"></a>
    <a class="arrr prev" id="right_scroll"></a>
</div>
<div class="note" id="google1">
    <ul id="dhooo1">
        <?php foreach ($news_list as $row) { ?>
            <li><a href="<?php echo $this->url("About", "News", array('id' => $row['id']));?>#news-id-<?php echo $row['id']; ?>"><?php echo $row['title'];?></a></li>
        <?php } ?>
    </ul>
</div>
