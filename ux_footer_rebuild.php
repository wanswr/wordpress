<?php
require_once('wp-load.php');

$footer_menu_id = 261;

// 1. Clear footer menu
$items = wp_get_nav_menu_items($footer_menu_id);
if ($items) {
    foreach ($items as $item) {
        wp_delete_post($item->db_id, true);
    }
}

// 2. Add all 40 city pages
$geo_ids = range(5949, 5988);
foreach ($geo_ids as $id) {
    wp_update_nav_menu_item($footer_menu_id, 0, array(
        'menu-item-title'     => get_the_title($id),
        'menu-item-object-id' => $id,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
    ));
}

// 3. Set footer location
$locations = get_theme_mod('nav_menu_locations');
$locations['footer_menu'] = $footer_menu_id;
set_theme_mod('nav_menu_locations', $locations);

echo "Footer SEO Rebuilt.\n";
