<?php 

add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "Bold";
		$shortname = "bold";
	
		require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

		load_theme_textdomain('Bold',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_bold.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_bold.php');
		
		include(TEMPLATEPATH . '/includes/widgets.php');
	}
}

add_action('wp_head','et_portfoliopt_additional_styles',100);
function et_portfoliopt_additional_styles(){ ?>
	<style type="text/css">
		#et_pt_portfolio_gallery { margin-left: -34px; }
		.et_pt_portfolio_item { margin-left: 30px; }
		.et_portfolio_small { margin-left: -38px !important; }
		.et_portfolio_small .et_pt_portfolio_item { margin-left: 30px !important; }
		.et_portfolio_large { margin-left: -20px !important; }
		.et_portfolio_large .et_pt_portfolio_item { margin-left: 4px !important; }
	</style>
<?php }

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php }
} ?>