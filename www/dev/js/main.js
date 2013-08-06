(function(){
	if(window.call_bridge_function){return;}
	var c={},d={},i=0,t=new Date().getTime()*10000+Math.random()*10000;
	_bridge_id=function(params){
		if(!params ||Object.prototype.toString.call(params)!='[object Array]'){
			return 0;
		}
		var id=++i;c[id]=params[2];d[id]=JSON.stringify({
			func:params[0],param:params[1],uid:t
		});
		return id;
	};
	_bridge_callback=function(id,param,uid){
		if(uid!=t){
			return 0;
		}
		var f=c[id];
		delete c[id];
		return f(param);
	};
	_bridge_data=function(id){
		var s=d[id];delete d[id];return s;
	};
	call_bridge_function=function(func_name,param,callback){
		if(typeof(param)=="function"){callback=param;param={};
		}else if(param===undefined){param={};
		}else if(!callback){callback=function(){return 1;};
		}
		setTimeout(function(){window.location.href= 'QUJSBridge://id='+_bridge_id([func_name,param,callback]);},0);
	};
})();

function cp(o,c,d){
	d||(d={});
	var k;
	if(!c){
		for(k in o){d[k]=o[k];}
	}else if(c instanceof Array){
		for(k in c){d[c[k]]=o[c[k]];}
	}else{
		d=c;
		for(k in o){d[k]=o[k];}
	}
	return d;
}


var $$;
(function(){function BJ(arg){this.s=[];this.a=arg;}var b=[];BJ.prototype={};
	for(var k in $.fn){(function(){var v=k;BJ.prototype[v]=function(){this.s.push([v,arguments]);return this;}})();}
	function apply(o){var j=$.apply(null,o.a);for(var i=0;i<o.s.length;i++){j=j[o.s[i][0]].apply(j,o.s[i][1]);}return j;}
	$$=function(){var o;if(arguments.length==0){for(;b.length>0;){o=b.shift();apply(o);}return true;}o=new BJ(arguments);b.push(o);return o;}
})();

$ && ($.fn.smartSet=function(b){
	return this.each(function(){
		var me=this;
		$.each(b,function(k,v){
			$(me).find(".t_"+k).each(function(){$(this).html(h(v))});
			$(me).find(".v_"+k).each(function(){$(this).text(formatNumber(v))});
			$(me).find(".h_"+k).each(function(){$(this).html(v)});
			$(me).find(".i_"+k).each(function(){$(this).attr("src",v)});
			$(me).find(".cl_"+k).each(function(){$(this).text(cl(v))});
			$(me).find(".b_"+k).each(function(){$(this).click(v)});
		});
	});
});

(function(){var _id=0;genarate_id=function(){return ++_id;}})();
(function(){var q=[];doQueue=function(){if(q.length>0){var f=q.shift();f[0].apply(null,f.slice(1))}};pushQueue=function(f){q.push(f)}})();


var bug=function(){
	return false;
}


function json_encode(obj){return JSON.stringify(obj)}
function json_decode(s){return JSON.parse(s)}

function h(s){
	if(s===null||s===undefined){
		return "";
	}else{
		return (""+s).replace(/MB6o2t62u2|[\r\n\t\>\<\ \"\'\&]/g,function(s){return {"MB6o2t62u2":"\&\#x","\r":"","\n":"<br/>"," ":"&nbsp;","\t":"&nbsp;&nbsp;&nbsp;&nbsp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;","&":"&#038;"}[s];});
	}
}

function text2html(s){
	if(s===null||s===undefined){
		return "";
	}else{
		return (""+s).replace(/MB6o2t62u2|[\r\n\t\>\<\ \"\'\&]/g,function(s){return {"MB6o2t62u2":"\&\#x","\r":"","\n":"<br/>"," ":"&nbsp;","\t":"&nbsp;&nbsp;&nbsp;&nbsp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;","&":"&#038;"}[s];});
	}
}

function ms(tmpl,param,fm){
	if(typeof(tmpl)=="function"){
		return tmpl(param,fm);
	}
	fm||(fm={});	
	fm=cp({text2html:text2html},cp(fm));
	return tmpl.replace(/\{[A-Za-z0-9_]*\:?[A-Za-z0-9_\?]+\}/g,
		function(s){
			s=s.substr(1,s.length-2).split(":");			
			return s.length==2?(s[0]?fm[s[0]]:text2html)(param[s[1]]):param[s[0]];
		}
	);
}


function formatNumber(num){
	var s=[];
	num=String(num);
	if(/^(-)?\d+$/.exec(num)==null){
		return num;
	}
	
	var is_down_0=(num<0);
	if(is_down_0){
		num=num.substr(1);
	}
	var is_up_7=(num>9999999);
	if(is_up_7){
		num='9999999';
	}

	for(var i=0;i<num.length;i++){
		if(i%3==0){
			s.unshift(",");	
		}
		s.unshift(num.charAt(num.length-i-1));
	}
	s.pop();
	if(is_down_0){
		s.unshift("-");
	}
	if(is_up_7){
		s.push("+");
	}
	return s.join("");
}


function numberFormatLeadZero(num,len){
	num=(""+ Math.floor(num));
	for(;num.length<len;){
		num="0"+num;
	}
	return num;
}


function formatTime(t,format){
	var d;
	t=Math.floor(t);
	t<0&&(t=0);
	if(format==2){
		return numberFormatLeadZero(t/60,2)+":"+numberFormatLeadZero(t%60,2);
	}else if(format==3){
		return numberFormatLeadZero(t/3600,2)+":"+numberFormatLeadZero(t/60%60,2)+":"+numberFormatLeadZero(t%60,2);
	}else if(format==4){
		return t<60?"刚才":t<3600?""+Math.floor(t/60)+"分钟前":t<86400?""+Math.floor(t/3600)+"小时"+Math.floor(t/60%60)+"分钟前":""+Math.floor(t/86400)+"天前";
	}else if(format==5){
		return t<=0?"0分钟":t<60?t+"秒":t<3600?Math.floor(t/60)+"分钟":t<86400?Math.floor(t/3600)+"小时"+Math.floor(t/60%60)+"分钟":Math.floor(t/86400)+"天";
	}else if(format==6){
		return t<=0?"0分钟":t<60?t+"秒":t<3600?Math.floor(t/60)+"分钟":t<86400?Math.floor(t/3600)+"小时"+Math.floor(t/60%60)+"分钟":Math.floor(t/86400)+"天"+Math.floor(t%86400/3600)+"小时"+Math.floor(t/60%60)+"分钟";
	}else if(format==7){
		return t<=0?"0秒":t<60?t+"秒":t<3600?Math.floor(t/60)+"分钟"+Math.floor(t%60)+"秒":t<86400?Math.floor(t/3600)+"小时"+Math.floor(t/60%60)+"分钟"+Math.floor(t%60)+"秒":Math.floor(t/86400)+"天"+Math.floor(t%86400/3600)+"小时"+Math.floor(t/60%60)+"分钟"+Math.floor(t%60)+"秒";
	}else if(format==8){
		return t<60?"1分钟前":t<3600?Math.floor(t/60)+"分钟前":t<86400?Math.floor(t/3600)+"小时前":t<2592000?Math.floor(t/86400)+"天前":t<31536000?Math.floor(t/2592000)+"个月前":Math.floor(t/31536000)+"年前";
	}else if(format==9){
		d=new Date(t*1000);
		return d.getFullYear()+'/'+numberFormatLeadZero(d.getMonth()+1,2)+'/'+numberFormatLeadZero(d.getDate(),2);
	}else if(format==10){
		d=new Date(t*1000);
		return d.getFullYear()+'-'+numberFormatLeadZero(d.getMonth()+1,2)+'-'+numberFormatLeadZero(d.getDate(),2)+'&nbsp;'+numberFormatLeadZero(d.getHours(),2)+':'+numberFormatLeadZero(d.getMinutes(),2);
	}else if(format==11){
		d=new Date(t*1000);
		return d.getFullYear()+'/'+numberFormatLeadZero(d.getMonth()+1,2)+'/'+numberFormatLeadZero(d.getDate(),2)+'&nbsp;'+d.getHours()+':'+numberFormatLeadZero(d.getMinutes(),2);
	}else if(format==12){
		return t<=0?"0秒":t<60?t+"秒":t<3600?Math.floor(t/60)+"分钟"+(t%60==0?'':Math.floor(t%60)+"秒"):t<86400?Math.floor(t/3600)+"小时"+(t%3600==0?'':Math.floor(t/60%60)+"分钟"+(t%60==0?'':Math.floor(t%60)+"秒")):Math.floor(t/86400)+"天"+(t%86400==0?'':Math.floor(t%86400/3600)+"小时"+(t%3600==0?'':Math.floor(t/60%60)+"分钟"+(t%60==0?'':Math.floor(t%60)+"秒")));
	}else{
		return bug();	
	}
}

function makeEventAble(me){
	me.event_map={};
	me.bind=function(n,h){if(!this.event_map[n]){this.event_map[n]=[];}this.event_map[n].push(h);return this}
	me.unbind=function(n){this.event_map[n]=undefined;return this}
	me.trigger=function(n,e){if(this.event_map[n]){for(var i=0;i<this.event_map[n].length;i++){this.event_map[n][i].call(this,e)}}return this}
}

function MultiItemModule(){

}
MultiItemModule.prototype={
	super_init:function(){
	},	
	_get_dom:function(element_id){
		return document.getElementById(element_id);
	},	
	super_show:function(){
		var dom=this._get_dom(this._element_id);
		if(dom){
			$(dom).show();
		}	
	},	
	super_hide:function(){
		var dom=this._get_dom(this._element_id);
		if(dom){
			$(dom).hide();
		}	
	},
	
	super_timer:function(){
		var me=this;		
		$.each(this._item_id_list,function(k,v){
			k=v;
			v=me._item_hash[k];
			var dom=me._get_item_dom(k);
			var state=me._state(v);
			if(me._item_state[k]!=state){
				me._item_refresh(k,v,dom);
			}else{
				me._partial_item_refresh(state,v,dom);
			}
		});
	},
	
	super_set:function(data,param){
		var me=this;
		if(data!==undefined){			
			this._item_state={};
			this._item_id_list=[];
			this._item_hash={};
			$.each(data,function(){
				var id_field=me._id_field?me._id_field:"id";
				if(!this[id_field]){
					this[id_field]=genarate_id();
				}
				var id=me._get_id(this);
				me._item_id_list.push(id);
				me._item_hash[id]=this;
			});
		}
		this._param=param;
		$(this._get_dom(me._element_id)).html("");
		$.each(this._item_id_list,function(){
			var k=this;
			var v=me._item_hash[k];
			$(me._item_container_html).attr("id",me._element_id+"_"+k).appendTo(me._get_dom(me._element_id));
			me._item_refresh(k,v,me._get_item_dom(k));
		});
		
		if(!this._t && this._timer_interval){
			this._t=setInterval(function(){
				me._timer();
			},this._timer_interval);
		}else if(!this._timer_interval){
			clearInterval(this._t);
			this._t=undefined;
		}		
		
		return this;
	},
	data:function(){
		var ar=[];
		for(var i=0;i<this._item_id_list.length;i++){
			ar.push(this._item_hash[this._item_id_list[i]]);
		}
		return ar;
	},
	_timer:function(){
		this.super_timer();
	},
	
	_item_refresh:function(k,v,dom){
		var state=this._state(v);
		this._item_state[k]=state;
		this._full_item_refresh(this,state,k,v,dom);
		this._partial_item_refresh(state,v,dom);
	},
	
	_get_item_dom:function(id){
		return $("#"+this._element_id+"_"+id).get(0);
	},

	_init:function(){
		this.super_init();
	},

	_get_id:function(v){
		return  this._id_field?v[this._id_field]:v.id;
	},

	_state:function(v){
		return 1;
	},
	_partial_item_refresh:function(state,v,dom){
		
	},
	_full_item_refresh:function(me,state,k,v,dom){
		
	},
	show:function(){
		this.super_show();
	},
	
	hide:function(){
		this.super_hide();
	},
	set:function(data,param){
		this.super_set(data,param);
		return this;
	},
	get:function(id){
		return this._item_hash[id];
	},
	remove:function(obj){
		var id=parseInt(obj);
		if(isNaN(id)){
			id=this._get_id(obj);
		}
		delete this._item_hash[id];
		delete this._item_state[id];
		var ar=[];
		for(;this._item_id_list.length>0;){
			var x=this._item_id_list.pop();
			if(x==id){
				break;
			}
			ar.push(x);
		}
		for(;ar.length>0;){
			this._item_id_list.push(ar.pop());
		}
		$(this._get_item_dom(id)).remove();
		return this;
	},
	
	update:function(obj){
		var id=parseInt(obj);
		if(isNaN(id)){
			id=this._get_id(obj);
			this._item_hash[id]=obj;
		}	
		this._item_refresh(id,this._item_hash[id],this._get_item_dom(id));
		return this;
	},
	
	insert:function(pos,v){
		if(this._item_id_list.length==0){
			pos=0;
		}
		var id=this._get_id(v);
		this._item_hash[id]=v;
		if(pos==0){
			this._item_id_list.unshift(id);
			$(this._item_container_html).attr("id",this._element_id+"_"+id).prepend(this._get_dom(this._element_id));
		}else{
			var ar=[];
			var last_id;
			for(;pos-- >0 && this._item_id_list.length>0;){
				last_id=this._item_id_list.shift();
				ar.push(last_id);
			}
			this._item_id_list.unshift(id);
			for(;ar.length>0;){
				this._item_id_list.unshift(ar.pop());
			}
			$(this._item_container_html).attr("id",this._element_id+"_"+id).insertAfter(this._get_item_dom(last_id));
		}
		this._item_refresh(id,v,this._get_item_dom(id));
		return this;
	},
	
	append:function(v){
		return this.insert(this._item_id_list.length,v);
	},
	
	refresh:function(){
		$(this._get_dom(this._element_id)).html("")
		this.set(undefined,this._param);
		return this;
	}
}

function SingleItemModule(){}
SingleItemModule.prototype={
	super_init:function(){ 
		var me=this;		
		this._tmpl={};		
		var dom=this._get_dom(this._element_id);
		if(dom){
			$(dom).find("[tmpl]").each(function(index, element){me._tmpl[$(element).attr("tmpl")]=$(element).html();}).remove();
		}
	},
	_get_dom:function(element_id){
		return document.getElementById(element_id);
	},
	super_show:function(){
		var dom=this._get_dom(this._element_id);
		if(dom){
			$(dom).show();
		}		
	},
	super_hide:function(){
		var dom=this._get_dom(this._element_id);
		if(dom){
			$(dom).hide();
		}
	},
	show:function(){
		this.super_show();
		return this;
	},
	hide:function(){
		this.super_hide();
		return this;
	},
	clear:function(){
		if(this._t) clearInterval(this._t);
	},
	super_timer:function(){
		if(this._state(this._item)!=this._item_state){
			this._item_refresh(this._item,this._get_dom(this._element_id));
		}else{
			this._partial_item_refresh(this._item_state,this._item,this._get_dom(this._element_id));
		}		
	},
	super_set:function(data){
		this._item=data;
		this._item_state=undefined;
		this._item_refresh(this._item,this._get_dom(this._element_id));
		
		var me=this;
		if(!this._t && this._timer_interval){
			this._t=setInterval(function(){
				me._timer();
			},this._timer_interval);
		}else if(!this._timer_interval){
			clearInterval(this._t);
			this._t=undefined;
		}
		
	},
	_timer:function(){
		this.super_timer();
	},
	_item_refresh:function(v,dom){
		var state=this._state(v);
		this._item_state=state;
		this._full_item_refresh(this,state,v,dom);	
		this._partial_item_refresh(state,this._item,dom);
	},
	_init:function(){
		this.super_init();
	},
	_state:function(v){
		return 1;
	},
	_partial_item_refresh:function(state,v,dom){
		
	},
	_full_item_refresh:function(me,state,v,dom){
		
	},
	set:function(data){
		this.super_set(data);
		return this;
	},	
	get:function(){
		return this._item;
	},
	refresh:function(){
		this.set(this._item);
		return this;
	}
}

function CubicBezierAtTime(t,p1x,p1y,p2x,p2y,duration) {
	var ax=0,bx=0,cx=0,ay=0,by=0,cy=0;
	function sampleCurveX(t) {return ((ax*t+bx)*t+cx)*t;}
	function sampleCurveY(t) {return ((ay*t+by)*t+cy)*t;}
	function sampleCurveDerivativeX(t) {return (3.0*ax*t+2.0*bx)*t+cx;}
	function solveEpsilon(duration) {return 1.0/(200.0*duration);}
	function solve(x,epsilon) {return sampleCurveY(solveCurveX(x,epsilon));}
	function solveCurveX(x,epsilon) {var t0,t1,t2,x2,d2,i;
		function fabs(n) {if(n>=0) {return n;}else {return 0-n;}}
		for(t2=x, i=0; i<8; i++) {x2=sampleCurveX(t2)-x; if(fabs(x2)<epsilon) {return t2;} d2=sampleCurveDerivativeX(t2); if(fabs(d2)<1e-6) {break;} t2=t2-x2/d2;}
		t0=0.0; t1=1.0; t2=x; if(t2<t0) {return t0;} if(t2>t1) {return t1;}
		while(t0<t1) {x2=sampleCurveX(t2); if(fabs(x2-x)<epsilon) {return t2;} if(x>x2) {t0=t2;}else {t1=t2;} t2=(t1-t0)*.5+t0;}
		return t2; 
	}
	cx=3.0*p1x; bx=3.0*(p2x-p1x)-cx; ax=1.0-cx-bx; cy=3.0*p1y; by=3.0*(p2y-p1y)-cy; ay=1.0-cy-by;
	return solve(t, solveEpsilon(duration));
}

