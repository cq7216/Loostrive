<div class="clear"></div>
<div id="footer">
	<div class="footer_in container">
		<div id="sidebar-bottom" class="row">
			<div class="col-xs-4">
				<div id="tag_cloud-2" class="widget widget_tag_cloud">
					<h3 class="widget-title"><span>热门标签</span></h3>
					<?php wp_tag_cloud('smallest=12&largest=12'); ?>
				</div>
			</div><!-- /footer-widgeted-1 -->
			<div class="col-xs-4">
				<div id="recent-posts-2" class="widget widget_recent_entries">
					<h3 class="widget-title"><span>近期最火文章</span></h3>
					<ul>
						<?php 
							function mostweek($where = '') { 
							//获取最近七天的文章 
								$where .= " AND post_date > '" . date('Y-m-d', strtotime('-300 days')) . "'"; return $where; 
							}
							add_filter('posts_where', 'mostweek'); 
						?>
						<?php
							query_posts("v_sortby=views&caller_get_posts=1&orderby=date&v_orderby=desc&showposts=10") 
						?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>
						<?php endwhile; ?><?php endif; ?>
					</ul>
				</div>
			</div><!-- /footer-widgeted-2 -->
			<div class="col-xs-4">
				<div id="text-9" class="widget widget_text">
					<h3 class="widget-title"><span>关于淘小众</span></h3>
					<div class="textwidget">
						<a href="http://www.iztwp.com/" title="小众网站">淘小众</a>，专注于分享国内外优秀网站，小众是针对大众而言，顾名思义，就是在一个小范围内流行的网站。有的网站不被大多数人知道，甚至主流导航网站也没有收录它们，但它们在一个小范围内却是非常有名，无论用户体验还是内容都堪称精品。
						<p style="color: #F0EB84;text-align:left;">温馨提示：本站所有搜集网站均来自互联网，对网站的介绍属作者个人观点，仅供参考。若发现网站链接错误，烦请通报管理员。</p>
					</div>
				</div>
				<div id="text-5" class="widget widget_text">
					<h3 class="widget-title"><span>联系我们</span></h3>
					<div class="textwidget">QQ：1457063 <br>E-Mail：1457063#qq.com（用@替换#）</div>
				</div>
				<div id="text-6" class="widget widget_text">
					<h3 class="widget-title"><span>支持小众网站</span></h3>
					<a href="http://shang.qq.com/wpa/qunwpa?idkey=4b41fbbb002717c3f51cc84f38912b3aefd73ea1c4e62f2136c761d57b7f2680" target="_blank"><img alt="img" src="../wp-content/themes/Loostrive/images/ico_group.png"></a>
					<a href="http://www.aliyun.com/product/ecs/?spm=5176.383338.201.11.EmuIDM" target="_blank"><img alt="img" src="../wp-content/themes/Loostrive/images/ico_aliyun.png" _hover-ignore="1"></a>
					<a href="https://portal.qiniu.com/signup?code=3lmd5owdjqr0y" target="_blank"><img alt="img" src="../wp-content/themes/Loostrive/images/ico_qiniu.png"></a>
					<input name="pay" type="image" value="转账" src="../wp-content/themes/Loostrive/images/zhifubao.png">
			</div>
		</div><!-- /footer-widgeted-3 -->
	</div>

	<?php if (get_option('strive_flinks') == 'Display') { ?>
	<?php wp_reset_query(); if ( is_home() ) { ?> 
	<div class="footnav container">
		<?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'friendlink','menu_id'=>'friendlink','container'=>'ul'));}?>
	</div>
	<?php } ?>
	<?php } else {} ?>
	<div class="copyright">
		<p>CQ工作室荣誉出品  |  版权所有 <?php echo comicpress_copyright();?> <a href="<?php bloginfo('url');?>/"><strong>
			<?php bloginfo('name');?>
		</strong></a>  |  <?php if (get_option('strive_beian') == 'Display') { ?>
		<a href="http://www.miitbeian.gov.cn/" rel="external"><?php echo stripslashes(get_option('strive_beianhao')); ?></a>
		<?php { echo '  |  '; } ?>
		<?php } else {} ?>
		<?php if (get_option('strive_tj') == 'Display') { ?>
		<?php echo stripslashes(get_option('strive_tjcode')); ?>
		<?php { echo ' '; } ?>
		<?php } else {} ?>
		Powered by <a href="http://www.wordpress.org/" rel="external">WordPress</a>
	</p>
	<p>
		<?php if (get_option('strive_footnav') == 'Display') { ?>
		<div class="footnav container">
			<?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'footnav','menu_id'=>'footnav','container'=>'ul'));}?>
		</div>
		<?php } else {} ?>
	</div>
</div>
<div class="footer_in2">
	<div id="footer_in" class="container">
		<p class="f_sml">
			<!-- 纯代码实现网站运行多少天 -->
          <script type="text/javascript">// <![CDATA[
          var bkyx= new Date("12/27/2013");
          	var now = new Date();
          	var xzbk = now.getTime() - bkyx.getTime();
          	var bksj = Math.floor(xzbk / (1000 * 60 * 60 * 24));
          	document.write("网站已运行"+bksj+"天")
          	// ]]></script> ｜ <!-- 当前访客 -->
          	<span class="demo">
			      <span id="total">当前在线：<span id="onlinenum"></span>人</span>
			</span> ｜
			<!-- 纯代码实现数据库查询次数及加载时间 -->
          	<?php printf('数据库查询%2$s次 - 加载用时%1$s秒', timer_stop(0,3), get_num_queries()); ?>
          	
          	<!-- 结束 -->
          	<audio class="aud">
				<p style="display:none;">Oops, looks like your browser doesn't support HTML 5 audio.</p>
			</audio>
          </p>
          <ul id="links"> 
          	<li><b>友情链接：</b></li><?php wp_list_bookmarks('title_li=&categorize=0'); ?>
          </ul>
      </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$("#loadbar").animate({width:"100%"},function(){
		$("#loadbar").fadeOut(1000,function(){$("#loadbar").css("width","0");});
	});
</script>
<!--gototop-->
<div id="tbox">
	<a id="gotop" href="javascript:void(0)"></a> </div>
	<?php wp_footer(); ?>
<!-- 顶部导航栏随鼠标滚动变化 -->
<script type="text/javascript" src="http://taoxiaozhong.com/wp-content/themes/Loostrive/js/headroom.min.js"></script>
<script  type="text/javascript"  src="http://taoxiaozhong.com/wp-content/themes/Loostrive/js/jQuery.headroom.js"></script>  
<script type="text/javascript">
    $("document").ready(function(){
        $("#navOne").headroom();
    });
</script>
	<!-- 百度分享代码 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"left","bdTop":"300"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    <!-- 百度图片广告开始 -->
    <!-- 百度图片广告结束 -->
</body></html>