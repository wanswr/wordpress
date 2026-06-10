<?php
require_once('wp-load.php');

$main_menu_id = 3;
$footer_menu_id = 261;
$cities_root_id = 6150;

$items = wp_get_nav_menu_items($main_menu_id);

foreach ($items as $item) {
    if ($item->menu_item_parent == $cities_root_id) {
        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title'     => $item->title,
            'menu-item-object-id' => $item->object_id,
            'menu-item-object'    => $item->object,
            'menu-item-type'      => $item->type,
            'menu-item-status'    => 'publish',
        ));
        wp_delete_post($item->db_id, true);
    }
}
wp_delete_post($cities_root_id, true);

$locations = get_theme_mod('nav_menu_locations');
$locations['footer_menu'] = $footer_menu_id;
set_theme_mod('nav_menu_locations', $locations);

echo "Done.\n";
