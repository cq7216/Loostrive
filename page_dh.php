<?php
/*
Template Name: 导航首页
*/
?>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<script type="text/javascript">
jQuery(document).ready(function($){
// 自动获取网站图标并显示在链接前
$(".flink a").each(function(e){
    $(this).prepend("<img src=https://statics.dnspod.cn/proxy_favicon/_/favicon?domain="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '$1').replace( 'http://', '' )+">");
});
// 点击链接跳转到框架
$(".flink a:not(.noframe)").click(function(event){
    var link = this.href;
    var name = this.text;
    var newlink='http://taoxiaozhong.com/view.php?url='+link+'&name='+name;
    this.href = newlink;
});
});
</script>
<script src="../wp-content/themes/Loostrive/js/linkTip.js"></script>
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
            <i class="icon-bell"></i>网盘搜索
            <span class="sub-category"><a href="#ziyuan" class="current notop">所有</a>|<a href="#wangpan" class="notop">网盘搜索</a>|<a href="#bt" class="notop">BT搜索</a>|<a href="#othersearch" class="notop">其他搜索</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.xilinjie.com/" title="全能型网盘搜索引擎" target="_blank" rel="nofollow" class="linkTip">西林街</a></li>
                <li> <a href="http://www.panc.cc/" title="网盘资源搜索" target="_blank" rel="nofollow" class="linkTip">胖次搜索</a></li>
                <li> <a href="http://md5.daimugua.com/" title="网盘资源搜索"  target="_blank" rel="nofollow" class="linkTip">呆木瓜</a></li>
                <li><a href="http://so.baiduyun.me/" title="百度网盘论坛旗下的一个各大网盘搜索引擎" target="_blank" rel="nofollow" class="linkTip">网盘搜索引擎</a></li>
                <li><a href="http://so.ygyhg.com/" title="针对百度网盘专门优化的搜索引擎,所有资源无需注册回复即可免费下载" target="_blank" rel="nofollow" class="linkTip">百度云搜</a></li>
                <li><a href="http://wangpan.renrensousuo.com/" title="提供跨网盘搜索功能，可以快速帮助大家搜索到想要的学习资料" target="_blank" rel="nofollow" class="linkTip">众人搜索</a></li>
                <li><a href="http://md5.daimugua.com/" title="呆木瓜网，有你想要！找教程,找资料,java,C#,数据库,缓存等等" target="_blank" rel="nofollow" class="linkTip">呆木瓜</a></li>
                <li><a href="http://www.tebaidu.com/" title="特百度云提供百度云旗下的百度网盘搜索下载百度网盘的资源，支持百度网盘登陆" target="_blank" rel="nofollow" class="linkTip">特百度</a></li>
                <li><a href="http://www.panduoduo.net/" title="网盘搜索神器，收录百度云盘资源和新浪微盘资源等"  target="_blank" rel="nofollow" class="linkTip">盘多多</a></li>
                <li><a href="http://www.pansou.com/" title="数千万盘友首选" target="_blank" rel="nofollow" class="linkTip">盘搜</a></li>
                <li><a href="http://www.daysou.com/" title="国内优秀网盘资源搜索引擎,提供资源网盘下载服务" target="_blank" rel="nofollow" class="linkTip">云搜</a></li>
                <li><a href="http://www.xibianyun.com/" title="电子书搜索引擎,帮助读者快速查找互联网上免费电子书资源" target="_blank" rel="nofollow" class="linkTip">西边云</a></li>
                <li><a href="http://www.wodepan.com/" title="专业的网盘搜索引擎，爬取各个网盘的分享资源，可直接存到我的网盘" target="_blank" rel="nofollow" class="linkTip">我的盘</a></li>
                <li><a href="http://www.sopanpan.com/" title="提供百度云盘资源搜索服务和百度云资源下载分享" target="_blank" rel="nofollow" class="linkTip">搜盘盘</a></li>
                <li><a href="http://www.bdsola.com/newfile.php?Type=ALL" title="百度网盘搜索引擎,专业提供百度网盘搜索,可以搜索百度网盘各种资源" target="_blank" rel="nofollow" class="linkTip">网盘搜啦</a></li>
                <li><a href="http://www.wangpansou.cn/" title="最稳定的百度网盘搜索引擎" target="_blank" rel="nofollow" class="linkTip">网盘搜</a></li>
                <li> <a href="http://www.quzhuanpan.com" title="常用网盘资源搜索，百度网盘、360网盘等资源下载" target="_blank" rel="nofollow" class="linkTip">去转盘网</a></li>
                <li> <a href="http://www.iwapan.com/" title="网盘资源搜索" target="_blank" rel="nofollow" class="linkTip">爱挖盘</a></li>
                <li><a href="http://baidu.wangpanwu.com/" title="百度网盘中电影/电视剧/动漫/综艺/音乐等文件资源的搜索和下载" target="_blank" rel="nofollow" class="linkTip">网盘屋</a></li>
                <li><a href="http://www.biliworld.com" title="找资源上哔哩搜索，速度最快资源最多的网盘搜索神器" target="_blank" rel="nofollow" class="linkTip">哔哩网盘搜索</a></li>
                <li><a href="http://www.tuoniao.me/" title="最专业最好用的资源搜索与推荐平台" target="_blank" rel="nofollow" class="linkTip">鸵鸟搜索</a></li>
                <li><a href="http://allsearch.vip/" title="仅需一个页面即可快捷搜索180多个类似于知乎这样在各领域都很优秀的网站，大大减少的用户搜索时间，提升工作效率！" target="_blank" rel="nofollow" class="linkTip">AllSearch全能搜索</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="bt">
            <i class="icon-bell"></i>BT搜索
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.btsoso.com/" title="磁力链接搜索引擎" target="_blank" rel="nofollow" class="linkTip">BT搜搜</a></li>
                <li><a href="http://www.juzisousuo.com/" title="橘子搜索是目前国内最专业磁力链接搜索引擎，精准高效的为您提供最新最热的bt资源的搜索信息" target="_blank" rel="nofollow" class="linkTip">橘子搜索</a></li>
                <li> <a href="http://www.btks.me/" title="种子搜索，磁力搜索" target="_blank" rel="nofollow" class="linkTip">BT快搜</a></li>
                <li> <a href="http://meg.chongbuluo.com/" title="磁力搜索，种子搜索，网盘搜索等等" target="_blank" rel="nofollow" class="linkTip">虫部落磁力搜索 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://banyungong.net/" title="影视种子磁力搜索" target="_blank" rel="nofollow" class="linkTip">搬运工</a></li>
                <li><a href="http://snsoso.com/" title="全球资源最多的BT种子搜索网站，通过DHT磁力链接索引了3亿个BT种子" target="_blank" rel="nofollow" class="linkTip">神牛搜搜</a></li>
                <li><a href="http://www.breadsearch.com/" title="功能强大的磁力链接搜索引擎，拥有高效精准的搜索服务、极速稳定的浏览体验" target="_blank" rel="nofollow" class="linkTip">面包搜索</a></li>
                <li><a href="http://www.cilisou.cn/" title="最稳定最好用的DHT磁力搜索引擎" target="_blank" rel="nofollow" class="linkTip">磁力搜</a></li>
                <li><a href="http://btlibrary.net/" title="在BT图书馆(BTLibrary)搜索最新高清电影、美剧大片、游戏" target="_blank" rel="nofollow" class="linkTip">btlibrary</a></li>
                <li><a href="http://btkitty.pw/" title="专业BT种子搜索神器、下载利器，免费下载各种BT种子" target="_blank" rel="nofollow" class="linkTip">BT kitty</a></li>
                <li><a href="http://diggbt.net/" title="提供从DHT网络抓取的磁力链接以及其他网站提供的下载链接" target="_blank" rel="nofollow" class="linkTip">Diggbt</a></li>
                <li><a href="http://www.bthand.com/" title="索引了全球最新最热门的BT种子信息和磁力链接，提供磁力链接搜索、BT种子搜索" target="_blank" rel="nofollow" class="linkTip">BTbook</a></li>
                <li><a href="http://www.btmayi.me/" title="磁力搜索,磁力链接,种子搜索,迅雷下载,种子搜索网站,BT天堂,BT樱桃,BT搜索" target="_blank" rel="nofollow" class="linkTip">bt蚂蚁</a></li>
                <li><a href="http://btrabbit.com/" title="BT兔子-BT资源搜索引擎" target="_blank" rel="nofollow" class="linkTip">BTRabbit</a></li>
                <li><a href="http://www.xunleihd.com/" title="纯绿色，可预览，史上最强种子搜索器" target="_blank" rel="nofollow" class="linkTip shanchu">TSearch种子搜索器</a></li>
                <li> <a href="http://www.bt-soso.com/" title="全网无弹窗的BT搜索" target="_blank" rel="nofollow" class="linkTip shanchu">BT-SOSO</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="othersearch">
            <i class="icon-bell"></i>其他搜索
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://img.chongbuluo.com/" title="图片聚合搜索引擎" target="_blank" rel="nofollow" class="linkTip noframe">虫部落图搜</a></li>
                <li> <a href="http://shitu.baidu.com/" title="通过图像识别和检索技术，为你提供全网海量、实时的图片信息" target="_blank" rel="nofollow" class="linkTip noframe">百度识图</a></li>
                <li><a href="http://robin8.net/" title="Robin8是基于大数据的网红和新媒体广告平台，Robin8的NLP系统可以帮助品牌找到最合适的网红和新媒体。" target="_blank" rel="nofollow" class="linkTip">网红搜索</a></li>
                <li><a href="http://weixin.sogou.com/" title="微信公众平台搜索引擎" target="_blank" rel="nofollow" class="linkTip">微信搜索</a></li>
                <li><a href="http://www.taguage.com/" title="Taguage，好用的脑洞搜索引擎" target="_blank" rel="nofollow" class="linkTip">Taguage脑洞搜索</a></li>
                <li> <a href="http://www.soogif.com/" title="SOOGIF提供搞笑、表情、美女、明星、热门事件GIF动图全搜索，QQ、微信斗图神器，微信公众号、微博编辑GIF动图素材库，好玩的GIF出处发源地。GIF工具支持GIF压缩、GIF制作、GIF裁剪等功能。" target="_blank" rel="nofollow" class="linkTip">GIF动图搜索平台</a></li>
                <li> <a href="http://www.piggif.com/" title="小猪动图是一个GIF动图搜索引擎,提供GIF动图素材和GIF在线制作工具。素材包括搞笑、表情、美女、明星、影视、热门事件等无水印GIF动图；GIF工具支持GIF压缩、GIF制作、视频转GIF等功能。" target="_blank" rel="nofollow" class="linkTip">小猪动图</a></li>
                <li> <a href="http://www.owllook.net/" title="整合互联网搜索引擎的网络小说搜索结果，并去除无用的链接以及过滤小说内容中的广告，给用户无广告、最简洁清新的阅读环境。" target="_blank" rel="nofollow" class="linkTip">网络小说搜索阅读</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="yingshi">
        <h1 class="lefttitle">影视资源</h1>
        <h2 class="nav-title" id="gaoqing">
            <i class="icon-play-sign"></i>高清大片
            <span class="sub-category"><a href="#yingshi" class="current notop">所有</a>|<a href="#gaoqing" class="notop">高清大片</a>|<a href="#btys" class="notop">BT影视</a>|<a href="#watch" class="notop">在线影院</a>|<a href="#duanshipin" class="notop">短视频</a>|<a href="#shipinzimeiti" class="notop">视频自媒体</a>|<a href="#danmu" class="notop">弹幕直播</a>|<a href="#jilupian" class="notop">纪录片</a>|<a href="#dongman" class="notop">动漫</a>|<a href="#zimu" class="notop">字幕</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.id97.com/" title="分享最新电影的网站，你可以在这里免费下载最新电影、经典大片" target="_blank" rel="nofollow" class="linkTip">97电影网<img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.dysfz.net/" title="国内最优秀的高清电影下载网站，每天更新迅雷电影下载" target="_blank" rel="nofollow" class="linkTip">电影首发站</a></li>
                <li> <a href="http://www.loldytt.com/" title="为广大网友提供最新电影下载、迅雷电影下载、高清电影BT种子下载" target="_blank" rel="nofollow" class="linkTip">LOL电影天堂</a></li>
                <li> <a href="http://www.xiamp4.com/" title="提供最新最快电影资讯，迅雷看看电影点播以及迅雷电影下载" target="_blank" rel="nofollow" class="linkTip">迅播影院</a></li>
                <li> <a href="http://www.66ys.tv/" title="每天搜集最新电影。为使用迅雷7软件的用户提供最新的电影下载" target="_blank" rel="nofollow" class="linkTip">66影视</a></li>
                <li> <a href="http://www.lbldy.com/" title="拥有最全的最新电影下载,电视,动漫,综艺,纪录片等迅雷下载资源" target="_blank" rel="nofollow" class="linkTip">龙部落</a></li>
                <li> <a href="http://www.nb40.com/" title="集热门电影在线播放优酷电影特权播放迅雷下载与电驴" target="_blank" rel="nofollow" class="linkTip">牛B四十</a></li>
                <li> <a href="http://www.8gdyhd.com/" title="最干净的免费电影网,给你更方便的视频门户网站体验" target="_blank" rel="nofollow" class="linkTip">八哥电影</a></li>
                <li> <a href="http://www.dygang.com/" title="每天搜集最新的电影，高清电影" target="_blank" rel="nofollow" class="linkTip">电影港</a></li>
                <li> <a href="http://www.btchina.us/" title="提供最新的电影介绍及评论包括上映影片的影讯" target="_blank" rel="nofollow" class="linkTip">电影联盟</a></li>
                <li> <a href="http://www.dytt8.net/" title="最好的迅雷电影下载网，分享最新电影" target="_blank" rel="nofollow" class="linkTip">电影天堂①</a></li>
                <li> <a href="http://www.dy2018.com/" title="最好的迅雷电影下载网，分享最新电影" target="_blank" rel="nofollow" class="linkTip">电影天堂②</a></li>
                <li> <a href="http://www.zxysz.com/" title="追踪最新最清晰的电影电视剧资源,网罗最新网络影视资源" target="_blank" rel="nofollow" class="linkTip">最新影视站</a></li>
                <li> <a href="http://www.kneng.net/" title="专注于最新影视BT" target="_blank" rel="nofollow" class="linkTip shanchu">可能影视</a></li>
                <li> <a href="http://movie002.com/" title="影视导航网站，提供电影大全、电视剧大全等影视大全" target="_blank" rel="nofollow" class="linkTip">电影小二</a></li>
                <li> <a href="http://www.ttmeiju.com/" title="第一时间为您提供最火最新的高清美剧片源下载" target="_blank" rel="nofollow" class="linkTip">天天美剧</a></li>
                <li> <a href="http://www.yugaopian.com/" title="提供最新、最热门的高清电影预告片、电影花絮" target="_blank" rel="nofollow" class="linkTip">预告片世界</a></li>
                <li> <a href="http://www.gaoqingkong.com/" title="热衷于高清发烧，每日关注高清影视" target="_blank" rel="nofollow" class="linkTip">高清控联盟</a></li>
                <li> <a href="http://www.lanyingwang.com/" title="高清种子下载网站" target="_blank" rel="nofollow" class="linkTip">蓝影网</a></li>
                <li> <a href="http://www.yinfans.com/" title="高清蓝光电影资源的精选网站，分享顶级蓝光原盘下载资源" target="_blank" rel="nofollow" class="linkTip">音范丝</a></li>
                <li> <a href="http://gaoqing.la/" title="每天关注提供720p高清、1080p高清、蓝光原盘高清" target="_blank" rel="nofollow" class="linkTip">中国高清网</a></li>
                <li> <a href="http://www.i1080.cn/" title="提供720P高清、1080P超清、蓝光原盘、3D高清、IMAX巨幕高清电影" target="_blank" rel="nofollow" class="linkTip">艾米电影网</a></li>
                <li> <a href="http://www.hd1080.cn/" title="每日提供最新蓝光高清电影、蓝光高清原盘、720p高清、1080p高清" target="_blank" rel="nofollow" class="linkTip">蓝光电影网</a></li>
                <li> <a href="http://www.rs05.com/" title="高清电影下载网站，每天更新迅雷电影下载" target="_blank" rel="nofollow" class="linkTip">人生05电影</a></li>
                <li> <a href="http://www.moviewg.com/" title="提供最新最热门的国内外HD电影资源下载分享" target="_blank" rel="nofollow" class="linkTip">电影王国</a></li>
                <li> <a href="http://www.youzhidy.com/" title="1080P高清电影下载、蓝光原盘高清电影下载、迅雷高清电影下载" target="_blank" rel="nofollow" class="linkTip">优质电影网</a></li>
                <li> <a href="http://www.hdwan.net" title="提供最新的720P、1080P高清电影BT种子下载" target="_blank" rel="nofollow" class="linkTip">海盗湾</a></li>
                <li> <a href="http://www.xiagaoqing.com" title="分享3D，蓝光超清，1080P超清，720P高清影视" target="_blank" rel="nofollow" class="linkTip">下高清电影网</a></li>
                <li> <a href="http://www.iidvd.com/" title="提供最新电影电视剧及好看的节目在线观看及视频下载" target="_blank" rel="nofollow" class="linkTip">iiDVD</a></li>
                <li> <a href="http://www.bubuqing.com/" title="最新电视剧,最新电影免费下载" target="_blank" rel="nofollow" class="linkTip">步步情</a></li>
                <li> <a href="http://www.m1910.com/" title="只收录经典影片" target="_blank" rel="nofollow" class="linkTip">经典电影网</a></li>
                <li> <a href="http://www.beiwo.tv/" title="为用户提供近千部正版免费在线点播影片" target="_blank" rel="nofollow" class="linkTip noframe">被窝电影</a></li>
                <li> <a href="http://www.gagays.com/" title="一个非常牛逼的电影资源下载站" target="_blank" rel="nofollow" class="linkTip">嘎嘎影视</a></li>
                <li> <a href="http://www.80s.tw/" title="最新MP4手机电影下载" target="_blank" rel="nofollow" class="linkTip">80s手机电影</a></li>
                <li> <a href="http://www.58keke.com/" title="电影资源搬运工" target="_blank" rel="nofollow" class="linkTip">壳壳影吧</a></li>
                <li> <a href="http://www.6vhao.com/" title="日剧.韩剧连载免费下载" target="_blank" rel="nofollow" class="linkTip">6V电影网</a></li>
                <li> <a href="http://www.aikanmeiju.com/" title="提供最新的美剧下载观看" target="_blank" rel="nofollow" class="linkTip">爱看美剧网</a></li>
                <li> <a href="http://www.666hdhd.com/" title="高清电影网，高清电影网为你带来最新电影观看，以及下载。" target="_blank" rel="nofollow" class="linkTip">高清电影网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="btys">
            <i class="icon-play-sign"></i>BT影视
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://btbt.tv/" title="BT电影天堂网为您提供迅雷高清BT电影下载,迅雷BT电影种子下载,最新高清电影免费下载服务@BTBT.TV" target="_blank" rel="nofollow" class="linkTip">BT电影天堂</a></li>
                <li> <a href="http://www.rarbt.com/" title="超全1080p高清电影BT种子下载,更新快" target="_blank" rel="nofollow" class="linkTip">RARBT种子</a></li>
                <li> <a href="http://www.btago.com/" title="资源搜索汇聚平台" target="_blank" rel="nofollow" class="linkTip">BTago</a></li>
                <li> <a href="http://www.btbbt.cc/" title="最快提供最新最全高清电影、动漫、韩剧、美剧等BT迅雷下载以及资讯" target="_blank" rel="nofollow" class="linkTip">BT之家</a></li>
                <li> <a href="http://moviejie.com" title="最新最全的高清电影和美剧下载" target="_blank" rel="nofollow" class="linkTip">电影街</a></li>
                <li> <a href="http://cili008.com" title="提供最新最快的美剧、电影、韩剧、日剧资源的下载站" target="_blank" rel="nofollow" class="linkTip">MAG磁力</a></li>
                <li> <a href="http://www.btbtw.com/sort-1-1.html" title="bt种子下载站,磁力链接下载站" target="_blank" rel="nofollow" class="linkTip">BTBTW</a></li>
                <li> <a href="http://www.btbbt.org" title="专注高质量种子下载服务" target="_blank" rel="nofollow" class="linkTip">BTBBT</a></li>
                <li> <a href="http://www.etdown.net" title="提供最新最全的高清影视下载的资源平台" target="_blank" rel="nofollow" class="linkTip">光影资源联盟</a></li>
                <li> <a href="http://rarbg.to/torrents.php" title="国外资源站" target="_blank" rel="nofollow" class="linkTip noframe">Rarbg</a></li>
                <li> <a href="http://www.xiaohx.net/" title="资源下载分享平台，免费提供最新最齐全高清电影" target="_blank" rel="nofollow" class="linkTip">小浣熊</a></li>
                <li> <a href="http://www.ed2000.com/Type/%E7%94%B5%E5%BD%B1" title="ED2000为您提供最新综艺、动漫、音乐、游戏、图书、软件、资料、教育等各类资源" target="_blank" rel="nofollow" class="linkTip">ED2000资源影视</a></li>
                <li> <a href="http://www.btbtt.co/" title="BT之家单版社区平台，最快提供最新最全高清电影、动漫、韩剧、日剧、美剧、无损音乐、体育、小说等BT迅雷下载以及资讯！影视爱好者的聚集地的~BT电影天堂之家 " target="_blank" rel="nofollow" class="linkTip">BT之家单版社区平台</a></li>
                <li> <a href="http://pianyuan.net/" title="电影下载,美剧下载,韩剧下载,片源下载,高清电影 " target="_blank" rel="nofollow" class="linkTip">片源网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="watch">
            <i class="icon-play-sign"></i>在线影院
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.1905.com/" title="电影频道官方网站" target="_blank" rel="nofollow" class="linkTip">1905电影网</a></li>
                <li> <a href="http://www.jxvdy.com" title="涵盖资源分享、教学、交易、海选的微电影一站式服务平台" target="_blank" rel="nofollow" class="linkTip">金象微电影</a></li>
                <li> <a href="http://www.197c.com/" title="在线看微电影" target="_blank" rel="nofollow" class="linkTip">爱微电影</a></li>
                <li> <a href="http://www.8eoe.com/category/dianying" title="未上映以及收费电影在线免费看，无需下载" target="_blank" rel="nofollow" class="linkTip">酷客在线电影</a></li>
                <li> <a href="http://www.djhuo.com/" title="最新最火的视频短片,电影,电视剧在线无广告收看" target="_blank" rel="nofollow" class="linkTip">DJ火影</a></li>
                <li> <a href="http://www.lalilali.com/" title="提供在线播放及电影下载" target="_blank" rel="nofollow" class="linkTip">啦哩拉哩电影网</a></li>
                <li> <a href="http://www.kan8090.com/" title="提供全能免费在线播放电影网站" target="_blank" rel="nofollow" class="linkTip">8090电影</a></li>
                <li> <a href="http://www.9080.tv" title="9080电影网YY6080视觉影院为你提供热门电影在线观看,高清电影下载" target="_blank" rel="nofollow" class="linkTip">9080TV</a></li>
                <li> <a href="http://www.xiaoztv.com/" title="手机电脑在线播放最新最好看的热映电影、电视剧、以及各种恐怖片" target="_blank" rel="nofollow" class="linkTip shanchu">小ZTV</a></li>
                <li> <a href="http://www.gua5.com/" title="好看的电影排行榜 - 手机电影推荐第一站！" target="_blank" rel="nofollow" class="linkTip">瓜小影</a></li>
                <li> <a href="http://www.jinzidu.com/" title="仅支持手机在线看电影，电脑请用手机浏览器观看" target="_blank" rel="nofollow" class="linkTip">免费手机影院</a></li>
                <li> <a href="http://www.meiyouad.com/" title="全网VIP视频免费观看" target="_blank" rel="nofollow" class="linkTip shanchu">MeiYouAd</a></li>
                <li> <a href="http://www.y3600.com/" title="支持手机、电脑在线观看热播韩剧、热播日剧" target="_blank" rel="nofollow" class="linkTip">热播韩剧网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.ppypp.cc/" title="一个不用下载播放器首发电影网站" target="_blank" rel="nofollow" class="linkTip">PPYPP影院</a></li>
                <li> <a href="http://www.id97.com/" title="部分电影在线观看" target="_blank" rel="nofollow" class="linkTip">PVideos</a></li>
                <li> <a href="http://www.tzmp4.com/" title="电脑、手机电影在线观看" target="_blank" rel="nofollow" class="linkTip">桃子影视</a></li>
                <li> <a href="http://www.8haohao.com/" title="免费高清电影,电视剧在线观看" target="_blank" rel="nofollow" class="linkTip">8号影院</a></li>
                <li> <a href="http://www.949d.com/" title="最干净的免费电影网,给你更方便的视频门户网站体验,我们一起畅享高清无广告最新电影电视剧" target="_blank" rel="nofollow" class="linkTip">949电影网</a></li>
                <li> <a href="http://www.yingshidaquan.cc/" title="提供电影点播、迅雷下载，同时提供各大视频网站视频无广告在线云点播" target="_blank" rel="nofollow" class="linkTip">影视大全</a></li>
                <li> <a href="http://www.upian.cc/" title="优片库收集整理好看的电影、经典电影，支持迅雷电影下载和西瓜影音在线观看" target="_blank" rel="nofollow" class="linkTip">优片网</a></li>
                <li> <a href="http://www.ismdy.com/" title="神马知道你不想安装播放器，所以我们人性了一次，全力支持在线云点播，无需安装播放器，超快缓冲，免费观看" target="_blank" rel="nofollow" class="linkTip">爱神马电影</a></li>
                <li> <a href="http://www.smmj.tv/" title="提供最新的天天美剧以好看的美剧作为基础，实时刷新美剧天堂排行榜和美剧天堂排行榜。人人美剧更新速度最快的美剧排行榜的经典美剧，引领不用下载播放器的神马美剧电影网时代!" target="_blank" rel="nofollow" class="linkTip">神马美剧</a></li>
                <li> <a href="http://www.45k.tv/" title="免费视频点播平台!" target="_blank" rel="nofollow" class="linkTip">45K影院</a></li>
                <li> <a href="http://wuai.tv/" title="国内首家对外开放的免费影视资源点播平台，影片包括，最新电视剧，国产剧，欧美剧，韩国剧，热门电影，综艺大全，国产动漫，日本动漫，海外动漫，每天第一时间更新，全力打造国内影视第一平台!" target="_blank" rel="nofollow" class="linkTip">吾爱电影网</a></li>
                <li> <a href="http://www.leibo.tv/" title="提供手机电脑免插件软件即可在线点播2016最新的高清电影,高清电视剧，将免费进行到底" target="_blank" rel="nofollow" class="linkTip">雷波TV影视网</a></li>
                <li> <a href="http://www.dy28.cn/" title="电影28网提供最新最快最全的电影资讯，提供迅雷看看西瓜电影点播、迅雷电影下载，百度云电影下载，同时提供各大视频网站视频无广告在线云点播！" target="_blank" rel="nofollow" class="linkTip">电影28网</a></li>
                <li> <a href="http://hannikan.com/" title="喊你看影院高清影视中心,致力于提供最新高清电影，高清电视剧，高清动漫在线观看。并且免费提供高清电影下载，高清电影观看等高清影视服务" target="_blank" rel="nofollow" class="linkTip">喊你看影院</a></li>
                <li> <a href="http://www.timemp4.com/" title="拾光网,拾光电影,拾光电影网分享最新电影的百度云资源,海量百度云资源等着你。" target="_blank" rel="nofollow" class="linkTip">拾光电影</a></li>
                <li> <a href="http://www.91rebo.com" title="免费在线看全网的视频" target="_blank" rel="nofollow" class="linkTip">91热播影视</a></li>
                <li> <a href="http://www.kankanwu.com/" title="在线观看高清电影，每天第一时间更新，放送好看的迅雷电影下载" target="_blank" rel="nofollow" class="linkTip">看看屋</a></li>
                <li> <a href="http://www.1909.tv/" title="提供当下最新、最火各类好看的电影大片在线观看服务" target="_blank" rel="nofollow" class="linkTip">1909.TV</a></li>
                <li> <a href="http://www.5577.tv/" title="无需播放器在线观看，手机在线观看" target="_blank" rel="nofollow" class="linkTip">5577电影网</a></li>
                <li> <a href="http://www.82ke.com/" title="最干净的免费电影网,给你更方便的视频门户网站体验,让我们一起畅享高清无广告电影电视" target="_blank" rel="nofollow" class="linkTip">94神马电影网</a></li>
                <li> <a href="http://www.yehetang.com/" title="我们只做在线播放！提供最新首发电影大片、全集电视剧、综艺及动漫等影片在线观看" target="_blank" rel="nofollow" class="linkTip">野荷塘</a></li>
                <li> <a href="http://www.dy530.com/" title="手机免费在线看电影" target="_blank" rel="nofollow" class="linkTip">手机在线电影</a></li>
                <li> <a href="http://www.lalilali.com/" title="拉免费为大家提供最新美剧资源，种最新电影信息" target="_blank" rel="nofollow" class="linkTip">拉里拉里</a></li>
                <li> <a href="http://www.tufutv.com/" title="屠夫网给您提供最新,最热门电影天堂免费视频在线观看网站" target="_blank" rel="nofollow" class="linkTip">屠夫网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="duanshipin">
            <i class="icon-play-sign"></i>短视频
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.vmovier.com/" title="国内最大的短片分享平台,汇集优秀视频短片及微电影创作人" target="_blank" rel="nofollow" class="linkTip">V电影</a></li>
                <li> <a href="http://www.xinpianchang.com/" title="新片场_最大的互联网影视出品发行平台" target="_blank" rel="nofollow" class="linkTip">新片场</a></li>
                <li><a href="http://www.kaiyanapp.com/" title="精选视频推介，每天大开眼界！非原创，视频搬运工" target="_blank" rel="nofollow" class="linkTip">开眼</a></li>
                <li> <a href="http://uyoumi.com/" title="汇聚优质短视频" target="_blank" rel="nofollow" class="linkTip">优觅短视频</a></li>
                <li> <a href="http://www.7791.com.cn/" title="叫兽网是一个弹幕视频网站。提供吐槽视频、歪歌视频、脱口秀、恶搞视频、等在线播放，叫兽易小星、老湿、砖家等网络名人全在这里！" target="_blank" rel="nofollow" class="linkTip">叫兽网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="shipinzimeiti">
            <i class="icon-globe"></i>视频自媒体
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.yitiao.tv/" title="一家主打生活短视频的互联网新媒体，每天一条原创短视频" target="_blank" rel="nofollow" class="linkTip">一条</a></li>
                <li><a href="http://www.ergengtv.com/" title="二更影视平台，依托自身媒体品牌影响力构建“媒介、客户、内容”三方生态系统，实现集视频内容创作、营销推广、商业项目对接、影视人才培训与互动、云端技术服务等功能于一体，致力于打造中国最大的影视平台。" target="_blank" rel="nofollow" class="linkTip">二更</a></li>
                <li><a href="http://www.yiketalks.com/" title="邀请世界上的思想领袖与实干家来分享他们的事业、故事创意和想法，这些来自世界各地不同领域的专业人才和深藏不露的绝妙素人，将带来极具前瞻性的话题，把思想精华浓缩在15分钟，讲述知识与创意的精髓，碰撞思想的火花。" target="_blank" rel="nofollow" class="linkTip">一刻talks</a></li>
                <li><a href="http://yixi.tv/" title="听君一席话，胜读十年书。（Get Inspired） 一席鼓励分享见解、体验和对未来的想象，做有价值的传播。" target="_blank" rel="nofollow" class="linkTip">一席</a></li>
                <li><a href="http://www.liangzi.tv/" title="一家围绕年轻人提供多维度视频内容的移动端互动视频平台" target="_blank" rel="nofollow" class="linkTip">量子频道</a></li>
                <li><a href="http://www.feidieshuo.com/" title="知识从未如此性感" target="_blank" rel="nofollow" class="linkTip">飞碟说</a></li>
                <li><a href="http://i.youku.com/luojisw" title="目前影响力较大的互联网知识社群，有种、有趣、有料" target="_blank" rel="nofollow" class="linkTip">罗辑思维</a></li>
                <li><a href="http://v.qq.com/vplus/e22ba1df7dc890ac/videos" title="属于黑马的IT爱好者正能量社群。黑马三分钟，每天一个原创" target="_blank" rel="nofollow" class="linkTip">黑马公社</a></li>
                <li><a href="http://i.youku.com/1986haohaohan" title="热爱音乐，尊重艺术，用音乐的手传播爱！" target="_blank" rel="nofollow" class="linkTip">郝浩涵梦工厂</a></li>
                <li><a href="http://i.youku.com/cyanney" title="每集教会你做一道菜 介绍一位有趣的人 展现一种独特的生活方式 相信无论谁都避免不了一人食 即便食物简单也可以吃的很开心 所以，一个人也要好好吃饭！" target="_blank" rel="nofollow" class="linkTip">一人食</a></li>
                <li><a href="http://weibo.com/rishiji" title="一日一食一记，微博签约自媒体" target="_blank" rel="nofollow" class="linkTip">日食记</a></li>
                <li><a href="http://weibo.com/ohmygossip" title="关八日报，每天有料" target="_blank" rel="nofollow" class="linkTip">关爱八卦成长协会</a></li>
                <li><a href="http://weibo.com/cxldb" title="网络新锐导演 微博签约自媒体" target="_blank" rel="nofollow" class="linkTip">陈翔六点半</a></li>
                <li><a href="http://weibo.com/xiaopapi" title="微博原创视频博主" target="_blank" rel="nofollow" class="linkTip">Papi酱</a></li>
                <li><a href="http://weibo.com/amogood" title="X分钟带你看完电影”系列原創者 微博签约自媒体" target="_blank" rel="nofollow" class="linkTip">谷阿莫</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="danmu">
            <i class="icon-play-sign"></i>弹幕直播
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.acfun.tv/" title="AcFun是一家弹幕视频网站，致力于为每一个人带来欢乐" target="_blank" rel="nofollow" class="linkTip">AcFun（A站）</a></li>
                <li> <a href="http://www.bilibili.com" title="新鲜有趣的动画、游戏相关的弹幕视频分享网站" target="_blank" rel="nofollow" class="linkTip">哔哩哔哩（B站）</a></li>
                <li> <a href="http://www.danmu.com/" title="danmu弹幕主义网" target="_blank" rel="nofollow" class="linkTip">D站</a></li>
                <li> <a href="http://www.missevan.com/" title="M站是第一家弹幕音图站,同时也是中国声优基地" target="_blank" rel="nofollow" class="linkTip">M站</a></li>
                <li> <a href="http://www.idanmu.com/" title="ACG弹幕视频以及二次元资源互动分享平台" target="_blank" rel="nofollow" class="linkTip">爱弹幕</a></li>
                <li> <a href="http://thvideo.tv/" title="东方Project专门弹幕视频网站" target="_blank" rel="nofollow" class="linkTip">THvideo</a></li>
                <li> <a href="http://www.qiaoba.tv/" title="专注优质创意短片分享，做更有质量的视频" target="_blank" rel="nofollow" class="linkTip">瞧吧</a></li>
                <li> <a href="http://danmu.tudou.com/" title="土豆视频官方弹幕网" target="_blank" rel="nofollow" class="linkTip">土豆弹幕</a></li>
                <li> <a href="http://www.5moe.com/" title="5moe弹幕网，原名dilili，嘀哩哩弹幕网，被广大网友称为d站" target="_blank" rel="nofollow" class="linkTip">我盟</a></li>
                <li> <a href="http://www.bilibilijj.com/" title="在这你可下载到对应AV号(B站视频编号)的视频(包括福利)、MP3和弹幕文件" target="_blank" rel="nofollow" class="linkTip">哔哩哔哩唧唧</a></li>
                <li> <a href="http://www.douyutv.com/" title="全民直播平台" target="_blank" rel="nofollow" class="linkTip">斗鱼TV</a></li>
                <li> <a href="http://www.zhanqi.tv/" title="提供高清、流畅的视频直播和电子竞技游戏直播" target="_blank" rel="nofollow" class="linkTip">战旗TV</a></li>
                <li> <a href="http://www.huya.com/" title="中国领先的互动直播平台" target="_blank" rel="nofollow" class="linkTip">虎牙直播</a></li>
                <li> <a href="http://www.panda.tv/" title="最娱乐的直播平台_PandaTV" target="_blank" rel="nofollow" class="linkTip">熊猫TV</a></li>
                <li> <a href="http://www.longzhu.com/" title="第一游戏直播平台" target="_blank" rel="nofollow" class="linkTip">龙珠直播</a></li>
                <li> <a href="http://www.huomaotv.cn/" title="年轻人的直播社区" target="_blank" rel="nofollow" class="linkTip">火猫TV</a></li>
                <li> <a href="http://www.zhangyu.tv/" title="中国最大的原创体育直播平台" target="_blank" rel="nofollow" class="linkTip">章鱼TV</a></li>
                <li> <a href="http://www.tiantian.tv/" title="努力做最好的体育直播吧" target="_blank" rel="nofollow" class="linkTip">天天直播</a></li>
                <li> <a href="http://www.quanmin.tv/" title="开启全民直播时代" target="_blank" rel="nofollow" class="linkTip noframe">全民直播</a></li>
                <li> <a href="http://live.bilibili.com/" title="国内首家关注 ACG 直播的互动平台" target="_blank" rel="nofollow" class="linkTip">bilibili直播</a></li>
                <li> <a href="http://jia.360.cn/pc/" title="最火的视频直播真人生活秀平台" target="_blank" rel="nofollow" class="linkTip">水滴直播</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="jilupian">
            <i class="icon-play-sign"></i>纪录片
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.jlpcn.net" title="提供探索频道、国家地理、BBC等最新纪录片资源下载" target="_blank" rel="nofollow" class="linkTip">纪录片天地</a></li>
                <li> <a href="http://www.laojilu.com/" title="中文字幕纪录片下载" target="_blank" rel="nofollow" class="linkTip">老记录</a></li>
                <li><a href="http://www.jiluniwo.cn/" title="纪录片推荐/分享，本网站提供纪录片下载地址" target="_blank" rel="nofollow" class="linkTip">记录你我</a></li>
                <li><a href="http://jilupian.xzwyu.com/" title="源于对自我及世界的探索而生，接纳智慧，惠及他者，在自由领地践行" target="_blank" rel="nofollow" class="linkTip">行者物语</a></li>
                <li><a href="http://zheniuer.com/" title="自由与开放的纪录片数据库及1080P高清资源共享下载" target="_blank" rel="nofollow" class="linkTip">这牛儿纪录片</a></li>
                <li><a href="http://jishi.cntv.cn/" title="中国纪录片第一频道，最新、高清正版海量纪录片" target="_blank" rel="nofollow" class="linkTip">央视纪实</a></li>
                <li><a href="http://www.iqiyi.com/jilupian/" title="爱奇艺纪录片频道，集合最优秀的国内外高清正版纪录片资源" target="_blank" rel="nofollow" class="linkTip">爱奇艺纪录片</a></li>
                <li><a href="http://jilupian.youku.com/" title="优酷视频服务平台,提供视频播放,视频发布,视频搜索,视频分享" target="_blank" rel="nofollow" class="linkTip">优酷纪录片</a></li>
                <li><a href="http://jilupian.tudou.com/" title="汇集大量高清优质影像资源，以青春活力的视角带你横跨古今，领略世间百态" target="_blank" rel="nofollow" class="linkTip">土豆纪实</a></li>
                <li><a href="http://tv.sohu.com/documentary/" title="中国成立最早，影响力最大的纪录片在线门户" target="_blank" rel="nofollow" class="linkTip">搜狐纪录片</a></li>
                <li><a href="http://v.qq.com/doco/" title="免费提供在线纪录片观看" target="_blank" rel="nofollow" class="linkTip">腾讯纪录片</a></li>
                <li><a href="http://v.ifeng.com/documentary/" title="汇聚众多珍贵影像资源，互联网纪录片内容平台的领军者" target="_blank" rel="nofollow" class="linkTip">凤凰纪录片</a></li>
                <li><a href="http://jilu.letv.com/" title="提供国内外最精彩的纪录片视频,打造最权威的纪录片视频平台" target="_blank" rel="nofollow" class="linkTip">乐视纪录片</a></li>
                <li><a href="http://www.bilibili.com/video/tech-popular-science-1.html" title="国内知名的视频弹幕网站，边看纪录片边聊天" target="_blank" rel="nofollow" class="linkTip">bilibili纪录</a></li>
                <li><a href="http://v.163.com/jishi/" title="纪录·影人·社会·焦点·文化·生活·军事·科技·自然·探险·人物·历史" target="_blank" rel="nofollow" class="linkTip">网易纪录片</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="dongman">
            <i class="icon-play-sign"></i>动漫
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.dilidili.com/" title="新作经典轮番推荐" target="_blank" rel="nofollow" class="linkTip">嘀哩嘀哩</a></li>
                <li><a href="http://www.kisssub.org/" title="爱恋字幕社官方BT分享站，动画～漫画～游戏～动漫音乐～片源（RAW）资源聚集地" target="_blank" rel="nofollow" class="linkTip">爱恋BT</a></li>
                <li><a href="http://d.dmm.hk/" title="免费高清动漫下载、日本动漫下载、动画下载" target="_blank" rel="nofollow" class="linkTip">卜卜酱动漫</a></li>
                <li><a href="http://dmxz.zerodm.com/" title="免费高清动漫下载、日本动漫下载网站" target="_blank" rel="nofollow" class="linkTip">zero动漫</a></li>
                <li><a href="http://dm1080p.com/" title="D动漫1080P | 高清动漫下载资料站" target="_blank" rel="nofollow" class="linkTip">D动漫1080p</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zimu">
            <i class="icon-play-sign"></i>字幕
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.disanlou.org/" title="电影字幕下载网站大全，字幕组大全" target="_blank" rel="nofollow" class="linkTip">第三楼字幕 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.zimuzu.tv/" title="集合最新海外影视剧下载,字幕下载的网站" target="_blank" rel="nofollow" class="linkTip">YYeTs字幕组</a></li>
                <li><a href="http://sub.makedie.me/" title="超全的在线字幕搜索下载网站，支持视频拖拽" target="_blank" rel="nofollow" class="linkTip">伪射手</a></li>
                <li><a href="http://dbfansub.com/" title="超全的在线字幕搜索下载网站，支持视频拖拽" target="_blank" rel="nofollow" class="linkTip">电波字幕组</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="music2">
        <h1 class="lefttitle">音乐</h1>
        <h2 class="nav-title" id="tingge">
            <i class="icon-asterisk"></i>在线听歌
            <span class="sub-category"><a href="#music2" class="current notop">所有</a>|<a href="#tingge" class="notop">在线音乐</a>|<a href="#diantai" class="notop">在线电台</a>|<a href="#musicblog" class="notop">音乐博客</a>|<a href="#musicbbs" class="notop">音乐论坛</a>|<a href="#wusun" class="notop">无损音乐</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.yinyuetai.com/" title="全球最大的高清MV网站，提供高品质音乐视频在线观看服务"  target="_blank" rel="nofollow" class="linkTip noframe">音悦台</a></li>
                <li> <a href="http://music.163.com/" title="网易云音乐是一款专注于发现与分享的音乐产品"  target="_blank" rel="nofollow" class="linkTip">网易云音乐</a></li>
                <li> <a href="http://www.xiami.com/" title="阿里音乐旗下品牌" target="_blank" rel="nofollow" class="linkTip">虾米音乐</a></li>
                <li> <a href="http://www.dongting.com/" title="知名音乐产品" target="_blank" rel="nofollow" class="linkTip">天天动听</a></li>
                <li> <a href="http://music.baidu.com/" title="百度旗下音乐产品" target="_blank" rel="nofollow" class="linkTip">百度音乐</a></li>
                <li> <a href="http://www.kugou.com/" title="知名音乐品牌" target="_blank" rel="nofollow" class="linkTip">酷狗音乐</a></li>
                <li> <a href="http://y.qq.com/" title="腾讯旗下音乐产品" target="_blank" rel="nofollow" class="linkTip">QQ音乐</a></li>
                <li> <a href="http://www.kuwo.cn/" title="知名音乐品牌" target="_blank" rel="nofollow" class="linkTip">酷我音乐</a></li>
                <li> <a href="http://musicforprogramming.net" title="帮你专心工作的音乐网站，适合程序员编程时听" target="_blank" rel="nofollow" class="linkTip">MusicForProgramming</a></li>
                <li> <a href="http://www.bandari.net/" title="在线欣赏班得瑞世界名曲" target="_blank" rel="nofollow" class="linkTip">班得瑞全球网</a></li>
                <li> <a href="http://www.9sky.com/" title="九天音乐网提供高品质音乐mp3在线试听下载、MV在线视听、明星访谈服务" target="_blank" rel="nofollow" class="linkTip">九天音乐网</a></li>
                <li> <a href="http://www.tingall.com/d" title="诠音网专注推广新世纪，古典，爵士，中国民乐，世界音乐，民谣等高雅音乐，诠释音乐之美。提供在线与移动端音乐欣赏，拥有网络音乐教学平台。" target="_blank" rel="nofollow" class="linkTip">诠音乐库</a></li>
                <li> <a href="http://www.0dutv.com/" title="零度音乐网免费提供上传音乐功能,你可以将你本地的mp3音乐上传到网络上，分享给你的好友。同时生成的mp3外链链接支持引用到各大博客，网站，可免费设置QQ空间背景音乐，免去你寻找歌曲链接地址的苦恼。" target="_blank" rel="nofollow" class="linkTip">零度音乐网</a></li>
                <li> <a href="http://momo8.com/" title="致力于分享推荐电子音乐、网络歌曲、3D音乐、纯音乐、DJ舞曲，给你非同凡响的音乐世界，戴上你的耳机一起去世界的每个角落" target="_blank" rel="nofollow" class="linkTip">默默音乐吧</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="diantai">
            <i class="icon-asterisk"></i>在线电台
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.qingting.fm/" title="广播电台在线收听" target="_blank" rel="nofollow" class="linkTip">蜻蜓fm</a></li>
                <li> <a href="http://douban.fm/" title="豆瓣旗下音乐产品" target="_blank" rel="nofollow" class="linkTip">豆瓣FM</a></li>
                <li> <a href="http://www.lizhi.fm/" title="国内FM" target="_blank" rel="nofollow" class="linkTip">荔枝FM</a></li>
                <li> <a href="http://musicuu.com/" title="唯美纯音乐精选，同时提供高品质MP3试听、搜索以及下载" target="_blank" rel="nofollow" class="linkTip">雅音FM</a></li>
                <li> <a href="http://www.hzou.net/" title="网友觉得很不错的电台" target="_blank" rel="nofollow" class="linkTip">红嘴鸥音乐电台</a></li>
                <li> <a href="http://www.9ird.com/" title="专注于分享声音与文字，听别人的故事，找自己的影子" target="_blank" rel="nofollow" class="linkTip">若听FM</a></li>
                <li> <a href="http://www.duole.fm/" title="听你想听的，海量有声资源在线听，分类超全，应有尽有" target="_blank" rel="nofollow" class="linkTip">多乐电台</a></li>
                <li> <a href="http://www.fting.cc/" title="凡听电台，为你而声" target="_blank" rel="nofollow" class="linkTip">凡听电台</a></li>
                <li> <a href="http://www.moofm.com/" title="陌声人，一个人的精神良药，能给你的小惊喜与耳边的温暖" target="_blank" rel="nofollow" class="linkTip">陌声人</a></li>
                <li> <a href="http://www.gnr.cn/" title="中国网络电台的先驱和创新先锋，伴随式网络语音(广播)服务" target="_blank" rel="nofollow" class="linkTip">壁虎网络电台</a></li>
                <li> <a href="http://jia.fm/" title="一堆儿逗比们，做了这么个特别严肃的事儿" target="_blank" rel="nofollow" class="linkTip">假电台</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="musicblog">
            <i class="icon-asterisk"></i>音乐博客
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.yinyueke.net/" title="不错的音乐博客" target="_blank" rel="nofollow" class="linkTip">音乐客</a></li>
                <li> <a href="http://www.luoo.net/" title="推荐国内外独立音乐的网站" target="_blank" rel="nofollow" class="linkTip">落网</a></li>
                <li> <a href="http://manpin.net" title="小清新音乐网站，超级多好听的英文歌中文歌" target="_blank" rel="nofollow" class="linkTip">慢品音乐</a></li>
                <li> <a href="http://www.52qingyin.cn/" title="纯音乐分享网站，以忧伤轻音乐为主，用耳聆听，用心感受" target="_blank" rel="nofollow" class="linkTip">清音陋屋</a></li>
                <li> <a href="http://www.leavemealone.cn/music/" title="来听听不一样的音乐，整理心情，重新出发吧" target="_blank" rel="nofollow" class="linkTip">微时光音乐期刊</a></li>
                <li> <a href="http://www.maninmusic.com/" title="乐之随属于个人纯音乐分享网站，主要为喜欢音乐的朋友创建，其主要内容为分享当下流行音乐、怀旧歌曲" target="_blank" rel="nofollow" class="linkTip">乐之随</a></li>
                <li> <a href="http://fana.me/" title="几名音乐爱好者的音乐博客" target="_blank" rel="nofollow" class="linkTip">FANA</a></li>
                <li> <a href="http://www.mologer.cn/" title="专注于美剧原声,独立音乐,小众音乐,安静的纯音乐,睡前音乐的博客" target="_blank" rel="nofollow" class="linkTip">音乐是岸</a></li>
                <li> <a href="http://tothesky.cn/" title="旨在于分享最好听的精品音乐歌曲，好听的音乐不分国界语言风格，当然每个人有各自的听歌品味喜欢的风格，因此小博成员都是分工发各自比较擅听的音乐，希望大家也尊重每位分享者的辛苦劳动。" target="_blank" rel="nofollow" class="linkTip">Best Music</a></li>
                <li> <a href="http://www.ningmeng.name/" title="想把我唱给你听" target="_blank" rel="nofollow" class="linkTip">私房歌</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="musicbbs">
            <i class="icon-asterisk"></i>音乐论坛
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.tingyuxuan.net/" title="以原创文学和音乐分享为主的论坛，目前开设有网络电台，并将节目刻录成光盘与您分享" target="_blank" rel="nofollow" class="linkTip">听雨轩</a></li>
                <li><a href="http://www.88liu.com/" title="为无损音乐发烧友提供无损音乐下载,内有APE等各类无损格式音乐下载" target="_blank" rel="nofollow" class="linkTip">88六社区</a></li>
                <li><a href="http://bbs.musicool.cn/" title="AAC音乐下载,推荐音质最好的M4A和WAV等无损音乐,炫音音乐论坛" target="_blank" rel="nofollow" class="linkTip">炫音音乐论坛</a></li>
                <li><a href="http://bbs.besgold.com/" title="专业音乐社区，包括发烧音乐,古典音乐,新世纪音乐,流行歌曲,轻音乐,摇滚,爵士,民乐,DJ" target="_blank" rel="nofollow" class="linkTip">百事高音乐论坛</a></li>
                <li><a href="http://www.zasv.com/" title="高品质音乐论坛,耳机发烧友论坛" target="_blank" rel="nofollow" class="linkTip">杂碎音乐论坛</a></li>
                <li><a href="http://www.pt80.net/" title="专业发烧音乐试听,无损音乐,最新专辑,发烧器材评测" target="_blank" rel="nofollow" class="linkTip">捌零音乐论坛</a></li>
                <li><a href="http://www.cdbao.net/" title="专业的无损音乐分享论坛，分享高音质无损音乐免费下载" target="_blank" rel="nofollow" class="linkTip">CD包音乐网</a></li>
                <li><a href="http://www.mixrnb.com/" title="MixRNB -  Enjoy Your Life !" target="_blank" rel="nofollow" class="linkTip">MixRNB</a></li>
                <li><a href="http://www.zhiaimusic.com/" title="聆听音乐 感悟生活" target="_blank" rel="nofollow" class="linkTip">至爱音乐论坛</a></li>
                <li><a href="http://www.oppsu.cn/" title="音乐世界是一个免费向音乐迷们提供音乐交互分享的平台，同时也是苹果迷们一起学习探讨的专业论坛" target="_blank" rel="nofollow" class="linkTip">OppsU</a></li>
                <li><a href="http://www.breezee.org/" title="以音乐评论和交流为主的，最宁静、温馨的心灵港湾" target="_blank" rel="nofollow" class="linkTip">清风音乐论坛</a></li>
                <li><a href="http://micool.xclub.tw/" title="全国最大的iTunes音乐论坛" target="_blank" rel="nofollow" class="linkTip">米酷音乐论坛</a></li>
                <li><a href="http://www.oolove.com/" title="爱音乐 爱生活 爱自己 爱家园" target="_blank" rel="nofollow" class="linkTip">真爱家园</a></li>
                <li><a href="http://www.hcyy.org/" title="无损音乐网,发烧音乐网,WAV音乐网,怀旧音乐网" target="_blank" rel="nofollow" class="linkTip">风云音乐谷</a></li>
                <li><a href="http://bbs.zzse.net/" title="无损音乐下载网站,高品质发烧试音音乐下载" target="_blank" rel="nofollow" class="linkTip">极品社区</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="wusun">
            <i class="icon-asterisk"></i>无损音乐
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://ape8.cn/" title="" target="_blank" rel="nofollow" class="linkTip">无损音乐吧</a></li>
                <li><a href="http://www.xicxi.com/" title="" target="_blank" rel="nofollow"   class="linkTip">XICXI</a></li>
                <li><a href="http://flac8.com/" title="" target="_blank" rel="nofollow"   class="linkTip">flac8</a></li>
                <li><a href="http://www.mfhifi.com/" title="" target="_blank" rel="nofollow"  class="linkTip">免费HIFI</a></li>
                <li><a href="http://weibo.com/u/3712071345" title="" target="_blank" rel="nofollow"   class="linkTip">无损音乐频道</a></li>
                <li><a href="http://www.52flac.com/" title="" target="_blank" rel="nofollow"  class="linkTip">52flac</a></li>
                <li><a href="http://www.51ape.com/" title="" target="_blank" rel="nofollow"   class="linkTip">51ape</a></li>
                <li><a href="http://tieba.baidu.com/f?kw=%E6%97%A0%E6%8D%9F%E9%9F%B3%E4%B9%90" title="" target="_blank" rel="nofollow" class="linkTip">无损音乐贴吧</a></li>
                <li><a href="http://www.moofeel.com/" title="" target="_blank" rel="nofollow" class="linkTip">磨坊音乐</a></li>
                <li><a href="http://www.pt80.net/forum.php?gid=89" title="" target="_blank" rel="nofollow" class="linkTip">捌零音乐</a></li>
                <li><a href="http://www.zasv.com/forum-44-1.html" title="" target="_blank" rel="nofollow" class="linkTip">杂碎后院</a></li>
                <li><a href="http://www.eacdy.com/forum-124-1.html" title="" target="_blank" rel="nofollow"   class="linkTip">音艾论坛</a></li>
                <li><a href="http://www.88liu.com/" title="" target="_blank" rel="nofollow"   class="linkTip">88六音乐</a></li>
                <li><a href="http://bbs.trix360.com/forum.php" title="" target="_blank" rel="nofollow"class="linkTip">trix360</a></li>
                <li><a href="http://www.deepms.net/" title="" target="_blank" rel="nofollow"  class="linkTip">深度无损音乐</a></li>
                <li><a href="http://www.eaymusic.com/" title="" target="_blank" rel="nofollow" class="linkTip">易音音乐</a></li>
                <li><a href="http://wusunyinyue.cn/forum.php" title="" target="_blank" rel="nofollow" class="linkTip">无损音乐网</a></li>
                <li><a href="http://www.hifidac.net/forum.php" title="" target="_blank" rel="nofollow" class="linkTip">深度发烧音乐</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="picture">
        <h1 class="lefttitle">图片</h1>
        <h2 class="nav-title" id="photo">
            <i class="icon-android"></i>摄影
            <span class="sub-category"><a href="#ruanjian" class="current notop">所有</a>|<a href="#photo" class="notop">摄影</a>|<a href="#photography" class="notop">摄影师</a>|<a href="#photographyroom" class="notop">摄影工作室</a>|<a href="#photography" class="notop">摄影师</a>|<a href="#yuepai" class="notop">摄影约拍平台</a>|<a href="#goodpic" class="notop">图库</a>|<a href="#chahua" class="notop">插画</a>|<a href="#girl" class="notop">美女</a>|<a href="#desktop" class="notop">壁纸</a>           </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://tuchong.com" title="超赞的摄影交流分享社区，聚集优秀摄影师，可分享自己的作品" target="_blank" rel="nofollow" class="linkTip">图虫网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.fengniao.com/" title="蜂鸟网,中国专业摄影门户网站,学习摄影技巧、分享摄影图片,这里有极具个性的摄影作品,全新数码相机、镜头等摄影器材的行情评测；涉及生活摄影、旅游摄影、风光摄影等主题,是摄影爱好者展示图片作品、交流摄影技巧、分享互动的专业平台,是引领摄影行业的前沿媒体。" target="_blank" rel="nofollow" class="linkTip">蜂鸟网</a></li>
                <li> <a href="http://fotomen.cn/" title="Fotomen——关于影像 趣味 分享的生活方式类新媒体平台" target="_blank" rel="nofollow" class="linkTip">FotoMen摄影之友</a></li>
                <li> <a href="http://www.leica.org.cn/" title="分享全球优秀Leica摄影作品" target="_blank" rel="nofollow" class="linkTip">Leica中文摄影杂志</a></li>
                <li> <a href="http://www.sheying8.com/" title="摄影吧是中国最大的摄影网站！中国摄影师发布非人体艺术摄影作品欣赏的专业摄影网站！" target="_blank" rel="nofollow" class="linkTip">摄影吧</a></li>
                <li> <a href="http://www.dpnet.com.cn/" title="迪派影像网是专业的数码影像资讯网和中文商务网，内容涵盖了行业资讯、产品测评、影像欣赏、摄影学院、数码摄影论坛等" target="_blank" rel="nofollow" class="linkTip">迪派摄影</a></li>
                <li> <a href="http://www.dili360.com/" title="中国国家地理新媒体以网络为旗舰,融合手机媒体、电子杂志等新媒体形式,展现中国国家地理品牌的力量,打造中国第一家以专业地理百科知识为基础,线上线下为一体的多元化经营体系。" target="_blank" rel="nofollow" class="linkTip">中国国家地理</a></li>
                <li> <a href="http://www.heiguang.com/" title="中国影楼行业门户网站，中国人像摄影学会合作媒体，汇集中国影楼人才，提供摄影,化妆,影楼资讯、影楼摄影作品、摄影教程、摄影器材、化妆教程、影楼化妆造型、影楼后期设计制作、影楼管理、影楼装修、婚礼策划等行业信息，同时开设影楼微博、论坛、博客等自由互动交流空间。" target="_blank" rel="nofollow" class="linkTip">黑光网</a></li>
                <li> <a href="http://720yun.com/" title="360度全景摄影作品分享，带给你不一样的视觉冲击" target="_blank" rel="nofollow" class="linkTip">720云</a></li>
                <li> <a href="http://tpway.com/" title="免费玩灯摄影教程分享，闪光灯爱好者必看摄影网站" target="_blank" rel="nofollow" class="linkTip">糖皮网</a></li>
                <li> <a href="http://500px.com/" title="致力于摄影分享、发现、售卖的专业平台" target="_blank" rel="nofollow" class="linkTip">500px</a></li>
                <li> <a href="http://www.flickr.com/explore" title="全球最火的网路相片管理和分享工具，需要科学上网才能访问" target="_blank" rel="nofollow" class="linkTip">Flickr <img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="photography">
            <i class="icon-android"></i>摄影师
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.next-image.com.cn/" title="全中国第一个用哈苏拍婚礼的摄影师，随便看看就得了，太毒" target="_blank" rel="nofollow" class="linkTip">庄扬帆 （星岚映像）</a></li>
                <li> <a href="http://www.zhangxiaoyi.com/" title="张小翼婚礼视觉" target="_blank" rel="nofollow" class="linkTip">张小翼</a></li>
                <li> <a href="http://www.pooma.cn/" title="卜马工作室" target="_blank" rel="nofollow" class="linkTip">卜马工作室</a></li>
                <li> <a href="http://www.leonwongphoto.com/" title="纪实婚礼摄影师，家庭摄影师" target="_blank" rel="nofollow" class="linkTip">黄亮</a></li>
                <li> <a href="http://www.chenmomo.com/" title="时尚摄影师" target="_blank" rel="nofollow" class="linkTip">陈墨墨</a></li>
                <li> <a href="http://www.kedaz.com/" title="Keda.Z 个人摄影网站" target="_blank" rel="nofollow" class="linkTip">Keda.Z</a></li>
                <li> <a href="http://500px.com/karinakiel" title="Karina Kiel个人摄影网站" target="_blank" rel="nofollow" class="linkTip noframe">Karina Kiel</a></li>
                <li> <a href="http://www.ericogden.com/" title="eric ogden个人摄影网站" target="_blank" rel="nofollow" class="linkTip noframe">eric ogden</a></li>
                <li> <a href="http://tonydorio.com/" title="非常有特色的摄影师，带给你不一样的视觉感受" target="_blank" rel="nofollow" class="linkTip noframe">Tony D'orio</a></li>
                <li> <a href="http://www.willsh.net/" title="中国独立摄影师Will的摄影网站" target="_blank" rel="nofollow" class="linkTip noframe">Will独立摄影师</a></li>
                <li> <a href="http://weibo.com/u/5227051949" title="国内著名时尚人像摄影师" target="_blank" rel="nofollow" class="linkTip noframe">吕海强（吕photo）</a></li>
                <li> <a href="http://byleon.com/" title="叶梓的官方摄影博客，包含叶梓创作的摄影作品、散文和器材点评文章等。" target="_blank" rel="nofollow" class="linkTip">叶梓的摄影术</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="photographyroom">
            <i class="icon-android"></i>摄影工作室
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.love-99.com/" title="中韩联合品牌，给你绝无仅有的视觉体验" target="_blank" rel="nofollow" class="linkTip">麦田映像</a></li>
                <li> <a href="http://www.80inx.com/" title="年轻、灵气、独特、热情、才华、品味、创新、眼界，忠实于原创设计、忠实于爱情与幸福、忠实于个性彰显、忠实于内心感受与外在表达" target="_blank" rel="nofollow" class="linkTip">80印象馆</a></li>
                <li> <a href="http://www.juzisy.com/" title="外景婚纱摄影专家及领导者" target="_blank" rel="nofollow" class="linkTip">桔子摄影</a></li>
                <li> <a href="http://www.24floor.com/" title="唯美大气古风摄影" target="_blank" rel="nofollow" class="linkTip">24楼摄影</a></li>
                <li> <a href="http://www.sanmaophoto.com/" title="专业外景婚纱摄影,个性婚纱照,大型室内婚纱摄影棚" target="_blank" rel="nofollow" class="linkTip">三毛摄影</a></li>
                <li> <a href="http://www.cdamo.com/" title="AMO STUDIO艾猫摄影工作室官网" target="_blank" rel="nofollow" class="linkTip">艾猫摄影</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="yuepai">
            <i class="icon-android"></i>摄影约拍平台
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.camquick.com.cn/" title="马上拍，如专车般随叫随到的专属摄影师平台！无论你是郑重其事还是心血来潮，只要有局，马上拍随叫随到..." target="_blank" rel="nofollow" class="linkTip">马上拍</a></li>
                <li> <a href="http://www.yuepai666.com/" title="约拍，找到你的专属摄影师，约拍，摄影师的高效接单工具。精选摄影服务平台，优选网红摄影师，实现消费者与优质摄影师的无缝对接" target="_blank" rel="nofollow" class="linkTip">约拍</a></li>
                <li> <a href="http://www.shehuishe.com/" title="是一个轻网页约拍站，想要约拍、找摄影师、找模特、商家个人发起活动或需求，均可使用摄会网页版，目前还处于beta阶段，后续功能会根据需求完善。" target="_blank" rel="nofollow" class="linkTip">摄会社</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zhengjianzhao">
            <i class="icon-android"></i>完美证件照
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.haimati.cn/Index/works" title="海马体照相馆,一张精致的照片,为你留下属于你的记忆。" target="_blank" rel="nofollow" class="linkTip">海马体照相馆</a></li>
                <li> <a href="http://elephoto.me/" title="北京望京完美证件照" target="_blank" rel="nofollow" class="linkTip">小象馆</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="goodpic">
            <i class="icon-android"></i>图库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://huaban.com/" title="国内最优质图片灵感库" target="_blank" rel="nofollow" class="linkTip">花瓣网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://tu.duowan.com/" title="游戏图片网站，为玩家提供各类游戏好看的图片、非主流图片，搞笑图片等" target="_blank" rel="nofollow" class="linkTip">多玩图库</a></li>
                <li> <a href="http://pic.netbian.com/" title="彼岸图网是一家专注提供摄影图片免费下载的图库，可供下载的高清摄影图片量包含人物,动物,风景,名胜,美食,旅游,建筑,时尚等。" target="_blank" rel="nofollow" class="linkTip">彼岸图库</a></li>
                <li> <a href="http://pixabay.com/" title="游戏图片网站，为玩家提供各类游戏好看的图片、非主流图片，搞笑图片等" target="_blank" rel="nofollow" class="linkTip noframe">Pixabay免费高清图片</a></li>
                <li> <a href="http://www.vcg.com/" title="为超过4500家网络新媒体、报纸杂志、广播电视和图书出版等媒体客户，提供具有新闻性、时效性、真实性、直观性的编辑类图片，内容囊括突发事件、体育赛事、时尚娱乐等方方面面的热点新闻事件" target="_blank" rel="nofollow" class="linkTip">视觉中国</a></li>
                <li> <a href="http://originoo.com/" title="国内优质的正版图片素材提供商，专业图库，图片库。汇集全球5000万版权设计素材，包括摄影照片、新闻图片、矢量插画、高清视频。为广告公司、设计师、互联网相关等企业提供一站式的低价图片媒体素材解决方案！全高清600万像素以上，版权保障，搜索方便，全国领先的正版图片库" target="_blank" rel="nofollow" class="linkTip">originoo锐景创意</a></li>
                <li> <a href="http://www.quanjing.com/" title="全景网，中国最大的图片库和正版图片素材网站；为个人提供正版图片素材，图片搜索，高清图片下载；为企业提供创意图片素材和图片内容营销。" target="_blank" rel="nofollow" class="linkTip">全景网</a></li>
                <li> <a href="http://www.123rf.com.cn/" title="4000万张正版商用图片" target="_blank" rel="nofollow" class="linkTip">123RF图片库</a></li>
                <li> <a href="http://www.hellorf.com/" title="站酷海洛创意(HelloRF)是Shutterstock中国独家合作伙伴，站酷旗下正版素材在线交易平台。拥有正版图片、正版视频、正版音乐素材，专注于为设计、广告以及各类行业提供低价安全的正版素材解决方案，保证所有内容100%正版。" target="_blank" rel="nofollow" class="linkTip">海洛创意商业图库</a></li>
                <li> <a href="http://streetwill.co/" title="免费高清图片库" target="_blank" rel="nofollow" class="linkTip">StreetWill</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chahua">
            <i class="icon-android"></i>插画
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.poocg.com/" title="原创绘画社交网站,是中国优秀的插画师,漫画家,画家的聚集地！提供插画培训、插画招聘征稿、插画教程、商业插画培训、插画设计等服务，欢迎进入插画师的王国" target="_blank" rel="nofollow" class="linkTip">涂鸦王国</a></li>
                <li> <a href="http://www.huimengya.com/" title="绘萌芽绘画网是专业的插画师、转手绘/插画爱好者的聚集地，免费手绘插画学习交流平台。绘萌芽提供最新的手绘插画教程，线稿素材，优秀作品欣赏、绘画工具等。" target="_blank" rel="nofollow" class="linkTip">绘萌芽</a></li>
                <li> <a href="http://www.duitang.com/category/?cat=painting" title="堆糖网插画绘画专栏" target="_blank" rel="nofollow" class="linkTip">堆糖插画</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="girl">
            <i class="icon-android"></i>美女
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.59pic.com/" title="图片分类清晰，让您一目了然找到喜欢的美女图片" target="_blank" rel="nofollow" class="linkTip">59pic美女图片 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.ugirls.com/" title="致力于拍摄如水果般新鲜欲滴的性感尤物" target="_blank" rel="nofollow" class="linkTip">尤果网</a></li>
                <li> <a href="http://xiuren.com/" title="致力于模特写真以及模特周边相关产业的社会化互动平台" target="_blank" rel="nofollow" class="linkTip">秀人网</a></li>
                <li> <a href="http://huaban.com/favorite/beauty" title="花瓣网美女频道" target="_blank" rel="nofollow" class="linkTip">花瓣美女</a></li>
                <li> <a href="http://huaban.com/boards/16834118/" title="花瓣网动态美女" target="_blank" rel="nofollow" class="linkTip">动态尤物</a></li>
                <li> <a href="http://www.tuigirl.com/" title="艺术摄影写真" target="_blank" rel="nofollow" class="linkTip">推女郎</a></li>
                <li> <a href="http://www.moko.cc/" title="中国最大的互联网娱乐人才供应商" target="_blank" rel="nofollow" class="linkTip">美空网</a></li>
                <li> <a href="http://www.umei.cc/" title="为您推荐高清美图" target="_blank" rel="nofollow" class="linkTip">优美高清</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="desktop">
            <i class="icon-android"></i>壁纸
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://bizhi.sogou.com/cate/index/0" title="更新最及时，壁纸质量最高的壁纸客户端软件，更有强大的电脑图标整理功能，帮您一键整理桌面，让桌面简约有序。集成万款美女、宠物、风景、电影、节日、日历、简约壁纸，动态壁纸，一键更换壁纸，多分辨率自适应，支持分组播放。" target="_blank" rel="nofollow" class="linkTip">搜狗壁纸</a></li>
                <li> <a href="http://alpha.wallhaven.cc/" title="国外精品高清壁纸分享" target="_blank" rel="nofollow" class="linkTip">Wallhaven <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.kdatu.com/category/hd-wallpaper/" title="高清壁纸打包下载" target="_blank" rel="nofollow" class="linkTip">看大图</a></li>
                <li> <a href="http://www.netbian.com/" title="彼岸桌面专注提供高清桌面壁纸下载,包括风景,日历,美女,唯美,可爱,动漫,汽车,花卉,节日,动物,游戏,qq,阿狸,好看等精美壁纸" target="_blank" rel="nofollow" class="linkTip">彼岸桌面</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->

    </div>
    <!--.section-->
    <div class="section mtop" id="design">
        <h1 class="lefttitle">设计</h1>
        <h2 class="nav-title" id="fonts">
            <i class="icon-edit"></i>字体
            <span class="sub-category"><a href="#design" class="current notop">所有</a>|<a href="#fonts" class="notop">字体</a>|<a href="#2D" class="notop">平面设计</a>|<a href="#wechatedit" class="notop">微信排版</a>|<a href="#h5" class="notop">微信H5</a>|<a href="#resources" class="notop">资源下载</a>|<a href="#template" class="notop">网站模板</a>|<a href="#wordpress" class="notop">wordpress主题</a>|<a href="#ppt" class="notop">ppt模板</a>|<a href="jianli" class="notop">简历模版</a>|<a href="#AE" class="notop">视频素材</a>|<a href="#sounds" class="notop">音效素材</a>|<a href="#chuangyisheji" class="notop">创意设计</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.qiuziti.com/" title="上传图片或输入字体名称找字体。可识别中、英、日韩、书法等多种类字体" target="_blank" rel="nofollow" class="linkTip">求字体网 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.fonts2u.com/" title="提供大量的免费字体。免费为Windows和Mac系统下载免费的字体" target="_blank" rel="nofollow" class="linkTip">Fonts2u</a></li>
                <li> <a href="http://www.zhaozi.cn/" title="找字网提供大量中英文字体下载" target="_blank" rel="nofollow" class="linkTip">找字网</a></li>
                <li> <a href="http://losttype.com/browse/" title="英文字体设计网站，清新靓丽，令人赏心悦目" target="_blank" rel="nofollow" class="linkTip">Lost Type</a></li>
                <li> <a href="http://www.fontsquirrel.com/" title="专为设计师精心挑选的免费字体下载" target="_blank" rel="nofollow" class="linkTip">Fontsquirrel</a></li>
                <li> <a href="http://www.1001freefonts.com/" title="大量免费的创意英文字体下载，设计师必备" target="_blank" rel="nofollow" class="linkTip">1001freefonts</a></li>
                <li> <a href="http://www.fonts.com/" title="号称全球最大，质量最高的设计字体提供者" target="_blank" rel="nofollow" class="linkTip">Fonts</a></li>
                <li> <a href="http://www.homefont.cn/" title="包含17400多种有效字体下载,频道分类220个的专业字体下载站" target="_blank" rel="nofollow" class="linkTip">字体之家</a></li>
                <li> <a href="http://www.myfonts.com/WhatTheFont/" title="上传图片搜索英文字体 。功能强大，准确性高，值得拥有" target="_blank" rel="nofollow" class="linkTip">Myfonts</a></li>
                <li><a href="http://www.diyiziti.com/" title="提供最全的字体转换器在线转换、艺术字体在线生成器和字体下载" target="_blank" rel="nofollow" class="linkTip">第一字体转换器</a></li>
                <li><a href="http://font.knowsky.com/" title="中文字体、英文字体、广告字体、字体下载大全" target="_blank" rel="nofollow" class="linkTip">字体下载大宝库</a></li>
                <li><a href="http://font.chinaz.com/" title="站长网字体库" target="_blank" rel="nofollow" class="linkTip">站长字体</a></li>
                <li><a href="http://www.ziticq.com/" title="字体传奇网（www.ziticq.com）、是以字体/标志/品牌/创意/设计师学习交流/和设计直播间互动为主的一个平台，在这里有一群志同道合的朋友，他们为了设计不抛弃，不放弃，旨在共同提高大家的设计水平，为设计而坚持！" target="_blank" rel="nofollow" class="linkTip">字体传奇</a></li>
                <li><a href="http://ziti.cndesign.com/Fonts/List" title="中国设计网旗下品牌，为字体设计爱好者提供精美字体设计及欣赏交流平台，以字体搜索和字体作品展示为主，让字体作品被商业用户和大众所欣赏 --为设计师提供有效传播和服务" target="_blank" rel="nofollow" class="linkTip">中国设计字体网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="2D">
            <i class="icon-edit"></i>平面设计
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.arting365.com/" title="中国最具影响力的创意门户网,集聚最有影响力创造力的专业创意设计人群" target="_blank" rel="nofollow" class="linkTip">Arting365</a></li>
                <li> <a href="http://ux.etao.com/" title="一淘团队UX 体验工作平台——阿里巴巴一淘用户体验部门官方博客" target="_blank" rel="nofollow" class="linkTip">一淘-UX</a></li>
                <li> <a href="http://www.zcool.com.cn/" title="国内最活跃的原创设计交流平台，聚集中国绝大部分的专业设计师年轻创意人群" target="_blank" rel="nofollow" class="linkTip">站酷</a></li>
                <li> <a href="http://68design.net/" title="国内专业网页设计人才基地,为广大设计师提供学习交流空间" target="_blank" rel="nofollow" class="linkTip">网页设计师联盟</a></li>
                <li> <a href="http://sudasuta.com/" title="苏打苏塔是一个关于创意设计，设计，插画，艺术摄影，lomo，素材，教程，web，灵感来源，平面设计欣赏的综合性网站。站点每日更新原创文章，为设计师提供优美高品质图片。" target="_blank" rel="nofollow" class="linkTip">苏打苏塔设计量贩铺</a></li>
                <li> <a href="http://www.uimaker.com/" title="为UI设计师提供专业UI设计，教程及素材的网站" target="_blank" rel="nofollow" class="linkTip">UIMaker</a></li>
                <li> <a href="http://www.sharelogo.cn/" title="logo设计欣赏，标志商标征集设计网设计网" target="_blank" rel="nofollow" class="linkTip">晒标网</a></li>
                <li> <a href="http://www.rologo.com/" title="logo设计欣赏、标志征集、国外logo设计欣赏、logo设计网、商标设计网，标志Rologo.com是以logo设计欣赏、标志新闻、标志设计欣赏、标志大全为主、以及国外logo设计欣赏的标志设计网。" target="_blank" rel="nofollow" class="linkTip">标志共和国</a></li>
                <li> <a href="http://www.boxui.com/" title="以用户体验为中心的设计，分享精彩的UI设计、交互设计" target="_blank" rel="nofollow" class="linkTip">盒子UI</a></li>
                <li> <a href="http://medialoot.com/" title="国外设计网站。收集大量模板图标及字体可供下载" target="_blank" rel="nofollow" class="linkTip">Medialoot</a></li>
                <li> <a href="http://www.uiparade.com/" title="国外顶级UI设计，细节处理非常到位非常精彩" target="_blank" rel="nofollow" class="linkTip">UIParade</a></li>
                <li> <a href="http://www.sj520.cn/" title="最佳网页平面设计灵感画廊" target="_blank" rel="nofollow" class="linkTip">520设计网</a></li>
                <li> <a href="http://www.chuangkit.com/" title="简单好用的在线平面设计工具" target="_blank" rel="nofollow" class="linkTip">创客贴</a></li>
                <li> <a href="http://xituqu.com/" title="专注优质设计与开发资源分享。包括UI资源，图标资源，模板资源，前端资源，后端资源，开发聚合，设计开发教程" target="_blank" rel="nofollow" class="linkTip">稀土区</a></li>
                <li> <a href="http://www.uehtml.com/" title="UE设计平台是优艺客旗下的设计师交流平台，专为热爱网页设计、界面设计的你而倾力打造。这里拥有最无敌的创意、最精美的视觉、最具国际化的意识和前瞻性思维！" target="_blank" rel="nofollow" class="linkTip">UE设计平台</a></li>
                <li> <a href="http://www.zhisheji.com/" title="中国最大的电商设计师交流平台.电商设计大师们都潜伏于此，聚集了中国绝大部分的80,90电商设计师,在此分享了他们的店铺设计,创意设计,美工设计和淘宝首页设计等优秀作品。" target="_blank" rel="nofollow" class="linkTip">致设计</a></li>
                <li> <a href="http://www.3visual3.com/" title="三视觉平面设计在线，从设计师角度出发，打造专业平面设计网" target="_blank" rel="nofollow" class="linkTip">三视觉</a></li>
                <li> <a href="http://www.shejidaren.com/" title="精选全球优秀UI设计和网页设计欣赏，分享免费高质量设计素材，为设计师提供新鲜的技术教程和创意灵感，探讨交互设计、产品设计、用户体验以及xhtml+css教程。" target="_blank" rel="nofollow" class="linkTip">设计达人</a></li>
                <li> <a href="http://woofeng.cn/" title="黄蜂网是一个收罗优秀网页设计、电商设计、网店设计、平面设计、UI设计灵感地，还有很多优质干货素材下载。" target="_blank" rel="nofollow" class="linkTip">黄蜂网</a></li>
                <li> <a href="http://doyoudo.com/" title="创意设计软件学习平台。看幽默、超清、干货的视频教程，学习也会上瘾" target="_blank" rel="nofollow" class="linkTip">doyoudu</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="color">
            <i class="icon-edit"></i>配色
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.layui.com/doc/element/color.html" title="Layui前端框架色值参考" target="_blank" rel="nofollow" class="linkTip">Layui色值参考</a></li>
                <li> <a href="http://colordrop.io" title="简洁明了的配色方案" target="_blank" rel="nofollow" class="linkTip">colorDrop</a></li>
                <li> <a href="http://www.colorhunt.co/" title="每天更新一组简洁舒服的配色方案" target="_blank" rel="nofollow" class="linkTip">colorHunt</a></li>
                <li> <a href="http://webgradients.com/" title="itmeo旗下180个漂亮渐变色模板" target="_blank" rel="nofollow" class="linkTip">webGradients</a></li>
                <li> <a href="http://nipponcolors.com/" title="日本一个配色网站，挺漂亮的也挺特别" target="_blank" rel="nofollow" class="linkTip">nipponColors</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="wechatedit">
            <i class="icon-edit"></i>微信排版
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.135editor.com/" title="微信图文素材排版编辑器提供美化微信文章排版" target="_blank" rel="nofollow" class="linkTip">135排版</a></li>
                <li> <a href="http://www.paiban365.com/" title="微信图文编辑器" target="_blank" rel="nofollow" class="linkTip">排版365</a></li>
                <li> <a href="http://bj.96weixin.com/" title="一款专业强大的微信公众平台在线编辑排版工具，提供手机预览功能，让用户在微信图文 、文章、内容排版、文本编辑、素材编辑上更加方便" target="_blank" rel="nofollow" class="linkTip">96微信编辑器</a></li>
                <li> <a href="http://xiumi.us/" title="图文排版_场景秀_图文秀_秀制作_H5_微信_公众号_图文消息_排版_助手" target="_blank" rel="nofollow" class="linkTip">秀米</a></li>
                <li> <a href="http://www.ipaiban.com/" title="一款排版效率高、界面简洁、样式原创设计的微信排版工具，支持全文编辑，实时预览、一键样式、一键添加签名的微信图文编辑器" target="_blank" rel="nofollow" class="linkTip">i排版</a></li>
                <li> <a href="http://www.gorse.com/" title="融合了精美素材、图文排版、模板定制、版权图库搜索及图片编辑为一体的简单好用的编辑器" target="_blank" rel="nofollow" class="linkTip">构思</a></li>
                <li> <a href="http://wxedit.yead.net/" title="专为微信小编量身定做的一款微信公众号内容排版神器，将以简洁的界面，精美的素材，强大的功能持续为几十万微信小编提供服务" target="_blank" rel="nofollow" class="linkTip">易点</a></li>
                <li> <a href="http://yiban.io/" title="壹伴是一款专业级别的新媒体效率工具，帮助公众号运营者更加高效地做运营。拥有图片点传、一键转载等功能。" target="_blank" rel="nofollow" class="linkTip">壹伴</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="h5">
            <i class="icon-edit"></i>微信H5
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.ichuye.cn/" title="最潮的音乐照片情感故事记录/表达工具" target="_blank" rel="nofollow" class="linkTip">初页</a></li>
                <li> <a href="http://jisuapp.cn/index.php?r=pc/Index/invitationTpl" title="微页制作，专属定制，与众不同的H5" target="_blank" rel="nofollow" class="linkTip">咫尺网络</a></li>
                <li> <a href="http://www.rrxiu.net/" title="免费h5页面制作工具，3分钟制作微信html5微场景平台" target="_blank" rel="nofollow" class="linkTip">人人秀</a></li>
                <li> <a href="http://maka.im/" title="简单、强大的免费H5页面、微场景制作平台" target="_blank" rel="nofollow" class="linkTip">『MAKA』官网</a></li>
                <li> <a href="http://www.rabbitpre.com/" title="让您像制作PPT一样制作炫酷的移动展示" target="_blank" rel="nofollow" class="linkTip">兔展</a></li>
                <li> <a href="http://www.eqxiu.com/" title="提供海量H5微场景模板,轻松制作一键生成H5页面" target="_blank" rel="nofollow" class="linkTip">易企秀</a></li>
                <li> <a href="http://www.kuaizhan.com/homepage/haibao" title="搜狐快站平台上全新推出的免费H5页面制作工具" target="_blank" rel="nofollow" class="linkTip">搜狐快海报</a></li>
                <li> <a href="http://www.bluemp.cn/" title="打造专属H5微网站|移动自助建站免费微官网微社区制作" target="_blank" rel="nofollow" class="linkTip">麦片BlueMP</a></li>
                <li> <a href="http://www.epub360.com/" title="无需编程，在线设计专业级H5作品" target="_blank" rel="nofollow" class="linkTip">意派360</a></li>
                <li> <a href="http://www.vxplo.cn/" title="专注在线交互设计，功能强大，适合专业设计师" target="_blank" rel="nofollow" class="linkTip noframe">Vxplo</a></li>
                <li> <a href="http://www.zuiku.com/" title="免费H5场景应用制作和发布平台" target="_blank" rel="nofollow" class="linkTip">最酷网</a></li>
                <li> <a href="http://www.wix.com/" title="基于H5技术，提供多种网页模板，操作简单无需代码，智能拖拽即可实现网页建设" target="_blank" rel="nofollow" class="linkTip noframe">Wix</a></li>
                <li> <a href="http://www.ih5.cn/" title="专业H5工具&创作服务平台" target="_blank" rel="nofollow" class="linkTip">iH5</a></li>
                <li> <a href="http://echuandan.com/" title="易传单是简单、强大的H5页面创作、分享、交易平台" target="_blank" rel="nofollow" class="linkTip">易传单</a></li>
                <li> <a href="http://www.70c.com/" title="70度，一个靠谱的移动广告服务平台" target="_blank" rel="nofollow" class="linkTip">70度</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="resources">
            <i class="icon-edit"></i>资源下载
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://pngimg.com/" title="国外大量png透明素材免费下载" target="_blank" rel="nofollow" class="linkTip">透明素材</a></li>
                <li> <a href="http://www.psdchest.com/" title="国外大量精致UI元素设计的PSD源文件免费下载" target="_blank" rel="nofollow" class="linkTip">PSDChest <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.nicepsd.com/" title="精品PSD源文件免费下载" target="_blank" rel="nofollow" class="linkTip">NicePSD</a></li>
                <li> <a href="http://psefan.com/" title="提供海量优质免费ps素材ps教程vip素材下载" target="_blank" rel="nofollow" class="linkTip">ps饭团</a></li>
                <li> <a href="http://www.mpdsj.com/" title="国内外名片设计欣赏，制作技术图文教程，模板素材免费提供下载" target="_blank" rel="nofollow" class="linkTip">名片大世界</a></li>
                <li> <a href="http://ui-cloud.com/" title="国外UI素材搜索引擎，提供大量PSD源文件免费搜索下载，设计师必备" target="_blank" rel="nofollow" class="linkTip">UI-Cloud</a></li>
                <li> <a href="http://subtlepatterns.com/" title="国外高质量的无缝背景纹理免费下载站，值得推荐" target="_blank" rel="nofollow" class="linkTip">Subtle Patterns</a></li>
                <li> <a href="http://freebiesbooth.com/" title="国外免费的设计素材下载，大量web设计资源及分层PSD下载站" target="_blank" rel="nofollow" class="linkTip">Freebies Booth</a></li>
                <li> <a href="http://www.uiparade.com/" title="国外PSD素材免费下载网站" target="_blank" rel="nofollow" class="linkTip">365PSD</a></li>
                <li> <a href="http://www.zcool.com.cn/gfxs/" title="站酷免费素材下载频道，提供网友分享素材供您免费下载" target="_blank" rel="nofollow" class="linkTip">站酷素材</a></li>
                <li> <a href="http://90sheji.com/" title="专注电商精品素材免费下载" target="_blank" rel="nofollow" class="linkTip">90设计</a></li>
                <li> <a href="http://so.ui001.com/" title="设计素材搜索聚合" target="_blank" rel="nofollow" class="linkTip">搜素材</a></li>
                <li> <a href="http://www.17sucai.com/" title="提供优质的图片素材和代码素材的素材天下素材网，为网站建设人员提供网页特效,flash素材,网页设计,网页模板,网页素材等素材" target="_blank" rel="nofollow" class="linkTip">门素材</a></li>
                <li> <a href="http://www.lanrentuku.com/" title="懒人图库专注于提供网页素材下载，其内容涵盖网页素材，矢量图素材，JS代码，psd素材，导航菜单，PNG图标等，让任何一个网页设计师都能轻松找到自己想要的素材！" target="_blank" rel="nofollow" class="linkTip">懒人图库</a></li>
                <li> <a href="http://www.tooopen.com/" title="平面、广告、3D、网页设计师专业高清图片素材,PSD素材,PS素材,矢量图,3D模型,LOGO素材,图片大全等设计素材中国免费和共享下载图片网" target="_blank" rel="nofollow" class="linkTip">素材公社</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="template">
            <i class="icon-edit"></i>网站模板
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.templatemonster.com/" title="全球最大规模的网站模板销售网站，提供出自世界知名设计大师之手" target="_blank" rel="nofollow" class="linkTip">怪兽模板</a></li>
                <li> <a href="http://www.dreamtemplate.com" title="国外超过7千套精美的网页模板, Flash模板下载" target="_blank" rel="nofollow" class="linkTip">DreamTemplate</a></li>
                <li> <a href="http://www.4templates.com/" title="国外大量精美的Web模板站，虽说是收费但可以预览参考其设计" target="_blank" rel="nofollow" class="linkTip">4Templates</a></li>
                <li> <a href="http://themeforest.net/" title="欧美网页模板集合，大量精致的模板可供参考" target="_blank" rel="nofollow" class="linkTip noframe">Theme Forest</a></li>
                <li> <a href="http://www.creattor.com/" title="上千套国外华丽的网站模板免费下载" target="_blank" rel="nofollow" class="linkTip">Creattor <img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="wordpress">
            <i class="icon-edit"></i>wordpress主题
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://themebetter.com/" title="原创wordpress主题" target="_blank" rel="nofollow" class="linkTip">ThemeBetter</a></li>
                <li> <a href="http://www.iztwp.com/" title="专注于分享国内外优秀的WordPress主题，致力于为国内站长提供方便快捷的wordpress建站服务体验" target="_blank" rel="nofollow" class="linkTip noframe">爱主题</a></li>
                <li> <a href="http://ztmao.com/" title="wordpress中文主题站" target="_blank" rel="nofollow" class="linkTip">主题猫</a></li>
                <li> <a href="http://www.themepark.com.cn/" title="用心做最好的原创中文WordPress主题" target="_blank" rel="nofollow" class="linkTip">web主题公园</a></li>
                <li> <a href="http://www.zhutihome.com/" title="分享最新最全的WordPress主题" target="_blank" rel="nofollow" class="linkTip">主题之家</a></li>
                <li> <a href="http://www.2zzt.com/" title="WordPress主题模板" target="_blank" rel="nofollow" class="linkTip">爱找主题</a></li>
                <li> <a href="http://www.wpmee.com/" title="WordPress主题免费下载" target="_blank" rel="nofollow" class="linkTip">WP迷</a></li>
                <li> <a href="http://www.mywpku.com/" title="最前沿的 WordPress 资源聚合平台" target="_blank" rel="nofollow" class="linkTip noframe">WP酷</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ppt">
            <i class="icon-edit"></i>PPT模板
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.pptxvip.com/" title="互联网首家会员ppt免费下载站" target="_blank" rel="nofollow" class="linkTip">大咖演示<img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li><a href="http://www.ypppt.com/" title="专注于分享高质量的各类免费PPT资源的综合性网站" target="_blank" rel="nofollow" class="linkTip">优品PPT</a></li>
                <li><a href="http://www.tretars.com/" title="提供精美PPT制作素材下载" target="_blank" rel="nofollow" class="linkTip">逼格ppt</a></li>
                <li><a href="http://www.officeplus.cn/" title="微软Office官方在线模板网站,职场和生活的加油站" target="_blank" rel="nofollow" class="linkTip">微软OfficePLUS</a></li>
                <li><a href="http://www.pptfans.cn/" title="以视频、图文教程为主的PPT教程应有尽有，助你PPT设计从入门到精通" target="_blank" rel="nofollow" class="linkTip">PPTfans</a></li>
                <li><a href="http://list.docer.com/PPT模板/" title="提供海量热门的PPT模板、PPT图片素材下载，素材制作专业、精美、实用" target="_blank" rel="nofollow" class="linkTip">稻壳儿</a></li>
                <li><a href="http://www.yanyijingling.com/" title="为广大PPT用户提供各类精美PPT模板、ppt教程、PowerPoint教程免费下载" target="_blank" rel="nofollow" class="linkTip">演绎精灵</a></li>
                <li><a href="http://www.pptstore.net/ppt_moban/?opt=free" title="提供大量免费PPT模板下载" target="_blank" rel="nofollow" class="linkTip">PPTstore</a></li>
                <li><a href="http://muzi.info/" title="关于PPT及演示的一切。PPT教程，PPT素材，PPT模板" target="_blank" rel="nofollow" class="linkTip">MUZI木子</a></li>
                <li><a href="http://www.pptschool.com/" title="商务人士专业PPT素材库提供免费商务PPT模板下载" target="_blank" rel="nofollow" class="linkTip">PPT大学</a></li>
                <li><a href="http://www.pptok.com/" title="PPTOK是一个专业的PPT模板下载,PPT素材免费下载的ppt教程网" target="_blank" rel="nofollow" class="linkTip">PPTOK</a></li>
                <li><a href="http://www.rapidbbs.cn/" title="最友好的PPT交流平台.中国PPT高手必收藏的网站" target="_blank" rel="nofollow" class="linkTip">锐普ppt</a></li>
                <li><a href="http://www.51ppt.com.cn/" title="提供大量免费精美PPT模板、好看的powerpoint模板素材、图标、背景等资源下载" target="_blank" rel="nofollow" class="linkTip">无忧ppt</a></li>
                <li><a href="http://iloveppt.cn/" title="中文演示设计平台PPT爱好者与职场达人必备网站" target="_blank" rel="nofollow" class="linkTip">我爱ppt</a></li>
                <li><a href="http://www.yanj.cn/" title="中国首家演示设计交易平台" target="_blank" rel="nofollow" class="linkTip">演界网</a></li>
                <li><a href="http://www.51pptmoban.com/" title="提供ppt设计所需资源素材模板免费下载" target="_blank" rel="nofollow" class="linkTip">51ppt模板</a></li>
                <li><a href="http://www.zhaogeppt.com/" title="大量PPT免费下载" target="_blank" rel="nofollow" class="linkTip">找个PPT</a></li>
                <li><a href="http://www.pooban.com/" title="ppt模板,office文档资源分享平台" target="_blank" rel="nofollow" class="linkTip">扑奔网</a></li>
                <li><a href="http://www.pptplus.cn/" title="云端储存PPT，方便随时随地浏览、演示录制和微信、微博分享；通过手机控制PPT演示和录音，生成适合社交分享的PPT加音频文件。" target="_blank" rel="nofollow" class="linkTip">PPT+</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="jianli">
            <i class="icon-edit"></i>简历模版
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.ijianli.com/" title="简历在线是一个提供包含经典个人简历模板、创意个人简历模板、套装个人简历模板（简历封面+简历内容+自荐信）三种不同风格Word简历模板下载与制作的专业网站。同时提供简历在线制作，可将简历发送到邮箱。还有大量的简历制作技巧和简历范文参考。" target="_blank" rel="nofollow" class="linkTip">简历在线</a></li>
                <li> <a href="http://www.500d.me/" title="好用的简历制作工具 , 不解释" target="_blank" rel="nofollow" class="linkTip">五百丁</a></li>
                <li> <a href="http://www.zhiyeapp.com/" title="告别Word，这才是最简单的简历制作方式" target="_blank" rel="nofollow" class="linkTip">知页简历</a></li>
                <li> <a href="http://xituqu.com/tag/resumes" title="稀土区优质简历资源分享" target="_blank" rel="nofollow" class="linkTip">稀土区-简历</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="AE">
            <i class="icon-edit"></i>视频素材
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.rui2.net/" title="ae模板,高清视频素材,片头视频素材,会声会影x4x5模板下载" target="_blank" rel="nofollow" class="linkTip">锐图网</a></li>
                <li> <a href="http://www.aoao365.com/" title="专业视频素材交易平台" target="_blank" rel="nofollow" class="linkTip">傲视网</a></li>
                <li> <a href="http://www.newcger.com/" title="数字视觉分享平台 | AE模板_视频素材_免费下载" target="_blank" rel="nofollow" class="linkTip">NewCGer</a></li>
                <li> <a href="http://www.cgown.com/ae" title="影视资源必备网站" target="_blank" rel="nofollow" class="linkTip">CG资源网</a></li>
                <li> <a href="http://www.aemoban.com/" title="免费AE模板资源分享站" target="_blank" rel="nofollow" class="linkTip">AE模板</a></li>
                <li> <a href="http://www.adobeae.com/" title="全面AE模板分享" target="_blank" rel="nofollow" class="linkTip">AE模板精品站</a></li>
                <li> <a href="http://www.rr-sc.com/forum-6-1.html" title="人人素材AE模板" target="_blank" rel="nofollow" class="linkTip">人人素材</a></li>
                <li> <a href="http://www.aepku.com/" title="人人都会用的中文模板" target="_blank" rel="nofollow" class="linkTip">AE模板库</a></li>
                <li> <a href="http://www.linecg.com/ae_list_0_0_0.html" title="提供大量AE工程模板【无需回复】【免费下载】" target="_blank" rel="nofollow" class="linkTip">直线网AE模板</a></li>
                <li> <a href="http://www.mfcpx.com" title="专注苹果电脑Final Cut Pro 后期视频剪辑软件，提供各种FCPX和其他周边资源。" target="_blank" rel="nofollow" class="linkTip">Final Cut Pro资源站</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="sounds">
            <i class="icon-edit"></i>音效素材
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.oooyin.com/" title="提供各种专题片音乐，广告音乐，片头音乐，轻松音乐，激烈音乐，记录片音乐，激情音乐，古典音乐，舒缓音乐等各种背景音乐的试听交流。" target="_blank" rel="nofollow" class="linkTip">我音网</a></li>
                <li> <a href="http://www.1bgm.com/" title="专业从事背景音乐服务，取得国内外上百家国内外唱片公司的商业背景音乐授权，建立了目前背景音乐行业最全面曲库，为商场、酒店、超市、饭店、品牌专卖店等公众场所提供正版背景音乐服务，包括背景音乐设计、各类语音条制作及提供专业背景音乐播放器，解决定时插播、定时开机、集团管理等各类播放需求。" target="_blank" rel="nofollow" class="linkTip">第一背景音乐网</a></li>
                <li> <a href="http://www.2gei.com/sound/" title="游戏音效素材下载专区,为游戏制作和开发提供多个分类音效素材下载" target="_blank" rel="nofollow" class="linkTip">爱给网</a></li>
                <li> <a href="http://www.peiyue.com/" title="配乐网由知名音乐人在2001年创立，隶属声音网文化传播有限公司，主要从事个人音乐制作及录音业务、商业类音乐创作和制作项目，如影视及广告配乐、企业歌等音乐和歌曲的创作。" target="_blank" rel="nofollow" class="linkTip">配乐网</a></li>
                <li> <a href="http://5sing.kugou.com/" title="中国原创音乐基地，数字音乐网站，汇集了大量的网络歌手的原创音乐歌曲及翻唱歌曲，提供大量歌曲的伴奏以及歌词免费下载，将喜爱的音乐或者歌曲作为手机彩铃下载。" target="_blank" rel="nofollow" class="linkTip">5SING伴奏网</a></li>
                <li> <a href="http://www.adyue.com/" title="广乐网是国内知名的配乐网站，也是网友们寻找轻音乐、纯音乐、背景音乐素材的好地方，提供各类好听的配乐、轻音乐、纯音乐、背景音乐以及广告专题片宣传片配乐素材！" target="_blank" rel="nofollow" class="linkTip">广乐网</a></li>
                <li> <a href="http://www.moyimusic.com/" title="魔音MUSIC免费为大家提供背景音乐下载,纯音乐,轻音乐,片头音乐,电影原声,游戏原音,专题片音乐等wav格式的音乐，让大家不在为找不到背景音乐素材而发愁！" target="_blank" rel="nofollow" class="linkTip">魔音music</a></li>
                <li> <a href="http://www.huiyi8.com/yinxiao/" title="绘艺素材音效网提供各类音效下载, 运动音效,Loop音效,人物音效,片头音效,打斗音效,恐怖音效,天气音效等音效素材下载" target="_blank" rel="nofollow" class="linkTip">综艺素材音效网</a></li>
                <li> <a href="http://taira-komori.jpn.org/freesoundcn.html" title="各类免费音效下载" target="_blank" rel="nofollow" class="linkTip">小森平的音效</a></li>
                <li> <a href="http://www.yinxiao.com/" title="音效素材试听免费下载" target="_blank" rel="nofollow" class="linkTip">音效网</a></li>
                <li> <a href="http://www.yisell.com/" title="提供快捷高效的音效及声音素材搜索服务" target="_blank" rel="nofollow" class="linkTip">音笑网</a></li>
                <li> <a href="http://www.sucaibar.com/yinxiao/" title="素材吧音效下载" target="_blank" rel="nofollow" class="linkTip">素材吧</a></li>
                <li> <a href="http://www.soundsnap.com/" title="国外音效素材搜索引擎" target="_blank" rel="nofollow" class="linkTip">soundsnap</a></li>
                <li> <a href="http://www.freesound.org/" title="国外免费开源的音频片段素材数据库" target="_blank" rel="nofollow" class="linkTip">freesound</a></li>
                <li> <a href="http://www.gettyimages.ca/music" title="视觉中国音乐素材" target="_blank" rel="nofollow" class="linkTip">GettyImages</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chuangyisheji">
            <i class="icon-edit"></i>创意设计
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.weimeixi.com/" title="分享来自全球的奇妙创意和优秀设计作品。涉及家居设计、新奇创意玩意等" target="_blank" rel="nofollow" class="linkTip">唯美系</a></li>
                <li> <a href="http://www.baicha.me/" title="分享优质漂亮家居设计(北欧、日式)的高品质居家生活杂志" target="_blank" rel="nofollow" class="linkTip">白茶</a></li>
                <li> <a href="http://www.repink.net/" title="关注居家生活与创意设计,专注于创意家居、创意产品、视觉设计等" target="_blank" rel="nofollow" class="linkTip">锐品创意</a></li>
                <li> <a href="http://www.jue.so/" title="创意项目孵化平台，可以通过发起项目来募集资金、把自己的想法变成现实" target="_blank" rel="nofollow" class="linkTip">觉JUE.SO</a></li>
                <li> <a href="http://www.pplock.com/" title="一个集艺术,平面设计,广告创意,摄影美图,时尚设计的精美小站" target="_blank" rel="nofollow" class="linkTip">PPLock</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="ruanjian">
        <h1 class="lefttitle">软件应用</h1>
        <h2 class="nav-title" id="software">
            <i class="icon-android"></i>精品软件
            <span class="sub-category"><a href="#ruanjian" class="current notop">所有</a>|<a href="#software" class="notop">精品软件</a>|<a href="#macsoftware" class="notop">Mac软件</a>|<a href="#online" class="notop">在线应用</a>| <a href="#websitetools" class="notop">站长工具</a>|<a href="#mobile" class="notop">手机App</a> |<a href="#webtools" class="notop">前端工具</a> </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.zdfans.com/" title="知名绿色软件分享博客" target="_blank" rel="nofollow" class="linkTip">zd423软件 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.52pojie.cn/" title="国内知名破解论坛" target="_blank" rel="nofollow" class="linkTip">吾爱破解论坛</a></li>
                <li> <a href="http://www.appinn.com/" title="分享免费、小巧、实用、有趣、绿色的软件" target="_blank" rel="nofollow" class="linkTip">小众软件</a></li>
                <li> <a href="http://www.iplaysoft.com/" title="推荐精选实用的软件，并提供相当详细且精美的图文评测" target="_blank" rel="nofollow" class="linkTip">异次元软件</a></li>
                <li> <a href="http://www.repaik.com/" title="破解软件限制,破解迅雷VIP,去广告,提供方法教程,以及精品软件下载" target="_blank" rel="nofollow" class="linkTip">睿派克技术论坛</a></li>
                <li> <a href="http://bbs.kafan.cn/" title="国内最著名的软件论坛" target="_blank" rel="nofollow" class="linkTip">卡饭论坛</a></li>
                <li> <a href="http://www.shaoit.com/" title="绿色软件分享博客" target="_blank" rel="nofollow" class="linkTip">殁漂遥</a></li>
                <li> <a href="http://xiaojun911.com/" title="专业制作绿色版，纯净版软件下载，破解软件下载" target="_blank" rel="nofollow" class="linkTip">小俊博客</a></li>
                <li> <a href="http://www.lrshare.com/" title="绿色软件分享博客" target="_blank" rel="nofollow" class="linkTip">绿软分享吧</a></li>
                <li> <a href="http://www.fishlee.net/" title="知名软件开发者博客" target="_blank" rel="nofollow" class="linkTip">鱼の后花园</a></li>
                <li> <a href="http://www.aiweibk.com/" title="绿色软件分享博客" target="_blank" rel="nofollow" class="linkTip">艾薇百科</a></li>
                <li> <a href="http://www.ccav1.com/" title="绿色软件分享博客" target="_blank" rel="nofollow" class="linkTip">CCAV1</a></li>
                <li> <a href="http://xbeta.info/" title="(善意+善于)应用优秀软件，有个性的软件博客" target="_blank" rel="nofollow" class="linkTip noframe">善用佳软</a></li>
                <li> <a href="http://www.portablesoft.org/" title="追求绿色便携理念，打造清爽干净系统" target="_blank" rel="nofollow" class="linkTip">精品绿色便携软件</a></li>
                <li> <a href="http://www.flighty.cn/" title="体验优质纯净软件，尽在轻狂志" target="_blank" rel="nofollow" class="linkTip">轻狂志</a></li>
                <li> <a href="http://www.dayanzai.me/" title="爱软件 爱汉化 爱分享 - 博客型软件" target="_blank" rel="nofollow" class="linkTip">大眼仔旭</a></li>
                <li> <a href="http://www.teamviewer.com/zhCN/" title="最好用强大的免费跨平台远程桌面控制软件 (支持电脑和手机)" target="_blank" rel="nofollow" class="linkTip noframe">TeamViewer</a></li>
                <li> <a href="http://app.hustonline.net/topic/design" title="华中大软件坊，设计的超有个性" target="_blank" rel="nofollow" class="linkTip">大软坊</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="macsoftware">
            <i class="icon-android"></i>Mac软件
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://soft.macx.cn/" title="苹果福利社软件下载站" target="_blank" rel="nofollow" class="linkTip">苹果福利社</a></li>
                <li> <a href="http://www.pc6.com/mac/" title="收集最热门的mac软件和mac游戏。" target="_blank" rel="nofollow" class="linkTip">苹果网</a></li>
                <li> <a href="http://bbs.feng.com/thread-htm-fid-19.html" title="Mac OSX 软件游戏分享区" target="_blank" rel="nofollow" class="linkTip">威锋网-软件游戏分享</a></li>
                <li> <a href="http://www.maczapp.com/" title="苹果Mac软件游戏下载网站" target="_blank" rel="nofollow" class="linkTip">苹果软件园</a></li>
                <li> <a href="http://www.ifunmac.com/" title="分享优秀的Mac、iPhone、iPad应用软件，介绍Mac、iPhone、iPad的使用技巧" target="_blank" rel="nofollow" class="linkTip">玩转苹果</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="online">
            <i class="icon-android"></i>在线应用
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.atool.org/" title="由华中科技大学一位在校女研究生开发的在线工具集合网站" target="_blank" rel="nofollow" class="linkTip">atool在线工具 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://tool.lu/" title="在线工具,开发人员工具,代码格式化、压缩、加密、解密,下载链接转换,sql工具,正则测试工具,favicon在线制作,ruby工具,中文简繁体转换,迅雷下载链接转换,程序猿的在线工具" target="_blank" rel="nofollow" class="linkTip">程序员工具箱 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://c.runoob.com/" title="菜鸟工具，为开发设计人员提供在线工具，提供在线PHP、Python、 CSS、JS 调试，中文简繁体转换，进制转换等工具。" target="_blank" rel="nofollow" class="linkTip">菜鸟工具</a></li>
                <li> <a href="http://123.w3cschool.cn/webtools" title="整理一些常用的在线工具" target="_blank" rel="nofollow" class="linkTip">W3CSchool在线工具</a></li>
                <li> <a href="http://zb.letwind.com/" title="装逼如风，常伴吾身，在线图片生成网站" target="_blank" rel="nofollow" class="linkTip">装逼神器</a></li>
                <li> <a href="http://www.flvcd.com" title="在线解析视频下载地址，支持80多个视频网站" target="_blank" rel="nofollow" class="linkTip">硕鼠视频解析<img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://www.clipconverter.cc/" title="免费下载youtube视频" target="_blank" rel="nofollow" class="linkTip noframe">ClipConverter</a></li>
                <li> <a href="http://en.savefrom.net/" title="在线解析youtube视频下载地址，免费下载youtube视频" target="_blank" rel="nofollow" class="linkTip">Savefrom.net<img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://yout.com/" title="在线解析youtube视频下载地址，免费下载youtube视频" target="_blank" rel="nofollow" class="linkTip noframe">Yout</a></li>
                <li> <a href="http://web.yeekit.com/" title="百分百极速的网页翻译，再也不用怕上任何外文网站了" target="_blank" rel="nofollow" class="linkTip">Yeekit网页翻译</a></li>
                <li> <a href="http://cli.im/" title="国内最大的二维码在线服务网站，提供简单、便捷、功能强大的免费工具以及供功能强大的商用二维码解决方案" target="_blank" rel="nofollow" class="linkTip">草料二维码</a></li>
                <li> <a href="http://loading.io/" title="个性定制你的Ajax Loading图标，支持SVG／CSS/GIF格式" target="_blank" rel="nofollow" class="linkTip">LOADING图标定制</a></li>
                <li> <a href="http://www.polaxiong.com/web" title="一款满足你所有需求的图像编辑软件" target="_blank" rel="nofollow" class="linkTip">泼辣修图</a></li>
                <li> <a href="http://maxiang.io" title="一款专为印象笔记（Evernote）打造的Markdown编辑器，通过精心的设计与技术实现，配合印象笔记强大的存储和同步功能，带来前所未有的书写体验。" target="_blank" rel="nofollow" class="linkTip">马克飞象</a></li>
                <li> <a href="http://www.zybuluo.com" title="Cmd Markdown 编辑阅读器，支持实时同步预览，区分写作和阅读模式，支持在线存储，分享文稿网址" target="_blank" rel="nofollow" class="linkTip">Cmd Markdown 编辑阅读器</a></li>
                <li> <a href="http://www.yinxiang.com" title="工作必备效率应用" target="_blank" rel="nofollow" class="linkTip">印象笔记</a></li>
                <li> <a href="http://leanote.com/" title="有极客范的云笔记！前所未有的文档体验，近乎完美的平台覆盖，支持团队协同，企业级私有云" target="_blank" rel="nofollow" class="linkTip">蚂蚁笔记</a></li>
                <li> <a href="http://www.wiz.cn/" title="更适合国人使用的云笔记" target="_blank" rel="nofollow" class="linkTip">为知笔记</a></li>
                <li> <a href="http://www.yinxiang.com" title="有道云笔记是网易出品，获得4600万用户青睐的笔记软件。提供了PC端、移动端、网页端等多端应用，用户可以随时随地对线上资料进行编辑、分享以及协同。" target="_blank" rel="nofollow" class="linkTip">有道云笔记</a></li>
                <li> <a href="http://note.sdo.com/" title="永不丢失的云中记事本" target="_blank" rel="nofollow" class="linkTip">麦库记事</a></li>
                <li> <a href="http://tinypng.com/" title="超完美压缩png和jpg图片" target="_blank" rel="nofollow" class="linkTip">TinyPNG</a></li>
                <li> <a href="http://www.tuhaokuai.com/" title="在线图片压缩，PNG压缩，GIF压缩，JPG压缩" target="_blank" rel="nofollow" class="linkTip">图好快</a></li>
                <li> <a href="http://www.speedtest.cn/" title="在线网速测试" target="_blank" rel="nofollow" class="linkTip">测速网</a></li>
                <li> <a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" title="工业和信息化部域名查询管理系统" target="_blank" rel="nofollow" class="linkTip">备案查询</a></li>
                <li> <a href="http://www.mikecrm.com/" title="麦客CRM是一款在线表单制作工具，同时也是强大的客户信息处理和关系管理系统。她可以帮助你轻松完成信息收集与整理，实现客户挖掘与消息推送，并开展持续营销。" target="_blank" rel="nofollow" class="linkTip">麦客</a></li>
                <li> <a href="http://shimo.im/" title="可多人实时协作的云端文档和表格" target="_blank" rel="nofollow" class="linkTip">石墨</a></li>
                <li> <a href="http://www.huoban.com/" title="伙伴云在线excel表格是专业的在线表格制作软件,提供在线excel表格、免费在线表格、多人共享表格、多人协作表格、团队协作表格、在线协作表格等多种在线excel表格,让你3分钟搞定一个表格,提高10倍工作效率!同时支持pc和手机,随时随地办公,办公无阻!" target="_blank" rel="nofollow" class="linkTip">伙伴云表格</a></li>
                <li> <a href="http://www.chaojibiaoge.com/" title="超级表格是企业数据管理轻量工具。集在线表格、在线表单、在线甘特图为一体的数据管理平台，用于数据的收集、整理、统计和团队协作。支持多人同时输入一张表。用于订单管理、报名、问卷调查" target="_blank" rel="nofollow" class="linkTip">超级表格</a></li>
                <li> <a href="http://www.ft12.com/" title="生成短网址、还原短网址,t.cn,url.cn,dwz.cn短网址供你选择!" target="_blank" rel="nofollow" class="linkTip">短网址生成</a></li>
                <li> <a href="http://www.kuaidi100.com/" title="提供上百家常用快递、物流公司的快递单号查询、快递网点电话查询、快递价格查询、网上寄快递服务，支持手机查询快递，提供免费Open API。" target="_blank" rel="nofollow" class="linkTip">快递100</a></li>
                <li> <a href="http://smallpdf.com/cn" title="让您轻松转换和编辑所有PDF文件的平台。一个网站就能解决您所有的PDF问题 – 是的，免费！" target="_blank" rel="nofollow" class="linkTip">smallpdf</a></li>
                <li> <a href="http://www.ilovepdf.com/zh_cn" title="完全免费的PDF文件在线管理工具，其功能包括：合并PDF文件、拆分PDF文件、压缩PDF文件、Office文件转换为PDF文件、PDF文件转换为JPG图片、JPG图片转换为PDF文件。无需安装。" target="_blank" rel="nofollow" class="linkTip">我爱pdf</a></li>
                <li> <a href="http://convertio.co/zh/" title="在线且免费，转换文件到任何格式的先进工具" target="_blank" rel="nofollow" class="linkTip">convertio文件转换器</a></li>
                <li> <a href="http://cn.office-converter.com/" title="免费在线文件转换器( office-converter.com)，是世界上最大的在线文件转换器。你能免费在线转换视频,音频,图形,文档和压缩。在线转换文件，包括PDF，Word，Excel，PowerPoint，OpenOffice，Flash，HTML，MP4，MP3，AVI，MKV，FLV，MOV，SWF，iPhone，Microsoft Xbox，WMV，WMA，OGG，JPG，BMP，TIFF，PNG，GIF，EPUB，ZIP，RAR等多种格式， 到目前为止，能够输出超过500种格式，输入格式转换超过2000种不同的格式转换。" target="_blank" rel="nofollow" class="linkTip">免费在线文件转换器</a></li>
                <li> <a href="http://www.zonemore.com/" title="ZONE是一个工具，帮助你制作精美的个人封面，它用丰富的表现形式突显你的工作能力和鲜明个性，让你与优秀的人相见。" target="_blank" rel="nofollow" class="linkTip">Zone个人封面</a></li>
                <li> <a href="http://zhugeio.com/" title="诸葛io，是一款基于用户洞察的精细化运营管理工具。旨在以先进的用户跟踪技术和简单易用的集成开发方法，帮助移动应用的运营者们挖掘用户的真实行为与属性，提升用户互动率，优化用户各流程的转化。" target="_blank" rel="nofollow" class="linkTip">诸葛io</a></li>
                <li> <a href="http://pixelmap.amcharts.com/" title="地图类素材只要这一个站就够了——像素映射生成器" target="_blank" rel="nofollow" class="linkTip">地图素材生成站</a></li>
                <li> <a href="http://www.eoscount.com/" title="自动读取佳能EOS单反相机快门次数，只支持IE浏览器" target="_blank" rel="nofollow" class="linkTip">佳能相机快门次数计数器</a></li>
                <li> <a href="http://www.biaonimeia.com/" title="一款自动化设计标注工具" target="_blank" rel="nofollow" class="linkTip">标你妹~啊</a></li>
                <li> <a href="http://www.btzhai.cc" title="磁力链在线播放器" target="_blank" rel="nofollow" class="linkTip">BT宅云播放器</a></li>
                <li> <a href="http://www.7mang.com/" title="在线去广告看视频" target="_blank" rel="nofollow" class="linkTip">七芒网</a></li>
                <li> <a href="http://vip.ifkdy.com/" title="vip视频在线解析" target="_blank" rel="nofollow" class="linkTip">疯狂vip视频解析</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="tuchuang">
            <i class="icon-android"></i>网络图床
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://imgur.com/" title="国外免费网络图床" target="_blank" rel="nofollow" class="linkTip">Imgur</a></li>
                <li> <a href="http://sm.ms/" title="国外免费网络图床" target="_blank" rel="nofollow" class="linkTip">SM.MS</a></li>
                <li> <a href="http://uploadbeta.com/picture-gallery/upload-photo.php" title="快速上传图片并分享，无需注册" target="_blank" rel="nofollow" class="linkTip">Image Gallery</a></li>
                <li> <a href="http://www.tietuku.com/upload" title="免费高速稳定 专业图片外链" target="_blank" rel="nofollow" class="linkTip">贴图库</a></li>
                <li> <a href="http://yotuku.cn" title="免费图床,全球CDN加速,支持外链、不限流量，支持粘贴上传、拖放上传，一键复制" target="_blank" rel="nofollow" class="linkTip">极简图床</a></li>
                <li> <a href="http://imgchr.com/" title="任意拖放图片到这里, 即开始上传你的图片. 最大 5 MB 图片大小. 直接的源图片链接, BBCode代码和HTML缩略图显示" target="_blank" rel="nofollow" class="linkTip">路过图床</a></li>
                <li> <a href="http://www.wal8.com/" title="专业淘宝相册,外贸相册,提供稳定的淘宝图片存储空间，支持相册批量上传、批量贴图。中国唯一的彻底免费的淘宝免费相册。" target="_blank" rel="nofollow" class="linkTip">外链吧相册</a></li>
                <li> <a href="http://x.mouto.org/wb/" title="选择或拖拽图像进行上传" target="_blank" rel="nofollow" class="linkTip">偷揉图库</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="websitetools">
            <i class="icon-android"></i>站长工具
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://tool.chinaz.com/" target="_blank">站长工具</a></li>
                <li><a href="http://seo.chinaz.com/" target="_blank">SEO综合</a></li>
                <li><a href="http://www.123cha.com/alexa/" target="_blank">网站流量</a></li>
                <li><a href="http://webscan.360.cn/" target="_blank">安全检测</a></li>
                <li><a href="http://ping.chinaz.com/" target="_blank">超级Ping</a></li>
                <li><a href="http://alibench.com/" target="_blank">性能分析</a></li>
                <li><a href="http://tool.chinaz.com/Links" target="_blank">死链检测</a></li>
                <li><a href="http://del.chinaz.com/" target="_blank">过期域名</a></li>
                <li><a href="http://index.baidu.com/" target="_blank">百度指数</a></li>
                <li><a href="http://data.mbalib.com/" target="_blank">智库监测</a></li>
                <li><a href="http://shu.taobao.com/" target="_blank">淘宝指数</a></li>
                <li><a href="http://www.testin.cn/" target="_blank">APP测试</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="mobile">
            <i class="icon-android"></i>手机App
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://zuimeia.com/" title="发现好用、好看、好玩的手机应用" target="_blank" rel="nofollow" class="linkTip">最美应用</a></li>
                <li><a href="http://sspai.com/" title="少数派发现优质应用，撰写客观深度的评测，制作实用易懂的教程" target="_blank" rel="nofollow" class="linkTip">少数派</a></li>
                <li><a href="http://www.appnz.com/" title="专注于移动应用个性化评测，旨在令您生活的每一天与怦然心动的高品质应用相遇" target="_blank" rel="nofollow" class="linkTip">爱屁屁</a></li>
                <li><a href="http://pinapps.in/" title="我推荐的不仅是Apps，更是一种态度" target="_blank" rel="nofollow" class="linkTip">Pinapps</a></li>
                <li><a href="http://appdp.com/" title="每日推送适合国人的限时免费应用，玩正版也可以很省钱" target="_blank" rel="nofollow" class="linkTip">APP每日推送</a></li>
                <li><a href="http://app.dgtle.com/" title="应用控 - 只推荐精品应用" target="_blank" rel="nofollow" class="linkTip">数字尾巴</a></li>
                <li><a href="http://next.36kr.com/posts" title="36Kr旗下网站，不错过任何一个新产品" target="_blank" rel="nofollow" class="linkTip noframe">NEXT</a></li>
                <li><a href="http://www.wooaii.com/" title="拒绝收费，分享免费、有创意、有趣实用的软件应用网站或浏览器扩展" target="_blank" rel="nofollow" class="linkTip">我爱玩应用</a></li>
                <li><a href="http://mindstore.io/" title="MindStore - 在这里找到最好的产品与想法" target="_blank" rel="nofollow" class="linkTip">MindStore</a></li>
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
                <li><a href="http://www.webpagetest.org/" target="_blank" class="linkTip noframe">网站在线测试</a></li>
                <li><a href="http://fis.baidu.com/" target="_blank">前端工程构建</a></li>
                <li><a href="http://duoshuo.com/" target="_blank">多说</a></li>
                <li><a href="http://www.51.la/" target="_blank">网站统计工具</a></li>
                <li><a href="http://www.jiathis.com/index2" target="_blank">按钮分享工具</a></li>
                <li><a href="http://www.dingdone.com/index#case" target="_blank">APP制作</a></li>
                <li><a href="http://runjs.cn/" target="_blank">RUNJS</a></li>
                <li><a href="http://markitup.jaysalvat.com/home/" target="_blank">markitup</a></li>
                <li><a href="http://atom-china.org/" target="_blank" class="linkTip noframe">atom</a></li>
                <li><a href="http://yeoman.io/" target="_blank">前端工程工具</a></li>
                <li><a href="http://regexper.com/" target="_blank" class="linkTip noframe">正则在线测试</a></li>
                <li><a href="http://jsbin.com/" target="_blank" class="noframe">JS在线运行</a></li>
                <li><a href="http://developer.baidu.com/vcast" target="_blank">百度语音</a></li>
                <li><a href="http://gongshi.baidu.com/" target="_blank">前端公式</a></li>
                <li><a href="http://jekyll.bootcss.com/" target="_blank">静态网站工具</a></li>
                <li><a href="http://phonegap.com/" target="_blank">phonegap</a></li>
                <li><a href="http://www.appcan.cn/" title="AppCan Hybrid混合应用开发、企业移动应用管理平台、移动服务云平台等企业移动门户的领导者，提供移动应用开发及移动跨平台开发技术等服务。" target="_blank" class="linkTip">AppCan</a></li>
                <li><a href="http://sass.bootcss.com/" target="_blank">SASS中文</a></li>
                <li><a href="http://www.1024i.com/demo/less/index.html" target="_blank">LESS中文</a></li>
                <li><a href="http://zhanzhang.baidu.com/" target="_blank">百度站长平台</a></li>
                <li><a href="http://github.com/google/traceur-compiler" target="_blank" class="linkTip noframe">ES6转ES5</a></li>
                <li><a href="http://www.fontke.com/" target="_blank">字客网</a></li>
                <li><a href="http://www.gulpjs.com.cn/" target="_blank">glup</a></li>
                <li><a href="http://livestyle.io/" target="_blank">livestyle</a></li>
                <li><a href="http://livereload.com/" target="_blank">livereload</a></li>
                <li><a href="http://browsersync.io/" target="_blank" class="linkTip noframe">browsersync</a></li>
                <li><a href="http://webpackdoc.com/" target="_blank">webpack</a></li>
                <li><a href="http://www.browsersync.cn/" target="_blank">browsersync中文</a></li>
                <li><a href="http://npm.taobao.org/" target="_blank">淘宝NPM镜像</a></li>
                <li><a href="http://changyan.kuaizhan.com/" target="_blank">畅言</a></li>
                <li><a href="http://www.dcloud.io/" target="_blank">HBuilder</a></li>
                <li><a href="http://www.wecenter.com/?copyright" target="_blank">WeCenter</a></li>
                <li><a href="http://colorsublime.com/" title="Sublime Text在线主题预览下载" target="_blank" rel="nofollow" class="linkTip">Color Sublime</a></li>
                <li><a href="http://dillinger.io/" title="在线markdown编辑器，漂亮强大，支持md, html, pdf 文件导出。支持dropbox, onedrive，google drive, github. 来自国外，可能不够稳定。" target="_blank" rel="nofollow" class="linkTip">dillinger</a></li>
                <li><a href="http://mahua.jser.me/" title="国内开发的一个在线编辑markdown文档的编辑器" target="_blank" rel="nofollow" class="linkTip">MaHua</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="program">
        <h1 class="lefttitle">编程</h1>
        <h2 class="nav-title" id="webcode">
            <i class="icon-code"></i>web开发
            <span class="sub-category"><a href="#program" class="current notop">所有</a>|<a href="#webcode" class="notop">Web开发</a>|<a href="#shequ" class="notop">社区</a>|<a href="#ziyuanku" class="notop">资源库</a>|<a href="#zititubiao" class="notop">图标字体</a>|<a href="#UIframe" class="notop">UI框架</a>|<a href="#js" class="notop">JS</a>|<a href="#donghua" class="notop">动画库</a>|<a href="#gundong" class="notop">滚动触屏</a>|<a href="#datechoice" class="notop">日期选择</a>|<a href="#chart" class="notop">图表</a>|<a href="#library" class="notop">库</a>|<a href="#frame" class="notop">框架</a>|<a href="#plugin" class="notop">插件</a>|<a href="#daimatuoguan" class="notop">代码托管</a>|<a href="#webserver" class="notop">主机／服务器</a>|<a href="#techblog" class="notop">技术博客</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.runoob.com/" title="超全基础编程技术教程，学的不仅是技术，更是梦想" target="_blank" rel="nofollow" class="linkTip">菜鸟教程</a></li>
                <li> <a href="http://tutorialzine.com/" title="国外高质量的网页开发教程博客，并提供免费开源代码的下载" target="_blank" rel="nofollow" class="linkTip">Tutorialzine</a></li>
                <li> <a href="http://www.w3cfuns.com/" title="前端开发工程师互动平台，并提供大量优秀的教程及资源下载" target="_blank" rel="nofollow" class="linkTip">前端网</a></li>
                <li> <a href="http://www.daqianduan.com/" title="一个关注前端开发、用户体验设计、wordpress主题的独立博客" target="_blank" rel="nofollow" class="linkTip">大前端</a></li>
                <li> <a href="http://www.html5cn.org/" title="HTML5中文门户，为广大爱好者提供各种HTML5资料及教程等" target="_blank" rel="nofollow" class="linkTip">HTML5中国</a></li>
                <li> <a href="http://www.jplayer.org/" title="非常棒的开源网页播放器，使用JQuery + HTML5编写" target="_blank" rel="nofollow" class="linkTip">JPlayer</a></li>
                <li> <a href="http://www.cuplayer.com/" title="多终端跨平台(支持ipad,iphone,安卓平析,安卓手机)网页播放器" target="_blank" rel="nofollow" class="linkTip">酷播网页播放器</a></li>
                <li> <a href="http://www.ckplayer.com/" title="超酷网页播放器" target="_blank" rel="nofollow" class="linkTip">CKPlayer</a></li>
                <li> <a href="http://www.w3cplus.com/" title="前端爱好者的家园，努力打造最优秀的web前端学习的站点" target="_blank" rel="nofollow" class="linkTip">W3CPlus</a></li>
                <li><a href="http://ueditor.baidu.com/website/" title="由百度web前端研发部开发所见即所得富文本web编辑器，具有轻量，可定制，注重用户体验等特点，开源基于MIT协议，允许自由使用和修改代码" target="_blank" rel="nofollow" class="linkTip">ueditor</a></li>
                <li> <a href="http://kindeditor.net/" title="美观大方，功能强大的开源在线HTML编辑器" target="_blank" rel="nofollow" class="linkTip">KindEditor</a></li>
                <li> <a href="http://www.html5china.com/" title="面向中国HTML5开发者搭建的官方网站，提供HTML5专业服务" target="_blank" rel="nofollow" class="linkTip">HTML5中文网</a></li>
                <li> <a href="http://www.css88.com/" title="专注前端开发，关注用户体验及国内外最新最好的前端开发技术" target="_blank" rel="nofollow" class="linkTip">Web前端开发</a></li>
                <li> <a href="http://www.qianduan.net/" title="关注国内外最新最好的前端设计资源和前端开发技术的专业博客" target="_blank" rel="nofollow" class="linkTip">前端观察</a></li>
                <li> <a href="http://docs.kissyui.com/" title="淘宝团队开发的款跨终端、模块化、高性能、使用简单的JS框架" target="_blank" rel="nofollow" class="linkTip">KISSY</a></li>
                <li> <a href="http://www.gbin1.com/" title="分享前端及其web开发相关HTML5技术" target="_blank" rel="nofollow" class="linkTip">GBin1</a></li>
                <li> <a href="http://jirengu.com/" title="国内最有爱的在前端学习社区" target="_blank" rel="nofollow" class="linkTip">饥人谷</a></li>
                <li> <a href="http://www.daimabiji.com/" title="为前端人员提供建站常用的JS特效,网页特效等大多数资源" target="_blank" rel="nofollow" class="linkTip">代码笔记</a></li>
                <li> <a href="http://www.sucaihuo.com/" title="提供网站模板,jQuery特效,Php素材等" target="_blank" rel="nofollow" class="linkTip">素材火</a></li>
                <li> <a href="http://cn.lipsum.com/" title="Lorem Ipsum，也称乱数假文或者哑元文本， 是印刷及排版领域所常用的虚拟文字，现常用于文本占位符" target="_blank" rel="nofollow" class="linkTip">Lorem Ipsum</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="codeonline">
            <i class="icon-code"></i>代码在线运行分享
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://jsfiddle.net/" title="前端开发必备的代码托管、在线编辑、即时预览工具" target="_blank" rel="nofollow" class="linkTip">JsFiddle代码在线测试</a></li>
                <li> <a href="http://codepen.io/" title="前端开发必备的代码托管、在线编辑、即时预览工具" target="_blank" rel="nofollow" class="linkTip">CodePen代码测试托管</a></li>
                <li> <a href="http://repl.it/" title="一个学习程序语言的在线交互式环境，它支持16种程序语言，包括了QBasic、Forth、Ruby、Scheme、Python、Lua、JavaScript等。用户可以直接在浏览器上学习和体验这些语言。" target="_blank" rel="nofollow" class="linkTip">repl.it代码在线测试分享</a></li>
                <li> <a href="http://trinket.io/" title="Trinket可让您在任何设备上的任何浏览器中运行和编写代码。" target="_blank" rel="nofollow" class="linkTip">trinket代码在线运行共享</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="shequ">
            <i class="icon-code"></i>社区
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://gitter.im/" title="gitter是免费、开放的程序员沟通方式，所有的信息都可以免费永久保存。强烈推荐你在电脑或者手机下载这个APP。" target="_blank" rel="nofollow" class="linkTip">Gitter</a></li>
                <li> <a href="http://www.v2ex.com/" title="V2EX 是创意工作者们的社区。这里目前汇聚了超过 110,000 名主要来自互联网行业、游戏行业和媒体行业的创意工作者。V2EX 希望能够成为创意工作者们的生活和事业的一部分。 " target="_blank" rel="nofollow" class="linkTip">V2EX</a></li>
                <li> <a href="http://stackoverflow.com/" title="高质量英文IT技术问答社区" target="_blank" rel="nofollow" class="linkTip">StackOverFlow</a></li>
                <li> <a href="http://ruby-china.org/" title="中国 Ruby 社区，由众多爱好者共同维护，致力于构建完善的 Ruby 中文社区。" target="_blank" rel="nofollow" class="linkTip noframe">Ruby China</a></li>
                <li> <a href="http://cnodejs.org/" title="CNode 社区为国内最专业的Node.js开源技术社区，致力于Node.js的技术研究。" target="_blank" rel="nofollow" class="linkTip noframe">CNode</a></li>
                <li> <a href="http://ionichina.com/" title="Ionichina：全球最大的Ionic Framework中文社区" target="_blank" rel="nofollow" class="linkTip">IoniChina</a></li>
                <li> <a href="http://golangtc.com/" title="Golang中国是国内较活跃的Go语言社区网站，聚集了国内大部分Go语言爱好者，专注于Go语言的学习交流，为大家提供Go语言交流和服务。" target="_blank" rel="nofollow" class="linkTip">Golang中国</a></li>
                <li> <a href="http://www.oschina.net/" title="开源技术社区，为IT开发者提供了一个发现、使用、并交流开源技术的平台" target="_blank" rel="nofollow" class="linkTip">开源中国</a></li>
                <li> <a href="http://www.php100.com/" title="国内第一家以PHP资源分享为主的专业网站，也提供PHP中文交流社区" target="_blank" rel="nofollow" class="linkTip noframe">PHP100</a></li>
                <li> <a href="http://www.phpchina.com/" title="PHPER的天堂，领跑PHP开源事业，Zend中国官方唯一授权网站" target="_blank" rel="nofollow" class="linkTip noframe">PHPChina</a></li>
                <li> <a href="http://laravel-china.org/" title="中国最大的 Laravel 和 PHP 开发者社区" target="_blank" rel="nofollow" class="linkTip">Laravel China</a></li>
                <li> <a href="http://testerhome.com/" title="TesterHome移动测试社区，由众多移动测试工作者维护，致力于推进国内测试技术。" target="_blank" rel="nofollow" class="linkTip noframe">TesterHome</a></li>
                <li> <a href="http://www.devdiv.com/" title="DevDiv开发者社区，为移动设备、移动互联网、云计算、HTML5等技术人员提供专业技术交流与服务平台" target="_blank" rel="nofollow" class="linkTip">DevDiv开发者社区</a></li>
                <li> <a href="http://www.chinaitlab.com/" title="著名IT技术门户，提供最热门的业界资讯，IT专家技术的交流社区" target="_blank" rel="nofollow" class="linkTip">中国IT实验室</a></li>
                <li> <a href="http://www.iteye.com/" title="综合性的互联网技术分享网站，程序员最爱" target="_blank" rel="nofollow" class="linkTip">ITeye</a></li>
                <li> <a href="http://www.thinkphp.cn/" title="一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架" target="_blank" rel="nofollow" class="linkTip">ThinkPHP</a></li>
                <li> <a href="http://gold.xitu.io/" title="掘金是中国质量最高的技术分享社区，邀请稀土用户作为 Co-Editor 来分享优质的技术干货，从前端到后端开发，从设计到产品，让每一个掘金用户都能挖掘到有价值的干货。" target="_blank" rel="nofollow" class="linkTip">掘金</a></li>
                <li> <a href="http://www.jobbole.com/" title="伯乐在线成立于 2010 年，立志做最专业的IT互联网职业社区。" target="_blank" rel="nofollow" class="linkTip">伯乐在线</a></li>
                <li> <a href="http://www.cnblogs.com/" title="博客园是一个面向开发者的知识分享社区。自创建以来，博客园一直致力并专注于为开发者打造一个纯净的技术交流社区，推动并帮助开发者通过互联网分享知识，从而让更多开发者从中受益。博客园的使命是帮助开发者用代码改变世界。" target="_blank" rel="nofollow" class="linkTip">博客园</a></li>
                <li> <a href="http://www.csdn.net/" title="全球最大中文IT社区，为IT专业技术人员提供最全面的信息传播和服务平台" target="_blank" rel="nofollow" class="linkTip">CSDN</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ziyuanku">
            <i class="icon-code"></i>CDN资源库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://cdn.code.baidu.com/" title="稳定，快速，全面，开源的国内CDN加速服务，由百度遍布全国各地100+个CDN节点提供加速服务" target="_blank" rel="nofollow" class="linkTip">百度CDN静态资源库</a></li>
                <li> <a href="http://cdn.baomitu.com/" title="360前端静态资源库是由奇舞团支持并维护的开源项目免费 CDN 服务，支持 HTTPS 和 HTTP/2，囊括上千个前端资源库和 Google 字体库。" target="_blank" rel="nofollow" class="linkTip">360CDN静态资源库</a></li>
                <li> <a href="http://cdn.baomitu.com/index/fonts" title="由360奇舞团支持并维护的开源项目免费 CDN 服务，支持 HTTPS 和 HTTP/2，囊括上千个前端资源库和 Google 字体库" target="_blank" rel="nofollow" class="linkTip">360google字体库</a></li>
                <li> <a href="http://jscdn.upai.com/" title="又拍云为您托管常用的JavaScript库，您可以在自己的网页上直接通过script标记引用这些资源。这样做不仅可以为您节省流量，还能通过我们的CDN加速，获得更快的访问速度。" target="_blank" rel="nofollow" class="linkTip">又拍云CDN</a></li>
                <li> <a href="http://www.staticfile.org/" title="又拍云为您托管常用的JavaScript库，您可以在自己的网页上直接通过script标记引用这些资源。这样做不仅可以为您节省流量，还能通过我们的CDN加速，获得更快的访问速度。" target="_blank" rel="nofollow" class="linkTip">七牛云CDN</a></li>
                <li> <a href="http://cdnn.taobus.com/" title="前端公共库CDN服务" target="_blank" rel="nofollow" class="linkTip">淘巴士CDN</a></li>
                <li> <a href="http://www.besdlab.cn/cdn" title="由BESD设计实验室提供的常用前端公共库免费CDN服务。这里为您提供常用的JavaScript前端库，托管在BESD众多的全国CDN节点上，覆盖电信、联通、移动等主流运营商线路，您可以在自己的网页上直接通过script标记引用这些资源，让网站访问速度瞬间提速！可以有效的提升一些常用的前端库的加载速度，如jQuery、bootstrap等等。同时我们提供上千款的字体CDN服务。" target="_blank" rel="nofollow" class="linkTip">Besd设计实验室CDN</a></li>
                <li> <a href="http://lib.wuedc.com/" title="这里提供了由LIB.WUEDC.COM驱动的前端公共库免费CDN服务，500+国内节点高速响应，支持https链接。" target="_blank" rel="nofollow" class="linkTip">Wuedc有一点CDN</a></li>
                <li> <a href="http://www.cdnjs.net/" title="阿里云CDN加速，永久免费，保护隐私，500+节点毫秒级响应，每日同步cdnjs.com，支持https及请求合并，安全稳定快速" target="_blank" rel="nofollow" class="linkTip">Cdnjs前端公共库</a></li>
                <li> <a href="http://npm.taobao.org/" title="这是一个完整 npmjs.org 镜像，你可以用此代替官方版本(只读)，同步频率目前为 10分钟 一次以保证尽量与官方服务同步" target="_blank" rel="nofollow" class="linkTip noframe">淘宝NPM镜像</a></li>
                <li><a href="http://www.bootcdn.cn/" title="Bootstrap中文网支持并维护的开源项目免费 CDN 服务，致力于为 Bootstrap、jQuery、Angular 一样优秀的开源项目提供稳定、快速的免费 CDN 服务。BootCDN 所收录的开源项目主要同步于 cdnjs 仓库。" target="_blank" rel="nofollow" class="linkTip">BootCDN中文网</a></li>
                <li><a href="http://www.jq22.com/" title="收集jQuery插件和提供各种jQuery特效的详细使用方法,在线预览，jQuery插件下载及教程" target="_blank" rel="nofollow" class="linkTip">jQuery插件库</a></li>
                <li><a href="http://www.htmleaf.com/" title="搜集和整理各种jQuery插件，jQuery特效，jquery ui，jQuery 教程，JS特效，网页特效，以及各种html5，css3动画和效果，为前端开发者提供最全面的网页开发素材。" target="_blank" rel="nofollow" class="linkTip">jQuery之家</a></li>
                <li><a href="http://www.awesomes.cn/" title="Web前端开发工程师需要的免费开源的高质量前端库、框架和插件" target="_blank" rel="nofollow" class="linkTip noframe">Awesomes前端资源库</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="tubiaoziti">
            <i class="icon-code"></i>图标字体库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.bootcss.com/p/font-awesome/" title="完美的图标字体 只为Bootstrap设计" target="_blank" rel="nofollow" class="linkTip">Font-Awesome</a></li>
                <li><a href="http://weloveiconfonts.com/" title="We Love Icon Fonts" target="_blank" rel="nofollow" class="linkTip">We Love Icon Fonts</a></li>
                <li><a href="http://glyphter.com/" title="The SVG Font Machine | Glyphter" target="_blank" rel="nofollow" class="linkTip noframe">Glyphter</a></li>
                <li><a href="http://perfecticons.com/" title="快速创建分辨率独立的任何大小，形状或颜色的图标字体" target="_blank" rel="nofollow" class="linkTip">Perfect Icons</a></li>
                <li><a href="http://www.xiconeditor.com/" title="帮助快速创建漂亮的web图标字体" target="_blank" rel="nofollow" class="linkTip">X-icon Editor</a></li>
                <li><a href="http://fontello.com/" title="为你的网站提供一个简单的方法来创建一个自定义的图标字体" target="_blank" rel="nofollow" class="linkTip">Fontello</a></li>
                <li> <a href="http://icomoon.io/app/#/select" title="使用icomoon您可以轻松地搜索和下载矢量图标或图标字体。此工具也可以用于图标集管理，它可以生成图标字体、SVGs、PDF、PNG等" target="_blank" rel="nofollow" class="linkTip noframe">icoMoon</a></li>
                <li><a href="http://www.iconfont.cn/plus" title="国内功能很强大且图标内容很丰富的矢量图标库，提供矢量图标下载、在线存储、格式转换等功能。阿里巴巴体验团队倾力打造，设计和前端开发的便捷工具" target="_blank" rel="nofollow" class="linkTip">阿里巴巴矢量图标</a></li>
                <li> <a href="http://www.easyicon.net/" title="图标搜索引擎（中英）" target="_blank" rel="nofollow" class="linkTip">EasyIcon</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="UIframe">
            <i class="icon-code"></i>UI框架
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://getbootstrap.com/" title="简洁、直观、强悍的前端开发框架，让web开发更迅速、简单" target="_blank" rel="nofollow" class="linkTip">Bootstrap(英)</a></li>
                <li> <a href="http://www.bootcss.com/" title="简洁、直观、强悍的前端开发框架，让web开发更迅速、简单" target="_blank" rel="nofollow" class="linkTip">Bootstrap(中)</a></li>
                <li><a href="http://foundation.zurb.com/index.html" target="_blank" rel="nofollow" class="linkTip">Foundation(英)</a></li>
                <li><a href="http://www.foundcss.com/" target="_blank">Foundation(中)</a></li>
                <li><a href="http://www.jeasyui.com/" title="帮助web开发者更轻松的打造出功能丰富并且美观的UI界面" target="_blank">Jquery EasyUI(英)</a></li>
                <li><a href="http://www.jeasyui.net/" title="帮助web开发者更轻松的打造出功能丰富并且美观的UI界面" target="_blank" rel="nofollow" class="linkTip">Jquery EasyUI(中)</a></li>
                <li><a href="http://yuilibrary.com/" title="一个免费的、开源的用于构建丰富的交互式Web网页的JavaScript库和CSS库" target="_blank"  rel="nofollow" class="linkTip noframe">yui</a></li>
                <li><a href="http://metroui.org.ua/" title="提供Windows Metro风格的Web开发项目的前端框架" target="_blank" rel="nofollow" class="linkTip">Metroui</a></li>
                <li><a href="http://semantic-ui.com/" title="User Interface is the language of the web" target="_blank" rel="nofollow" class="linkTip">Semantic</a></li>
                <li><a href="http://purecss.io/grids/" title="Fully customizable and responsive CSS grids" target="_blank" rel="nofollow" class="linkTip noframe">Purecss</a></li>
                <li><a href="http://www.basscss.com/" title="Low-level CSS toolkit" target="_blank" rel="nofollow" class="linkTip">Basscss</a></li>
                <li><a href="http://jqueryui.com/" title="jQuery UI is a curated set of user interface interactions, effects, widgets, and themes built on top of the jQuery JavaScript Library. Whether you're building highly interactive web applications or you just need to add a date picker to a form control, jQuery UI is the perfect choice." target="_blank" rel="nofollow" class="linkTip">jQueryUI</a></li>
                <li> <a href="http://framework7.taobao.org/" title="特色的HTML框架，可以创建精美的iOS应用" target="_blank" rel="nofollow" class="linkTip">Framework7</a></li>
                <li><a href="http://css3lib.alloyteam.com/" title="使用本 CSS3 UI 库的 demo 可以使男生更帅、女生更美、人品更高，改善夫妻关系，提高生活品质。让你相信爱，让世界充满爱！" target="_blank"  rel="nofollow" class="linkTip">CSS3 UI 库</a></li>
                <li><a href="http://www.getuikit.net/" title="一款轻量级、模块化的前端框架，可快速构建强大的web前端界面" target="_blank"  rel="nofollow" class="linkTip">UIkit轻量级前端框架</a></li>
                <li> <a href="http://amazeui.org/" title="中国首个开源HTML5跨屏前端框架" target="_blank" rel="nofollow" class="linkTip">AmazeUI(妹子UI)</a></li>
                <li><a href="http://www.layui.com/" class="经典模块化前端框架" target="_blank" class="linkTip">Layui模块化前端框架</a></li>
                <li> <a href="http://www.h-ui.net/" title="架起设计与后端的桥梁，轻量级前端框架，简单免费，兼容性好，服务中国网站。" target="_blank" rel="nofollow" class="linkTip">H-ui前端框架官网</a></li>
                <li> <a href="http://jui.org/" title="简单实用国产jQuery UI框架" target="_blank" rel="nofollow" class="linkTip">DWZ富客户端框架(J-UI)</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="js">
            <i class="icon-code"></i>JS
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://jquery.com/" title="jQuery是一个快速、简洁的JavaScript框架。它的宗旨是“write Less，Do More”，即倡导写更少的代码，做更多的事情。它封装JavaScript常用的功能代码，提供一种简便的JavaScript设计模式，优化HTML文档操作、事件处理、动画设计和Ajax交互。" target="_blank" rel="nofollow" class="linkTip">jQuery</a></li>
                <li><a href="http://www.zeptojs.cn/" title="Zepto.js 是专门为现代智能手机浏览器推出的Javascript框架" target="_blank" rel="nofollow" class="linkTip">ZeptoJS</a></li>
                <li><a href="http://angularjs.org/" title="Angular是Google开发的前端技术框架，为克服HTML在构建应用上的不足而设计" target="_blank" class="linkTip noframe">AngularJS(英)</a></li>
                <li><a href="http://www.apjs.net/" title="Angular是Google开发的前端技术框架，为克服HTML在构建应用上的不足而设计" target="_blank" class="linkTip">AngularJS(中)</a></li>
                <li><a href="http://angularjs.cn/" title="Angular是Google开发的前端技术框架，为克服HTML在构建应用上的不足而设计" target="_blank" class="linkTip">AngularJS社区</a></li>
                <li><a href="http://reactjs.cn/" title="React是Facebook开发的一款JS库" target="_blank" class="linkTip">ReactJS</a></li>
                <li><a href="http://jslite.io/" title="JSLite是正对现代浏览器的一个主要的兼容jQuery的API简约的JavaScript库" target="_blank" class="linkTip">JSLite</a></li>
                <li><a href="http://cn.vuejs.org/" title="渐进式JavaScript框架" target="_blank" class="linkTip">VueJS</a></li>
                <li><a href="http://avalonjs.coding.me/" title="avalon2是一款基于虚拟DOM与属性劫持的 迷你、 易用、 高性能 的 前端MVVM框架， 拥有超优秀的兼容性, 支持移动开发, 后端渲染, WEB Component式组件开发, 无需编译, 开箱即用" target="_blank" class="linkTip">AvalonJS</a></li>
                <li><a href="http://thinkjs.org/" title="ThinkJS是一款使用 ES6/7 特性全新开发的 Node.js MVC 框架，使用 ES7 中 async/await，或者 ES6 中的 */yield 特性彻底解决了 Node.js中异步嵌套的问题。同时吸收了国内外众多框架的设计理念和思想，让开发 Node.js 项目更加简单、高效。" target="_blank" class="linkTip noframe">ThinkJS</a></li>
                <li><a href="http://www.expressjs.com.cn/" title="基于 Node.js 平台，快速、开放、极简的 web 开发框架" target="_blank" class="linkTip">ExpressJS中文网</a></li>
                <li><a href="http://seajs.org/" title="提供简单、极致的模块化开发体验" target="_blank" class="linkTip">SeaJS</a></li>
                <li><a href="http://www.artisanjs.com/" target="_blank" rel="nofollow" class="linkTip">ArtisanJS</a></li>
                <li><a href="http://www.createjs.com/" target="_blank" rel="nofollow" class="linkTip">CreateJS</a></li>
                <li><a href="http://rickharrison.github.io/validate.js/" title="轻量级的JavaScript表单验证库" target="_blank" class="linkTip">Validate表单验证</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="donghua">
            <i class="icon-code"></i>动画库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://daneden.github.io/animate.css/" title="animate.css是一个来自国外的 CSS3 动画库，它预设了抖动（shake）、闪烁（flash）、弹跳（bounce）、翻转（flip）、旋转（rotateIn/rotateOut）、淡入淡出（fadeIn/fadeOut）等多达 60 多种动画效果，几乎包含了所有常见的动画效果。" target="_blank" rel="nofollow" class="linkTip noframe">Animate</a></li>
                <li><a href="http://leaverou.github.io/animatable/" title="为我们实现一些交互效果提供灵感" target="_blank" rel="nofollow" class="linkTip noframe">Animatable</a></li>
                <li><a href="http://www.justinaguilar.com/animations" title="一组超酷CSS3动画效果" target="_blank" rel="nofollow" class="linkTip">Animations</a></li>
                <li><a href="http://anicollection.github.io/" title="Anicollection网站是一个托管在Github平台上的集合了很多CSS3动画效果代码的网站，开发者可以免费下载所有动画效果源码使用，可以帮助网站开发者提高网站的设计效果和用户体验度。" target="_blank" rel="nofollow" class="linkTip">Anicollection</a></li>
                <li><a href="http://elrumordelaluz.github.io/csshake/" title="CSS Shake是一个使用CSS3实现的动画样式，使用SASS编写，利用它我们可以实现多种不同样式的抖动效果" target="_blank" rel="nofollow" class="linkTip">Css Shake</a></li>
                <li><a href="http://www.webhek.com/misc/css-shake/" title="一些让你的页面发抖的CSS类" target="_blank" rel="nofollow" class="linkTip">Css Shake(中)</a></li>
                <li><a href="http://ianlunn.github.io/Hover/" title="一组超实用的CSS3悬停效果和动画" target="_blank" rel="nofollow" class="linkTip">Hover.css</a></li>
                <li><a href="http://alloyteam.github.io/JXAnimate/jxanimate_demo.html" target="_blank" rel="nofollow" class="linkTip">JXAnimate</a></li>
                <li><a href="http://tobiasahlin.com/spinkit/" target="_blank" rel="nofollow" class="linkTip">spinkit</a></li>
                <li><a href="http://julian.com/research/velocity/" target="_blank" rel="nofollow" class="linkTip">velocity动画</a></li>
                <li><a href="http://alloyteam.github.io/AlloyStick/" target="_blank" rel="nofollow" class="linkTip">AlloyStick骨骼动画引擎</a></li>
                <li><a href="http://minimamente.com/example/rocket/" target="_blank" rel="nofollow" class="linkTip">rocket</a></li>
                <li><a href="http://bennettfeely.com/cssynth/" target="_blank" rel="nofollow" class="linkTip">cssynth</a></li>
                <li><a href="http://jeremyckahn.github.io/stylie/" target="_blank" rel="nofollow" class="linkTip">stylie</a></li>
                <li><a href="http://labs.bigroomstudios.com/libraries/animo-js" target="_blank" rel="nofollow" class="linkTip">animo-js</a></li>
                <li><a href="http://lvivski.com/anima/" target="_blank" rel="nofollow" class="linkTip">anima</a></li>
                <li><a href="http://www.minimamente.com/example/magic_animations/" target="_blank" rel="nofollow" class="linkTip">magic_animations</a></li>
                <li><a href="http://dynamicsjs.com/" target="_blank" rel="nofollow" class="linkTip">dynamicsjs</a></li>
                <li><a href="http://anijs.github.io/" target="_blank" rel="nofollow" class="linkTip">anijs</a></li>
                <li><a href="http://darsa.in/motio/" target="_blank" rel="nofollow" class="linkTip">motio</a></li>
                <li><a href="http://daniel-lundin.github.io/snabbt.js/" target="_blank" rel="nofollow" class="linkTip noframe">snabbt</a></li>
                <li><a href="http://jschr.github.io/textillate/" target="_blank" rel="nofollow" class="linkTip noframe">textillate</a></li>
                <li><a href="http://git.blivesta.com/animsition/" target="_blank" rel="nofollow" class="linkTip">animsition</a></li>
                <li><a href="http://matthew.wagerfield.com/parallax/" target="_blank" rel="nofollow" class="linkTip">parallax</a></li>
                <li><a href="http://joaopereirawd.github.io/fakeLoader.js/" target="_blank" rel="nofollow" class="linkTip">fakeLoader</a></li>
                <li><a href="http://mynameismatthieu.com/WOW/" target="_blank" rel="nofollow" class="linkTip">wow</a></li>
                <li><a href="http://visionmedia.github.io/move.js/" target="_blank" rel="nofollow" class="linkTip noframe">move</a></li>
                <li><a href="http://jaukia.github.io/easie/" target="_blank" rel="nofollow" class="linkTip">easie</a></li>
                <li><a href="http://catc.github.io/iGrowl/" target="_blank" rel="nofollow" class="linkTip">iGrowl</a></li>
                <li><a href="http://www.joelambert.co.uk/morf/" target="_blank" rel="nofollow" class="linkTip">morf</a></li>
                <li><a href="http://ricostacruz.com/jquery.transit/" target="_blank" rel="nofollow" class="linkTip">transit</a></li>
                <li><a href="http://greensock.com/" target="_blank" rel="nofollow" class="linkTip">greensock</a></li>
                <li><a href="http://manos.malihu.gr/jquery-custom-content-scroller/" target="_blank" rel="nofollow" class="linkTip noframe">自定义滚动条</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="gundong">
            <i class="icon-code"></i>触屏滚动
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.superslide2.com/TouchSlide/index.html" title="" target="_blank" rel="nofollow" class="linkTip">TouchSlide</a></li>
                <li><a href="http://www.swiper.com.cn/" title="" target="_blank" rel="nofollow" class="linkTip">Swiper</a></li>
                <li><a href="http://2.swiper.com.cn/" class="开源强大的免费触摸滑动插件" target="_blank" class="linkTip">swiper2触摸滑动</a></li>
                <li><a href="http://owlgraphic.com/owlcarousel/" title="" target="_blank" rel="nofollow" class="linkTip">owlcarousel</a></li>
                <li><a href="http://www.superslide2.com/" title="" target="_blank" rel="nofollow" class="linkTip">superslide2</a></li>
                <li><a href="http://be-fe.github.io/iSlider/" title="" target="_blank" rel="nofollow" class="linkTip">iSlider</a></li>
                <li><a href="http://alvarotrigo.com/fullPage/" title="" target="_blank" rel="nofollow" class="linkTip">fullPage</a></li>
                <li><a href="http://github.com/yanhaijing/zepto.fullpage" title="" target="_blank" rel="nofollow" class="linkTip noframe">zepto.fullpage</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="datechoice">
            <i class="icon-code"></i>日期选择器
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://lexxus.github.io/jq-timeTo/" title="" target="_blank" rel="nofollow" class="linkTip">jq-timeTo</a></li>
                <li><a href="http://flipclockjs.com/" title="" target="_blank" rel="nofollow" class="linkTip">FlipClockJS</a>
                <li><a href="http://www.bootcss.com/p/bootstrap-datetimepicker/" title="" target="_blank" rel="nofollow" class="linkTip">DatetimePicker</a></li>
                <li><a href="http://amsul.ca/pickadate.js/" title="" target="_blank" rel="nofollow" class="linkTip">pickadate</a></li>
                <li><a href="http://glad.github.io/glDatePicker/" title="" target="_blank" rel="nofollow" class="linkTip">glDatePicker</a></li>
                <li><a href="http://keith-wood.name/calendarsPicker.html" title="" target="_blank" rel="nofollow" class="linkTip">calendarsPicker</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chart">
            <i class="icon-code"></i>图表
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://echarts.baidu.com/" title="" target="_blank" rel="nofollow" class="linkTip">Echarts</a></li>
                <li><a href="http://www.hcharts.cn/" title="让数据可视化更简单,兼容 IE6+、完美支持移动端、图表类型丰富、方便快捷的 HTML5 交互性图表库" target="_blank" rel="nofollow" class="linkTip">Highcharts交互图表库</a></li>
                <li><a href="http://www.jscharts.com/" title="" target="_blank" rel="nofollow" class="linkTip">Jscharts</a></li>
                <li><a href="http://www.bootcss.com/p/chart.js/" title="" target="_blank" rel="nofollow" class="linkTip">Chart</a></li>
                <li><a href="http://www.rgraph.net/" title="" target="_blank" rel="nofollow" class="linkTip">JS图表</a></li>
                <li><a href="http://c3js.org/" title="" target="_blank" rel="nofollow" class="linkTip">C3.js</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="library">
            <i class="icon-code"></i>库
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://modernizr.cn/" title="Modernizr 是一个 JavaScript 库，用于检测用户浏览器的 HTML5 与 CSS3 特性" target="_blank" rel="nofollow" class="linkTip">modernizr</a></li>
                <li><a href="http://masonry.desandro.com/" title="" target="_blank" rel="nofollow" class="linkTip">网格库</a></li>
                <li><a href="http://www.embeddedjs.com/" title="" target="_blank" rel="nofollow" class="linkTip">ejs</a></li>
                <li><a href="http://jade-lang.com/" title="" target="_blank" rel="nofollow" class="linkTip">jade</a></li>
                <li><a href="http://handlebarsjs.com/" title="" target="_blank" rel="nofollow" class="linkTip">handlebarsjs</a></li>
                <li><a href="http://velocity.apache.org/" title="" target="_blank" rel="nofollow" class="linkTip">velocity</a></li>
                <li><a href="http://www.dustjs.com/" title="" target="_blank" rel="nofollow" class="linkTip">dustjs</a></li>
                <li><a href="http://ricostacruz.com/nprogress/" title="" target="_blank" rel="nofollow" class="linkTip">NProgress.js</a></li>
                <li><a href="http://www.jsviews.com/" title="" target="_blank" rel="nofollow" class="linkTip">JsRender</a></li>
                <li><a href="http://socket.io/" title="" target="_blank" rel="nofollow" class="linkTip">socket.io</a></li>
                <li><a href="http://todomvc.com/" title="" target="_blank" rel="nofollow" class="linkTip">TodoMVC</a></li>
                <li><a href="http://lodash.com/" title="" target="_blank" rel="nofollow" class="linkTip noframe">Lodash</a></li>
                <li><a href="http://lodashjs.com/" title="" target="_blank" rel="nofollow" class="linkTip">Lodashjs中文</a></li>
                <li><a href="http://aerotwist.com/" title="" target="_blank" rel="nofollow" class="linkTip noframe">Aerotwist</a></li>
                <li><a href="http://snapsvg.io/" title="" target="_blank" rel="nofollow" class="linkTip">SnapSvg</a></li>
                <li><a href="http://t4t5.github.io/sweetalert/" title="美化弹出警告样式插件" target="_blank" rel="nofollow" class="linkTip">SweetAlert</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="frame">
            <i class="icon-code"></i>框架
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.gruntjs.net/" title="JavaScript 世界的构建工具" target="_blank" rel="nofollow" class="linkTip">Grunt中文网</a></li>
                <li> <a href="http://www.gulpjs.com.cn/" title="用自动化构建工具增强你的工作流程" target="_blank" rel="nofollow" class="linkTip">gulp中文网</a></li>
                <li><a href="http://www.sassmeister.com/" target="_blank" class="noframe">样式框架</a></li>
                <li><a href="http://www.17sucai.com/preview/1/2014-12-23/ScatteredPolaroidsGallery/index.html" target="_blank">画廊框架</a></li>
                <li><a href="http://hexo.io/" target="_blank" class="linkTip noframe">hexo博客框架</a></li>
                <li><a href="http://backbonejs.org/" target="_blank">backbonejs</a></li>
                <li><a href="http://underscorejs.org/" target="_blank">underscorejs</a></li>
                <li><a href="http://emberjs.com/" target="_blank">EmberJs</a></li>
                <li><a href="http://alibaba.github.io/weex/index.html" target="_blank" class="linkTip noframe">Weex</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="plugin">
            <i class="icon-code"></i>插件
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.oschina.net/project/tag/273/jquery/" title="共有近3000款jQuery插件开源软件" target="_blank" class="linkTip">开源中国jQuery插件</a></li>
                <li><a href="http://mwlmt.cc/content/wljdtcj/index.html" title="一个没有什么卵用的焦点图插件" target="_blank" class="linkTip">WLFocus焦点图插件</a></li>
                <li><a href="http://demo.jb51.net/js/myfocus/" title="可能是目前唯一的js焦点图库" target="_blank" class="linkTip">MyFocus焦点图</a></li>
                <li><a href="http://fex.baidu.com/webuploader/" title="一个简单的以HTML5为主，FLASH为辅的现代文件上传组件" target="_blank" class="linkTip">webuploader上传组件</a></li>
                <li><a href="http://jqueryvalidation.org/" target="_blank" class="linkTip noframe">表单插件</a></li>
                <li><a href="http://www.uploadify.com/" target="_blank">uploadify</a></li>
                <li><a href="http://momentjs.com/" target="_blank">Moment.js</a></li>
                <li><a href="http://flickity.metafizzy.co/" target="_blank">幻灯片插件</a></li>
                <li><a href="http://www.jquery-steps.com/" target="_blank">jquery steps</a></li>
                <li><a href="http://wijmo.com/" target="_blank">wIJMO</a></li>
                <li><a href="http://jscolor.com/" target="_blank">JsColor</a></li>
                <li><a href="http://slidesjs.com/" target="_blank">SlideJs</a></li>
                <li><a href="http://ricostacruz.com/jquery.transit/" target="_blank">Transit</a></li>
                <li><a href="http://prismjs.com/index.html" target="_blank">Prism</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="daimatuoguan">
            <i class="icon-code"></i>代码托管
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://coding.net/" title="Coding.net 是一个面向开发者的云端开发平台,提供 git代码托管，免费的运行演示空间，代码质量分析，在线Web IDE，项目管理，开发协作，基于云技术的软件外包，冒泡社交等功能。 为开发者提供技术讨论和开发，协作工具， Coding 极速的代码体验，让开发更简单。" target="_blank" class="linkTip noframe">Coding</a></li>
                <li><a href="http://github.com/" title="数以百万计的开发人员使用的GitHub建立个人项目，支持其业务，并在开源技术一起工作。" target="_blank" class="linkTip noframe">Github</a></li>
                <li><a href="http://code.csdn.net/" title="CSDN旗下的开发服务平台，面向国内开发者提供代码托管、代码片、社交编程、组织管理、社区讨论、知识库等开发服务。" target="_blank" class="linkTip noframe">Code</a></li>
                <li><a href="http://git.oschina.net/" title="码云(Git@OSC)是开源中国社区团队推出的基于Git的快速的、免费的、稳定的在线代码托管平台，不限制私有库和公有库数量" target="_blank" class="linkTip">码云</a></li>
                <li><a href="http://about.gitlab.com/" title="Code, test, and deploy together with GitLab open source git repo management software" target="_blank" class="linkTip noframe">Gitlab</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="webserver">
            <i class="icon-code"></i>主机／服务器
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://cn.aliyun.com/" title="阿里巴巴旗下云服务器" target="_blank" class="linkTip">阿里云</a></li>
                <li><a href="http://www.qcloud.com/" title="存储、计算、监控、安全...你所需要的一切云产品，腾讯云均能以业界领先的水平为你提供" target="_blank" class="linkTip">腾讯云</a></li>
                <li><a href="http://www.vultr.com/" title="国外SSD云主机、VPS" target="_blank" class="linkTip">vultr</a></li>
                <li><a href="http://www.donglu.net/" title="国内虚拟主机" target="_blank" class="linkTip">东路互联</a></li>
                <li><a href="http://www.yecaoyun.com/" title="国内云虚拟主机、VPS、服务器租用托管" target="_blank" class="linkTip">野草云</a></li>
                <li><a href="http://www.mmx.cc/" title="西部数码分销商，提供虚拟主机、VPS、云主机" target="_blank" class="linkTip">西部至诚</a></li>
                <li><a href="http://console.ng.bluemix.net/" title="开放式标准的云平台" target="_blank" class="linkTip">IBM Bluemix</a></li>
                <li><a href="http://console.ng.bluemix.net/" title="开放式标准的云平台" target="_blank" class="linkTip">IBM Bluemix</a></li>
                <li><a href="http://www.qingcloud.com/" title="面向未来的企业级云计算服务商" target="_blank" class="linkTip">青云</a></li>
                <li><a href="http://www.hostker.com/" title="可能是最萌的云计算服务商" target="_blank" class="linkTip">hostker</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="techblog">
            <i class="icon-globe"></i>技术博客
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.cnblogs.com/lhb25/" title="关注前端开发技术 ◆ 推动 HTML5 & CSS3 技术发展" target="_blank" rel="nofollow" class="linkTip">梦想天空</a></li>
                <li><a href="http://www.zhangxinxu.com/" title="张鑫旭个人生活技术博客" target="_blank" rel="nofollow" class="linkTip">张鑫旭技术博客</a></li>
                <li><a href="http://handsomeone.com/" title="true && 'transparent'" target="_blank" rel="nofollow" class="linkTip">HandsomeOne</a></li>
                <li><a href="http://www.helloweba.com/" title="web技术 应用 分享" target="_blank" rel="nofollow" class="linkTip">Helloweba</a></li>
                <li><a href="http://singsing.io/blog/" title="web技术 应用 分享" target="_blank" rel="nofollow" class="linkTip">s1ngs1ing</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div><!--.section-->
    <div class="section mtop" id="study">
        <h1 class="lefttitle">学习</h1>
        <h2 class="nav-title" id="ITstudy">
            <i class="icon-globe"></i>IT在线学习
            <span class="sub-category"><a href="#study" class="current notop">所有</a>|<a href="#ITstudy" class="notop">IT在线学习</a>|<a href="#kaoshi" class="notop">考试</a>|<a href="#waiyu" class="notop">外语</a>|<a href="#caipu" class="notop">菜谱</a>|<a href="#aihao" class="notop">爱好</a>|<a href="#dianzishu" class="notop">电子书</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                    <li><a href="http://freecodecamp.cn/" title="帮助你学习编程的开源社区，开启你的软件工程师生涯" target="_blank" rel="nofollow" class="linkTip noframe">freeCodeCamp中文社区</a></li>
                    <li><a href="http://cleverprogrammer.com/" title="从零开始学Python" target="_blank" rel="nofollow" class="linkTip">Clever Programmer</a></li>
                    <li><a href="http://lighthouselabs.ca/" title="成为一名web开发者或IOS开发者" target="_blank" rel="nofollow" class="linkTip">Lighthouse Labs</a></li>
                    <li><a href="http://learngitbranching.js.org/" title="生动形象的git 入门教程" target="_blank" rel="nofollow" class="linkTip">Learn Git Branching</a></li>
                    <li><a href="http://tutsplus.com/" title="国外WEB网站开发教程网，涵盖HTML，CSS，Javascript，CMS，PHP和Ruby on Rails" target="_blank" rel="nofollow" class="linkTip noframe">Tutsplus</a></li>
                    <li><a href="http://www.imooc.com/" title="免费的IT技能学习平台 专注IT学习的开放式在线精品课程" target="_blank" rel="nofollow" class="linkTip">慕课网</a></li>
                    <li><a href="http://www.mengma.com/" title="萌码是计算教育领域的先行者，领先的跟随式教学、图形化教学等让计算学习更有趣、更高效" target="_blank" rel="nofollow" class="linkTip noframe">萌码网</a></li>
                    <li><a href="http://study.163.com/" title="大型在线教育平台服务，提供海量免费、优质课程" target="_blank" rel="nofollow" class="linkTip">网易云课堂</a></li>
                    <li><a href="http://www.ycku.com/" title="持久的理念，最酷的教学" target="_blank" rel="nofollow" class="linkTip">瓢城Web俱乐部</a></li>
                    <li><a href="http://doyoudo.com" title="一个有趣、专业的设计类软件学习网站" target="_blank" rel="nofollow" class="linkTip">doyoudo</a></li>
                    <li><a href="http://www.shiyanlou.com/courses/" title="实验楼课程分为基础课和项目课，内容主要涵盖IT技术领域" target="_blank" rel="nofollow" class="linkTip noframe">实验楼</a></li>
                    <li><a href="http://ke.qq.com/index.html" title="专业在线教育平台，打造老师在线上课教学、学生及时互动学习的课堂" target="_blank" rel="nofollow" class="linkTip">腾讯课堂</a></li>
                    <li><a href="http://open.163.com/" title="推出国内外名校公开课，搭建起强有力的网络视频教学平台" target="_blank" rel="nofollow" class="linkTip">网易公开课</a></li>
                    <li><a href="http://www.jisuanke.com/" title="学习计算机相关领域知识(编程、算法、计算机理论)最便捷的渠道" target="_blank" rel="nofollow" class="linkTip noframe">计蒜客</a></li>
                    <li><a href="http://mooc.guokr.com/" title="集合Coursera，edX，udacity,学堂在线等平台所有课程的点评讨论社区" target="_blank" rel="nofollow" class="linkTip">MOOC学院</a></li>
                    <li><a href="http://www.tanzhouedu.com/" title="规模较大的新一代互联网在线教育育人平台" target="_blank" rel="nofollow" class="linkTip">潭州学院</a></li>
                    <li><a href="http://www.51zxw.net/" title="免费视频教程,提供全方位软件学习" target="_blank" rel="nofollow" class="linkTip">我要自学网</a></li>
                    <li><a href="http://www.duobei.com/" title="实用类公开课程及课程表,营造和老师、同学平等交流的学习社区" target="_blank" rel="nofollow" class="linkTip">多贝</a></li>
                    <li><a href="http://www.coursera.org/" title="在网上学习全世界最好的课程" target="_blank" rel="nofollow" class="linkTip noframe">Coursera</a></li>
                    <li><a href="http://www.icourses.cn/home/" title="中国大学精品开放课程" target="_blank" rel="nofollow" class="linkTip">爱课程</a></li>
                    <li><a href="http://oeasy.org/" title="给想学没钱学的人做的，希望越来越多的人来做教程" target="_blank" rel="nofollow" class="linkTip">Oeasy系列</a></li>
                    <li><a href="http://www.ibeifeng.com/" title="国内最全面、最实战的IT在线教育培训社区" target="_blank" rel="nofollow" class="linkTip">北风网</a></li>
                    <li><a href="http://www.howzhi.com/" title="专注生活技能和兴趣爱好的知识分享新社区" target="_blank" rel="nofollow" class="linkTip">好知网</a></li>
                    <li><a href="http://www.wanmen.org/" title="中国第一所网络大学，为社会提供高品质学习课程，所有课程均为万门原创" target="_blank" rel="nofollow" class="linkTip noframe">万门大学</a></li>
                    <li><a href="http://www.aiyunlu.com/student/homepage" title="国内专业的IT技能在线学习平台" target="_blank" rel="nofollow" class="linkTip">云路课堂</a></li>
                    <li><a href="http://www.haoxue.com/" title="是国内最具影响力的微课学习及在线微视频课程分享平台" target="_blank" rel="nofollow" class="linkTip">好学网</a></li>
                    <li><a href="http://www.gogoup.com/course/list" title="课程目前以摄影技术及摄影后期为主" target="_blank" rel="nofollow" class="linkTip">高高手</a></li>
                    <li><a href="http://www.maiziedu.com/" title="专业IT职业在线教育平台" target="_blank" rel="nofollow" class="linkTip">麦子学院</a></li>
                    <li><a href="http://www.jikexueyuan.com/" title="极客学院职业培训涵盖前端，后端，移动全品类。Web、Java、Python、Go、iOS、Android、PHP等各学科依据职业需求设计课程，根据个人学习计划提供视频、图文、答疑、一对一作业批改、推荐就业等服务。" target="_blank" rel="nofollow" class="linkTip">极客学院</a></li>
                    <li><a href="http://www.icourse163.org/" title="国内最好的中文MOOC学习平台，拥有来自于39所985高校的顶级课程，最好最全的大学课程，与名师零距离" target="_blank" rel="nofollow" class="linkTip">中国大学Mooc</a></li>
                    <li><a href="http://ninghao.net/" title="宁皓是一个小团队，或许有一天我们会很大，如果你同意的话" target="_blank" rel="nofollow" class="linkTip">宁皓网</a></li>
                    <li><a href="http://laravist.com/" title="从这里开始成为现代的Web开发工程师" target="_blank" rel="nofollow" class="linkTip noframe">Laravist</a></li>
                    <li><a href="http://eggman.tv/" title="拥有国内最专业的Ruby和Ruby on Rails视频学习课件；同时我们还提供其他前沿开发技术的视频内容，内容涵盖Ruby、Ruby on Rails、MongoDB、Erlang、React、ReactNative和Web开发。快速提升你的开发技能，精通实战应用" target="_blank" rel="nofollow" class="linkTip noframe">蛋人.TV</a></li>
                    <li><a href="http://www.swiftv.cn/" title="国内氛围最好的swift学习、交流网站，提供上千套swift视频教程免费观看" target="_blank" rel="nofollow" class="linkTip noframe">SwiftV课堂</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="kaoshi">
            <i class="icon-globe"></i>考试
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.cmzyk.com/h-col-116.html" title="专注各类资源整合与共享，打造最实用的资源网站" target="_blank" rel="nofollow" class="linkTip">传媒老跟班</a></li>
                <li><a href="http://weibo.com/s1002297748" title="专注免费分享考研资料，英语四六级资料，公务员资料" target="_blank" rel="nofollow" class="linkTip noframe">文艺-资料分享君</a></li>
                <li><a href="http://weibo.com/media2015" title="资源共享|新闻传播/学术/考研/影视" target="_blank" rel="nofollow" class="linkTip noframe">传媒小哥</a></li>
                <li><a href="http://weibo.com/u/5372911673" title="为考研学子提供考研资料" target="_blank" rel="nofollow" class="linkTip noframe">找研友吧</a></li>
                <li><a href="http://weibo.com/u/2091076344" title="专注于各领域学习资源，酷站软件，秒拍视频的分享与推荐" target="_blank" rel="nofollow" class="linkTip noframe">资源分享库</a></li>
                <li><a href="http://weibo.com/kyqq" title="致力于分享最优质的考研资源" target="_blank" rel="nofollow" class="linkTip noframe">考研资源库</a></li>
                <li><a href="http://weibo.com/Dateservice" title="独具特色的资源整合公益微博，主页致力于分享最优质最有价值的资源" target="_blank" rel="nofollow" class="linkTip noframe">资料服务库</a></li>
                <li><a href="http://weibo.com/u/5359434969" title="考研虐我千百遍，我待考研如初恋" target="_blank" rel="nofollow" class="linkTip noframe">选课网考研达人</a></li>
                <li><a href="http://weibo.com/719656790" title="考研资讯、考研指导、考研辅导" target="_blank" rel="nofollow" class="linkTip noframe">每日考研笔记</a></li>
                <li><a href="http://bbs.kaoshidian.com/resource" title="中国领先的考研在线培训品牌，海量考研辅导课程" target="_blank" rel="nofollow" class="linkTip">考试点</a></li>
                <li><a href="http://www.kaoyan.com/" title="中国领先的考研交流平台和研究生招生信息网络发布平台" target="_blank" rel="nofollow" class="linkTip">考研帮</a></li>
                <li><a href="http://download.kaoyan.com/" title="提供各省各大学考研资料下载" target="_blank" rel="nofollow" class="linkTip">考研论坛-资料</a></li>
                <li><a href="http://club.topsage.com/forum.php" title="提供权威考研真题、复习资料下载，考试经验交流" target="_blank" rel="nofollow" class="linkTip">大家论坛</a></li>
                <li><a href="http://www.1zhao.org/" title="免费考研论坛" target="_blank" rel="nofollow" class="linkTip">知识宝库</a></li>
                <li><a href="http://bbs.freekaoyan.com/forum.php" title="免费考研论坛" target="_blank" rel="nofollow" class="linkTip">免费考研论坛</a></li>
                <li><a href=" http://kaoyannote.com/" title="没有什么比坚持梦想更值得" target="_blank" rel="nofollow" class="linkTip">每日考研笔记</a></li>
                <li><a href="http://pan.baidu.com/share/home?uk=1949525496&amp;view=share#category/type=0" title="提供各类考试最新课程，推广论坛资料免费获取" target="_blank" rel="nofollow" class="linkTip">圆圆工作室度盘</a></li>
                <li><a href="http://open.vipexam.org/" title="是一套专门为高等院校开发的集日常学习、考前练习、在线无纸化考试等功能于一体的教育资源库软件" target="_blank" rel="nofollow" class="linkTip">VipExam考试资源库</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="waiyu">
            <i class="icon-globe"></i>外语
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.yeeyan.org/" title="开放的社区翻译平台，可以提交发现的精彩外文内容、翻译原文库的文章、点评翻译作品、加入兴趣小组" target="_blank" rel="nofollow" class="linkTip">译言网</a></li>
                <li><a href="http://www.shanbay.com/" title="实用的背单词网站" target="_blank" rel="nofollow" class="linkTip">扇贝单词</a></li>
                <li><a href="http://www.putclub.com/" title="口碑最好，历史最长，最受网友青睐的经典免费英语学习网站，专攻英语听力训练，近10年来一直在英语学习网站中拥有领导地位。在线复读听写，口语模仿，口译训练等新一代学习模块极受英语学习者欢迎。" target="_blank" rel="nofollow" class="linkTip">普特英语听力</a></li>
                <li><a href="http://www.hjenglish.com/" title="沪江英语是沪江旗下英语学习资讯网站，是国内最具亲和力的原创英语学习网站，从入门到精通全程辅导，专注于打造最具人气的英语学习交流互动网站，为全国数千万英语学习者提供专业服务。" target="_blank" rel="nofollow" class="linkTip">沪江英语学习网</a></li>
                <li><a href="http://www.tukkk.com/" title="小语种口语网是学说口语的网站，2004年开始运行。宗旨是帮助全球华人快速学会说外语。外语速成，所有内容都在网上。以初级简单的句子为主，采用美国外交部的外语训练模式，外文原文+中文译文+声音按钮。反复点击声音按钮，进行模仿。您一分钟就能学会。所有句子均由语言国的电台播音员朗读。您不受时间限制，您可以在世界各地，24小时学习外语。 " target="_blank" rel="nofollow" class="linkTip">小语种口语网</a></li>
                <li><a href="http://ke.youdao.com/" title="联合有道词典团队共同打 造：四六级、考研、GRE、托福、雅思、口语等精品课程。有受访央视的名师提供最好的四六级/考研/GRE培训、资料、真题、学习app等，是最受学生欢迎的个性化学习平台" target="_blank" rel="nofollow" class="linkTip">有道精品课</a></li>
                <li><a href="http://www.mofunenglish.com/" title="其课程基于最适合英语学习的电影和美剧，可以安装手机英语学习软件英语魔方秀或者直接在魔方英语官网在线看电影学英语,练习口语,提高听力,最终整体提高英语水平.英语魔方秀是最专业的看电影追美剧学英语的英语学习软件." target="_blank" rel="nofollow" class="linkTip">魔方英语</a></li>
                <li><a href="http://www.somdom.com/" title="声同小语种学习论坛，提供泰语、粤语、西班牙语、法语、阿拉伯语、藏语、葡萄牙语、维吾尔语、波斯语、希伯来语等小语种的学习、考试资料，是小语种爱好者的学习交流乐园。" target="_blank" rel="nofollow" class="linkTip">声同小语种</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="caipu">
            <i class="icon-globe"></i>菜谱
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.xiachufang.com/" title="下厨房美食菜谱网倡导在家烹饪、健康的生活方式，提供有版权的实用菜谱做法与饮食知识，提供厨师和美食爱好者一个记录、分享的平台。" target="_blank" rel="nofollow" class="linkTip">下厨房</a></li>
                <li><a href="http://www.meishij.net/" title="中国最优质的美食，食谱，菜谱网" target="_blank" rel="nofollow" class="linkTip">美食杰</a></li>
                <li><a href="http://www.meishichina.com/" title="美食天下是最大的中文美食网站与厨艺交流社区，拥有最多的美食做法、菜谱、食谱大全以及家常菜菜谱，同时美食天下是聚集百万美食爱好者的美食家社区，欢迎您的加入！" target="_blank" rel="nofollow" class="linkTip">美食天下</a></li>
                <li><a href="http://www.xinshipu.com/" title="菜谱|菜谱大全|家常菜谱" target="_blank" rel="nofollow" class="linkTip">心食谱</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="aihao">
            <i class="icon-globe"></i>爱好
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.diaoyu123.com/" title="钓鱼人是中国最专业的钓鱼网站之一,包括钓鱼技巧,钓鱼视频,鱼饵配方等大量钓鱼知识,也是钓鱼爱好者网上学习钓鱼技巧的家园。" target="_blank" rel="nofollow" class="linkTip">钓鱼人</a></li>
                <li><a href="http://www.shougongke.com/" title="一个手工艺人的聚合社区，也是一款学习手工diy、分享手工作品、购买手工材料包的手工爱好者者必备app。手工客拥有大量海内外旧物改造、手工编织、折纸大全、创意手工、电子科技、亲子手工、创客、木工、皮艺、布艺,文玩等优秀手工diy图文教程和视频教程，你可以轻松地学习和分享，并将学到的编织、饰品、折纸、美食、烘焙、多肉植物、园艺、手帐等手工制作分享给你的朋友。" target="_blank" rel="nofollow" class="linkTip">手工客</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="dianzishu">
            <i class="icon-globe"></i>电子书
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.zoudupai.com/" title="提供一站式免费Kindle电子书下载与推送服务" target="_blank" rel="nofollow" class="linkTip">走读派</a></li>
                <li><a href="http://kankindle.com/" title="为您提供免费的Kindle电子书下载" target="_blank" rel="nofollow" class="linkTip">看kindle</a></li>
                <li><a href="http://readcolor.com/" title="发掘优质电子书资源，提供好书分享、下载与推送。支持mobi/epub/pdf/txt格式" target="_blank" rel="nofollow" class="linkTip">读远</a></li>
                <li><a href="http://kindlefere.com/" title="为静心阅读而生" target="_blank" rel="nofollow" class="linkTip">kindle伴侣</a></li>
                <li><a href="http://www.pixvol.com/" title="高清kindle格式漫画下载，支持推送漫画到kindle设备" target="_blank" rel="nofollow" class="linkTip">kindle漫画</a></li>
                <li><a href="http://www.amazon.cn/Kindle%E5%85%8D%E8%B4%B9%E7%94%B5%E5%AD%90%E4%B9%A6/b/ref=amb_link_30927692_12?ie=UTF8&node=116175071&pf_rd_m=A1AJ19PSB66TGU&pf_rd_s=left-2&pf_rd_r=019VVFFWQYQAVAHCRP80&pf_rd_t=101&pf_rd_p=81488872&pf_rd_i=116169071" title="亚马逊官网免费kindle电子书下载" target="_blank" rel="nofollow" class="linkTip noframe">亚马逊免费电子书</a></li>
                <li><a href="http://www.cnepub.com/" title="为您提供最好的电子书制作、交流平台" target="_blank" rel="nofollow" class="linkTip noframe">掌上书苑</a></li>
                <li><a href="http://www.txtzm.com/" title="txt电子书免费下载,免费小说下载,全集全本完结小说下载" target="_blank" rel="nofollow" class="linkTip">之梦TXT电子书论坛</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="zixun">
        <h1 class="lefttitle">资讯</h1>
        <h2 class="nav-title" id="yuedu">
            <i class="icon-globe"></i>阅读
            <span class="sub-category"><a href="#cool" class="current notop">所有</a>|<a href="#yuedu" class="notop">阅读</a>|<a href="#novel" class="notop">小说</a>|<a href="#quwei" class="notop">趣味</a>|<a href="#keji" class="notop">科技</a>|<a href="#chuangyi" class="notop">创意</a>|<a href="#xiaoqingxin" class="notop">小淸新</a>|<a href="#chuangye" class="notop">创业融资</a>|<a href="#goodblog" class="notop">个性独立博客</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.jianshu.com/" title="交流故事，沟通想法，一个基于内容分享的社区" target="_blank" rel="nofollow" class="linkTip noframe">简书</a></li>
                <li> <a href="http://www.15yan.com/" title="十五言是一个写作和阅读社区，在这里你可以专注写作、沉浸于阅读，也能和朋友共同创造出更大的世界。" target="_blank" rel="nofollow" class="linkTip">十五言</a></li>
                <li> <a href="http://www.qdaily.com/" title="以商业视角观察生活并启发你的好奇心，有想法的阅读网站" target="_blank" rel="nofollow" class="linkTip">好奇心日报</a></li>
                <li> <a href="http://shuge.org/" title="有品格的数字古籍图书馆, 书格, 古籍善本,Shuge Library,数字图书馆,书格网,版画,典籍,小说,绘画,老照片,每个人都能自由地看到我们的文明" target="_blank" rel="nofollow" class="linkTip noframe">书格</a></li>
                <li> <a href="http://www.duxieren.com/" title="读写人是一个聚合了书评杂志、书评博客、中英文读书资源的网站。看书评，到‘读写人’！" target="_blank" rel="nofollow" class="linkTip">读写人</a></li>
                <li> <a href="http://read.douban.com/" title="豆瓣阅读是优秀数字作品的阅读、出版平台，提供个人作者原创作品和出版社精品电子书，支持Web, iPhone, iPad, Android 多设备的同步阅读，支持批注、划线、分享、讨论。" target="_blank" rel="nofollow" class="linkTip">豆瓣阅读</a></li>
                <li> <a href="http://toutiao.io/" title="程序员必装的APP，在开发者头条，你可以阅读头条新闻、分享技术文章、发布开源项目，订阅技术极客/技术团队开通的独家号/团队号和关注编程牛人。" target="_blank" rel="nofollow" class="linkTip noframe">开发者头条</a></li>
                <li> <a href="http://www.techug.com/" title="用程序师的眼光看世界" target="_blank" rel="nofollow" class="linkTip">程序师视野网</a></li>
                <li> <a href="http://www.niaogebiji.com/" title="移动互联网第一干货平台，移动互联网新手学习好去处" target="_blank" rel="nofollow" class="linkTip">鸟哥笔记</a></li>
                <li> <a href="http://www.infoq.com/cn/" title="关注软件开发领域知识与创新的在线新闻/社区网站" target="_blank" rel="nofollow" class="linkTip">InfoQ中文站</a></li>
                <li> <a href="http://www.jiemian.com/" title="只服务于独立思考的人群" target="_blank" rel="nofollow" class="linkTip">界面</a></li>
                <li> <a href="http://wallstreetcn.com/" title="华尔街见闻——中国领先的财经新闻APP；影响金融市场的重大新闻；点击获取快速、精准、深入的全球财经资讯和市场观点。" target="_blank" rel="nofollow" class="linkTip">华尔街见闻</a></li>
                <li> <a href="http://www.infzm.com/" title="南方周末新闻社区官方网站" target="_blank" rel="nofollow" class="linkTip">南方周末</a></li>
                <li> <a href="http://www.zreading.cn/" title="一切成功均源自积累，致力于最美好的阅读体验！" target="_blank" rel="nofollow" class="linkTip">左岸读书</a></li>
                <li> <a href="http://news.ifeng.com/opinion/" title="国内通过正常途径能看到的不错的评论" target="_blank" rel="nofollow" class="linkTip">凤凰网评论</a></li>
                <li> <a href="http://www.yilan.io/home/" title="多终端同步，一致流畅的阅读体验。" target="_blank" rel="nofollow" class="linkTip">一览阅读</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="novel">
            <i class="icon-globe"></i>小说
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.bookben.com/" title="书本网是国内全集全本完结TXT电子书免费下载分享平台，大家可以把好看的完结电子书免费上传到这里，也可下载其他书友的全集txt小说，快来书本网分享你的优秀电子书吧！" target="_blank" rel="nofollow" class="linkTip">书本网</a></li>
                <li> <a href="http://www.dxsxs.com/" title="提供大学生小说、经典的名著、历史、言情、传记、玄幻武侠、人文社科类书籍在线阅读，所有TXT电子书手机免费下载阅读" target="_blank" rel="nofollow" class="linkTip">大学生小说网</a></li>
                <li> <a href="http://www.ybdu.com/" title="提供免费小说阅读与TXT全本小说下载" target="_blank" rel="nofollow" class="linkTip">一本读-全本小说网</a></li>
                <li> <a href="http://www.00ksw.net/" title="最值得收藏的网络小说阅读网，收录了当前最火热的网络小说" target="_blank" rel="nofollow" class="linkTip">零点看书</a></li>
                <li> <a href="http://www.fhxiaoshuo.com/" title="传说中,凤凰小说网里有很多天生丽质的菇凉.她们有的穿越了历史变成了女猪脚,有的走进了浪漫爱情的梦境.爱恨情仇、温暖幸福一切缘由凤凰小说网带你架空." target="_blank" rel="nofollow" class="linkTip">凤凰小说网</a></li>
                <li> <a href="http://www.biquge.tw/" title="免费提供高质量的小说最新章节，是广大网络小说爱好者必备的小说阅读网" target="_blank" rel="nofollow" class="linkTip">笔趣阁</a></li>
                <li> <a href="http://www.23us.com/" title="顶点小说致力于打造无广告无弹窗的在线小说阅读网站，提供小说在线阅读，小说TXT下载，网站没有弹窗广告页面简洁。" target="_blank" rel="nofollow" class="linkTip">顶点小说</a></li>
                <li> <a href="http://www.shenmabook.com/" title="神马小说网收集了网络流行的全文字手打TXT章节供您阅读" target="_blank" rel="nofollow" class="linkTip">神马小说网</a></li>
                <li> <a href="http://www.xiaoshuocity123.com/" title="好看的综合类小说阅读网站,提供各种题材小说免费在线阅读,包括都市,言情,玄幻,仙侠,穿越,历史,网游等几十种题材,更有手机版支持移动端阅读。" target="_blank" rel="nofollow" class="linkTip">小说城</a></li>
                <li> <a href="http://www.kanunu8.com/" title="免费小说在线阅读" target="_blank" rel="nofollow" class="linkTip">努努书坊</a></li>
                <li> <a href="http://www.zei8.co/" title="贼吧网作为txt小说下载在线阅读的电子书门户网站,为广大txt小说爱好者及书友提供一条龙的txt小说下载、txt小说、JAR、JAD、UMD等各种格式的小说,让您提高小说搜索下载和阅读效率." target="_blank" rel="nofollow" class="linkTip">贼吧网</a></li>
                <li> <a href="http://www.txt99.cc/" title="提供txt格式小说下载，主要包括穿越小说、都市小说、言情小说、玄幻小说、文学名著等电子书免费下载" target="_blank" rel="nofollow" class="linkTip">久久小说下载网</a></li>
                <li> <a href="http://book.aiisen.com/index.html" title="提供众多主内书籍,属灵书籍,基督教讲道集,基督教讲道视频,基督教歌谱在线阅读和下载" target="_blank" rel="nofollow" class="linkTip">爱神阅读</a></li>
                <li> <a href="http://www.cncnz.net/" title="最齐最好的TXT电子书免费下载网和TXT电子书分享论坛" target="_blank" rel="nofollow" class="linkTip">新鲜中文网论坛</a></li>
                <li> <a href="http://www.paotxt.net/" title="泡泡txt电子书论坛TXT小说全集,各类txt格式电子书下载" target="_blank" rel="nofollow" class="linkTip">泡泡txt电子书论坛</a></li>
                <li> <a href="http://www.txtzm.com/" title="手机阅读及mp4阅读爱好者的最佳选择，简单注册，即可快捷、永久地进行txt电子书免费下载，以及各类txt电子书、txt格式小说。" target="_blank" rel="nofollow" class="linkTip">txt之梦电子书论坛</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="quwei">
            <i class="icon-globe"></i>趣味
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.qiushibaike.com/" title="一个原创的糗事笑话分享社区,糗百网友分享的搞笑段子、搞笑图片大全,都是糗友最珍贵的开心经历,爆笑糗事笑话只在糗事百科！" target="_blank" rel="nofollow" class="linkTip">糗事百科</a></li>
                <li> <a href="http://www.bug.cn/" title="中国第一个影视找茬网站，致力于发现有趣的穿帮镜头" target="_blank" rel="nofollow" class="linkTip">穿帮网</a></li>
                <li> <a href="http://www.happyjuzi.com/" title="橘子娱乐是原创新闻资讯平台的新生代趣闻工厂, 内容涵盖社交网络热点, 娱乐八卦, 美妆、时尚，影视，生活等类别.用户可以第一时间了解最热的原创资讯，橘子娱乐将致力于成为娱乐资讯的原创内容生产者。" target="_blank" rel="nofollow" class="linkTip">橘子娱乐</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="keji">
            <i class="icon-globe"></i>科技
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.zhihu.com/" title="一个真实的网络问答社区,帮助你寻找答案,分享知识。" target="_blank" rel="nofollow" class="linkTip noframe">知乎</a></li>
                <li> <a href="http://www.guokr.com/" title="果壳网是一个泛科技主题网站，提供负责任、有智趣、贴近生活的内容，你可以在这里阅读、分享、交流、提问。果壳网致力于让科技兴趣成为人们文化生活和娱乐生活的重要元素。" target="_blank" rel="nofollow" class="linkTip">果壳网</a></li>
                <li> <a href="http://www.huxiu.com" title="有视角的、个性化商业资讯与交流平台，核心关注一系列明星公司" target="_blank" rel="nofollow" class="linkTip">虎嗅网</a></li>
                <li> <a href="http://www.leiphone.com/" title="专注于移动互联网创新和创业的科技博客，客观敏锐地记录移动互联网的每一天" target="_blank" rel="nofollow" class="linkTip">雷锋网</a></li>
                <li> <a href="http://www.36kr.com/" title="36氪是一个关注互联网创业的科技博客" target="_blank" rel="nofollow" class="linkTip">36氪</a></li>
                <li> <a href="http://www.ifanr.com/" title="发现创新价值的科技媒体" target="_blank" rel="nofollow" class="linkTip">爱范儿</a></li>
                <li> <a href="http://www.pingwest.com/" title="有品好玩的科技，一切与你有关" target="_blank" rel="nofollow" class="linkTip">PingWest品玩</a></li>
                <li> <a href="http://tech2ipo.com/" title="专注互联网创业与创新,我们报道最前沿的科技创业模式,披露最有潜力的新兴创业公司" target="_blank" rel="nofollow" class="linkTip">Tech2IPO创见</a></li>
                <li> <a href="http://cn.technode.com/" title="TechCrunch中国官方合作伙伴；全球最具影响力的中英双语科技媒体。动点科技致力于全球科技新闻，创业投资以及行业趋势发展的报道，旨在打造科技界中英文交流平台。旗下品牌包括ChinaBang、动点沙龙 (TNT)、互联网巡回主题日，动点智库和动点招聘。" target="_blank" rel="nofollow" class="linkTip">动点科技</a></li>
                <li> <a href="http://www.geekpark.net/" title="极客公园，为你带来互联网热门趋势、热点产品的深度分析，发掘产品和趋势的价值" target="_blank" rel="nofollow" class="linkTip noframe">极客公园</a></li>
                <li> <a href="http://www.itfeed.com/" title="ITFeed是电子商务垂直媒体，关注电商网站成长动态，这里有最新最有价值的电子商务行业资讯、电商新闻、电商论坛、电商招聘、电商服务商、电商人物、电商网站等信息。" target="_blank" rel="nofollow" class="linkTip noframe">ITfeed</a></li>
                <li> <a href="http://www.kejilie.com/" title="科技猎是帮你高效阅读科技资讯的工具,也是科技资讯垂直搜索引擎,专注科技资讯,高效读科技,提供实时科技资讯。分类展示IT资讯，可以个性订阅自己感兴趣的科技资讯,。并且通过数据挖掘技术，发掘科技资讯内在有价值的规律。是科技资讯领域的活跃力量。" target="_blank" rel="nofollow" class="linkTip noframe">科技猎</a></li>
                <li> <a href="http://www.sdk.cn/" title="SDK.cn，为开发者提供最全面的API服务，汇集了国内外应用开发所需要的Android API/SDK，iOS SDK，WindowsPhone SDK，涉及设计开发，运维服务，云服务，市场推广，数据服务等多种服务，旨在向开发者提供最全面，最便捷的API/SDK相关服务。" target="_blank" rel="nofollow" class="linkTip noframe">SDK.CN</a></li>
                <li> <a href="http://cn.engadget.com/" title="来自 Engadget 中国版团队的科技新闻和评测。掌握最新消费性电子产品消息。" target="_blank" rel="nofollow" class="linkTip noframe">Engadget中国版</a></li>
                <li> <a href="http://www.waerfa.com/" title="应用提高设备生产力" target="_blank" rel="nofollow" class="linkTip">玩法</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chuangyi">
            <i class="icon-globe"></i>创意
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.topys.cn/" title="全球顶尖创意分享平台" target="_blank" rel="nofollow" class="linkTip">TOPYS顶尖文案</a></li>
                <li> <a href="http://www.lemo.me/" title="最优质的文化创意产业互动平台，为专业人才及专业机构提供展示与合作机会" target="_blank" rel="nofollow" class="linkTip">乐摩网</a></li>
                <li> <a href="http://www.art-ba-ba.com/" title="中国当代艺术社区" target="_blank" rel="nofollow" class="linkTip">中国当代艺术社区</a></li>
                <li> <a href="http://www.patent-cn.com/" title="设计发明与创意商机" target="_blank" rel="nofollow" class="linkTip">专利之家</a></li>
                <li> <a href="http://www.pplock.com/" title="分享关于美的一切" target="_blank" rel="nofollow" class="linkTip">PPLock</a></li>
                <li> <a href="http://adsoftheworld.com/" title="涵盖平面视频等等" target="_blank" rel="nofollow" class="linkTip">世界优秀广告</a></li>
                <li> <a href="http://www.koii.cn/" title="全球最新标志灵感库" target="_blank" rel="nofollow" class="linkTip">酷遇网</a></li>
                <li> <a href="http://www.ideaest.com/" title="创意栖息是一个分享创意，咀嚼文字，设计图像的网站，我们期待更多的从业者加入创意栖息孵化计划！" target="_blank" rel="nofollow" class="linkTip">创意栖息</a></li>
                <li> <a href="http://www.shejipi.com/" title="关注设计癖，发现好设计。" target="_blank" rel="nofollow" class="linkTip">设计癖</a></li>
                <li> <a href="http://www.gtn9.com/" title="国内专业品牌创意平台，以品牌为核心，集创意作品分享、活动招聘发布、广告推广、正版字体素材下载等多元化的交流分享平台。会员交流涉及：艺术创作、广告创意、交互设计、时尚文化等诸多创意产业。" target="_blank" rel="nofollow" class="linkTip">古田路9号</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="xiaoqingxin">
            <i class="icon-globe"></i>小淸新
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://ziranzhi.com/" title="我们关注自然，那么我们的任务就是给你介绍这个世界上最稀有，最奇特，最酷的自然事物" target="_blank" rel="nofollow" class="linkTip">自然志</a></li>
                <li> <a href="http://www.woxihuan.com/" title="收集喜欢的图片和网页。可以查阅别人收集的内容，或看看热门收集频道等" target="_blank" rel="nofollow" class="linkTip">我喜欢</a></li>
                <li> <a href="http://www.xiachufang.com/" title="一个吃货的精彩分享平台，提供有版权的实用菜谱做法与饮食知识" target="_blank" rel="nofollow" class="linkTip">下厨房</a></li>
                <li> <a href="http://www.lingshikong.com/" title="零食控是一个以少而精为特色，专注于优质品牌零食推荐的新媒体" target="_blank" rel="nofollow" class="linkTip">零食控</a></li>
                <li> <a href="http://huaban.com/" title="收集灵感,保存素材,计划旅行,晒晒精美家居,服饰搭配,发型和婚纱" target="_blank" rel="nofollow" class="linkTip">花瓣</a></li>
                <li> <a href="http://www.meishichina.com/" title="中文美食网站与厨艺交流社区，拥有最多的美食做法、菜谱、食谱大全" target="_blank" rel="nofollow" class="linkTip">美食天下</a></li>
                <li> <a href="http://www.lemo.me/" title="最优质的文化创意产业互动平台，为专业人才及专业机构提供展示与合作机会" target="_blank" rel="nofollow" class="linkTip">乐摩网</a></li>
                <li> <a href="http://www.haodou.com/" title="提供最全、最优质的中文菜谱做法，分享与点评您最爱的美食" target="_blank" rel="nofollow" class="linkTip">好豆网</a></li>
                <li> <a href="http://www.ufochn.com/" title="探寻外星人的足迹，寻求宇宙未解之谜" target="_blank" rel="nofollow" class="linkTip">UFO中文网</a></li>
                <li> <a href="http://qng.im/" title="小众飞行员的精神燃料补给站" target="_blank" rel="nofollow" class="linkTip">青果</a></li>
                <li> <a href="http://www.fqpai.com/" title="小清新中国第一站、图片、文字、音乐、影视等" target="_blank" rel="nofollow" class="linkTip">番茄派</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="chuangye">
            <i class="icon-globe"></i>创业融资
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://angelcrunch.com/" target="_blank" rel="nofollow" class="linkTip">天使汇</a></li>
                <li><a href="http://www.wabei.cn/" target="_blank" rel="nofollow" class="linkTip">挖贝网</a></li>
                <li><a href="http://www.cyzone.cn/" title="中国创业者的信息平台和服务平台，帮助中国创业者实现创业梦想" target="_blank" rel="nofollow" class="linkTip">创业邦</a></li>
                <li><a href="http://ctquan.com/" target="_blank" rel="nofollow" class="linkTip">创投圈</a></li>
                <li><a href="http://www.tisiwi.com/" target="_blank" rel="nofollow" class="linkTip">天使湾</a></li>
                <li><a href="http://vc.iheima.com/" title="创业创新服务互联网平台，帮助创业团队了解最创业趋势，分析创业热点动态" target="_blank" rel="nofollow" class="linkTip">i黑马投融</a></li>
                <li><a href="http://17startup.com/" title="致力于成为中国最新最全的初创公司数据库和最活跃最有价值的创业点评社区" target="_blank" rel="nofollow" class="linkTip">17startup</a></li>
                <li><a href="http://www.howvc.com/" target="_blank" rel="nofollow" class="linkTip">好投网</a></li>
                <li><a href="http://www.chekucafe.com/" target="_blank" rel="nofollow" class="linkTip">车库咖啡</a></li>
                <li><a href="http://www.3wcoffee.com/" target="_blank" rel="nofollow" class="linkTip">3wcoffee</a></li>
                <li><a href="http://xindanwei.com/" target="_blank" rel="nofollow" class="linkTip">新单位</a></li>
                <li><a href="http://www.ycpai.com/" target="_blank" rel="nofollow" class="linkTip">缘创派</a></li>
                <li><a href="http://www.taou.com/landing" target="_blank" rel="nofollow" class="linkTip">淘友网</a></li>
                <li><a href="http://www.kic.net.cn/" target="_blank" rel="nofollow" class="linkTip">创天地</a></li>
                <li><a href="http://www.chuangxin.com/" target="_blank" rel="nofollow" class="linkTip">创新工场</a></li>
                <li><a href="http://www.whibi.com/" target="_blank" rel="nofollow" class="linkTip">中国光谷</a></li>
                <li><a href="http://www.iheima.com/" target="_blank" rel="nofollow" class="linkTip">黑马工场</a></li>
                <li><a href="http://chinaccelerator.com/" target="_blank" rel="nofollow" class="linkTip">中国加速</a></li>
                <li><a href="http://www.istartvc.com/" target="_blank" rel="nofollow" class="linkTip">起点营</a></li>
                <li><a href="http://www.ventureslab.com/" target="_blank" rel="nofollow" class="linkTip">麦刚工场</a></li>
                <li><a href="http://www.innovalley.com.cn/" target="_blank" rel="nofollow" class="linkTip">创新谷</a></li>
                <li><a href="http://www.mediadreamworks.net/" target="_blank" rel="nofollow" class="linkTip">传媒梦工</a></li>
                <li> <a href="http://www.pedaily.cn/" title="为创业者提供TMT,IT服务,创业投资,风险投资,私募股权等权威门户" target="_blank" rel="nofollow" class="linkTip">投资界</a></li>
                <li> <a href="http://www.tmtpost.com/" title="TMT行业观点平台，把脉科技资本论，从资本市场看科技价值与趋势" target="_blank" rel="nofollow" class="linkTip">钛媒体</a></li>
                <li> <a href="http://www.cyz.org.cn/" title="清华大学旗下专注于中国创业教育与经验分享的平台" target="_blank" rel="nofollow" class="linkTip">创业者</a></li>
                <li> <a href="http://www.aihehuo.com/" title="和有意思的人一起创业，更加爱合伙" target="_blank" rel="nofollow" class="linkTip">爱合伙</a></li>
                <li> <a href="http://www.youmi.cn/" title="优米网（youmi.cn）是为创业者、大学生、职场人士提供的在线视频学习平台。讲师团队包括史玉柱、马云、王石等商界大佬及各行业专家，内容覆盖营销、创业商机、领导力、投资融资、税务法律、礼仪、就业、理财等多个领域，视频播放清晰流畅，操作界面简单友好。" target="_blank" rel="nofollow" class="linkTip">优米网</a></li>
                <li> <a href="http://www.yijian.tv/" title="一见是一个创新型互联网投融资直约平台，致力于为创业者寻找靠谱投资人，帮投资人发现优质创业项目。一见为创业者和投资人提供专业的视频名片拍摄服务和最实用的创业技能，全面打造创业者和投资人的专属社区。" target="_blank" rel="nofollow" class="linkTip">一见投融资直约平台</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ebusiness">
            <i class="icon-globe"></i>电子商务
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.kaola.com/" title="网易旗下跨境电商平台，放心海淘" target="_blank" rel="nofollow" class="linkTip">网易考拉海购</a></li>
                <li><a href="http://www.liwushuo.com/" title="中国最受欢迎的礼物电商平台，送礼物，就上礼物说" target="_blank" rel="nofollow" class="linkTip">礼物说</a></li>
                <li><a href="http://www.duwu.mobi/" title="极尽世间好物，专注提升逼格" target="_blank" rel="nofollow" class="linkTip">毒物</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="job">
            <i class="icon-globe"></i>求职
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.zhaopin.com/" title="智联招聘是全国性权威人才网站,为求职者提供最新最全的招聘信息,为企业提供网络招聘,校园招聘,猎头,培训,测评和人事外包等一站式专业人力资源服务.好工作上智联招聘. " target="_blank" rel="nofollow" class="linkTip">智联招聘</a></li>
                <li><a href="http://www.chinahr.com/" title="中华英才网为您提供招聘，找工作，求职信息，同时覆盖校园招聘、求职指导、职业测评、猎头服务等求职服务，中华英才网助您找到知名企业和高薪职位！ " target="_blank" rel="nofollow" class="linkTip">中华英才网</a></li>
                <li><a href="http://51job.com/" title="好工作尽在前程无忧 " target="_blank" rel="nofollow" class="linkTip">51job</a></li>
                <li><a href="http://yingjiesheng.com/" title="提供最新、最全、最准确的应届大学毕业生校园招聘信息，兼职实习信息以及校园宣讲会和校园招聘会信息，覆盖上海北京广州深圳武汉南京天津成都等地区。 " target="_blank" rel="nofollow" class="linkTip">应届生求职网</a></li>
                <li><a href="http://shixian.com/" title="互联网工程师兼职平台" target="_blank" rel="nofollow" class="linkTip">实现网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="goodblog">
            <i class="icon-globe"></i>个性独立博客
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://lusongsong.com/" title="关注草根创业者和站长的媒体博客" target="_blank" rel="nofollow" class="linkTip">卢松松</a></li>
                <li><a href="http://yigujin.cn/" title="一个普通人的生活纪实博客" target="_blank" rel="nofollow" class="linkTip">懿古今</a></li>
                <li><a href="http://www.tanglangxia.com/" title="记录日常点滴、关注网络琐碎；感悟与吐槽并存、收藏与分享伴随" target="_blank" rel="nofollow" class="linkTip">螳螂虾</a></li>
                <li><a href="http://www.guchena.com/" title="感受宁静，欢迎来我这里歇歇脚，在人生的道路上偶尔驻足停留一下未尝不是风景。" target="_blank" rel="nofollow" class="linkTip">一诚</a></li>
                <li><a href="http://soz.im/" title="SOZ是一个记录wordpress折腾，分享小知识，和一些蛋痛趣事的博客，在这里和大家探讨各种有趣问题以及一些关于计算机方面的问题" target="_blank" rel="nofollow" class="linkTip noframe">SOZ</a></li>
                <li><a href="http://www.dedewp.com/" title="WordPress建站一站式服务平台" target="_blank" rel="nofollow" class="linkTip noframe">陌小雨</a></li>
                <li><a href="http://c945.com/" title="没位道(Xizon Creative),设计师Chuckie Chang的品牌中文站,记录我的生活与学习分享,提供全球领先的高端网站UI/UX, 移动端界面设计,基于商业化的HTML5移动和Web产品" target="_blank" rel="nofollow" class="linkTip noframe">没味道</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="fuli">
        <h1 class="lefttitle">福利</h1>
        <h2 class="nav-title" id="fuliblog">
            <i class="icon-globe"></i>福利博客
            <span class="sub-category"><a href="#fuli" class="current notop">所有</a>|<a href="#fuliblog" class="notop">福利博客</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.fulidang.com/" title="关注最新门事件、搜罗番号种子福利、致力扫盲普及涨姿势" target="_blank" rel="nofollow" class="linkTip">福利档</a></li>
                <li> <a href="http://zhainanba.net/" title="专门分享宅男福利的网站" target="_blank" rel="nofollow" class="linkTip">宅男吧</a></li>
                <li> <a href="http://youliao.me/" title="为你发现互联网上最有趣和具有传播力的新鲜事物，将这些信息进行全新解读" target="_blank" rel="nofollow" class="linkTip">有料么</a></li>
                <li> <a href="http://fuliba.net/" title="分享你的福利吧" target="_blank" rel="nofollow" class="linkTip">福利吧</a></li>
                <li> <a href="http://www.hexieshe.com/" title="中国大陆最具活力最懂情趣的二次元H站" target="_blank" rel="nofollow" class="linkTip">和邪社</a></li>
                <li> <a href="http://www.fuliti.cc/" title="拥有最精彩的福利图片、视频、真相内幕" target="_blank" rel="nofollow" class="linkTip">福利梯</a></li>
                <li> <a href="http://wuxianfuli.cc/" title="为广大宅男、屌丝分享趣味与福利的个人独立博客" target="_blank" rel="nofollow" class="linkTip">无限福利</a></li>
                <li> <a href="http://www.neihan8.com/" title="有内涵的网民们都爱看的网站" target="_blank" rel="nofollow" class="linkTip">内涵吧</a></li>
                <li> <a href="http://www.dsqnw.com/" title="专注为屌丝青年分享最火最热的福利资源" target="_blank" rel="nofollow" class="linkTip">屌丝青年</a></li>
                <li> <a href="http://www.flgod.org/" title="宅男的天堂，分享最新福利和电影" target="_blank" rel="nofollow" class="linkTip">福利天堂</a></li>
                <li> <a href="http://www.xiannvw.com/" title="最新美女热舞全集_韩国女主播视频大全" target="_blank" rel="nofollow" class="linkTip noframe">仙女屋</a></li>
                <li> <a href="http://www.fulibac.com/" title="福利控找福利,内涵图的地方,你懂的" target="_blank" rel="nofollow" class="linkTip">且听风吟</a></li>
                <li> <a href="http://www.laosiji8.net/" title="GIF出处、动图出处、番号查询、邪恶GIF、微博福利、COS福利" target="_blank" rel="nofollow" class="linkTip">老司机吧</a></li>
                <li> <a href="http://www.gifjia.com/" title="网络热门精品GIF图片出处大全" target="_blank" rel="nofollow" class="linkTip">gif发源地</a></li>
                <li> <a href="http://www.zhainanfulishe.net/" title="专注于分享宅男福利，写真视频，好玩的资源下载等" target="_blank" rel="nofollow" class="linkTip">宅男福利社</a></li>
                <li> <a href="http://txflsp.com/" title="每日两段精彩的美女福利视频" target="_blank" rel="nofollow" class="linkTip">桃心福利视频</a></li>
                <li> <a href="http://fuli.lu" title="涨姿势、有态度、福利吧、好孩子、老司机、糗事百科" target="_blank" rel="nofollow" class="linkTip">撸福利</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="kexue">
        <h1 class="lefttitle">科学上网</h1>
        <h2 class="nav-title" id="fanqiang">
            <i class="icon-unlock-alt"></i>科学上网
            <span class="sub-category"><a href="#kexue" class="current notop">所有</a>|<a href="#fanqiang" class="notop">科学上网</a>|<a href="#google" class="notop">谷歌镜像</a>|<a href="#daili" class="notop">免费代理</a>|<a href="#ss" class="notop">免费SS账号</a>|<a href="#xunlei" class="notop">免费迅雷会员</a>|<a href="#aiqiyi" class="notop">免费爱奇艺会员</a>|<a href="#youku" class="xunlei">免费优酷会员</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="https://github.com/getlantern/forum#%E8%93%9D%E7%81%AFlantern%E6%9C%80%E6%96%B0%E7%89%88%E6%9C%AC%E4%B8%8B%E8%BD%BD" title="蓝灯(Lantern)官方论坛 ！" target="_blank" rel="nofollow" class="linkTip noframe">自由无阻碍的互联网</a></li>
                <li> <a href="http://www.feiyulian.cn/aff.php?aff=294" title="高强度加密传输、智能路由、跨平台、支持移动客户端" target="_blank" rel="nofollow" class="linkTip noframe">飞鱼链</a></li>
                <li> <a href="http://www.tizipuss.com/" title="世界那么大，还不去看看" target="_blank" rel="nofollow" class="linkTip noframe">梯子铺</a></li>
                <li> <a href="http://www.ay321.com/" title="针对网民访问网络游戏、对战平台、在线视频影院等资源度慢的问题，先后开发了“游戏专线加速”、“独享专线”、“企业专线”等系列产品，高效解决了用户网页加载慢、无法正常访问、网游戏延迟高、视频无限缓冲的痛楚。" target="_blank" rel="nofollow" class="linkTip noframe">安云加速器</a></li>
                <li> <a href="http://www.leisufree.com" title="付费服务 快速稳定有保障 FaceBook·Youtube·Google一键到达" target="_blank" rel="nofollow" class="linkTip noframe">雷速网络加速器</a></li>
                <li> <a href="http://www.geek-vpn5.com/" title="拥有美国专线服务器，稳定、快速。所有数据，全部加密，确保您的隐私安全。让您安心遨游网络世界 ！" target="_blank" rel="nofollow" class="linkTip noframe">极客VPN<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://ssd.la/" title="提供SSD云主机、SS科学上网、虚拟主机、域名注册、SSL证书" target="_blank" rel="nofollow" class="linkTip noframe">ss账号购买</a></li>
                <li> <a href="http://www.dou-bi.com/" title="世界那么逗，我想出去看看" target="_blank" rel="nofollow" class="linkTip">逗比根据地</a></li>
                <li> <a href="http://niuxss.com/" title="一种全新上网体验，带您走进不一样的世界！" target="_blank" rel="nofollow" class="linkTip noframe">牛叉网络加速服务</a></li>
                <li> <a href="http://fazero.cc/archives/584" title="免费，速度快，支持windows，Ubuntu，Mac三平台，安装配置简单" target="_blank" rel="nofollow" class="linkTip shanchu">蓝灯Lantern</a></li>
                <li> <a href="http://www.ccav1.me/chromegae.html" title="Yanu分享的科学上网" target="_blank" rel="nofollow" class="linkTip shanchu">ChromeGAE</a></li>
                <li> <a href="http://browser.ccavhd.com/chromegae.html" title="Yanu分享的科学上网" target="_blank" rel="nofollow" class="linkTip shanchu">360ChromeGAE 1.1</a></li>
                <li> <a href="http://www.jubushoushen.com/" title="科学上网博客" target="_blank" rel="nofollow" class="linkTip shanchu">菊部受审</a></li>
                <li> <a href="http://wsgzao.github.io/post/fq/" title="免费和付费的GFW翻墙方案小结" target="_blank" rel="nofollow" class="linkTip shanchu">GFW翻墙小结</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="google">
            <i class="icon-unlock-alt"></i>谷歌镜像
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.scholarnet.cn/" title="专注于科学科研工作者" target="_blank" rel="nofollow" class="linkTip">学术网</a></li>
                <li> <a href="http://www.itechzero.com/google-mirror-sites-collect.html" title="某博主搜集的Google镜像站，数量很多" target="_blank" rel="nofollow" class="linkTip shanchu">Google镜像站搜集 <img src="../wp-content/themes/Loostrive/images/hot.gif"></a></li>
                <li> <a href="http://g.bt.gg/" title="google中文原版搜索镜像" target="_blank" rel="nofollow" class="linkTip shanchu noframe">g.bt.gg</a></li>
                <li><a href="http://www.tulingss.com/" title="中国第一个专为程序员打造的搜索引擎" target="_blank" rel="nofollow" class="linkTip shanchu">图灵搜索</a></li>
                <li><a href="http://www.googto.com/" title="Googto构图搜索致力于提供最佳的搜索体验，所有搜索结果均来自互联网" target="_blank" rel="nofollow" class="linkTip shanchu">Googto搜索</a></li>
                <li><a href="http://www.wesou.org/" title="最好用的技术资料搜索引擎" target="_blank" rel="nofollow" class="linkTip shanchu">微搜索</a></li>
                <li><a href="http://www.gugesou.cn/" title="谷歌搜索引擎镜像" target="_blank" rel="nofollow" class="linkTip shanchu">谷歌搜</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="daili">
            <i class="icon-unlock-alt"></i>免费代理
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.hibenben.com/502.html" title="提供今日IP代理使用教程及下载" target="_blank" rel="nofollow" class="linkTip">今日IP代理</a></li>
                <li> <a href="http://www.fengherili.xyz/#y" title="免费代理" target="_blank" rel="nofollow" class="linkTip shanchu">（代理）风和日丽</a></li>
                <li> <a href="http://www.fengherili.xyz/#a" title="免费代理" target="_blank" rel="nofollow" class="linkTip shanchu">AA代理</a></li>
                <li> <a href="http://www.fengherili.xyz/#p" title="免费代理" target="_blank" rel="nofollow" class="linkTip shanchu">PP代理</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="ss">
            <i class="icon-unlock-alt"></i>免费SS账号
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.ishadowsocks.com/" title="长期更新免费shadowsocks账号，提供科学上网教程" target="_blank" rel="nofollow" class="linkTip">ishadowsocks</a></li>
                <li> <a href="http://www.shadowsocks.asia/mianfei/10.html" title="免费shadowsocks账号分享（ss账号/影梭账号）" target="_blank" rel="nofollow" class="linkTip shanchu">shadowsocks中文社区</a></li>
                <li> <a href="http://1.aiguge.xyz/shadowsocks" title="ChromeWo共享小飞机（免费shadowsocks账号）" target="_blank" rel="nofollow" class="linkTip shanchu">ChromeWo</a></li>
                <li> <a href="http://shadowsocks.info/category/shadowsocks-zhanghao/" title="shadowsocks账号分享" target="_blank" rel="nofollow" class="linkTip shanchu">shadowsocks.info</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="xunlei">
            <i class="icon-unlock-alt"></i>免费迅雷会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://pan.baidu.com/s/1dDwNXSl" title="迅雷多用户登录，防止账号冲突被踢" target="_blank" rel="nofollow" class="linkTip">迅雷防踢版</a></li>
                <li><a href="http://www.vipfenxiang.com/xunlei/" title="每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号"  target="_blank" rel="nofollow" class="linkTip">vip分享网</a></li>
                <li><a href="http://www.ffaner.com/category/xunlei" title="每10分钟更新一次，为网友提供高质量的会员帐号服务！" target="_blank" rel="nofollow" class="linkTip">飞凡vip</a></li>
                <li><a href="http://vip.ihuan.me/xl.html" title="自动搜集网络免费共享发布的迅雷黄金会员账号、爱奇艺会员账号" target="_blank" rel="nofollow" class="linkTip">vip会员账号分享</a></li>
                <li><a href="http://www.xunleifxw.com/category/vip" title="每天定时定量分享迅雷账号，我们更专业"  target="_blank" rel="nofollow" class="linkTip shanchu">迅雷分享屋</a></li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=1" title="迅雷vip账号分享 每天更新" target="_blank" rel="nofollow" class="linkTip">vip部落</a></li>
                <li><a href="http://www.zmsq.com/category/yunbo" title="迅雷会员账号分享-迅雷白金会员账号分享 " target="_blank" rel="nofollow" class="linkTip">织梦社区</a></li>
                <li><a href="http://www.521xunlei.com/forum-xunleihuiyuan-1.html" title="专业的24小时迅雷会员账号共享平台，每日更新大量迅雷会员账号密码"  target="_blank" rel="nofollow" class="linkTip">爱密码</a></li>
                <li><a href="http://www.uevip.cn/article_list/xunlei" title="每天分享迅雷会员账号，整理大量迅雷vip共享账号" target="_blank" rel="nofollow" class="linkTip">优易体验馆</a></li>
                <li><a href="http://www.aiqiyivip.com/forum-38-1.html" title="迅雷会员账号分享,迅雷7会员账号分享" target="_blank" rel="nofollow" class="linkTip">乐享网</a></li>
                <li><a href="http://www.xunwangba.com/forum-49-1.html" title="官方整理迅雷vip账号共享每天更新迅雷账号共享" target="_blank" rel="nofollow" class="linkTip">迅网吧</a></li>
                <li><a href="http://www.fenxs.com/" title="每天定时更新迅雷白金企业钻石会员帐号" target="_blank" rel="nofollow" class="linkTip">分享社</a></li>
                <li><a href="http://www.laobinggun.com/forum-37-1.html" title="官方每天共享迅雷白金会员" target="_blank" rel="nofollow" class="linkTip">老冰棍论坛</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="aiqiyi">
            <i class="icon-unlock-alt"></i>免费爱奇艺会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://vip.ihuan.me/iqiyi.html" title="自动搜集网络免费共享发布的爱奇艺黄金会员账号、爱奇艺会员账号" target="_blank" rel="nofollow" class="linkTip">vip会员账号分享</a></li>
                <li><a href="http://www.600zh.com/" title="爱奇艺会员账号共享_爱奇艺vip账号共享_每小时更新" target="_blank" rel="nofollow" class="linkTip">600zh</a></li>
                <li><a href="http://www.ffaner.com/category/iqiyi" title="每10分钟更新一次，为网友提供高质量的会员帐号服务！" target="_blank" rel="nofollow" class="linkTip">飞凡vip</a></li>
                <li><a href="http://www.zhanghao.cc/aiqiyihuiyuanzhanghao.html" title="免费提供迅雷会员，优酷会员，爱奇艺会员，pps会员，每天不定时更新" target="_blank" rel="nofollow" class="linkTip">帐号网</a></li>
                <li><a href="http://www.mdouvip.com/aiqiyi" title="长期共享爱奇艺会员账号，更新最及时，爱奇艺会员账号数量最多！" target="_blank" rel="nofollow" class="linkTip">麦豆vip分享网</a></li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=2" title="专注分享各种会员账号" target="_blank" rel="nofollow" class="linkTip">vip部落</a></li>
                <li><a href="http://www.uevip.cn/article_list/iqiyi" title="提供网络会员免费体验" target="_blank" rel="nofollow" class="linkTip">优易体验馆</a></li>
                <li><a href="http://www.vipfenxiang.com/iqiyi/" title="每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号" target="_blank" rel="nofollow" class="linkTip">vip分享网</a></li>
                <li><a href="http://www.aiqiyivip.com/forum-2-1.html" title="爱奇艺会员账号共享,24小时更新爱奇艺会员账号" target="_blank" rel="nofollow" class="linkTip">乐享网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="youku">
            <i class="icon-unlock-alt"></i>免费优酷会员
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.ffaner.com/category/youku" title="每10分钟更新一次，为网友提供高质量的会员帐号服务！" target="_blank" rel="nofollow" class="linkTip">飞凡vip</a></li>
                <li><a href="http://vip.ihuan.me/youku.html" title="自动搜集网络免费共享发布的优酷vip会员账号" target="_blank" rel="nofollow" class="linkTip">vip会员账号分享</a></li>
                <li><a href="http://vipbuluo.com/catalog.asp?cate=3" title="专注分享各种会员账号" target="_blank" rel="nofollow" class="linkTip">vip部落</a></li>
                <li><a href="http://www.vipfenxiang.com/youku/" title="每天定时发布迅雷白金会员账号、爱奇艺会员账号、优酷网会员账号等等网站的VIP账号" target="_blank" rel="nofollow" class="linkTip">vip分享网</a></li>
                <li><a href="http://www.mdouvip.com/youku" title="长期共享优酷会员账号，更新及时" target="_blank" rel="nofollow" class="linkTip">麦豆vip分享网</a></li>
                <li><a href="http://yk.aiqiyivip.com/" title="会员账号共享区，24小时更新优酷会员账号" target="_blank" rel="nofollow" class="linkTip">乐享网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="qiangwai">
        <h1 class="lefttitle">墙外世界</h1>
        <h2 class="nav-title" id="worlddh">
            <i class="icon-globe"></i>墙外导航
            <span class="sub-category"><a href="#worldnews" class="current notop">所有</a>|<a href="#worlddh" class="notop">墙外导航</a>|<a href="#worldnews" class="notop">新闻</a>|<a href="#worldvideo" class="notop">视频</a>|<a href="#worldshejiao" class="notop">社交</a></span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.fanqiangzhe.com/" title="翻墙后看什么？这是很多网友学会翻墙后感到困惑的一个问题。“翻墙者”网站（fanqiangzhe.com）为大家提供墙外网址导航，告诉你翻墙后看什么。" target="_blank" rel="nofollow" class="linkTip">翻墙者</a></li>
                <li><a href="http://www.neihan999.com/FQ/" title="收录了中国大陆不能正常访问的网址" target="_blank" rel="nofollow" class="linkTip">墙外世界导航</a></li>
                <li><a href="http://www.kanguowai.com/" title="收录了国外著名的网站、好玩的、好看的、有趣的国外网站以及实用的、优秀的国外网站" target="_blank" rel="nofollow" class="linkTip">看国外</a></li>
                <li><a href="http://www.egouz.com/" title="分享和推荐国外知名、实用、高质量的国外网址的站点" target="_blank" rel="nofollow" class="linkTip">EGOUZ国外网站推荐</a></li>
                <li><a href="http://www.0430.com/" title="全球网站库免费收录与分享各类优秀网站。网站内容覆盖中国、美国、俄罗斯、韩国等国家与地区，包含站长、设计、美食、旅游、文化、音乐、移动互联网等类别的全球正规网站资源。" target="_blank" rel="nofollow" class="linkTip">全球网站库</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="worldnews">
            <i class="icon-globe"></i>新闻
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://cn.nytimes.com/" title="纽约时报中文版" target="_blank" rel="nofollow" class="linkTip noframe">纽约时报<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://www.aol.com/" title="美国在线（American Online）" target="_blank" rel="nofollow" class="linkTip">美国在线<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://bbc.co.uk/chinese/" title="英国BBC中文官方网站" target="_blank" rel="nofollow" class="linkTip">BBC中文网<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://cn.reuters.com/" title="路透中文网为中文读者提供世界热点地区经济新闻，突发事件报道，宏观经济报道，深度分析，观点评论和生活时尚资讯。" target="_blank" rel="nofollow" class="linkTip">路透社中文网<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://cn.wsj.com/" title="华尔街日报中文网_突发新闻，商业，经济，金融，财经，国际新闻，多媒体，视频_华尔街日报中文版" target="_blank" rel="nofollow" class="linkTip">华尔街日报中文网<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://www.zaobao.com.sg/" title="新加坡、中国、亚洲和国际的即时、评论、商业、体育、生活、科技与多媒体新闻，尽在联合早报。" target="_blank" rel="nofollow" class="linkTip">新加坡联合早报<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://mingpao.com/" title="香港明报官网" target="_blank" rel="nofollow" class="linkTip">香港明报<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://www.ap.org/" title="美联社是世界上独立新闻采访量最大的通讯社之一，其新闻稿件被世界众多新闻机构采用" target="_blank" rel="nofollow" class="linkTip">美联社<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://www.afp.com/" title="法新社24小时不断提供快速、准确的视频、文字、图片新闻资料，及时报道战争和冲突、政治、体育、娱乐、健康等领域新闻以及科学和技术的最新突破" target="_blank" rel="nofollow" class="linkTip noframe">法新社<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="worldvideo">
            <i class="icon-globe"></i>视频
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://www.youtube.com/" title="全球知名视频网站" target="_blank" rel="nofollow" class="linkTip noframe">youtube<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://vimeo.com/" title="高清视频播客网站，与大多数类似的视频分享网站不同，Vimeo允许上传1280X700的高清视频，上传后Vimeo会自动转码为高清视频，源视频文件可以自由下载，它达到了真正的高清视频标准" target="_blank" rel="nofollow" class="linkTip noframe">vimeo<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="worldshejiao">
            <i class="icon-globe"></i>社交
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li> <a href="http://twitter.com/" title="全球知名社交网站" target="_blank" rel="nofollow" class="linkTip">Twitter<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://facebook.com/" title="联系朋友的社交工具。大家可以通过它和朋友、同事、同学以及周围的人保持互动交流，分享无限上传的图片" target="_blank" rel="nofollow" class="linkTip">Facebook<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <li> <a href="http://www.tumblr.com/" title="目前全球最大的轻博客网站" target="_blank" rel="nofollow" class="linkTip">Tumblr<img src="../wp-content/themes/Loostrive/images/qiang.png"></a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
    </div>
    <!--.section-->
    <div class="section mtop" id="daohang">
        <h1 class="lefttitle">导航</h1>
        <h2 class="nav-title" id="moviedh">
            <i class="icon-globe"></i>影视导航
            <span class="sub-category"><a href="#daohang" class="current notop">所有</a>|<a href="#moviedh" class="notop">影视导航</a>|<a href="#designdh" class="notop">设计导航</a>|<a href="#studydh" class="notop">教育导航</a>|<a href="#blogdh" class="notop">博客导航</a>  |<a href="#zxdh" class="notop">专项导航</a>  |<a href="#zhdh" class="notop">综合导航</a>           </span>
            <a href="#" class="more">更多&gt;&gt;</a>
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.allyingshi.com/" title="人人影视全新网址" target="_blank" rel="nofollow" class="linkTip">人人影视大全</a></li>
                <li><a href="http://www.yingmi123.com/" title="搜集、归类、整理、分享各种影视网站" target="_blank" rel="nofollow" class="linkTip">影迷导航网</a></li>
                <li><a href="http://www.dydh.org/" title="人工整理优秀的电影网站" target="_blank" rel="nofollow" class="linkTip shanchu">电影导航.ORG</a></li>
                <li><a href="http://www.disanlou.org/" title="电影字幕下载网站大全" target="_blank" rel="nofollow" class="linkTip">第三楼字幕网</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="designdh">
            <i class="icon-globe"></i>设计导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://hao.uisdc.com/" title="全方位设计师网站导航指引" target="_blank" rel="nofollow" class="linkTip">设计师网址导航1</a></li>
                <li><a href="http://www.userinterface.com.cn/" title="为设计师导航" target="_blank" rel="nofollow" class="linkTip">设计师网址导航2</a></li>
                <li><a href="http://hao.xueui.cn/" title="UI设计学者们最爱的版块之一" target="_blank" rel="nofollow" class="linkTip">ui设计导航</a></li>
                <li><a href="http://hao.shejidaren.com/" title="小盆友和大神都值得拥有的设计师网址导航" target="_blank" rel="nofollow" class="linkTip">设计导航</a></li>
                <li><a href="http://www.niudana.com/" title="精选国内外优秀的UI设计网站" target="_blank" rel="nofollow" class="linkTip">牛大拿设计师导航</a></li>
                <li><a href="http://hao.psefan.com/" title="精选素材站导航" target="_blank" rel="nofollow" class="linkTip">饭团导航</a></li>
                <li><a href="http://www.sjyzt.cn/" title="以提高设计师工作效率和学习效率的综合设计导航网站" target="_blank" rel="nofollow" class="linkTip">设计一站通</a></li>
                <li><a href="http://nav80.com/" title="精选互联网行业优质网站，设计师必备" target="_blank" rel="nofollow" class="linkTip">NAV80设计师网址导航</a></li>
                <li><a href="http://lib.wuedc.com/design.html" title="为设计师提供ps教程、UI设计、素材下载、高清图库、配色方案、用户体验、网页设计等全方位设计师网站导航指引。" target="_blank" rel="nofollow" class="linkTip">设计师资源导航</a></li>
                <li><a href="http://uedfans.cn/" title="UEDfans-用户体验设计导航是一款专门为UED工作从业者提供用户体验设计相关资讯、素材、教程、软件、书籍等资源的综合导航，每日更新内容方便大家使用。" target="_blank" rel="nofollow" class="linkTip">UEDFans用户体验导航</a></li>
                <li><a href="http://hao.shejipi.com/" title="工业设计导航，就来设计癖" target="_blank" rel="nofollow" class="linkTip">设计癖导航</a></li>
                <li><a href="http://www.chuangzaoshi.com/" title="为创意工作者而设计" target="_blank" rel="nofollow" class="linkTip">创造狮导航</a></li>
                <li><a href="http://wz.cndesign.com/" title="优秀设计网站排名大全" target="_blank" rel="nofollow" class="linkTip">中国设计网址导航</a></li>
                <li><a href="http://doyoudo.com/resources" title="创意设计软件学习平台资源导航" target="_blank" rel="nofollow" class="linkTip">doyoudo资源导航</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="studydh">
            <i class="icon-globe"></i>教育导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.1nami.com/" title="收集国内外最新最酷的学习网站！学习必备！找资料必备！" target="_blank" rel="nofollow" class="linkTip">1纳米学习导航</a></li>
                <li><a href="http://kbs.cnki.net/" title="最全面、最权威的全球学术网站大全" target="_blank" rel="nofollow" class="linkTip">学术网站大全</a></li>
                <li><a href="http://123.paomianba.com/" title="力争成为在线教育导航第一品牌，服务在线教育行业创业者、投资人" target="_blank" rel="nofollow" class="linkTip">泡面吧</a></li>
                <li><a href="http://dh.xdf.cn/" title="收录包括职业教育，成人教育，儿童教育，特殊教育，学科教育的优秀网站" target="_blank" rel="nofollow" class="linkTip">新东方教育导航</a></li>
                <li><a href="http://www.jydh.com/" title="全心全意为教育服务 打造全国最大的教育资源站" target="_blank" rel="nofollow" class="linkTip">中国教育导航</a></li>
                <li><a href="http://www.54100.net/" title="好教师最常用的网站地址" target="_blank" rel="nofollow" class="linkTip">好教师导航</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="blogdh">
            <i class="icon-globe"></i>博客导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://qiusongsong.net/dh/" title="目前已收录众多优秀博客,加入邱嵩松博客导航能为您的网站带来流量与发展机遇"target="_blank" rel="nofollow" class="linkTip">邱嵩松博客导航</a></li>
                <li><a href="http://themebetter.com/blogs" title="2000+有效更新博客，助力博客成长的导航" target="_blank" rel="nofollow" class="linkTip">Themebetter博客导航</a></li>
                <li><a href="http://lusongsong.com/daohang/" title="卢松松独立博客大全" target="_blank" rel="nofollow" class="linkTip">博客大全</a></li>
                <li><a href="http://blog.ws234.com/" title="学技术交朋友从这里开始" target="_blank" rel="nofollow" class="linkTip">玩博客</a></li>
                <li><a href="http://www.516680.com/" title="优秀个人博客大全，独立博客主的上网主页" target="_blank" rel="nofollow" class="linkTip">博客导航网</a></li>
                <li><a href="http://boke112.com/" title="免费收录各种类型的独立博客，提供博客导航和博客目录检索功能" target="_blank" rel="nofollow" class="linkTip">boke112导航</a></li>
                <li><a href="http://zgboke.com/" title="收录国内各个领域的优秀博客，是一个全人工编辑的开放式博客联盟交流和展示平台" target="_blank" rel="nofollow" class="linkTip">中国博客联盟</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zxdh">
            <i class="icon-globe"></i>专项导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://hao123vr.com/" title="超全的VR虚拟现实资源导航" target="_blank" rel="nofollow" class="linkTip">VR虚拟现实导航</a></li>
                <li><a href="http://pmdaniu.com/" title="产品经理服务导航网站，汇聚产品经理常用的软件、网站、第三方服务、创业等信息" target="_blank" rel="nofollow" class="linkTip">产品大牛</a></li>
                <li><a href="http://hao.199it.com/" title="以大数据产业为主，大数据工具为辅，给用户提供快速找到大数据相关的工具平台" target="_blank" rel="nofollow" class="linkTip">大数据导航</a></li>
                <li><a href="http://www.hippter.com/data.html" title="收集了N多数据分析工具" target="_blank" rel="nofollow" class="linkTip">大数据速查</a></li>
                <li><a href="http://www.kicokico.com/" title="收录了大量动漫、游戏的二次元网站，点击START随机访问二次元网站" target="_blank" rel="nofollow" class="linkTip">二次元世界</a></li>
                <li><a href="http://wxbbx.jh1z.com/" title="收集整理各类微信实用工具" target="_blank" rel="nofollow" class="linkTip">微信百宝箱</a></li>
                <li><a href="http://mfavisa.com/" title="直达各国签证网站" target="_blank" rel="nofollow" class="linkTip">各国签证导航</a></li>
                <li><a href="http://gds123.cn/" title="这是一个满足所有自媒体运营的网络营销导航" target="_blank" rel="nofollow" class="linkTip">龟大师网络营销导航</a></li>
                <li><a href="http://tool.lusongsong.com/" title="收录了互联网各大热门在线站长工具，经常上站长工具可以了解SEO数据变化。还可以检测网站死链接、蜘蛛访问、HTML格式检测、网站速度测试、友情链接检查、网站域名IP查询、PR、权重查询、alexa、whois查询等" target="_blank" rel="nofollow" class="linkTip">松松站长工具大全</a></li>
                <li><a href="http://www.chuang007.com/" title="创业服务网址导航" target="_blank" rel="nofollow" class="linkTip">创业007</a></li>
                <li><a href="http://www.51index.cn/" title="我的索引" target="_blank" rel="nofollow" class="linkTip">程序员垂直导航</a></li>
                <li><a href="http://lib.wuedc.com/dev.html" title="开发者资源导航，为web开发者提供web资源、jquery教程、html5教程、css3教程、用户体验、前端框架等全方位开发者网站导航指引。" target="_blank" rel="nofollow" class="linkTip">开发者资源导航</a></li>
                <li><a href="http://123.w3cschool.cn/" title="W3Cschool极客导航，编程资源，技术网址，编程学习资源相关网址导航" target="_blank" rel="nofollow" class="linkTip">W3CSchool极客导航</a></li>
                <li><a href="http://www.gogeeks.cn/" title="极客导航精心挑选网址，让您的工作更有效率" target="_blank" rel="nofollow" class="linkTip">极客导航</a></li>
                <li><a href="http://www.rishiqing.com/saas/" title="日事清--科技行业导航" target="_blank" rel="nofollow" class="linkTip noframe">SaaS（科技）行业导航</a></li>
                <li><a href="http://daohangcom.com/" title="为设计师和前端开发工程师提供网站源码、设计素材、设计图片、交互设计、用户体验设计、前端开发资讯等各种分类的优秀内容和网站入口，提供最简单便捷的上网导航服务" target="_blank" rel="nofollow" class="linkTip">com导航</a></li>
                <li><a href="http://ruby-china.org/sites" title="Ruby China社区搜集的酷站" target="_blank" rel="nofollow" class="linkTip noframe">酷站-Ruby China</a></li>
                <li><a href="http://www.hippter.com/" title="汇总PPT设计利器" target="_blank" rel="nofollow" class="linkTip">Hippter-PPT资源导航</a></li>
                <li><a href="http://www.anyv.net/" title="微信公众平台的精品微信公众号推荐！" target="_blank" rel="nofollow" class="linkTip">微信公众号大全</a></li>
                <li><a href="http://www.juweixin.com/" title="聚微信导航网站，收集精彩有趣的微信公众账号、微信群、微商公众号、微商交流群等，并且聚微信是一个集微信运营、营销、交友的微信公众平台导航" target="_blank" rel="nofollow" class="linkTip">聚微信导航</a></li>
                <li><a href="http://www.moe123.net/" title="你的二次元导航姬！及时收录动漫网站及资讯、宅网站、萌网站、动画、漫画、游戏等内容。让您获得更加简单快捷的二次元体验！" target="_blank" rel="nofollow" class="linkTip">萌导航</a></li>
                <li><a href="http://www.helloweba.com/nav.html" title="为广大前端开发者收录了常用实用的前端资源工具，方便大家学习和查阅" target="_blank" rel="nofollow" class="linkTip">前端收录</a></li>
                <li><a href="http://123.jser.us/" title="前端工程师专用的导航站" target="_blank" rel="nofollow" class="linkTip">前端导航站</a></li>
                <li><a href="http://admire.so/" title="钦慕-admire.so是一个为创意设计以及前端开发工作、爱好及学者等提供优质的相关专业链接的聚合平台，来帮助您更有效的学习与工作。" target="_blank" rel="nofollow" class="linkTip">钦慕-每天一个好链接</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="zhdh">
            <i class="icon-globe"></i>综合导航
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://www.haoyonghaowan.com/" title="收集整理好玩好用的网站" target="_blank" rel="nofollow" class="linkTip">好用好玩导航</a></li>
                <li><a href="http://iloveyoulong.com/" title="做个有用的导航" target="_blank" rel="nofollow" class="linkTip">龙轩导航</a></li>
                <li><a href="http://www.shake123.com/" title="一个小而美的网址导航，从这里发现有趣的网站" target="_blank" rel="nofollow" class="linkTip">SK123网址导航</a></li>
                <li><a href="http://qianshan.co/" title="可定制个人导航主页" target="_blank" rel="nofollow" class="linkTip">千山导航</a></li>
                <li><a href="http://gate.guokr.com/" title="发现你最爱的网站" target="_blank" rel="nofollow" class="linkTip">果壳任意门</a></li>
                <li><a href="http://www.neihan999.com/" title="简洁有内涵" target="_blank" rel="nofollow" class="linkTip">内涵导航</a></li>
                <li><a href="http://go.fuli.lu/" title="精选电影资源，软件资源，免费资源，学习资源" target="_blank" rel="nofollow" class="linkTip">福利导航</a></li>
                <li><a href="http://www.dsqndh.com/" title="争做福利导航第一站" target="_blank" rel="nofollow" class="linkTip">屌丝青年导航</a></li>
                <li><a href="http://mwlmt.cc/d/" title="为用户提供门户、新闻、视频、游戏、小说、彩票等各种分类的优秀内容和网站入口" target="_blank" rel="nofollow" class="linkTip shanchu">五花八门导航</a></li>
                <li><a href="http://www.29tee.com/dh/" title="这是一个有别于主流导航的网站，主打酷站，小众的站点，这里你可能找不到主流的大站" target="_blank" rel="nofollow" class="linkTip">依依印社小众导航</a></li>
                <li><a href="http://www.iyorker.com/" title="既可...又可...，[又可]是小众导航，分享免费、小巧、实用、有趣的网络资源" target="_blank" rel="nofollow" class="linkTip">又可小众导航</a></li>
                <li><a href="http://www.itianxia.cn/" title="懂你的年轻人网址导航" target="_blank" rel="nofollow" class="linkTip">老司机</a></li>
                <li><a href="http://www.chaidu.com" title="汇集全网优质网址及资源" target="_blank" rel="nofollow" class="linkTip">柴都导航</a></li>
                <li><a href="http://www.xiaolvji.com" title="效率集是一个让你聚合互联网资源,分享互联网资源,且可以高度定制的导航网站.你可以自定义网址导航及主页搜索引擎,还自带在线记事,在线任务.通过效率集的聚合搜索,你可以购物比价,在线看电影,在线词典,在线翻译等.通过效率集,你还可以把自己收藏的网站分享给他人" target="_blank" rel="nofollow" class="linkTip">效率集</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <!-- 分隔线 -->
        <h2 class="nav-title" id="new">
            <i class="icon-globe"></i>发现新站
        </h2>
        <div class="content flink">
            <ul class="time-list clearfix">
                <li><a href="http://youquhome.com/" title="收藏全球最有趣的网站" target="_blank" rel="nofollow" class="linkTip">有趣网站之家</a></li>
                <li><a href="http://www.9866.cn/" title="汇集全球最有趣的网站及新应用" target="_blank" rel="nofollow" class="linkTip">9866趣站</a></li>
                <li><a href="http://www.siteboxs.com/" title="发现、收藏、分享好站" target="_blank" rel="nofollow" class="linkTip">小站盒子</a></li>
                <li><a href="http://www.zm1z.com/" title="发现最美好站" target="_blank" rel="nofollow" class="linkTip">最美1站</a></li>
                <li><a href="http://www.ytuijian.com/" title="推荐最有用的优秀网站" target="_blank" rel="nofollow" class="linkTip">要推荐</a></li>
                <li><a href="http://www.xuanchuan.vip/" title="专为站长们而提供的一个免费宣传推广自己网站的平台"  target="_blank" rel="nofollow" class="linkTip">网站宣传平台</a></li>
                <li><a href="http://personal-website.store/" title="个人网站的商店，这里是我们的“个人网站”共享与发布平台"  target="_blank" rel="nofollow" class="linkTip">个站商店</a></li>
                <li><a href="http://www.coolweb.com.cn/" title="国内最专业的酷站收藏,酷站欣赏类网站!"  target="_blank" rel="nofollow" class="linkTip">酷站志</a></li>
                <li><a href="http://www.miguyu.com/" title="咪咕鱼自定义上网导航，做自己的上网入口" target="_blank" rel="nofollow" class="linkTip">咪咕鱼自定义导航</a></li>
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
        <li><a class="notop" href="#yingshi">影视资源</a></li>
        <li><a class="notop" href="#music2">音乐</a></li>
        <li><a class="notop" href="#picture">图片</a></li>
        <li><a class="notop" href="#design">设计</a></li>
        <li><a class="notop" href="#ruanjian">软件应用</a></li>
        <li><a class="notop" href="#program">编程</a></li>
        <li><a class="notop" href="#study">学习</a></li>
        <li><a class="notop" href="#zixun">资讯</a></li>
        <li><a class="notop" href="#fuli">福利</a></li>
        <li><a class="notop" href="#kexue">科学上网</a></li>
        <li><a class="notop" href="#qiangwai">墙外世界</a></li>
        <li><a class="notop" href="#daohang">导航</a></li>
    </ul>
</div>
</div>
</div>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>