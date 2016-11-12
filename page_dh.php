<?php
/*
Template Name: 导航首页
*/
?>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<style type="text/css">
    .section {background: #fff; box-shadow: 0 1px 2px rgba(43,59,93,.29); border-radius: 3px;position: relative; }
    .lefttitle{background: #333; color:#fff;box-shadow: 0 1px 2px rgba(43,59,93,.29); border-radius: 3px; padding: 20px 5px; position: absolute; width: 30px; line-height: 22px; font-size: 20px; left: -38px; top: 0px; /* height: 100px; */ text-align: center; border-right: 0; z-index: 9;}
    .mtop {margin-top: 10px; }
    .section .nav-title {height: 30px; line-height: 35px; border-bottom: 1px solid #e2e2e2; font-size: 16px; color: #333; padding-left: 8px; position: relative; border-left: 3px solid #000; }
    .icon-play-sign:before {content: "\f144"; }
    .sub-category {font-weight: normal; font-size: 12px; margin-left: 30px; }
    .sub-category a.current, .sub-category a:hover {background: #006cd3;color: #fff;}
    .sub-category a {margin: 0 1px; display: inline-block; padding: 1px 5px; height: 14px; line-height: 14px; color: #666; border-radius: 2px; transition: all 0.3s linear 0s; }
    .section .nav-title .more {display: inline-block; font-size: 12px; line-height: 30px; font-weight: normal; color: #aaa; position: absolute; right: 0px; font-family: SimSun; }
    .section .nav-title i{font-style:normal !important;padding-right: 5px;}
    .content {padding: 10px 20px; }
    .time-list li {float: left; padding-left: 20px;/* background: url(../wp-content/themes/Loostrive/images/timelist.jpg) no-repeat;*/ width: 172px; /*height: 90px; */height: 40px; padding-right: 10px; line-height: 1.5em; overflow: hidden; color: #999; cursor: pointer; position: relative;transition: all .2s ease;border-radius: 5px;}
    .time-list li:hover {background: rgba(0,0,0,.1);}
    .time-list li a {margin-top: 3px; display: inline-block; color: #000; padding: 1px 3px; overflow: hidden; border-radius: 2px; font-size: 16px; line-height: 1.5em; font-weight: normal; position: absolute;left: -2px;white-space: nowrap;}
    .time-list li p {padding: 0 5px;font-size: 12px;margin-top:30px !important; display: none;}
    .flink li a img{width: 20px;padding: 3px 5px 0 0;}
    #nav-plane {position: fixed; top: 210px; right: 0; background: url(../wp-content/themes/Loostrive/images/step.png) repeat-y; z-index: 999; }
    #nav-plane ul {margin-bottom: -3px; }
    #nav-plane li {margin-bottom: 3px; text-align: center; -webkit-box-shadow: 0 0 5px #555; -moz-box-shadow: 0 0 5px #555; box-shadow: 0 0 5px #555; }
    #nav-plane li a {display: inline-block; line-height: 30px; width: 75px; text-align:center;border: 1px solid #e3e3e3; color: #555; background: #fff; border: none;}
    #nav-plane li.active a {background-color: #006cd3; color: #fff; }
    #nav-plane li a:hover {color: #850e06; }
    .shanchu{text-decoration:line-through !important;}
    /*Responsive Structure*/
@media only screen and (max-width: 380px) {
.time-list li {width: 80%;}
}
@media only screen and (min-width:380px) and (max-width:680px) {
.time-list li {width: 40%;}
}
@media only screen and (min-width:680px) and (max-width:768px) {
.time-list li {width: 28%;}
.container {max-width: 90% !important; }
}
@media only screen and (min-width:768px) and (max-width:900px) {
.time-list li {width: 20%;}
.container {max-width: 90% !important; }
}
@media only screen and (min-width:900px) and (max-width:1330px) {
.time-list li {width: 16%;}
.container {max-width: 90% !important; }
}
@media only screen and (min-width:1330px) {

}
</style>
<link href="../wp-content/themes/Loostrive/css/font.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    //bootstrap-scrollspy.js v2.0.2
    // 滚动监听（Scrollspy）
 ! 
function($) {
    function ScrollSpy(element, options) {
        var process = $.proxy(this.process, this),
        $element = $(element).is("body") ? $(window) : $(element),
        href;
        this.options = $.extend({},
        $.fn.scrollspy.defaults, options);
        this.$scrollElement = $element.on("scroll.scroll.data-api", process);
        this.selector = (this.options.target || ((href = $(element).attr("href")) && href.replace(/.*(?=#[^\s]+$)/, "")) || "") + " ul li > a";
        this.$body = $("body").on("click.scroll.data-api", this.selector, process);
        this.refresh();
        this.process()
    }
    ScrollSpy.prototype = {
        constructor: ScrollSpy,
        refresh: function() {
            this.targets = this.$body.find(this.selector).map(function() {
                var href = $(this).attr("href");
                return /^#\w/.test(href) && $(href).length ? href: null
            });
            this.offsets = $.map(this.targets, 
            function(id) {
                return $(id).position().top
            })
        },
        process: function() {
            var scrollTop = this.$scrollElement.scrollTop() + this.options.offset,
            offsets = this.offsets,
            targets = this.targets,
            activeTarget = this.activeTarget,
            i;
            for (i = offsets.length; i--;) {
                activeTarget != targets[i] && scrollTop >= offsets[i] && (!offsets[i + 1] || scrollTop <= offsets[i + 1]) && this.activate(targets[i])
            }
        },
        activate: function(target) {
            var active;
            this.activeTarget = target;
            this.$body.find(this.selector).parent(".active").removeClass("active");
            active = this.$body.find(this.selector + '[href="' + target + '"]').parent("li").addClass("active");
            if (active.parent(".dropdown-menu")) {
                active.closest("li.dropdown").addClass("active")
            }
        }
    };
    $.fn.scrollspy = function(option) {
        return this.each(function() {
            var $this = $(this),
            data = $this.data("scrollspy"),
            options = typeof option == "object" && option;
            if (!data) {
                $this.data("scrollspy", (data = new ScrollSpy(this, options)))
            }
            if (typeof option == "string") {
                data[option]()
            }
        })
    };
    $.fn.scrollspy.Constructor = ScrollSpy;
    $.fn.scrollspy.defaults = {
        offset: 10
    };
    $(function() {
        $('[data-spy="scroll"]').each(function() {
            var $spy = $(this);
            $spy.scrollspy($spy.data())
        })
    })
} (window.jQuery);
// 单击侧导航栏滚动到相应位置
    $(document).ready(function(){
        $('#nav-plane a').on('click', 
            function(e) {
                var aim = $(e.target).attr('href').slice(1),
                dom = $('#' + aim),
                top = dom.offset().top;
                $('html, body').animate({
                    scrollTop: top - 5
                },
                200, 
                function() {
                    dom.stop();
                });
                e.preventDefault();
            });
    });
</script>
<div id="content0">
<div class="container" id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
$(".flink a").each(function(e){
	$(this).prepend("<img src=https://statics.dnspod.cn/proxy_favicon/_/favicon?domain="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '$1').replace( 'http://', '' )+">");
}); 
$(".flink a:not(.noframe)").click(function(event){
    var link = this.href;
    var name = this.text;
    var newlink='http://taoxiaozhong.com/view.php?url='+link+'&name='+name;
    this.href = newlink;
});
});
</script>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php }?>
	<?php endwhile;endif; ?>
    <div id="container" class="wrap">
<!--.section--> 
    <h1 style="display:none;">小众实用导航</h1>
    <div class="section mtop" id="ziyuan">
        <h1 class="lefttitle">资源搜索</h1>
        <h2 class="nav-title" id="wangpan">
            <i class="icon-bell"></i>网盘搜索<span class="sub-category">
                <a href="#ziyuan" class="current notop">所有</a> | <a href="#wangpan" class="notop">网盘搜索</a>| <a href="#bt" class="notop">BT搜索</a>| <a href="#picsearch" class="notop">图片搜索</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.quzhuanpan.com" target="_blank" rel="nofollow">去转盘网</a> <p>常用网盘资源搜索，百度网盘、360网盘等资源下载</p> </li>
                <li> <a href="http://www.xilinjie.com/" target="_blank" rel="nofollow">西林街</a> <p>全能型网盘搜索引擎</p> </li>
                <li> <a href="http://www.panc.cc/" target="_blank" rel="nofollow">胖次搜索</a> <p>网盘资源搜索</p> </li>
                <li> <a href="http://www.iwapan.com/" target="_blank" rel="nofollow">爱挖盘</a> <p>网盘资源搜索</p> </li>
                <li> <a href="http://md5.daimugua.com/" target="_blank" rel="nofollow">呆木瓜</a> <p>网盘资源搜索</p> </li>
                <li><a href="http://so.baiduyun.me/" target="_blank" rel="nofollow">网盘搜索引擎</a> <p>百度网盘论坛旗下的一个各大网盘搜索引擎</p> </li>
                <li><a href="http://so.ygyhg.com/" target="_blank" rel="nofollow">百度云搜</a> <p>针对百度网盘专门优化的搜索引擎,所有资源无需注册回复即可免费下载</p> </li>
                <li><a href="http://wangpan.renrensousuo.com/" target="_blank" rel="nofollow">众人搜索</a> <p>提供跨网盘搜索功能，可以快速帮助大家搜索到想要的学习资料。</p> </li>
                <li><a href="http://md5.daimugua.com/" target="_blank" rel="nofollow">呆木瓜</a> <p>呆木瓜网，有你想要！找教程,找资料,java,C#,数据库,缓存等等</p> </li>
                <li><a href="http://www.tebaidu.com/" target="_blank" rel="nofollow">特百度</a> <p>特百度云提供百度云旗下的百度网盘搜索下载百度网盘的资源，支持百度网盘登陆</p> </li>
                <li><a href="http://www.panduoduo.net/" target="_blank" rel="nofollow">盘多多</a> <p>网盘搜索神器，收录百度云盘资源和新浪微盘资源等。</p> </li>
                <li><a href="http://www.findmd5.com/" target="_blank" rel="nofollow">分享之家</a> <p>简称F站,热门文件的百科。以微搜索,微聚合的方式，呈现精准友好的内容。</p> </li> 
                <li><a href="http://www.pansou.com/" target="_blank" rel="nofollow">盘搜</a> <p>数千万盘友首选</p> </li> 
                <li><a href="http://baidu.wangpanwu.com/" target="_blank" rel="nofollow">网盘屋</a> <p>百度网盘中电影/电视剧/动漫/综艺/音乐等文件资源的搜索和下载</p> </li> 
                <li><a href="http://www.daysou.com/" target="_blank" rel="nofollow">云搜</a> <p>国内优秀网盘资源搜索引擎,提供资源网盘下载服务</p> </li>
                <li><a href="http://www.yiso.me/" target="_blank" rel="nofollow">壹搜</a> <p>专业资源搜索引擎，采用百度谷歌一起搜做到了一举两得快速搜索的效果。</p> </li>
                <li><a href="http://www.xibianyun.com/" target="_blank" rel="nofollow">西边云</a> <p>电子书搜索引擎,帮助读者快速查找互联网上免费电子书资源</p> </li>
                <li><a href="http://www.wodepan.com/" target="_blank" rel="nofollow">我的盘</a> <p>专业的网盘搜索引擎，爬取各个网盘的分享资源，可直接存到我的网盘。</p> </li>
                <li><a href="http://www.sopanpan.com/" target="_blank" rel="nofollow">搜盘盘</a> <p>提供百度云盘资源搜索服务和百度云资源下载分享</p> </li>
                <li><a href="http://www.bdsola.com/newfile.php?Type=ALL" target="_blank" rel="nofollow">网盘搜啦</a> <p>百度网盘搜索引擎,专业提供百度网盘搜索,可以搜索百度网盘各种资源</p> </li>
                <li><a href="http://www.wangpansou.cn/" target="_blank" rel="nofollow">网盘搜</a> <p>最稳定的百度网盘搜索引擎</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="bt">
            <i class="icon-bell"></i>BT搜索 
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.btsoso.com/" target="_blank" rel="nofollow">BT搜搜</a> <p>磁力链接搜索引擎</p> </li>
                <li> <a href="http://www.bt-soso.com/" target="_blank" rel="nofollow">BT-SOSO</a> <p>全网无弹窗的BT搜索</p> </li>
                <li> <a href="http://www.btks.me/" target="_blank" rel="nofollow">BT快搜</a> <p>种子搜索，磁力搜索</p> </li>
                <li> <a href="http://www.fishlee.net/soft/bt_resouce_grabber/" target="_blank" rel="nofollow">比目鱼</a> <p>资源搜索辅助工具</p> </li>
                <li> <a href="http://meg.chongbuluo.com/" target="_blank" rel="nofollow">虫部落磁力搜索 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>磁力搜索，种子搜索，网盘搜索等等</p> </li>
                <li> <a href="http://banyungong.net/" target="_blank" rel="nofollow">搬运工</a> <p>影视种子磁力搜索</p> </li>
                <li><a href="http://snsoso.com/" target="_blank" rel="nofollow">神牛搜搜</a> <p>全球资源最多的BT种子搜索网站，通过DHT磁力链接索引了3亿个BT种子。</p> </li>
                <li><a href="http://www.btcrawler.com/" target="_blank" rel="nofollow">BT爬虫</a> <p>无聊的时候，就来BT爬虫找找最新电影、电视、音乐、游戏解解闷！</p> </li>
                <li><a href="http://btlibrary.net/" target="_blank" rel="nofollow">btlibrary</a> <p>在BT图书馆(BTLibrary)搜索最新高清电影、美剧大片、游戏。</p> </li>
                <li><a href="http://www.breadsearch.com/" target="_blank" rel="nofollow">面包搜索</a> <p>功能强大的磁力链接搜索引擎，拥有高效精准的搜索服务、极速稳定的浏览体验</p> </li>
               <li><a href="http://btkitty.pw/" target="_blank" rel="nofollow">BT kitty</a> <p>专业BT种子搜索神器、下载利器，免费下载各种BT种子</p> </li>
               <li><a href="http://www.btks.me/" target="_blank" rel="nofollow">BT快搜</a> <p>以非人工检索方式、根据您键入的关键字自动生成到第三方网页的链接</p> </li>
               <li><a href="http://okbt.net/" target="_blank" rel="nofollow">okbt</a> <p>基于DHT协议的BT资源搜索引擎，所有资源来源于从DHT网络自动抓取。</p> </li>
               <li><a href="http://diggbt.net/" target="_blank" rel="nofollow">Diggbt</a> <p>提供从DHT网络抓取的磁力链接以及其他网站提供的下载链接。</p> </li>
               <li><a href="http://www.bthand.com/" target="_blank" rel="nofollow">BTbook</a> <p>索引了全球最新最热门的BT种子信息和磁力链接，提供磁力链接搜索、BT种子搜索</p> </li>
               <li><a href="http://www.btmayi.me/" target="_blank" rel="nofollow">bt蚂蚁</a> <p>磁力搜索,磁力链接,种子搜索,迅雷下载,种子搜索网站,BT天堂,BT樱桃,BT搜索</p> </li>
               <li><a href="http://meg.chongbuluo.com/" target="_blank" rel="nofollow" class="noframe">虫部落磁力搜索</a> <p>磁力搜索聚合搜索引擎</p> </li>
               <li><a href="http://btrabbit.com/" target="_blank" rel="nofollow">BTRabbit</a> <p>BT兔子-BT资源搜索引擎</p> </li>
               <li><a href="http://www.cilisou.cn/" target="_blank" rel="nofollow">磁力搜</a> <p>最稳定最好用的DHT磁力搜索引擎</p> </li>
               <li><a href="http://www.xunleihd.com/" target="_blank" rel="nofollow" class="shanchu">TSearch种子搜索器</a> <p>纯绿色，可预览，史上最强种子搜索器</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="picsearch">
            <i class="icon-bell"></i>图片搜索 
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://img.chongbuluo.com/" target="_blank" rel="nofollow" class="noframe">虫部落图搜</a> <p>图片聚合搜索引擎</p> </li>
                <li> <a href="http://shitu.baidu.com/" target="_blank" rel="nofollow" class="noframe">百度识图</a> <p>通过图像识别和检索技术，为你提供全网海量、实时的图片信息</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div><!--.section-->
    <div class="section mtop" id="kexue">
        <h1 class="lefttitle">科学上网</h1>
        <h2 class="nav-title" id="fanqiang">
            <i class="icon-unlock-alt"></i>科学上网<span class="sub-category">
                <a href="#kexue" class="current notop">所有</a> | <a href="#fanqiang" class="notop">科学上网</a>| <a href="#google" class="notop">谷歌镜像</a>| <a href="#daili" class="notop">免费代理</a>| <a href="#ss" class="notop">免费SS账号</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.ccav1.me/chromegae.html" target="_blank" rel="nofollow">ChromeGAE</a> <p>Yanu分享的科学上网</p> </li>
                <li> <a href="http://browser.ccavhd.com/chromegae.html" target="_blank" rel="nofollow">360ChromeGAE 1.1</a> <p>Yanu分享的科学上网</p> </li>
                <li> <a href="http://www.jubushoushen.com/" target="_blank" rel="nofollow">菊部受审</a> <p>科学上网博客</p> </li>
                <li> <a href="https://gochrome.info/" target="_blank" rel="nofollow">Chrome资源</a> <p>致力于免费科学上网</p> </li>
                <li> <a href="http://wsgzao.github.io/post/fq/" target="_blank" rel="nofollow">GFW翻墙小结</a> <p>免费和付费的GFW翻墙方案小结。</p> </li>
                <li> <a href="http://www.dou-bi.com/" target="_blank" rel="nofollow">逗比根据地</a> <p>世界那么逗，我想出去看看</p> </li>
                <li> <a href="http://note.youdao.com/share/web/file.html?id=74003c3aa45df69f93201424624f0a1c&type=note" target="_blank" rel="nofollow" class="shanchu">加速度</a> <p>高质量的极速稳定代理，1元试用一个月</p> </li>
                <li> <a href="https://niuxss.com/" target="_blank" rel="nofollow" class="noframe">牛叉网络加速服务</a> <p>一种全新上网体验，带您走进不一样的世界！</p> </li>
                <li> <a href="http://fazero.cc/archives/584" target="_blank" rel="nofollow">蓝灯Lantern</a> <p>免费，速度快，支持windows，Ubuntu，Mac三平台，安装配置简单</p> </li>
                <li> <a href="https://www.tizipuss.com/" target="_blank" rel="nofollow" class="noframe">梯子铺</a> <p>世界那么大，还不去看看</p> </li>
                <li> <a href="https://www.feiyulian.cn/aff.php?aff=294" target="_blank" rel="nofollow" class="noframe">飞鱼链</a> <p>高强度加密传输、智能路由、跨平台、支持移动客户端</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="google">
            <i class="icon-unlock-alt"></i>谷歌镜像
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.itechzero.com/google-mirror-sites-collect.html" target="_blank" rel="nofollow">Google镜像站搜集 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>某博主搜集的Google镜像站，数量很多</p> </li>
                <li> <a href="http://g.bt.gg/" target="_blank" rel="nofollow" class="noframe">g.bt.gg</a> <p>google中文原版搜索镜像</p> </li>
                <li><a href="https://www.tulingss.com/" target="_blank" rel="nofollow">图灵搜索</a> <p>中国第一个专为程序员打造的搜索引擎</p> </li>
                <li><a href="http://www.googto.com/" target="_blank" rel="nofollow">Googto搜索</a> <p>Googto 构图搜索致力于提供最佳的搜索体验，所有搜索结果均来自互联网。</p> </li>
                <li><a href="http://www.wesou.org/" target="_blank" rel="nofollow">微搜索</a> <p>最好用的技术资料搜索引擎</p> </li>
                <li><a href="http://www.scholarnet.cn/" target="_blank" rel="nofollow">学术网</a> <p>专注于科学科研工作者</p> </li>
                <li><a href="http://www.gugesou.cn/" target="_blank" rel="nofollow">谷歌搜</a> <p>谷歌搜索引擎镜像</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="daili">
            <i class="icon-unlock-alt"></i>免费代理
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.fengherili.xyz/#y" target="_blank" rel="nofollow" class="shanchu">（代理）风和日丽</a> <p>免费代理</p> </li>
                <li> <a href="http://www.fengherili.xyz/#a" target="_blank" rel="nofollow" class="shanchu">AA代理</a> <p>免费代理</p> </li>
                <li> <a href="http://www.fengherili.xyz/#p" target="_blank" rel="nofollow" class="shanchu">PP代理</a> <p>免费代理</p> </li>
                <li> <a href="http://www.hibenben.com/502.html" target="_blank" rel="nofollow">今日IP代理</a> <p>提供今日IP代理使用教程及下载</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ss">
            <i class="icon-unlock-alt"></i>免费SS账号
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.shadowsocks.asia/mianfei/10.html" target="_blank" rel="nofollow">shadowsocks中文社区</a> <p>免费shadowsocks账号分享（ss账号/影梭账号）</p> </li>
                <li> <a href="https://1.aiguge.xyz/shadowsocks" target="_blank" rel="nofollow">ChromeWo</a> <p>ChromeWo共享小飞机（免费shadowsocks账号）</p> </li>
                <li> <a href="http://shadowsocks.info/category/shadowsocks-zhanghao/" target="_blank" rel="nofollow">shadowsocks.info</a> <p>shadowsocks账号分享</p> </li>
                <li> <a href="http://www.ishadowsocks.com/" target="_blank" rel="nofollow">ishadowsocks</a> <p>长期更新免费shadowsocks账号，提供科学上网教程</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="xunlei">
            <i class="icon-unlock-alt"></i>免费迅雷会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://pan.baidu.com/s/1dDwNXSl" target="_blank" rel="nofollow">迅雷防踢版</a> <p>迅雷多用户登录，防止账号冲突被踢</p> </li>
                <li><a href="http://www.vipfenxiang.com/xunlei/" target="_blank" rel="nofollow">vip分享网</a> <p>每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号</p> </li>
                <li><a href="http://www.ffaner.com/category/xunlei" target="_blank" rel="nofollow">飞凡vip</a> <p>每10分钟更新一次，为网友提供高质量的会员帐号服务！</p> </li>
                <li><a href="http://vip.ihuan.me/xl.html" target="_blank" rel="nofollow">vip会员账号分享</a> <p>自动搜集网络免费共享发布的迅雷黄金会员账号、爱奇艺会员账号</p> </li>
                <li><a href="http://www.xunleifxw.com/category/vip" target="_blank" rel="nofollow">迅雷分享屋</a> <p>每天定时定量分享迅雷账号，我们更专业</p> </li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=1" target="_blank" rel="nofollow">vip部落</a> <p>迅雷vip账号分享 每天更新</p> </li>
                <li><a href="http://www.zmsq.com/category/yunbo" target="_blank" rel="nofollow">织梦社区</a> <p>迅雷会员账号分享-迅雷白金会员账号分享 </p> </li>
                <li><a href="http://www.521xunlei.com/forum-xunleihuiyuan-1.html" target="_blank" rel="nofollow">爱密码</a> <p>专业的24小时迅雷会员账号共享平台，每日更新大量迅雷会员账号密码</p> </li> 
                <li><a href="http://www.uevip.cn/article_list/xunlei" target="_blank" rel="nofollow">优易体验馆</a> <p>每天分享迅雷会员账号，整理大量迅雷vip共享账号</p> </li>
                <li><a href="http://www.aiqiyivip.com/forum-38-1.html" target="_blank" rel="nofollow">乐享网</a> <p>迅雷会员账号分享,迅雷7会员账号分享</p> </li>
                <li><a href="http://www.xunwangba.com/forum-49-1.html" target="_blank" rel="nofollow">迅网吧</a> <p>官方整理迅雷vip账号共享每天更新迅雷账号共享</p> </li>
                <li><a href="http://www.fenxs.com/" target="_blank" rel="nofollow">分享社</a> <p>每天定时更新迅雷白金企业钻石会员帐号</p> </li>
                <li><a href="http://www.laobinggun.com/forum-37-1.html" target="_blank" rel="nofollow">老冰棍论坛</a> <p>官方每天共享迅雷白金会员</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="aiqiyi">
            <i class="icon-unlock-alt"></i>免费爱奇艺会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://vip.ihuan.me/iqiyi.html" target="_blank" rel="nofollow">vip会员账号分享</a> <p>自动搜集网络免费共享发布的爱奇艺黄金会员账号、爱奇艺会员账号</p> </li>
                <li><a href="http://www.600zh.com/" target="_blank" rel="nofollow">600zh</a> <p>爱奇艺会员账号共享_爱奇艺vip账号共享_每小时更新</p> </li>
                <li><a href="http://www.ffaner.com/category/iqiyi" target="_blank" rel="nofollow">飞凡vip</a> <p>每10分钟更新一次，为网友提供高质量的会员帐号服务！</p> </li>
                <li><a href="http://www.zhanghao.cc/aiqiyihuiyuanzhanghao.html" target="_blank" rel="nofollow">帐号网</a> <p>免费提供迅雷会员，优酷会员，爱奇艺会员，pps会员，每天不定时更新</p> </li>
                <li><a href="http://www.mdouvip.com/aiqiyi" target="_blank" rel="nofollow">麦豆vip分享网</a> <p>长期共享爱奇艺会员账号，更新最及时，爱奇艺会员账号数量最多！</p> </li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=2" target="_blank" rel="nofollow">vip部落</a> <p>专注分享各种会员账号</p> </li>
                <li><a href="http://www.uevip.cn/article_list/iqiyi" target="_blank" rel="nofollow">优易体验馆</a> <p>提供网络会员免费体验</p> </li>
                <li><a href="http://www.vipfenxiang.com/iqiyi/" target="_blank" rel="nofollow">vip分享网</a> <p>每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号</p> </li>
                <li><a href="http://www.aiqiyivip.com/forum-2-1.html" target="_blank" rel="nofollow">乐享网</a> <p>爱奇艺会员账号共享,24小时更新爱奇艺会员账号</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="youku">
            <i class="icon-unlock-alt"></i>免费优酷会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.ffaner.com/category/youku" target="_blank" rel="nofollow">飞凡vip</a> <p>每10分钟更新一次，为网友提供高质量的会员帐号服务！</p> </li>
                <li><a href="http://vip.ihuan.me/youku.html" target="_blank" rel="nofollow">vip会员账号分享</a> <p>自动搜集网络免费共享发布的优酷vip会员账号</p> </li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=3" target="_blank" rel="nofollow">vip部落</a> <p>专注分享各种会员账号</p> </li>
                <li><a href="http://www.vipfenxiang.com/youku/" target="_blank" rel="nofollow">vip分享网</a> <p>每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号</p> </li>
                <li><a href="http://www.mdouvip.com/youku" target="_blank" rel="nofollow">麦豆vip分享网</a> <p>长期共享优酷会员账号，更新及时</p> </li>
                <li><a href="http://yk.aiqiyivip.com/" target="_blank" rel="nofollow">乐享网</a> <p>会员账号共享区，24小时更新优酷会员账号</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="yingshi">
        <h1 class="lefttitle">影视资源</h1>
        <h2 class="nav-title" id="gaoqing">
            <i class="icon-play-sign"></i>高清大片<span class="sub-category">
                <a href="#yingshi" class="current notop">所有</a> | <a href="#gaoqing" class="notop">高清大片</a> | <a href="#btys" class="notop">BT影视</a>| <a href="#watch" class="notop">在线影院</a>| <a href="#danmu" class="notop">弹幕直播</a>| <a href="#jilupian" class="notop">纪录片</a>| <a href="#dongman" class="notop">动漫</a>| <a href="#zimu" class="notop">字幕</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://edmag.net/" target="_blank" rel="nofollow">EDMAG</a> <p>更新超快的影视资源网站，提供磁力链接和电驴下载</p> </li>
                <li> <a href="http://www.mp4ba.com" target="_blank" rel="nofollow">高清Mp4吧 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>专业的高清mp4影视资源发布网站。</p> </li>
                <li> <a href="http://www.id97.com/" target="_blank" rel="nofollow">97电影网</a> <p>分享最新电影的网站，你可以在这里免费下载最新电影、经典大片。</p> </li>
                <li> <a href="http://www.dysfz.net/" target="_blank" rel="nofollow">电影首发站</a> <p>国内最优秀的高清电影下载网站，每天更新迅雷电影下载</p> </li>
                <li> <a href="http://www.loldytt.com/" target="_blank" rel="nofollow">LOL电影天堂</a> <p>为广大网友提供最新电影下载、迅雷电影下载、高清电影BT种子下载</p> </li>
                <li> <a href="http://www.xiamp4.com/" target="_blank" rel="nofollow">迅播影院</a> <p>提供最新最快电影资讯，迅雷看看电影点播以及迅雷电影下载</p> </li>
                <li> <a href="http://www.66ys.tv/" target="_blank" rel="nofollow">66影视</a> <p>每天搜集最新电影。为使用迅雷7软件的用户提供最新的电影下载</p> </li>
                <li> <a href="http://www.lbldy.com/" target="_blank" rel="nofollow">龙部落</a> <p>拥有最全的最新电影下载,电视,动漫,综艺,纪录片等迅雷下载资源</p> </li>
                <li> <a href="http://www.nb40.com/" target="_blank" rel="nofollow">牛B四十</a> <p>集热门电影在线播放优酷电影特权播放迅雷下载与电驴</p> </li>
                <li> <a href="http://www.8gdyhd.com/" target="_blank" rel="nofollow">八哥电影</a> <p>最干净的免费电影网,给你更方便的视频门户网站体验</p> </li>
                <li> <a href="http://www.dygang.com/" target="_blank" rel="nofollow">电影港</a> <p>每天搜集最新的电影，高清电影</p> </li>
                <li> <a href="http://www.btchina.us/" target="_blank" rel="nofollow">电影联盟</a> <p>提供最新的电影介绍及评论包括上映影片的影讯</p> </li>
                <li> <a href="http://www.dytt8.net/" target="_blank" rel="nofollow">电影天堂①</a> <p>最好的迅雷电影下载网，分享最新电影</p> </li>
                <li> <a href="http://www.dy2018.com/" target="_blank" rel="nofollow">电影天堂②</a> <p>最好的迅雷电影下载网，分享最新电影</p> </li>
                <li> <a href="http://www.zxysz.com/" target="_blank" rel="nofollow">最新影视站</a> <p>追踪最新最清晰的电影电视剧资源,网罗最新网络影视资源</p> </li>
                <li> <a href="http://www.kneng.net/" target="_blank" rel="nofollow">可能影视</a> <p>专注于最新影视BT</p> </li>
                <li> <a href="http://movie002.com/" target="_blank" rel="nofollow">电影小二</a> <p>影视导航网站，提供电影大全、电视剧大全等影视大全。</p> </li>
                <li> <a href="http://www.ttmeiju.com/" target="_blank" rel="nofollow">天天美剧</a> <p>第一时间为您提供最火最新的高清美剧片源下载。</p> </li>
                <li> <a href="http://www.yugaopian.com/" target="_blank" rel="nofollow">预告片世界</a> <p>提供最新、最热门的高清电影预告片、电影花絮</p> </li>
                <li> <a href="http://www.gaoqingkong.com/" target="_blank" rel="nofollow">高清控联盟</a> <p>热衷于高清发烧，每日关注高清影视。</p> </li>
                <li> <a href="http://www.lanyingwang.com/" target="_blank" rel="nofollow">蓝影网</a> <p>高清种子下载网站</p> </li>
                <li> <a href="http://www.yinfans.com/" target="_blank" rel="nofollow">音范丝</a> <p>高清蓝光电影资源的精选网站，分享顶级蓝光原盘下载资源</p> </li>
                <li> <a href="http://gaoqing.la/" target="_blank" rel="nofollow">中国高清网</a> <p>每天关注提供720p高清、1080p高清、蓝光原盘高清</p> </li>
                <li> <a href="http://www.i1080.cn/" target="_blank" rel="nofollow">艾米电影网</a> <p>提供720P高清、1080P超清、蓝光原盘、3D高清、IMAX巨幕高清电影</p> </li>
                <li> <a href="http://www.hd1080.cn/" target="_blank" rel="nofollow">蓝光电影网</a> <p>每日提供最新蓝光高清电影、蓝光高清原盘、720p高清、1080p高清</p> </li>
                <li> <a href="http://www.rs05.com/" target="_blank" rel="nofollow">人生05电影</a> <p>高清电影下载网站，每天更新迅雷电影下载</p> </li>
                <li> <a href="http://www.cangyunge.com/" target="_blank" rel="nofollow">藏云阁高清网</a> <p>提供1080P高清电影下载，720P高清电影下载</p> </li>
                <li> <a href="http://www.moviewg.com/" target="_blank" rel="nofollow">电影王国</a> <p>提供最新最热门的国内外HD电影资源下载分享</p> </li>
                <li> <a href="http://www.youzhidy.com/" target="_blank" rel="nofollow">优质电影网</a> <p>1080P高清电影下载、蓝光原盘高清电影下载、迅雷高清电影下载</p> </li>
                <li> <a href="http://www.liangzijie.com" target="_blank" rel="nofollow">量子界</a> <p>经典电影完美超清珍藏网，提供高清电影迅雷下载</p> </li>
                <li> <a href="http://www.hdwan.net" target="_blank" rel="nofollow">海盗湾</a> <p>提供最新的720P、1080P高清电影BT种子下载</p> </li>
                <li> <a href="http://www.xiagaoqing.com" target="_blank" rel="nofollow">下高清电影网</a> <p>分享3D，蓝光超清，1080P超清，720P高清影视</p> </li>
                <li> <a href="http://www.iidvd.com/" target="_blank" rel="nofollow">iiDVD</a> <p>提供最新电影电视剧及好看的节目在线观看及视频下载</p> </li>
                <li> <a href="http://www.bubuqing.com/" target="_blank" rel="nofollow">步步情</a> <p>最新电视剧,最新电影免费下载</p> </li>
                <li> <a href="http://www.m1910.com/" target="_blank" rel="nofollow">经典电影网</a> <p>只收录经典影片</p> </li>
                <li> <a href="http://www.beiwo.tv/" target="_blank" rel="nofollow" class="noframe">被窝电影</a> <p>为用户提供近千部正版免费在线点播影片</p> </li>
                <li> <a href="http://www.gagays.com/" target="_blank" rel="nofollow">嘎嘎影视</a> <p>一个非常牛逼的电影资源下载站</p> </li>
                <li> <a href="http://www.80s.tw/" target="_blank" rel="nofollow">80s手机电影</a> <p>最新MP4手机电影下载</p> </li>
                <li> <a href="http://www.58keke.com/" target="_blank" rel="nofollow">壳壳影吧</a> <p>电影资源搬运工</p> </li>
                <li> <a href="http://www.6vhao.com/" target="_blank" rel="nofollow">6V电影网</a> <p>日剧.韩剧连载免费下载</p> </li>
                <li> <a href="http://www.aikanmeiju.com/" target="_blank" rel="nofollow">爱看美剧网</a> <p>提供最新的美剧下载观看</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="btys">
            <i class="icon-play-sign"></i>BT影视
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.rarbt.com/" target="_blank" rel="nofollow">RARBT种子</a> <p>超全1080p高清电影BT种子下载,更新快</p> </li>
                <li> <a href="http://www.bttiantang.com" target="_blank" rel="nofollow">BT天堂</a> <p>提供：1080p高清电影BT种子下载,720p高清电影BT种子下载</p> </li>
                <li> <a href="http://www.btago.com/" target="_blank" rel="nofollow">BTago</a> <p>资源搜索汇聚平台</p> </li>
                <li> <a href="http://www.btbbt.cc/" target="_blank" rel="nofollow">BT之家</a> <p>最快提供最新最全高清电影、动漫、韩剧、美剧等BT迅雷下载以及资讯</p> </li>
                <li> <a href="http://moviejie.com" target="_blank" rel="nofollow">电影街</a> <p>最新最全的高清电影和美剧下载</p> </li>
                <li> <a href="http://cili008.com" target="_blank" rel="nofollow">MAG磁力</a> <p>提供最新最快的美剧、电影、韩剧、日剧资源的下载站</p> </li>
                <li> <a href="http://www.btbtw.com/sort-1-1.html" target="_blank" rel="nofollow">BTBTW</a> <p>bt种子下载站,磁力链接下载站</p> </li>
                <li> <a href="http://www.btbbt.org" target="_blank" rel="nofollow">BTBBT</a> <p>专注高质量种子下载服务</p> </li>
                <li> <a href="http://www.etdown.net" target="_blank" rel="nofollow">光影资源联盟</a> <p>提供最新最全的高清影视下载的资源平台</p> </li>
                <li> <a href="https://kat.cr/" target="_blank" rel="nofollow">Kickass</a> <p>国外资源站</p> </li>
                <li> <a href="https://rarbg.to/torrents.php" target="_blank" rel="nofollow">Rarbg</a> <p>国外资源站</p> </li>
                <li> <a href="http://www.xiaohx.net/" target="_blank" rel="nofollow">小浣熊</a> <p>资源下载分享平台，免费提供最新最齐全高清电影</p> </li>
                <li> <a href="http://www.ed2000.com/Type/%E7%94%B5%E5%BD%B1" target="_blank" rel="nofollow">ED2000资源影视</a> <p>ED2000为您提供最新综艺、动漫、音乐、游戏、图书、软件、资料、教育等各类资源。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="watch">
            <i class="icon-play-sign"></i>在线影院
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.miaoplayer.com/" target="_blank" rel="nofollow">秒播影音</a> <p>免费高清在线播放播放器，支持磁力链接和种子文件</p> </li>
                <li> <a href="http://www.hplayer.cf/" target="_blank" rel="nofollow">Hplayer磁力链播放器</a> <p>一款支持磁力链接和种子的在线播放器</p> </li>
                <li> <a href="http://www.btzhai.cc" target="_blank" rel="nofollow">BT宅云播放器</a> <p>磁力链在线播放器</p> </li>
                <li> <a href="http://www.8eoe.com/category/dianying" target="_blank" rel="nofollow">酷客在线电影</a> <p>未上映以及收费电影在线免费看，无需下载</p> </li>
                <li> <a href="http://www.7mang.com/" target="_blank" rel="nofollow">七芒网</a> <p>在线去广告看视频</p> </li>
                <li> <a href="http://www.jxvdy.com" target="_blank" rel="nofollow">金象微电影</a> <p>涵盖资源分享、教学、交易、海选的微电影一站式服务平台</p> </li>
                <li> <a href="http://www.vmovier.com/" target="_blank" rel="nofollow">V电影</a> <p>国内最大的短片分享平台,汇集优秀视频短片及微电影创作人</p> </li>
                <li> <a href="http://www.xinpianchang.com/" target="_blank" rel="nofollow">新片场</a> <p>新片场_最大的互联网影视出品发行平台</p> </li>
                <li> <a href="http://www.197c.com/" target="_blank" rel="nofollow">爱微电影</a> <p>在线看微电影</p> </li>
                <li> <a href="http://www.1905.com/" target="_blank" rel="nofollow">1905电影网</a> <p>电影频道官方网站</p> </li>
                <li> <a href="http://k8yy.com/" target="_blank" rel="nofollow">K8影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://www.u9qq.com/" target="_blank" rel="nofollow">首席影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://www.b7yy.com/" target="_blank" rel="nofollow">首播影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://www.yy6090.org/" target="_blank" rel="nofollow">青苹果影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://92yy.cc/" target="_blank" rel="nofollow">小收影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://www.9wyy.com/" target="_blank" rel="nofollow">9万影院</a> <p>免费在线观看各类电影</p> </li>
                <li> <a href="http://www.djhuo.com/" target="_blank" rel="nofollow">DJ火影</a> <p>最新最火的视频短片,电影,电视剧在线无广告收看</p> </li>
                <li> <a href="http://www.lalilali.com/" target="_blank" rel="nofollow">啦哩拉哩电影网</a> <p>提供在线播放及电影下载</p> </li>
                <li> <a href="http://www.kan8090.com/" target="_blank" rel="nofollow">8090电影</a> <p>提供全能免费在线播放电影网站</p> </li>
                <li> <a href="http://www.xiaoztv.com/" target="_blank" rel="nofollow">小ZTV</a> <p>手机电脑在线播放最新最好看的热映电影、电视剧、以及各种恐怖片</p> </li>
                <li> <a href="http://www.gua5.com/" target="_blank" rel="nofollow">瓜小影</a> <p>好看的电影排行榜 - 手机电影推荐第一站！</p> </li>
                <li> <a href="http://www.jinzidu.com/" target="_blank" rel="nofollow">免费手机影院</a> <p>仅支持手机在线看电影，电脑请用手机浏览器观看</p> </li>
                <li> <a href="http://www.y3600.com/" target="_blank" rel="nofollow">热播韩剧网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>支持手机、电脑在线观看热播韩剧、热播日剧</p> </li>
                <li> <a href="http://www.ppypp.cc/" target="_blank" rel="nofollow">PPYPP影院</a> <p>一个不用下载播放器首发电影网站</p> </li>
                <li> <a href="http://www.meiyouad.com/" target="_blank" rel="nofollow">MeiYouAd</a> <p>全网VIP视频免费观看</p> </li>
                <li> <a href="http://www.id97.com/" target="_blank" rel="nofollow">PVideos</a> <p>部分电影在线观看</p> </li>
                <li> <a href="http://www.tzmp4.com/" target="_blank" rel="nofollow">桃子影视</a> <p>电脑、手机电影在线观看</p> </li>
                <li> <a href="http://www.8haohao.com/" target="_blank" rel="nofollow">8号影院</a> <p>免费高清电影,电视剧在线观看</p> </li>
                <li> <a href="http://www.949d.com/" target="_blank" rel="nofollow">949电影网</a> <p>最干净的免费电影网,给你更方便的视频门户网站体验,我们一起畅享高清无广告最新电影电视剧</p> </li>
                <li> <a href="http://www.yingshidaquan.cc/" target="_blank" rel="nofollow">影视大全</a> <p>提供电影点播、迅雷下载，同时提供各大视频网站视频无广告在线云点播</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div><!-- 分隔线 -->
        <h2 class="nav-title" id="danmu">
            <i class="icon-play-sign"></i>弹幕直播
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.acfun.tv/" target="_blank" rel="nofollow">AcFun（A站）</a> <p>AcFun是一家弹幕视频网站，致力于为每一个人带来欢乐</p> </li>
                <li> <a href="http://www.bilibili.com" target="_blank" rel="nofollow">哔哩哔哩（B站）</a> <p>新鲜有趣的动画、游戏相关的弹幕视频分享网站</p> </li>
                <li> <a href="http://www.danmu.com/" target="_blank" rel="nofollow">D站</a> <p>danmu弹幕主义网</p> </li>
                <li> <a href="http://www.missevan.com/" target="_blank" rel="nofollow">M站</a> <p>M站是第一家弹幕音图站,同时也是中国声优基地</p> </li>
                <li> <a href="http://www.idanmu.com/" target="_blank" rel="nofollow">爱弹幕</a> <p>ACG弹幕视频以及二次元资源互动分享平台</p> </li>
                <li> <a href="http://thvideo.tv/" target="_blank" rel="nofollow">THvideo</a> <p>东方Project专门弹幕视频网站</p> </li>
                <li> <a href="http://www.qiaoba.tv/" target="_blank" rel="nofollow">瞧吧</a> <p>专注优质创意短片分享，做更有质量的视频</p> </li>
                <li> <a href="http://danmu.tudou.com/" target="_blank" rel="nofollow">土豆弹幕</a> <p>土豆视频官方弹幕网</p> </li>
                <li> <a href="http://www.5moe.com/" target="_blank" rel="nofollow">我盟</a> <p>5moe弹幕网，原名dilili，嘀哩哩弹幕网，被广大网友称为d站</p> </li>
                <li> <a href="http://www.bilibilijj.com/" target="_blank" rel="nofollow">哔哩哔哩唧唧</a> <p>在这你可下载到对应AV号(B站视频编号)的视频(包括福利)、MP3和弹幕文件</p> </li>
                <li> <a href="http://www.douyutv.com/" target="_blank" rel="nofollow">斗鱼TV</a> <p>全民直播平台</p> </li>
                <li> <a href="http://www.zhanqi.tv/" target="_blank" rel="nofollow">战旗TV</a> <p>提供高清、流畅的视频直播和电子竞技游戏直播</p> </li>
                <li> <a href="http://www.huya.com/" target="_blank" rel="nofollow">虎牙直播</a> <p>中国领先的互动直播平台</p> </li>
                <li> <a href="http://www.panda.tv/" target="_blank" rel="nofollow">熊猫TV</a> <p>最娱乐的直播平台_PandaTV</p> </li>
                <li> <a href="http://www.longzhu.com/" target="_blank" rel="nofollow">龙珠直播</a> <p>第一游戏直播平台</p> </li>
                <li> <a href="http://www.huomaotv.cn/" target="_blank" rel="nofollow">火猫TV</a> <p>年轻人的直播社区</p> </li>
                <li> <a href="http://www.zhangyu.tv/" target="_blank" rel="nofollow">章鱼TV</a> <p>中国最大的原创体育直播平台</p> </li>
                <li> <a href="http://www.tiantian.tv/" target="_blank" rel="nofollow">天天直播</a> <p>努力做最好的体育直播吧</p> </li>
                <li> <a href="http://www.quanmin.tv/" target="_blank" rel="nofollow" class="noframe">全民TV</a> <p>开启全民直播时代</p> </li>
                <li> <a href="http://live.bilibili.com/" target="_blank" rel="nofollow">bilibili直播</a> <p>国内首家关注 ACG 直播的互动平台</p> </li>
                <li> <a href="http://jia.360.cn/pc/" target="_blank" rel="nofollow">水滴直播</a> <p>最火的视频直播真人生活秀平台</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="jilupian">
            <i class="icon-play-sign"></i>纪录片
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.jlpcn.net" target="_blank" rel="nofollow">纪录片天地</a> <p>提供探索频道、国家地理、BBC等最新纪录片资源下载</p> </li>
                <li> <a href="http://www.laojilu.com/" target="_blank" rel="nofollow">老记录</a> <p>中文字幕纪录片下载</p> </li>
                <li><a href="http://www.jiluniwo.cn/" target="_blank" rel="nofollow">记录你我</a><p>纪录片推荐/分享，本网站提供纪录片下载地址</p></li>
                <li><a href="http://jilupian.xzwyu.com/" target="_blank" rel="nofollow">行者物语</a><p>源于对自我及世界的探索而生，接纳智慧，惠及他者，在自由领地践行。</p></li>
                <li><a href="http://zheniuer.com/" target="_blank" rel="nofollow">这牛儿纪录片</a><p>自由与开放的纪录片数据库及1080P高清资源共享下载。纪录片，让生活更美好。</p></li>
                <li><a href="http://jishi.cntv.cn/" target="_blank" rel="nofollow">央视纪实</a><p>中国纪录片第一频道，最新、高清正版海量纪录片</p></li>
                <li><a href="http://www.iqiyi.com/jilupian/" target="_blank" rel="nofollow">爱奇艺纪录片</a><p>爱奇艺纪录片频道，集合最优秀的国内外高清正版纪录片资源。</p></li>
                <li><a href="http://jilupian.youku.com/" target="_blank" rel="nofollow">优酷纪录片</a><p>优酷视频服务平台,提供视频播放,视频发布,视频搜索,视频分享</p></li>
                <li><a href="http://jilupian.tudou.com/" target="_blank" rel="nofollow">土豆纪实</a><p>汇集大量高清优质影像资源，以青春活力的视角带你横跨古今，领略世间百态。</p></li>
                <li><a href="http://tv.sohu.com/documentary/" target="_blank" rel="nofollow">搜狐纪录片</a><p>中国成立最早，影响力最大的纪录片在线门户。</p></li>
                <li><a href="http://v.qq.com/doco/" target="_blank" rel="nofollow">腾讯纪录片</a><p>免费提供在线纪录片观看</p></li>
                <li><a href="http://v.ifeng.com/documentary/" target="_blank" rel="nofollow">凤凰纪录片</a><p>汇聚众多珍贵影像资源，互联网纪录片内容平台的领军者。</p></li>
                <li><a href="http://jilu.letv.com/" target="_blank" rel="nofollow">乐视纪录片</a><p>提供国内外最精彩的纪录片视频,打造最权威的纪录片视频平台。</p></li>
                <li><a href="http://www.bilibili.com/video/tech-popular-science-1.html" target="_blank" rel="nofollow">bilibili纪录</a><p>国内知名的视频弹幕网站，边看纪录片边聊天</p></li>
                <li><a href="http://v.163.com/jishi/" target="_blank" rel="nofollow">网易纪录片</a><p>纪录·影人·社会·焦点·文化·生活·军事·科技·自然·探险·人物·历史</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="dongman">
            <i class="icon-play-sign"></i>动漫
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.dilidili.com/" target="_blank" rel="nofollow">嘀哩嘀哩</a> <p>新作经典轮番推荐</p> </li>
                <li><a href="http://www.kisssub.org/" target="_blank" rel="nofollow">爱恋BT</a><p>爱恋字幕社官方BT分享站，动画～漫画～游戏～动漫音乐～片源（RAW）资源聚集地</p></li>
                <li><a href="http://d.dmm.hk/" target="_blank" rel="nofollow">卜卜酱动漫</a><p>免费高清动漫下载、日本动漫下载、动画下载</p></li>
                <li><a href="http://dmxz.zerodm.com/" target="_blank" rel="nofollow">zero动漫</a><p>免费高清动漫下载、日本动漫下载网站</p></li>
                <li><a href="http://dm1080p.com/" target="_blank" rel="nofollow">D动漫1080p</a><p>D动漫1080P | 高清动漫下载资料站</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zimu">
            <i class="icon-play-sign"></i>字幕
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.disanlou.org/hao.php" target="_blank" rel="nofollow">字幕组大全 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>电影字幕下载网站大全，字幕组大全</p> </li>
                <li> <a href="http://www.zimuzu.tv/" target="_blank" rel="nofollow">YYeTs字幕组</a> <p>集合最新海外影视剧下载,字幕下载的网站</p> </li>
                <li><a href="http://sub.makedie.me/" target="_blank" rel="nofollow">伪射手</a> <p>超全的在线字幕搜索下载网站，支持视频拖拽</p> </li>
                <li><a href="http://dbfansub.com/" target="_blank" rel="nofollow">电波字幕组</a> <p>超全的在线字幕搜索下载网站，支持视频拖拽</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="music2">
        <h1 class="lefttitle">音乐</h1>
        <h2 class="nav-title" id="tingge">
            <i class="icon-asterisk"></i>在线听歌<span class="sub-category">
                <a href="#music2" class="current notop">所有</a> | <a href="#tingge" class="notop">在线音乐</a>| <a href="#diantai" class="notop">在线电台</a>| <a href="#musicblog" class="notop">音乐博客</a> | <a href="#musicbbs" class="notop">音乐论坛</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.yinyuetai.com/" target="_blank" rel="nofollow" class="noframe">音悦台</a> <p>全球最大的高清MV网站，提供高品质音乐视频在线观看服务。</p> </li>
                <li> <a href="http://music.163.com/" target="_blank" rel="nofollow">网易云音乐</a> <p>网易云音乐是一款专注于发现与分享的音乐产品。</p> </li>
                <li> <a href="http://www.xiami.com/" target="_blank" rel="nofollow">虾米音乐</a> <p>阿里音乐旗下品牌</p> </li>
                <li> <a href="http://www.dongting.com/" target="_blank" rel="nofollow">天天动听</a> <p>知名音乐产品</p> </li>
                <li> <a href="http://music.baidu.com/" target="_blank" rel="nofollow">百度音乐</a> <p>百度旗下音乐产品</p> </li>
                <li> <a href="http://www.kugou.com/" target="_blank" rel="nofollow">酷狗音乐</a> <p>知名音乐品牌</p> </li>
                <li> <a href="http://y.qq.com/" target="_blank" rel="nofollow">QQ音乐</a> <p>腾讯旗下音乐产品</p> </li>
                <li> <a href="http://www.kuwo.cn/" target="_blank" rel="nofollow">酷我音乐</a> <p>知名音乐品牌</p> </li>
                <li> <a href="http://musicforprogramming.net" target="_blank" rel="nofollow">MusicForProgramming</a> <p>帮你专心工作的音乐网站，适合程序员编程时听</p> </li>
                <li> <a href="http://musicuu.com/search.html" target="_blank" rel="nofollow" class="shanchu">音乐间谍</a> <p>一个网站搞定所有音乐下载</p> </li>
                <li> <a href="http://www.bandari.net/" target="_blank" rel="nofollow">班得瑞全球网</a> <p>在线欣赏班得瑞世界名曲</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="diantai">
            <i class="icon-asterisk"></i>在线电台
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.qingting.fm/" target="_blank" rel="nofollow">蜻蜓fm</a> <p>广播电台在线收听</p> </li>
                <li> <a href="http://douban.fm/" target="_blank" rel="nofollow">豆瓣FM</a> <p>豆瓣旗下音乐产品</p> </li>
                <li> <a href="http://www.lizhi.fm/" target="_blank" rel="nofollow">荔枝FM</a> <p>国内FM</p> </li>
                <li> <a href="http://musicuu.com/" target="_blank" rel="nofollow">雅音FM</a> <p>唯美纯音乐精选，同时提供高品质MP3试听、搜索以及下载</p> </li>
                <li> <a href="http://www.hzou.net/" target="_blank" rel="nofollow">红嘴鸥音乐电台</a> <p>网友觉得很不错的电台</p> </li>
                <li> <a href="http://www.9ird.com/" target="_blank" rel="nofollow">麻雀电台</a> <p>专注于分享声音与文字，听别人的故事，找自己的影子</p> </li>
                <li> <a href="http://www.duole.fm/" target="_blank" rel="nofollow">多乐电台</a> <p>听你想听的，海量有声资源在线听，分类超全，应有尽有</p> </li>
                <li> <a href="http://www.fting.cc/" target="_blank" rel="nofollow">凡听电台</a> <p>凡听电台，为你而声</p> </li>
                <li> <a href="http://www.moofm.com/" target="_blank" rel="nofollow">陌声人</a> <p>凡听电台，为你而声</p> </li>
                <li> <a href="http://www.gnr.cn/" target="_blank" rel="nofollow">壁虎网络电台</a> <p>中国网络电台的先驱和创新先锋，伴随式网络语音(广播)服务</p> </li>
                <li> <a href="http://jia.fm/" target="_blank" rel="nofollow">假电台</a> <p>一堆儿逗比们，做了这么个特别严肃的事儿</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="musicblog">
            <i class="icon-asterisk"></i>音乐博客
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.yinyueke.net/" target="_blank" rel="nofollow">音乐客</a> <p>不错的音乐博客</p> </li>
                <li> <a href="http://www.luoo.net/" target="_blank" rel="nofollow">落网</a> <p>推荐国内外独立音乐的网站</p> </li>
                <li> <a href="http://manpin.net" target="_blank" rel="nofollow">慢品音乐</a> <p>小清新音乐网站，超级多好听的英文歌中文歌</p> </li>
                <li> <a href="http://www.52qingyin.cn/" target="_blank" rel="nofollow">清音陋屋</a> <p>纯音乐分享网站，以忧伤轻音乐为主，用耳聆听，用心感受</p> </li>
                <li> <a href="http://www.leavemealone.cn/music/" target="_blank" rel="nofollow">微时光音乐期刊</a> <p>来听听不一样的音乐，整理心情，重新出发吧</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="musicbbs">
            <i class="icon-asterisk"></i>音乐论坛
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.tingyuxuan.net/" target="_blank" rel="nofollow">听雨轩</a> <p>以原创文学和音乐分享为主的论坛，目前开设有网络电台，并将节目刻录成光盘与您分享 </p> </li>
                <li><a href="http://www.88liu.com/" target="_blank" rel="nofollow">88六社区</a> <p>为无损音乐发烧友提供无损音乐下载,内有APE等各类无损格式音乐下载。 </p> </li>
                <li><a href="http://bbs.musicool.cn/" target="_blank" rel="nofollow">炫音音乐论坛</a> <p>AAC音乐下载,推荐音质最好的M4A和WAV等无损音乐,炫音音乐论坛</p> </li>
                <li><a href="http://bbs.besgold.com/" target="_blank" rel="nofollow">百事高音乐论坛</a> <p>专业音乐社区，包括发烧音乐,古典音乐,新世纪音乐,流行歌曲,轻音乐,摇滚,爵士,民乐,DJ </p> </li>
                <li><a href="http://www.zasv.com/" target="_blank" rel="nofollow">杂碎音乐论坛</a> <p>高品质音乐论坛,耳机发烧友论坛</p> </li>
                <li><a href="http://www.pt80.net/" target="_blank" rel="nofollow">捌零音乐论坛</a> <p>专业发烧音乐试听,无损音乐,最新专辑,发烧器材评测</p> </li>
                <li><a href="http://www.cdbao.net/" target="_blank" rel="nofollow">CD包音乐网</a> <p>专业的无损音乐分享论坛，分享高音质无损音乐免费下载。 </p> </li>
                <li><a href="http://www.mixrnb.com/" target="_blank" rel="nofollow">MixRNB</a> <p>MixRNB -  Enjoy Your Life !</p> </li>
                <li><a href="http://www.zhiaimusic.com/" target="_blank" rel="nofollow">至爱音乐论坛</a> <p>聆听音乐 感悟生活</p> </li>
                <li><a href="http://www.oppsu.cn/" target="_blank" rel="nofollow">OppsU</a> <p>音乐世界是一个免费向音乐迷们提供音乐交互分享的平台。同时也是苹果迷们一起学习探讨的专业论坛。</p> </li>
                <li><a href="http://www.breezee.org/" target="_blank" rel="nofollow">清风音乐论坛</a> <p>以音乐评论和交流为主的，最宁静、温馨的心灵港湾！ </p> </li>
                <li><a href="http://micool.xclub.tw/" target="_blank" rel="nofollow">米酷音乐论坛</a> <p>全国最大的iTunes音乐论坛</p> </li>
                <li><a href="http://www.oolove.com/" target="_blank" rel="nofollow">真爱家园</a> <p>爱音乐 爱生活 爱自己 爱家园</p> </li>
                <li><a href="http://www.hcyy.org/" target="_blank" rel="nofollow">风云音乐谷</a> <p>无损音乐网,发烧音乐网,WAV音乐网,怀旧音乐网</p> </li>
                <li><a href="http://bbs.zzse.net/" target="_blank" rel="nofollow">极品社区</a> <p>无损音乐下载网站,高品质发烧试音音乐下载 </p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="picture">
        <h1 class="lefttitle">图片</h1>
        <h2 class="nav-title" id="photo">
            <i class="icon-android"></i>摄影<span class="sub-category">
                <a href="#ruanjian" class="current notop">所有</a> | <a href="#photo" class="notop">摄影</a>| <a href="#photography" class="notop">摄影师</a>| <a href="#goodpic" class="notop">美图</a> | <a href="#girl" class="notop">美女</a> | <a href="#desktop" class="notop">壁纸</a>           </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://tuchong.com" target="_blank" rel="nofollow">图虫网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>超赞的摄影交流分享社区，聚集优秀摄影师，可分享自己的作品</p> </li>
                <li> <a href="http://www.leica.org.cn/" target="_blank" rel="nofollow">Leica中文摄影杂志</a> <p>分享全球优秀Leica摄影作品</p> </li>
                <li> <a href="http://720yun.com/" target="_blank" rel="nofollow">720云</a> <p>360度全景摄影作品分享，带给你不一样的视觉冲击</p> </li>
                <li> <a href="http://tpway.com/" target="_blank" rel="nofollow">糖皮网</a> <p>免费玩灯摄影教程分享，闪光灯爱好者必看摄影网站</p> </li>
                <li> <a href="http://500px.com/" target="_blank" rel="nofollow" class="noframe">500px</a> <p>致力于摄影分享、发现、售卖的专业平台</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="photography">
            <i class="icon-android"></i>摄影师
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.next-image.com.cn/" target="_blank" rel="nofollow">庄扬帆 （星岚映像）</a> <p>全中国第一个用哈苏拍婚礼的摄影师，随便看看就得了，太毒</p> </li>
                <li> <a href="http://www.zhangxiaoyi.com/" target="_blank" rel="nofollow">张小翼</a> <p>张小翼婚礼视觉</p> </li>
                <li> <a href="http://www.pooma.cn/" target="_blank" rel="nofollow">卜马工作室</a> <p>卜马工作室</p> </li>
                <li> <a href="http://www.leonwongphoto.com/" target="_blank" rel="nofollow">黄亮</a> <p>纪实婚礼摄影师，家庭摄影师</p> </li>
                <li> <a href="http://www.kedaz.com/" target="_blank" rel="nofollow">Keda.Z</a> <p>Keda.Z Photography</p> </li>
                <li> <a href="https://500px.com/karinakiel" target="_blank" rel="nofollow" class="noframe">Karina Kiel</a> <p>Karina Kiel</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="goodpic">
            <i class="icon-android"></i>美图
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://huaban.com/" target="_blank" rel="nofollow">花瓣网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>国内最优质图片灵感库</p> </li>
                <li> <a href="http://tu.duowan.com/" target="_blank" rel="nofollow">多玩图库</a> <p>游戏图片网站，为玩家提供各类游戏好看的图片、非主流图片，搞笑图片等</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="girl">
            <i class="icon-android"></i>美女
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.59pic.com/" target="_blank" rel="nofollow">59pic美女图片 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>图片分类清晰，让您一目了然找到喜欢的美女图片。</p> </li>
                <li> <a href="http://www.ugirls.com/" target="_blank" rel="nofollow">尤果网</a> <p>致力于拍摄如水果般新鲜欲滴的性感尤物</p> </li>
                <li> <a href="http://xiuren.com/" target="_blank" rel="nofollow">秀人网</a> <p>致力于模特写真以及模特周边相关产业的社会化互动平台</p> </li>
                <li> <a href="http://huaban.com/favorite/beauty" target="_blank" rel="nofollow">花瓣美女</a> <p>花瓣网美女频道</p> </li>
                <li> <a href="http://huaban.com/boards/16834118/" target="_blank" rel="nofollow">动态尤物</a> <p>花瓣网动态美女</p> </li>
                <li> <a href="http://www.tuigirl.com/" target="_blank" rel="nofollow">推女郎</a> <p>艺术摄影写真</p> </li>
                <li> <a href="http://www.moko.cc/" target="_blank" rel="nofollow">美空网</a> <p>中国最大的互联网娱乐人才供应商</p> </li>
                <li> <a href="http://www.umei.cc/" target="_blank" rel="nofollow">优美高清</a> <p>为您推荐高清美图</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="desktop">
            <i class="icon-android"></i>壁纸
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://alpha.wallhaven.cc/" target="_blank" rel="nofollow">Wallhaven <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>国外精品高清壁纸分享</p> </li>
                <li> <a href="http://www.kdatu.com/category/hd-wallpaper/" target="_blank" rel="nofollow">看大图</a> <p>高清壁纸打包下载</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->

    </div>
    <!--.section-->
    <div class="section mtop" id="design">
        <h1 class="lefttitle">设计</h1>
        <h2 class="nav-title" id="fonts">
            <i class="icon-edit"></i>字体<span class="sub-category">
                <a href="#design" class="current notop">所有</a> | <a href="#fonts" class="notop">字体</a>| <a href="#2D" class="notop">平面设计</a>| <a href="#wechatedit" class="notop">微信排版</a>| <a href="#h5" class="notop">微信H5</a>| <a href="#resources" class="notop">资源下载</a>| <a href="#template" class="notop">网站模板</a>| <a href="#wordpress" class="notop">wordpress主题</a>| <a href="#ppt" class="notop">ppt模板</a>|| <a href="#AE" class="notop">视频素材</a>| <a href="#sounds" class="notop">音效素材</a>| <a href="#chuangyi" class="notop">创意设计</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.qiuziti.com/" target="_blank" rel="nofollow">求字体网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>上传图片或输入字体名称找字体。可识别中、英、日韩、书法等多种类字体。</p> </li>
                <li> <a href="http://www.fonts2u.com/" target="_blank" rel="nofollow">Fonts2u</a> <p>提供大量的免费字体。免费为Windows和Mac系统下载免费的字体。</p> </li>
                <li> <a href="http://www.zhaozi.cn/" target="_blank" rel="nofollow">找字网</a> <p>找字网提供大量中英文字体下载。</p> </li>
                <li> <a href="http://losttype.com/browse/" target="_blank" rel="nofollow">Lost Type</a> <p>英文字体设计网站，清新靓丽，令人赏心悦目。</p> </li>
                <li> <a href="http://www.fontsquirrel.com/" target="_blank" rel="nofollow">Fontsquirrel</a> <p>赞！专为设计师精心挑选的免费字体下载。</p> </li>
                <li> <a href="http://www.1001freefonts.com/" target="_blank" rel="nofollow">1001freefonts</a> <p>大量免费的创意英文字体下载，设计师必备。</p> </li>
                <li> <a href="http://www.fonts.com/" target="_blank" rel="nofollow">Fonts</a> <p>号称全球最大，质量最高的设计字体提供者。</p> </li>
                <li> <a href="http://www.homefont.cn/" target="_blank" rel="nofollow">字体之家</a> <p>包含17400多种有效字体下载,频道分类220个的专业字体下载站。</p> </li>
                <li> <a href="http://icomoon.io/app/" target="_blank" rel="nofollow">IcoMoon</a> <p>很强大很实用的图标字体网站，提供常用图标字体和图片下载。</p> </li>
                <li> <a href="http://www.myfonts.com/WhatTheFont/" target="_blank" rel="nofollow">Myfonts</a> <p>上传图片搜索英文字体 。功能强大，准确性高，值得拥有！</p> </li>
                <li><a href="http://www.diyiziti.com/" target="_blank" rel="nofollow">第一字体转换器</a> <p>提供最全的字体转换器在线转换、艺术字体在线生成器和字体下载</p> </li>
                <li><a href="http://font.knowsky.com/" target="_blank" rel="nofollow">字体下载大宝库</a> <p>中文字体、英文字体、广告字体、字体下载大全</p> </li>
                <li><a href="http://font.chinaz.com/" target="_blank" rel="nofollow">站长字体</a> <p>站长网字体库</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="2D">
            <i class="icon-edit"></i>平面设计
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.arting365.com/" target="_blank" rel="nofollow">Arting365</a> <p>中国最具影响力的创意门户网,集聚最有影响力创造力的专业创意设计人群</p> </li>
                <li> <a href="http://ux.etao.com/" target="_blank" rel="nofollow">一淘-UX</a> <p>一淘团队UX 体验工作平台——阿里巴巴一淘用户体验部门官方博客。</p> </li>
                <li> <a href="http://www.zcool.com.cn/" target="_blank" rel="nofollow">站酷</a> <p>国内最活跃的原创设计交流平台，聚集中国绝大部分的专业设计师年轻创意人群。</p> </li>
                <li> <a href="http://68design.net/" target="_blank" rel="nofollow">网页设计师联盟</a> <p>国内专业网页设计人才基地,为广大设计师提供学习交流空间。</p> </li>
                <li> <a href="http://sudasuta.com/" target="_blank" rel="nofollow">苏打苏塔</a> <p>关于创意设计，艺术摄影，灵感来源，平面设计欣赏的综合性网站。</p> </li>
                <li> <a href="http://www.uimaker.com/" target="_blank" rel="nofollow">UIMaker</a> <p>为UI设计师提供专业UI设计，教程及素材的网站。</p> </li>
                <li> <a href="http://www.sharelogo.cn/" target="_blank" rel="nofollow">晒标网</a> <p>logo设计欣赏，标志商标征集设计网设计网。</p> </li>
                <li> <a href="http://www.boxui.com/" target="_blank" rel="nofollow">盒子UI</a> <p>以用户体验为中心的设计，分享精彩的UI设计、交互设计。</p> </li>
                <li> <a href="http://medialoot.com/" target="_blank" rel="nofollow">Medialoot</a> <p>国外设计网站。收集大量模板图标及字体可供下载。</p> </li>
                <li> <a href="http://www.uiparade.com/" target="_blank" rel="nofollow">UIParade</a> <p>国外顶级UI设计，细节处理非常到位非常精彩。</p> </li>
                <li> <a href="http://www.sj520.cn/" target="_blank" rel="nofollow">520设计网</a> <p>最佳网页平面设计灵感画廊</p> </li>
                <li> <a href="https://www.chuangkit.com/" target="_blank" rel="nofollow">创客贴</a> <p>简单好用的在线平面设计工具</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="wechatedit">
            <i class="icon-edit"></i>微信排版
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.135editor.com/" target="_blank" rel="nofollow">135排版</a> <p>微信图文素材排版编辑器提供美化微信文章排版 </p> </li>
                <li> <a href="http://xiumi.us/" target="_blank" rel="nofollow">秀米</a> <p>图文排版_场景秀_图文秀_秀制作_H5_微信_公众号_图文消息_排版_助手</p> </li>
                <li> <a href="http://www.ipaiban.com/" target="_blank" rel="nofollow">i排版</a> <p>一款排版效率高、界面简洁、样式原创设计的微信排版工具，支持全文编辑，实时预览、一键样式、一键添加签名的微信图文编辑器</p> </li>
                <li> <a href="http://www.gorse.com/" target="_blank" rel="nofollow">构思</a> <p>融合了精美素材、图文排版、模板定制、版权图库搜索及图片编辑为一体的简单好用的编辑器</p> </li>
                <li> <a href="http://wxedit.yead.net/" target="_blank" rel="nofollow">易点</a> <p>专为微信小编量身定做的一款微信公众号内容排版神器，将以简洁的界面，精美的素材，强大的功能持续为几十万微信小编提供服务</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="h5">
            <i class="icon-edit"></i>微信H5
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.ichuye.cn/" target="_blank" rel="nofollow">初页</a> <p>最潮的音乐照片情感故事记录/表达工具 </p> </li>
                <li> <a href="http://jisuapp.cn/index.php?r=pc/Index/invitationTpl" target="_blank" rel="nofollow">咫尺网络</a> <p>微页制作，专属定制，与众不同的H5</p> </li>
                <li> <a href="http://www.rrxiu.net/" target="_blank" rel="nofollow">人人秀</a> <p>免费h5页面制作工具，3分钟制作微信html5微场景平台</p> </li>
                <li> <a href="http://maka.im/" target="_blank" rel="nofollow">『MAKA』官网</a> <p>简单、强大的免费H5页面、微场景制作平台</p> </li>
                <li> <a href="http://www.rabbitpre.com/" target="_blank" rel="nofollow">兔展</a> <p>让您像制作PPT一样制作炫酷的移动展示</p> </li>
                <li> <a href="http://www.eqxiu.com/" target="_blank" rel="nofollow">易企秀</a> <p>提供海量H5微场景模板,轻松制作一键生成H5页面</p> </li>
                <li> <a href="http://www.kuaizhan.com/homepage/haibao" target="_blank" rel="nofollow">搜狐快海报</a> <p>搜狐快站平台上全新推出的免费H5页面制作工具</p> </li>
                <li> <a href="http://www.bluemp.cn/" target="_blank" rel="nofollow">麦片BlueMP</a> <p>打造专属H5微网站|移动自助建站免费微官网微社区制作 </p> </li>
                <li> <a href="http://www.epub360.com/" target="_blank" rel="nofollow">意派360</a> <p>无需编程，在线设计专业级H5作品 </p> </li>
                <li> <a href="http://www.vxplo.cn/" target="_blank" rel="nofollow" class="noframe">Vxplo</a> <p>专注在线交互设计，功能强大，适合专业设计师 </p> </li>
                <li> <a href="http://www.zuiku.com/" target="_blank" rel="nofollow">最酷网</a> <p>免费H5场景应用制作和发布平台 </p> </li>
                <li> <a href="http://www.wix.com/" target="_blank" rel="nofollow" class="noframe">Wix</a> <p>基于H5技术，提供多种网页模板，操作简单无需代码，智能拖拽即可实现网页建设 </p> </li>
                <li> <a href="http://www.ih5.cn/" target="_blank" rel="nofollow">iH5</a> <p>专业H5工具&创作服务平台</p> </li>
                <li> <a href="http://echuandan.com/" target="_blank" rel="nofollow">易传单</a> <p>易传单是简单、强大的H5页面创作、分享、交易平台</p> </li>
                <li> <a href="http://www.70c.com/" target="_blank" rel="nofollow">70度</a> <p>70度，一个靠谱的移动广告服务平台</p> </li>
               
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="resources">
            <i class="icon-edit"></i>资源下载
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://pngimg.com/" target="_blank" rel="nofollow">透明素材</a> <p>国外大量png透明素材免费下载</p> </li>
                <li> <a href="http://www.psdchest.com/" target="_blank" rel="nofollow">PSDChest <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>国外大量精致UI元素设计的PSD源文件免费下载</p> </li>
                <li> <a href="http://www.nicepsd.com/" target="_blank" rel="nofollow">NicePSD</a> <p>精品PSD源文件免费下载</p> </li>
                <li> <a href="http://psefan.com/" target="_blank" rel="nofollow">ps饭团</a> <p>提供海量优质免费ps素材ps教程vip素材下载</p> </li>
                <li> <a href="http://www.mpdsj.com/" target="_blank" rel="nofollow">名片大世界</a> <p>国内外名片设计欣赏，制作技术图文教程，模板素材免费提供下载</p> </li>
                <li> <a href="http://ui-cloud.com/" target="_blank" rel="nofollow">UI-Cloud</a> <p>国外UI素材搜索引擎，提供大量PSD源文件免费搜索下载，设计师必备！</p> </li>
                <li> <a href="http://subtlepatterns.com/" target="_blank" rel="nofollow">Subtle Patterns</a> <p>国外高质量的无缝背景纹理免费下载站，值得推荐。</p> </li>
                <li> <a href="http://freebiesbooth.com/" target="_blank" rel="nofollow">Freebies Booth</a> <p>国外免费的设计素材下载，大量web设计资源及分层PSD下载站。</p> </li>
                <li> <a href="http://www.uiparade.com/" target="_blank" rel="nofollow">365PSD</a> <p>国外PSD素材免费下载网站。</p> </li>
                <li> <a href="http://www.easyicon.net/" target="_blank" rel="nofollow">EasyIcon</a> <p>图标搜索引擎（中英）</p> </li>
                <li> <a href="http://www.iconfont.cn/" target="_blank" rel="nofollow" class="noframe">阿里图标库</a> <p>阿里巴巴矢量图标库</p> </li>
                <li> <a href="http://www.zcool.com.cn/gfxs/" target="_blank" rel="nofollow">站酷素材</a> <p>站酷免费素材下载频道，提供网友分享素材供您免费下载</p> </li>
                <li> <a href="http://90sheji.com/" target="_blank" rel="nofollow">90设计</a> <p>专注电商精品素材免费下载</p> </li>
                <li> <a href="http://so.ui001.com/" target="_blank" rel="nofollow">搜素材</a> <p>设计素材搜索聚合</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="template">
            <i class="icon-edit"></i>网站模板
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">怪兽模板</a> <p>全球最大规模的网站模板销售网站，提供出自世界知名设计大师之手。</p> </li>
                <li> <a href="http://www.dreamtemplate.com" target="_blank" rel="nofollow">DreamTemplate</a> <p>国外超过7千套精美的网页模板, Flash模板下载。</p> </li>
                <li> <a href="http://www.4templates.com/" target="_blank" rel="nofollow">4Templates</a> <p>国外大量精美的Web模板站，虽说是收费但可以预览参考其设计。</p> </li>
                <li> <a href="http://themeforest.net/" target="_blank" rel="nofollow" class="noframe">Theme Forest</a> <p>欧美网页模板集合，大量精致的模板可供参考。</p> </li>
                <li> <a href="http://www.creattor.com/" target="_blank" rel="nofollow">Creattor <img src="../wp-content/themes/Loostrive/images/qiang.png"></a> <p>上千套国外华丽的网站模板免费下载。强烈推荐！</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="wordpress">
            <i class="icon-edit"></i>wordpress主题
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://themebetter.com/" target="_blank" rel="nofollow">ThemeBetter</a> <p>原创wordpress主题</p> </li>
                <li> <a href="https://www.iztwp.com/" target="_blank" rel="nofollow" class="noframe">爱主题</a> <p>专注于分享国内外优秀的WordPress主题，致力于为国内站长提供方便快捷的wordpress建站服务体验</p> </li>
                <li> <a href="http://ztmao.com/" target="_blank" rel="nofollow">主题猫</a> <p>wordpress中文主题站</p> </li>
                <li> <a href="http://www.themepark.com.cn/" target="_blank" rel="nofollow">web主题公园</a> <p>用心做最好的原创中文WordPress主题</p> </li>
                <li> <a href="http://www.zhutihome.com/" target="_blank" rel="nofollow">主题之家</a> <p>分享最新最全的WordPress主题</p> </li>
                <li> <a href="http://www.2zzt.com/" target="_blank" rel="nofollow">爱找主题</a> <p>WordPress主题模板</p> </li>
                <li> <a href="http://www.wpmee.com/" target="_blank" rel="nofollow">WP迷</a> <p>WordPress主题免费下载</p> </li>
                <li> <a href="https://www.mywpku.com/" target="_blank" rel="nofollow" class="noframe">WP酷</a> <p>最前沿的 WordPress 资源聚合平台</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ppt">
            <i class="icon-edit"></i>PPT模板
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.ypppt.com/" target="_blank" rel="nofollow">优品PPT</a> <p>专注于分享高质量的各类免费PPT资源的综合性网站</p> </li>
                <li><a href="http://www.tretars.com/" target="_blank" rel="nofollow">逼格ppt</a> <p>提供精美PPT制作素材下载</p> </li>
                <li><a href="http://www.officeplus.cn/" target="_blank" rel="nofollow">微软OfficePLUS</a> <p>微软Office官方在线模板网站,您职场和生活的加油站！</p> </li>
                <li><a href="http://www.pptfans.cn/" target="_blank" rel="nofollow">PPTfans</a> <p>以视频、图文教程为主的PPT教程应有尽有，助你PPT设计从入门到精通</p> </li>
                <li><a href="http://list.docer.com/PPT模板/" target="_blank" rel="nofollow">稻壳儿</a> <p提供海量热门的PPT模板、PPT图片素材下载，素材制作专业、精美、实用</p> </li>
                <li><a href="http://www.yanyijingling.com/" target="_blank" rel="nofollow">演绎精灵</a> <p>为广大PPT用户提供各类精美PPT模板、ppt教程、PowerPoint教程免费下载</p> </li>
                <li><a href="http://www.pptstore.net/ppt_moban/?opt=free" target="_blank" rel="nofollow">PPTstore</a> <p>提供大量免费PPT模板下载</p> </li>
                <li><a href="http://muzi.info/" target="_blank" rel="nofollow">MUZI木子</a> <p>关于PPT及演示的一切。PPT教程，PPT素材，PPT模板</p> </li>
                <li><a href="http://www.pptschool.com/" target="_blank" rel="nofollow">PPT大学</a> <p>商务人士专业PPT素材库提供免费商务PPT模板下载</p> </li>
                <li><a href="http://www.pptok.com/" target="_blank" rel="nofollow">PPTOK</a> <p>PPTOK是一个专业的PPT模板下载,PPT素材免费下载的ppt教程网。</p> </li>
                <li><a href="http://www.rapidbbs.cn/" target="_blank" rel="nofollow">锐普ppt</a> <p>最友好的PPT交流平台.中国PPT高手必收藏的网站 </p> </li>
                <li><a href="http://www.51ppt.com.cn/" target="_blank" rel="nofollow">无忧ppt</a> <p>提供大量免费精美PPT模板、好看的powerpoint模板素材、图标、背景等资源下载</p> </li> 
                <li><a href="http://iloveppt.cn/" target="_blank" rel="nofollow">我爱ppt</a> <p>中文演示设计平台PPT爱好者与职场达人必备网站。 </p> </li> 
                <li><a href="http://www.yanj.cn/" target="_blank" rel="nofollow">演界网</a> <p>中国首家演示设计交易平台</p> </li> 
                <li><a href="http://www.51pptmoban.com/" target="_blank" rel="nofollow">51ppt模板</a> <p>提供ppt设计所需资源素材模板免费下载。</p> </li>
                <li><a href="http://www.zhaogeppt.com/" target="_blank" rel="nofollow">找个PPT</a> <p>大量PPT免费下载</p> </li>
                <li><a href="http://www.pooban.com/" target="_blank" rel="nofollow">扑奔网</a> <p>ppt模板,ffice文档资源分享平台</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="AE">
            <i class="icon-edit"></i>视频素材
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.rui2.net/" target="_blank" rel="nofollow">锐图网</a> <p>ae模板,高清视频素材,片头视频素材,会声会影x4x5模板下载</p> </li>
                <li> <a href="http://www.aoao365.com/" target="_blank" rel="nofollow">傲视网</a> <p>专业视频素材交易平台</p> </li>
                <li> <a href="http://www.newcger.com/" target="_blank" rel="nofollow">NewCGer</a> <p>数字视觉分享平台 | AE模板_视频素材_免费下载</p> </li>
                <li> <a href="http://www.cgown.com/ae" target="_blank" rel="nofollow">CG资源网</a> <p>影视资源必备网站</p> </li>
                <li> <a href="http://www.aemoban.com/" target="_blank" rel="nofollow">AE模板</a> <p>免费AE模板资源分享站</p> </li>
                <li> <a href="http://www.adobeae.com/" target="_blank" rel="nofollow">AE模板精品站</a> <p>全面AE模板分享</p> </li>
                <li> <a href="http://www.rr-sc.com/forum-6-1.html" target="_blank" rel="nofollow">人人素材</a> <p>人人素材AE模板</p> </li>
                <li> <a href="http://www.aepku.com/" target="_blank" rel="nofollow">AE模板库</a> <p>人人都会用的中文模板</p> </li>
                <li> <a href="http://www.linecg.com/ae_list_0_0_0.html" target="_blank" rel="nofollow">直线网AE模板</a> <p>提供大量AE工程模板【无需回复】【免费下载】</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="sounds">
            <i class="icon-edit"></i>音效素材
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.2gei.com/sound/" target="_blank" rel="nofollow">爱给网</a> <p>游戏音效素材下载专区,为游戏制作和开发提供多个分类音效素材下载</p> </li>
                <li> <a href="http://taira-komori.jpn.org/freesoundcn.html" target="_blank" rel="nofollow">小森平的音效</a> <p>各类免费音效下载</p> </li>
                <li> <a href="http://www.yinxiao.com/" target="_blank" rel="nofollow">音效网</a> <p>音效素材试听免费下载</p> </li>
                <li> <a href="http://www.yisell.com/" target="_blank" rel="nofollow">音笑网</a> <p>提供快捷高效的音效及声音素材搜索服务</p> </li>
                <li> <a href="http://www.sucaibar.com/yinxiao/" target="_blank" rel="nofollow">素材吧</a> <p>素材吧音效下载</p> </li>
                <li> <a href="http://www.soundsnap.com/" target="_blank" rel="nofollow">soundsnap</a> <p>国外音效素材搜索引擎</p> </li>
                <li> <a href="http://www.freesound.org/" target="_blank" rel="nofollow">freesound</a> <p>国外免费开源的音频片段素材数据库</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chuangyi">
            <i class="icon-edit"></i>创意设计
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.weimeixi.com/" target="_blank" rel="nofollow">唯美系</a> <p>分享来自全球的奇妙创意和优秀设计作品。涉及家居设计、新奇创意玩意等</p> </li>
                <li> <a href="http://www.baicha.me/" target="_blank" rel="nofollow">白茶</a> <p>分享优质漂亮家居设计(北欧、日式)的高品质居家生活杂志</p> </li>
                <li> <a href="http://www.repink.net/" target="_blank" rel="nofollow">锐品创意</a> <p>关注居家生活与创意设计,专注于创意家居、创意产品、视觉设计等</p> </li>
                <li> <a href="http://www.jue.so/" target="_blank" rel="nofollow">觉JUE.SO</a> <p>创意项目孵化平台，可以通过发起项目来募集资金、把自己的想法变成现实</p> </li>
                <li> <a href="http://www.pplock.com/" target="_blank" rel="nofollow">PPLock</a> <p>一个集艺术,平面设计,广告创意,摄影美图,时尚设计的精美小站</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="ruanjian">
        <h1 class="lefttitle">软件应用</h1>
        <h2 class="nav-title" id="software">
            <i class="icon-android"></i>精品软件<span class="sub-category">
                <a href="#ruanjian" class="current notop">所有</a> | <a href="#software" class="notop">精品软件</a>| <a href="#online" class="notop">在线应用</a> | <a href="#webtools" class="notop">前端工具</a> |  <a href="#websitetools" class="notop">站长工具</a> | <a href="#mobile" class="notop">手机App</a>           </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.zdfans.com/" target="_blank" rel="nofollow">zd423软件 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>知名绿色软件分享博客</p> </li>
                <li> <a href="http://www.52pojie.cn/" target="_blank" rel="nofollow">吾爱破解论坛</a> <p>国内知名破解论坛</p> </li>
                <li> <a href="http://www.appinn.com/" target="_blank" rel="nofollow">小众软件</a> <p>分享免费、小巧、实用、有趣、绿色的软件。</p> </li>
                <li> <a href="http://www.iplaysoft.com/" target="_blank" rel="nofollow">异次元软件</a> <p>推荐精选实用的软件，并提供相当详细且精美的图文评测。</p> </li>
                <li> <a href="http://www.repaik.com/" target="_blank" rel="nofollow">睿派克技术论坛</a> <p>破解软件限制,破解迅雷VIP,去广告,提供方法教程,以及精品软件下载。</p> </li>
                <li> <a href="http://bbs.kafan.cn/" target="_blank" rel="nofollow">卡饭论坛</a> <p>国内最著名的软件论坛</p> </li>
                <li> <a href="http://www.shaoit.com/" target="_blank" rel="nofollow">殁漂遥</a> <p>绿色软件分享博客</p> </li>
                <li> <a href="http://xiaojun911.com/" target="_blank" rel="nofollow">小俊博客</a> <p>专业制作绿色版，纯净版软件下载，破解软件下载</p> </li>
                <li> <a href="http://www.lrshare.com/" target="_blank" rel="nofollow">绿软分享吧</a> <p>绿色软件分享博客</p> </li>
                <li> <a href="http://www.fishlee.net/" target="_blank" rel="nofollow">鱼の后花园</a> <p>知名软件开发者博客</p> </li>
                <li> <a href="http://www.aiweibk.com/" target="_blank" rel="nofollow">艾薇百科</a> <p>绿色软件分享博客</p> </li>
                <li> <a href="http://www.ccav1.com/" target="_blank" rel="nofollow">CCAV1</a> <p>绿色软件分享博客</p> </li>
                <li> <a href="https://xbeta.info/" target="_blank" rel="nofollow">善用佳软</a> <p>(善意+善于)应用优秀软件，有个性的软件博客</p> </li>
                <li> <a href="http://www.portablesoft.org/" target="_blank" rel="nofollow">精品绿色便携软件</a> <p>追求绿色便携理念，打造清爽干净系统！</p> </li>
                <li> <a href="http://www.flighty.cn/" target="_blank" rel="nofollow">轻狂志</a> <p>体验优质纯净软件，尽在轻狂志</p> </li>
                <li> <a href="http://www.dayanzai.me/" target="_blank" rel="nofollow">大眼仔旭</a> <p>爱软件 爱汉化 爱分享 - 博客型软件</p> </li>
                <li> <a href="https://www.teamviewer.com/zhCN/" target="_blank" rel="nofollow" class="noframe">TeamViewer</a> <p>最好用强大的免费跨平台远程桌面控制软件 (支持电脑和手机)</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="online">
            <i class="icon-android"></i>在线应用
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.atool.org/" target="_blank" rel="nofollow">atool在线工具 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>由华中科技大学一位在校女研究生开发的在线工具集合网站</p> </li>
                <li> <a href="http://tool.lu/" target="_blank" rel="nofollow">程序员工具箱</a> <p>在线工具,开发人员工具,代码格式化、压缩、加密、解密,下载链接转换,sql工具,正则测试工具,favicon在线制作,ruby工具,中文简繁体转换,迅雷下载链接转换,程序猿的在线工具</p> </li>
                <li> <a href="http://zb.letwind.com/" target="_blank" rel="nofollow">装逼神器</a> <p>装逼如风，常伴吾身，在线图片生成网站</p> </li>
                <li> <a href="http://www.flvcd.com" target="_blank" rel="nofollow">硕鼠视频解析<img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>在线解析视频下载地址，支持80多个视频网站</p> </li>
                <li> <a href="http://www.clipconverter.cc/" target="_blank" rel="nofollow" class="noframe">ClipConverter</a> <p>免费下载youtube视频</p> </li>
                <li> <a href="http://en.savefrom.net/" target="_blank" rel="nofollow">Savefrom.net<img src="../wp-content/themes/Loostrive/images/hot.gif"></a> <p>在线解析youtube视频下载地址，免费下载youtube视频</p> </li>
                <li> <a href="http://web.yeekit.com/" target="_blank" rel="nofollow">Yeekit网页翻译</a> <p>百分百极速的网页翻译，再也不用怕上任何外文网站了</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="webtools">
            <i class="icon-android"></i>前端工具
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.w3cplus.com/preprocessor/sass-gui-tool-codekit.html" target="_blank">sass编译</a></li>
                <li><a href="http://babeljs.cn/" target="_blank">JS编译器</a></li>
                <li><a href="http://koala-app.com/" target="_blank">SASS编译</a></li>
                <li><a href="http://www.sassmeister.com/" target="_blank">SASS在线编译</a></li>
                <li><a href="http://javascript-compressor.com/" target="_blank">JS压缩</a></li>
                <li><a href="https://www.webpagetest.org/" target="_blank">网站在线测试</a></li>
                <li><a href="http://fis.baidu.com/" target="_blank">前端工程构建</a></li>
                <li><a href="http://duoshuo.com/" target="_blank">多说</a></li>
                <li><a href="http://www.51.la/" target="_blank">网站统计工具</a></li>
                <li><a href="http://www.zzbaike.com/" target="_blank">站长百科</a></li>
                <li><a href="http://www.jiathis.com/index2" target="_blank">按钮分享工具</a></li>
                <li><a href="http://www.dingdone.com/index#case" target="_blank">APP制作</a></li>
                <li><a href="http://www.gruntjs.net/" target="_blank">Grunt</a></li>
                <li><a href="http://runjs.cn/" target="_blank">RUNJS</a></li>
                <li><a href="http://markitup.jaysalvat.com/home/" target="_blank">markitup</a></li>
                <li><a href="https://atom-china.org/" target="_blank">atom</a></li>
                <li><a href="http://yeoman.io/" target="_blank">前端工程工具</a></li>
                <li><a href="https://regexper.com/" target="_blank">正则在线测试</a></li>
                <li><a href="http://jsbin.com/" target="_blank" class="noframe">JS在线运行</a></li>
                <li><a href="http://developer.baidu.com/vcast" target="_blank">百度语音</a></li>
                <li><a href="http://gongshi.baidu.com/" target="_blank">前端公式</a></li>
                <li><a href="http://jekyll.bootcss.com/" target="_blank">静态网站工具</a></li>
                <li><a href="http://phonegap.com/" target="_blank">phonegap</a></li>
                <li><a href="http://www.appcan.cn/" target="_blank">appcan</a></li>
                <li><a href="http://sass.bootcss.com/" target="_blank">SASS中文</a></li>
                <li><a href="http://www.1024i.com/demo/less/index.html" target="_blank">LESS中文</a></li>
                <li><a href="http://zhanzhang.baidu.com/" target="_blank">百度站长平台</a></li>
                <li><a href="https://github.com/google/traceur-compiler" target="_blank">ES6转ES5</a></li>
                <li><a href="http://www.fontke.com/" target="_blank">字客网</a></li>
                <li><a href="http://www.gulpjs.com.cn/" target="_blank">glup</a></li>
                <li><a href="http://livestyle.io/" target="_blank">livestyle</a></li>
                <li><a href="http://livereload.com/" target="_blank">livereload</a></li>
                <li><a href="https://browsersync.io/" target="_blank">browsersync</a></li>
                <li><a href="http://webpackdoc.com/" target="_blank">webpack</a></li>
                <li><a href="http://www.browsersync.cn/" target="_blank">browsersync中文</a></li>
                <li><a href="http://npm.taobao.org/" target="_blank">淘宝NPM镜像</a></li>
                <li><a href="http://changyan.kuaizhan.com/" target="_blank">畅言</a></li>
                <li><a href="http://www.dcloud.io/" target="_blank">HBuilder</a></li>
                <li><a href="http://www.wecenter.com/?copyright" target="_blank">WeCenter</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="websitetools">
            <i class="icon-android"></i>站长工具
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://seo.chinaz.com/" target="_blank">SEO综合</a><p></p></li>
                <li><a href="http://www.123cha.com/alexa/" target="_blank">网站流量</a><p></p></li>
                <li><a href="http://webscan.360.cn/" target="_blank">安全检测</a><p></p></li>
                <li><a href="http://ping.chinaz.com/" target="_blank">超级Ping</a><p></p></li>
                <li><a href="http://alibench.com/" target="_blank">性能分析</a><p></p></li>
                <li><a href="http://tool.chinaz.com/Links" target="_blank">死链检测</a><p></p></li>
                <li><a href="http://del.chinaz.com/" target="_blank">过期域名</a><p></p></li>
                <li><a href="http://index.baidu.com/" target="_blank">百度指数</a><p></p></li>
                <li><a href="http://data.mbalib.com/" target="_blank">智库监测</a><p></p></li>
                <li><a href="http://shu.taobao.com/" target="_blank">淘宝指数</a><p></p></li>
                <li><a href="http://www.testin.cn/" target="_blank">APP测试</a><p></p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="mobile">
            <i class="icon-android"></i>手机App
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://zuimeia.com/" target="_blank" rel="nofollow">最美应用</a> <p>发现好用、好看、好玩的手机应用</p> </li>
                <li><a href="http://sspai.com/" target="_blank" rel="nofollow">少数派</a> <p>少数派发现优质应用，撰写客观深度的评测，制作实用易懂的教程</p> </li>
                <li><a href="http://www.appnz.com/" target="_blank" rel="nofollow">爱屁屁</a> <p>专注于移动应用个性化评测，旨在令您生活的每一天与怦然心动的高品质应用相遇 </p> </li>
                <li><a href="http://pinapps.in/" target="_blank" rel="nofollow">Pinapps</a> <p>我推荐的不仅是Apps，更是一种态度</p> </li>
                <li><a href="http://appdp.com/" target="_blank" rel="nofollow">APP每日推送</a> <p>每日推送适合国人的限时免费应用，玩正版也可以很省钱！</p> </li>
                <li><a href="http://app.dgtle.com/" target="_blank" rel="nofollow">数字尾巴</a> <p>应用控 - 我们只推荐精品应用</p> </li>
                <li><a href="http://www.qdaily.com/tags/1288.html" target="_blank" rel="nofollow">好奇心日报</a> <p>提供了各种类型记录商业，新闻和生活方式的今日应用新闻</p> </li>
                <li><a href="http://next.36kr.com/posts" target="_blank" rel="nofollow" class="noframe">NEXT</a> <p>36Kr旗下网站，不错过任何一个新产品</p> </li>
                <li><a href="http://www.wooaii.com/" target="_blank" rel="nofollow">我爱玩应用</a> <p>拒绝收费，分享免费、有创意、有趣实用的软件应用网站或浏览器扩展。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="program">
        <h1 class="lefttitle">编程</h1>
        <h2 class="nav-title" id="webcode">
            <i class="icon-code"></i>web开发<span class="sub-category">
                <a href="#program" class="current notop">所有</a> | <a href="#webcode" class="notop">Web开发</a>| <a href="#softcode" class="notop">软件编程</a>| <a href="#library" class="notop">库</a>| <a href="#frame" class="notop">框架</a> | <a href="#plugin" class="notop">插件</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.runoob.com/" target="_blank" rel="nofollow">菜鸟教程</a> <p>超全基础编程技术教程，学的不仅是技术，更是梦想！</p> </li>
                <li> <a href="http://www.bootcss.com/" target="_blank" rel="nofollow">Bootstrap中文网</a> <p>简洁、直观、强悍的前端开发框架，让web开发更迅速、简单。</p> </li>
                <li> <a href="http://tutorialzine.com/" target="_blank" rel="nofollow">Tutorialzine</a> <p>国外高质量的网页开发教程博客，并提供免费开源代码的下载。</p> </li>
                <li> <a href="http://www.w3cfuns.com/" target="_blank" rel="nofollow">前端网</a> <p>前端开发工程师互动平台，并提供大量优秀的教程及资源下载。</p> </li>
                <li> <a href="http://www.daqianduan.com/" target="_blank" rel="nofollow">大前端</a> <p>一个关注前端开发、用户体验设计、wordpress主题的独立博客。</p> </li>
                <li> <a href="http://www.html5cn.org/" target="_blank" rel="nofollow">HTML5中国</a> <p>HTML5中文门户，为广大爱好者提供各种HTML5资料及教程等。 </p> </li>
                <li> <a href="http://www.jplayer.org/" target="_blank" rel="nofollow">JPlayer</a> <p>非常棒的开源网页播放器，使用JQuery + HTML5编写。</p> </li>
                <li> <a href="http://www.cuplayer.com/" target="_blank" rel="nofollow">酷播网页播放器</a> <p>多终端跨平台(支持ipad,iphone,安卓平析,安卓手机)网页播放器</p> </li>
                <li> <a href="http://www.w3cplus.com/" target="_blank" rel="nofollow">W3CPlus</a> <p>前端爱好者的家园，努力打造最优秀的web前端学习的站点。</p> </li>
                <li> <a href="http://kindeditor.net/" target="_blank" rel="nofollow">KindEditor</a> <p>美观大方，功能强大的开源在线HTML编辑器。</p> </li>
                <li> <a href="http://www.html5china.com/" target="_blank" rel="nofollow">HTML5中文网</a> <p>面向中国HTML5开发者搭建的官方网站，提供HTML5专业服务。</p> </li>
                <li> <a href="http://www.css88.com/" target="_blank" rel="nofollow">Web前端开发</a> <p>专注前端开发，关注用户体验及国内外最新最好的前端开发技术。</p> </li>
                <li> <a href="http://www.qianduan.net/" target="_blank" rel="nofollow">前端观察</a> <p>关注国内外最新最好的前端设计资源和前端开发技术的专业博客。</p> </li>
                <li> <a href="http://docs.kissyui.com/" target="_blank" rel="nofollow">KISSY</a> <p>淘宝团队开发的款跨终端、模块化、高性能、使用简单的JS框架。</p> </li>
                <li> <a href="http://www.gbin1.com/" target="_blank" rel="nofollow">GBin1</a> <p>分享前端及其web开发相关HTML5技术。</p> </li>
                <li> <a href="http://jirengu.com/" target="_blank" rel="nofollow">饥人谷</a> <p>国内最有爱的在前端学习社区</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="softcode">
            <i class="icon-code"></i>软件编程
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.oschina.net/" target="_blank" rel="nofollow">开源中国</a> <p>开源技术社区，为IT开发者提供了一个发现、使用、并交流开源技术的平台。</p> </li>
                <li> <a href="http://www.chinaitlab.com/" target="_blank" rel="nofollow">中国IT实验室</a> <p>著名IT技术门户，提供最热门的业界资讯，IT专家技术的交流社区。</p> </li>
                <li> <a href="http://www.php100.com/" target="_blank" rel="nofollow">PHP100</a> <p>国内第一家以PHP资源分享为主的专业网站，也提供PHP中文交流社区。</p> </li>
                <li> <a href="http://www.phpchina.com/" target="_blank" rel="nofollow">PHPChina</a> <p>PHPER的天堂，领跑PHP开源事业！Zend中国官方唯一授权网站！ </p> </li>
                <li> <a href="http://www.thinkphp.cn/" target="_blank" rel="nofollow">ThinkPHP</a> <p>一个免费开源的，快速、简单的面向对象的 轻量级PHP开发框架。</p> </li>
                <li> <a href="http://www.iteye.com/" target="_blank" rel="nofollow">ITeye</a> <p>综合性的互联网技术分享网站，程序员最爱。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="library">
            <i class="icon-code"></i>库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://zeptojs.com/" target="_blank" rel="nofollow">zeptojs</a></li>
                <li><a href="https://github.com/visionmedia/move.js" target="_blank" rel="nofollow">运动库</a></li>
                <li><a href="http://velocityjs.org/" target="_blank" rel="nofollow">动画库</a></li>
                <li><a href="https://github.com/carhartl/jquery-cookie#readme" target="_blank" rel="nofollow">jqueryCookie</a></li>
                <li><a href="http://modernizr.cn/" target="_blank" rel="nofollow">modernizr</a></li>
                <li><a href="http://ueditor.baidu.com/website/" target="_blank" rel="nofollow">ueditor</a></li>
                <li><a href="http://www.zeptojs.cn/" target="_blank" rel="nofollow">zeptojs中文</a></li>
                <li><a href="http://www.webhek.com/misc/css-shake/" target="_blank" rel="nofollow">css-shake</a></li>
                <li><a href="http://www.artisanjs.com/" target="_blank" rel="nofollow">ArtisanJS</a></li>
                <li><a href="http://www.rgraph.net/" target="_blank" rel="nofollow">JS图表</a></li>
                <li><a href="http://manos.malihu.gr/jquery-custom-content-scroller/" target="_blank" rel="nofollow">自定义滚动条</a></li>
                <li><a href="http://www.embeddedjs.com/" target="_blank" rel="nofollow">ejs</a></li>
                <li><a href="http://jade-lang.com/" target="_blank" rel="nofollow">jade</a></li>
                <li><a href="http://handlebarsjs.com/" target="_blank" rel="nofollow">handlebarsjs</a></li>
                <li><a href="https://github.com/janl/mustache.js" target="_blank" rel="nofollow">mustachejs</a></li>
                <li><a href="https://github.com/aui/artTemplate" target="_blank" rel="nofollow">artTemplate</a></li>
                <li><a href="http://velocity.apache.org/" target="_blank" rel="nofollow">velocity</a></li>
                <li><a href="http://www.dustjs.com/" target="_blank" rel="nofollow">dustjs</a></li>
                <li><a href="http://masonry.desandro.com/" target="_blank" rel="nofollow">网格库</a></li>
                <li><a href="http://ricostacruz.com/nprogress/" target="_blank" rel="nofollow">NProgress.js</a></li>
                <li><a href="http://c3js.org/" target="_blank" rel="nofollow">C3.js</a></li>
                <li><a href="http://www.jsviews.com/" target="_blank" rel="nofollow">JsRender</a></li>
                <li><a href="https://www.awesomes.cn/" target="_blank" rel="nofollow">前端资源库</a></li>
                <li><a href="http://socket.io/" target="_blank" rel="nofollow">socket.io</a></li>
                <li><a href="http://todomvc.com/" target="_blank" rel="nofollow">TodoMVC</a></li>
                <li><a href="http://echarts.baidu.com/index.html" target="_blank" rel="nofollow">ECharts</a></li>
                <li><a href="https://lodash.com/" target="_blank" rel="nofollow">Lodash</a></li>
                <li><a href="https://lodash.com/" target="_blank" rel="nofollow">Loodash</a></li>
                <li><a href="http://lodashjs.com/" target="_blank" rel="nofollow">Lodashjs中文</a></li>
                <li><a href="https://aerotwist.com/" target="_blank" rel="nofollow">Aerotwist</a></li>
                <li><a href="http://www.createjs.com/" target="_blank" rel="nofollow">CreateJS</a></li>
                <li><a href="http://snapsvg.io/" target="_blank" rel="nofollow">SnapSvg</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="frame">
            <i class="icon-code"></i>框架
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.apjs.net/" target="_blank">angularjs</a></li>
                <li><a href="http://www.sassmeister.com/" target="_blank">样式框架</a></li>
                <li><a href="http://www.17sucai.com/preview/1/2014-12-23/ScatteredPolaroidsGallery/index.html" target="_blank">画廊框架</a></li>
                <li><a href="http://www.bootcss.com/" target="_blank">bootstrap</a></li>
                <li><a href="https://thinkjs.org/" target="_blank">thinkjs</a></li>
                <li><a href="https://hexo.io/" target="_blank">hexo博客框架</a></li>
                <li><a href="http://angularjs.cn/" target="_blank">angularjs中文</a></li>
                <li><a href="http://www.foundcss.com/" target="_blank">Foundation中文</a></li>
                <li><a href="http://foundation.zurb.com/" target="_blank">foundation</a></li>
                <li><a href="http://backbonejs.org/" target="_blank">backbonejs</a></li>
                <li><a href="http://underscorejs.org/" target="_blank">underscorejs</a></li>
                <li><a href="http://www.jeasyui.com/" target="_blank">easyui</a></li>
                <li><a href="http://cn.vuejs.org/" target="_blank">vuejs</a></li>
                <li><a href="http://www.expressjs.com.cn/" target="_blank">Express</a></li>
                <li><a href="http://vuefe.cn/" target="_blank">Vue2.0中文</a></li>
                <li><a href="http://www.layui.com/" target="_blank">Layui</a></li>
                <li><a href="http://emberjs.com/" target="_blank">EmberJs</a></li>
                <li><a href="https://alibaba.github.io/weex/index.html" target="_blank">Weex</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="plugin">
            <i class="icon-code"></i>插件
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://demo.jb51.net/js/myfocus/" target="_blank">焦点图</a></li>
                <li><a href="https://github.com/alvarotrigo/fullPage.js" target="_blank">全屏翻页</a></li>
                <li><a href="http://www.oschina.net/project/tag/273/jquery/" target="_blank">开源中国</a></li>
                <li><a href="https://jqueryvalidation.org/" target="_blank">表单插件</a></li>
                <li><a href="http://2.swiper.com.cn/" target="_blank">swiper</a></li>
                <li><a href="http://www.uploadify.com/" target="_blank">uploadify</a></li>
                <li><a href="http://www.uploadify.com/" target="_blank">uploadify</a></li>
                <li><a href="http://momentjs.com/" target="_blank">Moment.js</a></li>
                <li><a href="http://flickity.metafizzy.co/" target="_blank">幻灯片插件</a></li>
                <li><a href="http://mwlmt.cc/content/wljdtcj/index.html" target="_blank">WLFocus</a></li>
                <li><a href="http://www.jquery-steps.com/" target="_blank">jquery steps</a></li>
                <li><a href="http://fex.baidu.com/webuploader/" target="_blank">webuploader</a></li>
                <li><a href="http://wijmo.com/" target="_blank">wIJMO</a></li>
                <li><a href="http://jscolor.com/" target="_blank">JsColor</a></li>
                <li><a href="http://slidesjs.com/" target="_blank">SlideJs</a></li>
                <li><a href="http://ricostacruz.com/jquery.transit/" target="_blank">Transit</a></li>
                <li><a href="http://prismjs.com/index.html" target="_blank">Prism</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div><!--.section-->
    <div class="section mtop" id="study">
        <h1 class="lefttitle">学习</h1>
        <h2 class="nav-title" id="ITstudy">
            <i class="icon-globe"></i>IT在线学习<span class="sub-category">
                <a href="#study" class="current notop">所有</a> | <a href="#ITstudy" class="notop">IT在线学习</a> | <a href="#degree" class="notop">考研</a> | <a href="#read" class="notop">阅读</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                    <li><a href="http://www.imooc.com/" target="_blank" rel="nofollow">慕课网</a> <p>免费的IT技能学习平台 专注IT学习的开放式在线精品课程</p> </li>
                    <li><a href="http://www.mengma.com/" target="_blank" rel="nofollow">萌码网</a> <p>萌码是计算教育领域的先行者，领先的跟随式教学、图形化教学等让计算学习更有趣、更高效。</p> </li>
                <li><a href="http://study.163.com/" target="_blank" rel="nofollow">网易云课堂</a> <p>大型在线教育平台服务，提供海量免费、优质课程</p> </li>
                    <li><a href="http://www.ycku.com/" target="_blank" rel="nofollow">瓢城Web俱乐部</a> <p>持久的理念，最酷的教学</p> </li>
                    <li><a href="http://doyoudo.com" target="_blank" rel="nofollow">doyoudo</a> <p>一个有趣、专业的设计类软件学习网站</p> </li>
                    <li><a href="https://www.shiyanlou.com/courses/" target="_blank" rel="nofollow">实验楼</a> <p>实验楼课程分为基础课和项目课，内容主要涵盖IT技术领域。</p> </li>
                    <li><a href="http://ke.qq.com/index.html" target="_blank" rel="nofollow">腾讯课堂</a> <p>专业在线教育平台，打造老师在线上课教学、学生及时互动学习的课堂。</p> </li>
                    <li><a href="http://open.163.com/" target="_blank" rel="nofollow">网易公开课</a> <p>推出国内外名校公开课，搭建起强有力的网络视频教学平台</p> </li>
                    <li><a href="http://www.jisuanke.com/" target="_blank" rel="nofollow" class="noframe">计蒜客</a> <p>学习计算机相关领域知识(编程、算法、计算机理论)最便捷的渠道</p> </li>
                    <li><a href="http://mooc.guokr.com/" target="_blank" rel="nofollow">MOOC学院</a> <p>集合Coursera，edX，udacity,学堂在线等平台所有课程的点评讨论社区</p> </li>
                    <li><a href="http://www.tanzhouedu.com/" target="_blank" rel="nofollow">潭州学院</a> <p>规模较大的新一代互联网在线教育育人平台</p> </li> 
                    <li><a href="http://www.51zxw.net/" target="_blank" rel="nofollow">我要自学网</a> <p>免费视频教程,提供全方位软件学习</p> </li> 
                    <li><a href="http://www.duobei.com/" target="_blank" rel="nofollow">多贝</a> <p>实用类公开课程及课程表,营造和老师、同学平等交流的学习社区。</p> </li> 
                    <li><a href="https://www.coursera.org/" target="_blank" rel="nofollow" class="noframe">Coursera</a> <p>在网上学习全世界最好的课程</p> </li> 
                    <li><a href="http://www.icourses.cn/home/" target="_blank" rel="nofollow">爱课程</a> <p>中国大学精品开放课程</p> </li> 
                    <li><a href="http://oeasy.org/" target="_blank" rel="nofollow">Oeasy系列</a> <p>给想学没钱学的人做的，希望越来越多的人来做教程。 </p> </li> 
                    <li><a href="http://www.ibeifeng.com/" target="_blank" rel="nofollow">北风网</a> <p>国内最全面、最实战的IT在线教育培训社区</p> </li> 
                    <li><a href="http://www.howzhi.com/" target="_blank" rel="nofollow">好知网</a> <p>专注生活技能和兴趣爱好的知识分享新社区</p> </li>
                    <li><a href="http://www.wanmen.org/" target="_blank" rel="nofollow" class="noframe">万门大学</a> <p>中国第一所网络大学。为社会提供高品质学习课程，所有课程均为万门原创。</p> </li>
                    <li><a href="http://www.aiyunlu.com/student/homepage" target="_blank" rel="nofollow">云路课堂</a> <p>国内专业的IT技能在线学习平台</p> </li>
                    <li><a href="http://www.haoxue.com/" target="_blank" rel="nofollow">好学网</a> <p>是国内最具影响力的微课学习及在线微视频课程分享平台</p> </li>
                    <li><a href="http://www.gogoup.com/course/list" target="_blank" rel="nofollow">高高手</a> <p>课程目前以摄影技术及摄影后期为主</p> </li>
                    <li><a href="http://www.maiziedu.com/" target="_blank" rel="nofollow">麦子学院</a> <p>专业IT职业在线教育平台</p> </li>
                    <li><a href="http://www.51zxw.net/" target="_blank" rel="nofollow">我要自学网</a> <p>免费视频教程,提供全方位软件学习</p> </li>
                    <li><a href="http://www.icourse163.org/" target="_blank" rel="nofollow">中国大学Mooc</a> <p>国内最好的中文MOOC学习平台，拥有来自于39所985高校的顶级课程，最好最全的大学课程，与名师零距离。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="degree">
            <i class="icon-globe"></i>考研
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.cmzyk.com/h-col-116.html" target="_blank" rel="nofollow">传媒老跟班</a> <p>专注各类资源整合与共享，打造最实用的资源网站。</p> </li>
                <li><a href="http://weibo.com/s1002297748" target="_blank" rel="nofollow" class="noframe">文艺-资料分享君</a> <p>专注免费分享考研资料，英语四六级资料，公务员资料</p> </li>
                <li><a href="http://weibo.com/media2015" target="_blank" rel="nofollow" class="noframe">传媒小哥</a> <p>资源共享 | 新闻传播 / 学术 / 考研 / 影视</p> </li>
                <li><a href="http://weibo.com/u/5372911673" target="_blank" rel="nofollow" class="noframe">找研友吧</a> <p>为考研学子提供考研资料</p> </li>
                <li><a href="http://weibo.com/u/2091076344" target="_blank" rel="nofollow" class="noframe">资源分享库</a> <p>专注于各领域学习资源，酷站软件，秒拍视频的分享与推荐</p> </li>
                <li><a href="http://weibo.com/kyqq" target="_blank" rel="nofollow" class="noframe">考研资源库</a> <p>致力于分享最优质的考研资源</p> </li>
                <li><a href="http://weibo.com/Dateservice" target="_blank" rel="nofollow" class="noframe">资料服务库</a> <p>独具特色的资源整合公益微博，主页致力于分享最优质最有价值的资源</p> </li>
                <li><a href="http://weibo.com/u/5359434969" target="_blank" rel="nofollow" class="noframe">选课网考研达人</a> <p>考研虐我千百遍，我待考研如初恋！</p> </li>
                <li><a href="http://weibo.com/719656790" target="_blank" rel="nofollow" class="noframe">每日考研笔记</a> <p>考研资讯、考研指导、考研辅导</p> </li>
                <li><a href="http://bbs.kaoshidian.com/resource" target="_blank" rel="nofollow">考试点</a> <p>中国领先的考研在线培训品牌，海量考研辅导课程</p> </li>
                <li><a href="http://www.kaoyan.com/" target="_blank" rel="nofollow">考研网</a> <p>中国领先的考研交流平台和研究生招生信息网络发布平台</p> </li>
                <li><a href="http://download.kaoyan.com/" target="_blank" rel="nofollow">考研论坛-资料</a> <p>提供各省各大学考研资料下载</p> </li>
                <li><a href="http://club.topsage.com/forum.php" target="_blank" rel="nofollow">大家论坛</a> <p>提供权威考研真题、复习资料下载，考试经验交流 </p> </li>
                <li><a href="http://www.1zhao.org/" target="_blank" rel="nofollow">知识宝库</a> <p>免费考研论坛</p> </li>
                <li><a href="http://bbs.freekaoyan.com/forum.php" target="_blank" rel="nofollow">免费考研论坛</a> <p>免费考研论坛 </p> </li>
                <li><a href=" http://kaoyannote.com/" target="_blank" rel="nofollow">每日考研笔记</a> <p>没有什么比坚持梦想更值得</p> </li>
                <li><a href="http://pan.baidu.com/share/home?uk=1949525496&amp;view=share#category/type=0" target="_blank" rel="nofollow">圆圆工作室度盘</a><p>提供各类考试最新课程，推广论坛资料免费获取</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="read">
            <i class="icon-globe"></i>阅读
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.zoudupai.com/" target="_blank" rel="nofollow">走读派</a> <p>提供一站式免费Kindle电子书下载与推送服务</p> </li>
                <li><a href="http://kankindle.com/" target="_blank" rel="nofollow">看kindle</a> <p>为您提供免费的Kindle电子书下载</p> </li>
                <li><a href="http://readcolor.com/" target="_blank" rel="nofollow">读远</a> <p>发掘优质电子书资源，提供好书分享、下载与推送。支持mobi/epub/pdf/txt格式</p> </li>
                <li><a href="http://kindlefere.com/" target="_blank" rel="nofollow">kindle伴侣</a> <p>为静心阅读而生</p> </li>
                <li><a href="http://www.pixvol.com/" target="_blank" rel="nofollow">kindle漫画</a> <p>高清kindle格式漫画下载，支持推送漫画到kindle设备</p> </li>
                <li><a href="https://www.amazon.cn/Kindle%E5%85%8D%E8%B4%B9%E7%94%B5%E5%AD%90%E4%B9%A6/b/ref=amb_link_30927692_12?ie=UTF8&node=116175071&pf_rd_m=A1AJ19PSB66TGU&pf_rd_s=left-2&pf_rd_r=019VVFFWQYQAVAHCRP80&pf_rd_t=101&pf_rd_p=81488872&pf_rd_i=116169071" target="_blank" rel="nofollow" class="noframe">亚马逊免费电子书</a> <p>亚马逊官网免费kindle电子书下载</p> </li>
                <li><a href="https://www.cnepub.com/" target="_blank" rel="nofollow">掌上书苑</a> <p>为您提供最好的电子书制作、交流平台</p> </li>
                <li><a href="http://www.txtzm.com/" target="_blank" rel="nofollow">之梦TXT电子书论坛</a> <p>txt电子书免费下载,免费小说下载,全集全本完结小说下载</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="cool">
        <h1 class="lefttitle">酷站</h1>
        <h2 class="nav-title">
            <i class="icon-globe"></i>小清新<span class="sub-category">
                <a href="#cool" class="current notop">所有</a> | <a href="#xiaoqingxin" class="notop">小清新</a>| <a href="#chuangye" class="notop">创业融资</a>| <a href="#goodblog" class="notop">个性独立博客</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.huxiu.com" target="_blank" rel="nofollow">虎嗅网</a> <p>有视角的、个性化商业资讯与交流平台，核心关注一系列明星公司。</p> </li>
                <li> <a href="http://www.leiphone.com/" target="_blank" rel="nofollow">雷锋网</a> <p>专注于移动互联网创新和创业的科技博客，客观敏锐地记录移动互联网的每一天。</p> </li>
                <li> <a href="http://www.36kr.com/" target="_blank" rel="nofollow">36氪</a> <p>36氪是一个关注互联网创业的科技博客</p> </li>
                <li> <a href="http://www.woxihuan.com/" target="_blank" rel="nofollow">我喜欢</a> <p>收集喜欢的图片和网页。可以查阅别人收集的内容，或看看热门收集频道等。</p> </li>
                <li> <a href="http://www.xiachufang.com/" target="_blank" rel="nofollow">下厨房</a> <p>一个吃货的精彩分享平台，提供有版权的实用菜谱做法与饮食知识。</p> </li>
                <li> <a href="http://www.lingshikong.com/" target="_blank" rel="nofollow">零食控</a> <p>零食控是一个以少而精为特色，专注于优质品牌零食推荐的新媒体。</p> </li>
                <li> <a href="http://huaban.com/" target="_blank" rel="nofollow">花瓣</a> <p>收集灵感,保存素材,计划旅行,晒晒精美家居,服饰搭配,发型和婚纱。</p> </li>
                <li> <a href="http://www.meishichina.com/" target="_blank" rel="nofollow">美食天下</a> <p>中文美食网站与厨艺交流社区，拥有最多的美食做法、菜谱、食谱大全。</p> </li>
                <li> <a href="http://www.lemo.me/" target="_blank" rel="nofollow">乐摩网</a> <p>最优质的文化创意产业互动平台，为专业人才及专业机构提供展示与合作机会。</p> </li>
                <li> <a href="http://www.haodou.com/" target="_blank" rel="nofollow">好豆网</a> <p>提供最全、最优质的中文菜谱做法，分享与点评您最爱的美食。</p> </li>
                <li> <a href="http://qng.im/" target="_blank" rel="nofollow">青果</a> <p>小众飞行员的精神燃料补给站</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chuangye">
            <i class="icon-globe"></i>创业融资
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://angelcrunch.com/" target="_blank" rel="nofollow">天使汇</a><p></p></li>
                <li><a href="http://www.wabei.cn/" target="_blank" rel="nofollow">挖贝网</a><p></p></li>
                <li><a href="http://www.cyzone.cn/" target="_blank" rel="nofollow">创业邦</a><p>中国创业者的信息平台和服务平台，帮助中国创业者实现创业梦想。</p></li>
                <li><a href="http://ctquan.com/" target="_blank" rel="nofollow">创投圈</a><p></p></li>
                <li><a href="http://www.tisiwi.com/" target="_blank" rel="nofollow">天使湾</a><p></p></li>
                <li><a href="http://vc.iheima.com/" target="_blank" rel="nofollow">i黑马投融</a><p>创业创新服务互联网平台，帮助创业团队了解最创业趋势，分析创业热点动态。</p></li>
                <li><a href="http://17startup.com/" target="_blank" rel="nofollow">17startup</a><p>致力于成为中国最新最全的初创公司数据库和最活跃最有价值的创业点评社区。</p></li>
                <li><a href="http://www.howvc.com/" target="_blank" rel="nofollow">好投网</a><p></p></li>
                <li><a href="http://www.chekucafe.com/" target="_blank" rel="nofollow">车库咖啡</a><p></p></li>
                <li><a href="http://www.3wcoffee.com/" target="_blank" rel="nofollow">3wcoffee</a><p></p></li>
                <li><a href="http://xindanwei.com/" target="_blank" rel="nofollow">新单位</a><p></p></li>
                <li><a href="http://www.ycpai.com/" target="_blank" rel="nofollow">缘创派</a><p></p></li>
                <li><a href="http://www.taou.com/landing" target="_blank" rel="nofollow">淘友网</a><p></p></li>
                <li><a href="http://www.kic.net.cn/" target="_blank" rel="nofollow">创天地</a><p></p></li>
                <li><a href="http://www.chuangxin.com/" target="_blank" rel="nofollow">创新工场</a><p></p></li>
                <li><a href="http://www.whibi.com/" target="_blank" rel="nofollow">中国光谷</a><p></p></li>
                <li><a href="http://www.iheima.com/" target="_blank" rel="nofollow">黑马工场</a><p></p></li>
                <li><a href="http://chinaccelerator.com/" target="_blank" rel="nofollow">中国加速</a><p></p></li>
                <li><a href="http://www.istartvc.com/" target="_blank" rel="nofollow">起点营</a><p></p></li>
                <li><a href="http://www.ventureslab.com/" target="_blank" rel="nofollow">麦刚工场</a><p></p></li>
                <li><a href="http://www.innovalley.com.cn/" target="_blank" rel="nofollow">创新谷</a><p></p></li>
                <li><a href="http://www.mediadreamworks.net/" target="_blank" rel="nofollow">传媒梦工</a><p></p></li>
                <li> <a href="http://www.pedaily.cn/" target="_blank" rel="nofollow">投资界</a> <p>为创业者提供TMT,IT服务,创业投资,风险投资,私募股权等权威门户。</p> </li>
                <li> <a href="http://www.tmtpost.com/" target="_blank" rel="nofollow">钛媒体</a> <p>TMT行业观点平台，把脉科技资本论，从资本市场看科技价值与趋势。</p> </li>
                <li> <a href="http://www.cyz.org.cn/" target="_blank" rel="nofollow">创业者</a> <p>清华大学旗下专注于中国创业教育与经验分享的平台。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="goodblog">
            <i class="icon-globe"></i>个性独立博客
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://lusongsong.com/" target="_blank" rel="nofollow">卢松松</a> <p>关注草根创业者和站长的媒体博客</p> </li>
                <li><a href="http://yigujin.wang/" target="_blank" rel="nofollow">懿古今</a> <p>一个普通人的生活纪实博客</p> </li>
                <li><a href="http://www.tanglangxia.com/" target="_blank" rel="nofollow">螳螂虾</a> <p>记录日常点滴、关注网络琐碎；感悟与吐槽并存、收藏与分享伴随。</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="fuli">
        <h1 class="lefttitle">福利</h1>
        <h2 class="nav-title" id="fuliblog">
            <i class="icon-globe"></i>福利博客<span class="sub-category">
                <a href="#fuli" class="current notop">所有</a> | <a href="#fuliblog" class="notop">福利博客</a>            </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.fulidang.com/" target="_blank" rel="nofollow">福利档</a> <p>关注最新门事件、搜罗番号种子福利、致力扫盲普及涨姿势</p> </li>
                <li> <a href="http://zhainanba.net/" target="_blank" rel="nofollow">宅男吧</a> <p>专门分享宅男福利的网站</p> </li>
                <li> <a href="http://youliao.me/" target="_blank" rel="nofollow">有料么</a> <p>为你发现互联网上最有趣和具有传播力的新鲜事物，将这些信息进行全新解读</p> </li>
                <li> <a href="http://fuliba.net/" target="_blank" rel="nofollow">福利吧</a> <p>分享你的福利吧</p> </li>
                <li> <a href="http://www.hexieshe.com/" target="_blank" rel="nofollow">和邪社</a> <p>中国大陆最具活力最懂情趣的二次元H站</p> </li>
                <li> <a href="http://www.fuliti.cc/" target="_blank" rel="nofollow">福利梯</a> <p>拥有最精彩的福利图片、视频、真相内幕</p> </li>
                <li> <a href="http://wuxianfuli.cc/" target="_blank" rel="nofollow">无限福利</a> <p>为广大宅男、屌丝分享趣味与福利的个人独立博客</p> </li>
                <li> <a href="http://www.neihan8.com/" target="_blank" rel="nofollow">内涵吧</a> <p>有内涵的网民们都爱看的网站</p> </li>
                <li> <a href="http://www.dsqnw.com/" target="_blank" rel="nofollow">屌丝青年</a> <p>专注为屌丝青年分享最火最热的福利资源</p> </li>
                <li> <a href="http://www.flgod.org/" target="_blank" rel="nofollow">福利天堂</a> <p>宅男的天堂，分享最新福利和电影</p> </li>
                <li> <a href="http://www.xiannvw.com/" target="_blank" rel="nofollow" class="noframe">仙女屋</a> <p>最新美女热舞全集_韩国女主播视频大全</p> </li>
                <li> <a href="http://www.fulibac.com/" target="_blank" rel="nofollow">且听风吟</a> <p>福利控找福利,内涵图的地方,你懂的!</p> </li>
                <li> <a href="http://www.laosiji8.net/" target="_blank" rel="nofollow">老司机吧</a> <p>GIF出处、动图出处、番号查询、邪恶GIF、微博福利、COS福利</p> </li>
                <li> <a href="http://www.gifjia.com/" target="_blank" rel="nofollow">gif发源地</a> <p>网络热门精品GIF图片出处大全</p> </li>
                <li> <a href="http://www.zhainanfulishe.net/" target="_blank" rel="nofollow">宅男福利社</a> <p>专注于分享宅男福利，写真视频，好玩的资源下载等</p> </li>
                <li> <a href="http://txflsp.com/" target="_blank" rel="nofollow">桃心福利视频</a> <p>每日两段精彩的美女福利视频</p> </li>
                <li> <a href="http://fuli.lu" target="_blank" rel="nofollow">撸福利</a> <p>涨姿势、有态度、福利吧、好孩子、老司机、糗事百科</p> </li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->    
    <div class="section mtop" id="daohang">
        <h1 class="lefttitle">导航</h1>
        <h2 class="nav-title" id="moviedh">
            <i class="icon-globe"></i>影视导航<span class="sub-category">
                <a href="#daohang" class="current notop">所有</a> | <a href="#moviedh" class="notop">影视导航</a> | <a href="#designdh" class="notop">设计导航</a> | <a href="#studydh" class="notop">教育导航</a> | <a href="#blogdh" class="notop">博客导航</a>  | <a href="#zxdh" class="notop">专项导航</a>  | <a href="#zhdh" class="notop">综合导航</a>           </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.allyingshi.com/" target="_blank" rel="nofollow">人人影视大全</a> <p>人人影视全新网址</p></li>
                <li><a href="http://www.yingmi123.com/" target="_blank" rel="nofollow">影迷导航网</a> <p>搜集、归类、整理、分享各种影视网站</p></li>
                <li><a href="http://www.dydh.org/" target="_blank" rel="nofollow">电影导航.ORG</a> <p>人工整理优秀的电影网站</p></li>
                <li><a href="http://www.disanlou.org/hao.php" target="_blank" rel="nofollow">字幕大全</a> <p>电影字幕下载网站大全</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="designdh">
            <i class="icon-globe"></i>设计导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://hao.uisdc.com/" target="_blank" rel="nofollow">设计师网址导航1</a> <p>全方位设计师网站导航指引</p></li>
                <li><a href="http://www.userinterface.com.cn/" target="_blank" rel="nofollow">设计师网址导航2</a> <p>为设计师导航</p></li>
                <li><a href="http://hao.xueui.cn/" target="_blank" rel="nofollow">ui设计导航</a> <p>UI设计学者们最爱的版块之一</p></li>
                <li><a href="http://hao.shejidaren.com/" target="_blank" rel="nofollow">设计导航</a> <p>小盆友和大神都值得拥有的设计师网址导航</p></li>
                <li><a href="http://www.niudana.com/" target="_blank" rel="nofollow">牛大拿设计师导航</a> <p>精选国内外优秀的UI设计网站</p></li>
                <li><a href="http://hao.psefan.com/" target="_blank" rel="nofollow">饭团导航</a> <p>精选素材站导航</p></li>
                <li><a href="http://www.sjyzt.cn/" target="_blank" rel="nofollow">设计一站通</a> <p>以提高设计师工作效率和学习效率的综合设计导航网站</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="studydh">
            <i class="icon-globe"></i>教育导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.1nami.com/" target="_blank" rel="nofollow">1纳米学习导航</a> <p>收集国内外最新最酷的学习网站！学习必备！找资料必备！</p></li>
                <li><a href="http://kbs.cnki.net/" target="_blank" rel="nofollow">学术网站大全</a> <p>最全面、最权威的全球学术网站大全</p></li>
                <li><a href="http://123.paomianba.com/" target="_blank" rel="nofollow">泡面吧</a> <p>力争成为在线教育导航第一品牌，服务在线教育行业创业者、投资人。</p></li>
                <li><a href="http://dh.xdf.cn/" target="_blank" rel="nofollow">新东方教育导航</a> <p>收录包括职业教育，成人教育，儿童教育，特殊教育，学科教育的优秀网站</p></li>
                <li><a href="http://www.jydh.com/" target="_blank" rel="nofollow">中国教育导航</a> <p>全心全意为教育服务 打造全国最大的教育资源站 </p></li>
                <li><a href="http://www.54100.net/" target="_blank" rel="nofollow">好教师导航</a> <p>好教师最常用的网站地址</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="blogdh">
            <i class="icon-globe"></i>博客导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://qiusongsong.net/dh/" target="_blank" rel="nofollow">邱嵩松博客导航</a> <p>目前已收录众多优秀博客,加入邱嵩松博客导航能为您的网站带来流量与发展机遇</p></li>
                <li><a href="http://themebetter.com/blogs" target="_blank" rel="nofollow">Themebetter博客导航</a> <p>2000+有效更新博客，助力博客成长的导航</p></li>
                <li><a href="http://lusongsong.com/daohang/" target="_blank" rel="nofollow">博客大全</a> <p>卢松松独立博客大全</p></li>
                <li><a href="http://blog.ws234.com/" target="_blank" rel="nofollow">玩博客</a> <p>学技术交朋友从这里开始</p></li>
                <li><a href="http://www.516680.com/" target="_blank" rel="nofollow">博客导航网</a> <p>优秀个人博客大全，独立博客主的上网主页</p></li>
                <li><a href="http://boke112.com/" target="_blank" rel="nofollow">boke112导航</a> <p>免费收录各种类型的独立博客，提供博客导航和博客目录检索功能</p></li>
                <li><a href="http://zgboke.com/" target="_blank" rel="nofollow">中国博客联盟</a> <p>收录国内各个领域的优秀博客，是一个全人工编辑的开放式博客联盟交流和展示平台</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zxdh">
            <i class="icon-globe"></i>专项导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://hao123vr.com/" target="_blank" rel="nofollow">VR虚拟现实导航</a> <p>超全的VR虚拟现实资源导航</p></li>
                <li><a href="http://pmdaniu.com/" target="_blank" rel="nofollow">产品大牛</a> <p>产品经理服务导航网站，汇聚产品经理常用的软件、网站、第三方服务、创业等信息</p></li>
                <li><a href="http://hao.199it.com/" target="_blank" rel="nofollow">大数据导航</a> <p>以大数据产业为主，大数据工具为辅，给用户提供快速找到大数据相关的工具平台</p></li>
                <li><a href="http://www.kicokico.com/" target="_blank" rel="nofollow">二次元世界</a> <p>收录了大量动漫、游戏的二次元网站，点击START随机访问二次元网站</p></li>
                <li><a href="http://wxffd2786e80db2a0d.page.socialmaster.cn/know/v2.html" target="_blank" rel="nofollow">微信百宝箱</a> <p>收集整理各类微信实用工具</p></li>
                <li><a href="http://mfavisa.com/" target="_blank" rel="nofollow">各国签证导航</a> <p>直达各国签证网站</p></li>
                <li><a href="http://gds123.cn/" target="_blank" rel="nofollow">龟大师网络营销导航</a> <p>这是一个满足所有自媒体运营的网络营销导航</p></li>
                <li><a href="http://tool.lusongsong.com/" target="_blank" rel="nofollow">松松站长工具大全</a> <p>收录了互联网各大热门在线站长工具，经常上站长工具可以了解SEO数据变化。还可以检测网站死链接、蜘蛛访问、HTML格式检测、网站速度测试、友情链接检查、网站域名IP查询、PR、权重查询、alexa、whois查询等等。</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zhdh">
            <i class="icon-globe"></i>综合导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.kanguowai.com/" target="_blank" rel="nofollow">看国外</a> <p>收录了国外著名的网站、好玩的、好看的、有趣的国外网站以及实用的、优秀的国外网站</p></li>
                <li><a href="http://www.egouz.com/" target="_blank" rel="nofollow">国外网站导航</a> <p>分享和推荐国外知名、实用、高质量的国外网址的站点</p></li>
                <li><a href="http://www.haoyonghaowan.com/" target="_blank" rel="nofollow">好用好玩导航</a> <p>收集整理好玩好用的网站</p></li>
                <li><a href="http://iloveyoulong.com/" target="_blank" rel="nofollow">龙轩导航</a> <p>做个有用的导航</p></li>
                <li><a href="http://www.shake123.com/" target="_blank" rel="nofollow">SK123网址导航</a> <p>一个小而美的网址导航，从这里发现有趣的网站</p></li>
                <li><a href="http://qianshan.co/" target="_blank" rel="nofollow">千山导航</a> <p>可定制个人导航主页</p></li>
                <li><a href="http://gate.guokr.com/" target="_blank" rel="nofollow">果壳任意门</a> <p>发现你最爱的网站</p></li>
                <li><a href="http://www.neihan999.com/" target="_blank" rel="nofollow">内涵导航</a> <p>简洁有内涵</p></li>
                <li><a href="http://go.fuli.lu/" target="_blank" rel="nofollow">福利导航</a> <p>精选电影资源，软件资源，免费资源，学习资源</p></li>
                <li><a href="http://www.neihan999.com/FQ/" target="_blank" rel="nofollow">墙外世界导航</a> <p>收录了中国大陆不能正常访问的网址</p></li>
                <li><a href="http://mwlmt.cc/d/" target="_blank" rel="nofollow">五花八门导航</a> <p>为用户提供门户、新闻、视频、游戏、小说、彩票等各种分类的优秀内容和网站入口</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="new">
            <i class="icon-globe"></i>发现新站
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://youquhome.com/" target="_blank" rel="nofollow">有趣网站之家</a> <p>收藏全球最有趣的网站</p></li>
                <li><a href="http://www.9866.cn/" target="_blank" rel="nofollow">9866趣站</a> <p>汇集全球最有趣的网站及新应用</p></li>
                <li><a href="http://www.siteboxs.com/" target="_blank" rel="nofollow">小站盒子</a> <p>发现、收藏、分享好站</p></li>
                <li><a href="http://www.zm1z.com/" target="_blank" rel="nofollow">最美1站</a> <p>发现最美好站</p></li>
                <li><a href="http://www.ytuijian.com/" target="_blank" rel="nofollow">要推荐</a> <p>推荐最有用的优秀网站</p></li>
                <li><a href="http://www.xuanchuan.vip/" target="_blank" rel="nofollow">网站宣传平台</a> <p>专为站长们而提供的一个免费宣传推广自己网站的平台。</p></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->    
</div>
<div id="nav-plane">
    <ul>
                <li class="active"><a class="notop" href="#ziyuan">资源搜索</a></li>
                <li><a class="notop" href="#kexue">科学上网</a></li>
                <li><a class="notop" href="#yingshi">影视资源</a></li>
                <li><a class="notop" href="#music2">音乐</a></li>
                <li><a class="notop" href="#picture">图片</a></li>
                <li><a class="notop" href="#design">设计</a></li>
                <li><a class="notop" href="#ruanjian">软件应用</a></li>
                <li><a class="notop" href="#program">编程</a></li>
                <li><a class="notop" href="#study">学习</a></li>
                <li><a class="notop" href="#cool">酷站</a></li>
                <li><a class="notop" href="#fuli">福利</a></li>
                <li><a class="notop" href="#daohang">导航</a></li>
    </ul>
</div>
</div>
</div>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>