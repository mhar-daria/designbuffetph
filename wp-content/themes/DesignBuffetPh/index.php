<?php
/**
 * Template Name: Index Page
 *
 * @package DesignBuffetPh
 * @since 2017
 */
?>

<?php $slug = basename(get_permalink()); ?>

<?php get_header(); ?>
  
  <div class="row">

    <div class="container <?php echo (is_front_page()) ? 'grid' : '' ?>">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
      <?php if ( ! is_front_page() ) { ?>

      <?php } ?>
      
      <?php the_content() ?>

      <?php endwhile; else: ?>

        <div class="no-results">
          <p><strong>There has been an error.</strong></p>
          <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
          <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
        </div><!--noResults-->
      <?php endif; ?>
    </div>
  </div>

<?php get_footer(); ?>