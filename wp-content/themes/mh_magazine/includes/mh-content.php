<?php

add_action('mh_after_header', 'mh_newsticker');
add_action('mh_post_header', 'mh_subheading');
add_action('mh_post_header', 'mh_post_meta');
add_action('mh_post_content', 'mh_teaser');
add_action('mh_post_content', 'mh_featured_image');
add_action('mh_post_content', 'mh_share_buttons');
add_action('mh_post_content', 'mh_the_content');
add_action('mh_after_post_content', 'mh_share_buttons');
add_action('mh_after_post_content', 'mh_author_box');
add_action('mh_after_post_content', 'mh_postnav');
add_action('mh_after_post_content', 'mh_related');
add_action('mh_loop_content', 'mh_loop');

/***** News Ticker *****/

if (!function_exists('mh_newsticker')) {
	function mh_newsticker() {
	global $options;
	if (isset($options['show_ticker']) ? $options['show_ticker'] : false) : ?>
	<section class="news-ticker clearfix">
		<div class="ticker-title"><?php if ($options['ticker_title']) : echo esc_attr($options['ticker_title']); else : _e('News Ticker', 'mh'); endif; ?></div>
		<div class="ticker-content">
			<ul id="ticker">
			<?php
			$ticker_posts = empty($options['ticker_posts']) ? '5' : $options['ticker_posts'];
			$ticker_cats = empty($options['ticker_cats']) ? '' : $options['ticker_cats'];
			$ticker_tags = empty($options['ticker_tags']) ? '' : $options['ticker_tags'];
			$ticker_offset = empty($options['ticker_offset']) ? '' : $options['ticker_offset'];
			$args = array('posts_per_page' => $ticker_posts, 'cat' => $ticker_cats, 'tag' => $ticker_tags, 'offset' => $ticker_offset);
			$ticker_loop = new WP_Query($args);
			while ($ticker_loop->have_posts()) : $ticker_loop->the_post(); ?>
    			<li><a href="<?php the_permalink(); ?>"><?php echo '<span class="meta">' . $date = get_the_date(); $date . _e(' in ', 'mh'); $category = get_the_category(); echo $category[0]->cat_name . ' // </span>' ?><?php the_title() ?></a></li>
			<?php endwhile;
			wp_reset_postdata(); ?>
			</ul>
		</div>
	</section>
	<?php endif;
	}
}

/***** Subheading on Posts *****/

if (!function_exists('mh_subheading')) {
	function mh_subheading() {
		global $post;
		if (get_post_meta($post->ID, "mh-subheading", true)) {
			echo '<h2 class="subheading">' . esc_attr(get_post_meta($post->ID, "mh-subheading", true)) . '</h2>' . "\n";
		}
	}
}

/***** Post Meta *****/

if (!function_exists('mh_post_meta')) {
	function mh_post_meta() {
		global $options;
		if (isset($options['post_meta']) ? !$options['post_meta'] : true) {		
			echo '<p class="meta post-meta">' . __('Posted on ', 'mh') . '<span class="updated">' . get_the_date() . '</span>' . __(' by ', 'mh');
			echo '<span class="vcard author"><span class="fn">';
			the_author_posts_link();
			echo '</span></span>' . __(' in ', 'mh');
			the_category(', ');
			echo ' // ';
			comments_number(__('0 Comments', 'mh'), __('1 Comment', 'mh'), __('% Comments', 'mh'));
			echo '</p>' . "\n";
		}	
	}
}

/***** Teasertext on Posts *****/

if (!function_exists('mh_teaser')) {
	function mh_teaser() {
		global $post, $more, $options;
		if (isset($options['teaser_text']) ? !$options['teaser_text'] && !is_attachment() : !is_attachment()) {
			if (has_excerpt()) {
				esc_attr(the_excerpt());
			} elseif (strstr($post->post_content, '<!--more-->')) {
				$more = 0;
				$excerpt = get_the_content('');
				$more = 1;
				echo '<p>' . do_shortcode($excerpt) . '</p>';	
			}
		}
	}
}

/***** Featured Image on Posts *****/

if (!function_exists('mh_featured_image')) {
	function mh_featured_image() {
		global $post, $options;		
		if (isset($options['featured_image']) ? !$options['featured_image'] && has_post_thumbnail() && !is_attachment() : has_post_thumbnail() && !is_attachment()) {
			if (isset($options['site_width']) && $options['site_width'] == 'large' && isset($options['2nd_sidebar']) && !$options['2nd_sidebar'] || isset($options['site_width']) && $options['site_width'] == 'large' && !isset($options['2nd_sidebar'])) {
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider');
			} else {
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'content');	
			}	
			$full = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			$caption_text = get_post(get_post_thumbnail_id())->post_excerpt;
			if (isset($options['no_prettyphoto']) ? !$options['no_prettyphoto'] : true) {
				$attachment_url = '<a href="' . $full[0] . '" rel="prettyPhoto">';
			} else {
				$attachment_page = get_attachment_link(get_post_thumbnail_id());	
				$attachment_url = '<a href="' . $attachment_page . '">';
			}
			echo "\n" . '<div class="post-thumbnail">' . "\n";				
				echo $attachment_url . '<img src="' . $thumbnail[0] . '" alt="' . get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) . '" title="' . get_post(get_post_thumbnail_id())->post_title . '" /></a>' . "\n";		
				if ($caption_text) {
					echo '<span class="wp-caption-text">' . $caption_text . '</span>' . "\n";				
				}
			echo '</div>' . "\n";
		}
	}
}

/***** Content on Posts *****/

if (!function_exists('mh_the_content')) {
	function mh_the_content() {
		global $post, $more, $options;
		$ad = 1;
		if (isset($options['teaser_text']) ? !$options['teaser_text'] : true) {		
			if (strstr($post->post_content, '<!--more-->') && !has_excerpt()) {
				$more = 1;
				$ad = 2;
				$content = get_the_content('', true);	
			} else {
				$content = get_the_content(); 
			}
		} else {
			$content = get_the_content(); 	
		}		
		$content = apply_filters('the_content', $content);
		$paragraphs = explode("<p", $content);
		$counter = 0;
		foreach($paragraphs as $content) {	
			if ($counter == 0) {
				echo $content;
			}
			if ($counter > 0) {
				echo '<p' . $content;
			}
			if ($counter == $ad) {		   
           		if (!get_post_meta($post->ID, 'mh-no-ad', true)) {		
			   		if (get_post_meta($post->ID, 'mh-alt-ad', true)) {
				   		echo '<div class="content-ad">' . do_shortcode(get_post_meta($post->ID, 'mh-alt-ad', true)) . '</div>' . "\n";
				   	} else {
						$adcode = !empty($options['content_ad']) ? '<div class="content-ad">' . do_shortcode($options['content_ad']) . '</div>' . "\n" : '';
						echo $adcode;
					}
				}
			}								  	
		$counter++;
		}	
	}
}

/***** Share Buttons on Posts *****/

if (!function_exists('mh_share_buttons')) {
	function mh_share_buttons() { 
		global $options;
		if (isset($options['share_buttons']) && $options['share_buttons']) { ?>
			<section class="share-buttons-container clearfix">
	    		<div class="share-button"><div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-font="verdana"></div></div>
				<div class="share-button"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></div>
				<div class="share-button"><div class="g-plusone" data-size="medium"></div></div>           	
			</section>
		<?php 
		}
	}	
}

/***** Author box *****/

if (!function_exists('mh_author_box')) {
	function mh_author_box() {
		global $options;
		if (isset($options['author_box']) ? !$options['author_box'] && get_the_author_meta('description') : get_the_author_meta('description')) {
			$author = get_the_author();
			$website = get_the_author_meta('user_url');
			$facebook = get_the_author_meta('facebook');
			$twitter = get_the_author_meta('twitter');
			$googleplus = get_the_author_meta('googleplus');
			$youtube = get_the_author_meta('youtube');
			echo '<section class="author-box clearfix">' . "\n";
			echo '<div class="author-box-avatar">' . get_avatar(get_the_author_meta('ID'), 115) . '</div>' . "\n";
			echo '<div class="author-box-desc">' . "\n";
			echo '<h5 class="author-box-name">' . __('About ', 'mh') . esc_attr($author) . '</h5>' . "\n";
			echo '<p>';
			echo the_author_meta('user_description') . ' ';
			if (isset($options['author_contact']) ? !$options['author_contact'] : true) {
				if ($website || $facebook || $twitter || $googleplus || $youtube) {
					echo __('Contact: ', 'mh');
					if ($website) {
						echo '<a href="' . esc_url($website) . '" title="' . __('Visit the website of ', 'mh') . esc_attr($author) . '" target="_blank">' . __('Website', 'mh') . '</a> | ';
					}
					if ($facebook) {
						echo '<a href="' . esc_url($facebook) . '" title="' . __('Follow ', 'mh') . esc_attr($author) . __(' on Facebook', 'mh') . '" target="_blank">' . __('Facebook', 'mh') . '</a> | ';
					}
					if ($twitter) {
						echo '<a href="' . esc_url($twitter) . '" title="' . __('Follow ', 'mh') . esc_attr($author) . __(' on Twitter', 'mh') . '" target="_blank">' . __('Twitter', 'mh') . '</a> | ';
					}
					if ($googleplus) {
						echo '<a href="' . esc_url($googleplus) . '" title="' . __('Follow ', 'mh') . esc_attr($author) . __(' on Google+', 'mh') . '" target="_blank">' . __('Google+', 'mh') . '</a> | ';
					}
					if ($youtube) {
						echo '<a href="' . esc_url($youtube) . '" title="' . __('Follow ', 'mh') . esc_attr($author) . __(' on YouTube', 'mh') . '" target="_blank">' . __('YouTube', 'mh') . '</a> | ';
					}
				}
			}
			echo '<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '" title="' . __('More articles written by ', 'mh') . esc_attr($author) . '">' . __('More Posts', 'mh') . '</a>';	
			echo '</p>' . "\n";
			echo '</div>' . "\n";
			echo '</section>' . "\n";		
		}	
	}
}

/***** Post / Image Navigation *****/

if (!function_exists('mh_postnav')) {
	function mh_postnav() {
		global $post, $options;		
		if (isset($options['post_nav']) && $options['post_nav']) {	
			$parent_post = get_post($post->post_parent);
			$attachment = is_attachment();
			$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);
	
			if (!$next && !$previous)
			return;	
		
			if ($attachment) {
				$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));	
				$count = count($attachments);
			}
			if ($attachment && $count == 1) {
				$permalink = get_permalink($parent_post);
				echo '<nav class="section-title clearfix" role="navigation">' . "\n";
				echo '<div class="post-nav left">' . "\n";
				echo '<a href="' . $permalink . '">' . __('&larr; Back to article', 'mh') . '</a>';	
				echo '</div>' . "\n";
				echo '</nav>' . "\n";
			} elseif (!$attachment || $attachment && $count > 1) {			
				echo '<nav class="section-title clearfix" role="navigation">' . "\n";
				echo '<div class="post-nav left">' . "\n";
				if ($attachment) {					
					previous_image_link('%link', __('&larr; Previous image', 'mh'));	
				} else {
					previous_post_link('%link', __('&larr; Previous article', 'mh'));	
				}
				echo '</div>' . "\n";
				echo '<div class="post-nav right">' . "\n";
				if ($attachment) {
					next_image_link('%link', __('Next image &rarr;', 'mh'));
				} else {
					next_post_link('%link', __('Next article &rarr;', 'mh'));
				}
				echo '</div>' . "\n";
				echo '</nav>' . "\n";		
			}	
		}		
	}
}

/***** Related Posts *****/

if (!function_exists('mh_related')) {
	function mh_related() {	
		global $post, $options;
		if (isset($options['related_posts']) ? $options['related_posts'] : false) {
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$layout = isset($options['related_layout']) ? $options['related_layout'] : 'layout1'; 
				$tag_ids = array();  
				foreach($tags as $tag) $tag_ids[] = $tag->term_id;  
				$args = array('tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'posts_per_page' => 5, 'ignore_sticky_posts' => 1, 'orderby' => 'rand');
				$related = new wp_query($args);   
				if ($related->have_posts()) {
					echo '<section class="related-posts related-' . $layout . '">' . "\n";
					echo '<h3 class="section-title">' . __('Related Articles', 'mh') . '</h3>' . "\n";		
					echo '<ul>' . "\n";
					while ($related->have_posts()) : $related->the_post(); 
						$permalink = get_permalink($post->ID); 
						echo '<li class="related-wrap clearfix">' . "\n";	 
						echo '<div class="related-thumb">' . "\n";  
						echo '<a href="' . $permalink . '" title="' . get_the_title() . '">';
						if (has_post_thumbnail()) {
							the_post_thumbnail('cp_small');	
						} else {
							echo '<img src="' . get_template_directory_uri() . '/images/noimage-cp_small.png' . '" alt="No Picture" />';
						}
						echo '</a>' . "\n";  
						echo '</div>' . "\n";
						echo '<div class="related-data">' . "\n";
						echo '<a href="' . $permalink . '"><h4 class="related-title">' . get_the_title() . '</h4></a>' . "\n";
						echo '<span class="related-subheading">' . esc_attr(get_post_meta($post->ID, "mh-subheading", true)) . '</span>' . "\n";	
						echo '</div>' . "\n";
						echo '</li>' . "\n";	
					endwhile;
					echo '</ul>' . "\n";
					echo '</section>' . "\n"; 
					wp_reset_postdata();
				}
			}
		}
	}
}

/***** Loop Output *****/

if (!function_exists('mh_loop')) {
	function mh_loop() {
		global $options;
		$counter = 0;
		$layout = isset($options['loop_layout']) ? $options['loop_layout'] : 'layout1';
		$adcode = empty($options['loop_ad']) ? '' : '<div class="loop-ad loop-ad-' . $layout . '">' . do_shortcode($options['loop_ad']) . '</div>' . "\n";
		$adcount = empty($options['loop_ad_no']) ? '3' : $options['loop_ad_no'];
		if (have_posts()) {
			while (have_posts()) : the_post();
				get_template_part('/templates/loop-' . $layout, get_post_format());
				if ($counter % $adcount == 0) {
					echo $adcode;
				}
				$counter++;
			endwhile;
			mh_pagination();
		} else { 
			get_template_part('content', 'none');
		}
	}
}

/***** Loop Output Meta Data *****/

if (!function_exists('mh_loop_meta')) {
	function mh_loop_meta() {
		global $options;
		if (isset($options['post_meta']) ? !$options['post_meta'] : true) {
			echo '<p class="meta">' . get_the_date() . ' // ';
			comments_number(__('0 Comments', 'mh'), __('1 Comment', 'mh'), __('% Comments', 'mh'));
			echo '</p>' . "\n";		
		}
	}
}

?>