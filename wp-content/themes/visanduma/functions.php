<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

    
//Include Bootstrap menu functions
include_once( 'functions_menu.php' );

//Include comments walker
include_once( 'comments_walker.php' );

//Include theme customizatin optins "Appearance > Customize". Adds 2 items. "Footer area" & "Social Icons"
include_once( 'theme-options/theme_customization.php' ); //Settings appear under Appearance > Customize


//Include additional theme fields
include_once( 'theme-options/theme_fields.php' ); //This will appear under Pages > Above WYSIWYG editor
//Adds the featured image feature supprt to the theme for posts
add_theme_support('post-thumbnails');

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support('html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
));
function visanduma_vendors() {
    wp_enqueue_style('aos','https://unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_style('slick','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('datatables','https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css');
    wp_enqueue_style('bootstrap-icons','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css');
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/vendor/jquery-ui/jquery-ui.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('visanduma-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('Lazy', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js', array(), '1.7.11', true);
    wp_enqueue_script('Lazy', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.plugins.min.js', array(), '1.7.11', true);
    wp_enqueue_script('b-icons','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('aos','https://unpkg.com/aos@next/dist/aos.js');
    wp_enqueue_script('slick-js','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.12.1', true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/vendor/jquery-ui/jquery-ui.min.js', array(), '1.12.1', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/vendor/popper/popper.min.js', array(), '1.0.1', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array(), '4.3.1', true);
}

add_action('wp_enqueue_scripts', 'visanduma_vendors');



//Register sidebars
register_sidebar(array(
    'name' => 'ST Sidebar',
    'id' => 'st_sidebar',
    'description' => 'ST Sidebar Widget',
    'before_widget' => '<div class="widget-wrapper">',
    'after_widget' => '</div>'
));

//Register top main menu (method 1)
register_nav_menu('top_menu', 'Top Main Menu');

//Register a footer menu (method 2)
function footer_menu() {
    register_nav_menu('footer_menu', __('Footer Menu'));
}

add_action('init', 'footer_menu');




//Shortcode to get template path / theme path. Usage: [theme_path]/images/myImage.jpg
function st_theme_path() {
    return get_bloginfo("template_directory");
}

add_shortcode('theme_path', 'st_theme_path');

//Shortcode to get home url / homepage path. Usage: [home_url]/sample-page
function st_home_url() {
    return get_bloginfo("url");
}

add_shortcode('home_url', 'st_home_url');


//Removes adding auto <p> tags in the wysiwyg editor
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

//Removes <p>tags and <br>tags from wrapping our shortcodes
function cleanup_shortcodes($content) {
    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']',
        ']<br>' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'cleanup_shortcodes', 10);

////Adds bootstrap CSS styling to the wysiwyg editor front-end
//function my_theme_styles_1() {
//    add_editor_style('css/bootstrap.min.css');
//}
//
//add_action('after_setup_theme', 'my_theme_styles_1');
//
////Adds custom CSS styling on style.css to the wysiwyg editor
//function my_theme_styles_2() {
//    add_editor_style('style.css');
//}
//
//add_action('after_setup_theme', 'my_theme_styles_2');

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more() {
    global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function initiate_customizer($wp_customize) {
    $wp_customize->add_panel('visanduma-logo-customizer', array(
        'title' => 'Site Details',
        'description' => 'Site Settings',
        'priority' => 5,
    ));
    $wp_customize->add_section('visanduma-color-logo', array(
       'title' => __('Site Color Logo', 'Visanduma'),
       'priority' => 10,
       'panel' => 'visanduma-logo-customizer',
     ));
    $wp_customize->add_setting('visanduma_logo_setting', array(
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'visanduma_logo_selector', array(
         'label' => __('Site Color Logo', 'Visanduma'),
         'section' => 'visanduma-color-logo',
         'settings' => 'visanduma_logo_setting',
     )));
}
add_action('customize_register', 'initiate_customizer');

function cptui_register_my_cpts() {

	/**
	 * Post Type: Tours.
	 */

	$labels = [
		"name" => esc_html__( "Tours", "Visit SriLanka" ),
		"singular_name" => esc_html__( "Tour", "Visit SriLanka" ),
		"menu_name" => esc_html__( "Tours", "Visit SriLanka" ),
		"all_items" => esc_html__( "All Tours", "Visit SriLanka" ),
		"add_new" => esc_html__( "Add Tours", "Visit SriLanka" ),
		"add_new_item" => esc_html__( "Add New Tour", "Visit SriLanka" ),
		"edit_item" => esc_html__( "Edit Tour", "Visit SriLanka" ),
		"new_item" => esc_html__( "New Tour", "Visit SriLanka" ),
		"view_item" => esc_html__( "View Tour", "Visit SriLanka" ),
		"view_items" => esc_html__( "View Tours", "Visit SriLanka" ),
		"search_items" => esc_html__( "Search Tours", "Visit SriLanka" ),
		"not_found" => esc_html__( "No Tours Found", "Visit SriLanka" ),
		"not_found_in_trash" => esc_html__( "No Tours Found in Trash", "Visit SriLanka" ),
		"parent" => esc_html__( "Parent Tour", "Visit SriLanka" ),
		"featured_image" => esc_html__( "Featured image for this Tour", "Visit SriLanka" ),
		"set_featured_image" => esc_html__( "Set featured image for this Tour", "Visit SriLanka" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Tour", "Visit SriLanka" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Tour", "Visit SriLanka" ),
		"archives" => esc_html__( "Tour archives", "Visit SriLanka" ),
		"insert_into_item" => esc_html__( "Insert into tour", "Visit SriLanka" ),
		"uploaded_to_this_item" => esc_html__( "Uploaded in to this tour", "Visit SriLanka" ),
		"filter_items_list" => esc_html__( "Filter tours list", "Visit SriLanka" ),
		"items_list_navigation" => esc_html__( "Tours list navigation", "Visit SriLanka" ),
		"items_list" => esc_html__( "Tours list", "Visit SriLanka" ),
		"attributes" => esc_html__( "Tours Attributes", "Visit SriLanka" ),
		"name_admin_bar" => esc_html__( "Tour", "Visit SriLanka" ),
		"item_published" => esc_html__( "Tour published", "Visit SriLanka" ),
		"item_published_privately" => esc_html__( "Tour published privately", "Visit SriLanka" ),
		"item_reverted_to_draft" => esc_html__( "Tour reverted to draft", "Visit SriLanka" ),
		"item_scheduled" => esc_html__( "Tour scheduled", "Visit SriLanka" ),
		"item_updated" => esc_html__( "Tour updated", "Visit SriLanka" ),
		"parent_item_colon" => esc_html__( "Parent Tour", "Visit SriLanka" ),
	];

	$args = [
		"label" => esc_html__( "Tours", "Visit SriLanka" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "tours", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-site",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "tours", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_642fc45f955ed',
	'title' => 'Home Mods',
	'fields' => array(
		array(
			'key' => 'field_6433706f25f1b',
			'label' => 'Top Slider',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_642fc464e2e21',
			'label' => 'Top Slider',
			'name' => 'top_slider',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 3,
			'max' => 3,
			'layout' => 'block',
			'button_label' => 'Add Slider',
			'sub_fields' => array(
				array(
					'key' => 'field_642fc48ae2e22',
					'label' => 'Slider Image',
					'name' => 'slider_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
		array(
			'key' => 'field_6433703e25f1a',
			'label' => 'About Us Sec',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_6433708325f1c',
			'label' => 'About Us Title',
			'name' => 'about_us_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Explore More About Us !',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_643370c425f1d',
			'label' => 'About Us Text',
			'name' => 'about_us_text',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 0,
		),
		array(
			'key' => 'field_643370ee25f1e',
			'label' => 'About Us Side Image',
			'name' => 'about_us_side_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_6433712225f1f',
			'label' => 'Why Choose Sec',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_6433718c25f20',
			'label' => 'Why Choose Title',
			'name' => 'why_choose_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Why Choose Us for Tours in Sri Lanka',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_643371cb25f21',
			'label' => 'Why Choose Cards',
			'name' => 'why_choose_cards',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 3,
			'max' => 12,
			'layout' => 'block',
			'button_label' => 'Add Card',
			'sub_fields' => array(
				array(
					'key' => 'field_643371e925f22',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_643371f425f23',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page',
				'operator' => '==',
				'value' => '5',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'HomePageMods',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_642f9d2229e37',
	'title' => 'Tours',
	'fields' => array(
		array(
			'key' => 'field_642f9d3c0b884',
			'label' => 'Tour Duration',
			'name' => 'tour_duration_',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_642f9d4e0b885',
			'label' => 'Tour Short Description',
			'name' => 'tour_short_description',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_643406282e991',
			'label' => 'Tour Banner Image',
			'name' => 'tour_banner_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_642f9d730b887',
			'label' => 'Tour Description',
			'name' => 'tour_description',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_64340dba6a4d2',
			'label' => 'Image Gallery',
			'name' => 'image_gallery',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_64340ddf6a4d3',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Image',
			'sub_fields' => array(
				array(
					'key' => 'field_64340ddf6a4d3',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tours',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Tours',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_6434e50f5eafd',
	'title' => 'Gallery',
	'fields' => array(
		array(
			'key' => 'field_6434e5174deed',
			'label' => 'Gallery',
			'name' => 'gallery',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_6434e52e4deee',
			'min' => 10,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Image',
			'sub_fields' => array(
				array(
					'key' => 'field_6434e52e4deee',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_6434e53b4deef',
					'label' => 'Class',
					'name' => 'class',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'kandy' => 'Kandy',
						'galle' => 'Galle',
						'jaffna' => 'Jaffna',
						'cultural' => 'Cultural',
						'beach' => 'Beach',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 1,
					'ui' => 1,
					'ajax' => 1,
					'return_format' => 'array',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page',
				'operator' => '==',
				'value' => '5',
			),
		),
		array(
			array(
				'param' => 'page',
				'operator' => '==',
				'value' => '36',
			),
		),
	),
	'menu_order' => 9,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Galley',
	'show_in_rest' => 0,
));

endif;	
