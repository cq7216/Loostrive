<?php
/*
Template Name: 留言板
*/
?>
<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_header();  } ?>
<div class="container" id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php } ?>
	<?php get_sidebar(); ?>
    <div class="mainleft">
		<div class="article_container row  box">
			<h1 class="page_title"><?php the_title(); ?></h1>
			<div class="context cont_none">评论前30位童鞋会放于此页面上展示。没有进到读者墙的童鞋们也不要灰心，努力评论就一定可以上墙噢！<br />欢迎大家多多灌水，有访必回！<br /><br />
<?php
    $query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH ) AND user_id='0' AND comment_author_email != 'binhow@163.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 30";//大家把管理员的邮箱改成你的,最后的这个39是选取多少个头像，大家可以按照自己的主题进行修改,来适合主题宽度
 
    $wall = $wpdb->get_results($query);
 
    $maxNum = $wall[0]->cnt;
 
    foreach ($wall as $comment)
 
    {
 
        $width = round(40 / ($maxNum / $comment->cnt),2);//此处是对应的血条的宽度
 
        if( $comment->comment_author_url )
 
        $url = $comment->comment_author_url;
 
        else $url="#";
		$avatar = get_avatar( $comment->comment_author_email, $size = '36' );
 
        $tmp = "<li><a target=\"_blank\" rel=\"nofollow\" href=\"".$comment->comment_author_url."\">".$avatar."<span class='name'>".$comment->comment_author."</span> <strong>+".$comment->cnt."</strong><span>".$comment->comment_author_url."</span></a></li>";
 
        $output .= $tmp;
 
     }
 
    $output = "<ul class=\"readers-list\">".$output."</ul>";
 
    echo $output ;
 
?></div></div>
	<div id="comments_box">
		<?php comments_template();?>
</div>
	<?php endwhile;endif; ?></div></div>

<?php  $soz=$_POST["soz"]; if ($soz != "ajax") { get_footer();  } ?>