<?php
require_once('wp-load.php');

$pages = get_posts(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_status' => 'publish'
));

echo "ID | Slug | Title | H1 | Meta Title | Meta Desc | SEO Score\n";
echo "---|---|---|---|---|---|---\n";

foreach ($pages as $page) {
    $id = $page->ID;
    $slug = $page->post_name;
    $title = $page->post_title;
    $rm_title = get_post_meta($id, 'rank_math_title', true);
    $rm_desc = get_post_meta($id, 'rank_math_description', true);
    $score = get_post_meta($id, 'rank_math_seo_score', true);

    $content = $page->post_content;
    $h1 = 'ОТСУТСТВУЕТ';
    if (preg_match('/<h1[^>]*>(.*?)<\/h1>/i', $content, $m)) {
        $h1 = trim(strip_tags($m[1]));
    } else {
        $elementor_data = get_post_meta($id, '_elementor_data', true);
        if (preg_match('/"header_size":"h1","align":".*?","title":"(.*?)"/', $elementor_data, $em)) {
             $h1 = json_decode('"' . $em[1] . '"');
        }
    }

    echo "$id | $slug | $title | $h1 | " . ($rm_title ? $rm_title : 'ПО УМОЛЧАНИЮ (ОШИБКА)') . " | " . ($rm_desc ? $rm_desc : 'ПУСТО') . " | " . ($score ? $score : '0') . "\n";
}
