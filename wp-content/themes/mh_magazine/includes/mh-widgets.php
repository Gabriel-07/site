<?php

add_action('widgets_init', 'register_mh_widgets');

/***** Register Widgets *****/	
   
function register_mh_widgets() {
	register_widget('mh_facebook_widget');
	register_widget('mh_custom_posts_widget');
	register_widget('mh_nip_widget');
	register_widget('mh_comments_widget');
	register_widget('mh_slider_hp_widget');
	register_widget('mh_spotlight_hp_widget');
	register_widget('mh_carousel_hp_widget');
	register_widget('mh_authors_widget');	
	register_widget('mh_social_widget');
	register_widget('mh_affiliate_widget');
} 

/***** Include Widgets *****/

require_once('widgets/mh-facebook-likebox.php');
require_once('widgets/mh-custom-posts.php');
require_once('widgets/mh-nip.php');
require_once('widgets/mh-comments.php');
require_once('widgets/mh-slider.php');
require_once('widgets/mh-spotlight.php');
require_once('widgets/mh-carousel.php');
require_once('widgets/mh-authors.php');
require_once('widgets/mh-social.php');
require_once('widgets/mh-affiliate.php');

?>