<?php

  if ( !function_exists('fn_print_die'))
  {

    function fn_print_die() {
      for ( $i = 0; $i < func_num_args(); $i++ ) {
        fn_print( func_get_arg($i) );
      }
      die();
    }
  }

  if ( !function_exists('fn_print') )
  {

    function fn_print() {
      for ( $i = 0; $i < func_num_args(); $i++ ) {
        echo '<pre style="border-radius: 5px; border: 1px solid #808080; padding: 5px;  background: #2F4F4F; color: #FFF; margin: 5px 5px; float: left; clear: both;">';
        print_r( func_get_arg($i) );
        echo "</pre>";
      }
    }
  }


  if( !function_exists('fn_print_r') )
  {

    function fn_print_r() {
      for ( $i = 0; $i < func_num_args(); $i++ ) {
        fn_print( func_get_arg($i) );
      }
    }
  }

  if( !function_exists('fn_get_categories'))
  {

    function fn_get_categories()
    {

      $CI =& get_instance();

      $CI->load->model('category_model');

      return $CI->category_model->getCategories();
    }
  }

  if( !function_exists('fn_permalink'))
  {

    function fn_permalink( $url='', $glue = '-' )
    {

      if ( empty( $url ) )
        return false;

      $url = trim($url);

      $spChars = array(
          '/[&]/i'  => "and",
          '/hrs/i' => "hours",
      );

      $newName = preg_replace(
          "/([ ]{1,})/",
          "{$glue}",
          preg_replace(
              "/[^\w ]/",
              "",
              preg_replace(
                  array_keys($spChars),
                  array_values($spChars),
                  $url
              )
          )
      );

      return strtolower($newName);
    }
  }

  if ( ! function_exists('fn_base_url') ) {

    function fn_base_url( $url = NULL ) {

      return get_site_url() . '/' . $url;
    }
  }

  if ( ! function_exists('fn_object_to_html') ) {

    function fn_object_to_html(array $elements, $parentId = 0, $defaultParent = 0) {

      $counter = 0;
      $html = '<ul>';

      foreach ($elements as $element) {

        if ($element->post_parent == $parentId) {
          $counter++;

          $children = fn_object_to_html($elements, $element->ID, $defaultParent);
          $hasChildren = $children ? 'has-child' : '';
          $isActive = $element->ID === get_the_ID() ? 'active' : '';
          $isParent = (wp_get_post_parent_id(get_the_ID()) === $element->ID) ? 'active' : '';
          $class = trim($hasChildren . ' ' . $isActive . ' ' . $isParent);
          $dropdown = (($hasChildren && $isActive) || $isParent) ? '-' : '+';

          $html .= "<li class='{$class}'><a href='".get_permalink($element->ID)."'>{$element->post_title}". (($element->post_parent == $defaultParent && $children)? '<span class="dropdown show">' . $dropdown . '</span>' : '')."</a>";

          if ($children) {
              $html .= $children;
          }

          $html .= '</li>';
        }
      }
      $html .= '</ul>';

      return $counter ? $html : '';
    }
  }

  if ( ! function_exists('fn_category_tree') ) {

    function fn_arrange_object(array $elements, $parentId = 0) {
      $branch = array();

      foreach ($elements as $element) {

        if ($element->parent == $parentId) {
          $children = fn_arrange_object($elements, $element->cat_ID);
          if ($children) {
              $element->children = $children;
          }
          $branch[] = $element;
        }
      }

      return $branch;
    }
  }

  if ( ! function_exists('fn_get_parent_category') ) {

    function fn_get_parent_category( $term_id = 0 ) {

      $url = [];

      while ($term_id != 0) {

        $term = get_term($term_id);

        $term_id = $term->parent;
        array_push($url, $term->slug);
      }

      $url = array_reverse($url, true);

      return implode('/', $url);
    }
  }

  if ( ! function_exists('fn_get_url_segment') ) {

    function fn_get_url_segment( $path = null, $segment_id = 0 ) {

       $path = explode('/', $path);

       return (isset($path) && $path[$segment_id])
                ? $path[$segment_id]
                : null;
    }
  }
 ?>
