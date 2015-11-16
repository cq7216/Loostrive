<?php
//Tabber
   
/**
 * Tabber Class
 */
class loo_search extends WP_Widget {
    /** 构造函数 */
    function loo_search() {
        parent::WP_Widget(false, $name = 'Loome-搜索'); 
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {   
        extract( $args );
        ?>
         <?php
echo '
<div class="search box row">
<div class="search_site">
<form id="searchform" method="get" action="';bloginfo('home');;echo '">
		<input type="submit" value="" id="searchsubmit" class="button"/>
		<label><span>请输入搜索内容</span><input type="text" class="search-s" name="s"  x-webkit-speech /></label>
</form></div></div>
'
?><?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {       
        return $new_instance;
    }
    /** @see WP_Widget::form */
    function form($instance) {        
        $title = esc_attr($instance['title']);
    }
}
add_action('widgets_init', create_function('', 'return register_widget("loo_search");'));
?>