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

  if ( function_exists( 'register_sidebar' ) ) {

    register_sidebar( [
      'name'          => 'ServicesSidebar',
      'id'            => 'services-sidebar',
      'desctiption'   => 'Appears as the sidebar on the custom services',
      'before_widget' => '<div style="col-md-12 col-xs-12">',
      'after_widget'  => '</div>',
      'before_title'  => '<h1 class="widgettitle">',
      'after_title'   => '</h1>'
    ] );

    register_sidebar( [
      'name'          => 'PortfolioSidebar',
      'id'            => 'portfolio-sidebar',
      'desctiption'   => 'Appears as the sidebar on the custom portfolio',
      'before_widget' => '<div style="col-md-12 col-xs-12">',
      'after_widget'  => '</div>',
      'before_title'  => '<h1 class="widgettitle">',
      'after_title'   => '</h1>'
    ] );
  }

  function get_attachment_url_by_slug( $slug ) {
    $args = array(
      'post_type' => 'attachment',
      'name' => sanitize_title($slug),
      'posts_per_page' => 1,
      'post_status' => 'inherit',
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
  }

  add_action( 'wp_ajax_pyro_pagination', 'pyro_pagination' );

  function pyro_pagination() {

    global $wpdb;

    $page = (isset($_GET['page']))
              ? sanitize_text_field($_GET['page'])
              : 1;
    $cur_page = $page;
    $page -= 1;

    $per_page = (isset($_GET['offset']))
                  ? sanitize_text_field($_GET['offset'])
                  : 10;

fn_print_die($_GET['offest'], $per_page);
    $start = $page * $per_page;

    $data = get_pages(['parent' => get_page_by_title('services')->ID,
                       'hierarchical' => false,
                       'number' => $prepare,
                       'offset' => $start,
                       'post_status' => 'publish']);

    wp_send_json(['data' => $data, 'timestamp' => date('Y-m-d H:i:s')]);
  }

  include('inc/main-helpers.php');
?>
