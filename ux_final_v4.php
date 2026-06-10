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

function add_m($menu_id, $title, $obj_id = 0, $parent_id = 0, $type = 'post_type', $custom_url = '#') {
    $args = [
        'menu-item-title'     => $title,
        'menu-item-parent-id' => $parent_id,
        'menu-item-status'    => 'publish',
    ];
    if ($obj_id == 0) {
        $args['menu-item-type'] = 'custom';
        $args['menu-item-url']  = $custom_url;
    } else {
        $args['menu-item-object-id'] = $obj_id;
        $args['menu-item-object']    = 'page';
        $args['menu-item-type']      = $type;
    }
    return wp_update_nav_menu_item($menu_id, 0, $args);
}

// 1. Услуги - установка/ремонт
$h_install = add_m($menu_id, 'Услуги');
add_m($menu_id, 'Установка под ключ', 5926, $h_install);
add_m($menu_id, 'Ремонт потолков', 310, $h_install);
add_m($menu_id, 'Слив воды', 6012, $h_install);
add_m($menu_id, 'Ремонт пореза', 6013, $h_install);
add_m($menu_id, 'Демонтаж потолка', 6015, $h_install);

// 2. Дизайн-решения - теневые, трековые и тд
$h_design = add_m($menu_id, 'Дизайн-решения');
foreach ([5995, 5939, 1040, 6023, 6024, 6025, 6026] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_design);
}

// 3. Потолки - виды
$h_types = add_m($menu_id, 'Потолки');
foreach ([5934, 5935, 5936, 5937, 5941, 5940, 5943, 5996, 5997] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_types);
}

// 4. Цены
$h_prices = add_m($menu_id, 'Цены', 5929);
add_m($menu_id, 'Цена за м2', 5930, $h_prices);
add_m($menu_id, 'Расчет стоимости', 5932, $h_prices);
add_m($menu_id, 'Недорого', 5933, $h_prices);

// 5. Калькулятор
add_m($menu_id, 'Калькулятор', 0, 0, 'custom', '/raschet-stoimosti-natyazhnogo-potolka/');

// 6. Портфолио
add_m($menu_id, 'Портфолио', 0, 0, 'custom', '/katalog/');

// 7. Блог
$h_blog = add_m($menu_id, 'Блог');
foreach ([5989, 5990, 5991, 5992, 5993, 5994] as $id) {
    add_m($menu_id, get_the_title($id), $id, $h_blog);
}

// Extra: Contacts
add_m($menu_id, 'Контакты', 15);

echo "Final UX Rebuild Complete.\n";
