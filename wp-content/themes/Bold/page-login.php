<?php 
/*
Template Name: Login Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

<?php get_header(); ?>

<div id="content" <?php if($fullwidth) echo (' class="no_sidebar"');?>>
<img src="<?php bloginfo('template_directory'); ?>/images/content-top<?php if($fullwidth) echo ('-full');?>.gif" alt="top" style="float: left;" />
<div id="left-div">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-post-wrap"> 
        
            <div style="clear: both;"></div>
                        <h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__('Permanent Link to %s','Bold'), get_the_title()) ?>">
                <?php the_title() ?>
                </a></h2>

            
        <div style="clear: both;"></div>
        
		<?php if (get_option('bold_page_thumbnails') == 'on') { ?>
       
			<?php $width = (int) get_option('bold_thumbnail_width_pages');
					  $height = (int) get_option('bold_thumbnail_height_pages');
					  $classtext = '';
					  $titletext = get_the_title();
				
				$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
				$thumb = $thumbnail["thumb"];  ?>
				
			<?php if($thumb <> '') { ?>
				<div class="thumbnail-div">
					<a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__('Permanent Link to %s','Bold'), get_the_title()) ?>">
						<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
					</a>
				</div>
			<?php } ?>

        <?php }; ?>

        <?php the_content(); ?>
					<div id="et-login">
						<div class='et-protected'>
							<div class='et-protected-form'>
								<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
									<p><label><?php esc_html_e('Username','Bold'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
									<p><label><?php esc_html_e('Password','Bold'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
									<input type='submit' name='submit' value='Login' class='etlogin-button' />
								</form> 
							</div> <!-- .et-protected-form -->
							<p class='et-registration'><?php esc_html_e('Not a member?','Bold'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','Bold'); ?></a></p>
						</div> <!-- .et-protected -->
					</div> <!-- end #et-login -->
		
		
        <div style="clear: both;"></div>
        <?php if (get_option('bold_show_pagescomments') == 'on') comments_template('', true); ?>

        <?php if (get_option('bold_foursixeight') == 'Enable') { ?>
        <?php get_template_part('includes/468x60'); ?>
        <?php } else { echo ''; } ?>
        
	</div>
<?php endwhile; endif; ?>
</div>
<?php if (!$fullwidth) get_sidebar(); ?>
<?php get_footer(); ?>

</body>
</html>