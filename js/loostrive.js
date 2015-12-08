jQuery(document).ready(function() {
	$('#post_content img').removeAttr('style');
	$('#post_content img').removeAttr('height');
	//导航
	jQuery(".topnav ul li").hover(function() {
		jQuery(this).children("ul").show();
		jQuery(this).addClass("li01")
	},
	function() {
		jQuery(this).children("ul").hide();
		jQuery(this).removeClass("li01")
	})
	jQuery(".menu-button").click(function(){
		jQuery(".menu-button").toggleClass("active");
		jQuery(".menu").toggleClass("open");
	});
	jQuery("#menu-search").click(function(){
		jQuery(".menu-search").toggleClass("current_page_item");
	});
	//tabs
	jQuery('#tabnav li').click(function() {
		jQuery(this).addClass("selected").siblings().removeClass();
		jQuery("#tab-content > ul").eq(jQuery('#tabnav li').index(this)).fadeIn(800).siblings().hide()
	})
	//图片hover
	jQuery("a[rel='external'],a[rel='external nofollow']").click(function() {
		window.open(this.href);
		return false
	})
	jQuery('.icon1,.icon2,.icon3,.icon4,.icon5,.icon6').wrapInner('<span class="hover"></span>').css('textIndent', '0').each(function() {
		jQuery('span.hover').css('opacity', 0).hover(function() {
			jQuery(this).stop().fadeTo(350, 1)
		},
		function() {
			jQuery(this).stop().fadeTo(350, 0)
		})
	})
	/*搜索*/
	$("#searchform .search-s").each(function(){
		var thisVal=$(this).val();
	     //判断文本框的值是否为空，有值的情况就隐藏提示语，没有值就显示
	     if(thisVal!=""){
	     	$(this).siblings("span").hide();
	     }else{
	     	$(this).siblings("span").show();
	     }
	     //聚焦型输入框验证 
	     $(this).focus(function(){
	     	$(this).siblings("span").hide();
	     }).blur(function(){
	     	var val=$(this).val();
	     	if(val!=""){
	     		$(this).siblings("span").hide();
	     	}else{
	     		$(this).siblings("span").show();
	     	} 
	    });
	})
});
//jQuery(document).ready结束
//////////////gototop//////////////////
function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}
/**
* JavaScript脚本实现回到页面顶部示例
* @param acceleration 速度
* @param stime 时间间隔 (毫秒)
**/
function gotoTop(acceleration,stime) {
	acceleration = acceleration || 0.1;
	stime = stime || 10;
	var x1 = 0;
	var y1 = 0;
	var x2 = 0;
	var y2 = 0;
	var x3 = 0;
	var y3 = 0; 
	if (document.documentElement) {
		x1 = document.documentElement.scrollLeft || 0;
		y1 = document.documentElement.scrollTop || 0;
	}
	if (document.body) {
		x2 = document.body.scrollLeft || 0;
		y2 = document.body.scrollTop || 0;
	}
	var x3 = window.scrollX || 0;
	var y3 = window.scrollY || 0;

   // 滚动条到页面顶部的水平距离
   var x = Math.max(x1, Math.max(x2, x3));
   // 滚动条到页面顶部的垂直距离
   var y = Math.max(y1, Math.max(y2, y3));

   // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
   var speeding = 1 + acceleration;
   window.scrollTo(Math.floor(x / speeding), Math.floor(y / speeding));

   // 如果距离不为零, 继续调用函数
   if(x > 0 || y > 0) {
   	var run = "gotoTop(" + acceleration + ", " + stime + ")";
   	window.setTimeout(run, stime);
   }
}
$(document).ready(function(e) {
	b();
	$('#gotop').click(function(){
		// $(document).scrollTop(0);	
		gotoTop();
	})
});
$(window).scroll(function(e){
	b();		
})
////////////////////////////////
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='button'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.5);
	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .button span").css("opacity",0.4).mouseenter(function() {
		index = $("#focus .button span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");
	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0.2).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.2"},300);
	});
	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});
	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});
	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
});
//////////////////////////////////////////////////////////////
////////////////边栏滚动//////////////////////
SidebarFollow = function() {
	this.config = {
		element: null, // 处理的节点
		distanceToTop: 0 // 节点上边到页面顶部的距离
	};
	this.cache = {
		originalToTop: 0, // 原本到页面顶部的距离
		prevElement: null, // 上一个节点
		parentToTop: 0, // 父节点的上边到顶部距离
		placeholder: jQuery('<div>') // 占位节点
	}
};
SidebarFollow.prototype = {
	init: function(config) {
		this.config = config || this.config;
		var _self = this;
		var element = jQuery(_self.config.element);
		// 如果没有找到节点, 不进行处理
		if(element.length <= 0) {
			return;
		}
		// 获取上一个节点
		var prevElement = element.prev();
		while(prevElement.is(':hidden')) {
			prevElement = prevElement.prev();
			if(prevElement.length <= 0) {
				break;
			}
		}
		_self.cache.prevElement = prevElement;
		// 计算父节点的上边到顶部距离
		var parent = element.parent();
		var parentToTop = parent.offset().top;
		var parentBorderTop = parent.css('border-top');
		var parentPaddingTop = parent.css('padding-top');
		_self.cache.parentToTop = parentToTop + parentBorderTop + parentPaddingTop;
		// 滚动屏幕
		jQuery(window).scroll(function() {
			_self._scrollScreen({element:element, _self:_self});
		});
		// 改变屏幕尺寸
		jQuery(window).resize(function() {
			_self._scrollScreen({element:element, _self:_self});
		});
	},
	/**
	 * 修改节点位置
	 */
	 _scrollScreen: function(args) {
	 	var _self = args._self;
	 	var element = args.element;
	 	var prevElement = _self.cache.prevElement;
		// 获得到顶部的距离
		var toTop = _self.config.distanceToTop;
		// 如果 body 有 top 属性, 消除这些位移
		var bodyToTop = parseInt(jQuery('body').css('top'), 10);
		if(!isNaN(bodyToTop)) {
			toTop += bodyToTop;
		}
		// 获得到顶部的绝对距离
		var elementToTop = element.offset().top - toTop;
		// 如果存在上一个节点, 获得到上一个节点的距离; 否则计算到父节点顶部的距离
		var referenceToTop = 0;
		if(prevElement && prevElement.length === 1) {
			referenceToTop = prevElement.offset().top + prevElement.outerHeight();
		} else {
			referenceToTop = _self.cache.parentToTop - toTop;
		}
		// 当节点进入跟随区域, 跟随滚动
		if(jQuery(document).scrollTop() > elementToTop) {
			// 添加占位节点
			var elementHeight = element.outerHeight();
			_self.cache.placeholder.css('height', elementHeight).insertBefore(element);
			// 记录原位置
			_self.cache.originalToTop = elementToTop;
			// 修改样式
			element.css({
				top: toTop + 'px',
				position: 'fixed'
			});
		// 否则回到原位
	} else if(_self.cache.originalToTop > elementToTop || referenceToTop > elementToTop) {
			// 删除占位节点
			_self.cache.placeholder.remove();
			// 修改样式
			element.css({
				position: 'static'
			});
		}
	}
};
/* <![CDATA[ */
(new SidebarFollow()).init({
	element: jQuery('#sidebar-follow'),
	distanceToTop: 15
});
/* ]]> */
//////////////////评论///////////////////////////////////////////
$('.comt-addsmilies').click(function(){
	$('.comt-smilies').toggle();
})
$('.comt-smilies a').click(function(){
	$(this).parent().hide();
})
function grin(tag) {
	var myField;
	tag = ' :' + tag + ': ';
	if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
		myField = document.getElementById('comment');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var cursorPos = endPos;
		myField.value = myField.value.substring(0, startPos)
		+ tag
		+ myField.value.substring(endPos, myField.value.length);
		cursorPos += tag.length;
		myField.focus();
		myField.selectionStart = cursorPos;
		myField.selectionEnd = cursorPos;
	}
	else {
		myField.value += tag;
		myField.focus();
	}
}
///////内容字数限制
jQuery.fn.myWords=function(options){
	//初始化
	// alert("a");
	var defaults={
		obj_opts:"textarea",
		obj_Maxnum:400,
		obj_Lnum:".comt-num"
	}
	var opts=$.extend(defaults,options);
	return this.each(function(){
        // 找到相应对象
        var _this=$(this).find(opts.obj_opts);
        var num=parseInt(opts.obj_Maxnum/2);
        var _obj_Lnum=$(this).find(opts.obj_Lnum);
        $(_obj_Lnum).find("em").text(num);
        if(_this.val()!=""){
			//如果文本框的值不为空，防止刷新浏览器之后 对文本框里面文字个数判断失误
			var len= _this.val().replace(/[^\x00-\xff]/g, "**").length;//将两个字母转换为一个汉字
			var _num=num-parseInt(len/2);//parseInt这个方法 就是len/2转换为整数
			html="还能输入"+"<em>"+_num+"</em>"+"字";
			$(_obj_Lnum).html(html);
		}
		_this.focus(function(){
			var html;
			$(this).keyup(function(){
				//键盘输入
				var lend= $(this).val().replace(/[^\x00-\xff]/g, "**").length;//将两个字母转换为一个汉字
				// alert(len);
				var _num=num-parseInt(lend/2);//parseInt这个方法 就是len/2转换为整数
				html="还能输入"+"<em>"+_num+"</em>"+"字";
				$(_obj_Lnum).html(html);
				if(lend>opts.obj_Maxnum){
					html="已经超出"+"<em>"+(-_num)+"</em>"+"字";
					$(_obj_Lnum).html(html);
					$(_obj_Lnum).find("em").css("color","#C30");									
				}
				else{					
					// 移除css样式
					$(obj_Lnum).find("em").removeAttr("style");
				}
			});
		});
		
	});
}
$(function(){
   //插件
   $(".comt-box").myWords({   //输入框字数
   	obj_opts:"textarea",
        obj_Maxnum:480,//要是只能输入140个字  那这里就是280
        obj_Lnum:".comt-num"
    });
})
//全站ajax加载开始
	//全局变量
var ajaxBinded = false;
jQuery(document).ready(function(){
       //下面三行你可以插入到你的jQuery(document).ready(function()里面，html5的历史记录API
       	if( history && history.pushState){
       //为真就执行Ajaxopt函数
       Ajaxopt();
   }
})
//Ajaxopt函数
function Ajaxopt(){
         //所有不为新窗口打开的链接
         $('a[target!=_blank]').live('click',function(event){
         	gotoTop();
         	var link = event.currentTarget;
         	var url = link.href;
         	if ( event.which > 1 || event.metaKey || event.ctrlKey )
         		return
         	if ( location.protocol !== link.protocol || location.host !== link.host ){
         		return;
         	}
         	if (link.hash && link.href.replace(link.hash, '') === location.href.replace(location.hash, ''))
         		return
         	if (url.indexOf("respond")>0||url.indexOf("/wp-admin/")>0||url.indexOf("wp-login.php")>0||url.indexOf("sitemap.xml")>0)
         		return
            //以上条件语句均为判断链接时候需要ajax加载，下面2句为执行loadDate函数进行ajax操作。
            loadData(url,true);
            event.preventDefault();
         	$("#loadbar").hide();$("#loadbar").show();$("#loadbar").animate({width:"25%"});
            $("#loadbar").animate({width:"100%"},function(){
            	$("#loadbar").fadeOut(1000,function(){$("#loadbar").css("width","0");});
            })
        });
	}
//loadDate函数
function loadData(url,toPush){
       //进行AJAX操作
       $.ajax({
       	url:url,
	data: "soz=ajax",  //这个可以参考ajax全站加载系列文章第二篇。
	dataType: "html",
	type: "post",
	beforeSend:function(jqXHR, settings){    //加载前操作 #content0的DIV变化
		$('#content0').fadeTo(500,0.3);
		$('#main_loading').show();
	}
	,
	complete:function(){                     //加载后操作 #content0的DIV变化
		$('#content0').fadeTo(200,1);
		$('#main_loading').hide();
	}
	,
	success:function(message){               //加载成功的操作
		var msger = message;
		var titl1 = $(message).find("h1:first").text();
		var titl2 = $(message).find("h2:first").text();
		if (titl1 == "") {
			window.document.title = titl2 + " \u2502 小众网站";
		}
		else {
			window.document.title = titl1 + " \u2502 小众网站";
		}
                        //以上几句为组合新页面的标题。下面一句为插入ajax回来的内容到"#content0"的DIV容器内。
                        $("#content0").html(msger);
		if(toPush){//使用html5的特有API 来改变历史记录数据。
			window.history.pushState(null, titl1, url);
		}
		if(!ajaxBinded){//ajax后重新绑定新加载页面的ajax事件。
			ajaxBinded = true;
			$(window).bind('popstate', function(e){
				loadData(location.href,false);
				return false;
			});
		}
		//tabs
		jQuery('#tabnav li').click(function() {
			jQuery(this).addClass("selected").siblings().removeClass();
			jQuery("#tab-content > ul").eq(jQuery('#tabnav li').index(this)).fadeIn(800).siblings().hide()
		})
	}
	,
	error: function() {//如果加载失败 报错内容
		$("#content0").html("<div style='0margin-bottom: 800px;'><h2>AJAX Error...</h2></div>"); 
	}, 
}); 
}
//全站ajax加载结束
//滚动上浮特效
var init_animate_scroll = function () {
		$(window).on('load scroll', function () {
			$('.setanimate').each(function() {
				this.getBoundingClientRect().top < $(window).height()
					? $(this).addClass('visible')
					: $(this).removeClass('visible');
			});
		});
	};
$(function () {
	init_animate_scroll();
});
// logo播放器开始
function p() {
    var a = $(".aud").get(0);
    a.pos = -1;
    $(".titleone").hover(function() {
        $(".mprev").fadeIn(50);
        $(".mprev").animate({
            left: "-160px"
        },
        100);
        $(".mnext").fadeIn(50);
        $(".mnext").animate({
            left: "125px"
        },
        100)
    },
    function() {
        $(".mprev").animate({
            left: "0px"
        },
        100);
        $(".mprev").fadeOut(50);
        $(".mnext").animate({
            left: "0px"
        },
        100);
        $(".mnext").fadeOut(50)
    });
    $("#music a").bind("click", 
    function() {
        0 < $("img#fakeAd").length && $("img#fakeAd").is(":visible") && _hmt.push(["_trackPageview", "/music"])
    });
    $("#music .mplay").bind("click", 
    function(b) {
        b.preventDefault();
        0 > a.pos ? $("#music .mnext").trigger("click") : (a.play(), $(this).fadeOut(200, 
        function() {
            $(".mpause").fadeIn(100);
            $(".musiclist").slideDown(200, 
            function() {
                $("#musicload").show()
            })
        }))
    });
    $("#music .mpause").bind("click", 
    function(b) {
        b.preventDefault();
        a.pause();
        $(this).fadeOut(200, 
        function() {
            $(".mplay").fadeIn(100);
            $("#musicload").hide();
            $(".musiclist").slideUp(200)
        })
    });
    $("#music .mnext").bind("click", 
    function(b) {
        b.preventDefault();
        a.pause();
        a.pos++;
        a.pos == playlist.length && (a.pos = 0);
        a.setAttribute("src", playlist[a.pos].url);
        $(".musiclist").html(playlist[a.pos].title);
        a.load()
    });
    $("#music .mprev").bind("click", 
    function(b) {
        b.preventDefault();
        a.pause();
        a.pos--;
        0 > a.pos && (a.pos = playlist.length - 1);
        a.setAttribute("src", playlist[a.pos].url);
        $(".musiclist").html(playlist[a.pos].title);
        a.load()
    });
    a.addEventListener("canplay", 
    function(a) {
        $("#music .mplay").trigger("click")
    });
    a.addEventListener("ended", 
    function(a) {
        $("#music .mnext").trigger("click")
    });
    a.addEventListener("progress", 
    function(a) {
        var c = parseInt($("#musictitle").css("width"));
        a = Math.round(a.loaded / a.total * 100);
        c = Math.ceil(c / 100 * a);
        $("#musicload").css("width", c)
    });
    a.addEventListener("timeupdate", 
    function(b) {
        b = parseInt($("#musictitle").css("width"));
        var c = Math.round(a.currentTime / a.duration * 100);
        b = Math.ceil(b / 100 * c);
        $("#musicload").css("width", b)
    });
    $(".musiclist").html(playlist[0].title)
};
window.onload = function() {
    p();
};
var playlist = [
{
    url: "http://www.527578.com/down/58682.mp3",
    title: "\u4e0d\u518d\u8bf4\u6c38\u8fdc"
},
{
    url: "http://qzone.haoduoge.com/music/2386bK9I0Ceca041ff6c7b9f059c1b6944880.mp3",
    title: "\u504f\u504f\u559c\u6b22\u4f60"
},
{
    url: "http://fmcdn.duole.com/group1/0b/17/46ef2d388f4c28da0e934aec4037.mp3",
    title: "\u5fc3\u58f0\u8bf4\u5531"
},
{
    url: "http://www.scottandrew.com/mp3/demos/holding_back_demo_011504.mp3",
    title: "Holding Back"
},
{
    url: "http://www.scottandrew.com/mp3/wb/where_ive_been/Scott_Andrew_and_the_Walkingbirds-Gravel_Road_Requiem.mp3",
    title: "Gravel Road Requiem"
},
{
    url: "http://www.scottandrew.com/mp3/syfy/01%20-%20Scott%20Andrew%20-%20More%20Good%20Days.mp3",
    title: "More Good Days"
}];
// logo播放器结束
