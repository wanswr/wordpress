<?php
require_once 'wp-load.php';

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);

$query = new WP_Query($args);
$pages = [];

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $id = get_the_ID();
        $content = get_the_content();

        if (strpos($content, 'expert-content') !== false) {
            $pages[] = [
                'id' => $id,
                'slug' => get_post_field('post_name', $id),
                'title' => get_the_title()
            ];
        }
    }
}
wp_reset_postdata();

foreach ($pages as $p) {
    echo $p['id'] . "|" . $p['slug'] . "|" . $p['title'] . "\n";
}
