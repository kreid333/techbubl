<?php
if (!class_exists("Posts")) {
    require(dirname(__FILE__, 2) . "/models/Posts.php");
}

if (!isset($data)) {
    $data = [];
}

$data["recent_posts"] = Posts::getMostRecentAside();
$data["popular_posts"] = Posts::getMostPopularAside();
