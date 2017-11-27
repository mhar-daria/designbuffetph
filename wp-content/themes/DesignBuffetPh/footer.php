<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package DesignBuffetPh
 * @since 2017
 */
?>

  </main><!-- end content -->

  <?php wp_footer() ?>
  <?php $footerMenu = wp_get_nav_menu_items('footer-menu') ?>

  <footer id="footer" class="container">
    <?php if ( is_front_page() ) { ?>
        
    <nav class="navbar navbar-default" role="navigation">

      <div class="navbar-collapse navbar-main-collapse">
        <ul class="nav navbar-nav">
          <?php foreach ($footerMenu as $key => $menu) { ?>
            <li><a href="<?php echo $menu->url ?>"><?php echo ucwords($menu->title) ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <div class="container text-center">
      <p class="copyright">&copy; 2017 by <a href="<?php echo get_site_url() ?>"><?php echo bloginfo() ?></a>. All rights reserved</p>
    </div>
    <?php } else { ?>

    <?php } ?>
  </footer>

  <script src="<?php echo get_template_directory_uri().'/js/main.vendor.build.js' ?>"></script>
  <script src="<?php echo get_template_directory_uri().'/js/main.build.js' ?>"></script>
</body>
</html>
