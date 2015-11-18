<?php
//函数开始
include('includes/theme_options.php');//后台设置
include('includes/breadcrumbs.php');//面包屑
//侧边栏
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
	'name'=>'侧边栏',
	'description'   => '以下小工具在页面右边显示',
	'before_widget'=>'<div class="widget box row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
    register_sidebar(array(
	'name'=>'滚动边栏',
	'description'   => '以下小工具在页面右边显示，可跟随滚动',
	'before_widget'=>'<div class="widget box row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
    register_sidebar(array(
	'name'=>'首页幻灯区域',
	'description'   => '以下小工具在首页导航栏下显示',
	'before_widget'=>'<div class="inter-top row">',
	'after_widget'=>'</div>',
	'before_title'=>'<h3>',
	'after_title'=>'</h3>',
	));
    register_sidebar(array(
	'name'=>'导航下通栏区域',
	'description'   => '以下小工具在导航栏下显示',
	'before_widget'=>'<div class="full-width row">',
	'after_widget'=>'</div>',
	'before_title'=>'',
	'after_title'=>'',
	));	
}
//小工具
include(TEMPLATEPATH . '/widget/loo-comments.php');
include(TEMPLATEPATH . '/widget/loo-tags.php');
include(TEMPLATEPATH . '/widget/loo-tab.php');
include(TEMPLATEPATH . '/widget/loo-login.php');
include(TEMPLATEPATH . '/widget/loo-search.php');
include(TEMPLATEPATH . '/widget/loo-imglist.php');
//定义菜单
    if (function_exists('register_nav_menus')){
        register_nav_menus( array(
            'nav' => __('导航'),
            'toolbar' => __('顶部菜单'),
            'footnav' => __('底部菜单'),
			'friendlink' => __('友情链接(仅在首页显示)')
        ) );
    }
//特色图片尺寸
add_theme_support('post-thumbnails');
//开启wordpress3.5友情链接管理
add_filter( 'pre_option_link_manager_enabled', '__return_true' ); 
//去除自带js
	wp_deregister_script( 'l10n' );
// 加载前端脚本及样式
function loo_scripts() {
	wp_enqueue_style( 'kube', get_template_directory_uri() . '/css/kube.css');
	if (get_option('strive_alt_stylesheet')==''){wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '20150910' );};
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery.min.js');
    wp_enqueue_script( 'jquery' );
	if (get_option('strive_waterfall')=='Display'){if(is_home() || is_category() || is_tag() || is_search() || is_author()){wp_enqueue_script( 'masonry-min', get_template_directory_uri().'/js/jquery.masonry.js', array(),true );};};
	if ( is_singular() ) {
		wp_enqueue_style( 'fresco', get_template_directory_uri() . '/images/imgbox/lightbox.css', array(), '1.5.1' );
		wp_enqueue_script( 'fresco',get_template_directory_uri() . '/images/imgbox/lightbox.min.js', false, '1.5.1',true);	
		wp_enqueue_script( 'comments-ajax', get_template_directory_uri().'/comments-ajax.js', array(),true );
		wp_enqueue_script( 'realgravatar', get_template_directory_uri().'/js/realgravatar.js', array(),true );		
	};
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/loostrive.js', false, '1.0',true  );	
}
add_action( 'wp_enqueue_scripts', 'loo_scripts' );
//修改文本编辑器
add_filter('mce_buttons_3','my_buttons');
function my_buttons($buttons){
	$mces=array(
		'cut',
		'copy',
		'paste',
		'hr',
		'fontselect',
		'fontsizeselect',
		'sub',
		'sup',
		'backcolor',
		'visualaid',
		'anchor',
		'newdocument',
	);
	foreach($mces as $mce){
		$buttons[]=$mce;
	}
	return $buttons;
}
//热评文章列表
function simple_get_most_viewed($posts_num=10,$days=90){
global $wpdb;
$sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
$posts = $wpdb->get_results($sql);
$output = '';
foreach ($posts as $post){
$output .= "\n<li><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title.' ('.$post->comment_count."条评论)\" >".$post->post_title.'</a></li>';
}
echo $output;
}
//主题更新检测
require_once(TEMPLATEPATH . '/includes/update-checker.php'); 
$wpdaxue_update_checker = new ThemeUpdateChecker(
	'Loostrive',
	'http://www.loome.net/update/loostrive/info.json'
);
//分页导航
function pagination($range = 6){
	global $paged, $wp_query;
	echo "<div class='pagination'>";
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>首页</a>";}
	if($paged>1) echo '<a href="' . get_pagenum_link($paged-1) .'" class="prev">上一页</a>';
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	if($paged<$max_page) echo '<a href="' . get_pagenum_link($paged+1) .'" class="next">下一页</a>';
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>尾页</a>";
	}
	}
	echo "</div>";
}

//自动生成版权时间
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
$output = '';
if($copyright_dates) {
$copyright = '&copy; '.$copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-'.$copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
//暗箱效果自动添加标签属性
function lightbox_auto($content) {
	global $post;
	$pattern = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")([^\>]*?)>/i";
	$replacement = '<a$1href=$2$3$4$5$6 data-title="'.$post->post_title.'" data-lightbox="'.$post->ID.'">';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'lightbox_auto',99);
//自动用文章标题为图片添加alt
add_filter( 'the_content', 'image_alt' );
function image_alt($c) {
 global $post;
 $title = $post->post_title;
 $s = array('/src="(.+?.(jpg|bmp|png|jepg|gif))"/i' => 'src="$1" alt="'.$title.'"');
 foreach($s as $p => $r){
  $c = preg_replace($p,$r,$c);
    }
    return $c;
}
/*分类描述*/
function loo_deletehtml($str) {  
    return trim(strip_tags($str)); 
} 
add_filter('category_description', 'loo_deletehtml');
/*显示文章浏览次数*/
function getPostViews($postID){
$count = get_post_meta($postID,'views', true);
if($count==''){
delete_post_meta($postID,'views');
add_post_meta($postID,'views', '0');
return "0";
}
return $count.'';
}
function setPostViews($postID) {
$count = get_post_meta($postID,'views', true);
if($count==''){
$count = 0;
delete_post_meta($postID,'views');
add_post_meta($postID,'views', '0');
}else{
$count++;
update_post_meta($postID,'views', $count);
}
}
//图片默认连接到媒体文件(原始链接)
update_option('image_default_link_type', 'file');
//去除头部冗余代码
remove_action( 'wp_head',   'feed_links_extra', 3 ); 
remove_action( 'wp_head',   'rsd_link' ); 
remove_action( 'wp_head',   'wlwmanifest_link' ); 
remove_action( 'wp_head',   'index_rel_link' ); 
remove_action( 'wp_head',   'start_post_rel_link', 10, 0 ); 
remove_action( 'wp_head',   'wp_generator' ); 
//后台仪表盘订阅洛米（不需要可删除）
function dashboard_custom_feed_output() {
     echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
         'url' => 'http://www.loome.net/feed/', //rss地址
          'title' => '查看洛米网站的最新内容',
         'items' => 6,         //显示篇数
          'show_summary' => 0,  //是否显示摘要，1为显示
          'show_author' => 0,   //是否显示作者，1为显示
          'show_date' => 1  )); //是否显示日期
     echo '</div>';
}
function h_add_dashboard_widgets() {
    wp_add_dashboard_widget('example_dashboard_widget', 'Loome洛米最新动态', 'dashboard_custom_feed_output');
}
add_action('wp_dashboard_setup', 'h_add_dashboard_widgets' );
//修改评论表情调用路径
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src,$img,$siteurl){
return get_bloginfo('template_directory').'/images/smilies/'.$img;
}
function wp_smilies(){
  $a = array( 'mrgreen','razz','sad','smile','oops','grin','eek','???','cool','lol','mad','twisted','roll','wink','idea','arrow','neutral','cry','?','evil','shock','!' );
  $b = array( 'mrgreen','razz','sad','smile','redface','biggrin','surprised','confused','cool','lol','mad','twisted','rolleyes','wink','idea','arrow','neutral','cry','question','evil','eek','exclaim' );
  for( $i=0;$i<22;$i++ ){
    echo '<a title="'.$a[$i].'" href="javascript:grin('."'".$a[$i]."'".')"><img src="'.get_bloginfo('template_directory').'/images/smilies/icon_'.$b[$i].'.gif" /></a>';
  }
}

// 评论回复
function weisay_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
global $commentcount,$wpdb, $post;
     if(!$commentcount) { //初始化楼层计数器
          $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
          $cnt = count($comments);//获取主评论总数量
          $page = get_query_var('cpage');//获取当前评论列表页码
          $cpp=get_option('comments_per_page');//获取每页评论显示数量
         if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) {
             $commentcount = $cnt + 1;//如果评论只有1页或者是最后一页，初始值为主评论总数
         } else {
             $commentcount = $cpp * $page + 1;
         }
     }
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
   <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
      <?php $add_below = 'div-comment'; ?>
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
					<div class="floor"><?php
 if(!$parent_id = $comment->comment_parent){
   switch ($commentcount){
     case 2 :echo "沙发";--$commentcount;break;
     case 3 :echo "板凳";--$commentcount;break;
     case 4 :echo "地板";--$commentcount;break;
     default:printf('%1$s楼', --$commentcount);
   }
 }
 ?>
         </div><strong><?php comment_author_link() ?></strong>:<?php edit_comment_link('编辑','&nbsp;&nbsp;',''); ?></div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<span style="color:#C00; font-style:inherit">您的评论正在等待审核中...</span>
			<br />			
		<?php endif; ?>
		<?php comment_text() ?>
        
		<div class="clear"></div><span class="datetime"><?php comment_date('Y-m-d') ?> <?php comment_time() ?> </span> <span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '[回复]', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
  </div>
<?php
}
function weisay_end_comment() {
		echo '</li>';
}
//评论html过滤
function loo_comment_post( $incoming_comment ) {
	$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
	$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
	return( $incoming_comment );
	}
	function loo_comment_display( $comment_to_display ) {
	$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
	return $comment_to_display;
	}
	add_filter( 'preprocess_comment', 'loo_comment_post', '', 1);
	add_filter( 'comment_text', 'loo_comment_display', '', 1);
	add_filter( 'comment_text_rss', 'loo_comment_display', '', 1);
	add_filter( 'comment_excerpt', 'loo_comment_display', '', 1);
//登陆显示头像
function weisay_get_avatar($email, $size = 48){
return get_avatar($email, $size);
}
//评论回复邮件通知（所有回复都邮件通知）*（美化版）
function comment_mail_notify($comment_id) {
$comment = get_comment($comment_id);
$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
$spam_confirmed = $comment->comment_approved;
if (($parent_id != '') && ($spam_confirmed != 'spam')) {
$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
$to = trim(get_comment($parent_id)->comment_author_email);
$subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
$message = '
<div style="background-color:#fff; border:1px solid #666666; color:#111;
-moz-border-radius:8px; -webkit-border-radius:8px; -khtml-border-radius:8px;
border-radius:8px; font-size:12px; width:702px; margin:0 auto; margin-top:10px;
font-family:微软雅黑, Arial;">
<div style="background:#666666; width:100%; height:60px; color:white;
-moz-border-radius:6px 6px 0 0; -webkit-border-radius:6px 6px 0 0;
-khtml-border-radius:6px 6px 0 0; border-radius:6px 6px 0 0; ">
<span style="height:60px; line-height:60px; margin-left:30px; font-size:12px;">
您在<a style="text-decoration:none; color:#00bbff;font-weight:600;"
href="' . get_option('home') . '">' . get_option('blogname') . '
</a>博客上的留言有回复啦！</span></div>
<div style="width:90%; margin:0 auto">
<p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
<p>您曾在 [' . get_option("blogname") . '] 的文章
《' . get_the_title($comment->comment_post_ID) . '》 上发表评论:
<p style="background-color: #EEE;border: 1px solid #DDD;
padding: 20px;margin: 15px 0;">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
<p>' . trim($comment->comment_author) . ' 给您的回复如下:
<p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;
margin: 15px 0;">' . nl2br($comment->comment_content) . '</p>
<p>您可以点击 <a style="text-decoration:none; color:#00bbff"
href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
<p>欢迎再次光临 <a style="text-decoration:none; color:#00bbff"
href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
<p>(此邮件由系统自动发出, 请勿回复.)</p>
</div>
</div>';
$message = convert_smilies($message);
$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
wp_mail( $to, $subject, $message, $headers );
//echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
}
}
add_action('comment_post', 'comment_mail_notify');

//输出缩略图地址
function post_thumbnail_img($width,$height) {
	global $post;
	$title = $post->post_title;
	if (get_option('strive_timth')=='Display'){
		if ( has_post_thumbnail() ) {
			$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full');
			$post_timthumb = '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=' . $timthumb_src[0] . '&amp;h=' . $height . '&amp;w=' . $width . '&amp;zc=1" width="'.$width.'" height="'.$height.'" alt="' . $title . '" />';
			echo $post_timthumb;
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
			echo '<img src="' . get_bloginfo("template_url").'/timthumb.php?src=' . $strResult[1][0] . '&amp;h=' . $height . '&amp;w=' . $width . '&amp;zc=1" width="'.$width.'" height="'.$height.'" alt="'.$title.'" />';
		}else {
			echo '<img src="' . get_bloginfo("template_url").'/images/noimage.gif" width="'.$width.'" height="'.$height.'" alt="暂无图片">';
			}
		}
	}else{
		if ( has_post_thumbnail() ) {
			the_post_thumbnail(array($width,$height));
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="'.$strResult[1][0].'" width="'. $width .'" height="'.$height.'" alt="'.$title.'"/>';
			}else {
				echo '<img src="' . get_bloginfo("template_url").'/images/noimage.gif" width="'.$width.'" height="'.$height.'" alt="暂无图片">';
				}
			}
	}
}
//列表图片
function post_thumbnail_list($width=300) {
	global $post;
	$title = $post->post_title;
	if (get_option('strive_timth')=='Display'){
		if ( has_post_thumbnail() ) {
			$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'full');
			$post_timthumb = '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=' . $timthumb_src[0] . '&amp;w=' . $width . '&amp;zc=1;a=t" alt="' . $title . '" />';
			echo $post_timthumb;
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="' . get_bloginfo("template_url").'/timthumb.php?src=' . $strResult[1][0] . '&amp;w=' . $width . '&amp;zc=1" alt="'.$title.'" />';
			}
		}
	}else{
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else {
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			$n = count($strResult[1]);
			if($n > 0){
				echo '<img src="'.$strResult[1][0].'" width="'. $width .'" height="auto" alt="'.$title.'"/>';
				}
			}
	}
}

//修改登录页logo和链接
if ( !function_exists( 'loostrive_login_logo' ) ) {
	function loostrive_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.stripslashes(get_option(strive_mylogo)).') !important; background-size: auto auto !important;width:auto !important; }
	    </style>';
	}
}
add_action('login_head', 'loostrive_login_logo');

if ( !function_exists( 'loostrive_wp_login_url' ) ) {
	function loostrive_wp_login_url() {
		return home_url();
	}
}
add_filter('login_headerurl', 'loostrive_wp_login_url');

if ( !function_exists( 'loostrive_wp_login_title' ) ) {
	function loostrive_wp_login_title() {
		return get_option('blogname');
	}
}
add_filter('login_headertitle', 'loostrive_wp_login_title');
//开启后台自定义背景
add_theme_support('custom-background');
//去除谷歌字体
    if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    }
	// 前台删除Google字体CSS
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
	// 后台删除Google字体CSS
    add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
  endif;
  
// 在 WordPress 编辑器添加“下一页”按钮
add_filter('mce_buttons','add_next_page_button');
function add_next_page_button($mce_buttons) {
	$pos = array_search('wp_more',$mce_buttons,true);
	if ($pos !== false) {
		$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
		$tmp_buttons[] = 'wp_page';
		$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
	}
	return $mce_buttons;
}
//取消内容转义
$qmr_work_tags = array(
  'the_title',             // 标题
  'the_content',           // 内容 *
  'the_excerpt',           // 摘要 *
  'single_post_title',     // 单篇文章标题
  'comment_author',        // 评论作者
  'comment_text',          // 评论内容 *
  'link_description',      // 友链描述（已弃用，但还很常用）
  'bloginfo',              // 博客信息
  'wp_title',              // 网站标题
  'term_description',      // 项目描述
  'category_description',  // 分类描述
  'widget_title',          // 小工具标题
  'widget_text'            // 小工具文本
  );
foreach ( $qmr_work_tags as $qmr_work_tag ) {
  remove_filter ($qmr_work_tag, 'wptexturize');
}
//Gravatar头像
function get_avatar_loo($avatar) { 
        $protocol=is_ssl()?'https':'http';
        $avatar_source='cn.gravatar.com';
        $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="'.$protocol.'://'.$avatar_source.'/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
        return $avatar;
}
add_filter('get_avatar', 'get_avatar_loo');
//内容分页
function custom_wp_link_pages( $args = '' ) {
    $defaults = array(
        'before' => '<div class="pagelist">分页阅读：', 
        'after' => '</div>',
        'text_before' => '',
        'text_after' => '',
        'next_or_number' => 'number', 
        'nextpagelink' =>'下一页',
        'previouspagelink' =>'上一页',
        'pagelink' => '%',
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                $output .= ' ';
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= _wp_link_page( $i );
                else
                    $output .= '<span>';

                $output .= $text_before . $j . $text_after;
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '</a>';
                else
                    $output .= '</span>';
            }
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $previouspagelink . $text_after . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $nextpagelink . $text_after . '</a>';
                }
                $output .= $after;
            }
        }
    }

    if ( $echo )
        echo $output;

    return $output;
}
/**
* Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
function smilies_reset() {
global $wpsmiliestrans;

// don't bother setting up smilies if they are disabled
if ( !get_option( 'use_smilies' ) )
    return;

    $wpsmiliestrans = array(
    ':mrgreen:' => 'icon_mrgreen.gif',
    ':neutral:' => 'icon_neutral.gif',
    ':twisted:' => 'icon_twisted.gif',
      ':arrow:' => 'icon_arrow.gif',
      ':shock:' => 'icon_eek.gif',
      ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
       ':cool:' => 'icon_cool.gif',
       ':evil:' => 'icon_evil.gif',
       ':grin:' => 'icon_biggrin.gif',
       ':idea:' => 'icon_idea.gif',
       ':oops:' => 'icon_redface.gif',
       ':razz:' => 'icon_razz.gif',
       ':roll:' => 'icon_rolleyes.gif',
       ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
          '8-)' => 'icon_cool.gif',
          '8-O' => 'icon_eek.gif',
          ':-(' => 'icon_sad.gif',
          ':-)' => 'icon_smile.gif',
          ':-?' => 'icon_confused.gif',
          ':-D' => 'icon_biggrin.gif',
          ':-P' => 'icon_razz.gif',
          ':-o' => 'icon_surprised.gif',
          ':-x' => 'icon_mad.gif',
          ':-|' => 'icon_neutral.gif',
          ';-)' => 'icon_wink.gif',
    // This one transformation breaks regular text with frequency.
    //     '8)' => 'icon_cool.gif',
           '8O' => 'icon_eek.gif',
           ':(' => 'icon_sad.gif',
           ':)' => 'icon_smile.gif',
           ':?' => 'icon_confused.gif',
           ':D' => 'icon_biggrin.gif',
           ':P' => 'icon_razz.gif',
           ':o' => 'icon_surprised.gif',
           ':x' => 'icon_mad.gif',
           ':|' => 'icon_neutral.gif',
           ';)' => 'icon_wink.gif',
          ':!:' => 'icon_exclaim.gif',
          ':?:' => 'icon_question.gif',
    );
}
smilies_reset();

//Loostrive主题函数结束

?>
