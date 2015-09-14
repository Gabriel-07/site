<?php

/***** Spotlight Widget (Homepage) *****/	

class mh_spotlight_hp_widget extends WP_Widget {
    function mh_spotlight_hp_widget() {
        $widget_ops = array('classname' => 'mh_spotlight_hp', 'description' => __('Spotlight / Featured widget for use on homepage templates', 'mh'));
        $this->WP_Widget('mh_spotlight_hp', __('MH Spotlight Widget (Homepage)', 'mh'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('In the spotlight', 'mh') : $instance['title'], $instance, $this->id_base);
        $category = isset($instance['category']) ? $instance['category'] : '';
        $tags = empty($instance['tags']) ? '' : $instance['tags'];
        $offset = empty($instance['offset']) ? '' : $instance['offset'];
        $order = isset($instance['order']) ? $instance['order'] : 'date';
        $width = isset($instance['width']) ? $instance['width'] : 'normal_sl';
        $excerpt_length = empty($instance['excerpt_length']) ? '175' : $instance['excerpt_length'];
        $excerpt = isset($instance['excerpt']) ? $instance['excerpt'] : 0;
        $meta = isset($instance['meta']) ? $instance['meta'] : 0;  
              
        echo $before_widget; ?>
		<article class="spotlight"><?php
		$args = array('posts_per_page' => 1, 'cat' => $category, 'tag' => $tags, 'offset' => $offset, 'orderby' => $order, 'ignore_sticky_posts' => 1);
		$spotlight_loop = new WP_Query($args);
		while ($spotlight_loop->have_posts()) : $spotlight_loop->the_post(); ?>
			<div class="sl-caption"><?php echo $title; ?></div>	
			<div class="sl-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
					if (has_post_thumbnail()) { 
						if ($width == 'normal_sl') {
							the_post_thumbnail('spotlight');
						} else {
							the_post_thumbnail('slider');
						}
					} else {
						if ($width == 'normal_sl') {
							echo '<img src="' . get_template_directory_uri() . '/images/noimage_580x326.png' . '" alt="No Picture" />';
						} else { 
							echo '<img src="' . get_template_directory_uri() . '/images/noimage_940x400.png' . '" alt="No Picture" />';
						}
					} ?>
				</a>
			</div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2 class="sl-title"><?php the_title(); ?></h2></a>
			<?php if ($meta == 0) { ?>
				<p class="meta"><?php _e('by ', 'mh') . the_author() . _e(' in ', 'mh'); ?><?php $category = get_the_category(); echo $category[0]->cat_name; ?></p>
			<?php } ?>
			<?php if ($excerpt == 0) { ?>
				<?php mh_excerpt($excerpt_length); ?>
			<?php } ?>
			<?php if ($meta == 0) { ?>
			<p class="meta"><?php comments_number(__('0 Comments', 'mh'), __('1 Comment', 'mh'), __('% Comments', 'mh')); ?></p>
			<?php } 
		endwhile; wp_reset_postdata(); ?>		
		</article><?php 
        echo $after_widget;             
    }    
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['category'] = $new_instance['category'];
        $instance['tags'] = strip_tags($new_instance['tags']);
        $instance['offset'] = strip_tags($new_instance['offset']);
        $instance['order'] = $new_instance['order'];
        $instance['width'] = $new_instance['width'];
        $instance['excerpt_length'] = strip_tags($new_instance['excerpt_length']);
        $instance['excerpt'] = $new_instance['excerpt'];
        $instance['meta'] = $new_instance['meta'];
        return $instance;     
    }   
    function form($instance) {
        $defaults = array('title' => '', 'category' => '', 'tags' => '', 'offset' => '0', 'order' => 'date', 'width' => 'normal_sl', 'excerpt_length' => '175', 'excerpt' => 0, 'meta' => 0);
        $instance = wp_parse_args((array) $instance, $defaults); ?>
        
        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mh'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>  
	    <p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select a Category:', 'mh'); ?></label>
			<select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
				<option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>><?php _e('All', 'mh'); ?></option>
				<?php
				$categories = get_categories(array('type' => 'post'));
				foreach($categories as $cat) {
					echo '<option value="' . $cat->cat_ID . '"';
					if ($cat->cat_ID == $instance['category']) { echo ' selected="selected"'; }
					echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
					echo '</option>';
				}
				?>
			</select>
		</p>   
	    <p>
        	<label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Filter Posts by Tags (e.g. lifestyle):', 'mh'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['tags']); ?>" name="<?php echo $this->get_field_name('tags'); ?>" id="<?php echo $this->get_field_id('tags'); ?>" />
	    </p>  
	    <p>
        	<label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Skip:', 'mh'); ?></label>
			<input type="text" size="2" value="<?php echo esc_attr($instance['offset']); ?>" name="<?php echo $this->get_field_name('offset'); ?>" id="<?php echo $this->get_field_id('offset'); ?>" /> <?php _e('Posts', 'mh'); ?>
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order Posts by:', 'mh'); ?></label>
			<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="text">
				<option value="date" <?php if ($instance['order'] == "date") { echo "selected='selected'"; } ?>><?php _e('Date', 'mh') ?></option>
				<option value="rand" <?php if ($instance['order'] == "rand") { echo "selected='selected'"; } ?>><?php _e('Random', 'mh') ?></option>
				<option value="comment_count" <?php if ($instance['order'] == "comment_count") { echo "selected='selected'"; } ?>><?php _e('Popularity', 'mh') ?></option>
			</select>
        </p>
        <p>
	    	<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Image size:', 'mh'); ?></label>
			<select id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text">
				<option value="normal_sl" <?php if ($instance['width'] == "normal_sl") { echo "selected='selected'"; } ?>>580x326px</option>
				<option value="large_sl" <?php if ($instance['width'] == "large_sl") { echo "selected='selected'"; } ?>>940x400px</option>
			</select>
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Show excerpt with', 'mh'); ?></label>
			<input type="text" size="2" value="<?php echo esc_attr($instance['excerpt_length']); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" id="<?php echo $this->get_field_id('excerpt_length'); ?>" /> <?php _e('characters', 'mh'); ?>
	    </p>
        <p>
      		<input id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" type="checkbox" value="1" <?php checked('1', $instance['excerpt']); ?>/>
	  		<label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e('Disable excerpt', 'mh'); ?></label>
    	</p>
        <p>
      		<input id="<?php echo $this->get_field_id('meta'); ?>" name="<?php echo $this->get_field_name('meta'); ?>" type="checkbox" value="1" <?php checked('1', $instance['meta']); ?>/>
	  		<label for="<?php echo $this->get_field_id('meta'); ?>"><?php _e('Disable post meta', 'mh'); ?></label>
    	</p><?php    
    }
}

?>