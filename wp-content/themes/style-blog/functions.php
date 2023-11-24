<?php

/**
 * Style Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Style_Blog
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function style_blog_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Style Blog, use a find and replace
		* to change 'style-blog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('style-blog', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'style-blog'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'style_blog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'style_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function style_blog_content_width()
{
	$GLOBALS['content_width'] = apply_filters('style_blog_content_width', 640);
}
add_action('after_setup_theme', 'style_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function style_blog_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'style-blog'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'style-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer - About Me', 'style-blog'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'style-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer - Latest Tweet', 'style-blog'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add widgets here.', 'style-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer - Newsletter', 'style-blog'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add widgets here.', 'style-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer - copyright', 'style-blog'),
			'id'            => 'footer-4',
			'description'   => esc_html__('Add widgets here.', 'style-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'style_blog_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function style_blog_scripts()
{
	//design styles
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), _S_VERSION);
	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Raleway:400,600,700');
	wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
	wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION);
	wp_enqueue_style('style-blog-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('style-blog-style', 'rtl', 'replace');


	//design scripts
	wp_enqueue_script('style-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'style_blog_scripts');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function custom_search_form($form)
{
	$form = '<div class="search_form"><form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
	  
	  <input type="text" value="' . get_search_query() . '" name="s" id="s" />
	  <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />

	</form></div>';

	return $form;
}
add_filter('get_search_form', 'custom_search_form');


//Created a custom meta box
function add_styleblog_custom_about_page_metabox()
{
	// Get the current page's ID
	$current_page_id = get_the_ID();

	// Check if the page has a specific template assigned
	$template = get_page_template_slug($current_page_id);

	if ($template === 'template/about.php') {

		// meta box for team member 1
		add_meta_box(
			'custom_about_page_member_1_metabox_id',     // Meta box ID
			'Team Member 1',  // Title
			'render_custom_about_page_member_1_metabox', // Callback function to render content
			'page',                   // Post type where the meta box should appear
			'normal',                 // Context (normal, advanced, side)
			'high',                    // Priority (high, default, low)

		);

		//meta box for team member 2
		add_meta_box(
			'custom_about_page_member_2_metabox_id',     // Meta box ID
			'Team Member 2',  // Title
			'render_custom_about_page_member_2_metabox', // Callback function to render content
			'page',                   // Post type where the meta box should appear
			'normal',                 // Context (normal, advanced, side)
			'high',                    // Priority (high, default, low)

		);
	}
}

add_action('add_meta_boxes', 'add_styleblog_custom_about_page_metabox');

//Render the Team member 1 meta box
function render_custom_about_page_member_1_metabox($post)
{
	// Retrieve the current field IDs, if it exists
	$image_id_1 = get_post_meta($post->ID, '_image_id_1', true);
	$member_name_1 = get_post_meta($post->ID, '_member_name_1', true);
	$member_position_1 = get_post_meta($post->ID, '_member_position_1', true);
	$member_description_1 = get_post_meta($post->ID, '_member_description_1', true);
	// Output the image upload/select field
?>
	<!-- for image metabox -->
	<div id="custom-image-container">
		<p><strong>Member Image:</strong></p>
		<div id="custom-image-preview">
			<?php if ($image_id_1) : ?>
				<?php echo wp_get_attachment_image($image_id_1, 'thumbnail'); ?>
			<?php endif; ?>
		</div>
		<img src="<?php echo $image_id_1; ?>" alt="">
		<br>
		<input type="text" id="image_id_1" name="image_id_1" value="<?php echo esc_attr($image_id_1); ?>" />
		<a href="<?php echo esc_url(admin_url('media-new.php?post_id=' . $post->ID)); ?>" target="_blank" class="button">Upload/Select Image</a>
	</div>
	<br>
	<!-- for name metabox -->
	<label for="member_name_1">Member's Name:</label>
	<input type="text" id="member_name_1" name="member_name_1" value="<?php echo esc_attr($member_name_1); ?>">
	<!-- for position metabox -->
	<br><br>
	<label for="member_position_1">Member's position:</label>
	<input type="text" id="member_position_1" name="member_position_1" value="<?php echo esc_attr($member_position_1); ?>">
	<!-- for description metabox -->
	<br><br>
	<textarea name="member_description_1" id="member_description_1" cols="30" rows="10" placeholder="something about the member..."><?php echo esc_attr($member_description_1); ?></textarea>
<?php
}


// Save and update the value of team member 1 metabox
function save_custom_about_page_member_1_metabox($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (isset($_POST['member_name_1'])) {
		$member_name_1 = sanitize_text_field($_POST['member_name_1']);
		update_post_meta($post_id, '_member_name_1', $member_name_1);
	}

	if (isset($_POST['image_id_1'])) {
		$image_id_1 = sanitize_text_field($_POST['image_id_1']);
		update_post_meta($post_id, '_image_id_1', $image_id_1);
	}

	if (isset($_POST['member_position_1'])) {
		$member_position_1 = sanitize_text_field($_POST['member_position_1']);
		update_post_meta($post_id, '_member_position_1', $member_position_1);
	}

	if (isset($_POST['member_description_1'])) {
		$member_description_1 = sanitize_text_field($_POST['member_description_1']);
		update_post_meta($post_id, '_member_description_1', $member_description_1);
	}
}
add_action('save_post', 'save_custom_about_page_member_1_metabox');

//Render the Team member 2 meta box
function render_custom_about_page_member_2_metabox($post)
{
	// Retrieve the current field IDs, if it exists
	$image_id_2 = get_post_meta($post->ID, '_image_id_2', true);
	$member_name_2 = get_post_meta($post->ID, '_member_name_2', true);
	$member_position_2 = get_post_meta($post->ID, '_member_position_2', true);
	$member_description_2 = get_post_meta($post->ID, '_member_description_2', true);
	// Output the image upload/select field
?>
	<!-- for image metabox -->
	<div id="custom-image-container">
		<p><strong>Member Image:</strong></p>
		<div id="custom-image-preview">
			<?php if ($image_id_2) : ?>
				<?php echo wp_get_attachment_image($image_id_2, 'thumbnail'); ?>
			<?php endif; ?>
		</div>
		<img src="<?php echo $image_id_2; ?>" alt="">
		<br>
		<input type="text" id="image_id_2" name="image_id_2" value="<?php echo esc_attr($image_id_2); ?>" />
		<a href="<?php echo esc_url(admin_url('media-new.php?post_id=' . $post->ID)); ?>" target="_blank" class="button">Upload/Select Image</a>
	</div>
	<br>
	<!-- for name metabox -->
	<label for="member_name_1">Member's Name:</label>
	<input type="text" id="member_name_2" name="member_name_2" value="<?php echo esc_attr($member_name_2); ?>">
	<!-- for position metabox -->
	<br><br>
	<label for="member_position_2">Member's position:</label>
	<input type="text" id="member_position_2" name="member_position_2" value="<?php echo esc_attr($member_position_2); ?>">
	<!-- for description metabox -->
	<br><br>
	<textarea name="member_description_2" id="member_description_2" cols="30" rows="10" placeholder="something about the member..."><?php echo esc_attr($member_description_2); ?></textarea>
<?php
}


// Save and update the value of team member 2 metabox
function save_custom_about_page_member_2_metabox($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (isset($_POST['member_name_2'])) {
		$member_name_2 = sanitize_text_field($_POST['member_name_2']);
		update_post_meta($post_id, '_member_name_2', $member_name_2);
	}

	if (isset($_POST['image_id_2'])) {
		$image_id_2 = sanitize_text_field($_POST['image_id_2']);
		update_post_meta($post_id, '_image_id_2', $image_id_2);
	}

	if (isset($_POST['member_position_2'])) {
		$member_position_2 = sanitize_text_field($_POST['member_position_2']);
		update_post_meta($post_id, '_member_position_2', $member_position_2);
	}

	if (isset($_POST['member_description_2'])) {
		$member_description_2 = sanitize_text_field($_POST['member_description_2']);
		update_post_meta($post_id, '_member_description_2', $member_description_2);
	}
}
add_action('save_post', 'save_custom_about_page_member_2_metabox');

//created custom meta box for features page
function add_styleblog_custom_features_page_metabox()
{
	$feature_page_id = 10;
	global $post;
	if ($post->ID != $feature_page_id) {
	} else {
		add_meta_box(
			'custom_features_page_metabox_id',     // Meta box ID
			'Select Category',  // Title
			'render_custom_features_page_metabox', // Callback function to render content
			'page',                   // Post type where the meta box should appear
			'normal',                 // Context (normal, advanced, side)
			'high',                    // Priority (high, default, low)

		);
	}
}

add_action('add_meta_boxes', 'add_styleblog_custom_features_page_metabox');


function render_custom_features_page_metabox($post)
{

	$selected_value = get_post_meta($post->ID, 'custom_select_field', true);
	// Define your select options
	$select_options = array(
		'fashion' => 'Fashion',
		'music' => 'Music',
		'travel' => 'Travel',
	);

	// Output the select field HTML
	echo '<label for="custom_select_field">Select an option:</label>';
	echo '<select name="custom_select_field" id="custom_select_field">';

	foreach ($select_options as $value => $label) {
		echo '<option value="' . esc_attr($value) . '"';
		if ($selected_value === $value) {
			echo ' selected="selected"';
		}
		echo '>' . esc_html($label) . '</option>';
	}

	echo '</select>';
}


function save_custom_features_page_metabox($post_id)
{
	// Check if this is an autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	// Save the selected value
	if (isset($_POST['custom_select_field'])) {
		update_post_meta($post_id, 'custom_select_field', sanitize_text_field($_POST['custom_select_field']));
	}
}

add_action('save_post', 'save_custom_features_page_metabox');
