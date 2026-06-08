<?php
require_once 'wp-config.php';
require_once 'expert_texts.php';
require_once 'template_generator.php';
require_once 'schema_generator.php';

global $wpdb;

$semantic_core = json_decode(file_get_contents('semantic_core.json'), true);

foreach ($semantic_core as $item) {
    $city = $item['city'];
    $city_prep = get_prepositional_local_db($city);
    $cluster = $item['cluster'];
    $slug = $item['slug'];

    $post_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = 'page'", $slug));

    if ($post_id) {
        $elementor_data = generate_elementor_data($cluster, $city, $city_prep, $cluster_texts);
        update_post_meta($post_id, '_elementor_data', $elementor_data);
        echo "Updated meta: $slug\n";
    }
}

function get_prepositional_local_db($city) {
    $exceptions = ["Москва" => "Москве", "Видное" => "Видном", "Пушкино" => "Пушкино", "Ступино" => "Ступино", "Лыткарино" => "Лыткарино", "Фрязино" => "Фрязино", "Орехово-Зуево" => "Орехово-Зуево"];
    if (isset($exceptions[$city])) return $exceptions[$city];
    $last_letter = mb_substr($city, -1);
    if ($last_letter == 'а') return mb_substr($city, 0, -1) . 'е';
    if ($last_letter == 'ы') return mb_substr($city, 0, -1) . 'ах';
    return $city . 'е';
}
