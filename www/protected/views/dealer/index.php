<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
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
$(document).ready(function(){
    _init_area();

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
    
    initMap(1);//创建和初始化地图
    $(".h_dealer").hide();
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
});
</script>
<img src="<?php echo $this->url("images/ban-dealers.jpg");?>" />
<div class="c-nav">
    <i class="r">
        <a href="<?php echo $this->url("Dealer", "Index");?>" class="hover">经销商查询</a>
        <a href="<?php echo $this->url("Dealer", "Register");?>">经销商加盟</a>
        <a href="<?php echo $this->url("Dealer", "Login");?>">经销商登入口</a>
    </i>
    <span>关于新世纪</span>
</div><!--c-nav-end-->
<div class="dealers bg2 fix">
    <div class="dea-l l">
        <h2>ROBOT特约经销商查询</h2>
        <p class="p1">选择您所在的区域</p>
        <p class="p2">
            所在省:&nbsp;
            <select id="s_province" name="s_province" style="width:105px;">
            </select>
        </p>
        <p>
            所在市:&nbsp;
            <select id="s_city" name="s_city" style="width:105px;">
            </select>
        </p>
        <h3 style="margin-top:20px;">经营商列表</h3>
        <?php foreach ($dealer_list as $key => $row) { ?>
        <dl id="dealer_<?php echo $row['id'];?>" class="h_dealer <?php echo $init_id==$row['id']?'hover':'';?>  <?php echo $province_map[$row['province']].'_'.$city_map[$row['city']].' '.$province_map[$row['province']].'_0 0_'.$city_map[$row['city']]; ?>" style="padding-right:20px;">
            <dt><?php echo $row['company']; ?></dt>
            <dd><?php echo $row['address']; ?><br><?php echo $row['contact_name']; ?>：<?php if($row['mobile']!=''){echo $row['mobile'];} ?><?php echo ($row['mobile']!=''&&$row['tel']!='')?'、':''; ?><?php if($row['tel']!=''){echo $row['tel'];} ?>
                <?php echo $row['fax']!=''?"<br>传真：".$row['fax']:'';?>
            </dd>
        </dl>
        <?php }?>
    </div>
    <div class="dea-map l">
        <div style="width:528px;height:390px;border:#ccc solid 1px;" id="dituContent"></div>
    </div>
</div>