=== MH Magazine - Responsive WordPress Theme ===
Theme URI: http://www.mhthemes.com/themes/mh/magazine/
Tags: Blog, News, Magazine, Responsive
Requires at least: 3.4
Tested up to: 3.7
Stable tag: 1.8.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

MH Magazine is a clean, modern and fully responsive premium magazine WordPress theme for bloggers and news or editorial related websites. The theme includes custom widgets, shortcodes and advanced theme options including colorpickers with unlimited colors to create your own color scheme.

== Frequently Asked Questions ==

If you have any questions regarding the theme setup or if you need support, please login to your account at http://www.mhthemes.com/members/login/ and check the FAQs for answers. If you don't find an answer to your issue there, please open a support ticket at our helpdesk.

== Changelog ==

= v1.8.6 10-11-2013 =
* Fixed issue where disabling the prettyPhoto lightbox produced an error
* Fixed issue where author name was not displayed properly on author archives
* Fixed issues with news ticker markup
* Changed title of spotlight widget from H1 to H2
* Changed default excerpt length to 175 characters
* Replaced cp_large thumbnail for Facebook Open Graph with spotlight thumbnail
* Added option to change layout of archives / loop
* Added option to change layout of widget titles
* Added option to change layout of page titles
* Added option to change layout of related articles
* Added Tumblr and deviantART icons to social widget
* Added affiliate widget so users can earn money by promoting MH Themes
* Updated jQuery to v1.10.2
* Added italian translation
* Updated translation strings

= v1.8.5 28-10-2013 =
* Several code improvements
* Improved readability of typography
* Reorganized file structure to improve performance
* Added "Theme Support" dashboard widget to WordPress admin
* Removed option to change layout - layouts will be available as separate themes
* Fixed issue where shortcodes for content ad on posts did not work
* Removed option to change position of share buttons
* News in Pictures widget now only displays posts which have a featured image
* Improved [box] shortcode / new attributes "toggle" and "height"
* Highlighted MH widgets with a darker color in WordPress admin 
* Added multi-purpose [slider] shortcode to insert e.g. custom image sliders
* Added [testimonial] shortcode to display styled testimonials
* Added some useful theme action hooks
* Added breadcrumb rich snippet support
* Added swedish translation - thanks to Joel Sannemalm
* Added hebrew translation - thanks to Yosi Avneri

= v1.8.1 25-09-2013 =
* Several CSS adjustments
* Improved options panel of several widgets for better usability
* Improved responsive layout for "MH Custom Posts" widget
* Added option to several widgets to ignore sticky posts
* Added option to several widgets to select a category
* Added option to several widgets to set custom excerpt length
* Added option to "MH Spotlight" widget to change image size
* Added option to "MH Spotlight" widget to disable excerpt
* Added option to "MH Spotlight" widget to disable post meta
* Title of "MH Custom Posts" widget will now link to category archive
* Improved handling of automatic excerpts
* Changed option for excerpt lengths from words to characters
* Removed option to use more-tag for excerpts
* Added option to enter custom more text for excerpts
* Moved CSS for RTL support to separate stylesheet rtl.css
* Changed image size of small thumbnails back to 70x53px
* Custom CSS won't be included anymore if font size is set to default
* Updated french translation - thanks to Olivier Copetto
* Updated translation strings

= v1.8.0 16-09-2013 =
* Several code improvements
* Several CSS adjustments
* Improved typography
* Changed default font from Droid Sans & Droid Serif to Open Sans
* Converted font-sizes from % to rem
* Removed Customizer link in appearance menu because it's now default in WP 3.6
* Renamed responsive [video] shortcode to [flexvid] due to conflicts in WP 3.6
* Added new file loop.php to handle content output of loop / archives
* Added new options section for typography settings
* Added option to choose from a selection of Google Webfonts for headings and body text
* Added option to change default font size on posts and pages
* Added new options section for advertising settings
* Added option to display ads after every x posts on archives
* Added new options section for layout settings
* Added option to select a different layout / CSS styling
* Added option to increase site width to 1300px
* Added option to enable a second sidebar (will force site width to 1300px)
* Featured image on posts will be replaced by slider image size if site width is 1300px
* Slightly changed responsive layout to support new large site width
* Slightly changed layout of "Homepage" template and added "Home 11" widget area
* Removed "Homepage 2" template because same can now be done with "Homepage" template
* Added "Home 12" widget area to "Homepage" template if site width is 1300px
* Added "Contact 2" widget area for contact template when second sidebar is enabled
* Position of sidebar on default page template can now be changed
* Removed "Page - Left Sidebar" template because it does not make sense anymore
* Breadcrumb navigation does now support custom post types
* Added "entry-title", "author" and "updated" structured data for Google Rich Snippets
* Added option to "MH Slider Widget" to change slider image size
* Removed option of "MH Custom Posts" widget to enable mobile excerpts - it's useless now
* Increased image size of small images on "MH Custom Posts" widget to 100x75px
* Increased image size of "MH News in Pictures" widget to 100x75px
* Removed date in post meta of "MH Custom Posts" widget (small size)
* Main content now always will be displayed first before sidebars on mobile devices
* Updated translation strings

= v1.7.6 23-07-2013 =
* Slightly changed markup of slider to solve issue if caption contains links
* Fixed issue where widget areas on posts/pages did not work since v1.7.5
* Added fallback in case that no main navigation/menu is set
* Improved breadcrumbs by adding parent categories on category archives
* Fixed content ad now will be displayed properly if paragraphs are HTML formatted
* Reduced the number of HTTP requests to improve performance
* Updated translation strings

= v1.7.5 12-07-2013 =
* Several small CSS adjustments
* Several code improvements
* Changed image ratio of spotlight and carousel widget to 16:9
* Main color of fonts is now darker
* Increased size of dropcap a bit
* Added responsive header and footer navigation menu
* Added option to custom posts widget to enable responsive excerpts
* Disabling post meta now affects archives too
* Fixed some small CSS issues with the RTL layout
* Improved handling of long titles in navigation
* Added fallback in case that no header image is set
* Added [video] shortcode to embed responsive videos
* Added jQuery migrate plugin to restore deprecated and removed functionality
* Added function to take care of page title output
* Added filter to output wp_title()
* Added missing <li> tags to social widget
* Added navigation with previous/next links to single post and attachment view
* Added option to enable navigation links on posts / attachments
* Combined breadcrumb options to one single option (enable/disable)
* Improved breadcrumb output
* Select elements with long texts will no longer be cut off
* Removed markup of footer when no footer widgets are active
* Updated translation strings

= v1.7.1 20-06-2013 =
* Switched back to 4:3 image ratio for large images of custom posts widget
* Changed default excerpt length to 60 words
* Improved media queries for custom posts widget
* Code improvements
* Updated translation strings

= v1.7.0 18-06-2013 =
* Code improvements
* Improvements in layout, design and font-size
* Changed order of related posts from date to random
* Changed file structure to prepare for implementation of post formats
* Changed layout of custom posts widget
* Extended options of custom posts widget to display excerpts for every post
* Extended options of slider and spotlight widget to display random or popular posts 
* Added option to disable post meta
* Added option to disable post meta of custom posts widget
* Updated Facebook Likebox code to new version
* Added options to disable faces, stream, header and border of Facebook Likebox widget
* Added option to upload a favicon
* Added option to enable comments on pages (disabled by default)
* Added feature to display teaser text at the beginning of posts
* Added option to disable teaser text on posts
* Added option to use more-tag instead of automatic excerpts
* Added option to social widget to open links in new window / tab
* Added option to social widget to set links to nofollow
* Replaced icons of social widget - thanks to G. Pritiranjan Das
* Added YouTube, Flickr, Vimeo, SoundCloud, Pinterest, Instagram, Myspace to social widget
* Removed Xing from social widget
* Reduced amount of image ratios to two (4:3 and 1:2.35)
* Fixed rel="prettyPhoto" now will be added automatically
* Added option to disable prettyPhoto lightbox
* Comments and pingbacks / trackbacks are now displayed separate
* Added caption text to featured images on posts
* Improved output of alt and title of featured images on posts
* Improved output of image captions
* Improved support for post attachments
* Fixed links of carousel widget now work on mobile devices
* index.php is now more generic and has replaced several archive templates

= v1.6.0 17-05-2013 =
* Some minor code improvements
* Some minor CSS adjustments
* Added SEO option to set several archives to noindex to prevent duplicate content
* Added SEO option to set attachments to noindex
* Added option to verify site for Google Webmaster Tools
* Added comments support on static pages
* Replaced theme logo and theme screenshot in wp dashboard
* Fixed og:type now gets correct data on archives
* Fixed og:title now gets correct data on archives
* Fixed authorbox now gets properly displayed on author archives
* Moved child theme files to parent folder to prevent upload issues using wp uploader
* Updated spanish translation - thanks to Samuel Galiano Parras
* Updated translation strings
* Replaced changelog.txt with readme.txt

= v1.5.0 22-04-2013 =
* Removed unused tags for page title on index.php when no static front page is set
* Enabled threaded comments in functions.php instead of header.php
* Some minor CSS improvements
* Several code improvements
* Fixed CSS after Contact Form 7 plugin update
* Fixed CSS ordered lists
* Fixed message box animation
* Fixed automatic formatting of shortcodes
* Reorganized theme options
* Removed option to set social language because theme recognizes automatically now
* Added posts/pages options section
* Added SEO options section
* Added SEO option to set a custom meta description on posts/pages
* Added SEO option to use post tags as meta tags/keywords
* Added SEO option to set meta keywords manually for each post/page
* Added SEO option to set a seo optimized title tag on posts/pages
* Added SEO option to set Google Publisher Page
* Added SEO option to clean up head section from "junk"
* Added Google Authorship support
* Added Facebook Open Graph support
* Added option to display content ads on posts
* Added option to disable featured image on posts
* Added option to disable images on custom posts widget
* Added option to recent comments widget to change size of avatars
* Added widget area/sidebar on contact page template
* Added new widget to display authors including the number of posts published
* Added new widget to display linked social media icons
* Added new fields to user profile (Facebook, Twitter, Google+, YouTube)
* Added contact information of authors to author box
* Added option to disable author box on posts/archives
* Added option to hide contact information in author box
* Added spanish translation - thanks to Samuel Galiano Parras
* Updated translation strings
* Added child theme files

= v1.3.0 27-03-2013 =
* Some minor improvements for better SEO
* Some minor CSS adjustments
* Added Droid Sans webfont to style headings
* Improved typography
* Added option to set position of share buttons
* Related posts are now displayed as list including title and subheading
* Removed jQuery PowerTip support because of problems on mobile devices
* Added option to scale background image to full size of browser window
* Fixed issue wpSEO plugin regarding remove_action('shutdown', 'wp_ob_end_flush_all', 1);
* Updated translation strings

= v1.2.0 17-03-2013 =
* Updated translation strings
* Added dynamic copyright date to footer
* Added option to set language for social buttons and likebox

= v1.1.1 20-02-2013 =
* Replaced blog template with homepage templates 

= v1.1.0 19-02-2013 =
* Minor code improvements
* Minor CSS fixes
* Added flex-height and flex-width to custom header support
* Deleted shortcodes for slider, spotlight and carousel because they will be replaced with custom widgets
* Replaced homepage templates with fully widgetized homepage templates
* Added 3 new widgets -> slider, spotlight and carousel to build your custom homepage template with little effort and without coding
* Updated translation strings
* Added slider to blog template

= v1.0.0 15-02-2013 =
* Initial release