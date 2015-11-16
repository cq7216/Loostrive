<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class loo_tags extends WP_Widget {

	function loo_tags(){

		$widget_ops = array('description' => 'Loome-边栏标签');

		parent::WP_Widget('loo_tags',$name='Loome-边栏标签',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，tags_id:排除标签ID，all_tags_url:更多标签链接(新建的标签云页面链接)

		$instance = wp_parse_args((array)$instance,array('title'=>'边栏标签','tags_id'=>'','all_tags_url'=>''));//默认值
		
		$title = htmlspecialchars($instance['title']);

		$tags_id = htmlspecialchars($instance['tags_id']);
		
		$all_tags_url = htmlspecialchars($instance['all_tags_url']);	
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('tags_id').'">填写不显示的标签ID:<br>(多个标签不显示使用英文逗号隔开)<input style="width:200px;" id="'.$this->get_field_id('tags_id').'" name="'.$this->get_field_name('tags_id').'" type="text" value="'.$tags_id.'" /></label></p>';
		

	}
	
	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		
		$instance['tags_id'] = strip_tags(stripslashes($new_instance['tags_id']));
		
		$instance['all_tags_url'] = strip_tags(stripslashes($new_instance['all_tags_url']));

		return $instance;

	}

	//文章随机显示

	function sidebar_tags_us($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);
?>		

	<div class="tagcloud">
		<?php wp_tag_cloud('smallest=10&largest=10&number=40&exclude='.$tags_id.($count)); ?>
	</div>

<?php
	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('边栏标签','binhow') : $instance['title']);//小工具前台标题
		
		$tags_id = empty($instance['tags_id']) ? '' : $instance['tags_id'];
		
		$all_tags_url = empty($instance['all_tags_url']) ? '' : $instance['all_tags_url'];
	
		echo '<div class="widget box row">';

		if( $title ) echo $before_title . $title . $after_title;

		self::sidebar_tags_us("tags_id=$tags_id&all_tags_url=$all_tags_url");

		echo '</div>';

	}

}

//激活小工具
register_widget('loo_tags');
?>