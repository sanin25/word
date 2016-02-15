<?php
/* Defining directory PATH Constants */
define( 'BRAWNY_PARENT_DIR', get_template_directory() );
define( 'BRAWNY_CHILD_DIR', get_stylesheet_directory() );
define( 'BRAWNY_INCLUDES_DIR', BRAWNY_PARENT_DIR. '/includes' );

/** Defining URL Constants */
define( 'BRAWNY_PARENT_URL', get_template_directory_uri() );
define( 'BRAWNY_CHILD_URL', get_stylesheet_directory_uri() );
define( 'BRAWNY_INCLUDES_URL', BRAWNY_PARENT_URL . '/includes' );

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'BRAWNY_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'BRAWNY_LANGUAGES_URL', BRAWNY_PARENT_URL . '/languages' );

	if ( ! defined( 'BRAWNY_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'BRAWNY_LANGUAGES_DIR', BRAWNY_PARENT_DIR . '/languages' );