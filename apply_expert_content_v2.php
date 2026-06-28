<?php
require_once('wp-load.php');
global $wpdb;

$pages = get_posts(array('post_type' => 'page', 'posts_per_page' => -1, 'post_status' => 'publish'));

$updated_count = 0;

foreach ($pages as $page) {
    $id = $page->ID;
    $slug = $page->post_name;
    $content = $page->post_content;
    $title = $page->post_title;

    // Check for expert content
    if (strpos($content, 'expert-content') !== false) {
        continue;
    }

    // Ignore special pages
    if (in_array($slug, ['home', 'uslugi', 'katalog', 'kontakty', 'privacy-policy'])) {
        continue;
    }

    $expert_text = "";

    // 1. GEO Template
    if (preg_match('/в\s+([А-Яа-яё\-]+)/iu', $title, $matches) && mb_stripos($title, 'Натяжные потолки') !== false) {
        $city = $matches[1];
        $expert_text = "\n<div class='expert-content'>\n<p>Компания Potolokbel предлагает профессиональный монтаж натяжных потолков в <b>" . $city . "</b> и прилегающих районах. Мы работаем на рынке более 10 лет, используя только сертифицированные полотна (MSD, Pongs, Teqtum) и современное оборудование.</p>\n<p>Наши специалисты выполняют установку любой сложности: от классических матовых решений до инновационных световых линий и теневых профилей EuroKRAAB. Мы гарантируем чистоту при монтаже, отсутствие запаха и долговечность конструкции. Выезд замерщика в " . $city . " — бесплатно в день обращения.</p>\n</div>\n";
    }
    // 2. Generic Services/Types
    else {
        $expert_text = "\n<div class='expert-content'>\n<p>Ищете качественные <b>" . mb_strtolower($title) . "</b> в Москве? Мы предлагаем профессиональные решения по доступным ценам. Наша команда обеспечивает полный цикл работ: от бесплатного замера до чистового монтажа.</p>\n<p>Мы используем проверенные материалы от ведущих производителей и современное оборудование, что позволяет нам давать гарантию на работы до 15 лет. Оформите заявку сегодня и получите расчет стоимости вашего потолка в течение 15 минут!</p>\n</div>\n";
    }

    if ($expert_text) {
        // Insert after H1 if exists
        if (preg_match('/(<h1>.*?<\/h1>)/iu', $content, $m)) {
            $new_content = str_replace($m[1], $m[1] . $expert_text, $content);
        } else {
            $new_content = $expert_text . $content;
        }

        $wpdb->update($wpdb->posts, ['post_content' => $new_content], ['ID' => $id]);
        $updated_count++;
        echo "Updated: $slug\n";
    }
}

echo "TOTAL PAGES UPDATED: $updated_count\n";
