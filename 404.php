<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<div id="content0">
<div class="container" id="content">
    <div class="subsidiary row box">
		<div class="bulletin fourfifth">
        	当前位置：<a href="<?php bloginfo('siteurl');?>/" title="返回首页">首页</a> > 未知页面
        </div>
	</div>
    <div class="mainleft">
		<div class="article_container row  box">
           <div class="third centered" style="text-align:center; margin:50px auto;">
				<h2><center>抱歉，找不到这个页面。</center></h2>
        		<div class="context">
       			  <center><a href="<?php bloginfo('siteurl');?>" title="返回首页"><img src="<?php bloginfo('template_directory'); ?>/images/404.gif" alt="Error 404 - Not Found" /></a></center>
              <audio src="/wp-content/themes/Loostrive/404.mp3" autoplay="autoplay"> </audio>
            	</div>
			</div>
        </div>
	</div>
</div>
</div>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>