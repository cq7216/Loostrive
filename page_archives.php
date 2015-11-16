<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>
<?php
//文章归档函数
class hacklog_archives
{
function GetPosts() 
{
global  $wpdb;
if ( $posts = wp_cache_get( 'posts','ihacklog-clean-archives') )
return $posts;
$query="SELECT DISTINCT ID,post_date,post_date_gmt,comment_count,comment_status,post_password FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_status = 'open'";
$rawposts =$wpdb->get_results( $query,OBJECT );
foreach( $rawposts as $key =>$post ) {
$posts[mysql2date( 'Y.m',$post->post_date ) ][] = $post;
$rawposts[$key] = null;
}
$rawposts = null;
wp_cache_set( 'posts',$posts,'ihacklog-clean-archives');;
return $posts;
}
function PostList( $atts = array() ) 
{
global $wp_locale;
global $hacklog_clean_archives_config;
$atts = shortcode_atts(array(
'usejs'=>$hacklog_clean_archives_config['usejs'],
'monthorder'=>$hacklog_clean_archives_config['monthorder'],
'postorder'=>$hacklog_clean_archives_config['postorder'],
'postcount'=>'1',
'commentcount'=>'1',
),$atts);
$atts=array_merge(array('usejs'=>1,'monthorder'=>'new','postorder'=>'new'),$atts);
$posts = $this->GetPosts();
( 'new'== $atts['monthorder'] ) ?krsort( $posts ) : ksort( $posts );
foreach( $posts as $key =>$month ) {
$sorter = array();
foreach ( $month as $post )
$sorter[] = $post->post_date_gmt;
$sortorder = ( 'new'== $atts['postorder'] ) ?SORT_DESC : SORT_ASC;
array_multisort( $sorter,$sortorder,$month );
$posts[$key] = $month;
unset($month);
}
$html = '<div class="car-container';
if ( 1 == $atts['usejs'] ) $html .= ' car-collapse';
$html .= '">'."\n";
if ( 1 == $atts['usejs'] ) $html .= '<a href="#" class="car-toggler">展开所有月份'."</a>\n\n";
$html .= '<ul class="car-list">'."\n";
$firstmonth = TRUE;
foreach( $posts as $yearmonth =>$posts ) {
list( $year,$month ) = explode( '.',$yearmonth );
$firstpost = TRUE;
foreach( $posts as $post ) {
if ( TRUE == $firstpost ) {
$spchar = $firstmonth ?'<span class="car-toggle-icon car-minus">-</span>': '<span class="car-toggle-icon car-plus">+</span>';
$html .= '	<li><span class="car-yearmonth" style="cursor:pointer;">'.$spchar.' '.sprintf( __('%1$s %2$d'),$wp_locale->get_month($month),$year );
if ( '0'!= $atts['postcount'] ) 
{
$html .= ' <span title="文章数量">(共'.count($posts) .'篇文章)</span>';
}
if ($firstmonth == FALSE) {
$html .= "</span>\n		<ul class='car-monthlisting' style='display:none;'>\n";
}else {
$html .= "</span>\n		<ul class='car-monthlisting'>\n";
}
$firstpost = FALSE;
$firstmonth = FALSE;
}
$html .= '			<li>'.mysql2date( 'd',$post->post_date ) .'日: <a target="_blank" href="'.get_permalink( $post->ID ) .'">'.get_the_title( $post->ID ) .'</a>';
if ( '0'!= $atts['commentcount'] &&( 0 != $post->comment_count ||'closed'!= $post->comment_status ) &&empty($post->post_password) )
$html .= ' <span title="评论数量">('.$post->comment_count .'条评论)</span>';
$html .= "</li>\n";
}
$html .= "		</ul>\n	</li>\n";
}
$html .= "</ul>\n</div>\n";
return $html;
}
function PostCount() 
{
$num_posts = wp_count_posts( 'post');
return number_format_i18n( $num_posts->publish );
}
}
if(!empty($post->post_content))
{
$all_config=explode(';',$post->post_content);
foreach($all_config as $item)
{
$temp=explode('=',$item);
$hacklog_clean_archives_config[trim($temp[0])]=htmlspecialchars(strip_tags(trim($temp[1])));
}
}
else
{
$hacklog_clean_archives_config=array('usejs'=>1,'monthorder'=>'new','postorder'=>'new');
}
$hacklog_archives=new hacklog_archives();

?>
	<script type="text/javascript">
		/* <![CDATA[ */
			jQuery(document).ready(function() {
                function setsplicon(c, d) {
                    if (c.html()=='+' || d=='+') {
                        c.html('-');
                        c.removeClass('car-plus');
                        c.addClass('car-minus');
                    } else if( !d || d=='-'){
                        c.html('+');
                        c.removeClass('car-minus');
                        c.addClass('car-plus');
                    }
                }
				jQuery('.car-collapse').find('.car-yearmonth').click(function() {
					jQuery(this).next('ul').slideToggle('fast');
                    setsplicon(jQuery(this).find('.car-toggle-icon'));
				});
				jQuery('.car-collapse').find('.car-toggler').click(function() {
					if ( '展开所有月份' == jQuery(this).text() ) {
						jQuery(this).parent('.car-container').find('.car-monthlisting').show();
						jQuery(this).text('折叠所有月份');
                       setsplicon(jQuery('.car-collapse').find('.car-toggle-icon'), '+');
					}
					else {
						jQuery(this).parent('.car-container').find('.car-monthlisting').hide();
						jQuery(this).text('展开所有月份');
                        setsplicon(jQuery('.car-collapse').find('.car-toggle-icon'), '-');
					}
					return false;
				});
			});
		/* ]]> */
	</script>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
			<h1 class="page_title"><?php the_title(); ?></h1>
			<p class="articles_all">
            	<strong><?php bloginfo('name'); ?></strong>
                目前共有文章：  <?php echo $hacklog_archives->PostCount();?>篇	
            </p>
			<?php echo $hacklog_archives->PostList();?>
		</div>
	<?php endwhile;endif; ?>
	</div>
</div>

<?php get_footer(); ?>