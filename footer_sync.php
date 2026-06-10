<?php
require_once('wp-load.php');

$menu_id = 261;
$items = wp_get_nav_menu_items($menu_id);
if ($items) {
    foreach ($items as $item) {
        wp_delete_post($item->db_id, true);
    }
}

$geo_ids = range(5949, 5988);
foreach ($geo_ids as $id) {
    $title = get_the_title($id);
    $args = [
        'menu-item-title'     => $title,
        'menu-item-object-id' => $id,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
    ];
    wp_update_nav_menu_item($menu_id, 0, $args);
}
echo "Footer Sync Complete.\n";
