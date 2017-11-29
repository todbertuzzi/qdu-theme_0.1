<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;




/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  //add_theme_support('se-nav-walker');

  // Register Custom Navigation Walker
  //require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'vertical_navigation' => __('Vertical Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

add_theme_support( 'post-thumbnails' );
add_image_size( 'sidebar-thumb', 220, 220, true ); // Hard Crop Mode
add_image_size( 'homepage-hard', 350, 230, true ); // Hard Crop Mode
add_image_size( 'milo-hard', 450, 360, true ); // Hard Crop Mode
add_image_size( 'homepage-soft', 320, 260 ); // Soft Crop Mode
add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
    is_single( ),
    is_page( ),
    is_search(),
    is_tax("tipologia_corsi"),
    is_tax("aree-corsi"),
    is_tax("area-news"),
    is_post_type_archive()
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);



add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');

function my_acf_init() {
  if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
      'page_title'  => 'Theme General Settings',
      'menu_title'  => 'Theme Settings',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
    ));
    
    acf_add_options_sub_page(array(
      'page_title'  => 'Theme Header Settings',
      'menu_title'  => 'Header',
      'parent_slug' => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
      'page_title'  => 'Theme Footer Settings',
      'menu_title'  => 'Footer',
      'parent_slug' => 'theme-general-settings',
    ));
    
    }
}

// ACF
add_filter('acf/settings/remove_wp_meta_box', '__return_true');
 

//wp_enqueue_script('theme_homepage', Assets\asset_path('scripts/anim_logo.js'), ['jquery'], null, true);

/**
 * Add search box to primary menu
 */
function wpgood_nav_search($items, $args) {
    // If this isn't the primary menu, do nothing
    if( !($args->theme_location == 'primary_navigation') ) 
    return $items;
    // Otherwise, add search form
    return  '<li>' . get_search_form(false) . '</li>'.$items ;
}
//add_filter('wp_nav_menu_items', __NAMESPACE__ . '\\wpgood_nav_search', 10, 2);



/**
 * SearchWp - Weights in Custom Feild
 */
function my_searchwp_query_main_join( $sql, $engine ) {
  global $wpdb;
  $my_meta_key = 'peso_ricerca';  // the meta_key you want to order by
  $sql = $sql . " LEFT JOIN {$wpdb->postmeta} ON {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id AND {$wpdb->postmeta}.meta_key = '{$my_meta_key}'";
  return $sql;
}
add_filter( 'searchwp_query_main_join', __NAMESPACE__ . '\\my_searchwp_query_main_join', 10, 2 );

function my_searchwp_query_orderby( $orderby ) {
  global $wpdb;
  $my_order = "DESC"; // use DESC or ASC
  $original_orderby = str_replace( 'ORDER BY', '', $orderby );
  if ( "DESC" === $my_order ) {
    // Sort in descending order
    $new_orderby = "ORDER BY {$wpdb->postmeta}.meta_value+0 DESC, " . $original_orderby;
  } else {
    // Sort in ascending order; place empties last
    // @link http://stackoverflow.com/questions/2051602/mysql-orderby-a-number-nulls-last#8174026
    $new_orderby = "ORDER BY -{$wpdb->postmeta}.meta_value+0 DESC, " . $original_orderby;
  }
  return $new_orderby;
}
add_filter( 'searchwp_query_orderby', __NAMESPACE__ . '\\my_searchwp_query_orderby' );