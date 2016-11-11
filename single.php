<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<div id="content0">
	<div class="container" id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box clearfix">           	
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php }?>
   	 	<?php get_sidebar();?>
    	<div class="mainleft"  id="content">
			<div class="article_container row  box">
				<h1><?php the_title();?></h1>
                    <div class="article_info">
                        <span class="info_author info_ico"><?php the_author_posts_link(); ?></span> 
                        <span class="info_category info_ico"><?php the_category(', ')?></span> 
                        <span class="info_date info_ico"><?php the_time('m-d')?></span>
                        <span class="info_views info_ico"><?php setPostViews(get_the_ID());;echo getPostViews(get_the_ID());?></span>
                        <span class="info_comment info_ico"><?php comments_popup_link('0','1','%');?></span>
                    </div>
            	<div class="clear"></div>
                <div class="siteout">
                    <div class="siteinfo">
                        <div class="webname">
                            <strong>网站名称：</strong><h1><?php echo get_post_meta($post->ID,"webname",true);?></h1>
                        </div>
                        <div class="webviews">
                            <span>网站热度：</span><span><?php setPostViews(get_the_ID());;echo getPostViews(get_the_ID());?>&#176;C</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php if( function_exists('zilla_likes') ) zilla_likes(); ?></span>
                        </div>
                        <div class="website">
                            <span>网站地址：<a href="/view.php?url=<?php echo get_post_meta($post->ID,"website",true);?>&name=<?php echo get_post_meta($post->ID,"webname",true);?>&go=<?php echo get_post_meta($post->ID,"go",true);?>" target="_blank"><?php echo get_post_meta($post->ID,"website",true);?></a> </span> 
                            <span class="enter"><a href="/view.php?url=<?php echo get_post_meta($post->ID,"website",true);?>&name=<?php echo get_post_meta($post->ID,"webname",true);?>&go=<?php echo get_post_meta($post->ID,"go",true);?>" target="_blank"><?php echo get_post_meta($post->ID,"website",true);?></a> </span>
                        </div>
                    </div>
                    <div class="sitepic">
                        <?php echo post_thumbnail_img(200,$timthigh)?>
                    </div>
                </div>
                <div class="clear"></div>
            <div class="context">
				<div id="post_content"><?php the_content('Read more...');?></div>
				<?php custom_wp_link_pages();?>
                <!-- haiyunx广告开始 -->
                <div style="margin:0 auto;width:640px;"><script type="text/javascript" src="http://s.haiyunx.com/SSP/31905.js"></script></div>
                <!-- haiyunx广告结束 -->
                <div class="open-message"><i class="fa fa-bullhorn"></i><a href="/view.php?url=<?php echo get_post_meta($post->ID,"website",true);?>&name=<?php echo get_post_meta($post->ID,"webname",true);?>" target="_blank">快速访问网站：【<?php echo get_post_meta($post->ID,"webname",true);?>】</a><br>小众网站, 版权所有丨如未注明 , 均为原创<br>更多精品网站请进入<a href="../dh" title="小众导航">小众实用导航</a></div>
               	<div class="clear"></div>
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>

                <div class="article_tags">
                	<div class="tagcloud">
                    	标签：<?php the_tags('',' ','');?>
                    </div>
                </div>
             </div>
		</div>
    	<?php if (get_option('strive_adccode') == true) { ?>
    		<div class="single-ad box row"><?php echo stripslashes(get_option('strive_adccode')); ?></div>
		<?php } ?>
		<?php if(get_option('strive_single_adphone') == true){?>
			<div class="single-adphone box row"><?php echo stripslashes(get_option('strive_single_adphone')); ?></div>
		<?php }?>
			
    <?php if (get_option('strive_aboutme') == 'Display') { ?>    
		<div class="row box setanimate visible">
			<div id="authorarea">
				<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?>
                <i class="author_arrow"></i>
            </div>
				<div class="authorinfo article_container">
					<h4><?php the_author_posts_link(); ?></h4>
					<p><?php the_author_description();?></p>
				</div>
		</div>
    <?php } ?>
	<div>
		<ul class="post-navigation row setanimate visible">
			<div class="post-previous twofifth">
				<?php previous_post_link('上一篇 <br> %link', '%title', TRUE); ?>
            </div>
            <div class="post-next twofifth">
				<?php next_post_link('下一篇 <br> %link', '%title', TRUE); ?>
            </div>
        </ul>
	</div>
    <?php if (get_option('strive_related') == 'Display') { ?> 
	<div class="article_container row  box article_related">
    	<div class="related">
		<?php include('includes/related.php');?>
       	</div>
	</div>
     <?php } ?>
    	<div class="clear"></div>
	<div id="comments_box setanimate visible" class="box">
		<?php comments_template('', true); ?>
    </div>
	<?php endwhile;endif;?>
</div>
</div>
</div>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>
