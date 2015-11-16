<?php get_header();?>
<div class="container">
    <div class="subsidiary row box">
		<div class="bulletin fourfifth">
        	当前位置：<a href="<?php bloginfo('siteurl');?>/" title="返回首页">首页</a> > 未知页面
        </div>
	</div>
    <div class="mainleft">
		<div class="article_container row  box">
           <div class="third centered" style="text-align:center; margin:50px auto;">
				<h2><center>抱歉，您打开的页面未能找到。</center></h2>
        		<div class="context">
       			  <center><a href="<?php bloginfo('siteurl');?>" title="返回首页"><img src="<?php bloginfo('template_directory'); ?>/images/404.gif" alt="Error 404 - Not Found" /></a></center>
            	</div>
			</div>
        </div>
	</div>
</div>
</body>
<?php get_footer();?>