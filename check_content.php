<?php
require_once 'wp-config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$conn->set_charset("utf8");
$res = $conn->query("SELECT post_title, post_name FROM {$table_prefix}posts WHERE post_type='page' AND post_status='publish'");
while($row = $res->fetch_assoc()) {
    echo $row['post_title'] . ' -> ' . $row['post_name'] . "\n";
}
echo "\nChecking for specific keywords (KRAAB, Slott, EuroKRAAB):\n";
$keywords = ['KRAAB', 'Slott', 'EuroKRAAB', 'теневой', 'парящий', 'световые линии'];
foreach ($keywords as $kw) {
    $res = $conn->query("SELECT COUNT(*) as count FROM {$table_prefix}posts WHERE post_content LIKE '%$kw%' OR post_title LIKE '%$kw%'");
    $row = $res->fetch_assoc();
    echo "- $kw: " . $row['count'] . " occurrences\n";
}
