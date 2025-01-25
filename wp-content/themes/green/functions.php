<?php
function greentech_enqueue_styles() {
    // Hoofdstylesheet
    wp_enqueue_style('greentech-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0', 'all');

    // Eventuele extra stijlen (bijvoorbeeld externe bronnen zoals Google Fonts)
    wp_enqueue_style('greentech-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap', [], null);
}
add_action('wp_enqueue_scripts', 'greentech_enqueue_styles');

function greentech_enqueue_scripts() {
    // jQuery (WordPress bevat standaard jQuery)
    wp_enqueue_script('jquery');

    // Eigen script
    wp_enqueue_script('greentech-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'greentech_enqueue_scripts');

function greentech_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'greentech-solutions'),
        'footer' => __('Footer Menu', 'greentech-solutions'),
    ]);
}
add_action('after_setup_theme', 'greentech_register_menus');

function greentech_theme_support() {
    add_theme_support('title-tag'); // Dynamische paginatitels
}
add_action('after_setup_theme', 'greentech_theme_support');

function greentech_register_widget_areas() {
    register_sidebar([
        'name' => __('Main Sidebar', 'greentech-solutions'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will be shown in the sidebar.', 'greentech-solutions'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'greentech_register_widget_areas');

?>
