<?php   
class loo_login extends WP_Widget {
    /** 构造函数 */
    function loo_login() {
        parent::WP_Widget(false, $name = 'Loome-登陆'); 
    }
    /** @see WP_Widget::widget */
    function widget($args, $instance) {   
        extract( $args );
		echo $before_widget;
		global $user_ID,$user_identity,$user_email,$user_login;
		get_currentuserinfo();
		if (!$user_ID) {
			echo '
			<form id="loginform" action="'.get_settings('siteurl').'/wp-login.php" method="post"><h3>用户登录</h3>
				<div class="loginl">
					<p><label>用户名</label><input class="login" type="text" name="log" id="log" value="" size="12" /></p>
					<p><label>密　码</label><input class="login" type="password" name="pwd" id="pwd" value="" size="12" /></p>
				</div>
				<div class="loginr">
					<input class="denglu btn" type="submit" name="submit" value="登 陆" />
				</div>
				<div class="clear"></div>
				<p>
					<a class="register" href="'.get_settings('siteurl').'/wp-login.php?action=register">用户注册</a>
					<label><input id="comment_mail_notify" type="checkbox" name="rememberme" value="forever" />记住我 </label>
				</p>
				<p>
					<input type="hidden" name="redirect_to" value="'.$_SERVER['REQUEST_URI'].'"/>
				</p>
				</form>';
			}else {?>
				<h3>用户管理</h3>
				<div class="v_avatar"><?php echo weisay_get_avatar($user_email,64)?></div>
				<div class="v_li">
					<li><a class="btn" href="<?php bloginfo('url') ?>/wp-admin/" target="_blank">控制面板</a></li>
					<?php if(current_user_can('level_1')){?><li><a class="btn" href="<?php bloginfo('url') ?>/wp-admin/post-new.php" target="_blank">撰写文章</a></li><?php }?>
					<?php if(current_user_can('level_3')){?><li><a class="btn" href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php" target="_blank">评论管理</a></li><?php }?>
					<li><a class="btn" href="<?php echo wp_logout_url()?>">注销</a></li>
				</div>
			<?php };
			echo '<div class="clear"></div>';
			echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {       
        return $new_instance;
    }
    /** @see WP_Widget::form */
    function form($instance) {        
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }
} 
add_action('widgets_init', create_function('', 'return register_widget("loo_login");'));
?>