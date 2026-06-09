<?php
$content = file_get_contents('wp-content/themes/astra/functions.php');
$lines = explode("\n", $content);
while(count($lines) > 0 && (trim(end($lines)) == "/**" || trim(end($lines)) == "});" || trim(end($lines)) == "")) {
    array_pop($lines);
}
file_put_contents('wp-content/themes/astra/functions.php', implode("\n", $lines) . "\n");
