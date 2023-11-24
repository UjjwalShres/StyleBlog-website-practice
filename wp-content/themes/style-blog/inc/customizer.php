<?php

/**
 * Style Blog Theme Customizer
 *
 * @package Style_Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function style_blog_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';





	//custom theme options customizer starts here
	$wp_customize->add_panel('custom_theme_options_block', array( //panel for theme options
		'priority' => 209,
		'theme_supports' => '',
		'title' => __('Theme Options', 'style-blog'),
		'description' => __('Theme Option section', 'style-blog')
	));
	$wp_customize->add_section('banner_section', array( //section for banners
		'title' => __('Banner Customization', 'style-blog'),
		'description' => __('Customize the Banner design', 'style-blog'),
		'panel' => 'custom_theme_options_block'
	));
	$wp_customize->add_section('big_post_section', array( //section for theme options
		'title' => __('Big Post Customization', 'style-blog'),
		'description' => __('Customize the Big Post template', 'style-blog'),
		'panel' => 'custom_theme_options_block'
	));
	$wp_customize->add_section('sidebar_post_section', array( //section for theme options
		'title' => __('Sidebar Post Customization', 'style-blog'),
		'description' => __('Customize the Sidebar Post template', 'style-blog'),
		'panel' => 'custom_theme_options_block'
	));
	//setting for sidebar post
	$wp_customize->add_setting('sidebar_post_settings', array(
		'default' => 'popular-posts'
	));
	$wp_customize->add_control('sidebar_post_control', array(
		'label' => __('Select Category', 'style-blog'),
		'section' => 'sidebar_post_section',
		'settings' => 'sidebar_post_settings',
		'priority' => 1,
		'type' => 'select',
		'choices' => array(
			'popular-posts' => __('Popular Posts', 'style-blog'),
			'gallary-posts' => __('Gallary Posts', 'style-blog')
		)
	));

	//setting for banner visibility
	$wp_customize->add_setting('banner_visibility_settings', array(
		'default' => 'option1'
	));
	$wp_customize->add_control('banner_visibility_control', array(
		'label' => __('Banner Visibility', 'style-blog'),
		'section' => 'banner_section',
		'settings' => 'banner_visibility_settings',
		'priority' => 1,
		'type' => 'radio',
		'choices' => array(
			'option1' => __('Show Banner', 'style-blog'),
			'option2' => __('Hide Banner', 'style-blog')
		)
	));



	//setting for category of big post 
	$wp_customize->add_setting('big_post_category_settings', array(
		'default' => 'big-post'
	));
	$wp_customize->add_control('big_post_category_control', array(
		'label' => __('Select Category', 'style-blog'),
		'section' => 'big_post_section',
		'settings' => 'big_post_category_settings',
		'priority' => 1,
		'type' => 'select',
		'choices' => array(
			'big-post' => __('Big Posts', 'style-blog'),
			'medium-post' => __('Medium Posts', 'style-blog'),
			'small-post' => __('Small Posts', 'style-blog'),
		)
	));
	//setting for number of big post
	$wp_customize->add_setting('big_post_number_settings', array(
		'default' => 1,
		'type' => 'theme_mod',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('big_post_number_control', array(
		'label' => __('Number of Posts (0-3)', 'style-blog'),
		'section' => 'big_post_section',
		'settings' => 'big_post_number_settings',
		'priority' => 2,
		'type' => 'range', // Use range type for slider
		'input_attrs' => array(
			'min' => 0, // Minimum value
			'max' => 3, // Maximum value
			'step' => 1, // Increment step
		),
	));
	//setting for thumbnail of big post
	$wp_customize->add_setting('big_post_thumbnail_settings', array(
		'default' => 'option1',
		'type' => 'theme_mod',
	));
	$wp_customize->add_control('big_post_thumbnail_control', array(
		'label' => __('Post Thumbnail Option', 'style-blog'),
		'section' => 'big_post_section',
		'settings' => 'big_post_thumbnail_settings',
		'type' => 'radio',
		'choices' => array(
			'option1' => __('Show Post/s with thumbnail', 'style-blog'),
			'option2' => __('Show Post/s without thumbnail', 'style-blog'),
		),
	));

	//custom social links customizer starts here
	$wp_customize->add_panel('social_links_block', array(
		'priority' => 210,
		'theme_supports' => '',
		'title' => __('Social Links', 'style-blog'),
		'description' => __('Social links url section', 'style-blog')
	));
	$wp_customize->add_section('custom_social_links', array(
		'title' => __('Social Links Url', 'style-blog'),
		'panel' => 'social_links_block',
		'priority' => 10
	));
	//settings for facebook url
	$wp_customize->add_setting('facebook_block', array(
		'default' => 'https://www.facebook.com/'
	));
	$wp_customize->add_control('facebook_block', array(
		'type' => 'text',
		'label' => 'Facebook Url',
		'section' => 'custom_social_links',
		'priority' => 1
	));
	//settings for pinterest url
	$wp_customize->add_setting('pinterest_block', array(
		'default' => 'https://www.pinterest.com/'
	));
	$wp_customize->add_control('pinterest_block', array(
		'type' => 'text',
		'label' => 'Pinterest Url',
		'section' => 'custom_social_links',
		'priority' => 2
	));
	//settings for linkedIn url
	$wp_customize->add_setting('linkedIn_block', array(
		'default' => 'https://www.linkedin.com/'
	));
	$wp_customize->add_control('linkedIn_block', array(
		'type' => 'text',
		'label' => 'LinkedIn Url',
		'section' => 'custom_social_links',
		'priority' => 3
	));
	//settings for be url
	$wp_customize->add_setting('be_block', array(
		'default' => 'https://www.be.com/'
	));
	$wp_customize->add_control('be_block', array(
		'type' => 'text',
		'label' => 'Be Url',
		'section' => 'custom_social_links',
		'priority' => 4
	));
	//settings for vimeo url
	$wp_customize->add_setting('vimeo_block', array(
		'default' => 'https://www.vimeo.com/'
	));
	$wp_customize->add_control('vimeo_block', array(
		'type' => 'text',
		'label' => 'Vimeo Url',
		'section' => 'custom_social_links',
		'priority' => 5
	));

	//custom footer customizer starts here
	$wp_customize->add_panel('footer_block', array( //panel for footer
		'priority' => 211,
		'theme_supports' => '',
		'title' => __('Footer', 'style-blog'),
		'description' => __('Footer Options', 'style-blog')
	));
	$wp_customize->add_section('footer_section', array( //section for footer
		'title' => __('Footer Text', 'style-blog'),
		'description' => __('Edit the footer text', 'style-blog'),
		'panel' => 'footer_block'
	));
	//settings for footer text
	$wp_customize->add_setting('footer_settings', array(
		'default' => '2023 Style Blog. All rights reserved'
	));
	$wp_customize->add_control('footer_control', array(
		'type' => 'text',
		'label' => 'Footer Text',
		'section' => 'footer_section',
		'settings' => 'footer_settings',
		'priority' => 1
	));


	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'style_blog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'style_blog_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'style_blog_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function style_blog_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function style_blog_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function style_blog_customize_preview_js()
{
	wp_enqueue_script('style-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'style_blog_customize_preview_js');
