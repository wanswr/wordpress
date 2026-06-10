<?php
require_once('wp-load.php');

$menu_id = 3;

// 1. Clear current menu
$items = wp_get_nav_menu_items($menu_id);
if ($items) {
    foreach ($items as $item) {
        wp_delete_post($item->db_id, true);
    }
}

function add_m($menu_id, $title, $obj_id = 0, $parent_id = 0, $type = 'post_type') {
    $args = [
        'menu-item-title'     => $title,
        'menu-item-parent-id' => $parent_id,
        'menu-item-status'    => 'publish',
    ];
    if ($obj_id == 0) {
        $args['menu-item-type'] = 'custom';
        $args['menu-item-url']  = '#';
    } else {
        $args['menu-item-object-id'] = $obj_id;
        $args['menu-item-object']    = 'page';
        $args['menu-item-type']      = $type;
    }
    return wp_update_nav_menu_item($menu_id, 0, $args);
}

// 1. HEADER MENU (High Level UX)
$h_catalog = add_m($menu_id, 'Виды потолков');
$h_design = add_m($menu_id, 'Дизайн-решения');
$h_rooms = add_m($menu_id, 'Комнаты');
$h_install = add_m($menu_id, 'Установка и ремонт');
$h_prices = add_m($menu_id, 'Цены и калькулятор', 5929);
$h_contact = add_m($menu_id, 'Контакты', 15);

// 2. DROPDOWN DETAILS
foreach ([5934, 5935, 5936, 5937, 5941, 5940] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_catalog);
}
foreach ([5995, 5939, 1040, 6026] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_design);
}
foreach ([5944, 5945, 5947, 5946] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_rooms);
}
add_m($menu_id, 'Установка под ключ', 5926, $h_install);
add_m($menu_id, 'Ремонт потолков', 310, $h_install);
add_m($menu_id, 'Слив воды', 6012, $h_install);
add_m($menu_id, 'Цена за м2', 5930, $h_prices);
add_m($menu_id, 'Расчет стоимости', 5932, $h_prices);

echo "Header UX Rebuilt.\n";
