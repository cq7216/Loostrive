<ul>
<?php
$post_num = 6;
$exclude_id = $post->ID; 
$posttags = get_the_tags(); $i = 0;
$relatedhigh = stripslashes(get_option('strive_relatedhigh'));
if ( $posttags ) {
	$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ','; 
	$args = array(
		'post_status' => 'publish',
		'tag__in' => explode(',', $tags), 
		'post__not_in' => explode(',', $exclude_id), 
		'caller_get_posts' => 1,
		'orderby' => 'comment_date', 
		'posts_per_page' => $post_num
	);
	query_posts($args);
	while( have_posts() ) { the_post(); ?>
		<li class="related_box"  >
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank">
			<div class="r_pic">
                 <?php echo post_thumbnail_img(140,$relatedhigh)?>
			</div>
			<div class="r_title">
					<?php the_title(); ?>
            </div>
            </a>
		</li>
	<?php
		$exclude_id .= ',' . $post->ID; $i ++;
	} wp_reset_query();
}
if ( $i < $post_num ) { 
	$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
	$args = array(
		'category__in' => explode(',', $cats), 
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'comment_date',
		'posts_per_page' => $post_num - $i
	);
	query_posts($args);
	while( have_posts() ) { the_post(); ?>
		<li class="related_box"  >
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank">
			<div class="r_pic">
                    <?php echo post_thumbnail_img(140,$relatedhigh)?>
			</div>
			<div class="r_title">
					<?php the_title(); ?>
            </div>
            </a>
		</li>
	<?php $i++;
	} wp_reset_query();
}
if ( $i  == 0 )  echo '<div class=\"r_title\">没有相关文章!</div>';
?>
</ul>