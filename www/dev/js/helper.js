function cl(t){
	return formatTime(t-time(),3);
}
function cl2(t){
	return formatTime(t-time(),7);
}
function get_url(c,a,p){
	if(a===undefined){
		var file;
		if(c=="js/jquery.min.js"){
			file=c;
		}else if(c.substr(0,3)=="js/"){
			file=LANG+"/"+c;
		}else{
			file=c;
		}
		var pieces=c.split("/");
		//var arr=URLCACHE;
		//for(var i=0;i<pieces.length;i++){
		//	arr=arr[pieces[i]];
		//}
		return STATIC_BASE_URL+"/"+file;//+"?v="+arr;
	}else {
		var url,param;
		if(typeof(a)=="string"){
			url=CODE_BASE_URL+"/"+c+"/"+a;
			param=p;
		}else{
			url=CODE_BASE_URL+"/"+c;
			param=a;
		}
		if(param){
			url+="?";
			for(var k in param){
				url+=encodeURIComponent(k)+"="+encodeURIComponent(param[k])+"&";
			}
		}
		return url;
	}
}

function ifready(){
	if(isReady){
		arguments[0].apply(undefined,Array.prototype.slice.call(arguments,1));
	}
}

function goto_url(c,a,p){
	var url;
	if(a===undefined){
		url=c;
	}else{
		url=get_url(c,a,p);
	}
	document.location.href=url;
}


function time(){
	return Math.floor((new Date().getTime()-CTIME)/1000+STIME);
}

function kajax(c,a,data,succ_callback,dom){
	if(dom && $(dom).data("k_disable")){
		return;
	}else if(dom){
		$(dom).data("k_disable",1);
	}
	var succ=function(obj){
		if(obj==null || typeof(obj)!="object" || !obj.code ){
			fail("","parsererror","");
		}else if(obj.code=="-1"){
			fail("","servererror",obj.msg);
		}else{
			succ_callback(obj);
		}		
		dom && $(dom).data("k_disable",0);
	}
	var fail=function(jqXHR, textStatus, errorThrown){
		if(!TEST_SERVER_FLAG){
			if(textStatus=="parsererror"){
				goto_url('Site','Error');
			}else if(textStatus=="servererror"){
				goto_url('Site','Error');
			}else{
				goto_url('Site','Error');
			}
		}
		dom && $(dom).data("k_disable",0);
	};

	$.ajax({url:get_url(c,a),data:data,dataType:"json",type: "POST",success:succ,error:fail});
}

function MainFrame(id){
	this.element_id=id;
	this.dom=function(){
		return document.getElementById(this.element_id);
	}
	this.createLayer=function(zindex,type){
		this.removeLayer(zindex);
		type||(type=1);		
		if(type==1){
			$(this.dom()).append('<div id="layer_'+zindex+'"></div>');
		}else if(type==2){
			$(this.dom()).append('<div id="layer_'+zindex+'" style="position:absolute;left:0px;top:0px;height:100%;width:100%;z-index:'+zindex+'"></div>');
		}else if(type==3){
			$(this.dom()).append('<div id="layer_'+zindex+'" style="position:absolute;left:0px;top:0px;height:100%;width:100%;background-color:#333333;opacity:0.5;z-index:'+zindex+'"></div>');
		}else {
			bug();
		}
		return document.getElementById("layer_"+zindex);
	}
	this.removeLayer=function(zindex){$("#layer_"+zindex).remove();return this;}
	this.showLayer=function(zindex)  {$("#layer_"+zindex).show();return this;}	
	this.hideLayer=function(zindex)  {$("#layer_"+zindex).hide();return this;}
}
MainFrame.prototype={};
var maindiv=new MainFrame("maindiv");

$(document).ready(function(){
    function search(){
        if($.trim($("#search_text").val())==""){return;}
        location.href=get_url("Main","Search",{q:$.trim($("#search_text").val())});
    }
    $("#search_btn").click(function(){
        search();
    });
    $('#search_text').bind('keydown',function(e){
        var key=e.which;
        if(key==13){
            search();
        }
    });
});