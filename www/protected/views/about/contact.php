<img src="<?php echo $this->url("images/ban-contact.jpg");?>"/>
<div class="c-nav">
    <i> 
        <a href="<?php echo $this->url("About", "Brand");?>">品牌简介</a>
        <a href="<?php echo $this->url("About", "Culture");?>">企业文化</a>
        <a href="<?php echo $this->url("About", "Technology");?>">尖端科技</a>
        <a href="<?php echo $this->url("About", "Jobs");?>">人力资源</a>
        <a href="<?php echo $this->url("About", "News");?>">新闻资讯</a>
        <a href="<?php echo $this->url("About", "Contact");?>" class="hover">联系我们</a>
    </i>
    <span>关于新世纪</span>
</div>
<img src="<?php echo $this->url("images/con-bg1.jpg");?>" />
<div class="c-m fix">
<?php if($content['status']==1){?>
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript">
var pointList={0:new BMap.Point(112.458624,34.641913),1:new BMap.Point(121.599836,31.253353),2:new BMap.Point(116.330158,39.971938),3:new BMap.Point(121.335462,30.32667)};
var markList={1:[{title:"上海新世纪机器人有限公司",content:"地址：上海浦东新区新金桥路58号银东大厦27楼A<br/>邮编：201206<br/>电话：+86-021-61086568<br/>传真：+86-021-61086567<br/><br/>邮箱：market@x-robot.com.cn<br/>网址：www.x-robot.com.cn",point:"121.599692|31.252828",isOpen:0,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}
         ],2:[{title:"上海新世纪机器人有限公司(北京分部)",content:"地址：北京市海淀区中关村南大街2号数码大厦16楼F座<br/>邮编：100086<br/>电话：+86-010-51726541-101、116<br/>传真：+86-010-51726541-111<br/><br/>邮箱：market@x-robot.com.cn<br/>网址：www.x-robot.com.cn",point:"116.330158|39.971938",isOpen:0,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}
         ],3:[{title:"宁波杭州湾生产基地",content:"地址：宁波杭州湾新区滨海四路131号<br />公司电话：+86-021-61086568*805<br />传真：+86-021-61002037<br /><br />邮箱：market@x-robot.com.cn",point:"121.335462|30.32667",isOpen:0,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}]
     };
var point_1=pointList[0];
var zoom_v=5;
$(document).ready(function(){
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = point_1;//定义一个中心点坐标
        map.centerAndZoom(point,zoom_v);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.disableScrollWheelZoom();
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
    var markerArr = [markList[1][0],markList[2][0],markList[3][0]];
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
    
    initMap();//创建和初始化地图

    $("#select_city").change(function(){
        var city=$("#select_city").val();
        zoom_v=16;
        if(city==0){
            $("#shanghai").show();
            $("#beijing").show();
            $("#ningbo").show();
            zoom_v=5;
            point_1=pointList[0];
            markerArr=[markList[1][0],markList[2][0],markList[3][0]];
        }else if(city==1){
            $("#shanghai").show();
            $("#beijing").hide();
            $("#ningbo").hide();
            point_1=pointList[1];
            markerArr=markList[1];
        }else if(city==2){
            $("#shanghai").hide();
            $("#ningbo").hide();
            $("#beijing").show();
            point_1=pointList[2];
            markerArr=markList[2];
        }else if(city==3){
            $("#shanghai").hide();
            $("#beijing").hide();
            $("#ningbo").show();
            point_1=pointList[3];
            markerArr=markList[3];
        }
        initMap();
    });
});
</script>
    <div class="l" style="width:291px;">
        <div id="shanghai">
            <h3>上海总部</h3>
            <h4>上海新世纪机器人有限公司</h4>
          <p>公司固定电话：+86-021-61086568<br/>传真：+86-021-61086567<br/>邮箱：market@x-robot.com.cn<br/>地址：上海浦东新区新金桥路58号银东大厦27楼A<br/>邮编：201206<br/></p>
        </div>
        <div id="beijing">
            <h3>北京分部</h3>
            <h4>上海新世纪机器人有限公司(北京分部)</h4>
          <p>公司固定电话：+86-010-51726541-101、116<br/>传真：+86-010-51726541-111<br/>邮箱：market@x-robot.com.cn<br/>地址：北京市海淀区中关村南大街2号数码大厦A座 608-610<br/>邮编：100086<br/></p>
        </div>
        <div id="ningbo">
            <h3>宁波杭州湾生产基地</h3>
            <h4>宁波杭州湾生产基地</h4>
          <p>公司电话：+86-021-61086568*805<br/>传真：+86-021-61002037<br/>邮箱：market@x-robot.com.cn<br/>地址：宁波杭州湾新区滨海四路131号<br/></p>
        </div>
        <div>
            <h3 class="mb18">全国招商</h3>
            <p>
                华东区：徐先生  电话：13917780725</span> <br/>
                北方区：程先生  电话：13901393007</span> <br/>
                南方区：许小姐  电话：13816400684</span> </p>
            <h3 class="mb18">国际招商</h3>
            <p>
                刘先生<span class="ml20">电话：86-021-61086568*804</span><br>
                孙小姐<span class="ml20">电话：86-021-61086568*806</span><br/>
            </p>
        </div>
    </div>
    <div class="map">
        <div class="mb18">分部查询：
            <select id="select_city">
				<option value="0">全部</option>
                <option value="1">上海</option>
                <option value="2">北京</option>
                <option value="3">宁波</option>
            </select>
      </div>
         <div style="width:528px;height:390px;border:#ccc solid 1px;" id="dituContent"></div>
    </div>
<?php }else{?>
    <?php echo $content['content'];?>
<?php } ?>
</div>
