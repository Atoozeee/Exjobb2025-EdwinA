<?php

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

function custom_manual_pages_routes() {
  add_rewrite_rule('^booking/?$', 'index.php?pagename=booking', 'top');
}
add_action('init', 'custom_manual_pages_routes');

function add_fake_pages_to_query_vars($query_vars) {
  $query_vars[] = 'pagename';
  return $query_vars;
}
add_filter('query_vars', 'add_fake_pages_to_query_vars');

function enqueue_translation_file() {
  wp_enqueue_script(
    'global-scripts',
    get_template_directory_uri() . '/assets/js/translations.js', array(), '1.2.2', true
  );
}
add_action('wp_enqueue_scripts', 'enqueue_translation_file');

function enqueue_hero_carousel_assets() {
  if (is_front_page()) {
    wp_enqueue_style('hero-carousel-style', get_template_directory_uri() . '/assets/css/hero-carousel.css', [], '1.2.1');
    wp_enqueue_script('hero-carousel-script', get_template_directory_uri() . '/assets/js/hero-carousel.js', [], '1.2.1', true);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_hero_carousel_assets');

function enqueue_date_selection_assets() {
  if (is_page('booking')) {
    wp_enqueue_script('date-selection-script', get_template_directory_uri() . '/assets/js/date-selection.js', [], '1.2.1', true);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_date_selection_assets');



function cabin_theme_enqueue_styles() {
  wp_enqueue_style('main-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css')
  );

  wp_enqueue_style('base-style', get_template_directory_uri() . '/assets/css/base.css', [], '1.2.1');

  if (is_page('booking')) {
    wp_enqueue_style('booking-style', get_template_directory_uri() . '/assets/css/booking.css', [], '1.2.1');
  }
}
add_action('wp_enqueue_scripts', 'cabin_theme_enqueue_styles');
?>
