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
<?php $currentPage = get_page(); ?>



  <div class="row">

    <div class="container" id="services">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_sidebar('services') ?>

        <?php $pages = ($pageName == 'services') 
                          ? get_pages(['child_of' => get_page_by_title('digital marketing')->ID])
                          : get_pages(['parent' => get_page()->ID]); ?>

        <div class="col-md-9 col-xs-12" id="content" role="main">
          <div class="col-md-12 col-xs-12 np">
            <h2><?php echo $currentPage->post_title; ?></h2>

          <?php if(! $pages): ?>

            <div>
              <?php echo $currentPage->post_content; ?>
            </div>
          <?php else: ?>

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
          <?php endif; ?>
          </div>
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