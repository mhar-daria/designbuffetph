<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package DesignBuffetPh
 * @since 2017
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php is_front_page() ? bloginfo('description') : wp_title('') ?> | <?php bloginfo('name') ?></title>

  <link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri().'/images/header/icon/favicon.ico' ?>" />

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" />
  <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
  <!-- header -->
  <header id="header" class="container homepage">

    <?php $custom_logo_id = get_theme_mod( 'custom_logo' ) ?>
    <?php $logo = wp_get_attachment_image_src($custom_logo_id, 'full') ?>

    <?php $footerMenu = wp_get_nav_menu_items('footer-menu') ?>

    <?php if ( is_front_page() ) { ?>

      <div class="col-xs-12 col-md-12">
        <a href="<?php echo fn_base_url() ?>" class="logo-link">
          <img src="<?php echo $logo[0] ?>"
               alt=""
               class="img-responsive center-block logo" />
        </a>
      </div>
    <?php } else { ?>

      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <span class="sr-only">Main Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="<?php echo fn_base_url() ?>" class="navbar-brand logo-link logo right">
          <img src="<?php echo get_attachment_url_by_slug('logo-2') ?>" alt="" class="img-responsive">
        </a>
        </div>



        <div class="collapse navbar-collapse navbar-main-collapse logo-bottom">
          <?php $segmentUri = fn_get_url_segment(get_page_uri()); ?>

          <ul class="nav navbar-nav nav-others">
            <li class="">
              <a href="/">Home</a>
            </li>
            <?php foreach ($footerMenu as $key => $menu) { ?>
              <li class="<?php echo (strtolower($segmentUri) === strtolower($menu->title)) ? 'active' : '' ?>">
                <a href="<?php echo $menu->url ?>"><?php echo ucwords($menu->title) ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
  <?php } ?>
  </header>
  <!-- end of header -->

  <!-- content -->
  <main id="content" class="container">
