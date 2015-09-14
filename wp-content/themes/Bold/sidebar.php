<div id="sidebar">
<?php if (get_option('bold_display_connect') == 'on') { ?>
<?php if ( (get_option('bold_featured') == 'on') && (is_home()) ) { ?>
<div id="connect">
<?php } else { ?>
<div id="connect2">
<?php }; ?>
<?php if (get_option('bold_icon_rss_display') == 'on') { ?>
<a href="<?php echo esc_attr(get_option('bold_icon_rss'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-rss.png" alt="search" class="icon" /></a>
<?php }; ?>

<?php if (get_option('bold_icon_twitter_display') == 'on') { ?>
<a href="<?php echo esc_attr(get_option('bold_icon_twitter'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-twitter.png" alt="search" class="icon" /></a>
<?php }; ?>

<?php if (get_option('bold_icon_facebook_display') == 'on') { ?>
<a href="<?php echo esc_attr(get_option('bold_icon_facebook'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-facebook.png" alt="search" class="icon" /></a>
<?php }; ?>

<?php if (get_option('bold_icon_myspace_display') == 'on') { ?>
<a href="<?php echo esc_attr(get_option('bold_icon_myspace'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-myspace.png" alt="search" class="icon" /></a>
<?php }; ?>

<img src="<?php bloginfo('template_directory'); ?>/images/connect.png" alt="search" class="icon" />
</div>
<?php }; ?>
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
  
<?php endif; ?>
    
   
</div>