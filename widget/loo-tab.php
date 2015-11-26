<?php
//Tabber
   
/**
 * Tabber Class
 */
class loo_tab extends WP_Widget {
    /** 构造函数 */
    function loo_tab() {
        parent::WP_Widget(false, $name = 'Loome-文章Tab'); 
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {   
        extract( $args );
        ?>
		  <div class="widget box row setanimate visible">
		  	<div id="tab-title">
				<div class="tab">
					<ul id="tabnav">
						<li>最新文章</li>
						<li class="selected">热评文章</li>
						<li>随机文章</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div id="tab-content">
				<ul class="hide"><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>
				<ul><?php simple_get_most_viewed(10,365);?></ul>
				<ul class="hide">
				<?php query_posts(array('orderby'=>'rand','posts_per_page'=>10,'ignore_sticky_posts'=>true)); while(have_posts()): the_post(); ?>
                	<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(array('before'=>'','after'=>' 的文章')); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; wp_reset_query();?>
                </ul>
             </div>
          </div>
<?php
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
add_action('widgets_init', create_function('', 'return register_widget("loo_tab");'));
?>