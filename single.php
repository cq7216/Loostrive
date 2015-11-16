<?php get_header();?>
	<div class="container">
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
                        </div>
                        <div class="website">
                            <span>网站地址：<a href="<?php echo get_post_meta($post->ID,"website",true);?>" target="_blank"><?php echo get_post_meta($post->ID,"website",true);?></a> </span> 
                            <span class="enter"><a href="<?php echo get_post_meta($post->ID,"website",true);?>" target="_blank"><?php echo get_post_meta($post->ID,"website",true);?></a> </span>
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
               	<div class="clear"></div>
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>

                <div class="article_tags">
                	<div class="tagcloud">
                    	标签：<?php the_tags('',' ','');?>
                    </div>
                </div>
                <?php if (get_option('strive_bdshare') == 'Display') { ?>
                <div class="baishare">
                <!-- Baidu Button BEGIN -->
                    <div class="bdsharebuttonbox">
                    	<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    	<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    	<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    	<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                    	<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                    	<a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
                    	<a href="#" class="bds_huaban" data-cmd="huaban" title="分享到花瓣"></a>
                    	<a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a>
                    	<a href="#" class="bds_twi" data-cmd="twi" title="分享到Twitter"></a>
                    	<a href="#" class="bds_more" data-cmd="more"></a>                    	
                    </div>
                </div>
                <?php } ?>
             </div>
		</div>
    	<?php if (get_option('strive_adccode') == true) { ?>
    		<div class="single-ad box row"><?php echo stripslashes(get_option('strive_adccode')); ?></div>
		<?php } ?>
		<?php if(get_option('strive_single_adphone') == true){?>
			<div class="single-adphone box row"><?php echo stripslashes(get_option('strive_single_adphone')); ?></div>
		<?php }?>
			
    <?php if (get_option('strive_aboutme') == 'Display') { ?>    
		<div class="row box">
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
		<ul class="post-navigation row">
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
	<div id="comments_box">
		<?php comments_template('', true); ?>
    </div>
	<?php endwhile;endif;?>
</div>
</div>
<?php get_footer();?>