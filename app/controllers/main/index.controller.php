<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");

$data = [];

if (isset($_GET["sortby"])) {
    if ($_GET["sortby"] == "most-recent") {
        $data["posts"] = Posts::getMostRecent();
    }

    if ($_GET["sortby"] == "most-popular") {
        $data["posts"] = Posts::getMostPopular();
    }
} else {
    $data["posts"] = Posts::getPosts();
}

view("main/index", $data);
