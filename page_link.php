<?php
/*
Template Name: 友情链接
*/
?>
<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
$(".flink a").each(function(e){
	$(this).prepend("<img src=https://statics.dnspod.cn/proxy_favicon/_/favicon?domain="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '$1').replace( 'http://', '' )+">");
}); 
});
</script>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php }?>
	<?php get_sidebar(); ?>
    <div class="mainleft">
		<div class="article_container row  box">
			<div class="flink">
				<ul><?php wp_list_bookmarks('orderby=id&category_orderby=id'); ?></ul>
			</div>
			<div class="clear"></div>
			<div class="linkstandard">
				<h3>链接申请细则：</h3><ul>
                <li>一、在您申请本站友情链接之前请先做好本站链接，否则不会通过，谢谢</li>
                <li>二、如果您的站还未被baidu或google收录，申请链接暂不予受理</li>
                <li>三、本站链接名称：<a href="<?php bloginfo('siteurl'); ?>/"><?php bloginfo('name'); ?></a></li>
                <li>四、本站链接地址：<a href="<?php bloginfo('siteurl'); ?>/"><?php bloginfo('siteurl'); ?>/</a></li>
                <li>做好本站链接后请在这下面，我们会在24小时之内添加上你的链接</li></ul>
			</div>
		</div>
        <div id="comments_box">
			<?php comments_template(); ?>
         </div>   
	<?php endwhile;endif; ?>
    </div>
</div>
<?php get_footer(); ?>