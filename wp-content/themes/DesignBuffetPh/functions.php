<?php 

  add_theme_support('custom-logo');
  
  function themename_custom_logo_setup() {

    $defaults = [
      'height' => 100,
      'width' => 400,
      'flex-height' => true,
      'flex-width' => true,
      'header-text' => ['site-title', 'site-description'],
    ];

    add_theme_support('custom-logo', $defaults);
  }

  add_action('after_setup_theme', 'themename_custom_logo_setup');


  add_theme_support( 'custom-header' );

  $defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );
    
  add_theme_support( 'custom-header', $defaults );

  // for menu
  function register_my_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
  }
  add_action( 'init', 'register_my_menu' );

  function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
  }
  add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );

  add_theme_support( 'post-thumbnails' );

  // if ( function_exists('register_sidebar') ) {

  //   register_sidebar( [
  //     'before_widget' => '<li id="%1$s" class="widget %2$s">', 
  //     'after_widget'  => '</li>',
  //     'before_title'  => '<h2 class="widgettitle">',
  //     'after_title'   => '</h2>'
  //   ] );
  // }

  if ( function_exists( 'register_sidebar' ) ) {

    register_sidebar( [
      'name'  => 'Services Sidebar',
      'id'    => 'services-sidebar',
      'desctiption' => 'Appears as the sidebar on the custom services',
      'before_widget' => '<div style="col-md-12 col-xs-12">',
      'after_widget'  => '</div>',
      'before_title'  => '<h1 class="widgettitle">',
      'after_title'   => '</h1>'
    ] );
  }

  if ( function_exists('register_sidebar') ) {

    register_sidebar( [
      'name'  => 'Portfolio Sidebar',
      'id'    => 'portfolio-sidebar',
      'desctiption' => 'Appears as the sidebar on the custom portfolio',
      'before_widget' => '<div style="col-md-12 col-xs-12">',
      'after_widget'  => '</div>',
      'before_title'  => '<h1 class="widgettitle">',
      'after_title'   => '</h1>'
    ] );
  }

  function php_execute($html){
    if(strpos($html,"<"."?php")!==false){ 
      ob_start(); eval("?".">".$html);
      $html=ob_get_contents();
      ob_end_clean();
    }

    return $html;
  }

  add_filter('widget_text','php_execute',100);

  include('inc/main-helpers.php');
?>
