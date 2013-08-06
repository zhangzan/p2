<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
.dea-l p{padding:0px;}
.dea-map img{margin: 0px;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript" src="<?php echo $this->url('js/area.js')?>"></script>
<script type="text/javascript">
<?php $init_id=false;?>
var province_map=<?php echo json_encode($province_map)?>;
province_map["请选择省份"]=0;
var city_map=<?php echo json_encode($city_map)?>;
city_map["请选择城市"]=0;
var pointList={<?php foreach($dealer_list as $dealer){if($dealer['point']){$init_id=$init_id?$init_id:$dealer['id'];echo $dealer['id'];?>:new BMap.Point(<?php echo $dealer['point_arr'][0];?>,<?php echo $dealer['point_arr'][1];?>),<?php }} ?>};
var markList={<?php foreach($dealer_list as $dealer){if($dealer['point']){echo $dealer['id'];?>:[{title:"<?php echo $dealer['company'];?>",
    content:"<?php echo $dealer['address']; ?><br><?php echo $dealer['contact_name']; ?>：<?php if($dealer['mobile']!=''){echo $dealer['mobile'];} ?><?php echo ($dealer['mobile']!=''&&$dealer['tel']!='')?'、':''; ?><?php if($dealer['tel']!=''){echo $dealer['tel'];} ?><?php echo $dealer['fax']!=''?'<br>传真：'.$dealer['fax']:'';?><?php echo $dealer['can_order']==1?'<br><br><a href='.$this->url('Robot','Order').'>诚邀试驾</a>':'';?>",
    point:"<?php echo $dealer['point'];?>",
    idOpen:1,
    icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}],
    <?php }}?>
};
var init_dealer_id=<?php echo $init_id?$init_id:'false'; ?>;
var point_1=init_dealer_id?pointList[init_dealer_id]:false;
var s_province=0;
var s_city=0;
var map_level=15;
</script>
<div class="m">
	<img src="<?php echo $this->url('images/ban-finance.jpg')?>"/>
    <div class="c-nav">
    	<i>
          <a href="<?php echo $this->url('Serve','Great');?>">大客户服务</a>
          <a class="hover">售后服务</a>
          <a href="<?php echo $this->url('Serve','Seller');?>">商家联盟</a>
          <a href="<?php echo $this->url('Serve','Finance');?>">金融服务</a>
         </i>
         <span>我们的服务</span>
    </div><!--c-nav-end-->
<?php
/* 获取售后服务的页面内容信息 */
	$pagearr = MServe::getPageInfoById(2);
?>
<div class="sale">
<?php  if($pagearr['status']==1){?>
    
        <div class="sale-t bg2">
            <div class="sale-t-t">
                <a ><img src="<?php echo $this->url('images/icon-1.png')?>"/>使用锦囊</a>
                <a href="javascript:void(0)" id="b_sale_net"><img src="<?php echo $this->url('images/icon-2.png')?>"/>维修网点</a>
                <div class="sale-net" id="h_sale_net" style="display:none;padding-left:20px;padding-top:30px;height:540px;">

                    <div class="dea-l l" style="text-align:left;">
                        <h2>ROBOT特约维修商查询</h2>
                        <p class="p1">选择您所在的区域</p>
                        <p class="p2">
                            所在省:&nbsp;
                            <select id="s_province" name="s_province" style="width:105px;"></select></p>
                        <p>
                            所在市:&nbsp;
                            <select id="s_city" name="s_city" style="width:105px;"></select>
                        </p>
                        <h3 style="margin-top:10px;">维修商列表</h3>
                        <div style="overflow-y:scroll;height:325px;">
                        <?php foreach ($dealer_list as $key => $row) { ?>
                          <dl id="dealer_<?php echo $row['id'];?>" class="h_dealer <?php echo $init_id==$row['id']?'hover':'';?>  <?php echo $province_map[$row['province']].'_'.$city_map[$row['city']].' '.$province_map[$row['province']].'_0 0_'.$city_map[$row['city']]; ?>" style="padding-right:20px;">
                              <dt><?php echo $row['company']; ?></dt>
                              <dd><?php echo $row['address']; ?><br><?php echo $row['contact_name']; ?>：<?php if($row['mobile']!=''){echo $row['mobile'];} ?><?php echo ($row['mobile']!=''&&$row['tel']!='')?'、':''; ?><?php if($row['tel']!=''){echo $row['tel'];} ?>
                                  <?php echo $row['fax']!=''?"<br>传真：".$row['fax']:'';?>
                              </dd>
                          </dl>
                        <?php }?>
                        </div>
                    </div>
                    <div class="dea-map l">
                        <div style="width:528px;height:390px;border:#ccc solid 1px;margin-top:100px;" id="dituContent"></div>
                    </div>

                		<a href="javascript:void(0)" class="close" id="b_close"></a>
                </div>
            </div>
            <h2>售后服务</h2>
            <p>用户自购车8到15天内，发现车辆有性能问题，经过我公司专业人员检测确认，车辆外观及相关附件完好，可申请执行换货，换货不能更改购车型号，换货车辆按照自换货日起计算保修期。</p>
            <p>用户自购车7天内，发现车辆有严重质量问题，经过我公司专业人员检测鉴定，车辆外观及相关附件完好，可申请退货。</p>
            <p>对底盘车架;减速箱;伸缩管组件；感应踏板；主控制板;平衡传感器组件；充电器；电机和内部线路的材料和工艺问题，提供一年时间的保修。对于驻车支架、把手、脚踏垫、电池、车轮、车胎、整机外壳及其它附件，提供180天的保修。</p>
            <p><i class="play-1"></i><a href="<?php echo $this->url("download/abc.doc");?>">更多售后服务条例下载</a></p>
        </div>
        <!--
        <div class="sale-m bg2">
            <h3>X-ROBOT原厂配件</h3>
            <div class="fix">
                <div class="l">
                    <ul>
                        <li><a><img/></a></li>
                        <li><a><img/></a></li>
                        <li><a><img/></a></li>
                    </ul>
                </div>
                <div class="r">
                    <h3>刹车片</h3>
                    <p class="w325">原装BMW刹车片，采用超强耐热性优质材料，在特有的精湛工艺和严格标准下研发而成，在高温和持续刹车时能依然保持较强制动力。</p>
                    <p><a class="btn1 mt10">打造您的ROBOT</a></p>
                </div>
            </div>
        </div>-->
        <div class="sale-m1 bg2 fix">
            <div class="l">
                <h3>服务预约</h3>
                <p>自产品验收完毕当天起7天内，产品本身存在缺陷并经过我公司技术人员确认，可以申请执行退货程序。自产品验收完毕当天起8到15天内，产品缺陷经过确认的，可以申请执行换货程序。超出15天作保修处理。退换货申请单必须附我公司技术人员确认单，经我公司核准通过后执行。用户应当在7天内将不良品返回我公司，逾期不予办理，后果由用户承担。</p>
                <div><i class="play-1"></i><a href="##">服务表单下载</a></div>
            </div>
            <img src="<?php echo $this->url('images/i-16.jpg')?>" class="r"/>
        </div>
        <div class="sale-m2 bg2 fix">
        	<img src="<?php echo $this->url('images/i-17.jpg')?>" class="l"/>
            <div class="r">
           	    <h3>保修及保养服务</h3>
                <p>在保修期内出现问题的产品，经核对购买发票、保修卡和机身条码后，代理商向用户提供免费保修服务。维修发生的人工费管理费等由代理商承担。在保修期外出现的问题，由当地代理商负责维修，代理商向用户收取材料费和服务费。如需返回公司分中心维修，我公司将向代理商收取产品往返运费。</p>
                <div><i class="play-1"></i><a href="##">报修表单下载</a></div>
                <h3 class="pt20">售后市场活动</h3>
                <p>我公司将安排技术员到代理商处帮忙维护、实地培训。帮助代理商提高售后服务水平。</p>
                <div><i class="play"></i><a href="##">观看现场讲解、体验视频</a></div>
            </div>

        </div>
<?php }else{?>
<?=$pagearr['content']?>
<?php }?>

	<div class="sale-m bg2">
        	<h3>常见问题</h3>
            <div class="fix">
                <div id="question_scroll" class="l qu" style="height:153px;overflow-y:scroll;">
                	<ul>
                        <?php foreach ($question_list as $key => $value) { ?>
                        <li>
                            <p>Q:&nbsp;<?php echo $value['question']; ?></p>
                            <p>A:&nbsp;<?php echo $value['answer']; ?></p>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="r">
                	<textarea id="question">输入您的问题</textarea>
                    <p><a id="question_btn" class="btn1 r">提交报告</a></p>
                </div>
            </div>
        </div>
    </div>
</div><!--m-end-->
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    _init_area();
    $(".h_dealer").hide();
    
	$('#r-robot-select').change(function(){
		var r_img=$(this).children('option:selected').val();//这就是selected的值
		var r_name=$(this).children('option:selected').text();//这就是selected的值
		$("#r-robot").attr('src',get_url('img/'+r_img));
		$("#select-type").text(r_name);
	});
	$('#t-robot-select').change(function(){
		var t_img=$(this).children('option:selected').val();//这就是selected的值
		var t_name=$(this).children('option:selected').text();//这就是selected的值
		$("#t-robot").attr('src',get_url('img/'+t_img));
		$("#select-type").text(t_name);
	});

  var agent=window.navigator.userAgent;
  if(agent.indexOf('MSIE')==-1){
      $("#question_scroll").jscroll({W:"3px",
          Bg:"#a3a6a5",
          Bar:{Pos:"up",Bd:{Out:"#005d9f",Hover:"#005d9f"},Bg:{Out:"#005d9f",Hover:"#005d9f",Focus:"005d9f"}},
          Btn:{btn:false}});
  }

  //创建和初始化地图函数：
  function initMap(a){
      if(a){
          point_1 = new BMap.Point(107.712121,33.045414);
          map_level=5;
      }else{
          map_level=15;
      }
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      if(a){
      }else{
          addMarker();//向地图中添加marker
      }
  }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = point_1;//定义一个中心点坐标
        map.centerAndZoom(point,map_level);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.disableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
                //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = init_dealer_id?markList[init_dealer_id]:[];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
            
            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://map.baidu.com/image/us_cursor.gif", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }

    $("[id^='dealer_']").click(function(){
        var dealer_id=$(this).attr("id").replace("dealer_","");
        $("[id^='dealer_']").removeClass("hover");
        $(this).addClass("hover");
        point_1=pointList[dealer_id];
        markerArr=markList[dealer_id];
        initMap();
    });

    $("#s_province").change(function(){
        s_province=province_map[$(this).val()];
        $(".h_dealer").hide();
        $(".h_dealer").removeClass("hover");
        if(s_province==0||s_province==undefined){
            initMap(1);
        }else{
            $("."+s_province+"_0").show();
        }
        $(".h_dealer:visible:first").trigger("click");
    });
    $("#s_city").change(function(){
        s_city=city_map[$(this).val()];
        $(".h_dealer").hide();
        $(".h_dealer").removeClass("hover");
        if(s_province==0||s_province==undefined||s_city==undefined){
            initMap(1);
        }else{
            $("."+s_province+"_"+s_city).show();
        }
        $(".h_dealer:visible:first").trigger("click");
    });

  $("#b_sale_net").click(function(){
    $("#h_sale_net").show();
    initMap(1);//创建和初始化地图
  });
  $("#b_close").click(function(){
    $("#h_sale_net").hide();
  });

   $("#question").focus(function(){
        $(this).val('');
    });
    $('#question_btn').click(function(){
        var txt = $("#question").val();
        kajax('AjaxServe','AjaxCommitQuestion',{'txt':txt},function(obj){
            if(obj.code==1){
                alert('您的问题已提交成功，等待相关人员给您解决！');
            }else{

            }
        });
    });
});
</script>

