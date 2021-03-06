<?php

// Load stylesheets
function load_css() {
  wp_register_style( "bootstrap", get_template_directory_uri() . "/css/bootstrap.min.css", array(), false, "all" );
  wp_enqueue_style( "bootstrap" );

  wp_register_style( "main", get_template_directory_uri() . "/css/main.css", array(), false, "all" );
  wp_enqueue_style( "main" );
}

// Load Javascript
function load_js() {
  wp_enqueue_script( "jquery" );

  wp_register_script( "bootstrap", get_template_directory_uri() . "/js/bootstrap.min.js", "jquery", false, true );
  wp_enqueue_script( "bootstrap" );

  wp_register_script( "planetary", get_template_directory_uri() . "/js/planetaryjs.js", array(), false, true );
  wp_enqueue_script( "planetary" );
}

add_action( "wp_enqueue_scripts", "load_css" );
add_action( "wp_enqueue_scripts", "load_js" );


// Theme Options
add_theme_support( "menus" );
add_theme_support( "post-thumbnails" );
add_theme_support( "widgets" );


// Filters
add_filter( 'excerpt_length', 'your_prefix_excerpt_length' );
function your_prefix_excerpt_length() {
    return 25;
}

// Menus
register_nav_menus(
  array(
      "nav-bar" => "Navigation Bar Location",
      "home-banner" => "Home Banner Location",
      "footer" => "Footer Location",
      "footer-social" => "Footer Socials Location"
  )
);

// Register Sidebars
function my_sidebars() {
  register_sidebar(
    array (
      'name' => 'Blogs Archive Sidebar',
      'id' => 'blogs-archive-sidebar',
      'before-title' => '<h4 class="widget-title">',
      'after-title' => '</h4>', 
    )
    );
}
add_action('widgets_init', 'my_sidebars');

// Logos

add_theme_support( 'custom-logo', array(
	'height'      => 171,
	'width'       => 183,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );
