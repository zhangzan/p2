<img src="<?php echo $this->url("images/ban-top.jpg");?>"/>
    <div class="c-nav">
    	<i>
            <a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
            <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
            <a href="<?php echo $this->url("About", "Technology");?>" class="hover">尖端科技</a>
            <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
            <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
            <a href="<?php echo $this->url("About", "Contact");?>">联系我们</a>
         </i>
         <span>关于新世纪</span>
    </div><!--c-nav-end-->
<?php if($content['status']==1){ ?>
	<ul class="top pr">
    	<li>
        	<i class="tel"></i>
        	<img src="<?php echo $this->url("images/i-6.png");?>" class="l i1"/>
            <dl class="l">
            	<dt>造就全球交通革命</dt>
                <dd style="width:300px;">
                	<p>新世纪机器人公司的创建理念不是简单创造一款可以与环境和谐相处的短途出行的交通工具，而是要由此来造就一场全球“交通革命”，这就是我们的X-ROBOT代步机器人系列产品。</p>
                </dd>
            </dl>
        </li>
        <li>
        	<img src="<?php echo $this->url("images/i-1.png");?>" class="r" width="600" height="340"/>
            <dl class="l " style="padding: 24px 0 0 120px;margin-right:-97px;">
            	<dt>和谐共荣的人文思想</dt>
                <dd style="width:350px;">X-ROBOT代步机器人采用系统化的设计方法(Systematic Design Approach)与以人为本的设计理念(Human Centre Design)，透过人因工程脉络与使用者的探访与调查，探究出人们真正的需求和期望，使得此一轻量化移动机器人代步工具能直觉简易的操作，符合大众对移动代步工具的基本安全与信赖需求。
                       <br/> 同时，X-ROBOT代步机器人完整阐释了共生、乐趣、便利性和环境这四大人文价值核心：
                        <br/>「共生」-人、载具和城市相互赖以为生，
                        <br/>「乐趣」-投注个人情感，
                        <br/>「便利性」-配合活动进行各种模式变换，
                        <br/>「环境」-对环境与人友善，并且吸引人们使用。
                  </dd>
            </dl>
        </li>
        <li>
        	<div class="l p68">
            	<div class="l"><a id="dv_1" style="cursor:pointer;"><img  src="<?php echo $this->url("images/i-2.jpg");?>"/><p><i class="play"></i>观看视频</p></a></div>
                <div class="l" style="margin-left: 10px;"><a id="dv_2" style="cursor:pointer;"><img  src="<?php echo $this->url("images/i-3.jpg");?>"/><p><i class="play"></i>观看视频</p></a></div>
                <div class="sale-net" id="player_container" style="display:none;position:fixed;width:420px;height:360px;padding:0px;top:30%;left:40%;">
                    <p id="h_player"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</p>
                    <p id="dv_title" style="font-size:14px;margin-left:15px;margin-top:3px;color:black;"></p>
                    <a href="javascript:void(0)" class="close" id="b_close"></a>
                </div>
<script type="text/javascript">
var dv_list=<?php echo json_encode($dv_list);?>;
$(document).ready(function(){
    function showPlayer(dv){
        var s1 = new SWFObject("/swf/flvplayer.swf","single","420","334","7");
        s1.addParam("allowfullscreen","true");
        s1.addVariable("file","/upload/flv/"+dv.file);
        s1.addVariable("width","420");
        s1.addVariable("height","334");
        s1.write("h_player");
        $("#dv_title").text(dv.title);
        $("#player_container").show();
    }
    $("[id^='dv_']").click(function(){
        var id=$(this).attr('id').replace("dv_","");
        if(dv_list.length==0){
            return;
        }else if(dv_list.length==1){
            showPlayer(dv_list[0]);
        }else if(dv_list.length>=2){
            showPlayer(dv_list[parseInt(id)-1]);
        }
    });
    $("#b_close").click(function(){
        $("#player_container").hide();
    });
});
</script>
            </div>
            <dl class="l" style="padding-top:50px;">
            	<dt>驾驭方式的绿色革命</dt>
                <dd>“驾驭方式的绿色革命”<br/>这是一项全新的发明，是一件激动人心的产品，它证明了人类创造力的伟大——精巧、安全、实用、富有想象力和驾驶乐趣，完全无碳排放，这就是X-ROBOT，我们有理由相信它将成为人类地面交通方式的未来，我期望将这一份福祉率先分享给每一个中国人，此刻，未来已来。</dd>
            </dl>
        </li>
    </ul>
<?php }else{?>
    <?php echo $content['content'];?>
<?php } ?>