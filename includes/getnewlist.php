<?php
//该文件放置在你要调取的博客的主目录
define('WP_USE_THEMES', false);
require('../../../../wp-load.php');
query_posts('showposts=12');
//这里是调用最新文章，如果是热门文章的话则改为get_most_viewed("post",10);当然这得是你的主题安装了热门文章插件，而且这里可以接受几乎wp-kit-cn所有代码。非常方便
?>
	<?php if(have_posts()) : ;while(have_posts()) : the_post();?>
		<ul id="post_container" class="masonry clearfix">
			<li class="post box row setanimate visible <?php if (get_option('strive_waterfall') == 'Hide') { ?>fixed-hight<?php } else {}?>">
                	<?php if ( is_home() ){ ?><?php if(is_sticky())echo '<div class="sticky">HOT</div>'?><?php }?>
                    <div class="thumbnail">
                        <a href="<?php the_permalink()?>" class="zoom" rel="bookmark" title="<?php the_title_attribute();?>">
                         <?php if (get_option('strive_waterfall') == 'Display') { ?>   
								<?php echo post_thumbnail_list()?>
                             <?php } else {?>
                             	<?php $timthigh = stripslashes(get_option('strive_timthigh')); ?>
                                <?php echo post_thumbnail_img(300,$timthigh)?>
                         <?php  } ?>
                         <div class="zoomOverlay"></div>
                        </a>
                    </div>
                    <div class="article">
                        <h2><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php echo the_title();?></a></h2>
                         <?php if (get_option('strive_summary') == 'Display') { ?>
                            <div class="entry_post">
                                <p>
                                <?php if (has_excerpt()) {
                                    echo $description = get_the_excerpt();
                                }else {
                                    echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8");
                                } ?>
                                </p>
                            </div>
                        <?php }?>
                    </div>
                    <div class="tags">
                        <i class="fa fa-tags"></i>
                        <?php the_tags('' , ''); ?>
                    </div>
    				<div class="info">
                        <span class="info_date info_ico"><?php the_time('m-d')?></span>
                    	<span class="info_views info_ico"><?php echo getPostViews(get_the_ID());?></span>
                        <span class="info_comment info_ico"><?php comments_popup_link('0','1','%');?></span>
                        <span class="info_category info_ico"><?php the_category(', ')?></span> 
                        <span class="info_website"><a href="<?php echo get_post_meta($post->ID,"website",true);?>" target="_blank" title="访问官方网站 <?php the_title(); ?>" rel="website" class="title">+Enter</a></span>
    				</div>
    		</li>
	    </ul>
	<?php endwhile;endif;?>
            <div class="clear"></div>