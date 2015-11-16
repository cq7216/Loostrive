<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('导航下通栏区域') ) :; endif;?>
<div id="sidebar">
<div id="afterrun"><script type="text/javascript">$("#barloading").show();$("#loadbar").animate({width:"60%"});</script></div>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('侧边栏') ) :; endif;?>
	<div id="sidebar-follow">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('滚动边栏') ) :; endif;?>
	</div>
</div>