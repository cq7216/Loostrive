<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class loo_comment extends WP_Widget {

	function loo_comment(){

		$widget_ops = array('description' => 'Loome-最新评论');

		parent::WP_Widget('loo_comment',$name='Loome-最新评论',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，title_en:英文标题，showComments:显示文章数量，cat:分类目录ID

		$instance = wp_parse_args((array)$instance,array('title'=>'最新评论','showComments'=>6));//默认值
		
		$title = htmlspecialchars($instance['title']);

		$showComments = htmlspecialchars($instance['showComments']);
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('showComments').'">评论数量:<input style="width:200px;" id="'.$this->get_field_id('showComments').'" name="'.$this->get_field_name('showComments').'" type="text" value="'.$showComments.'" /></label></p>';

?>	
		<p style="text-align:left;display:inline-block;"><input style="float:left;margin-right:5px;" id="<?php echo $this->get_field_id('user_id'); ?>" name="<?php echo $this->get_field_name('user_id'); ?>" type="checkbox" <?php checked(isset($instance['user_id']) ? $instance['user_id'] : 0); ?> /><label for="<?php echo $this->get_field_id('user_id'); ?>" style="float:left;"><?php _e('勾选则不显示管理员评论'); ?></label></p>

<?php
	}

	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		
		$instance['showComments'] = strip_tags(stripslashes($new_instance['showComments']));

		$instance['user_id'] = isset($new_instance['user_id']);

		return $instance;

	}


	function sidebar_comment($args = ''){
	
	$default = array('showComments'=>6);

	$r = wp_parse_args($args,$default);

	extract($r);
	
	echo '<div class="r_comment"> <ul id="scroll_List">';
	
	if( function_exists('wp_recentcomments') ) :
		
		wp_recentcomments('limit='.$showComments.'&length=16&post=false&smilies=true');
		
	else: 
		
		$comments = get_comments(array('number'=>$showComments,'status' => 'approve','user_id'=>$user_id));
		
		foreach($comments as $comment){ $cmt_visitor = get_comment_author(); echo '<li><a href="'.get_comment_link($comment->comment_ID).'" title="查看该评论文章： '.get_the_title($comment->comment_post_ID).'">'.get_avatar( $comment, 32 ).'<span>'.get_comment_author($comment->comment_ID).'</span><br/>'.convert_smilies(mb_strimwidth(get_comment_text($comment->comment_ID), 0, 39, '...','utf-8')).'</a></li>';}
	
	endif;
	
	wp_reset_query();
	
	echo '</ul></div>';
	
	}

//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('最新评论','loo') : $instance['title']);//小工具前台标题
		
		$showComments = empty($instance['showComments']) ? 6 : $instance['showComments'];

		$user_id = !empty( $instance['user_id'] ) ? 0 : '';

		echo '<div class="widget box row">';

		if( $title ) echo $before_title . $title . $after_title;

		self::sidebar_comment("showComments=$showComments&user_id=$user_id");

		echo '</div>';

	}

}

//激活小工具
register_widget('loo_comment');
?>