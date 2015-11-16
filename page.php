<?php get_header();?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php }?>
<?php get_sidebar();?>
    <div class="mainleft" id="content">
		<div class="article_container row  box">
			<h1 class="page_title"><?php the_title();?></h1>
        <div class="context">
        	<div id="post_content"><?php the_content('Read more...');?></div>
        	   <?php custom_wp_link_pages();?>
         </div>       
	</div>
    <div id="comments_box">
		<?php comments_template();?>
    </div>    
	<?php endwhile;else: ;endif;?>
</div>
</div>
<?php get_footer();?>