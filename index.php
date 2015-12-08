<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<div id="content0">
<!-- 滑动焦点图begin -->
<div id="focusBar"> 
    <a href="javascript:void(0)" class="arrL" onclick="prePage()"></a>
    <a href="javascript:void(0)" class="arrR" onclick="nextPage()"></a>
    <ul class="mypng">
        <li id="focusIndex1" style="background:url(http://7b1ff5.com1.z0.glb.clouddn.com/2.jpg) no-repeat center center; display:block;"><!--此处需判断li的display:block-->
            <div class="focusL"><img src="http://7b1ff5.com1.z0.glb.clouddn.com/5.png" width="1920" height="462" /></div>
            <div class="zhezhao" ><img src="http://7b1ff5.com1.z0.glb.clouddn.com/8.png" width="1920" height="462" /></div>
            <div class="focusR"><img src="http://7b1ff5.com1.z0.glb.clouddn.com/9.png" width="1920" height="492" /></div>
        </li>
        <li id="focusIndex2" style="background:url(http://7b1ff5.com1.z0.glb.clouddn.com/1.jpg) no-repeat center center; display:none;">
            <div class="focusL"><a href="/tougao"><img src="http://7b1ff5.com1.z0.glb.clouddn.com/5.png" width="1920" height="462" /></a></div>
            <div class="zhezhao" ><a href="/tougao"><img src="http://7b1ff5.com1.z0.glb.clouddn.com/7.png" width="1920" height="462" /></a></div>
            <div class="focusR"><a href="/tougao"><img src="http://7b1ff5.com1.z0.glb.clouddn.com/6.png" width="1920" height="492" /></a></div>
        </li>
    </ul>
</div>
<script src="http://7b1ff5.com1.z0.glb.clouddn.com/jquery.easing.1.3.js"></script>
<script src="http://7b1ff5.com1.z0.glb.clouddn.com/focus.js"></script>
<!-- 滑动焦点图end -->
<div class="container" id="content">
	<?php if (get_option('strive_gg') == 'Display') { ?>
	<div class="subsidiary row box setanimate visible">
		<div class="bulletin fourfifth">
			<span class="sixth">站点公告：</span>
            <marquee class="fivesixth" direction=left onmouseout=start(); onmouseover=stop(); scrollAmount=2 scrollDelay=15;>
            	<?php echo get_option('strive_announce'); ?>
            </marquee>
         </div>
         <div class="bdshare_small fifth">
         <?php if (get_option('strive_bdshare') == 'Display') { ?>
			<!-- Baidu Button BEGIN -->
                    <div class="bdsharebuttonbox">
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a href="#" class="bds_huaban" data-cmd="huaban" title="分享到花瓣"></a>
                    	<a href="#" class="bds_more" data-cmd="more"></a>
                    </div>
			<!-- Baidu Button END -->
			<?php }?>
        </div>
	</div>
    <?php } else { echo '<div class="row"></div>';} ?>
    <?php if (get_option('strive_slidebar') == 'Display') { ?>
    <?php get_sidebar();?>
    	<?php if (get_option('strive_slides') == 'Display'&& $post==$posts[0] && !is_paged()) { ?>
        	<?php include('includes/slides.php'); ?>
            <?php { echo ''; } ?>
    <?php }} ?>

    <div class="mainleft">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页幻灯区域') ) :; endif;?>
    	
	<div id="post-list">
	    <div class="post-nav">
	        <a id="post-list-nav0" class="post-list-nav focus" href="javascript:;"><i class="fa fa-list"></i> 最新发布</a>
	        <a id="post-list-nav1" class="post-list-nav" href="javascript:;"><i class="fa fa-refresh"></i> 最近更新</a>
	        <a id="post-list-nav2" class="post-list-nav" href="javascript:;"><i class="fa fa-fire"></i> 热门推荐</a>
	        <a id="post-list-nav3" class="post-list-nav" href="javascript:;"><i class="fa fa-random"></i> 随机浏览</a>
	        <div class="loading" style="display: none; "></div>
	    </div>
	    <div id="post-list0" class="post-list clearfix" style="display: block; ">
	        <ul id="post_container" class="masonry clearfix">
	        <?php $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
	        <?php if (get_option( 'sticky_posts' )){ query_posts( array('post__in'=>get_option( 'sticky_posts' ),'ignore_sticky_posts' => 1,'paged'=>$paged))?>
			<?php include('includes/list_post.php');} ?>
	        <?php query_posts(array('cat'=>get_option('strive_leiid'),'post__not_in' => get_option( 'sticky_posts' ),'paged'=>$paged)); ?>
				<?php include('includes/list_post.php'); ?>
	    	</ul>
			<div class="clear"></div>
			<div class="navigation container"><?php pagination(5);?></div>
	    </div>
	    <div id="post-list1" class="post-list clearfix" style="display: none; "></div>
	    <div id="post-list2" class="post-list clearfix" style="display: none; "></div>
	    <div id="post-list3" class="post-list clearfix" style="display: none; "></div>
	</div>
		</div>
	</div>
<div class="clear"></div>
<script type="text/javascript">$(document).ready(function() {
    $("#post-list a.post-list-nav").click(function() {
        $("#loadbar").hide();$("#loadbar").show();$("#loadbar").animate({width:"25%"});
        $("#post-list .post-list-nav").removeClass("focus"), $(this).addClass("focus");
        var a = $(this).index();
        "" == $("#post-list" + a).html() ? ($("#post-list .post-nav div.loading").css("display", "block"), $.ajax({
            type: "POST",
            url: "wp-content/themes/Loostrive/getthemelist.php",
            data: {
                id: a
            },
            beforeSend:function(){    //加载前操作 #content的DIV变化
                $('#content').fadeTo(500,0.3);
                $('#main_loading').show();
            },
            complete:function(){                     //加载后操作 #content的DIV变化
                $('#content').fadeTo(200,1);
                $('#main_loading').hide();
            },
            success: function(b) {
                $("#post-list" + a).html(b), $("#post-list .post-nav .loading").css("display", "none"), $("#post-list .post-list").hide(300), $("#post-list" + a).show(500)
            },
            error: function() {
                $("#post-list" + a).append('<div class="fail">\u83b7\u53d6\u5206\u7c7b\u4fe1\u606f\u5931\u8d25\uff0c\u8bf7\u7a0d\u540e\u91cd\u8bd5\u3002</div>'), $("#post-list .post-list").hide(), $("#post-list" + a).show(0), $("#post-list .post-nav .loading").hide(), $("#post-list .post-list").hide(300), $("#post-list" + a).show(500)
            }
        })) : ($("#post-list .post-list").hide(300), $("#post-list" + a).show(500));
        $("#loadbar").animate({width:"100%"},function(){
            $("#loadbar").fadeOut(1000,function(){$("#loadbar").css("width","0");});
        })
    })
});
</script>
</div>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>
