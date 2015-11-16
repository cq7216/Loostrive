<?php get_header();?>
<div class="container">
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        当前位置：<a href="<?php bloginfo('siteurl');?>/" title="返回首页">首页</a> > “<?php echo htmlspecialchars($s); ?>”的搜索结果
                     </div>
                </div>
            <?php }?>
    <?php get_sidebar();?>
    <div class="mainleft">
	    <ul id="post_container" class="masonry clearfix">
			<?php include('includes/list_post.php'); ?>
	    </ul>
	    <?php if (!have_posts()) {?>
			<div class="clear"></div>
			<div class="post article article_c box">
				<h3 class="center">非常抱歉，无法搜索到与之相匹配的信息。</h3>
			</div>
		<?php }?> 
	<div class="navigation container"><?php pagination(5);?></div>
	</div>
</div>
</div>
<div class="clear"></div>
<?php get_footer();?>