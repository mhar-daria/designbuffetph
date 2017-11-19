<?php
/**
 * Template Name: Services Template
 *
 * @package DesignBuffetPh
 * @since 2017
 */
?>

<?php get_header(); ?>

<?php $pageName = get_query_var('pagename') ?>
<?php $servicesId = get_page_by_title('services')->ID; ?>

  <div class="row">

    <div class="container" id="services">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_sidebar('services') ?>
        
        <div class="col-md-9 col-xs-12" id="content" role="main">
          <?php if ( $pageName === 'services' ) { ?>
            <?php $pages = get_pages(['child_of' => get_page_by_title('digital marketing')->ID]); ?>

            <div class="col-md-12 col-xs-12">

              <?php foreach($pages as $page): ?>

                <div class="col-md-4 col-xs-12 content-container">
                  
                  <a href="<?php echo get_permalink($page->ID) ?>">
                    <div class="featured-container">
                      <img src="<?php echo get_the_post_thumbnail_url($page->ID) ?>" alt="" class="featured-image img-responsive center-block">
                    </div>

                    <h3><?php echo $page->post_title ?></h3>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          <?php } else { ?>

            <?php 
              $serviceCategory = get_pages(['parent' => $servicesId]);

              $category = false;

              foreach ( $serviceCategory as $cat ) {

                if ( $cat->post_name == $pageName ) {
                  $category = $cat;
                  break;
                }
              }

              $subCategory = get_pages(['parent'=> get_page_by_title($category->post_title)->ID]);

              if ( $category ) {
            ?>
                <h2><?php echo $category->post_title ?></h2>
                <div class="col-md-12 col-xs-12">

                  <?php foreach($subCategory as $page): ?>

                    <div class="col-md-4 col-xs-12 content-container">
                      
                      <a href="<?php echo get_permalink($page->ID) ?>">
                        <div class="featured-container">
                          <img src="<?php echo get_the_post_thumbnail_url($page->ID) ?>" alt="" class="featured-image img-responsive center-block">
                        </div>

                        <h3><?php echo $page->post_title ?></h3>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
            <?php
              }
            ?>

          <?php } ?>
        </div>

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