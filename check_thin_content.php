<?php
require_once('wp-load.php');

$pages = get_posts(array('post_type' => 'page', 'posts_per_page' => -1, 'post_status' => 'publish'));

echo "ID | Slug | Length | Content Preview\n";
echo "---|---|---|---\n";

foreach ($pages as $page) {
    $content = strip_tags($page->post_content);
    // Ignore internal link blocks for length check
    $cleaned = preg_replace('/Также работаем в этих городах|Наши основные услуги|Ремонт и обслуживание|Освещение и трековые системы/iu', '', $content);
    $len = mb_strlen(trim($cleaned));

    if ($len < 500) { // Thin content
        echo "{$page->ID} | {$page->post_name} | $len | " . mb_substr(trim($cleaned), 0, 50) . "...\n";
    }
}
