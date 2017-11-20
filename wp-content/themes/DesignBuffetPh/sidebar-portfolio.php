<div id="sidebar" class="col-md-3 cols-xs-12 np">
  <?php // echo fn_object_to_html(get_pages(['child_of' => get_page_by_title('services')->ID, 'sort_column' => 'ID']), get_page_by_title('services')->ID, get_page_by_title('services')->ID) ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('portfolio-sidebar') ) : endif; ?>
</div>