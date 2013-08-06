<script type="text/javascript" src="<?php echo $this->url('js/area.js')?>"></script>
<div class="m">
	<img src="<?php echo $this->url('images/ban-order.jpg')?>"/>
    <div class="c-nav">
    	<i class="r">
            <a href="<?php echo $this->url("Robot", "RobotLive");?>">ROBOT生活</a>
            <a href="<?php echo $this->url("Robot", "Order");?>" class="hover">预约试驾</a>
            <a href="<?php echo $this->url("Robot", "Custom");?>">个性选择</a>
            <a href="<?php echo $this->url("Main", "Download");?>">图片视频&下载</a>
         </i>
         <span>感受ROBOT</span>
    </div><!--c-nav-end-->
    <div class="order bg2 fix">
    	<div class="l">
            <h2>预约试驾</h2>
            <form action="" method="get">
                <table border="0" cellpadding="2" cellspacing="10">
                    <tbody>
                    <tr>
                      <td width="105">选择试驾车型	</td>
                      <td width="280">
                          <select class="w280" id="type">
                            <option value="1">i-ROBOT-BO</option>
                            <option value="2">i-ROBOT-SC</option>
                            <option value="3">i-ROBOT-LA</option>
			                      <option value="4">T-ROBOT-S</option>
                            <option value="5">T-ROBOT-W</option>
                            <option value="6">T-ROBOT-O</option>
                          </select>
                      </td>
                    </tr>
                    <tr>
                      <td>姓名</td>
                      <td><input type="text" class="w280" id="name"></td>
                    </tr>
                    <tr>
                      <td>性别</td>
                      <td class="v-3">
                          <input type="radio" name="sex" value="0" checked="checked">男
                          <input type="radio" name="sex" class="ml20" value="1">女
                      </td>
                    </tr>
                    <tr>
                      <td>手机</td>
                      <td><input type="text" class="w280" id="tel"></td>
                    </tr>
                    <tr class="s1">
                      <td>预约试驾城市</td>
                      <td><select class="w135 mr6" name="s_province" id="s_province"><option>请选择省份或地址市</option></select>
                          <select class="w135" name="s_city" id="s_city"><option>请选择城市或者区</option></select>
                      </td>
                    </tr>
                    <tr>
                      <td>邮箱</td>
                      <td><input type="text" class="w280" id="email"></td>
                    </tr>
                    <!--tr>
                      <td>计划购车时间	</td>
                      <td>
                          <select class="w280" id="time">
                              <option>请选择购车时间</option>
                              <option>0-6月之内</option>
                              <option>7-12月之内</option>
                              <option>1-2年之内</option>
                              <option>2年以上</option>
                          </select>
                      </td>
                    </tr-->
                    <!--tr>
                      <td>希望得到反馈时间</td>
                      <td><select class="w280" id="replay_time">
                              <option>请选择反馈时间</option>
                              <option>0-12小时之内</option>
                              <option>1天之内</option>
                              <option>3天之内</option>
                              <option>一周之内</option>
                          </select>
                      </td>
                    </tr-->
                    <tr>
                      <td>隐私条款</td>
                      <td class="v-3">
                          <a href="##" class="r">*使用条款</a>
                          <input type="radio" id="accept"/>我已接受数据使用说明
                      </td>
                    </tr>
                    <tr height="90">
                      <td colspan="2"><a href="javascript:void(0);" class="btn2" onclick="check()">提交</a></td>
                    </tr>
                  </tbody></table>
            </form>
        </div>
        <div class="order-r l">
        	<img src="<?php echo $this->url('img/i-robot-bo-01.png')?>" style="margin-left:60px;" id="robot"/>
            <div class="order-m">
            	<h3 id="select-type">i-ROBOT-BO</h3>
                <a id="del" href="<?php echo $this->url("Product","IRobotBOSpec"); ?>" target="_blank"><i class="play"></i>配置详情</a>
                <a id="normal" href="<?php echo $this->url("Product","IRobotBOSpec"); ?>" target="_blank"><i class="play"></i>标准配置</a>
                <a id="tec" href="<?php echo $this->url("Product","IRobotBO"); ?>" target="_blank"><i class="play"></i>技术规格</a>
            </div>
        </div>
    </div>
</div><!--m-end-->
<script type="text/javascript">_init_area();</script>
<script>
var robot_data={1:["img/i-robot-bo-01.png","IRobotBO"],2:["img/i-robot-sc-01.png","IRobotSC"],3:["img/i-robot-la-01.png","IRobotLA"],4:["img/t-robot-s-01.png","TRobotS"],5:["img/t-robot-w-01.png","TRobotW"],6:["img/t-robot-o-01.png","TRobotO"]};
$(document).ready(function(){
    $('#type').change(function(){
  		var img=robot_data[$(this).val()][0];
  		var name=$(this).children('option:selected').text();
  		var action_1=robot_data[$(this).val()][1]+'Spec';
  		var action=robot_data[$(this).val()][1];
  		$("#robot").attr('src',get_url(img));
  		$("#select-type").text(name);
      $('#del').attr("href", get_url('Product',action_1));
      $('#normal').attr("href", get_url('Product',action_1));
      $('#tec').attr("href", get_url('Product',action));
  	})
});
    function check(){
         //对电子邮件的验证
         var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var name = $("#name").val();
        if(name==''){
            alert("请输入您的姓名");
            $("#name").focus();
            return false;
        }
        if($("#s_province").get(0).selectedIndex==0){
             alert("请选择省份");
             return false;
        }
        if($("#s_city").get(0).selectedIndex==0){
             alert("请选择城市");
             return false;
        }
        if(!myreg.test($("#email").val())){
                alert('请输入有效的E_mail！');
                $("#email").focus();
                return false;
          }
          if($("#accept").checked==0){
              alert("请接受条款");
              return false;
          }
          kajax('AjaxRobot','AjaxCommitForm',{
              'type':$("#type").get(0).selectedIndex,
              'name':$("#name").val(),
             'sex':$('input:radio[name="sex"]:checked').val(),
              'mobile':$("#tel").val(),
              'province':$("#s_province").find("option:selected").text(),
              'city':$("#s_city").find("option:selected").text(),
              'email':$('#email').val(),
              'plan_buy_time':"-",//$('#time').get(0).selectedIndex,
              'expect_feedback_time':"-"//$('#replay_time').get(0).selectedIndex
            },function(obj){
              if(obj.code==1){
                  alert('您的预约已保存');
              }
          });
    }
</script>