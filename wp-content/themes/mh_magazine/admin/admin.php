<?php

/***** Custom Dashboard Widget *****/ 

function mh_info_widget() {
	echo '<div class="admin-theme-thumb"><img src="' . get_template_directory_uri() . '/images/MH_Magazine_Thumb.png" /></div><p>Thank you very much for purchasing <strong>MH Themes - Premium WordPress Themes</strong>! If you need help with the theme setup, please have a look at the <a href="http://www.mhthemes.com/faq/" target="_blank">Frequently Asked Questions</a>. If you do not find an answer to your question in the FAQs, please login to your account and <a href="http://www.mhthemes.com/members/helpdesk" target="_blank">open a support ticket</a> at the helpdesk. We usually answer within 24 hours!</p>';
}

function mh_dashboard_widgets() {
	global $wp_meta_boxes;
	add_meta_box('mh_info_widget', 'Theme Support', 'mh_info_widget', 'dashboard', 'normal', 'high');
}
add_action('wp_dashboard_setup', 'mh_dashboard_widgets');

/***** Custom Meta Boxes *****/

add_action('add_meta_boxes', 'mh_add_meta_boxes');
add_action('save_post', 'mh_save_meta_boxes', 10, 2 );

if (!function_exists('mh_add_meta_boxes')) {
	function mh_add_meta_boxes() {
		global $options;
		add_meta_box('mh_post_details', __('Post options', 'mh'), 'mh_post_meta', 'post', 'normal', 'high');
		if (isset($options['activate_seo']) && $options['activate_seo'] == 1) {
			$screens = array('post', 'page');
			foreach ($screens as $screen) {
				add_meta_box('mh_seo_options', __('SEO options', 'mh'), 'mh_seo_meta', $screen, 'normal', 'high');
			}
		}
	}
}

if (!function_exists('mh_post_meta')) {
	function mh_post_meta() {
		global $post;
		wp_nonce_field('mh_meta_box_nonce', 'meta_box_nonce'); 
		echo '<p>';
		echo '<label for="mh-subheading">' . __("Subheading (will be displayed below post title)", 'mh') . '</label>';
		echo '<br />';
		echo '<input class="widefat" type="text" name="mh-subheading" id="mh-subheading" placeholder="Enter subheading" value="' . esc_attr(get_post_meta($post->ID, 'mh-subheading', true)) . '" size="30" />';
		echo '</p>';
		echo '<p>';
		echo '<label for="mh-alt-ad">' . __("Alternative ad code (this will overwrite the global content ad code)", 'mh') . '</label>';
		echo '<br />';
		echo '<textarea name="mh-alt-ad" id="mh-alt-ad" cols="60" rows="3" placeholder="Enter alternative ad code for this post">' . get_post_meta($post->ID, 'mh-alt-ad', true) . '</textarea>'; 
		echo '<br />';	
		echo '</p>';
		echo '<p>';
		echo '<input type="checkbox" id="mh-no-ad" name="mh-no-ad"'; echo checked(get_post_meta($post->ID, 'mh-no-ad', true), 'on'); echo '/>';
		echo '<label for="mh-no-ad">' . __(' Disable content ad for this post', 'mh') . '</label>';
		echo '</p>';
	}
}

if (!function_exists('mh_seo_meta')) {
	function mh_seo_meta() {
		global $post;
		wp_nonce_field('mh_meta_box_nonce', 'meta_box_nonce'); 
		echo '<p>';
		echo '<label for="mh-seo-title">' . __("SEO title (optimize title tag for search engines - max. 70 characters)", 'mh') . '</label>';
		echo '<br />';
		echo '<input class="widefat" type="text" name="mh-seo-title" id="mh-seo-title" placeholder="Enter seo optimized title" value="' . esc_attr(get_post_meta($post->ID, 'mh-seo-title', true)) . '" size="30" />';
		echo '<br />';	
		echo '<span class="char-count">' . __('You have ', 'mh') . '<span id="counter-1"></span>'; echo __(' characters left', 'mh') . '</span>';
		echo '</p>';
		echo '<p>';
		echo '<label for="mh-meta-desc">' . __("Meta description (max. 160 characters recommended)", 'mh') . '</label>';
		echo '<br />';
		echo '<textarea name="mh-meta-desc" id="mh-meta-desc" cols="60" rows="3" placeholder="Enter text">' . esc_attr(get_post_meta($post->ID, 'mh-meta-desc', true)) . '</textarea>'; 
		echo '<br />';	
		echo '<span class="char-count">' . __('You have ', 'mh') . '<span id="counter-2"></span>'; echo __(' characters left', 'mh') . '</span>';
		echo '</p>';
		echo '<p>';
		echo '<label for="mh-meta-keywords">' . __("Meta keywords (only use this to set keywords manually or to overwrite the post tags)", 'mh') . '</label>';
		echo '<br />';
		echo '<input class="widefat" type="text" name="mh-meta-keywords" id="mh-meta-keywords" placeholder="Enter keywords, separated by commas" value="' . esc_attr(get_post_meta($post->ID, 'mh-meta-keywords', true)) . '" size="30" />';
		echo '</p>';
		echo '<p>';
		echo '<label for="mh-robots">' . __("Modify robots meta tags for this post/page (e.g. noindex, nofollow or noodp)", 'mh') . '</label>';
		echo '<br />';
		echo '<input class="widefat" type="text" name="mh-robots" id="mh-robots" placeholder="Enter robots meta tags, separated by commas" value="' . esc_attr(get_post_meta($post->ID, 'mh-robots', true)) . '" size="30" />';
		echo '</p>';
	}
}

if (!function_exists('mh_save_meta_boxes')) {
	function mh_save_meta_boxes($post_id, $post) {
		if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'mh_meta_box_nonce')) {
			return $post->ID;
		}
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        	return $post->ID;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post->ID;
			}
		} 
		elseif (!current_user_can('edit_post', $post_id)) {
			return $post->ID;
		}
		if ('post' == $_POST['post_type']) {
			$meta_data['mh-subheading'] = esc_attr($_POST['mh-subheading']);
			$meta_data['mh-alt-ad'] = $_POST['mh-alt-ad'];	
			$meta_data['mh-no-ad'] = isset($_POST['mh-no-ad']) ? esc_attr($_POST['mh-no-ad']) : '';		
		}
		$meta_data['mh-seo-title'] = isset($_POST['mh-seo-title']) ? esc_attr($_POST['mh-seo-title']) : '';
		$meta_data['mh-meta-desc'] = isset($_POST['mh-meta-desc']) ? esc_attr($_POST['mh-meta-desc']) : '';
		$meta_data['mh-meta-keywords'] = isset($_POST['mh-meta-keywords']) ? esc_attr($_POST['mh-meta-keywords']) : '';
		$meta_data['mh-robots'] = isset($_POST['mh-robots']) ? esc_attr($_POST['mh-robots']) : '';	
		foreach ($meta_data as $key => $value) {
			if ($post->post_type == 'revision') return;
			$value = implode(',', (array)$value);
			if (get_post_meta($post->ID, $key, FALSE)) {
				update_post_meta($post->ID, $key, $value);
			} else {
				add_post_meta($post->ID, $key, $value);
			}
			if (!$value) delete_post_meta($post->ID, $key);
		}
	}
}

/***** Additional fields user profile *****/

if (!function_exists('mh_user_profile')) {
    function mh_user_profile($mh_usercontact) {
        $array_mh_usercontact = array('facebook' => 'Facebook', 'twitter' => 'Twitter', 'googleplus' => 'Google+', 'youtube' => 'YouTube');
        $array_mh_usercontact = array_merge($mh_usercontact, $array_mh_usercontact);
        return $array_mh_usercontact;
    }
    add_filter('user_contactmethods', 'mh_user_profile');
}

?>