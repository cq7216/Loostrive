<?php
/**
 * Template Name: 投稿页
 */
    
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send'){
    if ( isset($_COOKIE["tougao"]) && ( time() - $_COOKIE["tougao"] ) < 120 ){
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('您投稿也太勤快了吧，先歇会儿！');
    }
    //表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? $_POST['tougao_authorname'] : '';
    $email = isset( $_POST['tougao_authoremail'] ) ? $_POST['tougao_authoremail'] : '';
    $blog = isset( $_POST['tougao_authorblog'] ) ? $_POST['tougao_authorblog']: '';
    $title = isset( $_POST['tougao_title'] ) ? $_POST['tougao_title'] : '';
    $tags = isset( $_POST['tougao_tags']) ? $_POST['tougao_tags'] : '';
    $category = isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content = isset( $_POST['tougao_content'] ) ? $_POST['tougao_content'] : '';
    //表单项数据验证
    if ( empty($name) || strlen($name) > 20 ){
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('昵称必须填写，且不得超过20个长度');
    }
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('邮箱必须填写，且不得超过60个长度，必须符合 Email 格式');
    }
    if ( empty($title) || strlen($title) > 100 ){
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('文章标题必须填写，且不得超过100个长度');
    }
    if ( empty($content) || strlen($content) < 100){
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('内容必须填写，且不得少于100个长度');
    }
    $tougao = array(
        'post_title' => $title,                //标题
        'post_content' => $content,            //内容
        'post_status' => 'pending',            //待审
        'tags_input' => $tags,                 //标签
        'post_category' => array($category)    //分类
    );
    //将文章插入数据库
    $status = wp_insert_post( $tougao );
    if ($status != 0){
        //将自定义域写入最新待审文章
        global $wpdb;
        $myposts = $wpdb->get_results("
            SELECT ID
            FROM $wpdb->posts
            WHERE post_status = 'pending'
            AND post_type = 'post'
            ORDER BY post_date DESC
        ");
        add_post_meta($myposts[0]->ID, 'author', $name);    //插入投稿人昵称的自定义域
        if ( !empty($blog)) add_post_meta($myposts[0]->ID, 'source', $blog);    //插入投稿人网址的自定义域
        
        setcookie("tougao", time(), time()+180);
        echo   '<p align="center"><a href="';bloginfo('siteurl');;echo '/" title="返回首页">返回首页</a></p>';
        wp_die('投稿成功！','投稿成功！');
    } else {
        echo   '<p  align=center><input class="btnStyle" type="submit"   value="返回"   onclick="history.back()"></p>';
        wp_die('投稿失败！','投稿失败！');
    }
}
?>
<?php get_header()?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post()?>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php }?>
	<?php get_sidebar()?>
    <div class="mainleft">
		<div class="article_container row  box">
			<h1 class="page_title"><?php the_title()?></h1>
        	<div class="context cont_none">
				<?php the_content(); ?>
                <form method="post" class="forms columnar" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                	<fieldset>
                    <ul>
                    	<li><label for="tougao_authorname" class="bold"><span class="red">*</span>昵称:</label>
                        <input type="text" size="40" value="" name="tougao_authorname" />
                    	</li>
                
                    <li>
                        <label for="tougao_authoremail" class="bold"><span class="red">*</span>E-Mail:</label>
                        <input type="text" size="40" value="" name="tougao_authoremail" />
                    </li>
                                    
                    <li>
                        <label for="tougao_authorblog" class="bold">您的网址:</label>
                        <input type="text" size="40" value="" name="tougao_authorblog" />
                    </li>
                                    
                    <li>
                        <label for="tougao_title" class="bold"><span class="red">*</span>文章标题:</label>
                        <input type="text" size="40" value="" name="tougao_title" />
                    </li>
                    <li>
                        <label for="tougao_tags" class="bold">关键字:</label>
                        <input id="tags" type="text" size="40" value="" name="tougao_tags" />
                        <div class="descr">（多个标签请用英文逗号 , 分开）</div>
                    </li>
                    <li>
                        <label class="bold"><span class="red">*</span>选择文章分类:</label>
                        <?php wp_dropdown_categories('show_count=1&hierarchical=1'); ?>
                    </li>
                    <li>
                        <label for="tougao_content" class="bold"><span class="red">*</span>文章内容:</label>
                        <textarea style=" height:100px; border:#ccc solid 1px;" rows="15" cols="55" name="tougao_content"></textarea>
                    </li>
                                    
                    <li class="push">
                        <input type="hidden" value="send" name="tougao_form" />
                        <input class="btn" type="submit" value="提交" />
                        <input class="btn" type="reset" value="重填" />
                    </li>
                    </ul>
                    </fieldset>
                    </form>
 				</div>
            </div>
	<?php endwhile;?><?php else: ;echo'';?><?php endif;?>
    </div>
    </div>

<?php get_footer();?>