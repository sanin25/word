<?php
/**
 * Brawny functions and definitions
 *
 * @package Brawny
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'brawny_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brawny_setup() {    

		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on brawny, use a find and replace
	 * to change 'brawny' to the name of your theme in all the template files
	 */
		load_theme_textdomain( 'brawny', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'home-thumb', 224, 180, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'brawny' ),
			) );

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			) );

		/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
		add_theme_support( 'post-formats', array(
				'aside', 'image', 'video', 'quote', 'link',
			) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	
	}
endif; // brawny_setup
add_action( 'after_setup_theme', 'brawny_setup' );
add_action( 'after_setup_theme', 'brawny_customizer_setup',11 );

if( ! function_exists( 'brawny_customizer_setup' ) ) {
		//echo '<pre>', print_r($brawny), '</pre>';
	function brawny_customizer_setup() {
		if(  count( get_theme_mods() ) <= 1 ) {
			global $options;
			$brawny = get_option('brawny');
			foreach($options['panels']['theme_options']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					//echo 'Name: ' . $name . '<br>' . 'Value: ' . $brawny[$name] . '<br>';
					if( ! get_theme_mod( $name ) && isset( $brawny[$name] ) ) {
						if( is_array( $brawny[$name] ) ) {
							set_theme_mod( $name, $brawny[$name]['url'] );
						} else {
							set_theme_mod( $name, $brawny[$name] );
						}
					}
				}		
			}

		 	foreach($options['panels']['home']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					if( ! get_theme_mod( $name ) && isset( $brawny[$name] ) ) {
								if( is_array($brawny[$name]) ) {
									set_theme_mod( $name, $brawny[$name]['url'] );
								} 
								else {
									set_theme_mod( $name, $brawny[$name] );
								}
					}
			
					if ( isset ( $brawny['slides'] ) ) {		
						$slide_count = 1;
						foreach($brawny['slides'] as $slide) {
							if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
								set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
							}
							if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
								set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
							}
							$slide_count++;
						}
					}
				}
			}	
		}
	}
}

/**
 * Defining constants to use through out theme code
 */
require_once get_template_directory() . '/includes/constants.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Include all includes. Genius
 */
require_once BRAWNY_INCLUDES_DIR . '/all.php';

function brawny_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );
		if ( $url ) {
			return true;
		} 
	}    
	
	return false;	
}