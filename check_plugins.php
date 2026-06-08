<?php
require_once 'wp-config.php';
global $table_prefix;
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$res = $conn->query("SELECT option_value FROM {$table_prefix}options WHERE option_name = 'active_plugins'");
$active = unserialize($res->fetch_assoc()['option_value']);

echo "Active Plugins and Versions:\n";
foreach($active as $p) {
    $file = 'wp-content/plugins/' . $p;
    if (file_exists($file)) {
        $content = file_get_contents($file, false, null, 0, 8192);
        preg_match('/Version:(.*)$/mi', $content, $m);
        $version = isset($m[1]) ? trim($m[1]) : 'Unknown';
        echo "- $p: $version\n";
    } else {
        echo "- $p: FILE MISSING\n";
    }
}

echo "\nInactive Plugin Folders:\n";
$plugins_dir = 'wp-content/plugins/';
foreach (scandir($plugins_dir) as $dir) {
    if ($dir === '.' || $dir === '..' || !is_dir($plugins_dir . $dir)) continue;
    $is_active = false;
    foreach ($active as $ap) {
        if (strpos($ap, $dir . '/') === 0) {
            $is_active = true;
            break;
        }
    }
    if (!$is_active) {
        echo "- $dir\n";
    }
}
