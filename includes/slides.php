<div class="slider row">
	<div id="focus">
		<ul>
     		<?php query_posts($query_string . 'tag='. stripslashes(get_option('strive_slidestag')).'&showposts=' . $limit=6)?>        
    		<?php while ( have_posts() ) : the_post();?>
			<li>
                <a href="<?php the_permalink();?>" target="_blank" rel="nofollow" title="<?php the_title_attribute();?>">
                    <?php echo post_thumbnail_img(650,370)?>
                </a>
            	<div class="flex-caption">  
              		<h2><a href="<?php the_permalink(); ?>"  target="_blank" rel="nofollow"><?php the_title(); ?></a></h2>
                    <p class="slides_entry">
						<?php if (has_excerpt()) {
							echo mb_strimwidth(strip_tags(apply_filters('the_excerpt',get_the_excerpt())), 0, 150,"...","utf-8");
						}else {
							echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...","utf-8");
						} ?>
                     </p>
                     <p class="btn"><a href="<?php the_permalink(); ?>"  target="_blank" rel="nofollow">查看详情</a></p>
            	</div>  
            </li>
            <?php endwhile; wp_reset_query(); ?>   
		</ul>
	</div>
		</div>
