<title><?php if ( is_tag() ) {
		echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		echo wp_title('');  if($paged > 1) printf(' - 第%s页',$paged);    echo ' | ';    bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' );echo' | ';bloginfo('description');$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);
	}  elseif ( is_404() ) {
		echo '页面不存在！ | '; bloginfo( 'name' );
	} else {
		echo wp_title( ' | ', false, right )  ; bloginfo( 'name' );
	} ?>
</title>
<?php
if (!function_exists('utf8Substr')) {
 function utf8Substr($str, $from, $len)
 {
     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
 }
}
if ( is_single()){
    if ($post->post_excerpt) {
        $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
    $post_content = $result['1'];
   } else {
    $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
    $post_content = $post_content_r['0'];
   }
         $description = utf8Substr($post_content,0,220);  
  } 
    $keywords = "";     
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ",";
    }
}
?>
<?php echo "\n"; ?>
<?php if ( is_single()) { ?>
<meta name="description" content="<?php echo trim($description); ?>" />
<meta name="keywords" content="<?php echo rtrim($keywords,','); ?>" />
<?php } ?>
<?php if ( is_home() ) { ?>
<meta name="description" content="<?php echo get_option('strive_description'); ?>" />
<meta name="keywords" content="<?php echo get_option('strive_keywords'); ?>" />
<?php } ?>
<?php if ( is_archive() ) { ?>
<meta name="description" content="<?php echo category_description(); ?>" />
<?php } ?>
<?php if ( is_page() ) { 
	if( !empty( $post->post_excerpt ) ) {
	  $text = $post->post_excerpt;
	} else {
	  $text = $post->post_content;
	}
	$description = trim( str_replace( array( "\r\n", "\r", "\n", "　", " "), " ", str_replace( "\"", "'", strip_tags( $text ) ) ) );
	if ( !( $description ) ) $description = $blog_name . "-" . trim( wp_title('', false) );
	?>
	
<meta name="description" content="<?php echo mb_substr( $description, 0, 220, 'utf-8' ); ?>" />
<meta name="keywords" content="<?php echo trim( wp_title('', false) );; ?>" />
<?php } ?>